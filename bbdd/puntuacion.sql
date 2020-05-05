-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2020 a las 14:39:30
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
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `usuario` varchar(25) NOT NULL,
  `pelicula` varchar(100) NOT NULL,
  `valor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puntuacion`
--

INSERT INTO `puntuacion` (`usuario`, `pelicula`, `valor`) VALUES
('', '', ''),
('', '', ''),
('', '', ''),
('Samuel ', 'Bloodshot ', '7'),
('1 ', 'Bloodshot ', '7'),
('Adolfo ', 'Bloodshot ', '8'),
('Adolfo ', 'Joker ', '5'),
('Adolfo ', 'Minecraft The Movie ', '6'),
('Adolfo ', 'Toy Story 4 ', '8'),
('Javier ', 'Bloodshot ', '9'),
('Javier ', 'Joker ', '6'),
('Javier ', 'Toy Story 4 ', '8'),
('Javier ', 'Minecraft The Movie ', '7'),
('pak ', 'Bloodshot ', '7'),
('pak ', 'Joker ', '8'),
('pak ', 'Toy Story 4 ', '9'),
('pak ', 'Minecraft The Movie ', '5'),
('Samuel ', 'Bad Boys 3 ', '7'),
('xorbo ', 'Bloodshot ', '8'),
('alonso ', 'Bloodshot ', '5'),
('alonso ', 'Bad Boys 3 ', '6'),
('ruben ', 'Bloodshot ', '7'),
('josema ', 'Bloodshot ', '7'),
('josema ', 'Joker ', '8'),
('josema ', 'Bad Boys 3 ', '7'),
('josema ', 'Minecraft The Movie ', '5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
