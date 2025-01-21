<body>
    <h1>Mis Amigos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amigos as $amigo): ?>
                <tr>
                    <td><?= htmlspecialchars($amigo['nombre']) ?></td>
                    <td><?= htmlspecialchars($amigo['apellidos']) ?></td>
                    <td><?= htmlspecialchars($amigo['fecha_nacimiento']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=agregarAmigo">Agregar Amigo</a>
</body>