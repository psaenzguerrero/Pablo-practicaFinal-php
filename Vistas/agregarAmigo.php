
<body>
    <?php
    if (isset($_REQUEST["action"])) {
        $action = strtolower($_REQUEST["action"]);
        if (strcmp($action, "modificaramigo")) {
            echo "<h1>AGREGAR AMIGO</h1>";
    ?>
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <form method="POST" action="index.php?action=agregarAmigo">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value ="<?php  ?>" required>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" value = "" required>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value = "" required>
                <button type="submit">Guardar</button>
            </form>
    <?php
        }else{
    ?>
            <?php if ($amigo): ?>
                <form action="index.php?action=guardarCambios" method="post">
                    <input type="hidden" name="id-amigo" value="<?= $_POST["id-amigo"] ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?= $amigox["nombre"] ?>" required>
                    <br>
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?= $amigox["apellidos"] ?>" required>
                    <br>
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $amigox["fecha_nacimiento"] ?>" required>
                    <br>
                    <button type="submit">Guardar Cambios</button>
                </form>
            <?php endif; ?>
        
    <?php
    }
}
    ?>
    
    
</body>
