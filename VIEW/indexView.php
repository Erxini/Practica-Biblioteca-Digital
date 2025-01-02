<div class="centro">
    <h2 align="center"><?php echo $mensaje; ?> </h2>
    <h3 align="center"><?php echo "Número de libros: " . count($registros); ?> </h3>
    <?php
    if (isset($mensaje2)) {
        echo "<h3>" . $mensaje2 . "</h3>";
    }
    ?>

    <hr>
    <table style="margin:0 auto; width: 90%">
        <?php
        if ($registros) {
            foreach ($registros as $fila) {
                echo "<tr>";
                echo "<td><b>ISBN: " . $fila->getISBN() . "</b><br>";
                echo "Título: " . $fila->getTitulo() . "<br>";
                echo "Autor: " . $fila->getAutor() . "<br>";

                if (isset($_SESSION['nombre'])) {
                    // formulario modif-borrar
        ?>
                    <br>
                    <form action="<?php echo $this->url("libros", "modifborrar"); ?>" method="post">
                        <input name="ISBN" type="text" hidden value="<?php echo $fila->getISBN(); ?>">
                        <input type="submit" name="borrarLibro" value="Borrar libro" />
                        <input type="submit" name="modificarLibro" value="Modificar libro" />
                    </form>
                    <br>
        <?php
                }
                echo "</td>";
                echo "<td>";
                // No se asume que los libros tengan imágenes asociadas. Si las tienen, se pueden añadir campos en la base de datos y en el código.
                echo "</td>";

                echo "</tr>";
            }
        }
        ?>

    </table>

    <br>
    <br>
</div>