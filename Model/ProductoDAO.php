<?php
include_once 'Database/Database.php';
include_once 'Model/Producto.php';

class ProductoDAO {

    // Obtener producto por id
public static function getProductoById($producto_id) {
    $con = database::connect();
    $stmt = $con->prepare("SELECT p.*,o.porcentaje AS descuento
        FROM productos p
        LEFT JOIN ofertas o ON p.oferta_id = o.oferta_id
        WHERE p.producto_id = ?
    ");

    $stmt->bind_param("i", $producto_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $producto = $result->fetch_object("Producto");

    $con->close();
    return $producto;
}


// Obtener productos por categoría numero de id de categoría
    public static function getProductosPorCategoria($id_categoria) {
    $con = database::connect();
    $stmt = $con->prepare("SELECT  p.*,o.porcentaje AS descuento
        FROM productos p
        LEFT JOIN ofertas o ON p.oferta_id = o.oferta_id  JOIN categorias c ON p.categoria_id = c.categoria_id
        WHERE c.categoria_padre = ?");

    $stmt->bind_param("i", $id_categoria);
    $stmt->execute();
    $result = $stmt->get_result();
    $lista = [];
    while ($prod = $result->fetch_object("Producto")) {
        $lista[] = $prod;
    }
    $con->close();
    return $lista;
}
// Obtener productos por categoría hija

public static function getProductosPorCategoriaHija($categoriaId) {
    $con = database::connect();
    $stmt = $con->prepare("SELECT p.*, o.porcentaje AS descuento  FROM productos p LEFT JOIN ofertas o ON p.oferta_id = o.oferta_id WHERE p.categoria_id = ?");

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
// Mostrar todos los productos
    public static function getProductos() {
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

/*****************************Api************************************ */
// Crear nuevos productos
public function insertarProducto($producto){
    $con = database::connect();

    $stmt = $con->prepare("INSERT INTO productos (nombre, descripcion, precio, imagen, categoria_id, oferta_id)  VALUES (?, ?, ?, ?, ?, ?)");

    $nombre = $producto->getnombre();
    $descripcion = $producto->getdescripcion();
    $precio = $producto->getprecio();
    $imagen = $producto->getImagen();
    $categoria_id = $producto->getcategoria_id();
    $oferta_id = $producto->getoferta_id();
    $stmt->bind_param("ssdsii", $nombre, $descripcion, $precio, $imagen, $categoria_id, $oferta_id);

    if(!$stmt->execute()){
        throw new Exception("Error al insertar producto: " . $stmt->error);
    }

    $stmt->close();
}
//Editar Productos
public function editarProducto( $id, $nombre, $descripcion, $precio, $imagen, $categoria_id, $oferta_id) {
    $con = database::connect();

    $stmt = $con->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, imagen = ?, categoria_id = ?, oferta_id = ? WHERE producto_id = ?");

    $stmt->bind_param("ssdsiii",$nombre, $descripcion, $precio, $imagen, $categoria_id, $oferta_id, $id );

    $stmt->execute();
    $con->close();
}
  //Borrar Producto
    public function borrarProducto($producto_id)
    {
        $con = database::connect();
        $stmt = $con->prepare("DELETE FROM productos WHERE producto_id = ?");
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
    }


}
