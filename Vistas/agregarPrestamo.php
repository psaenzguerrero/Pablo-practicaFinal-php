<body>
    <?php
    if (isset($_REQUEST["action"])) {
        $action = strtolower($_REQUEST["action"]);

        if (!strcmp($action, "modificarprestamo") == 0) {
            echo "<h1>AGREGAR PRÉSTAMO</h1>";
    ?>
        <?php 
            if (isset($error)) echo "<p style='color: red;'>$error</p>"; 
        ?>
            <form method="POST" action="index.php?action=agregarPrestamo">
                <label for="id_amigo">Selecciona un Amigo:</label>
                <select name="id_amigo" required>
                    <?php foreach ($amigos as $amigo): ?>
                        <option value="<?= $amigo[4] ?>"><?= $amigo[0] ?></option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label for="id_juego">Selecciona un Juego:</label>
                <select name="id_juego" required>
                    <?php foreach ($juegos as $juego): ?>
                        <option value="<?= $juego[4] ?>"><?= $juego[0] ?></option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label for="fecha_prestamo">Fecha de Préstamo:</label>
                <input type="date" name="fecha_prestamo" required>
                <br>

                <label for="devuelto">Devuelto:</label>
                <input type="checkbox" name="devuelto" value="1">
                <br>

                <button type="submit">Guardar</button>
            </form>
    <?php
        } else {
    ?>
        <?php if ($prestamo): ?>
            <h1>MODIFICAR PRÉSTAMO</h1>
            <form action="index.php?action=guardarCambiosPrestamo" method="post">
                <input type="hidden" name="id_prestamo" value="<?= $_POST["id_prestamo"] ?>">

                <label for="id_amigo">Selecciona un Amigo:</label>
                <select name="id_amigo" required>
                    <?php foreach ($amigos as $amigo): ?>
                        <option value="<?= $amigo[3] ?>" <?= ($amigo[3] == $_POST["id_amigo"]) ? 'selected' : '' ?>>
                            <?= $amigo[0] . " " . $amigo[1] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label for="id_juego">Selecciona un Juego:</label>
                <select name="id_juego" required>
                    <?php foreach ($juegos as $juego): ?>
                        <option value="<?= $juego[4] ?>" <?= ($juego[4] == $_POST["id_juego"]) ? 'selected' : '' ?>>
                            <?= $juego[0] . " (" . $juego[1] . ")" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label for="fecha_prestamo">Fecha de Préstamo:</label>
                <input type="date" name="fecha_prestamo" value="<?= $_POST["fecha_prestamo"] ?>" required>
                <br>

                <label for="devuelto">Devuelto:</label>
                <input type="checkbox" name="devuelto" value="1" <?= $_POST["devuelto"] ? 'checked' : '' ?>>
                <br>

                <button type="submit">Guardar Cambios</button>
            </form>
        <?php endif; ?>
    <?php
        }
    }
    ?>
</body>
