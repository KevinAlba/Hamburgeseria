<?php
include_once 'Model/ProductoDAO.php';
include_once 'Model/LineaPedido.php';
include_once 'Model/LineaPedidoDAO.php';
include_once 'Model/PedidoDAO.php'; // Pendiente de crear
include_once 'Database/Database.php';

class CarritoController
{

    public function index()
    {
        // Inicializar carrito si no existe
        if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Limpiar cualquier dato
        foreach ($_SESSION['carrito'] as $key => $item) {
            if (!is_array($item)) {
                unset($_SESSION['carrito'][$key]);
            }
        }

        $carrito = $_SESSION['carrito'];
        $view = 'View/carrito.php';
        include 'View/main.php';
    }

    public function añadir()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=IniciarSession&action=index');
            exit();
        }

        if (!isset($_POST['id_producto'])) {
            header('Location: index.php?controller=Carrito&action=index');
            exit();
        }

        $id_producto = $_POST['id_producto'];
        $productoDAO = new ProductoDAO();
        $producto = $productoDAO->getProductoById($id_producto);

        if (!$producto) {
            header('Location: index.php?controller=Carrito&action=index');
            exit();
        }

        if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Limpiar IDs sueltos
        foreach ($_SESSION['carrito'] as $key => $item) {
            if (!is_array($item)) {
                unset($_SESSION['carrito'][$key]);
            }
        }

        // Comprobar si ya existe
        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $producto->getproducto_id()) {
                $item['cantidad']++;
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            $_SESSION['carrito'][] = [
                'id' => $producto->getproducto_id(),
                'nombre' => $producto->getnombre(),
                'precio' => $producto->getPrecioFinal(),
                'imagen' => $producto->getimagen(),
                'cantidad' => 1
            ];
        }

        header('Location: index.php?controller=Carrito&action=index');
        exit();
    }

    public function eliminar()
    {
        if (!isset($_POST['id_producto'])) {
            header('Location: index.php?controller=Carrito&action=index');
            exit();
        }

        $id_producto = $_POST['id_producto'];

        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['id'] == $id_producto) {
                unset($_SESSION['carrito'][$key]);
                break;
            }
        }

        $_SESSION['carrito'] = array_values($_SESSION['carrito']);

        header('Location: index.php?controller=Carrito&action=index');
        exit();
    }

    public function mas()
    {
        if (!isset($_POST['id_producto'])) {
            header('Location: index.php?controller=Carrito&action=index');
            exit();
        }

        $id_producto = $_POST['id_producto'];

        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $id_producto) {
                $item['cantidad']++;
                break;
            }
        }

        header('Location: index.php?controller=Carrito&action=index');
        exit();
    }

    public function menos()
    {
        if (!isset($_POST['id_producto'])) {
            header('Location: index.php?controller=Carrito&action=index');
            exit();
        }

        $id_producto = $_POST['id_producto'];

        foreach ($_SESSION['carrito'] as $key => &$item) {
            if ($item['id'] == $id_producto) {
                $item['cantidad']--;
                if ($item['cantidad'] <= 0) {
                    unset($_SESSION['carrito'][$key]);
                }
                break;
            }
        }
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);

        header('Location: index.php?controller=Carrito&action=index');
        exit();
    }

    public function pagar()
    {

        if (!isset($_SESSION['usuario_id']) || empty($_SESSION['carrito'])) {
            header('Location: index.php?controller=Carrito&action=index');
            exit();
        }

        $usuario_id = $_SESSION['usuario_id'];
        $carrito = $_SESSION['carrito'];

        $direccion = $_POST['direccion'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        $codigo_postal = $_POST['codigo_postal'] ?? '';

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $pedidoDAO = new PedidoDAO();
        $pedido_id = $pedidoDAO->insertarPedido(
            $usuario_id,
            $total,
            $direccion,
            $telefono,
            $codigo_postal
        );

        if (!$pedido_id) {
            die("Error: pedido_id vacío");
        }
        $lineaDAO = new LineaPedidoDAO();
        foreach ($carrito as $item) {
            $linea = new LineaPedido();
            $linea->setPedidoId($pedido_id);
            $linea->setProductoId($item['id']);
            $linea->setCantidad($item['cantidad']);
            $linea->setPrecioUnitario($item['precio']);

            $lineaDAO->insertarLineaPedido($linea);
        }

        unset($_SESSION['carrito']);
        header('Location: index.php?controller=Confirmacion&action=index&pedido_id=' . $pedido_id);
        exit();
    }
}
