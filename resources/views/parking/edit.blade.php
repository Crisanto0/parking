@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-success">Editar Zona de Parqueo</h1>

    <form action="{{ route('parking.update', $garaje->id_garaje) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descripcion">Nombre de la zona</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', $garaje->descripcion) }}" required>
            @error('descripcion')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="estados_estado_id">Estado</label>
            <select id="estados_estado_id" name="estados_estado_id" class="form-control" required>
                <option value="1" {{ $garaje->estados_estado_id == 1 ? 'selected' : '' }}>Disponible</option>
                <option value="2" {{ $garaje->estados_estado_id == 2 ? 'selected' : '' }}>Ocupado</option>
            </select>
            @error('estados_estado_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('parking.manage_zones') }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
@endsection
