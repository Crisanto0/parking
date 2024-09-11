<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Models\Vehiculo;

class PropietarioController extends Controller
{
    public function store(StoreRequest $request)
{
    $propietario = Propietario::create($request->all());

    Vehiculo::create([
        'placa' => $request->placa,
        'marca' => $request->marca,
        'modelo' => $request->modelo,
        'propietario_id' => $propietario->propietario_id,
        'tipo_vehiculo' => $request->tipo_vehiculo,
        'color' => $request->color,
    ]);

    return redirect()->route('registrarclientes')->with('success', 'Cliente y vehículo registrados con éxito');
}
    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtener el valor de búsqueda
        $propietarios = Propietario::where('nombre', 'like', "%{$search}%")
                            ->orWhere('numero_identificacion', 'like', "%{$search}%")
                            ->paginate(10); // Usar paginación si es necesario
    
        return view('propietarios.index', compact('propietarios'));
    }

    // Método para mostrar detalles de un propietario y sus vehículos
    public function show($propietario_id)
{
    // Buscamos al propietario por su ID y cargamos sus vehículos
    $propietario = Propietario::with('vehiculos')->findOrFail($propietario_id);
    return view('propietarios.show', compact('propietario'));
}

public function edit($propietario_id)
{
    $propietario = Propietario::with('vehiculos')->findOrFail($propietario_id);
    return view('propietarios.edit', compact('propietario'));
}

public function update(StoreRequest $request, $propietario_id)
{
  
    // Validamos los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'tipo_identificacion' => 'required|string|max:255',
        'numero_identificacion' => 'required|string|max:255',
        'placa' => 'required|string|max:255',
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:255',
        'tipo_vehiculo' => 'required|string|max:255',
        'color' => 'required|string|max:255',
    ]);

    // Buscamos al propietario por su ID
    $propietario = Propietario::findOrFail($propietario_id);
    
    // Actualizamos los datos del propietario
    $propietario->update($request->only(['nombre', 'apellido', 'tipo_identificacion', 'numero_identificacion']));
    
    // Buscamos y actualizamos los datos del vehículo
    $vehiculo = Vehiculo::where('propietario_id', $propietario_id)->firstOrFail();
    $vehiculo->update($request->only(['placa', 'marca', 'modelo', 'tipo_vehiculo', 'color']));

    return redirect()->route('propietarios.edit', ['propietario_id' => $propietario_id])->with('success', 'Propietario y vehículo actualizados con éxito');

}


// Método para eliminar un empleado
public function destroy($propietario_id)
{
    $propietario = Propietario::findOrFail($propietario_id);
    $propietario->delete();
    return redirect()->route('propietarios.index')->with('success', 'cliente eliminado correctamente');
}

}



