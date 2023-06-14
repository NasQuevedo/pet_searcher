-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2023 a las 05:31:05
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
-- Base de datos: `pet-searcher`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `pet_type_id` int(11) NOT NULL COMMENT 'Identificador del tipo de mascota',
  `name` varchar(255) NOT NULL COMMENT 'Nombre de la raza',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de actulización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla que almacena las razas de mascotas';

--
-- Volcado de datos para la tabla `breeds`
--

INSERT INTO `breeds` (`id`, `pet_type_id`, `name`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Labrador', '2023-06-09', '2023-06-09', 0),
(2, 1, 'Pitbull', '2023-06-09', '2023-06-09', 0),
(3, 2, 'Siamés', '2023-06-09', '2023-06-09', 0),
(4, 2, 'Angora', '2023-06-09', '2023-06-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `found`
--

CREATE TABLE `found` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `user_id` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `name` varchar(255) NOT NULL COMMENT 'Nombre de la mascota encontrada',
  `genre_id` int(11) NOT NULL COMMENT 'Sexo de la mascota',
  `pet_type_id` int(11) NOT NULL COMMENT 'Tipo de mascota',
  `breed_id` int(11) NOT NULL COMMENT 'Raza',
  `pet_color_id` int(11) NOT NULL COMMENT 'Color',
  `pet_eye_color_id` int(11) NOT NULL COMMENT 'Color de ojos',
  `description` varchar(255) NOT NULL COMMENT 'Descripcion adicional',
  `file_url` varchar(255) NOT NULL COMMENT 'Url de la imagen de la mascota',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de atualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(255) NOT NULL COMMENT 'Nombre sexo',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `update_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla donde se almacena el sexo de las mascotas';

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `update_at`, `deleted`) VALUES
(1, 'Macho', '2023-06-11', '2023-06-11', 0),
(2, 'Hembra', '2023-06-11', '2023-06-11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lost`
--

CREATE TABLE `lost` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `user_id` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `name` varchar(255) NOT NULL COMMENT 'Nombre de la mascota',
  `genre_id` int(11) NOT NULL COMMENT 'Identificador del sexo',
  `pet_type_id` int(11) NOT NULL COMMENT 'Identificador del tipo',
  `breed_id` int(11) NOT NULL COMMENT 'Identificador de la raza',
  `pet_color_id` int(11) NOT NULL COMMENT 'Identificador del color',
  `pet_eye_color_id` int(11) NOT NULL COMMENT 'Identificador del color de los ojos',
  `description` varchar(255) NOT NULL COMMENT 'Descripción adicional',
  `file_url` varchar(255) NOT NULL COMMENT 'Url de la imagen de la mascota',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla donde se almacenan las mascotas perdidas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet_color`
--

CREATE TABLE `pet_color` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `pet_type_id` int(11) NOT NULL COMMENT 'Identificador del tipo de mascota',
  `color` varchar(255) NOT NULL COMMENT 'Color',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pet_color`
--

INSERT INTO `pet_color` (`id`, `pet_type_id`, `color`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Amarillo', '2023-06-09', '2023-06-09', 0),
(2, 1, 'Blanco', '2023-06-09', '2023-06-09', 0),
(3, 2, 'Gris', '2023-06-09', '2023-06-09', 0),
(4, 2, 'Negro', '2023-06-09', '2023-06-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet_eye_colors`
--

CREATE TABLE `pet_eye_colors` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `color` varchar(255) NOT NULL COMMENT 'Color de los ojos',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla que almacena el color de los ojos de las mascotas';

--
-- Volcado de datos para la tabla `pet_eye_colors`
--

INSERT INTO `pet_eye_colors` (`id`, `color`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'azul', '2023-06-09', '2023-06-09', 0),
(2, 'cafe', '2023-06-09', '2023-06-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet_types`
--

CREATE TABLE `pet_types` (
  `id` int(11) NOT NULL COMMENT 'Identificador único',
  `name` varchar(255) NOT NULL COMMENT 'Nombre del tipo',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de Actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Define si esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pet_types`
--

INSERT INTO `pet_types` (`id`, `name`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Perro', '2023-06-09', '2023-06-09', 0),
(2, 'Gato', '2023-06-09', '2023-06-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(255) NOT NULL COMMENT 'Nombre del usuario',
  `last_name` varchar(255) NOT NULL COMMENT 'Apellido del usuario',
  `email` varchar(255) NOT NULL COMMENT 'Correo del usuario',
  `password` varchar(255) NOT NULL COMMENT 'Contraseña',
  `user_type_id` int(11) NOT NULL COMMENT 'Identificador tipo de usuario',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL COMMENT 'Fecha de actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Determina si el usuario esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `user_type_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Admin', '', 'petsearcherproject@gmail.com', '0d2a5f9ebc8209902cdbb1f19d787188', 1, '2023-06-08', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `name` varchar(255) NOT NULL COMMENT 'Nombre del tipo de usuario',
  `description` varchar(255) NOT NULL COMMENT 'Descripción',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla para los tipos de usuario';

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Admin', 'Usuario administrador', '2023-06-09'),
(2, 'Usuario', 'Usuario estandar de la aplicación', '2023-06-09'),
(3, 'Profesional', 'Usuario profesional en el area de ayuda emocional para los usuarios', '2023-06-09'),
(4, 'Educador', 'Usuario con perfil de educador en el area de mascotas', '2023-06-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pet_color`
--
ALTER TABLE `pet_color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pet_eye_colors`
--
ALTER TABLE `pet_eye_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pet_types`
--
ALTER TABLE `pet_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `found`
--
ALTER TABLE `found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lost`
--
ALTER TABLE `lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pet_color`
--
ALTER TABLE `pet_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pet_eye_colors`
--
ALTER TABLE `pet_eye_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pet_types`
--
ALTER TABLE `pet_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
