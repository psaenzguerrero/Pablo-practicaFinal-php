<body>
    <h1>Agregar Nuevo Juego</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="index.php?action=agregarJuego">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required>
        <label for="plataforma">Plataforma:</label>
        <input type="text" name="plataforma" required>
        <label for="anio_lanzamiento">Año de Lanzamiento:</label>
        <input type="date" name="anio_lanzamiento" required>
        <label for="foto">Archivo de foto:</label>
        <input type="text" name="foto" required>

        
        <button type="submit">Guardar</button>
    </form>
</body>