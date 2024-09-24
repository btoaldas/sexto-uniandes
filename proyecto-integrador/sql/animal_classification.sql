-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2024 a las 01:57:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `animal_classification`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(11) NOT NULL,
  `cow_type` varchar(255) NOT NULL,
  `milk_yield` varchar(255) NOT NULL,
  `water_and_medicine` varchar(255) NOT NULL,
  `forage_and_medicine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recommendations`
--

INSERT INTO `recommendations` (`id`, `cow_type`, `milk_yield`, `water_and_medicine`, `forage_and_medicine`) VALUES
(1, 'asturiana', '10 litros de leche', '10 litros de agua mezclada con medicina A', 'afrecho forajero con medicamento B'),
(2, 'fleckvieh', '12 litros de leche', '12 litros de agua mezclada con medicina B', 'afrecho forajero con medicamento C'),
(3, 'menorquina', '8 litros de leche', '8 litros de agua mezclada con medicina C', 'afrecho forajero con medicamento D'),
(4, 'frisona', '15 litros de leche', '15 litros de agua mezclada con medicina D', 'afrecho forajero con medicamento E'),
(5, 'pasiega', '11 litros de leche', '11 litros de agua mezclada con medicina E', 'afrecho forajero con medicamento F'),
(6, 'parda', '9 litros de leche', '9 litros de agua mezclada con medicina F', 'afrecho forajero con medicamento G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `milk_yield` varchar(255) DEFAULT NULL,
  `water_and_medicine` varchar(255) DEFAULT NULL,
  `forage_and_medicine` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `uploads`
--

INSERT INTO `uploads` (`id`, `filename`, `filepath`, `classification`, `created_at`, `milk_yield`, `water_and_medicine`, `forage_and_medicine`) VALUES
(8, 'p7.jpg', 'uploads/p7.jpg', 'parda', '2024-07-16 22:31:54', '9 litros de leche', '9 litros de agua mezclada con medicina F', 'afrecho forajero con medicamento G'),
(9, 'p3.jpg', 'uploads/p3.jpg', 'parda', '2024-07-17 01:02:11', '9 litros de leche', '9 litros de agua mezclada con medicina F', 'afrecho forajero con medicamento G'),
(10, 'felck.png', 'uploads/felck.png', 'fleckvieh', '2024-09-23 18:20:08', '12 litros de leche', '12 litros de agua mezclada con medicina B', 'afrecho forajero con medicamento C'),
(11, 'fr1.jpeg', 'uploads/fr1.jpeg', 'Holstein', '2024-09-23 20:22:37', NULL, NULL, NULL),
(12, 'fr4.jpeg', 'uploads/fr4.jpeg', 'Holstein', '2024-09-23 20:23:07', NULL, NULL, NULL),
(13, 'fr5.jpeg', 'uploads/fr5.jpeg', 'frisona', '2024-09-23 20:23:42', '15 litros de leche', '15 litros de agua mezclada con medicina D', 'afrecho forajero con medicamento E'),
(14, 'fr6.jpeg', 'uploads/fr6.jpeg', 'frisona', '2024-09-23 20:24:24', '15 litros de leche', '15 litros de agua mezclada con medicina D', 'afrecho forajero con medicamento E'),
(15, 'fr2.jpeg', 'uploads/fr2.jpeg', 'frisona', '2024-09-23 20:41:08', '15 litros de leche', '15 litros de agua mezclada con medicina D', 'afrecho forajero con medicamento E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
