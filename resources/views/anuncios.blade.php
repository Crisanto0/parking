@extends('layouts.app')

@section('anuncios', )

@section('content')
<h1 class="text-center text-success mt-5">
    Crear Nuevo Anuncio
</h1>
<br><br>
<div class="d-flex justify-content-center">
    <div class="card shadow p-4 w-50">
        <h2 class="text-center text-primary mb-4">Detalles del Anuncio</h2>

        <form action="{{ route('anuncios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="descripcion" class="form-label"><strong style="color:red;">*</strong> Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Escribe una breve descripción del anuncio" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imágenes</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
                <small class="form-text text-muted">Puedes subir una imagen relevante para el anuncio.</small>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Crear Anuncio</button>
                <a href="{{ route('inicio') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<!-- Espacio extra al final para mejor separación visual -->
<div class="my-5"></div>
@endsection
