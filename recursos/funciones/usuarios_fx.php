<?php 
include('../clases/usuariosCs.php');

if(isset($_POST['btnRegistrar'])){
    echo "Seleccionaste Registrar ";

    $idH = $_POST['idH'];
    $run= $_POST['run'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $perfil = $_POST['perfil'];

    if (empty($run) || empty($nombre) || empty($apellido) || empty($correo) || empty($pass) || empty($pass2)) {
        header("location: ../../usuarios.php?mensaje=<div class='alert alert-danger'>Los campós son obligatorios</div>");

    }else{
        if($pass==$pass2){
            $params = array(
                'idH' => $idH,
                'run' => $run,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'pass' => $pass,
                'perfil' => $perfil
            );
            //var_dump($params);
            $respuesta = json_decode($usuario->guardar($params));
            
            if ($respuesta->estado==true) {
                header("location: ../../usuarios.php?mensaje=<div class='alert alert-success'>".$respuesta->mensaje."</div>");
            }else{
                header("location: ../../usuarios.php?mensaje=<div class='alert alert-danger'>".$respuesta->mensaje."</div>");
            }
    
        }else{
            header("location: ../../usuarios.php?mensaje=<div class='alert alert-danger'>Las contraseñas no son iguales</div>");
        }    
    }
}
if(isset($_POST['btnBuscar'])){
    //echo "Seleccionaste Buscar";
    $run= $_POST['run'];
    $params = array(
        'idH' => $idH,
        'run' => $run
    );

}
if(isset($_POST['btnModificar'])){
    echo "Seleccionaste Modificar";

    $idH = $_POST['idH'];
    $run= $_POST['run'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $perfil = $_POST['perfil'];

    if (empty($run) || empty($nombre) || empty($apellido) || empty($correo) || empty($pass) || empty($pass2)) {
        header("location: ../../usuarios.php?mensaje=<div class='alert alert-danger'>Los campós son obligatorios</div>");

    }else{
        if($pass==$pass2){
            $params = array(
                'idH' => $idH,
                'run' => $run,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'pass' => $pass,
                'perfil' => $perfil
            );
            //var_dump($params);
            $respuesta = json_decode($usuario->modificar($params));
            
            if ($respuesta->estado==true) {
                header("location: ../../usuarios.php?mensaje=<div class='alert alert-success'>".$respuesta->mensaje."</div>");
            }else{
                header("location: ../../usuarios.php?mensaje=<div class='alert alert-danger'>".$respuesta->mensaje."</div>");
            }
    
        }else{
            header("location: ../../usuarios.php?mensaje=<div class='alert alert-danger'>Las contraseñas no son iguales</div>");
        }    
    }



}
if(isset($_POST['btnEliminar'])){
    echo "Seleccionaste Eliminar";
}

?>