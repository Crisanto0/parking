<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        // Obtener los datos del usuario
        $usuario = $request->input('usuario');
        $contrasena = $request->input('contrasena');

        // Consultar el usuario en la base de datos
        $user = DB::table('usuarios')->where('usuario', $usuario)->first();

        if ($user && Hash::check($contrasena, $user->contrasena)) {
            // Si las credenciales son correctas
            return redirect()->intended('/inicio');
        }
         else {
            // Si las credenciales son incorrectas
            return back()->with('error', 'Datos erróneos');
        }
    }
}