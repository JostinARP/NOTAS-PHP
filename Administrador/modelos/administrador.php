<?php
include_once('../../Conexion.php');
class Administrador extends Conexion{
	public function __construct(){

    $this->db = parent::__construct(); 

    }


    public funcion agregarad($Nombread,$Apellidoad,$Usuarioad,$Passwordad,$Perfilad,$Estadoad)
    {
        $statement = $this->db->prepare("INSERT INTO usuarios(nombreusu,apellido,usuusuario,passwordusu,perfil,estado)values(:Nombread,:Apellidoad,:Usuarioad,:Passwordad,:Perfilad,:Estadoad)");

        $statement->bindparam(":Nombread",$Nombread);
        $statement->bindparam(":Apellidoad",$Apellidoad);
        $statement->bindparam(":Usuarioad",$Usuarioad);
        $statement->bindparam(":Passwordad",$Passwordad);
        $statement->bindparam(":Perfilad",$Perfilad);
        $statement->bindparam(":Estadoad",$Estadoad);
    }

   
}

?>