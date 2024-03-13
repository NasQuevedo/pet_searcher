-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-02-2024 a las 22:54:07
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21913266_pet_searcher`
--

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
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_type_id` int(11) NOT NULL COMMENT 'Identificador tipo de usuario',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación',
  `updated_at` date NOT NULL COMMENT 'Fecha de actualización',
  `deleted` tinyint(1) NOT NULL COMMENT 'Determina si el usuario esta eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `phone`, `address`, `url`, `user_type_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Admin', '', 'petsearcherproject@gmail.com', '0d2a5f9ebc8209902cdbb1f19d787188', '', '', '', 1, '2023-06-08', '0000-00-00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
