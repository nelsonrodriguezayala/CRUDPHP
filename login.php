<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2> Login</h2>
        <form id="#" action="controladores/PersonaControlador.php" method="POST">
            <div class="row">
                <label for="txtDocumento" >Documento</label>
                <input type="text" name="txtDocumento"class="form-control" required placeholder="Documento"/> 
            </div>
            <div class="row">
            <label for="txtClave" >Clave</label>
                <input type="password" name="txtClave"class="form-control" required placeholder="****"/> 
            </div>
            <div class="row">
                <input type="submit" value="Ingresar"class="btn btn-primary" name="btnLogin"/>
            </div>
        </form>
    </div>
    
</body>
</html>