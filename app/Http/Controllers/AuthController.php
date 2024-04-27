<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin(Request $req)
    {
        $var = $req->only("email", "password");
        if (Auth::attempt($var)) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard');
            }
            return redirect('/');
        }
        return redirect()->route('login')->with('error', 'Usuario o contraseña Incorrecta');
    }
    public function logout(Request $request)
    {
        // Cerrar la sesión del usuario
        Auth::logout();
        // Redireccionar al usuario a la página principal
        return redirect('/');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:50',
            'user' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $req->name,
            'user' => $req->user,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        $user->assignRole('user');
        // return $req;
        return redirect('/');
    }
}
