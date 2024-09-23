-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2024 a las 04:01:14
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
-- Base de datos: `mi_base_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `codigo_acceso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `codigo_acceso`) VALUES
(1, '306');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cercado`
--

CREATE TABLE `cercado` (
  `Codigo_barras` varchar(100) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cercado`
--

INSERT INTO `cercado` (`Codigo_barras`, `Producto`, `Precio`, `Existencia`) VALUES
('', 'A', 2.00, 2),
('1', 'LLANTEN', 23.00, 1),
('PROD_66e1c1a13ee003.53509036', 'LECHE', 202.00, 9),
('PROD_66e1ca99f21ec3.47557366', 'GH', 202.00, 9999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordeño`
--

CREATE TABLE `ordeño` (
  `Codigo_barras` varchar(100) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordeño`
--

INSERT INTO `ordeño` (`Codigo_barras`, `Producto`, `Precio`, `Existencia`) VALUES
('1', 'leche', 89.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasturas`
--

CREATE TABLE `pasturas` (
  `Codigo_barras` varchar(100) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasturas`
--

INSERT INTO `pasturas` (`Codigo_barras`, `Producto`, `Precio`, `Existencia`) VALUES
('', '1', 2.00, 0),
('1', 'LLANTEN', 58.00, 9),
('PROD_66e1c1ad7f5055.94471367', 'A', 202.00, 9),
('PROD_66e1c1c567c5f1.87969358', 'GH', 202.00, 9999),
('PROD_66e1c4765ac4c3.98650264', 'A', 303.00, 9999),
('PROD_66e1ccc058b3e3.07399861', 'GH', 202.00, 9999),
('PROD_66e1cccedb5bb3.82220114', '8888', 888.00, 88),
('PROD_66e3216d46ebc8.14615600', '1', 1.00, 1),
('PROD_66e46bf90a8844.91650995', '1', 1.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riego`
--

CREATE TABLE `riego` (
  `Codigo_barras` varchar(100) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `riego`
--

INSERT INTO `riego` (`Codigo_barras`, `Producto`, `Precio`, `Existencia`) VALUES
('1', 'RIEGO', 66.00, 1),
('PROD_66e1ccfdf0cf20.87192944', 'A', 0.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `password`) VALUES
(1, 'Alexis Javier', 'Pazmiño Enriquez', 'alexisjavierpazmino@gmail.com', '0988506606', '$2y$10$fcvJoCbSN.4BSffjUSZTfuWxPNviecSHWXW/036d3yuWXaX6KWCJ.'),
(4, 'Alexis Javier', 'Pazmiño Enriquez', 'alexisjavieno@gmail.com', '0988506606', '$2y$10$ov4KaGdVeE0qA2nZjxW8ce1wQ1BSQkYAB/4rGAmss3OD9UbUP0EyC'),
(5, 'aa', 'aa', 'aa@aa', 'aa', '$2y$10$6MIXPVbOtD6FgcirGtowpeYnokq7e1XbO7e2cdfZ7IA8fwVz5T0lG'),
(7, 'aa', 'aa', 'aaaa@aa', 'aa', '$2y$10$sai0.spYUeiLxb1TMqQZoO/1ozxRgsuA0K3ugzVpDQZm9BOQisDeu'),
(8, 'qq', 'qq', 'qq@aa', '123', '$2y$10$er6YYDovVGQ8bmuvg4BrSORPvqDlBvhkDl6X6U3EfjRQiymSC3IEy'),
(9, 'AAA', 'EE', 'EAE@GM', '1234567898', '$2y$10$5zaEXxcc0yhF3TTD3yTwQuupUlyf/Yk.X/fxQRa21D2e.szPzqcFa'),
(10, 'Estefy ', 'Parra', 'estefypara@gmail.com', '0995506606', '$2y$10$ou3MMWLqDTin3Pj9MVPsceNtokky/HeIO3KSZ9d5w1QkFJ/Rfwqe6'),
(12, 'Alexis Javier', 'Pazmiño Enriquez', 'alexisjavierpazminoo@gmail.com', '0988506606', '$2y$10$u12m42..s5GGa8wNTr5bb.NQH1SgfXk1rXuduIWSNCeiavJjT7dGa'),
(13, 'Alexis Javier', 'Pazmiño Enriquez', 'alexisjavierpazminoaaaa@gmail.com', '0988506606', '$2y$10$PTmuRtPy/7vG1PTAcIQbTeqnCEzhrn1sHmVd79zeLx1EIoDcC/V86'),
(14, 'Alexis Javier', 'Pazmiño Enriquez', 'alexisjavierpazminasasaso@gmail.com', '0988506606', 'Aqwqwqw'),
(15, 'JOEL', '`P', 'alexisjavieASrpazmino@gmail.com', '0988121212', 'A5252525'),
(16, 'Rolando', 'Enriquez', 'Rolando2003@gmail.com', '2525252522', '$2y$10$EOQfHiK9Zp37YSJyH16by..tHbB4GvE1EyE9eqdMgOug5fzh/R.J2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cercado`
--
ALTER TABLE `cercado`
  ADD PRIMARY KEY (`Codigo_barras`);

--
-- Indices de la tabla `ordeño`
--
ALTER TABLE `ordeño`
  ADD PRIMARY KEY (`Codigo_barras`);

--
-- Indices de la tabla `pasturas`
--
ALTER TABLE `pasturas`
  ADD PRIMARY KEY (`Codigo_barras`);

--
-- Indices de la tabla `riego`
--
ALTER TABLE `riego`
  ADD PRIMARY KEY (`Codigo_barras`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
