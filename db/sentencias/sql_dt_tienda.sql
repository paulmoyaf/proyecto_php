-- Estructura de tabla para la tabla `categoria`
CREATE TABLE `categoria` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nombre` TEXT DEFAULT NULL
);

-- Volcado de datos para la tabla `categoria`
INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Basica'),
(2, 'Estampadas'),
(3, 'Polos'),
(4, 'Deportivas'),
(164, 'Otra');

-- Estructura de tabla para la tabla `comentarios`
CREATE TABLE `comentarios` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `id_producto` INTEGER DEFAULT NULL,
  `nombre` TEXT DEFAULT NULL,
  `comentario` TEXT DEFAULT NULL
);

-- Estructura de tabla para la tabla `mensajes`
CREATE TABLE `mensajes` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `create_time` TEXT DEFAULT NULL,
  `name` TEXT DEFAULT NULL,
  `phone` TEXT DEFAULT NULL,
  `email` TEXT DEFAULT NULL,
  `subject` TEXT DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `status` TEXT DEFAULT NULL
);

-- Estructura de tabla para la tabla `productos`
CREATE TABLE `productos` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nombre` TEXT NOT NULL,
  `descripcion` TEXT DEFAULT NULL,
  `categoria_id` INTEGER DEFAULT NULL,
  `talla_id` INTEGER DEFAULT NULL,
  `tipo_producto_id` INTEGER DEFAULT NULL,
  `descuento` REAL DEFAULT NULL,
  `precio` REAL NOT NULL,
  `precio_final` REAL DEFAULT NULL,
  `imagen_url` TEXT DEFAULT NULL,
  FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  FOREIGN KEY (`talla_id`) REFERENCES `talla` (`id`),
  FOREIGN KEY (`tipo_producto_id`) REFERENCES `tipo_producto` (`id`)
);

-- Estructura de tabla para la tabla `talla`
CREATE TABLE `talla` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nombre` TEXT DEFAULT NULL
);

-- Estructura de tabla para la tabla `tipo_producto`
CREATE TABLE `tipo_producto` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nombre` TEXT DEFAULT NULL
);