<body>
    <h1>CONTACTOS DEL SERVIDOR</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
                <th>PROPIETARIO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amigos as $amigo): ?>
                <tr>
                    <td><?= $amigo[0] ?></td>
                    <td><?= $amigo[1] ?></td>
                    <td><?= $amigo[2] ?></td>
                    <td><?= $amigo[3] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarUsuario">Agregar Usuario</a>
</body>