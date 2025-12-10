<?php 
class Producto {
    private $producto_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $categoria_id;
    private $oferta_id;

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
    

}
?>