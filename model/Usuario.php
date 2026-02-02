<?php

    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 18/12/2025
     */

    class Usuario{
        
        private string $codUsuario;
        private string $password;
        private string $descUsuario;
        private int $numAccesos;
        private DateTime $fechaHoraUltimaConexion;
        private ?DateTime $fechaHoraUltimaConexionAnterior;
        private string $perfil;
        
        
        public function __construct($codUsuario,$password,$descUsuario,$numConexiones,$fechaHoraUltimaConexion,$perfil,$imagenUsuario,$fechaHoraUltimaConexionAnterior) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numConexiones = $numConexiones;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->perfil = $perfil;
            $this->imagenUsuario = $imagenUsuario==null?'':$imagenUsuario;
            $this->fechaHoraUltimaConexionAnterior=$fechaHoraUltimaConexionAnterior;
        }

        public function getCodUsuario() {
             return $this->codUsuario; 
        }
        public function getPassword() { 
            return $this->password; 
        }
        public function getDescUsuario() { 
            return $this->descUsuario; 
        }
        public function getPerfil() { 
            return $this->perfil; 
        }
        public function getNumConexiones() { 
            return $this->numConexiones; 
        }
        public function getFechaHoraUltimaConexion() { 
            return $this->fechaHoraUltimaConexion; 
        }
        public function setFechaHoraUltimaConexion($fecha) {
            $this->fechaHoraUltimaConexion = $fecha;
        }
        public function getFechaHoraUltimaConexionAnterior() { 
            return $this->fechaHoraUltimaConexionAnterior; 
        }
        public function setFechaHoraUltimaConexionAnterior($fecha) {
            $this->fechaHoraUltimaConexionAnterior = $fecha;
        }
        public function setDescUsuario($descUsuario) {
            $this->descUsuario = $descUsuario;
        }
    }
?>