<div class="centro">
    <h2 align="center"> <?php echo $titulo; ?></h2>
    <?php
    if (isset($mensaje)) {
        echo '<h3 align="center">' . $mensaje . '</h3>';
    }
    ?>

    <div style="text-align:center">
        <form action="<?php echo $this->url('usuario', 'modificausu'); ?>" method="post">
            <p>Nombre: <input name="nombre" value="<?php echo $usu->getNombre(); ?>" type="text" /></p>
            <p>Primer Apellido: <input name="ape1" value="<?php echo $usu->getApe1(); ?>" type="text" /></p>
            <p>Segundo Apellido: <input name="ape2" value="<?php echo $usu->getApe2(); ?>" type="text" /></p>
            <p>Rol:
                <select name="rol">
                    <option value="registrado" <?php if ($usu->getRol() == 'registrado') echo 'selected'; ?>>Registrado</option>
                    <option value="administrador" <?php if ($usu->getRol() == 'administrador') echo 'selected'; ?>>Administrador</option>
                </select>
            </p>
            <p>Clave: <input name="clave" value="<?php echo $usu->getClave(); ?>" type="password" /></p>
            <p>Email: <input name="email" value="<?php echo $usu->getEmail(); ?>" type="text" /></p>
            <p><input type="submit" name="modificarusuario" value="Modificar" /></p>
        </form>
    </div>
</div>