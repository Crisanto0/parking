<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style_menu.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47484d554e.js" crossorigin="anonymous"></script>
    <style>
        .titulo {
            color: #2fd33d;
            text-align: center;
        }

        h2 {
            color: #217a28;
            font-family: sans-serif;
        }

        p {
            font-family: sans-serif;
            font-size: 20px;
        }

        header {
            background-color: #4ea556;
            padding: 19px 10px; 
            text-align: left;
            color: white;
            position: fixed;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .icon__menu {
            display: flex;
            align-items: center;
        }

        .icon__menu i {
            margin-right: 8px;
        }

        .menu-title {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .logo-title {
            font-size: 18px;
            margin-left: 10px;
            font-weight: bold;
        }

        .content {
            padding-left: 260px; /* Espacio para el menú lateral */
            padding-top: 100px; /* Ajusta según la altura de tu encabezado */
        }

        .menu {
            width: 250px;
            
            position: fixed;
            
            left: 0;
            background-color: white;
            border-right: 1px solid #ccc;
            overflow-y: auto;
            
            padding-top: 80px; /* Espacio para la cabecera del menú */
            transition: transform 0.3s ease;
        }

        .menu_move {
            transform: translateX(-250px); /* Oculta el menú moviéndolo fuera de la vista */
        }

        .body_move {
            padding-left: 0;
        }

        .rol {
            display: flex;
            align-items: center;
            padding: 10px;
            
            color:black;
        }

        .rol h4 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            margin-left: 10px;
        }

        .sub__menu {
    padding-left: 20px;
    margin: 0;
    overflow-y: scroll !important;
    width: 200px; /* o un ancho relativo como 100% */
    
}

        .img-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            max-width: 400px;
            height: auto;
        }
    </style>
</head>
<body>
    
    <header>
        <div class="icon__menu" id="btn_open">
            <i class="fa-solid fa-bars"></i>
        </div>
        <p class="logo-title">Parking Web</p>
        <p class="menu-title">Menú</p>
    </header>

    <nav class="nav">
        <ul class="menu" id="menu">
            <li>
                <div class="rol">
                    <i class="fa-solid fa-user-tie" title="Administrador"></i>
                    <h4>Administrador</h4>
                </div>
            </li>

            <li class="options">
                <div class="options__button">
                    <i class="fa-solid fa-house" title="Inicio"></i>
                    <a href="/inicio" class="nav__link">Inicio</a>
                </div>
            </li>

            <li class="options options--click">
                <div class="options__button options__button--click">
                    <i class="fa-solid fa-users-gear" title="Gestión de Empleados"></i>
                    <a href="" class="nav__link">Gestión de Empleados</a>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <ul class="sub__menu">
                    <li class="inside">
                        <a href="/registrarempleado" class="nav__link nav__link--inside">Registrar Empleados</a>
                    </li>
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside">Activar  </a>
                    </li>
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside"> Bloquear </a>
                    </li>
                </ul>
            </li>

            <li class="options options--click">
                <div class="options__button options__button--click">
                    <i class="fa-solid fa-users-rectangle" title="Gestión de Clientes"></i>
                    <a href="" class="nav__link">Gestión de Clientes</a>
                    <i class="fa-solid fa-chevron-down" id="flecha"></i>
                </div>

                <ul class="sub__menu">
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside">Registrar Clientes</a>
                    </li>
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside">Buscar Clientes</a>
                    </li>
                </ul>
            </li>

            <li class="options options--click">
                <div class="options__button options__button--click">
                    <i class="fa-solid fa-square-parking" title="Gestión de Zonas"></i>
                    <a href="" class="nav__link">Gestión de Zonas</a>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <ul class="sub__menu">
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside">Asignar Zonas</a>
                    </li>
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside">Consultar Zonas</a>
                    </li>
                    <li class="inside">
                        <a href="" class="nav__link nav__link--inside">Consultar Vehículos</a>
                    </li>
                </ul>
            </li>

            <li class="options">
                <div class="options__button">
                    <i class="fa-solid fa-file-lines" title="Gestión de Informes"></i>
                    <a href="" class="nav__link">Gestión de Informes</a>
                </div>
            </li>

            <li class="options">
                <div class="options__button">
                    <i class="fa-solid fa-receipt" title="Facturación"></i>
                    <a href="" class="nav__link">Facturación</a>
                </div>
            </li>

            <li class="options">
                <div class="options__button">
                    <i class="fa-solid fa-bullhorn" title="Crear Anuncio"></i>
                    <a href="/anuncios" class="nav__link">Crear Anuncio</a>
                </div>
            </li>

            <li class="options">
                <div class="options__button">
                    <i class="fa-solid fa-right-from-bracket" title="Cerrar Sesión"></i>
                    <a href="/" class="nav__link">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="content" id="body">
        <h1 class="titulo">Bienvenido al portal parking web</h1>
        <div class="container">
            <h2>Anuncios</h2>
            <p>A continuación se comparte la creación de anuncios</p>

            @foreach ($anuncios as $anuncio)
                <p><strong>{{ $anuncio->descripcion }}</strong></p>
                <img src="{{ asset('storage/' . $anuncio->imagen) }}" alt="{{ $anuncio->descripcion }}" class="img-center">
            @endforeach
        </div>
    </div>
    
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>


