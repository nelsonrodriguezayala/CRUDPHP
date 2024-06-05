<?php
session_start();
require '../modelo/Conexion.php';
require '../modelo/DAO/PersonaDAO.php';
require '../modelo/DTO/PersonaDTO.php';

if(isset($_POST['btnLogin'])){
    $personaDAO=new PersonaDAO();
    $documento=$_POST['txtDocumento'];
    $clave=$_POST['txtClave'];
    $personaLogeada=$personaDAO->login($documento,$clave);
    if($personaLogeada['documento']!=null){
        $_SESSION['documento']=$personaLogeada['documento'];
        $_SESSION['nombre']=$personaLogeada['nombre']." ".$personaLogeada['apellido']; 
        $_SESSION['rol']=$personaLogeada['idRol'];
        //Opcional redireccion dependiendo  el rol
        if($_SESSION['rol']==1){
            echo "<script>
            window.location.replace('../persona/listapersonas.php');
            </script>";
        }else if($_SESSION['rol']==2){
            echo "<script>
            window.location.replace('../rol/listaroles.php');
            </script>";
        }

    }else{
        echo "<script>
        window.location.replace('../login.php?msj=Usuario y/o clave incorrectos');
        </script>";
    }
}

if(isset($_POST['btnRegistrarPersona'])){
    $personaDAO=new PersonaDAO();
    $personaDTO=new PersonaDTO();

    $personaDTO->setIdPersona($_POST['txtIdPersona']);
    $personaDTO->setDocumento($_POST['txtDocumento']);
    $personaDTO->setNombre($_POST['txtNombre']);
    $personaDTO->setApellido($_POST['txtApellido']);
    $personaDTO->setCorreo($_POST['txtCorreo']);
    $personaDTO->setClave($_POST['txtClave']);
    $personaDTO->setIdRol($_POST['txtIdRol']);
    //Se guarda la foto con el nombre del archivo local
    try{
        move_uploaded_file($_FILES["fileFoto"]["tmp_name"], "../archivos/fotoperfil/" . $_FILES["fileFoto"]["name"]);  
    //Lo guardo con el nombre foto segiido del documento
   // move_uploaded_file($_FILES["fileFoto"]["tmp_name"], "archivos/fotoperfil/foto".$_POST['txtDocumento'].".jpg");  
   $personaDTO->setFoto("../archivos/fotoperfil/" . $_FILES["fileFoto"]["name"]) ;
    }catch(Exception $ex){
        echo "Error ".$ex->getMessage();
    }
    
   $mensaje=$personaDAO->registrar($personaDTO);
    echo "<script> window.location.replace('../persona/persona.php?msj=$mensaje');</script>";
}
else if(isset($_GET['idPersona'])){
 $personaDAO=new PersonaDAO();
 $idPersona=$_GET['idPersona'];
 $mensaje=$personaDAO->eliminar($idPersona);
 echo "<script> window.location.replace('../persona/listapersonas.php?msj=$mensaje');</script>";
}
else if(isset($_POST['btnEditarPersona'])){
    $personaDAO=new PersonaDAO();
    $personaDTO=new PersonaDTO();
    try{
    $personaDTO->setIdPersona($_POST['txtIdPersona']);
    $personaDTO->setDocumento($_POST['txtDocumento']);
    $personaDTO->setNombre($_POST['txtNombre']);
    $personaDTO->setApellido($_POST['txtApellido']);
    $personaDTO->setCorreo($_POST['txtCorreo']);
    $personaDTO->setIdRol($_POST['txtIdRol']);

    $mensaje=$personaDAO->editar($personaDTO);
    }
    catch(Exception $ex){
        $mensaje=$ex->getMessage();
    }
    echo "<script> window.location.replace('../persona/listapersonas.php?msj=$mensaje');</script>";
}