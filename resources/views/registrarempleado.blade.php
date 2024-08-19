@extends('layouts.app')

@section('inicio', 'Página de Inicio')

@section('content')
<h2 class="text-center my-4">Registro de Empleado Nuevo</h2>
<form action="{{ route('registrarempleado') }}" method="POST" class="row g-3">
    @csrf
    <!-- Información Personal -->
    <h3>Información Personal</h3>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nombre" class="form-label">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="correo" class="form-label">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
            <select id="tipo_identificacion" name="tipo_identificacion" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="TI">TI</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Cedula">Cédula</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
            <input type="text" id="numero_identificacion" name="numero_identificacion" class="form-control" required>
        </div>
    </div>

    <!-- Información Laboral -->
    <h3>Información Laboral</h3>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="salario" class="form-label">Salario:</label>
            <input type="number" id="salario" name="salario" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_contrato" class="form-label">Tipo de Contrato:</label>
            <select id="tipo_contrato" name="tipo_contrato" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Temporal">Temporal</option>
                <option value="Por obra">Por obra</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="rol_id" class="form-label">Rol:</label>
            <select id="rol_id" name="rol" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="1">Administrador</option>
                <option value="2">Empleado</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="horario" class="form-label">Horario:</label>
            <input type="text" id="horario" name="horario" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="fecha_contrato" class="form-label">Fecha de Contrato:</label>
            <input type="date" id="fecha_contrato" name="fecha_contrato" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="fecha_terminacion" class="form-label">Fecha de Terminación:</label>
            <input type="date" id="fecha_terminacion" name="fecha_terminacion" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" class="form-control" required>
        </div>
    </div>

    <!-- Botones -->
    <div class="col-12 text-center">
        <input type="submit" value="Enviar" class="btn btn-primary">
    </div>
</form>
</div>
</div>
@endsection
