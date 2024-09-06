@extends('layouts.admin')

@section('buscar', 'buscar')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista de Empleados</h1>
    <form method="GET" action="{{ route('buscar_empleados.index') }}" class="form-inline mb-4">
        <input type="text" name="search" class="form-control mr-2" placeholder="Buscar por ID, Nombre o Identificación" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Número de Identificación</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->usuario_id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->numero_identificacion }}</td>
                    <td>{{ $usuario->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
