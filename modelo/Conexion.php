<?php

class Conexion{
public static function getConexion(){
    try{
        $con=new PDO("mysql:host=localhost;dbname=ejemplocrud","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       

    }
    catch(PDOException $ex){
        echo "Error ".$ex->getMessage();
    }
    return $con;
}

}
?>