<?php 
    include_once 'Model/UsuarioDAO.php';
 class UsuarioController {

    public function editarPerfil(){
        if($_SERVER['REQUEST_METHOD'] ==  'POST'){
            $usuario_id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $contrasena = $_POST['contrasena'];

             $usuarioDAO = new UsuarioDAO();

             if (empty($contrasena)) {

                $usuarioDAO->editarUsuarioSinPasswordSinRol(
                    $usuario_id,
                    $nombre,
                    $correo,
                    $telefono
                );

            } else {
                $usuarioDAO->editarUsuarioConPasswordSinRol(
                    $usuario_id,
                    $nombre,
                    $correo,
                    $contrasena = password_hash($contrasena, PASSWORD_BCRYPT),
                    $telefono
                );
            }
            header("Location: index.php?controller=Usuario&action=index");
            exit;
        }
    }

    
     public function index() {
       $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getUsuarioById($_SESSION['usuario_id']);

        $view = 'View/usuario.php';
        include 'View/main.php';
     }
    }    
    
?>