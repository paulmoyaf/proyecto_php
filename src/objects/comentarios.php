<?php 


class Comentario {
  private $id;
  private $id_producto;
  private $nombre;
  private $comentario;

  public function __construct() {

  }

//   public function __construct($id, $id_producto, $nombre, $comentario) {
//     $this->id = $id;
//     $this->id_producto = $id_producto;
//     $this->nombre = $nombre;
//     $this->comentario = $comentario;
//   }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getIdProducto() {
    return $this->id_producto;
  }

  public function setIdProducto($id_producto) {
    $this->id_producto = $id_producto;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getComentario() {
    return $this->comentario;
  }

  public function setComentario($comentario) {
    $this->comentario = $comentario;
  }
}

?>