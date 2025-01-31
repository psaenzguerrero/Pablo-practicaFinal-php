<?php
    require_once("class.bd.php");
    class Usuario{
        private $conn;
        public $id_usuario;
        public $nombre_usuario;
        public $contrasena;
        public $tipo;
        public function __construct(){
            $this->conn=new bd();
            $this->id_usuario;
            $this->nombre_usuario;
            $this->contrasena;
            $this->tipo;
        }
        public function login(String $nombre_usuario, String $contrasena) {
            $sentencia = "SELECT id_usuario FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ss", $nombre_usuario, $contrasena);         
            $consulta->bind_result($res);
            $consulta->execute();
            $consulta->fetch();
            return $res;     
        }
        public function obtenerUsuarios(){
            $sentencia ="SELECT id_usuario, nombre_usuario, contrasena FROM usuarios";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_result($res, $res2, $res3);
            $usuarios = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($usuarios, [$res, $res2, $res3]);
            };
            $consulta->close();
            return $usuarios;
        }
        public function obtenerTipoUsu($id_usuario){
            $sentencia ="SELECT tipo FROM usuarios WHERE id_usuario=?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s",$id_usuario);
            $consulta->bind_result($tip);
            $consulta->execute();
            $consulta->fetch();
            return $tip;
        }
        public function obtenerId($nombre_usuario){
            $sentencia="SELECT id_usuario FROM usuarios WHERE nombre_usuario=?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s",$nombre_usuario);
            $consulta->bind_result($id_usuario);
            $consulta->execute();
            $consulta->fetch();
            return $id_usuario;
        }
        public function insertar($nombre_usuario, $contrasena) {
            $sentencia = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ss", $nombre_usuario, $contrasena);
            return $consulta->execute();
        }
        public function obtenerPorId($id_usuario) {
            $sentencia = "SELECT nombre_usuario, contrasena FROM usuarios WHERE id_usuario = ?";
            $consulta = $this->conn->__get('conn')->prepare($sentencia); // Usamos la conexión desde la clase `bd`
            $consulta->bind_param('i', $id_usuario);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $usuario = $resultado->fetch_assoc();
            $consulta->close();
            return $usuario;
        }
        public function actualizar($nombre_usuario, $contrasena, $id_usuario) {
            $sentencia = "UPDATE usuarios SET nombre_usuario = ?, contrasena = ? WHERE id_usuario = ?";
            $consulta = $this->conn->__get('conn')->prepare($sentencia);
            $consulta->bind_param('ssi', $nombre_usuario, $contrasena, $id_usuario);
            $consulta->execute();
            $consulta->close();
        }
    }
?>