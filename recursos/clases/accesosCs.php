<?php 
require "conexionCs.php";

class Accesos extends Conexion{
    function __construct(){
        parent::__construct();
        return $this;
    }
    public function login(){// completar metodo para logear con la pagina principal
        $data = (count(func_get_args()) > 0 ) ? func_get_args()[0] : func_get_args();
        $sql = "SELECT nombre, apellido,correo,  pass, perfil FROM usuarios WHERE correo = ?";
        
        $consulta = $this->prepare($sql);       
        $consulta->bind_param('s', $usuario);
        //rescatamos las variables locales del login.php
        $usuario = $data['usuario']; 
        $pass = $data['pass'];
        //ejecutamos la consulta
        $this->execute($consulta);
        $consulta->bind_result($nombre,$apellido,$correo,$pass_db,$perfil);//donde voy a guardar los datos bind_result
        $consulta->fetch();//leemos los datos resultantes
        //verificamos la contraseña
        if ($pass==$pass_db) {
            //al ser un usuario válido, creamos un arreglo para ver almacenar los resultados 
            $info = array(
                'estado' => true,
                'nombre' => $nombre,
                'apellido' =>$apellido,
                'correo' =>$correo,
                'pass' =>$pass,
                'perfil' =>$perfil
            );
            }else{
                $info = array(
                    'estado' => false,
                    'mensaje' => "Usuario o la contreña son incorrectos"
                );
            }
            //retornar en un arreglo con los resultados 
            return $info;            
        }
    }
    $accesos = new Accesos;
?>