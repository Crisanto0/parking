<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 400px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        
            <form action="{{ route('password.change', $empleado->usuario_id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="contrasena">Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="contrasena" required>
                </div>
                <div class="form-group">
                    <label for="contrasena_confirmation">Confirmar Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="contrasena_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
            </form>
        </div>
    </div>
</body>
</html>

