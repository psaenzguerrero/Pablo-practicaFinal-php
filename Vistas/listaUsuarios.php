<body>
    <h1>Usuarios del Servidor</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>contraseña</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario[0] ?></td>
                    <td><?= $usuario[1] ?></td>
                    <td><?= substr_replace($usuario[2], '******', 0) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarUsuario">Agregar Usuario</a>
</body>