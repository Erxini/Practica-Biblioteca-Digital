<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./recursos/css/style.css">
    <title>Consultar Libros</title>
</head>

<body>
    <main>
        <h1>Consultar Libros</h1>
        <form action="index.php?controller=Libro&action=buscar" method="post">
            <label for="criterio">Criterio de Búsqueda:</label>
            <input type="text" name="criterio" id="criterio" required>
            <button type="submit">Buscar</button>
        </form>
    </main>
    <?php include './vista/comun/pie.php'; ?>
</body>

</html>