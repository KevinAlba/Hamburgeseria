<?php 
include_once 'Database//Database.php';
include_once 'Model/Oferta.php';

class OfertaDAO{
public static function getOfertas()
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM ofertas");
        $stmt->execute();

        $result = $stmt->get_result();
        $listarOfertas = [];

        while ($oferta = $result->fetch_object("Oferta")) {
            $listarOfertas[] = $oferta;
        }

        $con->close();
        return $listarOfertas;
    }

}

?>