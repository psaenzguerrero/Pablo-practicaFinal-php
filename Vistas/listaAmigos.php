<?php
    if (!strcmp($_SESSION["tipo_usuario"],"admin")==0){
?>
    <main>
        <section id="listaA">
            <?php if (isset($amigos)): ?>
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
                <?php else: ?>
                    <p>No se encontraron resultados para "<?= $_POST["busqueda"] ?>".</p>
                <?php endif; ?>
            <?php endif; ?>
            <div>
                <a href="index.php?action=agregarAmigo">Agregar Amigo</a>
                <form action="index.php?action=buscadorAmigos" method="post">
                <input type="submit" value="Buscar">
                </form>
            </div>
        </section>
        
    </main>
<?php        
    }else{
?>
    <main>
        <section>
            <?php if (isset($amigos)): ?>
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
                <?php else: ?>
                    <p>No se encontraron resultados para "<?= $_POST["busqueda"] ?>".</p>
                <?php endif; ?>
            <?php endif; ?>
            <div>
                <a href="index.php?action=agregarAmigoAdmin">Agregar Contacto</a>
                <form action="index.php?action=buscadorAmigos" method="post">
                <input type="submit" value="Buscar">
                </form>
            </div>
        </section>
        
    </main>
<?php
    };
?>
