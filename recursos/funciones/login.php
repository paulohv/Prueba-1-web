<?php
session_start();

include('../clases/accesosCs.php');


 
if (isset($_POST['boton'])) {
    $usuario = $_POST['user'];
    $pass = $_POST['pass'];

    $params = array(
        'usuario' => $usuario,
        'pass' => $pass
    );
}

$login = $accesos->login($params);   
//var_dump($login);
//Evaluamos la respuesta del metodo login 
if($login['estado'] == true){
    //echo "<b>Iniciado Correctamente</b>";
    $_SESSION['nombreCompleto']= $login['nombre']. " " .$login['apellido'];
    $_SESSION['perfil']= $login['perfil'];
    $_SESSION['correo']=$login['correo'];
    header("location:../../principal.html");
}else{
    header("location:../../index.html");
}

?>
