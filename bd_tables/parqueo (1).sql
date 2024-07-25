-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2024 a las 06:32:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci_cliente` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `placa_auto`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Maria Abreu', '10101010', 'gg6767', '2024-03-30 08:53:28', NULL, NULL, '1'),
(2, 'Mirurjia Rosario', '1234567', 'A123456', '2024-03-30 08:55:17', NULL, NULL, '1'),
(5, 'MARIA', '284848248247', 'MMMM0909', '2024-04-01 12:12:08', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturaciones`
--

CREATE TABLE `tb_facturaciones` (
  `id_facturacion` int(11) NOT NULL,
  `id_informacion` varchar(255) DEFAULT NULL,
  `nro_factura` varchar(255) DEFAULT NULL,
  `id_cliente` varchar(255) DEFAULT NULL,
  `fecha_factura` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `fecha_salida` varchar(255) DEFAULT NULL,
  `hora_salida` varchar(255) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `monto_total` varchar(255) DEFAULT NULL,
  `monto_literal` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `qr` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_facturaciones`
--

INSERT INTO `tb_facturaciones` (`id_facturacion`, `id_informacion`, `nro_factura`, `id_cliente`, `fecha_factura`, `fecha_ingreso`, `hora_ingreso`, `fecha_salida`, `hora_salida`, `tiempo`, `cuviculo`, `detalle`, `precio`, `cantidad`, `total`, `monto_total`, `monto_literal`, `user_sesion`, `qr`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', '1', '3', 'La Vega, 30 de Marzo de 2024', '2024-03-30', '15:04', '2024-03-30', '21:07', '0 días con 6 horas con 3 minutos ', '30', 'Servicio de parqueo de 0 días con 6 horas con 3 minutos ', '300', '1', '300', '300', 'TRESCIENTOS CON 00/100 Bs.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Kirito Mendez con CI/NIT:\n 19090404 con el vehiculo con número de placa MMM190904 y esta factura se genero en\n  La Vega, 30 de Marzo de 2024 a hr: 21:07', '2024-03-30 09:07:25', NULL, NULL, '1'),
(2, '1', '2', '3', 'La Vega, 30 de Marzo de 2024', '2024-03-30', '21:08', '2024-03-30', '21:11', '0 días con 0 horas con 3 minutos ', '30', 'Servicio de parqueo de 0 días con 0 horas con 3 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 Bs.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Kirito Mendez con CI/NIT:\n 19090404 con el vehiculo con número de placa MMM190904 y esta factura se genero en\n  La Vega, 30 de Marzo de 2024 a hr: 21:11', '2024-03-30 09:11:37', NULL, NULL, '1'),
(3, '1', '3', '4', 'La Vega, 30 de Marzo de 2024', '2024-03-30', '15:12', '2024-03-30', '21:22', '0 días con 6 horas con 10 minutos ', '3', 'Servicio de parqueo de 0 días con 6 horas con 10 minutos ', '300', '1', '300', '300', 'TRESCIENTOS CON 00/100 RD$.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Aberlado Perez  con CI/NIT:\n 123456789 con el vehiculo con número de placa mmm1909 y esta factura se genero en\n  La Vega, 30 de Marzo de 2024 a hr: 21:22', '2024-03-30 09:22:58', NULL, NULL, '1'),
(4, '1', '4', '4', 'La Vega, 30 de Marzo de 2024', '2024-03-30', '21:13', '2024-03-30', '21:42', '0 días con 0 horas con 29 minutos ', '3', 'Servicio de parqueo de 0 días con 0 horas con 29 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 RD$.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Aberlado Perez  con CI/NIT:\n 123456789 con el vehiculo con número de placa mmm1909 y esta factura se genero en\n  La Vega, 30 de Marzo de 2024 a hr: 21:42', '2024-03-30 09:42:58', NULL, NULL, '1'),
(5, '1', '5', '4', 'La Vega, 30 de Marzo de 2024', '2024-03-30', '21:13', '2024-03-30', '22:22', '0 días con 1 horas con 9 minutos ', '3', 'Servicio de parqueo de 0 días con 1 horas con 9 minutos ', '50', '1', '50', '50', 'CINCUENTA CON 00/100 RD$.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Aberlado Perez  con CI/NIT:\n 123456789 con el vehiculo con número de placa mmm1909 y esta factura se genero en\n  La Vega, 30 de Marzo de 2024 a hr: 22:22', '2024-03-30 10:22:56', NULL, NULL, '1'),
(6, '1', '6', '4', 'La Vega, 31 de Marzo de 2024', '2024-03-31', '10:42', '2024-03-31', '10:46', '0 días con 0 horas con 4 minutos ', '3', 'Servicio de parqueo de 0 días con 0 horas con 4 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 Bs.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Aberlado Perez  con CI/NIT:\n 123456789 con el vehiculo con número de placa mmm1909 y esta factura se genero en\n  La Vega, 31 de Marzo de 2024 a hr: 10:46', '2024-03-31 10:46:57', NULL, NULL, '1'),
(7, '1', '7', '2', 'La Vega, 31 de Marzo de 2024', '2024-03-30', '20:55', '2024-03-31', '10:48', '0 días con 13 horas con 53 minutos ', '2', 'Servicio de parqueo de 0 días con 13 horas con 53 minutos ', '700', '1', '700', '700', 'SETECIENTOS CON 00/100 RD$.', 'erikson@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Mirurjia Rosario con CI/NIT:\n 1234567 con el vehiculo con número de placa A123456 y esta factura se genero en\n  La Vega, 31 de Marzo de 2024 a hr: 10:48', '2024-03-31 10:48:23', NULL, NULL, '1'),
(8, '1', '8', '5', 'La Vega, 01 de Abril de 2024', '2024-04-01', '20:11', '2024-04-01', '00:13', '0 días con 19 horas con 58 minutos ', '3', 'Servicio de parqueo de 0 días con 19 horas con 58 minutos ', '1000', '1', '1000', '1000', 'UN MIL CON 00/100 Bs.', 'abelardo@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente MARIA con CI/NIT:\n 284848248247 con el vehiculo con número de placa MMMM0909 y esta factura se genero en\n  La Vega, 01 de Abril de 2024 a hr: 00:13', '2024-04-01 12:13:26', NULL, NULL, '1'),
(9, '1', '9', '4', 'La Vega, 01 de Abril de 2024', '2024-04-01', '00:13', '2024-04-01', '00:21', '0 días con 0 horas con 8 minutos ', '3', 'Servicio de parqueo de 0 días con 0 horas con 8 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 RD.', 'abelardo@gmail.com', 'Factura realizada por el sistema de paqueo, al cliente Aberlado Perez  con CI/NIT:\n 123456789 con el vehiculo con número de placa mmm1909 y esta factura se genero en\n  La Vega, 01 de Abril de 2024 a hr: 00:21', '2024-04-01 12:21:05', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informaciones`
--

CREATE TABLE `tb_informaciones` (
  `id_informacion` int(11) NOT NULL,
  `nombre_parqueo` varchar(255) DEFAULT NULL,
  `actividad_empresa` varchar(255) DEFAULT NULL,
  `sucursal` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `zona` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `departamento_ciudad` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_informaciones`
--

INSERT INTO `tb_informaciones` (`id_informacion`, `nombre_parqueo`, `actividad_empresa`, `sucursal`, `direccion`, `zona`, `telefono`, `departamento_ciudad`, `pais`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Sistema De Parqueo', 'Parqueo', '1', 'La vega ', 'Calle Principal', '809-888-8888', 'La Vega', 'Republica Dominicana', '2024-03-30 08:54:51', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL,
  `nro_espacio` varchar(255) DEFAULT NULL,
  `estado_espacio` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_mapeos`
--

INSERT INTO `tb_mapeos` (`id_map`, `nro_espacio`, `estado_espacio`, `obs`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'OCUPADO', '', '2024-03-30 08:53:07', '2024-03-30 08:55:04', NULL, '1'),
(2, '2', 'OCUPADO', '', '2024-03-30 08:53:11', '2024-03-31 10:48:56', NULL, '1'),
(3, '3', 'LIBRE', '', '2024-03-30 08:53:14', '2024-04-01 12:21:05', NULL, '1'),
(4, '4', 'OCUPADO', '', '2024-03-30 08:53:16', '2024-04-01 12:25:44', NULL, '1'),
(5, '5', 'LIBRE', '', '2024-03-30 08:53:19', NULL, NULL, '1'),
(6, '6', 'LIBRE', '', '2024-03-30 08:55:41', NULL, NULL, '1'),
(7, '7', 'LIBRE', '', '2024-03-30 08:55:45', NULL, NULL, '1'),
(8, '8', 'LIBRE', '', '2024-03-30 08:55:48', NULL, NULL, '1'),
(9, '9', 'LIBRE', '', '2024-03-30 08:55:52', NULL, NULL, '1'),
(10, '10', 'LIBRE', '', '2024-03-30 08:55:56', NULL, NULL, '1'),
(11, '11', 'LIBRE', '', '2024-03-30 08:55:59', NULL, NULL, '1'),
(12, '12', 'LIBRE', '', '2024-03-30 08:56:02', NULL, NULL, '1'),
(13, '13', 'LIBRE', '', '2024-03-30 08:56:05', NULL, NULL, '1'),
(14, '14', 'LIBRE', '', '2024-03-30 08:56:13', NULL, NULL, '1'),
(15, '15', 'LIBRE', '', '2024-03-30 08:56:17', NULL, NULL, '1'),
(16, '16', 'LIBRE', '', '2024-03-30 08:56:20', NULL, NULL, '1'),
(17, '17', 'LIBRE', '', '2024-03-30 08:56:23', NULL, NULL, '1'),
(18, '18', 'LIBRE', '', '2024-03-30 08:56:27', NULL, NULL, '1'),
(19, '19', 'LIBRE', '', '2024-03-30 08:56:31', NULL, NULL, '1'),
(20, '20', 'LIBRE', '', '2024-03-30 08:56:35', NULL, NULL, '1'),
(21, '21', 'LIBRE', '', '2024-03-30 08:56:40', NULL, NULL, '1'),
(22, '22', 'LIBRE', '', '2024-03-30 08:56:48', NULL, NULL, '1'),
(23, '23', 'LIBRE', '', '2024-03-30 08:56:51', NULL, NULL, '1'),
(24, '24', 'LIBRE', '', '2024-03-30 08:56:55', NULL, NULL, '1'),
(25, '25', 'LIBRE', '', '2024-03-30 08:56:57', NULL, NULL, '1'),
(26, '26', 'LIBRE', '', '2024-03-30 08:57:00', NULL, NULL, '1'),
(27, '27', 'LIBRE', '', '2024-03-30 08:57:04', NULL, NULL, '1'),
(28, '28', 'LIBRE', '', '2024-03-30 08:57:07', NULL, NULL, '1'),
(29, '29', 'LIBRE', '', '2024-03-30 08:57:11', NULL, NULL, '1'),
(30, '30', 'LIBRE', '', '2024-03-30 08:57:14', '2024-03-30 09:12:03', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_precios`
--

CREATE TABLE `tb_precios` (
  `id_precio` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_precios`
--

INSERT INTO `tb_precios` (`id_precio`, `cantidad`, `detalle`, `precio`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'HORAS', '50', '2024-03-30 07:59:41', '2024-03-30 08:36:13', NULL, '1'),
(2, '2', 'HORAS', '100', '2024-03-30 08:36:06', NULL, NULL, '1'),
(3, '3', 'HORAS', '150', '2024-03-30 08:36:25', NULL, NULL, '1'),
(4, '4', 'HORAS', '200', '2024-03-30 08:36:33', NULL, NULL, '1'),
(5, '5', 'HORAS', '250', '2024-03-30 08:36:55', NULL, NULL, '1'),
(6, '6', 'HORAS', '300', '2024-03-30 08:37:08', NULL, NULL, '1'),
(7, '7', 'HORAS', '350', '2024-03-30 08:37:25', NULL, NULL, '1'),
(8, '8', 'HORAS', '400', '2024-03-30 08:37:33', NULL, NULL, '1'),
(9, '9', 'HORAS', '450', '2024-03-30 08:37:42', NULL, NULL, '1'),
(10, '10', 'HORAS', '500', '2024-03-30 08:37:54', NULL, NULL, '1'),
(11, '11', 'HORAS', '50', '2024-03-30 08:38:04', NULL, NULL, '1'),
(12, '12', 'HORAS', '600', '2024-03-30 08:38:11', NULL, NULL, '1'),
(13, '13', 'HORAS', '700', '2024-03-30 08:38:20', '2024-03-30 08:38:25', NULL, '1'),
(14, '14', 'HORAS', '750', '2024-03-30 08:38:35', '2024-03-30 08:38:43', NULL, '1'),
(15, '15', 'HORAS', '800', '2024-03-30 08:38:54', NULL, NULL, '1'),
(16, '16', 'HORAS', '850', '2024-03-30 08:39:08', NULL, NULL, '1'),
(17, '17', 'HORAS', '900', '2024-03-30 08:39:18', NULL, NULL, '1'),
(18, '18', 'HORAS', '950', '2024-03-30 08:39:36', NULL, NULL, '1'),
(19, '19', 'HORAS', '1000', '2024-03-30 08:39:48', NULL, NULL, '1'),
(20, '20', 'HORAS', '1050', '2024-03-30 08:39:58', NULL, NULL, '1'),
(21, '21', 'HORAS', '1100', '2024-03-30 08:40:10', NULL, NULL, '1'),
(22, '22', 'HORAS', '1150', '2024-03-30 08:40:19', NULL, NULL, '1'),
(23, '23', 'HORAS', '1200', '2024-03-30 08:40:31', NULL, NULL, '1'),
(24, '1', 'DIAS', '1250', '2024-03-30 08:40:45', '2024-03-30 08:40:55', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `nombre`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'ADINISTRADOR', '2024-03-30 09:49:53', NULL, '2024-03-31 01:56:41', '0'),
(2, 'CONTADOR', '2024-03-30 09:50:02', NULL, '2024-03-31 01:57:44', '0'),
(3, 'OPERADOR', '2024-03-30 09:50:08', NULL, '2024-03-31 01:57:41', '0'),
(4, 'ADMINISTRADOR', '2024-03-31 01:54:07', NULL, NULL, '1'),
(5, 'CONTADOR', '2024-03-31 01:57:54', NULL, NULL, '1'),
(6, 'OPERADOR', '2024-03-31 01:58:04', NULL, NULL, '1'),
(7, '09killerclown09', '2024-03-31 01:15:26', NULL, '2024-03-31 01:15:29', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sugerencias`
--

CREATE TABLE `tb_sugerencias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_sugerencias`
--

INSERT INTO `tb_sugerencias` (`id`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(1, '09killerclown09', 'erikson@gmail.com', 'Esto solo es una prueba para saber si todo funciona correcta mente  ', '2024-03-31 20:53:37'),
(2, 'maria', 'maria@gmail.com', 'hola', '2024-04-01 03:59:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id_ticket` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `estado_ticket` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_tickets`
--

INSERT INTO `tb_tickets` (`id_ticket`, `nombre_cliente`, `nit_ci`, `placa_auto`, `cuviculo`, `fecha_ingreso`, `hora_ingreso`, `estado_ticket`, `user_sesion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Maria Abreu', '10101010', 'GG6767', '1', '2024-03-30', '20:53', 'OCUPADO', 'erikson@gmail.com', '2024-03-30 08:53:28', NULL, '2024-03-30 08:55:00', '0'),
(2, 'Maria Abreu', '10101010', 'GG6767', '1', '2024-03-30', '20:55', 'LIBRE', 'erikson@gmail.com', '2024-03-30 08:55:04', NULL, NULL, '1'),
(3, 'Mirurjia Rosario', '1234567', 'A123456', '2', '2024-03-30', '20:55', 'LIBRE', 'erikson@gmail.com', '2024-03-30 08:55:17', NULL, NULL, '1'),
(7, 'Aberlado Perez ', '123456789', 'MMM1909', '3', '2024-03-30', '15:12', 'LIBRE', 'erikson@gmail.com', '2024-03-30 09:12:38', NULL, NULL, '1'),
(8, 'Aberlado Perez ', '123456789', 'MMM1909', '3', '2024-03-30', '21:13', 'LIBRE', 'erikson@gmail.com', '2024-03-30 09:23:37', NULL, NULL, '1'),
(9, 'Aberlado Perez ', '123456789', 'MMM1909', '3', '2024-03-30', '21:13', 'LIBRE', 'erikson@gmail.com', '2024-03-30 09:43:06', NULL, NULL, '1'),
(10, 'Aberlado Perez ', '123456789', 'MMM1909', '3', '2024-03-31', '10:42', 'LIBRE', 'erikson@gmail.com', '2024-03-31 10:43:52', NULL, NULL, '1'),
(11, 'Mirurjia Rosario', '1234567', 'A123456', '2', '2024-03-31', '10:48', 'OCUPADO', 'Mirurjia@gmail.com', '2024-03-31 10:48:56', NULL, NULL, '1'),
(12, 'MARIA', '284848248247', 'MMMM0909', '3', '2024-04-01', '20:11', 'LIBRE', 'abelardo@gmail.com', '2024-04-01 12:12:08', NULL, NULL, '1'),
(13, 'Aberlado Perez ', '123456789', 'MMM1909', '3', '2024-04-01', '21:13', 'OCUPADO', 'abelardo@gmail.com', '2024-04-01 12:20:45', NULL, NULL, '1'),
(14, 'MARIA', '284848248247', 'MMMM0909', '4', '2024-04-01', '00:25', 'OCUPADO', 'erikson@gmail.com', '2024-04-01 12:25:44', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verificado` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `rol`, `email`, `email_verificado`, `password_user`, `token`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(6, 'Erikson Perez', 'ADMINISTRADOR', 'erikson@gmail.com', NULL, '12345', NULL, '2024-03-31 01:56:08', '2024-03-31 01:58:35', NULL, '1'),
(7, 'Jhonatan Hernandez', 'ADMINISTRADOR', 'Jhonatan@gmail.com', NULL, '12345', NULL, '2024-03-31 01:56:23', NULL, NULL, '1'),
(8, 'Mirurjia Rosario', 'CONTADOR', 'Mirurjia@gmail.com', NULL, '12345', NULL, '2024-03-31 01:58:18', NULL, NULL, '1'),
(9, 'Abelardo Perez', 'OPERADOR', 'abelardo@gmail.com', NULL, '12345', NULL, '2024-03-31 01:59:13', NULL, NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  ADD PRIMARY KEY (`id_facturacion`);

--
-- Indices de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  ADD PRIMARY KEY (`id_informacion`);

--
-- Indices de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

--
-- Indices de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_sugerencias`
--
ALTER TABLE `tb_sugerencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  MODIFY `id_facturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  MODIFY `id_informacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_sugerencias`
--
ALTER TABLE `tb_sugerencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
