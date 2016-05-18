
    -- ******************************************************************************* --
    -- ************** PROCEDIMIENTOS ALMACENADOS DE bds_allop *************** --
    -- ******************************************************************************* --

    -- # CRUD tbl_buson_mensajes_usuario --
    -- ================== REGISTRAR BUSON_MENSAJES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarBuson_mensajes_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarBuson_mensajes_usuario(IN $Asunto varchar(45), IN $Mensaje TEXT, IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45))
    BEGIN
    INSERT INTO `tbl_buson_mensajes_usuario`(`Asunto`, `Mensaje`, `Fecha_Envio`, `FK_ID_Usuario_Destinatario`, `FK_ID_Usuario_Remitente`) VALUES ($Asunto, $Mensaje, now(), $FK_ID_Usuario_Destinatario, $FK_ID_Usuario_Remitente);
    END !
    DELIMITER ;

    -- ================== MODIFICAR BUSON_MENSAJES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarBuson_mensajes_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarBuson_mensajes_usuario(IN $PK_ID_Buson_Mensajes INT, IN $Asunto varchar(45), IN $Mensaje TEXT, IN $Fecha_Envio date, IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45))
    BEGIN
    UPDATE `tbl_buson_mensajes_usuario` SET `Asunto` = $Asunto, `Mensaje` = $Mensaje, `Fecha_Envio` = $Fecha_Envio, `FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Destinatario, `FK_ID_Usuario_Remitente` = $FK_ID_Usuario_Remitente WHERE `PK_ID_Buson_Mensajes` = $PK_ID_Buson_Mensajes;
    END !
    DELIMITER ;
    -- ==================== LISTAR BUSON_MENSAJES_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarBuson_mensajes_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarBuson_mensajes_usuario( IN $FK_ID_Usuario_Destinatario INT )
    BEGIN
    SELECT Tbl_Mensaje.PK_ID_Buson_Mensajes,Tbl_Mensaje.FK_ID_Usuario_Destinatario,Tbl_Mensaje.FK_ID_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Mensaje.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Mensaje.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Mensaje.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,Tbl_Mensaje.Asunto,Tbl_Mensaje.Mensaje,Tbl_Mensaje.Fecha_Envio  FROM `tbl_buson_mensajes_usuario` AS Tbl_Mensaje INNER JOIN `tbl_cuenta` AS Tbl_Cuenta 
    ON Tbl_Mensaje.FK_ID_Usuario_Destinatario = Tbl_Cuenta.PK_ID_Usuario
    AND Tbl_Mensaje.FK_ID_Usuario_Destinatario = $FK_ID_Usuario_Destinatario  AND Tbl_Mensaje.Estado_Mensaje = 'Registrado'
    ORDER BY Tbl_Mensaje.Fecha_Envio DESC;
    END !
    DELIMITER ;


    -- =================== ELIMINAR BUSON_MENSAJES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarBuson_mensajes_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarBuson_mensajes_usuario(IN $PK_ID_Buson_Mensajes INT)
    BEGIN
    DELETE FROM `tbl_buson_mensajes_usuario` WHERE `PK_ID_Buson_Mensajes` = $PK_ID_Buson_Mensajes AND `Estado_Mensaje` = 'Eliminado' ;
    END !
    DELIMITER ;

    -- =================== RESTAURAR MENSAJE BUSON_MENSAJES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRestaurar_Mensaje;
    DELIMITER !
    CREATE PROCEDURE spRestaurar_Mensaje(IN $PK_ID_Buson_Mensajes INT)
    BEGIN
    UPDATE `tbl_buson_mensajes_usuario` SET `Estado_Mensaje` = 'Registrado' WHERE `PK_ID_Buson_Mensajes` = $PK_ID_Buson_Mensajes AND `Estado_Mensaje` = 'Eliminado' ;
    END !
    DELIMITER ;

    -- =================== MODIFICAR ESTADO DE UN MENSAJE A ELIMINADO BUSON_MENSAJES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificar_EstadoBuson_mensajes_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificar_EstadoBuson_mensajes_usuario(IN $PK_ID_Buson_Mensajes INT)
    BEGIN
    UPDATE `tbl_buson_mensajes_usuario` SET `Estado_Mensaje` = 'Eliminado'  WHERE `PK_ID_Buson_Mensajes` = $PK_ID_Buson_Mensajes  ;
    END !
    DELIMITER ;

    -- =================== CONSULTAR BUSON_MENSAJES_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarBuson_mensajes_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarBuson_mensajes_usuario(IN $PK_ID_Buson_Mensajes INT)
    BEGIN
    SELECT Tbl_Bmu.PK_ID_Buson_Mensajes,Tbl_Bmu.Asunto,Tbl_Bmu.Mensaje,Tbl_Bmu.Fecha_Envio,Tbl_Bmu.FK_ID_Usuario_Destinatario,Tbl_Bmu.FK_ID_Usuario_Remitente,Tbl_Bmu.Estado_Mensaje,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Imagen_Usuario_Destinatario,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Nombre_Usuario_Destinatario,(SELECT `Correo_Electronico` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Correo_Electronico_Destinatario FROM `tbl_buson_mensajes_usuario` AS Tbl_Bmu WHERE Tbl_Bmu.`PK_ID_Buson_Mensajes` = $PK_ID_Buson_Mensajes;
    END !
    DELIMITER ;

    -- ==================== LISTAR BUSON_MENSAJES_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarBuson_mensajes_usuario_Propios;
    DELIMITER !
    CREATE PROCEDURE spListarBuson_mensajes_usuario_Propios( IN $PK_ID_Usuario INT)
    BEGIN
    SELECT Tbl_Bmu.PK_ID_Buson_Mensajes,Tbl_Bmu.Asunto,Tbl_Bmu.Mensaje,Tbl_Bmu.Fecha_Envio,Tbl_Bmu.FK_ID_Usuario_Destinatario,Tbl_Bmu.FK_ID_Usuario_Remitente,Tbl_Bmu.Estado_Mensaje,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Imagen_Usuario_Destinatario,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Nombre_Usuario_Destinatario,(SELECT `Correo_Electronico` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Correo_Electronico_Destinatario FROM `tbl_buson_mensajes_usuario` AS Tbl_Bmu WHERE `FK_ID_Usuario_Remitente` = $PK_ID_Usuario AND `Estado_Mensaje` = 'Registrado'
    ORDER BY `Fecha_Envio` DESC;
    END !
    DELIMITER ;
    -- ==================== LISTAR BUSON_MENSAJES_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarBuson_mensajes_Buson_Entrada;
    DELIMITER !
    CREATE PROCEDURE spListarBuson_mensajes_Buson_Entrada( IN $PK_ID_Usuario INT )
    BEGIN
    SELECT Tbl_Bmu.PK_ID_Buson_Mensajes,Tbl_Bmu.Asunto,Tbl_Bmu.Mensaje,Tbl_Bmu.Fecha_Envio,Tbl_Bmu.FK_ID_Usuario_Destinatario,Tbl_Bmu.FK_ID_Usuario_Remitente,Tbl_Bmu.Estado_Mensaje,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Imagen_Usuario_Destinatario,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Nombre_Usuario_Destinatario,(SELECT `Correo_Electronico` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Correo_Electronico_Destinatario FROM `tbl_buson_mensajes_usuario` AS Tbl_Bmu WHERE Tbl_Bmu.`FK_ID_Usuario_Destinatario` =$PK_ID_Usuario AND Tbl_Bmu.`Estado_Mensaje` = 'Registrado'
    ORDER BY `Fecha_Envio` DESC;
    END !
    DELIMITER ;



    -- ==================== LISTAR MENSAJES ELIMINADOS BUSON_MENSAJES_USUARIO ================== --
    DROP PROCEDURE IF EXISTS spListarBuson_mensajes_usuario_Eliminados;
    DELIMITER !
    CREATE PROCEDURE spListarBuson_mensajes_usuario_Eliminados( IN $PK_ID_Usuario INT )
    BEGIN
    SELECT Tbl_Bmu.PK_ID_Buson_Mensajes,Tbl_Bmu.Asunto,Tbl_Bmu.Mensaje,Tbl_Bmu.Fecha_Envio,Tbl_Bmu.FK_ID_Usuario_Destinatario,Tbl_Bmu.FK_ID_Usuario_Remitente,Tbl_Bmu.Estado_Mensaje,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Imagen_Usuario_Destinatario,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Nombre_Usuario_Destinatario,(SELECT `Correo_Electronico` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Bmu.FK_ID_Usuario_Destinatario ) AS Correo_Electronico_Destinatario FROM `tbl_buson_mensajes_usuario` AS Tbl_Bmu WHERE (Tbl_Bmu.`FK_ID_Usuario_Remitente` = $PK_ID_Usuario OR Tbl_Bmu.`FK_ID_Usuario_Destinatario` = $PK_ID_Usuario) AND Tbl_Bmu.`Estado_Mensaje` = 'Eliminado'
    ORDER BY `Fecha_Envio` DESC;
    END !
    DELIMITER ;



    -- # CRUD tbl_buson_notificacion_usuario --
    -- ================== REGISTRAR BUSON_NOTIFICACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarBuson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarBuson_notificacion_usuario( IN $FK_ID_Pedido int(45), IN $Estado_Pedido varchar(50), IN $Fecha_Envio Date)
    BEGIN
    INSERT INTO `tbl_buson_notificacion_usuario`( `FK_ID_Pedido`, `Estado_Pedido`, `Fecha_Envio`) VALUES ( $FK_ID_Pedido, $Estado_Pedido, $Fecha_Envio);
    END !
    DELIMITER ;


    -- ================== MODIFICAR BUSON_NOTIFICACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarBuson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarBuson_notificacion_usuario(IN $FK_ID_Usuario INT, IN $FK_ID_Pedido int(45), IN $Estado_Pedido varchar(50))
    BEGIN
    UPDATE `tbl_buson_notificacion_usuario` AS tblNotifi INNER JOIN
    `tbl_dll_buson_notificacion_usuario` AS tblDll
    ON tblNotifi.PK_ID_Buson_Notificacion = tblDll.FK_ID_Buson_Notificacion
    SET  tblNotifi.`Estado_Pedido` = $Estado_Pedido
    WHERE tblDll.FK_ID_Usuario = $FK_ID_Usuario AND tblNotifi.FK_ID_Pedido = $FK_ID_Pedido;
    END !
    DELIMITER ;

    -- =================== ELIMINAR BUSON_NOTIFICACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarBuson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarBuson_notificacion_usuario(IN $PK_ID_Buson_Notificacion INT)
    BEGIN
    DELETE FROM `tbl_buson_notificacion_usuario` WHERE `PK_ID_Buson_Notificacion` = $PK_ID_Buson_Notificacion;
    END !
    DELIMITER ;

    -- =================== CONSULTAR BUSON_NOTIFICACION_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarBuson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarBuson_notificacion_usuario(IN $PK_ID_Buson_Notificacion INT)
    BEGIN
    SELECT * FROM `tbl_buson_notificacion_usuario` WHERE `PK_ID_Buson_Notificacion` = $PK_ID_Buson_Notificacion;
    END !
    DELIMITER ;

    -- ==================== LISTAR BUSON_NOTIFICACION_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarBuson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarBuson_notificacion_usuario()
    BEGIN
    SELECT * FROM `tbl_buson_notificacion_usuario`;
    END !
    DELIMITER ;

    -- # CRUD tbl_categoria_producto --
    -- ================== REGISTRAR CATEGORIA_PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarCategoria_producto;
    DELIMITER !
    CREATE PROCEDURE spRegistrarCategoria_producto(IN $Nombre_Categoria varchar(45), IN $Descripcion varchar(200))
    BEGIN
    INSERT INTO `tbl_categoria_producto`(`Nombre_Categoria`, `Descripcion`) VALUES ($Nombre_Categoria, $Descripcion);
    END !
    DELIMITER ;

    -- ================== MODIFICAR CATEGORIA_PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spModificarCategoria_producto;
    DELIMITER !
    CREATE PROCEDURE spModificarCategoria_producto(IN $PK_ID_Categoria INT, IN $Nombre_Categoria varchar(45), IN $Descripcion varchar(200))
    BEGIN
    UPDATE `tbl_categoria_producto` SET `Nombre_Categoria` = $Nombre_Categoria, `Descripcion` = $Descripcion WHERE `PK_ID_Categoria` = $PK_ID_Categoria;
    END !
    DELIMITER ;

    -- =================== ELIMINAR CATEGORIA_PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spEliminarCategoria_producto;
    DELIMITER !
    CREATE PROCEDURE spEliminarCategoria_producto(IN $PK_ID_Categoria INT)
    BEGIN
    DELETE FROM `tbl_categoria_producto` WHERE `PK_ID_Categoria` = $PK_ID_Categoria;
    END !
    DELIMITER ;

    -- =================== CONSULTAR CATEGORIA_PRODUCTO ================ --

    DROP PROCEDURE IF EXISTS spConsultarCategoria_producto;
    DELIMITER !
    CREATE PROCEDURE spConsultarCategoria_producto(IN $PK_ID_Categoria INT)
    BEGIN
    SELECT * FROM `tbl_categoria_producto` WHERE `PK_ID_Categoria` = $PK_ID_Categoria;
    END !
    DELIMITER ;

    -- ==================== LISTAR CATEGORIA_PRODUCTO ================== --

    DROP PROCEDURE IF EXISTS spListarCategoria_producto;
    DELIMITER !
    CREATE PROCEDURE spListarCategoria_producto()
    BEGIN
    SELECT * FROM `tbl_categoria_producto`;
    END !
    DELIMITER ;

   -- # CRUD tbl_chat --
    -- ================== REGISTRAR CHAT ================= --

    DROP PROCEDURE IF EXISTS spRegistrarChat;
    DELIMITER !
    CREATE PROCEDURE spRegistrarChat(IN $FK_ID_Dll_Chat INT(45),IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45), IN $Mensaje text)
    BEGIN
    INSERT INTO `tbl_chat`(`FK_ID_Dll_Chat`,`FK_ID_Usuario_Destinatario`, `FK_ID_Usuario_Remitente`, `Mensaje`, `Fecha_Envio`) VALUES ($FK_ID_Dll_Chat,$FK_ID_Usuario_Destinatario, $FK_ID_Usuario_Remitente, $Mensaje, now());
    END !
    DELIMITER ;

    -- ================== MODIFICAR CHAT ================= --

    DROP PROCEDURE IF EXISTS spModificarChat;
    DELIMITER !
    CREATE PROCEDURE spModificarChat(IN $PK_ID_Chat INT, IN $FK_ID_Dll_Chat INT(45), IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45), IN $Mensaje text, IN $Fecha_Envio datetime, IN $Estado_Mensaje varchar(45))
    BEGIN
    UPDATE `tbl_chat` SET `FK_ID_Dll_Chat` = $FK_ID_Dll_Chat ,`FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Destinatario, `FK_ID_Usuario_Remitente` = $FK_ID_Usuario_Remitente, `Mensaje` = $Mensaje, `Fecha_Envio` = $Fecha_Envio, `Estado_Mensaje` = $Estado_Mensaje WHERE `PK_ID_Chat` = $PK_ID_Chat;
    END !
    DELIMITER ;
  -- ================== MODIFICAR DLL_CHAT PROCEDIMIENTO PARA ACTUALIZAR EL ESTADO DE UN COMENTARIO DEL USUARIO REMITENTE, ESTE ESTADO SE ACTUALIZA AL USUARIO CON EL ID DESTINATARIO CLICKEE EL CONTENEDOR DONDE SE LISTAN LOS COMENTARIOS, CON ESTO SE ENTIENDE QUE EL USUARIO A VISTO EL MENSAJE ENVIADO ================= --

  DROP PROCEDURE IF EXISTS spModificarDll_chat_Actualizar_Estado_Comentario;
  DELIMITER !
  CREATE PROCEDURE spModificarDll_chat_Actualizar_Estado_Comentario(IN $FK_ID_Dll_Chat INT, IN $FK_ID_Usuario_Remitente int(45))
  BEGIN
  UPDATE `tbl_chat` SET  `Estado_Mensaje` = 'Visto' WHERE `FK_ID_Dll_Chat` = $FK_ID_Dll_Chat AND `FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Remitente  ;
  END !
  DELIMITER ;
       -- ==================== LISTAR Conversacion entre dos usuarios ================== --

       DROP PROCEDURE IF EXISTS spListarConversacion;
       DELIMITER !
       CREATE PROCEDURE spListarConversacion(  IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45) )
       BEGIN
       SELECT (SELECT `Fecha_Inicio_Conversacion` FROM `tbl_dll_chat` WHERE `PK_ID_Dll_Chat` = Tbl_Chat.FK_ID_Dll_Chat) AS Fecha_Inicio_Conversacion,Tbl_Chat.PK_ID_Chat , Tbl_Chat.FK_ID_Dll_Chat , Tbl_Chat.FK_ID_Usuario_Destinatario , Tbl_Chat.FK_ID_Usuario_Remitente , Tbl_Chat.Mensaje , Tbl_Chat.Fecha_Envio , Tbl_Chat.Estado_Mensaje,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Chat.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Chat.FK_ID_Usuario_Destinatario ) AS Imagen_Usuario_Destinatario,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Chat.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = Tbl_Chat.FK_ID_Usuario_Destinatario ) AS Nombre_Usuario_Destinatario  FROM `tbl_chat` AS Tbl_Chat WHERE  (Tbl_Chat.FK_ID_Usuario_Destinatario =  $FK_ID_Usuario_Destinatario AND  Tbl_Chat.FK_ID_Usuario_Remitente =  $FK_ID_Usuario_Remitente) OR (Tbl_Chat.FK_ID_Usuario_Destinatario =  $FK_ID_Usuario_Remitente AND  Tbl_Chat.FK_ID_Usuario_Remitente =  $FK_ID_Usuario_Destinatario)
       ORDER BY Tbl_Chat.Fecha_Envio ASC;
       END !
       DELIMITER ;

         DROP PROCEDURE IF EXISTS spListar_Mensajes_Sin_Ver;
       DELIMITER !
       CREATE PROCEDURE spListar_Mensajes_Sin_Ver(  IN $FK_ID_Usuario_Destinatario int(45) )
       BEGIN
       SELECT  Tbl_Chat.Estado_Mensaje  FROM `tbl_chat` AS Tbl_Chat WHERE  Tbl_Chat.FK_ID_Usuario_Remitente = (SELECT `FK_ID_Usuario_Remitente` FROM  `tbl_chat` WHERE  `FK_ID_Usuario_Destinatario` =  $FK_ID_Usuario_Destinatario limit 1);
       END !
       DELIMITER ;




    -- =================== ELIMINAR CHAT ================= --

    DROP PROCEDURE IF EXISTS spEliminarChat;
    DELIMITER !
    CREATE PROCEDURE spEliminarChat(IN $PK_ID_Chat INT)
    BEGIN
    DELETE FROM `tbl_chat` WHERE `PK_ID_Chat` = $PK_ID_Chat;
    END !
    DELIMITER ;

    -- =================== CONSULTAR CHAT ================ --

    DROP PROCEDURE IF EXISTS spConsultarChat;
    DELIMITER !
    CREATE PROCEDURE spConsultarChat(IN $PK_ID_Chat INT)
    BEGIN
    SELECT * FROM `tbl_chat` WHERE `PK_ID_Chat` = $PK_ID_Chat;
    END !
    DELIMITER ;

    -- ==================== LISTAR CHAT ================== --

    DROP PROCEDURE IF EXISTS spListarChat;
    DELIMITER !
    CREATE PROCEDURE spListarChat()
    BEGIN
    SELECT * FROM `tbl_chat`;
    END !
    DELIMITER ;




    -- # CRUD tbl_dll_chat --
    -- ================== REGISTRAR DLL_CHAT ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_chat;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_chat(IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45))
    BEGIN
    INSERT INTO `tbl_dll_chat`(`FK_ID_Usuario_Destinatario`, `FK_ID_Usuario_Remitente`,`Fecha_Inicio_Conversacion`) VALUES ($FK_ID_Usuario_Destinatario, $FK_ID_Usuario_Remitente,now());
    END !
    DELIMITER ;

    -- ================== MODIFICAR DLL_CHAT ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_chat;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_chat(IN $PK_ID_Dll_Chat INT, IN $FK_ID_Usuario_Destinatario int(45), IN $FK_ID_Usuario_Remitente int(45), IN $Fecha_Inicio_Conversacion datetime)
    BEGIN
    UPDATE `tbl_dll_chat` SET  `FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Destinatario, `FK_ID_Usuario_Remitente` = $FK_ID_Usuario_Remitente, `Fecha_Inicio_Conversacion` = $Fecha_Inicio_Conversacion WHERE `PK_ID_Dll_Chat` = $PK_ID_Dll_Chat;
    END !
    DELIMITER ;




    -- =================== ELIMINAR DLL_CHAT ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_chat;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_chat(IN $PK_ID_Dll_Chat INT)
    BEGIN
    DELETE FROM `tbl_dll_chat` WHERE `PK_ID_Dll_Chat` = $PK_ID_Dll_Chat;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DLL_CHAT ================ --

    DROP PROCEDURE IF EXISTS spConsultarDll_chat;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_chat(IN $PK_ID_Dll_Chat INT)
    BEGIN
    SELECT * FROM `tbl_dll_chat` WHERE `PK_ID_Dll_Chat` = $PK_ID_Dll_Chat;
    END !
    DELIMITER ;

      -- =================== VERIFICAR SI UNA SESION DE CHAT YA FUE CREADA DLL_CHAT ================ --

      DROP PROCEDURE IF EXISTS spConsultar_Existencia_Dll_chat;
      DELIMITER !
      CREATE PROCEDURE spConsultar_Existencia_Dll_chat(IN $FK_ID_Usuario_Destinatario INT,IN $FK_ID_Usuario_Remitente INT)
      BEGIN
      SELECT * FROM `tbl_dll_chat` WHERE (`FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Destinatario AND `FK_ID_Usuario_Remitente` = $FK_ID_Usuario_Remitente) OR (`FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Remitente AND `FK_ID_Usuario_Remitente` = $FK_ID_Usuario_Destinatario);
      END !
      DELIMITER ;

      DROP PROCEDURE IF EXISTS spConsultar_Existencia_Dll_chat;
      DELIMITER !
      CREATE PROCEDURE spConsultar_Existencia_Dll_chat(IN $FK_ID_Usuario_Destinatario INT,IN $FK_ID_Usuario_Remitente INT)
      BEGIN
      SELECT * FROM `tbl_dll_chat` WHERE `FK_ID_Usuario_Destinatario` = $FK_ID_Usuario_Destinatario AND `FK_ID_Usuario_Remitente` = $FK_ID_Usuario_Remitente ;
      END !
      DELIMITER ;
      -- ==================== LISTAR DLL_CHAT ESTE PROCEDIMIENTO SIRVE PARA CONSULTAR LOS USUARIOS QUE HAN REALIZADO UNA SESION DE CHAT CON EL USUARIO SOLICITANTE================== --


      DROP PROCEDURE IF EXISTS spListarDll_chat_Buson_Chats_Usuario;
      DELIMITER !
      CREATE PROCEDURE spListarDll_chat_Buson_Chats_Usuario( IN $PK_ID_Usuario INT)
      BEGIN
      SELECT dtll_Chat.FK_ID_Usuario_Remitente,(SELECT `Imagen_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = dtll_Chat.FK_ID_Usuario_Remitente ) AS Imagen_Usuario_Remitente,(SELECT `Nombre_Usuario` FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = dtll_Chat.FK_ID_Usuario_Remitente ) AS Nombre_Usuario_Remitente,(SELECT `Mensaje` FROM `tbl_chat` WHERE `FK_ID_Usuario_Remitente` = dtll_Chat.FK_ID_Usuario_Remitente AND `FK_ID_Usuario_Destinatario` = $PK_ID_Usuario ORDER BY `Fecha_Envio` DESC limit 1   ) AS Ultimo_Mensaje,(SELECT MAX(`Fecha_Envio`) FROM `tbl_chat` WHERE `FK_ID_Usuario_Remitente` = dtll_Chat.FK_ID_Usuario_Remitente  GROUP BY `PK_ID_Chat`  ORDER BY `Fecha_Envio` DESC limit 1 ) AS Fecha_Envio FROM `tbl_dll_chat` AS dtll_Chat WHERE dtll_Chat.FK_ID_Usuario_Destinatario = $PK_ID_Usuario;
      END !
      DELIMITER ;
    -- ==================== LISTAR DLL_CHAT ================== --

    DROP PROCEDURE IF EXISTS spListarDll_chat;
    DELIMITER !
    CREATE PROCEDURE spListarDll_chat()
    BEGIN
    SELECT * FROM `tbl_dll_chat`;
    END !
    DELIMITER ;
    -- # CRUD tbl_cliente --
    -- ================== REGISTRAR CLIENTE ================= --

    DROP PROCEDURE IF EXISTS spRegistrarCliente;
    DELIMITER !
    CREATE PROCEDURE spRegistrarCliente(IN $FK_ID_Cuenta int(45),IN $Nombre varchar(45),IN $Segundo_Nombre varchar(45), IN $Apellido varchar(45),IN $Segundo_Apellido varchar(45),IN $Departamento varchar(45), IN $Municipio varchar(45), IN $Telefono_Celular int(30),IN $Sexo varchar(45), IN $Tipo_Cliente varchar(20), IN $Posee_Empresa varchar(10))
    BEGIN
    INSERT INTO `tbl_cliente`(`FK_ID_Cuenta`, `Nombre`,`Segundo_Nombre`, `Apellido`,`Segundo_Apellido`,`Departamento` ,`Municipio`,  `Telefono_Celular`,`Sexo`, `Tipo_Cliente`,`Posee_Empresa`) VALUES ($FK_ID_Cuenta,$Nombre,$Segundo_Nombre,$Apellido,$Segundo_Apellido, $Departamento ,$Municipio,  $Telefono_Celular,$Sexo ,$Tipo_Cliente, $Posee_Empresa);
    END !
    DELIMITER ;

    -- ================== MODIFICAR CLIENTE ================= --

    DROP PROCEDURE IF EXISTS spModificarCliente;
    DELIMITER !
    CREATE PROCEDURE spModificarCliente(IN $PK_ID_Usuario_Persona INT, IN $FK_ID_Cuenta int(45), IN $Nombre varchar(45), IN $Segundo_Nombre varchar(45), IN $Apellido varchar(45), IN $Segundo_Apellido varchar(45),IN $Departamento varchar(45), IN $Municipio varchar(45), IN $Telefono_Celular int(30), IN $Sexo varchar(10), IN $Tipo_Cliente varchar(20), IN $Posee_Empresa varchar(10))
    BEGIN
    UPDATE `tbl_cliente` SET  `Nombre` = $Nombre, `Segundo_Nombre` = $Segundo_Nombre, `Apellido` = $Apellido, `Segundo_Apellido` = $Segundo_Apellido, `Departamento` = $Departamento,`Municipio` = $Municipio, `Telefono_Celular` = $Telefono_Celular,   `Sexo` = $Sexo, `Tipo_Cliente` = $Tipo_Cliente, `Posee_Empresa` = $Posee_Empresa WHERE `PK_ID_Usuario_Persona` = $PK_ID_Usuario_Persona AND `FK_ID_Cuenta` = $FK_ID_Cuenta ;
    END !
    DELIMITER ;
    -- =================== ELIMINAR CLIENTE ================= --

    DROP PROCEDURE IF EXISTS spEliminarCliente;
    DELIMITER !
    CREATE PROCEDURE spEliminarCliente(IN $PK_ID_Usuario_Persona INT)
    BEGIN
    DELETE FROM `tbl_cliente` WHERE `PK_ID_Usuario_Persona` = $PK_ID_Usuario_Persona;
    END !
    DELIMITER ;

    -- =================== CONSULTAR CLIENTE ================ --

    DROP PROCEDURE IF EXISTS spConsultarCliente;
    DELIMITER !
    CREATE PROCEDURE spConsultarCliente(IN $PK_ID_Usuario_Persona INT)
    BEGIN
    SELECT * FROM `tbl_cliente` WHERE `PK_ID_Usuario_Persona` = $PK_ID_Usuario_Persona;
    END !
    DELIMITER ;

    -- ==================== LISTAR CLIENTE ================== --


    DROP PROCEDURE IF EXISTS spListarCliente;
    DELIMITER !
    CREATE PROCEDURE spListarCliente()
    BEGIN
    SELECT * FROM `tbl_cliente`;
    END !
    DELIMITER ;

    -- # CRUD tbl_comentario --
    -- ================== REGISTRAR COMENTARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarComentario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarComentario(IN $FK_ID_Usuario int(40),  IN $Descripcion varchar(600), IN $FK_ID_Producto int(45), IN $Valoracion_Comentario int(45))
    BEGIN
    INSERT INTO `tbl_comentario`(`FK_ID_Usuario`, `Fecha_Comentario`,`Descripcion`, `FK_ID_Producto`, `Valoracion_Comentario`) VALUES ($FK_ID_Usuario, now(), $Descripcion, $FK_ID_Producto,$Valoracion_Comentario);
    END !
    DELIMITER ;

    -- ================== MODIFICAR COMENTARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarComentario;
    DELIMITER !
    CREATE PROCEDURE spModificarComentario(IN $PK_ID_Comentario INT,  IN $Descripcion varchar(600))
    BEGIN
    UPDATE `tbl_comentario` SET   `Fecha_Comentario` = now(), `Descripcion` = $Descripcion WHERE `PK_ID_Comentario` = $PK_ID_Comentario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR COMENTARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarComentario;
    DELIMITER !
    CREATE PROCEDURE spEliminarComentario(IN $PK_ID_Comentario INT)
    BEGIN
    DELETE FROM `tbl_comentario` WHERE `PK_ID_Comentario` = $PK_ID_Comentario;
    END !
    DELIMITER ;

    -- =================== CONSULTAR COMENTARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarComentario;
    DELIMITER !
    CREATE PROCEDURE spConsultarComentario(IN $PK_ID_Comentario INT)
    BEGIN
    SELECT * FROM `tbl_comentario` WHERE `PK_ID_Comentario` = $PK_ID_Comentario;
    END !
    DELIMITER ;

    -- ==================== LISTAR COMENTARIO ================== --

    DROP PROCEDURE IF EXISTS spListarComentario;
    DELIMITER !
    CREATE PROCEDURE spListarComentario()
    BEGIN
    SELECT * FROM `tbl_comentario`;
    END !
    DELIMITER ;

    -- # CRUD tbl_cotizacion_usuario --
    -- ================== REGISTRAR COTIZACION_USUARIO ================= --
    DROP PROCEDURE IF EXISTS spRegistrarCotizacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarCotizacion_usuario(IN $FK_ID_Usuario int(45),   IN $Direccion_entrega varchar(45), IN $Telefono_Entrega varchar(45))
    BEGIN
    INSERT INTO `tbl_cotizacion_usuario`(`FK_ID_Usuario`, `Fecha_Cotizacion`, `Direccion_entrega`,`Telefono_Entrega`) VALUES ($FK_ID_Usuario,now(), $Direccion_entrega,$Telefono_Entrega);
    END !
    DELIMITER ;

    -- ================== MODIFICAR COTIZACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarCotizacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarCotizacion_usuario(IN $PK_ID_Cotizacion_Usuario INT, IN $FK_ID_Usuario int(45), IN $Fecha_Cotizacion Date, IN $Estado_Cotizacion varchar(40), IN $Direccion_entrega varchar(45))
    BEGIN
    UPDATE `tbl_cotizacion_usuario` SET `FK_ID_Usuario` = $FK_ID_Usuario, `Fecha_Cotizacion` = $Fecha_Cotizacion, `Estado_Cotizacion` = $Estado_Cotizacion, `Direccion_entrega` = $Direccion_entrega WHERE `PK_ID_Cotizacion_Usuario` = $PK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;
    -- ================== MODIFICAR COTIZACION_USUARIO ESTADO ================= --

    DROP PROCEDURE IF EXISTS spModificarCotizacion_usuario_Estado;
    DELIMITER !
    CREATE PROCEDURE spModificarCotizacion_usuario_Estado(IN $PK_ID_Cotizacion_Usuario INT,IN $Estado_Cotizacion varchar(40))
    BEGIN
    UPDATE `tbl_cotizacion_usuario` SET `Estado_Cotizacion` = $Estado_Cotizacion WHERE `PK_ID_Cotizacion_Usuario` = $PK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR COTIZACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarCotizacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarCotizacion_usuario(IN $PK_ID_Cotizacion_Usuario INT)
    BEGIN
    DELETE FROM `tbl_cotizacion_usuario` WHERE `PK_ID_Cotizacion_Usuario` = $PK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;

    -- =================== CONSULTAR COTIZACION_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarCotizacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarCotizacion_usuario(IN $FK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_cotizacion_usuario` WHERE `FK_ID_Usuario` = $FK_ID_Usuario
    ORDER BY `Fecha_Cotizacion` DESC;
    END !
    DELIMITER ;

    -- ==================== LISTAR COTIZACION_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarCotizacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarCotizacion_usuario()
    BEGIN
    SELECT * FROM `tbl_cotizacion_usuario`;
    END !
    DELIMITER ;


    -- # CRUD tbl_cuenta --
    -- ================== REGISTRAR CUENTA ================= --

    DROP PROCEDURE IF EXISTS spRegistrarCuenta;
    DELIMITER !
    CREATE PROCEDURE spRegistrarCuenta(IN $Nombre_Usuario varchar(45), IN $Correo_Electronico varchar(45),IN Contrasenia varchar(45), IN $Contrasenia_Encriptada varchar(45), IN $Imagen_Usuario varchar(250), IN $Fondo_Perfil_Usuario varchar(250),IN $Disponibilidad varchar(45), IN $Estado_Cuenta varchar(45))
    BEGIN
    INSERT INTO `tbl_cuenta`(`Nombre_Usuario`, `Correo_Electronico`,`Contrasenia`,`Contrasenia_Encriptada`, `Imagen_Usuario`, `Fondo_Perfil_Usuario`, `Disponibilidad`,`Estado_Cuenta`, `FK_ID_Rol` ) VALUES ($Nombre_Usuario, $Correo_Electronico, $Contrasenia,$Contrasenia_Encriptada, $Imagen_Usuario, $Fondo_Perfil_Usuario, $Disponibilidad, $Estado_Cuenta, $FK_ID_Rol);
    END !
    DELIMITER ;

    -- ================== MODIFICAR CUENTA ================= --

    DROP PROCEDURE IF EXISTS spModificarCuenta;
    DELIMITER !
    CREATE PROCEDURE spModificarCuenta(IN $PK_ID_Usuario INT, IN $Nombre_Usuario varchar(45), IN $Imagen_Usuario varchar(250), IN $Fondo_Perfil_Usuario varchar(250), IN $Disponibilidad varchar(45), IN $FK_ID_Rol int(45), IN $Correo_Electronico varchar(45))
    BEGIN
    UPDATE `tbl_cuenta` SET `Nombre_Usuario` = $Nombre_Usuario, `Imagen_Usuario` = $Imagen_Usuario, `Fondo_Perfil_Usuario` = $Fondo_Perfil_Usuario, `Disponibilidad` = $Disponibilidad, `FK_ID_Rol` = $FK_ID_Rol, `Correo_Electronico` = $Correo_Electronico WHERE `PK_ID_Usuario` = $PK_ID_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR CUENTA ================= --

    DROP PROCEDURE IF EXISTS spEliminarCuenta;
    DELIMITER !
    CREATE PROCEDURE spEliminarCuenta(IN $PK_ID_Usuario INT)
    BEGIN
    DELETE FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = $PK_ID_Usuario;
    END !
    DELIMITER ;

    -- =================== CONSULTAR CUENTA ================ --

    DROP PROCEDURE IF EXISTS spConsultarCuenta;
    DELIMITER !
    CREATE PROCEDURE spConsultarCuenta(IN $PK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = $PK_ID_Usuario;
    END !
    DELIMITER ;

    -- ==================== LISTAR CUENTA ================== --

    DROP PROCEDURE IF EXISTS spListarCuenta;
    DELIMITER !
    CREATE PROCEDURE spListarCuenta(IN $PK_ID_Rol INT)
    BEGIN
    SELECT Tbl_Cuenta.PK_ID_Usuario, Tbl_Cuenta.Nombre_Usuario, Tbl_Cuenta.Correo_Electronico, Tbl_Cuenta.Imagen_Usuario, Tbl_Cuenta.Disponibilidad, Tbl_Cuenta.Estado_Cuenta,Tbl_Cuenta.Fecha_Creacion_Cuenta,Tbl_Cuenta.Tipo_Cliente,Tbl_Cuenta.FK_ID_Rol,Tbl_Cuenta.Verificacion_Cuenta,(SELECT `Telefono_Celular` FROM `tbl_cliente` WHERE `FK_ID_Cuenta` = $PK_ID_Rol ) AS Telefono_Celular FROM `tbl_cuenta` AS Tbl_Cuenta WHERE Tbl_Cuenta.FK_ID_Rol = $PK_ID_Rol;
    END !
    DELIMITER ;

    -- ==================== LISTAR CUENTA ================== --

    DROP PROCEDURE IF EXISTS spListar_Cuentas_Por_Verificar;
    DELIMITER !
    CREATE PROCEDURE spListar_Cuentas_Por_Verificar(IN $Verificacion_Cuenta VARCHAR(45))
    BEGIN
    SELECT Tbl_Cuenta.PK_ID_Usuario, Tbl_Cuenta.Nombre_Usuario, Tbl_Cuenta.Correo_Electronico,Tbl_Cuenta.Imagen_Usuario, Tbl_Cuenta.Disponibilidad, Tbl_Cuenta.Estado_Cuenta,Tbl_Cuenta.Fecha_Creacion_Cuenta,Tbl_Cuenta.Tipo_Cliente,Tbl_Cuenta.FK_ID_Rol,Tbl_Cuenta.Verificacion_Cuenta,(SELECT `Telefono_Celular` FROM `tbl_cliente` WHERE `FK_ID_Cuenta` = Tbl_Cuenta.PK_ID_Usuario ) AS Telefono_Celular FROM `tbl_cuenta` AS Tbl_Cuenta WHERE   Tbl_Cuenta.Verificacion_Cuenta = $Verificacion_Cuenta;
    END !
    DELIMITER ;

     -- ==================== CONSULTAR EL ESTADO DE VERIFICACION DE UNA CUENTA ================== --

     DROP PROCEDURE IF EXISTS spConsultar_Estado_Verificacion_Cuenta;
     DELIMITER !
     CREATE PROCEDURE spConsultar_Estado_Verificacion_Cuenta(IN $PK_ID_Usuario INT)
     BEGIN
     SELECT * FROM `tbl_cuenta` WHERE `PK_ID_Usuario` = $PK_ID_Usuario AND `Verificacion_Cuenta` =  "Por_Verificar";
     END !
     DELIMITER ;
    -- ==================== LISTAR CUENTA CLIENTE================== --

    DROP PROCEDURE IF EXISTS spListarCuentas_Usuario;
    DELIMITER !
    CREATE PROCEDURE spListarCuentas_Usuario()
    BEGIN
    SELECT * FROM `tbl_cuenta` WHERE FK_ID_Rol = 3;
    END !
    DELIMITER ;


    -- ==================== LISTAR CUENTA CLIENTE================== --

    DROP PROCEDURE IF EXISTS spListarCuentas_Usuario_Datos_Cuenta;
    DELIMITER !
    CREATE PROCEDURE spListarCuentas_Usuario_Datos_Cuenta( IN $FK_ID_Rol INT)
    BEGIN
    SELECT (SELECT Rol.Nombre_Rol FROM `tbl_rol_usuario` AS Rol WHERE Rol.PK_ID_Rol = Cuenta.FK_ID_Rol ) AS Nombre_Rol,Cuenta.`PK_ID_Usuario`,Cuenta.Nombre_Usuario,Cuenta.Imagen_Usuario,Cuenta.Correo_Electronico FROM `tbl_cuenta` AS Cuenta WHERE Cuenta.FK_ID_Rol = $FK_ID_Rol;
    END !
    DELIMITER ;

    -- # CRUD tbl_datos_establecimientos --
    -- ================== REGISTRAR DATOS_ESTABLECIMIENTOS ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDatos_establecimientos;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDatos_establecimientos(IN $Nombre_Establecimiento varchar(45), IN $Nombre_Encargado varchar(45), IN $Nit varchar(45), IN $Telefono_Establecimiento varchar(45), IN $Direccion_Establecimiento varchar(45), IN $Municipio_Establecimiento varchar(45), IN $FK_ID_Usuario int(45))
    BEGIN
    INSERT INTO `tbl_datos_establecimientos`(`Nombre_Establecimiento`, `Nombre_Encargado`, `Nit`, `Telefono_Establecimiento`, `Direccion_Establecimiento`, `Municipio_Establecimiento`, `FK_ID_Usuario`) VALUES ($Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento, $Direccion_Establecimiento, $Municipio_Establecimiento, $FK_ID_Usuario);
    END !
    DELIMITER ;

    -- ================== MODIFICAR DATOS_ESTABLECIMIENTOS ================= --

    DROP PROCEDURE IF EXISTS spModificarDatos_establecimientos;
    DELIMITER !
    CREATE PROCEDURE spModificarDatos_establecimientos(IN $PK_ID_Establecimiento INT, IN $Nombre_Establecimiento varchar(45), IN $Nombre_Encargado varchar(45), IN $Nit varchar(45), IN $Telefono_Establecimiento varchar(45), IN $Direccion_Establecimiento varchar(45), IN $Municipio_Establecimiento varchar(45), IN $FK_ID_Usuario int(45))
    BEGIN
    UPDATE `tbl_datos_establecimientos` SET `Nombre_Establecimiento` = $Nombre_Establecimiento, `Nombre_Encargado` = $Nombre_Encargado, `Nit` = $Nit, `Telefono_Establecimiento` = $Telefono_Establecimiento, `Direccion_Establecimiento` = $Direccion_Establecimiento, `Municipio_Establecimiento` = $Municipio_Establecimiento WHERE `PK_ID_Establecimiento` = $PK_ID_Establecimiento AND `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DATOS_ESTABLECIMIENTOS ================= --

    DROP PROCEDURE IF EXISTS spEliminarDatos_establecimientos;
    DELIMITER !
    CREATE PROCEDURE spEliminarDatos_establecimientos(IN $PK_ID_Establecimiento INT)
    BEGIN
    DELETE FROM `tbl_datos_establecimientos` WHERE `PK_ID_Establecimiento` = $PK_ID_Establecimiento;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DATOS_ESTABLECIMIENTOS ================ --

    DROP PROCEDURE IF EXISTS spConsultarDatos_establecimientos;
    DELIMITER !
    CREATE PROCEDURE spConsultarDatos_establecimientos(IN $FK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_datos_establecimientos` WHERE `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- ==================== LISTAR DATOS_ESTABLECIMIENTOS ================== --

    DROP PROCEDURE IF EXISTS spListarDatos_establecimientos;
    DELIMITER !
    CREATE PROCEDURE spListarDatos_establecimientos()
    BEGIN
    SELECT * FROM `tbl_datos_establecimientos`;
    END !
    DELIMITER ;


    -- # CRUD tbl_dll_buson_notificacion_usuario --
    -- ================== REGISTRAR DLL_BUSON_NOTIFICACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_buson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_buson_notificacion_usuario(IN $FK_ID_Buson_Notificacion int(45), IN $FK_ID_Usuario int(45))
    BEGIN
    INSERT INTO `tbl_dll_buson_notificacion_usuario`(`FK_ID_Buson_Notificacion`, `FK_ID_Usuario`) VALUES ($FK_ID_Buson_Notificacion, $FK_ID_Usuario);
    END !
    DELIMITER ;

    -- ================== MODIFICAR DLL_BUSON_NOTIFICACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_buson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_buson_notificacion_usuario(IN $PK_ID_Notificacion_Usuario INT, IN $FK_ID_Buson_Notificacion int(45), IN $FK_ID_Usuario int(45))
    BEGIN
    UPDATE `tbl_dll_buson_notificacion_usuario` SET `FK_ID_Buson_Notificacion` = $FK_ID_Buson_Notificacion, `FK_ID_Usuario` = $FK_ID_Usuario WHERE `PK_ID_Notificacion_Usuario` = $PK_ID_Notificacion_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_BUSON_NOTIFICACION_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_buson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_buson_notificacion_usuario(IN $FK_ID_Buson_Notificacion INT)
    BEGIN
    DELETE FROM `tbl_dll_buson_notificacion_usuario` WHERE `FK_ID_Buson_Notificacion` = $FK_ID_Buson_Notificacion;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DLL_BUSON_NOTIFICACION_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarDll_buson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_buson_notificacion_usuario(IN $FK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_dll_buson_notificacion_usuario`  AS dll
    INNER JOIN `tbl_buson_notificacion_usuario` AS tblNotifi
    ON dll.FK_ID_Buson_Notificacion = tblNotifi.PK_ID_Buson_Notificacion
    WHERE dll.FK_ID_Usuario = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- ==================== LISTAR DLL_BUSON_NOTIFICACION_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarDll_buson_notificacion_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarDll_buson_notificacion_usuario()
    BEGIN
    SELECT * FROM `tbl_dll_buson_notificacion_usuario`;
    END !
    DELIMITER ;

    -- # CRUD tbl_dll_producto_cotizacion --
    -- ================== REGISTRAR DLL_PRODUCTO_COTIZACION ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_producto_cotizacion;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_producto_cotizacion(IN $FK_ID_Producto int(45), IN $FK_ID_Cotizacion_Usuario int(40), IN $Cantidad_Productos int(45), IN $Sub_Total int(100))
    BEGIN
    INSERT INTO `tbl_dll_producto_cotizacion`(`FK_ID_Producto`, `FK_ID_Cotizacion_Usuario`, `Cantidad_Productos`, `Sub_Total`) VALUES ($FK_ID_Producto, $FK_ID_Cotizacion_Usuario, $Cantidad_Productos, $Sub_Total);
    END !
    DELIMITER ;

    -- ================== MODIFICAR DLL_PRODUCTO_COTIZACION ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_producto_cotizacion;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_producto_cotizacion(IN $PK_ID_Producto_Cotizacion INT, IN $FK_ID_Producto int(45), IN $FK_ID_Cotizacion_Usuario int(40), IN $Cantidad_Productos int(45), IN $Sub_Total int(100))
    BEGIN
    UPDATE `tbl_dll_producto_cotizacion` SET `FK_ID_Producto` = $FK_ID_Producto, `FK_ID_Cotizacion_Usuario` = $FK_ID_Cotizacion_Usuario, `Cantidad_Productos` = $Cantidad_Productos, `Sub_Total` = $Sub_Total WHERE `PK_ID_Producto_Cotizacion` = $PK_ID_Producto_Cotizacion;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_PRODUCTO_COTIZACION ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_producto_cotizacion;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_producto_cotizacion(IN $FK_ID_Cotizacion_Usuario INT)
    BEGIN
    DELETE FROM `tbl_dll_producto_cotizacion` WHERE `FK_ID_Cotizacion_Usuario` = $FK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DLL_PRODUCTO_COTIZACION ================ --



    DROP PROCEDURE IF EXISTS spJoin_ConsultarDll_producto_cotizacion;
    DELIMITER !
    CREATE PROCEDURE spJoin_ConsultarDll_producto_cotizacion(IN $FK_ID_Cotizacion_Usuario INT)
    BEGIN
    SELECT tblP.`Nombre_Producto`,tblP.`PK_ID_Producto`,tblP.`Ruta_Imagen_Producto`, tblP.`Valor_Unitario`, Dtll.`Sub_Total`, Dtll.`Cantidad_Productos`
    FROM `tbl_dll_producto_cotizacion` AS Dtll
    INNER JOIN `tbl_producto` AS tblP
    ON Dtll.FK_ID_Producto =  tblP.PK_ID_Producto
    WHERE Dtll.`FK_ID_Cotizacion_Usuario` = $FK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;



    -- =================== CONSULTAR DETALLE DE UN PEDIDO, ESTE DETALLE ES DE LOS PRECIOS FIJOS QUE SE DUPLICARON A LA HORA DE CREAR EL PEDIDO ================ --



    DROP PROCEDURE IF EXISTS spJoin_ConsultarDll_pedido_producto;
    DELIMITER !
    CREATE PROCEDURE spJoin_ConsultarDll_pedido_producto(IN $PK_ID_Pedido INT)
    BEGIN
    SELECT tblP.`Nombre_Producto`,tblP.`PK_ID_Producto_Cotizacion_Fija`,tblP.`Ruta_Imagen_Producto`, tblP.`Valor_Unitario`, tblP.`Sub_Total`, tblP.`Cantidad_Productos`
    FROM `tbl_dll_producto_cotizacion_fija` AS tblP
    WHERE tblP.`FK_ID_Pedido` = $PK_ID_Pedido;
    END !
    DELIMITER ;


    -- =================== CONSULTAR SI EXISTE UN PEDIDO QUE CONTENGA ASOCIADA LA COTIZACION QUE SE SOLICITA ================ --


    DROP PROCEDURE IF EXISTS spConsultarPedido_Cotizacion;
    DELIMITER !
    CREATE PROCEDURE spConsultarPedido_Cotizacion(IN $FK_ID_Cotizacion_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_pedido_usuario` WHERE `FK_ID_Cotizacion_Usuario` = $FK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;


    -- =================== ELIMINAR EL DTLL ENTRE PEDIDO Y PRODUCTO_FIJO ================ --


    DROP PROCEDURE IF EXISTS spEliminarDll_pedido_producto;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_pedido_producto(IN $PK_ID_Pedido INT)
    BEGIN
    DELETE FROM `tbl_dll_producto_cotizacion_fija` WHERE `FK_ID_Pedido` = $PK_ID_Pedido;
    END !
    DELIMITER ;
    -- ==================== LISTAR DLL_PRODUCTO_COTIZACION ================== --

    DROP PROCEDURE IF EXISTS spListarDll_producto_cotizacion;
    DELIMITER !
    CREATE PROCEDURE spListarDll_producto_cotizacion()
    BEGIN
    SELECT * FROM `tbl_dll_producto_cotizacion`;
    END !
    DELIMITER ;

    -- # CRUD tbl_dll_promocion_producto --
    -- ================== REGISTRAR DLL_PROMOCION_PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_promocion_producto;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_promocion_producto(IN $FK_ID_Producto int(45), IN $FK_ID_Promocion int(45))
    BEGIN
    INSERT INTO `tbl_dll_promocion_producto`(`FK_ID_Producto`, `FK_ID_Promocion`) VALUES ($FK_ID_Producto, $FK_ID_Promocion);
    END !
    DELIMITER ;

    -- ================== MODIFICAR DLL_PROMOCION_PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_promocion_producto;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_promocion_producto
    (IN $FK_ID_Promocion_Anterior INT, IN $FK_ID_Producto int(45), IN $FK_ID_Promocion_Nueva int(45))
    BEGIN
    UPDATE `tbl_dll_promocion_producto` SET  `FK_ID_Promocion` = $FK_ID_Promocion_Nueva
    WHERE `FK_ID_Promocion` = $FK_ID_Promocion_Anterior AND `FK_ID_Producto` = $FK_ID_Producto;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_PROMOCION_PRODUCTO DEACUERDO AL FK_ID_Promocion Y  FK_ID_Producto ================= --
    DROP PROCEDURE IF EXISTS spEliminarDll_promocion_producto_Unico;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_promocion_producto_Unico(IN $PK_ID_Promocion INT)
    BEGIN
    DELETE FROM `tbl_dll_promocion_producto` WHERE `FK_ID_Promocion` = $PK_ID_Promocion;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_PROMOCION_PRODUCTO DEACUERDO AL FK_ID_Promocion ================= --
    DROP PROCEDURE IF EXISTS spEliminarDll_promocion_producto_Varios;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_promocion_producto_Varios(IN $FK_ID_Promocion INT)
    BEGIN
    DELETE FROM `tbl_dll_promocion_producto` WHERE `FK_ID_Promocion` = $FK_ID_Promocion;
    END !
    DELIMITER ;
    -- =================== CONSULTAR DLL_PROMOCION_PRODUCTO ================ --

    DROP PROCEDURE IF EXISTS spConsultarDll_promocion_producto;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_promocion_producto(IN $FK_ID_Producto INT,IN $FK_ID_Promocion INT)
    BEGIN
    SELECT * FROM `tbl_dll_promocion_producto` WHERE `FK_ID_Producto` = $FK_ID_Producto AND `FK_ID_Promocion` = $FK_ID_Promocion;
    END !
    DELIMITER ;

    -- ==================== LISTAR DLL_PROMOCION_PRODUCTO ================== --

    DROP PROCEDURE IF EXISTS spListarDll_promocion_producto;
    DELIMITER !
    CREATE PROCEDURE spListarDll_promocion_producto()
    BEGIN
    SELECT * FROM `tbl_dll_promocion_producto`;
    END !
    DELIMITER ;

    -- # CRUD tbl_dll_rol_cuenta --
    -- ================== REGISTRAR DLL_ROL_CUENTA ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_rol_cuenta;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_rol_cuenta(IN $FK_ID_Rol int(45), IN $FK_ID_Usuario int(45))
    BEGIN
    INSERT INTO `tbl_dll_rol_cuenta`(`FK_ID_Rol`, `FK_ID_Usuario`) VALUES ($FK_ID_Rol, $FK_ID_Usuario);
    END !
    DELIMITER ;

    -- ================== MODIFICAR DLL_ROL_CUENTA ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_rol_cuenta;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_rol_cuenta(IN $PK_ID_DLL_Rol_Cuenta INT, IN $FK_ID_Rol int(45), IN $FK_ID_Usuario int(45))
    BEGIN
    UPDATE `tbl_dll_rol_cuenta` SET `FK_ID_Rol` = $FK_ID_Rol, `FK_ID_Usuario` = $FK_ID_Usuario WHERE `PK_ID_DLL_Rol_Cuenta` = $PK_ID_DLL_Rol_Cuenta;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_ROL_CUENTA ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_rol_cuenta;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_rol_cuenta(IN $PK_ID_DLL_Rol_Cuenta INT)
    BEGIN
    DELETE FROM `tbl_dll_rol_cuenta` WHERE `PK_ID_DLL_Rol_Cuenta` = $PK_ID_DLL_Rol_Cuenta;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DLL_ROL_CUENTA ================ --

    DROP PROCEDURE IF EXISTS spConsultarDll_rol_cuenta;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_rol_cuenta(IN $PK_ID_DLL_Rol_Cuenta INT)
    BEGIN
    SELECT * FROM `tbl_dll_rol_cuenta` WHERE `PK_ID_DLL_Rol_Cuenta` = $PK_ID_DLL_Rol_Cuenta;
    END !
    DELIMITER ;

    -- ==================== LISTAR DLL_ROL_CUENTA ================== --

    DROP PROCEDURE IF EXISTS spListarDll_rol_cuenta;
    DELIMITER !
    CREATE PROCEDURE spListarDll_rol_cuenta()
    BEGIN
    SELECT * FROM `tbl_dll_rol_cuenta`;
    END !
    DELIMITER ;

    -- # CRUD tbl_dll_ruta_pedido --
    -- ================== REGISTRAR DLL_RUTA_PEDIDO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_ruta_pedido;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_ruta_pedido(IN $FK_ID_Pedido int(40),IN $FK_ID_Ruta int(40))
    BEGIN
    INSERT INTO `tbl_dll_ruta_pedido`(`FK_ID_Ruta`, `FK_ID_Pedido`) VALUES ($FK_ID_Ruta, $FK_ID_Pedido);
    END !
    DELIMITER ;



    -- ================== MODIFICAR DLL_RUTA_PEDIDO ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_ruta_pedido;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_ruta_pedido(IN $PK_ID_Ruta_Pedido INT, IN $FK_ID_Ruta int(40), IN $FK_ID_Pedido int(40))
    BEGIN
    UPDATE `tbl_dll_ruta_pedido` SET `FK_ID_Ruta` = $FK_ID_Ruta, `FK_ID_Pedido` = $FK_ID_Pedido WHERE `PK_ID_Ruta_Pedido` = $PK_ID_Ruta_Pedido;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_RUTA_PEDIDO ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_ruta_pedido;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_ruta_pedido(IN $PK_ID_Ruta_Pedido INT)
    BEGIN
    DELETE FROM `tbl_dll_ruta_pedido` WHERE `PK_ID_Ruta_Pedido` = $PK_ID_Ruta_Pedido;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DLL_RUTA_PEDIDO ================ --

    DROP PROCEDURE IF EXISTS spConsultarDll_ruta_pedido;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_ruta_pedido(IN $PK_ID_Ruta_Pedido INT)
    BEGIN
    SELECT * FROM `tbl_dll_ruta_pedido` WHERE `PK_ID_Ruta_Pedido` = $PK_ID_Ruta_Pedido;
    END !
    DELIMITER ;

    -- ==================== LISTAR DLL_RUTA_PEDIDO ================== --

    DROP PROCEDURE IF EXISTS spListarDll_ruta_pedido;
    DELIMITER !
    CREATE PROCEDURE spListarDll_ruta_pedido()
    BEGIN
    SELECT * FROM `tbl_dll_ruta_pedido`;
    END !
    DELIMITER ;

    -- # CRUD tbl_empleado --
    -- ================== REGISTRAR EMPLEADO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarEmpleado;
    DELIMITER !
    CREATE PROCEDURE spRegistrarEmpleado(IN $FK_ID_Cuenta int(45), IN $Nombre varchar(45), IN $Segundo_Nombre varchar(45), IN $Apellido varchar(45), IN $Segundo_Apellido varchar(45), IN $Municipio varchar(45), IN $Telefono_Celular int(30), IN $Sexo varchar(10))
    BEGIN
    INSERT INTO `tbl_empleado`(`FK_ID_Cuenta`, `Nombre`, `Segundo_Nombre`, `Apellido`, `Segundo_Apellido`, `Municipio`,  `Telefono_Celular`, `Sexo`) VALUES ($FK_ID_Cuenta, $Nombre, $Segundo_Nombre, $Apellido, $Segundo_Apellido, $Municipio,  $Telefono_Celular,  $Sexo);
    END !
    DELIMITER ;

    -- ================== MODIFICAR EMPLEADO ================= --

    DROP PROCEDURE IF EXISTS spModificarEmpleado;
    DELIMITER !
    CREATE PROCEDURE spModificarEmpleado(IN $PK_ID_Usuario_Persona INT, IN $FK_ID_Cuenta int(45), IN $Nombre varchar(45), IN $Segundo_Nombre varchar(45), IN $Apellido varchar(45), IN $Segundo_Apellido varchar(45), IN $Municipio varchar(45), IN $Telefono_Celular int(30), IN $Sexo varchar(10))
    BEGIN
    UPDATE `tbl_empleado` SET  `Nombre` = $Nombre, `Segundo_Nombre` = $Segundo_Nombre, `Apellido` = $Apellido, `Segundo_Apellido` = $Segundo_Apellido, `Municipio` = $Municipio, `Telefono_Celular` = $Telefono_Celular,   `Sexo` = $Sexo WHERE `PK_ID_Usuario_Persona` = $PK_ID_Usuario_Persona AND `FK_ID_Cuenta` = $FK_ID_Cuenta ;
    END !
    DELIMITER ;

    -- =================== ELIMINAR EMPLEADO ================= --

    DROP PROCEDURE IF EXISTS spEliminarEmpleado;
    DELIMITER !
    CREATE PROCEDURE spEliminarEmpleado(IN $PK_ID_Usuario_Persona INT)
    BEGIN
    DELETE FROM `tbl_empleado` WHERE `PK_ID_Usuario_Persona` = $PK_ID_Usuario_Persona;
    END !
    DELIMITER ;

    -- =================== CONSULTAR EMPLEADO ================ --

    DROP PROCEDURE IF EXISTS spConsultarEmpleado;
    DELIMITER !
    CREATE PROCEDURE spConsultarEmpleado(IN $PK_ID_Usuario_Persona INT)
    BEGIN
    SELECT * FROM `tbl_empleado` WHERE `PK_ID_Usuario_Persona` = $PK_ID_Usuario_Persona;
    END !
    DELIMITER ;

    -- ==================== LISTAR EMPLEADO ================== --

    DROP PROCEDURE IF EXISTS spListarEmpleado;
    DELIMITER !
    CREATE PROCEDURE spListarEmpleado()
    BEGIN
    SELECT * FROM `tbl_empleado`;
    END !
    DELIMITER ;

    -- # CRUD tbl_pedido_usuario --
    -- ================== REGISTRAR PEDIDO_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarPedido_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarPedido_usuario(IN $Fecha_Pedido Date, IN $FK_ID_Cotizacion_Usuario int(45), IN $Direccion_entrega varchar(200), IN $Fecha_Cotizacion Date, IN $Estado_pedido varchar(40))
    BEGIN
    INSERT INTO `tbl_pedido_usuario`(`Fecha_Pedido`, `FK_ID_Cotizacion_Usuario`, `Direccion_entrega`, `Fecha_Cotizacion`, `Estado_pedido`) VALUES ($Fecha_Pedido, $FK_ID_Cotizacion_Usuario, $Direccion_entrega, $Fecha_Cotizacion, $Estado_pedido);
    END !
    DELIMITER ;

    -- ================== MODIFICAR PEDIDO_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarPedido_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarPedido_usuario(IN $PK_ID_Pedido INT, IN $Fecha_Pedido Date, IN $FK_ID_Cotizacion_Usuario int(45), IN $Direccion_entrega varchar(200), IN $Fecha_Cotizacion Date, IN $Estado_pedido varchar(40))
    BEGIN
    UPDATE `tbl_pedido_usuario` SET `Fecha_Pedido` = $Fecha_Pedido, `FK_ID_Cotizacion_Usuario` = $FK_ID_Cotizacion_Usuario, `Direccion_entrega` = $Direccion_entrega, `Fecha_Cotizacion` = $Fecha_Cotizacion, `Estado_pedido` = $Estado_pedido WHERE `PK_ID_Pedido` = $PK_ID_Pedido;
    END !
    DELIMITER ;

    -- =================== ELIMINAR PEDIDO_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarPedido_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarPedido_usuario(IN $PK_ID_Pedido INT)
    BEGIN
    DELETE FROM `tbl_pedido_usuario` WHERE `PK_ID_Pedido` = $PK_ID_Pedido;
    END !
    DELIMITER ;

    -- =================== CONSULTAR PEDIDO_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarPedido_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarPedido_usuario(IN $FK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_pedido_usuario` WHERE `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- ==================== LISTAR PEDIDO_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarPedido_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarPedido_usuario()
    BEGIN
    SELECT * FROM `tbl_pedido_usuario`;
    END !
    DELIMITER ;

    -- ==================== LISTAR PEDIDO_USUARIO EN ESPESIFICO ================== --

    DROP PROCEDURE IF EXISTS spListarPedido_usuario_Espesifico;
    DELIMITER !
    CREATE PROCEDURE spListarPedido_usuario_Espesifico(IN $PK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_pedido_usuario` WHERE FK_ID_Usuario = $PK_ID_Usuario;
    END !
    DELIMITER ;

    -- # CRUD tbl_producto --
    -- ================== REGISTRAR PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarProducto;
    DELIMITER !
    CREATE PROCEDURE spRegistrarProducto(IN $Nombre_Producto varchar(45), IN $Valor_Unitario int(30), IN $Descripcion_Producto TEXT, IN $Cant_Unid_Max int(100), IN $Cant_Unid_Min int(100), IN $FK_ID_Categoria int(40), IN $Ruta_Imagen_Producto varchar(250))
    BEGIN
    INSERT INTO `tbl_producto`(`Nombre_Producto`, `Valor_Unitario`, `Descripcion_Producto`, `Cant_Unid_Max`, `Cant_Unid_Min`, `FK_ID_Categoria`, `Ruta_Imagen_Producto`) VALUES ($Nombre_Producto, $Valor_Unitario, $Descripcion_Producto, $Cant_Unid_Max, $Cant_Unid_Min, $FK_ID_Categoria, $Ruta_Imagen_Producto);
    END !
    DELIMITER ;

    -- =================== ELIMINAR PRODUCTO ================= --

    DROP PROCEDURE IF EXISTS spEliminarProducto;
    DELIMITER !
    CREATE PROCEDURE spEliminarProducto(IN $PK_ID_Producto INT)
    BEGIN
    DELETE FROM `tbl_producto` WHERE `PK_ID_Producto` = $PK_ID_Producto;
    END !
    DELIMITER ;

    -- =================== CONSULTAR PRODUCTO ================ --

    DROP PROCEDURE IF EXISTS spConsultarProducto;
    DELIMITER !
    CREATE PROCEDURE spConsultarProducto(IN $PK_ID_Producto INT)
    BEGIN
    SELECT * FROM `tbl_producto` WHERE `PK_ID_Producto` = $PK_ID_Producto;
    END !
    DELIMITER ;

    -- ==================== LISTAR PRODUCTO ================== --
    DROP PROCEDURE IF EXISTS spListarProducto;
    DELIMITER !
    CREATE PROCEDURE spListarProducto()
    BEGIN
    SELECT tbl_producto.PK_ID_Producto, tbl_producto.Nombre_Producto, tbl_producto.Valor_Unitario,tbl_producto.Descripcion_Producto,tbl_producto.Cant_Unid_Max,tbl_producto.Cant_Unid_Min,tbl_producto.Ruta_Imagen_Producto,tbl_producto.Estado_Producto,tbl_producto.FK_ID_Categoria,tbl_producto.Valoracion_Producto,(SELECT `Nombre_Categoria` FROM `tbl_categoria_producto` where `PK_ID_Categoria` = tbl_producto.FK_ID_Categoria) AS Nombre_Categoria FROM `tbl_producto` AS tbl_producto;
    END !
    DELIMITER ;



    -- ==================== LISTAR PRODUCTO DEACUERDO A SU CATEGORIA ================== --
    DROP PROCEDURE IF EXISTS spListarProducto_Categoria;
    DELIMITER !
    CREATE PROCEDURE spListarProducto_Categoria( IN $Categoria INT)
    BEGIN
    SELECT tbl_producto.PK_ID_Producto, tbl_producto.Nombre_Producto, tbl_producto.Valor_Unitario,tbl_producto.Descripcion_Producto,tbl_producto.Cant_Unid_Max,tbl_producto.Cant_Unid_Min,tbl_producto.Ruta_Imagen_Producto,tbl_producto.Estado_Producto,tbl_producto.FK_ID_Categoria,tbl_producto.Valoracion_Producto,(SELECT `Nombre_Categoria` FROM `tbl_categoria_producto` where `PK_ID_Categoria` = tbl_producto.FK_ID_Categoria) AS Nombre_Categoria FROM `tbl_producto` AS tbl_producto WHERE tbl_producto.FK_ID_Categoria = $Categoria ;
    END !
    DELIMITER ;

    -- # CRUD tbl_promocion --
    -- ================== REGISTRAR PROMOCION ================= --


    DROP PROCEDURE IF EXISTS spRegistrarPromocion;
    DELIMITER !
    CREATE PROCEDURE spRegistrarPromocion(IN $Nombre_Promocion varchar(45),IN $Descripcion varchar(300), IN $Fecha_Inicio Date, IN $Dias_Duracion INT(100), IN $Imagen_Promocion VARCHAR(250))
    BEGIN
    INSERT INTO `tbl_promocion`(`Nombre_Promocion`,`Descripcion`, `Fecha_Inicio`, `Dias_Duracion`,`Imagen_Promocion`) VALUES ($Nombre_Promocion,$Descripcion, $Fecha_Inicio, $Dias_Duracion, $Imagen_Promocion);
    END !
    DELIMITER ;


    -- ================== MODIFICAR PROMOCION ================= --

    DROP PROCEDURE IF EXISTS spModificarPromocion;
    DELIMITER !
    CREATE PROCEDURE spModificarPromocion(IN $PK_ID_Promocion INT, IN $Nombre_Promocion varchar(45),IN $Descripcion varchar(300), IN $Fecha_Inicio Date, IN $Dias_Duracion INT(100), IN $Imagen_Promocion VARCHAR(250))
    BEGIN
    UPDATE `tbl_promocion` SET `Nombre_Promocion` = $Nombre_Promocion, `Descripcion` = $Descripcion, `Fecha_Inicio` = $Fecha_Inicio, `Dias_Duracion` = $Dias_Duracion, `Imagen_Promocion` = $Imagen_Promocion  WHERE `PK_ID_Promocion` = $PK_ID_Promocion;
    END !
    DELIMITER ;



    -- =================== ELIMINAR PROMOCION ================= --

    DROP PROCEDURE IF EXISTS spEliminarPromocion;
    DELIMITER !
    CREATE PROCEDURE spEliminarPromocion(IN $PK_ID_Promocion INT)
    BEGIN
    DELETE FROM `tbl_promocion` WHERE `PK_ID_Promocion` = $PK_ID_Promocion;
    END !
    DELIMITER ;

    -- =================== CONSULTAR PROMOCION ================ --

    DROP PROCEDURE IF EXISTS spConsultarPromocion;
    DELIMITER !
    CREATE PROCEDURE spConsultarPromocion(IN $PK_ID_Promocion INT)
    BEGIN
    SELECT * FROM `tbl_promocion` WHERE `PK_ID_Promocion` = $PK_ID_Promocion;
    END !
    DELIMITER ;

    -- ==================== LISTAR PROMOCION ================== --

    DROP PROCEDURE IF EXISTS spListarPromocion;
    DELIMITER !
    CREATE PROCEDURE spListarPromocion()
    BEGIN
    SELECT `PK_ID_Promocion`,`Nombre_Promocion`,`Descripcion`,`Fecha_Inicio`,`Dias_Duracion`, DATE_ADD(`Fecha_Inicio`, INTERVAL `Dias_Duracion` DAY) AS Fecha_Finalizacion, `Imagen_Promocion` FROM `tbl_promocion`;
    END !
    DELIMITER ;

    -- # CRUD tbl_rol_usuario --
    -- ================== REGISTRAR ROL_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarRol_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarRol_usuario(IN $Nombre_Rol varchar(45))
    BEGIN
    INSERT INTO `tbl_rol_usuario`(`Nombre_Rol`) VALUES ($Nombre_Rol);
    END !
    DELIMITER ;

    -- ================== MODIFICAR ROL_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarRol_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarRol_usuario(IN $PK_ID_Rol INT, IN $Nombre_Rol varchar(45))
    BEGIN
    UPDATE `tbl_rol_usuario` SET `Nombre_Rol` = $Nombre_Rol WHERE `PK_ID_Rol` = $PK_ID_Rol;
    END !
    DELIMITER ;

    -- =================== ELIMINAR ROL_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarRol_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarRol_usuario(IN $PK_ID_Rol INT)
    BEGIN
    DELETE FROM `tbl_rol_usuario` WHERE `PK_ID_Rol` = $PK_ID_Rol;
    END !
    DELIMITER ;

    -- =================== CONSULTAR ROL_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarRol_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarRol_usuario(IN $PK_ID_Rol INT)
    BEGIN
    SELECT * FROM `tbl_rol_usuario` WHERE `PK_ID_Rol` = $PK_ID_Rol;
    END !
    DELIMITER ;

    -- ==================== LISTAR ROL_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarRol_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarRol_usuario()
    BEGIN
    SELECT * FROM `tbl_rol_usuario`;
    END !
    DELIMITER ;


    -- # CRUD tbl_ruta --
    -- ================== REGISTRAR RUTA ================= --

    DROP PROCEDURE IF EXISTS spRegistrarRuta;
    DELIMITER !
    CREATE PROCEDURE spRegistrarRuta(IN $Nombre_Ruta varchar(45), IN $FK_ID_Usuario int(45))
    BEGIN
    INSERT INTO `tbl_ruta`(`Nombre_Ruta`,`FK_ID_Usuario`) VALUES ($Nombre_Ruta,$FK_ID_Usuario);
    END !
    DELIMITER ;

    -- ================== MODIFICAR RUTA ================= --

    DROP PROCEDURE IF EXISTS spModificarRuta;
    DELIMITER !
    CREATE PROCEDURE spModificarRuta(IN $PK_ID_Ruta INT, IN $FK_ID_Ubicacion int(45))
    BEGIN
    UPDATE `tbl_ruta` SET `FK_ID_Ubicacion` = $FK_ID_Ubicacion WHERE `PK_ID_Ruta` = $PK_ID_Ruta;
    END !
    DELIMITER ;

    -- =================== ELIMINAR RUTA ================= --

    DROP PROCEDURE IF EXISTS spEliminarRuta;
    DELIMITER !
    CREATE PROCEDURE spEliminarRuta(IN $PK_ID_Ruta INT)
    BEGIN
    DELETE FROM `tbl_ruta` WHERE `PK_ID_Ruta` = $PK_ID_Ruta;
    END !
    DELIMITER ;

    -- =================== CONSULTAR RUTA ================ --

    DROP PROCEDURE IF EXISTS spConsultarRuta;
    DELIMITER !
    CREATE PROCEDURE spConsultarRuta(IN $PK_ID_Ruta INT)
    BEGIN
    SELECT * FROM `tbl_ruta` WHERE `PK_ID_Ruta` = $PK_ID_Ruta;
    END !
    DELIMITER ;

    -- # CRUD tbl_ubicacion --
    -- ================== REGISTRAR UBICACION ================= --

    DROP PROCEDURE IF EXISTS spRegistrarUbicacion;
    DELIMITER !
    CREATE PROCEDURE spRegistrarUbicacion(IN $FK_ID_Usuario int(30), IN $Longitut decimal(10,0), IN $Latitud decimal(10,0))
    BEGIN
    INSERT INTO `tbl_ubicacion`(`FK_ID_Usuario`, `Longitut`, `Latitud`) VALUES ($FK_ID_Usuario, $Longitut, $Latitud);
    END !
    DELIMITER ;

    -- ================== MODIFICAR UBICACION ================= --

    DROP PROCEDURE IF EXISTS spModificarUbicacion;
    DELIMITER !
    CREATE PROCEDURE spModificarUbicacion(IN $PK_ID_Ubicacion INT, IN $FK_ID_Usuario int(30), IN $Longitut decimal(10,0), IN $Latitud decimal(10,0))
    BEGIN
    UPDATE `tbl_ubicacion` SET `FK_ID_Usuario` = $FK_ID_Usuario, `Longitut` = $Longitut, `Latitud` = $Latitud WHERE `PK_ID_Ubicacion` = $PK_ID_Ubicacion;
    END !
    DELIMITER ;

    -- =================== ELIMINAR UBICACION ================= --

    DROP PROCEDURE IF EXISTS spEliminarUbicacion;
    DELIMITER !
    CREATE PROCEDURE spEliminarUbicacion(IN $PK_ID_Ubicacion INT)
    BEGIN
    DELETE FROM `tbl_ubicacion` WHERE `PK_ID_Ubicacion` = $PK_ID_Ubicacion;
    END !
    DELIMITER ;

    -- =================== CONSULTAR UBICACION ================ --

    DROP PROCEDURE IF EXISTS spConsultarUbicacion;
    DELIMITER !
    CREATE PROCEDURE spConsultarUbicacion(IN $PK_ID_Ubicacion INT)
    BEGIN
    SELECT * FROM `tbl_ubicacion` WHERE `PK_ID_Ubicacion` = $PK_ID_Ubicacion;
    END !
    DELIMITER ;

    -- ==================== LISTAR UBICACION ================== --

    DROP PROCEDURE IF EXISTS spListarUbicacion;
    DELIMITER !
    CREATE PROCEDURE spListarUbicacion()
    BEGIN
    SELECT * FROM `tbl_ubicacion`;
    END !
    DELIMITER ;


    -- ==================== ACTUALIZAR CONTRASENIA RECUPERACION DEL USUARIO ================== --

    DROP PROCEDURE IF EXISTS spActualizarContrasenia_Recuperacion;
    DELIMITER !
    CREATE PROCEDURE spActualizarContrasenia_Recuperacion(IN $Correo_Electronico varchar(45), IN $Contrasenia_Recuperacion varchar(45))
    BEGIN
    UPDATE `tbl_cuenta` SET `Contrasenia_Recuperacion` = $Contrasenia_Recuperacion WHERE `Correo_Electronico` = $Correo_Electronico ;
    END !
    DELIMITER ;

    -- ==================== CONSULTAR SI EL CORREO DEL USUARIO EXISTE EN LA BASE DE DAOTS ================== --

    DROP PROCEDURE IF EXISTS spConsultarCorreoElectronico;
    DELIMITER !
    CREATE PROCEDURE spConsultarCorreoElectronico(IN $Correo_Electronico varchar(45))
    BEGIN
    SELECT * FROM `tbl_cuenta` WHERE `Correo_Electronico` = $Correo_Electronico;
    END !
    DELIMITER ;



    -- ==================== INICIAR SESION ================== --

    DROP PROCEDURE IF EXISTS spIniciarSesion;
    DELIMITER !
    CREATE PROCEDURE spIniciarSesion(IN $Nombre_Usuario varchar(45), IN $Contrasenia  varchar(45))
    BEGIN
    SELECT * FROM `tbl_cuenta` WHERE `Nombre_Usuario` =  $Nombre_Usuario AND (`Contrasenia` = $Contrasenia OR `Contrasenia_Recuperacion` = $Contrasenia) ;
    END !
    DELIMITER ;
    -- ==================== VALIDAR SI EXISTE UN USUARIO CON EL NOMBRE DE USUARIO INGRESADO ================== --

    DROP PROCEDURE IF EXISTS spValidarNombreUsuario;
    DELIMITER !
    CREATE PROCEDURE spValidarNombreUsuario(IN $Nombre_Usuario varchar(45))
    BEGIN
    SELECT * FROM `tbl_cuenta` WHERE `Nombre_Usuario` = $Nombre_Usuario;
    END !
    DELIMITER ;







    -- ==================== JOIN PARA INICIAR SESION Y  TRAER LOS DATOS DE LAS TABLAS: CUENTA,CLIENTE Y ESTABLECIMIENTO ================== --

    DROP PROCEDURE IF EXISTS spJoin_Cliente_Cuenta_Establecimiento;
    DELIMITER !
    CREATE  PROCEDURE `spJoin_Cliente_Cuenta_Establecimiento`(IN `$Nombre_Usuario` varchar(45),IN `$Contrasenia` varchar(45))
    BEGIN

    SELECT * FROM  `tbl_cliente` AS C INNER JOIN `tbl_cuenta` AS CU INNER JOIN  `tbl_datos_establecimientos` AS E
    ON  C.`FK_ID_Cuenta` =  CU.`PK_ID_Usuario` AND   E.`FK_ID_Usuario`  = CU.`PK_ID_Usuario`
    WHERE CU.`Nombre_Usuario` =  $Nombre_Usuario AND ( CU.Contrasenia = $Contrasenia OR CU.Contrasenia_Recuperacion = $Contrasenia)  AND C.FK_ID_Cuenta = CU.PK_ID_Usuario AND E.FK_ID_Usuario = CU.PK_ID_Usuario;

    END !
    DELIMITER ;

    -- ==================== JOIN PARA INICIAR SESION Y  TRAER LOS DATOS DE LAS TABLAS: CUENTA Y CLIENTE ================== --

    DROP PROCEDURE IF EXISTS spJoin_Cliente_Cuenta;
    DELIMITER !
    CREATE  PROCEDURE `spJoin_Cliente_Cuenta`(IN `$Nombre_Usuario` varchar(45),IN `$Contrasenia` varchar(45))
    BEGIN

    SELECT * FROM  `tbl_cliente` AS C INNER JOIN `tbl_cuenta` AS CU
    ON  C.`FK_ID_Cuenta` =  CU.`PK_ID_Usuario`
    WHERE CU.`Nombre_Usuario` =  $Nombre_Usuario AND ( CU.Contrasenia = $Contrasenia OR CU.Contrasenia_Recuperacion = $Contrasenia)  AND C.FK_ID_Cuenta = CU.PK_ID_Usuario;

    END !
    DELIMITER ;
    -- ==================== JOIN PARA INICIAR SESION Y  TRAER LOS DATOS DE LAS TABLAS: CUENTA, EMPLEADO ================== --

    DROP PROCEDURE IF EXISTS spJoin_Empleado_Cuenta;
    DELIMITER !
    CREATE  PROCEDURE `spJoin_Empleado_Cuenta`(IN `$Nombre_Usuario` varchar(45),IN `$Contrasenia` varchar(45))
    BEGIN

    SELECT * FROM `tbl_empleado` AS E INNER JOIN `tbl_cuenta` AS CU
    ON E.`FK_ID_Cuenta` =  CU.`PK_ID_Usuario`
    WHERE CU.`Nombre_Usuario` =  $Nombre_Usuario AND ( CU.Contrasenia = $Contrasenia OR CU.Contrasenia_Recuperacion = $Contrasenia)  AND E.FK_ID_Cuenta = CU.PK_ID_Usuario;

    END !
    DELIMITER ;

    -- ==================== ACTUALIZAR CONTRASENIA ACTUAL DEL USUARIO ================== --

    DROP PROCEDURE IF EXISTS spActualizarContrasenia_Actual;
    DELIMITER !
    CREATE PROCEDURE spActualizarContrasenia_Actual(IN $Contrasenia_Nueva varchar(45), IN $Contrasenia varchar(45), IN $Contrasenia_Encriptada varchar(45), IN $PK_ID_Usuario varchar(45), IN $Contrasenia_Recuperacion varchar(45))
    BEGIN
    UPDATE `tbl_cuenta` SET `Contrasenia` = $Contrasenia_Nueva, `Contrasenia_Recuperacion` = $Contrasenia_Recuperacion, `Contrasenia_Encriptada` = $Contrasenia_Encriptada
    WHERE `PK_ID_Usuario` = $PK_ID_Usuario AND (`Contrasenia` = $Contrasenia OR `Contrasenia_Recuperacion` = $Contrasenia ) ;
    END !
    DELIMITER ;




    -- ====================== MODIFICAR DATOS DE PRODUCTO REGISTRADOS==================== --

    DROP PROCEDURE IF EXISTS spModificarProducto;
    DELIMITER !
    CREATE PROCEDURE spModificarProducto(IN $PK_ID_Producto INT, IN $Nombre_Producto varchar(45), IN $Valor_Unitario int(30), IN $Descripcion_Producto TEXT, IN $Cant_Unid_Max int(100),IN $Cant_Unid_Min int(100),  IN $FK_ID_Categoria int(40), IN $Ruta_Imagen_Producto varchar(250), IN $Estado_Producto varchar(20))
    BEGIN
    UPDATE `tbl_producto` SET `Nombre_Producto` = $Nombre_Producto, `Valor_Unitario` = $Valor_Unitario, `Descripcion_Producto` = $Descripcion_Producto, `Cant_Unid_Max` = $Cant_Unid_Max,`Cant_Unid_Min` = $Cant_Unid_Min,  `FK_ID_Categoria` = $FK_ID_Categoria, `Ruta_Imagen_Producto` = $Ruta_Imagen_Producto, `Estado_Producto` = $Estado_Producto  WHERE `PK_ID_Producto` = $PK_ID_Producto;
    END !
    DELIMITER ;


    -- ==================== JOIN PARA CONSULTAR LOS COMENTARIOS DE UN PRODUCTO, PARA TRAER LOS DATOS DEL CLIENTE QUE REALIZO EL COMENTARIO ================== --

    DROP PROCEDURE IF EXISTS spJoin_Comentario_Cuenta;
    DELIMITER !
    CREATE  PROCEDURE `spJoin_Comentario_Cuenta`(IN `$FK_ID_Producto` INT)
    BEGIN

    SELECT CU.`Nombre_Usuario`,CU.`Imagen_Usuario`, DATE_FORMAT(C.Fecha_Comentario,'%W-%D-%M-%Y') AS Fecha_Comentario,C.`Descripcion`,C.`FK_ID_Producto`,
    C.`FK_ID_Usuario`,C.`PK_ID_Comentario`,C.`Valoracion_Comentario` FROM `tbl_comentario` AS C INNER JOIN `tbl_cuenta` AS CU
    ON C.`FK_ID_Usuario` =  CU.`PK_ID_Usuario`
    WHERE C.`FK_ID_Producto` =  $FK_ID_Producto
    ORDER BY C.`Fecha_Comentario` DESC;

    END !
    DELIMITER ;


    -- ==================== PROCEDIMIENTO PARA CONSULTAR CORREOS ================== --


    DROP PROCEDURE IF EXISTS spConsultarCorreos;
    DELIMITER !
    CREATE PROCEDURE spConsultarCorreos()
    BEGIN
    SELECT `Correo_Electronico` FROM `tbl_cuenta`;
    END !
    DELIMITER ;



    -- ========================== JOIN PARA CONSULTAR DE LAS TABLAS Producto,Promocion,Dtll_Promocion_Producto



    DROP PROCEDURE IF EXISTS spJoin_Producto_Promocion_Dtll_Producto;
    DELIMITER !
    CREATE  PROCEDURE `spJoin_Producto_Promocion_Dtll_Producto`()
    BEGIN
    SELECT *  FROM `tbl_producto` AS PROD LEFT JOIN  `tbl_dll_promocion_producto` AS DllPROM
    ON  PROD.PK_ID_Producto = DllPROM.FK_ID_Producto
    LEFT  JOIN `tbl_promocion` AS Prom
    ON DllPROM.FK_ID_Promocion  = Prom.PK_ID_Promocion;
    END !
    DELIMITER ;




    -- ========================== Procedimiento para registrar en la tabla imagenes usuario

    DROP PROCEDURE IF EXISTS spRegistrarImagen_Usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarImagen_Usuario( IN $URL_Imagen_Usuario varchar(250))
    BEGIN
    INSERT INTO `tbl_imagenes_usuarios`(`URL_Imagen_Usuario`) VALUES ( $URL_Imagen_Usuario);
    END !
    DELIMITER ;

    -- ========================== Procedimiento para registrar en la tabla imagenes portada
    DROP PROCEDURE IF EXISTS spRegistrarImagen_Portada;
    DELIMITER !
    CREATE PROCEDURE spRegistrarImagen_Portada(IN $URL_Imagen_Portada varchar(250))
    BEGIN
    INSERT INTO `tbl_imagenes_portada`(`URL_Imagen_Portada`) VALUES ( $URL_Imagen_Portada);
    END !
    DELIMITER ;

    -- ========================== Procedimiento para consultar en la la tabla imagenes usuario

    DROP PROCEDURE IF EXISTS spListarImagen_Usuario;
    DELIMITER !
    CREATE PROCEDURE spListarImagen_Usuario()
    BEGIN
    SELECT * FROM `tbl_imagenes_usuarios`;
    END !
    DELIMITER ;


    -- ========================== Procedimiento para consultar en la la tabla imagenes portada

    DROP PROCEDURE IF EXISTS spListarImagen_Portada;
    DELIMITER !
    CREATE PROCEDURE spListarImagen_Portada()
    BEGIN
    SELECT * FROM `tbl_imagenes_portada`;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para eliminar en la  tabla imagenes usuario

    DROP PROCEDURE IF EXISTS spEliminarImagen_Usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarImagen_Usuario($PK_ID_Imagen_Usuario INT(40))
    BEGIN
    DELETE FROM `tbl_imagenes_usuarios` WHERE `PK_ID_Imagen_Usuario`= $PK_ID_Imagen_Usuario;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para eliminar en la  tabla imagenes portada

    DROP PROCEDURE IF EXISTS spEliminarImagen_Portada;
    DELIMITER !
    CREATE PROCEDURE spEliminarImagen_Portada(IN $PK_ID_Imagen_Portada INT(40))
    BEGIN
    DELETE FROM `tbl_imagenes_portada` WHERE `PK_ID_Imagen_Portada`= $PK_ID_Imagen_Portada;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para modificar en la  tabla imagenes usuario
    DROP PROCEDURE IF EXISTS spModificarImagen_Usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarImagen_Usuario(IN $PK_ID_Imagen_Usuario INT(40),$URL_Imagen_Usuario VARCHAR(250) )
    BEGIN
    UPDATE `tbl_imagenes_usuarios` SET `URL_Imagen_Usuario` = $URL_Imagen_Usuario WHERE `PK_ID_Imagen_Usuario` =  $PK_ID_Imagen_Usuario;
    END !
    DELIMITER ;


    -- ========================== Procedimiento para modificar en la  tabla imagenes portada
    DROP PROCEDURE IF EXISTS spModificarImagen_Portada;
    DELIMITER !
    CREATE PROCEDURE spModificarImagen_Portada(IN $PK_ID_Imagen_Portada INT(40),$URL_Imagen_Portada VARCHAR(250))
    BEGIN
    UPDATE `tbl_imagenes_portada` SET `URL_Imagen_Portada` = $URL_Imagen_Portada WHERE `PK_ID_Imagen_Portada` = $PK_ID_Imagen_Portada;
    END !
    DELIMITER ;


    -- ==================== PROCEDIMIENTO PARA CONSULTAR SI EXISTE UNA IMAGEN DE PORTADA ================== --


    DROP PROCEDURE IF EXISTS spConsultarImagen_Portada;
    DELIMITER !
    CREATE PROCEDURE spConsultarImagen_Portada(IN $URL VARCHAR(250))
    BEGIN
    SELECT `URL_Imagen_Portada` FROM `tbl_imagenes_portada` WHERE `URL_Imagen_Portada` = $URL;
    END !
    DELIMITER ;

    -- ==================== PROCEDIMIENTO PARA CONSULTAR  SI EXISTE UNA IMAGEN DE PERFIL ================== --


    DROP PROCEDURE IF EXISTS spConsultarImagen_Usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarImagen_Usuario(IN $URL VARCHAR(250))
    BEGIN
    SELECT `URL_Imagen_Usuario` FROM `tbl_imagenes_usuarios` WHERE `URL_Imagen_Usuario` = $URL;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para Registrar  un like en la valoracion de producto
    DROP PROCEDURE IF EXISTS spConsultarDll_Valoracion_Producto;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_Valoracion_Producto(IN $FK_ID_Usuario INT(45),IN $FK_ID_Producto INT(45))
    BEGIN
    SELECT * FROM  `tbl_dll_valoracion_producto` WHERE  `FK_ID_Usuario` = $FK_ID_Usuario AND `FK_ID_Producto` = $FK_ID_Producto;
    END !
    DELIMITER ;

    DROP PROCEDURE IF EXISTS spRegistrarDll_Valoracion_Producto;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_Valoracion_Producto(IN $FK_ID_Usuario INT(45),IN $FK_ID_Producto INT(45))
    BEGIN
    INSERT INTO `tbl_dll_valoracion_producto`(`FK_ID_Usuario`,`FK_ID_Producto`) VALUES ( $FK_ID_Usuario,$FK_ID_Producto);
    END !
    DELIMITER ;

    -- ========================== Procedimiento para Eliminar un like de la valoracion de producto
    DROP PROCEDURE IF EXISTS spEliminarDll_Valoracion_Producto;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_Valoracion_Producto(IN $FK_ID_Usuario INT(45),IN $FK_ID_Producto INT(45))
    BEGIN
    DELETE FROM `tbl_dll_valoracion_producto` WHERE `FK_ID_Producto`= $FK_ID_Producto AND `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

     -- ========================== Procedimiento para agregar un like a un producto
     DROP PROCEDURE IF EXISTS spModificar_Valoracion_Like;
     DELIMITER !
     CREATE PROCEDURE spModificar_Valoracion_Like(IN $FK_ID_Producto INT(45))
     BEGIN
     UPDATE `tbl_producto` SET `Valoracion_Producto`  =  `Valoracion_Producto` +1   WHERE `PK_ID_Producto`= $FK_ID_Producto;
     END !
     DELIMITER ;

       -- ========================== Procedimiento para remover un like a un producto
       DROP PROCEDURE IF EXISTS spModificar_Valoracion_DisLike;
       DELIMITER !
       CREATE PROCEDURE spModificar_Valoracion_DisLike(IN $FK_ID_Producto INT(45))
       BEGIN
       UPDATE `tbl_producto` SET `Valoracion_Producto` = `Valoracion_Producto` - 1   WHERE `PK_ID_Producto`= $FK_ID_Producto;
       END !
       DELIMITER ;


    -- ========================== Procedimiento para registrar en la tabla imagenes portada
    DROP PROCEDURE IF EXISTS spRegistrarDll_Comentario_Cuenta;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_Comentario_Cuenta(IN $FK_ID_Usuario INT(45),IN $FK_ID_Comentario INT(45))
    BEGIN
    INSERT INTO `tbl_dll_comentario_cuenta`(`FK_ID_Usuario`,`FK_ID_Comentario`) VALUES ( $FK_ID_Usuario,$FK_ID_Comentario);
    END !
    DELIMITER ;

    -- ========================== Procedimiento para Eliminar un like
    DROP PROCEDURE IF EXISTS spEliminarDll_Comentario_Cuenta;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_Comentario_Cuenta(IN $PK_ID_Comentario INT(45),IN $FK_ID_Usuario INT(45))
    BEGIN
    DELETE FROM `tbl_dll_comentario_cuenta` WHERE `FK_ID_Comentario`= $PK_ID_Comentario AND `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para saber si un usuario ya le dio like a un comentario
    DROP PROCEDURE IF EXISTS spConsultar_Comentario_Cuenta;
    DELIMITER !
    CREATE PROCEDURE spConsultar_Comentario_Cuenta(IN $FK_ID_Comentario INT(45), IN $FK_ID_Usuario INT(45))
    BEGIN
    SELECT `FK_ID_Comentario`  FROM `tbl_dll_comentario_cuenta` WHERE `FK_ID_Comentario`= $FK_ID_Comentario AND `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para agregar un like a un comentario
    DROP PROCEDURE IF EXISTS spModificar_Comentario_Like;
    DELIMITER !
    CREATE PROCEDURE spModificar_Comentario_Like(IN $PK_ID_Comentario INT(45))
    BEGIN
    UPDATE `tbl_comentario` SET `Valoracion_Comentario`  =  `Valoracion_Comentario` +1   WHERE `PK_ID_Comentario`= $PK_ID_Comentario;
    END !
    DELIMITER ;


    -- ========================== Procedimiento para remover un like a un comentario
    DROP PROCEDURE IF EXISTS spModificar_Comentario_DisLike;
    DELIMITER !
    CREATE PROCEDURE spModificar_Comentario_DisLike(IN $PK_ID_Comentario INT(45))
    BEGIN
    UPDATE `tbl_comentario` SET `Valoracion_Comentario` = `Valoracion_Comentario` - 1   WHERE `PK_ID_Comentario`= $PK_ID_Comentario;
    END !
    DELIMITER ;


    -- ========================== Procedimiento para Eliminar todos los likes que existan deacuerdo al FK_ID_Comentario
    DROP PROCEDURE IF EXISTS spEliminarDll_Comentario_Cuenta_Likes;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_Comentario_Cuenta_Likes(IN $PK_ID_Comentario INT(45))
    BEGIN
    DELETE FROM `tbl_dll_comentario_cuenta` WHERE `FK_ID_Comentario`= $PK_ID_Comentario;
    END !
    DELIMITER ;





    -- ==================== PROCEDIMIENTO PARA INHABILITAR CUENTA DE USUARIO ================== --

    DROP PROCEDURE IF EXISTS spInhabilitarCuenta_Usuario;
    DELIMITER !
    CREATE PROCEDURE spInhabilitarCuenta_Usuario (IN $PK_ID_Usuario INT(45))
    BEGIN
    UPDATE `tbl_cuenta` set`Estado_Cuenta` = 'Cancelada' WHERE `PK_ID_Usuario` = $PK_ID_Usuario;
    END !
    DELIMITER ;

    -- ==================== PROCEDIMIENTO PARA HABILITAR CUENTA DE USUARIO ================== --

    DROP PROCEDURE IF EXISTS spHabilitarCuenta_Usuario;
    DELIMITER !
    CREATE PROCEDURE spHabilitarCuenta_Usuario (IN $PK_ID_Usuario INT(45))
    BEGIN
    UPDATE `tbl_cuenta` set`Estado_Cuenta` = 'En uso' WHERE `PK_ID_Usuario` = $PK_ID_Usuario;
    END !
    DELIMITER ;



    -- ==================== ACTUALIZAR DISPONIBILIDAD DE LA CUENTA DEL USUARIO ================== --

    DROP PROCEDURE IF EXISTS spActualizarDisponibilidad;
    DELIMITER !
    CREATE PROCEDURE spActualizarDisponibilidad(IN $PK_ID_Usuario INT, IN $Disponibilidad  varchar(45))
    BEGIN
    UPDATE `tbl_cuenta` SET `Disponibilidad` = $Disponibilidad WHERE `PK_ID_Usuario` = $PK_ID_Usuario ;
    END !
    DELIMITER ;
    -- ==================== ACTUALIZAR Tipo de cliente  DE LA CUENTA DEL USUARIO ================== --

    DROP PROCEDURE IF EXISTS spActualizarTipo_Cliente;
    DELIMITER !
    CREATE PROCEDURE spActualizarTipo_Cliente(IN $PK_ID_Usuario INT, IN $Tipo_Cliente  varchar(45), IN $Verificacion_Cuenta VARCHAR(45))
    BEGIN
    UPDATE `tbl_cuenta` SET `Tipo_Cliente` = $Tipo_Cliente, `Verificacion_Cuenta` = $Verificacion_Cuenta WHERE `PK_ID_Usuario` = $PK_ID_Usuario ;
    END !
    DELIMITER ;
    -- ================== VERIFICAR NOMBRE CATEGORIA ============================================ --
    DROP PROCEDURE IF EXISTS spVerificarCategoria;
    DELIMITER !
    CREATE PROCEDURE spVerificarCategoria(IN $Nombre_Categoria varchar(45) )
    BEGIN
    select * from `tbl_categoria_producto` where `Nombre_Categoria` = $Nombre_Categoria;
    END !
    DELIMITER ;

    -- ================== ACTUALIZAR CATEGORIA EN PRODUCTO ============================================ --
    DROP PROCEDURE IF EXISTS spActualizar_Producto_Categoria;
    DELIMITER !
    CREATE PROCEDURE spActualizar_Producto_Categoria(IN $FK_ID_Categoria INT(40))
    BEGIN
    UPDATE `tbl_producto` SET `FK_ID_Categoria` = 1 WHERE `FK_ID_Categoria` =  $FK_ID_Categoria;
    END !
    DELIMITER ;


    -- ==================== JOIN PARA LISTAR LAS PROMOCIONES QUE UN PRODUCTO POSEA ================== --
    DROP PROCEDURE IF EXISTS spJoin_Producto_Promociones_Dll_Promocion_Producto;
    DELIMITER !
    CREATE PROCEDURE spJoin_Producto_Promociones_Dll_Promocion_Producto(IN $FK_ID_Producto INT)
    BEGIN
    SELECT * FROM `tbl_dll_promocion_producto` AS DLL_PROM JOIN `tbl_promocion` AS Prom
    ON DLL_PROM.FK_ID_Promocion  = Prom.PK_ID_Promocion
    WHERE DLL_PROM.FK_ID_Producto = $FK_ID_Producto;
    END !
    DELIMITER ;


    -- ========================== Procedimiento para verificar si el usuario actual posee permisos para la vista que esta solicitando
    DROP PROCEDURE IF EXISTS spConsultar_Permisos_Vista;
    DELIMITER !
    CREATE PROCEDURE spConsultar_Permisos_Vista(IN $Url_Vista VARCHAR(150),IN $FK_ID_Rol INT(45))
    BEGIN
    SELECT * FROM `tbl_permisos_usuario` AS Perm_Usuario JOIN  `tbl_vista_usuario` AS Vis_Usuario
    ON Perm_Usuario.FK_ID_Vista = Vis_Usuario.PK_ID_Vista
    WHERE  Vis_Usuario.Url_Vista = $Url_Vista AND Perm_Usuario.FK_ID_Rol = $FK_ID_Rol;
    END !
    DELIMITER ;


    -- ========================== Procedimiento para listar las vista de los usuarios deacuerdo al rol
    DROP PROCEDURE IF EXISTS spListar_Vistas_Registradas;
    DELIMITER !
    CREATE PROCEDURE spListar_Vistas_Administrador(IN $FK_ID_Rol INT)
    BEGIN
    SELECT * FROM `tbl_vista_usuario` AS Vis_Usuario JOIN  `tbl_permisos_usuario` AS Perm_Usuario
    ON Vis_Usuario.PK_ID_Vista = Perm_Usuario.FK_ID_Vista
    WHERE  Perm_Usuario.FK_ID_Rol = $FK_ID_Rol;
    END !
    DELIMITER ;




    -- ========================== Procedimiento para registrar en la tabla  permisos usuario
    DROP PROCEDURE IF EXISTS spRegistrarPermisos_Usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarPermisos_Usuario(IN $FK_ID_Rol INT(45),IN $FK_ID_Vista INT(45))
    BEGIN
    INSERT INTO `tbl_permisos_usuario`(`FK_ID_Rol`,`FK_ID_Vista`) VALUES ( $FK_ID_Rol,$FK_ID_Vista);
    END !
    DELIMITER ;



    -- ========================== Procedimiento para Eliminar el registro de una vista en la tbl_permisos_usuario
    DROP PROCEDURE IF EXISTS spEliminarPermisos_Usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarPermisos_Usuario(IN $FK_ID_Rol INT(45),IN $FK_ID_Vista INT(45))
    BEGIN
    DELETE FROM `tbl_permisos_usuario` WHERE `FK_ID_Rol`= $FK_ID_Rol AND `FK_ID_Vista` = $FK_ID_Vista ;
    END !
    DELIMITER ;

    -- ========================== Procedimiento para Eliminar el registro de una vista en la tbl_vista_usuario
    DROP PROCEDURE IF EXISTS spEliminarVista_Usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarVista_Usuario(IN $PK_ID_Vista INT(45))
    BEGIN
    DELETE FROM `tbl_vista_usuario` WHERE `PK_ID_Vista`= $PK_ID_Vista;
    END !
    DELIMITER ;


    -- ==================== PROCEDIMIENTO PARA VERIFICAR QUE NO SE REPITA EL REGISTRO DE UN PRODUCTO ================== --

    DROP PROCEDURE IF EXISTS spVerificarProducto;
    DELIMITER !
    CREATE PROCEDURE spVerificarProducto(IN $Nombre_Producto varchar(40))
    BEGIN
    SELECT * FROM `tbl_producto` WHERE `Nombre_Producto` = $Nombre_Producto;
    END !
    DELIMITER ;


    -- ================== ACTUALIZAR CATEGORIA EN PRODUCTO ============================================ --
    DROP PROCEDURE IF EXISTS spActualizar_Permiso_Usuario;
    DELIMITER !
    CREATE PROCEDURE spActualizar_Permiso_Usuario(IN $PK_ID_Vista INT(40),IN $Url_Vista VARCHAR(150), IN $Nombre_Vista VARCHAR(40))
    BEGIN
    UPDATE `tbl_vista_usuario` SET `Url_Vista` = $Url_Vista, `Nombre_Vista` = $Nombre_Vista
    WHERE `PK_ID_Vista` =  $PK_ID_Vista;
    END !
    DELIMITER ;


    -- ================== REGISTRAR EJEMPLO_CRUD ================= --

    DROP PROCEDURE IF EXISTS spRegistrarEjemplo_crud;
    DELIMITER !
    CREATE PROCEDURE spRegistrarEjemplo_crud(IN $Nombre_Usuario_Ejemplo varchar(45), IN $Contrasenia_Ejemplo varchar(45))
    BEGIN
    INSERT INTO `tbl_ejemplo_crud`(`Nombre_Usuario_Ejemplo`, `Contrasenia_Ejemplo`) VALUES ($Nombre_Usuario_Ejemplo, $Contrasenia_Ejemplo);
    END !
    DELIMITER ;

    -- ================== MODIFICAR EJEMPLO_CRUD ================= --

    DROP PROCEDURE IF EXISTS spModificarEjemplo_crud;
    DELIMITER !
    CREATE PROCEDURE spModificarEjemplo_crud(IN $PK_ID_Usuario_Ejemplo INT, IN $Nombre_Usuario_Ejemplo varchar(45), IN $Contrasenia_Ejemplo varchar(45))
    BEGIN
    UPDATE `tbl_ejemplo_crud` SET `Nombre_Usuario_Ejemplo` = $Nombre_Usuario_Ejemplo, `Contrasenia_Ejemplo` = $Contrasenia_Ejemplo WHERE `PK_ID_Usuario_Ejemplo` = $PK_ID_Usuario_Ejemplo;
    END !
    DELIMITER ;

    -- =================== ELIMINAR EJEMPLO_CRUD ================= --

    DROP PROCEDURE IF EXISTS spEliminarEjemplo_crud;
    DELIMITER !
    CREATE PROCEDURE spEliminarEjemplo_crud(IN $PK_ID_Usuario_Ejemplo INT)
    BEGIN
    DELETE FROM `tbl_ejemplo_crud` WHERE `PK_ID_Usuario_Ejemplo` = $PK_ID_Usuario_Ejemplo;
    END !
    DELIMITER ;

    -- =================== CONSULTAR EJEMPLO_CRUD ================ --

    DROP PROCEDURE IF EXISTS spConsultarEjemplo_crud;
    DELIMITER !
    CREATE PROCEDURE spConsultarEjemplo_crud(IN $PK_ID_Usuario_Ejemplo INT)
    BEGIN
    SELECT * FROM `tbl_ejemplo_crud` WHERE `PK_ID_Usuario_Ejemplo` = $PK_ID_Usuario_Ejemplo;
    END !
    DELIMITER ;

    -- ==================== LISTAR EJEMPLO_CRUD ================== --

    DROP PROCEDURE IF EXISTS spListarEjemplo_crud;
    DELIMITER !
    CREATE PROCEDURE spListarEjemplo_crud()
    BEGIN
    SELECT * FROM `tbl_ejemplo_crud`;
    END !
    DELIMITER ;


    -- ====================== CONSULTAR NOTIFICACION
    DROP PROCEDURE IF EXISTS spConsultar_Notificacion;
    DELIMITER !
    CREATE PROCEDURE spConsultar_Notificacion(IN $PK_ID_Cotizacion_Usuario INT)
    BEGIN
    SELECT * FROM tbl_buson_notificacion_usuario WHERE FK_ID_Pedido = $PK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;

    -- ==================== Duplicar_Cotizacion ================== --


    DROP PROCEDURE IF EXISTS spDuplicarCotizacion;
    DELIMITER !
    CREATE PROCEDURE spDuplicarCotizacion( IN $PK_ID_Cotizacion_Usuario INT )
    BEGIN
    INSERT INTO tbl_pedido_usuario (FK_ID_Cotizacion_Usuario,Direccion_entrega,Fecha_Cotizacion,Fecha_Pedido,FK_ID_Usuario,Telefono_Entrega)
    SELECT PK_ID_Cotizacion_Usuario,Direccion_entrega,Fecha_Cotizacion,NOW(),FK_ID_Usuario,Telefono_Entrega FROM  tbl_cotizacion_usuario
    WHERE  Estado_Cotizacion = 'Atendido' AND PK_ID_Cotizacion_Usuario = $PK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;


    -- ==================== Duplicar_Cotizacion_Fija_Pedido ================== --


    DROP PROCEDURE IF EXISTS spDuplicarCotizacion_Fija_Pedido;
    DELIMITER !
    CREATE PROCEDURE spDuplicarCotizacion_Fija_Pedido( IN $PK_ID_Producto INT, IN $FK_ID_Cotizacion_Usuario INT, IN $PK_ID_Pedido INT )
    BEGIN
    INSERT INTO tbl_dll_producto_cotizacion_fija (Nombre_Producto,Ruta_Imagen_Producto,Valor_Unitario,Cantidad_Productos,Sub_Total,FK_ID_Pedido)
    SELECT Nombre_Producto,Ruta_Imagen_Producto,Valor_Unitario,(SELECT Cantidad_Productos FROM   tbl_dll_producto_cotizacion WHERE  FK_ID_Producto = $PK_ID_Producto AND FK_ID_Cotizacion_Usuario = $FK_ID_Cotizacion_Usuario) AS Cantidad_Productos,(SELECT Sub_Total FROM   tbl_dll_producto_cotizacion WHERE  FK_ID_Producto = $PK_ID_Producto AND FK_ID_Cotizacion_Usuario = $FK_ID_Cotizacion_Usuario) AS Sub_Total,$PK_ID_Pedido  FROM  tbl_producto
    WHERE  PK_ID_Producto = $PK_ID_Producto;
    END !
    DELIMITER ;


    -- ==================== ELIMINAR_Duplicado_Cotizacion ================== --


    DROP PROCEDURE IF EXISTS spEliminarDuplicadoCotizacion;
    DELIMITER !
    CREATE PROCEDURE spEliminarDuplicadoCotizacion(IN $PK_ID_Cotizacion_Usuario INT)
    BEGIN
    DELETE from tbl_pedido_usuario
    WHERE  FK_ID_Cotizacion_Usuario IN (SELECT PK_ID_Cotizacion_Usuario FROM tbl_cotizacion_usuario WHERE Estado_Cotizacion='En proceso' OR Estado_Cotizacion='Cancelado' AND PK_ID_Cotizacion_Usuario = $PK_ID_Cotizacion_Usuario);
    END !
    DELIMITER ;


    -- ==================== Actualizar_Duplicado_Cotizacion ================== --


    DROP PROCEDURE IF EXISTS spActualizar_Duplicado_Cotizacion;
    DELIMITER !
    CREATE PROCEDURE spActualizar_Duplicado_Cotizacion(IN $PK_ID_Cotizacion_Usuario INT, IN $Estado_Pedido VARCHAR(45))
    BEGIN
    UPDATE `tbl_pedido_usuario` SET `Estado_pedido` = $Estado_Pedido,  `Fecha_Pedido` = now()
    WHERE  FK_ID_Cotizacion_Usuario IN (SELECT PK_ID_Cotizacion_Usuario FROM tbl_cotizacion_usuario WHERE PK_ID_Cotizacion_Usuario = $PK_ID_Cotizacion_Usuario);
    END !
    DELIMITER ;

    -- =================== Verificar pedido existente ====================== --

    DROP PROCEDURE IF EXISTS spVerificarPedido;
    DELIMITER !
    CREATE PROCEDURE spVerificarPedido(IN $PK_ID_Cotizacion_Usuario INT)
    BEGIN
    SELECT * FROM tbl_pedido_usuario WHERE FK_ID_Cotizacion_Usuario= $PK_ID_Cotizacion_Usuario;
    END !
    DELIMITER ;

    -- =================== MODIFICAR ESTADO PEDIDO  ================= --

    DROP PROCEDURE IF EXISTS spModificarEstado_Pedido_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarEstado_Pedido_usuario(IN $PK_ID_Pedido INT,$Estado_pedido varchar(40))
    BEGIN
    UPDATE `tbl_pedido_usuario`  SET  `Estado_pedido` = $Estado_pedido WHERE `PK_ID_Pedido` = $PK_ID_Pedido;
    END !
    DELIMITER ;



    -- # CRUD tbl_dll_listas_ordenes_usuario --
    -- ================== REGISTRAR DLL_LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarDll_listas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarDll_listas_ordenes_usuario(IN $FK_ID_Producto int(45), IN $FK_ID_Lista_Usuario int(45), IN $Cantidad_Productos int(100), IN $Sub_Total int(100), IN $Valor_Unitario int(100),IN $Ruta_Imagen_Producto VARCHAR(250), IN $Cant_Unid_Max INT(100), IN $Cant_Unid_Min INT(100), IN $Nombre_Producto VARCHAR(45))
    BEGIN
    INSERT INTO `tbl_dll_listas_ordenes_usuario`(`FK_ID_Producto`, `FK_ID_Lista_Usuario`, `Cantidad_Productos`, `Sub_Total`,`Valor_Unitario`, `Ruta_Imagen_Producto`,`Cant_Unid_Max`,`Cant_Unid_Min`,`Nombre_Producto`) VALUES ($FK_ID_Producto, $FK_ID_Lista_Usuario, $Cantidad_Productos, $Sub_Total,$Valor_Unitario,$Ruta_Imagen_Producto,$Cant_Unid_Max,$Cant_Unid_Min,$Nombre_Producto);
    END !
    DELIMITER ;

    -- ================== MODIFICAR DLL_LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarDll_listas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarDll_listas_ordenes_usuario(IN $PK_ID_DLL_Lista_Usuario int(45), IN $Cantidad_Productos int(100), IN $Sub_Total int(100))
    BEGIN
    UPDATE `tbl_dll_listas_ordenes_usuario` SET   `Cantidad_Productos` = $Cantidad_Productos, `Sub_Total` = $Sub_Total WHERE `PK_ID_DLL_Lista_Usuario` = $PK_ID_DLL_Lista_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_LISTAS_ORDENES_USUARIO PRODUCTO EN ESPECIFICO ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_listas_Producto;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_listas_Producto(IN $PK_ID_DLL_Lista_Usuario INT)
    BEGIN
    DELETE FROM `tbl_dll_listas_ordenes_usuario` WHERE `PK_ID_DLL_Lista_Usuario` = $PK_ID_DLL_Lista_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_listas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_listas_ordenes_usuario(IN $FK_ID_Usuario INT)
    BEGIN
    DELETE FROM `tbl_dll_listas_ordenes_usuario` WHERE `FK_ID_Lista_Usuario` IN (select `PK_ID_Lista_Usuario` FROM `tbl_listas_ordenes_usuario` WHERE `FK_ID_Usuario` = $FK_ID_Usuario);
    END !
    DELIMITER ;

    -- =================== ELIMINAR DLL_LISTAS_ORDENES_USUARIO ESPECIFICA================= --

    DROP PROCEDURE IF EXISTS spEliminarDll_listas_ordenes_usuario_especifica;
    DELIMITER !
    CREATE PROCEDURE spEliminarDll_listas_ordenes_usuario_especifica(IN $FK_ID_Lista_Usuario INT)
    BEGIN
    DELETE FROM `tbl_dll_listas_ordenes_usuario` WHERE `FK_ID_Lista_Usuario` = $FK_ID_Lista_Usuario;
    END !
    DELIMITER ;

    -- =================== CONSULTAR DLL_LISTAS_ORDENES_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarDll_listas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarDll_listas_ordenes_usuario(IN $FK_ID_Lista_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_dll_listas_ordenes_usuario` WHERE `FK_ID_Lista_Usuario` = $FK_ID_Lista_Usuario;
    END !
    DELIMITER ;

    -- ==================== LISTAR DLL_LISTAS_ORDENES_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarDll_listas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarDll_listas_ordenes_usuario()
    BEGIN
    SELECT * FROM `tbl_dll_listas_ordenes_usuario`;
    END !
    DELIMITER ;

    -- # CRUD tbl_listas_ordenes_usuario --
    -- ================== REGISTRAR LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spRegistrarListas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spRegistrarListas_ordenes_usuario(IN $FK_ID_Usuario INT,IN $Nombre_Lista varchar(45))
    BEGIN
    INSERT INTO `tbl_listas_ordenes_usuario`(`FK_ID_Usuario`,`Nombre_Lista`, `Fecha_Creacion`) VALUES ($FK_ID_Usuario,$Nombre_Lista, NOW());
    END !
    DELIMITER ;

    -- ================== MODIFICAR LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spModificarListas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spModificarListas_ordenes_usuario(IN $PK_ID_Lista_Usuario INT, IN $Nombre_Lista varchar(45), IN $Fecha_Creacion datetime)
    BEGIN
    UPDATE `tbl_listas_ordenes_usuario` SET `Nombre_Lista` = $Nombre_Lista, `Fecha_Creacion` = $Fecha_Creacion WHERE `PK_ID_Lista_Usuario` = $PK_ID_Lista_Usuario;
    END !
    DELIMITER ;

    -- ================== Actualizar nombre  LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spActualziar_Nombre_Lista;
    DELIMITER !
    CREATE PROCEDURE spActualziar_Nombre_Lista(IN $PK_ID_Lista_Usuario INT, IN $Nombre_Lista varchar(45))
    BEGIN
    UPDATE `tbl_listas_ordenes_usuario` SET `Nombre_Lista` = $Nombre_Lista WHERE `PK_ID_Lista_Usuario` = $PK_ID_Lista_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR LISTAS_ORDENES_USUARIO ================= --

    DROP PROCEDURE IF EXISTS spEliminarListas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarListas_ordenes_usuario(IN $FK_ID_Usuario INT)
    BEGIN
    DELETE FROM `tbl_listas_ordenes_usuario` WHERE `FK_ID_Usuario` = $FK_ID_Usuario;
    END !
    DELIMITER ;

    -- =================== ELIMINAR LISTAS_ORDENES_USUARIO EN ESPECIFICO ================= --

    DROP PROCEDURE IF EXISTS spEliminarLista_orden_usuario;
    DELIMITER !
    CREATE PROCEDURE spEliminarLista_orden_usuario(IN $FK_ID_Usuario INT, IN $PK_ID_Lista_Usuario INT)
    BEGIN
    DELETE FROM `tbl_listas_ordenes_usuario` WHERE `FK_ID_Usuario` = $FK_ID_Usuario AND `PK_ID_Lista_Usuario` = $PK_ID_Lista_Usuario;
    END !
    DELIMITER ;

    -- =================== CONSULTAR LISTAS_ORDENES_USUARIO ================ --

    DROP PROCEDURE IF EXISTS spConsultarListas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spConsultarListas_ordenes_usuario(IN $FK_ID_Usuario INT)
    BEGIN
    SELECT * FROM `tbl_listas_ordenes_usuario` WHERE `FK_ID_Usuario` = $FK_ID_Usuario
    ORDER BY `Fecha_Creacion` DESC;
    END !
    DELIMITER ;



    -- ==================== LISTAR LISTAS_ORDENES_USUARIO ================== --

    DROP PROCEDURE IF EXISTS spListarListas_ordenes_usuario;
    DELIMITER !
    CREATE PROCEDURE spListarListas_ordenes_usuario()
    BEGIN
    SELECT * FROM `tbl_listas_ordenes_usuario`;
    END !
    DELIMITER ;

    -- ==================== LISTAR EMPLEADO DISTRIBUIDOR ================== --

    DROP PROCEDURE IF EXISTS spListarEmpleadoDistribuidor;
    DELIMITER !
    CREATE PROCEDURE spListarEmpleadoDistribuidor()
    BEGIN
    SELECT * FROM `tbl_cuenta` WHERE `FK_ID_Rol` = 4;
    END !
    DELIMITER ;

    -- ==================== LISTAR RUTA ================== --

    DROP PROCEDURE IF EXISTS spListarRuta;
    DELIMITER !
    CREATE PROCEDURE spListarRuta()
    BEGIN
    SELECT Rut.PK_ID_Ruta,Rut.Nombre_Ruta,Rut.FK_ID_Usuario,Cuen.Nombre_Usuario FROM `tbl_ruta` AS Rut INNER JOIN `tbl_cuenta` AS Cuen
    ON Rut.FK_ID_Usuario = Cuen.PK_ID_Usuario;
    END !
    DELIMITER ;
