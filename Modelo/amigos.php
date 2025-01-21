<?php
    require_once("class.bd.php");

    class amigo{
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

        public function obtenerAmigos($id_usuario) {
            $sentencia = "SELECT id_amigo, nombre, apellidos, DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') as fecha_nacimiento FROM amigos WHERE id_usuario = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_usuario);
            $consulta->execute();
            $resultado = $consulta->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    
        public function insertar($id_usuario, $nombre, $apellidos, $fecha_nacimiento) {
            $sentencia = "INSERT INTO amigos (id_usuario, nombre, apellidos, fecha_nacimiento) VALUES (?, ?, ?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("isss", $id_usuario, $nombre, $apellidos, $fecha_nacimiento);
            return $consulta->execute();
        }
    }