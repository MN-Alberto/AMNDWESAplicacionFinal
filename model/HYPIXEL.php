<?php
/**
 * Clase HYPIXEL
 *
 * Representa un servidor de Hypixel y almacena información
 * sobre su estado, número de jugadores, versión y icono.
 *
 * @author Alberto Méndez
 * @date   2025-02-03
 */
class HYPIXEL {
    /**
     * @var string IP del servidor
     */
    private $ip;

    /**
     * @var bool Estado del servidor (online/offline)
     */
    private $online;

    /**
     * @var int Número de jugadores actuales conectados
     */
    private $numJugadoresActuales;

    /**
     * @var int Número máximo de jugadores permitidos
     */
    private $numJugadoresMaximos;

    /**
     * @var string Versión del servidor
     */
    private $version;

    /**
     * @var string Icono del servidor (base64 o URL)
     */
    private $icono;

    /**
     * Constructor de la clase HYPIXEL
     *
     * @param string $ip IP del servidor
     * @param bool $online Estado del servidor
     * @param int $numJugadoresActuales Número de jugadores actuales
     * @param int $numJugadoresMaximos Número máximo de jugadores
     * @param string $version Versión del servidor
     * @param string $icono Icono del servidor
     */
    public function __construct($ip, $online, $numJugadoresActuales, $numJugadoresMaximos, $version, $icono) {
        $this->ip = $ip;
        $this->online = $online;
        $this->numJugadoresActuales = $numJugadoresActuales;
        $this->numJugadoresMaximos = $numJugadoresMaximos;
        $this->version = $version;
        $this->icono = $icono;
    }

    /**
     * Obtiene el icono del servidor
     *
     * @return string
     */
    public function getIcono() {
        return $this->icono;
    }

    /**
     * Establece el icono del servidor
     *
     * @param string $icono
     * @return void
     */
    public function setIcono($icono): void {
        $this->icono = $icono;
    }

    /**
     * Obtiene la IP del servidor
     *
     * @return string
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Obtiene el estado del servidor
     *
     * @return bool
     */
    public function getOnline() {
        return $this->online;
    }

    /**
     * Obtiene el número de jugadores actuales
     *
     * @return int
     */
    public function getNumJugadoresActuales() {
        return $this->numJugadoresActuales;
    }

    /**
     * Obtiene el número máximo de jugadores
     *
     * @return int
     */
    public function getNumJugadoresMaximos() {
        return $this->numJugadoresMaximos;
    }

    /**
     * Obtiene la versión del servidor
     *
     * @return string
     */
    public function getVersion() {
        return $this->version;
    }

    /**
     * Establece la IP del servidor
     *
     * @param string $ip
     * @return void
     */
    public function setIp($ip): void {
        $this->ip = $ip;
    }

    /**
     * Establece el estado del servidor
     *
     * @param bool $online
     * @return void
     */
    public function setOnline($online): void {
        $this->online = $online;
    }

    /**
     * Establece el número de jugadores actuales
     *
     * @param int $numJugadoresActuales
     * @return void
     */
    public function setNumJugadoresActuales($numJugadoresActuales): void {
        $this->numJugadoresActuales = $numJugadoresActuales;
    }

    /**
     * Establece el número máximo de jugadores
     *
     * @param int $numJugadoresMaximos
     * @return void
     */
    public function setNumJugadoresMaximos($numJugadoresMaximos): void {
        $this->numJugadoresMaximos = $numJugadoresMaximos;
    }

    /**
     * Establece la versión del servidor
     *
     * @param string $version
     * @return void
     */
    public function setVersion($version): void {
        $this->version = $version;
    }
}
?>
