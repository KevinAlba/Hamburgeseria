<?php 
    class Categoria {
        private $categoria_id;
        public $nombre_categoria;
        private $categoria_padre;
    
        public function getcategoria_id() {
            return $this->categoria_id;
        }
    
        public function getnombre_categoria() {
            return $this->nombre_categoria;
        }
        public function getcategoria_padre() {
            return $this->categoria_padre;
        }
    }
?>