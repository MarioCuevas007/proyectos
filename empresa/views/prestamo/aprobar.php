<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/prestamocontroller.php";

 $obj = new PrestamoController();
 $apro = $obj->mostrarParaAprobar($_GET["id"]);
?>
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <th scope="col">Estado Del Prestamo:</th>
                <th scope="col">Fecha Aprobacion:</th>
                <th scope="col">Acciones</th>
            </thead>
            <tbody>
                <?php if($apro):?>
                    <?php foreach($apro as $pro): ?>
                <tr>
                    <td scope="col"><?=$apro->estado?></td>
                    <td scope="col"><?=$apro->fecha_aprobacion?></td>
                    <td scope="col"><a href="cambiarestado.php?id=<?=$apro->id?>" class="btn btn-danger">Aprobar</a></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td>No Ha Sido Mandado Aprobar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>