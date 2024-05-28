<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Modelo;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class DatosPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $marca = Marca::create(['nombre' => 'generico']);
        // $color = Color::create(['nombre' => 'rojo']);
        // $categoria = Categoria::create(['nombre' => 'sala']);
        // $tipo = Tipo::create(['nombre' => 'ropero', 'id_categoria' => 1]);
        // $modelo = Modelo::create(['nombre' => '2 puertas', 'id_tipo' => 1]);
        $medida = Medida::create(['ancho' => 1.50, 'alto' => 1.80, 'fondo' => 0.30]);
        $producto = Producto::create(['descripcion' => 'producto prueba',
                                        'precio' => 120.50,
                                        'estado' => 1,
                                        'id_modelo' => 1,
                                        'id_color' => 1,
                                        'id_medidas' => 1,
                                        'id_marca' => 1]);
    }
}
