<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function mostrarUsuarios(Request $request)
    {
        $query = DB::table('usuarios');

        if ($request->filled('id')) {
            $query->where('usuario_id', $request->input('id'));
        }

        if ($request->filled('nombre')) {
            $query->orWhere('nombre', 'LIKE', '%' . $request->input('nombre') . '%');
        }

        if ($request->filled('numero_identificacion')) {
            $query->orWhere('numero_identificacion', 'LIKE', '%' . $request->input('numero_identificacion') . '%');
        }

        $usuarios = $query->get();

        return view('consultas', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario' => 'required|max:255',
            'contrasena' => 'required',
            'correo' => 'required|email',
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_identificacion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_contrato' => 'required',
            'fecha_terminacion' => 'required',
            'rol_id' => 'required',
        ]);

        DB::table('usuarios')->insert([
            'usuario' => $validatedData['usuario'],
            'contrasena' => bcrypt($validatedData['contrasena']),
            'correo' => $validatedData['correo'],
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'numero_identificacion' => $validatedData['numero_identificacion'],
            'direccion' => $validatedData['direccion'],
            'telefono' => $validatedData['telefono'],
            'rol_id' => $validatedData['rol_id'],
            'fecha_contrato' => $validatedData['fecha_contrato'],
            'fecha_terminacion' => $validatedData['fecha_terminacion'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/consultas')->with('success', 'Usuario creado con éxito.');
    }
    public function edit($id)
    {
        $usuario = DB::table('usuarios')->where('usuario_id', $id)->first();
        return view('edit', compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        // Validar los datos entrantes
        $validatedData = $request->validate([
            'usuario' => 'required|max:255',
            'contrasena' => 'required',
            'email' => 'required|email',
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_identificacion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_contrato' => 'required',
            'fecha_terminacion' => 'required',
            'rol_id' => 'required',
            
        ]);
    
        // Actualizar el usuario en la base de datos
        DB::table('usuarios')
            ->where('usuario_id', $id)
            ->update([
                'usuario' => $validatedData['usuario'],
                'contrasena' => bcrypt($validatedData['contrasena']),
                'email' => $validatedData['email'],
                'nombre' => $validatedData['nombre'],
                'apellido' => $validatedData['apellido'],
                'numero_identificacion' => $validatedData['cedula'],
                'direccion' => $validatedData['direccion'],
                'telefono' => $validatedData['telefono'],
                'fecha_contrato' => $validatedData['fecha_contrato'],
                'fecha_terminacion' => $validatedData['fecha_terminacion'],
                'updated_at' => now(),
               
            ]);
    
        return redirect('/consultas')->with('success', 'Usuario actualizado correctamente.');
    }
    
    
    

    public function destroy($id)
    {
        DB::table('usuarios')->where('usuario_id', $id)->delete();
        return redirect('/consultas')->with('success', 'Usuario eliminado con éxito.');
    }
}
