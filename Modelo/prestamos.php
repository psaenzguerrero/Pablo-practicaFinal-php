<?php
    require_once("class.bd.php");
    
    class Prestamo {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }
    
        // Método para obtener préstamos por id_usuario
        public function obtenerPrestamos(int $id_usuario) {
            $sentencia ="SELECT amigos.nombre, juegos.titulo, juegos.foto, fecha_prestamo, devuelto, id_prestamo, prestamos.id_amigo, prestamos.id_juego FROM amigos, juegos, prestamos WHERE prestamos.id_amigo=amigos.id_amigo AND prestamos.id_juego=juegos.id_juego AND prestamos.id_usuario=?;";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            
            $consulta->bind_param("i", $id_usuario);
            
            $consulta->bind_result($res, $res2, $res3, $res4, $res5, $res6, $res7, $res8);
            
            // var_dump($consulta);
            // die();

            $prestamos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($prestamos, [$res, $res2, $res3, $res4, $res5, $res6, $res7, $res8]);
            };
            $consulta->close();
            return $prestamos;
        }
        public function insertarPrestamo($id_usuario, $id_amigo, $id_juego, $fecha_prestamo, $devuelto) {
            $sentencia = "INSERT INTO prestamos (id_usuario, id_amigo, id_juego, fecha_prestamo, devuelto) VALUES (?, ?, ?, ?, ?)";
            $consulta = $this->conn->__get('conn')->prepare($sentencia);
            $consulta->bind_param("iiisi", $id_usuario, $id_amigo, $id_juego, $fecha_prestamo, $devuelto);
            return $consulta->execute();
        }
    
    
        public function actualizarPrestamo($id_prestamo, $id_usuario, $id_amigo, $id_juego, $fecha_prestamo, $devuelto) {
            $sentencia = "UPDATE prestamos SET id_usuario = ?, id_amigo = ?, id_juego = ?, fecha_prestamo = ?, devuelto = ? WHERE id_prestamo = ?";
            $consulta = $this->conn->__get('conn')->prepare($sentencia);
            $consulta->bind_param("iiisii", $id_usuario, $id_amigo, $id_juego, $fecha_prestamo, $devuelto, $id_prestamo);
            $resultado=$consulta->execute();
            $consulta->close();
            return $resultado;
        }
    
        public function eliminarPrestamo($id_prestamo) {
            $sentencia = "DELETE FROM prestamos WHERE id_prestamo = ?";
            $consulta = $this->conn->__get('conn')->prepare($sentencia);
            $consulta->bind_param("i", $id_prestamo);
            return $consulta->execute();
        }
        
    }
            