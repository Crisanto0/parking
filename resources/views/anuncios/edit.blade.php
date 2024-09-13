@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-success mb-4">Editar Anuncio</h1>
    
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Formulario de Edición</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('anuncios.update', $anuncio->id_anuncio) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="descripcion">*Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', $anuncio->descripcion) }}" required>
                    @error('descripcion')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Imagen (opcional)</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                    @if ($anuncio->imagen)
                        <div class="mt-2">
                            <img src="{{ Storage::url($anuncio->imagen) }}" alt="Imagen del Anuncio" style="width: 150px;">
                        </div>
                    @endif
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Actualizar Anuncio</button>
                    <a href="{{ route('anuncios.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
