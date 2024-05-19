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
        //captura los valores
        $var = $req->only("email", "password");
        //pregunta si se autentico correctamente
        if (Auth::attempt($var)) {
            //guarda el usuario autenticado
            $user = Auth::user();
            //preguntan si tiene el rol de admin
            if ($user->hasRole('admin')) {
                //lo redireciona a dasboard
                return redirect()->route('dashboard');
            }
            //lo redireciona a home
            return redirect('/');
        }
        //En caso de que no se autentico lo redirecciona a login pero con un error 
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
        //valida la informacion
        $req->validate([
            'name' => 'required|string|max:50',
            'user' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        //crea el usuario
        $user = User::create([
            'name' => $req->name,
            'user' => $req->user,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        //asigna el rol user al usuario creado
        $user->assignRole('user');
        // redirige a home
        return redirect('/');
    }
}
