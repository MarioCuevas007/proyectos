<?php

class PrestamoController{
    private $prestacon;



    public function __construct()
    {
        require_once "c://xampp/htdocs/empresa/models/prestamomodel.php";
        $this->prestacon = new PrestamoModel();
    }


    public function Insertar($codigo,$inicio,$termino,$monto,$interes,$cliente_id){
        $in = $this->prestacon->insertar($codigo,$inicio,$termino,$monto,$interes,$cliente_id);
        if($in){
            header("location: index.php");
        }else{
            return false;
        }
    }

    public function mostrarPrestamo($id){
        if($this->prestacon->mostrarPrestamo($id)){
            return $this->prestacon->mostrarPrestamo($id);
        }else{
            return false;
        }
    }

    public function Index(){
        if($this->prestacon->Index()){
            return $this->prestacon->Index();
        }else{
            return false;
        }
    }

    public function solicitar($id){
        $in = $this->prestacon->solicitud_prestamo($id);
        if($in){
            header("location: index.php");
        }else{
            return false;
        }
    }

    public function mostrarParaAprobar($id){
        if($this->prestacon->estados($id)){
            return $this->prestacon->estados($id);
        }else{
            return false;
        }
    }

    public function cambiarStatus($id){
        if($this->prestacon->actualizarEstado($id)){
            header("location: ../Cliente/index.php");
        }else{
            return false;
        }      
    }
}

?>