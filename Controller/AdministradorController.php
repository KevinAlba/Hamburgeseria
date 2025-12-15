<?php 
    include_once 'Model/ProductoDAO.php';

 class AdministradorController {
     public function index() {
        $view = 'View/administrador.php';

        include 'View/main.php';
     }
        
    } 
?>