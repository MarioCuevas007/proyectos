<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
require_once "c://xampp/htdocs/empresa/controllers/ClienteController.php";
$obj= new ClienteController();

$index = $obj->Index();
?>
    <h2>listado de clientes</h2>
    <a href="create.php"  class="btn btn-primary mb-3">Agregar Nuevo Cliente</a>
    <a href="../roles/roles.php"  class="btn btn-light mb-3">Agregar Rol Al Cliente:</a>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </thead>
            <tbody>
            <?php if($index): ?>
                <?php foreach($index as $ind):?>
                    <tr>
                        <td scope="col"><?= $ind["id"]?></td>
                        <td scope="col"><?= $ind["cedula"]?></td>
                        <td scope="col"><?= $ind["nombre"]?></td>
                        <td scope="col"><?= $ind["apellido"]?></td>
                        <td scope="col"><?= $ind["direccion"]?></td>
                        <td scope="col"><?= $ind["telefono"]?></td>
                        <td scope="col">
                            <a href="show.php?id=<?=$ind['id']?>" class="btn btn-info">Ver Info</a>
                            <a href="edit.php?id=<?=$ind['id']?>" class="btn btn-warning">Editar</a>
                            <a href="delete.php?id=<?=$ind['id']?>" class="btn btn-danger">Borrar</a>
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