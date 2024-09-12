@extends('layouts.app')

@section('content')
    <h1>Perfil del Empleado</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $empleado->apellido }}</p>
    <p><strong>Email:</strong> {{ $empleado->correo }}</p>
    <p><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $empleado->direccion }}</p>

    <a href="{{ route('empleados.editProfile', ['usuario_id' => $empleado->usuario_id]) }}" class="btn btn-primary">Editar Perfil</a>
<a href="{{ route('empleados.changePasswordForm', ['usuario_id' => $empleado->usuario_id]) }}" class="btn btn-warning">Cambiar Contraseña</a>

@endsection
