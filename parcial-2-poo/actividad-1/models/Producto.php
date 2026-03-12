<?php

class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $existencia;
    private $precio;

    function __construct($id = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = 0.00) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getExistencia() {
        return $this->existencia;
    }

    function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>