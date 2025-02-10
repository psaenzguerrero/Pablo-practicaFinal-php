<?php
require_once('../../../cred.php');
class bd {
    private $conn; 
    public function __construct() {
        $this->conn=new mysqli("localhost",USU_CONN,PSW_CONN,"agenda");
        if ($this->conn->connect_error) {
            die("Error al conectar con la base de datos: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }
    public function __get($nom){
        return $this->$nom;
    }
}
?>