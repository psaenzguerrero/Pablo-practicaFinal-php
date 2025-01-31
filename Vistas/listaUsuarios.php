<body>
    <h1>Buscar Usuarios</h1>
        <form method="POST" action="index.php?action=buscarUsuarios">
            <input type="hidden" name="id_usuario" value="buscarUsuarios">
            <label for="busqueda">Buscar por nombre o apellidos:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarUsuarios">Buscar</button>
        </form>
    <h1>Usuarios del Servidor</h1>
    <table border="1">
        <thead>
            <tr>
                <th class="text-warning px-5 py-3 border-3">NOMBRE</th>
                <th class="text-warning px-5 py-3 border-3">CONTRASEÑA</th>
                <th class="text-warning px-5 py-3 border-3">MODIFICAR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td class="text-center border-3"><?= $usuario[1] ?></td>
                    <td class="text-center border-3"><?= substr_replace($usuario[2], '******', 0) ?></td>
                    <td class="text-center border-3">
                        <form action="index.php?action=modificarUsuario" method="post">
                            <input type="hidden" name="id_usuario" value="<?= $usuario[0] ?>">
                            <input type="hidden" name="nombre_usuario" value="<?= $usuario[1] ?>">
                            <input type="hidden" name="contrasena" value="<?= $usuario[2] ?>">
                            <input type="submit" value="Modificar" class="btn btn-outline-light">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarUsuario">Agregar Usuario</a>
</body>