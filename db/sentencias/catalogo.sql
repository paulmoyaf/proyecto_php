-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2024 a las 08:30:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

/*
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
*/

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP DATABASE IF EXISTS `catalogo`;
CREATE DATABASE IF NOT EXISTS `catalogo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catalogo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Para usar los datos para la tabla `categoria`

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Basica'),
(2, 'Estampadas'),
(3, 'Polos'),
(4, 'Deportivas'),
(164, 'Otra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `comentario` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `create_time`, `name`, `phone`, `email`, `subject`, `message`, `status`) VALUES
(103, '2024-01-10 11:39:06', 'Andres', '679034040', 'pausarikgabe@gmail.com', NULL, 'Este es un nuevo del 2024\r\n', 'leido'),
(106, '2024-01-17 09:20:53', 'Andres', '6796', 'pausarikgabe@gmail.com', NULL, 'new message', ''),

(146, '2024-01-26 11:42:33', 'Jose Ramon Olabarria', '946169002', 'jrolabarria@leartik.eus', NULL, 'Hola Mundo', NULL),
(147, '2024-01-26 11:43:49', 'Andres', '679034040', 'pausarikgabe@gmail.com', NULL, 'jmklsjlgksg', NULL),
(148, '2024-01-26 11:44:20', 'Jose Ramon Olabarria', '946169002', 'jrolabarria@leartik.eus', NULL, 'Kaixo Mundua', 'leido'),

(160, '2024-01-29 10:09:15', 'Andres', '679034040', 'aaapa@ajk.com', NULL, '!\"$%()=?¿ffffffAñÑMANSNJKFKF', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `talla_id` int(11) DEFAULT NULL,
  `tipo_producto_id` int(11) DEFAULT NULL,
  `descuento` decimal(5,0) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `precio_final` decimal(10,2) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `categoria_id`, `talla_id`, `tipo_producto_id`, `descuento`, `precio`, `precio_final`, `imagen_url`) VALUES
(3, 'Promo new', 'Camiseta de Algodon', 1, 1, 2, '50', '15.00', '15.00', '../assets/img/camisetas/cam(4).png'),
(5, 'Camiseta1', 'Camiseta de Poliester', 4, 3, 1, '100', '85.00', '0.00', '../assets/img/camisetas/cam(6).png'),,
(23, 'Cami Algodón', 'Camiseta de Algodon a', 4, 6, 1, '50', '100.00', '50.00', '../assets/img/camisetas/cam(4).png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id`, `nombre`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XLL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre`) VALUES
(1, 'Prime'),
(2, 'Regular');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `tipo_producto_id` (`tipo_producto_id`),
  ADD KEY `talla_id` (`talla_id`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`tipo_producto_id`) REFERENCES `tipo_producto` (`id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`talla_id`) REFERENCES `talla` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
