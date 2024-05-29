@extends('dashboard')
@section('info')
    <x-formEditar method="POST" inputLink="producto.update" :id="$data->id" exitLink="producto.index" >
        @method('PUT')
        @csrf
        <p>Descripicion</p>
        <input type="text" placeholder="Alexander Saavedra" name="descripicion" required autofocus
            value="{{ $data->descripcion }}">

        <p>Precio</p>
        <input type="number" placeholder="juanito1234" name="precio" required
            value="{{ $data->precio }}">
        @error('precio')
            <span class="text-red-600 py-2 px-4">{{ $message }}</span>
        @enderror

        <p>Estado</p>
        <select name="estado" id="estado">
            <option value="0"  @if ($data->estado==0) selected @endif>vendido</option>
            <option value="1" @if ($data->estado==1) selected @endif>venta</option>
        </select>

        <p>Modelo</p>
        <select name="id_modelo" id="modelo">
            @foreach ($modelos as $m )
                <option value="{{$m->id}}" {{$data->id_modelo == $m->id ? 'selected' : ''}}>{{$m->nombre}}</option>
            @endforeach
        </select>

        <p>Color</p>
        <select name="id_color" id="color">
            @foreach ($colores as $c )
                <option value="{{$c->id}}" {{$data->id_color == $c->id ? 'selected' : ''}}>{{$c->nombre}}</option>
            @endforeach
        </select>

        <p>Medidas</p>
        <select name="id_medidas" id="medidias">
            @foreach ($medidas as $m )
                <option value="{{$m->id}}" {{$data->id_medidas == $m->id ? 'selected' : ''}}>{{$m->alto}}m x {{$m->ancho}}m x {{$m->fondo}}m</option>
            @endforeach
        </select>

        <p>Marca</p>
        <select name="id_medidas" id="medidias">
            @foreach ($marcas as $m )
                <option value="{{$m->id}}" {{$data->id_marca == $m->id ? 'selected' : ''}}>{{$m->nombre}}</option>
            @endforeach
        </select>
    </x-formEditar>
@endsection
