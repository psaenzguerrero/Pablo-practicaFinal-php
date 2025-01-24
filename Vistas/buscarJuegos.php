<body>
    <h1>Buscar Juegos</h1>
    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="buscarJuegos">
        <label for="busqueda">Buscar por título o plataforma:</label>
        <input type="text" name="busqueda" placeholder="Escribe algo..." required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (isset($juegos)): ?>
        <h2>Resultados de la Búsqueda</h2>
        <?php if (count($juegos) > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Plataforma</th>
                        <th>Año de Lanzamiento</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($juegos as $juego): ?>
                        <tr>
                            <td><?= htmlspecialchars($juego['titulo']) ?></td>
                            <td><?= htmlspecialchars($juego['plataforma']) ?></td>
                            <td><?= htmlspecialchars($juego['anio_lanzamiento']) ?></td>
                            <td><img src="<?= htmlspecialchars($juego['foto']) ?>" alt="Foto" style="width: 50px; height: 50px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados para "<?= htmlspecialchars($_GET['busqueda']) ?>".</p>
        <?php endif; ?>
    <?php endif; ?>
</body>

