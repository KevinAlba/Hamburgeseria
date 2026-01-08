<?php 
    include_once 'Model/LineaPedidoDAO.php';
    include_once 'Model/PedidoDAO.php';

class ConfirmacionController {
    public function index() {
        $pedido_id = $_GET['pedido_id'] ?? 0;
        if (!$pedido_id) {
            header('Location: index.php?controller=Home&action=index');
            exit();
        }

        $pedidoDAO = new PedidoDAO();
        $pedido = $pedidoDAO->obtenerPedido($pedido_id);

        $lineaDAO = new LineaPedidoDAO();
        $lineas = $lineaDAO->obtenerPorPedido($pedido_id);

        $view = 'View/confirmacion.php';
        include 'View/main.php';
    }
}

?>