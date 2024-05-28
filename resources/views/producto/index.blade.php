@extends('dashboard')
@section('info')
    <x-btnAgregar link="producto.create" nombre="agregar" />
    <x-table class="m-10 dark:text-white border-solid border-2" :columns="$columns">
        @foreach ($data as $a)
            <tr class="border border-black">
                <td class="px-5 py-2">{{ $a->id }}</td>
                <td class="px-5 py-2">{{ $a->descripcion }}</td>
                <td class="px-5 py-2">{{ $a->precio }}</td>
                <td class="px-5 py-2">{{ $a->estado }}</td>
                <td class="px-5 py-2">{{ $a->modelo->nombre }}</td>
                <td class="px-5 py-2">{{ $a->color->nombre }}</td>
                <td class="px-5 py-2"> {{ $a->medidas->alto }} x {{ $a->medidas->ancho }} x {{ $a->medidas->fondo }}
                </td>
                <td class="px-5 py-2">{{ $a->marca->nombre }}</td>
                <td class="flex gap-10 px-5 py-2">
                    <x-btnEditar link="user.edit" :id="$a->id" nombre="editar" />
                    <x-btnEliminar nombre="eliminar" link="'./user'" :id="$a->id"
                        mensaje="'Seguro que desea eliminar?'" />
                </td>
            </tr>
        @endforeach
    </x-table>
@endsection
