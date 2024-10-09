@extends('layouts.app')

@section('registarclientes', 'Página de registro')

@section('content')
<h2 class="titulo text-center text-success my-4">Registro de Clientes</h2>

<form id="clientForm" action="{{ route('registrarclientes') }}" method="POST" class="row g-3">
    @csrf
    <!-- Información Personal -->
    <h3>Información Personal</h3>
    <h5>(Los puntos con <strong style="color:red;">*</strong> son obligatorios)</h5>
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
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" >
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

    <!-- Información del Vehículo -->
    <h3>Información del Vehículo</h3>
    <h5>(Los puntos con <strong style="color:red;">*</strong> son obligatorios)</h5>
    
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_vehiculo" class="form-label"><strong style="color:red;">*</strong> Tipo de Vehículo:</label>
            <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-select" >
                <option value="">Seleccione...</option>
                <option value="automovil" {{ old('tipo_vehiculo') == 'automovil' ? 'selected' : '' }}>Automóvil</option>
                <option value="motocicleta" {{ old('tipo_vehiculo') == 'motocicleta' ? 'selected' : '' }}>Motocicleta</option>
                <option value="carro_moto" {{ old('tipo_vehiculo') == 'carro_moto' ? 'selected' : '' }}>Carro Moto</option>
            </select>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="placa" class="form-label"><strong style="color:red;">*</strong> Placa:</label>
            <input type="text" id="placa" name="placa" class="form-control" value="{{ old('placa') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="marca" class="form-label"><strong style="color:red;">*</strong> Marca:</label>
            <input type="text" id="marca" name="marca" class="form-control" value="{{ old('marca') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" id="modelo" name="modelo" class="form-control" value="{{ old('modelo') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="text" id="color" name="color" class="form-control" value="{{ old('color') }}">
        </div>
    </div>

    <!-- Botones -->
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary" onclick="return confirmSubmission()">Enviar</button>
        <a href="{{ route('propietarios.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form><br>

<script>
function confirmSubmission() {
    return confirm('¿Está seguro de que desea enviar el formulario?');
}
</script>
@endsection
