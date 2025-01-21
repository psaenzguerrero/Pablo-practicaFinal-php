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
        require_once("../Vistas/cabeza.html");
        require_once("../Vistas/paginaInicio.php");
        require_once("../Vistas/pie.html");
    }
    function insertarAmigo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amigo = new Amigo();
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
            $id_usuario = $_SESSION['id_usuario'];
    
            $amigo->insertarAmigo($nombre, $apellidos, $fecha_nacimiento, $id_usuario);
            listarAmigos();
        } else {
            require_once("../Vistas/cabeza.html");
            require_once("../Vistas/paginaInicio.php");
            require_once("../Vistas/pie.html");
        }
    }

?>