-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2022 a las 14:49:59
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_doctor`
--

CREATE TABLE `especialidad_doctor` (
  `id_especialidad_doctor` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
--

CREATE TABLE `establecimientos` (
  `id_establecimiento` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos_administrativos`
--

CREATE TABLE `establecimientos_administrativos` (
  `id_establecimiento_administrativo` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento_especialidad_doctor`
--

CREATE TABLE `establecimiento_especialidad_doctor` (
  `id_establecimiento_especialidad_doctor` int(11) NOT NULL,
  `id_especialidad_doctor` int(11) NOT NULL,
  `id_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(10) NOT NULL,
  `nom_apell` varchar(45) NOT NULL,
  `DNI` int(8) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `domicilio` varchar(45) DEFAULT NULL,
  `id_tipo_sangre` int(2) DEFAULT NULL,
  `id_tipo_persona` int(2) DEFAULT NULL,
  `id_sexo` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nom_apell`, `DNI`, `fecha_nac`, `domicilio`, `id_tipo_sangre`, `id_tipo_persona`, `id_sexo`) VALUES
(79, 'iron bernardo', 44036506, NULL, NULL, NULL, 3, NULL),
(80, 'Ramiro', 44035505, NULL, NULL, NULL, 3, NULL),
(81, 'Omar', 37588002, NULL, NULL, NULL, 3, NULL),
(82, 'Omar', 37588002, NULL, NULL, NULL, 3, NULL),
(83, 'Vera', 4506506, NULL, NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `id_sexo` int(2) NOT NULL,
  `descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id_sexo`, `descripcion`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_persona`
--

CREATE TABLE `tipos_persona` (
  `id_tipo` int(2) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_persona`
--

INSERT INTO `tipos_persona` (`id_tipo`, `descripcion`) VALUES
(1, 'Doctor'),
(2, 'Administrativo'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_sangre`
--

CREATE TABLE `tipos_sangre` (
  `id_tipo_sangre` int(2) NOT NULL,
  `descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_sangre`
--

INSERT INTO `tipos_sangre` (`id_tipo_sangre`, `descripcion`) VALUES
(1, 'A+'),
(2, 'B+');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` datetime NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_especialidad_establecimiento_doctor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id_persona` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `password`, `id_persona`) VALUES
(42, 'sadasd@asdasd.com', 'asdasd', 79),
(43, 'asdaasdsd@asd.com', 'asdasd', 80),
(44, 'sadasd@asdasd.com', 'asdasd', 81),
(45, 'sadasd@asdasd.com', 'asdasd', 81),
(46, 'sadasd@asdasd.com', 'asdasd', 82),
(47, 'asdasd@asd.com', 'asdasd', 83);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `especialidad_doctor`
--
ALTER TABLE `especialidad_doctor`
  ADD PRIMARY KEY (`id_especialidad_doctor`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`id_establecimiento`);

--
-- Indices de la tabla `establecimientos_administrativos`
--
ALTER TABLE `establecimientos_administrativos`
  ADD PRIMARY KEY (`id_establecimiento_administrativo`),
  ADD KEY `id_establecimiento` (`id_establecimiento`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `establecimiento_especialidad_doctor`
--
ALTER TABLE `establecimiento_especialidad_doctor`
  ADD PRIMARY KEY (`id_establecimiento_especialidad_doctor`),
  ADD KEY `id_especialidad_doctor` (`id_especialidad_doctor`),
  ADD KEY `id_establecimiento` (`id_establecimiento`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_tipo_sangre` (`id_tipo_sangre`),
  ADD KEY `id_tipo_persona` (`id_tipo_persona`),
  ADD KEY `id_sexo` (`id_sexo`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipos_persona`
--
ALTER TABLE `tipos_persona`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipos_sangre`
--
ALTER TABLE `tipos_sangre`
  ADD PRIMARY KEY (`id_tipo_sangre`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_especialidad_establecimiento_doctor` (`id_especialidad_establecimiento_doctor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad_doctor`
--
ALTER TABLE `especialidad_doctor`
  MODIFY `id_especialidad_doctor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id_establecimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimientos_administrativos`
--
ALTER TABLE `establecimientos_administrativos`
  MODIFY `id_establecimiento_administrativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimiento_especialidad_doctor`
--
ALTER TABLE `establecimiento_especialidad_doctor`
  MODIFY `id_establecimiento_especialidad_doctor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `id_sexo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_persona`
--
ALTER TABLE `tipos_persona`
  MODIFY `id_tipo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_sangre`
--
ALTER TABLE `tipos_sangre`
  MODIFY `id_tipo_sangre` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialidad_doctor`
--
ALTER TABLE `especialidad_doctor`
  ADD CONSTRAINT `especialidad_doctor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `especialidad_doctor_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `establecimientos_administrativos`
--
ALTER TABLE `establecimientos_administrativos`
  ADD CONSTRAINT `establecimientos_administrativos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `establecimientos_administrativos_ibfk_2` FOREIGN KEY (`id_establecimiento`) REFERENCES `establecimientos` (`id_establecimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_sexo`) REFERENCES `sexos` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`id_tipo_sangre`) REFERENCES `tipos_sangre` (`id_tipo_sangre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_ibfk_3` FOREIGN KEY (`id_tipo_persona`) REFERENCES `tipos_persona` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`id_especialidad_establecimiento_doctor`) REFERENCES `establecimiento_especialidad_doctor` (`id_establecimiento_especialidad_doctor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
