<?php


class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen_url;
    private $categoria;
    private $precio;
    private $descuento;
    private $tiene_descuento;

    public function __construct() {
        $this->id = null;
        $this->nombre = null;
        $this->descripcion = null;
        $this->imagen_url = null;
        $this->categoria = null;
        $this->precio = null;
        $this->descuento = null;
        $this->tiene_descuento = false;
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

    public function getImagenURL() {
        return $this->imagen_url;
    }

    public function setImagenURL($imagen_url) {
        $this->imagen_url = $imagen_url;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    private function calcularDescuento() {
        if ($this->tiene_descuento) {
            $this->descuento = $this->precio * 0.25;
        } else {
            $this->descuento = 0.00;
        }
    }

    public function getTieneDescuento() {
        return $this->tiene_descuento;
    }

    public function setTieneDescuento($tiene_descuento) {
        if ($tiene_descuento === "PRIME") {
            $this->tiene_descuento = true;
            $this->precio = $this->precio * 0.5;
        } else {
            $this->tiene_descuento = false;
        }
        $this->calcularDescuento();
    }
}

?>