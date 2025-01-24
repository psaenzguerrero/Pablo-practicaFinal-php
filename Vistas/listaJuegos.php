<body>
    <h1>Mis Juegos</h1>
    <table>
        <thead>
            <tr>
                <th>FOTO</th>
                <th>TITULOS</th>
                <th>PLATAFORMA</th>
                <th>AÑO LANZAMIENTO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($juegos as $juego): ?>
                <tr>
                    <td><?= $juego[3] ?></td>
                    <td><?= $juego[0] ?></td>
                    <td><?= $juego[1] ?></td>
                    <td><?= $juego[2] ?></td>  
                    <td>
                        <form action="index.php?action=modificarJuego" method="post">
                            <input type="hidden" name="id_juego" value="<?= $juego[4] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarJuego">Agregar Juego</a>
</body>