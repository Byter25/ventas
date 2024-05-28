<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'estado',
        'modelo',
        'color',
        'medida',
        'marca',
    ];
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'id_modelo');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color');
    }

    public function medidas()
    {
        return $this->belongsTo(Medida::class, 'id_medidas');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }
}
