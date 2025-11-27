<?php 
include_once 'Database/database.php';
include_once 'Model/Producto.php';

class ProductoDAO {
    public static function getProductoById($producto_id){
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
        $stmt -> bind_param("i", $producto_id);
        $stmt -> execute();
        $results = $stmt->get_result();

        $producto = $results->fetch_object("Producto");
        $con->close();
        return $producto;
    }

      public static function getProductos(){
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM productos");
        $stmt -> execute();
        $results = $stmt->get_result();

        $listaProductos = [];

        while($producto = $results->fetch_object("Producto")){
            $listaProductos[] = $producto;
        }
        $con->close();
        return $listaProductos;
    }
}
?>