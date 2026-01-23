<?php
    class Departamento{
        
        private string $codDepartamento;
        private string $descDepartamento;
        private DateTime $fechaCreacionDepartamento;
        private float $volumenDeNegocio;
        private ?DateTime $fechaBajaDepartamento;
        
        
        public function __construct(string $codDepartamento, string $descDepartamento, DateTime $fechaCreacionDepartamento, float $volumenDeNegocio, ?DateTime $fechaBajaDepartamento) {
            $this->codDepartamento = $codDepartamento;
            $this->descDepartamento = $descDepartamento;
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
            $this->volumenDeNegocio = $volumenDeNegocio;
            $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        }
        
        public function getCodDepartamento(): string {
            return $this->codDepartamento;
        }

        public function getDescDepartamento(): string {
            return $this->descDepartamento;
        }

        public function getFechaCreacionDepartamento(): DateTime {
            return $this->fechaCreacionDepartamento;
        }

        public function getVolumenDeNegocio(): float {
            return $this->volumenDeNegocio;
        }

        public function getFechaBajaDepartamento(): ?DateTime {
            return $this->fechaBajaDepartamento;
        }

        public function setCodDepartamento(string $codDepartamento): void {
            $this->codDepartamento = $codDepartamento;
        }

        public function setDescDepartamento(string $descDepartamento): void {
            $this->descDepartamento = $descDepartamento;
        }

        public function setFechaCreacionDepartamento(DateTime $fechaCreacionDepartamento): void {
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        }

        public function setVolumenDeNegocio(float $volumenDeNegocio): void {
            $this->volumenDeNegocio = $volumenDeNegocio;
        }

        public function setFechaBajaDepartamento(?DateTime $fechaBajaDepartamento): void {
            $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        }     
    }
?>