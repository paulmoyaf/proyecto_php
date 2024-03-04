<?php

class Cliente{
    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $direccion;
    private $ciudad;
    private $codigoPostal;
    private $totalProductos;
    private $precioTotal;

    private $estado;

    private $createDate;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id= $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre= $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono= $telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email= $email;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion= $direccion;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function setCiudad($ciudad) {
        $this->ciudad= $ciudad;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal= $codigoPostal;
    }

    public function getTotalProductos() {
        return $this->totalProductos;
    }

    public function setTotalProductos($totalProductos) {
        $this->totalProductos= $totalProductos;
    }

    public function getPrecioTotal() {
        return $this->precioTotal;
    }

    public function setPrecioTotal($precioTotal) {
        $this->precioTotal= $precioTotal;
    }
    
    public function getCreateDate() {
        return $this->createDate;
    }

    public function setCreateDate($createDate) {
        $this->createDate= $createDate;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado= $estado;
    }

}
