<?php
class Usuario
{
    private $usuario_id;
    private $nombre;
    private $correo;
    private $contrasena;
    private $telefono;
    private $rol;

    public function setUsuario_id($usuario_id){
        $this->usuario_id = $usuario_id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setRol($rol){
        $this->rol = $rol;
    }

    public function getUsuario_id(){
        return $this->usuario_id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function getRol(){
        return $this->rol;
    }

           /**********************API*******************************/
public function toArray() {
    return [
        'usuario_id' => $this->usuario_id,
        'nombre' => $this->nombre,
        'correo' => $this->correo,
        'contrasena' => $this->contrasena,
        'telefono' => $this->telefono,
        'rol' => $this->rol,
    ];
}
    }

?>
