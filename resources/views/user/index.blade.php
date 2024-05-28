@extends('dashboard')
@section('info')
    <x-btnAgregar link="user.create" nombre="Agregar" />
    <x-table :columns="$columns" :addColumns="['rol']">
        @foreach ($data as $a)
            <tr class="border">
                <td class="px-5 py-2">{{ $a->id }}</td>
                <td class="px-5 py-2">{{ $a->nombre }}</td>
                <td class="px-5 py-2">{{ $a->dni }}</td>
                <td class="px-5 py-2">{{ $a->telefono }}</td>
                <td class="px-5 py-2">{{ $a->ubicacion }}</td>
                <td class="px-5 py-2">{{ $a->user }}</td>
                <td class="px-5 py-2">{{ $a->email }}</td>
                <td class="px-5 py-2">
                    @foreach ($a->roles as $rol)
                        {{ $rol->name }} {{-- Muestra el nombre del rol --}}
                    @endforeach
                </td>
                <td class="flex gap-10 px-5 py-2">
                    <x-btnEditar link='user.edit' :id="$a->id" nombre="editar"/>
                    <x-btnEliminar nombre="eliminar" link="'./user'" :id="$a->id" mensaje="'Seguro que desea eliminar?'"/>
                </td>
            </tr>
        @endforeach
    </x-table>
@endsection
