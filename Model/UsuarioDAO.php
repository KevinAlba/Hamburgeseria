<?php
include_once 'Database/database.php';
include_once 'Model/Usuario.php';

class UsuarioDAO
{

    // Todas los Usuario para api
    public static function getUsuarios()
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios");
        $stmt->execute();

        $result = $stmt->get_result();
        $listarUsuario = [];

        while ($usuario = $result->fetch_object("Usuario")) {
            $listarUsuario[] = $usuario;
        }

        $con->close();
        return $listarUsuario;
    }


    //Buscar por email de usuario
    public function buscarPorCorreo($Correo)
    {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $Correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->setUsuario_id($fila['usuario_id']);
            $usuario->setNombre($fila['nombre']);
            $usuario->setCorreo($fila['correo']);
            $usuario->setContrasena($fila['contrasena']);
            $usuario->setTelefono($fila['telefono']);
            $usuario->setRol($fila['rol']);
            return $usuario;
        } else {
            return null;
        }
    }
    //inserta usuario
    public function insertarUsuario($usuario)
    {
        $con = database::connect();
        $stmt = $con->prepare("INSERT INTO usuarios ( nombre, correo, contrasena, telefono) VALUES (?, ?, ?, ?)");

        $nombre = $usuario->getNombre();
        $correo = $usuario->getCorreo();
        $contrasena = $usuario->getContrasena();
        $telefono = $usuario->getTelefono();
        $stmt->bind_param("ssss", $nombre,  $correo, $contrasena,  $telefono);
        $stmt->execute();
    }

    //Borrar usuarios
    public function borrarUsuarios($usuario_id)
    {
        $con = database::connect();
        $stmt = $con->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
    }

 // SIN contraseña
public function editarUsuarioSinPassword($id, $nombre, $correo, $telefono, $rol) {
    $con = database::connect();
    $stmt = $con->prepare("UPDATE usuarios SET nombre = ?, correo = ?, telefono = ?, rol = ? WHERE usuario_id = ? ");
    $stmt->bind_param("ssssi", $nombre, $correo, $telefono, $rol, $id);
    $stmt->execute();
    $con->close();
}

// CON contraseña
public function editarUsuarioConPassword($id, $nombre, $correo, $contrasena, $telefono, $rol) {
    $con = database::connect();
    $stmt = $con->prepare("UPDATE usuarios SET nombre = ?, correo = ?, contrasena = ?, telefono = ?, rol = ? WHERE usuario_id = ?");
    $stmt->bind_param("sssssi", $nombre, $correo, $contrasena, $telefono, $rol, $id);
    $stmt->execute();
    $con->close();
}

}
