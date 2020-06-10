-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2020 a las 23:10:24
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3
DROP DATABASE IF EXISTS cinespmaria;
CREATE DATABASE IF NOT EXISTS cinespmaria
CHARACTER SET = 'UTF8'
COLLATE = 'utf8_spanish_ci';

USE cinespmaria;


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
(1, 'Taquilla', 'Taquilla', 'Bar', 'Bar', 'Libre', 'Libre', 'Libre'),
(2, 'Libre', 'Bar', 'Puerta', 'Refuerzo', 'Puerta', 'Bar', 'Puerta'),
(3, 'Bar', 'Refuerzo', 'Puerta', 'Libre', 'Puerta', 'Puerta', 'Refuerzo'),
(4, 'Libre', 'Libre', 'Libre', 'Bar', 'Bar', 'Bar', 'Taquilla'),
(6, 'Puerta', 'Puerta', 'Refuerzo', 'Taquilla', 'Libre', 'Libre', 'Libre'),
(7, 'Puerta', 'Libre', 'Libre', 'Puerta', 'Puerta', 'Bar', 'Bar'),
(8, 'Libre', 'Libre', 'Puerta', 'Puerta', 'Puerta', 'Refuerzo', 'Bar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `sala` int(5) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`sala`, `ruta`) VALUES
(1, '../imgPeliculas/bloodshot.jpg'),
(2, '../imgPeliculas/joker.jpg'),
(3, '../imgPeliculas/avespresa.jpg'),
(4, '../imgPeliculas/badboys3.jpg'),
(5, '../imgPeliculas/toystory4.jpg'),
(6, '../imgPeliculas/minecraft.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `sala` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `sesion` varchar(15) NOT NULL,
  `disponibilidad` varchar(200) NOT NULL DEFAULT '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111',
  `dia` varchar(10) DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL,
  `trailer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`sala`, `nombre`, `sesion`, `disponibilidad`, `dia`, `descripcion`, `trailer`) VALUES
(1, 'Bloodshot', '18:00', '11111011111100111111111111111111111111111111111011111111111111111111101111011111111101111111111111111111111111111111111111111111111111111111111111110111111111111111111110111011011111111111111111111111', 'Lunes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Lunes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(1, 'Bloodshot', '18:00', '11111111111111111111111111111111111111111111111011111111111111111111111001111111111111100111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '11111111111111111111111111111011111111111111100011111111111111111111111100111111111111110000111111111111111111111111111111111001110001111111111110011100111111111111111110001111111111111111111111111111', 'Martes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '11111111111111111111111111111111111111111111111111111111111111110111100111111111111111100111111111111111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '1100111111111111111111001111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1111111111110111111111111111111111111111111011111111111111111111111111111111111111111111111111111111', 'Martes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '1111111111111111111111110111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '1111111111111011111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Martes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(1, 'Bloodshot', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111011111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1111111111111111011111111111111111011111111111111111101111111111111111111111111111111111111111111111', 'Miercoles', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1111111111111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111', 'Miercoles', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '1111111111111111111111111111111100111111111110111111111111111111111111111111111111111111111111011111', 'Miercoles', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Miercoles', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(1, 'Bloodshot', '18:00', '11111111111111111111111111011110111111111111111110100111111111111111101101111111111111111111111111111111111111111111111111111111111110111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '1111111111111111111111111111111111001111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1111111111110111111111111111111111111111111111111111101111111111111111111111111111111111111111111111', 'Jueves', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '1111111011111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '1111111111111111011111111111111111011111111110111111110011111111111111111111111111111111111111111111', 'Jueves', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Jueves', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(1, 'Bloodshot', '18:00', '00000000111110001111111011111111111111111111111111111111111111111111111111111111111111111111111111111111111011011101111111111111111111111111111110111111111111111111111111111111111111111111111111111111', 'Viernes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111011111111111111111111111111111111111111111111111111', 'Viernes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111100111111111111111111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '00000011111111111111111111111111111111111111111111111111111111111111110111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '00001111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '11111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '0101110111111101111111111101110111001011011111111101101101101111111111011111111111111011110111111111', 'Viernes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '0000000111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1110111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '0111110111111111111111111111111111110011111111011111111111111111111111111111111111111111111111111111', 'Viernes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '1111111111111110111111111111111111001111111110101111110111111111111111111111111111111111111111111111', 'Viernes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1111111111111111111111111011111110111111111111111111111011111111111111111111111111111111111111111111', 'Viernes', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '1111111111111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111111111111111101101111011011111111110111111001111111111111111111111111111111111111111111111', 'Viernes', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Viernes', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(1, 'Bloodshot', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '00001111111111111111111111111111111111111111111111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111101111111111111111111110111111111111111111111111111111111111111111111111111', 'Sabado', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '00000000111111111111111111111011111111111111101110011110111111111111111111111111111111111111111111111111111111011111111111111100111111111111111111111111111111111111111111111111111111111111111111111110', 'Sabado', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '00011111111111111111111111111011111111111111100011111111111111111111111111111111111111111111111111111111111110111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '1111111111111110111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '1111111111111111111111011011111111111111111111111111110001111101111011111111111111111111111111111111', 'Sabado', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1111111111111111111111111011110111000111111110011111111111111111111111111111111111111111111111111111', 'Sabado', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '1111111111111011111111110111111111111111111111111111111111111111110111111111111111111111111111111111', 'Sabado', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '1111111111111101111110111111111111111111111110111111111111111111111111111111111111111111111111111111', 'Sabado', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1011111111111011111111101111111011111111111111111111111011111111111111111111111111111111111111111111', 'Sabado', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '1111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111111111111', 'Sabado', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '0011111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111111111111111111111011111111111111111111110111111111111111101111101111111111111111111111111', 'Sabado', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA');
INSERT INTO `peliculas` (`sala`, `nombre`, `sesion`, `disponibilidad`, `dia`, `descripcion`, `trailer`) VALUES
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Sabado', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111111111111111111111111111111111101111111111111111111111111111111111111111111111', 'Sabado', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(1, 'Bloodshot', '18:00', '11111111111111111111111110111111011111111110110110111111111111111111111111101111111111111111101111111111111100111111111111111111111111111111111110011111111111111111111111111111111111111111111111111111', 'Domingo', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '20:30', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(1, 'Bloodshot', '23:00', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Ray Garrison (Vin Diesel), también conocido como Bloodshot, es resucitado por la compañía Rising Spirit Technologies a través del uso de nanotecnología. ', 'https://www.youtube.com/watch?v=zOeEPSR2OSM'),
(2, 'Joker', '18:00', '11111111111111111111111111111111111011111111111111111111111101111111111111111111111110111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '20:30', '00111111111111111111111111111111111111111111111110111111111111111110101111111111111110111111111111111111111101110111111111110111111111111111111111011111111111111111111111111111111111111111111111111111', 'Domingo', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(2, 'Joker', '23:00', '01111101111111111111111101111001111111111111011111111111111111111011101111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111110111111111110', 'Domingo', 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora. ', 'https://www.youtube.com/watch?v=EIyZqNbZQI8'),
(3, 'Aves de presa', '18:00', '1111111111111111111111111111111111101111110111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '20:30', '1111111111111111111111011111010111001110111110111111111111111100011111111111111111111111111111111111', 'Domingo', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(3, 'Aves de presa', '23:00', '1101111111101110111111111111111111111111110111111111111111111111011111111111111111111111111111111111', 'Domingo', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra. ', 'https://www.youtube.com/watch?v=W_QkWlijBlM'),
(4, 'Bad Boys 3', '18:00', '1111111111111111111111111111111111111111111111111111011111111111111111111111011111111111101111111111', 'Domingo', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '20:30', '0111111111111111111111101111111111011111111011111111111111011111111111111111111111111111111111111110', 'Domingo', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(4, 'Bad Boys 3', '23:00', '1111111111111111111111111111111111111111111001111111111111111111111111111111111111111111111111111111', 'Domingo', 'En esta tercera entrega de la franquicia, los polícía Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) vuelven a patrullar juntos en un último viaje.  ', 'https://www.youtube.com/watch?v=MjgBkC1y97w'),
(5, 'Toy Story 4', '18:00', '0111111111111111111111101111110111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(5, 'Toy Story 4', '23:00', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'Woody siempre ha tenido claro cuál es su labor en el mundo y su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Pero cuando Bonnie añade a Forky, un nuevo juguete de fabricación propia, a su habitación, arranca una nueva aventura que servirá para que los viejos y nuevos amigos le enseñen a Woody lo grande que puede ser el mundo para un juguete.', 'https://www.youtube.com/watch?v=f33yJZ5uOpU'),
(6, 'Minecraft The Movie', '18:00', '1111111111111111110111101111110111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '20:30', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'Domingo', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA'),
(6, 'Minecraft The Movie', '23:00', '1111111111111111111111101111111100111111111101111111100111111111111111111111111111111111111111111111', 'Domingo', 'El malévolo Ender Dragon emprende un camino de destrucción, lo que lleva a una joven y a su grupo de aventureros poco probables a salir para salvar el Overworld.', 'https://www.youtube.com/watch?v=MmB9b5njVbA');

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
('xorbo ', 'Bloodshot ', '8'),
('alonso ', 'Bloodshot ', '5'),
('ruben ', 'Bloodshot ', '7'),
('josema ', 'Bloodshot ', '7'),
('josema ', 'Joker ', '8'),
('josema ', 'Minecraft The Movie ', '5'),
('alex ', 'Bloodshot ', '6'),
('alex ', 'Joker ', '9'),
('sara ', 'Joker ', '7'),
('jony ', 'Bloodshot ', '6');

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
('Adolfo', 'adolfo', 'pogotib02@gmail.com', 'ROL_USER', 0, 0),
('alex', 'alex', 'tibofgr@gmail.com', 'ROL_USER', 0, 0),
('alfredo', 'alfredo', 'fernangarciarubio@gmail.com', 'ROL_USER', 0, 0),
('alonso', 'alonso', '12@gmail.com', 'ROL_USER', 1, -1),
('Antonio', 'antonio', 'antoni@gmail.com', 'ROL_EMP', 1, 2),
('Benja', 'benja', 'benja@gmail.com', 'ROL_EMP', 1, 1),
('Fer', 'fer', 'cinespmaria@gmail.com', 'ROL_ADMIN', 1, -1),
('Fran', 'fran', 'fran@gmail.com', 'ROL_EMP', 1, 8),
('Javi', 'javi', 'tibofgr@gmail.com', 'ROL_EMP', 1, 7),
('Javier', 'javier', '11@gmail.com', 'ROL_USER', 0, 0),
('jony', 'jony', 'jony@gmail.com', 'ROL_USER', 1, -1),
('jose', 'jose', '2@gmail.com', 'ROL_USER', 0, 0),
('josema', 'josema', 'jose@gmail.com', 'ROL_USER', 1, -1),
('Juan', 'juan', 'juan@gmail.com', 'ROL_EMP', 1, 4),
('pak', 'pak', 'p@gmail.com', 'ROL_USER', 1, -1),
('Raquel', 'raquel', 'w@gmail.com', 'ROL_USER', 0, -1),
('ruben', 'ruben', '12@gmail.com', 'ROL_USER', 1, -1),
('Samuel', 'samuel', 'swww@gmail.com', 'ROL_USER', 1, -1),
('sara', 'sara', 'sara@gmail.com', 'ROL_USER', 1, -1),
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
