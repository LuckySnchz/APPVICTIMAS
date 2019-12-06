-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2019 a las 16:48:33
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `victimas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_persona_asistida` varchar(255) DEFAULT NULL,
  `vinculo_victima` int(11) DEFAULT NULL,
  `vinculo_otro` varchar(255) DEFAULT NULL,
  `telefono_persona_asistida` varchar(255) DEFAULT NULL,
  `domicilio_persona_asistida` varchar(255) DEFAULT NULL,
  `localidad_persona_asistida` varchar(255) DEFAULT NULL,
  `idCaso` int(11) DEFAULT NULL,
  `idVictim` int(11) DEFAULT NULL,
  `userID_create` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `userID_modify` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `vinculo_otro_familiar` varchar(30) NOT NULL,
  `otro_telefono_persona_asistida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
