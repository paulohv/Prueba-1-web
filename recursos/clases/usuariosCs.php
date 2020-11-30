<?php 
require 'conexionCs.php';
class Usuario extends Conexion
{
    public function __construct()
    {
        parent::__construct();
        return $this;
    }

    public function mostrar()
    {
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_arg();
        $sqlCuantos = "SELECT id, run, nombre, apellido, correo, pass, perfil FROM usuarios WHERE id=?;";
        $sqlMostrar = $this->prepare($sqlCuantos);
        $codigo = $data['idH'];
        $sqlMostrar->bind_param('i', $codigo);
        $sqlMostrar->execute();
        $sqlMostrar->bind_result($id, $run, $nombre, $apellido, $correo, $pass, $perfil);
        $sqlMostrar->fetch();
        $sqlMostrar->close();

        if (!empty($id)) {
            $info = array(
                'estado' =>true,
                'id' => utf8_encode($id),
                'run' => utf8_encode($run),
                'nombre' => utf8_encode($nombre),
                'apellido' => utf8_encode($apellido),
                'correo' => utf8_encode($correo),
                'pass' => utf8_enconde($pass),
                'perfil' => utf8_encode($perfil)
            );
        } else {
            $info=array(
                'estado' => false,
                'mensaje' => 'El usuario no se encuentra registrado'
            );
        }
        return json_encode($info);
    }


    public function guardar()
    {
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sqlCuantos="SELECT COUNT(usuarios.id) AS 'cuantos' FROM usuarios WHERE usuarios.correo = ?;";
        $consultaCuantos = $this->prepare($sqlCuantos);
        $consultaCuantos->bind_param('s',$correo);
        $correo = $data['correo'];
        //$consultaCuantos->bind_param('s', $correo);
        $consultaCuantos->execute();
        $consultaCuantos->bind_result($cuantos);
        $consultaCuantos->fetch();
        $consultaCuantos->close();

        //verificar si existe el usuario
        if ($cuantos==0) {
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
            $insertarUser->bind_param('ssssss', $run, $nombre, $apellido, $correo, $pass, $perfil);
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
                //'id'=> $ultimoUser
            );
        } else {
            //enviar mensaje de respuesta indicando que no se pudo registrar el usuario
            $info = array(
                'estado' => false,
                'mensaje' => 'Error: imposible ingresar el Usuario ya existe'
            );
        }
        return json_encode($info);
    }

    public function modificar()
    {
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sqlCuantos="SELECT COUNT(usuarios.id) AS 'cuantos' FROM usuarios WHERE usuarios.id = ?;";
        $consultaCuantos = $this->prepare($sqlCuantos);
        $id = $data['idH'];
        $consultaCuantos->bind_param('i', $id);
        $consultaCuantos->execute();
        $consultaCuantos->bind_result($cuantos);
        $consultaCuantos->fetch();
        $consultaCuantos->close();

        //verificar si existe el usuario
        if ($cuantos==0) {
            $info = array(
                'estado' => false,
                'mensaje' => 'Error: No se puede modificar, Usuario NO existe'
            );
        } else {
            //modificamos
            

            $sqlModificar = "UPDATE usuarios SET run = ?, nombre = ?, apellido = ?, pass = ?, perfil = ? WHERE usuarios.id = ?;";
            $modificarUser = $this->prepare($sqlModificar);
            $id = $data['idH'];
            $run = $data['run'];
            $nombre = utf8_decode($data['nombre']);
            $apellido = utf8_decode($data['apellido']);
            $pass = utf8_decode($data['pass']);
            $perfil = utf8_decode($data['perfil']);
            $modificarUser->bind_param('sssssi', $run, $nombre, $apellido, $pass, $perfil, $id);
            $modificarUser->execute();
            $modificarUser->close();

            //$sqlUltimo = "SELECT MAX(usuarios.id) AS 'ultimo' FROM usuarios;";
            //$buscarUltimo = $this->prepare($sqlUltimo);
            //$buscarUltimo->execute();
            //$buscarUltimo->bind_result($ultimoUser);
            //$buscarUltimo->fetch();
            //$buscarUltimo->close();

            $info = array(
                'estado' => true,
                'mensaje' => 'Usuario modificado correctamente',
                'id' => $id
            );
        }
        return json_encode($info);
    }

    public function buscar(){
    
    }


    public function eliminar()
    {
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sqlCuantos="SELECT COUNT(usuarios.id) AS 'cuantos' FROM usuarios WHERE usuarios.id = ?;";
        $consultaCuantos = $this->prepare($sqlCuantos);
        $id = $data['idH'];
        $consultaCuantos->bind_param('i', $id);
        $consultaCuantos->execute();
        $consultaCuantos->bind_result($cuantos);
        $consultaCuantos->fetch();
        $consultaCuantos->close();

        //verificar si existe el usuario
        if ($cuantos==0) {
            $info = array(
                'estado' => false,
                'mensaje' => 'Error: No se puede modificar, Usuario NO existe'
            );
        } else {
            //modificamos
            

            $sqlModificar = "DELETE usuarios SET run = ?  WHERE usuarios.id = ?;";
            $modificarUser = $this->prepare($sqlModificar);
            $id = $data['idH'];
            $run = $data['run'];
            $nombre = utf8_decode($data['nombre']);
            $apellido = utf8_decode($data['apellido']);
            $pass = utf8_decode($data['pass']);
            $perfil = utf8_decode($data['perfil']);
            $modificarUser->bind_param('sssssi', $run, $nombre, $apellido, $pass, $perfil, $id);
            $modificarUser->execute();
            $modificarUser->close();

            //$sqlUltimo = "SELECT MAX(usuarios.id) AS 'ultimo' FROM usuarios;";
            //$buscarUltimo = $this->prepare($sqlUltimo);
            //$buscarUltimo->execute();
            //$buscarUltimo->bind_result($ultimoUser);
            //$buscarUltimo->fetch();
            //$buscarUltimo->close();

            $info = array(
                'estado' => true,
                'mensaje' => 'Usuario modificado correctamente',
                'id' => $id
            );
        }
        return json_encode($info);
    }
}


$usuario = new Usuario;
?>