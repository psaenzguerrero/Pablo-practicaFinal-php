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
                    <td style="display:none"><?= $amigo[4] ?></td>
                    <td>
                        <form action="index.php?action=modificarAmigoAdmin" method="post">
                            <input type="hidden" name="nombre_usuario" value="<?= $amigo[3] ?>">
                            <input type="hidden" name="id_amigo" value="<?= $amigo[4] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarAmigo">Agregar Usuario</a>
</body>