@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Listado de Empleados</h2>

    <form method="GET" action="{{ route('buscar_empleados.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por Nombre o Número de Identificación" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Tipo de Identificación</th>
                <th>Número de Identificación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>
                    <a href="{{ route('empleados.show', $empleado->usuario_id) }}">
                        {{ $empleado->nombre }} {{ $empleado->apellido }}
                    </a>
                </td>
                <td>{{ $empleado->tipo_identificacion }}</td>
                <td>{{ $empleado->numero_identificacion }}</td>
                <td>{{ ucfirst($empleado->status) }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->usuario_id) }}" class="btn btn-warning btn-sm">Editar</a>
                    
                    <form action="{{ route('empleados.destroy', $empleado->usuario_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este empleado?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $empleados->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
