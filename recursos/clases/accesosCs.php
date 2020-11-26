<?php 
require "conexionCs.php";

class Accesos extends Conexion{
    function __construct(){
        parent::__construct();
        return $this;
    }
    public function login(){

    }

}

$accesos = new Accesos;
?>