<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/style.css">
    <title>Listado de Libros</title>
</head>

<body>
    <?php include 'templates/header.php'; ?>
    <main>
        <h1>Listado de Libros</h1>
        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <td><?php echo $libro['ISBN']; ?></td>
                        <td><?php echo $libro['titulo']; ?></td>
                        <td><?php echo $libro['autor']; ?></td>
                        <td>
                            <a href="index.php?controller=Libro&action=modificar&ISBN=<?php echo $libro['ISBN']; ?>">Modificar</a>
                            <a href="index.php?controller=Libro&action=eliminar&ISBN=<?php echo $libro['ISBN']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'templates/footer.php'; ?>
</body>

</html>