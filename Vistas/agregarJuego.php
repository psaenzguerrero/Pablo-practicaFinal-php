
<main>
    <section id="agre">
        <?php
        if (isset($_REQUEST["action"])) {
            $action = strtolower($_REQUEST["action"]);
            if (strcmp($action, "modificarjuego")) {
                echo "<h1>AGREGAR JUEGO</h1>";
        ?>
                <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
                <form method="POST" action="index.php?action=agregarJuego" enctype='multipart/form-data'>
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" required>
                    <br>
                    <label for="plataforma">Plataforma:</label>
                    <input type="text" name="plataforma" required>
                    <br>
                    <label for="anio_lanzamiento">Año de Lanzamiento:</label>
                    <input type="number" name="anio_lanzamiento" required>
                    <br>
                    <label for="foto">Archivo de foto:</label>
                    <input type="file" name="foto" required>
                    <br>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </form>
        <?php
            }else{
        ?>
                <?php if ($juego): ?>
                    <h1>Modificar Juego</h1>
                    <form method="POST" action="index.php?action=guardarCambiosJuego" enctype='multipart/form-data'>
                        <input type="hidden" name="id_juego" value="<?= $_POST["id_juego"] ?>">
                        <label for="titulo">Titulo:</label>
                        <input type="text" name="titulo" value="<?= $juego["titulo"] ?>" required>
                        <br>
                        <label for="plataforma">Plataforma:</label>
                        <input type="text" name="plataforma" value="<?= $juego["plataforma"] ?>" required>
                        <br>
                        <label for="anio_lanzamiento">Año de Lanzamiento:</label>
                        <input type="number" name="anio_lanzamiento" value="<?= $juego["anio_lanzamiento"] ?>" required>
                        <br>
                        <label for="foto">Archivo de foto:</label>
                        <input type="file" name="foto" value="<?= $juego["foto"] ?>" required>
                        <br>
                        <button type="submit" class="btn btn-outline-light">Guardar Cambios</button>
                    </form>
                <?php endif; ?>
            
        <?php
        }
    }
        ?>
    </section> 
</main>
