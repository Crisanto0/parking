@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-success mt-5">Lista de Anuncios</h1>

      <!-- Formulario de búsqueda -->
      <form action="{{ route('anuncios.index') }}" method="GET" class="form-inline">
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="search" class="form-control mr-2" placeholder="Buscar..." value="{{ request()->get('search') }}">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <br>
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('anuncios.create') }}" class="btn btn-primary">Crear Nuevo Anuncio</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anuncios as $anuncio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $anuncio->descripcion }}</td>
                    <td>
                        @if ($anuncio->imagen)
                            <img src="{{ Storage::url($anuncio->imagen) }}" alt="Imagen del Anuncio" style="width: 100px;">
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('anuncios.edit', $anuncio->id_anuncio) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('anuncios.destroy', $anuncio->id_anuncio) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este anuncio?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      <!-- Paginación -->
      <div class="d-flex justify-content-center">
        {{ $anuncios->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
