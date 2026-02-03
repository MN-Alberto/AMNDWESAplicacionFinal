<?php

/*
 * Autor: Alberto Méndez
 * Fecha de actualización: 03/02/2025
 */

/**
 * Clase Departamento
 *
 * Representa un departamento con su información básica.
 */
class Departamento {

    /**
     * @var string Código que identifica el departamento
     */
    private string $codDepartamento;

    /**
     * @var string Descripción del departamento
     */
    private string $descDepartamento;

    /**
     * @var DateTime Fecha de creación del departamento
     */
    private DateTime $fechaCreacionDepartamento;

    /**
     * @var float Volumen de negocio del departamento
     */
    private float $volumenDeNegocio;

    /**
     * @var DateTime|null Fecha de baja del departamento (null si el departamento aun no se ha dado de baja)
     */
    private ?DateTime $fechaBajaDepartamento;

    /**
     * Constructor de la clase Departamento
     *
     * @param string $codDepartamento Código del departamento
     * @param string $descDepartamento Descripción del departamento
     * @param DateTime $fechaCreacionDepartamento Fecha de creación
     * @param float $volumenDeNegocio Volumen de negocio
     * @param DateTime|null $fechaBajaDepartamento Fecha de baja (null si el departamento aun no se ha dado de baja)
     */
    public function __construct(
        string $codDepartamento,
        string $descDepartamento,
        DateTime $fechaCreacionDepartamento,
        float $volumenDeNegocio,
        ?DateTime $fechaBajaDepartamento
    ) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    /**
     * Obtiene el código del departamento, devuelve string
     * @return string
     */
    public function getCodDepartamento(): string {
        return $this->codDepartamento;
    }

    /**
     * Obtiene la descripción del departamento, devuelve string
     * @return string
     */
    public function getDescDepartamento(): string {
        return $this->descDepartamento;
    }

    /**
     * Obtiene la fecha de creación del departamento, devuelve un DateTime
     * @return DateTime
     */
    public function getFechaCreacionDepartamento(): DateTime {
        return $this->fechaCreacionDepartamento;
    }

    /**
     * Obtiene el volumen de negocio del departamento, devuelve float
     * @return float
     */
    public function getVolumenDeNegocio(): float {
        return $this->volumenDeNegocio;
    }

    /**
     * Obtiene la fecha de baja del departamento, devuelve DateTime si está aun activo, si no devuelve null
     * @return DateTime|null
     */
    public function getFechaBajaDepartamento(): ?DateTime {
        return $this->fechaBajaDepartamento;
    }

    /**
     * Establece el código del departamento
     * @param string $codDepartamento
     * @return void
     */
    public function setCodDepartamento(string $codDepartamento): void {
        $this->codDepartamento = $codDepartamento;
    }

    /**
     * Establece la descripción del departamento
     * @param string $descDepartamento
     * @return void
     */
    public function setDescDepartamento(string $descDepartamento): void {
        $this->descDepartamento = $descDepartamento;
    }

    /**
     * Establece la fecha de creación del departamento
     * @param DateTime $fechaCreacionDepartamento
     * @return void
     */
    public function setFechaCreacionDepartamento(DateTime $fechaCreacionDepartamento): void {
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
    }

    /**
     * Establece el volumen de negocio del departamento
     * @param float $volumenDeNegocio
     * @return void
     */
    public function setVolumenDeNegocio(float $volumenDeNegocio): void {
        $this->volumenDeNegocio = $volumenDeNegocio;
    }

    /**
     * Establece la fecha de baja del departamento
     * @param DateTime|null $fechaBajaDepartamento
     * @return void
     */
    public function setFechaBajaDepartamento(?DateTime $fechaBajaDepartamento): void {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
}
?>