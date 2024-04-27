@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="h-screen dark:bg-slate-900 flex justify-center dark:text-white">
        <div class="mx-20 my-10  w-full min-h-52 rounded-md shadow-2xl shadow-black">
            <ul class="flex gap-5 p-5">
                <x-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
                    {{ __('Index') }}</x-link>
                <x-link>Productos</x-link>
            </ul>
            @yield('info')
        </div>
    </div>
@endsection
