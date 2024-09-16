@extends('layouts.admin')

@section('inicio', 'Editar Empleado')

@section('content')
<h2 class="text-center my-4">Editar Empleado</h2>

<form action="{{ route('empleados.update', $empleado->usuario_id) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')
    
    <!-- Información Personal -->
    <h3>Información Personal</h3>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nombre" class="form-label">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $empleado->nombre) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido', $empleado->apellido) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="correo" class="form-label">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo', $empleado->correo) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $empleado->telefono) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion', $empleado->direccion) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
            <select id="tipo_identificacion" name="tipo_identificacion" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="TI" {{ old('tipo_identificacion', $empleado->tipo_identificacion) == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="Pasaporte" {{ old('tipo_identificacion', $empleado->tipo_identificacion) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                <option value="Cedula" {{ old('tipo_identificacion', $empleado->tipo_identificacion) == 'Cedula' ? 'selected' : '' }}>Cédula</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
            <input type="text" id="numero_identificacion" name="numero_identificacion" class="form-control" value="{{ old('numero_identificacion', $empleado->numero_identificacion) }}" required>
        </div>
    </div>

    <!-- Información Laboral -->
    <h3>Información Laboral</h3>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="salario" class="form-label">Salario:</label>
            <input type="number" id="salario" name="salario" class="form-control" value="{{ old('salario', $empleado->salario) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_contrato" class="form-label">Tipo de Contrato:</label>
            <select id="tipo_contrato" name="tipo_contrato" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Indefinido" {{ old('tipo_contrato', $empleado->tipo_contrato) == 'Indefinido' ? 'selected' : '' }}>Indefinido</option>
                <option value="Temporal" {{ old('tipo_contrato', $empleado->tipo_contrato) == 'Temporal' ? 'selected' : '' }}>Temporal</option>
                <option value="Por obra" {{ old('tipo_contrato', $empleado->tipo_contrato) == 'Por obra' ? 'selected' : '' }}>Por obra</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="rol_id" class="form-label">Rol:</label>
            <select id="rol_id" name="rol_id" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="1" {{ old('rol_id', $empleado->rol_id) == '1' ? 'selected' : '' }}>Administrador</option>
                <option value="2" {{ old('rol_id', $empleado->rol_id) == '2' ? 'selected' : '' }}>Empleado</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="horario" class="form-label">Horario:</label>
            <input type="text" id="horario" name="horario" class="form-control" value="{{ old('horario', $empleado->horario) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="fecha_contrato" class="form-label">Fecha de Contrato:</label>
            <input type="date" id="fecha_contrato" name="fecha_contrato" class="form-control" value="{{ old('fecha_contrato', $empleado->fecha_contrato) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="fecha_terminacion" class="form-label">Fecha de Terminación:</label>
            <input type="date" id="fecha_terminacion" name="fecha_terminacion" class="form-control" value="{{ old('fecha_terminacion', $empleado->fecha_terminacion) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" value="{{ old('usuario', $empleado->usuario) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <div class="input-group">
                <input type="password" id="contrasena" name="contrasena" class="form-control" value="{{old('contrasena', $empleado->contrasena)}}">
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="bi bi-eye"></i>
           </div> <!-- Deja el campo de contraseña vacío para no sobrescribirla sin querer -->
        </div>
    </div>

    <!-- Botones -->
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
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
@endsection
