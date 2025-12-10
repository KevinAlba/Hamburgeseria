<?php 
    include_once 'Model/UsuarioDAO.php';

    class IniciarSessionController{
        public function index(){
            $view = 'View/iniciarSession.php';
            include 'View/main.php';
        }
        public function iniciarSession(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];

                $usuarioDAO = new UsuarioDAO();
                $usuario = $usuarioDAO->buscarPorCorreo($correo);

                if($usuario != null && password_verify($contrasena, $usuario->getContrasena())){
                    session_start();
                    $_SESSION['usuario_id'] = $usuario->getUsuario_id();
                    $_SESSION['nombre'] = $usuario->getNombre();
                    header('Location:index.php?controller=Home&action=index');
                } else{
                    $view = 'View/iniciarSession.php';
                    include 'View/main.php';
                }
            }
        }
      /*  public function cerrarSession(){
    session_start();
    session_destroy();
    header('Location: index.php?controller=Home&action=index');
    exit();
}*/
    }
?> 