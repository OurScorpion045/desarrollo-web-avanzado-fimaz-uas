<?php

    require_once 'Usuario.php'; // Se importa el archivo Usuario.php para usar la clase Usuario como clase padre de la clase Alumno

    class Alumno extends Usuario {
        private $matricula;

        public function __construct($nombre, $correo, $matricula) {
            parent::__construct($nombre, $correo);
            $this->matricula = $matricula;
        }

        public function getMatricula() {
            return $this->matricula;
        }

        public function getRol() {
            return "Alumno";
        }
    }
?>