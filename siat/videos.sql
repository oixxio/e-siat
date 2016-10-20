-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2013 a las 17:02:26
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `idVideo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `code` varchar(500) NOT NULL,
  `idEspecialista` int(11) NOT NULL,
  PRIMARY KEY (`idVideo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`idVideo`, `nombre`, `url`, `code`, `idEspecialista`) VALUES
(1, '¿Qué es hemofilia?', 'http://www.youtube.com/watch?v=4tlkMWqYeyk', '<iframe src="//www.youtube.com/embed/4tlkMWqYeyk\\/?showinfo=0" frameborder="0" allowfullscreen></iframe>', 1),
(2, 'Hemofilia', 'http://www.youtube.com/watch?v=Ai4p8T8_ojg', '<iframe src="//www.youtube.com/embed/Ai4p8T8_ojg\\/?showinfo=0" frameborder="0" allowfullscreen></iframe>', 1),
(3, 'Documental Vivir Mejor', 'http://www.youtube.com/watch?v=lN_8t3-N5Aw', '<iframe src="//www.youtube.com/embed/lN_8t3-N5Aw\\/?showinfo=0" frameborder="0" allowfullscreen></iframe>', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
