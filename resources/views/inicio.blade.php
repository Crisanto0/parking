@extends('layouts.app')

@section('inicio', 'Página de Inicio')

@section('content')
<h2 class="titulo text-center text-success ">Bienvenido a Parking Web</h2>

<div class="container">
    <h3 class="text-primary">Anuncios</h3>
    

    @foreach ($anuncios as $anuncio)
        <div class="card mb-5 shadow-lg">
            <!-- Descripción del anuncio en la parte superior izquierda -->
            <div class="card-body">
                <h5 class="card-title text-start ">{{ $anuncio->descripcion }}</h5>
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





