<?php

    require_once 'clases/Admin.php';
    require_once 'clases/Alumno.php';
    require_once 'clases/Invitado.php';

    $usuarios = [];

    try {
        $admin01 = new Admin("Marcos", "admin01@gmail.com");
        $usuarios[] = $admin01;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    try {
        $alumno01 = new Alumno("Mario", "sams24484@gmail.com", "20860021");
        $usuarios[] = $alumno01;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    try {
        $invitado01 = new Invitado("Jose", "invitado01@gmail.com", "IngaturroñaCorporation");
        $usuarios[] = $invitado01;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    try {
        $admin02 = new Admin("Moises", "admin02#gmail,com");
        $usuarios[] = $admin02;
    } catch (Exception $e) {
        echo $e->getMessage();
    }


    echo <<<HTML
        <style>
            td {
                text-align: center;
                padding: 5px;
            }
        </style>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Matricula</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>
    HTML;

    function validarMatricula($objeto) {
        if (method_exists($objeto, "getMatricula")) {
            return $objeto->getMatricula();
        } else {
            return "--";
        }
    }

    function validarEmpresa($objeto) {
        if (method_exists($objeto, "getEmpresa")) {
            return $objeto->getEmpresa();
        } else {
            return "--";
        }
    }

    foreach ($usuarios as $usuario) {
        $matricula = validarMatricula($usuario);
        $empresa = validarEmpresa($usuario);
        echo "
            <tr>
                <td>{$usuario->getNombre()}</td>
                <td>{$usuario->getCorreo()}</td>
                <td>{$usuario->getRol()}</td>
                <td>{$matricula}</td>
                <td>{$empresa}</td>
            </tr>
        ";
    }

    echo <<<HTML
            </tbody>
        </table>
    HTML;
?>