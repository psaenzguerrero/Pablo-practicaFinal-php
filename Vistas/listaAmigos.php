<?php
    if (!strcmp($_SESSION["tipo_usuario"],"admin")==0){
?>
    <body>
        <h1>Buscar Amigos</h1>
        <form method="POST" action="index.php?action=buscarAmigos">
            <input type="hidden" name="id_amigo" value="buscarAmigos">
            <label for="busqueda">Buscar por nombre o apellidos:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarAmigos" class="btn btn-outline-light">Buscar</button>
        </form>

        <?php if (isset($amigos)): ?>
            <h2>Resultados de la Búsqueda</h2>
            <?php if (count($amigos) > 0): ?>
                <h1>Mis Amigos</h1>
                <table border="1">
                    <thead>
                        <tr>
                            <th class="text-warning px-5 py-3">NOMBRE</th>
                            <th class="text-warning px-5 py-3">APELLIDOS</th>
                            <th class="text-warning px-5 py-3">FECHA DE NACIMIENTO</th>
                            <th class="text-warning px-5 py-3">MODIFICAR</th>
                            <th style="display:none">id-amigo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($amigos as $amigo): ?>
                            <tr>
                                <td class="text-center"><?= $amigo[0] ?></td>
                                <td class="text-center"><?= $amigo[1] ?></td>
                                <td class="text-center"><?= $amigo[2] ?></td>
                                <td style="display:none"><?= $amigo[3] ?></td>
                                <td class="text-center">
                                    <form action="index.php?action=modificarAmigo" method="post">
                                        <input type="hidden" name="id_amigo" value="<?= $amigo[3] ?>">
                                        <input type="submit" value="Modificar" class="btn btn-outline-light">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="index.php?action=agregarAmigo">Agregar Amigo</a>
            <?php else: ?>
                <p>No se encontraron resultados para "<?= $_GET["busqueda"] ?>".</p>
            <?php endif; ?>
        <?php endif; ?>
    </body>
<?php        
    }else{
?>
    <body>
        <h1>Buscar Contactos</h1>
        <form method="POST" action="index.php?action=buscarAmigos">
            <input type="hidden" name="id_amigo" value="buscarAmigos">
            <label for="busqueda">Buscar por nombre o apellidos:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarAmigos">Buscar</button>
        </form>

        <?php if (isset($amigos)): ?>
            <h2>Resultados de la Búsqueda</h2>
            <?php if (count($amigos) > 0): ?>
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
                <a href="index.php?action=agregarAmigoAdmin">Agregar Contacto</a>
            <?php else: ?>
                <p>No se encontraron resultados para "<?= $_GET["busqueda"] ?>".</p>
            <?php endif; ?>
        <?php endif; ?>
    </body>
<?php
    };
?>
