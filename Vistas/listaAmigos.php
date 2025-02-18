<?php
    if (!strcmp($_SESSION["tipo_usuario"],"admin")==0){
?>
    <main>
        <section id="lista">
            <?php if (isset($amigos)): ?>
                <?php if (count($amigos) > 0): ?>
                    <h1>Mis Amigos</h1>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-warning px-5 py-3">NOMBRE</th>
                                <th class="text-warning px-5 py-3">APELLIDOS</th>
                                <th class="text-warning px-5 py-3">FECHA DE NACIMIENTO</th>
                                <th class="text-warning px-5 py-3">MODIFICAR</th>
                                <th style="display:none">id-amigo</th>
                                <th class="text-warning px-5 py-3">PUNTUACION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($amigos as $amigo): ?>
                                <tr>
                                    <td><img src="../img/usu.png" class="usu" alt=""></td>
                                    <td class="text-center  px-5 py-3"><?= $amigo[0] ?></td>
                                    <td class="text-center  px-5 py-3"><?= $amigo[1] ?></td>
                                    <td class="text-center  px-5 py-3"><?= $amigo[2] ?></td>
                                    <td style="display:none"><?= $amigo[3] ?></td>
                                    <td class="text-center px-5 py-3">
                                        <form action="index.php?action=modificarAmigo" method="post">
                                            <input type="hidden" name="id_amigo" value="<?= $amigo[3] ?>">
                                            <input type="submit" value="Modificar" class="btn btn-outline-light">
                                        </form>
                                    </td>                                  
                                        <?php foreach ($amigos2 as $amigo2): ?>
                                            <?php if ($amigo2[0]===$amigo[3]) {
                                            ?>
                                            <td class="text-center px-5 py-3">
                                                <?php echo"$amigo2[1]" ?>
                                            </td>
                                            <?php
                                            }
                                            ?>   
                                        <?php endforeach; ?>                                   
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>    
                <?php else: ?>
                    <p>No se encontraron resultados para "<?= $_POST["busqueda"] ?>".</p>
                <?php endif; ?>
            <?php endif; ?>
            <div>
                <a href="index.php?action=listaAmigosOrdenFecha">Orden Fecha</a>
                <a href="index.php?action=listaAmigosOrdenNacimiento">Orden Alfabético</a>
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
        <section id="lista">
            <?php if (isset($amigos)): ?>
                <?php if (count($amigos) > 0): ?>
                    <h1>CONTACTOS DEL SERVIDOR</h1>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-warning px-5 py-3">Nombre</th>
                                <th class="text-warning px-5 py-3">Apellidos</th>
                                <th class="text-warning px-5 py-3">Fecha de Nacimiento</th>
                                <th class="text-warning px-5 py-3">PROPIETARIO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($amigos as $amigo): ?>
                                <tr>
                                    <td><img src="../img/usu.png" class="usu" alt=""></td>
                                    <td class="px-5 py-3"><?= $amigo[0] ?></td>
                                    <td class="px-5 py-3"><?= $amigo[1] ?></td>
                                    <td class="px-5 py-3"><?= $amigo[2] ?></td>
                                    <td class="px-5 py-3"><?= $amigo[3] ?></td>
                                    <td style="display:none"><?= $amigo[4] ?></td>
                                    <td class="px-5 py-3">
                                        <?php
                                            if ($amigo[5]==0) {
                                                ?>
                                                <form action="index.php?action=validar" method="post">
                                                    <input type="hidden" name="id_amigo" value="<?= $amigo[4] ?>">
                                                    <input type="submit" value="Validar" class="btn btn-outline-light">
                                                </form>
                                        <?php        
                                            }
                                        ?>
                                        
                                    </td>
                                    <td class="px-5 py-3">
                                        <form action="index.php?action=modificarAmigoAdmin" method="post">
                                            <input type="hidden" name="nombre_usuario" value="<?= $amigo[3] ?>">
                                            <input type="hidden" name="id_amigo" value="<?= $amigo[4] ?>">
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
