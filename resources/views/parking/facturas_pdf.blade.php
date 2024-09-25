<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Facturas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1 class="text-success">Reporte de Facturas</h1>
    <p>Fecha de reporte: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No. Factura</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Tiempo Prestado</th>
                <th>Empleado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
            <tr>
                <td>{{ $factura->no_factura }}</td>
                <td>{{ $factura->fecha_factura->format('d-m-Y H:i') }}</td>
                <td>{{ number_format($factura->valor, 2) }}</td>
                <td>{{ $factura->tiempo_prestado }} minutos</td>
                <td>{{ $factura->usuario->nombre }} {{ $factura->usuario->apellido }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
