<?php
include('templates/header.php');
?>

<div class="container">
  <div class="row ">
    <div class="form-group col-3">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre" aria-describedby="helpId">
      <small id="helpId" class="text-muted">Ingrese Nombre</small>
    </div>
    <div class="form-group col-3">
      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido" aria-describedby="helpId">
      <small id="helpId" class="text-muted">Ingrese Apellido</small>
    </div>
    <div class="form-group col-3">
      <label for="edad">Edad:</label>
      <input type="text" name="edad" id="edad" class="form-control" placeholder="Ingrese edad" aria-describedby="helpId">
      <small id="helpId" class="text-muted">Ingrese edad</small>
    </div>
    <div class="form-group col-3">
      <label for="correo">Correo:</label>
      <input type="text" name="correo" id="correo" class="form-control" placeholder="Ingrese correo" aria-describedby="helpId">
      <small id="helpId" class="text-muted">Ingrese correo</small>
    </div>
  </div>
  <div class="row">
    <div class="form-group -3">
      <button onclick="validar();" class="btn btn-primary">Validar</button>
    </div>
  </div>
  <div class="row" id="mensajito" >
    
  </div>
</div>

<script>

function validar(){
  mensaje = "<ul>"; 
  validarNombre();
  validarApellido();
  validarEdad();
  validarCorreo();
  mensaje += "</ul>";
  document.getElementById("mensajito").innerHTML = "<div class='alert alert-danger' >" + mensaje + "</div>";
  alert("Bienvenido " + nombre );
  


/* nombre = document.getElementById("nombre").value;
apellido = document.getElementById("apellido").value;
edad = document.getElementById("edad").value;

if(nombre == "" , apellido=="", edad==""){
  mensaje = "<div class='alert alert-danger' > LOS CAMPOS SON OBLIGATORIOS </div>";
}else{
  mensaje = "<div class='alert alert-succes' > CAMPOS CORRECTOS </div>";
}
*/

}

function validarNombre(){
  nombre = document.getElementById("nombre").value;
  
  if(nombre == ""){
    mensaje += "<li> El nombre es un campo obligatorio </li>";
    //document.write("<div class='alert alert-danger' > El nombre es un campo obligatorio </div>");
  }
} 

function validarApellido(){
  apellido = document.getElementById("apellido").value;
  
  if(apellido == ""){
    mensaje += "<li> El apellido es un campo obligatorio </li>";
    
  }
  
}

function validarEdad(){
  edad = document.getElementById("edad").value;//rescato el valor del input 
  
  if(edad == ""){
    mensaje += "<li> La edad es un campo obligatorio </li>";
    
  }else if(edad!= parseInt(edad)){
    mensaje += "<li> La edad debe ser un numero </li>";
  }
}

function validarCorreo(){
  correo = document.getElementById("correo").value;
  
  if(correo == ""){
    mensaje += "<li> El correo es un campo obligatorio </li>";
  }
}


  /*
  nombre = "Paulo";
  apellido = "Herrera";
  edad = "26"; 
  
  nombre = document.getElementById("nombre").value;
  apellido = document.getElementById("apellido").value;
  edad = document.getElementById("edad").value;
*/
  /*
  var nombre = prompt("Porfavor ingresa tu nombre ", "Anonimo");
  alert("Bienvenido " + nombre );
  var continuar = confirm("Desea continuar ?");

  if(continuar){
    var apellido = prompt(nombre + " porfavor ingresa tu apellido ");
    var edad = prompt(nombre + " " + apellido + " porfavor ingresa tu edad");
    document.write("<div class='alert alert-primary'> Tu nombre es " + nombre + " " + apellido + " y tienes " + edad + " años");
  }else{
    document.write("<div class='alert alert-danger' > Hasta pronto !!! </div>");
  }
  */

  /*document.write("Tu nombre es " + nombre + " " + apellido + " y tienes " + edad + " años.");
  */
  //rescatar los valores que tiene los cuadros de texto
  /*
  document.getElementById("nombre").value= nombre;
  document.getElementById("apellido").value= apellido;
  document.getElementById("edad").value= edad;
  */
</script>

<?php
include('templates/footer.php');
?>