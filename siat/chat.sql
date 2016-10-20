-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2013 a las 15:08:32
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chat`
--
CREATE DATABASE IF NOT EXISTS `chat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosis`
--

CREATE TABLE IF NOT EXISTS `dosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad` int(5) DEFAULT '1',
  `marca` varchar(255) DEFAULT '',
  `lote` varchar(255) DEFAULT '',
  `motivo_de_uso` varchar(2000) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `dosis`
--

INSERT INTO `dosis` (`id`, `fecha`, `cantidad`, `marca`, `lote`, `motivo_de_uso`) VALUES
(1, '2013-10-09 18:11:48', 1, 'Proveduria', '15-A/C7', 'Esta re duro, no puede mas'),
(2, '2013-10-23 18:11:48', 1, 'Proveduria', '15-A/C7', 'Esta re duro, no puede mas'),
(3, '2013-10-09 18:11:48', 1, 'Proveduria', '15-A/C7', 'Esta re duro, no puede mas'),
(4, '2013-10-09 18:11:48', 1, 'Proveduria', '15-A/C7', 'Esta re duro, no puede mas'),
(5, '2013-10-09 18:50:44', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(6, '2013-10-29 18:51:10', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(7, '2013-10-09 18:51:20', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(8, '2013-10-09 18:52:11', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(9, '2013-10-09 18:52:28', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(10, '2013-10-09 21:53:36', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(11, '2013-10-08 19:05:23', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(12, '2013-10-09 19:07:09', 1, 'Chespirito', 'ART-78/G', 'A demanda: '),
(13, '2013-10-05 19:07:20', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(14, '2013-10-09 19:13:05', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(15, '2013-10-09 20:16:40', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(16, '2013-10-09 20:24:26', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(17, '2013-10-09 20:24:28', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(18, '2013-10-09 20:24:29', 1, 'Chespirito', 'ART-78/G', 'Profilaxis'),
(19, '2013-10-10 12:44:48', 1, 'Chespirito', 'ART-78/G', 'Profilaxis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_from` int(11) NOT NULL,
  `involved_a` int(11) NOT NULL,
  `involved_b` int(11) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=359 ;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id_message`, `id_from`, `involved_a`, `involved_b`, `message`, `time`) VALUES
(306, 2, 1, 2, 'asdasd', '0000-00-00 00:00:00'),
(307, 1, 2, 1, '123', '0000-00-00 00:00:00'),
(308, 1, 2, 1, '12312312', '0000-00-00 00:00:00'),
(309, 1, 2, 1, '123123', '0000-00-00 00:00:00'),
(310, 2, 1, 2, 'asdasd', '0000-00-00 00:00:00'),
(311, 2, 1, 2, 'ASasAS', '0000-00-00 00:00:00'),
(312, 2, 1, 2, '|12|12', '0000-00-00 00:00:00'),
(313, 1, 2, 1, 'ASDASD', '0000-00-00 00:00:00'),
(314, 2, 1, 2, '123123', '0000-00-00 00:00:00'),
(315, 1, 2, 1, '12123123', '2013-10-09 15:20:39'),
(316, 2, 1, 2, 'asdasd', '2013-10-09 15:27:47'),
(317, 2, 1, 2, 'asdasd', '2013-10-09 15:27:52'),
(318, 2, 1, 2, '123123', '2013-10-09 15:27:54'),
(319, 1, 2, 1, '', '2013-10-09 15:28:03'),
(320, 1, 2, 1, '', '2013-10-09 15:28:05'),
(321, 1, 2, 1, '', '2013-10-09 15:28:10'),
(322, 1, 2, 1, '', '2013-10-09 15:28:12'),
(323, 1, 2, 1, '', '2013-10-09 15:28:12'),
(324, 1, 2, 1, '', '2013-10-09 15:28:12'),
(325, 1, 2, 1, '', '2013-10-09 15:28:13'),
(326, 1, 2, 1, 'asd', '2013-10-09 15:28:43'),
(327, 1, 2, 1, 'Hola jose!', '2013-10-09 15:32:52'),
(328, 2, 1, 2, 'hola :)', '2013-10-09 15:33:04'),
(329, 1, 2, 1, 'QUe onda?', '2013-10-09 15:35:28'),
(330, 1, 2, 1, 'nada qeu se yo! estoy re loco!', '2013-10-09 15:35:49'),
(331, 1, 2, 1, 'QUe onda?', '2013-10-09 16:23:21'),
(332, 1, 2, 1, 'Todo tranqui?', '2013-10-09 16:23:50'),
(333, 2, 1, 2, 'ahora no vibra', '2013-10-09 16:24:05'),
(334, 1, 2, 1, ' osi', '2013-10-09 16:24:17'),
(335, 1, 2, 1, 'Me parece que ahor ano!', '2013-10-09 16:26:28'),
(336, 1, 2, 1, 'que verga!', '2013-10-09 16:26:43'),
(337, 2, 1, 2, 'por lo menos ahora no!', '2013-10-09 16:26:59'),
(338, 2, 1, 2, 's', '2013-10-09 16:27:04'),
(339, 2, 1, 2, ':)', '2013-10-09 16:27:11'),
(340, 1, 2, 1, 'aaa', '2013-10-09 16:27:17'),
(341, 1, 2, 1, 'HOla!!', '2013-10-09 16:33:45'),
(342, 1, 2, 1, 'jklj', '2013-10-09 16:33:50'),
(343, 1, 2, 1, 'Hola!', '2013-10-09 16:34:00'),
(344, 2, 1, 2, 'gg ghg', '2013-10-09 16:34:06'),
(345, 1, 2, 1, '123123123', '2013-10-09 16:34:32'),
(346, 1, 2, 1, 'asdasd', '2013-10-09 19:00:40'),
(347, 1, 2, 1, 'asdasd', '2013-10-09 19:00:45'),
(348, 2, 1, 2, ' puto', '2013-10-09 19:03:06'),
(349, 2, 1, 2, 'pene', '2013-10-09 19:03:17'),
(350, 1, 2, 1, 'Tu vieja no llego', '2013-10-09 19:03:18'),
(351, 1, 2, 1, 'Hola', '2013-10-10 12:46:10'),
(352, 1, 2, 1, 'XD', '2013-10-10 12:46:23'),
(353, 1, 2, 1, 'asd', '2013-10-10 12:46:26'),
(354, 1, 2, 1, '123', '2013-10-10 12:46:32'),
(355, 2, 1, 2, '3e', '2013-10-10 12:46:44'),
(356, 2, 1, 2, '', '2013-10-10 12:46:45'),
(357, 2, 1, 2, 'tuvdhcxg', '2013-10-10 12:46:46'),
(358, 2, 1, 2, 'mmmmm', '2013-10-10 12:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `isStand` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `pass`, `isStand`) VALUES
(1, 'santi', 'santi', 1),
(2, 'jose', 'jose', 0),
(3, 'Pedro', '124587', 0),
(4, 'Jorge', 'asd123', 0),
(10, 'hola', 'hola', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
