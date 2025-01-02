<div class="centro">
    <h2 align="center">CONEXIÓN DE USUARIOS</h2>

    <?php
    if (isset($mensaje)) {
        echo '<h3 align="center">' . $mensaje . "</h3>";
    }
    ?>

    <form action="<?php echo $this->url("usuario", "conectarse"); ?>" method="post">
        <p align="center">Nombre: <input name="nombre" type="text"
                value="<?php if (isset($nombre)) {
                            echo $nombre;
                        } ?>" /></p>
        <p align="center">Clave: <input name="clave" type="password"
                value="<?php if (isset($clave)) {
                            echo $clave;
                        } ?>" /></p>
        <p align="center"><input type="submit" name="conectarse" value="Conectarse" /></p>
    </form>
</div>