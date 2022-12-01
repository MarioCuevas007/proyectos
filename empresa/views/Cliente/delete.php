<?php
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";
$obj = new ClienteController();

$delete = $obj->Delete($_GET["id"]);

?>