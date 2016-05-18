


 -- **********************FUNCIONES******************
 -- ************************************
 DELIMITER !

 CREATE FUNCTION `fnRegistrarCliente`( `$Nombre_Usuario` VARCHAR(45), `$Correo_Electronico` VARCHAR(45), `$Contrasenia` VARCHAR(45), `$Contrasenia_Recuperacion` VARCHAR(45),`$Contrasenia_Encriptada` VARCHAR(45), `$Imagen_Usuario` VARCHAR(150), `$Fondo_Perfil_Usuario` VARCHAR(150), `$Disponibilidad` VARCHAR(45), `$Estado_Cuenta` VARCHAR(45), `$Id_Rol` INT(45)) RETURNS int(11)
 BEGIN

 DECLARE IdAuto INT;

 DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

 SET IdAuto = (

   SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
   TABLE_SCHEMA = 'orders_presale'
   AND TABLE_NAME = 'tbl_cuenta'
   );

 INSERT INTO `tbl_cuenta`
 (`Nombre_Usuario`, `Correo_Electronico`, `Contrasenia`,`Contrasenia_Recuperacion`,`Contrasenia_Encriptada`,`Imagen_Usuario`,`Fondo_Perfil_Usuario`,`Disponibilidad`,`Estado_Cuenta`,`FK_ID_Rol`) VALUES
 (
  $Nombre_Usuario,
  $Correo_Electronico,
  $Contrasenia,
  $Contrasenia_Recuperacion,
  $Contrasenia_Encriptada,
  $Imagen_Usuario,
  $Fondo_Perfil_Usuario,
  $Disponibilidad,
  $Estado_Cuenta,
  $Id_Rol);

 IF (IdAuto != 0) THEN

 RETURN IdAuto;
 ELSE
 RETURN 0;
 END IF;

 END !

 DELIMITER ;
-- **********************FUNCION PARA REGISTRAR UNA VISTA Y OBTENER EL ID DE ESTA***********************
DELIMITER !

CREATE FUNCTION `fnRegistrar_Vista_Usuario`( `$Nombre_Vista` VARCHAR(45), `$Url_Vista` VARCHAR(150)) RETURNS int(11)
BEGIN

DECLARE Id_Auto INT;

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

SET Id_Auto = (

 SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
 TABLE_SCHEMA = 'orders_presale'
 AND TABLE_NAME = 'tbl_vista_usuario'
 );

INSERT INTO `tbl_vista_usuario`
(`Nombre_Vista`, `Url_Vista`) VALUES
(
  $Nombre_Vista,
  $Url_Vista

  );

IF (Id_Auto != 0) THEN

RETURN Id_Auto;
ELSE
RETURN 0;
END IF;

END !

DELIMITER ;


-- **********************FUNCION PARA REGISTRAR UNA COTIZACION REALIZADA POR UN CLIENTE***********************
DELIMITER !

CREATE FUNCTION `fnRegistrar_Cotizacion_Producto`( `$FK_ID_Usuario` VARCHAR(45), `$Direccion_entrega` VARCHAR(45), `$Telefono_Entrega` VARCHAR(45)) RETURNS int(11)
BEGIN

DECLARE Id_Auto INT;

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

SET Id_Auto = (

 SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
 TABLE_SCHEMA = 'orders_presale'
 AND TABLE_NAME = 'tbl_cotizacion_usuario'
 );

INSERT INTO `tbl_cotizacion_usuario`
(`FK_ID_Usuario`,`Fecha_Cotizacion`, `Direccion_entrega`,`Telefono_Entrega`) VALUES
(
  $FK_ID_Usuario,
  now(),
  $Direccion_entrega,
  $Telefono_Entrega

  );

IF (Id_Auto != 0) THEN

RETURN Id_Auto;
ELSE
RETURN 0;
END IF;

END !

DELIMITER ;




-- **********************FUNCION PARA REGISTRAR UNA NOTIFICACION DE COTIZACION***********************
DELIMITER !

CREATE FUNCTION `fnRegistrar_Notificacion`( `$FK_ID_Pedido` INT(45)) RETURNS int(11)
BEGIN

DECLARE Id_Auto INT;

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

SET Id_Auto = (

 SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
 TABLE_SCHEMA = 'orders_presale'
 AND TABLE_NAME = 'tbl_buson_notificacion_usuario'
 );

INSERT INTO `tbl_buson_notificacion_usuario`
(`FK_ID_Pedido`,`Fecha_Envio`) VALUES
(
  $FK_ID_Pedido,
  now()

  );

IF (Id_Auto != 0) THEN

RETURN Id_Auto;
ELSE
RETURN 0;
END IF;

END !

DELIMITER ;




 -- **********************FUNCION PARA REGISTRAR UNA DUPLICACION DE LA COTIZACION***********************

 DELIMITER !

 CREATE FUNCTION `fnDuplicarCotizacion`(`$PK_ID_Cotizacion_Usuario` INT(45)) RETURNS int(11)
 BEGIN

 DECLARE Id_Auto INT;

 DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

 SET Id_Auto = (

   SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
   TABLE_SCHEMA = 'orders_presale'
   AND TABLE_NAME = 'tbl_pedido_usuario'

   );

 INSERT INTO tbl_pedido_usuario (FK_ID_Cotizacion_Usuario,Direccion_entrega,Fecha_Cotizacion,Fecha_Pedido,FK_ID_Usuario,Telefono_Entrega)
 SELECT PK_ID_Cotizacion_Usuario,Direccion_entrega,Fecha_Cotizacion,NOW(),FK_ID_Usuario,Telefono_Entrega FROM  tbl_cotizacion_usuario
 WHERE  Estado_Cotizacion = 'Atendido' AND PK_ID_Cotizacion_Usuario = $PK_ID_Cotizacion_Usuario;
 IF (Id_Auto != 0) THEN

 RETURN Id_Auto;
 ELSE
 RETURN 0;
 END IF;

 END !

 DELIMITER ;
 -- -------


 
-- **********************FUNCION PARA REGISTRAR UN MENSAJE DE CHAT***********************
DELIMITER !

CREATE FUNCTION `fnRegistrar_Mensaje_chat`( `$FK_ID_Usuario_Destinatario` INT(45),`$FK_ID_Usuario_Remitente` INT(45)) RETURNS int(11)
BEGIN

DECLARE Id_Auto INT;

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

SET Id_Auto = (

 SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
 TABLE_SCHEMA = 'orders_presale'
 AND TABLE_NAME = 'tbl_dll_chat'
 );

INSERT INTO `tbl_dll_chat`(`FK_ID_Usuario_Destinatario`,`FK_ID_Usuario_Remitente`,`Fecha_Inicio_Conversacion`) VALUES ($FK_ID_Usuario_Destinatario, $FK_ID_Usuario_Remitente, now());

IF (Id_Auto != 0) THEN

RETURN Id_Auto;
ELSE
RETURN 0;
END IF;

END !

DELIMITER ;
