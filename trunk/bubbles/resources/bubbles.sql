-- phpMyAdmin SQL Dump
-- version 3.1.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-07-2009 a las 00:52:45
-- Versión del servidor: 5.1.33
-- Versión de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `bubbles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `id_aviso` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_empresa` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horarios` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pago` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci NOT NULL,
  `puesto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario_asignado` bigint(20) NOT NULL,
  PRIMARY KEY (`id_aviso`),
  UNIQUE KEY `id_aviso` (`id_aviso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id_aviso`, `id_empresa`, `fecha`, `titulo`, `horarios`, `pago`, `detalle`, `puesto`, `status`, `id_usuario_asignado`) VALUES
(1, 8, '2009-07-02 01:03:19', 'ssg', 'egsg', 'seseesg', 'esesges', 'segseg', 'NO_ASIGNADO', -1),
(2, 8, '2009-07-02 01:05:31', 'ssg', 'egsg', 'seseesg', 'esesges', 'segseg', 'NO_ASIGNADO', -1),
(3, 8, '2009-07-02 01:06:44', 'ssg', 'egsg', 'seseesg', 'esesges', 'segseg', 'NO_ASIGNADO', -1),
(4, 8, '2009-07-02 01:08:17', 'ssg', 'egsg', 'seseesg', 'esesges', 'segseg', 'NO_ASIGNADO', -1),
(5, 8, '2009-07-02 01:09:37', 'Analista, Programador JAVA', '7:00Hs - 20:00Hs', '$4000', 'analista para programar en una empresa bien chica.\r\n(kichinet)', 'Ssr.', 'NO_ASIGNADO', -1),
(6, 8, '2009-07-04 18:18:24', 'r', 'r', 'r', 'r', 'r', 'NO_ASIGNADO', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` bigint(20) NOT NULL AUTO_INCREMENT,
  `desde_usuario` tinyint(1) NOT NULL,
  `para_usuario` tinyint(1) NOT NULL,
  `id_desde` bigint(20) NOT NULL,
  `id_para` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detalle` text COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=46 ;

--
-- Volcar la base de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `desde_usuario`, `para_usuario`, `id_desde`, `id_para`, `fecha`, `detalle`, `status`) VALUES
(1, 0, 0, 7, 9, '2009-06-28 23:43:11', '', ''),
(2, 0, 0, 7, 9, '2009-06-28 23:59:02', '', ''),
(3, 0, 0, 7, 9, '2009-06-28 23:59:02', '', ''),
(4, 0, 0, 7, 9, '2009-06-29 00:00:18', '', ''),
(5, 0, 0, 7, 9, '2009-06-29 00:00:18', '', ''),
(6, 0, 0, 7, 9, '2009-06-29 00:02:44', '', ''),
(7, 0, 0, 7, 9, '2009-06-29 00:02:44', '', ''),
(8, 0, 0, 7, 9, '2009-06-29 00:07:51', '', ''),
(9, 0, 0, 7, 9, '2009-06-29 00:07:51', '', ''),
(25, 1, 1, 7, 9, '2009-06-29 00:32:44', 'Te la comes doblada man\r\nBuscate un laburo', ''),
(24, 1, 1, 7, 9, '2009-06-29 00:31:38', 'Carnasa', ''),
(23, 1, 1, 7, 9, '2009-06-29 00:25:41', 'Carnasa', ''),
(16, 1, 1, 7, 9, '2009-06-29 00:17:32', '', ''),
(17, 0, 1, 7, 9, '2009-06-29 00:17:32', '', ''),
(18, 1, 1, 7, 9, '2009-06-29 00:17:46', 'Hola mama', ''),
(19, 0, 1, 7, 9, '2009-06-29 00:17:46', 'Hola mama', ''),
(20, 1, 1, 7, 9, '2009-06-29 00:18:58', 'Hola mama', ''),
(21, 1, 1, 7, 9, '2009-06-29 00:19:10', 'Carnasa', ''),
(22, 1, 1, 7, 9, '2009-06-29 00:24:18', 'Carnasa', ''),
(27, 1, 1, 7, 9, '2009-06-29 15:26:04', 'Que barbaro tu Laburo en el oriente medio chabÃ³n!\r\n\r\nLo llame a Hussein para ver que opinaba pero habia "colgado" (jeje).', ''),
(28, 1, 1, 7, 9, '2009-06-29 15:26:47', 'Hola, quiero laburo, necesito laburo', ''),
(29, 1, 1, 7, 9, '2009-06-30 15:57:05', 'uhhh!!', ''),
(30, 1, 1, 7, 9, '2009-06-30 16:03:20', 'uhhh!!', ''),
(31, 1, 1, 7, 9, '2009-06-30 16:03:29', 'ahora?', ''),
(32, 1, 1, 7, 9, '2009-06-30 16:09:41', 'ahora?', ''),
(33, 1, 1, 7, 9, '2009-06-30 16:09:49', 'y ahora', ''),
(34, 1, 1, 7, 9, '2009-06-30 16:18:04', 'y ahora', ''),
(35, 1, 1, 7, 9, '2009-06-30 16:18:11', 'ggg', ''),
(36, 1, 1, 7, 9, '2009-06-30 17:25:43', 'uuu', ''),
(37, 1, 1, 7, 9, '2009-06-30 17:26:47', 'uuu', ''),
(38, 1, 1, 7, 9, '2009-06-30 17:30:36', 'uuu', ''),
(39, 1, 1, 7, 9, '2009-06-30 17:32:39', 'uuu', ''),
(40, 1, 1, 7, 9, '2009-06-30 17:33:23', 'uuu', ''),
(41, 1, 0, 7, 8, '2009-06-30 18:01:23', 'hola man', ''),
(42, 1, 0, 7, 8, '2009-06-30 18:02:03', 'hola man', ''),
(43, 1, 0, 7, 8, '2009-06-30 18:02:21', 'Bueno, Parece que "funciona''', ''),
(44, 1, 0, 7, 8, '2009-07-01 15:50:03', 'Marcoss, ponete a laburar.', ''),
(45, 1, 0, 7, 8, '2009-07-07 15:04:39', 'quiero trabajo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id_empresa` bigint(20) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia_usuario` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta_secreta_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta_secreta_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email_usuario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `alias_usuario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `sexo_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento_usuario` date NOT NULL,
  `puesto_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prefijo_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tel_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `altura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `piso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desea_news` tinyint(1) NOT NULL,
  `desea_laborales` tinyint(1) NOT NULL,
  `desea_profesionales` tinyint(1) NOT NULL,
  `ruta_foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_empresa`),
  UNIQUE KEY `id_empresa` (`id_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `razon_social`, `contrasenia_usuario`, `pregunta_secreta_usuario`, `respuesta_secreta_usuario`, `email_usuario`, `alias_usuario`, `sexo_usuario`, `nacimiento_usuario`, `puesto_usuario`, `prefijo_usuario`, `tel_usuario`, `calle`, `altura`, `pais`, `piso`, `oficina`, `ciudad`, `desea_news`, `desea_laborales`, `desea_profesionales`, `ruta_foto`, `status`) VALUES
(1, 'Hitel S.A.', '12345678901234567890123456789012', '', '', 'david_ercoli@hotmail.com', 'santiago', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', ''),
(7, 'hitel', 'e3ceb5881a0a1fdaad01296d7554868d', '', '', 'rewignri@rgn.gjid', 'hitel', 'F', '1999-12-12', 'wefiuh', '', '3534', 'ewglm', '313', 'Argentina', '', '', 'wpeogjpow', 0, 0, 0, 'NR', 'CV_INCOMPLETO'),
(10, 'ewiogho', '73882ab1fa529d7273da0db6b49cc4f3', 'shgihh', 'ihewiohogwho', 'inewiogn@ugheu.giji', 'igheio', 'Masculino', '1111-11-11', 'Trainee', '3645', '732468426', 'gsgd', '232342', 'suhu', '23', '3', 'shgsu', 0, 0, 0, '', 'CV_INCOMPLETO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras`
--

CREATE TABLE IF NOT EXISTS `muestras` (
  `id_muestra` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `ruta_thumb` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_imagen` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_muestra`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `muestras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE IF NOT EXISTS `postulaciones` (
  `id_postulacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `id_aviso` bigint(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `objetivo_laboral` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_postulacion`),
  UNIQUE KEY `id_postulacion` (`id_postulacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`id_postulacion`, `id_usuario`, `id_aviso`, `fecha`, `objetivo_laboral`) VALUES
(1, 7, 5, '2009-07-05 15:43:59', 'bueho, me copa el laburo.'),
(2, 7, 5, '2009-07-05 15:50:34', 'bueho, me copa el laburo.'),
(3, 7, 5, '2009-07-05 15:51:11', 'Yo me ofrezco\r\n\r\nY pongo el culo!!'),
(4, 7, 5, '2009-07-05 15:52:18', 'Yo me ofrezco\r\n\r\nY pongo el culo!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `ruta_foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta_secreta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta_secreta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `pais_residencia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `profesion_1` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `profesion_2` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `profesion_3` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_profesion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desea_news` tinyint(1) NOT NULL,
  `desea_laborales` tinyint(1) NOT NULL,
  `desea_profesionales` tinyint(1) NOT NULL,
  `status` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=34 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `alias`, `contrasenia`, `email`, `nacimiento`, `ruta_foto`, `pregunta_secreta`, `respuesta_secreta`, `nombres`, `apellidos`, `empresa`, `sexo`, `pais_residencia`, `profesion_1`, `profesion_2`, `profesion_3`, `nivel_profesion`, `desea_news`, `desea_laborales`, `desea_profesionales`, `status`) VALUES
(7, 'nagi', 'f94c05dbef6d73f1f83b3110eb699312', 'david_ercoli@hotmail.com', '1981-10-27', '', '', '', '', '', '', '', '', 'Ingles', '', 'Aleman', 'Intermedio', 0, 0, 0, ''),
(9, 'paleo', 'b2fbf03e0d01747c0cc3dfe290da00fb', 'marcos_ercoli@hotmail.com', '1984-10-10', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, ''),
(33, 'weifjwi', '1a100d2c0dab19c4430e7d73762b3423', 'nriu@erihr.vne', '1111-11-11', '', 'ooeigawi', 'kiawengoai', 'iweghowi', 'egwnlewn', '', '', '', '', '', '', '', 0, 0, 0, 'NO_CONFIRMADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_experiencias`
--

CREATE TABLE IF NOT EXISTS `u_experiencias` (
  `id_experiencia` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `contratista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `radicacion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ramo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `puesto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad_ejercida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_jerarquia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ingreso` date NOT NULL,
  `egreso` date NOT NULL,
  `tareas_ejercidas` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_experiencia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=89 ;

--
-- Volcar la base de datos para la tabla `u_experiencias`
--

INSERT INTO `u_experiencias` (`id_experiencia`, `id_usuario`, `contratista`, `radicacion`, `ramo`, `puesto`, `especialidad_ejercida`, `nombre_jerarquia`, `ingreso`, `egreso`, `tareas_ejercidas`) VALUES
(82, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(80, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(79, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(61, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(62, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(63, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(77, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(70, 7, 'jrsgirgj', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(78, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(69, 7, 'jrsgirgj', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(68, 7, 'iregij', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(67, 7, 'iregij', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(66, 7, 'iregij', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(65, 7, 'iregij', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(64, 7, 'gogogoggo', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(60, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(59, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(58, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(57, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(56, 7, 'jaiaeg<j', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(55, 7, 'sv<asjgioia<go', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(54, 7, 'sv<asjgioia<go', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(53, 7, 'piojoojiio', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(81, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(83, 7, 'Hitel', 'EEUU', 'Informatica', 'Gerencia', 'Contable', 'ewjwijio', '0000-00-00', '2001-12-11', 'te rompen el ojete'),
(84, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(85, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(86, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(87, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', ''),
(88, 7, '', 'Argentina', 'Comunicaciones', 'Trainee', 'Administracion', '', '0000-00-00', '0000-00-00', '');
