<?php 
class database{
    public static function connect($host='localhost', $user='root', $pass='', $db='hamburgueseria'){
        $con = new mysqli($host, $user, $pass, $db);
        if($con === false){
            die("Error al conectar a la BD");
        }else{
            return $con;
        }
    }
}
?>