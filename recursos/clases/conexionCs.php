<?php
class Conexion{
    // 1 atributos 
    private $server ="localhost";
    private $user ="usuario723";
    private $pass = "asd123";
    private $db = "web723";
    protected $conexion;
    protected $secured;

    //constructor 
    function __construct(){
        $this->conexion = new myslqi($this->$server,$this->user,$this->pass,$this->db);
        
        if($this->conexion->connect_errno){
            die ("Error al conectar con mysql (".$this->conexion->connect_errno)." ) ".$this->conexion->connect_errno ;
        }
    }

    public function proteger_text ($text){
        $this->secured = trip_tags ($text);
        $this->secured = htmlspecialchars(trim(stripslashes($text)),ENT_QUOTES,"UTF8");

        return $this->secured;
    }

    // está funcion retorna un objeto mysqli_stmt 
    protected function prepare($consulta){
        if(!($consulta = $this->conexion->prepare($consulta))){
            die ("Fallo la preparación de la consulta : (". $this->conexion->errno. ") ".$this->conexion->error );
        }
        return $consulta;
    }
    
    protected function execute($sentencia){
        if(!$sentencia -> execute()){
            die ("Fallo la ejecucion de la sentencia : (" . $sentencia->errno . ") " .$this->sentencia->error) ;
        }
        return $sentencia;
    }

}

?>