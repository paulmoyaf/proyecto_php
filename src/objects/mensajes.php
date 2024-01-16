<?php

class Mensaje{
    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $mensaje;
    private $fecha;
    private $status;

    public function __construct() {
        $this->fecha = date("Y-m-d H:i:s");
    }

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

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setMensaje($mensaje) {
        $this->mensaje= $mensaje;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha= $fecha;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status= $status;
    }
    

}
?>