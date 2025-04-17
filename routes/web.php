<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterTrabajadorController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Trabajador\DashboardController as TrabajadorDashboardController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\LoteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de administrador
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Rutas de trabajador
Route::prefix('trabajador')->middleware(['auth', 'role:trabajador'])->group(function () {
    Route::get('/dashboard', [TrabajadorDashboardController::class, 'index'])->name('trabajador.dashboard');
});

Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');
Route::put('/inventario/{id}', [InventarioController::class, 'update'])->name('inventario.update');
Route::delete('/inventario/{id}', [InventarioController::class, 'destroy'])->name('inventario.destroy');

// Ruta para obtener datos del inventario para el dashboard
Route::get('/api/inventario-data', [InventarioController::class, 'getData'])->name('api.inventario.data');


// Mostrar el formulario
Route::get('/trabajador/registro', [RegisterTrabajadorController::class, 'showForm'])->name('register.trabajador.form');

// Procesar el formulario
Route::post('/trabajador/registro', [RegisterTrabajadorController::class, 'register'])->name('register.trabajador');


Route::get('/lote/registro', [LoteController::class, 'create'])->name('register.lote.form');
Route::post('/register-lote', [LoteController::class, 'store'])->name('register.lote');





