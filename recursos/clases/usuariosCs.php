<?php 
require 'conexionCs.php';
class Usuario extends Conexion{
    
    function __construct(){
        parent::__construct();
        return $this;
    }

    public function guardar(){

    }

    public function buscar(){

    }

    public function modificar(){

    }

    public function eliminar(){

    }
}

$usuario = new Usuario;
?>