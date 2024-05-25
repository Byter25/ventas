@extends('dashboard')
@section('info')
    <form method="POST" action="{{ route('user.store') }}" class="grid grid-cols-3 gap-5 uppercase">
        @csrf
        <p class="py-2 px-4 text-right col-start-1">Nombre</p>
        <input type="text" placeholder="Alexander Saavedra" name="nombre" required autofocus
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
        <p class="py-2 px-4 text-right col-start-1">dni</p>
        <input type="number" placeholder="87654321" name="dni" required min="8"
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
        @error('dni')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror
        <p class="py-2 px-4 text-right col-start-1">telefono</p>
        <input type="number" placeholder="999444666" name="telefono" required min="9"
                class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
        @error('telefono')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror
        <p class="py-2 px-4 text-right col-start-1">Ubicacion</p>
        <input type="text" placeholder="san clamente calle independencia" name="ubicacion" required
            class="border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
        @error('ubicacion')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror
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
        <p class="py-2 px-4 text-right col-start-1">Rol</p>
        <select name="rol" id="rol"
            class="dark:bg-slate-900 border border-solid border-orange-600 py-2 px-4 rounded-md outline-none shadow-orange-600">
            <option value="1">Administrador</option>
            <option value="2" selected>Usuario</option>
        </select>
        <a href="{{ route('user.index') }}"
            class="col-start-1 font-bold px-4 py-2 bg-red-600 rounded-md hover:bg-red-700 max-w-40 ml-auto">Cancelar</a>
        <button type="submit"
            class="col-start-2 font-bold px-4 py-2 bg-orange-600 rounded-md hover:bg-orange-700 max-w-40 m-auto">Guardar</button>
    </form>
@endsection
