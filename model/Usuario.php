<?php

/*
 * Autor: Alberto Méndez
 * Fecha de actualización: 03/02/2025
 */

/**
 * Clase Usuario
 *
 * Representa un usuario de la aplicación.
 */
class Usuario {

    /**
     * @var string Código del usuario
     */
    private string $codUsuario;

    /**
     * @var string Contraseña del usuario
     */
    private string $password;

    /**
     * @var string Descripción o nombre del usuario
     */
    private string $descUsuario;

    /**
     * @var int Número de conexiones del usuario
     */
    private int $numConexiones;

    /**
     * @var DateTime Fecha y hora de la última conexión
     */
    private DateTime $fechaHoraUltimaConexion;

    /**
     * @var DateTime|null Fecha y hora de la conexión anterior
     */
    private ?DateTime $fechaHoraUltimaConexionAnterior;

    /**
     * @var string Perfil del usuario, puede ser administrador o usuario
     */
    private string $perfil;

    /**
     * @var string Imagen del usuario
     */
    private string $imagenUsuario;

    /**
     * Constructor de la clase Usuario
     *
     * @param string $codUsuario Código del usuario
     * @param string $password  Contraseña del usuario
     * @param string $descUsuario Descripción del usuario
     * @param int $numConexiones Número de conexiones realizadas por el usuario
     * @param DateTime $fechaHoraUltimaConexion Fecha de última conexión del usuario
     * @param string $perfil Tipo de perfil del usuario
     * @param string|null $imagenUsuario Imagen del usuario
     * @param DateTime|null $fechaHoraUltimaConexionAnterior Fecha de última conexión anterior del usuario
     */
    public function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil, $imagenUsuario, $fechaHoraUltimaConexionAnterior) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numConexiones = $numConexiones;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
        $this->imagenUsuario = $imagenUsuario == null ? '' : $imagenUsuario;
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
    }

    /**
     * Obtiene el código del usuario
     * @return string
     */
    public function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Obtiene la contraseña del usuario
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Obtiene la descripción del usuario
     * @return string
     */
    public function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     * Obtiene el tipo de perfil del usuario (administrador/usuario)
     * @return string
     */
    public function getPerfil() {
        return $this->perfil;
    }

    /**
     * Obtiene el número de conexiones realizadas por el usuario
     * @return int
     */
    public function getNumConexiones() {
        return $this->numConexiones;
    }

    /**
     * Obtiene la fecha de última conexión del usuario
     * @return DateTime
     */
    public function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    /**
     * Establece la fecha y hora de la última conexión del usuario
     * @param DateTime $fecha
     * @return void
     */
    public function setFechaHoraUltimaConexion($fecha) {
        $this->fechaHoraUltimaConexion = $fecha;
    }

    /**
     * Obtiene la fecha y hora de la última conexión anterior del usuario
     * @return DateTime|null
     */
    public function getFechaHoraUltimaConexionAnterior() {
        return $this->fechaHoraUltimaConexionAnterior;
    }

    /**
     * Establece la fecha y hora de la última conexión anterior del usuario
     * @param DateTime|null $fecha
     * @return void
     */
    public function setFechaHoraUltimaConexionAnterior($fecha) {
        $this->fechaHoraUltimaConexionAnterior = $fecha;
    }

    /**
     * Establece la descripción del usuario
     * @param string $descUsuario
     * @return void
     */
    public function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }
}
?>