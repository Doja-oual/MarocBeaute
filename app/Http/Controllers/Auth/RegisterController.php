<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        try {
            return view('auth.register');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors du chargement de la page d\'inscription'])->withInput();
        }
    }

    public function register(RegisterRequest $request) 
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('login')->with('success', 'Compte créé avec succès. Connectez-vous !');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erreur lors de l\'inscription : ' . $th->getMessage());
        }
    }
}