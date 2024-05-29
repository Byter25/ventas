@extends('dashboard')
@section('info')
    <x-formEditar method="POST" inputLink="user.update" :id="$data->id" exitLink="user.index">
        @method('PUT')
        @csrf
        <p>Nombre</p>
        <input type="text" placeholder="Alexander Saavedra" name="name" required autofocus value="{{ $data->nombre }}">

        <p>Usuario</p>
        <input type="text" placeholder="juanito1234" name="user" required value="{{ $data->user }}">
        @error('user')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror

        <p>Email</p>
        <input type="email" placeholder="email@ejemplo.com" name="email" required value="{{ $data->email }}">
        @error('email')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror

        <p>Rol</p>
        <select name="rol" id="rol">
            <option value="1" @if ($data->hasRole('admin')) selected @endif>Administrador</option>
            <option value="2" @if ($data->hasRole('user')) selected @endif>Usuario</option>
        </select>
    </x-formEditar>
@endsection
