-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-02-2022 a las 17:15:23
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baloncesto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipos`
--

CREATE TABLE `Equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Equipos`
--

INSERT INTO `Equipos` (`id`, `nombre`) VALUES
(1, 'Girona'),
(3, 'Palafrugell'),
(5, 'Burgos'),
(6, 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Jugadores`
--

CREATE TABLE `Jugadores` (
  `id` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `edad` int(11) NOT NULL,
  `posicion` varchar(255) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Jugadores`
--

INSERT INTO `Jugadores` (`id`, `idEquipo`, `nombre`, `edad`, `posicion`, `puntos`) VALUES
(2, 1, 'Jordi Colom', 22, 'Centro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Partidos`
--

CREATE TABLE `Partidos` (
  `id` int(11) NOT NULL,
  `equipoLocal` int(11) NOT NULL,
  `equipoVisitante` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `puntosLocal` int(11) NOT NULL,
  `puntosVisitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Partidos`
--

INSERT INTO `Partidos` (`id`, `equipoLocal`, `equipoVisitante`, `fecha`, `puntosLocal`, `puntosVisitante`) VALUES
(1, 1, 3, '12/12/2021', 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  ADD PRIMARY KEY (`idEquipo`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `Partidos`
--
ALTER TABLE `Partidos`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `equipoLocal` (`equipoLocal`),
  ADD KEY `equipoVisitante` (`equipoVisitante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Partidos`
--
ALTER TABLE `Partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  ADD CONSTRAINT `equipo` FOREIGN KEY (`idEquipo`) REFERENCES `Equipos` (`id`);

--
-- Filtros para la tabla `Partidos`
--
ALTER TABLE `Partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipoLocal`) REFERENCES `Equipos` (`id`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipoVisitante`) REFERENCES `Equipos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
