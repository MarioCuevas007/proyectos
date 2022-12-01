<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";
require_once "c://xampp/htdocs/empresa/controllers/rolcontroller.php";
require_once "c://xampp/htdocs/empresa/controllers/prestamocontroller.php";

$obj = new ClienteController();
$cli = $obj->Show($_GET["id"]);

$rol = new rolcontroller();
$mr = $rol->rolCliente($_GET["id"]);

$prestamo = new PrestamoController();
$mp = $prestamo->mostrarPrestamo($_GET["id"]);

?>

<h2>Cliente: <?=$cli->nombre ?></h2>
<br>

<a href="index.php" class="btn btn-primary">Regresar</a>

<div class="container-fluid">
        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Rol:</th>
            </thead>
            <tbody>
                    <tr>
                        <td scope="col"><?= $cli->id?></td>
                        <td scope="col"><?= $cli->cedula?></td>
                        <td scope="col"><?= $cli->nombre?></td>
                        <td scope="col"><?= $cli->apellido?></td>
                        <td scope="col"><?= $cli->direccion?></td>
                        <td scope="col"><?= $cli->telefono?></td>
                        <?php if($mr):?>
                            <?php foreach($mr as $r):?>
                                <td>
                                    <?=$r["rol"]."<br>"?>
                                </td>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <td>No tiene rol</td>
                        <?php endif; ?>
                    </tr>
            </tbody>
        </table>
    </div>

      <h2>Prestamos:</h2>                      
    <div class="container-fluid">
        <table class="table">
            <thead>
                <th scope="col">CODIGO</th>
                <th scope="col">MONTO</th>
                <th scope="col">Tasa De Interes</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Termino</th>
                <th scope="col">Acciones</th>
            </thead>
            <tbody>
            <?php if($mp): ?>
                <?php foreach($mp as $m):?>
                    <tr>
                        <td scope="col"><?= $m["codigo_prestamo"]?></td>
                        <td scope="col"><?= $m["monto_prestamo"]?></td>
                        <td scope="col"><?= $m["tasa_interes"]?></td>
                        <td scope="col"><?= $m["fecha_inicio"]?></td>
                        <td scope="col"><?= $m["fecha_termino"]?></td>
                        <td scope="col">
                        <a href="../prestamo/amortizacion.php?monto=<?=$m['monto_prestamo']?>&tasa=<?=$m['tasa_interes']?>&inicio=<?=$m['fecha_inicio']?>&termino=<?=$m['fecha_termino']?>" class="btn btn-dark">Ver Cronograma:</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                            <tr>
                                <td>
                                    no Tiene Prestamos
                                </td>
                                <td>
                                <a href="../prestamo/create.php?id=<?=$cli->id?>" class="btn btn-dark">Asignar Uno</a>
                                </td>
                            </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>