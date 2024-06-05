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
    require "../modelo/DAO/PersonaDAO.php";
    require "../modelo/Conexion.php";
    $personaDAO=new PersonaDAO();

    $listaPersonas=$personaDAO->listarTodos();
    ?>
    <div class="container">
    <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>    
    <h2>Listado de Personas</h2><br>
        <a href="persona.php"class="btn btn-primary">Nuevo</a>
        <a href="../logout.php"class="btn btn-link">Cerrar Sesión</a>

        <table id="tablaPersona"class="table table-dark">
            <thead>
                <tr>
                    <th>Id Persona</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>IdRol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($listaPersonas as $persona){
                    ?>
                    <tr>
                        <td><?php echo $persona["idPersona"]; ?></td>
                        <td><?php echo $persona["documento"]; ?></td>
                        <td><?php echo $persona["nombre"]; ?></td>
                        <td><?php echo $persona["apellido"]; ?></td>
                        <td><?php echo $persona["correo"]; ?></td>
                        <td><img src="<?php echo $persona["foto"]; ?>" width="40px"></td>
                        <td><?php echo $persona["idRol"]; ?></td>
                        <td>
                            <a href="editarpersona.php?idPersona=<?php echo $persona["idPersona"]; ?>" class="btn btn-warning">Editar</a>
                            <a href="../controladores/PersonaControlador.php?idPersona=<?php echo $persona["idPersona"]; ?>" class="btn btn-danger">Eliminar</a>
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