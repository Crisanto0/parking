<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura PDF</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .invoice-container {
            padding: 20px;
        }
        .invoice-header {
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .invoice-details {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Factura</h1>
        </div>
        <div class="invoice-details">
            <p><strong>Número de Factura:</strong> {{ $factura->no_factura }}</p>
            <p><strong>Fecha de Factura:</strong> {{ $factura->fecha_factura }}</p>
            <p><strong>Código de Resolución:</strong> {{ $factura->codigo_resolucion }}</p>
            <p><strong>Valor Total:</strong> {{ $factura->valor }} ({{ $factura->tiempo_prestado }} minutos)</p>
            <p><strong>Valor por Fracción:</strong> {{ $factura->valor_fracion }}</p>
            <p><strong>Usuario:</strong> {{ $factura->usuario->nombre }}</p>
        </div>
    </div>
</body>
</html>
