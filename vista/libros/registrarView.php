<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./recursos/css/style.css">
    <title>Registrar Libro</title>
</head>

<body>
    <?php include './vista/comun/cabecera.php'; ?>
    <main>
        <h1>Registrar Nuevo Libro</h1>
        <form action="index.php?controller=Libro&action=guardar" method="post">
            <label for="ISBN">ISBN:</label>
            <input type="text" name="ISBN" id="ISBN" required>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" required>
            <button type="submit">Guardar</button>
        </form>
    </main>
    <?php include './vista/comun/pie.php'; ?>
</body>

</html>