<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
            'correo' => 'required|email|max:255',
            'direccion' => 'nullable|string|max:255',
            'tipo_identificacion' => 'required|string|max:255',
            'numero_identificacion' => 'required|numeric',
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
                'regex:/[@$!%*?&#]/'    // Al menos un carácter especial
            ],
        ], [
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'telefono.numeric' => 'El teléfono solo puede contener números.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'email.email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'contrasena.regex' => 'La contraseña debe tener al menos una letra minúscula, una letra mayúscula, un número y un carácter especial.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'usuario.numeric' => 'El campo usuario solo puede conterener el numero de identificación.',
            'numero_identificacion.numeric' => 'El campo numero de identificación solo puede conter numeros.',
        ]);
    
        // Crear el empleado si la validación es exitosa
        Usuario::create($request->all());
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('registrarempleado')->with('success', 'Empleado registrado con éxito');
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
        $request->validate([
            'telefono' => 'required|digits:10|numeric',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'direccion' => 'nullable|string|max:255',
            'tipo_identificacion' => 'required|string|max:255',
         
            'salario' => 'required|numeric|min:0',
            'tipo_contrato' => 'required|in:Indefinido,Temporal,Por obra',
            'rol_id' => 'required|in:1,2',
            'horario' => 'required|string|max:255',
            'fecha_contrato' => 'required|date',
            'fecha_terminacion' => 'required|date|after_or_equal:fecha_contrato',
            'usuario' => 'required|numeric',
           
        ], [
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'telefono.numeric' => 'El teléfono solo puede contener números.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'email.email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'usuario.numeric' => 'El campo usuario solo puede conterener el numero de identificación.',
            'numero_identificacion.numeric' => 'El campo numero de identificación solo puede conter numeros.',
        ]);
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
    
    public function showProfile($usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        return view('empleados.profile', compact('empleado'));
    }
    public function editProfile($usuario_id)
    {
        $empleado = Usuario::findOrFail($usuario_id);
        return view('empleados.editProfile', compact('empleado'));
    }
    public function showChangePasswordForm($usuario_id)
    {
        $empleado = Usuario::find($usuario_id);
        return view('empleados.changePassword', compact('empleado'));
    }
    public function updateProfile(Request $request, $usuario_id)
    {
        // Validar los datos del perfil
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios,correo,' . $usuario_id . ',usuario_id',
            'telefono' => 'required|digits:10|numeric',
            'direccion' => 'nullable|string|max:255',
            'palabra_seguridad'=>'required|string|max:255'
        ]);

        // Actualizar el perfil
        $empleado = Usuario::findOrFail($usuario_id);
        $empleado->update($request->all());

        return redirect()->route('empleados.profile', ['usuario_id' => $usuario_id])
                        ->with('success', 'Perfil actualizado correctamente.');
    }   

    

public function changePassword(Request $request, $usuario_id)
{
    // Validar los datos de la contraseña
    $request->validate([
        'current_contrasena' => 'required',
        'contrasena' => ['required', 'confirmed', 'min:8',
            'regex:/[a-z]/',       // Al menos una letra minúscula
            'regex:/[A-Z]/',       // Al menos una letra mayúscula
            'regex:/[0-9]/',       // Al menos un número
            'regex:/[@$!%*?&]/'    // Al menos un carácter especial
        ],
    ], [
        'contrasena.regex' => 'La nueva contraseña debe contener al menos una letra minúscula, una mayúscula, un número y un carácter especial.',
        'current_contrasena.required'=> 'El campo contraseña actual es obligatoria',
        'contrasena.required' => 'El campo nueva contraseña es obligatorio',
        'contrasena.confirmed' => 'Las contraseñas no coinciden'

    ]);

    // Verificar si la contraseña actual es correcta
    $empleado = Usuario::findOrFail($usuario_id);
    if (!Hash::check($request->input('current_contrasena'), $empleado-> contrasena)) {
        return back()->withErrors(['current_contrasena' => 'La contraseña actual no es correcta.']);
    }

    // Cambiar la contraseña
    $empleado->update($request->all());

    return redirect()->route('empleados.profile', ['usuario_id' => $usuario_id])
                     ->with('success', 'Contraseña actualizada correctamente.');
}

public function showPasswordResetForm()
{
    return view('password.verify');
}

public function verifySecurityWord(Request $request)
{
    // Validar los campos
    $request->validate([
        'usuario' => 'required|string',
        'palabra_seguridad' => 'required|string',
    ]);

    // Buscar al usuario por el nombre de usuario
    $empleado = Usuario::where('usuario', $request->input('usuario'))->first();

    if (!$empleado || !Hash::check($request->input('palabra_seguridad'), $empleado->palabra_seguridad)) {
        return back()->withErrors(['palabra_seguridad' => 'La palabra de seguridad o el usuario no son correctos.']);
    }

    // Redirigir al formulario de cambio de contraseña
    return redirect()->route('password.change', ['usuario_id' => $empleado->usuario_id]);
}

public function showChangePasswordForm1($usuario_id)
    {
        $empleado = Usuario::find($usuario_id);
        return view('password.changePassword', compact('empleado'));
    }
    public function changePassword1(Request $request, $usuario_id)
    {
        // Validar la nueva contraseña
        $request->validate([
            'contrasena' => ['required', 'confirmed', 'min:8',
                'regex:/[a-z]/',       // Al menos una letra minúscula
                'regex:/[A-Z]/',       // Al menos una letra mayúscula
                'regex:/[0-9]/',       // Al menos un número
                'regex:/[@$!%*?&]/'    // Al menos un carácter especial
            ],
        ], [
            'contrasena.regex' => 'La nueva contraseña debe contener al menos una letra minúscula, una mayúscula, un número y un carácter especial.',
            'contrasena.required' => 'El campo nueva contraseña es obligatorio',
            'contrasena.confirmed' => 'Las contraseñas no coinciden'
    

        ]);
    
        // Cambiar la contraseña
        $empleado = Usuario::findOrFail($usuario_id);
        $empleado->update($request->all());
        return redirect()->route('login', )
                         ->with('success', 'Contraseña actualizada correctamente.');
    }
    
}
  