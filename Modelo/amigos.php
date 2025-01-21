<?php
    require_once("class.bd.php");

    class amigo{
        private $id_amigo;
        private $id_usuario;
        private $nombre;
        private $apellidos;
        private $fecha_nacimiento;

        public function __construct(){
            $this->conn=new bd();
            $this->id_amigo;
            $this->id_usuario;
            $this->nombre;
            $this->apellidos;
            $this->fecha_nacimiento;   
        }

        public function obtenerAmigos($id_usuario){
            $sentencia="SELECT nombre, apellidos, fecha_nacimiento FROM amigos WHERE id_usuario=?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i",$asig);
            $consulta->bind_result($id,$nombre);
            $consulta->execute();
        }
    }