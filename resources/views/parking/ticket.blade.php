<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Entrada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .ticket {
            width: 300px;
            margin: auto;
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
        }
        .ticket h1 {
            font-size: 18px;
        }
        .ticket p {
            margin: 5px 0;
        }
        /* Estilo de la imagen */
        .ticket img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
  
    <div class="ticket">
        <!-- Inserción del logo -->
        <img src="assets/Logo.png" alt="Logo">

        <h1>Ticket de Entrada</h1>
        <h3>{{ $garaje->descripcion }}</h3>
        <p><strong>Estado:</strong> {{ $garaje->estado->descripcion }}</p>

        @if ($ultimoParking)
            <h4><strong>Vehículo en este garaje:</strong></h4>
            <p>
                Placa: {{ $ultimoParking->placa }} <br>
                Entrada: {{ $ultimoParking->fecha_hora_entrada->format('d/m/Y H:i') }} <br>
                @if ($ultimoParking->vehiculo)
                    Vehículo: {{ $ultimoParking->vehiculo->marca }} {{ $ultimoParking->vehiculo->modelo }} - {{ $ultimoParking->vehiculo->color }}
                    @if ($ultimoParking->vehiculo->propietario)
                        <h4><strong>Propietario del vehículo:</strong></h4>
                        Nombre: {{ $ultimoParking->vehiculo->propietario->nombre }} {{ $ultimoParking->vehiculo->propietario->apellido }} <br>
                    @endif
                @endif
            </p>
        @endif
    </div>
</body>
</html>


