<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['documento'])){
        echo "<script>
        window.location.replace('../login.php');
        </script>";
    }
    require "../modelo/DAO/RolDAO.php";
    require "../modelo/Conexion.php";
    $rolDAO=new RolDAO();

    $listaRoles=$rolDAO->listarTodos();
    ?>
    <div class="container">
        <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
        <h2>Listado de Roles</h2><br>
        <a href="rol.php"class="btn btn-primary">Nuevo</a>
        <a href="../logout.php"class="btn btn-link">Cerrar Sesión</a>
        <table id="tablaRoles"class="table table-dark">
            <thead>
                <tr>
                    <th>Id Rol</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($listaRoles as $rol){
                    ?>
                    <tr>
                        <td><?php echo $rol["idRol"]; ?></td>
                        <td><?php echo $rol["nombreRol"]; ?></td>
                        <td>
                            <a href="editarol.php?idRol=<?php echo $rol["idRol"]; ?>" class="btn btn-warning">Editar</a>
                            <a href="../controladores/RolControlador.php?idRol=<?php echo $rol["idRol"]; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>

                <?php 
                }

                ?>
            </tbody>


        </table>


    </div>
    <?php 
    if(isset($_GET["msj"])){
        echo "<h3>";
        echo $_GET["msj"];
        echo "</h3>";
    }
    ?>
</body>
</html>