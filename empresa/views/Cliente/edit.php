<?php
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";

$obj = new ClienteController();
$edit = $obj->Show($_GET["id"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Editar Informacion Del Cliente</h2>
    <form action="update.php" method="post">
        <label for="">ID</label> <br>
        <input type="text" name="id" value="<?= $edit->id?>" readonly> <br>
        <label for="">cedula</label> <br>
        <input type="text" name="cedula" value="<?= $edit->cedula?>"> <br>
        <label for="">Nombre</label> <br>
        <input type="text" name="nombre" value="<?= $edit->nombre?>"> <br>
        <label for="">apellido</label> <br>
        <input type="text" name="apellido" value="<?= $edit->apellido?>"> <br>
        <label for="">direccion</label> <br>
        <input type="text" name="direccion" value="<?= $edit->direccion?>"> <br>
        <label for="">telefono</label> <br>
        <input type="text" name="telefono" value="<?= $edit->telefono?>"> <br>
        <br>
        <input type="submit" value="editar">
    </form>
</body>
</html>