<?php
include_once 'Database/Database.php';
include_once 'Model/LineaPedido.php';

class LineaPedidoDAO {

    public function insertarLineaPedido(LineaPedido $linea) {
        $con = Database::connect();
        $stmt = $con->prepare( "INSERT INTO linea_pedidos (pedido_id, producto_id, cantidad, precio_unitario, subtotal)  VALUES (?, ?, ?, ?, ?)");

        $pedido_id = $linea->getPedidoId();
        $producto_id = $linea->getProductoId();
        $cantidad = $linea->getCantidad();
        $precio_unitario = $linea->getPrecioUnitario();
        $subtotal = $linea->getSubtotal();

        $stmt->bind_param( "iiidd", $pedido_id, $producto_id, $cantidad, $precio_unitario, $subtotal);
        $stmt->execute();
        $stmt->close();
    }

   public function obtenerPorPedido($pedido_id) {
    $con = Database::connect();

    $stmt = $con->prepare("SELECT lp.*, p.nombre FROM linea_pedidos lp
        JOIN productos p ON lp.producto_id = p.producto_id
        WHERE lp.pedido_id = ? ");
    $stmt->bind_param("i", $pedido_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $lineas = [];
    while ($row = $result->fetch_assoc()) {
        $linea = new LineaPedido();

        if (isset($row['linea_id'])) $linea->setLineaId($row['linea_id']);
        $linea->setPedidoId($row['pedido_id']);
        $linea->setProductoId($row['producto_id']);
        $linea->setCantidad($row['cantidad']);
        $linea->setPrecioUnitario($row['precio_unitario']);

        $linea->setNombre($row['nombre']);

        $lineas[] = $linea;
    }

    $stmt->close();
    return $lineas;
}



    public function borrarLineaPedido($pedido_id) {
        $con = Database::connect();
        $stmt = $con->prepare("DELETE FROM linea_pedidos WHERE pedido_id = ?" );
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        $stmt->close();
    }
    
   /* public function editarLineaPedido($lineaId, $cantidad){
        $con = Database::connect();
        $stmt = $con->prepare("UPDATE linea_pedidos SET cantidad = ? WHERE linea_id = ?");
        $stmt->bind_param("ii", $cantidad ,$lineaId);
        $stmt->execute();
        $stmt->close();

    }*/
}

?>
