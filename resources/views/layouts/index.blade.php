<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Font-Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <title>Final - @yield('title')</title>
</head>
<body style="background-color: #D4E6F1">

<!-- Estilos NavBar -->
<style>
    .listado {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        height: 635px;
        background-color: #17202A;
        border: black ;
        position: absolute;
    }
    .lista .link {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
        color: white;
    }

    .lista .link:hover {
        background-color: #555;
    }
</style>

<!-- Creación de NavBar -->
<ul class="listado">
    <br>
    <a  href="{{ url('/') }}" class="ml-3 text-center">
        <img src="https://tecnobits.net/wp-content/uploads/2018/12/exchange-wallpaper-1.jpg" height="90" class="d-inline-block align-center rounded" alt="Logo">
    </a>
    <br><br>
    <li class="lista"><a class="link" href="{{ url('/') }}"><i class="fas fa-coins"></i> Criptomoneda</a></li>
    <li class="lista"><a class="link" href="{{ url('/') }}"><i class="fas fa-laptop-code"></i> Lenguajes</a></li>
    <li class="lista"><a class="link" target="_blank" href="https://github.com/JuanVasl/juan0909206391.git"><i class="fab fa-github"></i> Repositorio</a></li>
</ul>

<!-- Secciones de Blade -->
<div class="container">
    @yield('content')
</div>

</body>
</html>
