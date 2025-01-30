<body>
    <h1>Mis Prestamos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>AMIGO</th>
                <th>TITULO</th>
                <th>FOTO</th>
                <th>AÑO LANZAMIENTO</th>
                <th>DEVUELTO</th>
                <th>MODIFICAR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= $prestamo[0] ?></td>
                    <td><?= $prestamo[1] ?></td>
                    <td><?= $prestamo[2] ?></td>
                    <td><?= $prestamo[3] ?></td>  
                    <td><?= $prestamo[4] ?></td>
                    <td>
                        <form action="index.php?action=modificarPrestamo" method="post">
                            <input type="hidden" name="id_prestamo" value="<?= $prestamo[5] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarPrestamo">Agregar Prestamo</a>
</body>