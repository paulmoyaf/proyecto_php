<?php

class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $categoria_id;
    private $talla_id;
    private $tipo_producto_id;
    private $descuento;
    private $precio;
    private $precio_final;
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

    public function getTipoProductoId() {
        return $this->tipo_producto_id;
    }

    public function setTipoProductoId($tipo_producto_id) {
        $this->tipo_producto_id = $tipo_producto_id;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function getPrecio() {
        return $this->precio;
        // if ($this->tipo_producto_id == 1) {
        //     return $this->precio - ($this->precio * ($this->descuento / 100));
        // } else {
        //     return $this->precio;
        // }
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    // public function setPrecioFinal($precio_final) {
    //     $this->precio_final = $precio_final;
    // }

    public function getPrecioFinal() {
        // Asegurarse de que precio_inicial y descuento tengan valores válidos
        if ($this->precio !== null && $this->descuento !== null && $this->tipo_producto_id == 1) {
            return $this->precio_final = $this->precio - ($this->precio * ($this->descuento / 100));
        } else {
            // Puedes manejar casos donde los valores no están definidos
            return $this->precio_final =  $this->precio;
        }
    }


    public function getImagenUrl() {
        return $this->imagen_url;
    }

    public function setImagenUrl($imagen_url) {
        $this->imagen_url = $imagen_url;
    }
}

?>