<main>
    <section id="lista">
    <?php if (isset($prestamos)): ?>
                <?php if (count($prestamos) > 0): ?>
                    <?php
                        $usu = new Usuario();
                        $nom = $usu->obtenerPorId($id_usuario)['nombre_usuario'];
                    ?>
                    <h1>Mis Prestamos</h1>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-warning px-5 py-3">AMIGO</th>
                                <th class="text-warning px-5 py-3">TITULO</th>
                                <th class="text-warning px-5 py-3">FOTO</th>
                                <th class="text-warning px-5 py-3">FECHA DE PRESTAMO</th>
                                <th class="text-warning px-5 py-3">DEVUELTO</th>
                                <th class="text-warning px-5 py-3">MODIFICAR</th>
                                <th class="text-warning px-5 py-3">PUNTUACION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prestamos as $prestamo): ?>
                                <tr>
                                    <td><img src="../img/usu.png" class="usu" alt=""></td>
                                    <td class="text-center"><?= $prestamo[0] ?></td>
                                    <td class="text-center"><?= $prestamo[1] ?></td>
                                    <td class="text-center">
                                        <img src="../img/<?=$nom.'/'. $prestamo[2] ?>" alt="">                                        
                                    </td>
                                    <td class="text-center"><?= $prestamo[3] ?></td>  
                                    <td class="text-center">
                                        <?php 
                                            if($prestamo[4]==0){
                                        ?>        
                                                
                                                <form action='index.php?action=devolver' method='post'>
                                                    <input type='hidden' name='devuelto' value='<?= $prestamo[4] ?>'>
                                                    <input type='hidden' name='id_prestamo' value='<?= $prestamo[5] ?>'>
                                                    <input type='submit' value='Devolver' class='btn btn-outline-warning'>
                                                </form>
                                        <?php
                                            }else{
                                                echo "<button type='button' class='btn btn-dark disabled'>Devuelto</button>";
                                            } 
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="index.php?action=modificarPrestamo" method="post">
                                            <input type="hidden" name="fecha_prestamo"  value="<?= $prestamo[3] ?>">
                                            <input type="hidden" name="devuelto" value="<?= $prestamo[4] ?>">
                                            <input type="hidden" name="id_prestamo" value="<?= $prestamo[5] ?>">
                                            <input type="hidden" name="id_amigo" value="<?= $prestamo[6] ?>">
                                            <input type="hidden" name="id_juego" value="<?= $prestamo[7] ?>">
                                            <input type="submit" value="Modificar" class="btn btn-outline-light">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="index.php?action=modificarNota" method="post">
                                            <input type="hidden" name="id_prestamo" value="<?= $prestamo[5] ?>">
                                            <input type="number" step=".01"   name="puntuacion" value="<?= $prestamo[8] ?>">
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
                <a href="index.php?action=agregarPrestamo">Agregar Prestamo</a>
                <form action="index.php?action=buscadorPrestamos" method="post">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </section>
        
</main>