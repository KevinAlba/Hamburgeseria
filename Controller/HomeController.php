<?php
include_once 'Model/ProductoDAO.php';
 class HomeController {
     public function index() {
        $view = 'View/home.php';
        $productoModel = new ProductoDAO();
        $listaProductos = $productoModel->getProductos();
        include 'View/main.php';
        
     }
 }
?>