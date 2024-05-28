@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="h-screen dark:bg-slate-900 flex dark:text-white relative">
        <ul class="flex flex-col min-w-[200px] fixed h-screen shadow-md shadow-black bg-gray-800 z-10">
            <x-selectorLink link="user.index" nombre="usuario"></x-selectorLink>
            <x-selectorLink link="producto.index" nombre="productos"></x-selectorLink>
            <x-selectorLink link="categoria.index" nombre="categorias"></x-selectorLink>
            <x-selectorLink link="modelo.index" nombre="modelos"></x-selectorLink>
        </ul>
        <div class="flex-1">
            <div class="p-5 bg-gray-200 dark:bg-black w-fit mx-auto">
                @yield('info')
            </div>
        </div>
    </div>
@endsection
