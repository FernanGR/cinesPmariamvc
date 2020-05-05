-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2020 a las 14:45:40
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ROL` varchar(20) NOT NULL DEFAULT 'ROL_USER',
  `activo` int(5) NOT NULL DEFAULT 1,
  `horario` int(5) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`, `email`, `ROL`, `activo`, `horario`) VALUES
('1', '1', '11@gmail.com', 'ROL_USER', 0, -1),
('Adolfo', 'adolfo', 'ad@gmail.com', 'ROL_USER', 1, -1),
('alfredo', 'alfredo', 'antoni@gmail.com', 'ROL_USER', 0, 0),
('alonso', 'alonso', '12@gmail.com', 'ROL_USER', 1, -1),
('Antonio', 'antonio', 'antoni@gmail.com', 'ROL_EMP', 1, 2),
('Benja', 'benja', 'benja@gmail.com', 'ROL_EMP', 1, 1),
('Fer', 'fer', 'cinespmaria@gmail.com', 'ROL_ADMIN', 1, -1),
('Fran', 'fran', 'fran@gmail.com', 'ROL_EMP', 1, 8),
('Javi', 'javi', 'javi@gmail.com', 'ROL_EMP', 1, 7),
('Javier', 'javier', '11@gmail.com', 'ROL_USER', 0, 0),
('jose', 'jose', '2@gmail.com', 'ROL_USER', 0, 0),
('josema', 'josema', 'jose@gmail.com', 'ROL_USER', 1, -1),
('Juan', 'juan', 'juan@gmail.com', 'ROL_EMP', 1, 4),
('pak', 'pak', 'p@gmail.com', 'ROL_USER', 1, -1),
('Raquel', 'raquel', 'w@gmail.com', 'ROL_USER', 0, -1),
('ruben', 'ruben', '12@gmail.com', 'ROL_USER', 1, -1),
('Samuel', 'samuel', 'swww@gmail.com', 'ROL_USER', 1, -1),
('Spawn', 'spawn', 'spawn@gmail.com', 'ROL_EMP', 1, 6),
('Tonin', 'tonin', 'pogotib02@gmail.com', 'ROL_EMP', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
