<?php
    require_once("class.bd.php");
    
    class Prestamo {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }
    
        // Método para obtener préstamos por id_usuario
        public function obtenerPrestamos(int $id_usuario) {
            $sentencia ="SELECT amigos.nombre, juegos.titulo, juegos.foto, fecha_prestamo, devuelto FROM amigos, juegos, prestamos WHERE prestamos.id_amigo=amigos.id_amigo AND prestamos.id_juego=juegos.id_juego AND prestamos.id_usuario=?;";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            
            $consulta->bind_param("i", $id_usuario);
            
            $consulta->bind_result($res, $res2, $res3, $res4, $res5);
            
            // var_dump($consulta);
            // die();

            $prestamos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($prestamos, [$res, $res2, $res3, $res4, $res5]);
            };
            $consulta->close();
            return $prestamos;
        }}
            