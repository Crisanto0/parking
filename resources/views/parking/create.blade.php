<!-- resources/views/parking/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-success">Registrar Nueva Zona de Parqueo</h1>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('parking.store') }}" method="POST">
            @csrf
            

            <div class="form-group">
                <label for="descripcion">Nombre de la zona</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="estados_estado_id">Estado</label>
                <select id="estados_estado_id" name="estados_estado_id" class="form-control" required style="margin-bottom: 4px;">
                    <option value="1" >Disponible</option>
                    <option value="2" >Ocupado</option>
                </select>
                @error('estados_estado_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Registrar Zona</button>
            <a href="{{ route('parking.index') }}" class="btn btn-danger">Cancelar</a>

        </form>
        
    </div>
@endsection
