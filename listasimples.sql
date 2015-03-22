-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-03-2015 a las 22:18:01
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `listasimple`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicio` (
  `id` smallint(1) NOT NULL,
  `enunciado` text NOT NULL,
  `lista_inicial` varchar(45) DEFAULT NULL,
  `solucion` varchar(255) DEFAULT NULL,
  `operacion_id` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`,`operacion_id`),
  KEY `fk_ejercicio_operacion1_idx` (`operacion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id`, `enunciado`, `lista_inicial`, `solucion`, `operacion_id`) VALUES
(8, 'prueba 6 mod', 'pr mod', '1', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `metas` tinyint(1) DEFAULT NULL,
  `autoreflexion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `grupo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` tinyint(2) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `metacol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `meta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_has_usuario`
--

CREATE TABLE IF NOT EXISTS `meta_has_usuario` (
  `meta_id` tinyint(2) NOT NULL,
  `usuario_codigo` varchar(12) NOT NULL,
  `usuario_grupo_id` tinyint(1) NOT NULL,
  `tiempo` float DEFAULT NULL,
  `eficiencia` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`meta_id`,`usuario_codigo`,`usuario_grupo_id`),
  KEY `fk_meta_has_usuario_usuario1_idx` (`usuario_codigo`,`usuario_grupo_id`),
  KEY `fk_meta_has_usuario_meta1_idx` (`meta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `meta_has_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE IF NOT EXISTS `operacion` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`id`, `name`, `descripcion`) VALUES
(2, 'prueba Insertar nodo mod', 'prueba des insertar nodo mod');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `ejercicio_id` smallint(1) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `tiempo` float DEFAULT NULL,
  `eficiencia` float DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`ejercicio_id`,`usuario`),
  KEY `fk_ejercicio_has_user_user1_idx` (`usuario`),
  KEY `fk_ejercicio_has_user_ejercicio1_idx` (`ejercicio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `resultado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sentencia`
--

CREATE TABLE IF NOT EXISTS `sentencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instruccion` varchar(255) NOT NULL,
  `ejercicio_id` smallint(1) NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`,`ejercicio_id`),
  KEY `fk_sentencia_ejercicio1_idx` (`ejercicio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1990 ;

--
-- Volcar la base de datos para la tabla `sentencia`
--

INSERT INTO `sentencia` (`id`, `instruccion`, `ejercicio_id`, `orden`) VALUES
(1988, 'prueba mod 7\r\nprueba mod 8\r\n', 8, 4),
(1987, 'prueba mod 5\r\nprueba mod 6\r\n', 8, 3),
(1986, 'prueba mod 3\r\nprueba m 4\r\n', 8, 2),
(1985, 'prueba mod 1\r\nprueba m 2\r\n', 8, 1),
(1989, '\r\n\n', 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` varchar(12) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `conexion` datetime DEFAULT NULL,
  `grupo_id` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`,`grupo_id`),
  KEY `fk_user_grupo1_idx` (`grupo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `usuario`
--

