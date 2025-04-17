<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterTrabajadorController extends Controller
{
    public function showForm()
    {
        return view('trabajador.register_trabajador');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'trabajador',
        ]);

        // 🔹 Redirigir al dashboard y pasar la información de los trabajadores
        return redirect()->route('admin.dashboard')->with('success', 'Trabajador registrado exitosamente.');
    }
}
