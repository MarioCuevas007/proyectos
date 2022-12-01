<?php

class rolcontroller{
    private $rolco;



    public function __construct()
    {
        require_once "c:/xampp/htdocs/empresa/models/rolmodel.php";
        $this->rolco = new rolmodel();
    }

    public function mostrar(){
        if($this->rolco->mostrar()){
            return $this->rolco->mostrar();
        }else{
            return false;
        }
    }

    public function asignar($cliente_id,$rol_id){
        $as = $this->rolco->asignar($cliente_id,$rol_id);
        $mensaje = "se asigno el rol";
        if($as){
            header("location: ../Cliente/index.php?mensaje=".$mensaje);
        }else{
            echo "no se asigno";
        }
    }

    public function rolCliente($id){
        if($this->rolco->rolCliente($id)){
            return $this->rolco->rolCliente($id);
        }else{
            return false;
        }
    }
}


?>