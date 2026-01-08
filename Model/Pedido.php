<?php 
 class Pedido{
    private $pedido_id;
    private $usuario_id;
    private $fecha;
    private $total;
    private $direccion;
    private $correo_usuario;
    private $nombre_usuario;
    private $productos = []; 

    public function getPedido_id() {
        return $this->pedido_id;
    }
    public function getUsuario_id() {
        return $this->usuario_id;
    }
    public function getFecha() {
        return $this->fecha;
    }
   public function getTotal() {
        return $this->total;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getCorreo_Usuario() {
        return $this->correo_usuario;
    }
    public function getNombre_Usuario() {
        return $this->nombre_usuario;
    }
    public function getProductos() {
        return $this->productos;
    }

    public function setpedido_id($pedido_id){
        $this->pedido_id = $pedido_id;
    }
    public function setUsuario_id($usuario_id){
        $this->usuario_id = $usuario_id;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
     public function setTotal($total){
        $this->total = $total;
    }
     public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setCorreo_Usuario($correo_usuario) {
        $this->correo_usuario = $correo_usuario;
    }
    public function setNombre_Usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }
    public function setProductos($productos) {
        $this->productos = $productos;
    }
    public function toArray() {
        return [
            'pedido_id' => $this->pedido_id,
            'usuario_id' => $this->usuario_id,
            'fecha' => $this->fecha,
            'total' => $this->total,
            'direccion' => $this->direccion,
            'correo_usuario' => $this->correo_usuario,
            'nombre_usuario' => $this->nombre_usuario,
            "productos" => $this->productos
        ];
    }
 }
?>