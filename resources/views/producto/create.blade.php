@extends('dashboard')
@section('info')
    <!-- resources/views/products/create.blade.php -->
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <label for="images">Imágenes del Producto:</label>
        <input type="file" name="images[]" id="images" multiple required>
    </div>
    <button type="submit">Guardar Producto</button>
</form>
@endsection
