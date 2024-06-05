<?php 

class PersonaDTO{
    private $idPersona=0;
    private $documento=0;
    private $nombre="";
    private $apellido="";
    private $correo="";
    private $foto="";
    private $clave="";
    private $idRol="";

    function getIdPersona(){
        return $this->idPersona;
    }
    function setIdPersona($idPersona){
        $this->idPersona=$idPersona;
    }
    function getDocumento(){
        return $this->documento;
    }
    function setDocumento($documento){
        $this->documento=$documento;
    }
    function getNombre(){
        return $this->nombre;

    }
    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    function getApellido(){
        return $this->apellido;
    }
    function setApellido($apellido){
        $this->apellido=$apellido;
    }
    function getCorreo(){
        return  $this->correo;
    }
    function setCorreo($correo){
        $this->correo=$correo;
    }
    function getFoto(){
        return  $this->foto;
    }
    function setFoto($foto){
        $this->foto=$foto;
    }
    function getClave(){
        return  $this->clave;
    }
    function setClave($clave){
        $this->clave=$clave;
    }
    function getIdRol(){
        return $this->idRol;
    }
    function setIdRol($idRol){
        $this->idRol=$idRol;
    }

}