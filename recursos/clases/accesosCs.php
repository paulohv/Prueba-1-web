<?php 
require "conexionCs.php";

class Accesos extends Conexion{
    function __construct(){
        parent::__construct();
        return $this;
    }

    public function login(){// completar metodo para logear con la pagina principal
        $data = (count(func_get_args()) > 0 ) ? func_get_args()[0] : func_get_args();

        $sql = "SELECT nombre, apellido, correo,  pass, perfil FROM usuarios WHERE correo = ? ";

        $consulta = $this->prepare($sql);
        
        $consulta->bind_param('s', $usuario);

        $usuario = $data['usuario'];

    }
    



}

$accesos = new Accesos;
?>