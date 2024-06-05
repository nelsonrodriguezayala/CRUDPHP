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
    <form id="#" action="../controladores/PersonaControlador.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <label for="txtIdPersona">Id Persona</label>
        <input type="text" name="txtIdPersona" class="form-control"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtDocumento">Documento </label>
        <input type="text" name="txtDocumento" class="form-control"/>
    </div>
        <br>
        <div class="row"> 
        <label for="">Nombre </label>
        <input type="text" name="txtNombre" class="form-control"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtApellido">Apellido </label>
        <input type="text" name="txtApellido" class="form-control"/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtCorreo">Correo </label>
        <input type="email" name="txtCorreo" class="form-control"/>
    </div>
    <br>
    <div class="row">
        <label for="fileFoto">Foto</label>
        <input type="file" name="fileFoto"class="form-control" accept="image/*"/>
    </div>
    <br>
    <div class="row">
        <label for="txtClave">Clave</label>
        <input type="password" name="txtClave"class="form-control""/>
    </div>
    <br>
        <div class="row"> 
        <label for="txtIdRol">Rol </label>
        <select name="txtIdRol"class="form-control">
        <?php 
            require "../modelo/Conexion.php";
            require "../modelo/DAO/RolDAO.php";
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
        <input type="submit" value="Registrar" name="btnRegistrarPersona" class="btn btn-success">
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