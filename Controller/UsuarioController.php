<?php
include_once 'Model/UsuarioDao.php';

class UsuarioController
{
    public function index()
    {
        $view = 'View/usario.php';
        include 'View/main.php';
    }

    public function borrarUsuarios()
    {
        parse_str(file_get_contents("php://input"), $_DELETE);

        if (!isset($_DELETE['usuario_id'])) {
            echo json_encode(['error' => 'ID no recibido']);
            return;
        }
        $usuario_id = $_DELETE['usuario_id'];
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->borrarUsuarios($usuario_id);
        echo json_encode(['ok' => true]);
    }

    public function editarUsuario() {
    header('Content-Type: application/json; charset=utf-8');
    parse_str(file_get_contents("php://input"), $data);

    if (!isset($data['usuario_id'])) {
        echo json_encode(['ok' => false]);
        return;
    }
    $dao = new UsuarioDAO();

    if (empty($data['contrasena'])) {
        // 🔹 SIN cambiar contraseña
        $dao->editarUsuarioSinPassword(
            $data['usuario_id'],
            $data['nombre'],
            $data['correo'],
            $data['telefono'],
            $data['rol']
        );
    } else {
        // 🔹 Cambiando contraseña
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




    /*********API Json***** */
    public function getUsuarios()
    {
        header('Content-Type: application/json; charset=utf-8');

        $listarUsario = UsuarioDAO::getUsuarios();
        $data = [];
        foreach ($listarUsario as $usuario) {
            $data[] = $usuario->toArray();
        }

        echo json_encode($data);
    }
}
