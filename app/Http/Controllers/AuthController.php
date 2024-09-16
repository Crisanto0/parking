<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        // Destruir la sesión actual
       
        session()->regenerateToken(); // Regenera el token CSRF para mayor seguridad

        return view('login'); // Mostrar la vista de login
    }
    
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
            'contrasena' => $request->input('contrasena'),
        ];
        
        $user = DB::table('usuarios')->where('usuario', $request->input('usuario'))->first();
        
        // Verificar si la contraseña es correcta
        if ($user && Hash::check($request->input('contrasena'), $user->contrasena)) {
            Auth::loginUsingId($user->usuario_id); // Autenticar manualmente al usuario
            return redirect()->intended('/inicio');
        } else {
            return back()->with('error', 'Credenciales incorrectas');
        }
    }  
    
    
}
