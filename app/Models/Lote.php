<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_cultivo',
        'variedad',
        'cantidad_arboles',
        'area_lote',
        'fecha_creacion',
        'estado',
    ];
}
