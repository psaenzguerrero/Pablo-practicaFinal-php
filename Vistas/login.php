<body>
<h1>Iniciar Sesión</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="index.php?action=login">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
