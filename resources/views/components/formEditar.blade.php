<style>
    form p{
        grid-column-start: 1;
        text-align: right;
        padding: 5px 0;
        text-transform: uppercase;
        font-weight: bold;
    }
    form input{
        background: white;
        padding: 5px;
        border-radius: 5px;
    }
</style>
    <form method="POST" action="{{ route($inputLink, $id) }}" class="grid grid-cols-3 gap-5">
        @method('PUT')
        @csrf
        {{ $slot }}
        <a href="{{ route($exitLink) }}"
            class="col-start-1 font-bold px-4 py-2 rounded-md hover:bg-gray-300 max-w-40 ml-auto  uppercase">Cancelar</a>
        <button type="submit"
            class="col-start-2 col-span-2 font-bold px-4 py-2 bg-green-500 rounded-md hover:bg-green-600  text-white uppercase">Guardar</button>
    </form>
