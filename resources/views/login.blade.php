<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .fondo {
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('/fondo.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }

        .tituloinicial {
            color: #2fd33d;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        .form-control {
            width: 100%; /* Cambiar a 100% para ambos inputs */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        .input-group {
            width: 100%; /* Asegurar que el grupo de input ocupe el mismo espacio */
        }

        .login {
            background-color: #2fd33d;
            color: #fff;
            cursor: pointer;
            width: 100%; /* Para que el botón de login sea del mismo tamaño */
        }

        .link-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        .input-group-text {
            cursor: pointer; /* Para que el botón del ojo tenga un cursor de mano */
        }
    </style>
</head>
<body>
<div class="fondo">
    <div class="container">
        <h3 class="tituloinicial">Login parking web</h3>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{ route('login') }}">
            @csrf
            <!-- Campo de usuario -->
            <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="{{ old('usuario') }}" required>
            
            <!-- Campo de contraseña con botón para mostrar/ocultar -->
            <div class="input-group">
                <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" required>
                <button type="button" class="input-group-text" id="togglePassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            
            <!-- Botón de login -->
            <input type="submit" class="btn btn-primary login" value="Login">
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

        <!-- Enlace para restablecer contraseña -->
        <div class="link-container">
            <a class="olvido" href="{{route('password.verify')}}">Olvidé mi contraseña</a>
        </div>
    </div>
</div>
</body>
</html>
