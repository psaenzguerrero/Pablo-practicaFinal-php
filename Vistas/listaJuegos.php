<main>
    <section id="lista">
    <?php if (isset($juegos)): ?>
        <?php if (count($juegos) > 0): ?>
            <?php
                $usu = new Usuario();
                $nom = $usu->obtenerPorId($id_usuario)['nombre_usuario'];    
            ?>
            <h1>Mis Juegos</h1>
            <table>
                <thead>
                    <tr>
                        <th class="text-warning px-5 py-3">FOTO</th>
                        <th class="text-warning px-5 py-3">TÍTULO</th>
                        <th class="text-warning px-5 py-3">PLATAFORMA</th>
                        <th class="text-warning px-5 py-3">AÑO DE LANZAMIENTO</th>   
                        <th class="text-warning px-5 py-3">MODIFICAR</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($juegos as $juego): ?>
                        <tr>
                        <td class="text-center">
                            <img src="../img/<?= $nom.'/'.$juego[3] ?>" alt="">    
                        </td>
                        <td class="text-center"><?= $juego[0] ?></td>
                        <td class="text-center"><?= $juego[1] ?></td>
                        <td class="text-center"><?= $juego[2] ?></td>  
                        <td class="text-center">
                            <form action="index.php?action=modificarJuego" method="post">
                                <input type="hidden" name="id_juego" value="<?= $juego[4] ?>">
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
        <div>
            <a href="index.php?action=agregarJuego">Agregar Juego</a>
        </div>
        <div>
            <form action="index.php?action=buscadorJuegos" method="post">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>
    </section>
    
</main>

