<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
          table {
            width: 100%;
            border-collapse: collapse; /* Elimina el espacio entre las celdas */
          }

          th, td {
            border: 1px solid black; /* Líneas sólidas para las celdas */
            padding: 8px; /* Espaciado dentro de las celdas */
          }

          th {
            background-color: #f2f2f2; /* Color de fondo para los encabezados */
          }

          tr:nth-child(even) {
            background-color: #f9f9f9; /* Color de fondo para las filas pares */
          }

          label {
            display: inline-block;
            width: 100px;
            text-align: left; 
            margin-right: 10px;
                
          }  

          body {
            font-family: Arial, sans-serif;
         }

          .search-form {
              margin: 20px 0;
          }

          .search-form input[type="text"] {
              padding: 10px;
              margin-right: 10px;
              width: 200px;
          }

          .search-form input[type="submit"] {
              padding: 10px 20px;
          }

          .search-results {
              margin-top: 20px;
          }

          button{
            
          }

    </style>
</head>
<body>
  <div class="search-form">
          <form action="/consultas" method="GET">
              <input type="text" name="id" placeholder="ID">
              <input type="text" name="nombre" placeholder="Nombre">
              <input type="text" name="numero_identificacion" placeholder="Cédula">
              <input type="submit" value="Buscar">
          </form>
  </div>
     
  
    <div> 
  <h2>FORMULARIO REGISTRAR DATOS USUARIOS</h2> 
    <form action="/consultas" method="POST">
      @csrf 
      <label for="usuario">Nombre de Usuario:</label>
      <input type="text" id="usuario" name="usuario" required>

      <label for="contrasena">Contraseña:</label>
      <input type="password" id="contrasena" name="contrasena" required>
      <br>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido" required>
      <br>
      <label for="numero_identificacion">numero_identificacion:</label>
      <input type="text" id="numero_identificacion" name="numero_identificacion" required>

      <label for="direccion">Dirección:</label>
      <input type="text" id="direccion" name="direccion" required>
      <br>
      <label for="telefono">Telefono:</label>
      <input type='number' id="telefono" name="telefono" required>

      <label for="correo">correo:</label>
      <input type="correo" id="correo" name="correo" required>
      <br>
      <label for="fecha_contrato">Fecha de contrato:</label>
      <input type="date" id="fecha_contrato" name="fecha_contrato" >

      <label for="fecha_terminacion">Fecha de Terminación:</label>
      <input type="date" id="fecha_terminacion" name="fecha_terminacion" >
      <br>
      
      <label for="rol_id">Rol id:</label>
      <input type="number" id="rol_id" name="rol_id" >
      <br>
      <input type="submit" value="Enviar">
    </form>
    </div>
    <div class="search-results">
        <h1>Resultados de la Búsqueda</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Usuario</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Dirección</th>
                    <th>correo</th>
                    <th>Teléfono</th>
                    <th>Fecha de Contrato</th>
                    <th>Fecha de Terminación</th>
                    <th>Rol ID</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->usuario_id }}</td>
                    <td>{{ $usuario->usuario }}</td>
                    <td>{{ $usuario->contrasena }}</td> 
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->numero_identificacion }}</td>
                    <td>{{ $usuario->direccion }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->fecha_contrato }}</td>
                    <td>{{ $usuario->fecha_terminacion }}</td>
                    <td>{{ $usuario->rol_id }}</td>
                    <td><a href="{{ route('usuarios.edit', ['id' => $usuario->usuario_id]) }}">Editar</a></td>
                    <td>
                        <form action="{{ route('usuarios.destroy', ['id' => $usuario->usuario_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
             </tbody>  
        </table>  
    </div>
</body>
</html>



