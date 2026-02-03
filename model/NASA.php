<?php
/*
 * Autor: Alberto Méndez
 * Fecha de actualización: 03/02/2025
 */

/**
 * Clase NASA
 *
 * Representa un elemento para guardar la información de la foto del día de la  API de la NASA
 */
class NASA {
    /**
     * @var string Título del elemento que devuelve
     */
    private $titulo;

    /**
     * @var string URL o ruta de la foto
     */
    private $foto;

    /**
     * @var string Descripción del elemento
     */
    private $descripcion;

    /**
     * Constructor de la clase NASA
     *
     * @param string $titulo Titulo del elemento que devuelve
     * @param string $foto URL de la foto/video
     * @param string $descripcion Descripción de la foto o video
     */
    public function __construct($titulo, $foto, $descripcion){
        $this->titulo = $titulo;
        $this->foto = $foto;
        $this->descripcion = $descripcion;
    }

    /**
     * Obtiene el título del elemento devuelto
     *
     * @return string
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Obtiene la foto o video del elemento
     *
     * @return string
     */
    public function getFoto() {
        return $this->foto;
    }

    /**
     * Obtiene la descripción del elemento
     *
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Establece el título del elemento devuelto
     *
     * @param string $titulo
     * @return void
     */
    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    /**
     * Establece la foto del elemento
     *
     * @param string $foto
     * @return void
     */
    public function setFoto($foto): void {
        $this->foto = $foto;
    }

    /**
     * Establece la descripción del elemento
     *
     * @param string $descripcion
     * @return void
     */
    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }
}
?>