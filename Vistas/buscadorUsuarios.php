<body>
<h1>Buscar Usuarios</h1>
        <form method="POST" action="index.php?action=buscarUsuarios">
            <input type="hidden" name="id_usuario" value="buscarUsuarios">
            <label for="busqueda">Buscar por nombre o apellidos:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarUsuarios">Buscar</button>
        </form>
</body>