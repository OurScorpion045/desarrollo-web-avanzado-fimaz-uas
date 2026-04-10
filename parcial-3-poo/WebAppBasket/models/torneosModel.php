<?php

    require_once("../../config/DataBase.php");

    class torneosModel {
        public $PDO;

        public function __construct() {
            // Declaracion de la variable para conexion a la BD
            // Se instancia la clase DataBase
            $conecction = new Database();

            //Llamamos al metodo connect y lo asignamos al atributo PDO de nuestra clase
            $this->PDO = $conecction->connect();
        }

        public function insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena) {
            // Iniciamos declarando el statement y preparando la consulta
            $statement = $this->PDO->prepare("INSERT INTO torneos VALUES(null, :nombreTorneo, :organizador, :patrocinadores, :sede, :categoria, :premio1, :premio2, :premio3, :otroPremio, :usuario, :contrasena)");

            //Encriptar contraseña asignada al organizador del torneo
            $contrasena = $this->passwordEncrypyt($contrasena);
            //Asociamos los valores colocados como placeholder en la sentencia SQL
            $statement->bindParam(":nombreTorneo", $nombreTorneo);
            $statement->bindParam(":organizador", $organizador);
            $statement->bindParam(":patrocinadores", $patrocinadores);
            $statement->bindParam(":sede", $sede);
            $statement->bindParam(":categoria", $categoria);
            $statement->bindParam("premio1", $premio1);
            $statement->bindParam("premio2", $premio2);
            $statement->bindParam("premio3", $premio3);
            $statement->bindParam(":otroPremio", $otroPremio);
            $statement->bindParam(":usuario", $usuario);
            $statement->bindParam(":contrasena", $contrasena);
            
            //Ejecutamos el statement mediante execute(). Valoraremos mediante un shorthand if lo que regresara este método
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }

        //El administrador creara el torneo y al usuario organizador
        //Por lo que al crear su password, buscaremos encriptarla por seguridad
        //Utilizaremos el metodo password_hash y password_verify

        public function passwordEncrypyt($password) {
            $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
            return $passwordEncrypted;
        }

        //Metodo para verificar si la contraseña introducida corresponde con la encriptada
        public function passwordDencrypted($passwordEncrypted, $passwordCandidate) {
            // Se verifica con un shorthand if si el password candidato es correcto
            return (password_verify($passwordCandidate, $passwordEncrypted)) ? true : false;
        }

        //Crearemos el método para listar todos los torneos
        public function read() {
            $statement = $this->PDO->prepare("SELECT * FROM torneos");
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
    }

?>