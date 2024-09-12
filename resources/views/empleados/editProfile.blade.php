@extends('layouts.app')

@section('content')
    <h1>Editar Perfil</h1>

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
            <input type="email" name="correo" class="form-control" value="{{ $empleado->correo }}" required>
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
        <a href="{{ route('empleados.profile', ['usuario_id' => $empleado->usuario_id])  }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
