-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 00:29:32
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturafacil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo` int(4) UNSIGNED ZEROFILL NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `idcategoria` int(4) UNSIGNED ZEROFILL NOT NULL,
  `costo_compra` int(20) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `usuario_creacion` int(20) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_modificacion` int(20) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `descripcion`, `idcategoria`, `costo_compra`, `fecha_creacion`, `usuario_creacion`, `fecha_modificacion`, `usuario_modificacion`, `estado`) VALUES
(0012, 'Memoria Ram DDR4 - 8gb (Servidores)', 0001, 50000, '2021-02-03 16:01:52', 0, '2021-02-25 11:50:51', 1047419581, 1),
(0013, 'Disco duro SATA - 500gb', 0002, 1, '2021-02-03 16:02:18', 0, '0000-00-00 00:00:00', 0, 1),
(0014, 'Memoria Ram DDR3 - 2gb (portatil)', 0001, 1, '2021-02-04 08:05:22', 0, '0000-00-00 00:00:00', 0, 1),
(0015, 'Antena wifi - Portatil', 0009, 1, '2021-02-04 08:06:14', 0, '0000-00-00 00:00:00', 0, 1),
(0016, 'Wifi Usb - Tplink', 0007, 1, '2021-02-09 16:46:45', 0, '0000-00-00 00:00:00', 0, 1),
(0017, 'Pantalla 14\" - 40 pines', 0009, 1, '2021-02-10 01:18:27', 0, '0000-00-00 00:00:00', 0, 1),
(0018, 'Teclado Samsung NP-300', 0005, 1, '2021-02-15 10:54:23', 0, '0000-00-00 00:00:00', 0, 1),
(0019, 'Disco duro SATA - 160gb', 0002, 1, '2021-02-15 16:19:38', 0, '0000-00-00 00:00:00', 0, 1),
(0020, 'Switch 4 ptos', 0010, 1, '2021-02-15 16:58:21', 0, '0000-00-00 00:00:00', 0, 1),
(0021, 'Cargador Hp punta aguja', 0008, 1, '2021-02-15 16:58:21', 0, '0000-00-00 00:00:00', 0, 1),
(0022, 'Cargador Hp mini (portatil)', 0008, 1, '2021-02-15 16:58:58', 0, '0000-00-00 00:00:00', 0, 1),
(0023, 'Memoria Ram DDR3 - 2gb (pc)', 0001, 1, '2021-02-15 16:58:58', 0, '0000-00-00 00:00:00', 0, 1),
(0024, 'Fuente de poder', 0012, 1, '2021-02-15 17:07:18', 0, '0000-00-00 00:00:00', 0, 1),
(0025, 'Board DDR3, Socket 1155', 0011, 1, '2021-02-24 07:59:52', 0, '0000-00-00 00:00:00', 0, 1),
(0026, 'Procesador Celeron G530', 0004, 1, '2021-02-24 08:00:21', 0, '2021-02-25 09:09:30', 1047419581, 1),
(0027, 'Adapatador de corriente para monitor', 0012, 0, '2021-03-04 07:57:36', 1047419581, '0000-00-00 00:00:00', 0, 1),
(0028, 'DISCO DURO 1TB - SATA (PC)', 0002, 1, '2021-03-08 07:40:27', 1047419581, '2021-03-08 07:41:14', 1047419581, 1),
(0029, 'DISCO DURO 500GB - SATA (PORTATIL)', 0002, 1, '2021-03-08 07:40:59', 1047419581, '0000-00-00 00:00:00', 0, 1),
(0030, 'ADAPTADOR DE CORRIENTE PANTALLA LG', 0012, 30000, '2021-03-11 07:28:20', 1047419581, '0000-00-00 00:00:00', 0, 1),
(0031, 'Repetidor Wifi', 0013, 1, '2021-03-17 08:52:56', 1047419581, '0000-00-00 00:00:00', 0, 1),
(0032, 'Memoria Ram DDR3 - 4gb (portatil)', 0001, 1, '2021-03-26 07:55:03', 1047419581, '0000-00-00 00:00:00', 0, 1),
(0033, 'Procesador i3 3ra Generacion', 0004, 1, '2021-03-29 11:05:28', 1047427112, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_servicio`
--

CREATE TABLE `cargo_servicio` (
  `idcargo_servicio` varchar(45) NOT NULL,
  `idcliente` int(2) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `descripcion` text,
  `fecha_servicio` date DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT '0' COMMENT '0-activo\n1-anulado\n2-facturado',
  `total` int(20) DEFAULT NULL,
  `cuenta_cobro` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo_servicio`
--

INSERT INTO `cargo_servicio` (`idcargo_servicio`, `idcliente`, `tipo`, `descripcion`, `fecha_servicio`, `usuario_registro`, `fecha_registro`, `estado`, `total`, `cuenta_cobro`) VALUES
('SE0005', 9, 1, 'SE CONFIGURO PLAN DE MARCACION Y MENSAJE DE BIENVENIDA, PLANTA TELEFONICA PANASONIC TES824', '2021-02-27', 1047419581, '2021-03-10 13:13:38', 2, 150000, 'FV0065'),
('SE0007', 5, 2, 'SE VALIDARON 6 RIPS DE AMBUQ Y SE ENVIARON SUS CERTIFICACIONES', '2021-03-10', 1047419581, '2021-03-10 13:50:09', 2, 20000, 'FV0071'),
('SE0008', 5, 2, 'SE LE VALIDO 5 RIPS DE AMBUQ Y SE LE ENVIO SUS CERTIFICADOS', '2021-02-17', 1047419581, '2021-03-10 17:01:07', 2, 20000, 'FV0066'),
('SE0009', 5, 2, 'SE LE VALIDO 5 RIPS DE CAJACOPIY SE LE ENVIO SUS CERTIFICADOS', '2021-02-15', 1047419581, '2021-03-10 17:03:27', 2, 20000, 'FV0066'),
('SE0011', 5, 2, 'Se validaron y se enviaron los certificados de los sguientes rips de comparta\n\nCTE 13508\nCTE 13509\nCTE13510\nCTE13511\nCTE13512', '2021-03-11', 1047419581, '2021-03-11 15:34:15', 2, 20000, 'FV0071'),
('SE0012', 9, 1, 'SE RECONFIGURO ROUTER EN LA ZONA DE MUSICA, SE RECONFIGURO ROUTER EN LA PARTE DE ZONA 6,SE ACTIVO LICENCIA DE OFFICE 2016 PORTATIL DE DIRECCION ADMINISTRATIVA, SE RECONFIGURO ROUTE QUE ESTA UBICADO EN LA PARTE ADMINISTRATIVA, SE CONFIGURO EL EQUIPO DE TESORERIA  CON LA IMPRESORA DE ADMINISTRACION.', '2021-03-03', 1047419581, '2021-03-12 13:22:57', 2, 60000, 'FV0069'),
('SE0013', 9, 1, 'SE ATENDIO AL LLAMADO SOBRE COMANDERO BLOQUEADO EN ZONA 6, SE REVISO Y SE LE DIO SOLUCION AL MISMO', '2021-03-04', 1047419581, '2021-03-12 13:27:12', 2, 30000, 'FV0069'),
('SE0014', 9, 1, 'SE ATENDIO AL LLAMADO SOBRE PROBLEMAS DE CONEXION DEL EQUIPO DE OMAR Y EL SERVIDOR, SE REVISO Y SE EVIDENCIO QUE AMBOS EQUIPOS SE ENCUENTRAN EN REDES DIFERENTES, SE SOLUCIONO EL INVENIENTE COFIGURANDOLE UNA VPN ENTRE LOS DOS EQUIPO.', '2021-03-06', 1047419581, '2021-03-12 13:31:17', 2, 30000, 'FV0069'),
('SE0015', 9, 1, 'SE ATENDIO EL LLAMADO SOBRE LA NECESIDAD  DE QUE LOS EQUIPOS DEL AREA DE PRODUCCION TUVIERAN UNA IMPRESORA CONFIGURADA PARA LA IMPRESION DE FACTURAS Y COMADERAS, SE INSTALO LA IMPRESORA, SE REALIZARON LAS PRUEBAS PERTINENTES CON RESULTADOS SATISFACTORIOS, ADEMAS SE REVISO EQUIPO EN ZONA 6, QUE NO SE UTILIZABA POR NO TENER LAS IMPRESORAS CONFIGURADAS, SE LE CONFIGURO LAS IMPRESORA Y EL EQUIPO QUEDO FUNCIONAL.', '2021-03-12', 1047419581, '2021-03-12 13:35:17', 2, 30000, 'FV0069'),
('SE0016', 9, 3, 'ADAPTADOR DE CORRIENTE PANTALLA LG', '2021-03-09', 1047419581, '2021-03-12 13:43:48', 2, 60000, 'FV0069'),
('SE0017', 6, 1, 'SE RENOVO SERVICIO DE HOSTING PARA EL DOMINIO ALLRIGHT-ENGLISH.COM.CO, PARA LA RESTAURANCION DE LA COPIA DE SEGURIDAD', '2021-03-11', 1047419581, '2021-03-15 11:08:31', 2, 120000, 'FV0070'),
('SE0018', 5, 2, 'SE VALIDO Y SE ENVIO CERTIFICADO DE RIPS DE LA EMPRESA ASMET SALUD', '2021-03-16', 1047419581, '2021-03-16 14:56:20', 2, 4000, 'FV0071'),
('SE0020', 4, 1, 'SE REALIZO MANTENIMIENTO PREVENTIVO A DOS EQUIPO DE ESCRITORIO Y DOS EQUIPOS PORTATILES ADEMAS SE INSTALO REPETIDOR Y SE CONFIGURO IMPRESORA ', '2021-03-19', 1047419581, '2021-03-24 07:38:15', 2, 150000, 'FV0074'),
('SE0021', 3, 2, 'PRUEBA5', '2021-03-25', 1047419581, '2021-03-24 07:38:15', 1, 15000, ''),
('SE0022', 11, 1, 'SE ATENDIO EL LLAMADO SOBRE UN PROBLEMA DE CONEXION REMOTO, SE SOLUCIONO EL PROBLEMA DE CONEXION DE TERMINAL SERVER', '2021-03-20', 1047419581, '2021-03-24 07:52:42', 2, 20000, 'FV0075'),
('SE0023', 9, 1, 'SOPORTE AL UN EQUIPO DE PRODUCCION QUE NO TENIA CONEXION CON EL SERVIDOR \n\nSOPORTE A UN EQUIPO DE ZONA 6 EN LA PARTE DE LA CAJA QUE NO TENIA CONFIGURADAS LAS IMPRESORA DE LA COCINA Y LA IMPRESORA QUE TENIA CONECTABA MOSTRABA PORBLEMA DE CONEXION, SE SOLUCIONO CONFIGURANDOLE LA IMPRESORA DE LA COCINA Y ADEMAS SE LE CONFIGURO LA IMPRESORA QUE TIENE EL EQUIPO DE AL LADO\n\nSOPORTE A JENNIFER PARA LA COMPRA DE UNA LICENCIA DE WORDOFFICE Y PAQUETE DE 1000 FACTURAS ELECTRONICA\n\n', '2021-03-13', 1047419581, '2021-03-24 09:07:57', 0, 30000, ''),
('SE0024', 9, 1, 'SE ATENDIO EL LLAMADMO SOBRE PROBLEMAS DE CONEXION EN EL EQUIPO DE CONTABILIDAD, SE REVISO Y SE LE SOLUCIONO EL PROBLEMA DE CONEXION', '2021-03-17', 1047419581, '2021-03-24 10:13:24', 0, 30000, ''),
('SE0025', 9, 1, 'SE LE HIZO MANTENIMIENTO A NIVEL  DE SOFTARE AL EQUIPO DEL COORDINADOR DE COMPRAS, SE LE DEBE AUMENTAR LA MEMORIA RAM,  YA QUE SOLO CUENTA CON 2GB Y ES INSUFICIENTE PARA EL TRABAJO DIARIO.\n\nSE LE CONFIGURO NUEVO USUARIO DE ACCESO DE WORD OFFICE A LA SRA JENIFER\n\nSE LE CAMBIO SWICTH DE CONEXION AL EQUIPO DE CONTABILIDAD QUE PRESENTABA FALLAS DE CONEXION.\n\n', '2021-03-20', 1047419581, '2021-03-24 10:16:02', 0, 30000, ''),
('SE0026', 9, 1, 'SE ATENDIO EL LLAMADO SOBRE PROBEMAS CON EL COMANDERO EN EL AREA DE ZONA 6, SE REVISO Y SE LE RESTAURO EL SISTEMA OPERATIVO, SE DA INDICACIONES PARA INSTALAR UNA IMPRESORA EN RED EN LA COCINA DE ZONA 6, PARA NO TENER QUE DEPENDER DE ESTE COMANDERO, QUE HA VENIDO PRESENTANDO FALLAS EN MULTIPLES OCACIONES.', '2021-03-22', 1047419581, '2021-03-24 10:18:25', 0, 30000, ''),
('SE0027', 9, 1, 'SE LE DA SOPORTE REMONTO A LA SRA JANNIER Y SE LE CONFIGURA CONEXION AL SERVIDOR, ADEMAS SE LE CREA USUARIO EN EL APLICATIVO SOFTRESTAURANT.', '2021-03-23', 1047419581, '2021-03-24 10:20:30', 0, 30000, ''),
('SE0028', 4, 1, 'SE REPARO BOCINAS DEL PORTATIL DELL VOSTRO 3560, LAS CUALES SE ENCONTRABAN ROTAS, ADEMAS SE LE INSTALO MICROSOFT OFFICE 2013 ACTIVADO', '2021-03-25', 1047419581, '2021-03-26 07:49:54', 2, 70000, 'FV0076'),
('SE0029', 9, 1, 'EL DIA DE HOY SE INSTALO IMPRESORA DE RED EN LA COCINA DE ZONA 6, ADEMAS ESTA IMPRESORA DE CONFIGURO TODOS LOS COMANDEROS DE ZONA6,BOKA Y MCOCINA, SE PONCHO DOS PUNTO DE RED PARA PODER INSTALAR LA IMPRESORA YA QUE EN LA COCINA NO CUENTAN CON PUNTOS DE RED.', '2021-03-27', 1047419581, '2021-03-29 07:38:20', 0, 50000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigocategoria` int(4) UNSIGNED ZEROFILL NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `usuario_creacion` int(20) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_modificacion` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigocategoria`, `descripcion`, `estado`, `fecha_creacion`, `usuario_creacion`, `fecha_modificacion`, `usuario_modificacion`) VALUES
(0001, 'Memorias RAM', 1, '2021-02-01 13:13:39', 0, '0000-00-00 00:00:00', 0),
(0002, 'Disco duros', 1, '2021-02-01 13:24:36', 0, '0000-00-00 00:00:00', 0),
(0003, 'Pantallas', 1, '2021-02-01 13:53:06', 0, NULL, NULL),
(0004, 'Procesadores', 1, '2021-02-01 13:54:17', 0, NULL, NULL),
(0005, 'Teclados', 1, '2021-02-01 14:00:09', 0, NULL, NULL),
(0006, 'Celulares', 1, '2021-02-01 14:26:57', 0, NULL, NULL),
(0007, 'Accesorios para portatiles', 1, '2021-02-01 17:06:45', 0, NULL, NULL),
(0008, 'Cargadores', 1, '2021-02-02 15:20:33', 0, NULL, NULL),
(0009, 'Partes de portatiles', 1, '2021-02-04 08:05:54', 0, NULL, NULL),
(0010, 'Switches', 1, '2021-02-16 12:27:24', 0, NULL, NULL),
(0011, 'Board', 1, '2021-02-24 07:59:09', 0, NULL, NULL),
(0012, 'PARTES PC', 1, '2021-02-24 09:17:18', 0, NULL, NULL),
(0013, 'Telecomicaciones', 1, '2021-03-17 08:52:40', 1047419581, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL,
  `razonsocial` varchar(150) DEFAULT NULL,
  `nit` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(20) DEFAULT NULL,
  `usuario_modificacio` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla donde se guarda la informacion de los clientes';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `razonsocial`, `nit`, `direccion`, `telefono`, `email`, `estado`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacio`) VALUES
(3, 'Cliente comun', '000', 'No aplica', 'No aplica', 'No aplica', 1, '2021-01-30 11:58:37', '2021-02-18 15:42:00', 0, 0),
(4, 'Laboratorios Ltda de cartagena', '8909401641', 'Manga Cl. 28 #22-175', '3174338234', 'sistemas@laboratoriosltda.com.co', 1, '2021-01-30 12:13:13', '2021-02-23 17:39:48', 0, 0),
(5, 'ESE Clinica de Maternidad Rafael Calvo C.', '806001061-8', 'Barrio Alcibia,sector Maria Auxiliadora', '6724060', 'info@maternidadrafaelcalvo.gov.co', 1, '2021-01-30 13:56:43', '2021-02-09 21:31:02', 0, 0),
(6, 'Carlos Rojas', '45690163', 'Providencia', '300 548-7750', 'crojas@allright-english.com.co', 1, '2021-02-11 07:52:50', '0000-00-00 00:00:00', 0, 0),
(7, 'Ventas mercadolibre', '001', 'No aplica', 'No aplica', 'No aplica', 1, '2021-02-15 08:43:18', '0000-00-00 00:00:00', 0, 0),
(8, 'Ventas Facebook', '0002', 'No aplica', 'No aplica', 'No aplica', 1, '2021-02-15 08:43:36', '0000-00-00 00:00:00', 0, 0),
(9, 'Inversiones M S.A.S.', '900594137-3', 'Bgde Cl 6 3-24', '(+57) 5 6552744', 'inversionesm@gmail.com', 1, '2021-02-22 09:15:41', '2021-02-25 10:17:07', 0, 1047419581),
(10, 'Jorge Luis Mejia Osorio', '73243305', '0000', '3145264892', 'NO APLICA', 1, '2021-03-08 07:45:09', '2021-03-08 15:16:44', 1047419581, 1047419581),
(11, 'Dr Luis Carlos Andrade', '0000', 'Barrio Manga', '3183677998', 'andrade@gmail.com', 1, '2021-03-17 08:56:50', '0000-00-00 00:00:00', 1047419581, 0),
(12, 'Jorge Ramirez', '111111', 'BARRIO ESCALLON VILLA', '3003668879', 'JRAMIREZ@GMAIL.COM', 1, '2021-03-29 07:33:34', '2021-03-29 07:33:48', 1047419581, 1047419581);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivos`
--

CREATE TABLE `consecutivos` (
  `modulo` varchar(45) DEFAULT NULL,
  `prefijo` varchar(45) DEFAULT NULL,
  `consecutivo` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consecutivos`
--

INSERT INTO `consecutivos` (`modulo`, `prefijo`, `consecutivo`) VALUES
('en_articulo', 'EA', 0083),
('sa_articulo', 'SA', 0017),
('ve_articulo', 'FV', 0077),
('ge_servicio', 'SE', 0029);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `razon_social` varchar(150) DEFAULT NULL,
  `nit` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla donde se guarda la informacion de la empresa';

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`razon_social`, `nit`, `direccion`, `telefono`, `email`) VALUES
('JHON JAIRO PALMA CORREA', '1047419581', 'Nvo Porvenir Mza C Lote 10', '3217139945', 'JJPALMA@MISENA.EDU.CO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `identradas` varchar(10) NOT NULL,
  `tipo` int(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `proveedor` int(1) DEFAULT NULL,
  `numero_factura` varchar(155) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `codigo_producto` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `valor_unitario` int(10) DEFAULT NULL,
  `valor_total` int(10) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`identradas`, `tipo`, `proveedor`, `numero_factura`, `fecha`, `codigo_producto`, `cantidad`, `valor_unitario`, `valor_total`, `fecha_registro`, `usuario_registro`, `estado`) VALUES
('EA0072', 02, 6, '', '2021-02-24', 0026, 1, 1, 1, '2021-02-24 12:54:02', 0, 1),
('EA0072', 02, 6, '', '2021-02-24', 0025, 1, 1, 1, '2021-02-24 12:54:02', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0012, 1, 1, 1, '2021-02-24 13:13:51', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0013, 1, 1, 1, '2021-02-24 13:13:51', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0014, 1, 1, 1, '2021-02-24 13:13:51', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0015, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0016, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0017, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0018, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0019, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0020, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0021, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0022, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0023, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0024, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0025, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0073', 01, 6, '', '2021-02-24', 0026, 1, 1, 1, '2021-02-24 13:13:52', 0, 1),
('EA0076', 01, 6, '', '2021-02-25', 0012, 2, 50000, 100000, '2021-02-25 09:42:03', 1047419581, 1),
('EA0077', 02, 6, '', '2021-02-26', 0014, 2, 1, 2, '2021-02-26 08:50:36', 1047419581, 1),
('EA0078', 02, 6, '', '2021-03-08', 0028, 1, 1, 1, '2021-03-08 07:45:58', 1047419581, 1),
('EA0078', 02, 6, '', '2021-03-08', 0029, 1, 1, 1, '2021-03-08 07:45:58', 1047419581, 1),
('EA0079', 01, 6, '', '2021-03-11', 0030, 1, 30000, 30000, '2021-03-11 07:29:03', 1047419581, 1),
('EA0080', 02, 6, '', '2021-03-17', 0031, 1, 1, 1, '2021-03-17 08:53:24', 1047419581, 1),
('EA0081', 02, 6, '', '2021-03-26', 0032, 1, 1, 1, '2021-03-26 07:56:05', 1047419581, 1),
('EA0082', 02, 6, '', '2021-03-29', 0013, 1, 1, 1, '2021-03-29 07:31:35', 1047419581, 1),
('EA0082', 02, 6, '', '2021-03-29', 0032, 2, 1, 2, '2021-03-29 07:31:35', 1047419581, 1),
('EA0083', 02, 6, '', '2021-03-29', 0025, 1, 1, 1, '2021-03-29 11:05:55', 1047427112, 1),
('EA0083', 02, 6, '', '2021-03-29', 0033, 1, 1, 1, '2021-03-29 11:05:56', 1047427112, 1);

--
-- Disparadores `entradas`
--
DELIMITER $$
CREATE TRIGGER `update_costo_compra` AFTER INSERT ON `entradas` FOR EACH ROW BEGIN 

update articulos set costo_compra = new.valor_unitario where codigo = new.codigo_producto;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `entrada_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `entrada_productos` (
`codigo_producto` int(4) unsigned zerofill
,`cantidad` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuppal`
--

CREATE TABLE `menuppal` (
  `idmenu` int(2) UNSIGNED ZEROFILL NOT NULL,
  `menu` varchar(45) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menuppal`
--

INSERT INTO `menuppal` (`idmenu`, `menu`, `icono`, `estado`) VALUES
(01, 'Ventas', '<i class=\"menu-icon fa fa-tags\"></i>', 0),
(02, 'Servicios', '<i class=\"menu-icon fa fa-laptop\"></i>', 0),
(03, 'Almacen', '<i class=\"menu-icon glyphicon glyphicon-th\"></i>', 0),
(04, 'Reportes', '<i class=\"menu-icon glyphicon glyphicon-list-alt\"></i>', 0),
(05, 'Ajustes', '<i class=\"menu-icon fa fa-cogs\"></i>', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` int(2) UNSIGNED ZEROFILL NOT NULL,
  `idmenu` int(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `modulo` varchar(45) DEFAULT NULL,
  `estado` int(1) DEFAULT '0',
  `ruta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `idmenu`, `modulo`, `estado`, `ruta`) VALUES
(01, 01, 'Ventas de articulos', 0, 'ventas'),
(02, 02, 'Cuenta de cobro', 0, 'ventasservicios'),
(03, 02, 'Generar servicio', 0, 'generarservicio'),
(04, 03, 'Entrada de articulos', 0, 'entradaarticulos'),
(05, 03, 'Salida de articulos', 0, 'salidaarticulos'),
(06, 03, 'Articulos', 0, 'articulos'),
(07, 05, 'Generales', 0, 'generales'),
(08, 05, 'Usuarios', 0, 'usuarios'),
(09, 99, 'Pagos', 0, 'pagoscreditos'),
(10, 99, 'Editar Usuarios', 0, 'editarusuario'),
(11, 99, 'Facturas pendientes por cobrar', 0, 'PagosFacturasCreditos'),
(12, 04, 'Detallado de ventas', 0, 'detalladoventa'),
(13, 99, 'Servicios', 0, 'servicios'),
(14, 99, 'Ventas generadas articulos', 0, 'ventasgeneradasarticulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idmovimientos` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `usuario` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla para auditoria';

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idmovimientos`, `tipo`, `documento`, `usuario`, `fecha_registro`) VALUES
(1, 'UPDATE', 'SE0021', 1047419581, '2021-03-25 08:49:01'),
(2, 'UPDATE', 'SE0021', 1047427112, '2021-03-25 08:50:01'),
(3, 'ANULACION', 'SE0021', 1047427112, '2021-03-25 09:57:37'),
(5, 'UPDATE', 'SE0027', 1047419581, '2021-03-25 11:05:26'),
(7, 'UPDATE', 'SE0027', 1047419581, '2021-03-25 11:07:22'),
(8, 'UPDATE', 'SE0027', 1047419581, '2021-03-25 11:07:31'),
(9, 'UPDATE', 'SE0027', 1047419581, '2021-03-25 17:32:57'),
(10, 'UPDATE', 'SE0027', 1047419581, '2021-03-25 17:39:49'),
(11, 'UPDATE', 'SE0029', 1047419581, '2021-03-29 07:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `idobservaciones` int(11) NOT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `observacion` text,
  `usuario_registro` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`idobservaciones`, `documento`, `observacion`, `usuario_registro`, `fecha_registro`) VALUES
(2, 'FV0031', 'SE LE CONFIGURO EL PLAN DE MARCACION Y MENSAJE DE BIENVENIDA, PLANTA TELEFONICA PANASONIC TES824', 'jpalma', '2021-02-23 17:23:36'),
(3, 'FV0032', 'SE LE INSTALO EL SISTEMA OPERATIVO AL SERVIDOR, ADEMAS DE LAS CONFIGURACION DE LOS SERVICIOS DNS, DHCP Y ACTIVE DIRECTORY', 'jpalma', '2021-02-23 17:32:47'),
(4, 'FV0033', 'SE LE CONFIGURO PLAN DE MARCACION Y MENSAJE DE BIENVENIDAD A LA PLANTA TELEFONICA PANASONIC TES824', 'jpalma', '2021-02-23 17:46:53'),
(5, 'FV0034', 'SE HIZO VALIDACION A 4 RIPS DE AMBUQ, 4 RIPS DE CAJACOPI Y 2 RIPS DE DASALUD', 'jpalma', '2021-02-23 17:48:22'),
(6, 'FV0035', 'SE LE CONFIGURO PLAN DE MARCACION Y MENSAJE DE BIENVENIDAD PLANTA TELEFONICA PANASONIC TES824', 'jpalma', '2021-02-23 18:18:26'),
(7, 'FV0036', 'asasasasasasasas', 'jpalma', '2021-02-23 18:22:54'),
(8, 'FV0038', '', 'jpalma', '2021-02-24 09:01:38'),
(9, 'FV0039', 'SE LE VALIDO 5 RIPS DE AMBUQ, 3 DE CAJA COPI Y 2 DE DASALUD', 'jpalma', '2021-02-24 09:14:03'),
(10, 'FV0040', 'SE LE CONFIGURO EL PLAN DE MARCACION Y MENSAJE DE BIENVENIDAD A LA PLANTA TELEFONICA TES824 (PANASONIC)', 'jpalma', '2021-02-24 09:15:00'),
(11, 'FV0044', '', 'jpalma', '2021-02-25 09:30:57'),
(12, 'FV0045', 'SE VALIDO 6 RIPS DE CAJACOPI Y 4 DE AMBUQ', 'jpalma', '2021-02-26 16:52:37'),
(13, 'FV0046', '', 'jpalma', '2021-03-01 13:59:23'),
(14, 'FV0047', '', 'jpalma', '2021-03-01 14:16:59'),
(15, 'FV0048', '', 'jpalma', '2021-03-01 14:34:44'),
(16, 'FV0049', 'Se le realizo los siguuientes trabajos: Se configuro router que esta en la parte de la musica de boka,Se configuro router que esta en la parte de zona 6,Se configuro router que esta en la parte administrativa de inversiones m,Se Enlazo comandero que esta en la entrada de mcocina con la base de datos,Se activo microsoft office 2016 en el portatil de direecion administrativa,Instalación de impresoras ', 'jpalma', '2021-03-04 07:32:26'),
(17, 'FV0051', '', 'jpalma', '2021-03-10 14:11:18'),
(18, 'FV0052', '', 'jpalma', '2021-03-10 14:13:51'),
(19, 'FV0053', '', 'jpalma', '2021-03-10 14:38:28'),
(20, 'FV0054', '', 'jpalma', '2021-03-10 14:39:37'),
(21, 'FV0055', '', 'jpalma', '2021-03-10 15:57:25'),
(22, 'FV0056', '', 'jpalma', '2021-03-10 15:59:58'),
(23, 'FV0057', '', 'jpalma', '2021-03-10 16:02:24'),
(24, 'FV0058', '', 'jpalma', '2021-03-10 16:02:35'),
(25, 'FV0059', '', 'jpalma', '2021-03-10 16:03:25'),
(26, 'FV0060', '', 'jpalma', '2021-03-10 16:03:41'),
(27, 'FV0065', '', 'jpalma', '2021-03-10 16:16:43'),
(28, 'FV0066', '', 'jpalma', '2021-03-10 17:04:02'),
(29, 'FV0067', '', 'jpalma', '2021-03-10 17:40:20'),
(30, 'FV0069', '', 'jpalma', '2021-03-12 13:44:15'),
(31, 'FV0070', '', 'jpalma', '2021-03-15 11:08:48'),
(32, 'FV0071', '', 'jpalma', '2021-03-16 14:56:42'),
(33, 'FV0074', '', 'jpalma', '2021-03-24 07:39:00'),
(34, 'FV0075', '', 'jpalma', '2021-03-24 07:53:15'),
(35, 'FV0076', 'Se entrega portatil ensañado.', 'jpalma', '2021-03-26 07:51:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpagos` int(11) NOT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `totalpagado` int(20) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpagos`, `factura`, `totalpagado`, `estado`, `fecha_registro`, `usuario_registro`) VALUES
(49, 'FV0042', 60000, 0, '2021-03-08 14:30:40', 1047419581),
(50, 'FV0050', 75000, 0, '2021-03-08 14:30:50', 1047419581),
(51, 'FV0065', 150000, 0, '2021-03-10 16:17:04', 1047419581),
(52, 'FV0066', 40000, 0, '2021-03-10 17:24:59', 1047419581),
(53, 'FV0069', 210000, 0, '2021-03-19 14:07:59', 1047419581),
(54, 'FV0073', 80000, 0, '2021-03-24 07:35:37', 1047419581),
(55, 'FV0050', 5000, 0, '2021-03-25 09:22:58', 1047427112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL,
  `identificacion` int(20) DEFAULT NULL,
  `programa` int(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `permiso` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `identificacion`, `programa`, `permiso`) VALUES
(12, 1047419581, 01, 1),
(13, 1047419581, 02, 1),
(14, 1047419581, 03, 1),
(15, 1047419581, 04, 1),
(16, 1047419581, 05, 1),
(17, 1047419581, 06, 1),
(18, 1047419581, 07, 1),
(19, 1047419581, 08, 1),
(20, 1047419581, 09, 1),
(21, 1047419581, 10, 1),
(37, 1047419581, 11, 1),
(53, 1047427112, 01, 0),
(54, 1047427112, 02, 1),
(55, 1047427112, 03, 1),
(56, 1047427112, 04, 1),
(57, 1047427112, 05, 1),
(58, 1047427112, 06, 1),
(59, 1047427112, 07, 0),
(60, 1047427112, 08, 1),
(61, 1047427112, 09, 1),
(62, 1047427112, 10, 1),
(63, 1047427112, 11, 1),
(64, 1047427112, 12, 1),
(68, 1047419581, 12, 1),
(69, 1047419581, 13, 1),
(70, 1047427112, 13, 1),
(71, 1047419581, 14, 1),
(72, 1047427112, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedores` int(11) NOT NULL,
  `razonsocial` varchar(150) DEFAULT NULL,
  `nit` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_creacion` int(20) DEFAULT NULL,
  `usuario_modificacio` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla donde se guarda la informacion de los proveedores';

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedores`, `razonsocial`, `nit`, `direccion`, `telefono`, `email`, `estado`, `fecha_creacion`, `fecha_modificacion`, `usuario_creacion`, `usuario_modificacio`) VALUES
(6, 'Proveedor comun', '0000', 'No aplica', 'No aplica', 'No aplica', 1, '2021-02-01 10:17:12', '2021-02-12 11:46:18', 0, 0),
(7, 'Compras mercadolibre', '0000', 'no aplica', 'no aplica', 'no aplica', 1, '2021-02-09 12:19:37', '2021-02-09 15:11:04', 0, 0),
(8, 'Compras facebook', '0000', 'no aplica', 'no aplica', 'no aplica', 1, '2021-02-09 12:19:45', '0000-00-00 00:00:00', 0, 0),
(9, 'DR LUIS CARLOS ANDRADE', '0000', 'BARRIO MANGA', '3183677998', 'ANDRADE@GMAIL.COM', 0, '2021-03-17 08:55:28', '2021-03-17 08:56:02', 1047419581, 1047419581);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `idsalidas` int(11) NOT NULL,
  `codigo_producto` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `valor` int(20) DEFAULT NULL,
  `documento_salida` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`idsalidas`, `codigo_producto`, `cantidad`, `valor`, `documento_salida`, `fecha`, `usuario_registro`, `fecha_registro`, `tipo`) VALUES
(4, 0026, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(5, 0025, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(6, 0024, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(7, 0023, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(8, 0022, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(9, 0013, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(10, 0014, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(11, 0015, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(12, 0016, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(13, 0017, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(14, 0018, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(15, 0019, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(16, 0021, 1, 1, 'SA0014', '2021-02-24', 0, '2021-02-24 13:43:10', '03'),
(17, 0026, 1, 30000, 'FV0042', '2021-02-24', 0, '2021-02-24 14:15:54', '04'),
(18, 0025, 1, 30000, 'FV0042', '2021-02-24', 0, '2021-02-24 14:15:54', '04'),
(19, 0012, 1, 50000, 'SA0015', '2021-02-25', 1047419581, '2021-02-25 09:22:57', '03'),
(21, 0012, 1, 50000, 'SA0016', '2021-02-25', 1047419581, '2021-02-25 11:28:53', '03'),
(22, 0028, 1, 50000, 'FV0050', '2021-03-08', 1047419581, '2021-03-08 07:46:57', '04'),
(23, 0029, 1, 30000, 'FV0050', '2021-03-08', 1047419581, '2021-03-08 07:46:57', '04'),
(26, 0031, 1, 80000, 'FV0073', '2021-03-18', 1047419581, '2021-03-18 11:27:48', '04'),
(27, 0032, 2, 60000, 'FV0077', '2021-03-29', 1047419581, '2021-03-29 07:34:22', '04'),
(28, 0013, 1, 30000, 'FV0077', '2021-03-29', 1047419581, '2021-03-29 07:34:22', '04'),
(29, 0030, 1, 30000, 'SA0017', '2021-03-29', 1047419581, '2021-03-29 11:09:36', '03');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `salida_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `salida_productos` (
`codigo_producto` int(4) unsigned zerofill
,`cantidad` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa_articulo`
--

CREATE TABLE `tarifa_articulo` (
  `idtarifa_articulo` int(5) UNSIGNED ZEROFILL NOT NULL,
  `cod_articulo` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `tarifa_anterior` int(20) DEFAULT NULL,
  `tarifa_actual` int(20) DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `usuario_modifica` int(20) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifa_articulo`
--

INSERT INTO `tarifa_articulo` (`idtarifa_articulo`, `cod_articulo`, `tarifa_anterior`, `tarifa_actual`, `usuario_registro`, `fecha_registro`, `usuario_modifica`, `fecha_modifica`) VALUES
(00001, 0012, 150002, 150000, 0, '0000-00-00 00:00:00', 1047419581, '2021-02-26 08:52:19'),
(00002, 0013, 80000, 30000, 0, '2021-02-15 13:03:21', 1047419581, '2021-03-29 07:32:24'),
(00003, 0018, NULL, 70000, 0, '2021-02-15 13:29:00', 0, '0000-00-00 00:00:00'),
(00004, 0016, 75000, 50000, 0, '2021-02-15 13:34:27', 0, '2021-02-15 15:23:05'),
(00005, 0017, 40000, 50000, 0, '2021-02-15 14:17:41', 0, '2021-02-15 14:18:20'),
(00006, 0015, 0, 85000, 0, '2021-02-15 15:29:11', 0, '0000-00-00 00:00:00'),
(00007, 0024, 24000, 30000, 0, '2021-02-15 17:13:18', 0, '2021-02-15 17:13:38'),
(00008, 0023, 0, 20000, 0, '2021-02-16 12:35:44', 0, '0000-00-00 00:00:00'),
(00009, 0025, 30000, 100000, 0, '2021-02-24 08:01:15', 1047427112, '2021-03-29 11:06:24'),
(00010, 0026, 0, 30000, 0, '2021-02-24 08:01:29', 0, '0000-00-00 00:00:00'),
(00011, 0014, 0, 15000, 1047419581, '2021-02-26 08:51:35', 0, '0000-00-00 00:00:00'),
(00012, 0020, 0, 20000, 1047419581, '2021-02-26 08:51:46', 0, '0000-00-00 00:00:00'),
(00013, 0019, 0, 25000, 1047419581, '2021-02-26 10:58:06', 0, '0000-00-00 00:00:00'),
(00014, 0027, 0, 70000, 1047419581, '2021-03-04 07:57:49', 0, '0000-00-00 00:00:00'),
(00015, 0028, 0, 50000, 1047419581, '2021-03-08 07:42:40', 0, '0000-00-00 00:00:00'),
(00016, 0029, 0, 30000, 1047419581, '2021-03-08 07:42:51', 0, '0000-00-00 00:00:00'),
(00017, 0030, 0, 70000, 1047419581, '2021-03-11 07:29:45', 0, '0000-00-00 00:00:00'),
(00018, 0031, 0, 80000, 1047419581, '2021-03-17 08:53:43', 0, '0000-00-00 00:00:00'),
(00019, 0032, 40000, 30000, 1047419581, '2021-03-26 07:56:57', 1047419581, '2021-03-29 07:32:36'),
(00020, 0033, 0, 50000, 1047427112, '2021-03-29 11:06:40', 0, '0000-00-00 00:00:00');

--
-- Disparadores `tarifa_articulo`
--
DELIMITER $$
CREATE TRIGGER `UPDATE_TARIFA_ANTERIOR` BEFORE UPDATE ON `tarifa_articulo` FOR EACH ROW BEGIN

	SET NEW.tarifa_anterior = OLD.tarifa_actual;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `idtipo_servicio` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`idtipo_servicio`, `tipo`, `usuario_registro`, `fecha_registro`) VALUES
(1, 'SOPORTE TECNOLOGICO', 1047419581, '0000-00-00 00:00:00'),
(2, 'VALIDACION RIPS', 1047419581, NULL),
(3, 'VENTA DE ARTICULOS', 1047419581, '2021-03-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `identificacion` int(20) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `perfil` int(1) DEFAULT '1',
  `fecha_registro` datetime DEFAULT NULL,
  `usuario_registro` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombres`, `apellidos`, `identificacion`, `password`, `perfil`, `fecha_registro`, `usuario_registro`, `estado`) VALUES
('JHON JAIRO', 'PALMA CORREA', 1047419581, 'f8aae089eda7614a0c4d4a931ed62921', 1, '2021-02-24 16:57:16', 'jpalma', 0),
('ESTEFANI', 'SIMANCAS ZABALETA', 1047427112, '846faadb81b359b91ae66684472f8d97', 1, '2021-03-17 14:12:12', '1047419581', 0);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `insert permisos` AFTER INSERT ON `usuarios` FOR EACH ROW begin

INSERT INTO permisos (identificacion, programa, permiso)
  SELECT new.identificacion,idmodulo,1
  FROM modulos;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
  `cliente` int(10) DEFAULT NULL,
  `cod_articulo` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `valor_unitario` int(10) DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventas`, `factura`, `tipo`, `cliente`, `cod_articulo`, `cantidad`, `valor_unitario`, `total`, `usuario_registro`, `fecha_registro`) VALUES
(4, 'FV0042', 2, 8, 0026, 1, 30000, 30000, 0, '2021-02-24 14:15:54'),
(5, 'FV0042', 2, 8, 0025, 1, 30000, 30000, 0, '2021-02-24 14:15:54'),
(6, 'FV0050', 2, 10, 0028, 1, 50000, 50000, 1047419581, '2021-02-08 07:46:57'),
(7, 'FV0050', 2, 10, 0029, 1, 30000, 30000, 1047419581, '2021-03-08 07:46:57'),
(10, 'FV0073', 2, 11, 0031, 1, 80000, 80000, 1047419581, '2021-03-18 11:27:48'),
(11, 'FV0077', 1, 12, 0032, 2, 30000, 60000, 1047419581, '2021-03-29 07:34:22'),
(12, 'FV0077', 1, 12, 0013, 1, 30000, 30000, 1047419581, '2021-03-29 07:34:22');

--
-- Disparadores `ventas`
--
DELIMITER $$
CREATE TRIGGER `insert_salidas` AFTER INSERT ON `ventas` FOR EACH ROW begin 

INSERT INTO facturafacil.salidas
(codigo_producto, cantidad, valor, documento_salida, fecha, usuario_registro, fecha_registro, tipo)
VALUES(new.cod_articulo, new.cantidad, new.total, new.factura, new.fecha_registro, new.usuario_registro, new.fecha_registro, '04');
 


end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_creditos`
--

CREATE TABLE `ventas_creditos` (
  `idventas_creditos` int(11) NOT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `clientes` int(10) DEFAULT NULL,
  `total_credito` int(10) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `indicador` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas_creditos`
--

INSERT INTO `ventas_creditos` (`idventas_creditos`, `factura`, `clientes`, `total_credito`, `fecha_registro`, `indicador`) VALUES
(24, 'FV0042', 8, 60000, '2021-02-24 14:15:54', 0),
(27, 'FV0050', 10, 80000, '2021-03-08 07:46:57', 0),
(31, 'FV0065', 9, 150000, '2021-03-10 16:16:43', 0),
(32, 'FV0066', 5, 40000, '2021-03-10 17:04:02', 0),
(35, 'FV0069', 9, 210000, '2021-03-12 13:44:15', 0),
(36, 'FV0070', 6, 120000, '2021-03-15 11:08:48', 1),
(37, 'FV0071', 5, 44000, '2021-03-16 14:56:42', 1),
(38, 'FV0073', 11, 80000, '2021-03-18 11:27:48', 0),
(39, 'FV0076', 4, 70000, '2021-03-26 07:51:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_servicio`
--

CREATE TABLE `ventas_servicio` (
  `idventas_servicio` int(11) NOT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `cliente` int(10) DEFAULT NULL,
  `tiposervicio` varchar(45) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `usuario_registro` int(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='			';

--
-- Volcado de datos para la tabla `ventas_servicio`
--

INSERT INTO `ventas_servicio` (`idventas_servicio`, `factura`, `tipo`, `cliente`, `tiposervicio`, `total`, `usuario_registro`, `fecha_registro`, `estado`) VALUES
(12, 'FV0065', 2, 9, 'SOPORTE TECNOLOGICO', 150000, 1047419581, '2021-02-10 16:16:43', 0),
(13, 'FV0066', 2, 5, 'VALIDACION RIPS', 20000, 1047419581, '2021-02-10 17:04:02', 0),
(14, 'FV0066', 2, 5, 'VALIDACION RIPS', 20000, 1047419581, '2021-02-10 17:04:02', 0),
(17, 'FV0069', 2, 9, 'SOPORTE TECNOLOGICO', 60000, 1047419581, '2021-03-12 13:44:15', 0),
(18, 'FV0069', 2, 9, 'SOPORTE TECNOLOGICO', 30000, 1047419581, '2021-03-12 13:44:15', 0),
(19, 'FV0069', 2, 9, 'SOPORTE TECNOLOGICO', 30000, 1047419581, '2021-03-12 13:44:15', 0),
(20, 'FV0069', 2, 9, 'SOPORTE TECNOLOGICO', 30000, 1047419581, '2021-03-12 13:44:15', 0),
(21, 'FV0069', 2, 9, 'VENTA DE ARTICULOS', 60000, 1047419581, '2021-03-12 13:44:15', 0),
(22, 'FV0070', 2, 6, 'SOPORTE TECNOLOGICO', 120000, 1047419581, '2021-03-15 11:08:48', 0),
(23, 'FV0071', 2, 5, 'VALIDACION RIPS', 20000, 1047419581, '2021-03-16 14:56:42', 0),
(24, 'FV0071', 2, 5, 'VALIDACION RIPS', 20000, 1047419581, '2021-03-16 14:56:42', 0),
(25, 'FV0071', 2, 5, 'VALIDACION RIPS', 4000, 1047419581, '2021-03-16 14:56:42', 0),
(26, 'FV0074', 1, 4, 'SOPORTE TECNOLOGICO', 150000, 1047419581, '2021-03-24 07:39:00', 0),
(27, 'FV0075', 1, 11, 'SOPORTE TECNOLOGICO', 20000, 1047419581, '2021-03-24 07:53:15', 0),
(28, 'FV0076', 2, 4, 'SOPORTE TECNOLOGICO', 70000, 1047419581, '2021-03-26 07:51:24', 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `entrada_productos`
--
DROP TABLE IF EXISTS `entrada_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entrada_productos`  AS  select `entradas`.`codigo_producto` AS `codigo_producto`,sum(`entradas`.`cantidad`) AS `cantidad` from `entradas` group by `entradas`.`codigo_producto` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `salida_productos`
--
DROP TABLE IF EXISTS `salida_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `salida_productos`  AS  select `salidas`.`codigo_producto` AS `codigo_producto`,sum(`salidas`.`cantidad`) AS `cantidad` from `salidas` group by `salidas`.`codigo_producto` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `relacion_categoria` (`idcategoria`);

--
-- Indices de la tabla `cargo_servicio`
--
ALTER TABLE `cargo_servicio`
  ADD PRIMARY KEY (`idcargo_servicio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigocategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idclientes`);

--
-- Indices de la tabla `menuppal`
--
ALTER TABLE `menuppal`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idmovimientos`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`idobservaciones`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpagos`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedores`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idsalidas`);

--
-- Indices de la tabla `tarifa_articulo`
--
ALTER TABLE `tarifa_articulo`
  ADD PRIMARY KEY (`idtarifa_articulo`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`idtipo_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventas`);

--
-- Indices de la tabla `ventas_creditos`
--
ALTER TABLE `ventas_creditos`
  ADD PRIMARY KEY (`idventas_creditos`);

--
-- Indices de la tabla `ventas_servicio`
--
ALTER TABLE `ventas_servicio`
  ADD PRIMARY KEY (`idventas_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codigo` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigocategoria` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menuppal`
--
ALTER TABLE `menuppal`
  MODIFY `idmenu` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idmovimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `idobservaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idsalidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tarifa_articulo`
--
ALTER TABLE `tarifa_articulo`
  MODIFY `idtarifa_articulo` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `idtipo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas_creditos`
--
ALTER TABLE `ventas_creditos`
  MODIFY `idventas_creditos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ventas_servicio`
--
ALTER TABLE `ventas_servicio`
  MODIFY `idventas_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `relacion_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`codigocategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
