-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 15:16:04
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `activostqi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `estado_mantenimiento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propiedad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_de_equipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_equipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia_equipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_equipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtm_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_so` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licencia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vso_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_sistema_operativo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fccid_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icid_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incluido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workgroup_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_admin_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lan_mac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wifi_mac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imei_1` int(11) DEFAULT NULL,
  `imei_2` int(11) DEFAULT NULL,
  `pass_admin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `proveedor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `imgqr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_activos_users` (`usuario_id`),
  ADD KEY `FK_activos_categorias` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `FK_activos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `FK_activos_users` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
