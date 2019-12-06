-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2019 a las 16:45:53
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
-- Estructura de tabla para la tabla `victims`
--

DROP TABLE IF EXISTS `victims`;
CREATE TABLE `victims` (
  `id` int(10) UNSIGNED NOT NULL,
  `victima_nombre_y_apellido` varchar(255) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  `victima_fecha_nacimiento` varchar(50) DEFAULT NULL,
  `victima_edad` int(20) DEFAULT NULL,
  `franjaetaria` int(11) DEFAULT NULL,
  `tienedoc` varchar(11) DEFAULT NULL,
  `tipodocumento` varchar(11) DEFAULT NULL,
  `tipo_documento_otro` varchar(255) DEFAULT NULL,
  `residenciaprecaria` int(11) DEFAULT NULL,
  `victima_numero_documento` varchar(20) DEFAULT NULL,
  `niveleducativo` int(11) DEFAULT NULL,
  `condiciones_de_trabajo` int(11) NOT NULL,
  `necesidades_socioeconomicas_insatisfechas` int(11) DEFAULT NULL,
  `necesidades_socioeconomicas_insatisfechas_otro` varchar(255) DEFAULT NULL,
  `programa_subsidio` int(11) DEFAULT NULL,
  `programa_subsidio_otro` varchar(255) DEFAULT NULL,
  `embarazorelevamiento` int(11) DEFAULT NULL,
  `tiene_discapacidad` int(11) DEFAULT NULL,
  `tienelesion` int(11) DEFAULT NULL,
  `tipo_lesion` varchar(255) DEFAULT NULL,
  `enfermedadcronica` int(11) DEFAULT NULL,
  `tipo_enfermedad_cronica` varchar(255) DEFAULT NULL,
  `tiene_limitacion` int(11) DEFAULT NULL,
  `limitacion_otro` varchar(255) DEFAULT NULL,
  `persona_asistida` int(11) DEFAULT NULL,
  `otras_personas_asistidas` int(11) DEFAULT NULL,
  `idCaso` int(11) DEFAULT NULL,
  `userID_create` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `userID_modify` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `telefono_victima` varchar(30) NOT NULL,
  `otro_telefono_victima` varchar(30) NOT NULL,
  `domicilio_victima_asistida` varchar(30) NOT NULL,
  `localidad_hecho` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `victims`
--
ALTER TABLE `victims`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `victims`
--
ALTER TABLE `victims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
