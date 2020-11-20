    <?php

    include ('recursos/conexion.php');
    $consulta = "SELECT idCliente, nombre, paterno, materno, direccion, correo, telefono FROM clientes";
    $resultado = mysqli_query($conexion,$consulta) or die("<b>algo salio mal con la consulta</b>");

    //var_dump($_POST);

    $usuario = $_POST['user'];
    $clave = $_POST['pass'];

    if (empty($_POST['estado'])){
        $estado = "inactivo";
    }else{
        $estado = "activo";
    }

    if ($usuario == 'paulo' && $clave == '1234') {
        echo "Bienvenido ".$usuario; // si le coloco $mensaje me da error 500 y cuando quiero mostrar la tabla no me reconoce bootstrap
    }else {
        //echo "Acceso denegado";
        header('location:inde.html');
    }

    include('templates/header.php');
    ?>

    <div class="containter -mt-5">
        <div class="alert alert-success">
            <?php echo $mensaje;?>
        </div>
        <div class="row">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Direción</th>
                        <th>Correo</th>
                        <th>Fono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { //abrimos el while?>
                        <!-- escribir html-->
                        <tr>
                            <td scope="row"></td>
                            <td><?php echo $fila['idCliente'];?></td>
                            <td><?php echo $fila['nombre'];?></td>
                            <td><?php echo $fila['paterno'];?></td>
                            <td><?php echo $fila['materno'];?></td>
                            <td><?php echo $fila['direccion'];?></td>
                            <td><?php echo $fila['correo'];?></td>
                            <td><?php echo $fila['fono'];?></td>
                        </tr>
                    <?php }//Cerramos el while
                        mysqli_close($consulta);
                    ?>
                </tbody>
            </table>
            </div>
    </div>



    <?php
    include('template/footer.php');
    ?>