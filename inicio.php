    <?php
    //var_dump($_POST);

    $usuario = $_POST['user'];
    $clave = $_POST['pass'];

    if ($usuario == 'paulo' && $clave == '1234') {
        echo "Bienvenido ".$usuario;
    }else {
        echo "Acceso denegado";
    }
    ?>