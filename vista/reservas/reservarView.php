<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./recursos/css/style.css">
    <title>Reservar Libro</title>
</head>

<body>
    <main>
        <h1>Reservar Libro</h1>
        <form action="index.php?controller=Reserva&action=guardar" method="post">
            <input type="hidden" name="ISBN" value="<?php echo $ISBN; ?>">
            <label for="id_usuario">ID del Usuario:</label>
            <input type="number" name="id_usuario" id="id_usuario" required>
            <label for="fecha_desde">Fecha Desde:</label>
            <input type="date" name="fecha_desde" id="fecha_desde" required>
            <label for="fecha_hasta">Fecha Hasta:</label>
            <input type="date" name="fecha_hasta" id="fecha_hasta" required>
            <button type="submit">Reservar</button>
        </form>
    </main>
    <?php include './vista/comun/pie.php'; ?>
</body>

</html>