-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2017 a las 18:40:40
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bazar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `idCaja` int(11) NOT NULL AUTO_INCREMENT,
  `Monto_ganancia` float NOT NULL,
  `Monto_capital` float NOT NULL,
  PRIMARY KEY (`idCaja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idCaja`, `Monto_ganancia`, `Monto_capital`) VALUES
(1, 40, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `ContenidoTotal` int(11) NOT NULL,
  `CantidadVendida` int(11) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Nombre`, `ContenidoTotal`, `CantidadVendida`) VALUES
(1, 'Peluches', 2, 0),
(2, 'Regalos', 0, 0),
(3, 'Libreria', 0, 0),
(4, 'Bolsas', 15, 0),
(5, 'Chocolates', 0, 0),
(6, 'Otros', 0, 0),
(7, 'Globos', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientoscaja`
--

CREATE TABLE IF NOT EXISTS `movimientoscaja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Motivo` varchar(255) DEFAULT NULL,
  `Monto` float NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `movimientoscaja`
--

INSERT INTO `movimientoscaja` (`id`, `Motivo`, `Monto`, `Tipo`) VALUES
(1, 'alquiler', -5, 'Capital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Costo` float NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Nombre`, `Cantidad`, `Costo`, `idCategoria`) VALUES
(1, 'oso de cuero', 1, 34, 1),
(2, 'Bolsa de regalo mediana', 3, 4, 4),
(3, 'bolsa de regalo pequena', 7, 2, 4),
(4, 'Chicorita', 1, 45, 1),
(5, 'Bolsa de regalo rectangular', 5, 8, 4),
(6, 'Globo corazon grande', 3, 6, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaproducto`
--

CREATE TABLE IF NOT EXISTS `ventaproducto` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  KEY `idVenta` (`idVenta`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `ventaproducto`
--
ALTER TABLE `ventaproducto`
  ADD CONSTRAINT `ventaproducto_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`),
  ADD CONSTRAINT `ventaproducto_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
