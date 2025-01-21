<?php
    require_once("../Modelo/amigos.php");
    require_once("../Modelo/juegos.php");
    require_once("../Modelo/prestamos.php");
    require_once("../Modelo/usuarios.php");
    
    session_start();
    function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $nombre_usuario = $_POST["nombre_usuario"];
            $contraseña = $_POST["contraseña"];
    
            if ($usuario->login($nombre_usuario, $contraseña)) {
                $_SESSION['id_usuario'] = $usuario->id_usuario;
                $_SESSION['nombre_usuario'] = $nombre_usuario;
                home();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                require_once("../Vistas/inicioSesion.php");
            }
        } else {
            require_once("../Vistas/inicioSesion.php");
        }
    }
    
    function home() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?action=login");
            exit();
        }
        require_once("../Vistas/paginaInicio.php");
    }
    
    function logout() {
        session_destroy();
        header("Location: index.php?action=login");
    }
    
    function listarAmigos() {
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?action=login");
            exit();
        }
        $amigo = new Amigo();
        $datos = $amigo->getAmigos($_SESSION['id_usuario']);
        require_once("../vistas/cabecera.html");
        require_once("../vistas/paginaInicio.php");
        require_once("../vistas/pie.html");
    }

?>