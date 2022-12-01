<?php

class rolmodel{
    private $rolmo;


    public function __construct()
    {
        require_once "c://xampp/htdocs/empresa/config/db.php";
        $con = new db();
        $this->rolmo = $con->conexion();
    }

    public function mostrar(){
        $query = $this->rolmo->prepare("SELECT * FROM roles");
        if($query->execute()){
            return $query->fetchAll();
        }else{
            return false;
        }
    }

    public function asignar($cliente_id,$rol_id){
        $query = $this->rolmo->prepare("INSERT INTO cliente_role(cliente_id,rol_id) VALUES(:cliente_id,:rol_id)");
        $query->bindParam(":cliente_id",$cliente_id);
        $query->bindParam(":rol_id",$rol_id);
        if($query->execute()){
            return $this->rolmo->lastInsertId();
        }else{
            return false;
        }
    }

    public function rolCliente($id){
        $query = $this->rolmo->prepare("SELECT nombre,rol FROM cliente INNER JOIN cliente_role ON cliente.id = cliente_role.cliente_id INNER JOIN roles ON roles.id = cliente_role.rol_id WHERE cliente.id = :id");
        $query->bindParam(":id",$id);
        if($query->execute()){
            return $query->fetchAll();
        }else{
            return false;
        }
    }
}

?>