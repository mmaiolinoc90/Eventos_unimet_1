-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2017 a las 18:01:31
-- Versión del servidor: 5.1.53
-- Versión de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `unimet_eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(249) NOT NULL,
  `Apellido` varchar(249) NOT NULL,
  `cedula` varchar(249) NOT NULL,
  `correo` varchar(249) NOT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `Nombre`, `Apellido`, `cedula`, `correo`) VALUES
(1, 'Alfredo', 'Morales', '18244715', 'alfmorapime@gmail.com'),
(3, 'Mariana', 'Maiolino', '18942880', 'mmaiolinoc@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_banners`
--

CREATE TABLE IF NOT EXISTS `administrador_banners` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) NOT NULL,
  `img` varchar(249) NOT NULL,
  `pagina_siguiente` varchar(249) NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `administrador_banners`
--

INSERT INTO `administrador_banners` (`id_banner`, `nombre`, `img`, `pagina_siguiente`) VALUES
(1, 'Administradores', 'admin.png', 'administradores.php'),
(2, 'Servicios', 'servicios.png', 'servicios.php'),
(3, 'Localidad', 'localidad.php', 'localidad.php'),
(4, 'Eventos Internos', 'eventosI.php', 'eventos_internos.php'),
(5, 'Eventos Externos', 'eventosE', 'eventos_externos.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_externa`
--

CREATE TABLE IF NOT EXISTS `agenda_externa` (
  `id_agenda_externa` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_externo` int(11) NOT NULL,
  `id_evento_externo` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_inicio` varchar(249) DEFAULT NULL,
  `hora_fin` varchar(249) DEFAULT NULL,
  `localidad_id_localidad` int(11) NOT NULL,
  `servicio_adicional` varchar(249) NOT NULL,
  `servicios_id_servicios` varchar(249) NOT NULL,
  `Cantidad_servicios` varchar(249) DEFAULT NULL,
  `Observaciones` varchar(249) NOT NULL,
  PRIMARY KEY (`id_agenda_externa`),
  KEY `fk_agenda_externa_localidad1_idx` (`localidad_id_localidad`),
  KEY `fk_agenda_externa_servicios1_idx` (`servicios_id_servicios`),
  KEY `fk_agenda_externa_usuario_externo` (`id_usuario_externo`),
  KEY `fk_agenda_externa_evento_externo` (`id_evento_externo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `agenda_externa`
--

INSERT INTO `agenda_externa` (`id_agenda_externa`, `id_usuario_externo`, `id_evento_externo`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `localidad_id_localidad`, `servicio_adicional`, `servicios_id_servicios`, `Cantidad_servicios`, `Observaciones`) VALUES
(10, 1, 7, '0000-00-00', '0000-00-00', 'r', 'r', 2, 'por ahora', '13,17,64,69', '5,44,4,1', ''),
(11, 1, 8, '2017-02-09', '2017-02-16', '16:04', '16:04', 5, 'por ahora', '13', '1', 'wert'),
(12, 1, 14, '2017-04-28', '2017-04-28', '01:01', '16:04', 20, 'NULL', '21', 'null', 'prueba 222222'),
(13, 1, 14, '2017-04-28', '2017-04-28', '01:01', '16:04', 20, 'NULL', '21', 'null', 'prueba 222222'),
(14, 1, 14, '2017-04-28', '2017-04-28', '13:01', '20:08', 18, 'NULL', '18', 'null', 'alskjf'),
(15, 1, 14, '2017-04-28', '2017-04-28', '13:01', '20:08', 18, 'NULL', '18', 'null', 'alskjf'),
(16, 1, 14, '2017-04-28', '2017-04-28', '13:01', '20:08', 18, 'NULL', '18', 'null', 'alskjf'),
(17, 1, 14, '2017-04-28', '2017-04-28', '13:01', '20:08', 18, 'NULL', '18', 'null', 'alskjf'),
(18, 1, 14, '2017-04-28', '2017-04-28', '13:01', '20:08', 18, 'NULL', '18', 'null', 'alskjf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_interna`
--

CREATE TABLE IF NOT EXISTS `agenda_interna` (
  `id_agenda_interna` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_interno` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `localidad_id_localidad` int(11) NOT NULL,
  `servicios_id_servicios` varchar(249) NOT NULL,
  `Cantidad_servicios` varchar(249) NOT NULL,
  `observaciones` varchar(249) NOT NULL,
  `id_aprobador_localidad` int(11) DEFAULT NULL,
  `status_localidad` varchar(249) DEFAULT NULL,
  PRIMARY KEY (`id_agenda_interna`),
  KEY `fk_agenda_localidad1_idx` (`localidad_id_localidad`),
  KEY `fk_agenda_usuario_interno_idx` (`id_usuario_interno`),
  KEY `fk_agenda_interna_evento_interno` (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `agenda_interna`
--

INSERT INTO `agenda_interna` (`id_agenda_interna`, `id_usuario_interno`, `id_evento`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `localidad_id_localidad`, `servicios_id_servicios`, `Cantidad_servicios`, `observaciones`, `id_aprobador_localidad`, `status_localidad`) VALUES
(1, 1, 1, '2017-05-24', '2017-05-24', '16:04:00', '16:06:00', 30, '65', 'null', 'preba de servicios', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobador`
--

CREATE TABLE IF NOT EXISTS `aprobador` (
  `id_aprobador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(249) NOT NULL,
  `Apellido` varchar(249) NOT NULL,
  `correo` varchar(249) NOT NULL,
  `id_tipo_aprobacion` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  PRIMARY KEY (`id_aprobador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `aprobador`
--

INSERT INTO `aprobador` (`id_aprobador`, `Nombre`, `Apellido`, `correo`, `id_tipo_aprobacion`, `id_servicio`, `id_localidad`) VALUES
(1, 'Alfredo', 'Morales', 'alfmorapime@gmail.com', 1, 18, 0),
(2, 'Ricardo', 'Carvajal', 'ricardo@gmail.com', 2, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_index`
--

CREATE TABLE IF NOT EXISTS `banner_index` (
  `ID_Banner_index` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(249) NOT NULL,
  `img` varchar(249) NOT NULL,
  `pagina_siguiente` varchar(249) NOT NULL,
  PRIMARY KEY (`ID_Banner_index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `banner_index`
--

INSERT INTO `banner_index` (`ID_Banner_index`, `Nombre`, `img`, `pagina_siguiente`) VALUES
(1, 'Solicita presupuesto para tu evento', 'presupuesto.png', 'presupuesto.php'),
(2, 'Gestiona tu evento', 'event.png', 'gestion_evento.php'),
(3, 'Conoce nuestras instalaciones', 'universidad.png', 'instalaciones.php'),
(4, 'Quieres estar enterado de nuestros eventos', 'mail.png', 'mail.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_complementarios`
--

CREATE TABLE IF NOT EXISTS `datos_complementarios` (
  `id_datos_comple` int(11) NOT NULL AUTO_INCREMENT,
  `numero_extension` int(11) DEFAULT NULL,
  `dependencia_id_dependencia` int(11) NOT NULL,
  `usuario_interno_id_usuario_interno` int(11) NOT NULL,
  PRIMARY KEY (`id_datos_comple`),
  KEY `fk_datos_comple_dependencia1_idx` (`dependencia_id_dependencia`),
  KEY `fk_datos_comple_usuario_interno1_idx` (`usuario_interno_id_usuario_interno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Volcar la base de datos para la tabla `datos_complementarios`
--

INSERT INTO `datos_complementarios` (`id_datos_comple`, `numero_extension`, `dependencia_id_dependencia`, `usuario_interno_id_usuario_interno`) VALUES
(63, 123, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE IF NOT EXISTS `dependencia` (
  `id_dependencia` int(11) NOT NULL AUTO_INCREMENT,
  `dependencia` varchar(249) DEFAULT NULL,
  `jefe` varchar(249) DEFAULT NULL,
  PRIMARY KEY (`id_dependencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`id_dependencia`, `dependencia`, `jefe`) VALUES
(2, 'Seleccione la dependecia correspondiente', 'Juan Morales'),
(5, 'Departamento de Idiomas', 'Maria Morales'),
(6, 'Departamento de Ingles', 'Fran Garcia'),
(7, 'Departamento de Deportes', 'Luis Herandez'),
(8, 'Departamento de Matematicas', 'Fabian Castro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_externo`
--

CREATE TABLE IF NOT EXISTS `evento_externo` (
  `id_evento_externo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_evento` varchar(249) DEFAULT NULL,
  `des_evento` varchar(249) DEFAULT NULL,
  `cant_per` varchar(249) DEFAULT NULL,
  `fecha_solicitud` varchar(249) DEFAULT NULL,
  `status` varchar(249) NOT NULL,
  `evento_img` varchar(249) NOT NULL,
  `requiere_entradas` varchar(2) DEFAULT NULL,
  `usuario_externo_id_usuario_externo` int(11) NOT NULL,
  PRIMARY KEY (`id_evento_externo`),
  KEY `fk_evento_externo_usuario_externo1_idx` (`usuario_externo_id_usuario_externo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `evento_externo`
--

INSERT INTO `evento_externo` (`id_evento_externo`, `titulo_evento`, `des_evento`, `cant_per`, `fecha_solicitud`, `status`, `evento_img`, `requiere_entradas`, `usuario_externo_id_usuario_externo`) VALUES
(6, 'Prueba 1 de rquiere  venta entradas ', 'Esta es la primera prueba', '34', '26/1/2017 20:25.58', 'POR APROBAR', 'WIN_20150601_193222.JPG', 'SI', 3),
(7, 'Prueba servicios', 'Prueba', '45', '15/2/2017 17:19.42', 'NO APROBADO', 'ALFMORAPIME - WIN_20140912_095120.JPG', NULL, 1),
(8, 'prueba', 'prueba', 'prueba', '18/2/2017 23:38.34', 'NO APROBADO', 'ALFMORAPIME - WIN_20140912_095120.JPG', NULL, 1),
(10, 'Prueba Externo', 'Prueba Externo 1', '123', '27/4/2017 10:16.41', 'NO APROBADO', '', NULL, 1),
(11, 'Prueba Externo', 'Prueba Externo 1', '123', '27/4/2017 10:17.36', 'NO APROBADO', '', NULL, 1),
(12, 'Prueba externo 2', 'Prueba entradas externo', '100', '27/4/2017 10:25.19', 'NO APROBADO', '', 'SI', 1),
(13, 'Prueba poster 1', 'prueba poster 2 externo', '200', '27/4/2017 10:26.39', 'NO APROBADO', 'No cuenta con poster', 'NO', 1),
(14, 'Prueba poster 1', 'prueba poster 2 externo', '200', '27/4/2017 10:31.30', 'NO APROBADO', 'No cuenta con poster', 'NO', 1),
(15, 'prueba', 'prueba', '1', '27/4/2017 10:38.14', 'NO APROBADO', 'map-image.png', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_interno`
--

CREATE TABLE IF NOT EXISTS `evento_interno` (
  `id_evento_interno` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_evento` varchar(249) DEFAULT NULL,
  `des_evento` varchar(249) DEFAULT NULL,
  `cant_per` varchar(249) DEFAULT NULL,
  `inst_aliada` varchar(249) DEFAULT NULL,
  `financiamiento` varchar(249) DEFAULT NULL,
  `fecha_solicitud` varchar(249) DEFAULT NULL,
  `status` varchar(249) DEFAULT NULL,
  `evento_img` varchar(249) DEFAULT NULL,
  `usuario_interno_id_usuario_interno` int(11) NOT NULL,
  PRIMARY KEY (`id_evento_interno`),
  KEY `fk_evento_interno_usuario_interno1_idx` (`usuario_interno_id_usuario_interno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `evento_interno`
--

INSERT INTO `evento_interno` (`id_evento_interno`, `titulo_evento`, `des_evento`, `cant_per`, `inst_aliada`, `financiamiento`, `fecha_solicitud`, `status`, `evento_img`, `usuario_interno_id_usuario_interno`) VALUES
(1, 'Prueba final registro evento', 'Prueba qldncdfbsk', '120', 'No cuenta con una instituciÃ³n aliada', 'SI', '1/5/2017 19:46.50', 'NO APROBADO', 'No cuenta con poster', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `ID_header` int(11) NOT NULL AUTO_INCREMENT,
  `Logo_img` varchar(249) NOT NULL,
  PRIMARY KEY (`ID_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `header`
--

INSERT INTO `header` (`ID_header`, `Logo_img`) VALUES
(1, 'logo-universidad-metropolitana.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) DEFAULT NULL,
  `descripcion` varchar(249) DEFAULT NULL,
  `capacidad` varchar(249) DEFAULT NULL,
  `img` varchar(249) DEFAULT NULL,
  `costo` varchar(249) DEFAULT NULL,
  PRIMARY KEY (`id_localidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcar la base de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id_localidad`, `nombre`, `descripcion`, `capacidad`, `img`, `costo`) VALUES
(2, 'Auditorio Manoa', 'Costo de alquiler:', '176', 'auditorio_manoa.jpg', '5000'),
(3, 'Auditorio Pensieri', 'Costo de alquiler:', '120', 'auditorio_pensieri.jpg', '5000'),
(4, 'Auditorio Polar', 'Costo de alquiler:', '140', 'auditorio_polar.jpg', '5000'),
(5, 'Paraninfo', 'Costo de alquiler: Sin monto estipulado', '473', 'paraninfo.jpg', '0'),
(6, 'Aulas con pupitres (p)', 'Costo de alquiler:', '30', 'aula_pupitres.jpg', '1500'),
(7, 'Aulas con pupitres (g)', 'Costo de alquiler:', '80', 'aula_pupitres.jpg', '1500'),
(8, 'Aulas Edif. Eugenio Mendoza G. (p)', 'Costo de alquiler:', '31', 'AULAS_EDIF_EUGENIO_MENDOZA.jpg', '2250'),
(9, 'Aulas Edif. Eugenio Mendoza G. (g)', 'Costo de alquiler:', '41', 'AULAS_EDIF_EUGENIO_MENDOZA.jpg', '2250'),
(10, 'Sala Los Fundadores', 'Costo de alquiler: Sin monto estipulado', '40', 'fundadores.jpg', '0'),
(11, 'Sala Jose Abdala', 'Costo de alquiler: Sin monto estipulado', '42', 'sala_jose_abdala.jpg', '0'),
(12, 'Auditorio Julio Sosa Rodriguez', 'Costo de alquiler:', '94', 'auditorio_julio_sosa_rodriguez.jpg', '5000'),
(13, 'Auditorio Ana Teresa Arismendi (p)', 'Costo de alquiler:', '50', 'auditorio_ana_teresa_arismendi.jpg', '3000'),
(14, 'Auditorio Ana Teresa Arismendi (g)', 'Costo de alquiler:', '90', 'auditorio_ana_teresa_arismendi.jpg', '3000'),
(15, 'Laboratorios de Computacion (p)', 'Costo de alquiler:', '10', 'laboratorios_computacion.jpg', '10000'),
(16, 'Laboratorios de Computacion (g)', 'Costo de alquiler:', '31', 'laboratorios_computacion.jpg', '10000'),
(17, 'Anfiteatro Azotea Edif. Mod. Aulas', 'Costo de alquiler: Sin monto estipulado', '150', 'anfiteatro_asotea_mod_aulas.jpg', '0'),
(18, 'Aula A2-000. Lagrima', 'Costo de alquiler: Sin monto estipulado', '40', 'aula_A2-000.jpg', '0'),
(19, 'Aula A1-001. Sala de juicios', 'Costo de alquiler: Sin monto estipulado', '50', 'aula_A1-001_Sala_Juicios.jpg', '0'),
(20, 'Aulas Planta Baja (p)', 'Costo de alquiler: Sin monto estipulado', '30', 'aulas_planta_alta.jpg', '0'),
(21, 'Aulas Planta Baja (p)', 'Costo de alquiler: Sin monto estipulado', '40', 'aulas_planta_alta.jpg', '0'),
(22, 'Jardin Planta Baja (Mod. Educacion)', 'Costo de alquiler: Sin monto estipulado', 'Área: 500 M2 (aprox)', 'jardin_planta_baja.jpg', '0'),
(23, 'Sala Thespys (Mod. Arboleda)', 'Costo de alquiler: Sin monto estipulado', '45', 'sala_thespys.jpg', '0'),
(24, 'Estacionamiento A', 'Costo de alquiler: Sin monto estipulado', '390 puestos, área aprox. 13.634 m2', 'estacionamiento_A.jpg', '0'),
(25, 'Estacionamiento B', 'Costo de alquiler: Sin monto estipulado', '73 puestos, área aprox. 2.227 m2', 'estacionamiento_B.jpg', '0'),
(26, 'Estacionamiento C', 'Costo de alquiler: Sin monto estipulado', '143 puestos, área aprox. 4.889 m2', 'estacionamiento_C.jpg', '0'),
(27, 'Estacionamiento D', 'Costo de Alquiler: Sin monto estipulado', '526 puestos, área aprox. 13.600 m2', 'estacionamiento_D.jpg', '0'),
(28, 'Estacionamiento E', 'Costo de Alquiler: Sin monto estipulado', '402 puestos, área aprox. 11.234 m2', 'estacionamiento_E.jpg', '0'),
(29, 'Estacionamiento F', 'Costo de Alquiler: Sin monto estipulado', '87 puestos, área aprox. 2.298 m2', 'estacionamiento_F.jpg', '0'),
(30, 'Estacionamiento G', 'Costo de Alquiler: Sin monto estipulado', '65 puestos, área aprox. 2.043 m2', 'estacionamiento_G.jpg', '0'),
(31, 'Estacionamiento H', 'Costo de Alquiler: Sin monto estipulado', '106 puestos, área aprox. 2.561 m2', 'estacionamiento_H.jpg', '0'),
(32, 'Estacionamiento I', 'Costo de Alquiler: Sin monto estipulado', '233 puestos, área aprox. 6.157 m2', 'estacionamiento_I.jpg', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) DEFAULT NULL,
  `id_tipo_servicio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servicios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Volcar la base de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `nombre`, `id_tipo_servicio`) VALUES
(13, 'Personal de Protocolo', 1),
(14, 'Maestro de Ceremonia', 1),
(15, 'Laptop', 2),
(16, 'Video Beam', 2),
(17, 'Pantalla', 2),
(18, 'Microfono', 2),
(19, 'Grabacion de Audio', 2),
(20, 'Otros', 2),
(21, 'Servicio Medico', 3),
(22, 'Servicio de Ambulancia', 3),
(23, 'Video Conferencia', 4),
(24, 'Wifi abierto', 4),
(25, 'Servicio de Vigilancia', 5),
(26, 'Personal Mantenimiento', 6),
(27, 'Electricistas', 6),
(28, 'Refrigerio Matutino', 7),
(29, 'Refrigerio Vespertino', 7),
(30, 'Desayuno Almuerzo Cena', 7),
(31, 'Agua Mineral', 7),
(32, 'Jugos', 7),
(33, 'Servicio de Cafe', 7),
(34, 'Pasapalos', 7),
(35, 'Brindis (Bebidas)', 7),
(36, 'Otros', 7),
(37, 'Alquiler de Sillas', 8),
(38, 'Alquiler de Mesones', 8),
(39, 'Alquiler de Copas', 8),
(40, 'Mobiliario Lounge', 8),
(41, 'Alquiler de Tabiqueria', 8),
(42, 'Decoracion', 8),
(43, 'Plantas Ornamentales', 8),
(44, 'Alquiler de Toldos', 8),
(45, 'Otros ', 8),
(46, 'Servicio de Traslado desde y hacia la UNIMET', 9),
(47, 'Transporte Interno', 9),
(48, 'Habitacion Individual o doble', 10),
(49, 'Fecha llegada y salida', 10),
(50, 'Incluye comida', 10),
(51, 'No incluye comida', 10),
(52, 'Traduccion simultanea', 11),
(53, 'Fotografos externos', 12),
(54, 'Mesones', 13),
(55, 'Sillas', 13),
(56, 'Podium', 13),
(57, 'Tarima-Escaleras', 13),
(58, 'Postes/Separadores', 13),
(59, 'Plantas Ornamentales', 13),
(60, 'Bandera Institucional', 13),
(61, 'Bandera de Venezuela', 13),
(62, 'Bandera Otros Paises', 13),
(63, 'Elaboracion de Nota de prensa', 14),
(64, 'Difusion en medios de comunicacion', 14),
(65, 'Gira de medios', 14),
(66, 'Difusion en Redes Sociales', 14),
(67, 'Otros', 14),
(68, 'Pendon', 15),
(69, 'Afiche', 15),
(70, 'Banner', 15),
(71, 'Tarjeta de invitacion digital', 15),
(72, 'Programa de mano', 15),
(73, 'Otros', 15),
(74, 'Impresion', 15),
(75, 'Registro audiovisual del evento (Fotos)', 16),
(76, 'Registro audiovisual del evento (Video)', 16),
(77, 'Otros', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_aprobador`
--

CREATE TABLE IF NOT EXISTS `tipo_aprobador` (
  `id_tipo_aprobador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) NOT NULL,
  PRIMARY KEY (`id_tipo_aprobador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tipo_aprobador`
--

INSERT INTO `tipo_aprobador` (`id_tipo_aprobador`, `nombre`) VALUES
(1, 'Servicios'),
(2, 'Localidad'),
(3, 'Evento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
  `id_tipo_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcar la base de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id_tipo_servicio`, `nombre`) VALUES
(1, 'Protocolo y Atencion al Publico'),
(2, 'Audiovisuales'),
(3, 'Seguridad Laboral'),
(4, 'Internet y Redes'),
(5, 'Proteccion'),
(6, 'Servicios Generales'),
(7, 'Servicios de Alimentacion'),
(8, 'Agencia de Festejos'),
(9, 'Transporte'),
(10, 'Reservacion de Hospedaje'),
(11, 'Traduccion Simultanea'),
(12, 'Fotografos Externos'),
(13, 'Materiales UNIMET'),
(14, 'Cobertura de Medios'),
(15, 'Diseño de materiales y promocion'),
(16, 'Piezas Audiovisuales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_externo`
--

CREATE TABLE IF NOT EXISTS `usuario_externo` (
  `id_usuario_externo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) DEFAULT NULL,
  `apellido` varchar(249) DEFAULT NULL,
  `rif` varchar(249) DEFAULT NULL,
  `correo` varchar(249) DEFAULT NULL,
  `nro_telefono` varchar(249) DEFAULT NULL,
  `empresa` varchar(249) DEFAULT NULL,
  `cargo_solicitante` varchar(249) NOT NULL,
  PRIMARY KEY (`id_usuario_externo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `usuario_externo`
--

INSERT INTO `usuario_externo` (`id_usuario_externo`, `nombre`, `apellido`, `rif`, `correo`, `nro_telefono`, `empresa`, `cargo_solicitante`) VALUES
(1, 'Alfredo', 'Morales', 'V-1182447150', 'alfmorapime@gmail.com', '4142398752', 'Omnitec Integradores', 'Consultor Tecnico'),
(2, 'Livia ', 'Pereira', '9119836', 'lpereira@unimet.edu.ve', '22222', 'La empresa', 'Gerente de Eventos'),
(3, 'Mariana', 'Maiolino', '18942880', 'mmaiolinoc@gmail.com', '04242276705', 'HPE', 'SA'),
(4, 'Ricardo', 'Carvajal', 'V-111', 'ricardo@gmail.com', '04142398763', 'Indy', 'Piloto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_interno`
--

CREATE TABLE IF NOT EXISTS `usuario_interno` (
  `id_usuario_interno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(249) DEFAULT NULL,
  `apellido` varchar(249) DEFAULT NULL,
  `cedula` varchar(249) DEFAULT NULL,
  `correo` varchar(249) DEFAULT NULL,
  `nro_telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_interno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `usuario_interno`
--

INSERT INTO `usuario_interno` (`id_usuario_interno`, `nombre`, `apellido`, `cedula`, `correo`, `nro_telefono`) VALUES
(1, 'Alfredo', 'Morales', '18244715', 'alfmorales@correo.unimet.edu.ve', 2147483647),
(2, 'Mariana ', 'Maiolino', '18942880', 'mmaiolinoc@gmail.com', 2147483647),
(3, 'Livia ', 'Pereira', '9119836', 'lpereira@unimet.edu.ve', 2147483647);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `agenda_externa`
--
ALTER TABLE `agenda_externa`
  ADD CONSTRAINT `fk_agenda_externa_evento_externo` FOREIGN KEY (`id_evento_externo`) REFERENCES `evento_externo` (`id_evento_externo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `agenda_interna`
--
ALTER TABLE `agenda_interna`
  ADD CONSTRAINT `fk_agenda_interna_evento_interno` FOREIGN KEY (`id_evento`) REFERENCES `evento_interno` (`id_evento_interno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_complementarios`
--
ALTER TABLE `datos_complementarios`
  ADD CONSTRAINT `fk_datos_comple_dependencia1` FOREIGN KEY (`dependencia_id_dependencia`) REFERENCES `dependencia` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datos_comple_usuario_interno1` FOREIGN KEY (`usuario_interno_id_usuario_interno`) REFERENCES `usuario_interno` (`id_usuario_interno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento_externo`
--
ALTER TABLE `evento_externo`
  ADD CONSTRAINT `fk_evento_externo_usuario_externo1` FOREIGN KEY (`usuario_externo_id_usuario_externo`) REFERENCES `usuario_externo` (`id_usuario_externo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento_interno`
--
ALTER TABLE `evento_interno`
  ADD CONSTRAINT `fk_evento_interno_usuario_interno1` FOREIGN KEY (`usuario_interno_id_usuario_interno`) REFERENCES `usuario_interno` (`id_usuario_interno`) ON DELETE NO ACTION ON UPDATE NO ACTION;
