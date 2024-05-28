<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = Schema::getColumnListing('users');
        $columns = array_diff($columns, ['email_verified_at','password','created_at', 'updated_at','remember_token']);


        $data = User::all();
        return view('user.index', compact('data','columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'nombre' => 'required|string|max:50',
            'dni' => 'required|integer|digits_between:1,8',
            'telefono' => 'required|integer|digits_between:1,9',
            'ubicacion' => 'required|string|max:100',
            'user' => 'required|string|max:100|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'rol' => 'string'
        ]);
        $user = User::create([
            'nombre' => $req->nombre,
            'dni' => $req->dni,
            'telefono' => $req->telefono,
            'ubicacion' => $req->ubicacion,
            'user' => $req->user,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        //si el rol es 1 asigna el rol admin al usuario
        // si no le asigna user
        if ($req->rol === "1") {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $data = User::findOrFail($id);
        $data->update($req->all());
        if ($req->rol === "1") {
            $data->roles()->detach();
            $data->assignRole('admin');
        } else {
            $data->roles()->detach();
            $data->assignRole('user');
        }
        return redirect()->route('user.index');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index');
    }
}
