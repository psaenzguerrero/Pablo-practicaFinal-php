<body>
    <h1>Mis Juegos</h1>
    <table>
        <thead>
            <tr>
                <th>AMIGO</th>
                <th>TITULO</th>
                <th>FOTO</th>
                <th>AÑO LANZAMIENTO</th>
                <th>DEVUELTO</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarPrestamo">Agregar Prestamo</a>
</body>