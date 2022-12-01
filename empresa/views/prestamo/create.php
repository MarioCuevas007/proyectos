<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";

$obj2 = new ClienteController();
$all2 = $obj2->Index();

$co = "CO-".rand(100,10000); 
?>
    <form action="store.php" method="post">
        <div class="mb-3">
            <label for="">Codigo Prestamo</label> <br>
            <input type="text" name="codigo" class="form-control" readonly value="<?=$co?>"> <br>
            <label for="">Fecha Inicio Del Prestamo</label> <br>
            <input type="date" name="inicio" class="form-control"> <br>
            <label for="">Fecha Termino</label> <br>
            <input type="date" name="termino" class="form-control"> <br>
            <label for="">Monto Del Prestamo</label> <br>
            <input type="text" name="monto" class="form-control"> <br>
            <label for="">Tasa Interes</label> <br>
            <input type="text" name="interes" class="form-control">
            <br>
            <br>
            <label for="">Prestamo a Nombre De: </label>
            <select name="cliente_id" id="">
            <?php if($all2):?>
                <?php foreach($all2 as $al2): ?>
                    <option value="<?=$al2["id"]?>"><?=$al2["nombre"]?></option>
            <?php endforeach; ?>
            <?php else: ?>
                <option value="">No hay clientes</option>
                <?php endif; ?>
        </select>
        </div>
            <input type="submit" value="Solicitar"  class="btn btn-primary mb-3">
    </form>
<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>