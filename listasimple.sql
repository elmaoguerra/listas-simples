-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2015 a las 01:19:32
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `pseudocodigo` text,
  `operacion_id` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`,`operacion_id`),
  KEY `fk_ejercicio_operacion1_idx` (`operacion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id`, `enunciado`, `lista_inicial`, `pseudocodigo`, `operacion_id`) VALUES
(9, 'Se desea recorrer todos los nodos de la lista dada (véase lista inicial)', '1,6,8,9,3', NULL, 3),
(10, 'Teniendo en cuenta la lista inicial, se desea insertar un nodo con el dato 2 después del nodo con el dato 7.\n\nAsuma que la lista es de números enteros.', '5,6,3,7,1', NULL, 4);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE IF NOT EXISTS `operacion` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`id`, `name`, `descripcion`) VALUES
(2, 'prueba Insertar nodo mod', 'prueba des insertar nodo mod'),
(3, 'Recorrer Lista', 'Esta Operacion Recorre toda la lista'),
(4, 'Insertar Intermedio', 'Esta Operación inserta un nodo en una posición intermedia de la lista, es decir, una posición diferente a la primera.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ejercicio_id` smallint(1) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `tiempo` float DEFAULT NULL,
  `eficiencia` float DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ejercicio_has_user_user1_idx` (`usuario`),
  KEY `fk_ejercicio_has_user_ejercicio1_idx` (`ejercicio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`id`, `ejercicio_id`, `usuario`, `tiempo`, `eficiencia`, `fecha`) VALUES
(1, 10, '1', 11, 50, '2015-04-16 15:43:58'),
(2, 9, '1', 7, 100, '2015-04-16 16:03:22'),
(3, 10, '2', 15, 33, '2015-04-16 15:43:58'),
(4, 9, '2', 20, 33, '2015-04-16 15:43:58'),
(5, 9, '1', 50, 33, '2015-04-27 14:43:34');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2016 ;

--
-- Volcado de datos para la tabla `sentencia`
--

INSERT INTO `sentencia` (`id`, `instruccion`, `ejercicio_id`, `orden`) VALUES
(2015, 'Fin SubProceso\n', 9, 3),
(2003, 'void insertar_intermedio (Nodo *ptrLista) {\r\n      Nodo *nuevo, *next;\r\n', 10, 1),
(2014, '		ptrLista = ptrLista->ptrSig;\r\n	Fin Mientras\r\n', 9, 2),
(2004, '      while (ptrLista != NULL) {\r\n            if (ptrLista->dato == 7) {\r\n', 10, 2),
(2013, 'SubProceso void <- recorrer_lista ( ptrLista )\r\n	Mientras ptrLista != NULL Hacer\r\n', 9, 1),
(2005, '                  next = ptrLista->sig;\r\n                  nuevo = new Nodo;\r\n', 10, 3),
(2006, '                  nuevo->dato = 2;\r\n                  ptrLista->sig = nuevo;\r\n', 10, 4),
(2007, '                  nuevo->sig = next;\r\n                  break;\r\n', 10, 5),
(2008, '            }\r\n            ptrLista = ptrLista->sig;\r\n', 10, 6),
(2009, '      }     \r\n}\n', 10, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` varchar(12) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `grupo_id` tinyint(1) NOT NULL,
  `cod_activacion` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo`,`grupo_id`),
  KEY `fk_user_grupo1_idx` (`grupo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `email`, `password`, `estado`, `grupo_id`, `cod_activacion`) VALUES
('1', 'Mauricio Andrés Guerra Cubillos', 'miemail', '202cb962ac59075b964b07152d234b70 ', NULL, 1, ''),
('2', 'Mauro Guerra', 'mi email2', '202cb962ac59075b964b07152d234b70', '', 2, ''),
('3', 'usuario3', 'maoguerra007@gmail.com', '202cb962ac59075b964b07152d234b70', 'Activo', 3, '96428');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
