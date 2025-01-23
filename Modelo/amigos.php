<?php
    require_once("class.bd.php");

    class Amigo{
        public $conn;
        public $id_amigo;
        public $id_usuario;
        public $nombre;
        public $apellidos;
        public $fecha_nacimiento;

        public function __construct(){
            $this->conn=new bd();
            $this->id_amigo;
            $this->id_usuario;
            $this->nombre;
            $this->apellidos;
            $this->fecha_nacimiento;   
        }

        public function obtenerAllAmigos() {
            
            $sentencia = "SELECT nombre, apellidos, fecha_nacimiento, nombre_usuario FROM amigos, usuarios WHERE amigos.id_usuario=usuarios.id_usuario";
            
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            
            $consulta->bind_result($res, $res2, $res3, $res4);
            
            // var_dump($consulta);
            // die();

            $amigos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($amigos, [$res, $res2, $res3, $res4]);
            };
            $consulta->close();
            return $amigos;
        }
        public function obtenerAmigos(int $id_usuario) {
            
            $sentencia = "SELECT nombre, apellidos, fecha_nacimiento FROM amigos WHERE id_usuario = ?";
            
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            
            $consulta->bind_param("i", $id_usuario);
            
            $consulta->bind_result($res, $res2, $res3);
            
            // var_dump($consulta);
            // die();

            $amigos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($amigos, [$res, $res2, $res3]);
            };
            $consulta->close();
            return $amigos;
        }
    
        public function insertar($id_usuario, $nombre, $apellidos, $fecha_nacimiento) {
            $sentencia = "INSERT INTO amigos (id_usuario, nombre, apellidos, fecha_nacimiento) VALUES (?, ?, ?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("isss", $id_usuario, $nombre, $apellidos, $fecha_nacimiento);
            return $consulta->execute();
        }
    }