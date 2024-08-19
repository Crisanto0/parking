@extends('layouts.app')

@section('anuncios', )

@section('content')
<h1 class="text-center text-success mt-5">
    Formato crear nuevo anuncio
</h1>
<br><br>
<div class="d-flex justify-content-center">
    <form action="{{ route('anuncios.store') }}" method="POST" enctype="multipart/form-data" class="w-50">
        @csrf
        

        <div class="row">
            <div class="col-12 mb-3">
                <label for="descripcion">*Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>
            <div class="col-12 mb-3">
                <label for="imagen">Imagenes</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">Crear Anuncio</button>
                <a href="{{ route('inicio') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection