<body>
    <h1>Usuarios del Servidor</h1>
    <table border="1">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>CONTRASEÑA</th>
                <th>MODIFICAR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario[1] ?></td>
                    <td><?= substr_replace($usuario[2], '******', 0) ?></td>
                    <td>
                        <form action="index.php?action=modificarUsuario" method="post">
                            <input type="hidden" name="id_usuario" value="<?= $usuario[0] ?>">
                            <input type="hidden" name="nombre_usuario" value="<?= $usuario[1] ?>">
                            <input type="hidden" name="contrasena" value="<?= $usuario[2] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarUsuario">Agregar Usuario</a>
</body>