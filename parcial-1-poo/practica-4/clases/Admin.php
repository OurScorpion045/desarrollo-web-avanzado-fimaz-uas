<?php

    require_once 'Usuario.php'; // Se importa el archivo Usuario.php para usar la clase Usuario como clase padre de la clase Admin

    class Admin extends Usuario {

        public function getRol() {
            return "Administrador";
        }
    }
?>