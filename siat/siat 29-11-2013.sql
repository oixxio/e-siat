-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2013 a las 20:18:15
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE IF NOT EXISTS `especialista` (
  `idEspecialista` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `nombreConsultorio` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  PRIMARY KEY (`idEspecialista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialclinico`
--

CREATE TABLE IF NOT EXISTS `historialclinico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `observacion` varchar(5000) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

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
  `cuit` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `afi_type` varchar(20) NOT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
  `updated` datetime NOT NULL,
  `eliminated` datetime NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
  `realizado` int(11) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(100) NOT NULL,
  `hash` varchar(2000) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `cambio` int(11) NOT NULL,
  `salt` varchar(500) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `nombreUsuario` (`nombreUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
