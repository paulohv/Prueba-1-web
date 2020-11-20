<?php
//primero crear los parametros de conexion 
$servidor = "localhost";
$usuario = "usuario723";
$password = "asd123";
$basedatos = "web723";

//segundo conectarnos con el servidor 
//parametros: el servidor, usuario y contraseña de la base de datos
$conexion = mysqli_connect($servidor,$usuario,$password) or die("<b>No hay conexion con el servidor</b>");

// parametros: 
mysqli_set_charset($conexion,"utf8");

//tercero:  conectarnos a la base de datos
$bd = mysqli_select_db($conexion,$basedatos) or die ("<b>No hay conexion con la base de datos</b>")

// termino de la conexión








?>