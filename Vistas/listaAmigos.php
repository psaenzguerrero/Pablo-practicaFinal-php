
<body>
    <h1>Mis Amigos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
                <th>MODIFICAR</th>
                <th style="display:none">id-amigo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amigos as $amigo): ?>
                <tr>
                    <td><?= $amigo[0] ?></td>
                    <td><?= $amigo[1] ?></td>
                    <td><?= $amigo[2] ?></td>
                    <td style="display:none"><?= $amigo[3] ?></td>
                    <td>
                        <form action="index.php?action=modificarAmigo" method="post">
                            <input type="hidden" name="id-amigo" value="<?= htmlspecialchars($amigo[3]) ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarAmigo">Agregar Amigo</a>
</body>
