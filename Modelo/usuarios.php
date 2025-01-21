<?php
    require_once("class.bd.php");

    class usuario{
        private $conn;
        private $id_usuario;
        private $nombre_usuario;
        private $contrasena;
        private $tipo;

        public function __construct(){
            $this->conn=new bd();
            $this->id_usuario;
            $this->nombre_usuario;
            $this->contrasena;
            $this->tipo;
        }

        public function login($nombre_usuario, $contraseña) {
            $sentencia = "SELECT id_usuario, contraseña FROM usuarios WHERE nombre_usuario = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s", $nombre_usuario);
            $consulta->execute();
            $consulta->bind_result($id_usuario, $hash);
    
            if ($consulta->fetch() && password_verify($contraseña, $hash)) {
                $this->id_usuario = $id_usuario;
                return true;
            }
            return false;
        }

        public function obtenerTipoUsu($nombreU){
            $sentencia ="SELECT tipo FROM usarios WHERE nombre_usuario=?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s",$nombreU);
            $consulta->bind_result($tip);
            $consulta->execute();

            return $tip;
        }
    }
?>