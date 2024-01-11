-- Crear la base de datos "catalogo"
CREATE DATABASE catalogo;
-- Usar la base de datos "catalogo"
USE catalogo;

-- Crear la tabla "categoria"
CREATE TABLE categoria (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255)
);

-- Insertar datos en la tabla "categoria"
INSERT INTO categoria (nombre) VALUES ('Deportiva'), ('Polo'),('Elegant');

-- Crear la tabla "tiene_descuento"
CREATE TABLE tipo_producto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255)
);

-- Insertar datos en la tabla "tiene_descuento"
INSERT INTO tipo_producto (nombre) VALUES ('Prime'), ('Regular');

CREATE TABLE `catalogo`.`comentarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_producto` INT NULL,
  `nombre` VARCHAR(255) NULL,
  `comentario` LONGTEXT NULL,
  PRIMARY KEY (`id`));


-- Crear la tabla "talla"
CREATE TABLE talla (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255)
);

-- Insertar datos en la tabla "talla"
INSERT INTO talla (nombre) VALUES ('L'), ('M'), ('S');

-- Crear la tabla "productos"
CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  descripcion VARCHAR(255),
  categoria_id INT,
  talla_id INT,
  tipo_producto_id INT,
  descuento DECIMAL(5, 0),
  precio DECIMAL(10, 2) NOT NULL,
  precio_final DECIMAL(10, 2),
  imagen_url VARCHAR(255),
  FOREIGN KEY (categoria_id) REFERENCES categoria(id),
  FOREIGN KEY (tipo_producto_id) REFERENCES tipo_producto(id),
  FOREIGN KEY (talla_id) REFERENCES talla(id)
);

INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final` ,`imagen_url`) VALUES ('Camiseta', 'Camiseta de Poliester', '1', '2', '1', '15', '85', ' ', '../assets/img/camisetas/cam(1).png');
INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final` ,`imagen_url`) VALUES ('Camiseta', 'Camiseta de Algodon', '2', '1', '2', '15', '105', ' ', '../assets/img/camisetas/cam(2).png');
INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final` ,`imagen_url`) VALUES ('Camiseta', 'Camiseta de Algodon', '2', '2', '1', '50', '85', ' ', '../assets/img/camisetas/cam(3).png');
INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final` ,`imagen_url`) VALUES ('Camiseta', 'Camiseta de Poliester', '1', '2', '2', '15', '25', ' ', '../assets/img/camisetas/cam(5).png');
INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final` ,`imagen_url`) VALUES ('Camiseta', 'Camiseta de Poliester', '2', '2', '1', '100', '85', ' ', '../assets/img/camisetas/cam(6).png');
INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final` ,`imagen_url`) VALUES ('Camiseta', 'Camiseta de Poliester', '1', '2', '2', '15', '35', ' ', '../assets/img/camisetas/cam(7).png');
