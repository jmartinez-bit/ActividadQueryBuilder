-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2020 a las 04:47:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_query`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendatario`
--

CREATE TABLE `arrendatario` (
  `id` int(11) NOT NULL,
  `ruc` char(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrendatario`
--

INSERT INTO `arrendatario` (`id`, `ruc`, `nombre`, `apellido`) VALUES
(1, '20147896320', 'Francisco Javier', 'Muñoz'),
(2, '20369852635', 'David', 'Navarro'),
(3, '20147854721', 'Pilar', 'Serrano'),
(4, '20147854712', 'Cristina', 'Saez'),
(5, '20148965478', 'Daniel', 'Romero'),
(6, '20365147895', 'Joaquin', 'Castillo'),
(7, '20147574125', 'Marta', 'Ortega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrienda`
--

CREATE TABLE `arrienda` (
  `id` int(11) NOT NULL,
  `ruc` char(11) NOT NULL,
  `deuda` decimal(8,2) NOT NULL DEFAULT 0.00,
  `casa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrienda`
--

INSERT INTO `arrienda` (`id`, `ruc`, `deuda`, `casa_id`) VALUES
(1, '20147574125', '4200.00', 3),
(2, '20365147895', '1200.00', 2),
(3, '20148965478', '3500.00', 6),
(4, '20147854712', '0.00', 4),
(5, '20147854721', '5000.00', 11),
(6, '20369852635', '1200.00', 9),
(7, '20147896320', '2300.00', 7),
(8, '20148965478', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `id` int(11) NOT NULL,
  `ruc` char(11) NOT NULL,
  `nro` varchar(45) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `comuna` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id`, `ruc`, `nro`, `calle`, `comuna`) VALUES
(1, '20879548741', '15', 'Lizardo Montero', 'Miraflores'),
(2, '20135879625', '12', 'San Carlos', 'Ate'),
(3, '20147852147', '2', 'Calle 2', 'La Molina'),
(4, '20147896587', '3', 'Croacia', 'El agustino'),
(5, '20145789365', '6', 'Río Tumbes', 'San Luis'),
(6, '20356478521', '3', 'Jirón Lopez de Ayala', 'San Borja'),
(7, '20356478521', '15', 'Jirón Domingo Martinez', 'Surquillo'),
(8, '20356478521', '7', 'Choquehuanca', 'San Isidro'),
(9, '20135879625', '20', 'Sol', 'Ate'),
(10, '20135879625', '14', 'Salamanca', 'San Isidro'),
(11, '20135879625', '270', 'Jirón Monte Abeto', 'Santiago de Surco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueno`
--

CREATE TABLE `dueno` (
  `id` int(11) NOT NULL,
  `ruc` char(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dueno`
--

INSERT INTO `dueno` (`id`, `ruc`, `nombre`, `apellido`) VALUES
(1, '20145789365', 'Antonio', 'Garcia'),
(2, '20147896587', 'Maria Dolores', 'Gonzales'),
(3, '20147852147', 'Pedro', 'Gomez'),
(4, '20135879625', 'Francisca', 'Fernandez'),
(5, '20879548741', 'Miguel', 'Jimenez'),
(6, '20698632145', 'Adrian', 'Pardo'),
(7, '20532147895', 'Rosa', 'Tebar'),
(8, '20365418720', 'Andrea', 'Arenas'),
(9, '20196354823', 'Alfonso', 'Nuñez'),
(12, '20356478521', 'María', 'Perez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `ruc` char(11) NOT NULL,
  `numero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id`, `ruc`, `numero`) VALUES
(1, '20147854712', '974882265'),
(2, '20365418720', '986352147'),
(3, '20365418720', '983652140'),
(4, '20365147895', '978563254'),
(5, '20369852635', '986325487');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrendatario`
--
ALTER TABLE `arrendatario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruc_UNIQUE` (`ruc`);

--
-- Indices de la tabla `arrienda`
--
ALTER TABLE `arrienda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Arrienda_casa_idx` (`casa_id`),
  ADD KEY `fk_Arrienda_Arrendatario_idx` (`ruc`);

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Casa_Dueño_idx` (`ruc`);

--
-- Indices de la tabla `dueno`
--
ALTER TABLE `dueno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruc_UNIQUE` (`ruc`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_UNIQUE` (`numero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arrendatario`
--
ALTER TABLE `arrendatario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `arrienda`
--
ALTER TABLE `arrienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `casa`
--
ALTER TABLE `casa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `dueno`
--
ALTER TABLE `dueno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arrienda`
--
ALTER TABLE `arrienda`
  ADD CONSTRAINT `fk_Arrienda_Dueno` FOREIGN KEY (`ruc`) REFERENCES `arrendatario` (`ruc`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Arrienda_casa` FOREIGN KEY (`casa_id`) REFERENCES `casa` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `fk_Casa_Dueno` FOREIGN KEY (`ruc`) REFERENCES `dueno` (`ruc`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
