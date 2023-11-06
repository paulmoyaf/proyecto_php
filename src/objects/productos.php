<?php

class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $categoria_id;
    private $talla_id;
    private $tiene_descuento_id;
    private $descuento;
    private $precio;
    private $imagen_url;

    public function __construct() {
        $this->descuento = 50;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function getTallaId() {
        return $this->talla_id;
    }

    public function setTallaId($talla_id) {
        $this->talla_id = $talla_id;
    }

    public function getTieneDescuentoId() {
        return $this->tiene_descuento_id;
    }

    public function setTieneDescuentoId($tiene_descuento_id) {
        $this->tiene_descuento_id = $tiene_descuento_id;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function getPrecio() {
        if ($this->tiene_descuento_id == 1) {
            return $this->precio - ($this->precio * ($this->descuento / 100));
        } else {
            return $this->precio;
        }
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getImagenUrl() {
        return $this->imagen_url;
    }

    public function setImagenUrl($imagen_url) {
        $this->imagen_url = $imagen_url;
    }
}

?>