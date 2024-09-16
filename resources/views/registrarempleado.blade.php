@extends('layouts.app')

@section('inicio', 'Página de Inicio')

@section('content')
<h2 class="text-center my-4">Registro de Empleado Nuevo</h2>

<!-- Mostrar mensajes de éxito -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Mostrar mensajes de error -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('registrarempleado') }}" method="POST" class="row g-3">
    @csrf
    <!-- Información Personal -->
    <h3>Información Personal</h3>
    <h5>(Los puntos con <strong style="color:red;">*</strong> son obligatorios)</h5>
    <div class="col-md-6">
        <div class="form-group mb-3">

            <label for="nombre" class="form-label"><strong style="color:red;">*</strong> Nombres:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" >
            @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="apellido" class="form-label"><strong style="color:red;">*</strong> Apellidos:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="email" class="form-label"><strong style="color:red;">*</strong> Correo Electrónico:</label>
            <input type="text" id="correo" name="correo" class="form-control" value="{{ old('correo') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="telefono" class="form-label"><strong style="color:red;">*</strong> Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_identificacion" class="form-label"><strong style="color:red;">*</strong> Tipo de Identificación:</label>
            <select id="tipo_identificacion" name="tipo_identificacion" class="form-select" >
                <option value="">Seleccione...</option>
                <option value="TI" {{ old('tipo_identificacion') == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="Pasaporte" {{ old('tipo_identificacion') == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                <option value="Cedula" {{ old('tipo_identificacion') == 'Cedula' ? 'selected' : '' }}>Cédula</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="numero_identificacion" class="form-label"><strong style="color:red;">*</strong> Número de Identificación:</label>
            <input type="text" id="numero_identificacion" name="numero_identificacion" class="form-control" value="{{ old('numero_identificacion') }}" >
        </div>
    </div>

    <!-- Información Laboral -->
    <h3>Información Laboral</h3>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="salario" class="form-label"><strong style="color:red;">*</strong> Salario:</label>
            <input type="number" id="salario" name="salario" class="form-control" value="{{ old('salario') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_contrato" class="form-label"><strong style="color:red;">*</strong> Tipo de Contrato:</label>
            <select id="tipo_contrato" name="tipo_contrato" class="form-select" >
                <option value="">Seleccione...</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Temporal">Temporal</option>
                <option value="Por obra">Por obra</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="rol_id" class="form-label"><strong style="color:red;">*</strong> Rol:</label>
            <select id="rol_id" name="rol_id" class="form-select" >
                <option value="">Seleccione...</option>
                <option value="1">Administrador</option>
                <option value="2">Empleado</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="horario" class="form-label"><strong style="color:red;">*</strong> Horario:</label>
            <input type="text" id="horario" name="horario" class="form-control" value="{{ old('horario') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="fecha_contrato" class="form-label"><strong style="color:red;">*</strong> Fecha de Contrato:</label>
            <input type="date" id="fecha_contrato" name="fecha_contrato" class="form-control" value="{{ old('fecha_contrato') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="fecha_terminacion" class="form-label"><strong style="color:red;">*</strong> Fecha de Terminación:</label>
            <input type="date" id="fecha_terminacion" name="fecha_terminacion" class="form-control" value="{{ old('fecha_terminacion') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="usuario" class="form-label"><strong style="color:red;">*</strong> Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" value="{{ old('usuario') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="contrasena" class="form-label"><strong style="color:red;">*</strong> Contraseña:</label>
            <div class="input-group">
                <input type="password" id="contrasena" name="contrasena" class="form-control" value="{{ old('contrasena') }}">
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>    
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#contrasena');
    
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
    
            // Cambiar el icono del botón
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });
    </script>
    <!-- Botones -->
    <div class="col-12 text-center">
        <input type="submit" value="Enviar" class="btn btn-primary">
    </div>
</form>
@endsection
