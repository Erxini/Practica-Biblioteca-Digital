<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/style.css">
    <title>Biblioteca Digital</title>
</head>

<body>
    <header id="header-site">
        <div id="box-img">
            <a href="index.php">
                <img src="./views/src/logo.png" alt="Biblioteca Digital">
            </a>
        </div>

        <nav>
            <button onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </button>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?controller=Libro&action=index">Libros</a></li>
                <li><a href="index.php?controller=Reserva&action=reservar">Reservar</a></li>
            </ul>
        </nav>

        <div id="user">
            <a href="index.php?controller=Usuario&action=logout">
                <img src="./views/src/user.svg">
            </a>
        </div>
    </header>

    <script>
        function toggleMenu() {
            document.querySelector('#header-site nav ul').classList.toggle('activo');
        }
    </script>
</body>

</html>