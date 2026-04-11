<?php
    require_once __DIR__ . "/../models/futbolistas.model.php";

    class futbolistasController {
        private $model;

        public function __construct() {
            $this->model = new futbolista();
        }

        public function listar() {
            $result = $this->model->getAll();
            echo json_encode($result);
        }

        public function obtenerPorId($id) {
            $result = $this->model->getOne($id);
            echo json_encode($result);
        }

        public function insertar($nombre, $posicion, $numero, $edad, $equipo) {
            if (empty($nombre) || empty($posicion) || empty($equipo)) {
                http_response_code(400);
                echo json_encode(["message" => "Campos obligatorios vacios"]);
                return;
            }

            if ($edad < 0) {
                http_response_code(400);
                echo json_encode(["message" => "Error, edad no valida"]);
                return;
            }

            if ($numero <= 0) {
                http_response_code(400);
                echo json_encode(["message" => "Error, numero de futbolista invalido"]);
                return;
            }

            $this->model->insert($nombre, $posicion, $numero, $edad, $equipo);
            http_response_code(201);
            echo json_encode(["message" => "Futbolista insertado"]);
        }

        public function actualizar($id, $nombre, $posicion, $numero, $edad, $equipo) {
            if (empty($nombre) || empty($posicion) || empty($equipo)) {
                http_response_code(400);
                echo json_encode(["message" => "Campos obligatorios vacios"]);
                return;
            }

            if ($edad < 0) {
                http_response_code(400);
                echo json_encode(["message" => "Error, edad no valida"]);
                return;
            }

            if ($numero <= 0) {
                http_response_code(400);
                echo json_encode(["message" => "Error, numero de futbolista invalido"]);
                return;
            }

            $this->model->update($id, $nombre, $posicion, $numero, $edad, $equipo);
            http_response_code(201);
            echo json_encode(["message" => "Informacion de futbolista actualizada"]);
        }

        public function eliminar($id) {
            $this->model->delete($id);
            echo json_encode(["message" => "Futbolista eliminado"]);
        }
    }
?>