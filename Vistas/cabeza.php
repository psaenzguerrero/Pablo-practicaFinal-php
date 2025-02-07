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
            justify-content: space-between;
            align-items: center;
            margin: auto;
            background-color: black;
                div{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }     
        }
        main{
            
        }
        body{
            background-image: url("../img/fondo.webp");
        }
        img{
            width: 100px;
            height: 100px;
        }
        tr{
            padding: 10px;
        }
        tbody tr:nth-child(odd) {
            background-color: #4c8bf54a;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #3733336e;
            box-shadow: 1px 0px 4px 6px rgb(197 193 194 / 23%);
        }
        .usu{
            margin: 20px;
            width: 50px;
            height: 50px;
        }
        #login{
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            height: 70vh;
            font-size: 20px;
            text-align:center;
            h1{
                font-size: 70px;
                font-family: "Motiva Sans", Sans-serif;
                margin-bottom: 20px;
            }
            form{

                width: 20%;
                display: flex;
                justify-content: center;
                flex-flow: column;
                label{
                    margin: 10px;
                }
            }
        }
        #pagina_usu{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            font-size: 20px;
            text-align:center;
            margin-top: 20px; 
            img{
                width: 900px;
                height: 500px;
                margin: 20px;
                box-shadow: 1px 0px 4px 6px rgb(197 193 194 / 23%);
            }
            div{
                margin: 20px;
                width: 40%;
            }
            >div:nth-child(1){
                display: flex;
                flex-flow: column;
                justify-content: center;
                align-items: center;
            }
            ul{
                li{
                    list-style-type: none;
                    margin: 40px;
                    a{
                        text-decoration: none;
                        border: 3px solid rgb(0, 188, 140);
                        border-radius:10px;
                        padding: 15px;  
                    }
                    a:hover{
                        border: 3px solid white;
                        color: white;
                    }
                }
            }
        }
        #lista{
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            text-align:center;
            div{
                display: flex;
                input{
                    text-decoration: none;
                    border: 3px solid rgb(0, 188, 140);
                    border-radius:10px;
                    padding: 15px;  
                    background-color: transparent;
                    color: rgb(0, 188, 140);
                    margin: 40px;
                }
                input:hover{
                    border: 3px solid white;
                    color: white;
                }
                a{
                    text-decoration: none;
                    border: 3px solid rgb(0, 188, 140);
                    border-radius:10px;
                    padding: 15px; 
                    margin: 40px; 
                }
                a:hover{
                    border: 3px solid white;
                    color: white;
                }
            }
        }
    </style>
</head>
<body>
    <header>
        <div>
            <img src="../img/steam.jpg" alt="">
        </div>
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
                            <form action="index.php?action=cerrarSesion" method="get">
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
                            <form action="./index.php?action=cerrarSesion" method="get">
                                <button type="submit" class="btn btn-outline-light">Cerrar Sesion</button>
                            </form>
                        </div>
        <?php        
                    }
                }
            }
        ?>       
    </header>