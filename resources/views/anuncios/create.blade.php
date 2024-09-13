@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-success mb-4">Crear Nuevo Anuncio</h1>
    
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Formulario de Anuncio</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('anuncios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="descripcion">*Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" rows="4" required></textarea>
                    @error('descripcion')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label for="imagen">Imagen (opcional)</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                    @error('imagen')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Crear Anuncio</button>
                    <a href="{{ route('inicio') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
