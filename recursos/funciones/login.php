<?php 
include('../clases/accesosCs.php');


 
if (isset($_POST['boton'])) {
    $usuario = $_POST['user'];
    $pass = $_POST['pass'];

    $params = array(
        'usuario' => $usuario,
        'pass' => $pass
    );
}

$login = json_decode($accesos->login($params));   

?>
