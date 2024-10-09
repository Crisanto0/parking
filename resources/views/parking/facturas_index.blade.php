@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-success">Listado de Facturas</h1>

    <!-- Contenedor para alinear el botón a la derecha -->
    

    <!-- Formulario de búsqueda -->
    <form action="{{ route('facturas.index') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="dia">Día</label>
                <input type="number" name="dia" class="form-control" value="{{ request('dia') }}">
            </div>
            <div class="col-md-3">
                <label for="mes">Mes</label>
                <input type="number" name="mes" class="form-control" value="{{ request('mes') }}">
            </div>
            <div class="col-md-3">
                <label for="anio">Año</label>
                <input type="number" name="anio" class="form-control" value="{{ request('anio') }}">
            </div>
            <div class="col-md-3 mt-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-start mb-3">
        <form action="{{ route('facturas.reporte') }}" method="GET">
            <input type="hidden" name="dia" value="{{ request('dia') }}">
            <input type="hidden" name="mes" value="{{ request('mes') }}">
            <input type="hidden" name="anio" value="{{ request('anio') }}">
            <button type="submit" class="btn btn-danger">Reporte PDF</button>
        </form>
    </div>

    <!-- Tabla de facturas -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No. Factura</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Tiempo Prestado</th>
                <th>Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($facturas as $factura)
                <tr>
                    <td>{{ $factura->no_factura }}</td>
                    <td>{{ $factura->fecha_factura->format('d-m-Y H:i') }}</td>
                    <td>{{ number_format($factura->valor, 2) }}</td>
                    <td>{{ $factura->tiempo_prestado }} minutos</td>
                    <td>{{ $factura->usuario->nombre }} {{ $factura->usuario->apellido }}</td>
                    <td>
                        <a href="{{ route('parking.print', $factura->no_factura) }}" class="btn btn-info" target="_blank">Ver</a>
                        <a href="{{ route('parking.pdf', $factura->no_factura) }}" class="btn btn-primary">Descargar PDF</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No se encontraron facturas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $facturas->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
