<body>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $amigo): ?>
            <tr>
                <td><?= $amigo['nombre'] ?></td>
                <td><?= $amigo['apellidos'] ?></td>
                <td><?= $amigo['fecha_nacimiento'] ?></td>
                <td>
                    <a href="index.php?action=modificarAmigo&id=<?= $amigo['id'] ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>