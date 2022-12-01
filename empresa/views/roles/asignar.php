<?php
require_once "c://xampp/htdocs/empresa/controllers/rolcontroller.php";

$obj = new rolcontroller();
$obj->asignar($_POST["cliente_id"],$_POST["rol_id"]);

?>