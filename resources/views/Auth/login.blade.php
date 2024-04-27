@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <x-center>
        <h2 class=" text-2xl">LOGIN</h2>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-10 w-1/3">
            @csrf
            <input type="email" placeholder="ejemplo@correo.com" name="email" autofocus
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            <input type="password" placeholder="contraseña" name="password"
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            <x-error />
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md font-bold ">INICIAR
                SESION</button>
        </form>
        <footer>
            <p>No tienes cuenta <a class=" font-bold px-4 py-2 bg-orange-600 rounded-md hover:bg-orange-700"
                    href="{{ route('register') }}">Registrate</a></p>
        </footer>
    </x-center>
@endsection
