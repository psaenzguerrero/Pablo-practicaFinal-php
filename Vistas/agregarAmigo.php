
<body>
    <h1>Agregar Nuevo Amigo</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="index.php?action=agregarAmigo">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" required>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>

        
        <button type="submit">Guardar</button>
    </form>
</body>
