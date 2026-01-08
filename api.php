<?php 

include_once 'Controller/ApiController.php';
include_once 'Controller/CurrencyController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET['controller'])){
    $nombre_controller = $_GET['controller']. 'Controller';
    if(class_exists($nombre_controller)){
        $controller = new $nombre_controller();
        $action = $_GET['action'];
        if(isset($action) && method_exists($controller, $action )){
            $controller->$action();    
        } else{
            header("Location:404.php" );
        }
    }
    else{
        echo "controller no encontrado: ". $nombre_controller;
    }
}else{
    $controller = new HomeController();
    $controller->index();
}


//http://localhost/DAW-2025/?controller=equipo&action=show


?>