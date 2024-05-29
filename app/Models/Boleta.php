<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boleta extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','id_producto','cantidad','precio_total',];
}
