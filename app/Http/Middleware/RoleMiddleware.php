<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Debes iniciar sesión.');
        }
        

        $user = Auth::user();  // Esto ahora hará referencia al modelo `Usuario`
        if (!in_array($user->rol_id, $roles)) {
            return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
        }

        return $next($request);
    }
}

