@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-success">Detalles del Empleado</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información Personal</h5>
            <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
            <p><strong>Apellido:</strong> {{ $empleado->apellido }}</p>
            <p><strong>Correo:</strong> {{ $empleado->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $empleado->direccion }}</p>

            <h5 class="card-title mt-4">Información de Identificación</h5>
            <p><strong>Tipo de Identificación:</strong> {{ $empleado->tipo_identificacion }}</p>
            <p><strong>Número de Identificación:</strong> {{ $empleado->numero_identificacion }}</p>

            <h5 class="card-title mt-4">Información Laboral</h5>
            <p><strong>Salario:</strong> {{ $empleado->salario }}</p>
            <p><strong>Tipo de Contrato:</strong> {{ $empleado->tipo_contrato }}</p>
            <p><strong>Rol ID:</strong> {{ $empleado->rol_id }}</p>
            <p><strong>Horario:</strong> {{ $empleado->horario }}</p>
            <p><strong>Usuario:</strong> {{ $empleado->usuario }}</p>
            <p><strong>Contraseña:</strong> {{ $empleado->contrasena }}</p>

            <h5 class="card-title mt-4">Fechas del Contrato</h5>
            <p><strong>Fecha de Contrato:</strong> {{ $empleado->fecha_contrato }}</p>
            <p><strong>Fecha de Terminación:</strong> {{ $empleado->fecha_terminacion }}</p>

            
            <a href="{{ route('empleados.changeStatus', $empleado->usuario_id) }}" class="btn btn-warning me-2">
                {{ $empleado->status == 'activo' ? 'Bloquear' : 'Activar' }}
            </a>
            <a href="{{ route('empleados.index') }}" class="btn btn-success">Aceptar</a>
            
        </div>
    </div>
</div>
@endsection
