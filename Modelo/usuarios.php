<?php
    require_once("class.bd.php");

    class usuario{
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

        public function login($nombre_usuario, $contrasena) {
            $sentencia = "SELECT COUNT(*) FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ss", $nombre_usuario, $contrasena);
            
            $consulta->bind_result($numero);
            $consulta->execute();
            $consulta->fetch();
                
            if ($numero == 0) {
                return false;
            }else{
                return true;
            }
            
            
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