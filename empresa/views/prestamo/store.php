<?php
require_once "c://xampp/htdocs/empresa/controllers/prestamocontroller.php";
$obj = new PrestamoController();

$obj->Insertar($_POST["codigo"],$_POST["inicio"],$_POST["termino"],$_POST["monto"],$_POST["interes"],$_POST["cliente_id"]);

?>