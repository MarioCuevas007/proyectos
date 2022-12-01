<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/prestamocontroller.php";

$obj = new PrestamoController();
$obj->solicitar($_GET["id"]);
?>

aqui se mostrara la tabla del prestamo para ver si lo aprobamos si o no



<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>