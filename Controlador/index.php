<?php
// Requiere los modelos necesarios
require_once("../modelo/usuarios.php");
require_once("../modelo/amigos.php");
require_once("../modelo/juegos.php");
require_once("../modelo/prestamos.php");

// Función para manejar el inicio de sesión
function login() {
   
    if ($_SERVER["REQUEST_METHOD"] === "POST") {  
    

        $nombre_usuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena'];
 
        $usuario = new usuario();
        
        if ($usuario->login($nombre_usuario, $contrasena)) {
            session_start();
            $_SESSION['id_usuario'] = $usuario->login($nombre_usuario, $contrasena);

            header("Location: index.php?action=dashboard");
        } else {
            $error = "Credenciales incorrectas.";
            require_once("../vistas/cabeza.html");
            require_once("../vistas/login.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.html");
        require_once("../vistas/login.php");
        require_once("../vistas/pie.html");
    }
}

// Función para mostrar el panel principal
function dashboard() {
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php?action=login");
        exit;
    }
    // var_dump($_SESSION);
    // die();
    require_once("../vistas/cabeza.html");
    require_once("../vistas/paginaInicio.php");
    require_once("../vistas/pie.html");
}

// Función para manejar la lista de amigos
function listaAmigos() {
    session_start();
    $amigo = new amigo();
    // var_dump($_SESSION);
    // die();
    $id_usuario = $_SESSION['id_usuario'];
    // var_dump($id_usuario);
    // die();

    if (isset($_SESSION['id_usuario'])!=1) {
        header("Location: index.php?action=login");
        exit;
    }else{
        // var_dump($id_usuario);
        // die();
        
        $amigos = $amigo->obtenerAmigos($id_usuario);
        // var_dump($amigos);
        // die();
        require_once("../vistas/cabeza.html");
        require_once("../vistas/listaAmigos.php");
        require_once("../vistas/pie.html");
    }
    
    
}

// Función para agregar un nuevo amigo
function agregarAmigo() {
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header("Location: index.php?action=login");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $amigo = new amigo();
        $resultado = $amigo->insertar($_SESSION['id_usuario'], $nombre, $apellidos, $fecha_nacimiento);

        if ($resultado) {
            header("Location: index.php?action=listaAmigos");
        } else {
            $error = "Error al agregar el amigo.";
            require_once("../vistas/agregarAmigo.php");
        }
    } else {
        require_once("../vistas/agregarAmigo.php");
    }
}

// Función para manejar los juegos
function listaJuegos() {
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $juego = new Juego();
    $juegos = $juego->obtenerJuegos($_SESSION['id_usuario']);
    require_once("../vistas/listaJuegos.php");
}

if (isset($_REQUEST["action"])) {
    $action = strtolower($_REQUEST["action"]);
    echo "<p>".$action."</p>";
    $action(); // Llama a la función correspondiente
} else {
    login(); // Muestra la pantalla de inicio de sesión por defecto
}
?>
