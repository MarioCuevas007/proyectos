<?php

class Cliente{
    private $model;


    public function __construct()
    {
        require_once "c://xampp/htdocs/empresa/config/db.php";
        $con = new db();
        $this->model = $con->conexion();
    }


    public function Index(){
        $query = $this->model->prepare("SELECT * FROM cliente");
        if($query->execute()){
            return $query->fetchAll();
        }else{
            return false;
        }
    }


    public function Insert($cedula,$nombre,$apellido,$direccion,$telefono){
        $query = $this->model->prepare("INSERT INTO cliente VALUES(null,:cedula,:nombre,:apellido,:direccion,:telefono)");
        $query->bindParam(":cedula",$cedula);
        $query->bindParam(":nombre",$nombre);
        $query->bindParam(":apellido",$apellido);
        $query->bindParam(":direccion",$direccion);
        $query->bindParam(":telefono",$telefono);
        if($query->execute()){
            return $this->model->lastInsertId();
        }else{
            return false;
        }

    }

    public function Show($id){
        $query = $this->model->prepare("SELECT * FROM cliente WHERE id = :id ");
        $query->bindParam(":id",$id);
        if($query->execute()){
            return $query->fetchObject();
        }else{
            return false;
        }
    }

    public function Update($id,$cedula,$nombre,$apellido,$direccion,$telefono){
        $query = $this->model->prepare("UPDATE cliente SET cedula = :cedula, nombre = :nombre, apellido = :apellido, direccion = :direccion, telefono = :telefono WHERE id = :id");
        $query->bindParam(":id",$id);
        $query->bindParam(":cedula",$cedula);
        $query->bindParam(":nombre",$nombre);
        $query->bindParam(":apellido",$apellido);
        $query->bindParam(":direccion",$direccion);
        $query->bindParam(":telefono",$telefono);
        if($query->execute()){
            return $id;
        }else{
            return false;
        }
    }


    public function Delete($id){
        $query = $this->model->prepare("DELETE FROM cliente WHERE id = :id");
        $query->bindParam(":id",$id);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>