<?php

class db{
    private $host= "localhost";
    private $dbname = "empresa";
    private $user = "root";
    private $password = "";


    public function conexion(){
        try{

            $con = new PDO("mysql: host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
            return $con;

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}

?>