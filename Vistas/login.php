<main>
    <section id="login">
        <h1>INICIAR SESION</h1>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form method="POST" action="index.php?action=login">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" <?php if(isset($_COOKIE["nombre_usuario"])) echo 'value='.$_COOKIE["nombre_usuario"].''; ?> required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>
            <br>
            <label for="devuelto">Recuerdame:</label>
            <input type="checkbox" name="recuerdame" value="1" checked>
            <br>
            <button type="submit" class="btn btn-outline-light">Iniciar Sesión</button>
        </form>
    </section>
</main>

