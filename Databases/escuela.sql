-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2026 a las 07:01:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido_paterno` varchar(100) DEFAULT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `grupo_id`, `activo`) VALUES
(1, 'Ana', 'López', 'Hernández', 1, 1),
(2, 'Carlos', 'Martínez', 'Ruiz', 1, 1),
(3, 'Fernanda', 'Gómez', 'Salas', 1, 1),
(4, 'Luis', 'Pérez', 'Morales', 1, 1),
(5, 'Daniela', 'Torres', 'Jiménez', 1, 1),
(6, 'José', 'Ramírez', 'Cruz', 2, 1),
(7, 'Mariana', 'Flores', 'Vega', 2, 0),
(8, 'Miguel', 'Santos', 'Ortiz', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `activo`) VALUES
(1, 'Administración de Empresas', 1),
(2, 'Administración de Empresas Turísticas', 1),
(3, 'Relaciones Internacionales', 1),
(4, 'Contaduría Pública y Finanzas', 1),
(5, 'Derecho', 1),
(6, 'Mercadotecnia y Publicidad', 1),
(7, 'Gastronomía', 1),
(8, 'Periodismo y Ciencias de la Comunicación', 1),
(9, 'Diseño de Modas', 1),
(10, 'Pedagogía', 1),
(11, 'Cultura Física y Educación del Deporte', 1),
(12, 'Idiomas', 1),
(13, 'Psicología', 1),
(14, 'Diseño de Interiores', 1),
(15, 'Diseño Gráfico', 1),
(16, 'Ingeniería en Logística y Transporte', 1),
(17, 'Ingeniero Arquitecto', 1),
(18, 'Informática Administrativa y Fiscal', 1),
(19, 'Ingeniería en Sistemas Computacionales', 1),
(20, 'Ingeniería Mecánica Automotriz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`, `activo`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '4', 1),
(5, '5', 1),
(6, '6', 1),
(7, '7', 1),
(8, '8', 1),
(9, '9', 1),
(10, '10', 1),
(11, '11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `turno_id` int(11) DEFAULT NULL,
  `grado_id` int(11) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `numero_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `carrera_id`, `turno_id`, `grado_id`, `clave`, `numero_grupo`) VALUES
(1, 19, 2, 11, 'ISC1101-V', 1),
(2, 19, 2, 11, 'ISC1102-V', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `nombre`, `activo`) VALUES
(1, 'Matutino', 1),
(2, 'Vespertino', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `turno_id` (`turno_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id`),
  ADD CONSTRAINT `grupos_ibfk_3` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
