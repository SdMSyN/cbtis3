-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2015 a las 22:34:56
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `imagenes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
`id` int(10) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `ruta` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `email`, `edad`, `ruta`) VALUES
(33, 'Hugui Dugui', 'ringhugos@gmail.com', 28, 'imagenes/IMG_20140224_170731.jpg'),
(34, 'Arales', 'arales@hotmail.com', 27, 'imagenes/fulanita.png'),
(35, 'demian', 'demian@gmail.com', 33, 'imagenes/kity.jpg'),
(36, 'Albertano', 'albertano@gmail.com', 33, 'imagenes/mmmm.png'),
(37, 'Clara', 'clara@recsite.com', 27, 'imagenes/mate.jpg'),
(38, 'Gustavon', 'gustraguio@gmail.com', 15, 'imagenes/buenas.jpg'),
(39, 'Gustraguoo', 'gustraguo@gmail.com', 18, 'imagenes/IMG_271112_0005.jpg'),
(40, 'Alfagris', 'alfagris@gmail.com', 33, 'imagenes/imagen.jpg'),
(41, 'danvega', 'danvega@hotmail.com', 44, 'imagenes/robben.jpg'),
(42, 'rickirick', 'ricki@gmail.com', 33, 'imagenes/homero.jpg'),
(43, 'gggg', 'gggg@gmail.com', 35, 'imagenes/talvez.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
