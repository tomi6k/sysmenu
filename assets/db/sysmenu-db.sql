-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2023 a las 07:55:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysmenu-db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id-plato` int(255) NOT NULL,
  `nombre-plato` varchar(255) NOT NULL,
  `precio-plato` int(255) NOT NULL,
  `desc-plato` varchar(255) NOT NULL,
  `id-resto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id-plato`, `nombre-plato`, `precio-plato`, `desc-plato`, `id-resto`) VALUES
(1, 'Hamburguesa Americana', 2900, 'Pan de papas, queso cheddar, panceta y carne 140gr', 0),
(2, 'Papas con cheddar', 1900, 'Papas McCain con queso cheddar derretido y tomates cherry en rodajas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `mesa_id` varchar(255) DEFAULT NULL,
  `plato` varchar(255) DEFAULT NULL,
  `precio` int(255) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `mesa_id`, `plato`, `precio`, `fecha_pedido`) VALUES
(1, '2', 'Hamburguesa Americana', 0, '2023-07-19 05:20:57'),
(2, '2', 'Papas con cheddar', 0, '2023-07-19 05:21:00'),
(3, '2', 'Papas con cheddar', 0, '2023-07-19 05:21:02'),
(4, '3', 'Hamburguesa Americana', 2900, '2023-07-19 05:29:46'),
(5, '3', 'Papas con cheddar', 1900, '2023-07-19 05:29:49'),
(6, '3', 'Papas con cheddar', 1900, '2023-07-19 05:31:44'),
(7, '4', 'Hamburguesa Americana', 2900, '2023-07-19 05:34:23'),
(8, '4', 'Papas con cheddar', 1900, '2023-07-19 05:34:25'),
(9, '4', 'Papas con cheddar', 1900, '2023-07-19 05:34:46'),
(10, '4', 'Papas con cheddar', 1900, '2023-07-19 05:34:50'),
(11, '4', 'Hamburguesa Americana', 2900, '2023-07-19 05:34:52'),
(12, '10', 'Hamburguesa Americana', 2900, '2023-07-19 05:36:42'),
(13, '10', 'Hamburguesa Americana', 2900, '2023-07-19 05:36:47'),
(14, '10', 'Papas con cheddar', 1900, '2023-07-19 05:36:49'),
(15, '10', 'Papas con cheddar', 1900, '2023-07-19 05:36:51'),
(16, '6', 'Hamburguesa Americana', 2900, '2023-07-19 05:38:36'),
(17, '6', 'Papas con cheddar', 1900, '2023-07-19 05:38:38'),
(18, '6', 'Papas con cheddar', 1900, '2023-07-19 05:38:40'),
(19, '55', 'Hamburguesa Americana', 2900, '2023-07-19 05:52:42'),
(20, '55', 'Papas con cheddar', 1900, '2023-07-19 05:52:44'),
(21, '55', 'Papas con cheddar', 1900, '2023-07-19 05:52:46'),
(22, '55', 'Hamburguesa Americana', 2900, '2023-07-19 05:52:49'),
(23, '55', 'Hamburguesa Americana', 2900, '2023-07-19 05:52:51'),
(24, '55', 'Hamburguesa Americana', 2900, '2023-07-19 05:53:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE `restaurant` (
  `id-resto` int(255) NOT NULL,
  `nombre-resto` varchar(255) NOT NULL,
  `dir-resto` varchar(255) NOT NULL,
  `cant-mesas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`id-resto`, `nombre-resto`, `dir-resto`, `cant-mesas`) VALUES
(1, 'La Fabrica', 'Paseo Guemes 244', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id-plato`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id-resto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id-plato` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id-resto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
