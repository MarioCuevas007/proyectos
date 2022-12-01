<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/rolcontroller.php";
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";

$obj = new rolcontroller();
$obj2 = new ClienteController();
$all = $obj->mostrar();
$all2 = $obj2->Index();
?>
    <h3>asignaciones de roles</h3>
    <br>
    <form action="asignar.php" method="post">
        <label for="#">Roles:</label>
        <select name="rol_id" id="">
            <?php if($all):?>
                <?php foreach($all as $al): ?>
            <option value="<?=$al["id"]?>"><?=$al["rol"]?></option>
            <?php endforeach; ?>
            <?php else: ?>
                <option value="">No hay rol</option>
                <?php endif;?>
        </select>
            

        <br>
        <br>
        <label for="">Cliente</label>
        <select name="cliente_id" id="">
            <?php if($all2):?>
                <?php foreach($all2 as $al2): ?>
                    <option value="<?=$al2["id"]?>"><?=$al2["nombre"]?></option>
            <?php endforeach; ?>
            <?php else: ?>
                <option value="">No hay clientes</option>
                <?php endif; ?>
        </select>
        <input type="submit" value="ASIGNAR">
    </form>



<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>