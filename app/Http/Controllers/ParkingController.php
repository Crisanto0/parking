<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Garaje;
use App\Models\Parking;
use App\Models\Factura;
use App\Models\Estado;
use App\Models\Vehiculo; // Asegúrate de importar el modelo Vehiculo
use Carbon\Carbon;

class ParkingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtener el término de búsqueda
        
        // Filtrar las zonas de parqueo basadas en la búsqueda
        $garajes = Garaje::with('estado')
                         ->when($search, function ($query, $search) {
                             return $query->where(function($q) use ($search) {
                                 $q->where('descripcion', 'like', "%{$search}%")
                                   ->orWhereHas('estado', function($q) use ($search) {
                                       $q->where('descripcion', 'like', "%{$search}%");
                                   });
                             });
                         })
                         ->get();
        
        $vehiculos = Vehiculo::with('propietario')->get(); // Cargar los vehículos con los propietarios
        
        return view('parking.index', compact('garajes', 'vehiculos', 'search'));
    }
    
    public function assign(Request $request)
    {
        $request->validate([
            'garaje_id' => 'required|exists:garaje,id_garaje',
            'placa' => 'required|exists:vehiculos,placa',
            'tarifa_por_minuto' => 'required|numeric|min:0',
        ]);
    
        $garaje = Garaje::findOrFail($request->garaje_id);
        $vehiculo = Vehiculo::where('placa', $request->placa)->firstOrFail();
    
        // Verificar si hay una transacción de parqueo abierta para este garaje
        $transaccionAnterior = Parking::where('Garaje_id_garaje', $garaje->id_garaje)
                                      ->whereNull('fecha_hora_salida')
                                      ->first();
    
        if ($transaccionAnterior) {
            // Cerrar la transacción anterior si existe
            $transaccionAnterior->fecha_hora_salida = Carbon::now();
            $transaccionAnterior->save();
        }
    
        // Crear la nueva transacción de parqueo
        Parking::create([
            'Garaje_id_garaje' => $garaje->id_garaje,
            'placa' => $vehiculo->placa,
            'fecha_hora_entrada' => Carbon::now(),
            'factura_no_factura' => null,
            'tarifa_por_minuto' => $request->tarifa_por_minuto,
        ]);
    
        $garaje->estados_estado_id = 2; // Cambiar a 'Ocupado'
        $garaje->save();
    
        return redirect()->route('parking.index')->with('success', 'Zona asignada correctamente');
    }
    
    
    // Si la zona no está disponible, redirigir con un error
   




public function unassign(Request $request, $garaje_id)
{
    // Buscar el garaje por ID
    $garaje = Garaje::findOrFail($garaje_id);

    // Obtener la transacción de parqueo activa para este garaje
    $transaccion = Parking::where('Garaje_id_garaje', $garaje->id_garaje)
                           ->whereNull('fecha_hora_salida')
                           ->firstOrFail();

    // Desasignar la zona
    $transaccion->fecha_hora_salida = Carbon::now();

    // Calcular el tiempo prestado en minutos
    $tiempoPrestado = abs($transaccion->fecha_hora_salida->diffInMinutes($transaccion->fecha_hora_entrada));

    $tiempoPrestado = round($tiempoPrestado);

    // Log para depuración
    \Log::info('Fecha y hora de entrada: ' . $transaccion->fecha_hora_entrada);
    \Log::info('Fecha y hora de salida: ' . $transaccion->fecha_hora_salida);
    \Log::info('Tiempo prestado en minutos: ' . $tiempoPrestado);

    // Si el tiempo prestado es 0, no crear la factura
    if ($tiempoPrestado <= 0) {
        return redirect()->route('parking.index')->with('error', 'El tiempo prestado no puede ser 0.');
    }
    $tarifaPorMinuto = $transaccion->tarifa_por_minuto;
    $valor = $tiempoPrestado * $tarifaPorMinuto;

    // Crear la factura
    $factura = Factura::create([
        'fecha_factura' => Carbon::now(),
        'codigo_resolucion' => 'RES12345',
        'valor' => $valor,
        'tiempo_prestado' => $tiempoPrestado,
        'valor_fracion' => $tarifaPorMinuto,
        'usuarios_usuario_id' => auth()->user()->usuario_id,
    ]);

    // Actualizar la transacción con la referencia a la factura
    $transaccion->factura_no_factura = $factura->no_factura;
    $transaccion->save();

    // Cambiar el estado del garaje a disponible nuevamente
    $garaje->estados_estado_id = 1; // Asegúrate de que el ID 1 corresponde a 'disponible'
    $garaje->save(); // Guardar el cambio en la base de datos
 

    

    return redirect()->route('parking.invoice', ['no_factura' => $factura->no_factura]);
}



public function showInvoice($no_factura)
{
    // Cargar la factura junto con el usuario relacionado
    $factura = Factura::with('usuario')->where('no_factura', $no_factura)->firstOrFail();
    $transaccion = Parking::where('factura_no_factura', $no_factura)->firstOrFail();

    return view('parking.invoice', compact('factura', 'transaccion'));
}

public function create()
{
    return view('parking.create');
}

public function store(Request $request)
{
    // Validar los datos
    $request->validate([
        'descripcion' => 'required|string|max:255',
        'estados_estado_id' => 'required|string|in:1,2',
    ]);

    // Crear una nueva zona de parqueo
    Garaje::create([
        
        'descripcion' => $request->descripcion,
        'estados_estado_id' => $request->estados_estado_id,
    ]);

    return redirect()->route('parking.create')->with('success', 'Zona de parqueo registrada exitosamente.');
}

public function show($garaje_id)
{
    $garaje = Garaje::with(['estado', 'parking.vehiculo'])->findOrFail($garaje_id);

    return view('parking.show', compact('garaje'));
}

public function downloadInvoicePdf($no_factura)
{
    $factura = Factura::with(['usuario', 'parkings.vehiculo', 'parkings.garaje'])
                      ->where('no_factura', $no_factura)
                      ->firstOrFail();

    // Generar el PDF usando la vista 'parking.invoice_pdf'
    $pdf = PDF::loadView('parking.invoice_pdf', compact('factura'));

    // Descargar el archivo PDF
    return $pdf->download('factura_' . $factura->no_factura . '.pdf');
}


public function printInvoice($no_factura)
{
    // Cargar la factura junto con el usuario relacionado
    $factura = Factura::with(['usuario', 'parkings.vehiculo', 'parkings.garaje'])
                      ->where('no_factura', $no_factura)
                      ->firstOrFail();

    // Generar el PDF usando la vista 'parking.invoice_pdf'
    $pdf = PDF::loadView('parking.invoice_pdf', compact('factura'));

    // Mostrar el archivo PDF en el navegador
    return $pdf->stream('factura_' . $factura->no_factura . '.pdf');
}


public function facturasIndex(Request $request)
{
    // Obtener los parámetros de búsqueda (día, mes, año)
    $dia = $request->input('dia');
    $mes = $request->input('mes');
    $anio = $request->input('anio');

    // Consulta básica de facturas
    $facturas = Factura::query();

    // Filtrar por día
    if ($dia) {
        $facturas->whereDay('fecha_factura', $dia);
    }

    // Filtrar por mes
    if ($mes) {
        $facturas->whereMonth('fecha_factura', $mes);
    }

    // Filtrar por año
    if ($anio) {
        $facturas->whereYear('fecha_factura', $anio);
    }

    // Obtener las facturas filtradas
    $facturas = $facturas->paginate(10);
    $facturas->appends([
        'dia' => $dia,
        'mes' => $mes,
        'anio' => $anio,
    ]);

    return view('parking.facturas_index', compact('facturas', 'dia', 'mes', 'anio'));
}

public function downloadReportPdf(Request $request)
{
    // Obtener los parámetros de búsqueda (día, mes, año)
    $dia = $request->input('dia');
    $mes = $request->input('mes');
    $anio = $request->input('anio');

    // Consulta básica de facturas
    $facturas = Factura::query();

    // Filtrar por día
    if ($dia) {
        $facturas->whereDay('fecha_factura', $dia);
    }

    // Filtrar por mes
    if ($mes) {
        $facturas->whereMonth('fecha_factura', $mes);
    }

    // Filtrar por año
    if ($anio) {
        $facturas->whereYear('fecha_factura', $anio);
    }

    // Obtener las facturas filtradas
    $facturas = $facturas->get();

    // Generar el PDF usando la vista creada 'facturas_pdf'
    $pdf = PDF::loadView('parking.facturas_pdf', compact('facturas'));

    // Descargar el PDF
    return $pdf->download('reporte_facturas_' . now()->format('d-m-Y') . '.pdf');
}

public function manageZones(Request $request)
{
    $search = $request->input('search');

    $garajes = Garaje::with('estado')
        ->when($search, function($query, $search) {
            return $query->where('descripcion', 'like', "%{$search}%");
        })
        ->paginate(10);

    return view('parking.manage_zones', compact('garajes', 'search'));
}


public function block($id_garaje)
{
    $garaje = Garaje::findOrFail($id_garaje);
    $garaje->estados_estado_id = 3; // Estado de bloqueado
    $garaje->save();

    return redirect()->route('parking.manage_zones')->with('success', 'Zona bloqueada correctamente.');
}


public function activate($id_garaje)
{
    $garaje = Garaje::findOrFail($id_garaje);
    $garaje->estados_estado_id = 1; // Estado de disponible
    $garaje->save();

    return redirect()->route('parking.manage_zones')->with('success', 'Zona activada correctamente.');
}


public function delete($id_garaje)
{
    $garaje = Garaje::findOrFail($id_garaje);
    $garaje->delete();

    return redirect()->route('parking.manage_zones')->with('success', 'Zona eliminada correctamente.');
}

public function edit($id_garaje)
{
    $garaje = Garaje::findOrFail($id_garaje);
    $estados = Estado::all(); // Obtener todos los estados disponibles

    return view('parking.edit', compact('garaje', 'estados'));
}

public function update(Request $request, $id_garaje)
{
    // Validar los datos
    $request->validate([
        'descripcion' => 'required|string|max:255',
        'estados_estado_id' => 'required|integer|exists:estados,estado_id', // Asegúrate de que el ID del estado exista en la tabla de estados
    ]);

    // Buscar el garaje por ID
    $garaje = Garaje::findOrFail($id_garaje);

    // Actualizar los datos del garaje
    $garaje->update([
        'descripcion' => $request->descripcion,
        'estados_estado_id' => $request->estados_estado_id,
    ]);

    return redirect()->route('parking.manage_zones')->with('success', 'Zona actualizada correctamente.');
}



public function generarTicket($id_garaje)
{
    // Obtener la información del garaje y las relaciones asociadas
    $garaje = Garaje::with(['estado', 'parking.vehiculo.propietario'])->find($id_garaje);
    
    // Obtener el último parking asociado al garaje, si existe
    $ultimoParking = $garaje->parking->last(); // Obtener el último registro de parking
    
    // Preparar los datos para la vista del ticket
    $data = [
        'garaje' => $garaje,
        'ultimoParking' => $ultimoParking
    ];

    // Generar el PDF con la vista del ticket
    $pdf = PDF::loadView('parking.ticket', $data);

    // Descargar el PDF como ticket
    return $pdf->download('ticket_garaje_' . $garaje->id_garaje . '.pdf');
}

}


