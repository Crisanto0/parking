@extends('layouts.app')

@section('content')
    <h1>Cambiar Contraseña</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleados.changePassword', ['usuario_id' => $empleado->usuario_id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_contrasena">Contraseña Actual:</label>
            <input type="password" name="current_contrasena" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contrasena">Nueva Contraseña:</label>
            <input type="password" name="contrasena" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contrasena_confirmation">Confirmar Nueva Contraseña:</label>
            <input type="password" name="contrasena_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Cambiar Contraseña</button>
    </form>
@endsection
