<?php
class RolDTO{
    private $idRol=0;
    private $nombre="";

    function getIdRol(){
        return $this->idRol;
    }
    function setIdRol($idRol){
        $this->idRol=$idRol;
    }
    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre=$nombre;
    }



}