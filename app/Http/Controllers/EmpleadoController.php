<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;  // Asegúrate de que el modelo esté en el namespace correcto

class EmpleadoController extends Controller
{
    public function store(Request $request)
    {
        Usuario::create($request->all());

      

        return redirect()->route('inicio')->with('success', 'Cliente y vehiculos registrados con éxito');
    }

    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtener el valor de búsqueda
        $empleados = Usuario::where('nombre', 'like', "%{$search}%")
                            ->orWhere('numero_identificacion', 'like', "%{$search}%")
                            ->paginate(10); // Usar paginación si es necesario
    
        return view('empleados.index', compact('empleados'));
    }

    // Método para mostrar detalles de un empleado
    public function show($usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        return view('empleados.show', compact('empleado'));
    }

    // Método para mostrar el formulario de edición
    public function edit($usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        return view('empleados.edit', compact('empleado'));
    }

    // Método para actualizar la información del empleado
    public function update(Request $request, $usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    // Método para eliminar un empleado
    public function destroy($usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }

    // Método para cambiar el estado del empleado
    public function changeStatus($usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        $empleado->status = $empleado->status == 'activo' ? 'bloqueado' : 'activo';
        $empleado->save();
    
        // Asegúrate de pasar el parámetro correctamente
        return redirect()->route('empleados.show', ['usuario_id' => $usuario_id])->with('success', 'Estado del empleado actualizado correctamente');
    }
    
}
  