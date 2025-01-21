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