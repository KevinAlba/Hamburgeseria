<?php 
include_once 'Model/UsuarioDAO.php';
include_once 'Model/ProductoDAO.php';
include_once 'Model/OfertaDAO.php';
include_once 'Model/PedidoDAO.php';
include_once 'Model/CategoriaDAO.php';
//include_once 'Model/LineaPedidoDAO.php';



/***************************************Usuario********************************************* */
class ApiController {

    public function getUsuarios() {
        header('Content-Type: application/json; charset=utf-8');

        $listarUsario = UsuarioDAO::getUsuarios();

        $data = [];
        foreach ($listarUsario as $usuario) {
            $data[] = $usuario->toArray();
        }

        echo json_encode($data);
    }
     public function borrarUsuarios(){
        header('Content-Type: application/json; charset=utf-8');

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['usuario_id'])) {
            echo json_encode(['ok' => false, 'error' => 'ID no recibido']);
            return;
        }

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->borrarUsuarios($data['usuario_id']);

        echo json_encode(['ok' => true]);
    }

    public function editarUsuario(){
        header('Content-Type: application/json; charset=utf-8');
        $data = json_decode(file_get_contents("php://input"), true);

        //echo json_encode($data);
        // die();

        if (!isset($data['usuario_id'])) {
            echo json_encode(['ok' => false]);
            return;
        }
        $dao = new UsuarioDAO();

        if (empty($data['contrasena'])) {
            // SIN cambiar contraseña
            $dao->editarUsuarioSinPassword(
                $data['usuario_id'],
                $data['nombre'],
                $data['correo'],
                $data['telefono'],
                $data['rol']
            );
        } else {
            // Cambiando contraseña
            $dao->editarUsuarioConPassword(
                $data['usuario_id'],
                $data['nombre'],
                $data['correo'],
                password_hash($data['contrasena'], PASSWORD_DEFAULT),
                $data['telefono'],
                $data['rol']
            );
        }

        echo json_encode(['ok' => true]);
    }

    public function crearUsuario(){
        header('Content-Type: application/json; charset=utf-8');

        $data = json_decode(file_get_contents("php://input"), true);

        if (
            empty($data['nombre']) ||
            empty($data['correo']) ||
            empty($data['contrasena'])
        ) {
            echo json_encode(['ok' => false, 'error' => 'Datos incompletos']);
            return;
        }

        $usuario = new Usuario();
        $usuario->setNombre($data['nombre']);
        $usuario->setCorreo($data['correo']);
        $usuario->setContrasena(password_hash($data['contrasena'], PASSWORD_BCRYPT));
        $usuario->setTelefono($data['telefono'] ?? '');

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->insertarUsuario($usuario);

        echo json_encode(['ok' => true]);
    }

    /***************************************Productos********************************************* */

    public function getProductos(){
        header('Content-Type: application/json; charset=utf-8');

        $listarProducto = ProductoDAO::getProductos();

        $data = [];
        foreach ($listarProducto as $producto) {
            $data[] = $producto->toArray();
        }

        echo json_encode($data);
    }

    public function crearProducto() {
        header('Content-Type: application/json; charset=utf-8');

        $data = json_decode(file_get_contents("php://input"), true);

        if (
            empty($data['nombre']) ||
            empty($data['descripcion']) ||
            empty($data['precio']) ||
            empty($data['imagen']) ||
            empty($data['categoria_id'])
        ) {
            echo json_encode(['ok' => false, 'error' => 'Datos incompletos']);
            return;
        }
        $producto = new Producto();
        $producto->setNombre($data['nombre']);
        $producto->setDescripcion($data['descripcion']);
        $producto->setPrecio($data['precio']);
        $producto->setImagen($data['imagen']);
        $producto->setCategoria_id($data['categoria_id']);

        if (isset($data['oferta_id']) && $data['oferta_id'] !== null) {
            $producto->setOferta_id((int)$data['oferta_id']);
        } else {
            $producto->setOferta_id(null);
        }
        $productoDAO = new ProductoDAO();
        $productoDAO->insertarProducto($producto);

        echo json_encode(['ok' => true]);
    }

    public function editarProducto() {
    header('Content-Type: application/json; charset=utf-8');
    $data = json_decode(file_get_contents("php://input"), true);

    if (empty($data['producto_id'])) {
        echo json_encode(['ok' => false, 'error' => 'ID requerido']);
        return;
    }

    $oferta_id = $data['oferta_id'] ?? null;

    $dao = new ProductoDAO();
    $dao->editarProducto(
        $data['producto_id'],
        $data['nombre'],
        $data['descripcion'],
        $data['precio'],
        $data['imagen'],
        $data['categoria_id'],
        $oferta_id
    );

    echo json_encode(['ok' => true]);
    }
    public function borrarProducto(){
        header('Content-Type: application/json; charset=utf-8');

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['producto_id'])) {
            echo json_encode(['ok' => false, 'error' => 'ID no recibido']);
            return;
        }

        $productoDAO = new ProductoDAO();
        $productoDAO->borrarProducto($data['producto_id']);

        echo json_encode(['ok' => true]);
    }
/***************************************Oferta********************************************* */
    public function getOfertas(){
        header('Content-Type: application/json; charset=utf-8');

        $listarOferta = OfertaDAO::getOfertas();

        $data = [];
        foreach ($listarOferta as $oferta) {
            $data[] = $oferta->toArray();
        }

        echo json_encode($data);
    }

    /***************************************Pedido********************************************* */
     public function getPedidos()
    {
         header('Content-Type: application/json; charset=utf-8');

        $pedidos = PedidoDAO::getPedidos();

        $data = [];
        foreach ($pedidos as $pedido) {
            $data[] = $pedido->toArray();
        }

        echo json_encode($data);
    }

    public function borrarPedidos(){
        header('Content-Type: application/json; charset=utf-8');

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['pedido_id'])) {
            echo json_encode(['ok' => false, 'error' => 'ID no recibido']);
            return;
        }

        $pedido_id = $data['pedido_id'];

        $lineaPedidoDAO = new LineaPedidoDAO();
        $lineaPedidoDAO->borrarLineaPedido($pedido_id);

        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->borrarPedidos($pedido_id);

        echo json_encode(['ok' => true]);
    }

    public function editarPedido(){
          header('Content-Type: application/json; charset=utf-8');
            $data = json_decode(file_get_contents("php://input"), true);

            if (empty($data['pedido_id'])) {
                echo json_encode(['ok' => false, 'error' => 'ID requerido']);
                return;
            }

            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->editarPedido(
                $data['pedido_id'],
                $data['fecha'],
                $data['direccion'],
                $data['total']
             );
            echo json_encode(['ok' => true]);
        
    }


    /***************************************Categorias********************************************* */
    public function getCategorias()
    {
        header('Content-Type: application/json; charset=utf-8');

        $listaCategorias = CategoriaDAO::getCategorias();
        $data = [];
        foreach ($listaCategorias as $categoria) {
            $data[] = $categoria->toArray();
        }

        echo json_encode($data);
    }

}




?>