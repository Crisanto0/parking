@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center text-success">Listado de Propietarios</h2>
    <form method="GET" action="{{ route('propietarios.index') }}" class="mb-4">
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($propietarios as $propietario)
           
            <tr>
                <td>
                    <a href="{{ route('propietarios.show', ['propietario_id' => $propietario->propietario_id]) }}">
                        {{ $propietario->nombre }} {{ $propietario->apellido }}
                    </a>
                </td>
                <td>{{ $propietario->tipo_identificacion }}</td>
                <td>{{ $propietario->numero_identificacion }}</td>
                <td>
                    <a href="{{ route('propietarios.edit', ['propietario_id' => $propietario->propietario_id]) }}" class="btn btn-warning btn-sm">Editar</a>
                    
                    <form action="{{ route('propietarios.destroy', $propietario->propietario_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este empleado?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $propietarios->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
