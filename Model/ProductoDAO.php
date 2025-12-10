<?php
include_once 'Database/database.php';
include_once 'Model/Producto.php';

class ProductoDAO
{
    // Obtener producto por id
    public static function getProductoById($producto_id)
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
        $results = $stmt->get_result();

        $producto = $results->fetch_object("Producto");
        $con->close();
        return $producto;
    }
    // Obtener todos los productos
    public static function getProductos()
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM productos");
        $stmt->execute();
        $results = $stmt->get_result();

        $listaProductos = [];

        while ($producto = $results->fetch_object("Producto")) {
            $listaProductos[] = $producto;
        }
        $con->close();
        return $listaProductos;
    }
    // Obtener productos por categoría numero de id de categoría
    public static function getProductosPorCategoria($id_categoria)
    {
      //  echo $id_categoria;
        $con = database::connect();
        $stmt = $con->prepare("SELECT p.* FROM productos p JOIN categorias c ON p.categoria_id = c.categoria_id WHERE c.categoria_padre  = ?");
        $stmt->bind_param("i", $id_categoria);
        $stmt->execute();

        $results = $stmt->get_result();

        $lista = [];
        while ($row = $results->fetch_object("Producto")) {
            $lista[] = $row;
        }

        $con->close();
        $stmt->close();
        return $lista;
    }

    // Obtener productos por categoría hija
    public static function getProductosPorCategoriaHija($categoriaId)
{
    $con = database::connect();
    $stmt = $con->prepare("SELECT * FROM productos WHERE categoria_id = ?");
    $stmt->bind_param("i", $categoriaId);
    $stmt->execute();

    $result = $stmt->get_result();

    $lista = [];
    while ($prod = $result->fetch_object("Producto")) {
        $lista[] = $prod;
    }

    $con->close();
    return $lista;
}

}
