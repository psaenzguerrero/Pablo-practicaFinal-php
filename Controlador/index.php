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
 
        $usuario = new Usuario();
        
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

    $tipo = new Usuario();

    $_SESSION['tipo_usuario'] = $tipo->obtenerTipoUsu($_SESSION['id_usuario']);

    // var_dump($_SESSION['tipo_usuario']);
    // die();
    require_once("../vistas/cabeza.html");
    if (!strcmp($_SESSION['tipo_usuario'],"usuario")) {
        require_once("../vistas/paginaInicio.php");
    }else{
        require_once("../vistas/paginaInicioAdmin.php");
    }
    require_once("../vistas/pie.html");
    

    
}
//Funcion par aver todos los amigos de la base de datos solo para admin
function listaContactos(){
    session_start();
    $amigo = new Amigo();
    $amigos = $amigo->obtenerAllAmigos();
    require_once("../vistas/cabeza.html");
    require_once("../vistas/listaAmigosAdmin.php");
    require_once("../vistas/pie.html");
}
function listaUsuariosAdmin(){
    session_start();
    $usuario = new Usuario();
    $usuarios = $usuario->obtenerUsuarios();
    require_once("../vistas/cabeza.html");
    require_once("../vistas/listaUsuarios.php");
    require_once("../vistas/pie.html");
}

// Función para manejar la lista de amigos de usuario normal
function listaAmigos() {
    session_start();
    $amigo = new Amigo();
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
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php?action=login");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $amigo = new Amigo();
        $resultado = $amigo->insertar($_SESSION['id_usuario'], $nombre, $apellidos, $fecha_nacimiento);

        if ($resultado) {
            header("Location: index.php?action=listaAmigos");
        } else {
            $error = "Error al agregar el amigo.";
            require_once("../vistas/cabeza.html");
            require_once("../vistas/agregarAmigo.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarAmigo.php");
        require_once("../vistas/pie.html");
    }
}

function modificarAmigo() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id-amigo'])) {
        $id_amigo = $_POST['id-amigo'];

        // Obtener los datos del amigo desde el modelo
        $amigo = new Amigo();
        $amigox = $amigo->obtenerPorId($id_amigo);
        // Incluir la vista para modificar al amigo
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarAmigo.php");
        require_once("../vistas/pie.html");
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }
}

function guardarCambios() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id-amigo'], $_POST['nombre'], $_POST['apellidos'], $_POST['fecha_nacimiento'])) {
        $id_amigo = $_POST['id-amigo'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];

        // Actualizar los datos del amigo en el modelo
        $amigo = new Amigo();
        $amigox = $amigo->actualizar($id_amigo, $nombre, $apellidos, $fechaNacimiento);
        

        // Redirigir a la lista de amigos
        header("Location: index.php");
        exit;
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }
}

// Función para manejar los juegos
function listaJuegos() {
    session_start();
    $juego = new Juego();
    $id_usuario = $_SESSION['id_usuario'];    

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $juegos = $juego->obtenerJuegos($id_usuario);
    // var_dump($id_usuario);
    // die();
    require_once("../vistas/cabeza.html");
    require_once("../vistas/listaJuegos.php");
    require_once("../vistas/pie.html");
}
function agregarJuego(){
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $titulo = $_POST['titulo'];
        $plataforma = $_POST['plataforma'];
        $anio_lanzamiento = $_POST['anio_lanzamiento'];
        $foto = $_POST['foto'];

        $juego = new Juego();

        $resultado = $juego->insertar($_SESSION['id_usuario'],$titulo, $plataforma, $anio_lanzamiento, $foto);
        if ($resultado) {
            header("Location: index.php?action=listaJuegos");
        } else {
            $error = "Error al agregar el amigo.";
            require_once("../vistas/cabeza.html");
            require_once("../vistas/agregarJuego.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}
function modificarJuego() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_juego"])) {
        $id_juego = $_POST["id_juego"];

        $juegoModel = new Juego();
        $juego = $juegoModel->obtenerPorId($id_juego);
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
        
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}

function guardarCambiosJuego() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_juego'], $_POST['titulo'], $_POST['plataforma'], $_POST['anio_lanzamiento'], $_POST['foto'])) {
        $id_juego = $_POST['id_juego'];
        $titulo = $_POST['titulo'];
        $plataforma = $_POST['plataforma'];
        $anio_lanzamiento = $_POST['anio_lanzamiento'];
        $foto = $_POST['foto'];

        $juegoModel = new Juego();
        $juegoModel->actualizar($id_juego, $titulo, $plataforma, $anio_lanzamiento, $foto);

        header("Location: index.php?action=listaJuegos");
        exit;
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}

function eliminarJuego() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_juego'])) {
        $id_juego = $_POST['id_juego'];

        $juegoModel = new Juego();
        $juegoModel->eliminar($id_juego);

        header("Location: index.php?action=listaJuegos");
        exit;
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.html");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}
function listaPrestamos(){
    session_start();
    $prestamo = new Prestamo();
    $id_usuario = $_SESSION['id_usuario'];    

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $prestamos = $prestamo->obtenerPrestamos($id_usuario);
    // var_dump($id_usuario);
    // die();
    require_once("../vistas/cabeza.html");
    require_once("../vistas/listaPrestamos.php");
    require_once("../vistas/pie.html");
}

if (isset($_REQUEST["action"])) {
    $action = strtolower($_REQUEST["action"]);
    echo "<p>".$action."</p>";
    $action(); // Llama a la función correspondiente
} else {
    login(); // Muestra la pantalla de inicio de sesión por defecto
}
?>
