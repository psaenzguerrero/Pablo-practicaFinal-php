<?php
    require_once("class.bd.php");

    class usuario{
        public $conn;
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

        public function login($nombre_usuario, $contrasena) {
            $sentencia = "SELECT id_usuario FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ss", $nombre_usuario, $contrasena);
            
            $consulta->bind_result($res);
            $consulta->execute();
            $consulta->fetch();
                
            return $res;
            
            
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