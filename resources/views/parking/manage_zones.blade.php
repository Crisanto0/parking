@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-success">Gestionar Zonas de Parqueo</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="{{ route('parking.manage_zones') }}">
        <div class="form-group">
            <label for="search">Buscar Zona:</label>
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($garajes as $garaje)
                <tr>
                    <td>{{ $garaje->descripcion }}</td>
                    <td>{{ $garaje->estado->descripcion }}</td>
                    <td>
                        @if($garaje->estado->descripcion == 'Disponible')
                            <form action="{{ route('parking.block', $garaje->id_garaje) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">Bloquear</button>
                            </form>
                        @else
                            <form action="{{ route('parking.activate', $garaje->id_garaje) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Activar</button>
                            </form>
                        @endif

                        <form action="{{ route('parking.delete', $garaje->id_garaje) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                        <!-- Botón de editar -->
                        <a href="{{ route('parking.edit', $garaje->id_garaje) }}" class="btn btn-info">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="pagination">
        {{ $garajes->appends(['search' => $search])->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

