<?php 
session_start();
include("templates/header.php");

?>
<div class="container">
    <div class="row">
        <div class="col-10 mt-3">
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
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="id">Código:</label>
                                        <input type="text" disabled class="form-control" id="id" name="id" placeholder="id usuario">
                                        <input type="hidden" name="idH">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ingrese su nombre">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="ingrese su apellido">
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="correo">Correo:</label>
                                        <input type="email" class="form-control" id="correo" name="correo" placeholder="ingrese su correo">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="pass">Contraseña:</label>
                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="ingrese su contraseña">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="nombre">Perfil:</label>
                                        <select class="form-control" name="perfil" id="perfil">
                                            <option>Administrador</option>
                                            <option>Administrativo</option>
                                            <option>Visitante</option>
                                        </select>

                                    </div>
                                </div>
                                

                                  
                            </div>
                            <div class="col-3">
                                   <!-- aqui va la foto -->

                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include("templates/footer.php")
?>