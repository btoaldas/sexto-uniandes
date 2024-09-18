-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 11:58:41
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `autor_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`autor_id`, `nombre`, `apellido`, `fecha_nacimiento`, `nacionalidad`) VALUES
(1, 'Carlitos', 'Perez', '1980-05-12', 'Ecuador'),
(2, 'Juan', 'Lopez', '1975-03-25', 'Colombia'),
(3, 'Maria', 'Gomez', '1982-07-15', 'Peru'),
(4, 'Luis', 'Martinez', '1990-01-30', 'Argentina'),
(5, 'Ana', 'Rodriguez', '1995-06-18', 'Mexico'),
(6, 'Jorge', 'Garcia', '1978-02-14', 'Ecuador'),
(7, 'Laura', 'Mendez', '1985-09-20', 'Chile'),
(8, 'Roberto', 'Ramirez', '1983-12-05', 'Bolivia'),
(9, 'Paula', 'Hernandez', '1992-11-11', 'Venezuela'),
(10, 'Ricardo', 'Diaz', '1988-04-22', 'Paraguay'),
(11, 'Sofia', 'Ortiz', '1990-08-19', 'Ecuador'),
(12, 'Daniel', 'Castro', '1976-03-12', 'Colombia'),
(13, 'Lucia', 'Ramos', '1987-05-30', 'Uruguay'),
(14, 'Carlos', 'Ruiz', '1979-07-07', 'Panama'),
(15, 'Monica', 'Fernandez', '1981-10-08', 'Peru'),
(16, 'Andres', 'Sanchez', '1989-02-25', 'Bolivia'),
(17, 'Carla', 'Mora', '1993-06-06', 'Mexico'),
(18, 'Fernando', 'Cruz', '1984-09-09', 'Chile'),
(19, 'Gabriela', 'Santos', '1991-12-12', 'Argentina'),
(20, 'Jose Luis', 'Paredes', '1977-01-01', 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `libro_id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `isbn` varchar(13) DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libro_id`, `titulo`, `genero`, `fecha_publicacion`, `isbn`, `autor_id`) VALUES
(1, 'El misterio de los Andes', 'Ficcion', '2021-02-10', '9781234567101', 1),
(2, 'Viaje al Ecuador profundo', 'Historia', '2020-07-15', '9781234567102', 1),
(3, 'La magia del Caribe', 'Aventura', '2021-08-20', '9781234567103', 2),
(4, 'Ciencia para todos', 'Ciencia', '2019-11-02', '9781234567104', 3),
(5, 'Historia de la humanidad', 'Historia', '2021-05-11', '9781234567105', 3),
(6, 'El universo en tus manos', 'Astronomia', '2022-03-18', '9781234567106', 4),
(7, 'Cocina mexicana para principiantes', 'Cocina', '2019-05-07', '9781234567107', 5),
(8, 'Arte culinario', 'Cocina', '2021-09-22', '9781234567108', 5),
(9, 'El secreto de la productividad', 'Autoayuda', '2020-10-14', '9781234567109', 6),
(10, 'JavaScript desde cero', 'Tecnologia', '2020-09-05', '9781234567110', 7),
(11, 'Guia avanzada de JavaScript', 'Tecnologia', '2021-11-11', '9781234567111', 7),
(12, 'Filosofia moderna', 'Filosofia', '2021-03-21', '9781234567112', 8),
(13, 'Las estrellas de la galaxia', 'Astronomia', '2020-12-17', '9781234567113', 9),
(14, 'Misterios del universo', 'Ciencia', '2021-08-25', '9781234567114', 9),
(15, 'Economia global', 'Economia', '2022-01-05', '9781234567115', 10),
(16, 'Estrategia empresarial', 'Negocios', '2021-04-09', '9781234567116', 11),
(17, 'Marketing digital', 'Negocios', '2020-06-16', '9781234567117', 12),
(18, 'Gestion de proyectos', 'Negocios', '2021-07-18', '9781234567118', 12),
(19, 'Psicologia infantil', 'Psicologia', '2020-02-18', '9781234567119', 13),
(20, 'Arte renacentista', 'Arte', '2021-12-25', '9781234567120', 14),
(21, 'Guia de viajes por America Latina', 'Viajes', '2021-11-19', '9781234567121', 15),
(22, 'Los secretos del exito', 'Autoayuda', '2020-03-14', '9781234567122', 16),
(23, 'Ciencia para jovenes', 'Ciencia', '2022-09-12', '9781234567123', 17),
(24, 'Fotografia para profesionales', 'Arte', '2021-04-15', '9781234567124', 18),
(25, 'Fotografia avanzada', 'Arte', '2019-09-21', '9781234567125', 18),
(26, 'Politica y economia global', 'Politica', '2021-06-05', '9781234567126', 19),
(27, 'Programacion en Python', 'Tecnologia', '2020-07-20', '9781234567127', 20),
(28, 'Matematicas avanzadas', 'Educacion', '2018-02-28', '9781234567128', 20),
(29, 'Filosofia en el siglo XXI', 'Filosofia', '2021-03-15', '9781234567129', 20),
(30, 'Los desafios del siglo XXI', 'Filosofia', '2020-09-15', '9781234567130', 1),
(31, 'Historia latinoamericana', 'Historia', '2021-05-10', '9781234567131', 2),
(32, 'Negocios en la era digital', 'Negocios', '2020-02-20', '9781234567132', 5),
(33, 'Viajes por el mundo', 'Viajes', '2021-06-22', '9781234567133', 6),
(35, 'Astronomia para principiantes', 'Astronomia', '2021-10-05', '9781234567135', 10),
(36, 'Libro de Cocina', 'Casual', '2024-09-26', '125631231231', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libro_id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `autor_id` (`autor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`autor_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
