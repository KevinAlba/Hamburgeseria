<?php 
class LineaPedido {

    private $linea_id ;
    private $pedido_id;
    private $producto_id;
    private $cantidad;
    private $precio_unitario;
    private $subtotal;
    private $nombre;


    public function getLineaId() {
        return $this->linea_id;
    }

    public function getPedidoId() {
        return $this->pedido_id;
    }

    public function getProductoId() {
        return $this->producto_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioUnitario() {
        return $this->precio_unitario;
    }
    public function getSubtotal() {
        return $this->subtotal;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setLineaId($linea_id) {
        $this->linea_id = $linea_id;
    }
    public function setPedidoId($pedido_id) {
        $this->pedido_id = $pedido_id;
    }
    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function setPrecioUnitario($precio_unitario) {
        $this->precio_unitario = $precio_unitario;
        $this->subtotal = $this->cantidad * $precio_unitario;
    }
    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}


?>