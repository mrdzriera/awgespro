-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-10-2017 a las 15:49:23
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `awgespro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anios`
--

CREATE TABLE `anios` (
  `id` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anios`
--

INSERT INTO `anios` (`id`, `periodo`, `estado`) VALUES
(1, 2013, 'Deshabilitado'),
(2, 2014, 'Deshabilitado'),
(3, 2015, 'Deshabilitado'),
(4, 2016, 'Habilitado'),
(5, 2017, 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite_tecnico`
--

CREATE TABLE `comite_tecnico` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `cont_proy_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comite_tecnico`
--

INSERT INTO `comite_tecnico` (`id`, `id_profesor`, `id_anio`, `cont_proy_com`) VALUES
(1, 1, 5, 0),
(2, 2, 5, 0),
(3, 3, 5, 0),
(4, 4, 5, 0),
(5, 5, 5, 0),
(6, 6, 5, 0),
(7, 7, 5, 0),
(8, 8, 5, 0),
(9, 9, 5, 0),
(10, 10, 5, 0),
(11, 11, 5, 0),
(12, 12, 5, 0),
(13, 13, 5, 0),
(14, 14, 5, 0),
(15, 15, 5, 0),
(16, 16, 5, 0),
(17, 17, 5, 0),
(18, 18, 5, 0),
(19, 19, 5, 0),
(20, 20, 5, 0),
(21, 21, 5, 0),
(22, 22, 5, 0),
(23, 23, 5, 0),
(24, 24, 5, 0),
(25, 25, 5, 0),
(26, 26, 5, 0),
(27, 27, 5, 0),
(28, 28, 5, 0),
(29, 29, 5, 0),
(30, 30, 5, 0),
(31, 31, 5, 0),
(32, 32, 5, 0),
(33, 33, 5, 0),
(34, 34, 5, 0),
(35, 35, 5, 0),
(36, 36, 5, 0),
(37, 37, 5, 0),
(38, 38, 5, 0),
(39, 39, 5, 0),
(40, 40, 5, 0),
(41, 41, 5, 0),
(42, 42, 5, 0),
(43, 43, 5, 0),
(44, 44, 5, 0),
(45, 45, 5, 0),
(46, 46, 5, 0),
(47, 48, 5, 0),
(48, 49, 5, 0),
(49, 50, 5, 0),
(50, 51, 5, 0),
(51, 52, 5, 0),
(52, 53, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE `comunidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `parroquia` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`id`, `nombre`, `estado`, `municipio`, `parroquia`, `sector`) VALUES
(1, 'UPT Aragua', 'Aragua', 'Jose Felix Ribas', 'La Victoria', 'Centro'),
(2, 'Cacique Charaima', 'Aragua', 'Jose Felix Ribas', 'Maracay', 'centro'),
(3, 'U E N \"ALIDA PEREZ MATOS\"', 'Aragua', 'Jose Rafael Revenga', 'El Consejo', 'Santo Domingo'),
(4, 'Sistema de Orquesta y Coros Juveniles e Infantiles ', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Ríos', 'Casco Central'),
(5, 'Comercializadora Hefziba C.A', 'Aragua', 'Girardot', 'Santa Rita', 'Centro'),
(6, 'CICLOTECNIC 4J C.A ', 'Aragua', 'Bolivar', 'San Mateo', 'Centro'),
(7, 'New Century 2010 C.A', 'Aragua', 'Girardot', 'Madre María de san José', 'Centro'),
(8, 'Autocerrajería La Gran Colombia', 'Aragua', 'Girardot', 'Madre María de san José', 'La Barraca'),
(9, 'Auto Repuestos B&G II C.A', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'Centro'),
(10, 'Instituto Regional del Deporte en Aragua', 'Aragua', 'Girardot', 'Maracay', 'La Democracia'),
(11, 'DNS Consultores, C.A', 'Aragua', 'Jose Felix Ribas', 'La Victoria', 'Centro'),
(12, 'Gimnasio \"Champion Gym\"', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'La Mora'),
(13, 'ADÓNICA C.A', 'Aragua', 'Girardot', 'San Vicente', 'Zona Industrial II'),
(14, 'Unidad Educativa Nacional La Victoria', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'Las Mercedes'),
(15, 'Inversiones Lapincagua C.A.', 'Aragua', 'Sucre', 'Cagua', 'Casco Central'),
(16, 'Centro de Educación Inicial \"Las Américas\". ', 'Aragua', 'Jose Rafael Revenga', 'El Consejo', 'Sabaneta'),
(17, 'Unidad Educativa Privada \"Mis Sagrados Principios\"', 'Aragua', 'Francisco Linares Alcantara', 'Santa Rita', 'Santa Rita'),
(18, 'U.E.N.B \"Ciudad Jardín\"', 'Aragua', 'Sucre', 'Cagua', 'Ciudad Jardn'),
(19, 'Unidad Educativa Nacional \"Víctor Ángel Hernández\"', 'Aragua', 'Santiago Mariño', 'Turmero', 'La Montana'),
(20, 'Centro Educativo Inicial Privado \"José Roque Pinto\"', 'Aragua', 'Jose Felix Ribas', 'La Victoria', 'Centro'),
(21, 'Cristalería Imperial Glass C.A', 'Aragua', 'Jose Felix Ribas', 'La Victoria', 'Centro'),
(22, 'Unidad Educativa Estatal \"Luisa Cáceres de Arismendi\"', 'Aragua', 'Jose Rafael Revenga', 'El Consejo', 'Trapiche del Medio'),
(23, 'Grupo Migo, C.A', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'El Avion'),
(24, 'SERGECA ', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'La Mora II'),
(25, 'Concesionarios Chevrolet', 'Aragua', 'Jose Felix Ribas', 'La Victoria', 'Centro'),
(26, 'Alcaldía  del Municipio Carrizal', 'Aragua', 'Carrizal', 'Carrizal', 'Centro'),
(27, 'Inversiones Valent S.A.', 'Aragua', 'Mariño', 'Mariño', 'Turmero'),
(28, 'Consorcio de Ingenieros \"CONINCA\"', 'Aragua', 'Caño Rico', 'Magdaleno', 'Santa Lucia'),
(29, 'Victoria DPL', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'Vista Hermosa'),
(30, 'Centro Medico Ocupacional Victoria C.A.', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'Casco Central'),
(31, 'M-Auto Servicios Industriales C.A', 'Aragua', 'Sucre', 'Bella', 'Corinsa'),
(32, 'J&L Connections C.A', 'Aragua', 'Jose Felix Ribas', 'Jose Felix Ribas', 'Portachuelo'),
(33, 'Consultorio Ortodonsista Nueva Sonrisa', 'Aragua', 'Jose Felix Ribas', 'Jose Felix Ribas', 'Centro'),
(34, 'UPT Aragua', 'Aragua', 'Jose Felix Ribas', 'Castor Nieves Rios', 'Av Universidad'),
(35, 'Consejo Comunal \"Prados de Palla II\"', 'Aragua', 'Santiago   Mariño', 'Pedro Arévalo Aponte', 'Prados de Paya II'),
(36, 'Restaurant y Sport Bar Serfadi C.A.', 'Aragua', 'Girardot', 'Maracay', 'Centro'),
(37, 'Inversiones Ol New Servi C.A', 'Aragua', 'Girardot', 'Maracay', 'Centro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_tiene_proy`
--

CREATE TABLE `com_tiene_proy` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_comunidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `com_tiene_proy`
--

INSERT INTO `com_tiene_proy` (`id`, `id_proyecto`, `id_comunidad`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 0),
(4, 4, 3),
(5, 5, 4),
(6, 6, 0),
(7, 7, 5),
(8, 8, 6),
(9, 9, 7),
(10, 10, 8),
(11, 11, 9),
(12, 12, 10),
(13, 13, 11),
(14, 14, 12),
(15, 15, 0),
(16, 16, 13),
(17, 17, 14),
(18, 18, 15),
(19, 19, 16),
(20, 20, 17),
(21, 21, 18),
(22, 22, 19),
(23, 23, 20),
(24, 24, 21),
(25, 25, 22),
(26, 26, 23),
(27, 27, 24),
(28, 28, 25),
(29, 29, 26),
(30, 30, 27),
(31, 31, 28),
(32, 32, 29),
(33, 33, 30),
(34, 34, 31),
(35, 35, 32),
(36, 36, 33),
(37, 37, 34),
(38, 38, 35),
(39, 39, 36),
(40, 40, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_tiene_resp`
--

CREATE TABLE `com_tiene_resp` (
  `id` int(11) NOT NULL,
  `id_comunidad` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `com_tiene_resp`
--

INSERT INTO `com_tiene_resp` (`id`, `id_comunidad`, `id_responsable`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 0, 3),
(4, 3, 4),
(5, 4, 5),
(6, 0, 6),
(7, 5, 7),
(8, 6, 8),
(9, 7, 9),
(10, 8, 10),
(11, 9, 11),
(12, 10, 12),
(13, 11, 13),
(14, 12, 14),
(15, 0, 15),
(16, 13, 16),
(17, 14, 17),
(18, 15, 18),
(19, 16, 19),
(20, 17, 20),
(21, 18, 21),
(22, 19, 22),
(23, 20, 23),
(24, 21, 24),
(25, 22, 25),
(26, 23, 26),
(27, 24, 27),
(28, 25, 28),
(29, 26, 29),
(30, 27, 30),
(31, 28, 31),
(32, 29, 32),
(33, 30, 33),
(34, 31, 34),
(35, 32, 35),
(36, 33, 36),
(37, 34, 37),
(38, 35, 38),
(39, 36, 39),
(40, 37, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores_pnf`
--

CREATE TABLE `coordinadores_pnf` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_pnf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador_trayecto`
--

CREATE TABLE `coordinador_trayecto` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_pnf` int(11) NOT NULL,
  `id_trayecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coordinador_trayecto`
--

INSERT INTO `coordinador_trayecto` (`id`, `id_profesor`, `id_pnf`, `id_trayecto`) VALUES
(14, 23, 2, 2),
(15, 20, 2, 4),
(16, 13, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coord_tiene_proy`
--

CREATE TABLE `coord_tiene_proy` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coord_tiene_proy`
--

INSERT INTO `coord_tiene_proy` (`id`, `id_proyecto`, `id_profesor`) VALUES
(3, 1, 20),
(4, 2, 20),
(5, 3, 20),
(6, 4, 8),
(7, 5, 8),
(8, 6, 36),
(9, 7, 33),
(10, 8, 33),
(11, 9, 33),
(12, 10, 33),
(13, 11, 11),
(14, 12, 11),
(15, 13, 11),
(16, 14, 11),
(17, 15, 11),
(18, 16, 11),
(19, 17, 11),
(20, 18, 21),
(21, 19, 21),
(22, 20, 21),
(23, 21, 21),
(24, 22, 21),
(25, 23, 21),
(26, 24, 21),
(27, 25, 21),
(28, 26, 21),
(29, 27, 21),
(30, 28, 17),
(31, 29, 21),
(32, 30, 21),
(33, 31, 20),
(34, 32, 20),
(35, 33, 20),
(36, 34, 20),
(37, 35, 20),
(38, 36, 20),
(39, 37, 20),
(40, 38, 20),
(41, 39, 20),
(42, 40, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `culminacion_proyecto`
--

CREATE TABLE `culminacion_proyecto` (
  `id` int(11) NOT NULL,
  `aprobacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `culminacion_proyecto`
--

INSERT INTO `culminacion_proyecto` (`id`, `aprobacion`) VALUES
(3, 'Culminado'),
(4, 'No culminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `defensas`
--

CREATE TABLE `defensas` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(40) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `defensas`
--

INSERT INTO `defensas` (`id`, `id_proyecto`, `fecha`, `hora_entrada`, `lugar`, `modulo`) VALUES
(1, 1, '2017-03-01', '01:00:00', 'B4', 1),
(2, 1, '2017-05-03', '09:00:00', 'B4', 2),
(3, 1, '2017-05-03', '09:00:00', 'B4', 3),
(4, 2, '2016-03-26', '09:00:00', 'B4', 1),
(5, 2, '2016-06-26', '09:00:00', 'B4', 2),
(6, 2, '2016-11-26', '09:00:00', 'B4', 3),
(7, 3, '2016-03-26', '09:00:00', 'B4', 1),
(8, 3, '2016-06-26', '09:00:00', 'B4', 2),
(9, 3, '2016-11-26', '09:00:00', 'B4', 3),
(10, 4, '2016-03-26', '09:00:00', 'B4', 1),
(11, 4, '2016-06-26', '09:00:00', 'B4', 2),
(12, 4, '2016-11-26', '09:00:00', 'B4', 3),
(13, 5, '2016-03-26', '09:00:00', 'B4', 1),
(14, 5, '2016-06-26', '09:00:00', 'B4', 2),
(15, 5, '2016-11-26', '09:00:00', 'B4', 3),
(16, 6, '0000-00-00', '00:00:00', '', 1),
(17, 6, '0000-00-00', '00:00:00', '', 2),
(18, 6, '0000-00-00', '00:00:00', '', 3),
(19, 7, '2016-03-26', '09:00:00', 'B4', 1),
(20, 7, '2016-06-26', '09:00:00', 'B4', 2),
(21, 7, '2016-11-26', '09:00:00', 'B4', 3),
(22, 8, '2016-03-26', '09:00:00', 'B4', 1),
(23, 8, '2016-06-26', '09:00:00', 'B4', 2),
(24, 8, '2016-11-26', '09:00:00', 'B4', 3),
(25, 9, '2016-03-26', '09:00:00', 'B4', 1),
(26, 9, '2016-06-26', '09:00:00', 'B4', 2),
(27, 9, '2016-11-26', '09:00:00', 'B4', 3),
(28, 10, '2016-03-26', '09:00:00', 'B4', 1),
(29, 10, '2016-06-26', '09:00:00', 'B4', 2),
(30, 10, '2016-11-26', '09:00:00', 'B4', 3),
(31, 11, '2016-03-26', '09:00:00', 'B4', 1),
(32, 11, '2016-06-26', '09:00:00', 'B4', 2),
(33, 11, '2016-11-26', '09:00:00', 'B4', 3),
(34, 12, '2016-03-26', '09:00:00', 'B4', 1),
(35, 12, '2016-06-26', '09:00:00', 'B4', 2),
(36, 12, '2016-11-26', '09:00:00', 'B4', 3),
(37, 13, '2016-03-26', '09:00:00', 'B4', 1),
(38, 13, '2016-06-26', '09:00:00', 'B4', 2),
(39, 13, '2016-11-26', '09:00:00', 'B4', 3),
(40, 14, '2016-03-26', '09:00:00', 'B4', 1),
(41, 14, '2016-06-26', '09:00:00', 'B4', 2),
(42, 14, '2016-11-26', '09:00:00', 'B4', 3),
(43, 15, '2016-03-26', '09:00:00', 'B4', 1),
(44, 15, '2016-06-26', '09:00:00', 'B4', 2),
(45, 15, '2016-11-26', '09:00:00', 'B4', 3),
(46, 16, '2016-03-26', '09:00:00', 'B4', 1),
(47, 16, '2016-06-26', '09:00:00', 'B4', 2),
(48, 16, '2016-11-26', '09:00:00', 'B4', 3),
(49, 17, '2016-03-26', '09:00:00', 'B4', 1),
(50, 17, '2016-06-26', '09:00:00', 'B4', 2),
(51, 17, '2016-11-26', '09:00:00', 'B4', 3),
(52, 18, '2016-03-26', '09:00:00', 'B4', 1),
(53, 18, '2016-06-26', '09:00:00', 'B4', 2),
(54, 18, '2016-11-26', '09:00:00', 'B4', 3),
(55, 19, '2016-03-26', '09:00:00', 'B4', 1),
(56, 19, '2016-06-26', '09:00:00', 'B4', 2),
(57, 19, '2016-11-26', '09:00:00', 'B4', 3),
(58, 20, '2016-03-26', '09:00:00', 'B4', 1),
(59, 20, '2016-06-26', '09:00:00', 'B4', 2),
(60, 20, '2016-11-26', '09:00:00', 'B4', 3),
(61, 21, '2016-03-26', '09:00:00', 'B4', 1),
(62, 21, '2016-06-26', '09:00:00', 'B4', 2),
(63, 21, '2016-11-26', '09:00:00', 'B4', 3),
(64, 22, '2016-03-26', '09:00:00', 'B4', 1),
(65, 22, '2016-06-26', '09:00:00', 'B4', 2),
(66, 22, '2016-11-26', '09:00:00', 'B4', 3),
(67, 23, '2016-03-26', '09:00:00', 'B4', 1),
(68, 23, '2016-06-26', '09:00:00', 'B4', 2),
(69, 23, '2016-11-26', '09:00:00', 'B4', 3),
(70, 24, '2016-03-26', '09:00:00', 'B4', 1),
(71, 24, '2016-06-26', '09:00:00', 'B4', 2),
(72, 24, '2016-11-26', '09:00:00', 'B4', 3),
(73, 25, '2016-03-26', '09:00:00', 'B4', 1),
(74, 25, '2016-06-26', '09:00:00', 'B4', 2),
(75, 25, '2016-11-26', '09:00:00', 'B4', 3),
(76, 26, '2016-03-26', '09:00:00', 'B4', 1),
(77, 26, '2016-06-26', '09:00:00', 'B4', 2),
(78, 26, '2016-11-26', '09:00:00', 'B4', 3),
(79, 27, '2016-03-26', '09:00:00', 'B4', 1),
(80, 27, '2016-06-26', '09:00:00', 'B4', 2),
(81, 27, '2016-11-26', '09:00:00', 'B4', 3),
(82, 28, '2016-03-26', '09:00:00', 'B4', 1),
(83, 28, '2016-06-26', '09:00:00', 'B4', 2),
(84, 28, '2016-11-26', '09:00:00', 'B4', 3),
(85, 29, '2016-03-26', '09:00:00', 'B4', 1),
(86, 29, '2016-06-26', '09:00:00', 'B4', 2),
(87, 29, '2016-11-26', '09:00:00', 'B4', 3),
(88, 30, '2016-03-26', '09:00:00', 'B4', 1),
(89, 30, '2016-06-26', '09:00:00', 'B4', 2),
(90, 30, '2016-11-26', '09:00:00', 'B4', 3),
(91, 31, '0000-00-00', '00:00:00', '', 1),
(92, 31, '0000-00-00', '00:00:00', '', 2),
(93, 31, '0000-00-00', '00:00:00', '', 3),
(94, 32, '0000-00-00', '00:00:00', '', 1),
(95, 32, '0000-00-00', '00:00:00', '', 2),
(96, 32, '0000-00-00', '00:00:00', '', 3),
(97, 33, '0000-00-00', '00:00:00', '', 1),
(98, 33, '0000-00-00', '00:00:00', '', 2),
(99, 33, '0000-00-00', '00:00:00', '', 3),
(100, 34, '0000-00-00', '00:00:00', '', 1),
(101, 34, '0000-00-00', '00:00:00', '', 2),
(102, 34, '0000-00-00', '00:00:00', '', 3),
(103, 35, '0000-00-00', '00:00:00', '', 1),
(104, 35, '0000-00-00', '00:00:00', '', 2),
(105, 35, '0000-00-00', '00:00:00', '', 3),
(106, 36, '0000-00-00', '00:00:00', '', 1),
(107, 36, '0000-00-00', '00:00:00', '', 2),
(108, 36, '0000-00-00', '00:00:00', '', 3),
(109, 37, '0000-00-00', '00:00:00', '', 1),
(110, 37, '0000-00-00', '00:00:00', '', 2),
(111, 37, '0000-00-00', '00:00:00', '', 3),
(112, 38, '0000-00-00', '00:00:00', '', 1),
(113, 38, '0000-00-00', '00:00:00', '', 2),
(114, 38, '0000-00-00', '00:00:00', '', 3),
(115, 39, '0000-00-00', '00:00:00', '', 1),
(116, 39, '0000-00-00', '00:00:00', '', 2),
(117, 39, '0000-00-00', '00:00:00', '', 3),
(118, 40, '0000-00-00', '00:00:00', '', 1),
(119, 40, '0000-00-00', '00:00:00', '', 2),
(120, 40, '0000-00-00', '00:00:00', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'Amazonas'),
(2, 'Anzoátegui'),
(3, 'Apure'),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolívar'),
(7, 'Carabobo'),
(8, 'Cojedes'),
(9, 'Delta Amacuro'),
(10, 'Falcón'),
(11, 'Guárico'),
(12, 'Lara'),
(13, 'Mérida'),
(14, 'Miranda'),
(15, 'Monagas'),
(16, 'Nueva Esparta'),
(17, 'Portuguesa'),
(18, 'Sucre'),
(19, 'Táchira'),
(20, 'Trujillo'),
(21, 'Vargas'),
(22, 'Yaracuy'),
(23, 'Zulia'),
(24, 'Distrito Capital'),
(25, 'Dependencias Federales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `nacionalidad` varchar(4) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `ci`, `apellidos`, `nombres`, `nacionalidad`, `status`) VALUES
(1, '24176569', 'Urbina', 'Dollysabel', 'V', 'Activo'),
(2, '24173253', 'Rodriguez', 'Erick', 'V', 'Activo'),
(3, '24433170', 'Ontivero', 'Luis', 'V', 'Activo'),
(4, '25742787', 'Lopez', 'Eymer', 'V', 'Activo'),
(5, '24171147', 'Colmenares', 'Roger', 'V', 'Activo'),
(6, '25702077', 'Teran', 'Misael', 'V', 'Activo'),
(7, '26090360', 'Escalona', 'Yusleidy', 'V', 'Activo'),
(8, '24420646', 'Matute', 'Jesus', 'V', 'Activo'),
(9, '25993161', 'Abbinante', 'Geovanny', 'V', 'Activo'),
(10, '22295688', 'Agenjo', 'Luis', 'V', 'Activo'),
(11, '17253267', 'Brito', 'Jesus', 'V', 'Activo'),
(12, '20758871', 'Golindano', 'Jader', 'V', 'Activo'),
(13, '19699828', 'Martinez', 'Emily', 'V', 'Activo'),
(14, '25976491', 'Leones', 'Jesus', 'V', 'Activo'),
(15, '21252464', 'Segura', 'Jose', 'V', 'Activo'),
(16, '21098674', 'Palmero', 'Kayrys', 'V', 'Activo'),
(17, '24176516', 'Welcomez', 'Wolfgang', 'V', 'Activo'),
(18, '21254252', 'Linares', 'Oliver', 'V', 'Activo'),
(19, '25607793', 'Florez', 'Saul', 'V', 'Activo'),
(20, '25071700', 'Olivo', 'Jose', 'V', 'Activo'),
(21, '24175759', 'Guevara', 'Witold', 'V', 'Activo'),
(22, '22098851', 'Martinez', 'Ysrrael', 'V', 'Activo'),
(23, '21254966', 'Marchan', 'Luis', 'V', 'Activo'),
(24, '26369374', 'Garcia', 'Guillermo', 'V', 'Activo'),
(25, '24817989', 'Perez', 'Abraham', 'V', 'Activo'),
(26, '23785396', 'Perez', 'Gabrielys', 'V', 'Activo'),
(27, '19136682', 'Henriquez', 'Nairobis', 'V', 'Activo'),
(28, '15713176', 'Ovalles', 'Ana', 'V', 'Activo'),
(29, '5749314', 'Castellanos', 'Maria', 'V', 'Activo'),
(30, '19864521', 'Guillen', 'Wladimir', 'V', 'Activo'),
(31, '18066456', 'Castillo', 'Alberto', 'V', 'Activo'),
(32, '17717496', 'Aguilera', 'Josep', 'V', 'Activo'),
(33, '18691331', 'Sifontes', 'Jesus', 'V', 'Activo'),
(34, '17176589', 'Mier', 'Jennifer', 'V', 'Activo'),
(35, '12138468', 'Mayora', 'Jenny', 'V', 'Activo'),
(36, '18609255', 'Lozada', 'Ruben', 'V', 'Activo'),
(37, '17716549', 'Rosales', 'Dilmary', 'V', 'Activo'),
(38, '25538009', 'Gomes', 'Carlos', 'V', 'Activo'),
(39, '17968311', 'Gutierrez', 'Jose', 'V', 'Activo'),
(40, '26010905', 'Tovar', 'Carlos', 'V', 'Activo'),
(41, '25542911', 'Molina', 'Lisberth', 'V', 'Activo'),
(42, '18609702', 'Izaguirre', 'Marlon', 'V', 'Activo'),
(43, '24669291', 'Berroteran', 'Yoxmar', 'V', 'Activo'),
(44, '22344924', 'Munoz', 'Nelsy', 'V', 'Activo'),
(45, '25525659', 'Sanabria', 'Kelvin', 'V', 'Activo'),
(46, '25742405', 'Ravelo', 'Luis', 'V', 'Activo'),
(47, '26486874', 'Trias', 'Stefhanie', 'V', 'Activo'),
(48, '20066424', 'Sarmiento', 'Ysmari', 'V', 'Activo'),
(49, '26166849', 'Cardozo', 'Raquel', 'V', 'Activo'),
(50, '25976184', 'Matos', 'Jose', 'V', 'Activo'),
(51, '19269223', 'Romero', 'Antonio', 'V', 'Activo'),
(52, '26151201', 'Ontiveros', 'Oswaldo', 'V', 'Activo'),
(53, '26486884', 'Bravo', 'Jose', 'V', 'Activo'),
(54, '22295506', 'Petit', 'Juan', 'V', 'Activo'),
(55, '26003319', 'Ravelo', 'Javier', 'V', 'Activo'),
(56, '21443086', 'Silva', 'Angel', 'V', 'Activo'),
(57, '21027837', 'Noguera', 'Josmairy', 'V', 'Activo'),
(58, '26793868', 'Flores', 'Maria', 'V', 'Activo'),
(59, '24924412', 'Uzcategui', 'Daniel', 'V', 'Activo'),
(60, '20761043', 'Quintero', 'Abiud', 'V', 'Activo'),
(61, '21271767', 'Lara', 'Gabriel', 'V', 'Activo'),
(62, '22295421', 'Rodriguez', 'Rene', 'V', 'Activo'),
(63, '25607794', 'Betancourt', 'Johel', 'V', 'Activo'),
(64, '26051879', 'Agreda', 'David', 'V', 'Activo'),
(65, '27707021', 'Yaguaracuto', 'Adrian', 'V', 'Activo'),
(66, '26486059', 'Crespo', 'Ronaldo', 'V', 'Activo'),
(67, '26454786', 'Marval', 'Simon', 'V', 'Activo'),
(68, '25742505', 'Vargas', 'Jose', 'V', 'Activo'),
(69, '25976886', 'Morales', 'Winker', 'V', 'Activo'),
(70, '26192094', 'Godoy', 'Francisco', 'V', 'Activo'),
(71, '27240080', 'Valera', 'Cristian', 'V', 'Activo'),
(72, '24446368', 'Ramirez', 'Renny', 'V', 'Activo'),
(73, '21368151', 'Macias', 'Yomaira', 'V', 'Activo'),
(74, '26151474', 'Rodriguez', 'Ernesto', 'V', 'Activo'),
(75, '25873980', 'Soares', 'Andy', 'V', 'Activo'),
(76, '24924739', 'Requena', 'Leoncio', 'V', 'Activo'),
(77, '25538136', 'Fermin', 'Erick', 'V', 'Activo'),
(78, '26460155', 'Miranda', 'Albert', 'V', 'Activo'),
(79, '26336441', 'Rivero', 'Yenicis', 'V', 'Activo'),
(80, '26855449', 'Sanchez', 'Carlos', 'V', 'Activo'),
(81, '19136115', 'Rodriguez', 'Billy', 'V', 'Activo'),
(82, '14182701', 'Morillo', 'Maikel', 'V', 'Activo'),
(83, '12144390', 'Reyes', 'Rocio', 'V', 'Activo'),
(84, '14240560', 'Hernandez', 'Eilim', 'V', 'Activo'),
(85, '14829630', 'Mota', 'Humberto', 'V', 'Activo'),
(87, '14830772', 'Diaz', 'Yeisy', 'V', 'Activo'),
(88, '15301260', 'Hernandez', 'Laudin', 'V', 'Activo'),
(89, '14664792', 'Carmona', 'Jose', 'V', 'Activo'),
(90, '9690404', 'Anzola', 'Lola', 'V', 'Activo'),
(91, '26486038', 'Suarez', 'Grecia', 'V', 'Activo'),
(92, '28224188', 'Martinez', 'Oscar', 'V', 'Activo'),
(93, '20266168', 'Parra', 'Yoslin', 'V', 'Activo'),
(94, '25873013', 'Marin', 'Ahuribel', 'V', 'Activo'),
(95, '12808261', 'Rodriguez', 'Lilibeth', 'V', 'Activo'),
(96, '19136059', 'Rodriguez', 'Yennifer', 'V', 'Activo'),
(97, '14240577', 'Beroes', 'Naileth', 'V', 'Activo'),
(98, '19137675', 'Flores', 'Eleonela', 'V', 'Activo'),
(99, '16760524', 'Brice', 'Willvinxton', 'V', 'Activo'),
(100, '21253767', 'Fernandez', 'Mayberlin', 'V', 'Activo'),
(101, '17050913', 'Rojas', 'Yusmary', 'V', 'Activo'),
(102, '20771651', 'Moreno', 'Mileidys', 'V', 'Activo'),
(103, '27402590', 'Flores', 'Davimar', 'V', 'Activo'),
(104, '19822838', 'Montilla', 'Luisa', 'V', 'Activo'),
(105, '17512260', 'Gonzalez', 'Luis', 'V', 'Activo'),
(106, '17969305', 'Guzman', 'Jhonny', 'V', 'Activo'),
(107, '27240915', 'Suarez', 'Pedro', 'V', 'Activo'),
(108, '27630014', 'Espa', 'Yorbin', 'V', 'Activo'),
(109, '21425011', 'De La Cruz', 'Genesis', 'V', 'Activo'),
(110, '25501539', 'Ceballo', 'Mernys', 'V', 'Activo'),
(111, '24387491', 'Palacios', 'Jose', 'V', 'Activo'),
(112, '11184184', 'Hernandez', 'Yacira', 'V', 'Activo'),
(113, '20695607', 'Castagna', 'Arianna', 'V', 'Activo'),
(114, '19195541', 'Quesada', 'Vanessa', 'V', 'Activo'),
(115, '20771777', 'Gonzalez', 'Genesis', 'V', 'Activo'),
(116, '25742722', 'Rondon', 'Priscila', 'V', 'Activo'),
(117, '21252957', 'Briceno', 'Yossy', 'V', 'Activo'),
(118, '25448274', 'Carvajal', 'Milagros', 'V', 'Activo'),
(119, '16344180', 'Sosa', 'Andreina', 'V', 'Activo'),
(120, '13861204', 'Paez', 'Jose', 'V', 'Activo'),
(121, '25873373', 'Hernandez', 'Yerbin', 'V', 'Activo'),
(122, '25364809', 'Figueredo', 'Fray', 'V', 'Activo'),
(123, '26148453', 'Cartaya', 'Daniela', 'V', 'Activo'),
(124, '20590309', 'Guevara', 'Norbelis', 'V', 'Activo'),
(125, '12481446', 'Alvarez', 'Ronald', 'V', 'Activo'),
(126, '25542891', 'Blanco', 'Francis', 'V', 'Activo'),
(127, '26526405', 'Arrollo', 'Andreina', 'V', 'Activo'),
(128, '20592752', 'Serrano', 'Eikemberg', 'V', 'Activo'),
(129, '25946047', 'Morillo', ',Wilianyelis', 'V', 'Activo'),
(130, '26735014', 'Coronado', 'Luismar', 'V', 'Activo'),
(131, '21368990', 'Duque', 'Leonel', 'V', 'Activo'),
(132, '24669559', 'Gonzalez', 'Marcos', 'V', 'Activo'),
(133, '17970332', 'Matos', 'Evert', 'V', 'Activo'),
(134, '17197213', 'Diaz', 'Jose', 'V', 'Activo'),
(135, '16012088', 'Medina', 'Erika', 'V', 'Activo'),
(136, '26090582', 'Rodriguez', 'Barbara', 'V', 'Activo'),
(137, '27109093', 'Rivera', 'Wilmarys', 'V', 'Activo'),
(138, '25618576', 'Obispo', 'Maria', 'V', 'Activo'),
(139, '24923570', 'Mendez', 'Duzneyker', 'V', 'Activo'),
(140, '13240264', 'Sanchez', 'Gleyde', 'V', 'Activo'),
(141, '26895528', 'Ferreti', 'Rosangelica', 'V', 'Activo'),
(142, '17174058', 'Navas', 'Brenda', 'V', 'Activo'),
(143, '19864321', 'Salas', 'Deiglys', 'V', 'Activo'),
(144, '26213460', 'Ramos', 'Dayberlix', 'V', 'Activo'),
(145, '25976624', 'Irasabal', 'Oskarelis', 'V', 'Activo'),
(146, '11117088', 'Ranuarez', 'Mauris', 'V', 'Activo'),
(147, '24175546', 'Garcia', 'Maria', 'V', 'Activo'),
(148, '25364662', 'Diaz', 'Carlos', 'V', 'Activo'),
(149, '14830066', 'Pinero', 'Elizabeth', 'V', 'Activo'),
(150, '25873685', 'Burgos', 'Tomas', 'V', 'Activo'),
(151, '15735088', 'Gamez', 'Bernardo', 'V', 'Activo'),
(152, '26180853', 'Fernandez', 'Alexis', 'V', 'Activo'),
(153, '18679837', 'Velasquez', 'Nehemias', 'V', 'Activo'),
(154, '21026870', 'Hernandez', 'Jhosnoirlit', 'V', 'Activo'),
(155, '19967992', 'Rodriguez', 'Gerson', 'V', 'Activo'),
(156, '25314530', 'Bata', 'Ricardo', 'V', 'Activo'),
(157, '21603227', 'Rodriguez', 'Rolangel', 'V', 'Activo'),
(158, '19863330', 'Payares', 'Andreck', 'V', 'Activo'),
(159, '25635555', 'Granados', 'Paola', 'V', 'Activo'),
(160, '26192529', 'Sanchez', 'Andres', 'V', 'Activo'),
(161, '24817681', 'Camino', 'Daniela', 'V', 'Activo'),
(162, '25542024', 'Sequera', 'Anderson', 'V', 'Activo'),
(163, '25065787', 'Arana', 'Jhonny', 'V', 'Activo'),
(164, '26248105', 'Arraiz', 'Cesar', 'V', 'Activo'),
(165, '22339678', 'Baddour', 'John', 'V', 'Activo'),
(166, '26095956', 'Bandres', 'Rolando', 'V', 'Activo'),
(167, '25071256', 'Barreto', 'David', 'V', 'Activo'),
(168, '25447987', 'Blanco', 'Rosmarielys', 'V', 'Activo'),
(169, '26148306', 'Cardona', 'Ronaldo', 'V', 'Activo'),
(170, '25448527', 'Cuello', 'Douglenyi', 'V', 'Activo'),
(171, '19913295', 'Diaz', 'Genesis', 'V', 'Activo'),
(172, '25525942', 'Eizaga', 'Laura', 'V', 'Activo'),
(173, '26460531', 'Fernandez', 'Jailene', 'V', 'Activo'),
(174, '25582444', 'Gamboa', 'Rafael', 'V', 'Activo'),
(175, '25873529', 'Gutierrez', 'Yelimar', 'V', 'Activo'),
(176, '25880366', 'Hernandez', 'Luis', 'V', 'Activo'),
(177, '25873410', 'Hernandez', 'Manuel', 'V', 'Activo'),
(178, '22345121', 'Isquiel', 'Melissa', 'V', 'Activo'),
(179, '25618097', 'Kriszak', 'Jose', 'V', 'Activo'),
(180, '25364883', 'Leon', 'Antoni', 'V', 'Activo'),
(181, '21260995', 'Linares', 'Edicson', 'V', 'Activo'),
(182, '20335771', 'Linares', 'Jesus', 'V', 'Activo'),
(183, '24420782', 'Lopez', 'David', 'V', 'Activo'),
(184, '25827660', 'Maestre', 'Richard', 'V', 'Activo'),
(185, '25708464', 'Mantilla', 'Kleyber', 'V', 'Activo'),
(186, '20592726', 'Mantilla', 'Floriana', 'V', 'Activo'),
(187, '25620591', 'Marcano', 'Jackson', 'V', 'Activo'),
(188, '27402258', 'Moncada', 'Yonathan', 'V', 'Activo'),
(189, '25525670', 'Morales', 'Yusneidi', 'V', 'Activo'),
(190, '25071349', 'Murillo', 'Andrea', 'V', 'Activo'),
(191, '20989357', 'Pacheco', 'Osward', 'V', 'Activo'),
(192, '19277027', 'Patiño', 'Juanny', 'V', 'Activo'),
(193, '24388314', 'Payarez', 'Robert', 'V', 'Activo'),
(194, '23524814', 'Perez', 'Paulo', 'V', 'Activo'),
(195, '25618362', 'Rivas', 'Andres', 'V', 'Activo'),
(196, '25620642', 'Rodriguez', 'Mary', 'V', 'Activo'),
(197, '26280097', 'Rosales', 'Kevin', 'V', 'Activo'),
(198, '24923173', 'Ruberto', 'Fabiana', 'V', 'Activo'),
(199, '26735381', 'Salazar', 'Marco', 'V', 'Activo'),
(200, '26010684', 'Sanabria', 'Roger', 'V', 'Activo'),
(201, '22289141', 'Torres', 'Armando', 'V', 'Activo'),
(202, '21025191', 'Torres', 'Frederick', 'V', 'Activo'),
(203, '21025191', 'Torres', 'Kleyber', 'V', 'Activo'),
(204, '21026732', 'Urbina', 'Luis', 'V', 'Activo'),
(205, '26090724', 'Verlezza', 'Roberto', 'V', 'Activo'),
(206, '21253900', 'Matos', 'Edicson', 'V', 'Activo'),
(207, '25249525', 'García', 'Anthony', 'V', 'Activo'),
(208, '21097686', 'Fuentes', 'Reinaldo', 'V', 'Activo'),
(209, '24997084', 'Bracho', 'Alvaro', 'V', 'Activo'),
(210, '21025775', 'Rodríguez', 'Anibal', 'V', 'Activo'),
(211, '21003354', 'Guerra', 'Liz', 'V', 'Activo'),
(212, '19268804', 'Oliveros', 'Kariney', 'V', 'Activo'),
(213, '25525725', 'Barroterán', 'Roiser', 'V', 'Activo'),
(214, '15733026', 'Noriega', 'Jimmy', 'V', 'Activo'),
(215, '24669510', 'Pérez', 'Hairam', 'V', 'Activo'),
(216, '8589231', 'Piñero', 'Tita', 'V', 'Activo'),
(217, '24670578', 'Gutiérrez', 'Daniela', 'V', 'Activo'),
(218, '25742347', 'Vivas', 'Paola', 'V', 'Activo'),
(219, '22294276', 'Pérez', 'Jorman', 'V', 'Activo'),
(220, '17716552', 'De Sousa', 'Henry', 'V', 'Activo'),
(221, '20770354', 'Monoga', 'Albert', 'V', 'Activo'),
(222, '21465728', 'Liendo', 'Yeirushka', 'V', 'Activo'),
(223, '26735272', 'Villasana', 'Fanger', 'V', 'Activo'),
(224, '25364957', 'Gaizan', 'Nain', 'V', 'Activo'),
(225, '22295184', 'Arrioja', 'Mary', 'V', 'Activo'),
(226, '14829052', 'Villanueva', 'Raquel', 'V', 'Activo'),
(227, '12121071', 'Rodríguez', 'Deyanira', 'V', 'Activo'),
(228, '14934812', 'Abad', 'Johanna', 'V', 'Activo'),
(229, '16762184', 'Guevara', 'Flor', 'V', 'Activo'),
(230, '8105632', 'Rosales', 'Carlos', 'V', 'Activo'),
(231, '10276000', 'Carrillo', 'Pedro', 'V', 'Activo'),
(232, '12611725', 'Niño', 'Yorman', 'V', 'Aa'),
(233, '14830392', 'Berro', 'Betzaida', 'V', 'Activo'),
(234, '17969323', 'Meza', 'Jhon', 'V', 'Activo'),
(235, '18842834', 'González', 'Mirelly', 'V', 'Activo'),
(236, '12121721', 'Jiménez', 'Yoduel', 'V', 'Activo'),
(237, '15733521', 'Tirado', 'Carlos', 'V', 'Activo'),
(238, '13463023', 'Simones', 'Pedro', 'V', 'Activo'),
(239, '20769521', 'González', 'Daniela', 'V', 'Activo'),
(240, '19833653', 'Landaeta', 'Alberto', 'V', 'Activo'),
(241, '18855634', 'García', 'Kevin', 'V', 'Activo'),
(242, '13479764', 'Camejo', 'John', 'V', 'Activo'),
(243, '21369046', 'Andara', 'Andrian', 'V', 'Activo'),
(244, '19268112', 'Marín', 'Miguel', 'V', 'Activo'),
(245, '24343170', 'Gomez', 'Sthefany', 'V', 'Activo'),
(246, '24388550', 'Rodríguez', 'Gladys', 'V', 'Activo'),
(247, '23802305', 'Ruíz', 'Josaura', 'V', 'Activo'),
(248, '21369876', 'Gómez', 'Solisbeth', 'V', 'Activo'),
(249, '21260005', 'Tovar', 'Jonny', 'V', 'Activo'),
(250, '25072413', 'Jiménez', 'Iliana', 'V', 'Activo'),
(251, '20450449', 'Yanez', 'Loren', 'V', 'Activo'),
(252, '23633075', 'Jiménez', 'Loreny', 'V', 'Activo'),
(253, '19993935', 'Praolini', 'Kenneth', 'V', 'Activo'),
(254, '20057901', 'Corzo', 'Victor', 'V', 'Activo'),
(255, '23795025', 'Moreno', 'Kevin', 'V', 'Activo'),
(256, '25501531', 'Hernández', 'Andrés', 'V', 'Activo'),
(257, '25067745', 'Ibarra', 'Jesús', 'V', 'Activo'),
(258, '24669508', 'Morgado', 'Felix', 'V', 'Activo'),
(259, '25873060', 'García', 'Carol ', 'V', 'Activo'),
(260, '26486494', 'David', 'Neygell', 'V', 'Activo'),
(261, '23966840', 'Alvarez', 'Rafael', 'V', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_cursa_proy`
--

CREATE TABLE `est_cursa_proy` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_pnf` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_trayecto` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `est_cursa_proy`
--

INSERT INTO `est_cursa_proy` (`id`, `id_estudiante`, `id_pnf`, `id_sede`, `id_trayecto`, `id_seccion`, `id_turno`, `id_anio`) VALUES
(1, 1, 2, 1, 4, 1, 1, 5),
(2, 2, 2, 1, 4, 1, 1, 5),
(3, 3, 2, 1, 4, 1, 1, 5),
(4, 4, 2, 1, 4, 1, 1, 5),
(5, 5, 2, 1, 4, 1, 1, 5),
(6, 6, 2, 1, 4, 1, 1, 5),
(7, 7, 2, 1, 4, 1, 1, 5),
(8, 8, 2, 1, 4, 1, 1, 5),
(9, 9, 2, 1, 4, 1, 1, 5),
(10, 10, 2, 1, 4, 1, 1, 5),
(11, 11, 2, 1, 4, 1, 1, 5),
(12, 12, 2, 1, 4, 1, 1, 5),
(13, 13, 2, 1, 4, 1, 1, 5),
(14, 14, 2, 1, 4, 1, 1, 5),
(15, 15, 2, 1, 4, 1, 1, 5),
(16, 16, 2, 1, 4, 1, 1, 5),
(17, 17, 2, 1, 4, 1, 1, 5),
(18, 18, 2, 1, 4, 1, 1, 5),
(19, 19, 2, 1, 4, 1, 1, 5),
(20, 20, 2, 1, 4, 1, 1, 5),
(21, 21, 2, 1, 4, 1, 1, 5),
(22, 22, 2, 1, 4, 1, 1, 5),
(23, 23, 2, 1, 4, 1, 1, 5),
(24, 24, 2, 1, 4, 1, 1, 5),
(25, 25, 2, 1, 4, 1, 1, 5),
(26, 26, 2, 1, 4, 1, 1, 5),
(27, 27, 2, 1, 4, 1, 2, 5),
(28, 28, 2, 1, 4, 1, 2, 5),
(29, 29, 2, 1, 4, 1, 2, 5),
(30, 30, 2, 1, 4, 1, 2, 5),
(31, 31, 2, 1, 4, 1, 2, 5),
(32, 32, 2, 1, 4, 1, 2, 5),
(33, 33, 2, 1, 4, 1, 2, 5),
(34, 34, 2, 1, 4, 1, 2, 5),
(35, 35, 2, 1, 4, 1, 2, 5),
(36, 36, 2, 1, 4, 1, 2, 5),
(37, 37, 2, 1, 4, 1, 2, 5),
(38, 38, 2, 1, 2, 1, 2, 5),
(39, 39, 2, 1, 2, 2, 2, 5),
(40, 40, 2, 1, 2, 3, 2, 5),
(41, 41, 2, 1, 2, 3, 2, 5),
(42, 42, 2, 1, 2, 3, 2, 5),
(43, 43, 2, 1, 2, 3, 2, 5),
(44, 44, 2, 1, 2, 1, 1, 5),
(45, 45, 2, 1, 2, 1, 1, 5),
(46, 46, 2, 1, 2, 1, 1, 5),
(47, 47, 2, 1, 2, 1, 1, 5),
(48, 48, 2, 1, 2, 1, 1, 5),
(49, 49, 2, 1, 2, 1, 1, 5),
(50, 50, 2, 1, 2, 1, 1, 5),
(51, 51, 2, 1, 2, 1, 1, 5),
(52, 52, 2, 1, 2, 1, 1, 5),
(53, 53, 2, 1, 2, 1, 1, 5),
(54, 54, 2, 1, 2, 1, 1, 5),
(55, 55, 2, 1, 2, 1, 1, 5),
(57, 57, 2, 1, 2, 1, 1, 5),
(58, 58, 2, 1, 2, 1, 1, 5),
(59, 59, 2, 1, 2, 1, 1, 5),
(60, 60, 2, 1, 2, 1, 1, 5),
(61, 61, 2, 1, 2, 1, 1, 5),
(62, 62, 2, 1, 2, 1, 1, 5),
(63, 63, 2, 1, 2, 1, 1, 5),
(64, 64, 2, 1, 2, 1, 1, 5),
(65, 65, 2, 1, 2, 1, 1, 5),
(66, 66, 2, 1, 2, 1, 1, 5),
(67, 67, 2, 1, 2, 1, 1, 5),
(68, 68, 2, 1, 2, 1, 1, 5),
(69, 69, 2, 1, 2, 1, 1, 5),
(70, 70, 2, 1, 2, 1, 1, 5),
(71, 71, 2, 1, 2, 1, 1, 5),
(72, 72, 2, 1, 2, 1, 1, 5),
(73, 73, 2, 1, 2, 1, 1, 5),
(74, 74, 2, 1, 2, 1, 1, 5),
(75, 75, 2, 1, 2, 1, 1, 5),
(76, 76, 2, 1, 2, 1, 1, 5),
(77, 77, 2, 1, 2, 1, 1, 5),
(78, 78, 2, 1, 2, 1, 1, 5),
(79, 79, 2, 1, 2, 1, 1, 5),
(80, 80, 2, 1, 2, 1, 1, 5),
(81, 81, 4, 1, 2, 1, 2, 5),
(82, 82, 4, 1, 4, 1, 2, 5),
(83, 83, 4, 1, 4, 1, 2, 5),
(84, 84, 4, 1, 4, 1, 2, 5),
(85, 85, 4, 1, 4, 1, 2, 5),
(86, 86, 4, 1, 4, 1, 2, 5),
(87, 87, 4, 1, 4, 1, 2, 5),
(88, 88, 4, 1, 4, 1, 2, 5),
(89, 89, 4, 1, 4, 1, 2, 5),
(90, 90, 4, 1, 4, 1, 2, 5),
(91, 91, 4, 1, 4, 1, 2, 5),
(92, 92, 4, 1, 4, 1, 2, 5),
(93, 93, 4, 1, 4, 1, 2, 5),
(94, 94, 4, 1, 4, 1, 2, 5),
(95, 95, 4, 1, 4, 1, 2, 5),
(96, 96, 4, 1, 4, 1, 2, 5),
(97, 97, 4, 1, 4, 1, 2, 5),
(98, 98, 4, 1, 4, 1, 2, 5),
(99, 99, 4, 1, 4, 1, 2, 5),
(100, 100, 4, 1, 2, 1, 2, 5),
(101, 101, 4, 1, 2, 1, 2, 5),
(102, 102, 4, 1, 2, 1, 2, 5),
(103, 103, 4, 1, 2, 1, 2, 5),
(104, 104, 4, 1, 2, 1, 2, 5),
(105, 105, 4, 1, 2, 1, 2, 5),
(106, 106, 4, 1, 2, 1, 2, 5),
(107, 107, 4, 1, 2, 1, 2, 5),
(108, 108, 4, 1, 2, 1, 2, 5),
(109, 109, 4, 1, 2, 1, 2, 5),
(110, 110, 4, 1, 2, 1, 2, 5),
(111, 111, 4, 1, 2, 1, 2, 5),
(112, 112, 4, 1, 2, 1, 2, 5),
(113, 113, 4, 1, 2, 1, 2, 5),
(114, 114, 4, 1, 2, 1, 2, 5),
(115, 115, 4, 1, 2, 1, 2, 5),
(116, 116, 4, 1, 2, 1, 2, 5),
(117, 117, 4, 1, 2, 1, 2, 5),
(118, 118, 4, 1, 2, 1, 2, 5),
(119, 119, 4, 1, 2, 1, 2, 5),
(120, 120, 4, 1, 2, 1, 2, 5),
(121, 121, 4, 1, 2, 1, 2, 5),
(122, 122, 4, 1, 2, 1, 2, 5),
(123, 123, 4, 1, 2, 1, 2, 5),
(124, 124, 4, 1, 2, 1, 2, 5),
(125, 125, 4, 1, 2, 1, 2, 5),
(126, 126, 4, 1, 2, 1, 2, 5),
(127, 127, 4, 1, 2, 1, 2, 5),
(128, 128, 4, 1, 2, 1, 2, 5),
(129, 129, 4, 1, 2, 1, 2, 5),
(130, 130, 4, 1, 2, 1, 2, 5),
(131, 131, 4, 1, 2, 1, 2, 5),
(132, 132, 4, 1, 2, 1, 2, 5),
(133, 133, 4, 1, 2, 1, 2, 5),
(134, 134, 4, 1, 2, 2, 2, 5),
(135, 135, 4, 1, 2, 2, 2, 5),
(136, 136, 4, 1, 2, 2, 2, 5),
(137, 137, 4, 1, 2, 2, 2, 5),
(138, 138, 4, 1, 2, 2, 2, 5),
(139, 139, 4, 1, 2, 2, 2, 5),
(140, 140, 4, 1, 2, 2, 2, 5),
(141, 141, 4, 1, 2, 2, 2, 5),
(142, 142, 4, 1, 2, 2, 2, 5),
(143, 143, 4, 1, 2, 2, 2, 5),
(144, 144, 4, 1, 2, 2, 2, 5),
(145, 145, 4, 1, 2, 2, 2, 5),
(146, 146, 4, 1, 2, 2, 2, 5),
(147, 147, 4, 1, 2, 2, 2, 5),
(148, 148, 4, 1, 2, 2, 2, 5),
(149, 149, 4, 1, 2, 2, 2, 5),
(150, 150, 4, 1, 2, 2, 2, 5),
(151, 151, 4, 1, 2, 2, 2, 5),
(152, 424, 2, 1, 3, 2, 1, 5),
(153, 425, 2, 1, 3, 2, 1, 5),
(154, 426, 2, 1, 3, 2, 1, 5),
(155, 427, 2, 1, 3, 2, 1, 5),
(156, 428, 2, 1, 3, 2, 1, 5),
(157, 429, 2, 1, 3, 2, 1, 5),
(158, 430, 2, 1, 3, 2, 1, 5),
(159, 431, 2, 1, 3, 2, 1, 5),
(160, 432, 2, 1, 3, 2, 1, 5),
(161, 161, 2, 1, 4, 1, 1, 5),
(162, 162, 2, 1, 3, 1, 1, 5),
(163, 163, 2, 1, 3, 1, 1, 5),
(164, 164, 2, 1, 3, 1, 1, 5),
(165, 165, 2, 1, 3, 1, 1, 5),
(166, 166, 2, 1, 3, 1, 1, 5),
(167, 167, 2, 1, 3, 1, 1, 5),
(168, 168, 2, 1, 3, 1, 1, 5),
(169, 169, 2, 1, 3, 1, 1, 5),
(170, 170, 2, 1, 3, 1, 1, 5),
(171, 171, 2, 1, 3, 1, 1, 5),
(172, 172, 2, 1, 3, 1, 1, 5),
(173, 173, 2, 1, 3, 1, 1, 5),
(174, 174, 2, 1, 3, 1, 1, 5),
(175, 175, 2, 1, 3, 1, 1, 5),
(176, 176, 2, 1, 3, 1, 1, 5),
(177, 177, 2, 1, 3, 1, 1, 5),
(178, 178, 2, 1, 3, 1, 1, 5),
(179, 179, 2, 1, 3, 1, 1, 5),
(180, 180, 2, 1, 3, 1, 1, 5),
(181, 181, 2, 1, 3, 1, 1, 5),
(182, 182, 2, 1, 3, 1, 1, 5),
(183, 183, 2, 1, 3, 1, 1, 5),
(184, 184, 2, 1, 3, 1, 1, 5),
(185, 185, 2, 1, 3, 1, 1, 5),
(186, 186, 2, 1, 3, 1, 1, 5),
(187, 187, 2, 1, 3, 1, 1, 5),
(188, 188, 2, 1, 3, 1, 1, 5),
(189, 189, 2, 1, 3, 1, 1, 5),
(190, 190, 2, 1, 3, 1, 1, 5),
(191, 191, 2, 1, 3, 1, 1, 5),
(192, 192, 2, 1, 3, 1, 1, 5),
(193, 193, 2, 1, 3, 1, 1, 5),
(194, 194, 2, 1, 3, 1, 1, 5),
(195, 195, 2, 1, 3, 1, 1, 5),
(196, 196, 2, 1, 3, 1, 1, 5),
(197, 197, 2, 1, 3, 1, 1, 5),
(198, 198, 2, 1, 3, 1, 1, 5),
(199, 199, 2, 1, 3, 1, 1, 5),
(200, 200, 2, 1, 3, 1, 1, 5),
(201, 201, 2, 1, 3, 1, 1, 5),
(202, 202, 2, 1, 3, 1, 1, 5),
(203, 203, 2, 1, 3, 1, 1, 5),
(204, 204, 2, 1, 3, 1, 1, 5),
(205, 205, 2, 1, 3, 1, 1, 5),
(206, 157, 2, 1, 3, 2, 1, 5),
(207, 160, 2, 1, 3, 2, 1, 5),
(208, 154, 2, 1, 3, 2, 1, 5),
(209, 206, 2, 1, 2, 1, 2, 5),
(210, 207, 2, 1, 2, 3, 2, 4),
(211, 208, 2, 1, 2, 3, 2, 4),
(212, 209, 2, 1, 2, 3, 2, 4),
(213, 210, 2, 1, 2, 3, 2, 4),
(214, 211, 2, 1, 2, 1, 2, 4),
(215, 212, 2, 1, 2, 1, 2, 4),
(216, 213, 2, 1, 2, 1, 2, 4),
(217, 214, 2, 1, 2, 1, 2, 4),
(218, 215, 2, 1, 2, 1, 2, 4),
(219, 216, 2, 1, 2, 1, 2, 4),
(220, 217, 2, 1, 2, 1, 2, 4),
(221, 218, 2, 1, 2, 1, 2, 4),
(222, 219, 2, 1, 2, 1, 2, 4),
(223, 220, 2, 1, 2, 1, 2, 4),
(224, 221, 2, 1, 2, 1, 2, 4),
(225, 169, 2, 1, 2, 2, 1, 4),
(226, 175, 2, 1, 2, 2, 1, 4),
(227, 200, 2, 1, 2, 2, 1, 4),
(228, 177, 2, 1, 2, 2, 1, 4),
(229, 173, 2, 1, 2, 2, 1, 4),
(230, 156, 2, 1, 2, 2, 1, 4),
(231, 222, 2, 1, 2, 2, 1, 4),
(232, 157, 2, 1, 2, 2, 1, 4),
(233, 223, 2, 1, 2, 2, 1, 4),
(234, 192, 2, 1, 2, 5, 1, 4),
(235, 186, 2, 1, 2, 5, 1, 4),
(236, 224, 2, 1, 2, 5, 1, 4),
(237, 180, 2, 1, 2, 5, 1, 4),
(238, 225, 2, 1, 2, 5, 1, 4),
(239, 226, 2, 1, 4, 1, 2, 4),
(240, 227, 2, 1, 4, 1, 2, 4),
(241, 228, 2, 1, 4, 1, 2, 4),
(242, 229, 2, 1, 4, 1, 2, 4),
(243, 230, 2, 1, 4, 1, 2, 4),
(244, 231, 2, 1, 4, 1, 2, 4),
(245, 232, 2, 1, 4, 1, 2, 4),
(246, 233, 2, 1, 4, 1, 2, 4),
(247, 234, 2, 1, 4, 1, 2, 4),
(248, 235, 2, 1, 4, 1, 2, 4),
(249, 236, 2, 1, 4, 1, 2, 4),
(250, 237, 2, 1, 4, 1, 2, 4),
(251, 238, 2, 1, 4, 1, 2, 4),
(252, 239, 2, 1, 4, 1, 2, 4),
(253, 240, 2, 1, 4, 1, 2, 4),
(254, 241, 2, 1, 4, 1, 2, 4),
(255, 242, 2, 1, 4, 2, 2, 4),
(256, 243, 2, 1, 4, 2, 2, 4),
(257, 244, 2, 1, 4, 2, 2, 4),
(258, 245, 2, 1, 4, 1, 1, 4),
(259, 246, 2, 1, 4, 1, 1, 4),
(260, 247, 2, 1, 4, 1, 1, 4),
(261, 248, 2, 1, 4, 1, 1, 4),
(262, 249, 2, 1, 4, 1, 1, 4),
(263, 250, 2, 1, 4, 1, 1, 4),
(264, 251, 2, 1, 4, 1, 1, 4),
(265, 252, 2, 1, 4, 1, 1, 4),
(266, 253, 2, 1, 4, 1, 1, 4),
(267, 254, 2, 1, 4, 1, 1, 4),
(268, 255, 2, 1, 4, 1, 1, 4),
(269, 256, 2, 1, 4, 1, 1, 4),
(270, 257, 2, 1, 4, 1, 1, 4),
(271, 258, 2, 1, 2, 4, 1, 5),
(272, 259, 2, 1, 2, 4, 1, 5),
(273, 260, 2, 1, 2, 4, 1, 5),
(274, 261, 2, 1, 4, 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_tiene_proy`
--

CREATE TABLE `est_tiene_proy` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_estudiante1` int(11) NOT NULL,
  `id_estudiante2` int(11) NOT NULL,
  `id_estudiante3` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `est_tiene_proy`
--

INSERT INTO `est_tiene_proy` (`id`, `id_proyecto`, `id_estudiante1`, `id_estudiante2`, `id_estudiante3`) VALUES
(1, 1, 23, 24, 25),
(2, 2, 160, 0, 0),
(3, 3, 154, 0, 0),
(4, 4, 192, 186, 224),
(5, 5, 180, 225, 0),
(6, 6, 258, 259, 0),
(7, 7, 177, 173, 0),
(8, 8, 169, 175, 200),
(9, 9, 156, 222, 0),
(10, 10, 157, 223, 0),
(11, 11, 219, 220, 221),
(12, 12, 217, 218, 0),
(13, 13, 215, 216, 0),
(14, 14, 214, 213, 0),
(15, 15, 211, 212, 0),
(16, 16, 209, 208, 207),
(17, 17, 210, 0, 0),
(18, 18, 245, 246, 247),
(19, 19, 248, 249, 250),
(20, 20, 251, 252, 0),
(21, 21, 253, 254, 255),
(22, 22, 256, 257, 0),
(23, 23, 226, 227, 228),
(24, 24, 229, 230, 0),
(25, 25, 236, 237, 238),
(26, 26, 234, 235, 0),
(27, 27, 233, 0, 0),
(28, 28, 242, 243, 244),
(29, 29, 231, 232, 0),
(30, 30, 239, 240, 241),
(31, 31, 2, 3, 0),
(32, 32, 161, 17, 0),
(33, 33, 4, 0, 0),
(34, 34, 14, 15, 1),
(35, 35, 10, 21, 20),
(36, 36, 261, 6, 16),
(37, 37, 9, 22, 7),
(38, 38, 5, 26, 0),
(39, 39, 19, 8, 18),
(40, 40, 13, 11, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(50) NOT NULL,
  `cal_c` int(11) NOT NULL,
  `cal_t` int(11) NOT NULL,
  `cal_e` int(11) NOT NULL,
  `fase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `id_proyecto`, `cal_c`, `cal_t`, `cal_e`, `fase`) VALUES
(1, 1, 100, 80, 95, 1),
(2, 1, 100, 100, 100, 2),
(3, 1, 100, 100, 100, 3),
(4, 2, 96, 96, 96, 1),
(5, 2, 96, 96, 96, 2),
(6, 2, 96, 96, 96, 3),
(7, 3, 96, 96, 96, 1),
(8, 3, 96, 96, 96, 2),
(9, 3, 96, 96, 96, 3),
(10, 4, 96, 96, 96, 1),
(11, 4, 96, 96, 96, 2),
(12, 4, 96, 96, 96, 3),
(13, 5, 96, 96, 96, 1),
(14, 5, 96, 96, 96, 2),
(15, 5, 96, 96, 96, 3),
(16, 6, 0, 0, 0, 1),
(17, 6, 0, 0, 0, 2),
(18, 6, 0, 0, 0, 3),
(19, 7, 96, 96, 96, 1),
(20, 7, 96, 96, 96, 2),
(21, 7, 96, 96, 96, 3),
(22, 8, 96, 96, 96, 1),
(23, 8, 96, 96, 96, 2),
(24, 8, 96, 96, 96, 3),
(25, 9, 96, 96, 96, 1),
(26, 9, 96, 96, 96, 2),
(27, 9, 96, 96, 96, 3),
(28, 10, 96, 96, 96, 1),
(29, 10, 96, 96, 96, 2),
(30, 10, 96, 96, 96, 3),
(31, 11, 96, 96, 96, 1),
(32, 11, 96, 96, 96, 2),
(33, 11, 96, 96, 96, 3),
(34, 12, 96, 96, 96, 1),
(35, 12, 96, 96, 96, 2),
(36, 12, 96, 96, 96, 3),
(37, 13, 96, 96, 96, 1),
(38, 13, 96, 96, 96, 2),
(39, 13, 96, 96, 96, 3),
(40, 14, 96, 96, 96, 1),
(41, 14, 96, 96, 96, 2),
(42, 14, 96, 96, 96, 3),
(43, 15, 96, 96, 96, 1),
(44, 15, 96, 96, 96, 2),
(45, 15, 96, 96, 96, 3),
(46, 16, 96, 96, 96, 1),
(47, 16, 96, 96, 96, 2),
(48, 16, 96, 96, 96, 3),
(49, 17, 96, 96, 96, 1),
(50, 17, 96, 96, 96, 2),
(51, 17, 96, 96, 96, 3),
(52, 18, 96, 96, 96, 1),
(53, 18, 96, 96, 96, 2),
(54, 18, 96, 96, 96, 3),
(55, 19, 96, 96, 96, 1),
(56, 19, 96, 96, 96, 2),
(57, 19, 96, 96, 96, 3),
(58, 20, 96, 96, 96, 1),
(59, 20, 96, 96, 96, 2),
(60, 20, 96, 96, 96, 3),
(61, 21, 96, 96, 96, 1),
(62, 21, 96, 96, 96, 2),
(63, 21, 96, 96, 96, 3),
(64, 22, 96, 96, 96, 1),
(65, 22, 96, 96, 96, 2),
(66, 22, 96, 96, 96, 3),
(67, 23, 96, 96, 96, 1),
(68, 23, 96, 96, 96, 2),
(69, 23, 96, 96, 96, 3),
(70, 24, 96, 96, 96, 1),
(71, 24, 96, 96, 96, 2),
(72, 24, 96, 96, 96, 3),
(73, 25, 96, 96, 96, 1),
(74, 25, 96, 96, 96, 2),
(75, 25, 96, 96, 96, 3),
(76, 26, 96, 96, 96, 1),
(77, 26, 96, 96, 96, 2),
(78, 26, 96, 96, 96, 3),
(79, 27, 96, 96, 96, 1),
(80, 27, 96, 96, 96, 2),
(81, 27, 96, 96, 96, 3),
(82, 28, 96, 96, 96, 1),
(83, 28, 96, 96, 96, 2),
(84, 28, 96, 96, 96, 3),
(85, 29, 96, 96, 96, 1),
(86, 29, 96, 96, 96, 2),
(87, 29, 96, 96, 96, 3),
(88, 30, 96, 96, 96, 1),
(89, 30, 96, 96, 96, 2),
(90, 30, 96, 96, 96, 3),
(91, 31, 0, 0, 0, 1),
(92, 31, 0, 0, 0, 2),
(93, 31, 0, 0, 0, 3),
(94, 32, 0, 0, 0, 1),
(95, 32, 0, 0, 0, 2),
(96, 32, 0, 0, 0, 3),
(97, 33, 0, 0, 0, 1),
(98, 33, 0, 0, 0, 2),
(99, 33, 0, 0, 0, 3),
(100, 34, 0, 0, 0, 1),
(101, 34, 0, 0, 0, 2),
(102, 34, 0, 0, 0, 3),
(103, 35, 0, 0, 0, 1),
(104, 35, 0, 0, 0, 2),
(105, 35, 0, 0, 0, 3),
(106, 36, 0, 0, 0, 1),
(107, 36, 0, 0, 0, 2),
(108, 36, 0, 0, 0, 3),
(109, 37, 0, 0, 0, 1),
(110, 37, 0, 0, 0, 2),
(111, 37, 0, 0, 0, 3),
(112, 38, 0, 0, 0, 1),
(113, 38, 0, 0, 0, 2),
(114, 38, 0, 0, 0, 3),
(115, 39, 0, 0, 0, 1),
(116, 39, 0, 0, 0, 2),
(117, 39, 0, 0, 0, 3),
(118, 40, 0, 0, 0, 1),
(119, 40, 0, 0, 0, 2),
(120, 40, 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `operacion` varchar(90) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_usuario`, `operacion`, `fecha`, `hora`) VALUES
(1, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-06-24', '07:09'),
(2, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-26', '09:59'),
(3, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-26', '10:05'),
(4, 4, 'INICIO SESION EL USUARIO CON ID:4', '2017-06-26', '11:02'),
(5, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-26', '11:21'),
(6, 5, 'INICIO SESION EL USUARIO CON ID:5', '2017-06-26', '11:33'),
(7, 5, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:5', '2017-06-26', '03:45'),
(8, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-26', '11:46'),
(9, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-06-26', '03:42'),
(10, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-26', '03:42'),
(11, 6, 'INICIO SESION EL USUARIO CON ID:6', '2017-06-26', '03:46'),
(12, 6, 'INICIO SESION EL USUARIO CON ID:6', '2017-06-26', '03:47'),
(13, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-06-26', '03:49'),
(14, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-06-27', '01:23'),
(15, 8, 'EL USUARIO QUE ELIMINO EL PERIODO ACADEMICO PARA LA INSCRIPCION DE PROYECTOS TIENE ESTE ID', '2017-06-27', '01:24'),
(16, 8, 'EL USUARIO QUE ELIMINO EL PERIODO ACADEMICO PARA LA INSCRIPCION DE PROYECTOS TIENE ESTE ID', '2017-06-27', '01:24'),
(17, 9, 'INICIO SESION EL USUARIO CON ID:9', '2017-06-27', '01:29'),
(18, 11, 'INICIO SESION EL USUARIO CON ID:11', '2017-06-27', '01:34'),
(19, 9, 'INICIO SESION EL USUARIO CON ID:9', '2017-06-27', '01:37'),
(20, 9, 'EL USUARIO QUE OBSERVO LOS DETALLES DE SU PROYECTO TIENE ESTE ID:9', '2017-06-27', '02:12'),
(21, 11, 'INICIO SESION EL USUARIO CON ID:11', '2017-06-27', '02:13'),
(22, 10, 'INICIO SESION EL USUARIO CON ID:10', '2017-06-27', '02:18'),
(23, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-27', '02:18'),
(24, 12, 'INICIO SESION EL USUARIO CON ID:12', '2017-06-27', '02:21'),
(25, 13, 'INICIO SESION EL USUARIO CON ID:13', '2017-06-27', '02:41'),
(26, 14, 'INICIO SESION EL USUARIO CON ID:14', '2017-06-27', '10:43'),
(27, 14, 'INICIO SESION EL USUARIO CON ID:14', '2017-06-27', '10:46'),
(28, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-27', '11:04'),
(29, 2, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:2', '2017-06-27', '03:09'),
(30, 14, 'INICIO SESION EL USUARIO CON ID:14', '2017-06-27', '11:19'),
(31, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-27', '11:23'),
(32, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-27', '12:41'),
(33, 9, 'INICIO SESION EL USUARIO CON ID:9', '2017-06-27', '12:44'),
(34, 16, 'INICIO SESION EL USUARIO CON ID:16', '2017-06-27', '01:05'),
(35, 18, 'INICIO SESION EL USUARIO CON ID:18', '2017-06-27', '01:47'),
(36, 21, 'INICIO SESION EL USUARIO CON ID:21', '2017-06-27', '02:34'),
(37, 23, 'INICIO SESION EL USUARIO CON ID:23', '2017-06-27', '03:04'),
(38, 25, 'INICIO SESION EL USUARIO CON ID:25', '2017-06-28', '01:37'),
(39, 28, 'INICIO SESION EL USUARIO CON ID:28', '2017-06-28', '02:12'),
(40, 30, 'INICIO SESION EL USUARIO CON ID:30', '2017-06-28', '02:43'),
(41, 32, 'INICIO SESION EL USUARIO CON ID:32', '2017-06-28', '03:12'),
(42, 34, 'INICIO SESION EL USUARIO CON ID:34', '2017-06-28', '03:32'),
(43, 36, 'INICIO SESION EL USUARIO CON ID:36', '2017-06-28', '09:08'),
(44, 39, 'INICIO SESION EL USUARIO CON ID:39', '2017-06-28', '09:47'),
(45, 40, 'INICIO SESION EL USUARIO CON ID:40', '2017-06-28', '10:39'),
(46, 43, 'INICIO SESION EL USUARIO CON ID:43', '2017-06-28', '11:30'),
(47, 46, 'INICIO SESION EL USUARIO CON ID:46', '2017-06-28', '11:57'),
(48, 48, 'INICIO SESION EL USUARIO CON ID:48', '2017-06-29', '12:27'),
(49, 51, 'INICIO SESION EL USUARIO CON ID:51', '2017-06-29', '12:53'),
(50, 53, 'INICIO SESION EL USUARIO CON ID:53', '2017-06-29', '01:41'),
(51, 56, 'INICIO SESION EL USUARIO CON ID:56', '2017-06-29', '02:10'),
(52, 58, 'INICIO SESION EL USUARIO CON ID:58', '2017-06-29', '02:58'),
(53, 9, 'INICIO SESION EL USUARIO CON ID:9', '2017-06-29', '12:21'),
(54, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-06-29', '12:22'),
(55, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-06-29', '12:29'),
(56, 2, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:2', '2017-06-29', '04:31'),
(57, 9, 'INICIO SESION EL USUARIO CON ID:9', '2017-06-29', '12:32'),
(58, 61, 'INICIO SESION EL USUARIO CON ID:61', '2017-06-29', '12:58'),
(59, 62, 'INICIO SESION EL USUARIO CON ID:62', '2017-06-29', '01:14'),
(60, 63, 'INICIO SESION EL USUARIO CON ID:63', '2017-06-29', '01:16'),
(61, 64, 'INICIO SESION EL USUARIO CON ID:64', '2017-06-29', '01:39'),
(62, 65, 'INICIO SESION EL USUARIO CON ID:65', '2017-06-29', '02:17'),
(63, 66, 'INICIO SESION EL USUARIO CON ID:66', '2017-06-29', '02:18'),
(64, 67, 'INICIO SESION EL USUARIO CON ID:67', '2017-06-29', '02:25'),
(65, 69, 'INICIO SESION EL USUARIO CON ID:69', '2017-06-29', '03:10'),
(66, 72, 'INICIO SESION EL USUARIO CON ID:72', '2017-06-29', '06:26'),
(67, 72, 'INICIO SESION EL USUARIO CON ID:72', '2017-06-29', '06:33'),
(68, 72, 'INICIO SESION EL USUARIO CON ID:72', '2017-06-29', '06:34'),
(69, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(70, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(71, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(72, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(73, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(74, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(75, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(76, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(77, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(78, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(79, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(80, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(81, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(82, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(83, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(84, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(85, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(86, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(87, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(88, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(89, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(90, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(91, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(92, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(93, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(94, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(95, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(96, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(97, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(98, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(99, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:31'),
(100, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(101, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(102, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(103, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(104, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(105, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(106, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-06-29', '07:35'),
(107, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-01', '01:32'),
(108, 2, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:2', '2017-07-01', '05:32'),
(109, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-01', '01:32'),
(110, 2, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:2', '2017-07-01', '05:33'),
(111, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-07-03', '08:07'),
(112, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-07-04', '12:07'),
(113, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-07-03', '08:08'),
(114, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-07-03', '08:10'),
(115, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-03', '08:23'),
(116, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-03', '08:30'),
(117, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-03', '08:35'),
(118, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-03', '08:36'),
(119, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-03', '09:02'),
(120, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-03', '09:29'),
(121, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-03', '09:32'),
(122, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-03', '09:36'),
(123, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-03', '09:49'),
(124, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-04', '01:49'),
(125, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-04', '01:51'),
(126, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-07-03', '09:52'),
(127, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-03', '10:13'),
(128, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-03', '10:16'),
(129, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-07-03', '10:18'),
(130, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-07-03', '10:19'),
(131, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-03', '10:35'),
(132, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-07-03', '10:36'),
(133, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-07-04', '09:57'),
(134, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '09:59'),
(135, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '11:22'),
(136, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '11:39'),
(137, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '11:39'),
(138, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '11:52'),
(139, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-04', '11:54'),
(140, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '12:02'),
(141, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-04', '12:21'),
(142, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-07-04', '12:21'),
(143, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-05', '10:46'),
(144, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-05', '10:52'),
(145, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-05', '11:02'),
(146, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:17'),
(147, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:19'),
(148, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:19'),
(149, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:19'),
(150, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:21'),
(151, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:21'),
(152, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:23'),
(153, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:24'),
(154, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:25'),
(155, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:26'),
(156, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:53'),
(157, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:54'),
(158, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:55'),
(159, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '04:57'),
(160, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '05:06'),
(161, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-05', '01:06'),
(162, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-05', '01:07'),
(163, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-07-05', '05:10'),
(164, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-05', '01:11'),
(165, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-06', '07:59'),
(166, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-06', '09:58'),
(167, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-06', '10:18'),
(168, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-06', '10:34'),
(169, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-06', '10:37'),
(170, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-08', '07:35'),
(171, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '07:58'),
(172, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '07:59'),
(173, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:24'),
(174, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:25'),
(175, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:25'),
(176, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:26'),
(177, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:26'),
(178, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:29'),
(179, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:31'),
(180, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '08:32'),
(181, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '08:44'),
(182, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '08:47'),
(183, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:47'),
(184, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '08:48'),
(185, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '08:48'),
(186, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '08:49'),
(187, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '08:50'),
(188, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-08', '09:08'),
(189, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '09:15'),
(190, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '09:15'),
(191, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '09:16'),
(192, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-08', '09:17'),
(193, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '09:19'),
(194, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '09:19'),
(195, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '09:20'),
(196, 72, 'INICIO SESION EL USUARIO CON ID:72', '2017-07-08', '09:41'),
(197, 72, 'INICIO SESION EL USUARIO CON ID:72', '2017-07-08', '09:47'),
(198, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '09:48'),
(199, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '09:48'),
(200, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '10:08'),
(201, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '10:08'),
(202, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '10:08'),
(203, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '10:23'),
(204, 72, 'EL USUARIO QUE ASIGNO AL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:72', '2017-07-08', '10:23'),
(205, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '10:23'),
(206, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-07-08', '10:23'),
(207, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-07-08', '10:26'),
(208, 7, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:7', '2017-07-08', '10:26'),
(209, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-08', '10:26'),
(210, 75, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:75', '2017-07-08', '10:27'),
(211, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-08', '10:29'),
(212, 75, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:75', '2017-07-08', '10:44'),
(213, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-08', '10:52'),
(214, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '11:02'),
(215, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '11:07'),
(216, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '11:08'),
(217, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '11:09'),
(218, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '11:09'),
(219, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-08', '11:09'),
(220, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '11:10'),
(221, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-08', '11:10'),
(222, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '11:10'),
(223, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '11:10'),
(224, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '11:11'),
(225, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-08', '11:12'),
(226, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '11:12'),
(227, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-08', '11:12'),
(228, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-08', '11:12'),
(229, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '11:13'),
(230, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-08', '11:15'),
(231, 2, 'EL USUARIO QUE MODIFICO EL PROYECTO TIENE ESTE ID:2', '2017-07-08', '11:16'),
(232, 2, 'EL USUARIO QUE MODIFICO EL PROYECTO TIENE ESTE ID:2', '2017-07-08', '11:17'),
(233, 2, 'EL USUARIO QUE MODIFICO EL PROYECTO TIENE ESTE ID:2', '2017-07-08', '11:17'),
(234, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-08', '11:20'),
(235, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-09', '07:54'),
(236, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-09', '01:36'),
(237, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:37'),
(238, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:41'),
(239, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:41'),
(240, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:41'),
(241, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:42'),
(242, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:42'),
(243, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:43'),
(244, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:43'),
(245, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:43'),
(246, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:44'),
(247, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:47'),
(248, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:47'),
(249, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:47'),
(250, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:48'),
(251, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:48'),
(252, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:50'),
(253, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:52'),
(254, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:52'),
(255, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:52'),
(256, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:52'),
(257, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:54'),
(258, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:54'),
(259, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:55'),
(260, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:55'),
(261, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:56'),
(262, 75, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:75', '2017-07-09', '01:56'),
(263, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-09', '02:17'),
(264, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-09', '02:24'),
(265, 81, 'EL SECRETARIO QUE CONSULTO EL CODIGO DE PROYECTO TIENE ESTE ID:81', '2017-07-09', '02:24'),
(266, 81, 'EL SECRETARIO QUE CONSULTO EL CODIGO DE PROYECTO TIENE ESTE ID:81', '2017-07-09', '02:48'),
(267, 81, 'EL SECRETARIO QUE CONSULTO EL CODIGO DE PROYECTO TIENE ESTE ID:81', '2017-07-09', '02:54'),
(268, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '06:01'),
(269, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-09', '06:12'),
(270, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '07:25'),
(271, 23, 'INICIO SESION EL USUARIO CON ID:23', '2017-07-09', '09:26'),
(272, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '09:26'),
(273, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-09', '10:01'),
(274, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-07-09', '10:01'),
(275, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-07-09', '10:01'),
(276, 7, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:7', '2017-07-09', '10:02'),
(277, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-07-09', '10:02'),
(278, 75, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:75', '2017-07-09', '10:02'),
(279, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '10:03'),
(280, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-07-09', '10:07'),
(281, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-07-09', '10:07'),
(282, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '10:07'),
(283, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-09', '10:07'),
(284, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-09', '10:08'),
(285, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-09', '10:08'),
(286, 81, 'EL SECRETARIO QUE PERMITIO SUBIR EL INFORME TIENE ESTE ID:81', '2017-07-09', '10:08'),
(287, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-09', '10:08'),
(288, 81, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:81', '2017-07-09', '10:08'),
(289, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '10:08'),
(290, 2, 'EL USUARIO QUE MODIFICO EL PROYECTO TIENE ESTE ID:2', '2017-07-09', '10:10'),
(291, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-09', '10:12'),
(292, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-09', '10:29'),
(293, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-10', '05:34'),
(294, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-11', '10:58'),
(295, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-07-12', '05:35'),
(296, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-13', '01:14'),
(297, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-13', '01:14'),
(298, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-15', '09:03'),
(299, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-17', '01:05'),
(300, 3, 'INICIO SESION EL USUARIO CON ID:3', '2017-07-17', '01:25'),
(301, 3, 'EL USUARIO QUE OBSERVO LOS HORARIOS DE DEFENSA TIENE ESTE ID:3', '2017-07-17', '01:26'),
(302, 83, 'INICIO SESION EL USUARIO CON ID:83', '2017-07-18', '08:37'),
(303, 83, 'INICIO SESION EL USUARIO CON ID:83', '2017-07-18', '08:43'),
(304, 85, 'INICIO SESION EL USUARIO CON ID:85', '2017-07-18', '09:23'),
(305, 87, 'INICIO SESION EL USUARIO CON ID:87', '2017-07-18', '09:31'),
(306, 88, 'INICIO SESION EL USUARIO CON ID:88', '2017-07-18', '10:02'),
(307, 91, 'INICIO SESION EL USUARIO CON ID:91', '2017-07-18', '10:15'),
(308, 94, 'INICIO SESION EL USUARIO CON ID:94', '2017-07-18', '10:37'),
(309, 97, 'INICIO SESION EL USUARIO CON ID:97', '2017-07-18', '11:08'),
(310, 100, 'INICIO SESION EL USUARIO CON ID:100', '2017-07-18', '11:22'),
(311, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-07-18', '11:31'),
(312, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-07-23', '10:47'),
(313, 101, 'INICIO SESION EL USUARIO CON ID:101', '2017-08-28', '08:34'),
(314, 106, 'INICIO SESION EL USUARIO CON ID:106', '2017-08-28', '08:51'),
(315, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-08-28', '09:10'),
(316, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '09:16'),
(317, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-08-28', '09:20'),
(318, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-08-28', '09:24'),
(319, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-08-28', '09:48'),
(320, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '10:46'),
(321, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '10:54'),
(322, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(323, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(324, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(325, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(326, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(327, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(328, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(329, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(330, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(331, 73, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:73', '2017-08-28', '11:57'),
(332, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-08-28', '12:01'),
(333, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '12:03'),
(334, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '12:09'),
(335, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '12:15'),
(336, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '12:32'),
(337, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '12:34'),
(338, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '12:37'),
(339, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '12:39'),
(340, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '12:52'),
(341, 74, 'EL USUARIO QUE REGISTRO EL PROFESOR EN EL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:74', '2017-08-28', '01:52'),
(342, 74, 'EL USUARIO QUE REGISTRO EL PROFESOR EN EL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:74', '2017-08-28', '01:53'),
(343, 74, 'EL USUARIO QUE REGISTRO EL PROFESOR EN EL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:74', '2017-08-28', '01:53'),
(344, 74, 'EL USUARIO QUE REGISTRO EL PROFESOR EN EL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:74', '2017-08-28', '01:54'),
(345, 74, 'EL USUARIO QUE REGISTRO EL PROFESOR EN EL COMITE TECNICO DEL PROYECTO TIENE ESTE ID:74', '2017-08-28', '01:55'),
(346, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-08-28', '02:05'),
(347, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-08-28', '02:08'),
(348, 81, 'EL SECRETARIO QUE REGISTRO LA ENTREGA DE EMPASTADO TIENE ESTE ID:81', '2017-08-28', '02:30'),
(349, 81, 'EL SECRETARIO QUE REGISTRO LA ENTREGA DE EMPASTADO TIENE ESTE ID:81', '2017-08-28', '02:30'),
(350, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '02:37'),
(351, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-08-28', '06:39'),
(352, 8, 'EL USUARIO QUE REGISTRO ESTE USUARIO TIENE ESTE ID:8', '2017-08-28', '06:48'),
(353, 8, 'EL USUARIO QUE REGISTRO ESTE USUARIO TIENE ESTE ID:8', '2017-08-28', '06:50'),
(354, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '03:04'),
(355, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '03:12'),
(356, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '03:27'),
(357, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '03:29'),
(358, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '03:30'),
(359, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-08-28', '03:32'),
(360, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-08-28', '03:33'),
(361, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '03:38'),
(362, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-08-28', '08:33'),
(363, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-08-28', '08:37'),
(364, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-08-28', '04:46'),
(365, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-08-28', '04:58'),
(366, 7, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:7', '2017-08-28', '05:00'),
(367, 7, 'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:7', '2017-08-28', '05:00'),
(368, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-08-28', '05:01'),
(369, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-08-28', '05:14'),
(370, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-07', '08:09'),
(371, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '11:49'),
(372, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:50'),
(373, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:50'),
(374, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:53'),
(375, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:56'),
(376, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:57'),
(377, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:58'),
(378, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:58'),
(379, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '03:58'),
(380, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '12:22'),
(381, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-08', '12:30'),
(382, 87, 'INICIO SESION EL USUARIO CON ID:87', '2017-09-08', '12:31'),
(383, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-08', '12:38'),
(384, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '12:42'),
(385, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-08', '12:49'),
(386, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '12:52'),
(387, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '12:55'),
(388, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '12:57'),
(389, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:00'),
(390, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:00'),
(391, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:15'),
(392, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:15'),
(393, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:17'),
(394, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:19'),
(395, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '01:21'),
(396, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '01:23'),
(397, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '01:30'),
(398, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:30'),
(399, 7, 'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:7', '2017-09-08', '01:32'),
(400, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '01:32'),
(401, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '01:33'),
(402, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '01:39'),
(403, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-09-08', '01:49'),
(404, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '02:16'),
(405, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-08', '06:17'),
(406, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '02:20'),
(407, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '02:22'),
(408, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-09-08', '02:26'),
(409, 74, 'EL USUARIO QUE ASIGNO EL TUTOR DEL PROYECTO TIENE ESTE ID:74', '2017-09-08', '02:28'),
(410, 74, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:74', '2017-09-08', '06:34'),
(411, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-08', '02:37'),
(412, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-09-08', '02:46'),
(413, 7, 'INICIO SESION EL USUARIO CON ID:7', '2017-09-08', '02:47'),
(414, 75, 'INICIO SESION EL USUARIO CON ID:75', '2017-09-08', '02:48'),
(415, 76, 'INICIO SESION EL USUARIO CON ID:76', '2017-09-08', '02:52'),
(416, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-08', '02:59'),
(417, 81, 'EL USUARIO QUE ASIGNO EL CODIGO A ESTE PROYECTO TIENE ESTE ID:81', '2017-09-08', '03:26'),
(418, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-08', '03:53'),
(419, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-08', '08:21'),
(420, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '08:38'),
(421, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-09-09', '12:38'),
(422, 8, 'EL USUARIO QUE REGISTRO ESTE USUARIO TIENE ESTE ID:8', '2017-09-09', '12:46'),
(423, 107, 'INICIO SESION EL USUARIO CON ID:107', '2017-09-08', '08:46'),
(424, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '08:50'),
(425, 8, 'EL USUARIO QUE REGISTRO ESTE USUARIO TIENE ESTE ID:8', '2017-09-09', '12:50'),
(426, 108, 'INICIO SESION EL USUARIO CON ID:108', '2017-09-08', '08:51'),
(427, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '09:01'),
(428, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '09:03'),
(429, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '09:04'),
(430, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '09:24'),
(431, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '09:26'),
(432, 1, 'EL USUARIO QUE CONSULTO LAS COMUNIDADES TIENE ESTE ID:1', '2017-09-08', '09:27'),
(433, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '09:32'),
(434, 8, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:8', '2017-09-09', '01:50'),
(435, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-08', '09:50'),
(436, 1, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:1', '2017-09-09', '01:51'),
(437, 74, 'INICIO SESION EL USUARIO CON ID:74', '2017-09-08', '09:51'),
(438, 74, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:74', '2017-09-09', '01:51'),
(439, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-09-08', '09:52'),
(440, 73, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:73', '2017-09-09', '01:52'),
(441, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-08', '09:52'),
(442, 81, 'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:81', '2017-09-09', '01:52'),
(443, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '10:12'),
(444, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-08', '10:46'),
(445, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-09-09', '02:47'),
(446, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-08', '11:14'),
(447, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-09', '12:04'),
(448, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-09', '12:04'),
(449, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-09', '12:05'),
(450, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-09', '12:14'),
(451, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-09-09', '04:15'),
(452, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-09-09', '04:17'),
(453, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-09-09', '04:18'),
(454, 8, 'EL USUARIO QUE AGREGO ESTUDIANTES TIENE ESTE ID:8', '2017-09-09', '04:18'),
(455, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-09', '12:47'),
(456, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-09', '12:53'),
(457, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-09', '01:06'),
(458, 2, 'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:07'),
(459, 2, 'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:07'),
(460, 2, 'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:07'),
(461, 2, 'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:08'),
(462, 2, 'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:08'),
(463, 2, 'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:08'),
(464, 2, 'EL USUARIO QUE MODIFICO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:09'),
(465, 2, 'EL USUARIO QUE MODIFICO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:10'),
(466, 2, 'EL USUARIO QUE MODIFICO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:11'),
(467, 2, 'EL USUARIO QUE MODIFICO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:11'),
(468, 2, 'EL USUARIO QUE MODIFICO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:12'),
(469, 2, 'EL USUARIO QUE MODIFICO ESTA ASISTENCIA TIENE ESTE ID:2', '2017-09-09', '05:13'),
(470, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-09-09', '01:20'),
(471, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(472, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(473, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(474, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(475, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(476, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(477, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(478, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(479, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(480, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(481, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:28'),
(482, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:33'),
(483, 73, 'EL USUARIO QUE OTORGO PRIVILEGIOS AL PROYECTO TIENE ESTE ID:73', '2017-09-09', '01:33'),
(484, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-09', '02:09'),
(485, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-17', '09:19'),
(486, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '09:22'),
(487, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '10:22'),
(488, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '11:52'),
(489, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '11:54'),
(490, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '02:37'),
(491, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '02:39'),
(492, 1, 'INICIO SESION EL USUARIO CON ID:1', '2017-09-17', '04:04'),
(493, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-09-17', '04:17'),
(494, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '04:35'),
(495, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '04:40'),
(496, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-17', '05:25'),
(497, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '05:34'),
(498, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-17', '09:10'),
(499, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-18', '10:34'),
(500, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-09-18', '01:00'),
(501, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-09-19', '05:29'),
(502, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-10-17', '08:27'),
(503, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-17', '08:29'),
(504, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-10-17', '08:40'),
(505, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-17', '08:40'),
(506, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-10-17', '09:31'),
(507, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-17', '09:32'),
(508, 8, 'INICIO SESION EL USUARIO CON ID:8', '2017-10-17', '09:34'),
(509, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-17', '09:35'),
(510, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-10-18', '07:46'),
(511, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-18', '07:46'),
(512, 100, 'INICIO SESION EL USUARIO CON ID:100', '2017-10-18', '07:55'),
(513, 107, 'INICIO SESION EL USUARIO CON ID:107', '2017-10-18', '08:03'),
(514, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-18', '08:25'),
(515, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '09:59'),
(516, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:01'),
(517, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:01'),
(518, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:03'),
(519, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:06'),
(520, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:24'),
(521, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:29'),
(522, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:55'),
(523, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:55'),
(524, 73, 'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:73', '2017-10-18', '10:57'),
(525, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-18', '11:10'),
(526, 73, 'INICIO SESION EL USUARIO CON ID:73', '2017-10-18', '11:11'),
(527, 2, 'INICIO SESION EL USUARIO CON ID:2', '2017-10-18', '11:45'),
(528, 81, 'INICIO SESION EL USUARIO CON ID:81', '2017-10-18', '11:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_investigacion`
--

CREATE TABLE `lineas_investigacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineas_investigacion`
--

INSERT INTO `lineas_investigacion` (`id`, `nombre`) VALUES
(1, 'Administración de la producción en los modelos socio-productivos'),
(2, 'Planificación y gestión de procesos'),
(3, 'Gestión De procesos contables financieros'),
(4, 'Gestión del talento humano'),
(5, 'Gestión de control administrativo'),
(6, 'Economía, productividad y desarrollo endógeno sustentable y sostenible'),
(7, 'Marco jurídico de los procesos administrativos'),
(8, 'Gestión pública'),
(9, 'Software libre'),
(10, 'Inteligencia artificial'),
(11, 'Programación avanzada'),
(12, 'Seguridad en redes de computadoras'),
(13, 'Software educativo'),
(14, 'Calidad en el desarrollo de sistemas informáticos'),
(15, 'Plataforma tecnológicas en educación'),
(16, 'Administración y minería de datos'),
(17, 'Seguridad informática'),
(18, 'LGI Gestión de aplicaciones informáticas'),
(19, 'Diseño y manifacturas de elementos mecánicos'),
(20, 'Desarrollo y aplicación de alternativas energíticas sustentables'),
(21, 'Desarrollo y aplicación de la tecnología para el tratamiento de desechos sólidos'),
(22, 'Perfeccionamiento de sistemas de mantenimiento'),
(23, 'Desarrollo de equipos y material didáctico y para laboratorios'),
(24, 'Uso y manejo de las tecnologías de información y comunicación (tics) en la formación universitaria del sector'),
(25, 'Diseño y desarrollo de sistemas de transporte'),
(26, 'Diseño y construcción de equipos para el procesamiento y preservación de alimentos'),
(27, 'Diseño y construcción de equipos, herramientas e instrumentos para el equipamiento agrícola y agroindustrial'),
(28, 'Diseño y construcción de equipos, herramientas e instrumentos para el equipamiento de hospitales y centros de salud'),
(29, 'Promoción de la Seguridad y Salud en el Trabajo'),
(30, 'Prevención de Accidentes Laborales y Enfermedades Ocupacionales'),
(31, 'Atención Integral para la Garantía y Restitución de los Derechos de los Trabajadores y Trabajadores'),
(32, 'Análisis de fallas'),
(33, 'Ahorro y energía'),
(34, 'Diseño y fabricación para el mantenimiento'),
(35, 'Cultura de mantenimiento y calidad de servicio'),
(36, 'Instrumentación médica'),
(37, 'Ingeniería en instrumentación y control de procesos'),
(38, 'Robótica, automatización y telemetría'),
(39, 'Gestión de energía eléctrica'),
(40, 'Eficiencia energética'),
(41, 'Energías alternativas'),
(42, 'Innovación tecnológica'),
(43, 'Sistemas eléctricos de potencia'),
(44, 'Automatización y control'),
(45, 'Sistemas de Comunicaciones'),
(46, 'Sistemas Electrónicos'),
(47, 'Sistemas de Radiocomunicaciones'),
(48, 'Redes Telemáticas y Voz IP'),
(49, 'Calidad de bienes, servicios y procesos en las organizaciones y comunidades'),
(50, 'Calidad del ambiente'),
(51, 'Calidad e inocuidad de bienes y servicios en las organizaciones'),
(52, 'Innovación en calidad y ambiente'),
(53, 'Aprovechamiento de la Biodiversidad en Sistemas de Producción Agrícola'),
(54, 'Utilización de Materiales Forrajeros'),
(55, 'Producción y Evaluación de Bioinsumos'),
(56, 'Control contable en las entidades públicas y privadas'),
(57, 'Mejoramiento de los procesos contables relacionados con la producción, comercialización y distribución en empresas de producción social'),
(58, 'Modelo de gestión contable y financiero que fomente valores humanísticos y la ética del nuevo ciudadano'),
(59, 'Fortalecimiento y modernización del sistema tributario venezolano'),
(60, 'Fundamentación epistemológica de la contabilidad como ciencia'),
(61, 'Diseño electrónico de equipos médicos, industriales, entretenimiento, de servicios entre otros'),
(62, 'Software de diseño, simulación y aplicación'),
(63, 'Telecomunicaciones: radiodifusión, telefonía, servicios móviles, fibra óptica y televisión'),
(64, 'Procesamiento Digital de señales: procesamiento de voz, imagen, audio, señales biomédicas, entre otras'),
(65, 'Tele-educación y tele-medicina: plataformas de aprendizaje a distancia, monitoreo médico a distancia y video-conferencias'),
(66, 'Sistemas Alternativos para la Rotación de Cultivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `municipio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `id_estado`, `municipio`) VALUES
(1, 1, 'Alto Orinoco'),
(2, 1, 'Atabapo'),
(3, 1, 'Atures'),
(4, 1, 'Autana'),
(5, 1, 'Manapiare'),
(6, 1, 'Maroa'),
(7, 1, 'Río Negro'),
(8, 2, 'Anaco'),
(9, 2, 'Aragua'),
(10, 2, 'Manuel Ezequiel Bruzual'),
(11, 2, 'Diego Bautista Urbaneja'),
(12, 2, 'Fernando Peñalver'),
(13, 2, 'Francisco Del Carmen Carvajal'),
(14, 2, 'General Sir Arthur McGregor'),
(15, 2, 'Guanta'),
(16, 2, 'Independencia'),
(17, 2, 'José Gregorio Monagas'),
(18, 2, 'Juan Antonio Sotillo'),
(19, 2, 'Juan Manuel Cajigal'),
(20, 2, 'Libertad'),
(21, 2, 'Francisco de Miranda'),
(22, 2, 'Pedro María Freites'),
(23, 2, 'Píritu'),
(24, 2, 'San José de Guanipa'),
(25, 2, 'San Juan de Capistrano'),
(26, 2, 'Santa Ana'),
(27, 2, 'Simón Bolívar'),
(28, 2, 'Simón Rodríguez'),
(29, 3, 'Achaguas'),
(30, 3, 'Biruaca'),
(31, 3, 'Muñóz'),
(32, 3, 'Páez'),
(33, 3, 'Pedro Camejo'),
(34, 3, 'Rómulo Gallegos'),
(35, 3, 'San Fernando'),
(36, 4, 'Atanasio Girardot'),
(37, 4, 'Bolívar'),
(38, 4, 'Camatagua'),
(39, 4, 'Francisco Linares Alcántara'),
(40, 4, 'José Ángel Lamas'),
(41, 4, 'José Félix Ribas'),
(42, 4, 'José Rafael Revenga'),
(43, 4, 'Libertador'),
(44, 4, 'Mario Briceño Iragorry'),
(45, 4, 'Ocumare de la Costa de Oro'),
(46, 4, 'San Casimiro'),
(47, 4, 'San Sebastián'),
(48, 4, 'Santiago Mariño'),
(49, 4, 'Santos Michelena'),
(50, 4, 'Sucre'),
(51, 4, 'Tovar'),
(52, 4, 'Urdaneta'),
(53, 4, 'Zamora'),
(54, 5, 'Alberto Arvelo Torrealba'),
(55, 5, 'Andrés Eloy Blanco'),
(56, 5, 'Antonio José de Sucre'),
(57, 5, 'Arismendi'),
(58, 5, 'Barinas'),
(59, 5, 'Bolívar'),
(60, 5, 'Cruz Paredes'),
(61, 5, 'Ezequiel Zamora'),
(62, 5, 'Obispos'),
(63, 5, 'Pedraza'),
(64, 5, 'Rojas'),
(65, 5, 'Sosa'),
(66, 6, 'Caroní'),
(67, 6, 'Cedeño'),
(68, 6, 'El Callao'),
(69, 6, 'Gran Sabana'),
(70, 6, 'Heres'),
(71, 6, 'Piar'),
(72, 6, 'Angostura (Raúl Leoni)'),
(73, 6, 'Roscio'),
(74, 6, 'Sifontes'),
(75, 6, 'Sucre'),
(76, 6, 'Padre Pedro Chien'),
(77, 7, 'Bejuma'),
(78, 7, 'Carlos Arvelo'),
(79, 7, 'Diego Ibarra'),
(80, 7, 'Guacara'),
(81, 7, 'Juan José Mora'),
(82, 7, 'Libertador'),
(83, 7, 'Los Guayos'),
(84, 7, 'Miranda'),
(85, 7, 'Montalbán'),
(86, 7, 'Naguanagua'),
(87, 7, 'Puerto Cabello'),
(88, 7, 'San Diego'),
(89, 7, 'San Joaquín'),
(90, 7, 'Valencia'),
(91, 8, 'Anzoátegui'),
(92, 8, 'Tinaquillo'),
(93, 8, 'Girardot'),
(94, 8, 'Lima Blanco'),
(95, 8, 'Pao de San Juan Bautista'),
(96, 8, 'Ricaurte'),
(97, 8, 'Rómulo Gallegos'),
(98, 8, 'San Carlos'),
(99, 8, 'Tinaco'),
(100, 9, 'Antonio Díaz'),
(101, 9, 'Casacoima'),
(102, 9, 'Pedernales'),
(103, 9, 'Tucupita'),
(104, 10, 'Acosta'),
(105, 10, 'Bolívar'),
(106, 10, 'Buchivacoa'),
(107, 10, 'Cacique Manaure'),
(108, 10, 'Carirubana'),
(109, 10, 'Colina'),
(110, 10, 'Dabajuro'),
(111, 10, 'Democracia'),
(112, 10, 'Falcón'),
(113, 10, 'Federación'),
(114, 10, 'Jacura'),
(115, 10, 'José Laurencio Silva'),
(116, 10, 'Los Taques'),
(117, 10, 'Mauroa'),
(118, 10, 'Miranda'),
(119, 10, 'Monseñor Iturriza'),
(120, 10, 'Palmasola'),
(121, 10, 'Petit'),
(122, 10, 'Píritu'),
(123, 10, 'San Francisco'),
(124, 10, 'Sucre'),
(125, 10, 'Tocópero'),
(126, 10, 'Unión'),
(127, 10, 'Urumaco'),
(128, 10, 'Zamora'),
(129, 11, 'Camaguán'),
(130, 11, 'Chaguaramas'),
(131, 11, 'El Socorro'),
(132, 11, 'José Félix Ribas'),
(133, 11, 'José Tadeo Monagas'),
(134, 11, 'Juan Germán Roscio'),
(135, 11, 'Julián Mellado'),
(136, 11, 'Las Mercedes'),
(137, 11, 'Leonardo Infante'),
(138, 11, 'Pedro Zaraza'),
(139, 11, 'Ortíz'),
(140, 11, 'San Gerónimo de Guayabal'),
(141, 11, 'San José de Guaribe'),
(142, 11, 'Santa María de Ipire'),
(143, 11, 'Sebastián Francisco de Miranda'),
(144, 12, 'Andrés Eloy Blanco'),
(145, 12, 'Crespo'),
(146, 12, 'Iribarren'),
(147, 12, 'Jiménez'),
(148, 12, 'Morán'),
(149, 12, 'Palavecino'),
(150, 12, 'Simón Planas'),
(151, 12, 'Torres'),
(152, 12, 'Urdaneta'),
(179, 13, 'Alberto Adriani'),
(180, 13, 'Andrés Bello'),
(181, 13, 'Antonio Pinto Salinas'),
(182, 13, 'Aricagua'),
(183, 13, 'Arzobispo Chacón'),
(184, 13, 'Campo Elías'),
(185, 13, 'Caracciolo Parra Olmedo'),
(186, 13, 'Cardenal Quintero'),
(187, 13, 'Guaraque'),
(188, 13, 'Julio César Salas'),
(189, 13, 'Justo Briceño'),
(190, 13, 'Libertador'),
(191, 13, 'Miranda'),
(192, 13, 'Obispo Ramos de Lora'),
(193, 13, 'Padre Noguera'),
(194, 13, 'Pueblo Llano'),
(195, 13, 'Rangel'),
(196, 13, 'Rivas Dávila'),
(197, 13, 'Santos Marquina'),
(198, 13, 'Sucre'),
(199, 13, 'Tovar'),
(200, 13, 'Tulio Febres Cordero'),
(201, 13, 'Zea'),
(223, 14, 'Acevedo'),
(224, 14, 'Andrés Bello'),
(225, 14, 'Baruta'),
(226, 14, 'Brión'),
(227, 14, 'Buroz'),
(228, 14, 'Carrizal'),
(229, 14, 'Chacao'),
(230, 14, 'Cristóbal Rojas'),
(231, 14, 'El Hatillo'),
(232, 14, 'Guaicaipuro'),
(233, 14, 'Independencia'),
(234, 14, 'Lander'),
(235, 14, 'Los Salias'),
(236, 14, 'Páez'),
(237, 14, 'Paz Castillo'),
(238, 14, 'Pedro Gual'),
(239, 14, 'Plaza'),
(240, 14, 'Simón Bolívar'),
(241, 14, 'Sucre'),
(242, 14, 'Urdaneta'),
(243, 14, 'Zamora'),
(258, 15, 'Acosta'),
(259, 15, 'Aguasay'),
(260, 15, 'Bolívar'),
(261, 15, 'Caripe'),
(262, 15, 'Cedeño'),
(263, 15, 'Ezequiel Zamora'),
(264, 15, 'Libertador'),
(265, 15, 'Maturín'),
(266, 15, 'Piar'),
(267, 15, 'Punceres'),
(268, 15, 'Santa Bárbara'),
(269, 15, 'Sotillo'),
(270, 15, 'Uracoa'),
(271, 16, 'Antolín del Campo'),
(272, 16, 'Arismendi'),
(273, 16, 'García'),
(274, 16, 'Gómez'),
(275, 16, 'Maneiro'),
(276, 16, 'Marcano'),
(277, 16, 'Mariño'),
(278, 16, 'Península de Macanao'),
(279, 16, 'Tubores'),
(280, 16, 'Villalba'),
(281, 16, 'Díaz'),
(282, 17, 'Agua Blanca'),
(283, 17, 'Araure'),
(284, 17, 'Esteller'),
(285, 17, 'Guanare'),
(286, 17, 'Guanarito'),
(287, 17, 'Monseñor José Vicente de Unda'),
(288, 17, 'Ospino'),
(289, 17, 'Páez'),
(290, 17, 'Papelón'),
(291, 17, 'San Genaro de Boconoíto'),
(292, 17, 'San Rafael de Onoto'),
(293, 17, 'Santa Rosalía'),
(294, 17, 'Sucre'),
(295, 17, 'Turén'),
(296, 18, 'Andrés Eloy Blanco'),
(297, 18, 'Andrés Mata'),
(298, 18, 'Arismendi'),
(299, 18, 'Benítez'),
(300, 18, 'Bermúdez'),
(301, 18, 'Bolívar'),
(302, 18, 'Cajigal'),
(303, 18, 'Cruz Salmerón Acosta'),
(304, 18, 'Libertador'),
(305, 18, 'Mariño'),
(306, 18, 'Mejía'),
(307, 18, 'Montes'),
(308, 18, 'Ribero'),
(309, 18, 'Sucre'),
(310, 18, 'Valdéz'),
(341, 19, 'Andrés Bello'),
(342, 19, 'Antonio Rómulo Costa'),
(343, 19, 'Ayacucho'),
(344, 19, 'Bolívar'),
(345, 19, 'Cárdenas'),
(346, 19, 'Córdoba'),
(347, 19, 'Fernández Feo'),
(348, 19, 'Francisco de Miranda'),
(349, 19, 'García de Hevia'),
(350, 19, 'Guásimos'),
(351, 19, 'Independencia'),
(352, 19, 'Jáuregui'),
(353, 19, 'José María Vargas'),
(354, 19, 'Junín'),
(355, 19, 'Libertad'),
(356, 19, 'Libertador'),
(357, 19, 'Lobatera'),
(358, 19, 'Michelena'),
(359, 19, 'Panamericano'),
(360, 19, 'Pedro María Ureña'),
(361, 19, 'Rafael Urdaneta'),
(362, 19, 'Samuel Darío Maldonado'),
(363, 19, 'San Cristóbal'),
(364, 19, 'Seboruco'),
(365, 19, 'Simón Rodríguez'),
(366, 19, 'Sucre'),
(367, 19, 'Torbes'),
(368, 19, 'Uribante'),
(369, 19, 'San Judas Tadeo'),
(370, 20, 'Andrés Bello'),
(371, 20, 'Boconó'),
(372, 20, 'Bolívar'),
(373, 20, 'Candelaria'),
(374, 20, 'Carache'),
(375, 20, 'Escuque'),
(376, 20, 'José Felipe Márquez Cañizalez'),
(377, 20, 'Juan Vicente Campos Elías'),
(378, 20, 'La Ceiba'),
(379, 20, 'Miranda'),
(380, 20, 'Monte Carmelo'),
(381, 20, 'Motatán'),
(382, 20, 'Pampán'),
(383, 20, 'Pampanito'),
(384, 20, 'Rafael Rangel'),
(385, 20, 'San Rafael de Carvajal'),
(386, 20, 'Sucre'),
(387, 20, 'Trujillo'),
(388, 20, 'Urdaneta'),
(389, 20, 'Valera'),
(390, 21, 'Vargas'),
(391, 22, 'Arístides Bastidas'),
(392, 22, 'Bolívar'),
(407, 22, 'Bruzual'),
(408, 22, 'Cocorote'),
(409, 22, 'Independencia'),
(410, 22, 'José Antonio Páez'),
(411, 22, 'La Trinidad'),
(412, 22, 'Manuel Monge'),
(413, 22, 'Nirgua'),
(414, 22, 'Peña'),
(415, 22, 'San Felipe'),
(416, 22, 'Sucre'),
(417, 22, 'Urachiche'),
(418, 22, 'José Joaquín Veroes'),
(441, 23, 'Almirante Padilla'),
(442, 23, 'Baralt'),
(443, 23, 'Cabimas'),
(444, 23, 'Catatumbo'),
(445, 23, 'Colón'),
(446, 23, 'Francisco Javier Pulgar'),
(447, 23, 'Páez'),
(448, 23, 'Jesús Enrique Losada'),
(449, 23, 'Jesús María Semprún'),
(450, 23, 'La Cañada de Urdaneta'),
(451, 23, 'Lagunillas'),
(452, 23, 'Machiques de Perijá'),
(453, 23, 'Mara'),
(454, 23, 'Maracaibo'),
(455, 23, 'Miranda'),
(456, 23, 'Rosario de Perijá'),
(457, 23, 'San Francisco'),
(458, 23, 'Santa Rita'),
(459, 23, 'Simón Bolívar'),
(460, 23, 'Sucre'),
(461, 23, 'Valmore Rodríguez'),
(462, 24, 'Libertador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opc_tutores`
--

CREATE TABLE `opc_tutores` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `cont_proy_prof` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opc_tutores`
--

INSERT INTO `opc_tutores` (`id`, `id_profesor`, `id_anio`, `cont_proy_prof`) VALUES
(1, 1, 5, 0),
(2, 2, 5, 0),
(3, 3, 5, 0),
(4, 4, 5, 2),
(5, 5, 5, 0),
(6, 6, 5, 5),
(7, 7, 5, 0),
(8, 8, 5, 0),
(9, 9, 5, 0),
(10, 10, 5, 0),
(11, 11, 5, 0),
(12, 12, 5, 0),
(13, 13, 5, 0),
(14, 14, 5, 1),
(15, 15, 5, 0),
(16, 16, 5, 0),
(17, 17, 5, 0),
(18, 18, 5, 0),
(19, 19, 5, 0),
(20, 20, 5, 0),
(21, 21, 5, 0),
(22, 22, 5, 0),
(23, 23, 5, 0),
(24, 24, 5, 0),
(25, 25, 5, 0),
(26, 26, 5, 0),
(27, 27, 5, 1),
(28, 28, 5, 0),
(29, 29, 5, 0),
(30, 30, 5, 0),
(31, 31, 5, 0),
(32, 32, 5, 4),
(33, 33, 5, 0),
(34, 34, 5, 2),
(35, 35, 5, 0),
(36, 36, 5, 1),
(73, 37, 5, 0),
(74, 38, 5, 0),
(75, 39, 5, 0),
(76, 40, 5, 0),
(77, 41, 5, 0),
(78, 42, 5, 0),
(79, 43, 5, 0),
(80, 44, 5, 0),
(81, 45, 5, 0),
(82, 46, 5, 0),
(83, 47, 5, 2),
(84, 48, 5, 0),
(86, 49, 5, 0),
(87, 50, 5, 0),
(88, 51, 5, 0),
(89, 52, 5, 0),
(90, 53, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `nombre`) VALUES
(1, 'Registrar Proyecto'),
(2, 'Registrar Asistencias'),
(3, 'Registrar Factibilidad'),
(4, 'Registrar Presentaciones'),
(5, 'Registrar Evaluaciones'),
(6, 'Registrar Socializacion'),
(7, 'Registrar Evaluacion Definitiva'),
(8, 'Registrar Culminacion'),
(9, 'Registrar Codigos'),
(10, 'Registrar Documentos'),
(11, 'Subir Archivos'),
(12, 'Beca Trabajo'),
(13, 'Asignar Comite Tecnico'),
(14, 'Asignar Comite Tutores'),
(15, 'Opc Comite Tecnico'),
(16, 'Opc Comite Tutores'),
(17, 'Modificar Documentos'),
(18, 'Consultar Proyecto'),
(19, 'Consultar Factibilidad'),
(20, 'Consultar Comunidades'),
(21, 'Consultar Evaluaciones'),
(22, 'Consultar Presentaciones'),
(23, 'Consultar Culminacion'),
(24, 'Consultar Jurados'),
(25, 'Consultar Estadisticas'),
(26, 'Consultar Prof Comite'),
(27, 'Consultar Prof Tutores'),
(28, 'Consultar Codigos'),
(29, 'Retirar Proyecto'),
(30, 'Generar Solvencias'),
(31, 'Habilitar Archivos'),
(32, 'Consultar Asistencias'),
(33, 'Habilitar Modificaciones'),
(34, 'Habilitar Cuenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE `parroquias` (
  `id` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `parroquia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`id`, `id_municipio`, `parroquia`) VALUES
(1, 1, 'Alto Orinoco'),
(2, 1, 'Huachamacare Acanaña'),
(3, 1, 'Marawaka Toky Shamanaña'),
(4, 1, 'Mavaka Mavaka'),
(5, 1, 'Sierra Parima Parimabé'),
(6, 2, 'Ucata Laja Lisa'),
(7, 2, 'Yapacana Macuruco'),
(8, 2, 'Caname Guarinuma'),
(9, 3, 'Fernando Girón Tovar'),
(10, 3, 'Luis Alberto Gómez'),
(11, 3, 'Pahueña Limón de Parhueña'),
(12, 3, 'Platanillal Platanillal'),
(13, 4, 'Samariapo'),
(14, 4, 'Sipapo'),
(15, 4, 'Munduapo'),
(16, 4, 'Guayapo'),
(17, 5, 'Alto Ventuari'),
(18, 5, 'Medio Ventuari'),
(19, 5, 'Bajo Ventuari'),
(20, 6, 'Victorino'),
(21, 6, 'Comunidad'),
(22, 7, 'Casiquiare'),
(23, 7, 'Cocuy'),
(24, 7, 'San Carlos de Río Negro'),
(25, 7, 'Solano'),
(26, 8, 'Anaco'),
(27, 8, 'San Joaquín'),
(28, 9, 'Cachipo'),
(29, 9, 'Aragua de Barcelona'),
(30, 11, 'Lechería'),
(31, 11, 'El Morro'),
(32, 12, 'Puerto Píritu'),
(33, 12, 'San Miguel'),
(34, 12, 'Sucre'),
(35, 13, 'Valle de Guanape'),
(36, 13, 'Santa Bárbara'),
(37, 14, 'El Chaparro'),
(38, 14, 'Tomás Alfaro'),
(39, 14, 'Calatrava'),
(40, 15, 'Guanta'),
(41, 15, 'Chorrerón'),
(42, 16, 'Mamo'),
(43, 16, 'Soledad'),
(44, 17, 'Mapire'),
(45, 17, 'Piar'),
(46, 17, 'Santa Clara'),
(47, 17, 'San Diego de Cabrutica'),
(48, 17, 'Uverito'),
(49, 17, 'Zuata'),
(50, 18, 'Puerto La Cruz'),
(51, 18, 'Pozuelos'),
(52, 19, 'Onoto'),
(53, 19, 'San Pablo'),
(54, 20, 'San Mateo'),
(55, 20, 'El Carito'),
(56, 20, 'Santa Inés'),
(57, 20, 'La Romereña'),
(58, 21, 'Atapirire'),
(59, 21, 'Boca del Pao'),
(60, 21, 'El Pao'),
(61, 21, 'Pariaguán'),
(62, 22, 'Cantaura'),
(63, 22, 'Libertador'),
(64, 22, 'Santa Rosa'),
(65, 22, 'Urica'),
(66, 23, 'Píritu'),
(67, 23, 'San Francisco'),
(68, 24, 'San José de Guanipa'),
(69, 25, 'Boca de Uchire'),
(70, 25, 'Boca de Chávez'),
(71, 26, 'Pueblo Nuevo'),
(72, 26, 'Santa Ana'),
(73, 27, 'Bergatín'),
(74, 27, 'Caigua'),
(75, 27, 'El Carmen'),
(76, 27, 'El Pilar'),
(77, 27, 'Naricual'),
(78, 27, 'San Crsitóbal'),
(79, 28, 'Edmundo Barrios'),
(80, 28, 'Miguel Otero Silva'),
(81, 29, 'Achaguas'),
(82, 29, 'Apurito'),
(83, 29, 'El Yagual'),
(84, 29, 'Guachara'),
(85, 29, 'Mucuritas'),
(86, 29, 'Queseras del medio'),
(87, 30, 'Biruaca'),
(88, 31, 'Bruzual'),
(89, 31, 'Mantecal'),
(90, 31, 'Quintero'),
(91, 31, 'Rincón Hondo'),
(92, 31, 'San Vicente'),
(93, 32, 'Guasdualito'),
(94, 32, 'Aramendi'),
(95, 32, 'El Amparo'),
(96, 32, 'San Camilo'),
(97, 32, 'Urdaneta'),
(98, 33, 'San Juan de Payara'),
(99, 33, 'Codazzi'),
(100, 33, 'Cunaviche'),
(101, 34, 'Elorza'),
(102, 34, 'La Trinidad'),
(103, 35, 'San Fernando'),
(104, 35, 'El Recreo'),
(105, 35, 'Peñalver'),
(106, 35, 'San Rafael de Atamaica'),
(107, 36, 'Pedro José Ovalles'),
(108, 36, 'Joaquín Crespo'),
(109, 36, 'José Casanova Godoy'),
(110, 36, 'Madre María de San José'),
(111, 36, 'Andrés Eloy Blanco'),
(112, 36, 'Los Tacarigua'),
(113, 36, 'Las Delicias'),
(114, 36, 'Choroní'),
(115, 37, 'Bolívar'),
(116, 38, 'Camatagua'),
(117, 38, 'Carmen de Cura'),
(118, 39, 'Santa Rita'),
(119, 39, 'Francisco de Miranda'),
(120, 39, 'Moseñor Feliciano González'),
(121, 40, 'Santa Cruz'),
(122, 41, 'José Félix Ribas'),
(123, 41, 'Castor Nieves Ríos'),
(124, 41, 'Las Guacamayas'),
(125, 41, 'Pao de Zárate'),
(126, 41, 'Zuata'),
(127, 42, 'José Rafael Revenga'),
(128, 43, 'Palo Negro'),
(129, 43, 'San Martín de Porres'),
(130, 44, 'El Limón'),
(131, 44, 'Caña de Azúcar'),
(132, 45, 'Ocumare de la Costa'),
(133, 46, 'San Casimiro'),
(134, 46, 'Güiripa'),
(135, 46, 'Ollas de Caramacate'),
(136, 46, 'Valle Morín'),
(137, 47, 'San Sebastían'),
(138, 48, 'Turmero'),
(139, 48, 'Arevalo Aponte'),
(140, 48, 'Chuao'),
(141, 48, 'Samán de Güere'),
(142, 48, 'Alfredo Pacheco Miranda'),
(143, 49, 'Santos Michelena'),
(144, 49, 'Tiara'),
(145, 50, 'Cagua'),
(146, 50, 'Bella Vista'),
(147, 51, 'Tovar'),
(148, 52, 'Urdaneta'),
(149, 52, 'Las Peñitas'),
(150, 52, 'San Francisco de Cara'),
(151, 52, 'Taguay'),
(152, 53, 'Zamora'),
(153, 53, 'Magdaleno'),
(154, 53, 'San Francisco de Asís'),
(155, 53, 'Valles de Tucutunemo'),
(156, 53, 'Augusto Mijares'),
(157, 54, 'Sabaneta'),
(158, 54, 'Juan Antonio Rodríguez Domínguez'),
(159, 55, 'El Cantón'),
(160, 55, 'Santa Cruz de Guacas'),
(161, 55, 'Puerto Vivas'),
(162, 56, 'Ticoporo'),
(163, 56, 'Nicolás Pulido'),
(164, 56, 'Andrés Bello'),
(165, 57, 'Arismendi'),
(166, 57, 'Guadarrama'),
(167, 57, 'La Unión'),
(168, 57, 'San Antonio'),
(169, 58, 'Barinas'),
(170, 58, 'Alberto Arvelo Larriva'),
(171, 58, 'San Silvestre'),
(172, 58, 'Santa Inés'),
(173, 58, 'Santa Lucía'),
(174, 58, 'Torumos'),
(175, 58, 'El Carmen'),
(176, 58, 'Rómulo Betancourt'),
(177, 58, 'Corazón de Jesús'),
(178, 58, 'Ramón Ignacio Méndez'),
(179, 58, 'Alto Barinas'),
(180, 58, 'Manuel Palacio Fajardo'),
(181, 58, 'Juan Antonio Rodríguez Domínguez'),
(182, 58, 'Dominga Ortiz de Páez'),
(183, 59, 'Barinitas'),
(184, 59, 'Altamira de Cáceres'),
(185, 59, 'Calderas'),
(186, 60, 'Barrancas'),
(187, 60, 'El Socorro'),
(188, 60, 'Mazparrito'),
(189, 61, 'Santa Bárbara'),
(190, 61, 'Pedro Briceño Méndez'),
(191, 61, 'Ramón Ignacio Méndez'),
(192, 61, 'José Ignacio del Pumar'),
(193, 62, 'Obispos'),
(194, 62, 'Guasimitos'),
(195, 62, 'El Real'),
(196, 62, 'La Luz'),
(197, 63, 'Ciudad Bolívia'),
(198, 63, 'José Ignacio Briceño'),
(199, 63, 'José Félix Ribas'),
(200, 63, 'Páez'),
(201, 64, 'Libertad'),
(202, 64, 'Dolores'),
(203, 64, 'Santa Rosa'),
(204, 64, 'Palacio Fajardo'),
(205, 65, 'Ciudad de Nutrias'),
(206, 65, 'El Regalo'),
(207, 65, 'Puerto Nutrias'),
(208, 65, 'Santa Catalina'),
(209, 66, 'Cachamay'),
(210, 66, 'Chirica'),
(211, 66, 'Dalla Costa'),
(212, 66, 'Once de Abril'),
(213, 66, 'Simón Bolívar'),
(214, 66, 'Unare'),
(215, 66, 'Universidad'),
(216, 66, 'Vista al Sol'),
(217, 66, 'Pozo Verde'),
(218, 66, 'Yocoima'),
(219, 66, '5 de Julio'),
(220, 67, 'Cedeño'),
(221, 67, 'Altagracia'),
(222, 67, 'Ascensión Farreras'),
(223, 67, 'Guaniamo'),
(224, 67, 'La Urbana'),
(225, 67, 'Pijiguaos'),
(226, 68, 'El Callao'),
(227, 69, 'Gran Sabana'),
(228, 69, 'Ikabarú'),
(229, 70, 'Catedral'),
(230, 70, 'Zea'),
(231, 70, 'Orinoco'),
(232, 70, 'José Antonio Páez'),
(233, 70, 'Marhuanta'),
(234, 70, 'Agua Salada'),
(235, 70, 'Vista Hermosa'),
(236, 70, 'La Sabanita'),
(237, 70, 'Panapana'),
(238, 71, 'Andrés Eloy Blanco'),
(239, 71, 'Pedro Cova'),
(240, 72, 'Raúl Leoni'),
(241, 72, 'Barceloneta'),
(242, 72, 'Santa Bárbara'),
(243, 72, 'San Francisco'),
(244, 73, 'Roscio'),
(245, 73, 'Salóm'),
(246, 74, 'Sifontes'),
(247, 74, 'Dalla Costa'),
(248, 74, 'San Isidro'),
(249, 75, 'Sucre'),
(250, 75, 'Aripao'),
(251, 75, 'Guarataro'),
(252, 75, 'Las Majadas'),
(253, 75, 'Moitaco'),
(254, 76, 'Padre Pedro Chien'),
(255, 76, 'Río Grande'),
(256, 77, 'Bejuma'),
(257, 77, 'Canoabo'),
(258, 77, 'Simón Bolívar'),
(259, 78, 'Güigüe'),
(260, 78, 'Carabobo'),
(261, 78, 'Tacarigua'),
(262, 79, 'Mariara'),
(263, 79, 'Aguas Calientes'),
(264, 80, 'Ciudad Alianza'),
(265, 80, 'Guacara'),
(266, 80, 'Yagua'),
(267, 81, 'Morón'),
(268, 81, 'Yagua'),
(269, 82, 'Tocuyito'),
(270, 82, 'Independencia'),
(271, 83, 'Los Guayos'),
(272, 84, 'Miranda'),
(273, 85, 'Montalbán'),
(274, 86, 'Naguanagua'),
(275, 87, 'Bartolomé Salóm'),
(276, 87, 'Democracia'),
(277, 87, 'Fraternidad'),
(278, 87, 'Goaigoaza'),
(279, 87, 'Juan José Flores'),
(280, 87, 'Unión'),
(281, 87, 'Borburata'),
(282, 87, 'Patanemo'),
(283, 88, 'San Diego'),
(284, 89, 'San Joaquín'),
(285, 90, 'Candelaria'),
(286, 90, 'Catedral'),
(287, 90, 'El Socorro'),
(288, 90, 'Miguel Peña'),
(289, 90, 'Rafael Urdaneta'),
(290, 90, 'San Blas'),
(291, 90, 'San José'),
(292, 90, 'Santa Rosa'),
(293, 90, 'Negro Primero'),
(294, 91, 'Cojedes'),
(295, 91, 'Juan de Mata Suárez'),
(296, 92, 'Tinaquillo'),
(297, 93, 'El Baúl'),
(298, 93, 'Sucre'),
(299, 94, 'La Aguadita'),
(300, 94, 'Macapo'),
(301, 95, 'El Pao'),
(302, 96, 'El Amparo'),
(303, 96, 'Libertad de Cojedes'),
(304, 97, 'Rómulo Gallegos'),
(305, 98, 'San Carlos de Austria'),
(306, 98, 'Juan Ángel Bravo'),
(307, 98, 'Manuel Manrique'),
(308, 99, 'General en Jefe José Laurencio Silva'),
(309, 100, 'Curiapo'),
(310, 100, 'Almirante Luis Brión'),
(311, 100, 'Francisco Aniceto Lugo'),
(312, 100, 'Manuel Renaud'),
(313, 100, 'Padre Barral'),
(314, 100, 'Santos de Abelgas'),
(315, 101, 'Imataca'),
(316, 101, 'Cinco de Julio'),
(317, 101, 'Juan Bautista Arismendi'),
(318, 101, 'Manuel Piar'),
(319, 101, 'Rómulo Gallegos'),
(320, 102, 'Pedernales'),
(321, 102, 'Luis Beltrán Prieto Figueroa'),
(322, 103, 'San José (Delta Amacuro)'),
(323, 103, 'José Vidal Marcano'),
(324, 103, 'Juan Millán'),
(325, 103, 'Leonardo Ruíz Pineda'),
(326, 103, 'Mariscal Antonio José de Sucre'),
(327, 103, 'Monseñor Argimiro García'),
(328, 103, 'San Rafael (Delta Amacuro)'),
(329, 103, 'Virgen del Valle'),
(330, 10, 'Clarines'),
(331, 10, 'Guanape'),
(332, 10, 'Sabana de Uchire'),
(333, 104, 'Capadare'),
(334, 104, 'La Pastora'),
(335, 104, 'Libertador'),
(336, 104, 'San Juan de los Cayos'),
(337, 105, 'Aracua'),
(338, 105, 'La Peña'),
(339, 105, 'San Luis'),
(340, 106, 'Bariro'),
(341, 106, 'Borojó'),
(342, 106, 'Capatárida'),
(343, 106, 'Guajiro'),
(344, 106, 'Seque'),
(345, 106, 'Zazárida'),
(346, 106, 'Valle de Eroa'),
(347, 107, 'Cacique Manaure'),
(348, 108, 'Norte'),
(349, 108, 'Carirubana'),
(350, 108, 'Santa Ana'),
(351, 108, 'Urbana Punta Cardón'),
(352, 109, 'La Vela de Coro'),
(353, 109, 'Acurigua'),
(354, 109, 'Guaibacoa'),
(355, 109, 'Las Calderas'),
(356, 109, 'Macoruca'),
(357, 110, 'Dabajuro'),
(358, 111, 'Agua Clara'),
(359, 111, 'Avaria'),
(360, 111, 'Pedregal'),
(361, 111, 'Piedra Grande'),
(362, 111, 'Purureche'),
(363, 112, 'Adaure'),
(364, 112, 'Adícora'),
(365, 112, 'Baraived'),
(366, 112, 'Buena Vista'),
(367, 112, 'Jadacaquiva'),
(368, 112, 'El Vínculo'),
(369, 112, 'El Hato'),
(370, 112, 'Moruy'),
(371, 112, 'Pueblo Nuevo'),
(372, 113, 'Agua Larga'),
(373, 113, 'El Paují'),
(374, 113, 'Independencia'),
(375, 113, 'Mapararí'),
(376, 114, 'Agua Linda'),
(377, 114, 'Araurima'),
(378, 114, 'Jacura'),
(379, 115, 'Tucacas'),
(380, 115, 'Boca de Aroa'),
(381, 116, 'Los Taques'),
(382, 116, 'Judibana'),
(383, 117, 'Mene de Mauroa'),
(384, 117, 'San Félix'),
(385, 117, 'Casigua'),
(386, 118, 'Guzmán Guillermo'),
(387, 118, 'Mitare'),
(388, 118, 'Río Seco'),
(389, 118, 'Sabaneta'),
(390, 118, 'San Antonio'),
(391, 118, 'San Gabriel'),
(392, 118, 'Santa Ana'),
(393, 119, 'Boca del Tocuyo'),
(394, 119, 'Chichiriviche'),
(395, 119, 'Tocuyo de la Costa'),
(396, 120, 'Palmasola'),
(397, 121, 'Cabure'),
(398, 121, 'Colina'),
(399, 121, 'Curimagua'),
(400, 122, 'San José de la Costa'),
(401, 122, 'Píritu'),
(402, 123, 'San Francisco'),
(403, 124, 'Sucre'),
(404, 124, 'Pecaya'),
(405, 125, 'Tocópero'),
(406, 126, 'El Charal'),
(407, 126, 'Las Vegas del Tuy'),
(408, 126, 'Santa Cruz de Bucaral'),
(409, 127, 'Bruzual'),
(410, 127, 'Urumaco'),
(411, 128, 'Puerto Cumarebo'),
(412, 128, 'La Ciénaga'),
(413, 128, 'La Soledad'),
(414, 128, 'Pueblo Cumarebo'),
(415, 128, 'Zazárida'),
(416, 113, 'Churuguara'),
(417, 129, 'Camaguán'),
(418, 129, 'Puerto Miranda'),
(419, 129, 'Uverito'),
(420, 130, 'Chaguaramas'),
(421, 131, 'El Socorro'),
(422, 132, 'Tucupido'),
(423, 132, 'San Rafael de Laya'),
(424, 133, 'Altagracia de Orituco'),
(425, 133, 'San Rafael de Orituco'),
(426, 133, 'San Francisco Javier de Lezama'),
(427, 133, 'Paso Real de Macaira'),
(428, 133, 'Carlos Soublette'),
(429, 133, 'San Francisco de Macaira'),
(430, 133, 'Libertad de Orituco'),
(431, 134, 'Cantaclaro'),
(432, 134, 'San Juan de los Morros'),
(433, 134, 'Parapara'),
(434, 135, 'El Sombrero'),
(435, 135, 'Sosa'),
(436, 136, 'Las Mercedes'),
(437, 136, 'Cabruta'),
(438, 136, 'Santa Rita de Manapire'),
(439, 137, 'Valle de la Pascua'),
(440, 137, 'Espino'),
(441, 138, 'San José de Unare'),
(442, 138, 'Zaraza'),
(443, 139, 'San José de Tiznados'),
(444, 139, 'San Francisco de Tiznados'),
(445, 139, 'San Lorenzo de Tiznados'),
(446, 139, 'Ortiz'),
(447, 140, 'Guayabal'),
(448, 140, 'Cazorla'),
(449, 141, 'San José de Guaribe'),
(450, 141, 'Uveral'),
(451, 142, 'Santa María de Ipire'),
(452, 142, 'Altamira'),
(453, 143, 'El Calvario'),
(454, 143, 'El Rastro'),
(455, 143, 'Guardatinajas'),
(456, 143, 'Capital Urbana Calabozo'),
(457, 144, 'Quebrada Honda de Guache'),
(458, 144, 'Pío Tamayo'),
(459, 144, 'Yacambú'),
(460, 145, 'Fréitez'),
(461, 145, 'José María Blanco'),
(462, 146, 'Catedral'),
(463, 146, 'Concepción'),
(464, 146, 'El Cují'),
(465, 146, 'Juan de Villegas'),
(466, 146, 'Santa Rosa'),
(467, 146, 'Tamaca'),
(468, 146, 'Unión'),
(469, 146, 'Aguedo Felipe Alvarado'),
(470, 146, 'Buena Vista'),
(471, 146, 'Juárez'),
(472, 147, 'Juan Bautista Rodríguez'),
(473, 147, 'Cuara'),
(474, 147, 'Diego de Lozada'),
(475, 147, 'Paraíso de San José'),
(476, 147, 'San Miguel'),
(477, 147, 'Tintorero'),
(478, 147, 'José Bernardo Dorante'),
(479, 147, 'Coronel Mariano Peraza '),
(480, 148, 'Bolívar'),
(481, 148, 'Anzoátegui'),
(482, 148, 'Guarico'),
(483, 148, 'Hilario Luna y Luna'),
(484, 148, 'Humocaro Alto'),
(485, 148, 'Humocaro Bajo'),
(486, 148, 'La Candelaria'),
(487, 148, 'Morán'),
(488, 149, 'Cabudare'),
(489, 149, 'José Gregorio Bastidas'),
(490, 149, 'Agua Viva'),
(491, 150, 'Sarare'),
(492, 150, 'Buría'),
(493, 150, 'Gustavo Vegas León'),
(494, 151, 'Trinidad Samuel'),
(495, 151, 'Antonio Díaz'),
(496, 151, 'Camacaro'),
(497, 151, 'Castañeda'),
(498, 151, 'Cecilio Zubillaga'),
(499, 151, 'Chiquinquirá'),
(500, 151, 'El Blanco'),
(501, 151, 'Espinoza de los Monteros'),
(502, 151, 'Lara'),
(503, 151, 'Las Mercedes'),
(504, 151, 'Manuel Morillo'),
(505, 151, 'Montaña Verde'),
(506, 151, 'Montes de Oca'),
(507, 151, 'Torres'),
(508, 151, 'Heriberto Arroyo'),
(509, 151, 'Reyes Vargas'),
(510, 151, 'Altagracia'),
(511, 152, 'Siquisique'),
(512, 152, 'Moroturo'),
(513, 152, 'San Miguel'),
(514, 152, 'Xaguas'),
(515, 179, 'Presidente Betancourt'),
(516, 179, 'Presidente Páez'),
(517, 179, 'Presidente Rómulo Gallegos'),
(518, 179, 'Gabriel Picón González'),
(519, 179, 'Héctor Amable Mora'),
(520, 179, 'José Nucete Sardi'),
(521, 179, 'Pulido Méndez'),
(522, 180, 'La Azulita'),
(523, 181, 'Santa Cruz de Mora'),
(524, 181, 'Mesa Bolívar'),
(525, 181, 'Mesa de Las Palmas'),
(526, 182, 'Aricagua'),
(527, 182, 'San Antonio'),
(528, 183, 'Canagua'),
(529, 183, 'Capurí'),
(530, 183, 'Chacantá'),
(531, 183, 'El Molino'),
(532, 183, 'Guaimaral'),
(533, 183, 'Mucutuy'),
(534, 183, 'Mucuchachí'),
(535, 184, 'Fernández Peña'),
(536, 184, 'Matriz'),
(537, 184, 'Montalbán'),
(538, 184, 'Acequias'),
(539, 184, 'Jají'),
(540, 184, 'La Mesa'),
(541, 184, 'San José del Sur'),
(542, 185, 'Tucaní'),
(543, 185, 'Florencio Ramírez'),
(544, 186, 'Santo Domingo'),
(545, 186, 'Las Piedras'),
(546, 187, 'Guaraque'),
(547, 187, 'Mesa de Quintero'),
(548, 187, 'Río Negro'),
(549, 188, 'Arapuey'),
(550, 188, 'Palmira'),
(551, 189, 'San Cristóbal de Torondoy'),
(552, 189, 'Torondoy'),
(553, 190, 'Antonio Spinetti Dini'),
(554, 190, 'Arias'),
(555, 190, 'Caracciolo Parra Pérez'),
(556, 190, 'Domingo Peña'),
(557, 190, 'El Llano'),
(558, 190, 'Gonzalo Picón Febres'),
(559, 190, 'Jacinto Plaza'),
(560, 190, 'Juan Rodríguez Suárez'),
(561, 190, 'Lasso de la Vega'),
(562, 190, 'Mariano Picón Salas'),
(563, 190, 'Milla'),
(564, 190, 'Osuna Rodríguez'),
(565, 190, 'Sagrario'),
(566, 190, 'El Morro'),
(567, 190, 'Los Nevados'),
(568, 191, 'Andrés Eloy Blanco'),
(569, 191, 'La Venta'),
(570, 191, 'Piñango'),
(571, 191, 'Timotes'),
(572, 192, 'Eloy Paredes'),
(573, 192, 'San Rafael de Alcázar'),
(574, 192, 'Santa Elena de Arenales'),
(575, 193, 'Santa María de Caparo'),
(576, 194, 'Pueblo Llano'),
(577, 195, 'Cacute'),
(578, 195, 'La Toma'),
(579, 195, 'Mucuchíes'),
(580, 195, 'Mucurubá'),
(581, 195, 'San Rafael'),
(582, 196, 'Gerónimo Maldonado'),
(583, 196, 'Bailadores'),
(584, 197, 'Tabay'),
(585, 198, 'Chiguará'),
(586, 198, 'Estánquez'),
(587, 198, 'Lagunillas'),
(588, 198, 'La Trampa'),
(589, 198, 'Pueblo Nuevo del Sur'),
(590, 198, 'San Juan'),
(591, 199, 'El Amparo'),
(592, 199, 'El Llano'),
(593, 199, 'San Francisco'),
(594, 199, 'Tovar'),
(595, 200, 'Independencia'),
(596, 200, 'María de la Concepción Palacios Blanco'),
(597, 200, 'Nueva Bolivia'),
(598, 200, 'Santa Apolonia'),
(599, 201, 'Caño El Tigre'),
(600, 201, 'Zea'),
(601, 223, 'Aragüita'),
(602, 223, 'Arévalo González'),
(603, 223, 'Capaya'),
(604, 223, 'Caucagua'),
(605, 223, 'Panaquire'),
(606, 223, 'Ribas'),
(607, 223, 'El Café'),
(608, 223, 'Marizapa'),
(609, 224, 'Cumbo'),
(610, 224, 'San José de Barlovento'),
(611, 225, 'El Cafetal'),
(612, 225, 'Las Minas'),
(613, 225, 'Nuestra Señora del Rosario'),
(614, 226, 'Higuerote'),
(615, 226, 'Curiepe'),
(616, 226, 'Tacarigua de Brión'),
(617, 227, 'Mamporal'),
(618, 228, 'Carrizal'),
(619, 229, 'Chacao'),
(620, 230, 'Charallave'),
(621, 230, 'Las Brisas'),
(622, 231, 'El Hatillo'),
(623, 232, 'Altagracia de la Montaña'),
(624, 232, 'Cecilio Acosta'),
(625, 232, 'Los Teques'),
(626, 232, 'El Jarillo'),
(627, 232, 'San Pedro'),
(628, 232, 'Tácata'),
(629, 232, 'Paracotos'),
(630, 233, 'Cartanal'),
(631, 233, 'Santa Teresa del Tuy'),
(632, 234, 'La Democracia'),
(633, 234, 'Ocumare del Tuy'),
(634, 234, 'Santa Bárbara'),
(635, 235, 'San Antonio de los Altos'),
(636, 236, 'Río Chico'),
(637, 236, 'El Guapo'),
(638, 236, 'Tacarigua de la Laguna'),
(639, 236, 'Paparo'),
(640, 236, 'San Fernando del Guapo'),
(641, 237, 'Santa Lucía del Tuy'),
(642, 238, 'Cúpira'),
(643, 238, 'Machurucuto'),
(644, 239, 'Guarenas'),
(645, 240, 'San Antonio de Yare'),
(646, 240, 'San Francisco de Yare'),
(647, 241, 'Leoncio Martínez'),
(648, 241, 'Petare'),
(649, 241, 'Caucagüita'),
(650, 241, 'Filas de Mariche'),
(651, 241, 'La Dolorita'),
(652, 242, 'Cúa'),
(653, 242, 'Nueva Cúa'),
(654, 243, 'Guatire'),
(655, 243, 'Bolívar'),
(656, 258, 'San Antonio de Maturín'),
(657, 258, 'San Francisco de Maturín'),
(658, 259, 'Aguasay'),
(659, 260, 'Caripito'),
(660, 261, 'El Guácharo'),
(661, 261, 'La Guanota'),
(662, 261, 'Sabana de Piedra'),
(663, 261, 'San Agustín'),
(664, 261, 'Teresen'),
(665, 261, 'Caripe'),
(666, 262, 'Areo'),
(667, 262, 'Capital Cedeño'),
(668, 262, 'San Félix de Cantalicio'),
(669, 262, 'Viento Fresco'),
(670, 263, 'El Tejero'),
(671, 263, 'Punta de Mata'),
(672, 264, 'Chaguaramas'),
(673, 264, 'Las Alhuacas'),
(674, 264, 'Tabasca'),
(675, 264, 'Temblador'),
(676, 265, 'Alto de los Godos'),
(677, 265, 'Boquerón'),
(678, 265, 'Las Cocuizas'),
(679, 265, 'La Cruz'),
(680, 265, 'San Simón'),
(681, 265, 'El Corozo'),
(682, 265, 'El Furrial'),
(683, 265, 'Jusepín'),
(684, 265, 'La Pica'),
(685, 265, 'San Vicente'),
(686, 266, 'Aparicio'),
(687, 266, 'Aragua de Maturín'),
(688, 266, 'Chaguamal'),
(689, 266, 'El Pinto'),
(690, 266, 'Guanaguana'),
(691, 266, 'La Toscana'),
(692, 266, 'Taguaya'),
(693, 267, 'Cachipo'),
(694, 267, 'Quiriquire'),
(695, 268, 'Santa Bárbara'),
(696, 269, 'Barrancas'),
(697, 269, 'Los Barrancos de Fajardo'),
(698, 270, 'Uracoa'),
(699, 271, 'Antolín del Campo'),
(700, 272, 'Arismendi'),
(701, 273, 'García'),
(702, 273, 'Francisco Fajardo'),
(703, 274, 'Bolívar'),
(704, 274, 'Guevara'),
(705, 274, 'Matasiete'),
(706, 274, 'Santa Ana'),
(707, 274, 'Sucre'),
(708, 275, 'Aguirre'),
(709, 275, 'Maneiro'),
(710, 276, 'Adrián'),
(711, 276, 'Juan Griego'),
(712, 276, 'Yaguaraparo'),
(713, 277, 'Porlamar'),
(714, 278, 'San Francisco de Macanao'),
(715, 278, 'Boca de Río'),
(716, 279, 'Tubores'),
(717, 279, 'Los Baleales'),
(718, 280, 'Vicente Fuentes'),
(719, 280, 'Villalba'),
(720, 281, 'San Juan Bautista'),
(721, 281, 'Zabala'),
(722, 283, 'Capital Araure'),
(723, 283, 'Río Acarigua'),
(724, 284, 'Capital Esteller'),
(725, 284, 'Uveral'),
(726, 285, 'Guanare'),
(727, 285, 'Córdoba'),
(728, 285, 'San José de la Montaña'),
(729, 285, 'San Juan de Guanaguanare'),
(730, 285, 'Virgen de la Coromoto'),
(731, 286, 'Guanarito'),
(732, 286, 'Trinidad de la Capilla'),
(733, 286, 'Divina Pastora'),
(734, 287, 'Monseñor José Vicente de Unda'),
(735, 287, 'Peña Blanca'),
(736, 288, 'Capital Ospino'),
(737, 288, 'Aparición'),
(738, 288, 'La Estación'),
(739, 289, 'Páez'),
(740, 289, 'Payara'),
(741, 289, 'Pimpinela'),
(742, 289, 'Ramón Peraza'),
(743, 290, 'Papelón'),
(744, 290, 'Caño Delgadito'),
(745, 291, 'San Genaro de Boconoito'),
(746, 291, 'Antolín Tovar'),
(747, 292, 'San Rafael de Onoto'),
(748, 292, 'Santa Fe'),
(749, 292, 'Thermo Morles'),
(750, 293, 'Santa Rosalía'),
(751, 293, 'Florida'),
(752, 294, 'Sucre'),
(753, 294, 'Concepción'),
(754, 294, 'San Rafael de Palo Alzado'),
(755, 294, 'Uvencio Antonio Velásquez'),
(756, 294, 'San José de Saguaz'),
(757, 294, 'Villa Rosa'),
(758, 295, 'Turén'),
(759, 295, 'Canelones'),
(760, 295, 'Santa Cruz'),
(761, 295, 'San Isidro Labrador'),
(762, 296, 'Mariño'),
(763, 296, 'Rómulo Gallegos'),
(764, 297, 'San José de Aerocuar'),
(765, 297, 'Tavera Acosta'),
(766, 298, 'Río Caribe'),
(767, 298, 'Antonio José de Sucre'),
(768, 298, 'El Morro de Puerto Santo'),
(769, 298, 'Puerto Santo'),
(770, 298, 'San Juan de las Galdonas'),
(771, 299, 'El Pilar'),
(772, 299, 'El Rincón'),
(773, 299, 'General Francisco Antonio Váquez'),
(774, 299, 'Guaraúnos'),
(775, 299, 'Tunapuicito'),
(776, 299, 'Unión'),
(777, 300, 'Santa Catalina'),
(778, 300, 'Santa Rosa'),
(779, 300, 'Santa Teresa'),
(780, 300, 'Bolívar'),
(781, 300, 'Maracapana'),
(782, 302, 'Libertad'),
(783, 302, 'El Paujil'),
(784, 302, 'Yaguaraparo'),
(785, 303, 'Cruz Salmerón Acosta'),
(786, 303, 'Chacopata'),
(787, 303, 'Manicuare'),
(788, 304, 'Tunapuy'),
(789, 304, 'Campo Elías'),
(790, 305, 'Irapa'),
(791, 305, 'Campo Claro'),
(792, 305, 'Maraval'),
(793, 305, 'San Antonio de Irapa'),
(794, 305, 'Soro'),
(795, 306, 'Mejía'),
(796, 307, 'Cumanacoa'),
(797, 307, 'Arenas'),
(798, 307, 'Aricagua'),
(799, 307, 'Cogollar'),
(800, 307, 'San Fernando'),
(801, 307, 'San Lorenzo'),
(802, 308, 'Villa Frontado (Muelle de Cariaco)'),
(803, 308, 'Catuaro'),
(804, 308, 'Rendón'),
(805, 308, 'San Cruz'),
(806, 308, 'Santa María'),
(807, 309, 'Altagracia'),
(808, 309, 'Santa Inés'),
(809, 309, 'Valentín Valiente'),
(810, 309, 'Ayacucho'),
(811, 309, 'San Juan'),
(812, 309, 'Raúl Leoni'),
(813, 309, 'Gran Mariscal'),
(814, 310, 'Cristóbal Colón'),
(815, 310, 'Bideau'),
(816, 310, 'Punta de Piedras'),
(817, 310, 'Güiria'),
(818, 341, 'Andrés Bello'),
(819, 342, 'Antonio Rómulo Costa'),
(820, 343, 'Ayacucho'),
(821, 343, 'Rivas Berti'),
(822, 343, 'San Pedro del Río'),
(823, 344, 'Bolívar'),
(824, 344, 'Palotal'),
(825, 344, 'General Juan Vicente Gómez'),
(826, 344, 'Isaías Medina Angarita'),
(827, 345, 'Cárdenas'),
(828, 345, 'Amenodoro Ángel Lamus'),
(829, 345, 'La Florida'),
(830, 346, 'Córdoba'),
(831, 347, 'Fernández Feo'),
(832, 347, 'Alberto Adriani'),
(833, 347, 'Santo Domingo'),
(834, 348, 'Francisco de Miranda'),
(835, 349, 'García de Hevia'),
(836, 349, 'Boca de Grita'),
(837, 349, 'José Antonio Páez'),
(838, 350, 'Guásimos'),
(839, 351, 'Independencia'),
(840, 351, 'Juan Germán Roscio'),
(841, 351, 'Román Cárdenas'),
(842, 352, 'Jáuregui'),
(843, 352, 'Emilio Constantino Guerrero'),
(844, 352, 'Monseñor Miguel Antonio Salas'),
(845, 353, 'José María Vargas'),
(846, 354, 'Junín'),
(847, 354, 'La Petrólea'),
(848, 354, 'Quinimarí'),
(849, 354, 'Bramón'),
(850, 355, 'Libertad'),
(851, 355, 'Cipriano Castro'),
(852, 355, 'Manuel Felipe Rugeles'),
(853, 356, 'Libertador'),
(854, 356, 'Doradas'),
(855, 356, 'Emeterio Ochoa'),
(856, 356, 'San Joaquín de Navay'),
(857, 357, 'Lobatera'),
(858, 357, 'Constitución'),
(859, 358, 'Michelena'),
(860, 359, 'Panamericano'),
(861, 359, 'La Palmita'),
(862, 360, 'Pedro María Ureña'),
(863, 360, 'Nueva Arcadia'),
(864, 361, 'Delicias'),
(865, 361, 'Pecaya'),
(866, 362, 'Samuel Darío Maldonado'),
(867, 362, 'Boconó'),
(868, 362, 'Hernández'),
(869, 363, 'La Concordia'),
(870, 363, 'San Juan Bautista'),
(871, 363, 'Pedro María Morantes'),
(872, 363, 'San Sebastián'),
(873, 363, 'Dr. Francisco Romero Lobo'),
(874, 364, 'Seboruco'),
(875, 365, 'Simón Rodríguez'),
(876, 366, 'Sucre'),
(877, 366, 'Eleazar López Contreras'),
(878, 366, 'San Pablo'),
(879, 367, 'Torbes'),
(880, 368, 'Uribante'),
(881, 368, 'Cárdenas'),
(882, 368, 'Juan Pablo Peñalosa'),
(883, 368, 'Potosí'),
(884, 369, 'San Judas Tadeo'),
(885, 370, 'Araguaney'),
(886, 370, 'El Jaguito'),
(887, 370, 'La Esperanza'),
(888, 370, 'Santa Isabel'),
(889, 371, 'Boconó'),
(890, 371, 'El Carmen'),
(891, 371, 'Mosquey'),
(892, 371, 'Ayacucho'),
(893, 371, 'Burbusay'),
(894, 371, 'General Ribas'),
(895, 371, 'Guaramacal'),
(896, 371, 'Vega de Guaramacal'),
(897, 371, 'Monseñor Jáuregui'),
(898, 371, 'Rafael Rangel'),
(899, 371, 'San Miguel'),
(900, 371, 'San José'),
(901, 372, 'Sabana Grande'),
(902, 372, 'Cheregüé'),
(903, 372, 'Granados'),
(904, 373, 'Arnoldo Gabaldón'),
(905, 373, 'Bolivia'),
(906, 373, 'Carrillo'),
(907, 373, 'Cegarra'),
(908, 373, 'Chejendé'),
(909, 373, 'Manuel Salvador Ulloa'),
(910, 373, 'San José'),
(911, 374, 'Carache'),
(912, 374, 'La Concepción'),
(913, 374, 'Cuicas'),
(914, 374, 'Panamericana'),
(915, 374, 'Santa Cruz'),
(916, 375, 'Escuque'),
(917, 375, 'La Unión'),
(918, 375, 'Santa Rita'),
(919, 375, 'Sabana Libre'),
(920, 376, 'El Socorro'),
(921, 376, 'Los Caprichos'),
(922, 376, 'Antonio José de Sucre'),
(923, 377, 'Campo Elías'),
(924, 377, 'Arnoldo Gabaldón'),
(925, 378, 'Santa Apolonia'),
(926, 378, 'El Progreso'),
(927, 378, 'La Ceiba'),
(928, 378, 'Tres de Febrero'),
(929, 379, 'El Dividive'),
(930, 379, 'Agua Santa'),
(931, 379, 'Agua Caliente'),
(932, 379, 'El Cenizo'),
(933, 379, 'Valerita'),
(934, 380, 'Monte Carmelo'),
(935, 380, 'Buena Vista'),
(936, 380, 'Santa María del Horcón'),
(937, 381, 'Motatán'),
(938, 381, 'El Baño'),
(939, 381, 'Jalisco'),
(940, 382, 'Pampán'),
(941, 382, 'Flor de Patria'),
(942, 382, 'La Paz'),
(943, 382, 'Santa Ana'),
(944, 383, 'Pampanito'),
(945, 383, 'La Concepción'),
(946, 383, 'Pampanito II'),
(947, 384, 'Betijoque'),
(948, 384, 'José Gregorio Hernández'),
(949, 384, 'La Pueblita'),
(950, 384, 'Los Cedros'),
(951, 385, 'Carvajal'),
(952, 385, 'Campo Alegre'),
(953, 385, 'Antonio Nicolás Briceño'),
(954, 385, 'José Leonardo Suárez'),
(955, 386, 'Sabana de Mendoza'),
(956, 386, 'Junín'),
(957, 386, 'Valmore Rodríguez'),
(958, 386, 'El Paraíso'),
(959, 387, 'Andrés Linares'),
(960, 387, 'Chiquinquirá'),
(961, 387, 'Cristóbal Mendoza'),
(962, 387, 'Cruz Carrillo'),
(963, 387, 'Matriz'),
(964, 387, 'Monseñor Carrillo'),
(965, 387, 'Tres Esquinas'),
(966, 388, 'Cabimbú'),
(967, 388, 'Jajó'),
(968, 388, 'La Mesa de Esnujaque'),
(969, 388, 'Santiago'),
(970, 388, 'Tuñame'),
(971, 388, 'La Quebrada'),
(972, 389, 'Juan Ignacio Montilla'),
(973, 389, 'La Beatriz'),
(974, 389, 'La Puerta'),
(975, 389, 'Mendoza del Valle de Momboy'),
(976, 389, 'Mercedes Díaz'),
(977, 389, 'San Luis'),
(978, 390, 'Caraballeda'),
(979, 390, 'Carayaca'),
(980, 390, 'Carlos Soublette'),
(981, 390, 'Caruao Chuspa'),
(982, 390, 'Catia La Mar'),
(983, 390, 'El Junko'),
(984, 390, 'La Guaira'),
(985, 390, 'Macuto'),
(986, 390, 'Maiquetía'),
(987, 390, 'Naiguatá'),
(988, 390, 'Urimare'),
(989, 391, 'Arístides Bastidas'),
(990, 392, 'Bolívar'),
(991, 407, 'Chivacoa'),
(992, 407, 'Campo Elías'),
(993, 408, 'Cocorote'),
(994, 409, 'Independencia'),
(995, 410, 'José Antonio Páez'),
(996, 411, 'La Trinidad'),
(997, 412, 'Manuel Monge'),
(998, 413, 'Salóm'),
(999, 413, 'Temerla'),
(1000, 413, 'Nirgua'),
(1001, 414, 'San Andrés'),
(1002, 414, 'Yaritagua'),
(1003, 415, 'San Javier'),
(1004, 415, 'Albarico'),
(1005, 415, 'San Felipe'),
(1006, 416, 'Sucre'),
(1007, 417, 'Urachiche'),
(1008, 418, 'El Guayabo'),
(1009, 418, 'Farriar'),
(1010, 441, 'Isla de Toas'),
(1011, 441, 'Monagas'),
(1012, 442, 'San Timoteo'),
(1013, 442, 'General Urdaneta'),
(1014, 442, 'Libertador'),
(1015, 442, 'Marcelino Briceño'),
(1016, 442, 'Pueblo Nuevo'),
(1017, 442, 'Manuel Guanipa Matos'),
(1018, 443, 'Ambrosio'),
(1019, 443, 'Carmen Herrera'),
(1020, 443, 'La Rosa'),
(1021, 443, 'Germán Ríos Linares'),
(1022, 443, 'San Benito'),
(1023, 443, 'Rómulo Betancourt'),
(1024, 443, 'Jorge Hernández'),
(1025, 443, 'Punta Gorda'),
(1026, 443, 'Arístides Calvani'),
(1027, 444, 'Encontrados'),
(1028, 444, 'Udón Pérez'),
(1029, 445, 'Moralito'),
(1030, 445, 'San Carlos del Zulia'),
(1031, 445, 'Santa Cruz del Zulia'),
(1032, 445, 'Santa Bárbara'),
(1033, 445, 'Urribarrí'),
(1034, 446, 'Carlos Quevedo'),
(1035, 446, 'Francisco Javier Pulgar'),
(1036, 446, 'Simón Rodríguez'),
(1037, 446, 'Guamo-Gavilanes'),
(1038, 448, 'La Concepción'),
(1039, 448, 'San José'),
(1040, 448, 'Mariano Parra León'),
(1041, 448, 'José Ramón Yépez'),
(1042, 449, 'Jesús María Semprún'),
(1043, 449, 'Barí'),
(1044, 450, 'Concepción'),
(1045, 450, 'Andrés Bello'),
(1046, 450, 'Chiquinquirá'),
(1047, 450, 'El Carmelo'),
(1048, 450, 'Potreritos'),
(1049, 451, 'Libertad'),
(1050, 451, 'Alonso de Ojeda'),
(1051, 451, 'Venezuela'),
(1052, 451, 'Eleazar López Contreras'),
(1053, 451, 'Campo Lara'),
(1054, 452, 'Bartolomé de las Casas'),
(1055, 452, 'Libertad'),
(1056, 452, 'Río Negro'),
(1057, 452, 'San José de Perijá'),
(1058, 453, 'San Rafael'),
(1059, 453, 'La Sierrita'),
(1060, 453, 'Las Parcelas'),
(1061, 453, 'Luis de Vicente'),
(1062, 453, 'Monseñor Marcos Sergio Godoy'),
(1063, 453, 'Ricaurte'),
(1064, 453, 'Tamare'),
(1065, 454, 'Antonio Borjas Romero'),
(1066, 454, 'Bolívar'),
(1067, 454, 'Cacique Mara'),
(1068, 454, 'Carracciolo Parra Pérez'),
(1069, 454, 'Cecilio Acosta'),
(1070, 454, 'Cristo de Aranza'),
(1071, 454, 'Coquivacoa'),
(1072, 454, 'Chiquinquirá'),
(1073, 454, 'Francisco Eugenio Bustamante'),
(1074, 454, 'Idelfonzo Vásquez'),
(1075, 454, 'Juana de Ávila'),
(1076, 454, 'Luis Hurtado Higuera'),
(1077, 454, 'Manuel Dagnino'),
(1078, 454, 'Olegario Villalobos'),
(1079, 454, 'Raúl Leoni'),
(1080, 454, 'Santa Lucía'),
(1081, 454, 'Venancio Pulgar'),
(1082, 454, 'San Isidro'),
(1083, 455, 'Altagracia'),
(1084, 455, 'Faría'),
(1085, 455, 'Ana María Campos'),
(1086, 455, 'San Antonio'),
(1087, 455, 'San José'),
(1088, 456, 'Donaldo García'),
(1089, 456, 'El Rosario'),
(1090, 456, 'Sixto Zambrano'),
(1091, 457, 'San Francisco'),
(1092, 457, 'El Bajo'),
(1093, 457, 'Domitila Flores'),
(1094, 457, 'Francisco Ochoa'),
(1095, 457, 'Los Cortijos'),
(1096, 457, 'Marcial Hernández'),
(1097, 458, 'Santa Rita'),
(1098, 458, 'El Mene'),
(1099, 458, 'Pedro Lucas Urribarrí'),
(1100, 458, 'José Cenobio Urribarrí'),
(1101, 459, 'Rafael Maria Baralt'),
(1102, 459, 'Manuel Manrique'),
(1103, 459, 'Rafael Urdaneta'),
(1104, 460, 'Bobures'),
(1105, 460, 'Gibraltar'),
(1106, 460, 'Heras'),
(1107, 460, 'Monseñor Arturo Álvarez'),
(1108, 460, 'Rómulo Gallegos'),
(1109, 460, 'El Batey'),
(1110, 461, 'Rafael Urdaneta'),
(1111, 461, 'La Victoria'),
(1112, 461, 'Raúl Cuenca'),
(1113, 447, 'Sinamaica'),
(1114, 447, 'Alta Guajira'),
(1115, 447, 'Elías Sánchez Rubio'),
(1116, 447, 'Guajira'),
(1117, 462, 'Altagracia'),
(1118, 462, 'Antímano'),
(1119, 462, 'Caricuao'),
(1120, 462, 'Catedral'),
(1121, 462, 'Coche'),
(1122, 462, 'El Junquito'),
(1123, 462, 'El Paraíso'),
(1124, 462, 'El Recreo'),
(1125, 462, 'El Valle'),
(1126, 462, 'La Candelaria'),
(1127, 462, 'La Pastora'),
(1128, 462, 'La Vega'),
(1129, 462, 'Macarao'),
(1130, 462, 'San Agustín'),
(1131, 462, 'San Bernardino'),
(1132, 462, 'San José'),
(1133, 462, 'San Juan'),
(1134, 462, 'San Pedro'),
(1135, 462, 'Santa Rosalía'),
(1136, 462, 'Santa Teresa'),
(1137, 462, 'Sucre (Catia)'),
(1138, 462, '23 de enero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `estado`) VALUES
(1, 'Habilitado'),
(2, 'Deshabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pnfs`
--

CREATE TABLE `pnfs` (
  `id` int(11) NOT NULL,
  `cod_pnf` varchar(20) NOT NULL,
  `nomb_pnf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pnfs`
--

INSERT INTO `pnfs` (`id`, `cod_pnf`, `nomb_pnf`) VALUES
(1, 'PNFAD', 'Administración'),
(2, 'PNFI', 'Informática'),
(3, 'PNFM', 'Mecánica'),
(4, 'PNFPS', 'Prevención y Salud en el Trabajo'),
(5, 'PNFMTTV', 'Mantenimiento'),
(6, 'PNFIC', 'Instrumentación y Control'),
(7, 'PNFE', 'Eléctricidad'),
(8, 'PNFTL', 'Telecomunicaciones'),
(9, 'PNFCA ', 'Sistemas de Calidad y Ambiente'),
(10, 'PNFAG', 'Agroalimentación'),
(11, 'PNFCP', 'Contaduría Pública'),
(12, 'PNFELE', 'Electrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pnf_tiene_linea`
--

CREATE TABLE `pnf_tiene_linea` (
  `id` int(11) NOT NULL,
  `id_pnf` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pnf_tiene_linea`
--

INSERT INTO `pnf_tiene_linea` (`id`, `id_pnf`, `id_linea`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 3, 19),
(20, 3, 20),
(21, 3, 21),
(22, 3, 22),
(23, 3, 23),
(24, 3, 24),
(25, 3, 25),
(26, 3, 26),
(27, 3, 27),
(28, 3, 28),
(29, 4, 29),
(30, 4, 30),
(31, 4, 31),
(32, 5, 32),
(33, 5, 33),
(34, 5, 34),
(35, 5, 35),
(36, 6, 39),
(37, 6, 40),
(38, 6, 41),
(39, 6, 42),
(40, 6, 43),
(41, 6, 44),
(42, 7, 45),
(43, 7, 46),
(44, 7, 47),
(45, 7, 48),
(46, 9, 49),
(47, 9, 50),
(48, 9, 51),
(49, 9, 52),
(50, 10, 53),
(51, 10, 54),
(52, 10, 55),
(53, 11, 56),
(54, 11, 57),
(55, 11, 58),
(56, 11, 59),
(57, 11, 60),
(58, 12, 61),
(59, 12, 62),
(60, 12, 63),
(61, 12, 64),
(62, 12, 65),
(63, 10, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `ci` varchar(30) NOT NULL,
  `nacionalidad` varchar(20) NOT NULL,
  `area_especializacion` varchar(60) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `apellidos`, `nombres`, `ci`, `nacionalidad`, `area_especializacion`, `status`) VALUES
(1, 'Alvarado ', 'Juan', '16760320', 'V', 'Informática', 'Activo'),
(2, 'Ascanio  ', 'Darwin', '18070728', 'V', 'Informática', 'Activo'),
(3, 'Barrera  ', 'Milagros', '12293337', 'V', 'Informática', 'Activo'),
(4, 'Characo ', 'Julio', '17082188', 'V', 'Informática', 'Activo'),
(5, 'Díaz ', 'Loandi', '14275211', 'V', 'Informática', 'Activo'),
(6, 'Domínguez ', 'Jorge', '81725030', 'E', 'Informática', 'Activo'),
(7, 'Fierro ', 'Nubia', '12122357', 'V', 'Informática', 'Activo'),
(8, 'Flores ', 'Elsys', '14363405', 'V', 'Informática', 'Activo'),
(9, 'Gamarra  ', 'Félix', '5601969', 'V', 'Informática', 'Activo'),
(10, 'García ', 'Ana', '12480087', 'V', 'Informática', 'Activo'),
(11, 'Gil  ', 'María', '16538951', 'V', 'Informática', 'Activo'),
(12, 'Gil ', 'José', '8733429', 'V', 'Informática', 'Activo'),
(13, 'Hernández  ', 'Pedro', '7297689', 'V', 'Informática', 'Activo'),
(14, 'Martínez  ', 'Anyerg', '17063935', 'V', 'Informática', 'Activo'),
(15, 'Mejías ', 'Miguel', '10360697', 'V', 'Informática', 'Activo'),
(16, 'Molina', ' Leonel', '10346544', 'V', 'Informática', 'Activo'),
(17, 'Moncada ', ' Luciano', '8071662', 'V', 'Informática', 'Activo'),
(18, 'Muñoz  ', 'Glendys', '8586118', 'V', 'Informática', 'Activo'),
(19, 'Peña ', 'José', '7221931', 'V', 'Informática', 'Activo'),
(20, 'Pérez  ', 'Jeazmín', '9685572', 'V', 'Informática', 'Activo'),
(21, 'Pimentel ', 'César', '8779274', 'V', 'Informática', 'Activo'),
(22, 'Reyes ', 'Rubén', '8583553', 'V', 'Informática', 'Activo'),
(23, 'Rincón ', 'Hilda', '10749466', 'V', 'Informática', 'Activo'),
(24, 'Rivero ', 'Wendy', '12139725', 'V', 'Informática', 'Activo'),
(25, 'Rojas ', 'Gloriangel', '15963754', 'V', 'Informática', 'Activo'),
(26, 'Romero ', 'Samuel', '15999945', 'V', 'Informática', 'Activo'),
(27, 'Rosales ', 'Omar', '8819048', 'V', 'Informática', 'Activo'),
(28, 'Santana ', 'Rubén', '18110778', 'V', 'Informática', 'Activo'),
(29, 'Stuch  ', 'Dianella', '16685330', 'V', 'Informática', 'Activo'),
(30, 'Tenias  ', 'Grecia', '17970856', 'V', 'Informática', 'Activo'),
(31, 'Tovar ', 'Samuel', '15650242', 'V', 'Informática', 'Activo'),
(32, 'Uzcategui ', 'Mayba', '9473841', 'V', 'Informática', 'Activo'),
(33, 'Vázquez  ', 'Alicia', '3842286', 'V', 'Informática', 'Activo'),
(34, 'Vidal  ', 'Edgard', '4550355', 'V', 'Informática', 'Activo'),
(35, 'Vivas  ', 'Yamilet', '8819893', 'V', 'Informática', 'Activo'),
(36, 'Vanegas', 'Edeblangel', '14240998', 'V', 'Informática', 'Activo'),
(37, 'Zafra  ', 'Julio', '11987278', 'V', 'Informática', 'Activo'),
(38, 'Arana', 'Víctor', '14830380', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(39, 'Briceño', 'Eynsterd', '18610668', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(40, 'García', 'Samuel', '17696942', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(41, 'López', 'Gustavo', '4452862', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(42, 'Pérez', 'Laura', '14033789', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(43, 'Sequera', 'Soilimar', '11157838', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(44, 'Yépez', 'Minest', '13732683', 'V', 'Prevención y Salud en el Trabajo', 'Activo'),
(45, 'Telles', 'Rafael', '12143906', 'V', 'Instrumentacion y Control', 'Activo'),
(46, 'Castellanos', 'Richard', '7188413', 'V', 'Instrumentacion y Control', 'Activo'),
(47, 'Saturno', 'Jesús', '18163228', 'V', 'Informática', 'Activo'),
(48, 'Castellanos', 'Esperanza', '8810760', 'V', 'Informática', 'Activo'),
(49, 'Diaz', 'Antonio', '7185733', 'V', 'Administracion', 'Activo'),
(50, 'Seijas', 'Adriana', '14684715', 'V', 'Informática', 'Activo'),
(51, 'Landolina', 'Cristina', '13520244', 'V', 'Informática', 'Activo'),
(52, 'Haleguey', 'Liban', '17174347', 'V', 'Informática', 'Activo'),
(53, 'Barraez', 'Richard', '10358337', 'V', 'Informática', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prof_dicta_proy`
--

CREATE TABLE `prof_dicta_proy` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_pnf` int(11) NOT NULL,
  `id_trayecto` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prof_dicta_proy`
--

INSERT INTO `prof_dicta_proy` (`id`, `id_profesor`, `id_pnf`, `id_trayecto`, `id_seccion`, `id_turno`, `id_sede`, `id_anio`) VALUES
(1, 22, 2, 2, 1, 1, 1, 5),
(2, 22, 2, 2, 2, 1, 1, 5),
(3, 15, 2, 2, 3, 1, 1, 5),
(4, 36, 2, 2, 4, 1, 1, 5),
(5, 20, 2, 4, 1, 1, 1, 5),
(7, 11, 2, 2, 1, 2, 1, 5),
(8, 15, 2, 2, 2, 2, 1, 5),
(9, 15, 2, 2, 3, 2, 1, 5),
(10, 1, 2, 4, 1, 2, 1, 5),
(11, 20, 2, 3, 2, 1, 1, 5),
(12, 32, 2, 3, 1, 1, 1, 5),
(13, 11, 2, 2, 1, 2, 1, 4),
(14, 11, 2, 2, 3, 2, 1, 4),
(15, 33, 2, 2, 2, 1, 1, 4),
(16, 8, 2, 2, 5, 1, 1, 4),
(17, 21, 2, 4, 1, 2, 1, 4),
(18, 17, 2, 4, 2, 2, 1, 4),
(19, 35, 2, 4, 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` text NOT NULL,
  `objetivo` text NOT NULL,
  `alcance` text NOT NULL,
  `limitaciones` text NOT NULL,
  `aportes` text NOT NULL,
  `acciones` text NOT NULL,
  `vinculacion` text NOT NULL,
  `linea_investigacion` varchar(100) NOT NULL,
  `factibilidad` varchar(15) NOT NULL,
  `codigo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `id_anio`, `fecha`, `titulo`, `objetivo`, `alcance`, `limitaciones`, `aportes`, `acciones`, `vinculacion`, `linea_investigacion`, `factibilidad`, `codigo`) VALUES
(1, 5, '2017-06-24', 'Gestión de la aplicación web (Awgespro) para el control de los procesos académicos-administrativos de la coordinación de creación Intelectual y desarrollo socio-productivo  de la UPT Aragua “Federico Brito Figueroa”. ', ' Gestionar la aplicación web (Awgespro) para el control de los procesos académico-administrativos de la Universidad Politécnica Territorial de Aragua “Federico Brito Figueroa”.\r\n\r\nObjetivos específicos:\r\n•	Construir el plan de implantación donde se describirán las actividades de la aplicación web.\r\n•	Realizar las adecuaciones correspondientes en la aplicación web (Awgespro) para su instalación.\r\n•	Migrar la carga de datos reales a la aplicación web (Awgespro).\r\n•	Establecer los planes de servicios garantizando el soporte en caso de fallas.\r\n•	Capacitar a estudiantes, docentes y administrativos de la Universidad en el uso correcto de la aplicación web (Awgespro).\r\n•	Poner en  producción  la aplicación web (Awgespro), garantizando su operatividad.\r\n    ', ' La gestión de la aplicación web para el control de los procesos académico-administrativos de la coordinación de creación intelectual y desarrollo socio-productivo de la Universidad Politécnica Territorial de Aragua “Federico Brito Figueroa”, abarcara la adecuación de la aplicación informática, así como también de la plataforma tecnológica para su implantación en la comunidad, de esta forma la aplicación será incorporada en el entorno de operación, es decir en el servidor con el cual dispone la institución, donde el personal de la coordinación de creación intelectual y desarrollo socio-productivo de la universidad podrán realizar sus actividades diarias correspondientes al manejo y control de proyectos de este centro educativo. No obstante a esto, el grupo de implantación tendrá la formación necesaria para llevar a cabo las tareas especificadas en el plan de implantación que será explicado a lo largo del proyecto. En relación al uso del software por parte del cliente, se llevaran a cabo pruebas unitarias e integración en el funcionamiento de los módulos de inscripción, seguimiento, control y cierre de proyectos de este producto de software tanto de forma separada a cada módulo como en conjunto, donde se documentaran las incidencias, riesgos, errores y resultados obtenidos  a lo largo de la investigación, en archivos como lo son el plan de pruebas, matriz de riesgos en incidencias y el informe de gestión de proyecto, con el fin de conocer el comportamiento del sistema en las instalaciones de la comunidad, tomando en cuenta que se realizara la carga de la base de datos al 100% para realizar las pruebas de la aplicación web.    ', ' La aplicación Web a gestionar en la coordinación de creación intelectual y desarrollo socio-productivo de la UPT Aragua “Federico Brito Figueroa” de La Victoria edo. Aragua será solo abarcara los procesos de: Inscripción de proyectos, seguimiento y control de proyectos, y cierre de los mismos. Cabe mencionar que dicha coordinación también lleva a cabo procesos tales como: facturación, coordinación de los PNF, entre otros. Los cuales no serán parte del presente desarrollo.    ', ' Los autores de software del proyecto contribuirán significativamente en la gestión de una aplicación web para el control de los procesos académico-administrativos de la coordinación de creación intelectual y desarrollo socio-productivo de la UPT Aragua “Federico Brito Figueroa”, específicamente el coordinador de los PNF y 2 secretarios, así como también toda la población estudiantil y 442  profesores, presentes en las 12 especialidades distribuidas en las 3 sedes de la universidad , quienes actualmente son los principales afectados por la situación problemática planteada en la investigación.    ', ' El grupo gestor de software se integra con la comunidad mediante la realización del presente proyecto, usando estrategias para la recolección de datos como observación directa, entrevistas y la técnica del JAD, para el levantamiento de información para realizar el marco teórico del proyecto, así como también para la construcción de los manuales de usuario del sistema, tomando en consideración los requerimientos de la comunidad.    ', 'La presente investigación se vincula notablemente con el Plan Simón Bolívar 2013-2019, específicamente en el objetivo específico número 1.5.2.4. “Desarrollar aplicaciones informáticas que atiendan necesidades sociales”. En este orden de ideas se explica que es mediante la informática que Venezuela podrá convertirse en una potencia mundial.    ', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-17-001'),
(4, 4, '2016-07-04', 'COMPONENTE INFORMÁTICO PARA EL CONTROL DE LOS PROCESOS ACADÉMICOS EN LA U.E.N \"ALIDA PÉREZ MATOS\"  MUNICIPIO RAFAEL REVENGA - EL CONSEJO ESTADO ARAGUA.', 'Desarrollar componente informático para el control de los procesos académicos de la U.E.N \"Alida Pérez Matos\" ubicada en el Consejo - Estado Aragua.', 'El presente proyecto tiene como alcance facilitar a través de módulos los procesos académicos en la comunidad los cuales están divididos de la siguiente forma: Módulo del personal Docente: Los maestros y profesores podrán cargar la asistencia de los estudiantes. Módulo de Inscripción: El profesor encargado recolectara los datos suministrados por los estudiantes y representantes para ser guardados, asignar las secciones y horarios. Módulo de Carga de Notas: El profesor sube las notas de sus estudiantes, para así no tener ningún problema con los estudiantes al momento de solicitar sus notas al finalizar el año. Módulo de Estadísticas: Generara el listado de los estudiantes inscritos en el año, reporte, asistencias.', 'El presente proyecto tiene como limitación  el tiempo de ejecución el cual es sumamente corto.', 'Como aporte a la comunidad el proyecto les brindara nuevos avances en la tecnología. Beneficiando a toda la comunidad estudiantil, profesores, y personal administrativo (500 personas aproximadamente serán beneficiadas, profesores, estudiantes, personal administrativo).', 'Visitas directa con la comunidad aplicando IAP (Investigación Acción Participativa).', '1.5. Garantizar el impulso de la formación y transferencia del conocimiento que permita el desarrollo de equipos electrónicos y aplicaciones informáticas en tecnología libre y estándares abiertos.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-2-16-2447'),
(5, 4, '2016-07-06', 'COMPONENTE INFORMÁTICO PARA LA INSCRIPCIÓN DE ESTUDIANTES Y CONTROL D INVENTARIO DE LOS INSTRUMENTOS MUSICALES EN EL SISTEMA DE ORQUESTA Y COROS JUVENILES E INFANTILES NÚCLEO LA VICTORIA ESTADO ARAGUA.', 'Desarrollar un componente informático para el control de los procesos administrativos del Sistema de Orquestas y Coros Juveniles e Infantiles Núcleo La Victoria. ', 'El desarrollo del sistema para la automatización de los procesos de inscripción de estudiantes y control de inventario de los instrumentos del Sistema de Orquestas y Coros Juveniles e Infantiles Núcleo La Victoria, la realización del componente informático va a permitir agilizar y manejar de forma efectiva toda la información en cuanto a los procesos. Estos incrementara sus conocimientos en la nueva era tecnológica para la información y las comunicaciones lo cual permitirá resolver sus necesidades en la brevedad posible.  ', 'Poco tiempo para la elaboración del sistema.', 'Componente informático que va a permitir agilizar los procesos de inscripción de estudiantes y control de inventario. Personas beneficiadas 300 personas.', 'Interacción con la comunidad directamente, charla sobre manejo del sistema y uso correcto del computador.', '1.5. Desarrollar nuestras capacidades científico - tecnológicas vinculadas a las necesidades del pueblo.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(6, 5, '2017-06-27', 'Diseño de un componente de software para el inventario del almacén del departamento de Mecánica de la Universidad Politécnica  Territorial Aragua \"Federico Brito Figureroa\", La Victoria, Estado Aragua.', 'Diseñar una aplicación para el registro de inventario de forma automatizada, del departamento de almacén específicamente del módulo de mecánica; ubicado en la Universidad Politécnica Territorial del Estado Aragua “Federico Brito Figueroa”, la Victoria Edo-Aragua.', 'Lograr el desarrollo del componente de software, cumpliendo cada fase del mismo, que permita realizar un registro de inventario, llevando el control de los materiales existentes, generando reportes de entrada, salida, estadísticas generales, trimestrales y personalizadas, ofreciéndole al usuario una interfaz agradable.', 'Tiempo de disponibilidad de la comunidad.', 'Organización y control del almacén en el módulo de mecánica a través de un sistema de registro de inventario. Permitiendo que el personal tenga un mejor control en cuanto a los procesos de entrada, almacenamiento y salida de los materiales.', 'Adiestrar al personal para que tengan los conocimientos necesarios para el uso correcto de la aplicación.', 'En su gran objetivo histórico Nº 1 y su objetivo nacional 1.5 donde se establece uno de sus objetivos estratégicos y generales 1.5.1: desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo. Contribuyendo así a la construcción de Modelo Productivo Socialista.', 'Desarrollo de sistemas de información.', '', ''),
(7, 4, '2016-06-20', ' Componente de Software para mejorar los procesos administrativos en la Comercializadora Hefziba C.A ubicada en Maracay Estado Aragua. ', 'Desarrollar un componente para los procesos administrativos en la Comercializadora Hefziba C.A ubicada en Maracay Estado Aragua. ', 'Con el componente de software se ejecutara dichos procesos lo cual, la compra se encargará de los pedidos por parte de la comercialzadora el mismo permitirá cargar el proveedor y los productos que necesiten comprar, finalmente generará una factura. Además el proceso de venta se encargará de la solicitud de compra por parte de las empresas interesadas en adquirir los productos que se solicitan, y finalmente generará una factura con los datos del cliente o empresa, productos vendidos y el costo de dichos productos. De la misma manera la orden de compra se encargará de realizar una orden para los distintos productos que quiera pedir la comercializadora.', 'Solo cuenta con una computadora.', 'Mediante el componente de software se mejorará la manipulación de distintos datos importantes para la comercialiadora, como lo seria un mejor control de pagos en todas sus facetas tanto de compra, como de ventas ya que dicha información estará disponible al momento de ser solicitada, generando así datos precisos para que el personal administrativo lo pueda usar como lo necesite. En este caso la comercializadora se beneficiará de los recursos tecnológicos, como el componente de software y mediante un manual de usuario en linea. ', 'Se integrará a la comunidad directamente con el proyecto mediante adiestramiento del componente de software y un manual de usuario en linea, con lo cual implantaremos a través de charlas acerca de la funcionalidad del componente, sobre el cuidado y buen uso de las computadoras.', 'El desarrollo de este componente esta vinculado al plan de la patria, a través de los siguientes artículos:\r\n1.5.3.1: Desarrollar aplicaciones informáticas  con sentido crítico y atendiendo a necesidades sociales.\r\n1.5.3.3: Garantizar la creación y aprobación del conocimiento para el desarrollo, producción y buen uso de las telecomunicaciones y tecnologías de información.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(8, 4, '2016-06-21', 'COMPONENTE DE SOFTWARE PARA LOS PROCESOS ADMINISTRATIVOS DEL NEGOCIO \"CICLOTECNIC 4J, C.A\" SAN MATEO, EDO. ARAGUA.', 'Desarrollar un componente de software para el manejo de los procesos administrativos del negocio \"CICLOTECNIC 4J, C.A\" San Mateo, Estado. Aragua.', 'Nace la idea de desarrollar un componente de software, para mejorar el manejo de los procesos administrativos del negocio \"CICLOTECNIC 4J, C.A\" como lo son compra, venta y mantenimiento, y así, llevar a cabo funciones como registrar y actualizar clientes, productos y proveedores, gestionar compras a proveedores, procesar ventas, crear presupuestos de ventas a clientes, como también de los servicios de las bicicletas, consultar relación de ventas y/o compras por fechas, gestionando eficientemente los reportes, la búsqueda de información necesitad, y almacenamiento de datos, mediante una interfaz que permitirá manejar los procesos, y esto, permitirá a los clientes una atención de calidad, además de ser de mayor rendimiento laboral para los trabajadores.  ', 'Solo cuenta con una computadora la cual no tiene acceso a Internet.', 'El componente ayudará a facilitar los procesos administrativos del negocio, beneficiando la labor de los trabajadores, ya que tendrán el conocimiento de diferentes informaciones, como por ejemplo, que pieza van a cambiar en todo momento, generando los datos veraces e inmediatos, y mejorando los servicios a los clientes que podrán contar con un presupuesto y factura digital.', 'Durante el cumplimiento de las actividades del proyecto, se lleva a cabo la integración social entre el jefe de la comunidad, sus empleados y los desarrolladores del proyecto en cuanto al seguimiento y control del mismo verificando paso a paso todas las etapas del proyecto, obteniendo un componente de software que realmente apoye los procesos de compra, venta y mantenimiento del negocio \"CICLOTECNIC 4J C.A\". Se dará adiestramiento del componente de software y manejo del manual de usuario en linea, a través de guías.', 'En el articulo 1.5.3.1 del plan de la patria 2013-2019: Fomentar y orientar la actividad científica, tecnológica y de innovación hacia el aprovechamiento de las potencialidades y capacidades nacionales para el desarrollo sustentable y de la satisfacción de las necesidades sociales orientado específicamente a la investigación de distintas áreas estratégicas definidas como prioridad para la solución de los problemas sociales actuales, y desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(9, 4, '2016-06-22', 'Componente de software administrativo para el establecimiento comercial, Inversiones New Century 2010 C.A.', 'Desarrollar componente de software administrativo para el establecimiento comercial,Inversiones New Century 2010 C.A.', 'El componente tendrá las siguientes funciones: registro de artículos, proveedores, clientes,y empleado. Facturación de compra: registro de compras realizadas, control de inversiones. Facturación de ventas. Y por ultimo el inventario contará con un Stop mínimo.', 'El personal no esta capacitado con el manejo de equipos informáticos, impidiendo un buen desempeño al momento de usar el componente.', 'Facilitar los proceso de compra y ventas de la comunidad, de manera que sean mas rápidos y se lleve un mejor control de los artículos. esto beneficiará al     personal administrativos (2 Personas), quienes también contarán con una capacitación en el manejo del componente de software y un manual de usuario.', 'Mediante la entrevista en la comunidad pudimos integrarnos a ella, mientras que avanzamos la comunidad y los desarrolladores del proyecto aportaron ideas a la hora diseñar el componente, de manera que sea mas amigable y sencillo de usar. También se le brinda al personal administrativo de la comunidad clases de capacitación para el correcto uso del mismo.', 'El componente de software que contará con los procesos de facturación de compra y de venta está vinculado con el Plan de la Patria en su objetivo (1.5) \"Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo\". Reflejado específicamente en el articulo (1.5.3.1) \"Garantizar el impulso de la formación y transferencia de conocimiento que permita el desarrollo de equipos electrónicos y aplicaciones informáticas en tecnologías libres y estándares abiertos\".', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-2500'),
(10, 4, '2016-06-23', 'Componente de Software que automatice los procesos administrativos para la \"Autocerrajería La Gran Colombia\" Maracay - Estado Aragua.', 'Desarrollar un componente de Software que automatice los procesos administrativos para la \"Autocerrajería La Gran Colombia\". ', 'El sistema podrá registrar los datos de los clientes, los proveedores,  los empleados y de los productos. También realizara tres procesos fundamentales en la empresa, como: Compra, facturación de la misma e ingreso de productos al inventario. Venta: Facturación de las ventas y por ultimo presupuesto.', 'Poco conocimiento en algunos integrantes de la comunidad en el uso aplicaciones tecnológicas. También cabe destacar que la comunidad no cuenta con una red par intercomunicar las computadoras,', 'Garantizar un sistema de fácil manejo, donde se pueda ejecutar organizadamente cada uno de los procesos de la empresa, beneficiando con este a los empleados encargados de las áreas de compra y venta (4 personas). Estos mismos dispondrán de un manual de usuario que los ayudará a conocer mejor el componente de software y facilitar su manejo. Por ultimo también se verán beneficiados los clientes al contar con un servicio de atención  más eficaz ofreciéndoles un tiempo de respuesta optimo. ', 'Al acordar la comunidad se realizaron entrevistas para conocer las necesidades de esta. En el desarrollo del proyecto se busca junto a la comunidad la manera de mejorar los servicios de la empresa, intercambiando saberes tanto de administración por parte de los involucrados en la comunidad como de desarrollo de  software por parte de los desarrolladores del proyecto.', 'El componente de software contará con los procesos de compra, venta y presupuesto. De esta manera está asociado con el Plan de la Patria, establecido en el objetivo (1.5) \"Desarrollar nuestras capacidades científico - tecnológicas vinculadas a las necesidades del pueblo\". ', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(11, 4, '2016-06-20', 'Componente de software para el control de inventario de Auto Repuestos B&G II C.A, ubicado en la Victoria, Estado Aragua.', 'Desarrollar un componente de software para el control de inventario de Auto Repuestos B&G II C.A, debido a que las actividades se realizan de forma manual y esta expuesta a errores humanos y perdidas financieras.  ', 'Se busca que los beneficiados puedan realizar las operaciones comunes de entrada y salida de mercancía de manera automatizada a través de un sistema de inventario, el mismo estará comprendido con módulos de procesos definidos llamados compra, inventario, ventas y usuarios, donde cada uno de estos tendrá una serie de formularios que solicitaran información al usuario y generaran un proceso interno para dar solución al control de los productos del almacén , eliminando los procesos manuales y apostando por propuestas tecnológicas, de esta manera se busca dar garantía a la solución de las problemáticas que genera el sistema manual actual.', 'Por los momentos no se ha encontrado ninguna limitación que impida el desarrollo del proyecto.', 'El sistema beneficiara a la comunidad general (05 personas) y a todos los clientes asociados a la misma, entre los aportes esta la integración de un software que ayuda a registrar el movimiento de inventario del local, para mejorar sus finanzas y evitar perdidas de mercancía.', 'Se realizara un adiestramiento a la colectiva en general para aprender a usar el sistema y se les hará entrega de un manual de usuario donde se explica paso a paso como interactuar con el mismo.', 'A través del proyecto socio tecnológico se desea contribuir con el plan de la Patria ya que el mismo busca incentivar a la reflexión en torno al rol de la universidad respecto al plan gubernamental, generar un plan concreto de acción vinculado a los desafíos fundamentales de nuestro país en los próximos seis años, definir la participación de la universidad en áreas productivas, en ecología, seguridad, industria y las grandes misiones de Barrio Nuevo, Barrio Tricolor, Agro Venezuela, Vivienda saber y trabajar movimiento por la Paz y la Vida, entre otros. La inserción de cada propuesta en los objetivos históricos del plan de la patria es imprescindible para la puesta en marcha de las mismas.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(12, 4, '2016-06-30', 'Componente de software orientado al control y agilización de los procesos administrativos de la Sala de Musculación del Instituto Regional del Deporte en Aragua, Maracay Estado Aragua.', 'Elaborar un componente de software orientado al control y agilización de los procesos administrativos de la Sala de Musculación del Instituto Regional del Deporte en Aragua.', 'Se automatizará todos y cada uno de los procesos administrativos llevados a cabo en Sala de Musculación durante la preparación física, entre los cuales se encuentran; registro e inscripción de todas las personas, bien sean atletas o público en general, control e horarios par la distribución de tiempo y espacio disponible.', 'Últimamente por los racionamientos de luz se nos ha atrasado un poco el desarrollo del sistema, por otro lado en cuanto la comunidad nos han brindado toda la ayuda y tiempo posible.', 'El componente de software beneficiará a toda la comunidad del Instituto Regional de Aragua que asiste en la Sala de Musculación Ángel Rodríguez ya que la información de las personas inscritas estará sistematizadas obteniendo así un buen manejo de los datos de cada uno de ellos y logrando la confiabilidad.', 'Mediante charlas, talleres y correos electrónicos con información e inducciones para la buena utilización del sistema.', 'Dentro de uno de los objetivos Nacionales del Plan de la Patria 2013 - 2019  se encuentra el desarrollar nuestras capacidades científico - tecnológicas vinculadas a las necesidades del pueblo. Garantizar el acceso oportuno y uso adecuado de las telecomunicaciones y tecnologías de información, mediante el desarrollo de la infraestructura necesaria, así como  de las aplicaciones informáticas que atiendan necesidades sociales. Nuestro proyecto esta vinculado al mismo ya que busca atender y beneficiar a la comunidad del Instituto Regional del Deporte en Aragua desarrollándoles un sistema que les facilitará cada una de las tareas diarias que llevan hasta los momentos de forma manual y de esta forma también estaríamos garantizando el uso de las herramientas informáticasatendiendo así un objetivo más de nuestro Plan.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(13, 4, '2016-03-01', 'Componente de software para controlar los procesos de \"persona cliente-proveedor\", para la empresa DNS Consultores, C.A.', 'Diseño y desarrollo d un componente de software para controlar los procesos \"persona cliente-proveedor\", para la empresa DNS Consultores, C.A.', 'El estudio esta enmarcado en el desarrollo de un componente de software que permita controlar los procesos relacionados con el registro de personas cliente-proveedor, vendedor, que sea dinámica flexible, extensible y ajustada a la demanda actual, asimismo, facilite el acceso a datos de forma inmediata beneficiando el mantenimiento del programa, evite duplicidad de registros y permita la inserción de nuevas aplicaciones.Contempla el diseño, desarrollo, creación, relación y normalización de las tablas para el almacenamiento de datos , basado en tecnologías Microsoft como ASP.NET, el entorno de desarrollo Virtual Studio y lenguajes de programación y diseño como Cshap (C#) HTML5, CSS3, JavaScript y Jquery. ', 'Ninguna.', 'Contar con una aplicación dinámica, flexible, extensible y ajustable a las necesidades del mercado actual, que facilite el acceso a datos de forma inmediata, con soluciones basadas en la web.', 'Talleres, cursos, practicas. ', 'Contribuir con el logro del primer objetivo histórico \"Defender, expandir y consolidar el bien mas preciado que hemos reconquistado después de 200 años: LA INDEPENDENCIA NACIONAL\", y cumplir con su objetivo nacional 1.5 relacionado con el desarrollo científico-tecnológico como una de las bases fundamentales de la independencia nacional que textualmente dice: \"Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo\", aportando soluciones tecnológicas y de innovación a la comunidad, en consonancia con lo establecido en el programa nacional de información (PNFI), Plan Nacional Simón Bolívar y esta casa de estudios.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(14, 4, '2016-06-09', 'Componente de software para Gestión administrativa y entrenamiento físico del Gimnasio \"Champion Gym\" ubicado en La Victoria, Estado Aragua.', 'Desarrollo de un componente de software de gestión de los procesos, plan de entrenamiento físico, pagos de mensualidades de usuarios de la comunidad del Gimnasio \"Champion Gym\", ubicado en La Victoria, Estado Aragua.', 'Se tiene previsto el diseño, implementación de un componente de software con módulos de control de pagos, elaboración de rutinas de entrenamiento físico.', 'La comunidad no posee fondos económicos para el financiamiento del desarrollo e implementación del software.', 'Los procesos de elaboración de rutinas d entrenamiento físico se almacenarán en una base de datos, la cual permitirá su consulta a través de la aplicación o el ingreso del beneficiario por medio de una cuenta de usuario por vía web. \r\nEl control de pagos se verá agilizado, con una herramienta adaptada plenamente a las circunstancias del gimnasio.', 'El personal administrativo y entrenadores participaran activamente en la elaboración del componente, proporcionando la información necesaria y los datos pertinentes para su desarrollo.', 'El proyecto se alinea con el inciso 3.2.5 del Plan de la Patria , referido a \"continuar desarrollando así como propulsar los eslabones productivos, identificados en proyectos concretos [...] en las áreas de [...] informática y electrónica así como girar un mecanismo de planificación centralizada, esquema presupuestario y modelos de gestión eficientes y productivos cónsonos con la transición al socialismo\".  ', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(15, 4, '2016-03-01', 'Componente de software de para el control de los procesos de ensamblaje de lineas de fabricación de productos, para la empresa \"DNS Consultores, C.A\", Maracay - Estado Aragua.', 'Diseñar  y desarrollar un componente de software para el control de los procesos de ensamblaje de lineas de fabricación de productos, para la empresa \"DNS Consultores, C.A\", Maracay - Estado Aragua.', 'Cuenta con una completa base de datos de: Proveedores, artículos, orden de pedido, orden de entrada, orden de trabajo, y producto final para cualquier empresa y artículos que suministran. Módulo de Movimiento: Controla la orden de pedido 8)Nº de pedido, fecha, proveedor, artículo, unidad de medida, cantidad solicitada); Orden de Entrada (Empresa, artículo, tipo y unidad de medida de la materia prima); Orden de trabajo (turno de trabajo, numero de máquina, producto final, tipo, observación requerida, artículo, stock y cantidad requerida); y producto final que interactúan en el proceso de producción. Modulo de Reportes: lista de proveedores, artículos, orden de pedido, orden de entrada, orden de trabajo y producto final que se registran en el día en los procesos de producción. Modulo de Mantenimiento: Activa y desactiva usuarios como administrador, modifica clave de acceso, solo el administrador le asigna nivel a los empleados de la empresa. Respalda su base de datos y recupera base de datos por seguridad. Incluye soporte a usuario con manual técnico de las funcionalidades del software.', 'Ninguna limitación encontrada.', 'Evolucionar un software que sea dinámico, flexible, extensible y ajustable a las necesidades del cliente, fácilmente aún más el acceso a datos de forma inmediata.', 'Se integró a la comunidad a través de talleres, cursos y prácticas.', 'Aportar conocimientos y soluciones tecnológicas para el logro del primer objetivo histórico del plan de la patria, específicamente con el objetivo nacional 1.5 relacionado con el desarrollo científico - tecnológico como unas de las bases fundamentales de la independencia nacional que consiste en \"Desarrollar nuestras capacidades científico tecnológicas vinculadas a las del pueblo\".', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(16, 4, '2016-06-06', 'DESARROLLO DE UN COMPONENTE DE SOFTWARE PARA EL CONTROL DEL INVENTARIO, EN LA EMPRESA ANÓDICA C.A. UBICADA EN LA ZONA INDUSTRIAL DE SAN VICENTE GIRARDOT, ESTADO ARAGUA.º', 'Desarrollar un componente de software para el control de inventario en la empresa Anódica C.A.', 'Esta basado en la realización de un componente de software para el control del inventario el cual tiene como objetivo principalmente facilitar el control de todos los procesos a realizarse dentro del almacén, el cual se lleva en la actualidad en manuscrito, esto perjudicaba no solo al trabajador sino también a los encargados de dicha empresa, ya que no es la manera más segura de llevar un control de inventario.', 'No se han encontrado limitaciones en la ejecución del proyecto.', 'Con este proyecto se programa que los procesos del almacén se puedan llevar a cabo de manera digital, para así poder solucionar los problemas que ocasiona trabajar de manera manuscrita, evitando la perdida  de información en sus procesos, beneficiando de esta manera a la empresa y sus trabajadores brindándole mayor seguridad en control de sus activos de materia prima, herramienta, equipos de protección personal y otros, al igual que agilizando el trabajo reduciendo tiempos de solicitud y ganando tiempo de producción.', 'En un proceso de acción participativa y dinámica, directamente con el personal de trabajadores de la empresa, mediante encuestas y entrevistas para la recolección de sus requerimientos y a su vez la integración de cada una de ellos en el desarrollo del sistema para el control del inventario.', 'Todo proyecto está enmarcado dentro de los planes de desarrollo del país, desde los planes de desarrollo municipales pasando por los estatales hasta llegar al plan de desarrollo económico y social de la nación, desde el punto de vista informático y tecnológico en todo lo que compete al desarrollo de la tecnología de la información.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-2-16-2492'),
(17, 4, '2016-06-07', 'Desarrollo de un componente de software para la inscripción académica y control de notas de la Unidad Educativa Nacional La Victoria, ubicada en la ciudad de la Victoria - Estado Aragua.', 'Desarrollar un componente de software para la inscripción y control de notas de la Unidad Educativa Nacional La Victoria, que permita facilitar cada uno de los procesos que son llevados en control de estudios.', 'Para poder alcanzar los objetivos es primordial poder crear un componente de software que abarque los siguientes procesos: Registro de inscripción, boletín, reporte académico general. También se realizarán pruebas para comprobar el buen funcionamiento del software y se adiestrara el personal del área de control de estudios para que puedan trabajar correctamente con el mismo.', 'La comunidad se encuentra en las condiciones necesarias para que la ejecución del proyecto sea satisfactoria, esto quiere decir que no existe ningún tipo de limitación que pueda importunar el trabajo del grupo.', 'Este proyecto será un gran aporte a la comunidad de la Unidad Educativa Nacional La Victoria ya que por medio de este serán automatizados todos los procesos que maneja el área de control de estudios de la institución, siendo beneficiado todo el personal, reduciendo el tiempo en la realización de cada una de sus tareas y optimizando su gestión.', 'Cursos, actividades y asesorías para el correcto manejo y funcionamiento del componente de software.', 'El trabajo en proceso tiene como vinculación con el plan de la patria 2013-2019 el objetivo nacional numero 1.5 que nos dice: \"Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo\".\r\nCumpliendo con este objetivo nacional antes mencionado, el proyecto colabora con el desarrollo de las capacidades tecnológicas del país al incentivar movimientos tecnológicos (proyectos) que busquen ampliar nuestros conocimientos. Al mismo tiempo, se solucionará la problemática en una comunidad con necesidades tecnológicas que se pudieren cubrir en base a los conocimientos adquiridos previamente en nuestra casa de estudio.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(18, 4, '2016-05-29', 'Gestión de implantación del software administrativo \"Sysca\" para la empresa Inversiones Lapincagua C.A., en Cagua - Estado Aragua.', 'Gestionar la implantación del sistema de información \"Sysca\" para el control de las actividades administrativas de Inversiones Lapincagua C.A., en Cagua - Estado Aragua.', 'Realizar las adecuaciones, mejoras y correcciones necesarias del sistema de información \"Sysca\" para luego incorporarlo en el entorno operacional, brindando el adiestramiento a los usuarios para el manejo adecuado del mismo y la carga de datos reales, realizando las pruebas necesaria para su aceptación completa y realizar la preparación para el mantenimiento, estableciendo el acuerdo del nivel de servicio para ejecutar el paso a producción y la puesta en marcha de \"Sysca\"', '\"Sysca\" como todo sistema computarizado depende del suministro de energía eléctrica, así como también de un proveedor de servicio de Internet y de un servidor para su uso. Además, este requiere de equipos cómputos los cuales deben estar bajo estándares  de seguridad para el resguardo necesario de los recursos y evitar la ocurrencia de daños o perdidas por cualquier motivo.', '\"Sysca\" ofrece la optimización de los procesos de la empresa sustituyendo sus procesos manuales por automatizados, manteniendo la integridad y seguridad de la información, claridad y rapidez a la hora de generar reportes y dando seguimiento a los indicadores de gestión y calidad del sistema.\"Sysca \" beneficia a todo el  personal de Inversiones Lapincagua C.A., esto incluye 3 personas en el área administrativa y 9 personas en el área de taller, así como también a los clientes de la empresa que varían de 4 a 8 clientes semanales que se benefician de un sistema de calidad, evitando la perdida de información o problemas al momento de recibir el servicio. Todo esto evidencia los claros beneficios que este sistema automatizado trae a la comunidad para brindar un buen servicio a sus clientes', 'La metodología IAP (Investigación Acción Participativa) la cual nos permite la vinculación directa de visitas periódicas para conocer el comportamiento del sistema y a la vez sean participes de todo el proceso de gestión, así como también se tendrá una constante comunicación a través del coreo electrónico de \"Sysca\" en caso de presentarse alguna incidencia lo que garantiza soluciones rápidas para el funcionamiento eficaz del sistema.', 'Defender, expandir y consolidar el bien mas preciado que hemos reconquistado después de 200 años: La independencia nacional. Desarrollar nuestras capacidades científicas- tecnológicas vinculadas a las necesidades del pueblo. Fortalecer y orientar la actividad científica, tecnológica y de innovación hacia el aprovechamiento efectivo de las potencialidades y capacidades nacionales para el desarrollo sustentable y la satisfacción de las necesidades sociales, orientando la investigación hacia áreas estratégicas definidas como prioritarias para la solución de los problemas sociales.Garantizar el acceso oportuno y uso adecuado de las telecomunicaciones y tecnologías de información mediante el desarrollo de la infraestructura necesaria, así como es de las aplicaciones informáticas que atiendan necesidades sociales. Desarrollar aplicaciones informáticas que atiendan necesidades sociales.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(19, 4, '2016-06-01', 'Gestión e implementación del software educativo Aurora en el Centro de Educación Inicial \"Las Américas\".', 'Gestionar la implementación del software educativo Aurora en Centro de Educación Inicial \"Las Américas\" C.A.', 'El establecimiento del plan de implantación. Formación necesaria para la implantación.Instalación del software educativo en la comunidad, pruebas de implantación, aceptación y aprobación. Plan de mantenimiento.', 'Problemas con la luz (los corto  de luz a nivel nacional po el ahorro energético) ya que no se pueden realizar las actividades programadas en el tiempo estimado además de las exigencias del ministerio en renovar los papeles de la institución para funcionar el próximo año escolar.', 'Beneficia a unas 50 personas aproximadamente. Con la implementación del software y su buen funcionamiento y desempeño, los estudiantes de C.E.I.P.I de ampliaran sus conocimientos, con la utilización del software de diseño y construcción adecuados a su mención, esto permitirá un mejor desenvolvimiento en un ámbito laboral, egresando técnicos para aptos para el desarrollo de la nación.', 'A través del adiestramiento y con la realización de las pruebas de aceptación.', 'Es el pleno desarrollo de nuestras capacidades científico-técnicas, creando las condiciones para el desarrollo de un módulo innovador, transformador y dinámico, orientado hacia el aprovechamiento de las potencialidades y capacidades nacionales. así como el uso de aplicaciones informáticas con sentido critico, atendiendo a las necesidades sociales de manera que la institución se integre con los avances del país, agilice y mejore las metodologías del trabajo y beneficie  la comunidad. ', 'Software educativo', 'Factible', ''),
(20, 4, '2016-05-06', 'Gestión de implantación de la Aplicación \"UEP\" para la optimización académica y administrativa de la Unidad Educativa Privada \"Mis Sagrados Principios\" municipio Francisco Linares Alcántara, Estado Aragua. ', 'Gestionar la aplicación web \"UEP\"  para la optimización académica y administrativa en la Unidad Educativa Privada \"Mis Sagrados Principios\", Maracay- Estado Aragua.', 'Realizar un cronograma detallado con las actividades a realizar en el tiempo determinado,  donde el desarrollador debe finalizar todo lo relacionado con las adecuaciones y pruebas de software, de esta manera preparar el entorno para el adiestramiento e implantación del sistema, dando un tiempo aproximado de 10 meses para la ejecución.', 'Se presentan a nivel de la comunidad inconsistencia en el manejo de información referente a cada estudiante, ya que se manejaba de manera desordenada dificultando el desarrollo del sistema debido a la falta de información no suministrada por la institución.', 'Proporcionar una aplicación de calidad que ayude a la comunidad a integrarse con la tecnología, mejorando los procesos académicos y administrativos con una mayor eficiencia, no solo se beneficia la comunidad si no también los desarrolladores de poder esta capacitados para gestionar cualquier sistema informático.', 'Ya que la aplicación ofrece un ambiente accesible se realizara un adiestramiento el cual permitirá el uso del sistema de manera más sencilla a la hora de ser implementado en la comunidad. A su vez charlas y materiales didácticos para agilizar la fácil interacción con la aplicación.', 'Se vincula con los siguientes objetivos: \r\n1. Gran objetivo histórico: Defender, expandir y consolidar el bien más preciado que hemos reconquistado después de 200 años: la independencia Nacional.\r\n1.5. Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo.\r\n1.5.1.3. Fortalecer y orientar la actividad científica, tecnológica y de innovación hacia el aprovechamiento efectivo de las potencialidades y capacidades nacionales para el desarrollo sustentable y la satisfacción de las necesidades sociales, orientando la investigación hacia áreas estratégicas definidas como prioritarias para la solución de los problemas sociales.\r\n1.5.2.4. Desarrollar aplicacionen', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(21, 4, '2016-06-29', 'Gestión de implantación de la aplicación web \"CJ SYSTEM\" para la optimización de los procesos administrativos de la U.E.N.B \"Ciudad Jardín\"en Cagua Estado Aragua.', 'Gestiónar la implantación de la aplicación web \"CJ SYSTEM\" para la optimización de los procesos administrativos de la U.E.N.B \"Ciudad Jardín\"en Cagua Estado Aragua.', 'Satisfacer las necesidades de la comunidad, mediante la implantación de la aplicación web en la comunidad. Una vez finalizado el desarrollo del producto, son necesarios una serie de actividades y tareas antes, durante y después de las instalación del software que permitirán formalizar el cumplimiento del mismo. La sistematización de la entrega del producto de software culminado, permite una mejor organización, y establece claramente los alcances, lo cual conlleva a una mejor relación con la comunidad.', 'Dentro del desarrollo del proyecto se han presentado diferentes limitaciones principales tales como el racionamiento eléctrico de parte del gobierno nacional y servicio de Internet intermitente.', 'La aplicación CJ SYSTEM ofrece la automatización de procesos académicos y administrativos registrando y gestionando a toda la matricula estudiantil, representantes y docentes, coordinando horarios de clases y generando reportes y documentos tanto boletines como constancias de estudios, entre otros.  \r\nEste servicio sera distribuido por más de 500 alumnos y sus respectivos representantes, además serán constantemente usados por las 2 secretarias del área de administrativa y todos los profesores para la carga de notas.', 'Formar a través de la preparación y ejecución del plan de adiestramiento por parte del grupo de proyecto y su manual correspondiente a los usuarios finales para que puedan darle el correcto uso a la aplicación.', 'En el plan de la patria para el lapso 2013-2019 en su objetivo nacional 1.5 específica el desarrollo de capacidades científicas y tecnológicas vinculadas a la necesidad social de esta forma atribuye los 2 principales motivos para el desarrollo del proyecto cuyo enfoque es el crecimiento práctico para el equipo de desarrollo a través de sistema que responde a las necesidades de la comunidad U.E.N.B \"Ciudad Jardín\".', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(22, 4, '2016-05-04', 'Gestión de implementación de la aplicación web \"SAVAH\". Para los procesos administrativos y académicos de la Unidad Educativa Nacional \"Víctor Ángel Hernández\", Municipio Santiago Mariño, Turmero - Estado Aragua.', 'Gestionar la implementación de la aplicación web \"SAVAH\". Para los procesos administrativos y académicos de la Unidad Educativa Nacional \"Víctor Ángel Hernández\", Municipio Santiago Mariño, Turmero - Estado Aragua.', 'Con dicha aplicación web se busca que la comunidad comience a trabajar de manera digital para tener una mayor efectividad en cuanto a la parte de tiempo y organización. Para ello los desarrolladores estarán a cargo de impartir adiestramiento para el buen desenvolvimiento de cada uno de los stakeholder encargados de la interacción a diario con SAVAH.', 'Se basarían en la potabilidad, fiabilidad, seguridad, rendimiento y mantenibilidad  de la aplicación web. ya que sin las antes mencionadas no estaría funcionando correctamente SAVAH.', 'SAVAH en la U.E.N \"Víctor Ángel Hernández\" realizará todas aquellas tareas diarias en una institución educativa como inscripción, asistencia, gestión de horarios y calificaciones, reportes, entre otros. Y beneficia aproximadamente a 1100 personas entre estudiantes, docentes, administrativos y obreros.', 'Para lograr que los usuarios tengan una buena experiencia al interactúar con SAVAH se estarán realizando diferentes charlas dependiendo de los niveles de usuario con el personal encargado de trabajar día a día con la aplicación web. además de hacer entrega de un manual de usuario que les será de guía práctica. Cabe destacar que para finalizar se establecerán acuerdos de servicio con el cliente.', 'Se relaciona con los siguientes objetivos:\r\n1. Defender, expandir y consolidar el bien más apreciado que hemos reconquistado después de 200 años: la independencia nacional. 1.5. Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo. 1.5.1.3. Fortalecer y orientar la actividad científica, tecnológica y de innovación hacia el aprovechamiento efectivo de las potencialidades y capacidades nacionales para el desarrollo sustentable y la satisfacción de las necesidades sociales, orientando la investigación hacia áreas estratégicas definidas como prioritarias para la solución de los problemas sociales. 1.5.1.5. Garantizar el acceso oportuno y uso adecuado de las telecomunicaciones y tecnologías de información, mediante el desarrollo de la infraestructura necesaria, así como de las aplicaciones informáticas que atiendan necesidades sociales. 1.5.2.4. Desarrollar aplicaciones informáticas que atiendan necesidads sociales.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(23, 4, '2016-06-16', 'Gestión de implantación del sistema Académico administrativo para el Centro Educativo Inicial Privado \"José Roque Pinto\", ubicado en la victoria, Estado Aragua.', 'Establecer un plan que permita llevar a cabo la implantación del control y gestión del sistema académico administrativo para el Centro Educativo Inicial Privado \"José Roque Pinto\".', 'Este proyecto tiene como alcance la implantación del sistema de gestión académico administrativo, dicho sistema le permite a la institución agilizar los procesos académicos administrativos permitiendo llevar un control automatizado de los procesos y actividades del Centro educativo.', 'Entre las limitaciones del proyecto se encuentran:\r\n1. Disponibilidad de tiempo para el adiestramiento al personal en cuanto a los módulos del sistema.\r\n2. Transferencia de data. Incongruencia en la información enviada por parte de la institución en archivos de textos.\r\n3. Se dispone de poco recursos operativos (Ordenadores).', 'Ofrece a la comunidad llevar el control de inscripción de niños (as) y facturación a particulares y empresas afiliados al centro educativo a la vez por medio de la mensajería y la agenda de actividades se le informa sobre los talleres, jornadas de vacunación, entre otras informaciones  que la comunidad deba informar a sus usuarios. Aproximadamente se benefician 700 personas comprendidas entre obreros, docentes, empresas, niños(as) y representantes.', 'De los mensajes y agenda de actividades que se muestra en la página principal le permite informar de las jornadas ecológicas, jornadas de vacunación, charlas sobre ayuda familiar. Ofrecen servicio de psicólogo infantil para la ayuda en el desarrollo del niño(a), entre otros.', 'Objetivo nacional numero 1.5. nos dice: \"Desarrollar nuestras capacidades científicas-tecnológicas vinculadas a las necesidades del pueblo\". Pues bien, cumpliendo con este objetivo nacional, antes mencionado, nuestro proyecto colabora con el desarrollo de las capacidades tecnológicas del país al incentivar movimientos tecnológicos (proyectos) que busquen ampliar nuestros conocimientos. Al mismo tiempo se solucionó un problemática en una comunidad con necesidades tecnológicas que se pudieron cubrir en base a los conocimientos adquiridos previamente en nuestra casa de estudio.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-2514');
INSERT INTO `proyectos` (`id`, `id_anio`, `fecha`, `titulo`, `objetivo`, `alcance`, `limitaciones`, `aportes`, `acciones`, `vinculacion`, `linea_investigacion`, `factibilidad`, `codigo`) VALUES
(24, 4, '2016-06-15', 'Gestión de implantación del Sistema Administrativo de Compra y Venta \"SACV\" de la Cristalería Imperial Glass C.A, ubicada en la Victoria, Estado Aragua.', 'Con la implantación del sistema administrativo de compra y venta \"SACV\", se podrá acceder de forma rápida y eficaz a la información requerida por los usuarios, logrando que el resultado final sea el deseado para el personal que labora en la Cristalería Imperial Glass C.A.', 'Gestión del sistema administrativo de compra y venta de    Cristalería Imperial Glass C.A ubicada en la victoria, Estado Aragua, el cual posee cinco módulos principales: almacenes, compra, ventas, reportes y utilidades. Para gestionar este sistema se harán una serie de tareas el cual consiste en el establecimiento del plan de implantación. Incorporación del sistema al entorno de operación. Formación necesaria para la implantación, carga de datos al entorno de operación de implantación de sistema. Preparación del mantenimiento del sistema. Establecimiento del acuerdo de nivel de servicio. presentación y aprobación del sistema.', 'El manejo de información referente a cada proceso de compra y de venta de la cristalería, ya que se manejaba de forma desordenada, dificultando el desarrollo del sistema.', 'Proporcionar una aplicación de calidad que ayude a la comunidad a integrarse con la tecnología, mejorando los procesos de compra y venta con una mayor eficiencia, nos solo se beneficia la comunidad si no también nosotros   o o como desarrolladores de poder estar capacitados  para gestionar cualquier sistema informático. Con una cantidad de 600 personas beneficiadas directas e indirectamente.', 'Se realizará un adiestramiento el cual permitirá el uso del sistema de manera más sencilla a la hora de ser implementado en la comunidad. A su vez charlas y materiales didácticos para agilizar la fácil interacción con la aplicación.', 'Se vincula con los siguientes objetivos:\r\n1.5. Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo. En el plan el articulo 1.5. este ariculo nos dice que los proyectos deben ir dirigidos a la comunidad en general.\r\n1.5.1.3. Fortalecer y orientar la actividad científica, tecnológica y de innovación hacia el aprovechamiento efectivo de las potencialidades y capacidades nacionales para el desarrollo sustentable y la satisfacción de las necesidades sociales, orientando la investigación hacia áreas estratégicas definidas como prioritarias para la solución de los problemas sociales.\r\n1.5.1.3.Estos artículos nos hablan de la necesidad de poner al alcance del pueblo los conocimientos científicos - tecnológicos al servicio de la comunidad . Teniendo en cuenta en particular las necesidades de cada comunidad. \r\n1.5.1.5. Garantizar el acceso oportuno y uso adecuado de las telecomunicaciones y tecnologías de formación, mediante el desarrollo de la infraestructura necesaria, así como de las aplicar informáticas que atiendan necesidades sociales.\r\n1.5.1.5 Desarrollo de estos sistemas (es decir sistemas como el nuestro) que se ponen al servicio de la comunidad fortalece la infraestructura tecnológica del país y abre una puerta de acceso al uso de la información y la tecnología con que cuenta el país, dando acceso a todas las comunidades a la información y tecnología.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-2476'),
(25, 4, '2016-02-01', 'Gestión de implantación de la aplicación  web Sistema Administrativo Escolar (SAES) para la administración Escolar en la Unidad Educativa Estatal \"Luisa Cáceres de Arismendi\", ubicada en Trapiche del Medio, El consejo, Estado Aragua.', 'Gestionar El sistema administrativo  Escolar en la Unidad Educativa Estatal \"Luisa Cáceres de Arismendi\", ubicada en Trapiche del Medio, El consejo, Estado Aragua.', 'La propuesta esta enmarcada en gestionar la implantación del sistema para el sistema administrativo Escolar (SAES), mediante el cual se realizará las actividades relacionadas con la instalación del sistema, carga de datos reales, pruebas y registro de errores, adiestramiento a los usuarios finales y puesta en marcha del producto final.', 'Suspensión eventual de las actividades por parte de la comunidad, debido a la inseguridad, lo que constituye una limitante para llevar a cabo la gestión del proyecto.', 'La gestión de implantación del sistema SAES, será capaz de consolidar la integración y la participación con los diferentes actores de la comunidad (administrativo, docentes y representantes)logrando brindar de esta manera, resultados óptimos en el trabajo colaborativo como aporte para facilitar los procesos académicos y administrativos.', 'El Sistema \"SAES\" será capaz de consolidar la integración de los procesos académicos y administrativos, logrando brindar de esta manera resultados óptimos para la comunidad.', 'El presente proyecto desarrolla las capacidades técnicas e innovadoras dentro de la comunidad, creando las condiciones para el avance de un modelo transformador y dinámico, vinculado a sus necesidades. ', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', ''),
(26, 4, '2016-06-22', 'gestión de la implantación del módulo de compras del sistema SAINT Enterprise administrativo, en Grupo Migo, C.A, ubicado en la Victori, Estado Aragua.', 'Implantar el módulo de compras del sistema SAINT enterprise administrativo, en el departamento de compras del Grupo Migo, C.A.', 'Realizar el plan de implantación, realizar cursos para la formación de los usuarios, instalar el sistema, conectar con la base de datos de la tienda, realizar pruebas de aceptación, realizar un plan de mantenimiento y por ultimo pasar a producción del sistema.', 'Permisología para acceder a todas las tablas de la base de datos de la empresa.', 'Este proyecto ofrece la gestión de un módulo del sistema SAINT en el departamento de compras, para agilizar los procesos de compras de productos, y pago a proveedores, todo en un sistema centralizado minimizando lo más posible, este proyecto beneficiará a a 15 personas directamente y a más de 200 personas indirectamente.', 'Cursos de capacitación en el sistema para los usuarios finales, pruebas de aceptación, y un plan de mantenimiento del sistema.', 'Tiene relación con el gran objetivo histórico Nº 1. Defender, Expandir y consolidar el bien más preciado que hemos reconquistado después de 200 años: La independencia Nacional, en el objetivo Nacional 1.5. Desarrollar nuestras capacidades científica-tecnológicas vinculadas a las necesidades del pueblo. En los objetivos estratégicos generales 1.5.1.1. Desarrollar una actividad científica, tecnológica y de innovación, transdisciplinaria asociada directamente a la estructura productiva nacional, que permita dar respuesta a los problemas concretos del sector, fomentando el desarrollo de los procesos de escalamiento industrial orientados al aprovechamiento de las potencialidades, con efectiva transferencia de conocimientos para la soberanía tecnológica.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-022'),
(27, 4, '2016-06-17', 'Gestión e implantación de un sistema de producción en apoyo a la gestión productiva de SERGECA, ubicada en La Victoria, Estado Aragua.', 'El objetivo de este proyecto se enmarca dentro de un plan que permite gestionar e implantar un sistema de producción en apoyo a la gestión productiva de SERGECA, ubicada en la victoria, Estado aragua.', 'Este proyecto es el primer paso hacia ese concepto tecnológica e innovador. En este caso, el proyecto se centra en términos generales a la estimación de costos y tiempos. O para ser más concreto, determinar los recursos necesarios reales para su desarrollo e implantación. También abarcaríamos el seguimiento diario de dicha planificación, para así culminar con buena pro de un cierre de transferencias de datos.', 'Dicha comunidad se encuentra en total operatividad y condiciones para implantar y gestionar el proyecto, lo que quiere decir que no presenta limitación alguna para ejecución del mismo.', 'Ofrece las soluciones necesarias para alcanzar un 100% de seguridad a la hora de realizar sus procesos, evitando por completo los problemas que le generaba su anterior proceder u hojas de excel. Este beneficia al 100% de la comunidad.', 'Para llegar a una buena integración, se llevo a cabo que me permitió conocer el nivel de manejo de los equipos de computo de los miembros de la comunidad, también efectué el adiestramiento en cuanto al uso y manejo del sistema de producción que se instalo en la misma. ', 'Objetivo nacional Numero 1.5. dice: \"Desarrollar nuestras capacidades científicas-tecnológicas vinculadas a las necesidades del pueblo\". Cumpliendo con este objetivo nacional, con este proyecto se colabora con el desarrollo de las capacidades tecnológicas del país, al incentivar movimientos tecnológicos (Proyectos) que busquen ampliar los conocimientos. Al mismo tiempo, se soluciona una problemática en una comunidad con necesidades tecnológicas que se pudieron cubrir en base a los conocimiento adquiridos en la casa de estudio.', 'Seleccione la linea de investigación de su proyecto', 'Factible', 'PNFIV-4-15-2512'),
(28, 4, '2016-06-29', ' Gestión de Implantación del Sistema Auto CRM para los Concesionarios Chevrolet: Auto Centro La Victoria, Ferro camiones del Tuy e Intermotors San Felìpe como CRM  corporativo del grupo AMIN', 'Gestionar la implantación del sistema, AUTO CRM para el grupo de Concesionarios Chevrolet del grupo AMIN (Auto Centro La Victoria, Ferro camiones del Tuy e Intermotors San Felìpe ) como CRM del grupo ', 'El sistema AUTO CRM sera capaz de solucionar los problemas presentes en el área de Call Center beneficiando a la comunidad. Los alcances propuestos para este trayecto son: \r\nEstablecimiento del plan de implantación: Se realizaran adecuaciones al sistema, y se identificaran los roles de cada integrante del grupo \r\nFormación necesaria para la implantación: Se organizaran la formación del equipo y de los usuarios que participaran la  implantación e aceptación del sistema \r\nIncorporación del sistema en el entorno de operación: Se realizaran pruebas de implantación y aceptación\r\nPruebas de implantación del sistema: Se comprobaran la disponibilidad de los recursos humanos y técnicos y se asegurara que el sistema se comporte de la forma prevista en el entorno de operación, responda a todas las especificaciones dadas.\r\nPruebas de aceptación del sistema: Se validara que el sistema cumpla con los requisitos básicos del funcionamiento esperado y permitir que el usuario determine la aceptación del sistema \r\nPreparación del mantenimiento del sistema: Se conocerá el funcionamiento interno del sistema\r\nEstablecimiento del acuerdo de nivel de servicios; se negociara los términos entre los máximos responsables del usuario y se detallara los niveles de servicios\r\nPresentación y aprobación del sistema. En esta etapa se inicia el nuevo sistema que utilizara la congregación.', ' Hardware: \r\n\r\n-Se necesita al menos una conexión física a internet.\r\n-Se requiere computador por cada concesionario.\r\nSoftware:\r\n-El equipo cliente debe tener instalado un navegador web.', ' AUTO CRM administra la relación cliente-empresa y ofrece mejor control del manejo de la información en una visión 360 de sus actuales clientes, reduce el tiempo de análisis del mercado, mejora el marketing con la creación de campañas vía Email y SMS, orienta la oferta de ventas, repuestos y servicios hacia los clientes indicados, y ademas, con su modulo de encuestas permite medir el grado de satisfacción del cliente. Todo esto crea y aumenta el vinculo de preferencias del cliente o el grupo AMIN como concesionarios de la marca Chevrolet beneficiando así a toda la comunidad que utiliza el software y a sus clientes.', 'Las entrevistas, reuniones y adiestramiento.', 'En el plan nacional Simón Bolívar están escritos, unos objetivos estratégicos y generales.\r\nespecificando el objetivo general que contempla lo siguiente: \"Desarrollar nuestras capacidades científicas-tecnológicas vinculadas a las necesidades del pueblo\".\r\nObjetivos estratégicos y generales: Se plasma lo concerniente al desarrollo tecnológico... 1.5.2.4 \"Desarrollar aplicaciones informáticas que atiendan las necesidades sociables\". En un mundo competitivo entre marcas lo que garantiza un mercado de cliente son las relaciones que tienen las empresas con los mismos en términos de confiabilidad, servicio y disponibilidad, es aquí donde AUTO CRM; con su modulo de encuestas permite medir y corregir el grado de satisfacción del cliente para darle un trato personalizado y agradable donde se crean y aumentan los vínculos de preferencia del cliente por el grupo AMIN como concesionarios preferidos. de la marca Chevrolet motivando al sector automotriz al desarrollo económico y social', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-2523'),
(29, 4, '2016-06-29', 'Gestión de un Sistema de Manejo de Tramites de la Dirección de Catastro de la Alcaldía del Municipio Carrizal.', 'Durante esta etapa se contemplan las actividades de Adiestramiento de los Funcionarios de implantación así como de Usuario Finales de Sistema, la Instalación  Sistema en Entorno de Operación, la carga inicial de datos tomando en en cuenta la Validación y Verificación de la Base de Datos, Las pruebas de implantación y aceptación del Sistema estimado los procesos asociados a los tramites de la Dirección de Catastro, presentar la Propuesta de los Planes de Mantenimiento y niveles de Servicio. Por ultimo se dará Presentación del Sistema al cliente en espera de su Aprobación.', 'El Sistema de Manejo de Tramites de la Dirección de Catastro del Municipio Carrizal del Estado Miranda, en adelante SIMAT está concebido para brindar apoyo a los ciudadanos en la obtención oportuna de información referente a los tramites ante la dirección mencionada. De igual manera facilitará en control de gestión  dentro de la organización, para ello deberá registrase todos los estados administrativos que comprende el trámite, lo que permitirá darle mayor celeridad de ejecución con herramientas de supervisión que el software proveerá. A continuación indicamos los procesos asociados del sistema:\r\na. Información del trámite web: Proceso que permitirá mantener un canal informativo hacia los ciudadanos que gestionan tramites en la Dirección de Catastro de la Alcaldía de carrizal del Estado Miranda.\r\n\r\nb. Registros Administrativos de Tramite: Consistirá en la captura de las etapas administrativas de los tramites, que va desde la inclusión hasta el cierre en sistema, estos eventos se resumen como: Iniciado, Transcripción, Avalúo, cierre Inspección, Parar, Anular. De esta manera se Podrá determinar los siguientes aspectos estadísticos. Tramites procesados, en curso y transferidos por área, historial de movimientos, estado de los tramites, alertas de tramites reasignados y/o priorizados, etc\r\n\r\nc. Notificaron de tramites: Proceso relativo al uso de recursos tecnológicos para dar oportuna información a los ciudadanos mediante el envío de Email y Sms', 'Personal Técnico: La integración del sistema requiere personal con conocimientos en el área de Servidores Linux Base de Dos , SQL y lenguajes estructurado PHP.\r\nPersonal Administrativo: Para el mejor desempeño en la atribución de las funcionalidades del personal de la dirección de catastro es  determinante el conocimiento de los procesos asociados de los procesos asociados a los tramites, desde su registro, procesamiento y salida.\r\nEquipo Servidor: Es beneficioso la ayuda de un equipo servidor d', 'Agilizar los trámites institucionales a través de la provisión de herramientas tecnológicas en concordancia a las tendencias y uso marcado de tecnologías de la sociedad. El registro de actividades relativas al procesamiento de tramites permitirá determinar responsabilidades en los tiempos de procesamiento esperado. El ámbito de uso del aplicativo se extiende además de la organización hacia la colectividad en general lo que tiene como norte la simplificación de trámites administrativos como está contemplado en el Decreto con rango y fuerza de ley de Simplificación de Trámites administrativos como está contemplado en el decreto con rango y fuerza de ley de simplificación de trámites administrativos con esta contemplado en el Decreto con rango y fuerza de ley  simplificación de Trámites Administrativos. Publicado en Gaceta Oficial N° 40.549, de fecha 26 de noviembre de 2014.', 'SIMAT se adoptará con un plan bien establecido de implementación, donde se contempla la integración de personal técnico, administrativo, directivo y colectivo en General para garantizar el éxito de su puesta en Marcha.', 'SIMAT como componente lógico del desarrollo de Software y cuya prioridad de adaptación a las leyes nacionales Vigente, tales como la ley de Simplificación de Trámites Administrativos, Ley de Infogobierno, Ley de Telecomunicaciones, y por supuesto el apoyo al plan de la Patria mediante la vinculación del objetivo 5 en la Preservación de la Vida en el Planeta, construyendo con el ahorro de Papel y la salud Publica en general.', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-2534'),
(30, 4, '2016-06-13', 'Gestión de la implantación de un sistema para el control de notas de entregas e inventario para el servicio técnico de celulares, Inversiones Vlent, S.A. (STCIVALENT) Ubicada en la calle Mariño, Comuna 13 de enero, local 46, Turmero. Edo. Aragua.', 'Alcanzar la implantación satisfactoria del sistema desarrollado para la comunidad, mediante el proceso y seguimiento de las actividades esenciales a la gestión de proyectos.', 'La Gestión  del sistema tiene como alcance digitalizar las notas de entregas, para lo cual el presente proyecto contempla escalar varias etapas, previas y necesarias para el éxito de la implantación en la empresa Inversiones Valent, S.A. estas son: establecimiento de plan de implantación del sistema, incorporación del sistema al entorno de operación, formación necesaria par ala implantación, carga de datos al entorno de operación, pruebas de implantación del sistema, pruebas de aceptación del sistema, preparación del sistema, establecimiento de acuerdo al nivel de servicio, presentación y aprobación del sistema, por último, paso a producción. Una vez alcanzadas todas estas etapas se ha cumplido el propósito del proyecto.', '-Algunos usuarios de la comunidad y miembro de grupo del proyecto no asistieron a algunas fechas pautadas para realizar el adiestramiento de implantación.\r\n- La empresa está ubicada en Turmero para algunos miembros del grupo se hizo difícil para llegar a la hora  de los adiestramientos por lo que la participación se realizó en otro horario inesperado.\r\n-Los cortes consecutivos de luz por el racionamiento eléctrico limito alguna reuniones con la comunidad.\r\n-Algunos usuarios les ha resultado difícil el manejo del sistema debido a que posee poco conocimiento', '-Registrar y actualizar los productos ingresados al inventario en inversiones Valent S.A.\r\n-Verificar en el inventario la cantidad de mercancía existente para cada productos\r\n-Calcular y emitir de las notas de entregas realizadas por los clientes de  inversiones Valent S.A.\r\n-Emitir un informe del stock del inventario de los productos tanto en almacena como en exhibición.\r\n-Generar consultas y emitir reportes en el menor tiempo posible de:\r\n            -Del stock del inventario.\r\n            - Mercancía faltarte.\r\n           - Notas de entregas realizadas.\r\n-Además de agilizar el proceso de facturación y garantizar mayor seguridad de la data cargada en la BD    \r\nya que el sistema permite hacer un respaldo de toda la información almacenada.\r\n-Agiliza los procesos de forma eficaz, donde los clientes y los (4) usuarios finales (integrantes de la comunidad) también se beneficia de esto.', '- Adiestramientos dado por los integrantes de proyecto.\r\n-Encuestas a los usuarios finales.\r\n-Entrevistas realizadas por parte de los integrantes del proyecto a los usuarios finales.\r\n-Formatos de pruebas del sistema, y\r\n-Proyectos comunitario, permitiendo la participación directa de los integrantes de la comunidad interactuando así con el proceso de Gestión del sistema STCIVALENT.S.A.', 'Art 1.5. 1.2: Motor Generador de Ciencia y Tecnología; es decir construyendo con el rediseño y estructura del sistema nacional de ciencia y tecnología e innovación (SNCTI).', 'Calidad en el desarrollo de sistemas informaticos', 'Factible', 'PNFIV-4-16-2529'),
(31, 5, '2017-07-19', 'Gestión de la implantación del sistema web empresarial para el área administrativa y servicios de la compañía anónima “Consorcio De Ingenieros” CONINCA ubicada en Magdaleno estado Aragua.', ' Cumplir con la gestión de la implantación del sistema administrativo empresarial ADGEMAS en el consorcio de ingenieros \"CONINCA\", brindar la capacitación pertinente a los miembros de dicha comunidad para el uso correcto de la aplicación, la elaboración de manuales de usuario, de instalación y de mantenimiento para facilitar la integración de nuevos miembros en el grupo de trabajo, todo esto siguiendo los parámetros definidos en el contrato de servicio.', 'Lograr la puesta en producción de sistema administrativo empresarial ADGEMAS en el consorcio de ingenieros \"CONINCA\" luego de realizadas todas las pruebas pertinentes para ello, así como la capacitación oportuna de todos los involucrados en el día a día de los procesos a realizar dentro del sistema.', 'La principal limitación a la que se enfrenta el equipo de investigación es la posibilidad de pérdidas en la infraestructura tecnológica de la compañía, además del poco personal calificado para la realización de los procesos administrativos y que conocen de primera mano dichos procesos.', 'Beneficiara al departamento de administración que cuenta con (6) empleados y a los encargados de supervisar las obras (3), a su vez beneficiara a los clientes y empresas que soliciten un contrato con una tasa de obras conseguidas al año de (4), pues reducirá su carga de trabajo y agilizara los procesos de registro y solicitud de obras.', 'Entrevistas, visitas continuas a la comunidad para la recolección de información y conocimiento de los procesos que allí se llevan a cabo.', 'Siguiendo las directrices del plan de la patria citada a continuación: Objetivo 1.5.2.4: Desarrollar aplicaciones informáticas que atiendan las necesidades sociales. Relacionándose estrechamente con el presente trabajo de investigación, el sistema web empresarial brindara acceso a las TI a los miembros de la empresa, cubriendo las necesidades informáticas de la misma.', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(32, 5, '2017-07-19', 'Gestión de la implantación de la  Aplicación de procesos administrativos para la empresa “Victoria DPL” La Victoria, Estado Aragua.', 'Cumplir con la gestión de la implantación de la aplicación de procesos administrativos  CYGNUS en la empresa Victoria DPL, brindar la capacitación pertinente a los miembros de dicha empresa para el uso correcto de la aplicación, la elaboración de manuales de usuario, de instalación y de mantenimiento para facilitar la integración de nuevos miembros en el grupo de trabajo, todo esto siguiendo los parámetros definidos en el contrato de servicio.', 'Lograr la puesta en producción del sistema administrativo CYGNUS en la empresa Victoria DPL luego de realizadas todas las pruebas pertinentes para ello, así como la capacitación oportuna de todos los involucrados en el día a día de los procesos a realizar dentro del sistema.', 'La principal limitación a la que se enfrenta el equipo de investigación es el poco personal calificado para la realización de los procesos administrativos y que conocen de primera mano dichos procesos.', ' Esta aplicación beneficia a la empresa agilizando los procesos administrativos para obtener resultados efectivos, de esta forma se beneficiaran una cantidad dos mil quinientos cincuenta y cinco (2.555) empresas al año, conformado por cincuenta y un mil cien (51.100) usuarios, seis (6) miembros de la empresa, tres (3) Administrativos, dos (2) Almacenistas,  un (1) Transportista.', ' Se realizaron entrevistas, charlas y visitas a la empresa, que permitirán conocer los aportes y necesidades de la empresa para así obtener los resultados necesarios, luego dar las propuestas de los integrantes del proyecto y finalmente lograr el resultado esperado.', 'La aplicación brindará al personal de Victoria DPL acceso a las TICS, además de cubrir las necesidades informáticas actuales. Como lo cita el objetivo 1.5.2.4 del Plan de la Patria 2013-2019: “Desarrollar aplicaciones informáticas que  atiendan necesidades sociales”. Así mismo, se considera que el proyecto a realizar, es parte del avance que pueda tener la empresa.', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(33, 5, '2017-07-19', 'Gestión del del Sistema para el control de citas y laboratorio para el control de citas y laboratorio del Centro Medico Ocupacional Victoria C.A.', 'Gestionar un sistema para el control de citas y laboratorio del Centro Médico Ocupacional Victoria C.A. ubicado en la Victoria Estado Aragua, con el propósito de agilizar los procesos en el área de recepción y laboratorio.', 'El presente proyecto comprende la gestión de un sistema para el Centro Medico Ocupacional Victoria C.A. en las áreas de recepción y laboratorio clínico. Con el sistema se aspira a mejorar las condiciones de trabajo del personal, el adiestramiento en el uso del sistema, garantizar la seguridad de los datos, todo esto con el fin de dar paso a producción a un sistema de calidad. Para llevar a cabo las metas propuestas del software, se usará como metodología la Métrica V3. El sistema será implementado en cualquier computadora que disponga de un navegador. Se tiene como plazo de ejecución el presente año 2017, dividido a lo largo de los tres trimestres del mismo, y correspondiendo a las fases estipuladas por el Plan de Implementación.\r\n', ' La primera limitación a destacar es el plazo para la implementación y gestión, el cual comprende el presente año, restricción de algunos datos personales de los pacientes debido a que son confidenciales.\r\n', ' Con  la  gestión  del  sistema  se optimizaría y automatizaría la mayoría de los procesos en el centro médico, de esta forma salvando tiempo, material y esfuerzo en actividades que son realizadas manualmente o pudieran ser más eficientes o mejoradas. La población a beneficiar es el personal del centro médico ocupacional Victoria C.A, lugar donde, entre doctores, asistentes, laboratoristas, gerente y especialistas se pueden contabilizar aproximadamente 20 individuos, e indirectamente se beneficiaría un estimado de casi 60 pacientes que diariamente asisten al centro médico para recibir sus servicios.\r\n', 'Como medios para la integración, se realizaran constantes visitas a la comunidad combinadas con varias entrevistas con el personal que labora en el centro médico acerca del funcionamiento del sistema, observación directa, adiestramiento al personal para hacer uso del sistema y realización de pruebas de integración y aceptación al sistema .\r\n', ' El presente proyecto se  vincula  mediante  el  objetivo  nacional  1.5,  titulado: “Desarrollar  nuestras  capacidades  científico-tecnológicas vinculadas a las necesidades del pueblo.” Y toda la  gama de objetivos estratégicos y generales  correspondientes, especialmente  el  1.5.1.3,  el  cual  se  refiere  al  aprovechamiento de  la actividad científica y la tecnología para cubrir las necesidades sociales; y el objetivo 1.5.2.4 que propone desarrollar aplicaciones informáticas que permitan lograr dicho fin; este objetivo constituye el caso actual del presente proyecto. También existe relación por tratarse de un centro de cuidado de la salud con objetivos como el 2.2.10.1. Los cuales, en síntesis, buscan asegurar la salud de la población, a través del fortalecimiento los niveles de atención y servicios del sistema de salud por medio del uso de la tecnología.\r\n', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(34, 5, '2017-07-19', ' Gestión de la aplicación Web para la administración y control de proyectos de la empresa\n“M-Auto Montajes y Servicios Industriales, C.A. Ubicado en Cagua Edo. Aragua”\n', 'Gestionar la aplicación Web para el control Administrativo de la empresa “M-Auto Montajes y Servicios Industriales C.A.”\r\n ', ' Principalmente se hace mención a todas las adecuaciones pertinentes al sistema, que sean necesarias para su óptimo desempeño, las cuales se definen en asesorías con   tutores y coordinadores, de esta forma se logró llevar la aplicación al 100% de funcionamiento.  De modo que se plantea una propuesta de implantación que permitirá la capacitación del personal administrativo, elementos ofimáticos y físico de la comunidad, con la intención de garantizar una óptima implementación del sistema en la comunidad. Sin embargo es de suma importancia la carga de datos reales realizada por la comunidad, que permitirá aplicar el plan de pruebas destinado a garantizar la gestión del proyecto. Además, es necesario garantizar un mantenimiento al sistema, según el acuerdo de servicios a prestarle a la comunidad, esto con el objetivo de guiar la transición de la comunidad, prestando un soporte técnico durante un tiempo limitado. Y de esta forma dar paso a producción, lo que logrará certificar el pleno funcionamiento del sistema y en el cual se hará uso de herramientas como lo son el plan de mantenimiento o los niveles de servicios para solventar inconvenientes.. Todo esto posible gracias a la apertura de la comunidad haciendo factible este proyecto aportando sus instalaciones y tres equipos donde estará instalado la aplicación, estas cuentan con OS Windows 7, 2GB de RAM y 350GB de disco duro. Por ultimo resaltar el uso de un hosting y una red LAN para la administración de la aplicación en la empresa. los lenguajes de programación implementados en el desarrollo de la aplicación son HTML5,  PHP V. 5.4.7 en un servidor Apache V2 todo en marcado en la herramienta XAMPP V1.8.1\r\n', 'Los procesos orientados al área contable estarán fuera de la aplicación por petición de la empresa, se estarán tomando como objetivos los departamentos de mantenimiento, producción y almacén.', ' Serán beneficiadas las diez (10) personas que integran la empresa ya que tendrán una herramienta capaz de agilizar sus tareas diarias permitiendo un ahorro de tiempo además una gran cantidad de usuarios  al  tener  la  posibilidad  de  contratar  los  servicios  de  esta  empresa  y  por  último  los integrantes del proyecto que obtendrán el conocimiento directamente del campo laboral.', ' Entre las acciones de integración estipuladas por el equipo de investigación y la metodología “Métrica V3” está la formación de los usuarios para el uso óptimo de la aplicación, solicitud de datos para su carga al sistema y acuerdo final.', 'La aplicación web brindará al personal de la empresa el acceso a las TICS, además de cubrir las necesidades informáticas actuales del mismo. Como lo cita el objetivo 1.5.2.4: “Desarrollar aplicaciones informáticas que atiendan necesidades sociales”.', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(35, 5, '2017-07-19', 'Gestión de la aplicación web Kalimba para el control administrativo y pagos de la red wifi de la empresa J&L Connections C.A.\r\n', 'Gestionar la aplicación web Kalimba para el control administrativo y pagos de la red wifi de la empresa J&L Connections C.A.\r\n', 'El presente proyecto se estará realizando a lo largo de las tres fases académicas del presente año 2017, iniciando a principios de año y finalizando a comienzos de diciembre del mismo año; así mismo este vislumbra la gestión del sistema denominado “Kalimba” en la empresa J&L Connections CA, ubicada en la ciudad de la Victoria, Estado Aragua. Cuyas fases académicas se dividen en:\r\nFase 1:\r\nRevisar  las  observaciones  y/o  sugerencias  realizadas  por  el  tutor,  fortaleciendo  así  el  desarrollo  de  la aplicación informática.\r\nFase 2:\r\nUtilizar las herramientas y técnicas de planificación aprendidas para la organización de actividades dentro del trimestre IV.\r\nFase 3:\r\nPresentar ante la comunidad el producto generado en el Trayecto III para la obtención de las sugerencias y mejoras del mismo.\r\nFase 4:\r\nRealizar la adecuación de los procesos del sistema según recomendaciones y sugerencias de la comunidad.\r\nFase 5:\r\nAplicar los métodos y técnicas necesarias para la completa adecuación de la plataforma tecnológica según necesidades de la comunidad.\r\nFase 6:\r\nElaborar el producto generado en el módulo a fin de dar respuesta a los requerimientos de la UC Proyecto Socio Tecnológico IV.\r\n', 'Las limitantes que se presentaran, el tiempo para ser distribuido con las horas académica y estar en la comunidad para cumplir con las horas de trabajo por su ubicación, por lo tanto, se pondrá en práctica en algunos momentos que sea necesario la comunicación remota (video llamadas, correo y entre otros). Así como también en el área del desarrollo del componente para su elaboración entre proceso y que tenga como finalidad una ejecución en conjunto, por esto contamos con área de estudio como lo son programación para el diseño del componente y base de datos para el flujo de la información en la', 'Kalimba aportará innumerables beneficios a la empresa J&L Connections, en cuanto a la automatización de los\r\nprocesos que a diario se llevan a cabo en la entidad empresarial ya mencionada.\r\nLas personas beneficiadas directamente con la gestión de Kalimba son 20 personas e indirectamente  todos los clientes que requieran un servicio en la empresa J&L Connections\r\n', 'Se incentivará a la comunidad con la aplicación web Kalimba el uso de las TIC, además de ello se estará en constante comunicación con la empresa J&L Connections para las mejoras y actualizaciones del sistema web Kalimba\r\n', 'En el presente proyecto tiene vinculación con los Objetivos Nacional del Plan de la Patria 2013-2019 como objetivos\r\nestratégicos: 1.5.3. “Impulsar el desarrollo y uso de equipos electrónicos y aplicaciones informáticas en tecnologías libres y estándares abiertos”.\r\n', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(36, 5, '2017-07-19', 'Gestión de la aplicación web para el control de los procesos que se lleven a cabo en el  “Consultorio Ortodontista Nueva Sonrisa” ubicado en la Victoria, estado Aragua.', 'Gestionar la Aplicación web para el control de los procesos que se lleven a cabo en el  consultorio ortodoncista “Nueva Sonrisa” ubicado en La Victoria, estado Aragua.', 'La ejecución de la gestión de este proyecto informático, estará basado mediante diversas actividades pertinentes al grupo de proyecto e involucrando al personal que labora del consultorio; se realizaran charlas sobre la aplicación y adentramientos al personal laboral, a través de  manuales de usuarios y así poder capacitarlos para el uso eficiente de la aplicación.', ' Se asume que todos los objetivos y requerimientos del proyecto planteados cumplen con los alcances del proyecto. Y por lo tanto no hay limitaciones', 'La implementación de una aplicación web para La agilización de los procesos que se llevan en el consultorio tales como citas, consultas, historia e inventario reflejando subprocesos dentro de la aplicación, para llevar así un control de los procesos, donde se beneficiarán tanto los pacientes como los odontólogos.', 'A través de entrevistas, charlas y observaciones realizadas en el consultorio ortodoncista y análisis de la información.', 'Todo proyecto debe estar enmarcado dentro de los Planes de Desarrollo del País, desde los planes de desarrollo municipales, pasando por los estadales hasta llegar al Plan de Desarrollo Económico y Social de la Nación. La investigación científico-tecnológica y las grandes alianzas que Venezuela ha puesto en marchar dentro del tipo de desarrollo que tiene como objetivo principal, los problemas de estudio que nuestro país se ha concentrado en materia de ciencia y la tecnología están orientadas a actividades socio-económicas y el fortalecimiento de nuestra economía. Por otra parte  en Venezuela se está conformando un nuevo sistema de salud. Este Constituye uno de los segmentos socioeconómicos de mayor incidencia social por su valor cuantitativo en el índice de desarrollo humano. En este sentido, y como parte del conjunto de textos de consultas para el desarrollo de sus proyectos, se facilitó el Programa de la Patria 2013-2019, base para la construcción del Plan de Desarrollo Económico y Social de la Nación 2013-2019 La nueva ética socialista es el eje principal del plan de la patria 2013-2019 y está relacionado con nuestro proyecto Porque está orientado a fortalecer la inte', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(37, 5, '2017-07-19', 'Gestión del  software de  predicción de  las variables de confiabilidad, mantenibilidad y disponibilidad para llevar el control de los tiempos de operatividad y el tiempo de estados de fallas.', 'El  presente  proyecto  tiene  como  objetivo  general  gestionar  el  Software(CMDS)  de predicción de las variables Confiabilidad, Mantenibilidad y Disponibilidad para el seguimiento y control los tiempos de operatividad y el tiempo de estado de fallas, cumpliendo con una serie de objetivos específicos a lo largo de la dicha proyecto de gestión, entre los cuales encontramos: planificar la gestión del ya mencionado software; ejecutar la implantación de CMDS; capacitar a los usuarios del departamento de mantenimiento de la Universidad Politécnica Territorial del Estado Aragua “Federico Brito Figueroa” y por ultimo ejecutar un plan de mantenimiento para CMDS.', ' El presente proyecto socio-tecnológico tiene como alcance la gestión del software (CMDS), un  software capaz de  llevar  el  control de  los  procesos de  simulación de  fallas  de  componentes mecánicos mediante el análisis y el cálculo probabilístico y logístico Confiabilidad, Mantenibilidad y Disponibilidad (CMD), mejorando la toma y el control de los tiempos de fallas y operatividad cómo también la disponibilidad factible para llevar dicho cálculo.\r\n\r\nDicha gestión involucra un plan de implantación en el departamento de Mantenimiento de UPT Aragua en conjunto con la implantación y carga de datos en la aplicación, el seguimiento y control de las pruebas realizadas a CMDS, así como también la capacitación a los usuarios y el trazado y ejecución de un plan de mantenimiento. En primera instancia la gestión tiene por pre requerimiento la planificación de los procesos involucrados. Por lo tanto, las actividades arrancan por el establecimiento de un plan de contemplativo de todas las actividades requeridas para la implantación de CMDS, descritas grosso modo a continuación, al ser vital la verificación de aptitud del software para su ulterior puesta en marcha dentro de la comunidad mediante una revisión general; de dicho proceso de validación surge una serie de  adecuaciones, mismas  que  contribuyen  a  mejoras  realizables  al  software  con  la  finalidad  de apropiarlo para su implantación. Habiendo cumplido con las adecuaciones que fueren necesarias, se procederá con la implantación de CMDS, procedimiento que deberá describirse detalladamente dentro del documento correspondiente, abarcando también la carga de datos reales al software; los detalles pertinentes han de ser establecidos del mismo modo con la comunidad y registrada en soporte físico que cumpla con las pautas normativas acordes al proyecto de gestión.\r\n\r\nLa correcta implantación de CMDS ha de ser apreciada mediante instrumentos de evaluación desarrollados para el caso. De este modo, al finalizar la fase anteriormente descrita, el software ha de ser sometido a las correspondientes pruebas con la finalidad de confirmar que se haya cumplido con el objetivo planteado.\r\n\r\nUna vez finalizada la implantación y carga de datos, el siguiente paso será la inducción del personal involucrado con las actividades automatizadas por la aplicación   a su correcto uso. Esta inducción vendrá dada por un breve proceso de adiestramiento de los trabajadores en interacción con CMDS, \r\n\r\n\r\ntomando en cuenta además el impacto de la implantación del software en el personal y como ésta afecta su desempeño, y poniendo en marcha los planes de contingencia ante dichas incidencias si es el caso.\r\n\r\nAl ser un software un elemento susceptible de mantenimiento, también se hace necesario el planteamiento del alcance que tendrán dichas operaciones con el objeto de preservar  el correcto funcionamiento del software implantado, así como dar cumplimiento con tal planificación. Por lo tanto, se contempla también la elaboración de un plan de mantenimiento y su ejecución como parte de los procesos llevados a cabo durante la gestión.\r\n\r\nHabiendo culminado con todos los elementos anteriormente descritos, considerados estos como hitos fundamentales del proceso de gestión de software inherente a su implantación, se propone como actividad de cierre, la puesta en marcha del software, siendo colocado finalmente en modo de producción. Para ello, los encargados de la gestión realizarán la configuración debida, finalizado con ello la gestión de proyecto.\r\n ', ' La principal limitación a la que se enfrenta el equipo de investigación es qué dicho software agilizará sólo procesos del histórico de fallas.', 'Esta aplicación beneficia al departamento de mantenimiento agilizando los procesos del histórico de fallas para obtención de\r\nresultados efectivos para la toma de decisiones del mantenedor, de esta forma se beneficiaran una\r\ncantidad aproximada de quince (15) profesores y cien (100) estudiantes de ingeniería en Mantenimiento qué podrán hacer uso del software, cómo también, cualquier empresa que cuente con departamento de Mantenimiento.\r\n', 'Se realizaron entrevistas, charlas y visitas a la comunidad, que  permitieron  conocer  sus  aportes  y  necesidades para  la  obtención de  resultados necesarios, luego dar las propuestas de los integrantes del proyecto y finalmente lograr el resultado esperado.\r\n', 'La aplicación brindará al profesorado y alumnado de la especialidad de Mantenimiento acceso a las TICS y cubrirá necesidades\r\ninformáticas. Como está citado en el objetivo 1.5.2.4 del Plan de la Patria 2013-2019: “Desarrollar aplicaciones informáticas que  atiendan necesidades sociales”. Así mismo, se considera que el proyecto a realizar, es parte del avance que pueda tener la empresa.\r\n', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(38, 5, '2017-07-19', 'Gestión de la implantación de la  aplicación w eb para agilizar los procesos que se realizan en el consejo comunal “prados de paya ii”, ubicado en el municipio Santiago Mariño del estado Aragua.', 'Gestionar la implantación de la aplicación web “SISCOMUNAL” encargada de agilizar procesos que se realizan en el consejo comunal “Prados de Paya II” ubicado en\r\nel municipio Santiago Mariño del Estado Aragua.', 'SISCOMUNAL  es  una  aplicación  web  encargada  de  realizar  las  tareas\r\nprincipales llevadas a cabo por el consejo comunal “Prados de Paya II”. Con dicho\r\nproyecto se busca que la comunidad comience a trabajar de manera digital para tener una mayor efectividad  en  cuanto  al tiempo  y organización. Se  harán  pruebas de implantación donde se busca detectar diferentes fallas al Sistema y de aceptación.\r\n', 'Se   basa   en   la   seguridad,   rendimiento   y   mantenimiento   de SISCOMUNAL, ya que si alguna de esta falla la aplicación estaría en riesgo de no ser\r\nusada.\r\n', 'SISCOMUNAL en el consejo comunal “Prados de Paya II” realizara aquellas tareas que son de gran importancia para una comunidad tal como es el censo comunal el cual durante tiempo  ha  sido  un  trabajo,  complejo  y  de  dedicación,  facilitando  así  la\r\nrealización del mismo y la obtención rápida de los datos almacenados, beneficiando a más de 1500 habitantes que residen en dicha comunidad y que requieren de mejor atención.\r\n', 'Para lograr que los usuarios tengan una buena experiencia en el uso de SISCOMUNAL, se les formara dependiendo de los niveles de usuarios y se les entregara manuales de uso de la aplicación que les servirá de guía si se llegara a presentar dudas de uso.', 'Objetivo 1.5: “Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las\r\nnecesidades del pueblo”. Esta investigación se vincula con este objetivo ya que se busca desarrollar una aplicación web que solucionara una problemática que tiene dicho consejo comunal y comunidad en general.', 'Calidad en el desarrollo de sistemas informaticos', '', ''),
(39, 5, '2017-08-28', 'Gestión de la aplicación web para el control de los procesos administrativos del restaurant y sport bar sefardí c.a.', 'Gestionar la aplicación Web para el control de los procesos administrativos del Restaurant y Sport Bar Sefardí C.A. Ubicada en el municipio Girardot, Maracay estado Aragua.', 'Nuestro objetivo principal es satisfacer las necesidades del restaurant y sport bar sefardí mediante la implantación de la aplicación Web. Por lo cual se realizarán todas las adecuaciones necesarias, se diseñará un cronograma donde se establecerán las actividades, se realizará un plan de pruebas el cual se encuentra dividido entre; pruebas de aceptación e implantación que permiten detectar las fallas y corregirlas de manera inmediata. También se plantea la migración y carga de datos reales para comprobar el comportamiento de la aplicación bajo condiciones de producción. Una vez realizada la carga de los datos se impartirá el adiestramiento necesario a los usuarios finales de la misma, a su vez se les hará la entrega de una serie de manuales entre los cuales se encuentran, manual de mantenimiento y manual de usuario. Por último, se establecerá un acuerdo de nivel y servicio donde se especificará el tiempo junto con el tipo de mantenimiento y soporte técnico que se le brindará a la comunidad después de haber entregado el producto final en este caso la puesta en marcha de la aplicación web ORISA.', 'Inconformidad por parte de la comunidad con el producto final. ', 'Se agilizarán los procesos administrativos del restaurante, se mejorará el acceso a la información, se ofrecerá un control de inventario permitiendo evitar la pérdida de alimentos, beneficiando a tres personas del área administrativa: la gerente, el encargado y la cajera, a tres personas del área de servicio: dos mesones y el bar tender, así como también al encargado de la cocina. Se estima que la aplicación beneficiará a un aproximado de 200 clientes a través de reservaciones por la Web.', 'Mediante entrevistas, y con el adiestramiento a los usuarios que harán uso de la aplicación se lograra establecer una integración.', 'Este proyecto está vinculado con el plan de la patria a través del objetivo 1.5 el cual contempla el desarrollo de las capacidades científicas tecnológicas, vinculadas a las necesidades del pueblo, al desarrollar la aplicación se está contribuyendo al avance tecnológico.', 'Calidad en el desarrollo de sistemas informaticos', '', '');
INSERT INTO `proyectos` (`id`, `id_anio`, `fecha`, `titulo`, `objetivo`, `alcance`, `limitaciones`, `aportes`, `acciones`, `vinculacion`, `linea_investigacion`, `factibilidad`, `codigo`) VALUES
(40, 5, '2017-08-28', 'Gestión de la aplicación web el departamento de eventos de inversiones ol new serví c.a. ubicado en Maracay, edo. Aragua.', 'Gestionar la aplicación web para el departamento de eventos de inversiones ol new serví C.A. Ubicado en Maracay, Edo. Aragua.', 'Se plantea una gestión e implantación en el Departamento de Eventos, bajo estándares de usabilidad y calidad según las normas internacionales para el personal administrativo y obrero que labora en la empresa OLNEWSERVICE C.A,  de esta manera siendo así un producto de uso general en el área correspondiente, es necesario de que la misma sea sometida por un procesos riguroso de estudios, pruebas y mantenimiento, ya que es una de las etapas finales de todo proyecto informático, para así obtener un producto de calidad. Para ello se realizara una serie de actividades, tales como: establecer un plan de implantación, formar un equipo de implantación y recibir un correcto adiestramiento, para así posteriormente hacer una buena formación a los usuarios finales de la aplicación, ya implantada la aplicación web en el entorno de operaciones, se procede a realizar la carga de datos reales, luego se ejecutan las pruebas de implantación y aceptación del sistema, adicionalmente se crea un plan de mantenimiento, y se  ejecuta dicho plan, por último se toman en cuenta los acuerdos de nivel de servicio a la comunidad, para así proceder a el paso a producción.', 'Costo del hosting.', 'Agiliza las actividades en el departamento de eventos permitiendo obtener con mayor rapidez y confiabilidad el procesamiento de la información referente a la nómina del personal fijo y contratado, administrar el inventario, el alquiler de implementos y planificación de los eventos. También permite difundir los servicios de la empresa vía web permitiendo la contratación de eventos por ese medio.', 'El desarrollo del proyecto socio tecnológico se lleva beneficios en el área informática y en la comunidad teniendo como orientación el cumplimiento del plan de la patria.', '1.5. Desarrollar nuestras capacidades científico-tecnológicas vinculadas a las necesidades del pueblo. \r\n \r\n1.5.1.3. Fortalecer y orientar la actividad científica, tecnológica y de innovación hacia el aprovechamiento efectivo de las potencialidades y capacidades nacionales para el desarrollo sustentable y la satisfacción de las necesidades sociales, orientando la investigación hacia áreas estratégicas definidas como prioritarias para la solución de los problemas sociales. \r\n \r\n1.5.1.5. Garantizar el acceso oportuno y uso adecuado de las telecomunicaciones y tecnologías de información, mediante el desarrollo de la infraestructura necesaria, así como de las aplicaciones informáticas que atiendan necesidades sociales.\r\n', 'Calidad en el desarrollo de sistemas informaticos', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_comite`
--

CREATE TABLE `proyectos_tiene_comite` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_comite1` int(11) NOT NULL,
  `id_comite2` int(11) NOT NULL,
  `id_comite3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_comite`
--

INSERT INTO `proyectos_tiene_comite` (`id`, `id_proyecto`, `id_comite1`, `id_comite2`, `id_comite3`) VALUES
(1, 1, 21, 2, 0),
(2, 2, 0, 0, 0),
(3, 3, 0, 0, 0),
(4, 4, 27, 22, 36),
(5, 5, 3, 22, 36),
(6, 6, 0, 0, 0),
(7, 7, 25, 49, 50),
(8, 8, 7, 49, 0),
(9, 9, 24, 49, 0),
(10, 10, 24, 0, 49),
(11, 11, 51, 16, 0),
(12, 12, 30, 13, 37),
(13, 13, 16, 37, 13),
(14, 14, 16, 51, 0),
(15, 15, 16, 37, 13),
(16, 16, 0, 16, 0),
(17, 17, 16, 37, 13),
(18, 18, 29, 0, 33),
(19, 19, 29, 52, 9),
(20, 20, 34, 0, 0),
(21, 21, 4, 0, 0),
(22, 22, 33, 10, 52),
(23, 23, 21, 1, 48),
(24, 24, 13, 0, 0),
(25, 25, 13, 2, 0),
(26, 26, 30, 53, 37),
(27, 27, 48, 0, 0),
(28, 28, 37, 0, 0),
(29, 29, 51, 48, 37),
(30, 30, 23, 0, 0),
(31, 31, 0, 0, 0),
(32, 32, 0, 0, 0),
(33, 33, 0, 0, 0),
(34, 34, 0, 0, 0),
(35, 35, 0, 0, 0),
(36, 36, 0, 0, 0),
(37, 37, 0, 0, 0),
(38, 38, 0, 0, 0),
(39, 39, 0, 0, 0),
(40, 40, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_culminacion`
--

CREATE TABLE `proyectos_tiene_culminacion` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_culminacion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_culminacion`
--

INSERT INTO `proyectos_tiene_culminacion` (`id`, `id_proyecto`, `id_culminacion`, `fecha`) VALUES
(1, 1, 4, '0000-00-00'),
(2, 2, 3, '2016-12-08'),
(3, 3, 3, '2016-12-08'),
(4, 4, 3, '2016-12-08'),
(5, 5, 3, '2016-12-08'),
(6, 6, 4, '0000-00-00'),
(7, 7, 3, '2016-12-08'),
(8, 8, 3, '2016-12-08'),
(9, 9, 3, '2016-12-08'),
(10, 10, 3, '2016-12-08'),
(11, 11, 3, '2016-12-08'),
(12, 12, 3, '2016-12-08'),
(13, 13, 3, '2016-12-08'),
(14, 14, 3, '2016-12-08'),
(15, 15, 3, '2016-12-08'),
(16, 16, 3, '2016-12-08'),
(17, 17, 3, '2016-12-08'),
(18, 18, 3, '2016-12-08'),
(19, 19, 3, '2016-12-08'),
(20, 20, 3, '2016-12-08'),
(21, 21, 3, '2016-12-08'),
(22, 22, 3, '2016-12-08'),
(23, 23, 3, '2016-12-08'),
(24, 24, 3, '2016-12-08'),
(25, 25, 3, '2016-12-08'),
(26, 26, 3, '2016-12-08'),
(27, 27, 3, '2016-12-08'),
(28, 28, 3, '2016-12-08'),
(29, 29, 3, '2016-12-08'),
(30, 30, 3, '2016-12-08'),
(31, 31, 4, '0000-00-00'),
(32, 32, 4, '0000-00-00'),
(33, 33, 4, '0000-00-00'),
(34, 34, 4, '0000-00-00'),
(35, 35, 4, '0000-00-00'),
(36, 36, 4, '0000-00-00'),
(37, 37, 4, '0000-00-00'),
(38, 38, 4, '0000-00-00'),
(39, 39, 4, '0000-00-00'),
(40, 40, 4, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_documento`
--

CREATE TABLE `proyectos_tiene_documento` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `portada` varchar(11) NOT NULL,
  `acta_coord` varchar(11) NOT NULL,
  `acta_tutor` varchar(11) NOT NULL,
  `acta_inscrip` varchar(11) NOT NULL,
  `dedicatoria` varchar(11) NOT NULL,
  `agradecimiento` varchar(11) NOT NULL,
  `resumen` varchar(11) NOT NULL,
  `indice_general` varchar(11) NOT NULL,
  `introduccion` varchar(11) NOT NULL,
  `manuales` varchar(11) NOT NULL,
  `empastado` varchar(11) NOT NULL,
  `cd` varchar(11) NOT NULL,
  `informe` varchar(400) NOT NULL,
  `observaciones` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_documento`
--

INSERT INTO `proyectos_tiene_documento` (`id`, `id_proyecto`, `portada`, `acta_coord`, `acta_tutor`, `acta_inscrip`, `dedicatoria`, `agradecimiento`, `resumen`, `indice_general`, `introduccion`, `manuales`, `empastado`, `cd`, `informe`, `observaciones`) VALUES
(1, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Arreglar indice del informe'),
(2, 2, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(3, 3, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(4, 4, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(5, 5, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(6, 6, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(7, 7, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(8, 8, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(9, 9, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(10, 10, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(11, 11, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(12, 12, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(13, 13, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(14, 14, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(15, 15, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(16, 16, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(17, 17, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(18, 18, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(19, 19, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(20, 20, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(21, 21, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(22, 22, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(23, 23, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(24, 24, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(25, 25, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(26, 26, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(27, 27, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(28, 28, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(29, 29, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(30, 30, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'archivos/Informe_Awgespro.pdf', ''),
(31, 31, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(32, 32, '', '', '', '', '', '', '', '', '', '', '', '', 'No', ''),
(33, 33, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(34, 34, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(35, 35, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(36, 36, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(37, 37, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(38, 38, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(39, 39, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', ''),
(40, 40, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_eva_def`
--

CREATE TABLE `proyectos_tiene_eva_def` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `cal_c` int(11) NOT NULL,
  `cal_t` int(11) NOT NULL,
  `cal_e1` int(11) NOT NULL,
  `cal_e2` int(11) NOT NULL,
  `cal_e3` int(11) NOT NULL,
  `cal_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_eva_def`
--

INSERT INTO `proyectos_tiene_eva_def` (`id`, `id_proyecto`, `cal_c`, `cal_t`, `cal_e1`, `cal_e2`, `cal_e3`, `cal_com`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0),
(2, 2, 96, 96, 96, 96, 96, 96),
(3, 3, 96, 96, 96, 96, 96, 96),
(4, 4, 96, 96, 96, 96, 96, 96),
(5, 5, 96, 96, 96, 96, 96, 96),
(6, 6, 0, 0, 0, 0, 0, 0),
(7, 7, 96, 96, 96, 96, 96, 96),
(8, 8, 96, 96, 96, 96, 96, 96),
(9, 9, 96, 96, 96, 96, 96, 96),
(10, 10, 96, 96, 96, 96, 96, 96),
(11, 11, 96, 96, 96, 96, 96, 96),
(12, 12, 96, 96, 96, 96, 96, 96),
(13, 13, 96, 96, 96, 96, 96, 96),
(14, 14, 96, 96, 96, 96, 96, 96),
(15, 15, 96, 96, 96, 96, 96, 96),
(16, 16, 96, 96, 96, 96, 96, 96),
(17, 17, 96, 96, 96, 96, 96, 96),
(18, 18, 96, 96, 96, 96, 96, 96),
(19, 19, 96, 96, 96, 96, 96, 96),
(20, 20, 96, 96, 96, 96, 96, 96),
(21, 21, 96, 96, 96, 96, 96, 96),
(22, 22, 96, 96, 96, 96, 96, 96),
(23, 23, 96, 96, 96, 96, 96, 96),
(24, 24, 96, 96, 96, 96, 96, 96),
(25, 25, 96, 96, 96, 96, 96, 96),
(26, 26, 96, 96, 96, 96, 96, 96),
(27, 27, 96, 96, 96, 96, 96, 96),
(28, 28, 96, 96, 96, 96, 96, 96),
(29, 29, 96, 96, 96, 96, 96, 96),
(30, 30, 96, 96, 96, 96, 96, 96),
(31, 31, 0, 0, 0, 0, 0, 0),
(32, 32, 0, 0, 0, 0, 0, 0),
(33, 33, 0, 0, 0, 0, 0, 0),
(34, 34, 0, 0, 0, 0, 0, 0),
(35, 35, 0, 0, 0, 0, 0, 0),
(36, 36, 0, 0, 0, 0, 0, 0),
(37, 37, 0, 0, 0, 0, 0, 0),
(38, 38, 0, 0, 0, 0, 0, 0),
(39, 39, 0, 0, 0, 0, 0, 0),
(40, 40, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_notificacion`
--

CREATE TABLE `proyectos_tiene_notificacion` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `inscripcion` varchar(10) NOT NULL,
  `factibilidad` varchar(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `jurados` varchar(10) NOT NULL,
  `presentacion1` varchar(10) NOT NULL,
  `evaluacion1` varchar(10) NOT NULL,
  `presentacion2` varchar(10) NOT NULL,
  `evaluacion2` varchar(10) NOT NULL,
  `presentacion3` varchar(10) NOT NULL,
  `evaluacion3` varchar(10) NOT NULL,
  `socializacion` varchar(10) NOT NULL,
  `evadef` varchar(10) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `culminacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_notificacion`
--

INSERT INTO `proyectos_tiene_notificacion` (`id`, `id_proyecto`, `inscripcion`, `factibilidad`, `codigo`, `jurados`, `presentacion1`, `evaluacion1`, `presentacion2`, `evaluacion2`, `presentacion3`, `evaluacion3`, `socializacion`, `evadef`, `documento`, `culminacion`) VALUES
(1, 1, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(2, 2, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(3, 3, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(4, 4, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(5, 5, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(6, 6, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(7, 7, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(8, 8, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(9, 9, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(10, 10, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(11, 11, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(12, 12, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(13, 13, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(14, 14, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(15, 15, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(16, 16, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(17, 17, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(18, 18, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(19, 19, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(20, 20, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(21, 21, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(22, 22, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(23, 23, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(24, 24, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(25, 25, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(26, 26, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(27, 27, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(28, 28, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(29, 29, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(30, 30, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(31, 31, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(32, 32, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(33, 33, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(34, 34, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(35, 35, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(36, 36, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(37, 37, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(38, 38, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(39, 39, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto'),
(40, 40, 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto', 'No Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_opinion`
--

CREATE TABLE `proyectos_tiene_opinion` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `opn_coord` varchar(20) NOT NULL,
  `obs_coord` text NOT NULL,
  `opn_tutor` varchar(20) NOT NULL,
  `obs_tutor` text NOT NULL,
  `opn_esp1` varchar(20) NOT NULL,
  `obs_esp1` text NOT NULL,
  `opn_esp2` varchar(20) NOT NULL,
  `obs_esp2` text NOT NULL,
  `opn_esp3` varchar(20) NOT NULL,
  `obs_esp3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_opinion`
--

INSERT INTO `proyectos_tiene_opinion` (`id`, `id_proyecto`, `opn_coord`, `obs_coord`, `opn_tutor`, `obs_tutor`, `opn_esp1`, `obs_esp1`, `opn_esp2`, `obs_esp2`, `opn_esp3`, `obs_esp3`) VALUES
(1, 1, 'Si', 'Mejorar redaccion', 'Si', 'Mejorar alcances', 'Si', 'Mejorar Limitaciones', '0', '', '0', ''),
(2, 2, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(3, 3, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(4, 4, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(5, 5, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(6, 6, '0', '', '0', '', '0', '', '0', '', '0', ''),
(7, 7, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(8, 8, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(9, 9, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(10, 10, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(11, 11, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(12, 12, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(13, 13, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(14, 14, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(15, 15, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(16, 16, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(17, 17, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(18, 18, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(19, 19, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(20, 20, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(21, 21, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(22, 22, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(23, 23, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(24, 24, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(25, 25, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(26, 26, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(27, 27, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(28, 28, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(29, 29, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(30, 30, 'Si', '', 'Si', '', 'Si', '', 'Si', '', 'Si', ''),
(31, 31, '0', '', '0', '', '0', '', '0', '', '0', ''),
(32, 32, '0', '', '0', '', '0', '', '0', '', '0', ''),
(33, 33, '0', '', '0', '', '0', '', '0', '', '0', ''),
(34, 34, '0', '', '0', '', '0', '', '0', '', '0', ''),
(35, 35, '0', '', '0', '', '0', '', '0', '', '0', ''),
(36, 36, '0', '', '0', '', '0', '', '0', '', '0', ''),
(37, 37, '0', '', '0', '', '0', '', '0', '', '0', ''),
(38, 38, '0', '', '0', '', '0', '', '0', '', '0', ''),
(39, 39, '0', '', '0', '', '0', '', '0', '', '0', ''),
(40, 40, '0', '', '0', '', '0', '', '0', '', '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_permiso`
--

CREATE TABLE `proyectos_tiene_permiso` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `cont` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_permiso`
--

INSERT INTO `proyectos_tiene_permiso` (`id`, `id_proyecto`, `id_permiso`, `cont`) VALUES
(1, 1, 1, 1),
(2, 2, 0, 0),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 0, 0),
(6, 6, 0, 0),
(7, 7, 0, 0),
(8, 8, 0, 0),
(9, 9, 0, 0),
(10, 10, 0, 0),
(11, 11, 0, 0),
(12, 12, 0, 0),
(13, 13, 0, 0),
(14, 14, 0, 0),
(15, 15, 0, 0),
(16, 16, 0, 0),
(17, 17, 0, 0),
(18, 18, 0, 0),
(19, 19, 0, 0),
(20, 20, 0, 0),
(21, 21, 0, 0),
(22, 22, 0, 0),
(23, 23, 0, 0),
(24, 24, 0, 0),
(25, 25, 0, 0),
(26, 26, 0, 0),
(27, 27, 0, 0),
(28, 28, 0, 0),
(29, 29, 0, 0),
(30, 30, 0, 0),
(31, 31, 0, 0),
(32, 32, 0, 0),
(33, 33, 0, 0),
(34, 34, 0, 0),
(35, 35, 0, 0),
(36, 36, 0, 0),
(37, 37, 0, 0),
(38, 38, 0, 0),
(39, 39, 0, 0),
(40, 40, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_tiene_socializacion`
--

CREATE TABLE `proyectos_tiene_socializacion` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `lugar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos_tiene_socializacion`
--

INSERT INTO `proyectos_tiene_socializacion` (`id`, `id_proyecto`, `fecha`, `hora_entrada`, `lugar`) VALUES
(1, 1, '2017-12-01', '09:00:00', 'B4'),
(2, 2, '2016-12-06', '09:00:00', 'B4'),
(3, 3, '2016-12-06', '09:00:00', 'B4'),
(4, 4, '2016-12-06', '09:00:00', 'B4'),
(5, 5, '2016-12-06', '09:00:00', 'B4'),
(6, 6, '0000-00-00', '00:00:00', ''),
(7, 7, '2016-12-06', '09:00:00', 'B4'),
(8, 8, '2016-12-06', '09:00:00', 'B4'),
(9, 9, '2016-12-06', '09:00:00', 'B4'),
(10, 10, '2016-12-06', '09:00:00', 'B4'),
(11, 11, '2016-12-06', '09:00:00', 'B4'),
(12, 12, '2016-12-06', '09:00:00', 'B4'),
(13, 13, '2016-12-06', '09:00:00', 'B4'),
(14, 14, '2016-12-06', '09:00:00', 'B4'),
(15, 15, '2016-12-06', '09:00:00', 'B4'),
(16, 16, '2016-12-06', '09:00:00', 'B4'),
(17, 17, '2016-12-06', '09:00:00', 'B4'),
(18, 18, '2016-12-06', '09:00:00', 'B4'),
(19, 19, '2016-12-06', '09:00:00', 'B4'),
(20, 20, '2016-12-06', '09:00:00', 'B4'),
(21, 21, '2016-12-06', '09:00:00', 'B4'),
(22, 22, '2016-12-06', '09:00:00', 'B4'),
(23, 23, '2016-12-06', '09:00:00', 'B4'),
(24, 24, '2016-12-06', '09:00:00', 'B4'),
(25, 25, '2016-12-06', '09:00:00', 'B4'),
(26, 26, '2016-12-06', '09:00:00', 'B4'),
(27, 27, '2016-12-06', '09:00:00', 'B4'),
(28, 28, '2016-12-06', '09:00:00', 'B4'),
(29, 29, '2016-12-06', '09:00:00', 'B4'),
(30, 30, '2016-12-06', '09:00:00', 'B4'),
(31, 31, '0000-00-00', '00:00:00', ''),
(32, 32, '0000-00-00', '00:00:00', ''),
(33, 33, '0000-00-00', '00:00:00', ''),
(34, 34, '0000-00-00', '00:00:00', ''),
(35, 35, '0000-00-00', '00:00:00', ''),
(36, 36, '0000-00-00', '00:00:00', ''),
(37, 37, '0000-00-00', '00:00:00', ''),
(38, 38, '0000-00-00', '00:00:00', ''),
(39, 39, '0000-00-00', '00:00:00', ''),
(40, 40, '0000-00-00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id` int(11) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id`, `responsable`, `telefono`, `correo`) VALUES
(1, 'Rafael Telles', '0416-1234556', 'tellesrafael@hotmail.com'),
(2, 'Darwin', '0244-3356767', 'darwin@gmail.com'),
(3, 'Esperanza Castellano', '0412-1234567', 'esperanza@gmail.com'),
(4, 'PEDRO MATOS', '0244-3324519', 'pedromatos@gmail.com'),
(5, 'Carlos Castellano', '0244-3321468', 'carloscas@gmail.com'),
(6, 'Ada Tabares', '0412-4444870', 'ada@gmail.com'),
(7, 'Manuel Hernandez', '0416-4264859', 'manuel.h.1997@gmail.com'),
(8, 'Ronaldo Cardona', '0414-3434398', 'ronaldo.t95@hotmail.com'),
(9, 'Ricardo Bata', '0412-7662628', 'tsugantenshou1@gmail.com'),
(10, 'Rolangel Rodriguez', '0426-4786240', 'rolrodbar@gmail.com'),
(11, 'Jorman Perez', '0414-4920634', 'jormanperezhd@gmail.com'),
(12, 'Daniela Gutierrez ', '0414-4629489', 'gutierrezaniela0709@gmail.com'),
(13, 'Hairam Perez', '0416-7381409', 'haprezre@gmail.com'),
(14, 'Jimmy Noriega', '0414-733026', 'jimmynoriega32@gmail.com'),
(15, 'Liz Guerra', '0412-5339731', 'guerraliz10@gmail.com'),
(16, 'Alvaro Bracho', '0412-2493166', 'alvarod.brachor.18@gmail.com'),
(17, 'Anibal Rodriguez', '0412-4354799', 'anibalrodriguezmujica@gmail.co'),
(18, 'Sthefany Gomez', '0412-6733912', 'sther10_1995@hotmail.com'),
(19, 'Solisbeth Gomez', '0412-4449279', 'solisbethgomez@hotmail.com'),
(20, 'Loren Yanez', '0412-1320795', 'yanezloren33@gmail.com'),
(21, 'Kenneth Praolini', '0244-0000000', 'kennethprao23@gmail.com'),
(22, 'Andres Hernandez', '0412-0371863', 'aahc1994@gmail.com'),
(23, 'Raquel Villanueva', '0412-5005284', 'villanuevaraquel18@gmail.com'),
(24, 'Flor Guevara', '0424-3504968', 'flormaritza05@gmail.com'),
(25, 'Yoduel Jimnez', '0426-5404842', 'jyoduel@gmail.com'),
(26, 'Jhon Meza', '0414-0386288', 'jhonamg2112@gmail.com'),
(27, 'Ines Berro', '0412-1434266', 'betzabrea30@gmail.com'),
(28, 'John Camejo', '0412-0516159', 'camejojohn@hotmail.com'),
(29, 'Pedro Carrillo ', '0412-2778217', 'pjcs@gmail.com'),
(30, 'Daniela Gonzales', '0412-1584420', 'danielag83266@gmail.com'),
(31, 'Erick Rodriguez', '0426-7336090', ''),
(32, 'Daniela Camino', '0412-2291733', 'danireth069@gmail.com'),
(33, 'Eymer Lopez', '0412-8534761', 'Eymer1235@gmail.com'),
(34, 'Jesús Leones', '0412-4587089', 'jesusleones27@hotmail.com'),
(35, 'Luis Agenjo', '0426-1340484', 'Lagenjolucena@gmail.com'),
(36, 'Rafael Alvarez', '0412-4784181', 'yops.ra@gmail.com'),
(37, 'Geovanny Abbinante', '0412-9666767', 'abbinantemillan@gmail.com'),
(38, 'Roger Colemenares', '0412-4877000', 'Rogercolmenares17@gmail.com'),
(39, 'Saul Flores', '0244-2349776', 'saulflores@gmail.com'),
(40, 'Emily Martinez', '0412-7799778', 'emily1230@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `num_seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `num_seccion`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarios`
--

CREATE TABLE `secretarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `nacionalidad` varchar(40) NOT NULL,
  `sexo` varchar(40) NOT NULL,
  `grado_instr` varchar(60) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `secretarios`
--

INSERT INTO `secretarios` (`id`, `nombres`, `apellidos`, `ci`, `telefono`, `nacionalidad`, `sexo`, `grado_instr`, `status`) VALUES
(1, 'Andrea', 'Tovar', '20266775', '04243173921', 'V', 'F', 'Lic', 'Activo'),
(2, 'Moreima', 'Rojas', '12001404', '04165426559', 'V', 'F', 'TSU', 'Lic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`) VALUES
(1, 'Sede Victoria'),
(2, 'Sede Maracay'),
(3, 'Sede Barbacoas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayectos`
--

CREATE TABLE `trayectos` (
  `id` int(11) NOT NULL,
  `num_trayecto` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trayectos`
--

INSERT INTO `trayectos` (`id`, `num_trayecto`, `descripcion`) VALUES
(1, 1, 'I'),
(2, 2, 'II'),
(3, 3, 'III'),
(4, 4, 'IV'),
(5, 5, 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `descripcion`) VALUES
(1, 'Diurno'),
(2, 'Nocturno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor_tiene_proyectos`
--

CREATE TABLE `tutor_tiene_proyectos` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutor_tiene_proyectos`
--

INSERT INTO `tutor_tiene_proyectos` (`id`, `id_proyecto`, `id_profesor`) VALUES
(1, 1, 32),
(2, 2, 4),
(3, 3, 6),
(4, 4, 14),
(6, 6, 6),
(7, 7, 10),
(9, 5, 47),
(10, 8, 47),
(11, 9, 14),
(12, 10, 30),
(13, 11, 15),
(14, 12, 37),
(15, 13, 5),
(16, 14, 28),
(17, 15, 5),
(18, 16, 28),
(19, 17, 4),
(20, 18, 34),
(21, 19, 10),
(22, 20, 47),
(23, 21, 14),
(24, 22, 14),
(25, 23, 1),
(26, 24, 5),
(27, 25, 48),
(28, 26, 2),
(29, 27, 15),
(30, 28, 13),
(31, 29, 22),
(32, 30, 48),
(33, 31, 6),
(34, 32, 6),
(35, 33, 32),
(36, 34, 34),
(37, 35, 36),
(38, 36, 27),
(39, 37, 32),
(40, 38, 34),
(41, 39, 4),
(42, 40, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nivel` varchar(15) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` varchar(100) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `intentos` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ci`, `correo`, `telefono`, `usuario`, `clave`, `nivel`, `pregunta`, `respuesta`, `foto`, `intentos`, `status`) VALUES
(1, '26369374', 'guillermogarvar@hotmail.com', '0416-9454226', 'guillermo', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es el nombre de tu mascota', 'cristal', 'fotousuarios/', 0, 'Activo'),
(2, '21254966', 'luisenriquemarchan@gmail.com', '0416-3455250', 'lema', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es el nombre de tu mascota', 'lola', 'fotousuarios/', 0, 'Activo'),
(3, '24817989', 'abrahanjpl@hotmail.com', '0416-1413448', 'abraham', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es el nombre de tu mascota', 'lolo', 'fotousuarios/', 0, 'Activo'),
(4, '26192529', 'mrandres1997@gmail.com', '0416-2383185', 'andress', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es tu pelicula favorita', 'los piratas del caribe', 'fotousuarios/', 0, 'Activo'),
(5, '21026870', 'jhosnoirlit@gmail.com', '0412-4373630', 'jhosno', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es tu pelicula favorita', 'jhosno', 'fotousuarios/', 0, 'Activo'),
(7, '9473841', 'muzcateguiy@gmail.com', '0416-5478348', 'mayba', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Cual es el nombre de tu mascota', 'fifi', 'fotousuarios/', 0, 'Activo'),
(8, '12143906', 'rafaeltelles@gmail.com', '0416-2436374', 'rafaelt', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Administrador', 'Cual es tu pelicula favorita', 'Telles', 'fotousuarios/', 0, 'Activo'),
(9, '19277027', 'gabrielpatinho2011@gmail.com', '0412-7845325', 'juanny', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es tu serie favorita', 'juanny', 'fotousuarios/', 0, 'Activo'),
(10, '20592726', 'floriana_mantilla123@hotmail.com', '0414-4887836', 'floriana', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'floriana', 'fotousuarios/', 0, 'Activo'),
(11, '25364957', 'naingaizan@gmail.com', '0426-2348536', 'nain', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'gaizan', 'fotousuarios/', 0, 'Activo'),
(12, '25364883', 'antonijleon@gmail.com', '0412-0360852', 'leon', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'leon', 'fotousuarios/', 0, 'Activo'),
(13, '22295184', 'arriojamary@gmail.com', '0426-1376513', 'mary', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'mary', 'fotousuarios/', 0, 'Activo'),
(14, '24669508', 'felixmorgado19@gmail.com', '0416-7392112', 'felixm', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es tu pelicula favorita', 'gladiador', 'fotousuarios/', 0, 'Activo'),
(15, '25873060', 'carolg73060@gmail.com', '0416-4430162', 'carol', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Cual es tu comida favorita', 'ensalada agridulce', 'fotousuarios/', 0, 'Activo'),
(16, '25873410', 'manuel.h.1997@gmail.com', '0416-4264858', 'manuelh', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'manuel', 'fotousuarios/', 0, 'Activo'),
(17, '26460531', 'jailenefernandez77@gmail.com', '0426-7420698', 'jailene', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jailene', 'fotousuarios/', 0, 'Activo'),
(18, '26148306', 'ronaldo.t95@hotmail.com', '0414-3434398', 'ronaldo', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'ronaldo', 'fotousuarios/', 0, 'Activo'),
(19, '25873529', 'yelimargutierrez@hotmail.com', '0416-9465469', 'yelimar', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'yelimar', 'fotousuarios/', 0, 'Activo'),
(20, '26010684', 'roger21sanabria10@gmail.com', '0412-6707055', 'rogers', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'roger', 'fotousuarios/', 0, 'Activo'),
(21, '25314530', 'tsugantenshou1@gmail.com', '0412-7662628', 'ricardo', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'ricardo', 'fotousuarios/', 0, 'Activo'),
(22, '21465728', 'yeirushkaliendo@gmail.com', '0426-4486951', 'yeirushka', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'yeirushka', 'fotousuarios/', 0, 'Activo'),
(23, '21603227', 'rolrodbar@gmail.com', '0426-4786240', 'rolangel', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'rolangel', 'fotousuarios/', 0, 'Activo'),
(24, '26735272', 'vtxguitar@gmail.com', '0426-4786240', 'fanger', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'fanger', 'fotousuarios/', 0, 'Activo'),
(25, '22294276', 'jormanperez22@gmail.com', '0414-4920634', 'jorman', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jorman', 'fotousuarios/', 0, 'Activo'),
(26, '17716552', 'zonacreativahd@gmail.com', '0412-7434010', 'henry', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'henry', 'fotousuarios/', 0, 'Activo'),
(27, '20770354', 'amonoga.gs@gmail.com', '0414-4913524', 'albert', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'albert', 'fotousuarios/', 0, 'Activo'),
(28, '24670578', 'gutierrezdaniela0709@gmail.com', '0414-4629489', 'danielag', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'daniela', 'fotousuarios/', 0, 'Activo'),
(29, '25742347', 'paola.7.vivas@gmail.com', '0412-4892338', 'paola', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'paola', 'fotousuarios/', 0, 'Activo'),
(30, '24669510', 'haprezre@gmail.com', '0416-7381409', 'hairam', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'hairam', 'fotousuarios/', 0, 'Activo'),
(31, '8589231', 'pinero.tita@gmail.com', '0416-6213000', 'tita', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'tita', 'fotousuarios/', 0, 'Activo'),
(32, '15733026', 'jimmynoriega32@gmail.com', '0414-5433991', 'jimmy', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jimmy', 'fotousuarios/', 1, 'Activo'),
(33, '25525725', 'joelberroteran15.jb@gmail.com', '0416-7485695', 'roiser', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'roiser', 'fotousuarios/', 0, 'Activo'),
(34, '21003354', 'guerraliz10@gmail.com', '0412-5339731', 'liz', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'liz', 'fotousuarios/', 0, 'Activo'),
(35, '19268804', 'kariney.info@gmail.com', '0416-1486281', 'kariney', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'kariney', 'fotousuarios/', 0, 'Activo'),
(36, '24997084', 'alvarod.brachor.18@gmail.com', '0412-2493166', 'alvaro', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Alvaro', 'fotousuarios/', 0, 'Activo'),
(37, '21097686', 'reinaldo.a.y.r@gmail.com', '0416-4374692', 'reinaldo', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Reinaldo', 'fotousuarios/', 0, 'Activo'),
(38, '25249525', 'anthonydeyvis32@gmail.com', '0424-1096044', 'anthony', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'anthony', 'fotousuarios/', 0, 'Activo'),
(39, '21025775', 'anibalrodriguezmujica@gmail.com', '0412-4354799', 'Anibal', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Anibal', 'fotousuarios/', 0, 'Activo'),
(40, '24343170', 'sther10_1995@hotmail.com', '0412-6722912', 'sthefany', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'sthefany', 'fotousuarios/', 0, 'Activo'),
(41, '24388550', 'del.mar1@hotmail.co', '0414-4432048', 'Gladysr', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'gladys', 'fotousuarios/', 0, 'Activo'),
(42, '23802305', 'jr_baby_11@hotmail.com', '0412-4827104', 'josaura', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'josaura', 'fotousuarios/', 0, 'Activo'),
(43, '21369876', 'solisbethgomez@hotmail.com', '0412-4449279', 'solisbeth', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'solisbeth', 'fotousuarios/', 0, 'Activo'),
(44, '21260005', 'jonnytovar94@gmail.com', '0412-4859924', 'jonny', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jonny', 'fotousuarios/', 0, 'Activo'),
(45, '25072413', 'franllelis94@hotmail.com', '0416-9455702', 'ilana', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'iliana', 'fotousuarios/', 0, 'Activo'),
(46, '20450449', 'yanezloren33@gmail.com', '0412-1320795', 'loren', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'loren', 'fotousuarios/', 0, 'Activo'),
(47, '23633075', 'loreny.frai@gmail.com', '0416-3130570', 'loreny', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'loreny', 'fotousuarios/', 0, 'Activo'),
(48, '19993935', 'kennethprao23@gmail.com', '0412-0000000', 'kenneth', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'kenneth', 'fotousuarios/', 0, 'Activo'),
(49, '20057901', 'vittodub@gmail.com', '0412-0000000', 'victor', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'victor', 'fotousuarios/', 0, 'Activo'),
(50, '23795025', 'kevinsmb11@gmail.com', '0412-0000000', 'kevin', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'kevin', 'fotousuarios/', 0, 'Activo'),
(51, '25501531', 'aahc1994@gmail.com', '0412-0371863', 'andres', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'andres', 'fotousuarios/', 0, 'Activo'),
(52, '25067745', 'jesusmanuelir@gmail.com', '0412-4164309', 'jesus', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jesus', 'fotousuarios/', 0, 'Activo'),
(53, '14829052', 'villanuevaraquel18@gmail.com', '0412-5005284', 'raquel', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'raquel', 'fotousuarios/', 0, 'Activo'),
(54, '12121071', 'deyanirarodriguezr@gmail.com', '0416-5493155', 'deyanira', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'deyanira', 'fotousuarios/', 0, 'Activo'),
(55, '14934812', 'johannaabad2604@gmail.com', '0416-9317849', 'abad', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'abad', 'fotousuarios/', 0, 'Activo'),
(56, '16762184', 'flormaritza05@gmail.com', '0424-3504968', 'flor', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'flor', 'fotousuarios/', 0, 'Activo'),
(57, '8105632', 'karlosrosales05@gmail.com', '0426-4358147', 'carlos', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'carlos', 'fotousuarios/', 0, 'Activo'),
(58, '12121721', 'jyoduel@gmail.com', '0426-5404842', 'Yoduel', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Yoduel', 'fotousuarios/', 0, 'Activo'),
(59, '15733521', 'carlosj111@hotmail.com', '0412-1442681', 'carlost', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Carlos', 'fotousuarios/', 0, 'Activo'),
(60, '13463023', 'pdsm81@hotmail.com', '0414-2153383', 'Pedro', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Pedro', 'fotousuarios/', 0, 'Activo'),
(61, '17969323', 'jhonamg2112@gmail.com', '0414-0386288', 'Jhon', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jhon', 'fotousuarios/', 0, 'Activo'),
(62, '18842834', 'mirellyagb@gmail.com', '0412-9295434', 'Mirelly', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Mirelly', 'fotousuarios/', 0, 'Activo'),
(63, '14830392', 'betzabrea30@gmail.com', '0412-1434266', 'ines', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Ines', 'fotousuarios/', 0, 'Activo'),
(64, '13479764', 'camejohn@hotmail.com', '0414-0511659', 'johnc', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'johnc', 'fotousuarios/', 0, 'Activo'),
(65, '21369046', 'bitasico07@gmail.com', '0424-3356245', 'andrian', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'andrian', 'fotousuarios/', 0, 'Activo'),
(66, '19268112', 'miguelmsrin1288@gmail.com', '0412-4362079', 'miguelangel', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'miguelangel', 'fotousuarios/', 0, 'Activo'),
(67, '10276000', 'pjes1970@gmail.com', '0412-2778217', 'pedrocar', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'pedro', 'fotousuarios/', 0, 'Activo'),
(68, '12611725', 'yormanni@hotmail.com', '0412-7448400', 'yorman', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'yorman', 'fotousuarios/', 0, 'Activo'),
(69, '20769521', 'danielag83266@gmail.com', '0412-1584420', 'danielagonz', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Daniela', 'fotousuarios/', 0, 'Activo'),
(70, '19833653', 'landaete161@hotmail.com', '0416-5841725', 'Alberto', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'Alberto', 'fotousuarios/', 0, 'Activo'),
(71, '18855634', 'kevin_garcia_unefa@hotmail.com', '0412-1308840', 'Keving', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'kevin', 'fotousuarios/', 0, 'Activo'),
(72, '8586118', 'glendys69@gmail.com', '0412-8763009', 'glendys', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coord Trayecto', 'animal favorito', 'perro', 'fotousuarios/', 0, 'Activo'),
(73, '9685572', 'yasmirnar2003@hotmail.com', '0416-5473007', 'jeazmin', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Como se llama tu mejor amigo(a)', 'Jeazmin', 'fotousuarios/', 0, 'Activo'),
(74, '7297689', 'pedrohernandez@gmail.com', '0416-6543209', 'pedroh', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coord Trayecto', 'Como se llama tu mejor amigo(a)', 'Pedro', 'fotousuarios/', 0, 'Activo'),
(75, '8779274', 'cesarp@gmail.com', '0412-5678965', 'cesarp', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Como se llama tu mejor amigo(a)', 'cesar', 'fotousuarios/', 0, 'Activo'),
(76, '16538951', 'maria_gil19@hotmail.com', '0424-3157909', 'mariagil', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Como se llama tu mejor amigo(a)', 'maria', 'fotousuarios/', 0, 'Activo'),
(77, '14240998', 'edeblangelupta@gmail.com', '0412-6772307', 'edeblangel', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Como se llama tu mejor amigo(a)', 'edeblangel', 'fotousuarios/', 0, 'Activo'),
(78, '8819893', 'vivasyamilet@gmail.com', '0416-8862001', 'yamilet', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Como se llama tu mejor amigo(a)', 'yamilet', 'fotousuarios/', 0, 'Activo'),
(79, '10360697', 'miguelmejias051@gmail.com', '0412-7032127', 'miguelm', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Coordinador', 'Como se llama tu mejor amigo(a)', 'miguel', 'fotousuarios/', 0, 'Activo'),
(80, '20266775', 'andreatovarmontero@hotmail.com', '0424-3173921', 'andreatovar', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Secretario', 'Como se llama tu mejor amigo(a)', 'andrea', 'fotousuarios/', 0, 'Activo'),
(81, '12001404', 'moreimarojas@hotmail.com', '0416-5426559', 'more', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Secretario', 'Como se llama tu mejor amigo(a)', 'moreima', 'fotousuarios/', 0, 'Activo'),
(82, '7188413', 'castellanosr_di@yahoo.com', '0414-9937821', 'richardcastellanos', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Administrador', 'Como se llama tu mejor amigo(a)', 'richard', 'fotousuarios/', 0, 'Activo'),
(83, '24173253', 'whoolsat-lm@hotmail.es', '0416-7336090', 'erick', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'erick', 'fotousuarios/', 0, 'Activo'),
(84, '24433170', 'luis.10000@hotmail.com', '0414-3448714', 'luiso', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'luis', 'fotousuarios/', 0, 'Activo'),
(85, '24817681', 'danireth069@gmail.com', '0412-2912733', 'daniela', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'daniela', 'fotousuarios/', 0, 'Activo'),
(86, '24176516', 'wolfgangwilfredo@gmail.com', '0412-5327426', 'wolfgang', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'wolfgang', 'fotousuarios/', 0, 'Activo'),
(87, '25742787', 'eymer1235@gmail.com', '0412-8534761', 'eymer', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'eymer', 'fotousuarios/', 0, 'Activo'),
(88, '25976491', 'jesusleones27@hotmail.com', '0414-4587089', 'jesusl', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jesus', 'fotousuarios/', 0, 'Activo'),
(89, '21252464', 'josgseg@gmail.com', '0412-0497041', 'joses', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jose', 'fotousuarios/', 0, 'Activo'),
(90, '24176569', 'dollyurbina16@gmail.com', '0412-0375387', 'dolly', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'dolly', 'fotousuarios/', 0, 'Activo'),
(91, '22295688', 'lagenjolucena@gmail.com', '0426-1340484', 'agenjo', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'agenjo', 'fotousuarios/', 0, 'Activo'),
(92, '24175759', 'witoldg95@gmail.com', '0424-3264261', 'witold', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'witold', 'fotousuarios/', 0, 'Activo'),
(93, '25071700', 'Josegeol@gmail.com', '0412-9409998', 'olivo', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'olivo', 'fotousuarios/', 0, 'Activo'),
(94, '23966840', 'yops.ra@gmail.com', '0412-4784181', 'rafaelal', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'rafael', 'fotousuarios/', 0, 'Activo'),
(95, '25702077', 'ma-thebigboss@hotmail.com', '0416-9147963', 'misael', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'misael', 'fotousuarios/', 0, 'Activo'),
(96, '21098674', 'sinergiacables.mhurtado@gmail.com', '0412-8944793', 'kayrys', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'kayrys', 'fotousuarios/', 0, 'Activo'),
(97, '25993161', 'abbinantemillan@gmail.com', '0412-9666767', 'geovanny', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'geovanny', 'fotousuarios/', 0, 'Activo'),
(98, '22098851', 'ysrraeljmr1995@gmail.com', '0412-1436606', 'ysrrael', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'ysrrael', 'fotousuarios/', 0, 'Activo'),
(99, '26090360', 'yulyescalona@hotmail.com', '0416-3447709', 'yuly', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'yuly', 'fotousuarios/', 0, 'Activo'),
(100, '24171147', 'rogercolmenares17@gmail.com', '0412-4877000', 'roger', '$2y$10$WIQ7S9y8QS5SKTDh918G3O34Dqfjkl2ik7q0XGZZlRR.NJqsa1Kei', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'roger', 'fotousuarios/', 0, 'Activo'),
(101, '25607793', 'floressaul18@gmail.com', '0412-7780234', 'saulf', '$2y$10$hPoYWS4iC3muesElizVhnOv0qpxYFE.6yNQygzgWlC4Hm/J0KVuiy', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'saul', 'fotousuarios/', 0, 'Activo'),
(102, '24420646', 'jesus_matute_2009@hotmail.com', '0414-9986220', 'jesusm', '$2y$10$1hNDZWJCVD8GxlQ0F2fSV.Wb9qWDzdcK1EaIKDEA9fRYsjLhDT5jy', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jesus', 'fotousuarios/', 0, 'Activo'),
(103, '21254252', 'oliver_antonio_linares89@hotmail.com', '0426-2350928', 'oliver', '$2y$10$d4Lk9gk/xGSRzckn.Xhgdu87dRJsRv4kaTFwOTKAtuB4c1BS36b.u', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'oliver', 'fotousuarios/', 0, 'Activo'),
(104, '17253267', 'jesusmanuel_brito@hotmail.com', '0414-0097251', 'jesusbrito', '$2y$10$cSFxXAqGKOvQ.74QltBgB.GDuCyXtedms1huTZiT70KuE3CtT2F.6', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jesus', 'fotousuarios/', 0, 'Activo'),
(105, '20758871', 'jader2508@gmail.com', '0424-5204012', 'jader', '$2y$10$8LIh0TBzxKnWEeIE/1MsAekquwEdlIxcZrh694HvuFKw9bltjSG5S', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'jader', 'fotousuarios/', 0, 'Activo'),
(106, '19699828', 'emily230_martinez@hotmail.com', '0412-7799778', 'emily', '$2y$10$EFQlnY6M1xTAa8HwtICngerJ.Hk9cU5rTivCwZ.qvg8lhapHkBQJu', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'emily', 'fotousuarios/', 0, 'Activo'),
(107, '23785396', 'gabrielysperez954@gmail.com', '0412-5568009', 'gabrielys', '$2y$10$E42djT.iT5zdCekPtz3Ade0cByAEGsdEj2VDfEP0M.aKU6IktOPBa', 'Estudiante', 'Como se llama tu mejor amigo(a)', 'gabrielys', 'fotousuarios/', 0, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tiene_permiso`
--

CREATE TABLE `usuario_tiene_permiso` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_operacion` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_tiene_permiso`
--

INSERT INTO `usuario_tiene_permiso` (`id`, `id_usuario`, `id_operacion`, `id_permiso`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 11, 0),
(4, 1, 18, 1),
(5, 1, 19, 1),
(6, 1, 32, 1),
(7, 1, 24, 1),
(8, 1, 21, 1),
(9, 1, 22, 1),
(10, 1, 28, 1),
(11, 2, 1, 1),
(12, 2, 2, 1),
(13, 2, 11, 1),
(14, 2, 18, 1),
(15, 2, 19, 1),
(16, 2, 32, 1),
(17, 2, 24, 1),
(18, 2, 21, 1),
(19, 2, 22, 1),
(20, 2, 28, 1),
(21, 3, 1, 1),
(22, 3, 2, 1),
(23, 3, 11, 0),
(24, 3, 18, 1),
(25, 3, 19, 1),
(26, 3, 32, 1),
(27, 3, 24, 1),
(28, 3, 21, 1),
(29, 3, 22, 1),
(30, 3, 28, 1),
(31, 4, 1, 1),
(32, 4, 2, 1),
(33, 4, 11, 0),
(34, 4, 18, 1),
(35, 4, 19, 1),
(36, 4, 32, 1),
(37, 4, 24, 1),
(38, 4, 21, 1),
(39, 4, 22, 1),
(40, 4, 28, 1),
(41, 5, 1, 1),
(42, 5, 2, 1),
(43, 5, 11, 0),
(44, 5, 18, 1),
(45, 5, 19, 1),
(46, 5, 32, 1),
(47, 5, 24, 1),
(48, 5, 21, 1),
(49, 5, 22, 1),
(50, 5, 28, 1),
(51, 7, 3, 1),
(52, 7, 4, 1),
(53, 7, 5, 1),
(54, 7, 6, 1),
(55, 7, 7, 1),
(56, 7, 8, 1),
(57, 7, 19, 1),
(58, 7, 20, 1),
(59, 7, 21, 1),
(60, 7, 22, 1),
(61, 7, 23, 1),
(62, 7, 24, 1),
(63, 7, 18, 1),
(64, 7, 29, 1),
(65, 7, 33, 1),
(66, 9, 1, 1),
(67, 9, 2, 1),
(68, 9, 11, 0),
(69, 9, 18, 1),
(70, 9, 19, 1),
(71, 9, 32, 1),
(72, 9, 24, 1),
(73, 9, 21, 1),
(74, 9, 22, 1),
(75, 9, 28, 1),
(76, 10, 1, 1),
(77, 10, 2, 1),
(78, 10, 11, 0),
(79, 10, 18, 1),
(80, 10, 19, 1),
(81, 10, 32, 1),
(82, 10, 24, 1),
(83, 10, 21, 1),
(84, 10, 22, 1),
(85, 10, 28, 1),
(86, 11, 1, 1),
(87, 11, 2, 1),
(88, 11, 11, 0),
(89, 11, 18, 1),
(90, 11, 19, 1),
(91, 11, 32, 1),
(92, 11, 24, 1),
(93, 11, 21, 1),
(94, 11, 22, 1),
(95, 11, 28, 1),
(96, 12, 1, 1),
(97, 12, 2, 1),
(98, 12, 11, 0),
(99, 12, 18, 1),
(100, 12, 19, 1),
(101, 12, 32, 1),
(102, 12, 24, 1),
(103, 12, 21, 1),
(104, 12, 22, 1),
(105, 12, 28, 1),
(106, 13, 1, 1),
(107, 13, 2, 1),
(108, 13, 11, 0),
(109, 13, 18, 1),
(110, 13, 19, 1),
(111, 13, 32, 1),
(112, 13, 24, 1),
(113, 13, 21, 1),
(114, 13, 22, 1),
(115, 13, 28, 1),
(116, 14, 1, 1),
(117, 14, 2, 1),
(118, 14, 11, 0),
(119, 14, 18, 1),
(120, 14, 19, 1),
(121, 14, 32, 1),
(122, 14, 24, 1),
(123, 14, 21, 1),
(124, 14, 22, 1),
(125, 14, 28, 1),
(126, 15, 1, 1),
(127, 15, 2, 1),
(128, 15, 11, 0),
(129, 15, 18, 1),
(130, 15, 19, 1),
(131, 15, 32, 1),
(132, 15, 24, 1),
(133, 15, 21, 1),
(134, 15, 22, 1),
(135, 15, 28, 1),
(136, 16, 1, 1),
(137, 16, 2, 1),
(138, 16, 11, 0),
(139, 16, 18, 1),
(140, 16, 19, 1),
(141, 16, 32, 1),
(142, 16, 24, 1),
(143, 16, 21, 1),
(144, 16, 22, 1),
(145, 16, 28, 1),
(146, 17, 1, 1),
(147, 17, 2, 1),
(148, 17, 11, 0),
(149, 17, 18, 1),
(150, 17, 19, 1),
(151, 17, 32, 1),
(152, 17, 24, 1),
(153, 17, 21, 1),
(154, 17, 22, 1),
(155, 17, 28, 1),
(156, 18, 1, 1),
(157, 18, 2, 1),
(158, 18, 11, 0),
(159, 18, 18, 1),
(160, 18, 19, 1),
(161, 18, 32, 1),
(162, 18, 24, 1),
(163, 18, 21, 1),
(164, 18, 22, 1),
(165, 18, 28, 1),
(166, 19, 1, 1),
(167, 19, 2, 1),
(168, 19, 11, 0),
(169, 19, 18, 1),
(170, 19, 19, 1),
(171, 19, 32, 1),
(172, 19, 24, 1),
(173, 19, 21, 1),
(174, 19, 22, 1),
(175, 19, 28, 1),
(176, 20, 1, 1),
(177, 20, 2, 1),
(178, 20, 11, 0),
(179, 20, 18, 1),
(180, 20, 19, 1),
(181, 20, 32, 1),
(182, 20, 24, 1),
(183, 20, 21, 1),
(184, 20, 22, 1),
(185, 20, 28, 1),
(186, 21, 1, 1),
(187, 21, 2, 1),
(188, 21, 11, 0),
(189, 21, 18, 1),
(190, 21, 19, 1),
(191, 21, 32, 1),
(192, 21, 24, 1),
(193, 21, 21, 1),
(194, 21, 22, 1),
(195, 21, 28, 1),
(196, 22, 1, 1),
(197, 22, 2, 1),
(198, 22, 11, 0),
(199, 22, 18, 1),
(200, 22, 19, 1),
(201, 22, 32, 1),
(202, 22, 24, 1),
(203, 22, 21, 1),
(204, 22, 22, 1),
(205, 22, 28, 1),
(206, 23, 1, 1),
(207, 23, 2, 1),
(208, 23, 11, 0),
(209, 23, 18, 1),
(210, 23, 19, 1),
(211, 23, 32, 1),
(212, 23, 24, 1),
(213, 23, 21, 1),
(214, 23, 22, 1),
(215, 23, 28, 1),
(216, 24, 1, 1),
(217, 24, 2, 1),
(218, 24, 11, 0),
(219, 24, 18, 1),
(220, 24, 19, 1),
(221, 24, 32, 1),
(222, 24, 24, 1),
(223, 24, 21, 1),
(224, 24, 22, 1),
(225, 24, 28, 1),
(226, 25, 1, 1),
(227, 25, 2, 1),
(228, 25, 11, 0),
(229, 25, 18, 1),
(230, 25, 19, 1),
(231, 25, 32, 1),
(232, 25, 24, 1),
(233, 25, 21, 1),
(234, 25, 22, 1),
(235, 25, 28, 1),
(236, 26, 1, 1),
(237, 26, 2, 1),
(238, 26, 11, 0),
(239, 26, 18, 1),
(240, 26, 19, 1),
(241, 26, 32, 1),
(242, 26, 24, 1),
(243, 26, 21, 1),
(244, 26, 22, 1),
(245, 26, 28, 1),
(246, 27, 1, 1),
(247, 27, 2, 1),
(248, 27, 11, 0),
(249, 27, 18, 1),
(250, 27, 19, 1),
(251, 27, 32, 1),
(252, 27, 24, 1),
(253, 27, 21, 1),
(254, 27, 22, 1),
(255, 27, 28, 1),
(256, 28, 1, 1),
(257, 28, 2, 1),
(258, 28, 11, 0),
(259, 28, 18, 1),
(260, 28, 19, 1),
(261, 28, 32, 1),
(262, 28, 24, 1),
(263, 28, 21, 1),
(264, 28, 22, 1),
(265, 28, 28, 1),
(266, 29, 1, 1),
(267, 29, 2, 1),
(268, 29, 11, 0),
(269, 29, 18, 1),
(270, 29, 19, 1),
(271, 29, 32, 1),
(272, 29, 24, 1),
(273, 29, 21, 1),
(274, 29, 22, 1),
(275, 29, 28, 1),
(276, 30, 1, 1),
(277, 30, 2, 1),
(278, 30, 11, 0),
(279, 30, 18, 1),
(280, 30, 19, 1),
(281, 30, 32, 1),
(282, 30, 24, 1),
(283, 30, 21, 1),
(284, 30, 22, 1),
(285, 30, 28, 1),
(286, 31, 1, 1),
(287, 31, 2, 1),
(288, 31, 11, 0),
(289, 31, 18, 1),
(290, 31, 19, 1),
(291, 31, 32, 1),
(292, 31, 24, 1),
(293, 31, 21, 1),
(294, 31, 22, 1),
(295, 31, 28, 1),
(296, 32, 1, 1),
(297, 32, 2, 1),
(298, 32, 11, 0),
(299, 32, 18, 1),
(300, 32, 19, 1),
(301, 32, 32, 1),
(302, 32, 24, 1),
(303, 32, 21, 1),
(304, 32, 22, 1),
(305, 32, 28, 1),
(306, 33, 1, 1),
(307, 33, 2, 1),
(308, 33, 11, 0),
(309, 33, 18, 1),
(310, 33, 19, 1),
(311, 33, 32, 1),
(312, 33, 24, 1),
(313, 33, 21, 1),
(314, 33, 22, 1),
(315, 33, 28, 1),
(316, 34, 1, 1),
(317, 34, 2, 1),
(318, 34, 11, 0),
(319, 34, 18, 1),
(320, 34, 19, 1),
(321, 34, 32, 1),
(322, 34, 24, 1),
(323, 34, 21, 1),
(324, 34, 22, 1),
(325, 34, 28, 1),
(326, 35, 1, 1),
(327, 35, 2, 1),
(328, 35, 11, 0),
(329, 35, 18, 1),
(330, 35, 19, 1),
(331, 35, 32, 1),
(332, 35, 24, 1),
(333, 35, 21, 1),
(334, 35, 22, 1),
(335, 35, 28, 1),
(336, 36, 1, 1),
(337, 36, 2, 1),
(338, 36, 11, 0),
(339, 36, 18, 1),
(340, 36, 19, 1),
(341, 36, 32, 1),
(342, 36, 24, 1),
(343, 36, 21, 1),
(344, 36, 22, 1),
(345, 36, 28, 1),
(346, 37, 1, 1),
(347, 37, 2, 1),
(348, 37, 11, 0),
(349, 37, 18, 1),
(350, 37, 19, 1),
(351, 37, 32, 1),
(352, 37, 24, 1),
(353, 37, 21, 1),
(354, 37, 22, 1),
(355, 37, 28, 1),
(356, 38, 1, 1),
(357, 38, 2, 1),
(358, 38, 11, 0),
(359, 38, 18, 1),
(360, 38, 19, 1),
(361, 38, 32, 1),
(362, 38, 24, 1),
(363, 38, 21, 1),
(364, 38, 22, 1),
(365, 38, 28, 1),
(366, 39, 1, 1),
(367, 39, 2, 1),
(368, 39, 11, 0),
(369, 39, 18, 1),
(370, 39, 19, 1),
(371, 39, 32, 1),
(372, 39, 24, 1),
(373, 39, 21, 1),
(374, 39, 22, 1),
(375, 39, 28, 1),
(376, 40, 1, 1),
(377, 40, 2, 1),
(378, 40, 11, 0),
(379, 40, 18, 1),
(380, 40, 19, 1),
(381, 40, 32, 1),
(382, 40, 24, 1),
(383, 40, 21, 1),
(384, 40, 22, 1),
(385, 40, 28, 1),
(386, 41, 1, 1),
(387, 41, 2, 1),
(388, 41, 11, 0),
(389, 41, 18, 1),
(390, 41, 19, 1),
(391, 41, 32, 1),
(392, 41, 24, 1),
(393, 41, 21, 1),
(394, 41, 22, 1),
(395, 41, 28, 1),
(396, 42, 1, 1),
(397, 42, 2, 1),
(398, 42, 11, 0),
(399, 42, 18, 1),
(400, 42, 19, 1),
(401, 42, 32, 1),
(402, 42, 24, 1),
(403, 42, 21, 1),
(404, 42, 22, 1),
(405, 42, 28, 1),
(406, 43, 1, 1),
(407, 43, 2, 1),
(408, 43, 11, 0),
(409, 43, 18, 1),
(410, 43, 19, 1),
(411, 43, 32, 1),
(412, 43, 24, 1),
(413, 43, 21, 1),
(414, 43, 22, 1),
(415, 43, 28, 1),
(416, 44, 1, 1),
(417, 44, 2, 1),
(418, 44, 11, 0),
(419, 44, 18, 1),
(420, 44, 19, 1),
(421, 44, 32, 1),
(422, 44, 24, 1),
(423, 44, 21, 1),
(424, 44, 22, 1),
(425, 44, 28, 1),
(426, 45, 1, 1),
(427, 45, 2, 1),
(428, 45, 11, 0),
(429, 45, 18, 1),
(430, 45, 19, 1),
(431, 45, 32, 1),
(432, 45, 24, 1),
(433, 45, 21, 1),
(434, 45, 22, 1),
(435, 45, 28, 1),
(436, 46, 1, 1),
(437, 46, 2, 1),
(438, 46, 11, 0),
(439, 46, 18, 1),
(440, 46, 19, 1),
(441, 46, 32, 1),
(442, 46, 24, 1),
(443, 46, 21, 1),
(444, 46, 22, 1),
(445, 46, 28, 1),
(446, 47, 1, 1),
(447, 47, 2, 1),
(448, 47, 11, 0),
(449, 47, 18, 1),
(450, 47, 19, 1),
(451, 47, 32, 1),
(452, 47, 24, 1),
(453, 47, 21, 1),
(454, 47, 22, 1),
(455, 47, 28, 1),
(456, 48, 1, 1),
(457, 48, 2, 1),
(458, 48, 11, 0),
(459, 48, 18, 1),
(460, 48, 19, 1),
(461, 48, 32, 1),
(462, 48, 24, 1),
(463, 48, 21, 1),
(464, 48, 22, 1),
(465, 48, 28, 1),
(466, 49, 1, 1),
(467, 49, 2, 1),
(468, 49, 11, 0),
(469, 49, 18, 1),
(470, 49, 19, 1),
(471, 49, 32, 1),
(472, 49, 24, 1),
(473, 49, 21, 1),
(474, 49, 22, 1),
(475, 49, 28, 1),
(476, 50, 1, 1),
(477, 50, 2, 1),
(478, 50, 11, 0),
(479, 50, 18, 1),
(480, 50, 19, 1),
(481, 50, 32, 1),
(482, 50, 24, 1),
(483, 50, 21, 1),
(484, 50, 22, 1),
(485, 50, 28, 1),
(486, 51, 1, 1),
(487, 51, 2, 1),
(488, 51, 11, 0),
(489, 51, 18, 1),
(490, 51, 19, 1),
(491, 51, 32, 1),
(492, 51, 24, 1),
(493, 51, 21, 1),
(494, 51, 22, 1),
(495, 51, 28, 1),
(496, 52, 1, 1),
(497, 52, 2, 1),
(498, 52, 11, 0),
(499, 52, 18, 1),
(500, 52, 19, 1),
(501, 52, 32, 1),
(502, 52, 24, 1),
(503, 52, 21, 1),
(504, 52, 22, 1),
(505, 52, 28, 1),
(506, 53, 1, 1),
(507, 53, 2, 1),
(508, 53, 11, 0),
(509, 53, 18, 1),
(510, 53, 19, 1),
(511, 53, 32, 1),
(512, 53, 24, 1),
(513, 53, 21, 1),
(514, 53, 22, 1),
(515, 53, 28, 1),
(516, 54, 1, 1),
(517, 54, 2, 1),
(518, 54, 11, 0),
(519, 54, 18, 1),
(520, 54, 19, 1),
(521, 54, 32, 1),
(522, 54, 24, 1),
(523, 54, 21, 1),
(524, 54, 22, 1),
(525, 54, 28, 1),
(526, 55, 1, 1),
(527, 55, 2, 1),
(528, 55, 11, 0),
(529, 55, 18, 1),
(530, 55, 19, 1),
(531, 55, 32, 1),
(532, 55, 24, 1),
(533, 55, 21, 1),
(534, 55, 22, 1),
(535, 55, 28, 1),
(536, 56, 1, 1),
(537, 56, 2, 1),
(538, 56, 11, 0),
(539, 56, 18, 1),
(540, 56, 19, 1),
(541, 56, 32, 1),
(542, 56, 24, 1),
(543, 56, 21, 1),
(544, 56, 22, 1),
(545, 56, 28, 1),
(546, 57, 1, 1),
(547, 57, 2, 1),
(548, 57, 11, 0),
(549, 57, 18, 1),
(550, 57, 19, 1),
(551, 57, 32, 1),
(552, 57, 24, 1),
(553, 57, 21, 1),
(554, 57, 22, 1),
(555, 57, 28, 1),
(556, 58, 1, 1),
(557, 58, 2, 1),
(558, 58, 11, 0),
(559, 58, 18, 1),
(560, 58, 19, 1),
(561, 58, 32, 1),
(562, 58, 24, 1),
(563, 58, 21, 1),
(564, 58, 22, 1),
(565, 58, 28, 1),
(566, 59, 1, 1),
(567, 59, 2, 1),
(568, 59, 11, 0),
(569, 59, 18, 1),
(570, 59, 19, 1),
(571, 59, 32, 1),
(572, 59, 24, 1),
(573, 59, 21, 1),
(574, 59, 22, 1),
(575, 59, 28, 1),
(576, 60, 1, 1),
(577, 60, 2, 1),
(578, 60, 11, 0),
(579, 60, 18, 1),
(580, 60, 19, 1),
(581, 60, 32, 1),
(582, 60, 24, 1),
(583, 60, 21, 1),
(584, 60, 22, 1),
(585, 60, 28, 1),
(586, 61, 1, 1),
(587, 61, 2, 1),
(588, 61, 11, 0),
(589, 61, 18, 1),
(590, 61, 19, 1),
(591, 61, 32, 1),
(592, 61, 24, 1),
(593, 61, 21, 1),
(594, 61, 22, 1),
(595, 61, 28, 1),
(596, 62, 1, 1),
(597, 62, 2, 1),
(598, 62, 11, 0),
(599, 62, 18, 1),
(600, 62, 19, 1),
(601, 62, 32, 1),
(602, 62, 24, 1),
(603, 62, 21, 1),
(604, 62, 22, 1),
(605, 62, 28, 1),
(606, 63, 1, 1),
(607, 63, 2, 1),
(608, 63, 11, 0),
(609, 63, 18, 1),
(610, 63, 19, 1),
(611, 63, 32, 1),
(612, 63, 24, 1),
(613, 63, 21, 1),
(614, 63, 22, 1),
(615, 63, 28, 1),
(616, 64, 1, 1),
(617, 64, 2, 1),
(618, 64, 11, 0),
(619, 64, 18, 1),
(620, 64, 19, 1),
(621, 64, 32, 1),
(622, 64, 24, 1),
(623, 64, 21, 1),
(624, 64, 22, 1),
(625, 64, 28, 1),
(626, 65, 1, 1),
(627, 65, 2, 1),
(628, 65, 11, 0),
(629, 65, 18, 1),
(630, 65, 19, 1),
(631, 65, 32, 1),
(632, 65, 24, 1),
(633, 65, 21, 1),
(634, 65, 22, 1),
(635, 65, 28, 1),
(636, 66, 1, 1),
(637, 66, 2, 1),
(638, 66, 11, 0),
(639, 66, 18, 1),
(640, 66, 19, 1),
(641, 66, 32, 1),
(642, 66, 24, 1),
(643, 66, 21, 1),
(644, 66, 22, 1),
(645, 66, 28, 1),
(646, 67, 1, 1),
(647, 67, 2, 1),
(648, 67, 11, 0),
(649, 67, 18, 1),
(650, 67, 19, 1),
(651, 67, 32, 1),
(652, 67, 24, 1),
(653, 67, 21, 1),
(654, 67, 22, 1),
(655, 67, 28, 1),
(656, 68, 1, 1),
(657, 68, 2, 1),
(658, 68, 11, 0),
(659, 68, 18, 1),
(660, 68, 19, 1),
(661, 68, 32, 1),
(662, 68, 24, 1),
(663, 68, 21, 1),
(664, 68, 22, 1),
(665, 68, 28, 1),
(666, 69, 1, 1),
(667, 69, 2, 1),
(668, 69, 11, 0),
(669, 69, 18, 1),
(670, 69, 19, 1),
(671, 69, 32, 1),
(672, 69, 24, 1),
(673, 69, 21, 1),
(674, 69, 22, 1),
(675, 69, 28, 1),
(676, 70, 1, 1),
(677, 70, 2, 1),
(678, 70, 11, 0),
(679, 70, 18, 1),
(680, 70, 19, 1),
(681, 70, 32, 1),
(682, 70, 24, 1),
(683, 70, 21, 1),
(684, 70, 22, 1),
(685, 70, 28, 1),
(686, 71, 1, 1),
(687, 71, 2, 1),
(688, 71, 11, 0),
(689, 71, 18, 1),
(690, 71, 19, 1),
(691, 71, 32, 1),
(692, 71, 24, 1),
(693, 71, 21, 1),
(694, 71, 22, 1),
(695, 71, 28, 1),
(696, 73, 3, 1),
(697, 73, 4, 1),
(698, 73, 5, 1),
(699, 73, 6, 1),
(700, 73, 7, 1),
(701, 73, 8, 1),
(702, 73, 19, 1),
(703, 73, 20, 1),
(704, 73, 21, 1),
(705, 73, 22, 1),
(706, 73, 23, 1),
(707, 73, 24, 1),
(708, 73, 18, 1),
(709, 73, 29, 1),
(710, 73, 33, 1),
(711, 74, 3, 1),
(712, 74, 4, 1),
(713, 74, 5, 1),
(714, 74, 6, 1),
(715, 74, 7, 1),
(716, 74, 8, 1),
(717, 74, 19, 1),
(718, 74, 20, 1),
(719, 74, 21, 1),
(720, 74, 22, 1),
(721, 74, 23, 1),
(722, 74, 24, 1),
(723, 74, 18, 1),
(724, 74, 29, 1),
(725, 74, 33, 1),
(726, 75, 3, 1),
(727, 75, 4, 1),
(728, 75, 5, 1),
(729, 75, 6, 1),
(730, 75, 7, 1),
(731, 75, 8, 1),
(732, 75, 19, 1),
(733, 75, 20, 1),
(734, 75, 21, 1),
(735, 75, 22, 1),
(736, 75, 23, 1),
(737, 75, 24, 1),
(738, 75, 18, 1),
(739, 75, 29, 1),
(740, 75, 33, 1),
(741, 76, 3, 1),
(742, 76, 4, 1),
(743, 76, 5, 1),
(744, 76, 6, 1),
(745, 76, 7, 1),
(746, 76, 8, 1),
(747, 76, 19, 1),
(748, 76, 20, 1),
(749, 76, 21, 1),
(750, 76, 22, 1),
(751, 76, 23, 1),
(752, 76, 24, 1),
(753, 76, 18, 1),
(754, 76, 29, 1),
(755, 76, 33, 1),
(756, 77, 3, 1),
(757, 77, 4, 1),
(758, 77, 5, 1),
(759, 77, 6, 1),
(760, 77, 7, 1),
(761, 77, 8, 1),
(762, 77, 19, 1),
(763, 77, 20, 1),
(764, 77, 21, 1),
(765, 77, 22, 1),
(766, 77, 23, 1),
(767, 77, 24, 1),
(768, 77, 18, 1),
(769, 77, 29, 1),
(770, 77, 33, 1),
(771, 78, 3, 1),
(772, 78, 4, 1),
(773, 78, 5, 1),
(774, 78, 6, 1),
(775, 78, 7, 1),
(776, 78, 8, 1),
(777, 78, 19, 1),
(778, 78, 20, 1),
(779, 78, 21, 1),
(780, 78, 22, 1),
(781, 78, 23, 1),
(782, 78, 24, 1),
(783, 78, 18, 1),
(784, 78, 29, 1),
(785, 78, 33, 1),
(786, 79, 3, 1),
(787, 79, 4, 1),
(788, 79, 5, 1),
(789, 79, 6, 1),
(790, 79, 7, 1),
(791, 79, 8, 1),
(792, 79, 19, 1),
(793, 79, 20, 1),
(794, 79, 21, 1),
(795, 79, 22, 1),
(796, 79, 23, 1),
(797, 79, 24, 1),
(798, 79, 18, 1),
(799, 79, 29, 1),
(800, 79, 33, 1),
(801, 80, 9, 1),
(802, 80, 10, 1),
(803, 80, 28, 1),
(804, 80, 20, 1),
(805, 80, 21, 1),
(806, 80, 22, 1),
(807, 80, 24, 1),
(808, 80, 25, 1),
(809, 80, 17, 1),
(810, 80, 30, 1),
(811, 80, 31, 1),
(812, 80, 34, 1),
(813, 80, 29, 1),
(814, 80, 33, 1),
(815, 81, 9, 1),
(816, 81, 10, 1),
(817, 81, 28, 1),
(818, 81, 20, 1),
(819, 81, 21, 1),
(820, 81, 22, 1),
(821, 81, 24, 1),
(822, 81, 25, 1),
(823, 81, 17, 1),
(824, 81, 30, 1),
(825, 81, 31, 1),
(826, 81, 34, 1),
(827, 81, 29, 1),
(828, 81, 33, 1),
(829, 83, 1, 1),
(830, 83, 2, 1),
(831, 83, 11, 0),
(832, 83, 18, 1),
(833, 83, 19, 1),
(834, 83, 32, 1),
(835, 83, 24, 1),
(836, 83, 21, 1),
(837, 83, 22, 1),
(838, 83, 28, 1),
(839, 84, 1, 1),
(840, 84, 2, 1),
(841, 84, 11, 0),
(842, 84, 18, 1),
(843, 84, 19, 1),
(844, 84, 32, 1),
(845, 84, 24, 1),
(846, 84, 21, 1),
(847, 84, 22, 1),
(848, 84, 28, 1),
(849, 85, 1, 1),
(850, 85, 2, 1),
(851, 85, 11, 0),
(852, 85, 18, 1),
(853, 85, 19, 1),
(854, 85, 32, 1),
(855, 85, 24, 1),
(856, 85, 21, 1),
(857, 85, 22, 1),
(858, 85, 28, 1),
(859, 86, 1, 1),
(860, 86, 2, 1),
(861, 86, 11, 0),
(862, 86, 18, 1),
(863, 86, 19, 1),
(864, 86, 32, 1),
(865, 86, 24, 1),
(866, 86, 21, 1),
(867, 86, 22, 1),
(868, 86, 28, 1),
(869, 87, 1, 1),
(870, 87, 2, 1),
(871, 87, 11, 0),
(872, 87, 18, 1),
(873, 87, 19, 1),
(874, 87, 32, 1),
(875, 87, 24, 1),
(876, 87, 21, 1),
(877, 87, 22, 1),
(878, 87, 28, 1),
(879, 88, 1, 1),
(880, 88, 2, 1),
(881, 88, 11, 0),
(882, 88, 18, 1),
(883, 88, 19, 1),
(884, 88, 32, 1),
(885, 88, 24, 1),
(886, 88, 21, 1),
(887, 88, 22, 1),
(888, 88, 28, 1),
(889, 89, 1, 1),
(890, 89, 2, 1),
(891, 89, 11, 0),
(892, 89, 18, 1),
(893, 89, 19, 1),
(894, 89, 32, 1),
(895, 89, 24, 1),
(896, 89, 21, 1),
(897, 89, 22, 1),
(898, 89, 28, 1),
(899, 90, 1, 1),
(900, 90, 2, 1),
(901, 90, 11, 0),
(902, 90, 18, 1),
(903, 90, 19, 1),
(904, 90, 32, 1),
(905, 90, 24, 1),
(906, 90, 21, 1),
(907, 90, 22, 1),
(908, 90, 28, 1),
(909, 91, 1, 1),
(910, 91, 2, 1),
(911, 91, 11, 0),
(912, 91, 18, 1),
(913, 91, 19, 1),
(914, 91, 32, 1),
(915, 91, 24, 1),
(916, 91, 21, 1),
(917, 91, 22, 1),
(918, 91, 28, 1),
(919, 92, 1, 1),
(920, 92, 2, 1),
(921, 92, 11, 0),
(922, 92, 18, 1),
(923, 92, 19, 1),
(924, 92, 32, 1),
(925, 92, 24, 1),
(926, 92, 21, 1),
(927, 92, 22, 1),
(928, 92, 28, 1),
(929, 93, 1, 1),
(930, 93, 2, 1),
(931, 93, 11, 0),
(932, 93, 18, 1),
(933, 93, 19, 1),
(934, 93, 32, 1),
(935, 93, 24, 1),
(936, 93, 21, 1),
(937, 93, 22, 1),
(938, 93, 28, 1),
(939, 94, 1, 1),
(940, 94, 2, 1),
(941, 94, 11, 0),
(942, 94, 18, 1),
(943, 94, 19, 1),
(944, 94, 32, 1),
(945, 94, 24, 1),
(946, 94, 21, 1),
(947, 94, 22, 1),
(948, 94, 28, 1),
(949, 95, 1, 1),
(950, 95, 2, 1),
(951, 95, 11, 0),
(952, 95, 18, 1),
(953, 95, 19, 1),
(954, 95, 32, 1),
(955, 95, 24, 1),
(956, 95, 21, 1),
(957, 95, 22, 1),
(958, 95, 28, 1),
(959, 96, 1, 1),
(960, 96, 2, 1),
(961, 96, 11, 0),
(962, 96, 18, 1),
(963, 96, 19, 1),
(964, 96, 32, 1),
(965, 96, 24, 1),
(966, 96, 21, 1),
(967, 96, 22, 1),
(968, 96, 28, 1),
(969, 97, 1, 1),
(970, 97, 2, 1),
(971, 97, 11, 0),
(972, 97, 18, 1),
(973, 97, 19, 1),
(974, 97, 32, 1),
(975, 97, 24, 1),
(976, 97, 21, 1),
(977, 97, 22, 1),
(978, 97, 28, 1),
(979, 98, 1, 1),
(980, 98, 2, 1),
(981, 98, 11, 0),
(982, 98, 18, 1),
(983, 98, 19, 1),
(984, 98, 32, 1),
(985, 98, 24, 1),
(986, 98, 21, 1),
(987, 98, 22, 1),
(988, 98, 28, 1),
(989, 99, 1, 1),
(990, 99, 2, 1),
(991, 99, 11, 0),
(992, 99, 18, 1),
(993, 99, 19, 1),
(994, 99, 32, 1),
(995, 99, 24, 1),
(996, 99, 21, 1),
(997, 99, 22, 1),
(998, 99, 28, 1),
(999, 100, 1, 1),
(1000, 100, 2, 1),
(1001, 100, 11, 0),
(1002, 100, 18, 1),
(1003, 100, 19, 1),
(1004, 100, 32, 1),
(1005, 100, 24, 1),
(1006, 100, 21, 1),
(1007, 100, 22, 1),
(1008, 100, 28, 1),
(1009, 101, 1, 1),
(1010, 101, 2, 1),
(1011, 101, 11, 0),
(1012, 101, 18, 1),
(1013, 101, 19, 1),
(1014, 101, 32, 1),
(1015, 101, 24, 1),
(1016, 101, 21, 1),
(1017, 101, 22, 1),
(1018, 101, 28, 1),
(1019, 102, 1, 1),
(1020, 102, 2, 1),
(1021, 102, 11, 0),
(1022, 102, 18, 1),
(1023, 102, 19, 1),
(1024, 102, 32, 1),
(1025, 102, 24, 1),
(1026, 102, 21, 1),
(1027, 102, 22, 1),
(1028, 102, 28, 1),
(1029, 103, 1, 1),
(1030, 103, 2, 1),
(1031, 103, 11, 0),
(1032, 103, 18, 1),
(1033, 103, 19, 1),
(1034, 103, 32, 1),
(1035, 103, 24, 1),
(1036, 103, 21, 1),
(1037, 103, 22, 1),
(1038, 103, 28, 1),
(1039, 104, 1, 1),
(1040, 104, 2, 1),
(1041, 104, 11, 0),
(1042, 104, 18, 1),
(1043, 104, 19, 1),
(1044, 104, 32, 1),
(1045, 104, 24, 1),
(1046, 104, 21, 1),
(1047, 104, 22, 1),
(1048, 104, 28, 1),
(1049, 105, 1, 1),
(1050, 105, 2, 1),
(1051, 105, 11, 0),
(1052, 105, 18, 1),
(1053, 105, 19, 1),
(1054, 105, 32, 1),
(1055, 105, 24, 1),
(1056, 105, 21, 1),
(1057, 105, 22, 1),
(1058, 105, 28, 1),
(1059, 106, 1, 1),
(1060, 106, 2, 1),
(1061, 106, 11, 0),
(1062, 106, 18, 1),
(1063, 106, 19, 1),
(1064, 106, 32, 1),
(1065, 106, 24, 1),
(1066, 106, 21, 1),
(1067, 106, 22, 1),
(1068, 106, 28, 1),
(1069, 107, 1, 1),
(1070, 107, 2, 1),
(1071, 107, 11, 0),
(1072, 107, 18, 1),
(1073, 107, 19, 1),
(1074, 107, 32, 1),
(1075, 107, 24, 1),
(1076, 107, 21, 1),
(1077, 107, 22, 1),
(1078, 107, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_comunidades`
--

CREATE TABLE `visitas_comunidades` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `totalh` varchar(11) NOT NULL,
  `actividad` text NOT NULL,
  `pagina` int(11) NOT NULL,
  `cont` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas_comunidades`
--

INSERT INTO `visitas_comunidades` (`id`, `id_proyecto`, `id_estudiante`, `dia`, `fecha`, `hora_entrada`, `hora_salida`, `totalh`, `actividad`, `pagina`, `cont`) VALUES
(1, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'diagnostico', 1, 0),
(2, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'situacion', 1, 0),
(3, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'problema', 1, 0),
(4, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'alcance', 1, 0),
(5, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'avances', 1, 0),
(6, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'sistema', 1, 0),
(8, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'migracion', 2, 0),
(9, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'pruebas', 2, 0),
(10, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'politicas', 2, 0),
(11, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'ordenar', 2, 0),
(12, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'titulo', 2, 0),
(13, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '10:00:00', '1:00', 'base de datos', 2, 0),
(14, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '11:00:00', '1:00', 'nivel de servicios', 3, 0),
(15, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '11:00:00', '1:00', 'mantenimiento', 3, 0),
(16, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '11:00:00', '1:00', 'buscar', 3, 0),
(17, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '11:00:00', '1:00', 'detectar', 3, 0),
(18, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '11:00:00', '1:00', 'capacitar', 3, 0),
(19, 1, 23, 'Lunes', '2017-08-25', '09:00:00', '11:00:00', '1:00', 'paso a produccion', 3, 0),
(26, 1, 23, 'Lunes', '2017-08-26', '09:00:00', '11:00:00', '2:00', 'a', 4, 0),
(27, 1, 23, 'Martes', '2017-08-26', '09:00:00', '11:00:00', '2:00', 'b', 4, 0),
(28, 1, 23, 'Miercoles', '2017-08-26', '09:00:00', '11:00:00', '2:00', 'c', 4, 0),
(29, 1, 23, 'Jueves', '2017-08-26', '09:00:00', '11:00:00', '2:00', 'd', 4, 0),
(30, 1, 23, 'Viernes', '2017-08-26', '09:00:00', '11:00:00', '2:00', 'e', 4, 0),
(31, 1, 23, 'Viernes', '2017-08-26', '09:00:00', '11:00:00', '2:00', 'f', 4, 0),
(32, 1, 23, 'Lunes', '2017-06-24', '01:00:00', '03:00:00', '2:00', 'fghjk', 5, 0),
(33, 1, 23, 'Martes', '2017-06-24', '01:00:00', '03:00:00', '2:00', 'sedfgvhjn', 5, 0),
(34, 1, 23, 'Miercoles', '2017-06-24', '01:00:00', '03:00:00', '2:00', 'sedrftgyhuji', 5, 0),
(35, 1, 23, 'Jueves', '2017-06-24', '01:00:00', '03:00:00', '2:00', 'xvcbvb', 5, 0),
(36, 1, 23, 'Viernes', '2017-09-09', '01:00:00', '03:00:00', '2:00', 'rtyui', 5, 0),
(37, 1, 23, 'Viernes', '2017-09-09', '01:00:00', '03:00:00', '2:00', 'xc', 5, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anios`
--
ALTER TABLE `anios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comite_tecnico`
--
ALTER TABLE `comite_tecnico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `com_tiene_proy`
--
ALTER TABLE `com_tiene_proy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `com_tiene_resp`
--
ALTER TABLE `com_tiene_resp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinadores_pnf`
--
ALTER TABLE `coordinadores_pnf`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinador_trayecto`
--
ALTER TABLE `coordinador_trayecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coord_tiene_proy`
--
ALTER TABLE `coord_tiene_proy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `culminacion_proyecto`
--
ALTER TABLE `culminacion_proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `defensas`
--
ALTER TABLE `defensas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `est_cursa_proy`
--
ALTER TABLE `est_cursa_proy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `est_tiene_proy`
--
ALTER TABLE `est_tiene_proy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_investigacion`
--
ALTER TABLE `lineas_investigacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipios_1_idx` (`id_estado`);

--
-- Indices de la tabla `opc_tutores`
--
ALTER TABLE `opc_tutores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parroquias_1_idx` (`id_municipio`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pnfs`
--
ALTER TABLE `pnfs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pnf_tiene_linea`
--
ALTER TABLE `pnf_tiene_linea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prof_dicta_proy`
--
ALTER TABLE `prof_dicta_proy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_comite`
--
ALTER TABLE `proyectos_tiene_comite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_culminacion`
--
ALTER TABLE `proyectos_tiene_culminacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_documento`
--
ALTER TABLE `proyectos_tiene_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_eva_def`
--
ALTER TABLE `proyectos_tiene_eva_def`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_notificacion`
--
ALTER TABLE `proyectos_tiene_notificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_opinion`
--
ALTER TABLE `proyectos_tiene_opinion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_permiso`
--
ALTER TABLE `proyectos_tiene_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos_tiene_socializacion`
--
ALTER TABLE `proyectos_tiene_socializacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secretarios`
--
ALTER TABLE `secretarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trayectos`
--
ALTER TABLE `trayectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tutor_tiene_proyectos`
--
ALTER TABLE `tutor_tiene_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_tiene_permiso`
--
ALTER TABLE `usuario_tiene_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas_comunidades`
--
ALTER TABLE `visitas_comunidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anios`
--
ALTER TABLE `anios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `comite_tecnico`
--
ALTER TABLE `comite_tecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `com_tiene_proy`
--
ALTER TABLE `com_tiene_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `com_tiene_resp`
--
ALTER TABLE `com_tiene_resp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `coordinadores_pnf`
--
ALTER TABLE `coordinadores_pnf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `coordinador_trayecto`
--
ALTER TABLE `coordinador_trayecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `coord_tiene_proy`
--
ALTER TABLE `coord_tiene_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `culminacion_proyecto`
--
ALTER TABLE `culminacion_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `defensas`
--
ALTER TABLE `defensas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT de la tabla `est_cursa_proy`
--
ALTER TABLE `est_cursa_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT de la tabla `est_tiene_proy`
--
ALTER TABLE `est_tiene_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;
--
-- AUTO_INCREMENT de la tabla `lineas_investigacion`
--
ALTER TABLE `lineas_investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;
--
-- AUTO_INCREMENT de la tabla `opc_tutores`
--
ALTER TABLE `opc_tutores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1139;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pnfs`
--
ALTER TABLE `pnfs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pnf_tiene_linea`
--
ALTER TABLE `pnf_tiene_linea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `prof_dicta_proy`
--
ALTER TABLE `prof_dicta_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_comite`
--
ALTER TABLE `proyectos_tiene_comite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_culminacion`
--
ALTER TABLE `proyectos_tiene_culminacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_documento`
--
ALTER TABLE `proyectos_tiene_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_eva_def`
--
ALTER TABLE `proyectos_tiene_eva_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_notificacion`
--
ALTER TABLE `proyectos_tiene_notificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_opinion`
--
ALTER TABLE `proyectos_tiene_opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_permiso`
--
ALTER TABLE `proyectos_tiene_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `proyectos_tiene_socializacion`
--
ALTER TABLE `proyectos_tiene_socializacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `secretarios`
--
ALTER TABLE `secretarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `trayectos`
--
ALTER TABLE `trayectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tutor_tiene_proyectos`
--
ALTER TABLE `tutor_tiene_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT de la tabla `usuario_tiene_permiso`
--
ALTER TABLE `usuario_tiene_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1079;
--
-- AUTO_INCREMENT de la tabla `visitas_comunidades`
--
ALTER TABLE `visitas_comunidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `fk_municipios_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD CONSTRAINT `fk_parroquias_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
