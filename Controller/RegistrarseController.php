<?php 
    include_once 'Model/UsuarioDAO.php';

class RegistrarseController{
    public function index(){
        $view = 'View/registrarse.php';
        include 'View/main.php';
    }
    public function registrarse(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $telefono = $_POST['telefono'];

            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setCorreo($correo);
            $usuario->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT));
            $usuario->setTelefono($telefono);

            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->insertarUsuario($usuario);

            header('Location: index.php?controller=Home&action=index');
        }
    }   
}
?>