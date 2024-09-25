@extends('layouts.app')

@section('content')
<h1 class="text-center text-success">Detalles de la Zona de Parqueo</h1>


    <div class="zona-card" style="border: 1px solid #ddd; padding: 20px; width: 100%; max-width: 800px; border-radius: 10px; margin: 0 auto;">
        <h3>{{ $garaje->descripcion }}</h3>
        <p><strong>Estado:</strong> {{ $garaje->estado->descripcion }}</p>
        

        @if ($garaje->parking->isNotEmpty())
        @php
            // Obtener el último registro de la colección
            $ultimoParking = $garaje->parking->last();
        @endphp
        
        <h4><strong>vehículo en este garaje:</strong></h4>
        <p>
            Placa: {{ $ultimoParking->placa }} <br>
            Entrada: {{ $ultimoParking->fecha_hora_entrada }} <br>
            @if ($ultimoParking->vehiculo)
                Vehículo: {{ $ultimoParking->vehiculo->marca }} {{ $ultimoParking->vehiculo->modelo }} - {{ $ultimoParking->vehiculo->color }}
                 {{-- Mostrar información del propietario si existe --}}
            @if ($ultimoParking->vehiculo->propietario)
            <h4><strong>Propietario del vehículo:</strong></h4>
            Nombre: {{ $ultimoParking->vehiculo->propietario->nombre }} {{ $ultimoParking->vehiculo->propietario->apellido }} <br>

            Dirección: {{ $ultimoParking->vehiculo->propietario->direccion }} <br>
            Teléfono: {{ $ultimoParking->vehiculo->propietario->telefono }} <br>

            <div class="mt-3">
                <a href="{{ route('propietarios.show', $ultimoParking->vehiculo->propietario->propietario_id) }}" class="btn btn-primary">Más sobre este propietario</a>
                <a href="{{ route('parking.index') }}" class="btn btn-success">Aceptar</a>
            </div>
        @else
            <p>Propietario no disponible.</p>
        @endif
            @else
                Información del vehículo no disponible.
            @endif
        </p>
    @else
        <p>Este garaje no tiene vehículos ocupando actualmente.</p>
    @endif
    
    </div>
@endsection
