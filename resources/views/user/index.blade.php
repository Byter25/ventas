@extends('dashboard')
@section('info')
    <div class="flex">
        <table class="max-w-full m-10 dark:text-white">
            <thead>
                <tr>
                    <th class="p-2 ">ID</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Usuario</th>
                    <th class="p-2">Rol</th>
                    <th class="p-2"> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $a)
                    <tr>
                        <td class="px-5 py-2">{{ $a->id }}</td>
                        <td class="px-5 py-2">{{ $a->name }}</td>
                        <td class="px-5 py-2">{{ $a->user }}</td>
                        <td class="px-5 py-2">
                            @foreach ($a->roles as $rol)
                                {{ $rol->name }} {{-- Muestra el nombre del rol --}}
                            @endforeach
                        </td>
                        <td class="flex gap-10 px-5 py-2">
                            <a href="{{ route('user.edit', $a->id) }}"
                                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-md">Editar</a>
                            <button onclick="confirmDelete({{ $a->id }})"
                                class="px-4 py-2 bg-orange-600 hover:bg-orange-700 rounded-md">Eliminar</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('user.create') }}"
            class="px-6 py-4 h-14 bg-green-600 hover:bg-green-700 rounded-md my-10">Agregar</a>
    </div>

    <script>
        function confirmDelete(id) {
            alertify.confirm("Seguro que desea Eliminar",
                function() {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/dashboard/user/${id}`
                    form.innerHTML = '@csrf @method('DELETE')';
                    document.body.appendChild(form);
                    form.submit();
                    alertify.success('Confirmado');
                },
                function() {
                    alertify.error('Cancelado');
                });
        }
    </script>
@endsection
