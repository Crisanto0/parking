<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;  // Asegúrate de que el modelo esté en el namespace correcto

class EmpleadoController extends Controller
{

    public function store(Request $request)
    {
        // Validar los campos
        $request->validate([
            'telefono' => 'required|digits:10|numeric',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'direccion' => 'nullable|string|max:255',
            'tipo_identificacion' => 'required|string|max:255',
            'numero_identificacion' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'tipo_contrato' => 'required|in:Indefinido,Temporal,Por obra',
            'rol_id' => 'required|in:1,2',
            'horario' => 'required|string|max:255',
            'fecha_contrato' => 'required|date',
            'fecha_terminacion' => 'required|date|after_or_equal:fecha_contrato',
            'usuario' => 'required|numeric',
            'contrasena' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',       // Al menos una letra minúscula
                'regex:/[A-Z]/',       // Al menos una letra mayúscula
                'regex:/[0-9]/',       // Al menos un número
                'regex:/[@$!%*?&]/'    // Al menos un carácter especial
            ],
        ], [
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'telefono.numeric' => 'El teléfono solo puede contener números.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'email.email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'contrasena.regex' => 'La contraseña debe tener al menos una letra minúscula, una letra mayúscula, un número y un carácter especial.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'usuario.numeric' => 'El campo usuario solo puede conterener el numero de identificación.',
        ]);
    
        // Crear el empleado si la validación es exitosa
        Usuario::create($request->all());
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('registrar_empleado')->with('success', 'Empleado registrado con éxito');
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
  