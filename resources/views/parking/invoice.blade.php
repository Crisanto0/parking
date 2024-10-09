@extends('layouts.app')

@section('content')
<style type="text/css" media="print">
    .invoice-container {
        border: none;
        padding: 0;
        border-radius: 0;
        box-shadow: none;
    }
    
    .no-print {
        display: none;
    }
</style>

    <h1 class="text-success">Factura</h1>

    <div class="invoice-container" style="border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
        <p><strong>Número de Factura:</strong> {{ $factura->no_factura }}</p>
        <p><strong>Fecha de Factura:</strong> {{ $factura->fecha_factura }}</p>
        <p><strong>Código de Resolución:</strong> {{ $factura->codigo_resolucion }}</p>
        <p><strong>Valor Total:</strong> {{ $factura->valor }} ({{ $factura->tiempo_prestado }} minutos)</p>
        <p><strong>Valor por Fracción:</strong> {{ $factura->valor_fracion }}</p>
        <p><strong>Empleado:</strong> {{ $factura->usuario->nombre }}  {{ $factura->usuario->apellido }}</p>


        @foreach($factura->parkings as $parking)
        <hr>
        <p><strong>Placa:</strong> {{ $parking->vehiculo->placa }}</p>
        <p><strong>Hora de Entrada:</strong> {{ $parking->fecha_hora_entrada }}</p>
        <p><strong>Hora de Salida:</strong> {{ $parking->fecha_hora_salida }}</p>
        <p><strong>Garaje:</strong> {{ $parking->garaje->descripcion }}</p>
    @endforeach

        <!-- Botones -->
        <a href="{{ route('parking.pdf', $factura->no_factura) }}" style="display: inline-block; margin-top: 10px; background-color: blue; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">
            Descargar PDF
        </a>

        <a href="{{ route('parking.print', $factura->no_factura) }}" style="display: inline-block; margin-top: 10px; background-color: green; color: white; padding: 10px; border-radius: 5px; text-decoration: none;" target="_blank">
            Imprimir Factura
        </a>

        <a href="{{ route('parking.index') }}" style="display: inline-block; margin-top: 10px; background-color: rgb(218, 50, 50); color: white; padding: 10px; border-radius: 5px; text-decoration: none;">
            Volver a Zonas de Parqueo
        </a>
    </div>
@endsection

