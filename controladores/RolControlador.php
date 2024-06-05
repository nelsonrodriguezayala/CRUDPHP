<?php

require '../modelo/Conexion.php';
require '../modelo/DAO/RolDAO.php';
require '../modelo/DTO/RolDTO.php';

if(isset($_POST['btnRegistrarRol'])){
    $rolDAO=new RolDAO();
    $rolDTO=new RolDTO();

    $rolDTO->setIdRol($_POST['txtIdRol']);
    $rolDTO->setNombre($_POST['txtNombreRol']);

    $mensaje=$rolDAO->registrar($rolDTO);
    echo "<script> window.location.replace('../rol/rol.php?msj=$mensaje');</script>";
}
else if(isset($_GET['idRol'])){
 $rolDAO=new RolDAO();
 $idRol=$_GET['idRol'];
 $mensaje=$rolDAO->eliminar($idRol);
 echo "<script> window.location.replace('../rol/listaroles.php?msj=$mensaje');</script>";
}
else if(isset($_POST['btnEditarRol'])){
    $rolDAO=new RolDAO();
    $rolDTO=new RolDTO();

    $rolDTO->setIdRol($_POST['txtIdRol']);
    $rolDTO->setNombre($_POST['txtNombreRol']);

    $mensaje=$rolDAO->editar($rolDTO);
    echo "<script> window.location.replace('../rol/listaroles.php?msj=$mensaje');</script>";
}