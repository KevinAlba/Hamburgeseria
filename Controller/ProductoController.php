<?php 
    include_once 'Model/ProductoDao.php';

     class ProductoController{
        public function show(){
            $view = 'Producto/show.php';
            $producto_id = $_GET['producto_id'];
            $producto = ProductoDAO::getProductoById($producto_id);
            include_once 'View/main.php';

        }

        public function index(){
            $view = 'Producto/index.php';
            $listaProductos = ProductoDAO::getProductos();
            include_once 'View/main.php';
        }
     }
?>