<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    
    public function showLoginForm(){
        try{

        
        return view('auth.login');
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['error'=>'Une erreur est survenue lors
         du changment de la page  de connexion'])->withInput();

    }
    }

    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);


            if ($validateUser->fails()) {
                return redirect()->back()
                    ->withErrors($validateUser)
                    ->withInput();
            }
            // if ($validateUser->fails()) {
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'validation error',
            //         'errors' => $validateUser->errors()
            //     ], 401);
            // }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('success','connexion reussie !');
            }

            // $user = User::where('email', $request->email)->first();
 $request->session()->regenerate();
         return redirect()->intended('/dashboard')->with('success','connexion reussie');
            // return response()->json([
            //     'status' => true,
            //     'message' => 'User logged in successfully',
            //     'token' => $user->createToken("API TOKEN")->plainTextToken
            // ], 200)

        }catch (\Exception $e) {
            Log::error('Erreur lors de la déconnexion : ' . $e->getMessage()); // Log l'erreur
            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la déconnexion.']);
        }
        }
    
    
    public function logout(Request $request)
    {
        try{
           Auth::logout();
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect('/login')->with('success','voius etes deconnecté !'); 
        }catch(\Exception $e){
            Log::error('Erreur lors de la deconnexion : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error'=>'Une erreur est survenue lors de la déconnexion.']);
        }
        // $request->user()->currentAccessToken()->delete();
        
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'User logged out successfully'
    //     ], 200);
     }
    
    }
