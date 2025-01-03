<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/style.css">
    <title>Modificar Libro</title>
</head>

<body>
    <?php include 'templates/header.php'; ?>
    <main>
        <h1>Modificar Libro</h1>
        <form action="index.php?controller=Libro&action=actualizar" method="post">
            <input type="hidden" name="ISBN" value="<?php echo $libro['ISBN']; ?>">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $libro['titulo']; ?>" required>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" value="<?php echo $libro['autor']; ?>" required>
            <button type="submit">Actualizar</button>
        </form>
    </main>
    <?php include 'templates/footer.php'; ?>
</body>

</html>