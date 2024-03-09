<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        try {
            // Logique de création de l'utilisateur
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'photo' => 'required|image|max:1024', // Assurez-vous que c'est une image et qu'elle n'est pas trop grande
            ]);

            $path = $request->file('photo')->store('public/photos'); // Enregistre la photo dans le stockage

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $path, // Enregistrez le chemin de la photo
            ]);
            // Connecter l'utilisateur
            Auth::login($user);

            // Rediriger l'utilisateur vers une page spécifique après l'inscription
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Log l'erreur ou renvoie un message d'erreur
            return back()->withErrors(['msg' => $e->getMessage()]);
        }

    }
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
