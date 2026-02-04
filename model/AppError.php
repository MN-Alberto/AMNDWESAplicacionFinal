<?php

/**
 * Clase AppError
 *
 * Representa un error de la aplicación con información detallada
 * como código, descripción, archivo, línea y página de redirección.
 *
 * @author Alberto Méndez
 * @date   2025-02-03
 */

class AppError {

    /**
     * @var int|string Código identificador del error
     */
    private $codError;

    /**
     * @var string Descripción del error
     */
    private $descError;

    /**
     * @var string Archivo donde ocurrió el error
     */
    private $archivoError;

    /**
     * @var int Línea del archivo en el que ocurrió el error
     */
    private $lineaError;

    /**
     * @var string Página a la que se redirige al dar error
     */
    private $paginaSiguiente;

    /**
     * Constructor de la clase AppError
     *
     * @param int|string $codError Código del error
     * @param string $descError Descripción del error
     * @param string $archivoError Archivo donde ocurrió el error
     * @param int $lineaError Línea del error
     * @param string $paginaSiguiente Página de redirección
     */
    public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }

    /**
     * Obtiene el código del error, y devuelve int o String
     *
     * @return int|string
     */
    public function getCodError() {
        return $this->codError;
    }

    /**
     * Obtiene la descripción del error, y devuelve un String
     *
     * @return string
     */
    public function getDescError() {
        return $this->descError;
    }

    /**
     * Obtiene el archivo donde ocurrió el error, y devuelve un String
     *
     * @return string
     */
    public function getArchivoError() {
        return $this->archivoError;
    }

    /**
     * Obtiene la línea donde ocurrió el error, y devuelve int
     *
     * @return int
     */
    public function getLineaError() {
        return $this->lineaError;
    }

    /**
     * Obtiene la página de redirección, y devuelve String
     *
     * @return string
     */
    public function getPaginaSiguiente() {
        return $this->paginaSiguiente;
    }

    /**
     * Establece el código del error, devuelve void
     *
     * @param int|string $codError
     * @return void
     */
    public function setCodError($codError): void {
        $this->codError = $codError;
    }

    /**
     * Establece la descripción del error, devuelve void
     *
     * @param string $descError
     * @return void
     */
    public function setDescError($descError): void {
        $this->descError = $descError;
    }

    /**
     * Establece el archivo donde ocurrió el error, devuelve void
     *
     * @param string $archivoError
     * @return void
     */
    public function setArchivoError($archivoError): void {
        $this->archivoError = $archivoError;
    }

    /**
     * Establece la línea donde ocurrió el error, devuelve void
     *
     * @param int $lineaError
     * @return void
     */
    public function setLineaError($lineaError): void {
        $this->lineaError = $lineaError;
    }

    /**
     * Establece la página de redirección, devuelve void
     *
     * @param string $paginaSiguiente
     * @return void
     */
    public function setPaginaSiguiente($paginaSiguiente): void {
        $this->paginaSiguiente = $paginaSiguiente;
    }
}