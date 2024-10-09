@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <h2 class=" titulo  text-success">Editar Perfil</h2>

    <form action="{{ route('empleados.updateProfile', ['usuario_id' => $empleado->usuario_id])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $empleado->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="{{ $empleado->apellido }}" required>
        </div>

        <div class="form-group">
            <label for="correo">Email:</label>
            <input type="text" name="correo" class="form-control" value="{{ $empleado->correo }}" >
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="palabra_seguridad">palabra de seguridad</label>
            <input type="text" name="palabra_seguridad" class="form-control" value="{{ $empleado->palabra_seguridad }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="{{ route('empleados.profile', ['usuario_id' => $empleado->usuario_id])  }}" class="btn btn-Danger">Cancelar</a>
    </form>
@endsection
