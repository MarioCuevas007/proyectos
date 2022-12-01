<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/prestamocontroller.php";
$obj = new PrestamoController();
$prestamos = $obj->Index();

//print_r($prestamos);
?>

    <a href="create.php" class="btn btn-success">Solicitar Nuevo Prestamo:</a>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Termino</th>
                <th scope="col">Monto Del Prestamo</th>
                <th scope="col">Tasa De Interes</th>
                <th scope="col">Prestamo Perteneciente A</th>
            </thead>
            <tbody>
                <?php if($prestamos): ?>
                    <?php foreach($prestamos as $pre):?>
                        <tr>
                            <td scope="col"><?= $pre["id"]?></td>
                            <td scope="col"><?= $pre["codigo_prestamo"]?></td>
                            <td scope="col"><?= $pre["fecha_solicitud"]?></td>
                            <td scope="col"><?= $pre["fecha_inicio"]?></td>
                            <td scope="col"><?= $pre["fecha_termino"]?></td>
                            <td scope="col"><?= $pre["monto_prestamo"]?></td>
                            <td scope="col"><?= $pre["tasa_interes"]?></td>
                            <td scope="col"><?= $pre["cliente_id"]?></td>
                            <td scope="col">
                                <a href="soliprestamo.php?id=<?=$pre['id']?>" class="btn btn-warning">Enviar Solicitud</a>
                                <a href="aprobar.php?id=<?=$pre['id']?>" class="btn btn-info">Ver Status</a>
                                <!-- <a href="delete.php?id=<?=$pre['id']?>" class="btn btn-danger">Borrar</a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                                <tr>
                                    <td>
                                        no hay registro
                                    </td>
                                </tr>
                    <?php endif; ?>
            </tbody>
            </table>
    </div>


<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>