-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2019 a las 23:30:43
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
  `contrasena` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `codplan` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `coddieta` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `codtabla` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `codcomida` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diadieta`
--

CREATE TABLE `diadieta` (
  `coddia` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `calorias` int(4) NOT NULL,
  `macronutrientes` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dia` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dieta`
--

CREATE TABLE `dieta` (
  `coddieta` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `semana` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `codejercicio` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `series` int(3) NOT NULL,
  `repeticiones` int(3) NOT NULL,
  `peso` int(3) NOT NULL,
  `link` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `numeroempleado` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `especialidad` int(1) NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `codigoejercicio` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `codigosesion` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineacomida`
--

CREATE TABLE `lineacomida` (
  `codcomida` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `codplato` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineadia`
--

CREATE TABLE `lineadia` (
  `coddia` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `codcomida` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineadieta`
--

CREATE TABLE `lineadieta` (
  `coddieta` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `coddia` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaempleado`
--

CREATE TABLE `lineaempleado` (
  `numeroempleado` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineatabla`
--

CREATE TABLE `lineatabla` (
  `codtabla` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `codsesion` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `codPlan` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `tipoplan` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `disponibilidad` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `codplato` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `link` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE `progreso` (
  `codProgreso` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `peso` float NOT NULL,
  `medidas` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `codsesion` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `dia` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaejercicios`
--

CREATE TABLE `tablaejercicios` (
  `codtabla` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
  ADD KEY `codigoejercicio` (`codigoejercicio`),
  ADD KEY `codigosesion` (`codigosesion`);

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
  ADD KEY `coddialinea` (`coddia`),
  ADD KEY `codcomidalinea` (`codcomida`);

--
-- Indices de la tabla `lineadieta`
--
ALTER TABLE `lineadieta`
  ADD KEY `coddieta` (`coddieta`),
  ADD KEY `coddiadieta` (`coddia`);

--
-- Indices de la tabla `lineaempleado`
--
ALTER TABLE `lineaempleado`
  ADD KEY `codempleado` (`numeroempleado`),
  ADD KEY `dniclienteemp` (`dni`);

--
-- Indices de la tabla `lineatabla`
--
ALTER TABLE `lineatabla`
  ADD KEY `codtabla` (`codtabla`),
  ADD KEY `codsesiontabla` (`codsesion`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`codPlan`);

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
  ADD PRIMARY KEY (`codsesion`),
  ADD UNIQUE KEY `dia.unico` (`dia`);

--
-- Indices de la tabla `tablaejercicios`
--
ALTER TABLE `tablaejercicios`
  ADD PRIMARY KEY (`codtabla`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `coddietacli` FOREIGN KEY (`coddieta`) REFERENCES `dieta` (`coddieta`),
  ADD CONSTRAINT `codplan` FOREIGN KEY (`codplan`) REFERENCES `plan` (`codPlan`),
  ADD CONSTRAINT `codtablacli` FOREIGN KEY (`codtabla`) REFERENCES `tablaejercicios` (`codtabla`);

--
-- Filtros para la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  ADD CONSTRAINT `codejercicio` FOREIGN KEY (`codigoejercicio`) REFERENCES `ejercicio` (`codejercicio`),
  ADD CONSTRAINT `codsesion` FOREIGN KEY (`codigosesion`) REFERENCES `sesion` (`codsesion`);

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
  ADD CONSTRAINT `codempleado` FOREIGN KEY (`numeroempleado`) REFERENCES `empleado` (`numeroempleado`),
  ADD CONSTRAINT `dniclienteemp` FOREIGN KEY (`dni`) REFERENCES `cliente` (`dni`);

--
-- Filtros para la tabla `lineatabla`
--
ALTER TABLE `lineatabla`
  ADD CONSTRAINT `codsesiontabla` FOREIGN KEY (`codsesion`) REFERENCES `sesion` (`codsesion`),
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
