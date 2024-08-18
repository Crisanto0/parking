<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;  // Asegúrate de que el modelo esté en el namespace correcto

class EmpleadoController extends Controller
{
    public function store(Request $request)
    {
        Usuario::create($request->all());

        return redirect()->route('registrarempleado')->with('success', 'Usuario creado con éxito');
    }
}
  