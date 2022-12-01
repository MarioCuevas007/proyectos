<?php
require_once "c://xampp/htdocs/empresa/controllers/prestamocontroller.php";
$obj = new PrestamoController();
$obj->cambiarStatus($_GET['id']);
?>