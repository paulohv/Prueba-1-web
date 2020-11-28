    <?php
    session_start();
    include('recursos/clases/accesosCS.php'); 
    //include('recursos/conexion.php');
    //$consulta = "SELECT idCliente, nombre, paterno, materno, direccion, correo, telefono FROM clientes";
    //$resultado = mysqli_query($conexion,$consulta) or die("<b>algo salio mal con la consulta</b>");

    //var_dump($_POST);
    
    $usuario = $_POST['user'];
    $clave = $_POST['pass'];



    include('templates/header.php');
    ?>

    <div class="containter mt-12 align=ceter" >
        
        <div class="row col-9">
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
                            <td><?php echo $fila['idCliente'];?></td>
                            <td><?php echo $fila['nombre'];?></td>
                            <td><?php echo $fila['paterno'];?></td>
                            <td><?php echo $fila['materno'];?></td>
                            <td><?php echo $fila['direccion'];?></td>
                            <td><?php echo $fila['correo'];?></td>
                            <td><?php echo $fila['telefono'];?></td>
                        </tr>
                    <?php }//Cerramos el while
                        mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php
    include('templates/footer.php');
    ?>