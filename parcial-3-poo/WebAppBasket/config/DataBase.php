<?php

class DataBase {
    //Atributos de la clase
    private $host = "localhost";
    private $dbname = "proyecto";
    private $user = "root";
    private $password = "";

    public function __construct() {
        //Constructor
    }

    // Metodo para conexion a la base de datos
    public function connect() {
        try {
            $PDO = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4", $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return "Error de conexion: " . $e->getMessage();
        }
    }
}

?>