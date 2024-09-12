<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
}

form {
    margin-top: 20px;
    text-align: center;
}

input {
    width: 50%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
}

.login {
    background-color: #2fd33d;
    color: #fff;
    cursor: pointer;
}

.link-container {
    display: flex;
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
}

    </style>
</head>
<body>
<div class="fondo">
    <div class="container">
        <h1 class="tituloinicial">Login parking web</h1>

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
            <input type="text" name="usuario" placeholder="usuario" value="{{ old('usuario') }}">
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="submit" class="login" value="Login">
        </form>
        <div class="link-container">
            <a class="olvido" href="{{route('password.verify')}}">Olvidé mi contraseña</a>
        </div>
    </div>
</div>
</body>
</html>