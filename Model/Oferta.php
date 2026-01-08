<?php 
 class Oferta{
    private $oferta_id;
    private $nombreOferta;
    private $porcentaje;

    public function getOferta_id() {
        return $this->oferta_id;
    }
    public function getNombreOferta() {
        return $this->nombreOferta;
    }
     public function getPorcentaje() {
        return $this->porcentaje;
    }

    public function setOferta_id($oferta_id){
        $this->oferta_id = $oferta_id;
    }
    public function setNombreOferta($nombreOferta){
        $this->nombreOferta = $nombreOferta;
    }
    public function setPorcentaje($porcentaje){
        $this->porcentaje = $porcentaje;
    }

    public function toArray() {
        return [
            'oferta_id' => $this->oferta_id,
            'nombreOferta' => $this->nombreOferta,
            'porcentaje' => $this->porcentaje
        ];
    }
 } 

?>