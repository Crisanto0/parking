@extends('layouts.app')

@section('registarclientes', 'Página de registro')

@section('content')
<h2 class="text-center my-4">Registro de Clientes</h2>
<form action="{{ route('registrarclientes') }}" method="POST" class="row g-3">
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
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" id="correo" name="email" class="form-control" required>
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
    <h3>Información del vehiculo</h3>
    
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_vehiculo" class="form-label">Tipo de vehiculo:</label>
            <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="automovil">Automovil</option>
                <option value="motocicleta">Motocicleta</option>
                <option value="carro_moto">Carro moto</option>
            </select>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <input type="text" id="placa" name="placa" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" id="marca" name="marca" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" id="modelo" name="modelo" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="text" id="color" name="color" class="form-control" required>
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