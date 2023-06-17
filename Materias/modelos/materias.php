<?php
include_once('../../Conexion.php');
class Materias extends Conexion{
    public function __construct(){

        $this->db = parent::__construct()

    }
//insertar materia
public function agregarma($Nombremate){
    $statement=$this->db->prepare("INSERT INTO materias(nombremate) VALUE(:Nombremate)");

    $statement->bindparam(":Nombremate",$Nombremate);

    if ($statement->execute()) {
        echo "La materia se Registro";
        header('Location: ../pages/index.php');
    }else{
        echo "No se puede registrar la materia";
        header('Location: ../pages/agragar.php');
    }
}
// mostrar todas las materias
    
}

?>