    <div>
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'parkingweb')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        @stack('styles') 
    </head>
    <body>

        @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
        @if(Auth::check())
            @if(Auth::user()->rol_id == 1)
                @include('layouts.admin')
            @elseif(Auth::user()->rol_id == 2)
                @include('layouts.empleado')
            @else
                <p>No tienes permisos para ver esta página.</p>
            @endif
        @else
            <p>No estás autenticado. Por favor, <a href="/">inicia sesión</a>.</p>
        @endif

        <script src="{{ asset('js/main.js') }}"></script>
        @stack('scripts') <!-- Permite agregar scripts específicos de cada layout -->
    </body>
    </html>

    </div>