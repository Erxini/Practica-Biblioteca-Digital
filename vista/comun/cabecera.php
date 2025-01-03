<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../recursos/css/estilos.css">

    <title>Biblioteca Digital</title>
</head>

<body>
    <header id="header-site" class="header-site">
        <div id="box-img" class="box-img">
            <a href="index.php">
                <img src="../../recursos/imagenes/logo.png" alt="Biblioteca Pública Nacional">
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?controller=Libro&action=index">Libros</a></li>
                <li><a href="index.php?controller=Reserva&action=reservar">Reservar</a></li>
            </ul>
        </nav>

        <div id="user" class="user">
            <a href="index.php?controller=Usuario&action=logout">
                <img src="./../../recursos/imagenes/user.svg">
            </a>
        </div>
    </header>

</body>

</html>