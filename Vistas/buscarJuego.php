<body>
    <h1>Buscar Juegos</h1>
    <form method="POST" action="index.php?action=buscarJuegos">
        <input type="hidden" name="id_juego" value="buscarJuegos">
        <label for="busqueda" class="form-label" aria-describedby="button-addon2" for="disabledInput">Buscar por título o plataforma:</label>
        <input type="text" name="busqueda" class="form-control" id="disabledInput"  placeholder="Escribe algo..." required>
        <button type="submit" value="buscarJuegos" class="btn btn-outline-light form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">Buscar</button>
    </form>
</body>