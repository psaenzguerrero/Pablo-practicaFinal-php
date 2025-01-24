<body>
    <h1>Agregar Nuevo Juego</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="index.php?action=agregarJuego">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required>
        <br>
        <label for="plataforma">Plataforma:</label>
        <input type="text" name="plataforma" required>
        <br>
        <label for="anio_lanzamiento">Año de Lanzamiento:</label>
        <input type="date" name="anio_lanzamiento" required>
        <br>
        <label for="foto">Archivo de foto:</label>
        <input type="text" name="foto" required>
        <br>
        <button type="submit">Guardar</button>
    </form>

    <hr>

    <h1>Modificar Juego</h1>
    <?php if (isset($juego)): ?>
        <form method="POST" action="index.php?action=guardarCambiosJuego">
            <input type="hidden" name="id-juego" value="<?= htmlspecialchars($juego['id']) ?>">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" value="<?= htmlspecialchars($juego['titulo']) ?>" required>
            <br>
            <label for="plataforma">Plataforma:</label>
            <input type="text" name="plataforma" value="<?= htmlspecialchars($juego['plataforma']) ?>" required>
            <br>
            <label for="anio_lanzamiento">Año de Lanzamiento:</label>
            <input type="date" name="anio_lanzamiento" value="<?= htmlspecialchars($juego['anio_lanzamiento']) ?>" required>
            <br>
            <label for="foto">Archivo de foto:</label>
            <input type="text" name="foto" value="<?= htmlspecialchars($juego['foto']) ?>" required>
            <br>
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php else: ?>
        <p style="color: red;">No se encontró el juego para modificar.</p>
    <?php endif; ?>
</body>
