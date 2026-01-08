<?php 
    include_once 'Model/ProductoDAO.php';

class ProductoController{
    public function index(){
        $view = 'View/Producto.php';
        include 'View/main.php';
    }
   public function ver() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=Producto&action=index");
            exit;
        }

        $producto_id = (int) $_GET['id'];
        $producto = ProductoDAO::getProductoById($producto_id);

        if (!$producto) {
            echo "Producto no encontrado";
            return;
        }

        $view = 'View/Producto.php';
        include 'View/main.php';
    }
}
?>