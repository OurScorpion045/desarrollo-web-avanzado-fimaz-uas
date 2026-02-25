<?php

    require_once 'clases/Admin.php'; //Se importa este archivo para usar la clase Admin
    require_once 'clases/Alumno.php'; //Se importa este archivo para usar la clase Alumno

    function validarAdmin($nombreAdmin, $correo) {
        try {
            $admin = new Admin($nombreAdmin, $correo);
            echo "Administrador {$nombreAdmin} validado con correo: {$correo} <br>";
            return $admin;
        } catch (Exception $e) {
            echo "Error al validar Administrador {$nombreAdmin}: {$e->getMessage()} <br>";
        }
    }

    function validarAlumno($nombreAlumno, $correo, $matricula) {
        try {
            $alumno = new Alumno($nombreAlumno, $correo, $matricula);
            echo "Alumno {$nombreAlumno} validado con correo: {$correo} y matricula: {$matricula} <br>";
            return $alumno;
        } catch (Exception $e) {
            echo "Error al validar Alumno {$nombreAlumno}: {$e->getMessage()} <br>";
        }
    }

    $objAdmin01 = validarAdmin("Marcos", "example#gmail,com");
    $objAdmin02 = validarAdmin("Manuel", "example@gmail.com");
    $objAlumno01 = validarAlumno("Mario Hernandez", "sams24484@gmail.com", "20860021");
    $objAlumno02 = validarAlumno("Juan Hernandez", "juan#gmail,com", "12345678");
?>