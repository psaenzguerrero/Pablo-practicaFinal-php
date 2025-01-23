<?php
    require_once("class.bd.php");

    class juego{
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
        public function insert($id_usuario, $titulo, $plataforma, $anio_lanzamiento, $foto){
            $sentencia = "INSERT INTO amigos (id_usuario, titulo, plataforma, anio_lanzamiento, foto) VALUES (?, ?, ?, ?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("isss", $id_usuario, $nombre, $apellidos, $fecha_nacimiento);
            return $consulta->execute();
        }
    }