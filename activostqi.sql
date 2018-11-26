-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 17:49:09
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
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`id`, `usuario_id`, `categoria_id`, `fecha_entrega`, `fecha_mantenimiento`, `estado_mantenimiento`, `propiedad`, `tipo_de_equipo`, `marca_equipo`, `referencia_equipo`, `serial_equipo`, `mtm_equipo`, `tipo_so`, `licencia`, `vso_equipo`, `nid_sistema_operativo`, `fccid_equipo`, `icid_equipo`, `incluido`, `tipo_office`, `nombre_equipo`, `workgroup_equipo`, `cuenta_admin_equipo`, `lan_mac`, `wifi_mac`, `imei_1`, `imei_2`, `pass_admin`, `fecha_compra`, `proveedor`, `precio`, `imgqr`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2018-11-08', '2018-06-10', 'pendiente', 'TQI', 'Proyector', 'Sony', 'DD55467', '3334456', NULL, NULL, NULL, NULL, NULL, '2212234', '12212', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'Tecnoplaza', 90000, '1543077161.png', '2018-11-24 21:32:41', '2018-11-26 18:33:13', '2018-11-26 18:33:13'),
(2, 1, 2, '2018-11-24', '2018-06-11', 'pendiente', 'TQI', 'Impresora', 'EPSON', 'L555', 'FFDSUY78876', NULL, NULL, NULL, NULL, NULL, '666757', '998786', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-09', 'Tecnoplaza', 700000, '1543077939.png', '2018-11-24 21:45:39', '2018-11-26 18:33:11', '2018-11-26 18:33:11'),
(3, 1, 2, '2018-11-08', '2018-11-08', 'bien', 'TQI', 'Teclado', 'Sony', 'RF9989', '1121233', NULL, NULL, NULL, NULL, NULL, '2212234', '12212', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-14', 'Tecnoplaza', 90000, '1543239233.png', '2018-11-26 18:33:53', '2018-11-26 18:33:53', NULL),
(4, 2, 1, '2018-11-26', '2018-11-26', 'bien', 'TQI', 'Escritorio todo en uno', 'Acer', 'DD55467', '55646778', '1212', 'Windows', 'OEM', '13.1', '7766D-77765-FFT67-FFDG6-33324', NULL, NULL, NULL, 'OEM', 'Celular de lopez', 'VENTAS', 'Estabol', '12:121:12:12:12:!2', '12:21:12:12', NULL, NULL, '11112', '2018-11-19', 'Tecnoplaza', 700000, '1543240397.png', '2018-11-26 18:53:17', '2018-11-26 18:53:17', NULL),
(5, 2, 2, '2018-11-13', '2018-11-13', 'bien', 'TQI', 'Proyector', 'Sony', 'Proyector15', '2223546', NULL, NULL, NULL, NULL, NULL, '666757', '12212', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-07', 'Tecnoplaza', 2000000, '1543246319.png', '2018-11-26 20:31:59', '2018-11-26 20:31:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `deleted_at`) VALUES
(1, 'Computador', NULL),
(2, 'Accesorio', NULL),
(3, 'Teléfono', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_18_0040_categorias', 1),
(4, '2018_11_18_005044_create_activos_table', 1),
(5, '2018_12_08_39_create_reportes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `activo_id` int(10) UNSIGNED NOT NULL,
  `usuario_soporte` int(10) UNSIGNED NOT NULL,
  `tipo_reporte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_reporte` date NOT NULL,
  `atendido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_soporte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_soporte` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `usuario_id`, `activo_id`, `usuario_soporte`, `tipo_reporte`, `descripcion_usuario`, `fecha_reporte`, `atendido`, `descripcion_soporte`, `fecha_soporte`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'PROGRAMAS', 'Se cayó', '2018-11-08', 'SI', 'Listo', '2018-11-24', '2018-11-24 21:33:14', '2018-11-26 18:33:13', '2018-11-26 18:33:13'),
(2, 1, 2, 0, 'OTRO', 'Necesito hojas', '2018-11-24', 'NO', NULL, NULL, '2018-11-24 21:46:57', '2018-11-26 18:33:11', '2018-11-26 18:33:11'),
(3, 1, 3, 1, 'FISICO', 'Sin luz', '2018-11-14', 'SI', 'Listo', '2018-11-26', '2018-11-26 18:34:19', '2018-11-26 21:31:41', NULL),
(4, 2, 5, 1, 'PROGRAMAS', 'No quiere cojer mi pc', '2018-11-14', 'EN PROCESO', 'cambio de discoduro', '2018-11-02', '2018-11-26 20:32:49', '2018-11-26 20:38:45', NULL),
(5, 2, 5, 0, 'OTRO', 'Le cayo awaaaa', '2018-11-26', 'NO', NULL, NULL, '2018-11-26 21:38:21', '2018-11-26 21:38:21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permisos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `permisos`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ADMIN', 'daniel.lopez@tqi.co', NULL, '$2y$10$rxKqO52tVVci1MrjCUMFBOmWuFvYC6oQUMTEzUw7xw8s1aLZbTM2a', 'escritura', NULL, '2018-11-24 21:25:18', '2018-11-24 21:25:18', NULL),
(2, 'Felipe López', 'dflopez620@misena.edu.co', NULL, '$2y$10$STatywsxGWaVcK707dr6beDT01xCm4IIv1WJLkLlIM3ixjdmjXGp2', 'lectura', NULL, '2018-11-26 18:50:58', '2018-11-26 18:50:58', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activos_usuario_id_foreign` (`usuario_id`),
  ADD KEY `activos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reportes_usuario_id_foreign` (`usuario_id`),
  ADD KEY `reportes_activo_id_foreign` (`activo_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `activos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `activos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_activo_id_foreign` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id`),
  ADD CONSTRAINT `reportes_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
