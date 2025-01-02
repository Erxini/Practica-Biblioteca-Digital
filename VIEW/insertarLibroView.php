<div class="centro">
    <h2 align="center"> <?php echo $titulo; ?></h2>
    <?php
    if (isset($mensaje)) {
        echo '<h3 align="center">' . $mensaje . '</h3>';
    }
    ?>
    <div style="text-align:center">
        <form action="<?php echo $this->url('libros', $modo); ?>" method="post" enctype="multipart/form-data">
            <p>ISBN: <input name="ISBN" value="<?php if (isset($libro)) {
                                                    echo $libro->getISBN();
                                                } ?>" type="text" /></p>
            <input name="oldISBN" hidden value="<?php if (isset($libro)) {
                                                    echo $libro->getISBN();
                                                } ?>">
            <p>Título: <input name="titulo" value="<?php if (isset($libro)) {
                                                        echo $libro->getTitulo();
                                                    } ?>" type="text" /></p>
            <p>Autor: <input name="autor" value="<?php if (isset($libro)) {
                                                        echo $libro->getAutor();
                                                    } ?>" type="text" /></p>
            <?php
            if (isset($fotoant)) {
                echo '<p>Imagen actual:';
                echo '<br><img width="20%" src="data:image/jpeg;base64, ' . base64_encode(($fotoant)) . '">';
                echo '<br></p>';
            }
            ?>
            <p>Imagen: <input type="file" name="foto" accept="image/*" /></p>
            <p><input type="submit" name="<?php echo $modo; ?>" value="<?php echo $textoboton; ?>" /></p>
        </form>
    </div>
</div>