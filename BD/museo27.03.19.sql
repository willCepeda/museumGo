-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 01:03:20
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(100) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `contrasenia`, `nombre`, `apellidos`) VALUES
(1, 'admin@gmail.com', 'admin', 'William Alexander', 'Cepeda Yubaylla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(100) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `usuario`, `contrasenia`, `nombre`, `apellidos`) VALUES
(3, 'maria@gmail.com', '789', 'Maria Elizabet', 'Alicante rezo'),
(7, 'carlos@gmail.es', '5623', 'Carlos Alcebarros', 'Perez Gonzales'),
(8, 'juan@gmail.com', '89415', 'Juan Manuel', 'Camareno DÃ­az'),
(9, 'marcos256@gmail.com', '74562', 'Marcos Santi', 'Budget Rivas'),
(10, 'jose78@gmail.com', '884SM12', 'Jose Luis', 'Turqui Gimenez'),
(11, 'miguel007@hotmail.com', '52VM12', 'Miguel Angel', 'Sandi Boorques'),
(12, 'pedro@gmail.com', '12345', 'Pablo Javier', 'Colmenar Vascos'),
(13, 'miguel002@gmail.com', 'miguelsmat', 'Miguel Hernandez', 'Perez Sanchez'),
(14, 'pedro@gmail.com', '12345', 'Pablo Javier', 'Colmenar Vascos'),
(15, 'miguel002@gmail.com', 'miguelsmat', 'Miguel Hernandez', 'Perez Sanchez'),
(16, 'juana', 'dss', 'sadsdas', 'asdasd'),
(17, 'adssd', 'adsa', 'asdsad', 'adsas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museoaobras`
--

CREATE TABLE `museoaobras` (
  `id` int(11) NOT NULL,
  `id_museo` int(11) NOT NULL,
  `id_obras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

CREATE TABLE `museos` (
  `id_museo` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_origen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `museos`
--

INSERT INTO `museos` (`id_museo`, `codigo`, `nombre`, `fecha_origen`, `imagen`) VALUES
(1, 'Q34556', 'tysen', '2356789', 'imaggen stikjsadsndnakdn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `id_obra` int(11) NOT NULL,
  `id_pintor` int(11) NOT NULL,
  `imagen` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` mediumtext COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintores`
--

CREATE TABLE `pintores` (
  `id_pintor` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `pais_nacimiento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(100) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `usuario`, `contrasenia`, `nombre`, `apellidos`, `activo`) VALUES
(1, 'francis156@hotmail.com', '145TEACHER1', 'Francisco Javier', 'Musoz Saez', 1),
(6, 'juanteach@gmail.com', 'teacher01', 'Juan Manuel', 'Arenas Coronado', 0),
(5, 'marialuisa34@gmail.com', '4562luisa', 'Maria Luisa', 'Ramirez Alarcon', 1),
(10, 'peterteach@gmail.com', 'teacher007', 'Peter Martin', 'Arenas Cetro', 0),
(7, 'rachel01@gmail.com', 'teacherreach45', 'Rachel Ximena', 'Munich Palta', 0),
(11, 'sandra010@gmail.com', 'sandrafine', 'Sandra Mirella', 'Gueller torre', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`,`usuario`) USING BTREE;

--
-- Indices de la tabla `museoaobras`
--
ALTER TABLE `museoaobras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `museos`
--
ALTER TABLE `museos`
  ADD PRIMARY KEY (`id_museo`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indices de la tabla `pintores`
--
ALTER TABLE `pintores`
  ADD PRIMARY KEY (`id_pintor`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `id` (`id`,`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `museoaobras`
--
ALTER TABLE `museoaobras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `museos`
--
ALTER TABLE `museos`
  MODIFY `id_museo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pintores`
--
ALTER TABLE `pintores`
  MODIFY `id_pintor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
