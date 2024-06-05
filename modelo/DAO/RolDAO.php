<?php
class RolDAO{
    public function registrar(RolDTO $rolDTO){
        $con=Conexion::getConexion();
        $mensaje="";
        try{
            $query=$con->prepare("INSERT INTO rol(idRol, nombreRol) VALUES (?,?)");
            $idRol=$rolDTO->getIdRol();
            $nombre=$rolDTO->getNombre();
            $query->bindParam(1,$idRol);
            $query->bindParam(2,$nombre);
            $query->execute();
            $mensaje="Registro Exitoso";

        }catch(Exception $ex){
            $mensaje=$ex->getMessage();
        }
        $con=null;
        return $mensaje;
    }

    public function listarTodos(){
    $conn=Conexion::getConexion();
    try{
        $query=$conn->prepare("SELECT * FROM rol");
        $query->execute();
        return $query->fetchAll();
    }
    catch(Exception $ex){
    echo $ex->getMessage();
    } 

    }
    public function listarId($idRol){
        $conn=Conexion::getConexion();
        try{
            $query=$conn->prepare("SELECT * FROM rol where idRol=?");
            $query->bindParam(1,$idRol);
            $query->execute();
            return $query->fetch();
        }
        catch(Exception $ex){
        echo $ex->getMessage();
        } 
    
        }

        public function eliminar($idRol){
            $conn=Conexion::getConexion();
            $mensaje="";
            try{
                $query=$conn->prepare("DELETE FROM rol WHERE idRol=?");
                $query->bindParam(1,$idRol);
                $query->execute();
                $mensaje="Registro eliminado";
            }
            catch(Exception $ex ){
                $mensaje=$ex->getMessage();
            }
            $conn=null;
            return $mensaje;
        }
        public function editar(RolDTO $rolDTO){
            $con=Conexion::getConexion();
            $mensaje="";
            try{
                $query=$con->prepare("UPDATE rol SET nombreRol=? WHERE idRol=?");
                $idRol=$rolDTO->getIdRol();
                $nombre=$rolDTO->getNombre();
                $query->bindParam(1,$nombre);
                $query->bindParam(2,$idRol);
                $query->execute();
                $mensaje="Registro Actualizado";
    
            }catch(Exception $ex){
                $mensaje=$ex->getMessage();
            }
            $con=null;
            return $mensaje;
        }
    
}