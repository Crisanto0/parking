@extends('layouts.app')

@section('content')
    <h1>Zonas de Parqueo</h1>

    <form method="GET" action="{{ route('parking.index') }}">
        <div class="form-group">
            <label for="search">Buscar Zona:</label>
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <br>

    <div class="zonas-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach ($garajes as $garaje)
            <div class="zona-card" style="border: 1px solid #ddd; padding: 20px; width: 300px; border-radius: 10px;">
                <h3>
                    <a href="{{ route('parking.show', $garaje->id_garaje) }}">
                        {{ $garaje->descripcion }}
                    </a>
                </h3>
                <p><strong>Estado:</strong> {{ $garaje->estado->descripcion }}</p>

                @if (strtolower($garaje->estado->descripcion) == 'bloqueada')
                    <!-- Mostrar mensaje si la zona está bloqueada -->
                    <p style="color: red; font-weight: bold;">Zona Bloqueada</p>
                @elseif (strtolower($garaje->estado->descripcion) == 'disponible')
                    <!-- Formulario para asignar un vehículo -->
                    <form class="assign-form" action="{{ route('parking.assign') }}" method="POST">
                        @csrf
                        <input type="hidden" name="garaje_id" value="{{ $garaje->id_garaje }}">

                        <label for="placa-{{ $garaje->id_garaje }}">Seleccionar Vehículo:</label>
                        <input type="text" id="vehiculo-search-{{ $garaje->id_garaje }}" class="form-control" placeholder="Buscar por placa o nombre" onkeyup="filterVehicles('{{ $garaje->id_garaje }}')">
                        
                        <select id="vehiculo-select-{{ $garaje->id_garaje }}" name="placa" style="width: 100%; padding: 5px; margin-top: 10px;" required>
                            <option value="">Seleccionar Vehículo</option>
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->placa }}">
                                    {{ $vehiculo->placa }} - 
                                    {{ $vehiculo->propietario ? $vehiculo->propietario->nombre . ' ' . $vehiculo->propietario->apellido : 'Desconocido' }}
                                </option>
                            @endforeach
                        </select>

                        <div id="no-results-{{ $garaje->id_garaje }}" style="display: none; margin-top: 10px;">
                            <p>No se encontraron vehículos. <a href="/registrarclientes" class="btn btn-secondary">Registrar nuevo cliente</a></p>
                        </div>

                        <!-- Campo para ingresar el costo por minuto -->
                        <label for="tarifa_por_minuto">Costo por minuto:</label>
                        <input type="number" name="tarifa_por_minuto" style="width: 100%; padding: 5px; margin-top: 10px;" min="0" required>

                        <button type="submit" style="margin-top: 10px; width: 100%; background-color: green; color: white; padding: 10px; border: none; border-radius: 5px;">
                            Asignar Zona
                        </button>
                    </form>
                @elseif (strtolower($garaje->estado->descripcion) == 'ocupada')
                    <!-- Mostrar botón de desasignar si la zona está ocupada -->
                    <form action="{{ route('parking.unassign', $garaje->id_garaje) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="margin-top: 10px; width: 100%; background-color: red; color: white; padding: 10px; border: none; border-radius: 5px;">
                            Desasignar Zona
                        </button>
                        <a href="{{ route('generar.ticket', $garaje->id_garaje) }}" style="margin-top: 10px; width: 100%;" class="btn btn-primary">Descargar Ticket de Entrada</a>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <script>
        function filterVehicles(garajeId) {
            var input, filter, select, options, i;
            input = document.getElementById("vehiculo-search-" + garajeId);
            filter = input.value.toLowerCase();
            select = document.getElementById("vehiculo-select-" + garajeId);
            options = select.getElementsByTagName("option");
            var noResults = document.getElementById("no-results-" + garajeId);
            
            var visibleOptions = false;

            for (i = 1; i < options.length; i++) {
                var text = options[i].textContent || options[i].innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    options[i].style.display = "";
                    visibleOptions = true;
                } else {
                    options[i].style.display = "none";
                }
            }

            // Mostrar el mensaje si no se encontraron resultados
            if (!visibleOptions && filter.length > 0) {
                noResults.style.display = "block";
            } else {
                noResults.style.display = "none";
            }
        }
    </script>
@endsection







