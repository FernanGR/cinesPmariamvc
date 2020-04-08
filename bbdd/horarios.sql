-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2020 a las 21:51:26
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
-- Base de datos: `cinespmaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `horario` int(5) NOT NULL,
  `lunes` varchar(15) NOT NULL DEFAULT 'Libre',
  `martes` varchar(15) NOT NULL DEFAULT 'Libre',
  `miercoles` varchar(15) NOT NULL DEFAULT 'Libre',
  `jueves` varchar(15) NOT NULL DEFAULT 'Libre',
  `viernes` varchar(15) NOT NULL DEFAULT 'Libre',
  `sabado` varchar(15) NOT NULL DEFAULT 'Libre',
  `domingo` varchar(15) NOT NULL DEFAULT 'Libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`horario`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) VALUES
(5, 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre'),
(1, 'Libre', 'Puerta', 'Libre', 'Bar', 'Libre', 'Libre', 'Libre'),
(2, 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre'),
(3, 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre'),
(4, 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre', 'Libre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
