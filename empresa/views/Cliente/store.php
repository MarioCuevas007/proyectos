<?php
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";
$obj = new ClienteController();

$obj->Insertar($_POST["cedula"],$_POST["nombre"],$_POST["apellido"],$_POST["direccion"],$_POST["telefono"]);
?>