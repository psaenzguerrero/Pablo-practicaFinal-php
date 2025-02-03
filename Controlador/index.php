<?php
// Requiere los modelos necesarios
require_once("../modelo/usuarios.php");
require_once("../modelo/amigos.php");
require_once("../modelo/juegos.php");
require_once("../modelo/prestamos.php");
// Función para manejar el cierre de sesión
function cerrarSesion(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php?action=login");
}
// Función para manejar el inicio de sesión
function login() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {  
        $nombre_usuario = $_POST["nombre_usuario"];
        $contrasena = $_POST["contrasena"];
        $usuario = new Usuario();
        $recuerdame = isset($_POST["recuerdame"]);

        // Si el usuario marcó "Recuérdame", guardar en una cookie por 30 días
        if ($recuerdame) {
            setcookie("nombre_usuario", $nombre_usuario, time() + (30 * 24 * 60 * 60), "/"); // Expira en 30 días
        } else {
            setcookie("nombre_usuario", "", time() - 3600, "/"); 
        }
        if ($usuario->login($nombre_usuario, $contrasena)) {
            session_start();
            $_SESSION["id_usuario"] = $usuario->login($nombre_usuario, $contrasena);
            header("Location: index.php?action=dashboard");
        } else {
            $error = "Credenciales incorrectas.";
            require_once("../vistas/cabeza.php");
            require_once("../vistas/login.php");
            require_once("../vistas/pie.html");
        }
    } else {
        session_start();
        require_once("../vistas/cabeza.php");
        require_once("../vistas/login.php");
        require_once("../vistas/pie.html");
    }
}
// Función para mostrar el panel principal
function dashboard() {
    session_start();
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    $tipo = new Usuario();
    $_SESSION["tipo_usuario"] = $tipo->obtenerTipoUsu($_SESSION["id_usuario"]);
    require_once("../vistas/cabeza.php");
    require_once("../vistas/paginaInicio.php");
    require_once("../vistas/pie.html");   
}
//Funcion par aver todos los amigos de la base de datos solo para admin
function listaContactos(){
    session_start();
    $amigo = new Amigo();
    $amigos = $amigo->obtenerAllAmigos();
    require_once("../vistas/cabeza.php");
    require_once("../vistas/listaAmigos.php");
    require_once("../vistas/pie.html");
}
function listaUsuariosAdmin(){
    session_start();
    $usuario = new Usuario();
    $usuarios = $usuario->obtenerUsuarios();
    require_once("../vistas/cabeza.php");
    require_once("../vistas/listaUsuarios.php");
    require_once("../vistas/pie.html");
}
function modificarUsuario(){
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // $nombre_usuario = $_POST["nombre_usuario"];
        // $contrasena = $_POST["contrasena"];
        $id_usuario = $_POST["id_usuario"];
        // Obtener los datos del usuario desde el modelo
        $usuario = new Usuario();
        $usuariox = $usuario->obtenerPorId($id_usuario);
        // Incluir la vista para modificar al ausuario
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarUsuario.php");
        require_once("../vistas/pie.html");
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }

}
function guardarCambiosUsuarios() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_usuario"], $_POST["nombre_usuario"], $_POST["contrasena"])) {
        $nombre_usuario = $_POST["nombre_usuario"];
        $contrasena = $_POST["contrasena"];
        $id_usuario = $_POST["id_usuario"];
        // Actualizar los datos del usuario en el modelo
        $usuario = new Usuario();
        $usuariox = $usuario->actualizar($nombre_usuario, $contrasena, $id_usuario);
        // Redirigir a la lista de amigos
        header("Location: index.php?action=listaUsuariosAdmin");
        exit;
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }
}
function agregarUsuario(){
    session_start();
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre_usuario = $_POST["nombre_usuario"];
        $contrasena = $_POST["contrasena"];
        $usuario = new Usuario();
        $resultado = $usuario->insertar($nombre_usuario,$contrasena);
        if ($resultado) {
            header("Location: index.php?action=listaUsuariosAdmin");
        } else {
            $error = "Error al agregar el usuario.";
            require_once("../vistas/cabeza.php");
            require_once("../vistas/agregarUsuario.php");
            require_once("../vistas/pie.html");
        }
    }else {
    require_once("../vistas/cabeza.php");
    require_once("../vistas/agregarUsuario.php");
    require_once("../vistas/pie.html");
    }
}
function buscarUsuarios() {
    session_start();

    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_usuario"])) {
        
            $busqueda = $_POST["busqueda"];
            $usuario = new Usuario();
            $usuarios = $usuario->buscarUsuarios($busqueda);
            require_once("../vistas/cabeza.php");
            require_once("../vistas/listaUsuarios.php");
            require_once("../vistas/pie.html");
    } else {
        echo "Error: Parámetros de búsqueda inválidos.";
    }
}
// Función para manejar la lista de amigos de usuario normal
function listaAmigos() {
    session_start();
    $prueba='a';
    $amigo = new Amigo();
    $id_usuario = $_SESSION["id_usuario"];
    if (isset($_SESSION["id_usuario"])!=1) {
        header("Location: index.php?action=login");
        exit;
    }else{
        $amigos = $amigo->obtenerAmigos($id_usuario);
        require_once("../vistas/cabeza.php");
        require_once("../vistas/listaAmigos.php");
        require_once("../vistas/pie.html");
    }
}
function buscarAmigos() {
    session_start();
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_amigo"])) {
        if (!strcmp($_SESSION["tipo_usuario"],"admin")==0) {
            $busqueda = $_POST["busqueda"];
            $id_usuario = $_SESSION["id_usuario"]; 
            $amigo = new Amigo();
            $amigos = $amigo->buscarAmigos($busqueda, $id_usuario);
            require_once("../vistas/cabeza.php");
            require_once("../vistas/listaAmigos.php");
            require_once("../vistas/pie.html");
        }else{
            $busqueda = $_POST["busqueda"];
            $amigo = new Amigo();
            $amigos = $amigo->buscarAmigosAdmin($busqueda);
            require_once("../vistas/cabeza.php");
            require_once("../vistas/listaAmigos.php");
            require_once("../vistas/pie.html");
        } 
    } else {
        echo "Error: Parámetros de búsqueda inválidos.";
    }
}
// Función para agregar un nuevo amigo
function agregarAmigo() {
    session_start();
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $amigo = new Amigo();
        $resultado = $amigo->insertar($_SESSION["id_usuario"], $nombre, $apellidos, $fecha_nacimiento);
        if ($resultado) {
            header("Location: index.php?action=listaAmigos");
        } else {
            $error = "Error al agregar el amigo.";
            require_once("../vistas/cabeza.php");
            require_once("../vistas/agregarAmigo.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarAmigo.php");
        require_once("../vistas/pie.html");
    }
}
function agregarAmigoAdmin() {
    session_start();
    $usuario = new Usuario();
    $usuarios = $usuario->obtenerUsuarios();
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $amigo = new Amigo();       
        $resultado = $amigo->insertar($_POST["nombre_usuario"], $nombre, $apellidos, $fecha_nacimiento);
        if ($resultado) {
            header("Location: index.php?action=listaContactos");
        } else {
            $error = "Error al agregar el amigo.";
            require_once("../vistas/cabeza.php");
            require_once("../vistas/agregarAmigo.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarAmigo.php");
        require_once("../vistas/pie.html");
    }
}
function modificarAmigo() {
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_amigo"])) {
        $id_amigo = $_POST["id_amigo"];
        // Obtener los datos del amigo desde el modelo
        $amigo = new Amigo();
        $amigox = $amigo->obtenerPorId($id_amigo);
        // Incluir la vista para modificar al amigo
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarAmigo.php");
        require_once("../vistas/pie.html");
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }
}
function modificarAmigoAdmin() {
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST"&& isset($_POST["id_amigo"])&& isset($_POST["nombre_usuario"])) {
        $id_amigo = $_POST["id_amigo"];
        $nombre_usuario = $_POST["nombre_usuario"];
        // Obtener los datos del amigo desde el modelo
        $amigo = new Amigo();
        $amigox = $amigo->obtenerPorId($id_amigo);
        // Incluir la vista para modificar al amigo
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarAmigo.php");
        require_once("../vistas/pie.html");
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }
}
function guardarCambios() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_amigo"], $_POST["nombre"], $_POST["apellidos"], $_POST["fecha_nacimiento"])) {
        $id_amigo = $_POST["id_amigo"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $fechaNacimiento = $_POST["fecha_nacimiento"];
        // Actualizar los datos del amigo en el modelo
        $amigo = new Amigo();
        $amigox = $amigo->actualizar($id_amigo, $nombre, $apellidos, $fechaNacimiento);
        // Redirigir a la lista de amigos
        header("Location: index.php?action=listaAmigos");
        exit;
    } else {
        echo "Error: Datos inválidos o método no permitido.";
    }
}
// Función para manejar los juegos
function listaJuegos() {
    session_start();
    $juego = new Juego();
    $id_usuario = $_SESSION["id_usuario"];    
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    $usu = new Usuario();
    $nom = $usu->obtenerPorId($id_usuario)['nombre_usuario'];
    $ruta = "../img/". $nom;
    $juegos = $juego->obtenerJuegos($id_usuario);
    require_once("../vistas/cabeza.php");
    require_once("../vistas/buscarJuegos.php");
    require_once("../vistas/pie.html");
}
function agregarJuego(){
    session_start();
    $juego = new Juego();
    $id_usuario = $_SESSION["id_usuario"];    
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $titulo = $_POST["titulo"];
        $plataforma = $_POST["plataforma"];
        $anio_lanzamiento = $_POST["anio_lanzamiento"];
        $foto = $_FILES["foto"];
        $juego = new Juego();

        $usu = new Usuario();
        $nom = $usu->obtenerPorId($id_usuario)['nombre_usuario'];
        $ruta = "../img/". $nom;

        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
            $nombre_archivo = basename($_FILES["foto"]["name"]);
            $ruta_archivo = $ruta . "/" . $nombre_archivo;
    
            // Mover el archivo a la carpeta del usuario
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_archivo)) {
                echo "Archivo subido con éxito a '$ruta_archivo'.";
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "Error al subir el archivo.";
        }

        $resultado = $juego->insertar($_SESSION["id_usuario"],$titulo, $plataforma, $anio_lanzamiento, $nombre_archivo);
        if ($resultado) {
            header("Location: index.php?action=listaJuegos");
        } else {
            $error = "Error al agregar el Juego.";
            require_once("../vistas/cabeza.php");
            require_once("../vistas/agregarJuego.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}
function modificarJuego() { 
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_juego"])) {
        $id_juego = $_POST["id_juego"];
        $juegoModel = new Juego();
        $juego = $juegoModel->obtenerPorId($id_juego);
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");     
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}
function guardarCambiosJuego() {  
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_juego"], $_POST["titulo"], $_POST["plataforma"], $_POST["anio_lanzamiento"])) {
        $id_juego = $_POST["id_juego"];
        $titulo = $_POST["titulo"];
        $plataforma = $_POST["plataforma"];
        $anio_lanzamiento = $_POST["anio_lanzamiento"];
        $foto = $_FILES["foto"];
        $id_usuario = $_SESSION["id_usuario"];
        $usu = new Usuario();
        $nom = $usu->obtenerPorId($id_usuario)['nombre_usuario'];
        $ruta = "../img/". $nom;
        //Comprobar el espacio de la foto
        if (!empty($_FILES["foto"])) {
            $nombre_archivo = basename($_FILES["foto"]["name"]);
            $ruta_archivo = $ruta . "/" . $nombre_archivo;
            // Mover el archivo a la carpeta del usuario
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_archivo)) {
                echo "Archivo subido con éxito a '$ruta_archivo'.";
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "Error al subir el archivo.";
        }
        $juegoModel = new Juego();
        $juegoModel->actualizar($id_juego, $titulo, $plataforma, $anio_lanzamiento, $nombre_archivo);
        header("Location: index.php?action=listaJuegos");
        exit;
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}
function eliminarJuego() {
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_juego"])) {
        $id_juego = $_POST["id_juego"];
        $juegoModel = new Juego();
        $juegoModel->eliminar($id_juego);
        header("Location: index.php?action=listaJuegos");
        exit;
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarJuego.php");
        require_once("../vistas/pie.html");
    }
}
function buscarJuegos() {
    session_start();
    $juego = new Juego();
    $id_usuario = $_SESSION["id_usuario"];    
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_juego"])) {
        $busqueda = $_POST["busqueda"];
        $id_usuario = $_SESSION["id_usuario"]; 
        $juegoModel = new Juego();
        $juegos = $juegoModel->buscarJuegos($busqueda, $id_usuario);
        require_once("../vistas/cabeza.php");
        require_once("../vistas/buscarJuegos.php");
        require_once("../vistas/pie.html");
    } else {
        echo "Error: Parámetros de búsqueda inválidos.";
    }
}
function listaPrestamos(){
    session_start();
    $prestamo = new Prestamo();
    $id_usuario = $_SESSION["id_usuario"];    
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }
    $prestamos = $prestamo->obtenerPrestamos($id_usuario);
    require_once("../vistas/cabeza.php");
    require_once("../vistas/listaPrestamos.php");
    require_once("../vistas/pie.html");
}
function agregarPrestamo() {
    session_start();
    $id_usuario = $_SESSION["id_usuario"];
    $amigo = new Amigo();
    $amigos = $amigo->obtenerAmigos($id_usuario);
    $juego = new Juego();
    $juegos = $juego->obtenerJuegos($id_usuario);
    if (!isset($id_usuario)) {
        header("Location: index.php?action=login");
        exit;
    }
    $prestamo = new Prestamo();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_amigo = $_POST["id_amigo"];
        $id_juego = $_POST["id_juego"];
        $fecha_prestamo = $_POST["fecha_prestamo"];
        $devuelto = isset($_POST["devuelto"]) ? 1 : 0;

        $resultado = $prestamo->insertarPrestamo($id_usuario, $id_amigo, $id_juego, $fecha_prestamo, $devuelto);
        if ($resultado) {
            header("Location: index.php?action=listaPrestamos");
        } else {
            $error = "Error al agregar el préstamo.";
            require_once("../vistas/cabeza.php");
            require_once("../vistas/agregarPrestamo.php");
            require_once("../vistas/pie.html");
        }
    } else {
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarPrestamo.php");
        require_once("../vistas/pie.html");
    }
}
function modificarPrestamo() { 
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_prestamo"])) {
        $id_usuario = $_SESSION["id_usuario"];
        $amigo = new Amigo();
        $amigos = $amigo->obtenerAmigos($id_usuario);
        $juego = new Juego();
        $juegos = $juego->obtenerJuegos($id_usuario);
        $id_prestamo = $_POST["id_prestamo"];
        $prestamo = new Prestamo();
        $prestamos = $prestamo->obtenerPrestamos($id_usuario);
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarPrestamo.php");
        require_once("../vistas/pie.html");     
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarPrestamo.php");
        require_once("../vistas/pie.html");
    }
}
function guardarCambiosPrestamo() { 
    session_start(); 
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_prestamo"], $_POST["id_amigo"], $_POST["id_juego"], $_POST["fecha_prestamo"])) {
        $id_prestamo = $_POST["id_prestamo"];
        $id_amigo = $_POST["id_amigo"];
        $id_juego = $_POST["id_juego"];
        $fecha_prestamo = $_POST["fecha_prestamo"];
        $devuelto = $_POST["devuelto"];
        $prestamo = new Prestamo();
        $prestamos = $prestamo->actualizarPrestamo($id_prestamo, $_SESSION["id_usuario"], $id_amigo, $id_juego, $fecha_prestamo, $devuelto);
        header("Location: index.php?action=listaPrestamos");
        exit;
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarPrestamo.php");
        require_once("../vistas/pie.html");
    }
}
function eliminarPrestamo() {
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_prestamo"])) {
        $id_prestamo = $_POST["id_prestamo"];
        $prestamoModel = new Prestamo();
        $prestamoModel->eliminarPrestamo($id_prestamo);
        header("Location: index.php?action=listaPrestamos");
        exit;
    } else {
        echo "Error: Datos inválidos.";
        require_once("../vistas/cabeza.php");
        require_once("../vistas/agregarPrestamo.php");
        require_once("../vistas/pie.html");
    }
}
function buscarPrestamos() {
    session_start();
    
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: index.php?action=login");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_prestamo"])) {
        $busqueda = $_POST["busqueda"];
        $id_usuario = $_SESSION["id_usuario"]; 
        $prestamo = new Prestamo();

        $prestamos = $prestamo->buscarPrestamos($busqueda, $id_usuario);
        

        require_once("../vistas/cabeza.php");
        require_once("../vistas/listaPrestamos.php");
        require_once("../vistas/pie.html");
    } else {
        echo "Error: Parámetros de búsqueda inválidos.";
    }
}

if (isset($_REQUEST["action"])) {
    $action = strtolower($_REQUEST["action"]);
    // echo "<p>".$action."</p>";
    $action(); // Llama a la función correspondiente
} else {
    login(); // Muestra la pantalla de inicio de sesión por defecto
}
?>
