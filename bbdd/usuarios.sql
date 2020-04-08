-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2020 a las 21:51:46
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
('antonio', 'antonio', 'antonio@gmail.com', 'ROL_EMP', 1, 2),
('benja', 'benja', 'benja@gmail.com', 'ROL_EMP', 1, 1),
('e1', 'e1', 'e1@gmail.com', 'ROL_EMP', 1, 4),
('e4', 'e4', 'e4@gmail.com', 'ROL_EMP', 1, 5),
('ester', 'ester', 'ester@gmail.com', 'ROL_USER', 1, -1),
('f', 'f', 'pogotib01@gmail.com', 'ROL_USER', 1, -1),
('fer', 'fer', 'pogotib01@gmail.com', 'ROL_ADMIN', 1, -1),
('tonin', 'tonin', 'tonin@gmail.com', 'ROL_EMP', 1, 3),
('ximo', 'ximo', 'ximo@gmail.com', 'ROL_USER', 1, -1);

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
