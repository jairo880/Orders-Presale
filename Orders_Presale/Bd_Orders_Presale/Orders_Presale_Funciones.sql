


 -- **********************FUNCIONES******************
 -- ************************************
 DELIMITER !

 CREATE FUNCTION `fnRegistrarCliente`( `$Nombre_Usuario` VARCHAR(45), `$Correo_Electronico` VARCHAR(45), `$Contrasenia` VARCHAR(45), `$Contrasenia_Recuperacion` VARCHAR(45),`$Contrasenia_Encriptada` VARCHAR(45), `$Imagen_Usuario` VARCHAR(150), `$Fondo_Perfil_Usuario` VARCHAR(150), `$Disponibilidad` VARCHAR(45), `$Estado_Cuenta` VARCHAR(45), `$Id_Rol` INT(45)) RETURNS int(11)
 BEGIN

 DECLARE IdAuto INT;

 DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

 SET IdAuto = (

   SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
   TABLE_SCHEMA = 'Orders_Presale'
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

 DECLARE IdAuto_Producto INT;

 DECLARE CONTINUE HANDLER FOR SQLEXCEPTION return 0;

 SET IdAuto_Producto = (

   SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE
   TABLE_SCHEMA = 'Orders_Presale'
   AND TABLE_NAME = 'tbl_vista_usuario'
   );

 INSERT INTO `tbl_vista_usuario`
 (`Nombre_Vista`, `Url_Vista`) VALUES
 (
  $Nombre_Vista,
  $Url_Vista
  
  );

 IF (IdAuto_Producto != 0) THEN

 RETURN IdAuto_Producto;
 ELSE
 RETURN 0;
 END IF;

 END !

 DELIMITER ;

