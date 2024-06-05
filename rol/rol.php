<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
</head>
<body>
    <div class="container">
    <form id="#" action="../controladores/RolControlador.php" method="post">
    <div class="row">
        <label for="txtIdRol">Id Rol</label>
        <input type="text" name="txtIdRol" class="form-control"/>
    </div>
        <br>
        <div class="row"> 
        <label for="txtNombreRol">Nombre Rol</label>
        <input type="text" name="txtNombreRol" class="form-control"/>
    </div>
        <br>
        <div class="row">
        <input type="submit" value="Registrar" name="btnRegistrarRol" class="btn btn-success">
    </div>
    <?php 
    if(isset($_GET["msj"])){
        echo "<h3>";
        echo $_GET["msj"];
        echo "</h3>";
    }
    ?>
    </form>
</div>
</body>
</html>