-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2020 a las 19:58:19
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `motofitness`
--
CREATE DATABASE IF NOT EXISTS `motofitness` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `motofitness`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `objetivo` text COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `coddieta` int(10) DEFAULT NULL,
  `codtabla` int(10) DEFAULT NULL,
  `codplan` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `disponibilidad` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `email`, `direccion`, `telefono`, `objetivo`, `clave`, `coddieta`, `codtabla`, `codplan`, `disponibilidad`, `observaciones`, `vencimiento`) VALUES
('11111111L', 'asd', 'asdas@gmail.cos', 'adas', '666666666', 'dsad', '1', 12, NULL, '3', '4', '', '2020-02-09'),
('32323223A', 'asdas', 'ad@sda.hjh', 'adas', '678678678', 'sfgsdf', '2', 17, 6, '3', '3', 'soy alergico a la coliflor', '2020-01-08'),
('55555555F', 'sdada', 'sada@m.es', 'asdasd', '777777777', 'sdfsdf', '1', NULL, NULL, '3', '4', '', '2020-02-09'),
('56565656D', 'sdas', 'asdas@gmas.es', 'asdsa', '666666666', 'adsa', '1', NULL, NULL, '2', '1', '', '2020-02-09'),
('98786756S', 'Pedro', 'asdsad@sadasdasd.es', 'adasdad', '654456654', 'adss', '1', NULL, NULL, '3', '5', 'sdas', '2020-02-12'),
('99999999E', 'PEPEPEPEE', 'asdasd@fas.dsa', 'adasdadasd', '666666666', 'adadas', '1', NULL, 1, '1', '4', 'Nada', '2020-02-07'),
('99999999P', 'adfad', 'asdsad@gamasd.es', 'asdasd', '666666666', 'dfasd', '1', NULL, NULL, '3', '4', '', '2020-02-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `codcomida` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`codcomida`, `nombre`) VALUES
(104, 'desayuno'),
(105, 'comida'),
(106, 'cena'),
(107, 'desayuno'),
(108, 'comida'),
(109, 'cena'),
(110, 'desayuno'),
(111, 'comida'),
(112, 'cena'),
(113, 'desayuno'),
(114, 'comida'),
(115, 'cena'),
(116, 'desayuno'),
(117, 'comida'),
(118, 'cena'),
(119, 'desayuno'),
(120, 'comida'),
(121, 'cena'),
(122, 'desayuno'),
(123, 'comida'),
(124, 'cena'),
(125, 'desayuno'),
(126, 'comida'),
(127, 'cena'),
(128, 'desayuno'),
(129, 'comida'),
(130, 'cena'),
(131, 'desayuno'),
(132, 'comida'),
(133, 'cena'),
(134, 'desayuno'),
(135, 'comida'),
(136, 'cena'),
(137, 'desayuno'),
(138, 'comida'),
(139, 'cena'),
(140, 'desayuno'),
(141, 'comida'),
(142, 'cena'),
(143, 'desayuno'),
(144, 'comida'),
(145, 'cena'),
(146, 'desayuno'),
(147, 'comida'),
(148, 'cena'),
(149, 'desayuno'),
(150, 'comida'),
(151, 'cena'),
(152, 'desayuno'),
(153, 'comida'),
(154, 'cena'),
(155, 'desayuno'),
(156, 'comida'),
(157, 'cena'),
(158, 'desayuno'),
(159, 'comida'),
(160, 'cena'),
(161, 'desayuno'),
(162, 'comida'),
(163, 'cena'),
(164, 'desayuno'),
(165, 'comida'),
(166, 'cena'),
(167, 'desayuno'),
(168, 'comida'),
(169, 'cena'),
(170, 'desayuno'),
(171, 'comida'),
(172, 'cena'),
(173, 'desayuno'),
(174, 'comida'),
(175, 'cena'),
(176, 'desayuno'),
(177, 'comida'),
(178, 'cena'),
(179, 'desayuno'),
(180, 'comida'),
(181, 'cena'),
(182, 'desayuno'),
(183, 'comida'),
(184, 'cena'),
(185, 'desayuno'),
(186, 'comida'),
(187, 'cena'),
(188, 'desayuno'),
(189, 'comida'),
(190, 'cena'),
(191, 'desayuno'),
(192, 'comida'),
(193, 'cena'),
(194, 'desayuno'),
(195, 'comida'),
(196, 'cena'),
(197, 'desayuno'),
(198, 'comida'),
(199, 'cena'),
(200, 'desayuno'),
(201, 'comida'),
(202, 'cena'),
(203, 'desayuno'),
(204, 'comida'),
(205, 'cena'),
(206, 'desayuno'),
(207, 'comida'),
(208, 'cena'),
(209, 'desayuno'),
(210, 'comida'),
(211, 'cena'),
(212, 'desayuno'),
(213, 'comida'),
(214, 'cena'),
(215, 'desayuno'),
(216, 'comida'),
(217, 'cena'),
(218, 'desayuno'),
(219, 'comida'),
(220, 'cena'),
(221, 'desayuno'),
(222, 'comida'),
(223, 'cena'),
(224, 'desayuno'),
(225, 'comida'),
(226, 'cena'),
(227, 'desayuno'),
(228, 'comida'),
(229, 'cena'),
(230, 'desayuno'),
(231, 'comida'),
(232, 'cena'),
(233, 'desayuno'),
(234, 'comida'),
(235, 'cena'),
(236, 'desayuno'),
(237, 'comida'),
(238, 'cena'),
(239, 'desayuno'),
(240, 'comida'),
(241, 'cena'),
(242, 'desayuno'),
(243, 'comida'),
(244, 'cena'),
(245, 'desayuno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diadieta`
--

CREATE TABLE `diadieta` (
  `coddia` int(10) NOT NULL,
  `calorias` int(4) NOT NULL,
  `macronutrientes` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dia` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `diadieta`
--

INSERT INTO `diadieta` (`coddia`, `calorias`, `macronutrientes`, `dia`) VALUES
(39, 500, '', 'lunes'),
(40, 500, '', 'martes'),
(41, 500, '', 'miercoles'),
(42, 500, '', 'jueves'),
(43, 500, '', 'viernes'),
(44, 500, '', 'sabado'),
(45, 500, '', 'domingo'),
(46, 500, '', 'domingo'),
(47, 500, '', 'domingo'),
(48, 500, '', 'domingo'),
(49, 500, '', 'lunes'),
(50, 500, '', 'martes'),
(51, 500, '', 'miercoles'),
(52, 500, '', 'jueves'),
(53, 500, '', 'viernes'),
(54, 500, '', 'sabado'),
(55, 500, '', 'domingo'),
(56, 500, '', 'lunes'),
(57, 500, '', 'martes'),
(58, 500, '', 'miercoles'),
(59, 500, '', 'jueves'),
(60, 500, '', 'viernes'),
(61, 500, '', 'sabado'),
(62, 500, '', 'domingo'),
(63, 500, '', 'domingo'),
(64, 500, '', 'lunes'),
(65, 500, '', 'martes'),
(66, 500, '', 'miercoles'),
(67, 500, '', 'jueves'),
(68, 500, '', 'viernes'),
(69, 500, '', 'sabado'),
(70, 500, '', 'domingo'),
(71, 500, '', 'lunes'),
(72, 500, '', 'martes'),
(73, 500, '', 'miercoles'),
(74, 500, '', 'jueves'),
(75, 500, '', 'viernes'),
(76, 500, '', 'sabado'),
(77, 500, '', 'domingo'),
(78, 500, '', 'domingo'),
(79, 500, '', 'lunes'),
(80, 500, '', 'martes'),
(81, 500, '', 'miercoles'),
(82, 500, '', 'jueves'),
(83, 500, '', 'viernes'),
(84, 500, '', 'sabado'),
(85, 500, '', 'domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dieta`
--

CREATE TABLE `dieta` (
  `coddieta` int(10) NOT NULL,
  `semana` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `dieta`
--

INSERT INTO `dieta` (`coddieta`, `semana`) VALUES
(12, 'Dieta de prueba'),
(17, 'Segunda dieta de prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `codejercicio` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `series` int(3) NOT NULL,
  `repeticiones` int(3) NOT NULL,
  `peso` float NOT NULL,
  `link` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`codejercicio`, `nombre`, `series`, `repeticiones`, `peso`, `link`) VALUES
(1, 'Pesas', 12, 12, 12, '123'),
(2, 'asd', 23, 32, 12, 'aqweq'),
(3, 'EjNuevo', 12, 12, 222, '23232'),
(4, 'asdasd', 123, 212, 122, 'http://google.es'),
(5, 'asdasdas', 123, 12, 12, 'sfsdf'),
(6, 'adasdasdas', 12, 12, 12, 'http://google.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `numeroempleado` int(10) NOT NULL,
  `especialidad` int(1) NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `privilegios` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`numeroempleado`, `especialidad`, `nombre`, `dni`, `telefono`, `email`, `direccion`, `clave`, `privilegios`) VALUES
(18, 3, 'Juanito', '44444444G', '666666444', 'sdad@sda.es', 'asdasd', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `codigoejercicio` int(10) NOT NULL,
  `codigosesion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `entrenamiento`
--

INSERT INTO `entrenamiento` (`codigoejercicio`, `codigosesion`) VALUES
(2, 1),
(1, 1),
(3, 1),
(2, 2),
(4, 1),
(4, 2),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineacomida`
--

CREATE TABLE `lineacomida` (
  `codcomida` int(10) NOT NULL,
  `codplato` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lineacomida`
--

INSERT INTO `lineacomida` (`codcomida`, `codplato`) VALUES
(104, 56),
(105, 56),
(105, 56),
(106, 56),
(106, 56),
(107, 56),
(108, 56),
(108, 56),
(109, 56),
(109, 56),
(110, 56),
(111, 56),
(111, 56),
(112, 56),
(112, 56),
(113, 56),
(114, 56),
(114, 56),
(115, 56),
(115, 56),
(116, 56),
(117, 56),
(117, 56),
(118, 56),
(118, 56),
(119, 56),
(120, 56),
(120, 56),
(121, 56),
(121, 56),
(122, 56),
(123, 56),
(123, 56),
(124, 56),
(124, 56),
(125, 56),
(126, 56),
(126, 56),
(127, 56),
(127, 56),
(128, 56),
(129, 56),
(129, 56),
(130, 56),
(130, 56),
(131, 56),
(132, 56),
(132, 56),
(133, 56),
(133, 56),
(134, 56),
(135, 56),
(135, 56),
(136, 56),
(136, 56),
(137, 56),
(138, 56),
(138, 56),
(139, 56),
(139, 56),
(140, 56),
(141, 56),
(141, 56),
(142, 56),
(142, 56),
(143, 56),
(144, 56),
(144, 56),
(145, 56),
(145, 56),
(146, 56),
(147, 56),
(147, 56),
(148, 56),
(148, 56),
(149, 56),
(150, 56),
(150, 56),
(151, 56),
(151, 56),
(152, 56),
(153, 56),
(153, 56),
(154, 56),
(154, 56),
(155, 56),
(156, 56),
(156, 56),
(157, 56),
(157, 56),
(158, 56),
(159, 56),
(159, 56),
(160, 56),
(160, 56),
(161, 56),
(162, 56),
(162, 56),
(163, 56),
(163, 56),
(164, 56),
(165, 56),
(165, 56),
(166, 56),
(166, 56),
(167, 56),
(168, 56),
(168, 56),
(169, 56),
(169, 56),
(170, 56),
(171, 56),
(171, 56),
(172, 56),
(172, 56),
(173, 56),
(174, 56),
(174, 56),
(175, 56),
(175, 56),
(176, 56),
(177, 56),
(177, 56),
(178, 56),
(178, 56),
(179, 56),
(180, 56),
(180, 56),
(181, 56),
(181, 56),
(182, 56),
(183, 56),
(183, 56),
(184, 56),
(184, 56),
(185, 56),
(186, 56),
(186, 56),
(187, 56),
(187, 56),
(188, 56),
(189, 56),
(189, 56),
(190, 56),
(190, 56),
(191, 56),
(192, 56),
(192, 56),
(193, 56),
(193, 56),
(194, 56),
(195, 56),
(195, 56),
(196, 56),
(196, 56),
(197, 56),
(198, 56),
(198, 56),
(199, 56),
(199, 56),
(200, 56),
(201, 56),
(201, 56),
(202, 56),
(202, 56),
(203, 56),
(204, 56),
(204, 56),
(205, 56),
(205, 56),
(206, 56),
(207, 56),
(207, 56),
(208, 56),
(208, 56),
(209, 56),
(210, 56),
(210, 56),
(211, 56),
(211, 56),
(212, 56),
(213, 56),
(213, 56),
(214, 56),
(214, 56),
(215, 56),
(216, 56),
(216, 56),
(217, 56),
(217, 56),
(218, 56),
(219, 56),
(219, 56),
(220, 56),
(220, 56),
(221, 56),
(222, 56),
(222, 56),
(223, 56),
(223, 56),
(224, 56),
(225, 56),
(225, 56),
(226, 56),
(226, 56),
(227, 56),
(228, 56),
(228, 56),
(229, 56),
(229, 56),
(230, 56),
(231, 56),
(231, 56),
(232, 56),
(232, 56),
(233, 56),
(234, 56),
(234, 56),
(235, 56),
(235, 56),
(236, 56),
(237, 56),
(237, 56),
(238, 56),
(238, 56),
(239, 56),
(240, 56),
(240, 56),
(241, 56),
(241, 56),
(242, 56),
(243, 56),
(243, 56),
(244, 56),
(244, 56),
(245, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineadia`
--

CREATE TABLE `lineadia` (
  `coddia` int(10) NOT NULL,
  `codcomida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lineadia`
--

INSERT INTO `lineadia` (`coddia`, `codcomida`) VALUES
(39, 104),
(39, 105),
(39, 106),
(40, 107),
(40, 108),
(40, 109),
(41, 110),
(41, 111),
(41, 112),
(42, 113),
(42, 114),
(42, 115),
(43, 116),
(43, 117),
(43, 118),
(44, 119),
(44, 120),
(44, 121),
(45, 122),
(45, 123),
(45, 124),
(46, 125),
(46, 126),
(46, 127),
(47, 128),
(47, 129),
(47, 130),
(48, 131),
(48, 132),
(48, 133),
(49, 134),
(49, 135),
(49, 136),
(50, 137),
(50, 138),
(50, 139),
(51, 140),
(51, 141),
(51, 142),
(52, 143),
(52, 144),
(52, 145),
(53, 146),
(53, 147),
(53, 148),
(54, 149),
(54, 150),
(54, 151),
(55, 152),
(55, 153),
(55, 154),
(56, 155),
(56, 156),
(56, 157),
(57, 158),
(57, 159),
(57, 160),
(58, 161),
(58, 162),
(58, 163),
(59, 164),
(59, 165),
(59, 166),
(60, 167),
(60, 168),
(60, 169),
(61, 170),
(61, 171),
(61, 172),
(62, 173),
(62, 174),
(62, 175),
(63, 176),
(63, 177),
(63, 178),
(64, 179),
(64, 180),
(64, 181),
(65, 182),
(65, 183),
(65, 184),
(66, 185),
(66, 186),
(66, 187),
(67, 188),
(67, 189),
(67, 190),
(68, 191),
(68, 192),
(68, 193),
(69, 194),
(69, 195),
(69, 196),
(70, 197),
(70, 198),
(70, 199),
(71, 200),
(71, 201),
(71, 202),
(72, 203),
(72, 204),
(72, 205),
(73, 206),
(73, 207),
(73, 208),
(74, 209),
(74, 210),
(74, 211),
(75, 212),
(75, 213),
(75, 214),
(76, 215),
(76, 216),
(76, 217),
(77, 218),
(77, 219),
(77, 220),
(78, 221),
(78, 222),
(78, 223),
(79, 224),
(79, 225),
(79, 226),
(80, 227),
(80, 228),
(80, 229),
(81, 230),
(81, 231),
(81, 232),
(82, 233),
(82, 234),
(82, 235),
(83, 236),
(83, 237),
(83, 238),
(84, 239),
(84, 240),
(84, 241),
(85, 242),
(85, 243),
(85, 244);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineadieta`
--

CREATE TABLE `lineadieta` (
  `coddieta` int(10) NOT NULL,
  `coddia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lineadieta`
--

INSERT INTO `lineadieta` (`coddieta`, `coddia`) VALUES
(12, 56),
(12, 57),
(12, 58),
(12, 59),
(12, 60),
(12, 61),
(12, 62),
(17, 79),
(17, 80),
(17, 81),
(17, 82),
(17, 83),
(17, 84),
(17, 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaempleado`
--

CREATE TABLE `lineaempleado` (
  `numeroempleado` int(10) NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lineaempleado`
--

INSERT INTO `lineaempleado` (`numeroempleado`, `dni`) VALUES
(18, '11111111L'),
(18, '32323223A'),
(18, '56565656D'),
(18, '98786756S'),
(18, '99999999E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineatabla`
--

CREATE TABLE `lineatabla` (
  `codtabla` int(10) NOT NULL,
  `codsesion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lineatabla`
--

INSERT INTO `lineatabla` (`codtabla`, `codsesion`) VALUES
(1, 1),
(1, 2),
(6, 1),
(6, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `codPlan` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `tipoplan` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`codPlan`, `tipoplan`, `descripcion`) VALUES
('1', 'Nutricion', 'Plan en el que asesoramos nutricionalmente'),
('2', 'Entrenamiento', 'Plan en el que asesoramos tanto nutricional como deportivamente'),
('3', 'Pro', 'Plan en el que asesoramos tanto nutricional como deportivamente de una forma mas personalizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `codplato` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `link` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `calorias` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`codplato`, `nombre`, `link`, `calorias`) VALUES
(56, 'plato 1', 'http://google.es', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE `progreso` (
  `codProgreso` int(10) NOT NULL,
  `imagen` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `peso` float NOT NULL,
  `medidas` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `progreso`
--

INSERT INTO `progreso` (`codProgreso`, `imagen`, `peso`, `medidas`, `fecha`, `dni`) VALUES
(6, 'img/img.jpg', 123, '123/23/123', '2019-12-14', '99999999E'),
(8, 'img/1577363274-cc60uQq.jpg', 100, '23/23/231', '2019-12-26', '32323223A'),
(9, 'img/img.jpg', 300, '99/999', '2020-01-09', '11111111L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `codsesion` int(10) NOT NULL,
  `dia` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`codsesion`, `dia`) VALUES
(1, 'lunes'),
(2, 'martes'),
(4, 'Miercoles'),
(5, 'Martes'),
(6, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaejercicios`
--

CREATE TABLE `tablaejercicios` (
  `codtabla` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tablaejercicios`
--

INSERT INTO `tablaejercicios` (`codtabla`, `fecha`, `tipo`) VALUES
(1, '2019-12-04', 'cardio'),
(6, '2019-12-04', 'Musculacion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `coddietacli` (`coddieta`),
  ADD KEY `codtablacli` (`codtabla`),
  ADD KEY `codplan` (`codplan`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`codcomida`);

--
-- Indices de la tabla `diadieta`
--
ALTER TABLE `diadieta`
  ADD PRIMARY KEY (`coddia`);

--
-- Indices de la tabla `dieta`
--
ALTER TABLE `dieta`
  ADD PRIMARY KEY (`coddieta`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`codejercicio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`numeroempleado`),
  ADD UNIQUE KEY `email.unico` (`email`),
  ADD UNIQUE KEY `telefono.unico` (`telefono`),
  ADD UNIQUE KEY `dni.unico` (`dni`);

--
-- Indices de la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  ADD KEY `codejercicio` (`codigoejercicio`),
  ADD KEY `codsesiontabla` (`codigosesion`);

--
-- Indices de la tabla `lineacomida`
--
ALTER TABLE `lineacomida`
  ADD KEY `codcomida` (`codcomida`),
  ADD KEY `codplato` (`codplato`);

--
-- Indices de la tabla `lineadia`
--
ALTER TABLE `lineadia`
  ADD KEY `indice1` (`coddia`),
  ADD KEY `indice2` (`codcomida`);

--
-- Indices de la tabla `lineadieta`
--
ALTER TABLE `lineadieta`
  ADD KEY `coddiadieta` (`coddia`),
  ADD KEY `coddieta` (`coddieta`);

--
-- Indices de la tabla `lineaempleado`
--
ALTER TABLE `lineaempleado`
  ADD PRIMARY KEY (`numeroempleado`,`dni`),
  ADD KEY `dniclienteemp` (`dni`);

--
-- Indices de la tabla `lineatabla`
--
ALTER TABLE `lineatabla`
  ADD PRIMARY KEY (`codtabla`,`codsesion`),
  ADD KEY `codsesion` (`codsesion`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`codPlan`) USING BTREE;

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`codplato`);

--
-- Indices de la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD PRIMARY KEY (`codProgreso`),
  ADD KEY `dnicliente` (`dni`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`codsesion`);

--
-- Indices de la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  ADD PRIMARY KEY (`codtabla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `codcomida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `diadieta`
--
ALTER TABLE `diadieta`
  MODIFY `coddia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `dieta`
--
ALTER TABLE `dieta`
  MODIFY `coddieta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `codejercicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `numeroempleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `codplato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `progreso`
--
ALTER TABLE `progreso`
  MODIFY `codProgreso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `codsesion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  MODIFY `codtabla` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `coddietacli` FOREIGN KEY (`coddieta`) REFERENCES `dieta` (`coddieta`),
  ADD CONSTRAINT `codplanclientes` FOREIGN KEY (`codplan`) REFERENCES `plan` (`codPlan`),
  ADD CONSTRAINT `codtablacli` FOREIGN KEY (`codtabla`) REFERENCES `tablaejercicios` (`codtabla`);

--
-- Filtros para la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  ADD CONSTRAINT `codejercicio` FOREIGN KEY (`codigoejercicio`) REFERENCES `ejercicio` (`codejercicio`),
  ADD CONSTRAINT `codsesiontabla` FOREIGN KEY (`codigosesion`) REFERENCES `sesion` (`codsesion`);

--
-- Filtros para la tabla `lineacomida`
--
ALTER TABLE `lineacomida`
  ADD CONSTRAINT `codcomida` FOREIGN KEY (`codcomida`) REFERENCES `comida` (`codcomida`),
  ADD CONSTRAINT `codplato` FOREIGN KEY (`codplato`) REFERENCES `plato` (`codplato`);

--
-- Filtros para la tabla `lineadia`
--
ALTER TABLE `lineadia`
  ADD CONSTRAINT `codcomidalinea` FOREIGN KEY (`codcomida`) REFERENCES `comida` (`codcomida`),
  ADD CONSTRAINT `coddialinea` FOREIGN KEY (`coddia`) REFERENCES `diadieta` (`coddia`);

--
-- Filtros para la tabla `lineadieta`
--
ALTER TABLE `lineadieta`
  ADD CONSTRAINT `coddiadieta` FOREIGN KEY (`coddia`) REFERENCES `diadieta` (`coddia`),
  ADD CONSTRAINT `coddieta` FOREIGN KEY (`coddieta`) REFERENCES `dieta` (`coddieta`);

--
-- Filtros para la tabla `lineaempleado`
--
ALTER TABLE `lineaempleado`
  ADD CONSTRAINT `dniclienteemp` FOREIGN KEY (`dni`) REFERENCES `cliente` (`dni`),
  ADD CONSTRAINT `nempleadoconclie` FOREIGN KEY (`numeroempleado`) REFERENCES `empleado` (`numeroempleado`);

--
-- Filtros para la tabla `lineatabla`
--
ALTER TABLE `lineatabla`
  ADD CONSTRAINT `codsesion` FOREIGN KEY (`codsesion`) REFERENCES `sesion` (`codsesion`),
  ADD CONSTRAINT `codtabla` FOREIGN KEY (`codtabla`) REFERENCES `tablaejercicios` (`codtabla`);

--
-- Filtros para la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD CONSTRAINT `dnicliente` FOREIGN KEY (`dni`) REFERENCES `cliente` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
