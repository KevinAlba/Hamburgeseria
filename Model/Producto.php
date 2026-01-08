<?php 
class Producto {
    private $producto_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $categoria_id;
    private $oferta_id;
    private $descuento;


    public function getproducto_id() {
        return $this->producto_id;
    }
    public function getnombre() {
        return $this->nombre;
    }
    public function getdescripcion() {
        return $this->descripcion;
    }
    public function getprecio() {
        return $this->precio;
    }
    public function getimagen() {
        return $this->imagen;
    }
    public function getcategoria_id() {
        return $this->categoria_id;
    }
    public function getoferta_id() {
        return $this->oferta_id;
    }
    public function getDescuento() {
        return $this->descuento;
    }
    public function getPrecioFinal() {

    if ($this->descuento !== null) {
            return $this->precio - ($this->precio * ($this->descuento / 100));
        }
        return $this->precio;
    }


    public function setproducto_id($producto_id){
        $this->producto_id = $producto_id;
    }
    public function setnombre($nombre){
        $this->nombre = $nombre;
    }
    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setprecio($precio){
        $this->precio = $precio;
    }
    public function setimagen($imagen){
        $this->imagen = $imagen;
    }
    public function setcategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }
    public function setoferta_id($oferta_id){
        $this->oferta_id = $oferta_id;
    }

    public function setDescuento($descuento) {
    $this->descuento = $descuento;
}

    public function toArray() {
    return [
        'producto_id' => $this->producto_id,
        'nombre' => $this->nombre,
        'descripcion' => $this->descripcion,
        'precio' => $this->precio,
        'imagen' => $this->imagen,
        'categoria_id' => $this->categoria_id,
        'oferta_id' => $this->oferta_id,
        'descuento' => $this->descuento
    ];
}
    }


?>