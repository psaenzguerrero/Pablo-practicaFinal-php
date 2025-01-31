<body>
    <?php
        if (isset($_REQUEST["action"])) {
            $action = strtolower($_REQUEST["action"]);
            if (!strcmp($action, "modificarusuario")==0 ) {
    ?>
                <form method="POST" action="index.php?action=agregarUsuario">    
                    <label for="nombre_usuario">Nombre:</label>
                    <input type="text" name="nombre_usuario" value ="<?php  ?>" required>
                    <label for="contrasena">Contraseña:</label>
                    <input type="text" name="contrasena" value = "" required>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </form>
            <?php
            }else{
            ?>
                <form method="POST" action="index.php?action=guardarCambiosUsuarios"> 
                    <input type="hidden" name="id_usuario" value="<?= $_POST["id_usuario"] ?>">   
                    <label for="nombre_usuario">Nombre:</label>
                    <input type="text" id="nombre_usuario"  name="nombre_usuario" value ="<?= $usuariox["nombre_usuario"]  ?>" required>
                    <label for="contrasena">Contraseña:</label>
                    <input type="text" id="contrasena" name="contrasena" value = "<?= $usuariox["contrasena"]  ?>" required>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </form>
            <?php
            }
        }
            ?>
</body>