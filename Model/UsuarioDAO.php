<?php
include_once 'Database/database.php';
include_once 'Model/Usuario.php';

class UsuarioDAO{
  
    //Buscar por email de usuario
    public function buscarPorCorreo($Correo){
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $Correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($fila = $resultado->fetch_assoc()){
            $usuario = new Usuario();
            $usuario->setUsuario_id($fila['usuario_id']);
            $usuario->setNombre($fila['nombre']);
            $usuario->setCorreo($fila['correo']);
            $usuario->setContrasena($fila['contrasena']);
            $usuario->setTelefono($fila['telefono']);
            return $usuario;
        } else{
            return null;
        }

    }
    //inserta usuario
    public function insertarUsuario($usuario){
        $con = database::connect();
        $stmt = $con->prepare("INSERT INTO usuarios ( nombre, correo, contrasena, telefono) VALUES (?, ?, ?, ?)");

        $nombre = $usuario->getNombre();
        $correo = $usuario->getCorreo();
        $contrasena = $usuario->getContrasena();
        $telefono = $usuario->getTelefono();
        $stmt->bind_param("ssss", $nombre,  $correo, $contrasena,  $telefono);
        $stmt->execute();
    }
}
?>