<body>
    <h1>Buscar Juegos</h1>
    <form method="POST" action="index.php?action=buscarJuegos">
        <input type="hidden" name="id_juego" value="buscarJuegos">
        <label for="busqueda" class="form-label" aria-describedby="button-addon2" for="disabledInput">Buscar por título o plataforma:</label>
        <input type="text" name="busqueda" class="form-control" id="disabledInput"  placeholder="Escribe algo..." required>
        <button type="submit" value="buscarJuegos" class="btn btn-outline-light form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">Buscar</button>
    </form>

    <?php if (isset($juegos)): ?>
        <?php if (count($juegos) > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th class="text-warning px-5 py-3 border-3">FOTO</th>
                        <th class="text-warning px-5 py-3 border-3">TÍTULO</th>
                        <th class="text-warning px-5 py-3 border-3">PLATAFORMA</th>
                        <th class="text-warning px-5 py-3 border-3">AÑO DE LANZAMIENTO</th>   
                        <th class="text-warning px-5 py-3 border-3">MODIFICAR</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($juegos as $juego): ?>
                        <tr>
                        <td class="text-center border-3">
                            <img src="../img/<?= $nom.'/'.$juego[3] ?>" alt="">
                            
                        </td>
                        <td class="text-center border-3"><?= $juego[0] ?></td>
                        <td class="text-center border-3"><?= $juego[1] ?></td>
                        <td class="text-center border-3"><?= $juego[2] ?></td>  
                        <td class="text-center border-3">
                            <form action="index.php?action=modificarJuego" method="post">
                                <input type="hidden" name="id_juego" value="<?= $juego[4] ?>">
                                <input type="submit" value="Modificar" class="btn btn-outline-light">
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="index.php?action=agregarJuego">Agregar Juego</a>
        <?php else: ?>
            <p>No se encontraron resultados para "<?= $_GET["busqueda"] ?>".</p>
        <?php endif; ?>
    <?php endif; ?>
</body>

