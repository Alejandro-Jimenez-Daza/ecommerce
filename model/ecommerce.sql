-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-03-2026 a las 18:52:05
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
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `mp_payment_id` varchar(100) DEFAULT NULL,
  `mp_preference_id` varchar(100) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `external_ref` varchar(100) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_detalle`
--

CREATE TABLE `orden_detalle` (
  `id` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `imagen` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio`, `stock`, `imagen`, `fecha_creacion`) VALUES
(1, 'Saco boxeo everlast', '120 cms, incluye guantes soporte, ganchos y guantes everlast negros', 1000.00, 1, '2026-02-26.15:48_P00003420-ELITE-N.jpg', '2026-02-24 17:57:09'),
(2, 'fuente de poder', '1000w reales, 80 plus platinum', 100000.00, 10, 'psu.webp', '2026-02-24 18:09:45'),
(18, 'gabinete ITX', 'Mini itx con agarre y usb 3.2', 100000.00, 12, '712tac7wAZL._AC_SL1500_.jpg', '2026-02-26 05:33:19'),
(23, 'guantes de boxeo', '14 oz color negro resistentes', 70000.00, 23, '2026-03-04.22:37_D_NQ_NP_2X_816698-MLA92022491814_092025-F.webp', '2026-02-26 06:34:48'),
(25, 'teclado mecanico B', '60% red switches, no es hot swap, usb c', 140000.00, 12, '2026-02-26.01:45-11_790f39dd-5428-451d-b070-25b160dad610.webp', '2026-02-26 06:45:22'),
(26, 'RAM 4gb SoDIMM', '3200 MHZ, para laptop', 70000.00, 23, '2026-02-26.02:18-D_721916-MLA101183427489_122025-C.jpg', '2026-02-26 07:18:32'),
(27, 'RAM CRUCIAL ALTA CALIDAD', 'SODIMM PARA LAPTOP, 16GB 1 MODULO', 120000.00, 43, '2026-02-26.02:18-Crucial-CT32G48C40S5_1.webp', '2026-02-26 07:18:56'),
(33, 'calcomanias developer', 'php, git, vim, jenkins, ruby, JS, etc', 7000.00, 67, '2026-03-04.22:37_StickersFullstackDeveloper.webp', '2026-02-27 09:12:45'),
(34, 'Altavoces BOSE', 'BOSE industriales para conciertos x par', 1000000.00, 3, '2026-03-02.17:16_cq5dam.web.320.320.png', '2026-02-27 09:20:56'),
(35, 'adaptador memoria ram sodimm', 'adaptador de memorias laptop a memorias ram de escritorio DIM', 80000.00, 23, '2026-03-01.15:26_DDR5-SO-DIMM-adaptador-PC.jpg', '2026-02-27 23:13:03'),
(36, 'gabinete pecera', 'ATX, full rgv 210cm x 250cm color blanco', 300000.00, 60, '2026-03-01.15:19-maxresdefault.jpg', '2026-03-01 20:19:15'),
(37, 'Mouse ergonomico zelotes', 'Usb, 5 botones, color rgb, adaptador para muneca de goma', 60000.00, 410, '2026-03-02.17:00_Screenshot 2026-03-02 at 17-00-24 Mouse Vertical Bluetooth Inalambrico Zelotes F35b Recargable Color Negro Cuotas sin interés.png', '2026-03-01 20:19:53'),
(38, 'Combo xeon', 'x99, color rojo, tpm 2.0, ddr4, 16 gb ram 3200Mhz', 500000.00, 45, '2026-03-02.16:58_Screenshot 2026-03-02 at 16-58-09 QIYIDA X99 motherboard D4 TPM2.0 LGA 2011 3 with M.2 slot Support X99 C612chip DDR4 Memory SATA3.0 USB3.0 PCI16X - AliExpress.png', '2026-03-01 20:23:40'),
(39, 'combo xeon doble procesador de servidor', '2 cpus xeon 2680v4, hiperthreading, poco uso de cpus, tpm 2.0, 4 slots de ram ddr3, maximo 128gb, 2 espacios para ssd nvme, rendimiento sin limite.', 600000.00, 124, '2026-03-03.18:26_Sb64ccf51f4894e5b98419c2cf08415f50.jpg_640x640q75.jpg_.avif', '2026-03-01 20:26:00'),
(40, 'Procesador xeon serie v5', 'Procesador de 4.8 Ghz, hiperthreading, 14 nucleos, 28 hilos, compatible con la gran mayoria de placas para maximo poder y rendimiento a bajo costo', 45000.00, 433, '2026-03-02.16:54-Screenshot 2026-03-02 at 16-43-19 Intel Xeon E5 2666 V3 Used E5-2666V3 2.9 GHz CPU processor Ten-Core Twenty-Thread 25M 135W LGA 2011-3 - AliExpress 7.png', '2026-03-02 21:54:36'),
(41, 'Mando GameSir 4 Nova', 'color negro, completamente nuevo, joysticks magneticos antidrift, larga duracicon, bluetooth y usb inhalambrico', 100000.00, 50, '2026-03-11.14:06_sg-11134201-7rce9-lt0l5kfwqdmn9b.jpg', '2026-03-05 21:37:43'),
(46, 'Xiaomi 14t', '5000 miliamperios, 90 megapixeles camara trasera, 30 megapixeles camara frontal, 8gb ram, 512 gb ROM', 700000.00, 32, '2026-03-11.15:56-D_NQ_NP_2X_666851-MLA99472607186_112025-T.webp', '2026-03-11 20:56:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `rol` varchar(5) DEFAULT 'user',
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(200) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` enum('M','F','Otro') NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `rol`, `correo`, `contrasena`, `fecha_nacimiento`, `sexo`, `creado_en`, `activo`) VALUES
(9, 'admin', 'admin', 'user', 'admin@gmail.com', '$2y$10$C76Yy0u9SZtSh7mhTkxKSugNlqnKd0r4fHitVohvkwGSU3UxIshaW', '2026-03-14', 'M', '2026-03-14 17:45:14', 1),
(10, 'user', 'user', 'user', 'user@gmail.com', '$2y$10$9Kue9fOsjNgVpIXLtBp0wOQsImfkv93jx1chKncU.D7Bw7d9MEkBS', '2026-03-14', 'M', '2026-03-14 17:46:38', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD CONSTRAINT `orden_detalle_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id`),
  ADD CONSTRAINT `orden_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
