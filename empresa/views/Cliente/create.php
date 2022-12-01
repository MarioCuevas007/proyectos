<?php
require_once "c://xampp/htdocs/empresa/views/includes/header.php";
?>
    <form action="store.php" method="post">
        <div class="mb-3">
            <label for="">cedula</label> <br>
            <input type="text" name="cedula" class="form-control"> <br>
            <label for="">Nombre</label> <br>
            <input type="text" name="nombre" class="form-control"> <br>
            <label for="">apellido</label> <br>
            <input type="text" name="apellido" class="form-control"> <br>
            <label for="">direccion</label> <br>
            <input type="text" name="direccion" class="form-control"> <br>
            <label for="">telefono</label> <br>
            <input type="text" name="telefono" class="form-control"> <br>
        </div>
            <input type="submit" value="agregar"  class="btn btn-primary mb-3">
    </form>
<?php
require_once "c://xampp/htdocs/empresa/views/includes/footer.php";
?>