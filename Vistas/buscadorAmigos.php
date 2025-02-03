<?php
    if (!strcmp($_SESSION["tipo_usuario"],"admin")==0){
?>
<main>
        <h1>Buscar Amigos</h1>
        <form method="POST" action="index.php?action=buscarAmigos">
            <input type="hidden" name="id_amigo" value="buscarAmigos">
            <label for="busqueda">Buscar por nombre o apellidos:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarAmigos" class="btn btn-outline-light">Buscar</button>
        </form>
</main>
<?php        
    }else{
?>
    <main>
        <h1>Buscar Contactos</h1>
        <form method="POST" action="index.php?action=buscarAmigos">
            <input type="hidden" name="id_amigo" value="buscarAmigos">
            <label for="busqueda">Buscar por nombre o apellidos:</label>
            <input type="text" name="busqueda"  placeholder="Escribe algo..." required>
            <button type="submit" value="buscarAmigos">Buscar</button>
        </form>
    </main>
<?php
    };
?>