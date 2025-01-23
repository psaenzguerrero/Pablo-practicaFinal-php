-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2025 a las 20:06:51
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
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id_amigo`, `id_usuario`, `nombre`, `apellidos`, `fecha_nacimiento`) VALUES
(1, 5, 'Juan', 'Pérez García', '1990-05-15'),
(2, 5, 'María', 'López Sánchez', '1985-07-22'),
(3, 4, 'Carlos', 'Hernández Ruiz', '1992-11-03'),
(4, 4, 'Laura', 'Martínez Gómez', '1988-02-19'),
(5, 4, 'Ana', 'García Torres', '1995-08-12'),
(6, 3, 'Juande', 'dios', '2024-02-02'),
(7, 3, 'Pedro', 'Ramírez López', '1988-03-15'),
(8, 3, 'Sofía', 'Gómez Márquez', '1990-06-20'),
(9, 3, 'Luis', 'Torres Fernández', '1992-11-14'),
(10, 4, 'Elena', 'Martínez Pérez', '1985-09-12'),
(11, 3, 'Clara', 'Sánchez Ruiz', '1993-01-10'),
(12, 4, 'Miguel', 'Álvarez Domínguez', '1987-07-05'),
(13, 5, 'Teresa', 'López Morales', '1991-02-28'),
(14, 5, 'Andrés', 'Hernández Ortega', '1994-08-17'),
(15, 3, 'Paula', 'Vargas Prieto', '1989-10-22'),
(16, 4, 'Javier', 'Castro López', '1995-04-18'),
(17, 5, 'Andreo', 'pelon', '2018-03-14'),
(18, 3, 'p4', 'pelon', '2025-01-01');

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
(2, 5, 'God of War', 'PlayStation 4', '2018', 'god_of_war.jpg'),
(3, 3, 'Halo Infinite', 'Xbox Series X', '2021', 'halo_infinite.jpg'),
(4, 4, 'Elden Ring', 'PlayStation 5', '2022', 'elden_ring.jpg'),
(5, 4, 'Cyberpunk 2077', 'PC', '2020', 'cyberpunk_2077.jpg'),
(6, 5, 'Animal Crossing: New Horizons', 'Nintendo Switch', '2020', 'animal_crossing.jpg'),
(7, 3, 'Red Dead Redemption 2', 'PC', '2018', 'rdr2.jpg'),
(8, 3, 'Minecraft', 'PC', '2011', 'minecraft.jpg'),
(9, 3, 'The Last of Us Part II', 'PlayStation 4', '2020', 'tlou2.jpg'),
(10, 4, 'Super Mario Odyssey', 'Nintendo Switch', '2017', 'mario_odyssey.jpg'),
(11, 5, 'GTA V', 'PC', '2013', 'gta_v.jpg'),
(12, 3, 'Hades', 'PC', '2020', 'hades.jpg'),
(13, 4, 'Fortnite', 'PC', '2017', 'fortnite.jpg'),
(14, 3, 'Apex Legends', 'PC', '2019', 'apex_legends.jpg'),
(15, 4, 'Call of Duty: Modern Warfare II', 'PlayStation 5', '2022', 'cod_mw2.jpg'),
(16, 5, 'Among Us', 'PC', '2018', 'among_us.jpg'),
(17, 5, 'Stardew Valley', 'PC', '2016', 'stardew_valley.jpg'),
(18, 5, 'The Witcher 3: Wild Hunt', 'PC', '2015', 'witcher3.jpg'),
(19, 3, 'Sekiro: Shadows Die Twice', 'PC', '2019', 'sekiro.jpg'),
(20, 4, 'FIFA 23', 'PlayStation 5', '2022', 'fifa23.jpg'),
(21, 5, 'coockie clicker', 'PC', '2003', 'coockie.jpg');

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
  `devuelto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_usuario`, `id_amigo`, `id_juego`, `fecha_prestamo`, `devuelto`) VALUES
(1, 5, 1, 3, '2023-10-15', 0),
(2, 4, 4, 2, '2023-11-20', 0),
(3, 3, 9, 5, '2023-09-10', 1),
(4, 4, 12, 8, '2023-07-01', 0),
(5, 4, 10, 6, '2023-12-05', 0),
(6, 3, 8, 4, '2024-01-01', 0),
(7, 3, 7, 2, '2023-06-12', 1),
(8, 4, 5, 7, '2023-08-21', 0),
(9, 5, 13, 1, '2023-05-10', 1),
(10, 3, 18, 9, '2024-01-20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
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
(5, 'carlitos', '12345', 'usuario');

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
  MODIFY `id_amigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id_juego` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
