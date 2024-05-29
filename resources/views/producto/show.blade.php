@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="flex">
        <div class="min-w-72 h-screen bg-gray-900 text-white flex flex-col items-end px-4">
            <x-heroicon-o-bars-3 class="h-7"/>
            <div>
                <ul>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="flex-1 flex justify-evenly p-5">
            @foreach ($data as $a )
                <div class="bg-gray-200 h-fit p-5">
                    <div class=" h-44 bg-gray-500"></div>
                    <p>{{$a->descripcion}}</p>
                    <p>{{$a->modelo->nombre}}</p>
                    <p>{{$a->color->nombre}}</p>
                    <p>Medidas: {{$a->medidas->alto}} x {{$a->medidas->ancho}} x {{$a->medidas->fondo}}</p>
                    <button class="px-2 py-1 w-full bg-yellow-400">${{$a->precio}}</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
