@extends('layouts.app')

@section('content')
    <h2 class="text-success mt-5">Cambiar Contraseña</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleados.changePassword', ['usuario_id' => $empleado->usuario_id]) }}" method="POST">
        @csrf
        <!-- Contraseña actual -->
        <div class="form-group mb-3">
            <label for="current_contrasena">Contraseña Actual:</label>
            <div class="input-group">
                <input type="password" id="current_contrasena" name="current_contrasena" class="form-control" >
                <button type="button" class="btn btn-outline-secondary" id="toggleCurrentPassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <!-- Nueva contraseña -->
        <div class="form-group mb-3">
            <label for="new_contrasena">Nueva Contraseña:</label>
            <div class="input-group">
                <input type="password" id="new_contrasena" name="contrasena" class="form-control" >
                <button type="button" class="btn btn-outline-secondary" id="toggleNewPassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <!-- Confirmar nueva contraseña -->
        <div class="form-group mb-3">
            <label for="contrasena_confirmation">Confirmar Nueva Contraseña:</label>
            <div class="input-group">
                <input type="password" id="confirm_contrasena" name="contrasena_confirmation" class="form-control">
                <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-success">Cambiar Contraseña</button>
    </form>

    <script>
        // Mostrar/ocultar contraseña actual
        const toggleCurrentPassword = document.querySelector('#toggleCurrentPassword');
        const currentPasswordInput = document.querySelector('#current_contrasena');
        toggleCurrentPassword.addEventListener('click', function () {
            const type = currentPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            currentPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });

        // Mostrar/ocultar nueva contraseña
        const toggleNewPassword = document.querySelector('#toggleNewPassword');
        const newPasswordInput = document.querySelector('#new_contrasena');
        toggleNewPassword.addEventListener('click', function () {
            const type = newPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            newPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });

        // Mostrar/ocultar confirmación de la nueva contraseña
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPasswordInput = document.querySelector('#confirm_contrasena');
        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });
    </script>
@endsection

