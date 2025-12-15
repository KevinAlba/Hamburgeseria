<?php
include_once 'Database/database.php';
include_once 'Model/Categoria.php';

class CategoriaDAO
{
    // Todas las categorías
    public static function getCategorias()
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM categorias");
        $stmt->execute();

        $result = $stmt->get_result();
        $listaCategorias = [];

        while ($categoria = $result->fetch_object("Categoria")) {
            $listaCategorias[] = $categoria;
        }

        $con->close();
        return $listaCategorias;
    }


    // Categorías hijas de una categoría padre
    public static function getCategoriasHijas($idPadre)
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM categorias WHERE categoria_padre = ?");
        $stmt->bind_param("i", $idPadre);
        $stmt->execute();

        $results = $stmt->get_result();
        $categorias = [];
        while ($row = $results->fetch_object("Categoria")) {
            $categorias[] = $row;
        }

        $stmt->close();
        $con->close();
        return $categorias;
    }
    // Obtener categoría activa por nombre
    public static function getIdCategoriaActiva($nombre)
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM categorias WHERE nombre_categoria = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();

        $result = $stmt->get_result();
        $categoria = $result->fetch_object("Categoria");

        $con->close();
        return $categoria;
    }
}

?>