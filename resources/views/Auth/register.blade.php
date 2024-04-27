@extends('layouts.guest')
@section('title', 'Registrar')
@section('content')
    <x-center>
        <h1 class="text-2xl">Register</h1>
        <form method="POST" action="{{ route('register') }}" class="grid grid-cols-3 gap-5">
            @csrf
            <p class="py-2 px-4 text-right col-start-1">Nombre</p>
            <input type="text" placeholder="Alexander Saavedra" name="name" required autofocus
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">

            <p class="py-2 px-4 text-right col-start-1">Usuario</p>
            <input type="text" placeholder="juanito1234" name="user" required
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            @error('user')
                <span class="text-red-600 py-2 px-4">{{ $message }}</span>
            @enderror

            <p class="py-2 px-4 text-right col-start-1">Email</p>
            <input type="email" placeholder="email@ejemplo.com" name="email" required
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            @error('email')
                <span class="text-red-600 py-2 px-4">{{ $message }}</span>
            @enderror

            <p class="py-2 px-4 text-right col-start-1">Contraseña</p>
            <input type="password" placeholder="contraseña" name="password" required min="8"
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            @error('password')
                <span class="text-red-600 py-2 px-4">{{ $message }}</span>
            @enderror

            <p class="py-2 px-4 text-right col-start-1">Repite Contraseña</p>
            <input type="password" placeholder="repitecontraseña" name="password_confirmation" required
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">

            <button type="submit"
                class="col-start-2 font-bold px-4 py-2 bg-orange-600 rounded-md hover:bg-orange-700 max-w-40 m-auto">REGISTRAR</button>
        </form>
        <footer>
            <span>Ya tienes cuenta <a href="./login"
                    class="px-4 py-2 bg-orange-600 rounded-md hover:bg-orange-700 font-bold">Inicia
                    Sesion</a></span>
        </footer>
    </x-center>
@endsection
