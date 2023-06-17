<?php
include_once('../../Conexion.php');
class Docentes extends Conexion{
    public function __construct(){

    $this->db = parent::__construct();

    }

    //para insertar un docente
    public function agregardo($Nombredo,$Apellidodo,$Documentodo,$Correodo,$Materiado,$Notasmate){
        $statement = $this->db->preparfe("INSERT INTO docentes(nombredoc,apellidodoc,documentodoc,correodoc,materiadoc,notasmate)values(:Nombredo,:Apellidodo,:Documentodo,:Correodo,:Materiado,:Notasmate)");

        $statement->bindparam(":Nombredo",$Nombredo);
        $statement->bindparam(":Apellidodo",$Apellidodo);
        $statement->bindparam(":Documentodo",$Documentodo);
        $statement->bindparam(":Correodo",$Correodo);
        $statement->bindparam(":Materiado",$Materiado);
        $statement->bindparam(":Notasmate",$Notasmate);

        if($statement->execute()){
            echo "El docente fue registrado";
            header('Location: ../pages/index.php');
        }else{
            echo "No se puede registrar el docente";
            header ('Location: ../pages/agragar.php')
        }

    }
    //funcion para seleccionar todos los docentes
    public function getad(){
        $row=null;
        $statement=$this->db->prepare("SELECT * FROM  docentes ");
        $statement=->execute();

        while ($resul= $statement->fetch()) {
            $row[]=$resul;
        }
        return $row;

    }
    // docentes por id
    public function getiddo($Id){
        $row=null;
        $statement=$this->db->prepare("SELECT * FROM docentes where id_docente=:Id");
        $statement->bindparam(':Id',$Id);
        $statement->execute();
        while ($resul = $statement->fetch()) {
            $row=$resul;
        }
        return $row;
    }
    //actualizar datos de los docentes
    public function updatedo($Id,$Nombredo,$Apellidodo,$Documentodo,$Correodo,$Materiado,$Notasmate){
        $statement=$this->db->prepare("UPDATE docentes SET nombredoc=:Nombredo,apellidodoc=:Apellidodo,documentodoc=:Documentodo,correodoc=:Correodo,materiadoc=:Materiado,notasmate=:Notasmate where id_docente=$Id");

        $statement->bindparam(':Id',$Id);
        $statement->bindparam(':Nombredo',$Nombredo);
        $statement->bindparam(':Apellidodo',$Apellidodo);
        $statement->bindparam(':Documentodo',$Documentodo);
        $statement->bindparam(':Correodo',$Correodo);
        $statement->bindparam(':Materiado',$Materiado);
        $statement->bindparam(':Notasmate',$Notasmate);

        if($statement->execute()){
            header('Location: ../pages/index.php');
        }else{
            header('Location: ../pages/editar,php');
        }

    }
    //eliminar docentes 
    public function deletedo($Id){
        $statement=$this->db->prepare("DELETE * FROM docentes where id_docente=:Id");
        $statement->bindparam(':Id',$Id);

        if($statement->execute()){
            echo "Docente eliminado";
            header('Location: ../pages/index.php');
        }else{
            echo "El Docente no se pudo eliminar";
            header('Location: ../pages/eliminar.php');
        }
    }

}

?>