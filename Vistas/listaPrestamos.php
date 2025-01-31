<body>
<h1>Buscar Prestamos</h1>
        <form method="POST" action="index.php?action=buscarPrestamos">
            <input type="hidden" name="id_prestamo" value="buscarPrestamos">
            <label for="busqueda">Buscar por nombre o titulo:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarPrestamos" class="btn btn-outline-light">Buscar</button>
        </form>
        <?php if (isset($prestamos)): ?>
            <h2>Resultados de la Búsqueda</h2>
                <?php if (count($prestamos) > 0): ?>
                    <h1>Mis Prestamos</h1>
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-warning px-5 py-3 border-3">AMIGO</th>
                                <th class="text-warning px-5 py-3 border-3">TITULO</th>
                                <th class="text-warning px-5 py-3 border-3">FOTO</th>
                                <th class="text-warning px-5 py-3 border-3">AÑO LANZAMIENTO</th>
                                <th class="text-warning px-5 py-3 border-3">DEVUELTO</th>
                                <th class="text-warning px-5 py-3 border-3">MODIFICAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prestamos as $prestamo): ?>
                                <tr>
                                    <td class="text-center border-3"><?= $prestamo[0] ?></td>
                                    <td class="text-center border-3"><?= $prestamo[1] ?></td>
                                    <td class="text-center border-3">
                                        <img src="../img/<?= $prestamo[2] ?>" alt="">                                        
                                    </td>
                                    <td class="text-center border-3"><?= $prestamo[3] ?></td>  
                                    <td class="text-center border-3"><?= $prestamo[4] ?></td>
                                    <td class="text-center border-3">
                                        <form action="index.php?action=modificarPrestamo" method="post">
                                            <input type="hidden" name="fecha_prestamo" value="<?= $prestamo[3] ?>">
                                            <input type="hidden" name="devuelto" value="<?= $prestamo[4] ?>">
                                            <input type="hidden" name="id_prestamo" value="<?= $prestamo[5] ?>">
                                            <input type="hidden" name="id_amigo" value="<?= $prestamo[6] ?>">
                                            <input type="hidden" name="id_juego" value="<?= $prestamo[7] ?>">
                                            <input type="submit" value="Modificar" class="btn btn-outline-light">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            <a href="index.php?action=agregarPrestamo">Agregar Prestamo</a>
            <?php else: ?>
                    <p>No se encontraron resultados para "<?= $_GET["busqueda"] ?>".</p>
                <?php endif; ?>
            <?php endif; ?>
</body>