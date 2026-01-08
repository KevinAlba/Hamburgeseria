<?php 
include_once 'Database/Database.php';
include_once 'Model/Pedido.php';
class PedidoDAO{

    public static function getPedidos() {
        $con = database::connect();

       $stmt = $con->prepare("SELECT p.pedido_id,
                                p.usuario_id,
                                u.nombre AS nombre_usuario,
                                u.correo AS correo_usuario,
                                p.fecha,
                                p.direccion,
                                p.total,
                                lp.cantidad,
                                pr.nombre AS nombre_producto
                            FROM pedidos p
                                INNER JOIN usuarios u ON p.usuario_id = u.usuario_id
                                INNER JOIN linea_pedidos lp ON p.pedido_id = lp.pedido_id
                                INNER JOIN productos pr ON lp.producto_id = pr.producto_id
                            ORDER BY p.pedido_id ASC");

        $stmt->execute();
        $results = $stmt->get_result();

        $listarPedidos = [];

        while ($row = $results->fetch_assoc()) {
            $pedido_id = $row['pedido_id'];

            if (!isset($listarPedidos[$pedido_id])) {
                $pedido = new Pedido();
                $pedido->setpedido_id($row['pedido_id']);
                $pedido->setUsuario_id($row['usuario_id']);
                $pedido->setNombre_Usuario($row['nombre_usuario']);
                $pedido->setCorreo_Usuario($row['correo_usuario']);
                $pedido->setFecha($row['fecha']);
                $pedido->setDireccion($row['direccion']);
                $pedido->setTotal($row['total']);
                $pedido->setProductos([]); 
                $listarPedidos[$pedido_id] = $pedido;
            }

            $productos = $listarPedidos[$pedido_id]->getProductos();
            $productos[] = [
                "nombre_producto" => $row['nombre_producto'],
                "cantidad" => $row['cantidad']
            ];
            $listarPedidos[$pedido_id]->setProductos($productos);
        }

        $con->close();

        return array_values($listarPedidos);
    }

    // Insertar un nuevo pedido
    public function insertarPedido($usuario_id, $total, $direccion, $telefono, $codigo_postal) {
        $con = Database::connect();

        $stmt = $con->prepare("INSERT INTO pedidos (usuario_id, fecha, total, direccion, telefono, codigo_postal, estado) VALUES (?, NOW(), ?, ?, ?, ?, 'pendiente')");

        $stmt->bind_param("idsss", $usuario_id, $total, $direccion, $telefono, $codigo_postal);
        $stmt->execute();
        $pedido_id = $con->insert_id;

        $stmt->close();
        return $pedido_id; 
    }

    public function obtenerPedido($pedido_id) {
    $con = Database::connect();

    $stmt = $con->prepare("SELECT * FROM pedidos WHERE pedido_id = ?");
    $stmt->bind_param("i", $pedido_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $pedido = $result->fetch_assoc();

    $stmt->close();
    return $pedido;
}


    //Borrar pedidos
    public function borrarPedidos($pedido_id)
    {
        $con = database::connect();
        $stmt = $con->prepare("DELETE FROM pedidos WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
    }   
    
    public function editarPedido($pedidoId, $fecha, $direccion, $total){
        $con = database::connect();
            $stmt = $con->prepare("UPDATE pedidos SET fecha = ?, direccion = ?, total = ? WHERE pedido_id = ?");
            $stmt->bind_param("ssii", $fecha, $direccion, $total, $pedidoId);
            $stmt->execute();
            $stmt->close();
    }
}
  

?>