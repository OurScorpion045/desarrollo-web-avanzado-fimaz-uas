<?php
    require_once __DIR__ . "/../config/database.php";

    class futbolista {
        private $database;
        private $connection;

        public function __construct(){
            $this->database = new DataBase();
            $this->connection = $this->database->getConnection();
        }

        public function getAll() {
            $sql = "SELECT * FROM futbolistas ORDER BY id DESC";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        }

        public function getOne($id) {
            $sql = "SELECT * FROM futbolistas WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $statement->fetch();
        }

        public function insert($nombre, $posicion, $numero, $edad, $equipo) {
            $sql = "INSERT INTO futbolistas(nombre, posicion, numero, edad, equipo) VALUES (:nombre, :posicion, :numero, :edad, :equipo)";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(":nombre", $nombre);
            $statement->bindParam(":posicion", $posicion);
            $statement->bindParam(":numero", $numero);
            $statement->bindParam(":edad", $edad);
            $statement->bindParam(":equipo", $equipo);
            return $statement->execute();
        }

        public function update($id, $nombre, $posicion, $numero, $edad, $equipo) {
            $sql = "UPDATE futbolistas SET nombre = :nombre, posicion = :posicion, numero = :numero, edad = :edad, equipo = :equipo WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->bindParam(":nombre", $nombre);
            $statement->bindParam(":posicion", $posicion);
            $statement->bindParam(":numero", $numero);
            $statement->bindParam(":edad", $edad);
            $statement->bindParam(":equipo", $equipo);
            return $statement->execute();
        }

        public function delete($id) {
            $sql = "DELETE FROM futbolistas WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(":id", $id);
            return $statement->execute();
        }
    }
?>