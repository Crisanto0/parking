<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>verificar</title>
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
            <p><strong>Por favor  ingresa los siguientes campos</strong></p>
            <form action="{{ route('password.verify') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="palabra_seguridad">Palabra de Seguridad:</label>
                    <input type="password" class="form-control" name="palabra_seguridad" required><br>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Verificar</button>
                    <a href="{{ route('login') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>

