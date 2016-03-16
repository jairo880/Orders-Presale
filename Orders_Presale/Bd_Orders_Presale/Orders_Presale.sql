-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2016 a las 18:46:37
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
CREATE DATABASE IF NOT EXISTS Orders_Presale DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


USE Orders_Presale;

--
-- Base de datos: `Orders_Presale`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_buson_mensajes_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_buson_mensajes_usuario` (
  `PK_ID_Buson_Mensajes` int(45) NOT NULL AUTO_INCREMENT,
  `Mensaje` varchar(50) NOT NULL,
  `Fecha_Envio` date NOT NULL,
  `FK_ID_Usuario` int(45) NOT NULL,
  `FK_ID_Pedido` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Buson_Mensajes`),
  KEY `FK_ID_Pedido` (`FK_ID_Pedido`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_buson_notificacion_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_buson_notificacion_usuario` (
  `PK_ID_Buson_Notificacion` int(45) NOT NULL AUTO_INCREMENT,
  `Mensaje` varchar(50) NOT NULL,
  `FK_ID_Pedido` int(45) NOT NULL,
  `Estado_Pedido` varchar(50) NOT NULL,
  `Fecha_Envio` date NOT NULL,
  PRIMARY KEY (`PK_ID_Buson_Notificacion`),
  KEY `FK_ID_Pedido` (`FK_ID_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria_producto`
--

CREATE TABLE IF NOT EXISTS `tbl_categoria_producto` (
  `PK_ID_Categoria` int(45) NOT NULL AUTO_INCREMENT,
  `Nombre_Categoria` varchar(45) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`PK_ID_Categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_categoria_producto`
--

INSERT INTO `tbl_categoria_producto` (`PK_ID_Categoria`, `Nombre_Categoria`, `Descripcion`) VALUES
(1, 'No Posee', 'No Posee'),
(2, 'Alimentos congelados', 'Estos productos se encuentran en estado de congelacion, se estima una duracion de 2 a 3 semanas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_chat`
--

CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `PK_ID_Chat` int(40) NOT NULL,
  `Estado_Chat` varchar(45) NOT NULL,
  `FK_ID_Usuario` int(40) NOT NULL,
  `Nombre_Usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PK_ID_Chat`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `PK_ID_Usuario_Persona` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Cuenta` int(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Segundo_Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Segundo_Apellido` varchar(45) NOT NULL,
  `Municipio` varchar(45) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Telefono_Celular` int(30) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Tipo_Cliente` varchar(20) NOT NULL,
  `Posee_Empresa` varchar(10) NOT NULL,
  PRIMARY KEY (`PK_ID_Usuario_Persona`),
  KEY `FK_ID_Cuenta` (`FK_ID_Cuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`PK_ID_Usuario_Persona`, `FK_ID_Cuenta`, `Nombre`, `Segundo_Nombre`, `Apellido`, `Segundo_Apellido`, `Municipio`, `Fecha_Nacimiento`, `Telefono_Celular`, `Sexo`, `Tipo_Cliente`, `Posee_Empresa`) VALUES
(1, 1, 'Michael', 'Steven', 'Restrepo', 'Alvarez', 'Bello', '1996-05-05', 320741145, 'Hombre', 'Esporadico', 'NO'),
(2, 2, 'Leider', 'Enrique', 'Valdes', '', 'Bello', '1996-05-15', 320741145, 'Hombre', 'Esporadico', 'NO'),
(3, 3, 'Andres', 'Mateo', 'Londono', 'Rivera', 'Antioquia', '0000-00-00', 320741145, 'Hombre', 'Esporadico', 'NO'),
(4, 4, 'Jhon', 'Jairo', 'Duque', 'Zuleta', 'Antioquia', '2016-03-26', 320741145, 'Hombre', 'Esporadico', 'NO'),
(5, 5, 'Jorman', '', 'atehortua', '', 'Antioquia', '2016-03-19', 2147483647, 'Indefinido', 'Esporadico', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentario`
--

CREATE TABLE IF NOT EXISTS `tbl_comentario` (
  `PK_ID_Comentario` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Usuario` int(40) NOT NULL,
  `Fecha_Comentario` datetime NOT NULL,
  `Descripcion` varchar(600) NOT NULL,
  `FK_ID_Producto` int(45) NOT NULL,
  `Valoracion_Comentario` int(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_ID_Comentario`),
  KEY `FK_ID_Producto` (`FK_ID_Producto`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_comentario`
--

INSERT INTO `tbl_comentario` (`PK_ID_Comentario`, `FK_ID_Usuario`, `Fecha_Comentario`, `Descripcion`, `FK_ID_Producto`, `Valoracion_Comentario`) VALUES
(1, 3, '2015-03-04 00:00:00', 'Esta bueno el producto', 1, 1),
(2, 3, '2015-03-04 00:00:00', 'Pero esta muy caro', 1, 0),
(3, 2, '2015-05-04 00:00:00', 'No esta bueno el producto', 2, 0),
(4, 2, '2015-05-04 00:00:00', 'Creo que deberia de mejorar', 2, 0),
(5, 5, '2015-05-04 00:00:00', 'Me callo mal el producto', 3, 0),
(6, 5, '2015-05-04 00:00:00', 'Era alergico a la salsa', 3, 0),
(7, 4, '2015-03-04 00:00:00', 'Muy caro', 4, 0),
(8, 1, '2016-03-09 21:27:45', 'Buenisimo el producto :D', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cotizacion_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_cotizacion_usuario` (
  `PK_ID_Cotizacion_Usuario` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Usuario` int(45) NOT NULL,
  `Fecha_Cotizacion` date NOT NULL,
  `Estado_Cotizacion` varchar(40) NOT NULL,
  `Direccion_entrega` varchar(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Cotizacion_Usuario`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuenta`
--

CREATE TABLE IF NOT EXISTS `tbl_cuenta` (
  `PK_ID_Usuario` int(45) NOT NULL AUTO_INCREMENT,
  `Nombre_Usuario` varchar(45) NOT NULL,
  `Correo_Electronico` varchar(45) NOT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `Contrasenia_Recuperacion` varchar(45) NOT NULL,
  `Contrasenia_Encriptada` varchar(45) NOT NULL,
  `Imagen_Usuario` varchar(250) NOT NULL,
  `Fondo_Perfil_Usuario` varchar(250) NOT NULL,
  `Disponibilidad` varchar(45) NOT NULL DEFAULT 'Activo',
  `Estado_Cuenta` varchar(45) NOT NULL DEFAULT 'En uso',
  `FK_ID_Rol` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Usuario`),
  KEY `FK_ID_Rol` (`FK_ID_Rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbl_cuenta`
--

INSERT INTO `tbl_cuenta` (`PK_ID_Usuario`, `Nombre_Usuario`, `Correo_Electronico`, `Contrasenia`, `Contrasenia_Recuperacion`, `Contrasenia_Encriptada`, `Imagen_Usuario`, `Fondo_Perfil_Usuario`, `Disponibilidad`, `Estado_Cuenta`, `FK_ID_Rol`) VALUES
(1, 'Mike', 'stiven3345@hotmail.com', '3345sra', 'p0nL5ZNS', '$2a$07$FC11BG6DAIB2JDE1E5B.EuS/LM1TnDDnD0anKG', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/lol.jpg', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/Ghoul_1.jpg', 'Activo', 'En uso', 3),
(2, 'Thelasofus', 'leidervm16@gmail.com', '3345SRA', 'kyd0J3MK', '$2a$07$43H80D/62H66602CE6E6C.mGByAml./9VvQP3T', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo66-old-car-forest-vintage-flare-nature-carl-kadysz-2880x1800.jpg', 'Activo', 'En uso', 3),
(3, 'Derkiller', 'amlondono@gmail.com', '3345sra', 'Nflz1h6k', '$2a$07$FH4B3337J12F0C./H.0KCuZCjdHIVtDnJMEubR', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo66-old-car-forest-vintage-flare-nature-carl-kadysz-2880x1800.jpg', 'Activo', 'En uso', 3),
(4, 'Jairo880', 'jairo880@gmail.com', '3345sra', 'mJMmiGBu', '$2a$07$85.63C38FI91EK7../6DBux2v7OvVX0.EYI3La', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo66-old-car-forest-vintage-flare-nature-carl-kadysz-2880x1800.jpg', 'Activo', 'En uso', 3),
(5, 'Amy', 'Mowglik@gmail.com', '3345sra', 'NJh6kY21', '$2a$07$9...39F41045C08DG2/53.P1IafAEUi6N5a5Kz', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar8_big.png', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/CEA8B1696.jpg', 'Activo', 'En uso', 3),
(6, 'Empleado', 'Empleado@hotmail.com', '3345sra', 'uWoUyI36', '$2a$07$AI37AD5D3C7D8.8/8GA6C.bN9lq881DPPd4Oie', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/CF9.jpg', 'Activo', 'En uso', 2),
(7, 'Administrador', 'Administrador@hotmail.com', '3345sra', 'ilQX4kTG', '$2a$07$AC00.335HCF1FA0DHA0DE./Yq8SsyPBA26OEuu', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png', 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo40-mac-apple-desk-jeff-sheldon-dark-office-3840x2400-4k-wallpaper.jpg', 'Activo', 'En uso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_establecimientos`
--

CREATE TABLE IF NOT EXISTS `tbl_datos_establecimientos` (
  `PK_ID_Establecimiento` int(45) NOT NULL AUTO_INCREMENT,
  `Nombre_Establecimiento` varchar(45) NOT NULL,
  `Nombre_Encargado` varchar(45) NOT NULL,
  `Nit` varchar(45) NOT NULL,
  `Telefono_Establecimiento` varchar(45) NOT NULL,
  `Direccion_Establecimiento` varchar(45) NOT NULL,
  `Municipio_Establecimiento` varchar(45) NOT NULL,
  `FK_ID_Usuario` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Establecimiento`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_buson_mensajes_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_buson_mensajes_usuario` (
  `PK_ID_Mensaje_Usuario` int(45) NOT NULL AUTO_INCREMENT,
  `FK_Buson_Mensajes` int(45) NOT NULL,
  `FK_ID_Usuario` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Mensaje_Usuario`),
  KEY `FK_Buson_Mensajes` (`FK_Buson_Mensajes`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_buson_notificacion_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_buson_notificacion_usuario` (
  `PK_ID_Notificacion_Usuario` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Buson_Notificacion` int(45) NOT NULL,
  `FK_ID_Usuario` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Notificacion_Usuario`),
  KEY `FK_ID_Buson_Notificacion` (`FK_ID_Buson_Notificacion`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_comentario_cuenta`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_comentario_cuenta` (
  `PK_ID_Comentario_Cuenta` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Usuario` int(40) NOT NULL,
  `FK_ID_Comentario` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Comentario_Cuenta`),
  KEY `FK_ID_Comentario` (`FK_ID_Comentario`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_dll_comentario_cuenta`
--

INSERT INTO `tbl_dll_comentario_cuenta` (`PK_ID_Comentario_Cuenta`, `FK_ID_Usuario`, `FK_ID_Comentario`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_producto_cotizacion`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_producto_cotizacion` (
  `PK_ID_Producto_Cotizacion` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Producto` int(45) NOT NULL,
  `FK_ID_Cotizacion_Usuario` int(40) NOT NULL,
  `Cantidad_Productos` int(45) NOT NULL,
  `Sub_Total_Cotizacion` int(100) NOT NULL,
  PRIMARY KEY (`PK_ID_Producto_Cotizacion`),
  KEY `FK_ID_Producto` (`FK_ID_Producto`),
  KEY `FK_ID_Cotizacion_Usuario` (`FK_ID_Cotizacion_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_promocion_producto`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_promocion_producto` (
  `PK_ID_Promocion_Producto` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Producto` int(45) NOT NULL,
  `FK_ID_Promocion` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Promocion_Producto`),
  KEY `FK_ID_Producto` (`FK_ID_Producto`),
  KEY `FK_ID_Promocion` (`FK_ID_Promocion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_dll_promocion_producto`
--

INSERT INTO `tbl_dll_promocion_producto` (`PK_ID_Promocion_Producto`, `FK_ID_Producto`, `FK_ID_Promocion`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_rol_cuenta`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_rol_cuenta` (
  `PK_ID_DLL_Rol_Cuenta` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Rol` int(45) NOT NULL,
  `FK_ID_Usuario` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_DLL_Rol_Cuenta`),
  KEY `FK_ID_Rol` (`FK_ID_Rol`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbl_dll_rol_cuenta`
--

INSERT INTO `tbl_dll_rol_cuenta` (`PK_ID_DLL_Rol_Cuenta`, `FK_ID_Rol`, `FK_ID_Usuario`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5),
(6, 2, 6),
(7, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dll_ruta_pedido`
--

CREATE TABLE IF NOT EXISTS `tbl_dll_ruta_pedido` (
  `PK_ID_Ruta_Pedido` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Ruta` int(40) NOT NULL,
  `FK_ID_Pedido` int(40) NOT NULL,
  PRIMARY KEY (`PK_ID_Ruta_Pedido`),
  KEY `FK_ID_Ruta` (`FK_ID_Ruta`),
  KEY `FK_ID_Pedido` (`FK_ID_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE IF NOT EXISTS `tbl_empleado` (
  `PK_ID_Usuario_Persona` int(45) NOT NULL AUTO_INCREMENT,
  `FK_ID_Cuenta` int(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Segundo_Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Segundo_Apellido` varchar(45) NOT NULL,
  `Municipio` varchar(45) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Telefono_Celular` int(30) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`PK_ID_Usuario_Persona`),
  KEY `FK_ID_Cuenta` (`FK_ID_Cuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`PK_ID_Usuario_Persona`, `FK_ID_Cuenta`, `Nombre`, `Segundo_Nombre`, `Apellido`, `Segundo_Apellido`, `Municipio`, `Fecha_Nacimiento`, `Telefono_Celular`, `Sexo`) VALUES
(1, 6, 'Empleado', 'null', 'Empleado', 'null', 'Medellín', '1997-06-10', 320741145, 'Hombre'),
(2, 7, 'Administrador', 'null', 'Administrador', 'null', 'Medellín', '1997-06-10', 320741145, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagenes_portada`
--

CREATE TABLE IF NOT EXISTS `tbl_imagenes_portada` (
  `PK_ID_Imagen_Portada` int(40) NOT NULL AUTO_INCREMENT,
  `URL_Imagen_Portada` varchar(250) NOT NULL,
  PRIMARY KEY (`PK_ID_Imagen_Portada`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `tbl_imagenes_portada`
--

INSERT INTO `tbl_imagenes_portada` (`PK_ID_Imagen_Portada`, `URL_Imagen_Portada`) VALUES
(4, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/CEA8B1696.jpg'),
(5, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/CF9.jpg'),
(9, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-ak95-oriental-art-flower-dark-black-painting-illust-3840x2400-4k-wallpaper.jpg'),
(17, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mb75-wallpaper-water-winter-tree-flower-3840x2400-4k-wallpaper.jpg'),
(18, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mf91-rain-drop-on-sunny-afternoon-nature-3840x2400-4k-wallpaper.jpg'),
(19, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mh34-aalborg-night-scene-from-sea-dark-cityscape-3840x2400-4k-wallpaper.jpg'),
(21, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mi53-breakfast-dish-dark-todd-quackenbush-photo-nature-3840x2400-4k-wallpaper.jpg'),
(22, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mi90-life-begins-leaf-waterdrop-nature-3840x2400-4k-wallpaper.jpg'),
(23, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mj05-fire-camp-light-thomas-lefebvre-nature-3840x2400-4k-wallpaper.jpg'),
(29, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-ml98-backyard-wood-day-bw-flare-bokeh-nature-1920x1080.jpg'),
(30, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mm05-flight-sunny-day-sky-dark-bokeh-high-mountains-nature-35-3840x2160-4k-wallpaper.jpg'),
(32, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mm67-jungle-gym-city-dark-bw-school-art-3840x2400-4k-wallpaper.jpg'),
(35, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mn04-city-bokeh-night-street-nature-israel-sundseth-3840x2400-4k-wallpaper.jpg'),
(37, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mn66-new-york-street-night-city-dark-bw-vignette-3840x2400-4k-wallpaper.jpg'),
(38, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo40-mac-apple-desk-jeff-sheldon-dark-office-3840x2400-4k-wallpaper.jpg'),
(39, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo50-forest-green-nature-tree-jonas-nilsson-lee-2880x1800%20%281%29.jpg'),
(40, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo66-old-car-forest-vintage-flare-nature-carl-kadysz-2880x1800.jpg'),
(44, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mp77-city-of-angels-skyview-dark-art-3840x2400-4k-wallpaper.jpg'),
(45, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mq71-bokeh-night-city-view-lights-1920x1080.jpg'),
(46, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mr04-drive-way-sunset-city-highway-car-flare-2560x1440.jpg'),
(47, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mr34-lake-calm-nature-beautiful-sea-water-1920x1080.jpg'),
(48, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-ms01-city-bridge-green-nature-1920x1080.jpg'),
(49, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-ms07-the-runner-mountain-jogging-sun-morning-nature-dark-bw-2880x1800.jpg'),
(51, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-ms74-stars-light-dark-interior-city-3840x2400-4k-wallpaper.jpg'),
(55, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv08-wood-nature-forest-road-mountain-dark-summer-2560x1440.jpg'),
(57, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv34-night-beach-sea-vacation-nature-star-sky-2880x1800.jpg'),
(58, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv37-dawn-sunset-blue-mountain-sky-nature-3840x2400-4k-wallpaper.jpg'),
(59, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv63-night-nature-flower-sunset-dark-shadow-2560x1600.jpg'),
(60, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv70-sky-night-star-dark-mountain-cloud-shadow-3840x2400-4k-wallpaper.jpg'),
(62, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv89-garden-moss-stone-nature-road-city-flare-dark-bw-2880x1800.jpg'),
(65, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mv94-light-night-lamp-city-silent-dark-2880x1800.jpg'),
(67, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-ve56-bokeh-light-dark-water-city-nature-3840x2400-4k-wallpaper.jpg'),
(68, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-vf86-square-party-oranage-pattern-1440x900.jpg'),
(70, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/Ghoul_1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagenes_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_imagenes_usuarios` (
  `PK_ID_Imagen_Usuario` int(40) NOT NULL AUTO_INCREMENT,
  `URL_Imagen_Usuario` varchar(250) NOT NULL,
  PRIMARY KEY (`PK_ID_Imagen_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `tbl_imagenes_usuarios`
--

INSERT INTO `tbl_imagenes_usuarios` (`PK_ID_Imagen_Usuario`, `URL_Imagen_Usuario`) VALUES
(4, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar1_big.png'),
(5, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png'),
(6, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar3_big.png'),
(7, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar4_big.png'),
(8, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar5_big.png'),
(9, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar6_big.png'),
(10, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar8_big.png'),
(11, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar9_big.png'),
(12, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar10_big.png'),
(13, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar11_big.png'),
(14, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar12_big.png'),
(15, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar13_big.png'),
(19, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar1_big.png'),
(23, 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/lol.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_pedido_usuario` (
  `PK_ID_Pedido` int(45) NOT NULL AUTO_INCREMENT,
  `Fecha_Pedido` date NOT NULL,
  `FK_ID_Cotizacion_Usuario` int(45) NOT NULL,
  `Direccion_entrega` varchar(200) NOT NULL,
  `Fecha_Cotizacion` date NOT NULL,
  `Estado_pedido` varchar(40) NOT NULL,
  PRIMARY KEY (`PK_ID_Pedido`),
  KEY `FK_ID_Cotizacion_Usuario` (`FK_ID_Cotizacion_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_permisos_usuario` (
  `PK_ID_Permisos_Usuario` int(40) NOT NULL AUTO_INCREMENT,
  `FK_ID_Rol` int(40) NOT NULL,
  `FK_ID_Vista` int(40) NOT NULL,
  PRIMARY KEY (`PK_ID_Permisos_Usuario`),
  KEY `FK_ID_Rol` (`FK_ID_Rol`),
  KEY `FK_ID_Vista` (`FK_ID_Vista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tbl_permisos_usuario`
--

INSERT INTO `tbl_permisos_usuario` (`PK_ID_Permisos_Usuario`, `FK_ID_Rol`, `FK_ID_Vista`) VALUES
(1, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 2, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 1, 9),
(11, 1, 10),
(12, 2, 11),
(13, 3, 12),
(14, 3, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE IF NOT EXISTS `tbl_producto` (
  `PK_ID_Producto` int(40) NOT NULL AUTO_INCREMENT,
  `Nombre_Producto` varchar(45) NOT NULL,
  `Valor_Unitario` int(30) NOT NULL,
  `Descripcion_Producto` varchar(250) NOT NULL,
  `Cant_Unid_Max` int(100) NOT NULL,
  `Cant_Unid_Min` int(100) NOT NULL,
  `FK_ID_Categoria` int(40) NOT NULL,
  `Ruta_Imagen_Producto` varchar(250) NOT NULL,
  `Estado_Producto` varchar(45) NOT NULL DEFAULT 'Habilitado',
  PRIMARY KEY (`PK_ID_Producto`),
  KEY `FK_ID_Categoria` (`FK_ID_Categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`PK_ID_Producto`, `Nombre_Producto`, `Valor_Unitario`, `Descripcion_Producto`, `Cant_Unid_Max`, `Cant_Unid_Min`, `FK_ID_Categoria`, `Ruta_Imagen_Producto`, `Estado_Producto`) VALUES
(1, 'Tequeno', 1500, 'Productos congelado', 60, 15, 1, 'http://lorempixel.com/image_output/food-q-c-640-480-6.jpg', 'Habilitado'),
(2, 'Empanada con pollo', 3000, 'Productos congelado', 60, 15, 1, 'http://lorempixel.com/image_output/food-q-c-640-480-4.jpg', 'Habilitado'),
(3, 'Pancerotis(Ranchero)', 1000, 'Productos congelado', 60, 15, 1, 'http://lorempixel.com/image_output/food-q-c-640-480-9.jpg', 'Habilitado'),
(4, 'Pancerotis(Pollo)', 500, 'Productos congelado', 60, 15, 1, 'http://lorempixel.com/image_output/food-q-c-640-480-3.jpg', 'Habilitado'),
(5, 'Pancerotis(Hawaiano)', 2000, 'Productos congelado', 60, 15, 1, 'http://lorempixel.com/image_output/food-q-c-640-480-5.jpg', 'Habilitado'),
(6, 'Palitos', 3500, 'Productos congelado', 60, 15, 1, 'http://lorempixel.com/image_output/food-q-c-640-480-8.jpg', 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_promocion`
--

CREATE TABLE IF NOT EXISTS `tbl_promocion` (
  `PK_ID_Promocion` int(45) NOT NULL AUTO_INCREMENT,
  `Nombre_Promocion` varchar(45) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  PRIMARY KEY (`PK_ID_Promocion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_promocion`
--

INSERT INTO `tbl_promocion` (`PK_ID_Promocion`, `Nombre_Promocion`, `Descripcion`, `Fecha_Inicio`, `Fecha_Fin`) VALUES
(1, 'Promocion 1', '20 unidades de tequenos', '2015-03-03', '2015-03-04'),
(2, 'Promocion 2', '15 unidades de pancerotis', '2015-03-03', '2015-05-04'),
(3, 'Promocion 3', '30 unidades de pancerotis', '2015-05-03', '2015-06-04'),
(4, 'Promocion 4', '10 unidades de palitos', '2015-03-03', '2015-03-04'),
(5, 'Promocion 5', '20 unidades de empanadas ', '2015-03-06', '2015-03-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_rol_usuario` (
  `PK_ID_Rol` int(45) NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_rol_usuario`
--

INSERT INTO `tbl_rol_usuario` (`PK_ID_Rol`, `Nombre_Rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ruta`
--

CREATE TABLE IF NOT EXISTS `tbl_ruta` (
  `PK_ID_Ruta` int(40) NOT NULL AUTO_INCREMENT,
  `FK_ID_Ubicacion` int(45) NOT NULL,
  PRIMARY KEY (`PK_ID_Ruta`),
  KEY `FK_ID_Ubicacion` (`FK_ID_Ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ubicacion`
--

CREATE TABLE IF NOT EXISTS `tbl_ubicacion` (
  `PK_ID_Ubicacion` int(40) NOT NULL AUTO_INCREMENT,
  `FK_ID_Usuario` int(30) NOT NULL,
  `Longitut` decimal(10,0) NOT NULL,
  `Latitud` decimal(10,0) NOT NULL,
  PRIMARY KEY (`PK_ID_Ubicacion`),
  KEY `FK_ID_Usuario` (`FK_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vista_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_vista_usuario` (
  `PK_ID_Vista` int(40) NOT NULL AUTO_INCREMENT,
  `Nombre_Vista` varchar(40) NOT NULL,
  `Url_Vista` varchar(150) NOT NULL,
  PRIMARY KEY (`PK_ID_Vista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbl_vista_usuario`
--

INSERT INTO `tbl_vista_usuario` (`PK_ID_Vista`, `Nombre_Vista`, `Url_Vista`) VALUES
(1, ' Modulo Permisos', 'Administracion/Inicio_Administracion/Modulo_Permisos_Usuario'),
(2, 'Guia proyecto', 'Administracion/Guia_Proyecto'),
(3, 'Consultar usuarios', 'Administracion/Inicio_Administracion/Consultar_Usuarios'),
(4, 'Modulo Productos', 'Administracion/Inicio_Administracion/Modulo_Producto'),
(5, 'Error', 'Error/Error'),
(6, 'Registrar Nuevo Usuario', 'Administracion/Inicio_Administracion/Registrar_Nuevo_Usuario'),
(7, 'Modulo gestion de contenido', 'Administracion/Inicio_Administracion/Modulo_Gestion_De_Contenido'),
(8, 'Modulo Promociones', 'Administracion/Inicio_Administracion/Modulo_Promociones'),
(9, 'Modulo Categoria', 'Administracion/Inicio_Administracion/Modulo_Categoria'),
(10, 'Opciones Cuenta', 'Cliente/Cuenta'),
(11, 'Opciones Cuenta', 'Cliente/Cuenta'),
(12, 'Opciones Cuenta', 'Cliente/Cuenta'),
(13, 'Error', 'Error/Error');
