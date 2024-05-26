@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="h-screen dark:bg-slate-900 flex  dark:text-white">
        <ul class="flex flex-col min-w-[200px] sticky top-14 shadow-md shadow-black bg-gray-800">
            <x-selectorLink link="user.index" nombre="usuario"></x-selectorLink>
            <x-selectorLink link="producto.index" nombre="productos"></x-selectorLink>
            <x-selectorLink link="categoria.index" nombre="categorias"></x-selectorLink>
            <x-selectorLink link="modelo.index" nombre="modelos"></x-selectorLink>
        </ul>
        <div class="">
            @yield('info')
        </div>
    </div>
@endsection
