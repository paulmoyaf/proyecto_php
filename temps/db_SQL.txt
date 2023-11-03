
CREATE TABLE productos (
   id INTEGER PRIMARY KEY AUTOINCREMENT,
   nombre VARCHAR(255),
   descripcion TEXT,
   categoria VARCHAR(50) NULL,
   tiene_descuento BOOLEAN,
   descuento DECIMAL(5, 2),
   precio DECIMAL(10, 2),
   imagen_url VARCHAR(255) NULL
);

INSERT INTO productos (nombre, descripcion, imagen_url, categoria, precio, descuento, tiene_descuento)
VALUES ('Producto 1', 'Descripción del Producto 1', 'imagen1.jpg', 'Categoría 1', 50.00, 0.00, 0);

INSERT INTO productos (nombre, descripcion, imagen_url, categoria, precio, descuento, tiene_descuento)
VALUES ('Producto 2', 'Descripción del Producto 2', 'imagen2.jpg', 'Categoría 2', 75.00, 0.00, 0);

INSERT INTO productos (nombre, descripcion, imagen_url, categoria, precio, descuento, tiene_descuento)
VALUES ('Producto 3', 'Descripción del Producto 3', 'imagen3.jpg', 'Categoría 1', 120.00, 0.00, 1);

INSERT INTO productos (nombre, descripcion, imagen_url, categoria, precio, descuento, tiene_descuento)
VALUES ('Producto 4', 'Descripción del Producto 4', 'imagen4.jpg', 'Categoría 3', 90.00, 0.00, 0);