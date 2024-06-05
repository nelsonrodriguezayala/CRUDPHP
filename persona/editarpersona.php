<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
</head>
<body>
    <?php 
    require "../modelo/Conexion.php";
    require "../modelo/DAO/PersonaDAO.php";
    require "../modelo/DAO/RolDAO.php";

    $personaDAO=new PersonaDAO();
    $persona=$personaDAO->listarId($_GET['idPersona']);
        
    ?>
    <div class="container">
    <form id="#" action="../controladores/PersonaControlador.php" method="post">
    <div class="row">
        <label for="txtIdPersona">Id Persona</label>
        <input type="text" name="txtIdPersona" class="form-control" readonly value="<?php echo $persona['idPersona']; ?>"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtDocumento">Documento </label>
        <input type="text" name="txtDocumento" class="form-control" value="<?php echo $persona['documento']; ?>"/>
    </div>
        <br>
        <div class="row"> 
        <label for="">Nombre </label>
        <input type="text" name="txtNombre" class="form-control" value="<?php echo $persona['nombre']; ?>"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtApellido">Apellido </label>
        <input type="text" name="txtApellido" class="form-control" value="<?php echo $persona['apellido']; ?>"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtCorreo">Correo </label>
        <input type="email" name="txtCorreo" class="form-control" value="<?php echo $persona['correo']; ?>"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtIdRol">Rol </label>
        <select name="txtIdRol"class="form-control" >
        <?php 
            
            $rolDAO=new RolDAO();
            $listaRoles=$rolDAO->listarTodos();
            foreach($listaRoles as $rol)
            {
        ?>
                <option value="<?php echo $rol['idRol']; ?>">
                    <?php echo $rol['nombreRol']; ?>
                </option>
            <?php
            }
            ?>

        </select>
    </div>
        <br>
        <div class="row">
        <input type="submit" value="Editar" name="btnEditarPersona" class="btn btn-success">
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