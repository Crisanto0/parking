@extends('layouts.app')

@section('inicio', 'Página de Inicio')

@section('content')
<h1 class="titulo text-center">Bienvenido al portal parking web</h1>

<div class="container">
    <h2 >Anuncios</h2>
    <p >A continuación se comparte la creación de anuncios</p>

    @foreach ($anuncios as $anuncio)
        <div class="text-center mb-4">
            <p><strong>{{ $anuncio->descripcion }}</strong></p>
            <img src="{{ asset('storage/' . $anuncio->imagen) }}" alt="{{ $anuncio->descripcion }}" class="img-fluid" style="max-width: 600px; height: auto;">
        </div>
    @endforeach
</div>
@endsection



