<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Modelo;
use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Schema;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = Schema::getColumnListing('productos');
        $columns = array_diff($columns, ['created_at', 'updated_at']);

        $data = Producto::with(['modelo', 'color', 'medidas', 'marca'])->get();
        return view('producto.index', compact('data', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Guardar los datos del producto en la base de datos
        $product = new Producto();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();

        // Manejar la subida de las imágenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public'); // Almacenar en el disco 'public'

                // Guardar la ruta de la imagen en la base de datos
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_path = $path;
                $productImage->save();
            }
        }

        return redirect()->route('products.index')->with('success', 'Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function showAll()
    {
        $data = Producto::with(['modelo', 'color', 'medidas', 'marca'])->get();
        return view('producto.show', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Producto::findOrFail($id);
        $modelos = Modelo::all();
        $colores = Color::all();
        $medidas = Medida::all();
        $marcas = Marca::all();
        return view('producto.edit', compact('data', 'modelos', 'colores', 'medidas', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
