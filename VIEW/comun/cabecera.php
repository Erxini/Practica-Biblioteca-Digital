<!DOCTYPE HTML>
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Ejemplo POO-MVC. Viajes</title>
        <link rel="stylesheet" href="../../recursos/css/estilos.css" />
    </head>
    <body>
        <div class="contenedor">
            <!-- Cabecera -->
            <div class="cabecera">
                <h1>Viajes</h1>
                <a href="index.php" class="inicio">home</a>
            </div>
            <!-- Menú -->
            <div class="menu">
                <br>
                <form method="post" action= "<?php echo $this->url("web", "menucabecera"); ?>"> 
                    <b>Viajes por comunidad: </b>
                    <select name="comunidad" >
                        <?php
                        if ($comunidades) {  //Este dato se debe recibir del controlador
                            foreach ($comunidades as $fila) {
                                $sel = "";
                                if (isset($_SESSION['comunidad'])) {
                                    if ($_SESSION['comunidad'] == $fila['comunidad']) {
                                        $sel = "selected";
                                    }
                                }
                                echo "<option value='" . $fila['comunidad'] . "'" .
                                $sel . " >" . $fila['comunidad'] . " </option>";
                            }
                        }
                        ?>
                    </select>   
                    <input type="submit" name="viajescomunidad" value="Ver por comunidad" />
                    <input type="submit" name="todos" value ="Ver todos los viajes"/> 
                    <?php if (!isset($_SESSION['nombre'])) { ?>  
                        <input type="submit" name="conectarse" value="Conectarse" /> 
                    <?php } ?>

<?php if (isset($_SESSION['nombre'])) { ?>               
                        <input type="submit" name="insertarviaje" value="Insertar Viajes" />
                        <input type="submit" name="modificarmisdatos" value="Modificar mis datos" />
                        <input type="submit" name="cerrar" value="Cerrar sesión" />
<?php } ?>
                </form>
            </div>            