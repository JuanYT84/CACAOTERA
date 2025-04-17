<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Lote::latest()->get(); // Obtener todos los lotes
        return view('layouts.master', compact('lotes')); // Enviar lotes a la vista
    }

    public function create()
    {
        return view('lotes.register_lote'); // Debes tener esta vista en resources/views/lotes/register_lote.blade.php
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_cultivo'   => 'required|string|max:255',
            'variedad'         => 'required|string|max:255',
            'cantidad_arboles' => 'required|integer',
            'area_lote'        => 'required|numeric',
            'fecha_creacion'   => 'required|date',
            'estado'           => 'required|in:activo,inactivo,sembrado',
        ]);
    
        // Asegúrate de tener definido el atributo $fillable en tu modelo Lote.
        Lote::create($validated);
    
        return response()->json(['success' => true]);
    }
    

    public function getData()
    {
        $lotes = Lote::all(); // Obtener todos los lotes
        return response()->json($lotes);
    }
}
