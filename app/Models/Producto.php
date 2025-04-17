<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',       
        'tipo_insumo',  
        'cantidad',     
        'estado'       
    ];

    public function updateStatus()
    {
        
        $this->estado = $this->cantidad > 100 ? 'Óptimo' : 'Bajo';
        $this->save();
    }
}