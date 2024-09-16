<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
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
                <div class="form-group mb-3">
                    <label for="contrasena">Nueva Contraseña:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword1">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="contrasena_confirmation">Confirmar Nueva Contraseña:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="contrasena2" name="contrasena_confirmation" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword2">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
            </form>

            <script>
                // Toggle para la primera contraseña
                const togglePassword1 = document.querySelector('#togglePassword1');
                const passwordInput1 = document.querySelector('#contrasena');
                
                togglePassword1.addEventListener('click', function () {
                    const type = passwordInput1.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput1.setAttribute('type', type);
                    this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
                });

                // Toggle para la confirmación de la contraseña
                const togglePassword2 = document.querySelector('#togglePassword2');
                const passwordInput2 = document.querySelector('#contrasena2');
                
                togglePassword2.addEventListener('click', function () {
                    const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput2.setAttribute('type', type);
                    this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
                });
            </script>
        </div>
    </div>
</body>
</html>


