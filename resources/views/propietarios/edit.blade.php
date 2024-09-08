@extends ('layouts.app')

@section('editarclientes', 'Página de editar')

@section('content')
<h2 class="text-center my-4">Editar Clientes</h2>
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
<form action="{{ route('propietarios.update', $propietario->propietario_id) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')
    <!-- Información Personal -->
    <h3>Información Personal</h3>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nombre" class="form-label">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $propietario->nombre) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido', $propietario->apellido) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" id="correo" name="email" class="form-control" value="{{ old('email', $propietario->email) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $propietario->telefono) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion', $propietario->direccion) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
            <select id="tipo_identificacion" name="tipo_identificacion" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="TI" {{ old('tipo_identificacion', $propietario->tipo_identificacion) == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="Pasaporte" {{ old('tipo_identificacion', $propietario->tipo_identificacion) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                <option value="Cedula" {{ old('tipo_identificacion', $propietario->tipo_identificacion) == 'Cedula' ? 'selected' : '' }}>Cédula</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
            <input type="text" id="numero_identificacion" name="numero_identificacion" class="form-control" value="{{ old('numero_identificacion', $propietario->numero_identificacion) }}" required>
        </div>
    </div>

   
    <h3>Información del vehiculo</h3>
    
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="tipo_vehiculo" class="form-label">Tipo de vehiculo:</label>
            <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="automovil" {{ old('tipo_vehiculo', $propietario->vehiculos->first()->tipo_vehiculo) == 'automovil' ? 'selected' : '' }}>Automóvil</option>
                <option value="motocicleta" {{ old('tipo_vehiculo', $propietario->vehiculos->first()->tipo_vehiculo) == 'motocicleta' ? 'selected' : '' }}>Motocicleta</option>
                <option value="carro_moto" {{ old('tipo_vehiculo', $propietario->vehiculos->first()->tipo_vehiculo) == 'carro_moto' ? 'selected' : '' }}>Carro moto</option>
            </select>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <input type="text" id="placa" name="placa" class="form-control" value="{{ old('placa', $propietario->vehiculos->first()->placa) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" id="marca" name="marca" class="form-control" value="{{ old('marca', $propietario->vehiculos->first()->marca) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" id="modelo" name="modelo" class="form-control" value="{{ old('modelo', $propietario->vehiculos->first()->modelo) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="text" id="color" name="color" class="form-control" value="{{ old('color', $propietario->vehiculos->first()->color) }}" required>
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