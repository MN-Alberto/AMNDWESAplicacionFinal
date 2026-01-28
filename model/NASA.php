<?php
class NASA{
    private $titulo;
    private $foto;
    private $descripcion;

    public function __construct($titulo, $foto, $descripcion){
        $this->titulo = $titulo;
        $this->foto = $foto;
        $this->descripcion = $descripcion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getFoto() {
        return $this->foto;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setFoto($foto): void {
        $this->foto = $foto;
    }
    
    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }
}
?>