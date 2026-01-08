<?php 
/*class Database{
    public static function connect($host='localhost', $user='root', $pass='', $db='hamburgueseria'){
        $con = new mysqli($host, $user, $pass, $db);
        if($con === false){
            die("Error al conectar a la BD");
        }else{
            return $con;
        }
    }
}*/
class Database {
    public static function connect( $host = '127.0.0.1', $user = 'kevin', $pass = 'root',  $db   = 'hamburgueseria', $port = 3307 ) {
        $con = new mysqli($host, $user, $pass, $db, $port);

        if ($con->connect_error) {
            die("Error al conectar a la BD: " . $con->connect_error);
        } else {
            return $con;
        }
    }
}
?>

