<?php

class Pedido{

    private $id;
    private $clienteId;
    private $productoId;
    private $cantidad;
    private $createDate;
    private $estado;

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getClienteId() {
        return $this->clienteId;
    }

    public function setClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }

    public function getProductoId() {
        return $this->productoId;
    }

    public function setProductoId($productoId) {
        $this->productoId = $productoId;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getCreateDate() {
        return $this->createDate;
    }

    public function setCreateDate($createDate) {
        $this->createDate = $createDate;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}
