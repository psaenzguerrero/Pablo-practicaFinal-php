-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2025 a las 12:52:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_amigo` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `verificado` int(1) NOT NULL,
  `media` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id_amigo`, `id_usuario`, `nombre`, `apellidos`, `fecha_nacimiento`, `verificado`, `media`) VALUES
(1, 5, 'Juan', 'Pérez García', '1990-05-17', 1, 0.00),
(2, 5, 'María', 'López Sánchez', '1985-07-22', 1, 0.00),
(3, 4, 'Carlos', 'Hernández Ruiz', '1992-11-03', 1, 0.00),
(4, 4, 'Laura', 'Martínez Gómez', '1988-02-19', 1, 0.00),
(5, 4, 'Ana', 'García Torres', '1995-08-12', 1, 0.00),
(6, 3, 'Juande', 'dios', '2024-02-02', 1, 0.00),
(7, 3, 'Pedro', 'Ramírez López', '1988-03-15', 1, 0.00),
(8, 3, 'Sofía', 'Gómez Márquez', '1990-06-20', 1, 0.00),
(9, 3, 'Luis', 'Torres Fernández', '1992-11-14', 1, 0.00),
(10, 4, 'Elena', 'Martínez Pérez', '1985-09-12', 1, 0.00),
(11, 3, 'Clara', 'Sánchez Ruiz', '1993-01-10', 1, 0.00),
(12, 4, 'Miguel', 'Álvarez Domínguez', '1987-07-05', 1, 0.00),
(13, 5, 'Teresa', 'López Morales', '1991-02-28', 1, 0.00),
(14, 5, 'Andrés', 'Hernández Ortega', '1994-08-17', 1, 0.00),
(15, 3, 'Paula', 'Vargas Prieto', '1989-10-22', 1, 0.00),
(16, 4, 'Javier', 'Castro López', '1995-04-18', 1, 0.00),
(17, 3, 'Andreo', 'pelon', '2018-03-15', 1, 0.00),
(18, 3, 'p4', 'pelon', '2025-01-01', 1, 0.00),
(19, 5, 'p6789', 'Pérez García', '2025-01-01', 1, 0.00),
(26, 3, 'p6', 'zzzzz', '2024-12-30', 1, 0.00),
(27, 3, 'p7', 'zzzzz', '2024-12-30', 1, 0.00),
(28, 5, 'p7', 'zzzzz', '2024-12-30', 1, 0.00),
(29, 5, 'p678', 'zzzzz66', '2024-12-29', 1, 0.00),
(30, 7, 'Pablo', 'saenz', '2002-11-16', 1, 0.00),
(31, 3, 'p4', 'dios', '2025-02-14', 1, 0.00),
(32, 5, 'Maite', 'Pérez García', '2025-02-27', 0, 0.00),
(33, 5, 'p2', 'pelon', '2025-02-19', 0, 0.00),
(34, 5, 'prsgahisrgal', 'kjdfsugidsl', '2025-02-19', 0, 0.00),
(35, 5, 'p8', 'p8', '2025-02-03', 0, 0.00),
(36, 5, 'p9', 'p9', '2025-02-03', 0, 0.00),
(37, 5, 'p10', 'p10', '2025-02-05', 0, 0.00),
(38, 5, 'p11', 'p11', '2025-02-06', 0, 0.00),
(39, 3, 'p12', 'p12', '2025-02-20', 1, 0.00),
(40, 5, 'p11', 'p11', '2025-02-07', 0, 0.00),
(41, 5, 'p13', 'p13', '2024-12-04', 0, 0.00),
(42, 5, 'p14', 'p14', '2025-01-09', 0, 0.00),
(43, 5, 'p15', 'p15', '2025-01-27', 0, 0.00),
(44, 9, 'Pablo', 'p11', '2025-02-03', 0, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id_juego` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `plataforma` varchar(50) NOT NULL,
  `anio_lanzamiento` year(4) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `id_usuario`, `titulo`, `plataforma`, `anio_lanzamiento`, `foto`) VALUES
(1, 4, 'The Legend of Zelda: Breath of the Wild', 'Nintendo Switch', '2017', 'zelda_breath.jpg'),
(2, 5, 'God of War2', 'PlayStation 4', '2018', 'god_of_war.jpg'),
(3, 3, 'Halo Infinite', 'Xbox Series X', '2021', 'halo_infinite.jpg'),
(4, 4, 'Elden Ring', 'PlayStation 5', '2022', 'elden_ring.jpg'),
(5, 4, 'Cyberpunk 2077', 'PC', '2020', 'cyberpunk_2077.jpg'),
(6, 5, 'Animal Crossing: NH', 'Nintendo Switch', '2020', 'animal_crossing.jpg'),
(7, 3, 'Red Dead Redemption 2', 'PC', '2018', 'rdr2.jpg'),
(8, 3, 'Minecraft', 'PC', '2011', 'minecraft.jpg'),
(9, 3, 'The Last of Us Part II', 'PlayStation 4', '2020', 'tlou2.jpg'),
(10, 4, 'Super Mario Odyssey', 'Nintendo Switch', '2017', 'mario_odyssey.jpg'),
(11, 5, 'GTA V', 'PC', '2013', 'gta_v.jpg'),
(12, 3, 'Hades', 'PC', '2020', 'hades.jpg'),
(13, 4, 'Fortnite', 'PC', '2017', 'fortnite.jpg'),
(14, 3, 'Apex Legends', 'PC', '2019', 'apex_legends.jpg'),
(15, 4, 'Call of Duty: Modern Warfare II', 'PlayStation 5', '2022', 'cod_mw2.jpg'),
(16, 5, 'Among Us', 'PlayStation 4', '2018', 'among_us.jpg'),
(17, 5, 'Stardew Valley', 'PC', '2016', 'stardew_valley.jpg'),
(18, 5, 'The Witcher 3: Wild Hunt', 'PC', '2015', 'witcher3.jpg'),
(19, 3, 'Sekiro: Shadows Die Twice', 'PC', '2019', 'sekiro.jpg'),
(20, 4, 'FIFA 23', 'PlayStation 5', '2022', 'fifa23.jpg'),
(21, 5, 'coockie clicker', 'PC', '2003', 'stardew_valley.jpg'),
(22, 3, 'fun', 'PC', '1971', 'coockie.jpg'),
(23, 3, 'j1', 'PC', '2012', 'deco1.png'),
(24, 5, 'fun', 'PC', '2030', 'among_us.jpg'),
(25, 3, 'fun', 'PC', '2012', 'among_us.jpg'),
(26, 3, 'fun', 'PC', '2013', 'cyberpunk_2077.jpg'),
(27, 3, 'fun', 'PlayStation 4', '0000', 'Fortnite.jpg'),
(28, 3, 'fun2', 'PlayStation 4', '2025', 'god_of_war2.jpg'),
(29, 3, 'php', 'PlayStation 45', '2040', NULL),
(30, 5, 'God of War2', 'PlayStation 4', '2016', 'god_of_war2.jpg'),
(31, 5, 'gtaV', 'PC', '2015', 'gta_v.jpg'),
(32, 5, 'the witcher3', 'PC', '2015', 'steam.jpg'),
(33, 9, 'God of War2', 'PC', '2016', 'god_of_war.jpg'),
(34, 5, 'God of War2', 'PC', '2019', 'god_of_war2.jpg'),
(35, 5, 'php', 'PC', '2111', 'tlou2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_amigo` bigint(20) UNSIGNED NOT NULL,
  `id_juego` bigint(20) UNSIGNED NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `devuelto` tinyint(1) NOT NULL DEFAULT 0,
  `puntuacion` float(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_usuario`, `id_amigo`, `id_juego`, `fecha_prestamo`, `devuelto`, `puntuacion`) VALUES
(1, 5, 19, 2, '2025-02-05', 1, 3.50),
(2, 4, 4, 2, '2023-11-20', 0, 0.00),
(3, 3, 9, 5, '2023-09-10', 1, 0.00),
(4, 4, 12, 8, '2023-07-01', 0, 0.00),
(5, 4, 10, 6, '2023-12-05', 0, 0.00),
(6, 3, 8, 3, '2024-01-01', 1, 0.00),
(7, 3, 7, 2, '2023-06-12', 1, 0.00),
(8, 4, 5, 7, '2023-08-21', 0, 0.00),
(9, 5, 13, 16, '2023-05-10', 1, 2.00),
(10, 3, 18, 9, '2024-01-20', 1, 0.00),
(15, 5, 1, 11, '2025-02-01', 1, 4.00),
(16, 5, 13, 17, '2025-02-01', 1, 4.17),
(17, 3, 18, 8, '2025-02-04', 0, 0.00),
(18, 3, 6, 14, '2025-02-05', 0, 0.00),
(19, 5, 1, 24, '2025-02-04', 0, 0.00),
(21, 5, 1, 11, '2025-02-13', 0, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `contrasena` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasena`, `tipo`) VALUES
(1, 'admin1', 'admin1', 'admin'),
(2, 'admin2', 'admin2', 'admin'),
(3, 'user1', 'user1', 'usuario'),
(4, 'user2', 'user2', 'usuario'),
(5, 'carlitos', '12345', 'usuario'),
(6, 'Maite', '12345', 'usuario'),
(7, 'Jaled', 'presi2', 'usuario'),
(8, 'user3', 'user3', 'usuario'),
(9, 'teto', '1234', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_amigo`),
  ADD UNIQUE KEY `id_amigo` (`id_amigo`),
  ADD KEY `amigos_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id_juego`),
  ADD UNIQUE KEY `id_juego` (`id_juego`),
  ADD KEY `juegos_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD UNIQUE KEY `id_prestamo` (`id_prestamo`),
  ADD UNIQUE KEY `id_prestamo_2` (`id_prestamo`),
  ADD KEY `prestamos_ibfk_1` (`id_amigo`),
  ADD KEY `prestamos_ibfk_2` (`id_juego`),
  ADD KEY `prestamos_ibfk_3` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_amigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id_juego` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_amigo`) REFERENCES `amigos` (`id_amigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id_juego`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
