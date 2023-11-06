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
INSERT INTO categoria (nombre) VALUES ('Nuevo'), ('Usado');

-- Crear la tabla "tiene_descuento"
CREATE TABLE tiene_descuento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255)
);

-- Insertar datos en la tabla "tiene_descuento"
INSERT INTO tiene_descuento (nombre) VALUES ('Prime'), ('Regular');

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
  nombre VARCHAR(255),
  descripcion VARCHAR(255),
  categoria_id INT,
  talla_id INT,
  tipo_producto_id INT,
  descuento DECIMAL(5, 2),
  precio DECIMAL(10, 2),
  imagen_url VARCHAR(255),
  FOREIGN KEY (categoria_id) REFERENCES categoria(id),
  FOREIGN KEY (tipo_producto_id) REFERENCES tiene_descuento(id),
  FOREIGN KEY (talla_id) REFERENCES talla(id)
);


INSERT INTO `catalogo`.`productos` (`nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `imagen_url`) VALUES ('Camiseta', 'Camiseta de Poliester', '2', '2', '2', '15', '85', '../assets/img/camisetas/cam(4).png');
