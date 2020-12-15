<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistema de tareas</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
        <!-- Dropdown Structure -->
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="#" class="brand-logo" style="padding-left: 20px;">PLANNING YN</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><?= unserialize($_SESSION["user"])->getNombre() ?></li>
                <li><a href="<?= getUrlControllerMethod("Usuario","listar") ?>">Usuarios</a></li>
                <li><a href="<?= getUrlControllerMethod("Tarea","consultar") ?>">Tareas</a></li>
                <li><a href="<?= getUrlControllerMethod("Login","cerrarSesion") ?>">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>