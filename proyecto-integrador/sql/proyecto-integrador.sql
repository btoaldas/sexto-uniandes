-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2024 a las 01:57:17
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
-- Base de datos: `proyecto_integrador_6_uniandes`
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
('786123700001', 'Postes de Madera para Cercado', 15.00, 350),
('786123700002', 'Alambre de Púas Galvanizado', 50.00, 200),
('786123700003', 'Cerca Eléctrica Solar', 300.00, 10),
('786123700004', 'Aisladores para Cerca Eléctrica', 8.00, 500),
('786123700005', 'Controlador de Cerca Eléctrica', 150.00, 25),
('786123700006', 'Malla Ganadera Reforzada', 100.00, 50),
('786123700007', 'Puertas Metálicas para Cercado', 250.00, 15),
('786123700008', 'Cemento para Bases de Cercado', 12.00, 150),
('786123700009', 'Grampas para Alambre de Cercado', 0.10, 1000),
('786123700010', 'Herramientas de Tensado de Alambre', 45.00, 40),
('786123700011', 'Poles para Cierre de Pastizales', 30.00, 100),
('786123700012', 'Paneles Solares para Cerca', 450.00, 8),
('786123700013', 'Motor de Cerca Automática', 200.00, 6),
('786123700014', 'Redes de Contención para Ganado', 180.00, 30),
('786123700015', 'Sistema de Doble Alambre para Cercado', 70.00, 20),
('786123700016', 'Hilo Eléctrico para Cercado', 55.00, 400),
('786123700017', 'Poste de Acero Galvanizado', 45.00, 100),
('786123700018', 'Cinta para Cerca Eléctrica', 20.00, 250),
('786123700019', 'Kit de Energizador Solar', 380.00, 15),
('786123700020', 'Electrificador de Cercado 5000V', 220.00, 12),
('786123700021', 'Cerradura para Cercado Metálico', 35.00, 80),
('786123700022', 'Cables para Cerca de Alta Tensión', 120.00, 40),
('786123700023', 'Reparador de Alambre para Cercado', 45.00, 120),
('786123700024', 'Protector de Puertas para Cercado', 55.00, 90),
('786123700025', 'Batería de Cerca Solar', 160.00, 20),
('786123700026', 'Cortador de Alambre Reforzado', 30.00, 150),
('786123700027', 'Puerta Corrediza para Cercado', 420.00, 6);

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
('786123500001', 'Sistema de Ordeño Espina de Pescado', 5000.00, 10),
('786123500002', 'Ordeno Portátil DeLaval', 1200.00, 15),
('786123500003', 'Tanque Enfriador de Leche 1000L', 2500.00, 5),
('786123500004', 'Kit de Limpieza para Ordeño', 45.00, 50),
('786123500005', 'Unidad de Vacio Completa', 3500.00, 8),
('786123500006', 'Cangilón de Ordeño', 35.00, 100),
('786123500007', 'Filtro de Leche para Ordeño', 25.00, 300),
('786123500008', 'Bombas de Vacío para Ordeño', 600.00, 4),
('786123500009', 'Tubo de Pulsación para Ordeño', 40.00, 120),
('786123500010', 'Sistema de Pesado de Leche', 1500.00, 2),
('786123500011', 'Lubricante de Equipos Ordeño', 30.00, 200),
('786123500012', 'Manguera para Ordeño', 20.00, 150),
('786123500013', 'Medidor de Leche Digital', 950.00, 10),
('786123500014', 'Pinzas para Válvulas de Ordeño', 10.00, 500),
('786123500015', 'Sistema de Desinfección de Ordeño', 75.00, 80),
('786123500016', 'Extractor de Leche Mecánico', 1150.00, 7),
('786123500017', 'Válvulas de Corte para Ordeño', 55.00, 85),
('786123500018', 'Sistema de Ordeño Portátil', 1800.00, 4),
('786123500019', 'Cuba de Ordeño 150L', 950.00, 12),
('786123500020', 'Pulsores de Alta Eficiencia', 125.00, 55),
('786123500021', 'Bomba de Leche Inoxidable', 670.00, 10);

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
('786123400001', 'Ryegrass Perenne', 25.00, 100),
('786123400002', 'Alfalfa Certificada', 18.50, 75),
('786123400003', 'Pastura Bermuda', 22.00, 200),
('786123400004', 'Brachiaria Brizantha', 35.00, 50),
('786123400005', 'Cebadilla Tropical', 30.00, 120),
('786123400006', 'Pasto Elefante', 28.00, 0),
('786123400007', 'Pasto Saboya', 32.00, 90),
('786123400008', 'Ryegrass Anual', 27.00, 150),
('786123400009', 'Triticale Forrajero', 24.00, 60),
('786123400010', 'Clavel Pasto', 20.50, 130),
('786123400011', 'Pangola Mejorado', 29.00, 0),
('786123400012', 'Mulato II', 35.50, 80),
('786123400013', 'Pasto Kikuyo', 21.00, 110),
('786123400014', 'Cynodon Dactylon', 22.50, 140),
('786123400015', 'Pasto Toledo', 30.00, 95),
('786123400016', 'Pasto Mombasa', 26.50, 90),
('786123400017', 'Festuca Forrajera', 19.80, 70),
('786123400018', 'Pasto Sudán', 29.90, 0);

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
('786123600001', 'Sistema de Riego por Goteo', 850.00, 25),
('786123600002', 'Aspersores de Alta Presión', 60.00, 150),
('786123600003', 'Válvula de Control Riego', 120.00, 30),
('786123600004', 'Tubería de Riego PE 32mm', 2.50, 500),
('786123600005', 'Temporizador de Riego Digital', 40.00, 90),
('786123600006', 'Bomba de Agua para Riego', 750.00, 5),
('786123600007', 'Conectores de Riego por Goteo', 15.00, 250),
('786123600008', 'Riego Automático Solar', 1200.00, 2),
('786123600009', 'Filtro de Arena para Riego', 200.00, 10),
('786123600010', 'Kit de Mangueras para Riego', 100.00, 60),
('786123600011', 'Controlador de Riego Inteligente', 300.00, 20),
('786123600012', 'Tanque de Agua para Riego 500L', 250.00, 12),
('786123600013', 'Fertilizante Líquido para Riego', 85.00, 70),
('786123600014', 'Pistola de Riego Manual', 35.00, 200),
('786123600015', 'Tubo PVC para Riego', 3.00, 400),
('786123600016', 'Manguera de Riego 50m', 120.00, 45),
('786123600017', 'Sensor de Humedad para Riego', 40.00, 100),
('786123600018', 'Sistema de Microaspersión', 85.00, 60),
('786123600019', 'Filtro de Disco para Riego', 180.00, 20),
('786123600020', 'Aspersor Agrícola de Alto Alcance', 75.00, 150),
('786123600021', 'Kit de Fertirriego', 300.00, 35),
('786123600022', 'Carrete para Riego Automático', 980.00, 5),
('786123600023', 'Estación Meteorológica para Riego', 650.00, 3),
('786123600024', 'Controlador de Riego Bluetooth', 220.00, 18);

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
(16, 'Rolando', 'Enriquez', 'Rolando2003@gmail.com', '2525252522', '$2y$10$EOQfHiK9Zp37YSJyH16by..tHbB4GvE1EyE9eqdMgOug5fzh/R.J2'),
(17, 'Alberto', 'Aldas', 'albertoalex@gmail.com', '0969062676', '$2y$10$p/ylB.bFD0Hn2m6uMVyoqeV585DcrGsz0YV49E8yqnzjAbutSi8Y.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
