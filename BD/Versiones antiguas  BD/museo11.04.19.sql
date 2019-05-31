-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2019 a las 12:29:04
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
-- Estructura de tabla para la tabla `actividad_profesor`
--

CREATE TABLE `actividad_profesor` (
  `id_actividad` int(100) NOT NULL,
  `nom_acti` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `coleccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `codigo_pintor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagenes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pregunta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_profesor` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actividad_profesor`
--

INSERT INTO `actividad_profesor` (`id_actividad`, `nom_acti`, `coleccion`, `tipo`, `respuesta`, `publicado`, `codigo_pintor`, `imagenes`, `pregunta`, `codigo_profesor`) VALUES
(3, 'Descifrar el pintor', 'Q176251', 'foto', 'Francisco de Goya', 1, 'Q5432,Q334262,Q335022', '1246,1234,1237', 'Quien pinto el cuadro el tío paquete?', '5'),
(4, 'Quien es este pintor', 'Q176251', 'foto', 'Hans Baldung', 0, 'Q301,Q1158872,Q462404', '1265,1221,1257,', 'Que pintor se encargo de la obra \"Retrato de una dama\"?', '5'),
(5, 'Quien es este pintor', 'Q176251', 'foto', 'Cranach, Lucas', 1, 'Q191748,Q5599,Q297838', '1267,1247,1263,', 'Que pintor se encargo de la obra \"San jorge (ala exterior derecha)\"?', '5'),
(6, 'Quien es este pintor', 'Q176251', 'foto', 'El Greco', 0, 'Q301,Q318769,Q151152', '1265,1231,1228,', 'Que pintor se encargo de la obra \"L Anunciación\"?', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(100) NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `usuario`, `contrasenia`, `nombre`, `apellidos`) VALUES
(3, 'maria@gmail.com', '3456', 'Maria Elizabet', 'Alicante rezo'),
(7, 'carlos@gmail.es', '5623', 'Carlos Alcebarros', 'Perez Gonzales'),
(8, 'juan@gmail.com', '89415', 'Juan Manuel', 'Camareno Dí­az'),
(9, 'marcos256@gmail.com', '74562', 'Marcos Santi', 'Budget Rivas'),
(10, 'jose78@gmail.com', '884SM12', 'Jose Luis', 'Turqui Gimenez'),
(11, 'miguel007@hotmail.com', '52VM12', 'Miguel Angel', 'Sandi Boorques'),
(12, 'pedro@gmail.com', '12345', 'Pablo Javier', 'Colmenar Vascos'),
(13, 'miguel002@gmail.com', 'miguelsmat', 'Miguel Hernandez', 'Perez Sanchez'),
(16, 'juana@ucm.es', 'dss568', 'juana villar', 'palomino gimenez'),
(17, 'pablo@ucm.es', 'pa007', 'pablo ', 'casado roman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hacer_actividad`
--

CREATE TABLE `hacer_actividad` (
  `id` int(11) NOT NULL,
  `id_actividad` int(100) NOT NULL,
  `id_estudiantes` int(100) NOT NULL,
  `id_profesor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `realizado` tinyint(1) NOT NULL,
  `respuesta_estudiante` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nota` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hacer_actividad`
--

INSERT INTO `hacer_actividad` (`id`, `id_actividad`, `id_estudiantes`, `id_profesor`, `realizado`, `respuesta_estudiante`, `nota`) VALUES
(2, 5, 7, '5', 0, '', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

CREATE TABLE `museos` (
  `id_museo` int(100) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_origen` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` longtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `museos`
--

INSERT INTO `museos` (`id_museo`, `codigo`, `nombre`, `fecha_origen`, `imagen`) VALUES
(74, 'Q1592523', 'Museo Sorolla', '1932-06-11', 'http://commons.wikimedia.org/wiki/Special:FilePath/Sala%20I%20in%20Museo%20Sorolla%20Madrid%20on%2020161106.jpg'),
(77, 'Q160112', 'Museo del Prado', '1819-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/Museo%20del%20Prado%202016%20%2825185969599%29.jpg'),
(75, 'Q176251', 'Museo Nacional Thyssen-Bornemisza', '1992-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/Museo%20Thyssen-Bornemisza%20%28Madrid%29%2007.jpg'),
(71, 'Q18674434', 'Museo Carlos de Amberes', '2014-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/Fundaci%C3%B3n%20Carlos%20de%20Amberes%20%28Madrid%29%2001.jpg'),
(70, 'Q2283575', 'Museo Arte Público de Madrid', '1972-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/La%20Sirena%20Varada%20%28E.%20Chillida%29%2001.jpg'),
(72, 'Q28808141', 'Casa-Museo Fuente del Rey', '', ''),
(78, 'Q386570', 'Museo Lázaro Galdiano', '1951-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/Museo%20L%C3%A1zaro%20Galdiano%20%28Madrid%29%2005.jpg'),
(73, 'Q460889', 'Museo Nacional Centro de Arte Reina Sofía', '1992-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/MNCARS%2005.jpg'),
(67, 'Q5361303', 'Museo Nacional de Artes Decorativas', '1912-12-30', 'http://commons.wikimedia.org/wiki/Special:FilePath/Museo%20Nacional%20de%20Artes%20Decorativas%20%28Madrid%29%2001.jpg'),
(68, 'Q6940528', 'Museo de Arte Contemporáneo (Madrid)', '2001-01-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/Madrid%20en%2012%20nuevas%20miradas%2019.jpg'),
(76, 'Q6940946', 'Museo de Arte Moderno (España)', '1894-08-04', 'http://commons.wikimedia.org/wiki/Special:FilePath/Sede%20M.A.M.JPG'),
(79, 'Q6974501', 'Museo del Romanticismo', '1924-06-01', 'http://commons.wikimedia.org/wiki/Special:FilePath/Museo%20del%20Romanticismo%20-%20Fachada%20-%20Fachada%20del%20Museo%20del%20Romanticismo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo_cn_pintor`
--

CREATE TABLE `museo_cn_pintor` (
  `id` int(11) NOT NULL,
  `codigo_museo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codigo_pintor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `museo_cn_pintor`
--

INSERT INTO `museo_cn_pintor` (`id`, `codigo_museo`, `codigo_pintor`) VALUES
(1400, 'Q176251', 'Q28144'),
(1401, 'Q176251', 'Q33978'),
(1402, 'Q176251', 'Q33981'),
(1403, 'Q176251', 'Q42207'),
(1404, 'Q176251', 'Q46373'),
(1405, 'Q176251', 'Q49987'),
(1406, 'Q176251', 'Q82445'),
(1407, 'Q176251', 'Q102272'),
(1408, 'Q176251', 'Q126074'),
(1409, 'Q176251', 'Q142710'),
(1410, 'Q176251', 'Q148475'),
(1411, 'Q176251', 'Q151679'),
(1412, 'Q176251', 'Q152233'),
(1413, 'Q176251', 'Q152384'),
(1414, 'Q176251', 'Q153104'),
(1416, 'Q176251', 'Q153793'),
(1417, 'Q176251', 'Q156272'),
(1418, 'Q176251', 'Q157610'),
(1419, 'Q176251', 'Q160422'),
(1420, 'Q176251', 'Q164712'),
(1422, 'Q176251', 'Q182664'),
(1424, 'Q176251', 'Q188172'),
(1425, 'Q176251', 'Q191423'),
(1426, 'Q176251', 'Q192062'),
(1428, 'Q176251', 'Q217648'),
(1429, 'Q176251', 'Q217715'),
(1430, 'Q176251', 'Q247005'),
(1431, 'Q176251', 'Q265820'),
(1432, 'Q176251', 'Q270658'),
(1433, 'Q176251', 'Q277738'),
(1434, 'Q176251', 'Q278623'),
(1435, 'Q176251', 'Q282708'),
(1436, 'Q176251', 'Q297838'),
(1437, 'Q176251', 'Q304411'),
(1438, 'Q176251', 'Q310973'),
(1439, 'Q176251', 'Q312096'),
(1440, 'Q176251', 'Q314548'),
(1441, 'Q176251', 'Q314889'),
(1442, 'Q176251', 'Q320980'),
(1443, 'Q176251', 'Q336908'),
(1444, 'Q176251', 'Q352438'),
(1445, 'Q176251', 'Q370567'),
(1446, 'Q176251', 'Q379521'),
(1447, 'Q176251', 'Q381801'),
(1448, 'Q176251', 'Q430783'),
(1449, 'Q176251', 'Q447058');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `id_obra` int(100) NOT NULL,
  `codigo_obra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_pintor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `coleccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`id_obra`, `codigo_obra`, `codigo_pintor`, `imagen`, `nombre`, `coleccion`) VALUES
(1220, 'Q21711702', 'Q1658589', 'http://commons.wikimedia.org/wiki/Special:FilePath/Suprematist%20Composition%20by%20Ilya%20Chashnik%2C%201923%20AD%2C%20oil%20on%20canvas%20-%20Museo%20Nacional%20Centro%20de%20Arte%20Reina%20Sof%C3%ADa%20-%20DSC08784.JPG', 'Composición suprematista', 'Q176251'),
(1221, 'Q21711737', 'Q1158872', 'http://commons.wikimedia.org/wiki/Special:FilePath/Foschi%20lady.jpg', 'Retrato de una dama', 'Q176251'),
(1222, 'Q21281868', 'Q213612', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jacob%20van%20Ruisdael%20-%20Campos%20de%20blanqueo%20en%20Bloemendaal%20cerca%20de%20Haarlem%20d%C3%A9cada%20de%201660.jpg', 'Campos de blanqueo en Bloemendaal cerca de Haarlem década de 1660', 'Q176251'),
(1223, 'Q21711490', 'Q9440', 'http://commons.wikimedia.org/wiki/Special:FilePath/Veronese%20-%20Annunciazione%20-%20Thyssen-Bornemisza%20-%20Madrid.jpg', 'La Anunciación', 'Q176251'),
(1224, 'Q21711488', 'Q297', 'http://commons.wikimedia.org/wiki/Special:FilePath/Retrato%20de%20la%20reina%20Mariana%20de%20Austria%20%282%29%2C%20by%20Diego%20Vel%C3%A1zquez.jpg', 'Retrato de doña Mariana de Austria, reina de España', 'Q176251'),
(1225, 'Q21711766', 'Q151152', 'http://commons.wikimedia.org/wiki/Special:FilePath/28.%20Botella%20y%20frutero.jpg', 'Botella y frutero', 'Q176251'),
(1226, 'Q21711436', 'Q4233718', 'http://commons.wikimedia.org/wiki/Special:FilePath/Bernardo%20Strozzi%20-%20Santa%20Cecilia.jpg', 'Santa Cecilia', 'Q176251'),
(1227, 'Q21711422', 'Q1347599', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jan%20Siberechts%20-%20The%20Ford.jpg', 'El vado', 'Q176251'),
(1228, 'Q21711768', 'Q151152', 'http://commons.wikimedia.org/wiki/Special:FilePath/25.%20El%20fumador%20%28Frank%20Haviland%29.jpg', 'El fumador (Frank Haviland)', 'Q176251'),
(1229, 'Q21711706', 'Q157610', 'http://commons.wikimedia.org/wiki/Special:FilePath/Lovis%20Corinth%20-%20Modenschau.jpg', 'Desfile de modelos', 'Q176251'),
(1230, 'Q20670819', 'Q1451318', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jasper%20Francis%20Cropsey%20-%20Greenwood%20Lake.jpg', 'El lago de Greenwood', 'Q176251'),
(1231, 'Q21711645', 'Q318769', 'http://commons.wikimedia.org/wiki/Special:FilePath/Francesco%20Guardi%20-%20El%20Gran%20Canal%20con%20San%20Simeone%20Piccolo%20y%20Santa%20Luc%C3%ADa.jpg', 'El Gran Canal con San Simeone Piccolo y Santa Lucía', 'Q176251'),
(1232, 'Q20737205', 'Q391608', 'http://commons.wikimedia.org/wiki/Special:FilePath/Asher%20Brown%20Durand%20-%20A%20Creek%20in%20the%20Woods%20%281865%29.jpg', 'Un arroyo en el bosque', 'Q176251'),
(1233, 'Q20199398', 'Q366212', 'http://commons.wikimedia.org/wiki/Special:FilePath/Frederic%20Edwin%20Church%20-%20Autumn.jpg', 'Otoño', 'Q176251'),
(1234, 'Q21711646', 'Q334262', 'http://commons.wikimedia.org/wiki/Special:FilePath/Guercino%20-%20Jesus%20and%20the%20Samaritan%20Woman%20at%20the%20Well%20-%20WGA10946.jpg', 'Jesús y la samaritana en el pozo', 'Q176251'),
(1235, 'Q21711682', 'Q940505', 'http://commons.wikimedia.org/wiki/Special:FilePath/Johann%20Koerbecke%20Himmelfahrt%20Mariens.jpg', 'La Asunción de la Virgen', 'Q176251'),
(1236, 'Q21711650', 'Q454656', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jan%20Davidsz.%20de%20Heem%20-%20Still-Life%20with%20Flowers%20in%20a%20Glass%20Vase%20and%20Fruit%20-%20WGA11284.jpg', 'Florero con vaso de cristal y frutas', 'Q176251'),
(1237, 'Q21711442', 'Q335022', 'http://commons.wikimedia.org/wiki/Special:FilePath/David%20Teniers%20%28II%29%20-%20The%20Village%20F%C3%AAte%20%28Museo%20Thyssen-Bornemisza%29.jpg', 'Fiesta campesina', 'Q176251'),
(1238, 'Q21711455', 'Q9319', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jacopo%20Tintoretto%20-%20The%20Meeting%20of%20Tamar%20and%20Judah%20-%20WGA22659.jpg', 'El encuentro entre Tamar y Judá', 'Q176251'),
(1239, 'Q21711494', 'Q191748', 'http://commons.wikimedia.org/wiki/Special:FilePath/Lucas%20Cranach%20d.%20%C3%84.%20-%20Die%20Heilige%20Elizabeth%20mit%20Herzog%20Georg%20von%20Sachsen%20als%20Stifter.jpg', 'Santa Isabel con el duque Jorge de Sajonia como donante (ala interior izquierda)', 'Q176251'),
(1240, 'Q21711484', 'Q186202', 'http://commons.wikimedia.org/wiki/Special:FilePath/Giovanni%20Battista%20Tiepolo%20%28e%20studio%29%20-%20Cristo%20Via%20del%20Golgota.jpg', 'Cristo camino del Gólgota', 'Q176251'),
(1241, 'Q21711459', 'Q16058601', 'http://commons.wikimedia.org/wiki/Special:FilePath/Wolf%20Traut-retrato%20de%20mujer.jpg', 'Retrato de una mujer', 'Q176251'),
(1242, 'Q21711439', 'Q1342328', 'http://commons.wikimedia.org/wiki/Special:FilePath/Boy%20in%20a%20turban%20holding%20a%20nosegay%2C%20by%20Michiel%20Sweerts.jpg', 'Muchacho con turbante y un ramillete de flores', 'Q176251'),
(1243, 'Q21711483', 'Q194402', 'http://commons.wikimedia.org/wiki/Special:FilePath/Joshua%20Reynolds%20-%20The%20Countess%20of%20Dartmouth%20-%20WGA19336.jpg', 'Frances, condesa de Dartmouth', 'Q176251'),
(1244, 'Q21711671', 'Q314548', 'http://commons.wikimedia.org/wiki/Special:FilePath/Gerrit%20Van%20Honthorst%20-%20Joyeux%20Violoniste.jpg', 'El violinista alegre con un vaso de vino', 'Q176251'),
(1245, 'Q21711427', 'Q205863', 'http://commons.wikimedia.org/wiki/Special:FilePath/Country%20Wedding%20by%20Jan%20Steen%20Museo%20Thyssen-Bornemisza.jpg', 'Boda campesina', 'Q176251'),
(1246, 'Q21711730', 'Q5432', 'http://commons.wikimedia.org/wiki/Special:FilePath/Francisco%20de%20Goya%20-%20El%20t%C3%ADo%20Paquete.jpg', 'El tío Paquete', 'Q176251'),
(1247, 'Q21711517', 'Q5599', 'http://commons.wikimedia.org/wiki/Special:FilePath/Rubens89.jpg', 'Retrato de una joven dama con rosario', 'Q176251'),
(1249, 'Q21711637', 'Q188306', 'http://commons.wikimedia.org/wiki/Special:FilePath/Christian%20Morgenstern%20-%20Eichen%20am%20Wasser%20%281832%29.jpg', 'Robles junto al agua', 'Q176251'),
(1250, 'Q21711733', 'Q315996', 'http://commons.wikimedia.org/wiki/Special:FilePath/Goyen%201643%20Paisaje%20invernal%20con%20figuras%20en%20el%20hielo.jpg', 'Paisaje invernal con figuras en el hielo', 'Q176251'),
(1251, 'Q21711467', 'Q1337275', 'http://commons.wikimedia.org/wiki/Special:FilePath/Valentin%20de%20Boulogne%20-%20David%20with%20the%20Head%20of%20Goliath%20and%20Two%20Soldiers%20-%20WGA24236.jpg', 'David con la cabeza de Goliat y dos soldados', 'Q176251'),
(1252, 'Q21711668', 'Q49987', 'http://commons.wikimedia.org/wiki/Special:FilePath/Hans%20Holbein%20d.%20%C3%84.%20-%20Portr%C3%A4t%20einer%20Frau.jpg', 'Retrato de una mujer', 'Q176251'),
(1253, 'Q21711480', 'Q468632', 'http://commons.wikimedia.org/wiki/Special:FilePath/Mattia%20Preti%20-%20The%20Concert%20-%20WGA18388.jpg', 'El Concierto', 'Q176251'),
(1254, 'Q21711441', 'Q335022', 'http://commons.wikimedia.org/wiki/Special:FilePath/David%20Teniers%20%28II%29%20-%20Smokers%20in%20an%20Interior%20%28Museo%20Thyssen-Bornemisza%29.jpg', 'Fumadores en un interior', 'Q176251'),
(1255, 'Q21711449', 'Q186202', 'http://commons.wikimedia.org/wiki/Special:FilePath/Giovanni%20Battista%20Tiepolo%20-%20The%20Death%20of%20Sophonisba%20-%20WGA22350.jpg', 'La muerte de Sofonisba', 'Q176251'),
(1256, 'Q21711484', 'Q4233718', 'http://commons.wikimedia.org/wiki/Special:FilePath/Giovanni%20Battista%20Tiepolo%20%28e%20studio%29%20-%20Cristo%20Via%20del%20Golgota.jpg', 'Cristo camino del Gólgota', 'Q176251'),
(1257, 'Q21711793', 'Q462404', 'http://commons.wikimedia.org/wiki/Special:FilePath/Fitz%20Hugh%20Lane%20-%20The%20Fort%20and%20Ten%20Pound%20Island%2C%20Gloucester%2C%20Massachusetts.jpg', 'El fuerte y la isla Ten Pound, Gloucester, Massachusetts', 'Q176251'),
(1258, 'Q20199319', 'Q366212', 'http://commons.wikimedia.org/wiki/Special:FilePath/Frederic%20Edwin%20Church%2C%20Abandoned%20boat.jpg', 'Bote abandonado', 'Q176251'),
(1259, 'Q21711763', 'Q5582', 'http://commons.wikimedia.org/wiki/Special:FilePath/Vincent%20van%20Gogh%20-%20De%20aflader%20in%20Arles.jpg', 'Los descargadores en Arles', 'Q176251'),
(1260, 'Q21711454', 'Q9319', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jacopo%20Tintoretto%20-%20The%20Annunciation%20to%20Manoah%27s%20Wife%20-%20WGA22660.jpg', 'El anuncio a la mujer de Manué', 'Q176251'),
(1261, 'Q20670915', 'Q1451318', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jasper%20Francis%20Cropsey%20-%20View%20near%20Sherburne%2C%20Chenango%20County%2C%20New%20York.jpg', 'Paisaje cerca de Sherburne, condado de Chenango, Nueva York', 'Q176251'),
(1262, 'Q20742551', 'Q3123472', 'http://commons.wikimedia.org/wiki/Special:FilePath/Martin%20Johnson%20Heade%20-%20Orchid%20and%20Hummingbird%20near%20a%20Mountain%20Waterfall.jpg', 'Orquídea y colibrí cerca de una cascada de montaña', 'Q176251'),
(1263, 'Q20017050', 'Q297838', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jos%C3%A9%20de%20Ribera%20-%20La%20Piedad.jpg', 'La Piedad', 'Q176251'),
(1264, 'Q20742575', 'Q3123472', 'http://commons.wikimedia.org/wiki/Special:FilePath/Martin%20Johnson%20Heade%20-%20Sunrise%20in%20Nicaragua.jpg', 'Amanecer en Nicaragua', 'Q176251'),
(1265, 'Q21711736', 'Q301', 'http://commons.wikimedia.org/wiki/Special:FilePath/El%20Greco%20-%20The%20Annunciation%20-%20WGA10522.jpg', 'La Anunciación', 'Q176251'),
(1266, 'Q21711463', 'Q7129', 'http://commons.wikimedia.org/wiki/Special:FilePath/Cosm%C3%A8%20Tura%20-%20St%20John%20the%20Evangelist%20on%20Patmos%20-%20WGA23150.jpg', 'San Juan Evangelista en Patmos', 'Q176251'),
(1267, 'Q21711495', 'Q191748', 'http://commons.wikimedia.org/wiki/Special:FilePath/Lucas%20Cranach%20d.%20%C3%84.%20-%20Der%20Heilige%20Georg.jpg', 'San Jorge (ala exterior derecha)', 'Q176251'),
(1268, 'Q21711639', 'Q28144', 'http://commons.wikimedia.org/wiki/Special:FilePath/Kalf%2C%20Willem%20-%20Still-Life%20with%20an%20Aquamanile%2C%20Fruit%2C%20and%20a%20Nautilus%20Cup%20-%20c.%201660.jpg', 'Bodegón con aguamanil, frutas, copa nautilo y otros objetos', 'Q176251'),
(1269, 'Q21711633', 'Q1192715', 'http://commons.wikimedia.org/wiki/Special:FilePath/San%20Juan%20Bautista%20predicando%20en%20el%20desierto%20%28Pier%20Francesco%20Mola%29.jpg', 'San Juan Bautista predicando en el desierto', 'Q176251');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintores`
--

CREATE TABLE `pintores` (
  `id_pintor` int(100) NOT NULL,
  `codigo_pintor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacimiento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pintores`
--

INSERT INTO `pintores` (`id_pintor`, `codigo_pintor`, `nombre`, `nacimiento`, `genero`, `imagen`) VALUES
(121, 'Q229455', 'Cindy Sherman', 'Glen Ridge', 'femenino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Hallway%20in%20the%20Wexner%20Center%20for%20the%20Arts.jpg'),
(122, 'Q218207', 'Zoe Leonard', 'Liberty (pueblo)', 'femenino', ''),
(123, 'Q216179', 'Bryan Ferry', 'Washington, Tyne and Wear', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Bryan%20ferry%20VieillesCharrues2007.JPG'),
(124, 'Q312786', 'Robert Mapplethorpe', 'Q5460477', 'masculino', ''),
(125, 'Q302714', 'Aaron Siskind', 'Nueva York', 'masculino', ''),
(126, 'Q207359', 'Georges Bataille', 'Billom', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Bataille%20Georges%201940.jpg'),
(127, 'Q170317', 'Ferran Adrià', 'Hospitalet de Llobregat', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Ferran%20Adri%C3%A0%20en%20la%20presentaci%C3%B3n%20de%20%27Un%20proyecte%20per%20compartir%27.jpg'),
(128, 'Q179303', 'Jürgen Klauke', 'Cochem', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/J%C3%BCrgen%20Klauke2.jpg'),
(129, 'Q213597', 'Hans Richter', 'Berlín', 'masculino', ''),
(130, 'Q298075', 'Guy Debord', 'París', 'masculino', ''),
(131, 'Q315348', 'Carl Andre', 'Quincy', 'masculino', ''),
(132, 'Q275597', 'Germaine Dulac', 'Amiens', 'femenino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Germaine%20Dulac.jpg'),
(133, 'Q221732', 'Paul McCarthy', 'Salt Lake City', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Paul%20McCarthy%20%E2%80%94%20Westernparade%20%28ii%29.jpg'),
(135, 'Q312529', 'André Masson', 'Balagny-sur-Thérain', 'masculino', ''),
(136, 'Q260436', 'Joan Brossa', 'Barcelona', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/FotoBrossa.jpg'),
(137, 'Q251123', 'Álvaro Mutis', 'Bogotá', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Ant%C3%B3n%20Riveiro%20Coello%2C%20%C3%81lvaro%20Mutis%20e%20Alberto%20Pi%C3%B1eiro..jpg'),
(138, 'Q170344', 'Anselm Kiefer', 'Donaueschingen', 'masculino', ''),
(139, 'Q180727', 'John Cage', 'Los Ángeles', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/John%20Cage%20%281988%29.jpg'),
(140, 'Q271918', 'Gertrude Käsebier', 'Des Moines', 'femenino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Gertrude%20K%C3%A4sebier%20by%20Adolf%20de%20Meyer.jpg'),
(141, 'Q48319', 'Hans Holbein el Joven', 'Augsburgo', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Hans%20Holbein%20the%20Younger%2C%20self-portrait.jpg'),
(142, 'Q130777', 'Kazimir Malévich', 'Kiev', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Casimir%20Malevich%20photo.jpg'),
(143, 'Q126074', 'Richard Lindner', 'Hamburgo', 'masculino', ''),
(144, 'Q48797', 'Hans von Kulmbach', 'Kulmbach', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Portrait%20Hans%20von%20Kulmbach.jpg'),
(145, 'Q41406', 'Edvard Munch', 'Løten', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Edvard%20Munch%201933-2.jpg'),
(146, 'Q5577', 'Salvador Dalí', 'Figueras', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Salvador%20Dali%20NYWTS.jpg'),
(147, 'Q107194', 'George Grosz', 'Berlín', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/George%20Grosz%201930.jpg'),
(148, 'Q17169', 'Giovanni Bellini', 'Venecia', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Giovanni%20Bellini%20Felt%C3%A9telezett%C3%96narck%C3%A9peKJ.jpg'),
(149, 'Q152233', 'El Lissitzky', 'Q183162', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/El%20lissitzky%20self%20portrait%201914.jpg'),
(150, 'Q102272', 'Jan van Eyck', 'Flandes', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Portrait%20of%20a%20Man%20by%20Jan%20van%20Eyck-small.jpg'),
(151, 'Q62992', 'Christian Rohlfs', 'Groß Niendorf', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Rohlfs%20-%20Selbstbildnis%2C%201918.jpeg'),
(152, 'Q123098', 'Angelica Kauffmann', 'Coira', 'femenino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Angelika%20Kauffmann%20-%20Self%20Portrait%20-%201784.jpg'),
(153, 'Q41402', 'Gilbert Stuart', 'North Kingstown', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Gilbert%20Stuart%20Selfportrait.jpg'),
(154, 'Q7799', 'Bramantino', 'Bérgamo', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Bram0.5.jpg'),
(156, 'Q38785', 'Mijaíl Lariónov', 'Tiráspol', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Mikhail%20Larionov%2C%20c.1915.jpg'),
(157, 'Q73889', 'Jan Polack', 'Cracovia', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Jan%20Polack%20003.jpg'),
(158, 'Q47551', 'Tiziano', 'Pieve di Cadore', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Titian%20-%20Self-Portrait%20%28detail%29%20-%20WGA22979.jpg'),
(159, 'Q46373', 'Edgar Degas', 'París', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Edgar%20Degas%20self%20portrait%201855.jpeg'),
(160, 'Q301', 'El Greco', 'Creta', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/El%20Greco%20-%20Portrait%20of%20a%20Man%20-%20WGA10554.jpg'),
(161, 'Q112250', 'Pieter Bout', 'Bruselas', 'masculino', ''),
(162, 'Q183221', 'Antoine Watteau', 'Valenciennes', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Rosalba%20Carriera%20Portrait%20Antoine%20Watteau.jpg'),
(163, 'Q190116', 'Benvenuto Cellini', 'Florencia', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Cellini%20Portrait.jpg'),
(164, 'Q47812', 'Bertel Thorvaldsen', 'Copenhague', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Bertel%20Thorvaldsen%20portrait.jpg'),
(167, 'Q48566', 'William Beechey', 'Burford', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/SirWilliamBeechey%20%28cropped%29.jpg'),
(168, 'Q29231', 'Frans Snyders', 'Amberes', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Frans%20Snyders%20-%20Van%20Dyck%20c.%201620.jpg'),
(169, 'Q175130', 'Alfred Sisley', 'París', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Pierre-Auguste%20Renoir%20110.jpg'),
(173, 'Q5432', 'Francisco de Goya', 'Fuendetodos', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Autorretrato%20con%20gafas%20por%20Francisco%20de%20Goya%20%28Mus%C3%A9e%20Bonnat-Helleu%29.jpg'),
(174, 'Q5681', 'Andrea Mantegna', 'Piazzola sul Brenta', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Andrea%20Mantegna%20049%20detail%20possible%20self-portrait.jpg'),
(175, 'Q5598', 'Rembrandt', 'Leiden', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Rembrant%20Self-Portrait%2C%201660.jpg'),
(176, 'Q170259', 'Léon Bonnat', 'Bayona', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/L%C3%A9on%20Bonnat%20-%20Autoportrait.jpg'),
(177, 'Q164696', 'Hans Baldung', 'Schwäbisch Gmünd', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Hans%20Baldung%2C%20Self-Portrait.jpg'),
(178, 'Q167220', 'Cornelis Cort', 'Hoorn', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Hans%20Speckaert%20-%20Portrait%20of%20Cornelis%20Cort.jpg'),
(179, 'Q153472', 'Joos van Cleve', 'Cléveris', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Joos%20van%20Cleve%20-%20Self-Portrait%20-%20WGA5048.jpg'),
(180, 'Q25200', 'Daniele Crespi', 'Busto Arsizio', 'masculino', 'http://commons.wikimedia.org/wiki/Special:FilePath/Daniele%20Crespi%20001.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(100) NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizar`
--

CREATE TABLE `realizar` (
  `id` int(11) NOT NULL,
  `id_visita` int(100) NOT NULL,
  `id_estudiante` int(100) NOT NULL,
  `id_profesor` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_profesor`
--

CREATE TABLE `visitas_profesor` (
  `id_visita` int(100) NOT NULL,
  `nombre_visita` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_profe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_museo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_pintor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_obra` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comentarios` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `publicado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `visitas_profesor`
--

INSERT INTO `visitas_profesor` (`id_visita`, `nombre_visita`, `codigo_profe`, `codigo_museo`, `codigo_pintor`, `codigo_obra`, `comentarios`, `publicado`) VALUES
(6, 'Visita thysen Milenium', '5', 'Q176251', 'Francisco de Goya', 'El tío Paquete', 'Visitar estas obra de arte en la excursión que se realizara en el dí­a 25/12/19 ', 1),
(8, 'Visita thysen Milenium', '5', 'Q176251', 'El Greco', 'La Anunciación', 'Visitar estas obra de arte en la excursión que se realizara en el dí­a 25/12/19 ', 0),
(9, 'Visita thysen', '5', 'Q176251', 'Francisco de Goya,El Greco', 'El tío Paquete,La Anunciación', 'Visitar estas obra de arte en la excursión que se realizara en el dí­a 25/12/19 ', 1),
(10, 'visita thyssen Guiada', '5', 'Q176251', 'Francisco de Goya,El Greco', 'El tío Paquete,La Anunciación', 'En esta visita se realizará y se centrara en estos cuadros, según su año de procedencia y lugar', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_profesor`
--
ALTER TABLE `actividad_profesor`
  ADD PRIMARY KEY (`id_actividad`);

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
-- Indices de la tabla `hacer_actividad`
--
ALTER TABLE `hacer_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `museos`
--
ALTER TABLE `museos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_museo` (`id_museo`) USING BTREE;

--
-- Indices de la tabla `museo_cn_pintor`
--
ALTER TABLE `museo_cn_pintor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_museo` (`codigo_museo`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indices de la tabla `pintores`
--
ALTER TABLE `pintores`
  ADD PRIMARY KEY (`id_pintor`),
  ADD KEY `codigo_pintor` (`codigo_pintor`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `id` (`id`,`usuario`);

--
-- Indices de la tabla `realizar`
--
ALTER TABLE `realizar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas_profesor`
--
ALTER TABLE `visitas_profesor`
  ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_profesor`
--
ALTER TABLE `actividad_profesor`
  MODIFY `id_actividad` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `hacer_actividad`
--
ALTER TABLE `hacer_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `museos`
--
ALTER TABLE `museos`
  MODIFY `id_museo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `museo_cn_pintor`
--
ALTER TABLE `museo_cn_pintor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1450;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id_obra` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1270;

--
-- AUTO_INCREMENT de la tabla `pintores`
--
ALTER TABLE `pintores`
  MODIFY `id_pintor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `realizar`
--
ALTER TABLE `realizar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitas_profesor`
--
ALTER TABLE `visitas_profesor`
  MODIFY `id_visita` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
