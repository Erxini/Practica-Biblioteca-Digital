<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../recursos/css/estilos.css">
    <title>Iniciar Sesión</title>
</head>

<body>
    <main>
        <h1 class="title">Iniciar Sesión</h1>
        <?php if (isset($mensaje)): ?>
            <p class="error"><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <div class="formulary">
            <form action="index.php?controller=Usuario&action=autenticar" method="post">
                <label for="nombre">Nombre de Usuario:</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="clave">Contraseña:</label>
                <input type="password" name="clave" id="clave" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </main>
    <?php include './vista/comun/pie.php'; ?>
</body>

</html>