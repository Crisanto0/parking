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

    <h1>Factura</h1>

    <div class="invoice-container" style="border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
        <p><strong>Número de Factura:</strong> {{ $factura->no_factura }}</p>
        <p><strong>Fecha de Factura:</strong> {{ $factura->fecha_factura }}</p>
        <p><strong>Código de Resolución:</strong> {{ $factura->codigo_resolucion }}</p>
        <p><strong>Valor Total:</strong> {{ $factura->valor }} ({{ $factura->tiempo_prestado }} minutos)</p>
        <p><strong>Valor por Fracción:</strong> {{ $factura->valor_fracion }}</p>
        <p><strong>Usuario:</strong> {{ $factura->usuario->nombre }}</p>

        <!-- Botones -->
        <a href="{{ route('parking.pdf', $factura->no_factura) }}" style="display: inline-block; margin-top: 10px; background-color: blue; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">
            Descargar PDF
        </a>

        <a href="{{ route('parking.print', $factura->no_factura) }}" style="display: inline-block; margin-top: 10px; background-color: green; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">
            Imprimir Factura
        </a>

        <a href="{{ route('parking.index') }}" style="display: inline-block; margin-top: 10px; background-color: blue; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">
            Volver a Zonas de Parqueo
        </a>
    </div>
@endsection

