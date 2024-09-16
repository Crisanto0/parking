@extends('layouts.app')

@section('inicio', 'Página de Inicio')

@section('content')
<h1 class="titulo text-center text-success my-5">Bienvenido al Portal Parking Web</h1>

<div class="container">
    <h2 class="text-primary">Anuncios</h2>
    <p class="mb-5">Aquí puedes ver los anuncios más recientes:</p>

    @foreach ($anuncios as $anuncio)
        <div class="card mb-5 shadow-lg">
            <!-- Descripción del anuncio en la parte superior izquierda -->
            <div class="card-body">
                <h3 class="card-title text-start text-success">{{ $anuncio->descripcion }}</h3>
            </div>
            
            <!-- Imagen del anuncio con object-fit: contain -->
            @if ($anuncio->imagen)
                <img src="{{ asset('storage/' . $anuncio->imagen) }}" alt="{{ $anuncio->descripcion }}" class="card-img-bottom" style="max-height: 400px; object-fit: contain; width: 100%;">
            @else
                <img src="https://via.placeholder.com/1200x400?text=No+Image" alt="Sin imagen" class="card-img-bottom" style="max-height: 400px; object-fit: contain; width: 100%;">
            @endif
        </div>
    @endforeach
</div>
@endsection





