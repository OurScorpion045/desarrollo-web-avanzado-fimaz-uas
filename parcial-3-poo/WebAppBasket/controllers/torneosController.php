<?php

    require_once "../../models/torneosModel.php";

    class torneosController {
        private $model;

        public function __construct(){
            $this->model = new torneosModel();
        }

        //Crearemos el metodo controlador que mandara llamar la funcion insert del modelo.
        //Tambien mandara los parametros necesarios para guardar en la tabla "torneos".
        //Si los datos se guardan redireccionara al usuario a la pantalla principal de inicio
        //De lo contrario se mantendra en la pantalla del formulario de captura de datos del torneo

        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena) {
            $id = $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
            return ($id != false) ? header("Location: admin.php") : header("Location: frmTorneos.php");
        }

        // Metodo que manda ejecutar la funcion read del modelo del Torneo.
        public function readTorneo() {
            return ($this->model->read()) ? $this->model->read() : false;
        }

    }


?>