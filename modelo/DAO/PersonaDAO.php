<?php 

class PersonaDAO{

    public function registrar(PersonaDTO $personaDTO){
        $con=Conexion::getConexion();
        $mensaje="";
        try{
            $query=$con->prepare("INSERT INTO persona(idPersona, documento, nombre, apellido, correo,foto,clave, idRol) VALUES (?,?,?,?,?,?,?,?)");
            $idPersona=$personaDTO->getIdPersona();
            $documento=$personaDTO->getDocumento();
            $nombre=$personaDTO->getNombre();
            $apellido=$personaDTO->getApellido();
            $correo=$personaDTO->getCorreo();
            $foto=$personaDTO->getFoto();
            $clave=$personaDTO->getClave();
            $idRol=$personaDTO->getIdRol();

            $query->bindParam(1,$idPersona);
            $query->bindParam(2,$documento);
            $query->bindParam(3,$nombre);
            $query->bindParam(4,$apellido);
            $query->bindParam(5,$correo);
            $query->bindParam(6,$foto);
            $query->bindParam(7,$clave);
            $query->bindParam(8,$idRol);
            $query->execute();
            $mensaje="Registro Exitoso";
        }
        catch(Exception $ex)
        {
            $mensaje=$ex->getMessage();
        }
        $con=null;
        return $mensaje;
    }
    public function listarTodos(){
        $conn=Conexion::getConexion();
        try{
            $query=$conn->prepare("SELECT * FROM persona");
            $query->execute();
            return $query->fetchAll();
        }
        catch(Exception $ex){
        echo $ex->getMessage();
        } 
    
        }
    public function login($documento,$clave){
        $conn=Conexion::getConexion();
        try {
            $query=$conn->prepare("SELECT * FROM persona WHERE documento=? AND clave=?");
            $query->bindParam(1,$documento);
            $query->bindParam(2,$clave);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex ) {
            echo $ex->getMessage();
        }
    }
        public function listarId($idPersona){
            $conn=Conexion::getConexion();
            try{
                $query=$conn->prepare("SELECT * FROM persona where idPersona=?");
                $query->bindParam(1,$idPersona);
                $query->execute();
                return $query->fetch();
            }
            catch(Exception $ex){
            echo $ex->getMessage();
            } 
        
            }
    
            public function eliminar($idPersona){
                $conn=Conexion::getConexion();
                $mensaje="";
                try{
                    $query=$conn->prepare("DELETE FROM persona WHERE idPersona=?");
                    $query->bindParam(1,$idPersona);
                    $query->execute();
                    $mensaje="Registro eliminado";
                }
                catch(Exception $ex ){
                    $mensaje=$ex->getMessage();
                }
                $conn=null;
                return $mensaje;
            }
            public function editar(PersonaDTO $personaDTO){
                $con=Conexion::getConexion();
                $mensaje="";
                try{
                    $query=$con->prepare("UPDATE persona SET documento=?,nombre=?,apellido=?, correo=?,idRol=? WHERE idPersona=?");
                   $idPersona=$personaDTO->getIdPersona();
                   $documento=$personaDTO->getDocumento();
                   $nombre=$personaDTO->getNombre();
                   $apellido=$personaDTO->getApellido();
                   $correo=$personaDTO->getCorreo();
                   $idRol=$personaDTO->getIdRol();
                         
                   $query->bindParam(1,$documento);
                   $query->bindParam(2,$nombre);
                   $query->bindParam(3,$apellido);
                   $query->bindParam(4,$correo);
                   $query->bindParam(5,$idRol);
                   $query->bindParam(6,$idPersona);
                   
                    $query->execute();
                    $mensaje="Registro Actualizado";
        
                }catch(Exception $ex){
                    $mensaje=$ex->getMessage();
                }
                $con=null;
                return $mensaje;
            }
        
    }