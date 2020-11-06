-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2020 a las 09:14:09
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7


CREATE DATABASE IF NOT EXISTS accidentao CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accidentao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(200) NOT NULL,
  `equipo_afectado` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL,
  `observaciones` varchar(500) NOT NULL,
  `estado` enum('abierto','en espera','cerrado') DEFAULT NULL,
  `prioridad` enum('alta','media','baja','cerrada') NOT NULL DEFAULT 'media'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `fecha`, `lugar`, `equipo_afectado`, `descripcion`, `id_user`, `observaciones`, `estado`, `prioridad`) VALUES
(1, '2020-10-25', 'Aula 22', 'Proyector', 'Proyector parpadea. Cuando pulso el botón del mando para apagar, tarda varios segundos.', 1, 'El día anterior funcionaba', 'abierto', 'media'),
(7, '2020-10-07', 'dada', 'pàduwan', 'daiuhdwa', 1, 'odwiadj', 'abierto', 'media'),
(9, '2020-10-07', 'Dirección', 'PC principal', 'aa', 3, 'a', 'abierto', 'alta'),
(12, '2020-10-16', 'Aula 10', 'PC del profesor', 'Da pantallazo al iniciar Virtual Box', 1, 'Ayer funcionaba', 'cerrado', 'cerrada'),
(16, '0000-00-00', '', '', 'Descripción', 1, 'Observaciones', 'abierto', 'baja'),
(17, '0000-00-00', '', '', 'Descripción', 1, 'Observaciones', 'abierto', 'media'),
(21, '2020-11-04', 'dadaw', 'wadasad', 'Descripción', 10, 'Observaciones', 'cerrado', 'cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'admin'),
(2, 'normal'),
(3, 'inutil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre`, `correo`, `passwd`, `rol`) VALUES
(1, 'ruben', 'rubenroldan149@hotmail.com', 'ruben', 1),
(3, 'ruben2', 'rubenrolcanyt@gmail.com', 'ruben2', 2),
(10, 'carmen', 'carmen', 'carmen', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
