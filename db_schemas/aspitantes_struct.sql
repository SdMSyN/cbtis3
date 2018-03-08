-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2016 a las 19:52:39
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cbtis3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspitantes`
--

CREATE TABLE IF NOT EXISTS `aspitantes` (
  `Id` int(11) NOT NULL,
  `No` int(7) NOT NULL,
  `Plantel` varchar(30) NOT NULL,
  `Cct` varchar(15) NOT NULL,
  `Ficha` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ap` varchar(50) NOT NULL,
  `am` varchar(50) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `estado_radicacion` varchar(30) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `municipio_radicacion` varchar(50) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `localidad_radicacion` varchar(50) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `cp` int(5) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `tutor_nombre` varchar(200) NOT NULL,
  `tutor_curp` varchar(18) NOT NULL,
  `tutor_grado_estudios` varchar(30) NOT NULL,
  `tutor_ocupacion` varchar(50) NOT NULL,
  `escuela_procedencia` varchar(50) NOT NULL,
  `cct_escuela_procecedencia` varchar(20) NOT NULL,
  `ciclo_escolar_egreso` varchar(20) NOT NULL,
  `estado_escuela_procedencia` varchar(30) NOT NULL,
  `municipio_escuela_procedencia` varchar(50) NOT NULL,
  `tipo_escuela` varchar(30) NOT NULL,
  `especialidad_1` varchar(25) NOT NULL,
  `especialidad_2` varchar(25) NOT NULL,
  `especialidad_3` varchar(25) NOT NULL,
  `especialidad_4` varchar(25) NOT NULL,
  `especialidad_5` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aspitantes`
--
ALTER TABLE `aspitantes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aspitantes`
--
ALTER TABLE `aspitantes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
