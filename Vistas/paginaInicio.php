<?php 
    if (!strcmp($_SESSION['tipo_usuario'],"admin")==0){
?>
<main>
        <section id="pagina_usu">
            <div>
                <h2>Prueba Nuevas Experiencias</h2>
                <img src="../img/deco1.png" alt="">
                <a href="https://youtu.be/xvFZjo5PgG0?si=qrBaKOYoT8zO6pWF">Ver Mas</a>
            </div>
            <div>
            <h1>Bienvenido a tu Pagina</h1>
            <nav>
                <ul>
                    <li><a href="index.php?action=listaAmigos">Lista de Amigos</a></li>
                    <li><a href="index.php?action=listaJuegos">Lista de Juegos</a></li>
                    <li><a href="index.php?action=listaPrestamos">Lista de Prestamos</a></li>
                </ul>
            </nav>
            </div>
        </section>
</main>
<?php
    }else{
?>
<main>
    <section id="pagina_usu2">
        <h1>Bienvenido al Panel Principal</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=listaContactos">Lista de Contactos</a></li>
                <li><a href="index.php?action=listaUsuariosAdmin">Listas de Usuarios</a></li>
            </ul>
        </nav>
    </section>
</main>
    

<?php
    }
?>