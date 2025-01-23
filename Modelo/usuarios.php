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
            
            // var_dump($consulta);
            // die();

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
    }
?>