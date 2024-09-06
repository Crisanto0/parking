@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Detalles del Propietario</h2>

    <div class="card">
        <div class="card-header">
            {{ $propietario->nombre }} {{ $propietario->apellido }}
        </div>
        <div class="card-body">
            <p><strong>Correo Electrónico:</strong> {{ $propietario->email }}</p>
            <p><strong>Teléfono:</strong> {{ $propietario->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $propietario->direccion }}</p>
            <p><strong>Tipo de Identificación:</strong> {{ $propietario->tipo_identificacion }}</p>
            <p><strong>Número de Identificación:</strong> {{ $propietario->numero_identificacion }}</p>
        </div>
    </div>

    <h3 class="mt-4">Vehículo(s) del Propietario</h3>

    @foreach($propietario->vehiculos as $vehiculo)
        <div class="card mt-2">
            <div class="card-body">
                <p><strong>Placa:</strong> {{ $vehiculo->placa }}</p>
                <p><strong>Marca:</strong> {{ $vehiculo->marca }}</p>
                <p><strong>Modelo:</strong> {{ $vehiculo->modelo }}</p>
                <p><strong>Tipo de Vehículo:</strong> {{ $vehiculo->tipo_vehiculo }}</p>
                <p><strong>Color:</strong> {{ $vehiculo->color }}</p>
            </div>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <a href="{{ route('propietarios.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
</div>
@endsection
