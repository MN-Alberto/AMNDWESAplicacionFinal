<?php

class HYPIXEL{
    private $ip;
    private $online;
    private $numJugadoresActuales;
    private $numJugadoresMaximos;
    private $version;
    private $icono;
    
    public function __construct($ip, $online, $numJugadoresActuales, $numJugadoresMaximos, $version, $icono) {
        $this->ip = $ip;
        $this->online = $online;
        $this->numJugadoresActuales = $numJugadoresActuales;
        $this->numJugadoresMaximos = $numJugadoresMaximos;
        $this->version = $version;
        $this->icono = $icono;
    }
    
    public function getIcono() {
        return $this->icono;
    }

    public function setIcono($icono): void {
        $this->icono = $icono;
    }
    
    public function getIp() {
        return $this->ip;
    }

    public function getOnline() {
        return $this->online;
    }

    public function getNumJugadoresActuales() {
        return $this->numJugadoresActuales;
    }

    public function getNumJugadoresMaximos() {
        return $this->numJugadoresMaximos;
    }

    public function getVersion() {
        return $this->version;
    }

    public function setIp($ip): void {
        $this->ip = $ip;
    }

    public function setOnline($online): void {
        $this->online = $online;
    }

    public function setNumJugadoresActuales($numJugadoresActuales): void {
        $this->numJugadoresActuales = $numJugadoresActuales;
    }

    public function setNumJugadoresMaximos($numJugadoresMaximos): void {
        $this->numJugadoresMaximos = $numJugadoresMaximos;
    }

    public function setVersion($version): void {
        $this->version = $version;
    }

}

?>