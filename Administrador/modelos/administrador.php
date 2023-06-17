<?php
include_once('../../Conexion.php');
class Administrador extends Conexion{
	public function __construct(){

    $this->db = parent::__construct(); 

    }

    //insertar un usuario
    public function agregarad($Nombread,$Apellidoad,$Usuarioad,$Passwordad,$Perfilad,$Estadoad)
    {
        $statement = $this->db->prepare("INSERT INTO usuarios(nombreusu,apellido,usuusuario,passwordusu,perfil,estado)values(:Nombread,:Apellidoad,:Usuarioad,:Passwordad,:'Administrador',:'Activo')");

        $statement->bindparam(":Nombread",$Nombread);
        $statement->bindparam(":Apellidoad",$Apellidoad);
        $statement->bindparam(":Usuarioad",$Usuarioad);
        $statement->bindparam(":Passwordad",$Passwordad);
        $statement->bindparam(":Perfilad",$Perfilad);
        $statement->bindparam(":Estadoad",$Estadoad);

        if ($statement->execute()) {
            echo "Usuario registrado";
            header('Location: ../pages/index.php');

        }else{
            echo "No se puede Realizar el registro";
            header('Location: ../pages/agregar.php');
        }
    }
    //funcion para selecionar todos los usuarios que sean administradores
    public function getad(){
        $row =null;
        $statement=$this->db->prepare("SELECT * FROM usuarios WHERE perfil='Administrador'");
        $statement=->execute();
        while($resul= $statement->fetch()){
            $row[]=$resul;
        }
        return $row;

     }
    //funcion de seleccion de usuruario mediante id
    public function getidad($Id){
        $row=null;
        $statement=$this->db->prepare("SELECT * FROM usuarios WHERE perfil='Administrador' AND  id_usuario=:Id");
        $statement->bindparam(':Id',$Id);
        $statement->execute();
        while ($resul = $statement->fetch()) {
            $row=$resul;
        }
        return $row;
    }
    //funcion para actualizar los datos del usuario
    public function updatead($Id,$Nombread,$Apellidoad,$Usuarioad,$Passwordad,$Estadoad){
        $statement=$this->db->prepare("UPDATE usuarios SET nombreusu=:Nombread,apellidousu=:Apellidoad,usuario=:Usuarioad,passwordusu=:Passwordad,estado=:Estadoad where id_usuario=$Id");

        $statement->bindparam(':Id',$Id);
        $statement->bindparam(':Nombread',$Nombread);
        $statement->bindparam(':Apellidoad',$Apellidoad);
        $statement->bindparam(':Usuarioad',$Usuarioad);
        $statement->bindparam(':Passwordad',$Passwordad);
        $statement->bindparam(':Estadoad',$Estadoad);
        if($statement->execute()){
            header('Location: ../pages/index.php');
        }else{
            header('Location: ../pages/editar.php');
        }

    }
   //funcion para eliminar usuario
    public function deletead($Id){
        $statement=$this->db->prepare("DELETE * FROM usuarios WHERE id_usuario=:Id");
        $statement->bindparam(':Id',$Id);
        if ($statement->execute()) {
            echo "Usuario eliminado";
            header('Location: ../pages/index.php');
        }else{
            echo"El usuario no se puede Eliminar";
            header('Location: ../pages/eliminar.php');
        }
    }

}

?>