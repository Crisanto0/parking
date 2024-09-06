<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

        // Obtener el usuario desde la base de datos
        $user = DB::table('usuarios')->where('usuario', $request->input('usuario'))->first();

        // Verificar si el usuario existe y si está bloqueado
        if ($user && $user->status === 'bloqueado') {
            return back()->with('error', 'Tu cuenta está bloqueada. Contacta al administrador.');
        }

        // Preparar las credenciales para la autenticación
        $credentials = [
            'usuario' => $request->input('usuario'),
            'password' => $request->input('contrasena'),
        ];

        // Intentar iniciar sesión con las credenciales
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirige según el rol
            return redirect()->intended('/inicio');
        } else {
            // Autenticación fallida
            return back()->with('error', 'Credenciales incorrectas');
        }
    }
}
