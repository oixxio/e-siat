-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2013 a las 02:47:50
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `siat`
--
CREATE DATABASE IF NOT EXISTS `siat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accidente`
--

CREATE TABLE IF NOT EXISTS `accidente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `accidente`
--

INSERT INTO `accidente` (`id`, `id_paciente`, `fecha`) VALUES
(3, 1, '2013-11-19 22:55:59'),
(4, 1, '2013-11-20 00:05:46'),
(5, 1, '2013-11-20 00:17:30'),
(6, 1, '2013-11-20 16:43:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `idAgenda` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `dia` varchar(100) NOT NULL,
  `horaDesde` time NOT NULL,
  `horaHasta` time NOT NULL,
  `lugar` varchar(100) NOT NULL,
  PRIMARY KEY (`idAgenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autotest`
--

CREATE TABLE IF NOT EXISTS `autotest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `pregunta_1` varchar(255) NOT NULL,
  `pregunta_2` varchar(255) NOT NULL,
  `pregunta_3` varchar(255) NOT NULL,
  `pregunta_4` varchar(255) NOT NULL,
  `pregunta_5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `autotest`
--

INSERT INTO `autotest` (`id`, `id_paciente`, `pregunta_1`, `pregunta_2`, `pregunta_3`, `pregunta_4`, `pregunta_5`) VALUES
(13, 1, '332', '3223', '', '', ''),
(14, 1, 'Si', 'No', 'No', 'mas de 10', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledosis`
--

CREATE TABLE IF NOT EXISTS `detalledosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo` varchar(255) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `articulacion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletratamiento`
--

CREATE TABLE IF NOT EXISTS `detalletratamiento` (
  `idTratamiento` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `detalle` varchar(2500) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `intervalo` int(11) NOT NULL,
  PRIMARY KEY (`idTratamiento`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalletratamiento`
--

INSERT INTO `detalletratamiento` (`idTratamiento`, `numero`, `detalle`, `fechaInicio`, `intervalo`) VALUES
(1, 0, 'Tratamiento por hemofilia Tipo B', '2013-10-08 04:31:21', 12),
(6, 0, 'Dosis re locas', '2013-11-21 00:00:00', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosis`
--

CREATE TABLE IF NOT EXISTS `dosis` (
  `idDosis` int(11) NOT NULL AUTO_INCREMENT,
  `idTratamiento` int(11) NOT NULL,
  `fechaHoraPrevisto` datetime NOT NULL,
  `fechaHoraReal` datetime NOT NULL,
  `aplicada` int(11) NOT NULL,
  `droga` varchar(255) NOT NULL,
  `idDetalleDroga` int(11) NOT NULL,
  `cantidad` varchar(10) NOT NULL,
  `tipo` int(11) NOT NULL,
  `activa` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idDosis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=244 ;

--
-- Volcado de datos para la tabla `dosis`
--

INSERT INTO `dosis` (`idDosis`, `idTratamiento`, `fechaHoraPrevisto`, `fechaHoraReal`, `aplicada`, `droga`, `idDetalleDroga`, `cantidad`, `tipo`, `activa`) VALUES
(1, 1, '2013-11-19 13:59:07', '2013-11-19 13:59:07', 0, 'ADDVP', 0, '0.5', 1, 1),
(2, 1, '2013-10-17 17:21:07', '2013-11-18 16:36:27', 1, 'Remixin', 0, '0.2', 1, 1),
(3, 1, '2013-11-13 14:00:07', '2013-11-18 16:36:48', 1, 'ADDVP', 0, '0.7', 1, 1),
(4, 1, '2013-11-02 13:46:47', '2013-11-18 16:36:40', 0, 'ADDVP', 0, '0.1', 1, 1),
(5, 1, '2013-11-13 13:36:47', '2013-11-18 16:36:45', 1, 'QLR-3', 0, '0.5', 1, 1),
(6, 1, '2013-11-13 13:10:47', '2013-11-13 13:10:47', 1, 'QLR-3', 0, '10', 1, 1),
(7, 1, '2013-12-13 16:13:23', '2013-11-11 13:24:28', 0, 'ADDVP', 0, '1.2', 1, 1),
(94, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(95, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(96, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(97, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(98, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(99, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(100, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(101, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(102, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(103, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(104, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(105, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(106, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(107, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(108, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(109, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(110, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(111, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(112, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(113, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(114, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(115, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(116, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(117, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(118, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(119, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(120, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(121, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(122, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(123, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(124, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(125, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(126, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(127, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(128, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(129, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(130, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(131, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(132, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(133, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(134, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(135, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(136, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(137, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(138, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(139, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(140, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(141, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(142, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(143, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(144, 5, '2013-11-22 00:45:11', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(145, 5, '2013-11-22 00:45:11', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(146, 5, '2013-11-22 00:45:11', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(147, 5, '2013-11-22 00:45:11', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(148, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(149, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(150, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(151, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(152, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(153, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(154, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(155, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(156, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(157, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(158, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(159, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(160, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(161, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(162, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(163, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(164, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(165, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(166, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(167, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(168, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(169, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(170, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(171, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(172, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(173, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(174, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(175, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(176, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(177, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(178, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(179, 5, '2013-11-22 00:45:12', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(180, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(181, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(182, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(183, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(184, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(185, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(186, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(187, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(188, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(189, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(190, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(191, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(192, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(193, 5, '2013-11-22 00:45:13', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(194, 6, '2013-11-21 22:46:24', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(195, 6, '2013-11-23 22:46:24', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(196, 6, '2013-11-25 22:46:24', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(197, 6, '2013-11-27 22:46:24', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(198, 6, '2013-11-29 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(199, 6, '2013-12-01 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(200, 6, '2013-12-03 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(201, 6, '2013-12-05 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(202, 6, '2013-12-07 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(203, 6, '2013-12-09 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(204, 6, '2013-12-11 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(205, 6, '2013-12-13 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(206, 6, '2013-12-15 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(207, 6, '2013-12-17 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(208, 6, '2013-12-19 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(209, 6, '2013-12-21 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(210, 6, '2013-12-23 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(211, 6, '2013-12-25 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(212, 6, '2013-12-27 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(213, 6, '2013-12-29 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(214, 6, '2013-12-31 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(215, 6, '2014-01-02 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(216, 6, '2014-01-04 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(217, 6, '2014-01-06 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(218, 6, '2014-01-08 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(219, 6, '2014-01-10 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(220, 6, '2014-01-12 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(221, 6, '2014-01-14 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(222, 6, '2014-01-16 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(223, 6, '2014-01-18 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(224, 6, '2014-01-20 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(225, 6, '2014-01-22 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(226, 6, '2014-01-24 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(227, 6, '2014-01-26 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(228, 6, '2014-01-28 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(229, 6, '2014-01-30 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(230, 6, '2014-02-01 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(231, 6, '2014-02-03 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(232, 6, '2014-02-05 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(233, 6, '2014-02-07 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(234, 6, '2014-02-09 22:46:25', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(235, 6, '2014-02-11 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(236, 6, '2014-02-13 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(237, 6, '2014-02-15 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(238, 6, '2014-02-17 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(239, 6, '2014-02-19 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(240, 6, '2014-02-21 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(241, 6, '2014-02-23 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(242, 6, '2014-02-25 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1),
(243, 6, '2014-02-27 22:46:26', '0000-00-00 00:00:00', 0, 'DDAVP', 0, '1500', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE IF NOT EXISTS `especialista` (
  `idEspecialista` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idAgenda` int(11) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  PRIMARY KEY (`idEspecialista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`idEspecialista`, `idUsuario`, `idAgenda`, `matricula`) VALUES
(1, 2, 1, 'F4525-7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `from`, `to`, `mensaje`) VALUES
(1, 1, 2, 'Hola'),
(2, 2, 1, 'Hola Manola'),
(4, 1, 2, 'asdasdasd'),
(5, 1, 2, 'asdasdasd'),
(6, 1, 2, '123123'),
(7, 1, 2, '55643'),
(8, 1, 2, 'xD'),
(9, 2, 1, 'Para de mandar mensajes'),
(10, 1, 2, ''),
(11, 1, 2, 'xD'),
(12, 1, 2, 'gcght ch jo'),
(13, 1, 2, 'yyyuhxdfhjo'),
(14, 1, 2, 'bbhx'),
(15, 1, 2, 'bsbznbbaHbahajbabajvabahabjabavhajabajjahbahababjajvsj'),
(16, 1, 2, 'asdasd'),
(17, 1, 2, '123123'),
(18, 1, 2, 'asdasdasd'),
(19, 1, 2, 'asdasd'),
(20, 1, 2, 'asda'),
(21, 1, 2, 'sdad'),
(22, 1, 2, 'asdasd'),
(23, 1, 2, 'asdasd'),
(24, 1, 2, 'asdasd'),
(25, 1, 2, 'asdasd'),
(26, 1, 2, '123123'),
(27, 1, 2, 'xD'),
(28, 1, 2, 'santi'),
(29, 1, 2, 'a'),
(30, 1, 2, 'hola\n'),
(31, 1, 2, 'hola'),
(32, 1, 2, 'klhjk'),
(33, 1, 2, 'fgdyg'),
(34, 1, 2, 'trola'),
(35, 1, 2, 'trola vo!'),
(36, 1, 1, 'asdasdasd'),
(37, 1, 1, '123123sadasd'),
(38, 1, 1, '444'),
(39, 1, 1, 'asdasdasd123'),
(40, 2, 1, '123123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` varchar(255) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idEspecialista` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obrasocial`
--

CREATE TABLE IF NOT EXISTS `obrasocial` (
  `idObraSocial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `idEspecialista` int(11) NOT NULL,
  `idObraSocial` int(11) NOT NULL,
  `fechaProxAutotest` datetime NOT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `idUsuario`, `nombre`, `apellido`, `documento`, `idEspecialista`, `idObraSocial`, `fechaProxAutotest`) VALUES
(1, 1, 'Santiago', 'Roca', '36593024', 1, 0, '2014-05-19 19:55:19'),
(2, 3, 'Sofia', 'Piruzzi', '36593024', 2, 0, '0000-00-00 00:00:00'),
(3, 4, 'Federico', 'Salas', '36593024', 1, 0, '0000-00-00 00:00:00'),
(8, 16, 'Santiago', 'Roca', '3545645345', 1, 0, '2013-11-21 22:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` int(11) NOT NULL,
  `eliminated` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `imagen_perfil` varchar(1024) NOT NULL DEFAULT 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png',
  `ciudad` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `telefono_personal` varchar(255) NOT NULL,
  `telefono_casa` varchar(255) NOT NULL,
  `telefono_oficina` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `lugar_nacimiento` varchar(255) NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `nro_seguridad_social` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `correo_electronico` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `id_usuario`, `direccion`, `telefono`, `role_id`, `created`, `updated`, `eliminated`, `active`, `nombre`, `apellido`, `imagen_perfil`, `ciudad`, `estado`, `telefono_personal`, `telefono_casa`, `telefono_oficina`, `genero`, `lugar_nacimiento`, `fecha_nacimiento`, `titulo`, `codigo_postal`, `nro_seguridad_social`, `edad`, `correo_electronico`) VALUES
(1, 1, 'Eduardo Maldonado 1534', '03525-15482703', 1, '2013-10-28 18:32:05', 0, 0, 1, 'Santiago', 'Roca', 'https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-ash3/1475836_547498502003068_1884355869_n.jpg', 'Cordoba', 'Argentina', '0352515482703', '4659444', '-', 'Mas', 'Capital Federal', '1991-11-03 00:00:00', 'Sr.', '5000', '-', '22', 'snroca@hotmail.com'),
(2, 2, 'Eduardo Maldonado 1534', '03525-15482703', 1, '2013-10-28 18:32:05', 0, 0, 1, 'Juan Jose', 'Paso', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(3, 4, 'Eduardo Maldonado 1534', '03525-15482703', 1, '2013-10-28 18:32:05', 0, 0, 1, 'Federico', 'Salas', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-frc3/28283_1505678279190_3015717_n.jpg?lvh=1', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(8, 14, 'Eduardo Maldonado 1534', '', 0, '2013-11-22 01:43:51', 0, 0, 1, 'Santiago', 'Roca', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 'Cordoba', 'Soltero', '04512', '453453453', '04042', 'Mascc', 'Cap fed', '2013-11-07 00:00:00', 'Sr', '5000', '236432123', '22', 'srnoca@hotmail.cmo'),
(9, 15, 'Eduardo Maldonado 1534', '', 0, '2013-11-22 01:45:11', 0, 0, 1, 'Santiago', 'Roca', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 'Cordoba', 'Soltero', '04512', '453453453', '04042', 'Mascc', 'Cap fed', '2013-11-07 00:00:00', 'Sr', '5000', '236432123', '22', 'srnoca@hotmail.cmo'),
(10, 16, 'Eduardo Maldonado 1534', '', 0, '2013-11-22 01:46:24', 0, 0, 1, 'Santiago', 'Roca', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 'Cordoba', 'Soltero', '04512', '453453453', '04042', 'Mascc', 'Cap fed', '2013-11-07 00:00:00', 'Sr', '5000', '236432123', '22', 'srnoca@hotmail.cmo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminated` int(11) NOT NULL,
  `canEdit` int(11) NOT NULL,
  `cantDelete` int(11) NOT NULL,
  `cantCreate` int(11) NOT NULL,
  `cantView` int(11) NOT NULL,
  `filterData` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodosis`
--

CREATE TABLE IF NOT EXISTS `registrodosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `emitida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recivida` datetime NOT NULL,
  `cantidad_dosis` varchar(255) NOT NULL,
  `cantidad_ui` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `registrodosis`
--

INSERT INTO `registrodosis` (`id`, `id_paciente`, `emitida`, `recivida`, `cantidad_dosis`, `cantidad_ui`) VALUES
(4, 1, '2013-11-20 00:39:07', '0000-00-00 00:00:00', '', ''),
(5, 1, '2013-11-20 16:43:16', '0000-00-00 00:00:00', '6000', '600765'),
(6, 1, '2013-11-21 13:18:26', '0000-00-00 00:00:00', '', ''),
(7, 1, '2013-11-21 13:18:28', '0000-00-00 00:00:00', '', ''),
(8, 1, '2013-11-21 13:18:56', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eliminated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `created`, `updated`, `eliminated`, `active`, `name`) VALUES
(1, '2013-10-28 18:32:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'Super Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `tipo`) VALUES
(1, 'profilaxis'),
(2, 'demanda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE IF NOT EXISTS `tratamiento` (
  `idTratamiento` int(11) NOT NULL AUTO_INCREMENT,
  `idEspecialista` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  PRIMARY KEY (`idTratamiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`idTratamiento`, `idEspecialista`, `idPaciente`) VALUES
(1, 2, 1),
(6, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `hora` datetime NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `idEspecialista` int(11) NOT NULL,
  `observaciones` varchar(2500) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idTurno`, `idPaciente`, `hora`, `lugar`, `idEspecialista`, `observaciones`) VALUES
(4, 3, '2013-11-06 14:01:00', 'La casa!', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(100) NOT NULL,
  `passUsuario` varchar(100) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `cambio` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `nombreUsuario` (`nombreUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `passUsuario`, `tipoUsuario`, `cambio`) VALUES
(1, 'santi', 'santi', 'paciente', 1),
(2, 'juanjose', 'paso', 'especialista', 0),
(3, 'sofi', 'sofi', 'paciente', 0),
(4, 'fede', 'fede', 'paciente', 0),
(16, 'santiago', 'asdasd', 'paciente', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
