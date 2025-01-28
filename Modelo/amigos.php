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
            $sentencia = "SELECT nombre, apellidos, fecha_nacimiento, nombre_usuario, id_amigo FROM amigos, usuarios WHERE amigos.id_usuario=usuarios.id_usuario";       
            $consulta = $this->conn->__get("conn")->prepare($sentencia);           
            $consulta->bind_result($res, $res2, $res3, $res4, $res5);
            $amigos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($amigos, [$res, $res2, $res3, $res4, $res5]);
            };
            $consulta->close();
            return $amigos;
        }
        public function obtenerAmigos(int $id_usuario) {           
            $sentencia = "SELECT id_amigo, nombre, apellidos, fecha_nacimiento FROM amigos WHERE id_usuario = ?";            
            $consulta = $this->conn->__get("conn")->prepare($sentencia);           
            $consulta->bind_param("i", $id_usuario);            
            $consulta->bind_result($res4, $res, $res2, $res3);
            $amigos = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($amigos, [$res, $res2, $res3, $res4]);
            };
            $consulta->close();
            return $amigos;
        }
        public function obtenerPorId($id_amigo) {
            $sql = "SELECT nombre, apellidos, fecha_nacimiento FROM amigos WHERE id_amigo = ?";
            $stmt = $this->conn->__get('conn')->prepare($sql); // Usamos la conexión desde la clase `bd`
            $stmt->bind_param('i', $id_amigo);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $amigo = $resultado->fetch_assoc();
            $stmt->close();
            return $amigo;
        }
        public function actualizar($id_amigo, $nombre, $apellidos, $fechaNacimiento) {
            $sql = "UPDATE amigos SET nombre = ?, apellidos = ?, fecha_nacimiento = ? WHERE id_amigo = ?";
            $stmt = $this->conn->__get('conn')->prepare($sql);
            $stmt->bind_param('sssi', $nombre, $apellidos, $fechaNacimiento, $id_amigo);
            $stmt->execute();
            $stmt->close();
        }
        public function insertar($id_usuario, $nombre, $apellidos, $fecha_nacimiento) {
            $sentencia = "INSERT INTO amigos (id_usuario, nombre, apellidos, fecha_nacimiento) VALUES (?, ?, ?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("isss", $id_usuario, $nombre, $apellidos, $fecha_nacimiento);
            return $consulta->execute();
        }
        public function buscarAmigos($busqueda, $id_usuario) {
            $sentencia = "SELECT id_amigo, nombre, apellidos, fecha_nacimiento 
                    FROM amigos 
                    WHERE id_usuario = ? AND (nombre LIKE ? OR apellidos LIKE ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $likeBusqueda = "%" . $busqueda . "%";
            $consulta->bind_param("iss", $id_usuario, $likeBusqueda, $likeBusqueda);
            $consulta->execute();
            $consulta->bind_result($id_amigo, $nombre, $apellidos, $fecha_nacimiento);
        
            $amigos = array();
            while ($consulta->fetch()) {
                array_push($amigos, [$nombre, $apellidos, $fecha_nacimiento, $id_amigo]);
            }
            $consulta->close();
            return $amigos;
        }
        public function buscarAmigosAdmin($busqueda) {
            $sentencia = "SELECT id_amigo, nombre, apellidos, fecha_nacimiento, nombre_usuario
                    FROM amigos, usuarios 
                    WHERE usuarios.id_usuario=amigos.id_usuario AND (nombre LIKE ? OR apellidos LIKE ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $likeBusqueda = "%" . $busqueda . "%";
            $consulta->bind_param("ss", $likeBusqueda, $likeBusqueda);
            $consulta->execute();
            $consulta->bind_result($id_amigo, $nombre, $apellidos, $fecha_nacimiento, $nombre_usuario);
        
            $amigos = array();
            while ($consulta->fetch()) {
                array_push($amigos, [$nombre, $apellidos, $fecha_nacimiento, $nombre_usuario, $id_amigo]);
            }
            $consulta->close();
            return $amigos;
        }
    }