-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2014 at 12:41 AM
-- Server version: 5.1.61
-- PHP Version: 5.3.3-1ubuntu9.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdcultura`
--

-- --------------------------------------------------------

--
-- Table structure for table `artistas`
--

CREATE TABLE IF NOT EXISTS `artistas` (
  `id_artistas` int(11) NOT NULL AUTO_INCREMENT,
  `tp_cedula` char(1) NOT NULL,
  `num_cedula` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `telefono` int(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `num_obras` int(11) NOT NULL,
  `fecha_reg` date DEFAULT NULL,
  `usuario_reg` int(11) DEFAULT NULL,
  `hora_reg` time DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `usuario_mod` int(11) NOT NULL,
  `fecha_mod` date NOT NULL,
  `hora_mod` time NOT NULL,
  PRIMARY KEY (`id_artistas`),
  KEY `estatus` (`estatus`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `artistas`
--

INSERT INTO `artistas` (`id_artistas`, `tp_cedula`, `num_cedula`, `nombre`, `apellido`, `direccion`, `estado`, `telefono`, `correo`, `num_obras`, `fecha_reg`, `usuario_reg`, `hora_reg`, `estatus`, `usuario_mod`, `fecha_mod`, `hora_mod`) VALUES
(21, 'v', 953662, 'juan', 'sanchez', 'los teques', 15, 3231552, 'sanchezjuan14@gmail.com', 3, '2013-10-19', 1, '21:23:57', 1, 1, '2013-10-20', '18:38:43'),
(22, 'v', 19650333, 'jose', 'diaz', 'reinootolina caricuao ejemplo', 10, 2147483647, 'chacon00@hotmail.com', 1, '2013-10-19', 1, '21:56:52', 2, 1, '2014-07-08', '20:58:58'),
(23, 'v', 11111999, 'maria', 'daza parra cetina', 'direccion2', 14, 2147483647, 'correo2@gmail.com', 5, '2014-04-05', 1, '18:30:59', 2, 1, '2014-07-08', '23:57:12'),
(24, 'v', 0, 'skreydhers  jhons', 'sanchez delgado ', 'cotiza la pastora', 10, 2147483647, 'skreydhers28@gmail.com', 4, '2014-04-05', 1, '18:55:48', 2, 1, '2014-07-07', '20:36:03'),
(25, 'v', 12435667, 'robert', 'delgado', 'direccion2', 16, 2147483647, 'sssdgsdg@hotmail.com', 5, '2014-04-05', 1, '19:08:43', 1, 1, '2014-04-06', '10:35:12'),
(26, 'v', 19089100, 'fulano fulano', 'daza daza', 'las casitas caricuao', 9, 2124338460, 'dulewwejhjw@gmail.com', 2, '2014-07-09', 2, '00:18:21', 1, 0, '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `tabla` varchar(100) NOT NULL,
  `operacion` varchar(20) NOT NULL,
  `observacion` text NOT NULL,
  `direccion_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `usuario`, `fecha_reg`, `hora_reg`, `tabla`, `operacion`, `observacion`, `direccion_ip`) VALUES
(1, 1, '2014-04-21', '13:36:50', 'artistas', 'Registrar', 'Se ha registrado un artista nuevo', '::1'),
(2, 1, '2014-04-21', '13:37:22', 'artistas', 'Modificar', 'Se ha modificado un artista', '::1'),
(3, 1, '2014-04-21', '13:40:12', 'artistas', 'Eliminado', 'Se ha Eliminado un artista nuevo', '::1'),
(4, 1, '2014-04-21', '13:42:49', 'obras', 'Registrar', 'Se ha registrado una obra nueva', '::1'),
(5, 1, '2014-04-21', '13:45:21', 'obras', 'Modificar', 'Se ha modificado una obra', '::1'),
(6, 1, '2014-04-21', '13:46:42', 'obras', 'Eliminar', 'Se ha Eliminado una Obra', '::1'),
(7, 1, '2014-04-21', '13:55:24', 'eventos', 'Registrar', 'Se ha registrado un Evento', '::1'),
(8, 1, '2014-04-21', '13:56:07', 'eventos', 'Modificar', 'Se ha modificado un evento', '::1'),
(9, 1, '2014-04-21', '14:02:17', 'eventos', 'Eliminar', 'Se ha Eliminado un Evento', '::1'),
(10, 1, '2014-04-21', '14:07:51', 'usuarios', 'Eliminar', 'Se ha Eliminado un usuario', '::1'),
(11, 1, '2014-04-21', '14:35:55', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '::1'),
(12, 1, '2014-04-21', '14:55:15', 'usuarios', 'Registrar', 'Se ha registrado un usuario nuevo', '::1'),
(13, 1, '2014-04-21', '16:07:39', 'usuarios', 'session', 'El usuario Salio', '::1'),
(14, 1, '2014-04-21', '16:09:15', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(15, 1, '2014-04-21', '16:09:34', 'usuarios', 'session', 'El usuario Salio', '::1'),
(16, 1, '2014-04-21', '16:09:51', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(17, 1, '2014-04-21', '16:12:33', 'usuarios', 'session', 'El usuario Salio', '::1'),
(18, 1, '2014-04-21', '16:12:42', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(19, 1, '2014-04-21', '16:12:58', 'usuarios', 'session', 'El usuario Salio', '::1'),
(20, 1, '2014-04-23', '23:46:03', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(21, 1, '2014-04-23', '23:50:51', 'usuarios', 'Registrar', 'Se ha registrado un usuario nuevo', '127.0.0.1'),
(22, 1, '2014-04-23', '23:51:17', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(23, 31, '2014-04-23', '23:51:33', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(26, 31, '2014-04-23', '23:53:02', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(27, 1, '2014-04-23', '23:53:11', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(28, 1, '2014-04-23', '23:53:16', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(29, 1, '2014-04-25', '14:11:30', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(30, 1, '2014-04-25', '14:13:20', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(31, 1, '2014-04-25', '14:13:27', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(32, 1, '2014-04-25', '14:16:19', 'usuarios', 'Registrar', 'Se ha registrado un usuario nuevo', '127.0.0.1'),
(33, 1, '2014-04-25', '14:16:58', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(34, 32, '2014-04-25', '14:17:21', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(36, 32, '2014-04-25', '14:17:52', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(37, 1, '2014-04-25', '14:17:59', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(38, 1, '2014-04-25', '14:23:37', 'eventos', 'Eliminar', 'Se ha Eliminado un Evento', '127.0.0.1'),
(39, 1, '2014-04-25', '14:24:38', 'eventos', 'Modificar', 'Se ha modificado un evento', '127.0.0.1'),
(43, 1, '2014-04-25', '14:27:27', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(44, 1, '2014-04-25', '14:32:03', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(45, 1, '2014-04-25', '14:32:13', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(46, 1, '2014-04-25', '14:34:04', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(47, 1, '2014-04-25', '14:34:09', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(48, 1, '2014-04-25', '14:35:18', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(49, 1, '2014-04-25', '14:35:38', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(50, 1, '2014-04-25', '14:35:46', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(51, 1, '2014-04-25', '14:35:54', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(52, 1, '2014-04-25', '14:35:57', 'usuarios', 'session', 'El usuario Salio', '127.0.0.1'),
(53, 1, '2014-04-25', '14:53:34', 'usuarios', 'session', 'El usuario Ingreso', '127.0.0.1'),
(54, 1, '2014-04-25', '14:54:01', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(55, 1, '2014-04-25', '14:57:25', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(56, 1, '2014-04-25', '15:05:29', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(57, 1, '2014-04-25', '15:08:50', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '127.0.0.1'),
(58, 1, '2014-07-07', '20:16:16', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(59, 1, '2014-07-07', '20:35:19', 'artistas', 'Eliminar', 'Se ha Eliminado un artista', '::1'),
(60, 1, '2014-07-07', '20:36:04', 'artistas', 'Eliminar', 'Se ha Eliminado un artista', '::1'),
(61, 2, '2014-07-08', '19:31:58', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(62, 1, '2014-07-08', '19:33:24', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(63, 1, '2014-07-08', '19:37:02', 'usuarios', 'Eliminar', 'Se ha Eliminado un usuario', '::1'),
(64, 1, '2014-07-08', '20:16:00', 'usuarios', 'Registrar', 'Se ha registrado un usuario nuevo', '::1'),
(65, 2, '2014-07-08', '20:16:17', 'usuarios', 'session', 'El usuario Salio', '::1'),
(66, 33, '2014-07-08', '20:16:29', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(67, 33, '2014-07-08', '20:16:56', 'usuarios', 'Modificar', 'Realizo Cambio de ContraseÃ±a', '::1'),
(68, 1, '2014-07-08', '20:46:08', 'artistas', 'Eliminar', 'Se ha Eliminado un artista', '::1'),
(69, 1, '2014-07-08', '20:56:41', 'artistas', 'Eliminar', 'Se ha Eliminado un artista', '::1'),
(70, 1, '2014-07-08', '20:58:58', 'artistas', 'Eliminar', 'Se ha Eliminado un artista', '::1'),
(71, 1, '2014-07-08', '23:03:30', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(72, 1, '2014-07-08', '23:41:01', 'usuarios', 'session', 'El usuario Salio', '::1'),
(73, 1, '2014-07-08', '23:46:58', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(74, 1, '2014-07-08', '23:48:06', 'usuarios', 'session', 'El usuario Salio', '::1'),
(75, 2, '2014-07-08', '23:48:59', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(76, 2, '2014-07-08', '23:51:54', 'usuarios', 'session', 'El usuario Salio', '::1'),
(77, 1, '2014-07-08', '23:52:08', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(78, 1, '2014-07-08', '23:54:37', 'usuarios', 'Modificar', 'Se ha modificado un usuario', '::1'),
(79, 1, '2014-07-08', '23:55:22', 'usuarios', 'session', 'El usuario Salio', '::1'),
(80, 2, '2014-07-08', '23:55:42', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(81, 2, '2014-07-08', '23:55:59', 'usuarios', 'session', 'El usuario Salio', '::1'),
(82, 1, '2014-07-08', '23:56:17', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(83, 1, '2014-07-08', '23:56:47', 'artistas', 'Modificar', 'Se ha modificado un artista', '::1'),
(84, 1, '2014-07-08', '23:57:12', 'artistas', 'Eliminar', 'Se ha Eliminado un artista', '::1'),
(85, 1, '2014-07-09', '00:02:43', 'obras', 'Eliminar', 'Se ha Eliminado una Obra', '::1'),
(86, 1, '2014-07-09', '00:05:29', 'obras', 'Eliminar', 'Se ha Eliminado una Obra', '::1'),
(87, 1, '2014-07-09', '00:05:41', 'obras', 'Eliminar', 'Se ha Eliminado una Obra', '::1'),
(88, 1, '2014-07-09', '00:08:24', 'eventos_obras', 'Registrar', 'Se ha registrado en el Evento un Artista con su Obra', '::1'),
(89, 1, '2014-07-09', '00:13:22', 'obras', 'Modificar', 'Se ha modificado una obra', '::1'),
(90, 1, '2014-07-09', '00:16:36', 'usuarios', 'session', 'El usuario Salio', '::1'),
(91, 2, '2014-07-09', '00:16:59', 'usuarios', 'session', 'El usuario Ingreso', '::1'),
(92, 2, '2014-07-09', '00:18:22', 'artistas', 'Registrar', 'Se ha registrado un artista nuevo', '::1'),
(93, 2, '2014-07-09', '00:22:13', 'obras', 'Registrar', 'Se ha registrado una obra nueva', '::1'),
(94, 2, '2014-07-09', '00:22:58', 'usuarios', 'session', 'El usuario Salio', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `tp_cedula` int(1) NOT NULL,
  `num_cedula` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` int(2) NOT NULL,
  `telefono` int(20) DEFAULT NULL,
  `estatus` int(2) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `usuario_reg` int(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `usuario_mod` int(11) NOT NULL,
  `fecha_mod` date NOT NULL,
  `hora_mod` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `tipo_usuario` (`tipo_usuario`),
  KEY `tp_cedula` (`tp_cedula`),
  KEY `cargo` (`cargo`),
  KEY `estatus` (`estatus`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empleado`
--


-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estados` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estados`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id_estados`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Anzoategui'),
(3, 'Apure'),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolivar'),
(7, 'Carabobo'),
(8, 'Cojedes'),
(9, 'Delta Amacuro'),
(10, 'Distrito Capital'),
(11, 'Falcon'),
(12, 'Guarico'),
(13, 'Lara'),
(14, 'Merida'),
(15, 'Miranda'),
(16, 'Monagas'),
(17, 'Nueva Esparta'),
(18, 'Portuguesa'),
(19, 'Sucre'),
(20, 'Tachira'),
(21, 'Trujillo'),
(22, 'Vargas'),
(23, 'Yaracuy'),
(24, 'Zulia');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id_eventos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `lugar` text NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario_encargado` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_evento_inicio` date NOT NULL,
  `fecha_evento_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `imagen_evento` text,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `user_reg` int(11) NOT NULL,
  `fecha_mod` date NOT NULL,
  `hora_mod` time NOT NULL,
  `user_mod` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id_eventos`),
  KEY `usuario_encargado` (`usuario_encargado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id_eventos`, `nombre`, `lugar`, `estado`, `usuario_encargado`, `descripcion`, `fecha_evento_inicio`, `fecha_evento_fin`, `hora_inicio`, `hora_fin`, `imagen_evento`, `fecha_reg`, `hora_reg`, `user_reg`, `fecha_mod`, `hora_mod`, `user_mod`, `estatus`) VALUES
(13, 'fsdf', 'sdf', 15, 1, 'sdf', '2013-11-01', '2013-11-16', '12:00:00', '12:00:00', '', '2013-11-17', '21:12:31', 1, '2013-11-17', '21:19:06', 1, 1),
(14, 'Andres', 'UreÃ±a', 20, 1, 'h', '2013-11-13', '2013-11-28', '12:00:00', '12:00:00', '', '2013-11-17', '21:15:24', 1, '2014-04-21', '14:02:17', 1, 2),
(15, 'Color', 'Puerto Ayacucho', 1, 3, 'Colores fuertes', '0000-00-00', '0000-00-00', '09:00:00', '05:30:00', '', '2013-11-17', '23:30:51', 1, '0000-00-00', '00:00:00', 0, 1),
(16, 'Los Increibles de la CerÃ¡mica', 'El Sambil calle 5 carrera 3 Barquisimeto', 13, 3, 'CerÃ¡mica de primera', '0000-00-00', '0000-00-00', '09:00:00', '05:30:00', '', '2013-11-18', '00:16:50', 1, '0000-00-00', '00:00:00', 0, 1),
(17, 'fghfgh', 'San Cristobal', 20, 3, 'fgfgvgvgv', '0000-00-00', '0000-00-00', '09:00:00', '05:30:00', '', '2013-11-18', '00:20:23', 1, '0000-00-00', '00:00:00', 0, 1),
(18, 'casa', 'c f  b h    gtvgvf', 11, 1, 'fcgvgvgvf', '1970-01-01', '1970-01-01', '09:00:00', '05:30:00', '', '2013-11-18', '00:22:22', 1, '2013-11-18', '03:00:48', 1, 1),
(19, 'byvvcvfc', 'hbh n .,kn', 5, 2, 'cvgvg gh f h ftyft', '2013-12-11', '2013-12-12', '09:00:00', '05:30:00', '', '2013-11-18', '02:11:22', 2, '0000-00-00', '00:00:00', 0, 1),
(20, 'casa', 'caracas', 10, 1, 'cufm', '2014-03-18', '2014-03-18', '11:00:00', '12:00:00', '', '2014-03-18', '00:30:18', 1, '0000-00-00', '00:00:00', 0, 1),
(21, 'Caricao', 'Caricuao UD1', 10, 1, 'Zona EcolÃ³gica', '2014-04-20', '2014-05-20', '09:00:00', '01:00:00', '', '2014-04-03', '11:02:54', 1, '0000-00-00', '00:00:00', 0, 1),
(22, 'bchbdhvbhbhb', 'h h hb g hgc', 5, 1, ' h hb ', '2014-04-03', '2014-04-03', '00:00:00', '00:00:00', '', '2014-04-03', '13:25:26', 1, '0000-00-00', '00:00:00', 0, 1),
(23, 'hvgvtvtc', 'bvugvg', 1, 1, 'vcyfcty', '2014-04-03', '2014-04-03', '00:00:03', '00:00:05', '', '2014-04-03', '13:27:09', 1, '0000-00-00', '00:00:00', 0, 1),
(24, 'mnvjnjnj', 'jjvbfdhvbh', 17, 1, 'njbvjbfvhb', '2014-04-26', '2014-05-31', '00:00:04', '00:00:06', '', '2014-04-03', '13:37:03', 1, '0000-00-00', '00:00:00', 0, 1),
(25, 'dulvan en tangas', 'la casa de taniusca ', 10, 2, 'lo que sea ', '2014-04-05', '2014-05-06', '00:00:10', '00:00:11', '', '2014-04-05', '19:38:08', 1, '2014-04-05', '19:39:41', 1, 1),
(26, 'Todos en las casas ', 'en casa de dulvan ', 15, 1, 'solos en la casa', '2014-04-05', '2014-05-09', '03:00:00', '00:00:05', '', '2014-04-05', '19:49:53', 1, '2014-04-25', '14:24:38', 1, 2),
(27, 'ep loco ', 'en la casa de los locos ', 10, 2, 'los locos sueltos', '2014-04-05', '2014-05-14', '00:00:02', '00:00:04', '', '2014-04-05', '19:56:29', 2, '0000-00-00', '00:00:00', 0, 1),
(28, 'evento2014', 'caricuao', 10, 27, 'evento', '2014-04-21', '2014-04-21', '10:00:00', '12:00:00', '', '2014-04-21', '13:55:23', 1, '0000-00-00', '00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventos_obras`
--

CREATE TABLE IF NOT EXISTS `eventos_obras` (
  `id_eventos_obras` int(11) NOT NULL AUTO_INCREMENT,
  `id_obras` int(11) NOT NULL,
  `id_artistas` int(11) NOT NULL,
  `id_eventos` int(11) NOT NULL,
  PRIMARY KEY (`id_eventos_obras`),
  KEY `id_obras` (`id_obras`,`id_artistas`,`id_eventos`),
  KEY `id_artistas` (`id_artistas`),
  KEY `id_eventos` (`id_eventos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `eventos_obras`
--

INSERT INTO `eventos_obras` (`id_eventos_obras`, `id_obras`, `id_artistas`, `id_eventos`) VALUES
(70, 23, 21, 14),
(46, 23, 21, 16),
(58, 23, 21, 18),
(62, 23, 21, 20),
(73, 23, 21, 26),
(71, 25, 21, 14),
(45, 25, 21, 15),
(47, 25, 21, 16),
(54, 25, 21, 17),
(61, 25, 21, 18),
(63, 25, 21, 20),
(64, 25, 21, 21),
(66, 25, 21, 21),
(77, 25, 21, 26),
(69, 26, 21, 14),
(48, 26, 21, 16),
(67, 26, 21, 19),
(74, 26, 21, 26),
(79, 27, 21, 14),
(75, 27, 21, 15),
(49, 27, 21, 16),
(68, 27, 21, 19),
(76, 27, 21, 26),
(55, 28, 21, 17),
(65, 28, 21, 21),
(72, 30, 21, 14),
(78, 30, 21, 26);

-- --------------------------------------------------------

--
-- Table structure for table `lista_cargos`
--

CREATE TABLE IF NOT EXISTS `lista_cargos` (
  `id_lista_cargos` int(11) NOT NULL AUTO_INCREMENT,
  `cargos` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lista_cargos`),
  UNIQUE KEY `cargos` (`cargos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lista_cargos`
--

INSERT INTO `lista_cargos` (`id_lista_cargos`, `cargos`, `descripcion`) VALUES
(1, 'supervisor', 'es el supervisor '),
(2, 'operador ', 'es el operador ');

-- --------------------------------------------------------

--
-- Table structure for table `lista_cedula`
--

CREATE TABLE IF NOT EXISTS `lista_cedula` (
  `id_lista_cedula` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cedula` char(1) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lista_cedula`),
  UNIQUE KEY `tipo_cedula` (`tipo_cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lista_cedula`
--

INSERT INTO `lista_cedula` (`id_lista_cedula`, `tipo_cedula`, `descripcion`) VALUES
(1, 'v', 'Venezolano'),
(2, 'e', 'extranjero');

-- --------------------------------------------------------

--
-- Table structure for table `lista_estatus_artistas`
--

CREATE TABLE IF NOT EXISTS `lista_estatus_artistas` (
  `id_lista_estatus_artista` int(10) NOT NULL AUTO_INCREMENT,
  `estatus_artista` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lista_estatus_artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lista_estatus_artistas`
--

INSERT INTO `lista_estatus_artistas` (`id_lista_estatus_artista`, `estatus_artista`, `descripcion`) VALUES
(1, 'activo', 'el artista esta activo'),
(2, 'inactivo', 'el artista esta inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `lista_estatus_empleado`
--

CREATE TABLE IF NOT EXISTS `lista_estatus_empleado` (
  `id_lista_estatus_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_empleado` varchar(30) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lista_estatus_empleado`),
  UNIQUE KEY `estatus_empleado` (`estatus_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lista_estatus_empleado`
--

INSERT INTO `lista_estatus_empleado` (`id_lista_estatus_empleado`, `estatus_empleado`, `descripcion`) VALUES
(1, 'activo', 'el empleado esta trabajando en la empresa'),
(2, 'inactivo', 'el empleado fue desactivado de la empresa');

-- --------------------------------------------------------

--
-- Table structure for table `lista_estatus_obras`
--

CREATE TABLE IF NOT EXISTS `lista_estatus_obras` (
  `id_lista_estatus_obras` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_obras` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lista_estatus_obras`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lista_estatus_obras`
--

INSERT INTO `lista_estatus_obras` (`id_lista_estatus_obras`, `estatus_obras`, `descripcion`) VALUES
(1, 'activo', 'obra activa'),
(2, 'inactivo', 'obra inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `lista_estatus_usuario`
--

CREATE TABLE IF NOT EXISTS `lista_estatus_usuario` (
  `id_lista_estatus_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_usuarios` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lista_estatus_usuario`),
  UNIQUE KEY `estatus_usuarios` (`estatus_usuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lista_estatus_usuario`
--

INSERT INTO `lista_estatus_usuario` (`id_lista_estatus_usuario`, `estatus_usuarios`, `descripcion`) VALUES
(1, 'activo', 'el usuario esta activo'),
(2, 'bloqueado', 'el usuario esta bloqueado'),
(3, 'inactivo', 'el usuario se encuentra inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `lista_tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `lista_tipo_usuario` (
  `id_lista_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lista_tipo_usuario`),
  UNIQUE KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lista_tipo_usuario`
--

INSERT INTO `lista_tipo_usuario` (`id_lista_tipo_usuario`, `tipo_usuario`, `descripcion`) VALUES
(1, 'administrador ', 'administrador del sistema '),
(2, 'analista ', 'analista del sistema ');

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `id_obras` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `tecnica` varchar(50) NOT NULL,
  `dimensiones` varchar(50) NOT NULL,
  `valor` int(50) NOT NULL,
  `para_la_venta` tinyint(1) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `usuario_reg` int(11) NOT NULL,
  `fecha_mod` date DEFAULT NULL,
  `hora_mod` time DEFAULT NULL,
  `usuario_mod` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `id_artistas` int(11) NOT NULL,
  `codigo_una` varchar(100) NOT NULL,
  `fecha_obra` date NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_obras`),
  UNIQUE KEY `id_obras` (`id_obras`),
  KEY `id_artistas` (`id_artistas`),
  KEY `id_artistas_2` (`id_artistas`),
  KEY `estatus` (`estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id_obras`, `titulo`, `tecnica`, `dimensiones`, `valor`, `para_la_venta`, `observaciones`, `fecha_reg`, `hora_reg`, `usuario_reg`, `fecha_mod`, `hora_mod`, `usuario_mod`, `estatus`, `id_artistas`, `codigo_una`, `fecha_obra`, `foto`) VALUES
(23, 'La tinta', 'Normal', '22/55', 200, 1, '', '2013-10-21', '21:08:52', 1, '2014-07-09', '00:02:43', 1, 2, 21, '1212121212', '2013-11-11', '2013-11-17_21_23_11_Desert.jpg'),
(25, 'Solo 3d', 'Pinceles y Acuarela2', '20/20', 2000, 1, 'Obra en buen estado', '2013-11-17', '16:48:58', 1, '2014-07-09', '00:05:29', 1, 2, 21, '1010101010', '0000-00-00', '2013-11-17_21_23_18_Hydrangeas.jpg'),
(26, 'Arte del Pincel', 'Pinturas Mixtas', '30/20', 500, 1, 'Cuadro en buen estado', '2013-11-17', '16:50:23', 1, '2014-07-09', '00:13:22', 1, 1, 21, '20202020', '2014-07-03', '2013-11-17_21_23_24_Jellyfish.jpg'),
(27, 'Del Mar', 'Pintura al Frio', '45/45', 9000, 1, 'Deteriorado', '2013-11-17', '16:52:10', 1, '2014-07-09', '00:05:41', 1, 2, 21, '30303030', '2013-11-11', '2013-11-17_21_23_32_Koala.jpg'),
(28, 'Desierto', 'Pinturas', '50/45', 8000, 1, 'Regular un poco deteriorado', '2013-11-17', '16:53:58', 1, '2013-11-17', '22:06:18', 1, 1, 21, '40404040', '2013-11-11', '2013-11-17_21_25_39_Lighthouse.jpg'),
(30, 'La pintura fina', 'lienso', '60x50cm', 3, 1, '', '2014-02-24', '23:20:02', 1, NULL, NULL, NULL, 1, 21, 'gyggygygygygy', '2014-02-24', '2014-02-24_23_20_02_Imagen de aplausos.jpg'),
(31, 'un pez en la costa ', 'Mixta', '400X300', 3098, 1, 'es lindo ', '2014-04-05', '19:23:24', 1, '2014-04-21', '13:46:42', 1, 2, 24, '127356389', '2014-04-05', '2014-04-05_19_23_23_Magallanes.jpg'),
(32, 'la montaÃ±a verde ', 'mixta ', '30x79', 10000, 0, 'es verde ', '2014-04-05', '19:59:48', 2, NULL, NULL, NULL, 1, 21, '66444464', '2014-04-05', '2014-04-05_19_59_48_Magallanes.jpg'),
(33, 'obra', 'pintura', '200cmX10cm', 150, 0, '', '2014-04-21', '13:42:49', 1, '2014-04-21', '13:45:21', 1, 1, 21, '2232', '0000-00-00', '2014-04-21_13_42_49_Koala.jpg'),
(34, 'las 80', 'las pinturas', '60cm x 34 ', 2000, 1, 'fina', '2014-07-09', '00:22:13', 2, NULL, NULL, NULL, 1, 26, '1234567890', '2014-07-09', '2014-07-09_00_22_13_6 Productos Iluminacion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` text NOT NULL,
  `estatus` int(1) NOT NULL,
  `usuario_reg` int(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `usuario_mod` int(11) NOT NULL,
  `fecha_mod` date NOT NULL,
  `hora_mod` time NOT NULL,
  `intentos` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipo_cedula` varchar(1) NOT NULL,
  `num_cedula` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `cambioclave` varchar(1) NOT NULL DEFAULT 's',
  `session` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `estatus` (`estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `usuario`, `clave`, `estatus`, `usuario_reg`, `fecha_reg`, `hora_reg`, `usuario_mod`, `fecha_mod`, `hora_mod`, `intentos`, `tipo`, `nombre`, `apellido`, `tipo_cedula`, `num_cedula`, `email`, `telefono`, `cambioclave`, `session`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2013-10-06', '12:00:00', 1, '2014-04-25', '15:05:29', 2, 'admin', 'jhons', 'delgado', '', 0, 'correo@gmail.com', '04142451680', 'n', 0),
(2, 'usuario1', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2013-11-02', '12:00:00', 0, '0000-00-00', '00:00:00', 0, 'user', 'Dulvan', 'Daza', 'V', 19089100, 'dulwan33@gmail.com', '04149088042', 'n', 0),
(3, 'usuario2', '25d55ad283aa400af464c76d713c07ad', 2, 1, '2013-11-02', '12:00:00', 1, '2014-07-08', '19:37:02', 0, 'user', 'Jose', 'Velasquez', 'V', 19659540, 'shop.velasquez@gmail.com', '04267067225', 's', 0),
(27, 'usuario3', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2014-04-05', '18:22:24', 1, '2014-07-08', '23:54:37', 0, 'user', 'jhons alberto', 'delgado', 'v', 16691087, 'correo@gmail.com', '04142451680', 's', 0),
(28, 'usuario10', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2014-04-06', '14:48:06', 0, '0000-00-00', '00:00:00', 0, 'user', 'patricia', 'oropeza', 'v', 17870009, 'shop.velasquez@gmail.com', '04120987765', 's', 0),
(30, 'usuario4', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2014-04-21', '14:55:14', 0, '0000-00-00', '00:00:00', 0, 'user', 'asfa', 'asfa', 'v', 16889768, 'asfgasfa@gmail.com', '0412333443', 's', 0),
(31, 'eduardoparra', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2014-04-23', '23:50:51', 0, '0000-00-00', '00:00:00', 0, 'user', 'edardo ', 'parra', 'v', 19089101, 'eduardo@hotmail.com', '02129199737', 'n', 0),
(32, 'diaz', '25d55ad283aa400af464c76d713c07ad', 1, 1, '2014-04-25', '14:16:19', 0, '0000-00-00', '00:00:00', 0, 'user', 'eduardo ', 'diaz', 'v', 19089102, 'diaz@hotmail.com', '04149009000', 'n', 0),
(33, 'ldaza', 'e807f1fcf82d132f9bb018ca6738a19f', 1, 1, '2014-07-08', '20:16:00', 0, '0000-00-00', '00:00:00', 0, 'user', 'ira', 'daza', 'v', 12345678, 'shop.velasquez@gmail.com', '02123345678', 'n', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_ibfk_1` FOREIGN KEY (`estatus`) REFERENCES `lista_estatus_artistas` (`id_lista_estatus_artista`),
  ADD CONSTRAINT `artistas_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estados` (`id_estados`);

--
-- Constraints for table `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `lista_cargos` (`id_lista_cargos`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`tipo_usuario`) REFERENCES `lista_tipo_usuario` (`id_lista_tipo_usuario`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`tp_cedula`) REFERENCES `lista_cedula` (`id_lista_cedula`),
  ADD CONSTRAINT `empleado_ibfk_4` FOREIGN KEY (`estatus`) REFERENCES `lista_estatus_empleado` (`id_lista_estatus_empleado`),
  ADD CONSTRAINT `empleado_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`usuario_encargado`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Constraints for table `eventos_obras`
--
ALTER TABLE `eventos_obras`
  ADD CONSTRAINT `eventos_obras_ibfk_1` FOREIGN KEY (`id_obras`) REFERENCES `obras` (`id_obras`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventos_obras_ibfk_2` FOREIGN KEY (`id_artistas`) REFERENCES `artistas` (`id_artistas`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventos_obras_ibfk_3` FOREIGN KEY (`id_eventos`) REFERENCES `eventos` (`id_eventos`) ON DELETE CASCADE;

--
-- Constraints for table `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_ibfk_1` FOREIGN KEY (`estatus`) REFERENCES `lista_estatus_obras` (`id_lista_estatus_obras`),
  ADD CONSTRAINT `obras_ibfk_2` FOREIGN KEY (`id_artistas`) REFERENCES `artistas` (`id_artistas`) ON DELETE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`estatus`) REFERENCES `lista_estatus_usuario` (`id_lista_estatus_usuario`);
