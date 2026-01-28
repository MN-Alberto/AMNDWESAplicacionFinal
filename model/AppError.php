<?php
    class AppError{
        private $codError;
        private $descError;
        private $archivoError;   
        private $lineaError;
        private $paginaSiguiente;
        
        public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
            $this->codError = $codError;
            $this->descError = $descError;
            $this->archivoError = $archivoError;
            $this->lineaError = $lineaError;
            $this->paginaSiguiente = $paginaSiguente;
        }
        
        public function getCodError() {
            return $this->codError;
        }

        public function getDescError() {
            return $this->descError;
        }

        public function getArchivoError() {
            return $this->archivoError;
        }

        public function getLineaError() {
            return $this->lineaError;
        }

        public function getPaginaSiguiente() {
            return $this->paginaSiguiente;
        }

        public function setCodError($codError): void {
            $this->codError = $codError;
        }

        public function setDescError($descError): void {
            $this->descError = $descError;
        }

        public function setArchivoError($archivoError): void {
            $this->archivoError = $archivoError;
        }

        public function setLineaError($lineaError): void {
            $this->lineaError = $lineaError;
        }

        public function setPaginaSiguiente($paginaSiguiente): void {
            $this->paginaSiguiente = $paginaSiguiente;
        }
    }
?>