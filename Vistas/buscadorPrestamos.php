<main>
    <section id="busca">
        <h1>Buscar Prestamos</h1>
        <form method="POST" action="index.php?action=buscarPrestamos">
            <input type="hidden" name="id_prestamo" value="buscarPrestamos">
            <label for="busqueda">Buscar por nombre o titulo:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarPrestamos" class="btn btn-outline-light">Buscar</button>
        </form>
    </section> 
</main>