<?php

class ClienteController{
    private $cc;


    public function __construct()
    {
        require_once "c://xampp/htdocs/empresa/models/ClienteModel.php";
        $this->cc = new Cliente();
    }


    public function Index(){
        if($this->cc->Index()){
            return $this->cc->Index();
        }else{
            return false;
        }
    }

    public function Insertar($cedula,$nombre,$apellido,$direccion,$telefono){
        $in = $this->cc->Insert($cedula,$nombre,$apellido,$direccion,$telefono);
        if($in){
            header("location: index.php?id=".$in);
        }else{
            echo "se quedo enchivao";
        }
    }


    public function Show($id){
        if($this->cc->Show($id)){
            return $this->cc->Show($id);
        }else{
            return false;
        }
    }

    public function Update($id,$cedula,$nombre,$apellido,$direccion,$telefono){
        if($this->cc->Update($id,$cedula,$nombre,$apellido,$direccion,$telefono)){
            header("location: index.php");
        }else{
            echo "no se actualizo miop";
        }
    }

    public function Delete($id){
        if($this->cc->Delete($id)){
            header("location: index.php");
        }else{
            echo "no se borro";
        }
    }
}

?>