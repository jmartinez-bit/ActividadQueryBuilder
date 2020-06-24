<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Builder</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://kit.fontawesome.com/132b15cbd8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor">
    <div class="menu">
        <ul>
            <li><a href="{{ route('arrendatario.index') }}">Arrendatario</a></li>
            <li><a href="{{ route('arrienda.index') }}">Arrienda</a></li>
            <li><a href="{{ route('telefono.index') }}">Telefonos</a></li>
            <li><a href="{{ route('dueno.index') }}">Dueños</a></li>
            <li><a href="{{ route('casa.index') }}">Casa</a></li>
            <li><a href="{{ route('persona.index') }}">Personas</a></li>
        </ul>
    </div>
        <div class="principal">
            <header>
               @yield('title')
            </header>
            <section class="main">
                @yield('content')
            </section>
        </div>
    </div>
</body>
</html>