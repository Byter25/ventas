<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoy = Carbon::now()->toDateString();
        $userAuth = Auth::id();
        $carrito = Boleta::whereDate('create_at',$hoy)->where('id_user',$userAuth)->get();

        return view("boleta.index",compact("carrito"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
