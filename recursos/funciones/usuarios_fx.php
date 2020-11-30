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
        var_dump($params);
        $respuesta = json_decode($usuario->guardar($params));

    }else{
        header('location: ../../usuarios.php?mensaje=Las contraseñas no son iguales');
    }    
    

    

}
if(isset($_POST['btnBuscar'])){
    //echo "Seleccionaste Buscar";
    $run= $_POST['run'];
    $params = array(
        'run' => $run
    );

}
if(isset($_POST['btnModificar'])){
    echo "Seleccionaste Modificar";
}
if(isset($_POST['btnEliminar'])){
    echo "Seleccionaste Eliminar";
}

?>