-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2020 a las 19:20:56
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
('11111111L', 'Benito', 'benito@gmail.com', 'adas', '666666666', 'Adelgazar', '1', 1, 1, '3', '4', '', '2020-02-09'),
('32323223A', 'Marta', 'marta@gmail.com', 'adas', '678678678', 'Musculacion', '2', 2, 6, '3', '3', 'soy alergico a la coliflor', '2020-01-08'),
('55555555F', 'Eugenio', 'eugenio@gmail.com', 'asdasd', '777777777', 'Definir', '1', 1, 1, '3', '4', '', '2020-02-09'),
('56565656D', 'Paco', 'paco@gmail.com', 'asdsa', '666666666', 'Musculacion', '1', 2, 6, '2', '1', '', '2020-02-09'),
('76556432J', 'Carlos', 'carlos@gmail.com', 'calle falsa 321', '645268230', 'Musculacion', '1', NULL, NULL, '2', '4', '', '2020-02-13'),
('99999999E', 'Elva', 'elva@gmail.com', 'adasdadasd', '666666666', 'Definir', '1', 2, 1, '1', '4', 'Nada', '2020-02-07'),
('99999999P', 'Elver', 'elver@gmail.com', 'asdasd', '666666666', 'Adelgazar', '1', 2, 1, '3', '4', '', '2020-02-09');

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
(1, 'Desayuno'),
(2, 'Comida'),
(3, 'Cena');

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
(1, 1222, '1223', 'lunes'),
(2, 2323, '12313', 'martes'),
(3, 31231, '12312', 'miercoles'),
(4, 1312, '12312', 'jueves'),
(5, 131, '123123', 'viernes'),
(6, 1222, 'asdasd', 'Lunes'),
(7, 1222, 'asdasd', 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dieta`
--

CREATE TABLE `dieta` (
  `coddieta` int(10) NOT NULL,
  `semana` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `dieta`
--

INSERT INTO `dieta` (`coddieta`, `semana`) VALUES
(1, '1'),
(2, '3');

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
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `privilegios` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`numeroempleado`, `especialidad`, `nombre`, `dni`, `telefono`, `email`, `direccion`, `clave`, `privilegios`) VALUES
(2, 1, 'Ana', '87654321B', '717003717', 'ana@motofitness.com', 'Puerta Zamora 78', '1', 1),
(3, 2, 'Roberto', '66666666S', '666666666', 'roberto@motofitness.com', 'Avenida Cipreses 9', '1', 0),
(13, 3, 'Alberto', '99999999K', '678899098', 'alberto@motofitness.com', 'Calle Falsa 123', '1', 1),
(14, 2, 'Luis', '12345678A', '625903432', 'luis@motofitness.com', 'Avenida Mirat Número 8', '1', 0),
(15, 1, 'Juan', '98988787D', '654435543', 'juan@motofitness.com', 'Calle falsa 123', '1', 0);

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
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2);

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
(1, 1),
(1, 2),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(7, 3);

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7);

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
(2, '32323223A'),
(2, '56565656D'),
(2, '99999999E'),
(3, '32323223A'),
(3, '56565656D'),
(13, '11111111L'),
(13, '55555555F'),
(13, '99999999P'),
(14, '76556432J'),
(15, '76556432J');

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
  `link` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`codplato`, `nombre`, `link`) VALUES
(1, 'macarrones', 'asdasd'),
(2, 'espaguetis', 'asdasda'),
(3, 'Pollo', 'asdas'),
(4, 'ternera', 'asd'),
(5, 'Pepe', 'asdasd'),
(8, 'asd', 'http://www.google.es'),
(9, 'asd', 'http://www.google.es');

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
  ADD PRIMARY KEY (`codcomida`,`codplato`),
  ADD KEY `codcomida` (`codcomida`),
  ADD KEY `codplato` (`codplato`);

--
-- Indices de la tabla `lineadia`
--
ALTER TABLE `lineadia`
  ADD PRIMARY KEY (`coddia`,`codcomida`),
  ADD KEY `codcomidalinea` (`codcomida`);

--
-- Indices de la tabla `lineadieta`
--
ALTER TABLE `lineadieta`
  ADD PRIMARY KEY (`coddieta`,`coddia`),
  ADD KEY `coddiadieta` (`coddia`);

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
  MODIFY `codcomida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `diadieta`
--
ALTER TABLE `diadieta`
  MODIFY `coddia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `dieta`
--
ALTER TABLE `dieta`
  MODIFY `coddieta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `codejercicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `numeroempleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `codplato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `coddiadieta` FOREIGN KEY (`coddieta`) REFERENCES `diadieta` (`coddia`),
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
