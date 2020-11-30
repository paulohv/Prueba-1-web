<?php 
require 'conexionCs.php';
class Usuario extends Conexion{
    
    function __construct(){
        parent::__construct();
        return $this;
    }

    public function guardar(){
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sqlCuantos="SELECT COUNT(usuarios.id) AS 'cuantos' FROM usuarios WHERE usuarios.correo = ?;";
        $consultaCuantos = $this->prepare($sqlCuantos);
        $consultaCuantos->bind_param('s',$correo);
        $correo = $data['correo'];
        $consultaCuantos->execute();
        $consultaCuantos->bind_result($cuantos);
        $consultaCuantos->fetch();
        $consultaCuantos->close();

        //verificar si existe el usuario 
        if($cuantos==0){
            //insertar el nuevo usuario
            $sqlinsertar = "INSERT INTO usuarios (id, run, nombre, apellido, correo, pass, perfil) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?);";
            $insertarUser = $this->prepare($sqlinsertar);
            $run = $data['run'];
            $nombre = utf8_decode($data['nombre']);            
            $apellido = utf8_decode($data['apellido']);
            $correo = utf8_decode($data['correo']);            
            $pass = utf8_decode($data['pass']);
            $perfil = utf8_decode($data['perfil']);            
            $insertarUser->bind_param('ssssss',$run, $nombre, $apellido, $correo, $pass, $perfil);
            $insertarUser->execute();
            $insertarUser->close();

            //$sqlUltimo = "SELECT MAX(usuarios.id) AS 'ultimo' FROM usuarios;";
            //$buscarUltimo = $this->prepare($sqlUltimo);
            //$buscarUltimo->execute();
            //$buscarUltimo->bind_result($ultimoUser);
            //$buscarUltimo->fetch();
            //$buscarUltimo->close();

            $info = array(
                'estado' => true,
                'mensaje' => 'Usuario ingresado correctamente',
                //'id'=>$ultimoUser;
            );

        }else{
            //enviar mensaje de respuesta indicando que no se pudo registrar el usuario 
            $info = array(
                'estado' => false,
                'mensaje' => 'Error: imposible ingresar el Usuario ya existe'
            );
        }
        return json_encode($info);
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