<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;


class ResetPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
 
            $request->validate([
                'email' => 'required|email|exists:users,email'
            ],[
                'email.exists' => 'Cette adresse email n\'est pas enregistrée dans notre système.'

            ]);
            $token =Str::random(64);
            $email=$request->email;

        // Stocke le token dans la base de données

            DB::table('password_reset_tokens')->where('email',$email)->delete();
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            if($this->sendResetLinkEmail($email,$token)){
                return back()->with('success','Nous avonsenvoye un lien de  réinitialisation à votre adresse email! ');
            }else {
                return back()->withErrors(['email'=>'Impossible d\'envoyer l\'email de réinitialisation. Veuillez réessayer plus tard.']);

            }
    }
            private function sendResetLinkEmail($email, $token){
                $mail= new PHPMailer(true);

                try{

                       // Configuration du serveur
                    $mail->isSMTP();
                    $mail->Host  =env('MAIL_HOST', 'smtp.gmail.com');
                    $mail->SMTPAuth   = true;
                    $mail->Username   = env('MAIL_USERNAME');
                    $mail->Password   = env('MAIL_PASSWORD');
                    $mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');
                    $mail->Port       = env('MAIL_PORT', 587);
                    $mail->CharSet    = 'UTF-8';

                    //destinataires

                    $mail->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@cosmetiquesmarocains.com'), env('MAIL_FROM_NAME', 'Cosmétiques Marocains'));
                    $mail->addAddress($email);
                    //contenu
                    $resetUrl=route('password.reset.form',['token'=>$token]) .'?email=' .urlencode($email);
                    $mail->isHTML(true);
                    $mail->Subject='Réinitialisation de votre mot de passe - Cosmétiques Marocains';
                    $mail->Body    = '
                    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="https://via.placeholder.com/200x100?text=Cosmétiques+Marocains" alt="Logo Cosmétiques Marocains">
                    </div>
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
                    <p style="margin-top: 30px; font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 20px;">
                        © ' . date('Y') . ' Cosmétiques Marocains. Tous droits réservés.
                    </p>
                </div>
            ';
            $mail->AltBody = 'Bonjour, vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte. Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: ' . $resetUrl;
           $mail->send(true);
           return true;     
        }catch(Exception $e){
            Log::error("Erreur d'envoi d'email: " . $mail->ErrorInfo);
            return false;
        }
 
            }

    public function showResetPasswordForm($token)
    {
        try {
            $email=request()->query('email');
            $tokenData =DB::table('password_reset_tokens')->where('token',$token)->where('email',$email)->first();

            if(!$tokenData){
                return redirect()->route('password.forgot.form')->withErrors(['email','Token de réinitialisation invalide ou expiré!']);

            }

            // Vérifier si le token n'a pas expiré (60 minutes)

            $createdAt= Carbon::parse($tokenData->created_at);
            if(Carbon::now()->diffInMinutes($createdAt)>60){
                DB::table('password_reset_tokens')->where('email', $email)->delete();
                return redirect()->route('password.forgot.form')
                    ->withErrors(['email' => 'Token de réinitialisation expiré. Veuillez demander un nouveau lien.']);
            
            }
            return view('auth.reset-password')->with(['token' => $token, 'email' => $email]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors du chargement du formulaire.']);
        }
    }

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

        // Mettre à jour l'utilisateur avec le nouveau mot de passe
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Nous ne trouvons pas d\'utilisateur avec cette adresse email.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Supprimer le token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Envoyer un email de confirmation avec PHPMailer
        $this->sendPasswordChangedNotification($user->email);

        return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès!');
    }
    // Envoie une notification de changement de mot de passe

    public function sendPasswordChangedNotification($email){
        $mail = new PHPMailer(true);
        
        try {
            // Configuration du serveur
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST', 'smtp.gmail.com');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME');
            $mail->Password   = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');
            $mail->Port       = env('MAIL_PORT', 587);
            $mail->CharSet    = 'UTF-8';

            // Destinataires
            $mail->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@cosmetiquesmarocains.com'), env('MAIL_FROM_NAME', 'Cosmétiques Marocains'));
            $mail->addAddress($email);

            // Contenu
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation de changement de mot de passe - Cosmétiques Marocains';
            $mail->Body    = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="https://via.placeholder.com/200x100?text=Cosmétiques+Marocains" alt="Logo Cosmétiques Marocains">
                    </div>
                    <h2 style="color: #333;">Mot de passe modifié</h2>
                    <p>Bonjour,</p>
                    <p>Nous vous confirmons que votre mot de passe a été modifié avec succès.</p>
                    <p>Si vous n\'avez pas effectué cette modification, veuillez nous contacter immédiatement.</p>
                    <p style="margin-top: 30px; font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 20px;">
                        © ' . date('Y') . ' Cosmétiques Marocains. Tous droits réservés.
                    </p>
                </div>
            ';
            $mail->AltBody = 'Bonjour, nous vous confirmons que votre mot de passe a été modifié avec succès. Si vous n\'avez pas effectué cette modification, veuillez nous contacter immédiatement.';

            $mail->send();
            return true;
        } catch (Exception $e) {
            Log::error("Erreur d'envoi d'email de confirmation: " . $mail->ErrorInfo);
            return false;
        }

    }

}