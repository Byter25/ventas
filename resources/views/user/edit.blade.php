@extends('dashboard')
@section('info')
    <form method="POST" action="{{ route('user.update', $data->id) }}" class="grid grid-cols-3 gap-5">
        @method('PUT')
        @csrf
        <p class="py-2 px-4 text-right col-start-1">Nombre</p>
        <input type="text" placeholder="Alexander Saavedra" name="name" required autofocus
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600"
            value="{{ $data->name }}">

        <p class="py-2 px-4 text-right col-start-1">Usuario</p>
        <input type="text" placeholder="juanito1234" name="user" required
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600"
            value="{{ $data->user }}">
        @error('user')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror

        <p class="py-2 px-4 text-right col-start-1">Email</p>
        <input type="email" placeholder="email@ejemplo.com" name="email" required
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600"
            value="{{ $data->email }}">
        @error('email')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror

        <p class="py-2 px-4 text-right col-start-1">Rol</p>
        <select name="rol" id="rol"
            class="dark:bg-slate-900 border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            <option value="1" @if ($data->hasRole('admin')) selected @endif>Administrador</option>
            <option value="2" @if ($data->hasRole('user')) selected @endif>Usuario</option>
        </select>
        <a href="{{ route('user.index') }}"
            class="col-start-1 font-bold px-4 py-2 bg-red-600 rounded-md hover:bg-red-700 max-w-40 ml-auto">Cancelar</a>
        <button type="submit"
            class="col-start-2 font-bold px-4 py-2 bg-orange-600 rounded-md hover:bg-orange-700 max-w-40 m-auto">Guardar</button>
    </form>
@endsection
