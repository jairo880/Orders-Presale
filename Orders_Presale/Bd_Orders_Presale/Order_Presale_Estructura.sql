CREATE DATABASE IF NOT EXISTS Orders_Presale DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


USE Orders_Presale;



-- Estructura par la tabla  TBL_Rol_Usuario
--
DROP TABLE IF EXISTS TBL_Rol_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Rol_Usuario (
  PK_ID_Rol INT(45) NOT NULL AUTO_INCREMENT ,
  Nombre_Rol VARCHAR(45) NOT NULL,
  PRIMARY KEY (PK_ID_Rol)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1 ;


-- Estructura par la tabla  Cuenta
--
DROP TABLE IF EXISTS TBL_Cuenta;
CREATE TABLE IF NOT EXISTS TBL_Cuenta (
  PK_ID_Usuario INT(45) NOT NULL AUTO_INCREMENT,
  Nombre_Usuario VARCHAR(45) NOT NULL,
  Correo_Electronico VARCHAR(45) NOT NULL,
  Contrasenia VARCHAR(45) NOT NULL,
  Contrasenia_Recuperacion VARCHAR(45) NOT NULL,
  Contrasenia_Encriptada VARCHAR(45) NOT NULL,
  Imagen_Usuario VARCHAR(250) NOT NULL,
  Fondo_Perfil_Usuario VARCHAR(250) NOT NULL,
  Disponibilidad VARCHAR(45) NOT NULL DEFAULT 'Activo',
  Estado_Cuenta VARCHAR(45) NOT NULL DEFAULT 'En uso',
  FK_ID_Rol INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_Usuario),
  FOREIGN KEY (FK_ID_Rol) REFERENCES TBL_Rol_Usuario (PK_ID_Rol)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
-- Estructura par la tabla  dll_rol_cuenta
--
DROP TABLE IF EXISTS TBL_DLL_Rol_Cuenta;
CREATE TABLE IF NOT EXISTS TBL_DLL_Rol_Cuenta (
  PK_ID_DLL_Rol_Cuenta INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Rol INT(45) NOT NULL ,
  FK_ID_Usuario INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_DLL_Rol_Cuenta),
  FOREIGN KEY (FK_ID_Rol) REFERENCES TBL_Rol_Usuario(PK_ID_Rol),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
--
--
-- Estructura par la tabla  Cliente
--
DROP TABLE IF EXISTS TBL_Cliente;
CREATE TABLE IF NOT EXISTS TBL_Cliente (
  PK_ID_Usuario_Persona INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Cuenta INT(45) NOT NULL,
  Nombre VARCHAR(45) NOT NULL,
  Segundo_Nombre VARCHAR(45) NOT NULL,
  Apellido VARCHAR(45) NOT NULL,
  Segundo_Apellido VARCHAR(45) NOT NULL,
  Municipio VARCHAR(45) NOT NULL,
  Fecha_Nacimiento Date NOT NULL,
  Telefono_Celular INT(30) NOT NULL,
  Sexo VARCHAR(10) NOT NULL,
  Tipo_Cliente VARCHAR(20) NOT NULL,
  Posee_Empresa VARCHAR(10) NOT NULL,
  PRIMARY KEY (PK_ID_Usuario_Persona),
  FOREIGN KEY (FK_ID_Cuenta) REFERENCES TBL_Cuenta(PK_ID_Usuario)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

--
--
-- Estructura par la tabla  TBL_Datos_Establecimientos
--
DROP TABLE IF EXISTS TBL_Datos_Establecimientos;
CREATE TABLE IF NOT EXISTS TBL_Datos_Establecimientos (
  PK_ID_Establecimiento INT(45) NOT NULL AUTO_INCREMENT,
  Nombre_Establecimiento VARCHAR(45) NOT NULL,
  Nombre_Encargado VARCHAR(45) NOT NULL,
  Nit VARCHAR(45) NOT NULL,
  Telefono_Establecimiento VARCHAR(45) NOT NULL,
  Direccion_Establecimiento VARCHAR(45) NOT NULL,
  Municipio_Establecimiento VARCHAR(45) NOT NULL,
  FK_ID_Usuario INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_Establecimiento),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura par la tabla  TBL_Empleado
--
DROP TABLE IF EXISTS TBL_Empleado;
CREATE TABLE IF NOT EXISTS TBL_Empleado (
  PK_ID_Usuario_Persona INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Cuenta INT(45) NOT NULL,
  Nombre VARCHAR(45) NOT NULL,
  Segundo_Nombre VARCHAR(45) NOT NULL,
  Apellido VARCHAR(45) NOT NULL,
  Segundo_Apellido VARCHAR(45) NOT NULL,
  Municipio VARCHAR(45) NOT NULL,
  Fecha_Nacimiento Date NOT NULL,
  Telefono_Celular INT(30) NOT NULL,
  Sexo VARCHAR(10) NOT NULL,
  PRIMARY KEY (PK_ID_Usuario_Persona),
  FOREIGN KEY (FK_ID_Cuenta) REFERENCES TBL_Cuenta(PK_ID_Usuario)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura par la tabla  TBL_Cotizacion_Usuario
--
DROP TABLE IF EXISTS TBL_Cotizacion_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Cotizacion_Usuario (
  PK_ID_Cotizacion_Usuario INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Usuario INT(45) NOT NULL,
  Fecha_Cotizacion Datetime NOT NULL,
  Estado_Cotizacion VARCHAR(40) NOT NULL DEFAULT 'En proceso',
  Direccion_entrega VARCHAR(45) NOT NULL,
  Telefono_Entrega VARCHAR(45) NOT NULL,
  PRIMARY KEY (PK_ID_Cotizacion_Usuario),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)


)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura par la tabla  TBL_Pedido_Usuario
--
DROP TABLE IF EXISTS TBL_Pedido_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Pedido_Usuario (
  PK_ID_Pedido INT(45) NOT NULL AUTO_INCREMENT,
  Fecha_Pedido Date NOT NULL,
  FK_ID_Cotizacion_Usuario INT(45) NOT NULL,
  Direccion_entrega VARCHAR(200) NOT NULL,
  Fecha_Cotizacion Date NOT NULL,
  Estado_pedido VARCHAR(40) NOT NULL,
  PRIMARY KEY (PK_ID_Pedido),
  FOREIGN KEY (FK_ID_Cotizacion_Usuario) REFERENCES TBL_Cotizacion_Usuario(PK_ID_Cotizacion_Usuario)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura par la tabla  TBL_Categoria_Producto
--
DROP TABLE IF EXISTS TBL_Categoria_Producto;
CREATE TABLE IF NOT EXISTS TBL_Categoria_Producto (
  PK_ID_Categoria INT(45) NOT NULL AUTO_INCREMENT,
  Nombre_Categoria VARCHAR(45) NOT NULL,
  Descripcion VARCHAR(200) NOT NULL,
  PRIMARY KEY (PK_ID_Categoria)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
--
-- Estructura par la tabla  TBL_Producto
--
DROP TABLE IF EXISTS TBL_Producto;
CREATE TABLE IF NOT EXISTS TBL_Producto (
  PK_ID_Producto INT(40) NOT NULL AUTO_INCREMENT,
  Nombre_Producto VARCHAR(45) NOT NULL,
  Valor_Unitario INT(30) NOT NULL,
  Descripcion_Producto VARCHAR(250) NOT NULL,
  Cant_Unid_Max INT(100) NOT NULL,
  Cant_Unid_Min INT(100) NOT NULL,
  FK_ID_Categoria INT(40) NOT NULL,
  Ruta_Imagen_Producto VARCHAR(250) NOT NULL,
  Estado_Producto varchar (45) NOT NULL DEFAULT 'Habilitado',
  PRIMARY KEY (PK_ID_Producto),
  FOREIGN KEY (FK_ID_Categoria) REFERENCES TBL_Categoria_Producto (PK_ID_Categoria)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
--
-- Estructura par la tabla  TBL_Promocion
--
DROP TABLE IF EXISTS TBL_Promocion;
CREATE TABLE IF NOT EXISTS TBL_Promocion (
  PK_ID_Promocion INT(45) NOT NULL AUTO_INCREMENT,
  Nombre_Promocion VARCHAR(45) NOT NULL,
  Descripcion VARCHAR(300) NOT NULL,
  Fecha_Inicio Date NOT NULL,
  Fecha_Fin Date NOT NULL,
  PRIMARY KEY (PK_ID_Promocion)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT =1;

--
-- Estructura par la tabla  TBL_DLL_Promocion_Producto
--
DROP TABLE IF EXISTS TBL_DLL_Promocion_Producto;
CREATE TABLE IF NOT EXISTS TBL_DLL_Promocion_Producto (
  PK_ID_Promocion_Producto INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Producto INT(45) NOT NULL,
  FK_ID_Promocion INT(45) NOT NULL,
  PRIMARY KEY(PK_ID_Promocion_Producto),
  FOREIGN KEY (FK_ID_Producto) REFERENCES TBL_Producto (PK_ID_Producto),
  FOREIGN KEY (FK_ID_Promocion) REFERENCES TBL_Promocion (PK_ID_Promocion)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

--
-- Estructura par la tabla  TBL_DLL_Producto_Cotizacion
--
DROP TABLE IF EXISTS TBL_DLL_Producto_Cotizacion;
CREATE TABLE IF NOT EXISTS TBL_DLL_Producto_Cotizacion (
 PK_ID_Producto_Cotizacion INT(45) NOT NULL AUTO_INCREMENT,
 FK_ID_Producto INT(45) NOT NULL,
 FK_ID_Cotizacion_Usuario INT(40) NOT NULL,
 Cantidad_Productos INT(45) NOT NULL,
 Sub_Total INT(100) NOT NULL,
 PRIMARY KEY (PK_ID_Producto_Cotizacion),
 FOREIGN KEY (FK_ID_Producto) REFERENCES TBL_Producto (PK_ID_Producto),
 FOREIGN KEY (FK_ID_Cotizacion_Usuario) REFERENCES TBL_Cotizacion_Usuario (PK_ID_Cotizacion_Usuario)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Estructura par la tabla  TBL_Comentario Producto
--
DROP TABLE IF EXISTS TBL_Comentario;
CREATE TABLE IF NOT EXISTS TBL_Comentario (
  PK_ID_Comentario INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Usuario INT(40) NOT NULL,
  Fecha_Comentario Datetime NOT NULL,
  Descripcion VARCHAR(600) NOT NULL,
  FK_ID_Producto INT(45) NOT NULL,
  Valoracion_Comentario INT(45) NOT NULL DEFAULT 0,

  PRIMARY KEY (PK_ID_Comentario),
  FOREIGN KEY (FK_ID_Producto) REFERENCES TBL_Producto(PK_ID_Producto),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT= 1;


-- Estructura par la tabla  TBL_DLL_Comentario_Cuenta Producto
--
DROP TABLE IF EXISTS TBL_DLL_Comentario_Cuenta;
CREATE TABLE IF NOT EXISTS TBL_DLL_Comentario_Cuenta (
  PK_ID_Comentario_Cuenta INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Usuario INT(40) NOT NULL,
  FK_ID_Comentario INT(45) NOT NULL,

  PRIMARY KEY (PK_ID_Comentario_Cuenta),
  FOREIGN KEY (FK_ID_Comentario) REFERENCES TBL_Comentario(PK_ID_Comentario),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT= 1;

--
-- Estructura par la tabla  TBL_Buson_Mensajes_Usuario
--
DROP TABLE IF EXISTS TBL_Buson_Mensajes_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Buson_Mensajes_Usuario (
  PK_ID_Buson_Mensajes INT(45) NOT NULL AUTO_INCREMENT,
  Mensaje VARCHAR(50) NOT NULL,
  Fecha_Envio Date NOT NULL,
  FK_ID_Usuario INT(45) NOT NULL,
  FK_ID_Pedido INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_Buson_Mensajes),
  FOREIGN KEY (FK_ID_Pedido) REFERENCES TBL_Pedido_Usuario(PK_ID_Pedido),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura par la tabla  TBL_DLL_Buson_Mensajes_Usuario
--
DROP TABLE IF EXISTS TBL_DLL_Buson_Mensajes_Usuario;
CREATE TABLE IF NOT EXISTS TBL_DLL_Buson_Mensajes_Usuario (
  PK_ID_Mensaje_Usuario INT(45) NOT NULL AUTO_INCREMENT,
  FK_Buson_Mensajes INT(45) NOT NULL,
  FK_ID_Usuario INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_Mensaje_Usuario),
  FOREIGN KEY (FK_Buson_Mensajes) REFERENCES TBL_Buson_Mensajes_Usuario(PK_ID_Buson_Mensajes),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)


)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
-- Estructura par la tabla  Buson_Notificacion_Usuario
--
DROP TABLE IF EXISTS TBL_Buson_Notificacion_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Buson_Notificacion_Usuario (
  PK_ID_Buson_Notificacion INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Cotizacion INT(45) NOT NULL,
  Estado_Pedido VARCHAR(50) NOT NULL DEFAULT 'En proceso',
  Fecha_Envio Datetime NOT NULL,
  PRIMARY KEY (PK_ID_Buson_Notificacion),
  FOREIGN KEY (FK_ID_Cotizacion) REFERENCES TBL_Cotizacion_Usuario(PK_ID_Cotizacion_Usuario)


)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura par la tabla  TBL_DLL_Buson_Notificacion_Usuario
--
DROP TABLE IF EXISTS TBL_DLL_Buson_Notificacion_Usuario;
CREATE TABLE IF NOT EXISTS TBL_DLL_Buson_Notificacion_Usuario (
  PK_ID_Notificacion_Usuario INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Buson_Notificacion INT(45) NOT NULL,
  FK_ID_Usuario INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_Notificacion_Usuario),
  FOREIGN KEY (FK_ID_Buson_Notificacion) REFERENCES TBL_Buson_Notificacion_Usuario(PK_ID_Buson_Notificacion),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)


)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
--
-- Estructura par la tabla  TBL_Ubicacion
--
DROP TABLE IF EXISTS TBL_Ubicacion;
CREATE TABLE IF NOT EXISTS TBL_Ubicacion (
  PK_ID_Ubicacion INT(40) NOT NULL AUTO_INCREMENT,
  FK_ID_Usuario INT(30) NOT NULL,
  Longitut Decimal NOT NULL,
  Latitud Decimal NOT NULL,
  PRIMARY KEY (PK_ID_Ubicacion),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

--
-- Estructura par la tabla  TBL_Ruta
--
DROP TABLE IF EXISTS TBL_Ruta;
CREATE TABLE IF NOT EXISTS TBL_Ruta (
  PK_ID_Ruta INT(40) NOT NULL AUTO_INCREMENT,
  FK_ID_Ubicacion INT(45) NOT NULL,
  PRIMARY KEY (PK_ID_Ruta),
  FOREIGN KEY (FK_ID_Ubicacion) REFERENCES TBL_Ubicacion (PK_ID_Ubicacion)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

--
-- Estructura par la tabla  TBL_DLL_Ruta_Pedido
--
DROP TABLE IF EXISTS TBL_DLL_Ruta_Pedido;
CREATE TABLE IF NOT EXISTS TBL_DLL_Ruta_Pedido (
  PK_ID_Ruta_Pedido INT(45) NOT NULL AUTO_INCREMENT,
  FK_ID_Ruta INT(40) NOT NULL ,
  FK_ID_Pedido INT(40) NOT NULL,
  PRIMARY KEY(PK_ID_Ruta_Pedido),
  FOREIGN KEY (FK_ID_Ruta) REFERENCES TBL_Ruta(PK_ID_Ruta),
  FOREIGN KEY (FK_ID_Pedido) REFERENCES TBL_Pedido_Usuario(PK_ID_Pedido)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;


--
-- Estructura par la tabla  TBL_Chat
--
DROP TABLE IF EXISTS TBL_Chat;
CREATE TABLE IF NOT EXISTS TBL_Chat(
  PK_ID_Chat INT(40) NOT NULL,
  Estado_Chat VARCHAR(45) NOT NULL,
  FK_ID_Usuario INT(40) NOT NULL,
  Nombre_Usuario VARCHAR(45),
  PRIMARY KEY (PK_ID_Chat),
  FOREIGN KEY (FK_ID_Usuario) REFERENCES TBL_Cuenta(PK_ID_Usuario)
);
--
-- Estructura par la tabla  TBL_Imagenes_Usuarios
--
DROP TABLE IF EXISTS TBL_Imagenes_Usuarios;
CREATE TABLE IF NOT EXISTS TBL_Imagenes_Usuarios(
  PK_ID_Imagen_Usuario INT(40) NOT NULL AUTO_INCREMENT,
  URL_Imagen_Usuario VARCHAR(250) NOT NULL,

  PRIMARY KEY (PK_ID_Imagen_Usuario)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

--
-- Estructura par la tabla  TBL_Imagenes_Portadas
--
DROP TABLE IF EXISTS TBL_Imagenes_Portada;
CREATE TABLE IF NOT EXISTS TBL_Imagenes_Portada(
  PK_ID_Imagen_Portada INT(40) NOT NULL AUTO_INCREMENT,
  URL_Imagen_Portada VARCHAR(250) NOT NULL,

  PRIMARY KEY (PK_ID_Imagen_Portada)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;


--
-- Estructura para la tabla TBL_Vista_Usuario
--
DROP TABLE IF EXISTS TBL_Vista_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Vista_Usuario(
  PK_ID_Vista INT(40) NOT NULL AUTO_INCREMENT,
  Nombre_Vista  VARCHAR(40) NOT NULL,
  Url_Vista VARCHAR(150) NOT NULL,
  PRIMARY KEY (PK_ID_Vista)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;



--
-- Estructura para la tabla TBL_Permisos_Usuario
--
DROP TABLE IF EXISTS TBL_Permisos_Usuario;
CREATE TABLE IF NOT EXISTS TBL_Permisos_Usuario(
  PK_ID_Permisos_Usuario INT(40) NOT NULL AUTO_INCREMENT,
  FK_ID_Rol  INT(40) NOT NULL,
  FK_ID_Vista  INT(40) NOT NULL,
  PRIMARY KEY (PK_ID_Permisos_Usuario),
  FOREIGN KEY (FK_ID_Rol) REFERENCES TBL_Rol_Usuario(PK_ID_Rol),
  FOREIGN KEY (FK_ID_Vista) REFERENCES TBL_Vista_Usuario(PK_ID_Vista)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;


-- Estructura par la tabla  TBL_Ejemplo_Crud
--
DROP TABLE IF EXISTS TBL_Ejemplo_Crud;
CREATE TABLE IF NOT EXISTS TBL_Ejemplo_Crud (
  PK_ID_Usuario_Ejemplo INT(45) NOT NULL AUTO_INCREMENT,
  Nombre_Usuario_Ejemplo VARCHAR(45) NOT NULL,
  Contrasenia_Ejemplo VARCHAR(45) NOT NULL,
  PRIMARY KEY (PK_ID_Usuario_Ejemplo)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

