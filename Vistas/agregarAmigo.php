
<main>
    <?php
    if (isset($_REQUEST["action"])) {
        $action = strtolower($_REQUEST["action"]);
        if (!strcmp($action, "modificaramigo")==0 && !strcmp($action, "modificaramigoadmin")==0) {
            echo "<h1>AGREGAR AMIGO</h1>";
    ?>
        <?php 
            if (isset($error)) echo "<p style='color: red;'>$error</p>"; 
        ?>
            <?php 
                if(strcmp($action, "agregaramigoadmin")==0){
            ?>
                    <form method="POST" action="index.php?action=agregarAmigoAdmin">
                        <label for="nombre_usuario">Nombre Propietario:</label>
                        <select name="nombre_usuario">
                            <?php foreach ($usuarios as $usuario): ?>
                                
                                <option value=<?= $usuario[0] ?>><?= $usuario[1] ?></option>

                            <?php endforeach; ?>
                        </select>    
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value ="<?php  ?>" required>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value = "" required>
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" value = "" required>
                        <button type="submit" class="btn btn-outline-light">Guardar</button>
                    </form>
            <?php
                }else{
            ?>
                <form method="POST" action="index.php?action=agregarAmigo">    
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value ="<?php  ?>" required>
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" value = "" required>
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" value = "" required>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </form>
            <?php
                }
            ?>
    <?php
        }else{
    ?>
        <?php if ($amigo): ?>
            <form action="index.php?action=guardarCambios" method="post">
                <input type="hidden" name="id_amigo" value="<?= $_POST["id_amigo"] ?>">

                <?php if(strcmp($action, "modificaramigoadmin")==0): ?>
                    <label for="nombre_usuario">Nombre Propietario:</label>
                        <select name="nombre_usuario">
                            <?php foreach ($usuarios as $usuario): ?>
                                
                                <option value=<?= $usuario[0] ?>><?= $usuario[1] ?></option>

                            <?php endforeach; ?>
                        </select>
                <?php endif; ?>    
                <br>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $amigox["nombre"] ?>" required>
                <br>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?= $amigox["apellidos"] ?>" required>
                <br>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $amigox["fecha_nacimiento"] ?>" required>
                <br>
                <button type="submit" class="btn btn-outline-light">Guardar Cambios</button>
            </form>
        <?php endif; ?>
    <?php
    }
}
    ?> 
</main>
