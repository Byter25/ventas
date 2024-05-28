@extends('layouts.guest')
@section('title', 'Login')
@section('content')

    <h2 class="py-5 text-2xl">LOGIN</h2>
    <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center gap-5">
        @csrf
        <input type="email" placeholder="ejemplo@correo.com" name="email" autofocus
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600 min-w-60">
        <input type="password" placeholder="contraseña" name="password"
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600 min-w-60">
        <x-error />
        <button type="submit" class="w-fit bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md font-bold min-w-60">INICIAR
            SESION</button>
    </form>
    <footer class="p-5">
        <p>No tienes cuenta <a class=" font-bold px-4 py-2 bg-orange-600 rounded-md hover:bg-orange-700"
                href="{{ route('register') }}">Registrate</a></p>
    </footer>
@endsection
