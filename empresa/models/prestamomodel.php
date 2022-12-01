<?php

class PrestamoModel{
    private $prestamol;




    public function __construct()
    {
        require_once "c://xampp/htdocs/empresa/config/db.php";
        $obj = new db();
        $this->prestamol = $obj->conexion();
    }


    public function insertar($codigo,$inicio,$termino,$monto,$tasa,$cliente_id){
        $query = $this->prestamol->prepare("INSERT INTO prestamo(codigo_prestamo,fecha_inicio,fecha_termino,monto_prestamo,tasa_interes,cliente_id)VALUES(:codigo,:inicio,:termino,:monto,:interes,:cliente_id)");
        $query->bindParam(":codigo",$codigo);
        $query->bindParam(":inicio",$inicio);
        $query->bindParam(":termino",$termino);
        $query->bindParam(":monto",$monto);
        $query->bindParam(":interes",$tasa);
        $query->bindParam(":cliente_id",$cliente_id);
        if($query->execute()){
            return $this->prestamol->lastInsertId();
        }else{
            return false;
        }
    }

    public function mostrarPrestamo($id){
        $query = $this->prestamol->prepare("SELECT prestamo.codigo_prestamo,prestamo.monto_prestamo,prestamo.tasa_interes,prestamo.fecha_inicio,prestamo.fecha_termino  FROM prestamo  INNER JOIN cliente ON cliente.id = prestamo.cliente_id WHERE cliente.id=:id");
        $query->bindParam(":id",$id);
        if($query->execute()){
            return $query->fetchAll();
        }else{
            return false;
        }
    }

    public function Index(){
        $query= $this->prestamol->prepare("SELECT * FROM prestamo");
        if($query->execute()){
            return $query->fetchAll();
        }else{
            return false;
        }
    }


    public function solicitud_prestamo($prestamo_id){
        $query = $this->prestamol->prepare("INSERT INTO solicitud_prestamo(prestamo_id) VALUES (:prestamo_id)");
        $query->bindParam(":prestamo_id",$prestamo_id);
        if($query->execute()){
            return $this->prestamol->lastInsertId();
        }else{
            return false;
        }
    }

    public function estados($id){
        $query = $this->prestamol->prepare("SELECT * FROM solicitud_prestamo WHERE prestamo_id= :prestamo_id");
        $query->bindParam(":prestamo_id",$id);
        if($query->execute()){
            return $query->fetchObject();
        }else{
            return false;
        }
    }


    public function actualizarEstado($prestamo_id){
        $query = $this->prestamol->prepare("UPDATE `solicitud_prestamo` SET `estado`='aprobado' WHERE id = :id");
        $query->bindParam(":id",$prestamo_id);
        if($query->execute()){
            return $prestamo_id;
        }else{
            return false;
        }
    }
}

?>