<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <style>
        header{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
                div{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: auto;
                }
        }
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<header>
    <?php
        if (isset($_REQUEST["action"])) {
            $action = strtolower($_REQUEST["action"]);
            if (strcmp($action, "login")!=0) {
                if (strcmp($_SESSION["tipo_usuario"],"admin")==0) {
    ?>
                    <div>
                        <form action="./index.php?action=listaContactos" method="post">
                            <button type="submit" class="btn btn-outline-light">Lista De Contactos</button>
                        </form>
                        <form action="./index.php?action=listaUsuariosAdmin" method="post">
                            <button type="submit" class="btn btn-outline-light">Lista De Usuarios</button>
                        </form>
                        <form action="./index.php?action=login" method="post">
                            <button type="submit" class="btn btn-outline-light">Cerrar Sesion</button>
                        </form>
                    </div>
    <?php
                }else{
    ?>
                    <div>
                        <form action="./index.php?action=listaAmigos" method="post">
                            <button type="submit" class="btn btn-outline-light">Lista De Amigos</button>
                        </form>
                        <form action="./index.php?action=listaJuegos" method="post">
                            <button type="submit" class="btn btn-outline-light">Lista De Juegos</button>
                        </form>
                        <form action="./index.php?action=listaPrestamos" method="post">
                            <button type="submit" class="btn btn-outline-light">Lista De Prestamos</button>
                        </form>
                        <form action="./index.php?action=login" method="post">
                            <button type="submit" class="btn btn-outline-light">Cerrar Sesion</button>
                        </form>
                    </div>
    <?php        
                }
            }
        }
    ?>       
</header>