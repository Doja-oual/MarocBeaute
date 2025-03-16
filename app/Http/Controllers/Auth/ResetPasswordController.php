<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function mailer(){
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0; // Mettez à 0 en production
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = env('MAIL_HOST');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = env('MAIL_PORT');
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->isHTML(true);
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $mail->CharSet = 'UTF-8';
        return $mail;
    }

    // Méthode pour afficher le formulaire d'oubli de mot de passe
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Méthode pour traiter la demande d'oubli de mot de passe
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ],[
            'email.exists' => 'Cette adresse email n\'est pas enregistrée dans notre système.'
        ]);
        
        $token = Str::random(64);
        $email = $request->email;
        
        // Trouver l'utilisateur
        $user = User::where('email', $email)->firstOrFail();
        
        try {
            // Stocke le token dans la base de données
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            
            $mail = $this->mailer();
            
            // Créer l'URL pour la réinitialisation
            $resetUrl = route('password.reset.form', ['token' => $token]) . '?email=' . urlencode($email);
            
            $mail->addAddress($email, $user->name ?? '');
            $mail->Subject = "Réinitialisation de votre mot de passe";
            $mail->Body = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <h2 style="color: #333;">Réinitialisation de votre mot de passe</h2>
                    <p>Bonjour,</p>
                    <p>Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.</p>
                    <p style="margin: 30px 0; text-align: center;">
                        <a href="' . $resetUrl . '" 
                           style="background-color: #4CAF50; color: white; padding: 12px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
                            Réinitialiser mon mot de passe
                        </a>
                    </p>
                    <p>Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.</p>
                    <p>Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune action n\'est requise.</p>
                </div>
            ';
            $mail->AltBody = "Bonjour,\n\nVous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.\n\nCliquez sur ce lien pour réinitialiser votre mot de passe: $resetUrl \n\nCe lien expirera dans 60 minutes.";
            
            if($mail->send()) {
                return back()->with('success', 'Nous avons envoyé un lien de réinitialisation à votre adresse email!');
            } else {
                Log::error("Échec d'envoi d'email: " . $mail->ErrorInfo);
                return back()->withErrors(['email' => 'Impossible d\'envoyer l\'email de réinitialisation. Veuillez réessayer plus tard.']);
            }
        } catch (Exception $e) {
            Log::error("Exception lors de l'envoi d'email: " . $e->getMessage());
            return back()->withErrors(['email' => 'Impossible d\'envoyer l\'email de réinitialisation. Veuillez réessayer plus tard.']);
        }
    }

    // Méthode pour afficher le formulaire de réinitialisation
    public function showResetPasswordForm($token)
    {
        try {
            $email = request()->query('email');
            $tokenData = DB::table('password_reset_tokens')
                           ->where('token', $token)
                           ->where('email', $email)
                           ->first();

            if(!$tokenData){
                return redirect()->route('password.forgot.form')
                    ->withErrors(['email' => 'Token de réinitialisation invalide ou expiré!']);
            }

            // Vérifier si le token n'a pas expiré (60 minutes)
            $createdAt = Carbon::parse($tokenData->created_at);
            if(Carbon::now()->diffInMinutes($createdAt) > 60){
                DB::table('password_reset_tokens')->where('email', $email)->delete();
                return redirect()->route('password.forgot.form')
                    ->withErrors(['email' => 'Token de réinitialisation expiré. Veuillez demander un nouveau lien.']);
            }
            
            return view('auth.reset-password')->with(['token' => $token, 'email' => $email]);
        } catch (\Exception $e) {
            Log::error("Erreur dans showResetPasswordForm: " . $e->getMessage());
            return redirect()->route('password.forgot.form')
                ->withErrors(['error' => 'Une erreur est survenue lors du chargement du formulaire.']);
        }
    }

    // Méthode pour traiter la réinitialisation du mot de passe
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Vérifier le token
        $tokenData = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$tokenData) {
            return back()->withErrors(['email' => 'Token de réinitialisation invalide!']);
        }

        // Vérifier si le token n'a pas expiré (60 minutes)
        $createdAt = Carbon::parse($tokenData->created_at);
        if(Carbon::now()->diffInMinutes($createdAt) > 60){
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'Token de réinitialisation expiré. Veuillez demander un nouveau lien.']);
        }

        // Mettre à jour l'utilisateur avec le nouveau mot de passe
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Nous ne trouvons pas d\'utilisateur avec cette adresse email.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Supprimer le token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Option: Envoyer un email de confirmation
        try {
            $this->sendPasswordChangedNotification($user->email);
        } catch (\Exception $e) {
            Log::error("Erreur lors de l'envoi de l'email de confirmation: " . $e->getMessage());
            // On ne bloque pas le processus même si l'email de confirmation échoue
        }

        return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès!');
    }
    
    // Envoie une notification de changement de mot de passe
    public function sendPasswordChangedNotification($email)
    {
        $mail = $this->mailer();
        
        try {
            // Destinataires
            $mail->addAddress($email);

            // Contenu
            $mail->Subject = 'Confirmation de changement de mot de passe';
            $mail->Body = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <h2 style="color: #333;">Mot de passe modifié</h2>
                    <p>Bonjour,</p>
                    <p>Nous vous confirmons que votre mot de passe a été modifié avec succès.</p>
                    <p>Si vous n\'avez pas effectué cette modification, veuillez nous contacter immédiatement.</p>
                </div>
            ';
            $mail->AltBody = 'Bonjour, nous vous confirmons que votre mot de passe a été modifié avec succès. Si vous n\'avez pas effectué cette modification, veuillez nous contacter immédiatement.';

            $mail->send();
            Log::info("Email de confirmation envoyé avec succès à $email.");
            return true;
        } catch (Exception $e) {
            Log::error("Erreur d'envoi d'email de confirmation: " . $e->getMessage());
            throw $e;
        }
    }
}