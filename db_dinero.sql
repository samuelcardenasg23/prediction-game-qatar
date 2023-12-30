-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2022 a las 22:25:54
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_dinero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `team_a` varchar(50) NOT NULL,
  `team_b` varchar(50) NOT NULL,
  `goals_a` int(11) DEFAULT NULL,
  `goals_b` int(11) DEFAULT NULL,
  `winner` varchar(50) DEFAULT NULL,
  `stage` int(11) NOT NULL,
  `pot` varchar(50) NOT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matches`
--

INSERT INTO `matches` (`id`, `team_a`, `team_b`, `goals_a`, `goals_b`, `winner`, `stage`, `pot`, `date`) VALUES
(52, 'Qatar', 'Ecuador', NULL, NULL, NULL, 1, 'a', '20 Noviembre 11:00 AM EST'),
(53, 'Inglaterra', 'Iran', NULL, NULL, NULL, 1, 'b', '21 Noviembre 08:00 AM EST'),
(54, 'Senegal', 'Paises bajos', NULL, NULL, NULL, 1, 'a', '21 Noviembre 11:00 AM EST'),
(55, 'USA', 'Gales', NULL, NULL, NULL, 1, 'b', '21 Noviembre 02:00 PM EST'),
(56, 'Argentina', 'Arabia Saudita', NULL, NULL, NULL, 1, 'c', '22 Noviembre 05:00 AM EST'),
(57, 'Dinamarca', 'Tunez', NULL, NULL, NULL, 1, 'd', '22 Noviembre 08:00 AM EST'),
(59, 'Mexico', 'Polonia', NULL, NULL, NULL, 1, 'c', '22 Noviembre 11:00 AM EST'),
(60, 'Francia', 'Australia', NULL, NULL, NULL, 1, 'd', '22 Noviembre 02:00 PM EST'),
(61, 'Marruecos', 'Croacia', NULL, NULL, NULL, 1, 'f', '23 Noviembre 05:00 AM EST'),
(62, 'Alemania', 'Japon', NULL, NULL, NULL, 1, 'e', '23 Noviembre 08:00 AM EST'),
(63, 'Espana', 'Costa Rica', NULL, NULL, NULL, 1, 'e', '23 Noviembre 11:00 AM EST'),
(64, 'Belgica', 'Canada', NULL, NULL, NULL, 1, 'f', '23 Noviembre 02:00 PM EST'),
(65, 'Suiza', 'Camerun', NULL, NULL, NULL, 1, 'g', '24 Noviembre 05:00 AM EST'),
(66, 'Uruguay', 'Korea del sur', NULL, NULL, NULL, 1, 'h', '24 Noviembre 08:00 AM EST'),
(67, 'Portugal', 'Ghana', NULL, NULL, NULL, 1, 'h', '24 Noviembre 11:00 AM EST'),
(68, 'Brazil', 'Serbia', NULL, NULL, NULL, 1, 'g', '24 Noviembre 02:00 PM EST'),
(69, 'Gales', 'Iran', NULL, NULL, NULL, 1, 'b', '25 Noviembre 05:00 AM EST'),
(70, 'Qatar', 'Senegal', NULL, NULL, NULL, 1, 'a', '25 Noviembre 08:00 AM EST'),
(71, 'Paises bajos', 'Ecuador', NULL, NULL, NULL, 1, 'a', '25 Noviembre 11:00 AM EST'),
(72, 'Inglaterra', 'USA', NULL, NULL, NULL, 1, 'b', '25 Noviembre 02:00 PM EST'),
(73, 'Tunez', 'Australia', NULL, NULL, NULL, 1, 'd', '26 Noviembre 05:00 AM EST'),
(74, 'Polonia', 'Arabia Saudita', NULL, NULL, NULL, 1, 'c', '26 Noviembre 08:00 AM EST'),
(75, 'Francia', 'Dinamarca', NULL, NULL, NULL, 1, 'd', '26 Noviembre 11:00 AM EST'),
(76, 'Argentina', 'Mexico', NULL, NULL, NULL, 1, 'c', '26 Noviembre 02:00 PM EST'),
(77, 'Japon', 'Costa Rica', NULL, NULL, NULL, 1, 'e', '27 Noviembre 05:00 AM EST'),
(78, 'Belgica', 'Marruecos', NULL, NULL, NULL, 1, 'f', '27 Noviembre 08:00 AM EST'),
(79, 'Croacia', 'Canada', NULL, NULL, NULL, 1, 'f', '27 Noviembre 11:00 AM EST'),
(80, 'Espana', 'Alemania', NULL, NULL, NULL, 1, 'e', '27 Noviembre 02:00 PM EST'),
(81, 'Camerun', 'Serbia', NULL, NULL, NULL, 1, 'g', '28 Noviembre 05:00 AM EST'),
(82, 'Korea del sur', 'Ghana', NULL, NULL, NULL, 1, 'h', '28 Noviembre 08:00 AM EST'),
(83, 'Brazil', 'Suiza', NULL, NULL, NULL, 1, 'g', '28 Noviembre 11:00 AM EST'),
(84, 'Portugal', 'Uruguay', NULL, NULL, NULL, 1, 'h', '28 Noviembre 02:00 PM EST'),
(85, 'Ecuador', 'Senegal', NULL, NULL, NULL, 1, 'a', '29 Noviembre 10:00 AM EST'),
(86, 'Paises bajos', 'Qatar', NULL, NULL, NULL, 1, 'a', '29 Noviembre 10:00 AM EST'),
(87, 'Iran', 'USA', NULL, NULL, NULL, 1, 'b', '29 Noviembre 02:00 PM EST'),
(88, 'Gales', 'Inglaterra', NULL, NULL, NULL, 1, 'b', '29 Noviembre 02:00 PM EST'),
(89, 'Tunez', 'Francia', NULL, NULL, NULL, 1, 'd', '30 Noviembre 10:00 AM EST'),
(90, 'Australia', 'Dinamarca', NULL, NULL, NULL, 1, 'd', '30 Noviembre 10:00 AM EST'),
(91, 'Polonia', 'Argentina', NULL, NULL, NULL, 1, 'c', '30 Noviembre 02:00 PM EST'),
(92, 'Arabia Saudita', 'Mexico', NULL, NULL, NULL, 1, 'c', '30 Noviembre 02:00 PM EST'),
(93, 'Croacia', 'Belgica', NULL, NULL, NULL, 1, 'f', '1 Diciembre 10:00 AM EST'),
(94, 'Canada', 'Marruecos', NULL, NULL, NULL, 1, 'f', '1 Diciembre 10:00 AM EST'),
(95, 'Japon', 'Espana', NULL, NULL, NULL, 1, 'e', '1 Diciembre 02:00 PM EST'),
(96, 'Costa Rica', 'Alemania', NULL, NULL, NULL, 1, 'e', '1 Diciembre 02:00 PM EST'),
(97, 'Korea del sur', 'Portugal', NULL, NULL, NULL, 1, 'h', '2 Diciembre 10:00 AM EST'),
(98, 'Ghana', 'Uruguay', NULL, NULL, NULL, 1, 'h', '2 Diciembre 10:00 AM EST'),
(99, 'Serbia', 'Suiza', NULL, NULL, NULL, 1, 'g', '2 Diciembre 02:00 PM EST'),
(100, 'Camerun', 'Brazil', NULL, NULL, NULL, 1, 'g', '2 Diciembre 02:00 PM EST'),
(102, '1A', '2B', NULL, NULL, NULL, 1, 'x', '3 Diciembre 10:00 AM EST'),
(103, '1C', '2D', NULL, NULL, NULL, 1, 'x', '3 Diciembre 02:00 PM EST'),
(104, '1D', '2C', NULL, NULL, NULL, 1, 'x', '4 Diciembre 10:00 AM EST'),
(105, '1B', '2A', NULL, NULL, NULL, 1, 'x', '4 Diciembre 02:00 PM EST'),
(106, '1E', '2F', NULL, NULL, NULL, 1, 'x', '5 Diciembre 10:00 AM EST'),
(107, '1G', '2H', NULL, NULL, NULL, 1, 'x', '5 Diciembre 02:00 PM EST'),
(108, '1F', '2E', NULL, NULL, NULL, 1, 'x', '6 Diciembre 10:00 AM EST'),
(109, '1H', '2G', NULL, NULL, NULL, 1, 'x', '6 Diciembre 02:00 PM EST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qualifiers_reales`
--

CREATE TABLE `qualifiers_reales` (
  `id` int(11) NOT NULL,
  `pot` varchar(50) NOT NULL,
  `first` varchar(50) NOT NULL,
  `second` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `qualifiers_reales`
--

INSERT INTO `qualifiers_reales` (`id`, `pot`, `first`, `second`) VALUES
(2, 'a', 'Paises bajos', 'Paises bajos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `real_result`
--

CREATE TABLE `real_result` (
  `id` int(11) NOT NULL,
  `team_a` varchar(50) NOT NULL,
  `team_b` varchar(50) NOT NULL,
  `goals_a` int(11) DEFAULT NULL,
  `goals_b` int(11) DEFAULT NULL,
  `winner` varchar(50) DEFAULT NULL,
  `stage` int(11) NOT NULL,
  `pot` varchar(50) NOT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `real_result`
--

INSERT INTO `real_result` (`id`, `team_a`, `team_b`, `goals_a`, `goals_b`, `winner`, `stage`, `pot`, `date`) VALUES
(52, 'Qatar', 'Ecuador', 0, 2, 'Ecuador', 1, 'a', '20 Noviembre 11:00 AM EST'),
(53, 'Inglaterra', 'Iran', 6, 2, 'Inglaterra', 1, 'b', '21 Noviembre 08:00 AM EST'),
(54, 'Senegal', 'Paises bajos', 0, 2, 'Paises bajos', 1, 'a', '21 Noviembre 11:00 AM EST'),
(55, 'USA', 'Gales', 1, 1, 'Empate', 1, 'b', '21 Noviembre 02:00 PM EST'),
(56, 'Argentina', 'Arabia Saudita', 1, 2, 'Arabia Saudita', 1, 'c', '22 Noviembre 05:00 AM EST'),
(57, 'Dinamarca', 'Tunez', 0, 0, 'Empate', 1, 'd', '22 Noviembre 08:00 AM EST'),
(59, 'Mexico', 'Polonia', NULL, NULL, NULL, 1, 'c', '22 Noviembre 11:00 AM EST'),
(60, 'Francia', 'Australia', NULL, NULL, NULL, 1, 'd', '22 Noviembre 02:00 PM EST'),
(61, 'Marruecos', 'Croacia', NULL, NULL, NULL, 1, 'f', '23 Noviembre 05:00 AM EST'),
(62, 'Alemania', 'Japon', NULL, NULL, NULL, 1, 'e', '23 Noviembre 08:00 AM EST'),
(63, 'Espana', 'Costa Rica', NULL, NULL, NULL, 1, 'e', '23 Noviembre 11:00 AM EST'),
(64, 'Belgica', 'Canada', NULL, NULL, NULL, 1, 'f', '23 Noviembre 02:00 PM EST'),
(65, 'Suiza', 'Camerun', NULL, NULL, NULL, 1, 'g', '24 Noviembre 05:00 AM EST'),
(66, 'Uruguay', 'Korea del sur', NULL, NULL, NULL, 1, 'h', '24 Noviembre 08:00 AM EST'),
(67, 'Portugal', 'Ghana', NULL, NULL, NULL, 1, 'h', '24 Noviembre 11:00 AM EST'),
(68, 'Brazil', 'Serbia', NULL, NULL, NULL, 1, 'g', '24 Noviembre 02:00 PM EST'),
(69, 'Gales', 'Iran', NULL, NULL, NULL, 1, 'b', '25 Noviembre 05:00 AM EST'),
(70, 'Qatar', 'Senegal', NULL, NULL, NULL, 1, 'a', '25 Noviembre 08:00 AM EST'),
(71, 'Paises bajos', 'Ecuador', NULL, NULL, NULL, 1, 'a', '25 Noviembre 11:00 AM EST'),
(72, 'Inglaterra', 'USA', NULL, NULL, NULL, 1, 'b', '25 Noviembre 02:00 PM EST'),
(73, 'Tunez', 'Australia', NULL, NULL, NULL, 1, 'd', '26 Noviembre 05:00 AM EST'),
(74, 'Polonia', 'Arabia Saudita', NULL, NULL, NULL, 1, 'c', '26 Noviembre 08:00 AM EST'),
(75, 'Francia', 'Dinamarca', NULL, NULL, NULL, 1, 'd', '26 Noviembre 11:00 AM EST'),
(76, 'Argentina', 'Mexico', NULL, NULL, NULL, 1, 'c', '26 Noviembre 02:00 PM EST'),
(77, 'Japon', 'Costa Rica', NULL, NULL, NULL, 1, 'e', '27 Noviembre 05:00 AM EST'),
(78, 'Belgica', 'Marruecos', NULL, NULL, NULL, 1, 'f', '27 Noviembre 08:00 AM EST'),
(79, 'Croacia', 'Canada', NULL, NULL, NULL, 1, 'f', '27 Noviembre 11:00 AM EST'),
(80, 'Espana', 'Alemania', NULL, NULL, NULL, 1, 'e', '27 Noviembre 02:00 PM EST'),
(81, 'Camerun', 'Serbia', NULL, NULL, NULL, 1, 'g', '28 Noviembre 05:00 AM EST'),
(82, 'Korea del sur', 'Ghana', NULL, NULL, NULL, 1, 'h', '28 Noviembre 08:00 AM EST'),
(83, 'Brazil', 'Suiza', NULL, NULL, NULL, 1, 'g', '28 Noviembre 11:00 AM EST'),
(84, 'Portugal', 'Uruguay', NULL, NULL, NULL, 1, 'h', '28 Noviembre 02:00 PM EST'),
(85, 'Ecuador', 'Senegal', NULL, NULL, NULL, 1, 'a', '29 Noviembre 10:00 AM EST'),
(86, 'Paises bajos', 'Qatar', NULL, NULL, NULL, 1, 'a', '29 Noviembre 10:00 AM EST'),
(87, 'Iran', 'USA', NULL, NULL, NULL, 1, 'b', '29 Noviembre 02:00 PM EST'),
(88, 'Gales', 'Inglaterra', NULL, NULL, NULL, 1, 'b', '29 Noviembre 02:00 PM EST'),
(89, 'Tunez', 'Francia', NULL, NULL, NULL, 1, 'd', '30 Noviembre 10:00 AM EST'),
(90, 'Australia', 'Dinamarca', NULL, NULL, NULL, 1, 'd', '30 Noviembre 10:00 AM EST'),
(91, 'Polonia', 'Argentina', NULL, NULL, NULL, 1, 'c', '30 Noviembre 02:00 PM EST'),
(92, 'Arabia Saudita', 'Mexico', NULL, NULL, NULL, 1, 'c', '30 Noviembre 02:00 PM EST'),
(93, 'Croacia', 'Belgica', NULL, NULL, NULL, 1, 'f', '1 Diciembre 10:00 AM EST'),
(94, 'Canada', 'Marruecos', NULL, NULL, NULL, 1, 'f', '1 Diciembre 10:00 AM EST'),
(95, 'Japon', 'Espana', NULL, NULL, NULL, 1, 'e', '1 Diciembre 02:00 PM EST'),
(96, 'Costa Rica', 'Alemania', NULL, NULL, NULL, 1, 'e', '1 Diciembre 02:00 PM EST'),
(97, 'Korea del sur', 'Portugal', NULL, NULL, NULL, 1, 'h', '2 Diciembre 10:00 AM EST'),
(98, 'Ghana', 'Uruguay', NULL, NULL, NULL, 1, 'h', '2 Diciembre 10:00 AM EST'),
(99, 'Serbia', 'Suiza', NULL, NULL, NULL, 1, 'g', '2 Diciembre 02:00 PM EST'),
(100, 'Camerun', 'Brazil', NULL, NULL, NULL, 1, 'g', '2 Diciembre 02:00 PM EST'),
(102, '1A', '2B', NULL, NULL, NULL, 1, 'x', '3 Diciembre 10:00 AM EST'),
(103, '1C', '2D', NULL, NULL, NULL, 1, 'x', '3 Diciembre 02:00 PM EST'),
(104, '1D', '2C', NULL, NULL, NULL, 1, 'x', '4 Diciembre 10:00 AM EST'),
(105, '1B', '2A', NULL, NULL, NULL, 1, 'x', '4 Diciembre 02:00 PM EST'),
(106, '1E', '2F', NULL, NULL, NULL, 1, 'x', '5 Diciembre 10:00 AM EST'),
(107, '1G', '2H', NULL, NULL, NULL, 1, 'x', '5 Diciembre 02:00 PM EST'),
(108, '1F', '2E', NULL, NULL, NULL, 1, 'x', '6 Diciembre 10:00 AM EST'),
(109, '1H', '2G', NULL, NULL, NULL, 1, 'x', '6 Diciembre 02:00 PM EST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_last_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `submitted_stage_1_scores` tinyint(4) NOT NULL DEFAULT 0,
  `submitted_stage_2_scores` tinyint(4) NOT NULL DEFAULT 0,
  `ff_employee` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_last_name`, `email`, `password_hash`, `submitted_stage_1_scores`, `submitted_stage_2_scores`, `ff_employee`) VALUES
(35, 'Samuel', 'Cardenas', 'samuel.cardenas1706@mail.com', '$2y$10$rWax.GCWqRkDg4jH4837eOD8DvWqqNbvlE7zh4IyhJf6gRzvFLt3e', 1, 0, 1),
(41, 'partidos', 'id67', 'partidos67@gmail.com', '$2y$10$41ZrQoxCpSPlhvIwjJCuIOOnCUfGwNuElpFNhw5Bp73uriaA83nUC', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_qualifiers`
--

CREATE TABLE `user_qualifiers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pot` varchar(50) NOT NULL,
  `first` varchar(50) NOT NULL,
  `second` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_qualifiers`
--

INSERT INTO `user_qualifiers` (`id`, `user_id`, `pot`, `first`, `second`) VALUES
(78, 41, 'a', 'Paises bajos', 'Senegal'),
(79, 41, 'b', 'Inglaterra', 'USA'),
(80, 41, 'c', 'Argentina', 'Polonia'),
(81, 41, 'd', 'Francia', 'Dinamarca'),
(82, 41, 'e', 'Alemania', 'Espana'),
(83, 41, 'f', 'Belgica', 'Croacia'),
(84, 41, 'g', 'Brazil', 'Suiza'),
(85, 41, 'h', 'Portugal', 'Uruguay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_scores`
--

CREATE TABLE `user_scores` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goals_a` int(11) NOT NULL,
  `goals_b` int(11) NOT NULL,
  `winner` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_scores`
--

INSERT INTO `user_scores` (`id`, `match_id`, `user_id`, `goals_a`, `goals_b`, `winner`, `date`) VALUES
(2521, 52, 41, 0, 0, 'Qatar', '2022-11-22 12:54:27'),
(2522, 53, 41, 0, 0, 'Inglaterra', '2022-11-22 12:54:27'),
(2523, 54, 41, 0, 0, 'Senegal', '2022-11-22 12:54:27'),
(2524, 55, 41, 0, 0, 'USA', '2022-11-22 12:54:27'),
(2525, 56, 41, 2, 0, 'Argentina', '2022-11-22 12:54:27'),
(2526, 57, 41, 1, 0, 'Dinamarca', '2022-11-22 12:54:27'),
(2527, 59, 41, 1, 2, 'Polonia', '2022-11-22 12:54:27'),
(2528, 60, 41, 3, 0, 'Francia', '2022-11-22 12:54:27'),
(2529, 61, 41, 1, 3, 'Croacia', '2022-11-22 12:54:27'),
(2530, 62, 41, 3, 1, 'Alemania', '2022-11-22 12:54:27'),
(2531, 63, 41, 2, 0, 'Espana', '2022-11-22 12:54:27'),
(2532, 64, 41, 2, 0, 'Belgica', '2022-11-22 12:54:27'),
(2533, 65, 41, 1, 1, 'Empate', '2022-11-22 12:54:27'),
(2534, 66, 41, 2, 1, 'Uruguay', '2022-11-22 12:54:27'),
(2535, 67, 41, 2, 0, 'Portugal', '2022-11-22 12:54:27'),
(2536, 68, 41, 3, 0, 'Brazil', '2022-11-22 12:54:27'),
(2537, 69, 41, 2, 0, 'Gales', '2022-11-22 12:54:27'),
(2538, 70, 41, 0, 2, 'Senegal', '2022-11-22 12:54:27'),
(2539, 71, 41, 2, 1, 'Paises bajos', '2022-11-22 12:54:27'),
(2540, 72, 41, 3, 1, 'Inglaterra', '2022-11-22 12:54:27'),
(2541, 73, 41, 2, 1, 'Tunez', '2022-11-22 12:54:27'),
(2542, 74, 41, 2, 0, 'Polonia', '2022-11-22 12:54:27'),
(2543, 75, 41, 2, 1, 'Francia', '2022-11-22 12:54:27'),
(2544, 76, 41, 2, 1, 'Argentina', '2022-11-22 12:54:27'),
(2545, 77, 41, 2, 0, 'Japon', '2022-11-22 12:54:27'),
(2546, 78, 41, 2, 0, 'Belgica', '2022-11-22 12:54:27'),
(2547, 79, 41, 2, 1, 'Croacia', '2022-11-22 12:54:27'),
(2548, 80, 41, 1, 2, 'Alemania', '2022-11-22 12:54:27'),
(2549, 81, 41, 1, 1, 'Empate', '2022-11-22 12:54:27'),
(2550, 82, 41, 0, 1, 'Ghana', '2022-11-22 12:54:27'),
(2551, 83, 41, 2, 1, 'Brazil', '2022-11-22 12:54:27'),
(2552, 84, 41, 2, 1, 'Portugal', '2022-11-22 12:54:27'),
(2553, 85, 41, 1, 2, 'Senegal', '2022-11-22 12:54:27'),
(2554, 86, 41, 3, 0, 'Paises bajos', '2022-11-22 12:54:27'),
(2555, 87, 41, 0, 2, 'USA', '2022-11-22 12:54:27'),
(2556, 88, 41, 1, 3, 'Inglaterra', '2022-11-22 12:54:27'),
(2557, 89, 41, 0, 2, 'Francia', '2022-11-22 12:54:27'),
(2558, 90, 41, 0, 2, 'Dinamarca', '2022-11-22 12:54:27'),
(2559, 91, 41, 0, 1, 'Argentina', '2022-11-22 12:54:27'),
(2560, 92, 41, 1, 2, 'Mexico', '2022-11-22 12:54:27'),
(2561, 93, 41, 0, 2, 'Belgica', '2022-11-22 12:54:27'),
(2562, 94, 41, 2, 1, 'Canada', '2022-11-22 12:54:27'),
(2563, 95, 41, 0, 2, 'Espana', '2022-11-22 12:54:27'),
(2564, 96, 41, 1, 4, 'Alemania', '2022-11-22 12:54:27'),
(2565, 97, 41, 0, 2, 'Portugal', '2022-11-22 12:54:27'),
(2566, 98, 41, 1, 3, 'Uruguay', '2022-11-22 12:54:27'),
(2567, 99, 41, 1, 0, 'Serbia', '2022-11-22 12:54:28'),
(2568, 100, 41, 1, 2, 'Brazil', '2022-11-22 12:54:28'),
(2569, 102, 41, 2, 0, '1A', '2022-11-22 12:54:28'),
(2570, 103, 41, 2, 1, '1C', '2022-11-22 12:54:28'),
(2571, 104, 41, 2, 1, '1D', '2022-11-22 12:54:28'),
(2572, 105, 41, 2, 1, '1B', '2022-11-22 12:54:28'),
(2573, 106, 41, 3, 1, '1E', '2022-11-22 12:54:28'),
(2574, 107, 41, 2, 1, '1G', '2022-11-22 12:54:28'),
(2575, 108, 41, 1, 2, '2E', '2022-11-22 12:54:28'),
(2576, 109, 41, 3, 1, '1H', '2022-11-22 12:54:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `qualifiers_reales`
--
ALTER TABLE `qualifiers_reales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `real_result`
--
ALTER TABLE `real_result`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `user_qualifiers`
--
ALTER TABLE `user_qualifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `qualifiers_reales`
--
ALTER TABLE `qualifiers_reales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `user_qualifiers`
--
ALTER TABLE `user_qualifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2577;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
