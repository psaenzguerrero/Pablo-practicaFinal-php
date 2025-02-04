<?php 
    if (!strcmp($_SESSION['tipo_usuario'],"admin")==0){
?>
<main>
<h1>Bienvenido a tu Pagina de Principal</h1>
    <nav>
        <ul>
            <li><a href="index.php?action=listaAmigos">Lista de Amigos</a></li>
            <li><a href="index.php?action=listaJuegos">Lista de Juegos</a></li>
            <li><a href="index.php?action=listaPrestamos">Lista de Prestamos</a></li>
        </ul>
    </nav>
</main>
<?php
    }else{
?>
<main>
<h1>Bienvenido al Panel Principal</h1>
    <nav>
        <ul>
            <li><a href="index.php?action=listaContactos">Lista de Contactos</a></li>
            <li><a href="index.php?action=listaUsuariosAdmin">Lista de Usuarios</a></li>
        </ul>
    </nav>
</main>
<?php
    }
?>