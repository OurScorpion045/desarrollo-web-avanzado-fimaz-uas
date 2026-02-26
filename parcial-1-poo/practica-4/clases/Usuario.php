<?php

    class Usuario {
        private $nombre;
        private $correo;

        public function __construct($nombre, $correo) {
            $this->nombre = $nombre;

            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $this->correo = $correo;
            } else {
                throw new Exception("Error controlado: Correo invalido");
            }

        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getCorreo() {
            return $this->correo;
        }
    }
?>