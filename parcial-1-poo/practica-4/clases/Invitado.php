<?php

    require_once 'Usuario.php'; // Se importa el archivo Usuario.php para usar la clase Usuario como clase padre de la clase Invitado

    class Invitado extends Usuario {
        private $empresa;

        public function __construct($nombre, $correo, $empresa) {
            parent::__construct($nombre, $correo);
            $this->empresa = $empresa;
        }

        public function getEmpresa() {
            return $this->empresa;
        }

        public function getRol() {
            return "Invitado";
        }
    }
?>