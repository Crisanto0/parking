@extends('layouts.app')

@section('content')
    <h1>Perfil</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="card" >
    <h5 class="card-title">Información Personal</h5>
    <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $empleado->apellido }}</p>
    <p><strong>Correo:</strong> {{ $empleado->correo }}</p>
    <p><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $empleado->direccion }}</p>

    <h5 class="card-title mt-4">Información de Identificación</h5>
    <p><strong>Tipo de Identificación:</strong> {{ $empleado->tipo_identificacion }}</p>
    <p><strong>Número de Identificación:</strong> {{ $empleado->numero_identificacion }}</p>
    
</div>
<a href="{{ route('empleados.editProfile', ['usuario_id' => $empleado->usuario_id]) }}" class="btn btn-primary">Editar Perfil</a>
<a href="{{ route('empleados.changePasswordForm', ['usuario_id' => $empleado->usuario_id]) }}" class="btn btn-warning">Cambiar Contraseña</a>
@endsection

