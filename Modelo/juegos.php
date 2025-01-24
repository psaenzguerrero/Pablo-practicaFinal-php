<?php
    require_once("class.bd.php");

    class Juego{
        public $conn;

        public function __construct(){
            $this->conn=new bd();
        }

        public function obtenerJuegos(int $id_usuario){
            $sentencia ="SELECT titulo, plataforma, anio_lanzamiento, foto FROM juegos WHERE id_usuario= ?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i",$id_usuario);
            
            $consulta->bind_result($titulo, $plataforma, $anio_lanzamiento, $foto);
            $juegos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($juegos, [$titulo, $plataforma, $anio_lanzamiento, $foto]);
            };
            $consulta->close();
            return $juegos;
        }
        public function insertar($id_usuario, $titulo, $plataforma, $anio_lanzamiento, $foto){
            $sentencia = "INSERT INTO juegos (id_usuario, titulo, plataforma, anio_lanzamiento, foto) VALUES (?, ?, ?, ?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("issss", $id_usuario, $titulo, $plataforma, $anio_lanzamiento, $foto);
            return $consulta->execute();
        }
        public function obtenerPorId(int $id_juego) {
            $sentencia = "SELECT titulo, plataforma, anio_lanzamiento, foto FROM juegos WHERE id_juego = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_juego);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $juego = $resultado->fetch_assoc();
            $consulta->close();
            return $juego;
        }
    
        public function actualizar($id_juego, $titulo, $plataforma, $anio_lanzamiento, $foto) {
            $sentencia = "UPDATE juegos SET titulo = ?, plataforma = ?, anio_lanzamiento = ?, foto = ? WHERE id_juego = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ssssi", $titulo, $plataforma, $anio_lanzamiento, $foto, $id_juego);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }
    
        public function eliminar($id) {
            $sentencia = "DELETE FROM juegos WHERE id = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }
    }
?>