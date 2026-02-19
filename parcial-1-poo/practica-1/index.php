<?php

    require_once 'Usuario.php';

    $objUsuario01 = new Usuario("Mario Hernandez", "sams24484@gmail.com");

    $nombre = $objUsuario01->getNombre();
    $correo = $objUsuario01->getCorreo();
    
    echo "Nombre: $nombre<br>";
    echo "Correo: $correo<br>";
?>