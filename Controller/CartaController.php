<?php
include_once 'Model/CategoriaDAO.php';
include_once 'Model/ProductoDAO.php';

class CartaController {

    public function index() {
        $view = 'View/carta.php';

        $listaCategorias = CategoriaDAO::getCategorias();
        $categoriaActiva = $_GET['cat'] ?? null;

        $categoriaPadre = CategoriaDAO::getIdCategoriaActiva($categoriaActiva);

        // Hijas
        $categoriasHijas = [];
        $productosPorHija = [];

        if ($categoriaPadre) {
            $categoriasHijas = CategoriaDAO::getCategoriasHijas($categoriaPadre->getcategoria_id());

            foreach ($categoriasHijas as $hija) {
                $productosPorHija[$hija->getcategoria_id()] =
                    ProductoDAO::getProductosPorCategoriaHija($hija->getcategoria_id());
            }
        }

        include 'View/main.php';
    }
}

?>
