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
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .invoice-container {
            background-color: #fff;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .invoice-details {
            margin-bottom: 10px;
            text-align: justify;
            margin-left: 200px;
            margin-right: auto;
            width: 80%; /* Ajusta el ancho según tus necesidades */
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
</head>
<body>
    <div class="invoice-container">
        <img src="assets/Logo.png" alt="Logo" style="width: 100px; height: 100px;">
        <div class="invoice-header">
            
            <h1>Factura</h1>
        </div>
        <div class="invoice-details">
            <p><strong>Número de Factura:</strong> {{ $factura->no_factura }}</p>
            <p><strong>Fecha de Factura:</strong> {{ $factura->fecha_factura }}</p>
            <p><strong>Resolución:</strong> {{ $factura->codigo_resolucion }}</p>
            <p><strong>Valor Total:</strong> {{ $factura->valor }} ({{ $factura->tiempo_prestado }} minutos)</p>
            <p><strong>Valor por Fracción:</strong> {{ $factura->valor_fracion }}</p>
            <p><strong>Empleado:</strong> {{ $factura->usuario->nombre }} {{ $factura->usuario->apellido }}</p>

            @foreach($factura->parkings as $parking)
                <hr>
                <p><strong>Plac:</strong> {{ $parking->vehiculo->placa }}</p>
                <p><strong>Hora de Entrada:</strong> {{ $parking->fecha_hora_entrada }}</p>
                <p><strong>Hora de Salida:</strong> {{ $parking->fecha_hora_salida }}</p>
                <p><strong>Garaje:</strong> {{ $parking->garaje->descripcion }}</p>
            @endforeach

            
        </div>
        <div class="invoice-footer">
            <p>Gracias por su preferencia</p>
        </div>
    </div>
</body>
</html>
