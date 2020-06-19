-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2019 a las 07:48:55
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bodega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cli_cedula` varchar(13) NOT NULL,
  `cli_mail` varchar(128) NOT NULL,
  `cli_nombre` varchar(64) NOT NULL,
  `cli_telefono` varchar(13) NOT NULL,
  PRIMARY KEY (`cli_cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_cedula`, `cli_mail`, `cli_nombre`, `cli_telefono`) VALUES
('0503301236', 'mail1@gmail.com', 'cliente1', '0532123432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `pro_codigo` varchar(32) NOT NULL,
  `prv_ruc` varchar(13) NOT NULL,
  `com_precio` double NOT NULL,
  `com_pvp` double NOT NULL,
  `com_cantid` int(11) NOT NULL,
  `com_fecha` date NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `pro_codigo`, `prv_ruc`, `com_precio`, `com_pvp`, `com_cantid`, `com_fecha`) VALUES
(1, '001', '1234567891923', 20, 25, 20, '2019-06-16'),
(2, '002', '0987654321123', 20, 25, 20, '2019-06-16'),
(3, '001', '1234567891923', 20, 25, 20, '2019-06-16'),
(4, '004', '0987654321123', 20, 30, 60, '2019-06-28'),
(5, '004', '0987654321123', 20, 30, 60, '2019-06-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `pro_codigo` varchar(32) NOT NULL,
  `pro_nombre` varchar(32) NOT NULL,
  `pro_descri` varchar(128) NOT NULL,
  `pro_img` varchar(8) NOT NULL,
  PRIMARY KEY (`pro_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_descri`, `pro_img`) VALUES
('001', 'zapato', 'asd', 'jpg'),
('002', 'zapato 3', 'asdas', 'jpg'),
('003', 'zapato 3', 'zapato con imagen de no un zapato xd', 'png'),
('004', 'camisa', 'dasda', 'jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `prv_ruc` varchar(13) NOT NULL,
  `prv_mail` varchar(128) NOT NULL,
  `prv_nombre` varchar(64) NOT NULL,
  `prv_telefono` varchar(13) NOT NULL,
  `prv_direccion` varchar(252) NOT NULL,
  PRIMARY KEY (`prv_ruc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`prv_ruc`, `prv_mail`, `prv_nombre`, `prv_telefono`, `prv_direccion`) VALUES
('1234567891923', 'pro1@gmail.com', 'proveedor1', '0980982832', 'en alun lugarrr'),
('0987654321123', 'pro2@gmail.com', 'proveedor2', '09876543212', 'en algun otro lugar xd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_mail` varchar(128) NOT NULL,
  `usu_nombre` varchar(32) NOT NULL,
  `usu_pass` varchar(128) NOT NULL,
  `usu_nivel` varchar(32) NOT NULL,
  `usu_status` int(11) NOT NULL,
  `usu_change` int(11) NOT NULL,
  PRIMARY KEY (`usu_mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_mail`, `usu_nombre`, `usu_pass`, `usu_nivel`, `usu_status`, `usu_change`) VALUES
('mail1@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, 0),
('mail2@gmail.com', 'user', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `cli_cedula` int(11) NOT NULL,
  `usu_mail` varchar(128) NOT NULL,
  `ven_fecha` date NOT NULL,
  `ven_cantid` int(11) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_compra`, `cli_cedula`, `usu_mail`, `ven_fecha`, `ven_cantid`) VALUES
(1, 1, 503301236, 'mail2@gmail.com', '2019-06-27', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
