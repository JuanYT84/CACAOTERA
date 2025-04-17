<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 Últimos 5 trabajadores registrados
        $trabajadores = User::where('role', 'trabajador')->latest()->take(5)->get();
    
        // 🔹 Últimos 5 lotes registrados
        $lotes = \App\Models\Lote::latest()->take(5)->get();
    
        return view('admin.dashboard', compact('trabajadores', 'lotes'));
    }
    
}
