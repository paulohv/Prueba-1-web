<?php 
session_start();
include('recursos/clases/usuariosCs.php');
include('templates/header.php');

if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
}else{
    $mensaje = "";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $params = array(
        'codigo'=>$id
    );
    //guardamos la respuesta del metodo mostrar del modelo
    $user = json_decode($usuario->mostrar($params),true);
    
    if ($user['estado']==true) {
        $_SESSION['usuario']=$user;
        $run = $_SESSION['usuario']['run'];
        $nombre = $_SESSION['usuario']['nombre'];
        $apellido = $_SESSION['usuario']['apellido'];
        $correo = $_SESSION['usuario']['correo'];
        $perfil = $_SESSION['usuario']['perfil'];        
    }

    

}else{
    $id = "";
    $run = "";
    $nombre = "";
    $apellido = "";
    $correo = "";
    $perfil = "";
}



?>
<?php echo $mensaje;?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header h2">
                    Mantenedor de Usuarios
                    <?php echo $_SESSION['correo'];?>
                </div>
                <div class="card-body">
                    <form action="recursos/funciones/usuarios_fx.php" method="post">
                        <div class="row">
                            <div class="col-9">
                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="id">Código:</label>
                                        <input type="text" disabled class="form-control" id="id" name="id" value="<?php echo $id;?>" placeholder="id usuario">
                                        <input type="hidden" name="idH">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                      <label for="run">Run:</label>
                                      <input type="text" name="run" value="<?php echo $run;?>" id="run" class="form-control" placeholder="Ingrese Run" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="ingrese su nombre">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido;?>" placeholder="ingrese su apellido">
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="correo">Correo:</label>
                                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo;?>" placeholder="ingrese su correo">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="pass">Contraseña:</label>
                                        <input type="password" class="form-control" id="pass" name="pass"  placeholder="ingrese su contraseña">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="pass2">Repetir Contraseña:</label>
                                        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="ingrese su contraseña">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                        <label for="nombre">Perfil:</label>
                                        <select class="form-control" name="perfil" id="perfil">
                                            <option>Administrador</option>
                                            <option>Administrativo</option>
                                            <option>Visitante</option>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                   <!-- aqui va la foto -->
                                   <div class="row">
                                       <img class="img-fluid" src="imagenes/usuario.jpg" alt="Imagen del usuario">
                                   </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-6 col-sm-12 btn-sm">
                                <button type="submit" name="btnRegistrar" class="btn btn-success">Registrar Usuario</button>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 btn-sm">
                                <button type="submit" name="btnModificar" class="btn btn-warning">Modificar Usuario</button>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 btn-sm">
                                <button type="submit" name="btnEliminar" class="btn btn-danger">Eliminar Usuario</button>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 btn-sm">
                                <button type="submit" name="btnBuscar" class="btn btn-info">Buscar Usuario</button>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 btn-sm">
                                <button type="reset" name="btnLimpiar" class="btn btn-info">Limpiar Usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('templates/footer.php')
?>