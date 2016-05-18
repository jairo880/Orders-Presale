<?php

class M_Modulo_Usuario
{
  function __construct( $db )
  {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit('Error al intentar conectar con la Base de Datos en M_Modulo_Usuario:'+$e);
    }
  }
  //_* Funcion para iniciar sesion en el sistema
  public function FN_Iniciar_Sesion( $Nombre_Usuario,$Contrasenia )
  {
    $sql = "CALL `spJoin_Cliente_Cuenta_Establecimiento`(?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $Nombre_Usuario);
    $query -> bindParam(2, $Contrasenia);
    $query -> execute();
    if ($query->rowCount() > 0) {
      return $query->fetchAll();
    }
    else
    {
      //========  spJoin_Cliente_Cuenta
      $sql = "CALL `spJoin_Cliente_Cuenta`(?,?);";
      $query = $this->db->prepare( $sql );
      $query->bindParam(1, $Nombre_Usuario);
      $query -> bindParam(2, $Contrasenia);
      $query -> execute();
      if ($query->rowCount() > 0) {
        return $query->fetchAll();
      }
      else
      {
        //=========== spJoin_Empleado_Cuente
        $sql = "CALL `spJoin_Empleado_Cuenta`(?,?);";
        $query = $this->db->prepare( $sql );
        $query->bindParam(1, $Nombre_Usuario);
        $query -> bindParam(2, $Contrasenia);
        $query -> execute();
        if ($query->rowCount() > 0) {
          return $query->fetchAll();
        }
        else
        {
          return false;
        }
        //========== spJoin_Empleado_Cuenta
      }
      //======== spJoin_Cliente_Cuenta
    }
  }

  //_* Funcio para actualizar los datos de la cuenta
  public function FN_Actualizar_Datos_Tabla_Cuenta(
    $PK_ID_Usuario ,
    $Nombre_Usuario,
    $Imagen_Usuario,
    $Fondo_Perfil_Usuario,
    $Disponibilidad,
    $FK_ID_Rol,
    $Correo_Electronico
    )
  {
    //========  spModificarEmpleado
    $sql = "CALL `spModificarCuenta`(?,?,?,?,?,?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Usuario);
    $query -> bindParam(2, $Nombre_Usuario);
    $query->bindParam(3, $Imagen_Usuario);
    $query -> bindParam(4, $Fondo_Perfil_Usuario);
    $query->bindParam(5, $Disponibilidad);
    $query -> bindParam(6, $FK_ID_Rol);
    $query -> bindParam(7, $Correo_Electronico);
    $query -> execute();
    if ($query->rowCount() > 0) {
      return true;
    }else {

      return false;
      //========  spModificarEmpleado
    }
  }

  //_* Funcion para actualizar los datos de la tabla empleado
  public function FN_Actualizar_Datos_Tabla_Empleado(
    $PK_ID_Usuario_Persona ,
    $FK_ID_Cuenta,
    $Nombre,
    $Segundo_Nombre,
    $Apellido,
    $Segundo_Apellido,
    $Municipio,
    $Telefono_Celular,
    $Sexo
    )
  {
    //========  spModificarEmpleado
    $sql = "CALL `spModificarEmpleado`(?,?,?,?,?,?,?,?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Usuario_Persona);
    $query -> bindParam(2, $FK_ID_Cuenta);
    $query->bindParam(3, $Nombre);
    $query -> bindParam(4, $Segundo_Nombre);
    $query->bindParam(5, $Apellido);
    $query -> bindParam(6, $Segundo_Apellido);
    $query->bindParam(7, $Municipio);
    $query->bindParam(8, $Telefono_Celular);
    $query->bindParam(9, $Sexo);
    $query -> execute();
    if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
      //========  spModificarEmpleado
    }
  }

  //_* Funcion para actualizar los datos de la tabla cliente
  public function FN_Actualizar_Datos_Tabla_Cliente(
    $PK_ID_Usuario_Persona ,
    $FK_ID_Cuenta,
    $Nombre,
    $Segundo_Nombre,
    $Apellido,
    $Segundo_Apellido,
    $Departamento,
    $Municipio,
    $Telefono_Celular,
    $Sexo,
    $Tipo_Cliente,
    $Posee_Empresa
    )
  {
    //========  spModificarCliente
    $sql = "CALL `spModificarCliente`(?,?,?,?,?,?,?,?,?,?,?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Usuario_Persona);
    $query -> bindParam(2, $FK_ID_Cuenta);
    $query->bindParam(3, $Nombre);
    $query -> bindParam(4, $Segundo_Nombre);
    $query->bindParam(5, $Apellido);
    $query -> bindParam(6, $Segundo_Apellido);
    $query -> bindParam(7, $Departamento);
    $query->bindParam(8, $Municipio);
    $query->bindParam(9, $Telefono_Celular);
    $query->bindParam(10, $Sexo);
    $query -> bindParam(11, $Tipo_Cliente);
    $query -> bindParam(12, $Posee_Empresa);
    $query -> execute();
    if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
  }
  //_* Funcion para actualizar los datos de la tabla establecimiento
  public function FN_Actualizar_Datos_Tabla_Establecimiento(
    $PK_ID_Establecimiento ,
    $Nombre_Establecimiento,
    $Nombre_Encargado,
    $Nit,
    $Telefono_Establecimiento,
    $Direccion_Establecimiento,
    $Municipio_Establecimiento,
    $FK_ID_Usuario
    )
  {
    //========  spModificarEmpleado
    $sql = "CALL `spModificarDatos_establecimientos`(?,?,?,?,?,?,?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Establecimiento);
    $query -> bindParam(2, $Nombre_Establecimiento);
    $query->bindParam(3, $Nombre_Encargado);
    $query->bindParam(4, $Nit);
    $query -> bindParam(5, $Telefono_Establecimiento);
    $query->bindParam(6, $Direccion_Establecimiento);
    $query -> bindParam(7, $Municipio_Establecimiento);
    $query -> bindParam(8, $FK_ID_Usuario);
    $query -> execute();
    if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
    //========  spModificarEmpleado
  }
  //_* Funcion para consultar los datos de la empresa
  public function FN_Verificacion_Empresa($FK_ID_Cuenta)
  {
    //========  spModificarEmpleado
    $sql = "CALL `spConsultarDatos_establecimientos`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $FK_ID_Cuenta);
    $query -> execute();
    if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
    //========  spModificarEmpleado
  }
  //_*Consultar en la tabla cuenta si el nombre de usuario existe
  public function FN_Consultar_Nombre_Usuario(
    $Nombre_Usuario
    ) {
    $sql = "CALL `spValidarNombreUsuario`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $Nombre_Usuario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  //_* Funcion para inhabilitar el estado de la cuenta
  public function FN_Inhabilitar_Estado_Cuenta(
    $PK_ID_Usuario
    ){
    $sql = "CALL `spInhabilitarCuenta_Usuario`(?)";
    $query= $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Usuario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  //_* Funcion para habilitar el estado de la cuenta del usuario
  public function FN_Habilitar_Estado_Cuenta_Usuario_Login(
    $PK_ID_Usuario
    ){
    $sql = "CALL `spHabilitarCuenta_Usuario`(?)";
    $query= $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Usuario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  //_* Funcion con la que se verifica al cargar la pagina si el usuario que esta logeado posee permisos para la vista solicitada
  public function FN_Consultar_Permisos_Rol( $Vista_Solocitada, $PK_ID_Rol )
  {
    $sql = "CALL `spConsultar_Permisos_Vista`(?,?)";
    $query= $this->db->prepare( $sql );
    $query->bindParam(1, $Vista_Solocitada);
    $query->bindParam(2, $PK_ID_Rol);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
    //***************
  }
  //_* Funcion para registrar la cotizacion
  public function FN_Registro_Cotizacion_Producto(
    $PK_ID_Usuario,
    $Direccion_Entrega,
    $Telefono_Entrega,
    $Datos_Producto)
  {
    $sql = "SELECT `fnRegistrar_Cotizacion_Producto`(?,?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Usuario);
    $query->bindParam(2, $Direccion_Entrega);
    $query->bindParam(3, $Telefono_Entrega);
    $query->execute();
    if ($query->rowCount() > 0) {
      $Respuesta_Registro_tbl_Cotizacion_Producto= $query->fetchColumn();
      //Uso un foreach para sacar uno por uno los datos de la variable  Sesion::getValue('Orden_Envio') la cual posee los datos de los productos que el cliente envio en la orden
      foreach ($Datos_Producto as $key) {
        $FK_ID_Cotizacion_Usuario = $Respuesta_Registro_tbl_Cotizacion_Producto;
        if(isset($key->PK_ID_Producto))
        {
          $FK_ID_Producto = $key->PK_ID_Producto;
        }
        if(isset($key->FK_ID_Producto))
        {
          $FK_ID_Producto = $key->FK_ID_Producto;
        }
        //
        if(isset($key->NUM_Cantidad))
        {
          $Cantidad_Productos = $key->NUM_Cantidad;
        }
        if(isset($key->NUM_Costo))
        {
          $Sub_Total = $key->NUM_Costo;
        }
        //
        if(isset($key->Cantidad_Productos))
        {
          $Cantidad_Productos = $key->Cantidad_Productos;
        }
        if(isset($key->Sub_Total))
        {
          $Sub_Total = $key->Sub_Total;
        }
        $sql = "CALL `spRegistrarDll_producto_cotizacion`(?,?,?,?);";
        $query = $this->db->prepare( $sql );
        $query->bindParam(1, $FK_ID_Producto);
        $query->bindParam(2, $FK_ID_Cotizacion_Usuario);
        $query->bindParam(3, $Cantidad_Productos);
        $query->bindParam(4, $Sub_Total);
        $query->execute();
      }
      if ($query->rowCount() > 0) {
        // $sql = "SELECT `fnRegistrar_Notificacion`(?);";
        // $query = $this->db->prepare( $sql );
        // $query->bindParam(1, $Respuesta_Registro_tbl_Cotizacion_Producto);
        // $query->execute();
        // if ($query->rowCount() > 0) {
        //   $Respuesta_Registro_tbl_Buson_Notificacion= $query->fetchColumn();
        //   $sql = "CALL `spRegistrarDll_buson_notificacion_usuario`(?,?);";
        //   $query = $this->db->prepare( $sql );
        //   $query->bindParam(1, $Respuesta_Registro_tbl_Buson_Notificacion);
        //   $query->bindParam(2, $PK_ID_Usuario);
        //   $query->execute();
        //   if ($query->rowCount() > 0) {
        //     return true;
        //   }
        //   else
        //   {
        //     return false;
        //   }

        // else
        // {
        //   return false;
        // }
        return true;
      } else {
        return false;
      }
    }
    else
    {
      return false;
    }
  }
  //_* Funcion para listar las ordenes enviadas, esta funcion es para el cliente, la usa para listar sus ordenes enviadas
  public function FN_Listar_Ordenes_Enviadas($FK_ID_Usuario)
  {
    $sql = "CALL `spConsultarCotizacion_usuario`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $FK_ID_Usuario);
    $query->execute();
    return $query->fetchAll();
  }

  public function FN_Listar_Pedidos_Enviados($FK_ID_Usuario)
  {
    $sql = "CALL `spConsultarPedido_usuario`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $FK_ID_Usuario);
    $query->execute();
    return $query->fetchAll();
  }
  //_* Funcion para listar los detalles de una orden deacuerdo al FK_ID_Cotizacion_Usuario, esta funcion es para el cliente, la realiza cuando selecciona una orden enviada y ve en detalle la info de la orden
  public function FN_Listar_Detalles_Ordene_Enviada($FK_ID_Cotizacion_Usuario)
  {
    $sql = "CALL `spJoin_ConsultarDll_producto_cotizacion`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $FK_ID_Cotizacion_Usuario);
    $query->execute();
    return $query->fetchAll();
  }
  public function FN_Listar_Detalles_Orden_Enviado($FK_ID_Cotizacion_Usuario)
  {
    $sql = "CALL `spJoin_ConsultarDll_producto_cotizacion`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $FK_ID_Cotizacion_Usuario);
    $query->execute();
    return $query->fetchAll();
  }
  public function FN_Listar_Detalles_Pedido_Enviado($PK_ID_Pedido)
  {
    $sql = "CALL `spJoin_ConsultarDll_pedido_producto`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Pedido);
    $query->execute();
    return $query->fetchAll();
  }

  //_* Funcion para eliminar una orden enviada, estas ordenes solo se eliminan cuando ya fueron atendidas o canceladas
  public function FN_Eliminar_Orden_Enviada($FK_ID_Cotizacion_Usuario)
  {

    $sql = "CALL `spConsultarPedido_Cotizacion`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $FK_ID_Cotizacion_Usuario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return "Cotizacion_Asociada";
    }
    else{
     $sql = "CALL `spEliminarDll_producto_cotizacion`(?);";
     $query = $this->db->prepare( $sql );
     $query->bindParam(1, $FK_ID_Cotizacion_Usuario);
     $query->execute();
     if ($query->rowCount() > 0) {
      $sql = "CALL `spEliminarCotizacion_usuario`(?);";
      $query = $this->db->prepare( $sql );
      $query->bindParam(1, $FK_ID_Cotizacion_Usuario);
      $query->execute();
      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}

//_* Funcion para eliminar una orden enviada, estas ordenes solo se eliminan cuando ya fueron atendidas o canceladas
public function FN_Eliminar_Pedido_Enviado($PK_ID_Pedido)
{
    //Elimino las notificaciones que existan registradas en la base de datos con el $FK_ID_Cotizacion_Usuario
  $sql = "SELECT * FROM tbl_buson_notificacion_usuario WHERE FK_ID_Pedido = $PK_ID_Pedido ";
  $query = $this->db->prepare( $sql );
  $query->execute();
  $PK_ID_Buson_Notificacion = 0;
  foreach ($query->fetchAll() as $key ) {
    $PK_ID_Buson_Notificacion = $key->PK_ID_Buson_Notificacion;
  }
  $sql = "CALL `spEliminarDll_buson_notificacion_usuario`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $PK_ID_Buson_Notificacion);
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spEliminarBuson_notificacion_usuario`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $PK_ID_Buson_Notificacion);
    $query->execute();

    if($query->rowCount() > 0)
    {

     $sql = "CALL `spEliminarDll_pedido_producto`(?);";
     $query = $this->db->prepare( $sql );
     $query->bindParam(1, $PK_ID_Pedido);
     $query->execute();

     if($query->rowCount() > 0)
     {
       $sql = "CALL `spEliminarPedido_usuario`(?);";
       $query = $this->db->prepare( $sql );
       $query->bindParam(1, $PK_ID_Pedido);
       $query->execute();
       if ($query->rowCount() > 0) {
        return true;
      } else {
        exit("Aqui1");
        return false;
      }
    }else
    {

    }

  }
  else
  {
    exit("Aqui12");
    return false;
  }
}



}
//_* Funcion para listar las notifcaciones de un usuario, solo es para el usuario tipo cliente
public function FN_Listar_Mensajes( $Objeto_Valor_Variables )
{
  $sql = "CALL `spListarBuson_mensajes_usuario`(?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();
}
//_* Funcion para listar las notifcaciones de un usuario, solo es para el usuario tipo cliente
public function FN_Listar_Notificaciones( $Objeto_Valor_Variables )
{
  $sql = "CALL `spConsultarDll_buson_notificacion_usuario`(?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();
}
//_* Funcion para eliminar una notificacion en especifico
public function FN_Eliminar_Notificacion( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarDll_buson_notificacion_usuario`(?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spEliminarBuson_notificacion_usuario`(?);";
    $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
        //_* EN ESTE CASO NO SE USO BINDPARAMTER, YA QUE ESTE METODO AL PARECER SOLO SIRVE PARA LINEAS ECHAS POR UNO MISMO, OSEA UNO POR UNO, PARA SOLUCIONARLO SE USO BINDVALUE, DESCRIPCION DE BINDVALUE : HTTP://PHP.NET/MANUAL/ES/PDOSTATEMENT.BINDVALUE.PHP
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
  // Funcion para cerrar sesion
public function FN_Cerrar_Sesion()
{
  if (!isset($_SESSION['Nombre_Usuario'])){
    return false;
  }else{
      //_* Destruimos la sesión
    Sesion::destroy();
      //_* Eliminamos la Sessión o el historial o cache de la sesión
    session_unset();
    return true;
  }
}
  //*****
  //_* Registro en la tabla Cuenta
public function FN_Registrar_TBL_Cuenta(
  $Nombre_Usuario, $Correo_Electronico, $Contrasenia, $Contrasenia_Encriptada, $Imagen_Usuario, $Fondo_Perfil_Usuario,$Disponibilidad, $Estado_Cuenta, $FK_ID_Rol)
{
    //================================GENERACION DE CONTRASEÑA ALEATORIA======================
  $alfabeto = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $contrasenia = array();
  $alfabetolength = strlen($alfabeto);
  $Contrasenia_Recuperacion = "";
  for($i=0; $i <= 7 ; $i++)
  {
    $n = rand(0, $alfabetolength -1);
    $Contrasenia_Recuperacion .= substr($alfabeto,$n,1) ;
  }
  $sql = "SELECT `fnRegistrarCliente`(?,?,?,?,?,?,?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$Nombre_Usuario);
  $query->bindParam(2,$Correo_Electronico);
  $query->bindParam(3,$Contrasenia);
  $query->bindParam(4,$Contrasenia_Recuperacion);
  $query->bindParam(5,$Contrasenia_Encriptada);
  $query->bindParam(6,$Imagen_Usuario);
  $query->bindParam(7,$Fondo_Perfil_Usuario);
  $query->bindParam(8,$Disponibilidad);
  $query->bindParam(9,$Estado_Cuenta);
  $query->bindParam(10,$FK_ID_Rol);
  $query->execute();
  if ($query->rowCount() > 0) {
    return $query->fetchColumn();
  }
}
  //_* Registro en la tabla Cliente
public function FN_Registrar_TBL_Cliente(
  $FK_ID_Cuenta,
  $Nombre,
  $Segundo_Nombre,
  $Apellido,
  $Segundo_Apellido,
  $Departamento,
  $Municipio,
  $Telefono_Celular,
  $Sexo,
  $Tipo_Cliente,
  $Posee_Empresa
  ) {
  $sql = "CALL `spRegistrarCliente`(?,?,?,?,?,?,?,?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $FK_ID_Cuenta);
  $query->bindParam(2, $Nombre);
  $query->bindParam(3, $Segundo_Nombre);
  $query->bindParam(4, $Apellido);
  $query->bindParam(5, $Segundo_Apellido);
  $query->bindParam(6, $Departamento);
  $query->bindParam(7, $Municipio);
  $query->bindParam(8, $Telefono_Celular);
  $query->bindParam(9, $Sexo);
  $query->bindParam(10, $Tipo_Cliente);
  $query->bindParam(11, $Posee_Empresa);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
  // Registro en la tabla Establecimiento
public function FN_Registrar_TBL_Establecimiento(
  $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento, $Direccion_Establecimiento, $Municipio_Establecimiento, $FK_ID_Usuario
  ) {
  $sql = "CALL `spRegistrarDatos_establecimientos`(?,?,?,?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $Nombre_Establecimiento);
  $query->bindParam(2, $Nombre_Encargado);
  $query->bindParam(3, $Nit);
  $query->bindParam(4, $Telefono_Establecimiento);
  $query->bindParam(5, $Direccion_Establecimiento);
  $query->bindParam(6, $Municipio_Establecimiento);
  $query->bindParam(7, $FK_ID_Usuario);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
  //_* Funcion para registrar dll rol cuenta
public function FN_Registrar_TBL_Dll_Rol_Cuenta( $FK_ID_Rol, $FK_ID_Usuario ) {
  $sql = "CALL `spRegistrarDll_rol_cuenta`(?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $FK_ID_Rol);
  $query->bindParam(2, $FK_ID_Usuario);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

  //_* Funcion para consultar el correo electronico
public function FN_Consultar_Correo( $Correo )
{
  $sql = "CALL `spConsultarCorreoElectronico`(?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$Correo);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
public function FN_Ver_Comentarios_Producto(
  $PK_ID_Producto
  ){
  $sql = "SET lc_time_names = 'es_ES'";
  $sql = "CALL `spJoin_Comentario_Cuenta`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Producto);
  $query->execute();
  return $query->fetchAll();
}
  //*****************Registrar Comentario
public function FN_Registrar_Nuevo_Comentario(
  $FK_ID_Usuario,
  $Descripcion,
  $PK_ID_Producto,
  $Valoracion_Producto
  )
{
  $sql = "CALL `spRegistrarComentario`(?,?,?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$FK_ID_Usuario);
  $query->bindParam(2,$Descripcion);
  $query->bindParam(3,$PK_ID_Producto);
  $query->bindParam(4,$Valoracion_Producto);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
  //*****************FN_Eliminar_Comentario
public function FN_Eliminar_Comentario(
  $PK_ID_Comentario
  )
{
    //Elimino todos los likes de tenga relacionados el comentario
  $sql = "CALL `spEliminarDll_Comentario_Cuenta_Likes`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Comentario);
  $query->execute();
  if ($query->rowCount() > 0) {
      //Procedo a eliminar el comentario luego de eliminar las posibles relaciones que tenga el comentario en la tabla de likes
    $sql = "CALL `spEliminarComentario`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1,$PK_ID_Comentario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  } else {
      //Vuelvo a verificar, ya que un comentario no siempre tendra un like, asi que paso a eliminar directo el comentario
    $sql = "CALL `spEliminarComentario`(?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1,$PK_ID_Comentario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
  //*****************FN_Modificar_Comentario
public function FN_Modificar_Comentario(
  $PK_ID_Comentario,
  $Descripcion
  )
{
  $sql = "CALL `spModificarComentario`(?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Comentario);
  $query->bindParam(2,$Descripcion);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
public function FN_VerificarComentario_Cuenta(
  $PK_ID_Comentario,
  $FK_ID_Usuario
  )
{
  $sql = "CALL `spConsultar_Comentario_Cuenta`(?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Comentario);
  $query->bindParam(2,$FK_ID_Usuario);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
public function FN_Valorar_Comentario_Like(
  $PK_ID_Comentario,
  $PK_ID_Usuario
  )
{
  $sql = "CALL `spRegistrarDll_Comentario_Cuenta`(?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Usuario);
  $query->bindParam(2,$PK_ID_Comentario);
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spModificar_Comentario_Like`(?);";
    $query =$this->db->prepare( $sql );
    $query->bindParam(1,$PK_ID_Comentario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  } else {
    return false;
  }
}
public function FN_Valorar_Comentario_DisLike(
  $PK_ID_Comentario,
  $PK_ID_Usuario
  )
{
  $sql = "CALL `spEliminarDll_Comentario_Cuenta`(?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Comentario);
  $query->bindParam(2,$PK_ID_Usuario);
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spModificar_Comentario_DisLike`(?);";
    $query =$this->db->prepare( $sql );
    $query->bindParam(1,$PK_ID_Comentario);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  } else {
    return false;
  }
}
 public function FN_Recuperar_contrasenia($Correo)
  {

    $sql = "CALL `spConsultarCorreoElectronico`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Correo);


    $query->execute();



    if ($query->rowCount() > 0) {
//================================GENERACION DE CONTRASEÑA ALEATORIA======================

     $alfabeto = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
     $contrasenia = array();
     $alfabetolength = strlen($alfabeto);
     $pass = "";

     for($i=0; $i <= 7 ; $i++)
     {
      $n = rand(0, $alfabetolength -1);
      $pass .= substr($alfabeto,$n,1) ;
    }

//Ejecuto el procedimiento spActualizarContrasenia el cual recibe  el correo ingresado por el usuario
// y la contraseña generada.
    $sql = "CALL `spActualizarContrasenia_Recuperacion`(?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Correo);
    $query->bindParam(2,$pass);

    $query->execute();


    if ($query->rowCount() > 0) {


//================================GENERACION DEL MENSAJE QUE ESE ENVIA POR PHP MAILERA======================

    
      require(APP. "controller/Modulo/PHPmailer/class.phpmailer.php");
      $mail = new PHPmailer();
      $mail->From = "allopaplicacion@gmail.com";
      $mail->FromName = "Orders Presale (Recuperacion contrania)";
      $mail->AddAddress($Correo);

      $mail->WordWrap = 50;
      $mail->IsHTML(true);
      $mail->Subject = "Recuperar contrasenia";
      $mail->Body = " Nueva contraseña: $pass \n<br />";
     
      $mail->IsSMTP();
      $mail->Host = "ssl://smtp.gmail.com:465"; 
      $mail->SMTPAuth = true;
      $mail->Username = "allopaplicacion@gmail.com";
      $mail->Password = "allop1998";
      $mail->Send();
//================================GENERACION DEL MENSAJE QUE ESE ENVIA POR PHP MAILERA======================


            $pass = "";
            return true;


          }
          else
          {
            $pass = "";
            return false;

          }






        }
  //*****

      }

public function FN_Actualizar_Contrasenia($Anterior_Contrasenia,$Nueva_Contrasenia,$PK_ID_Usuario)
{
    //====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================
  $digito = 7;
  $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  $salt = sprintf('$2a$%02d$', $digito);
  for ($i = 0; $i < 22; $i++) {
    $salt .= $set_salt[mt_rand(0, 22)];
  }
  $Contrasenia_Ingresada = $Nueva_Contrasenia;
  $Contrasenia_Encriptada = crypt($Contrasenia_Ingresada, $salt);
    //====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================
    //================================GENERACION DE CONTRASEÑA ALEATORIA======================
  $alfabeto = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $contrasenia = array();
  $alfabetolength = strlen($alfabeto);
  $pass = "";
  for($i=0; $i <= 15 ; $i++)
  {
    $n = rand(0, $alfabetolength -1);
    $pass .= substr($alfabeto,$n,1) ;
  }
    //=============================================
  $sql = "CALL `spActualizarContrasenia_Actual`(?,?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$Nueva_Contrasenia);
  $query->bindParam(2,$Anterior_Contrasenia);
  $query->bindParam(3,$Contrasenia_Encriptada);
  $query->bindParam(4,$PK_ID_Usuario);
  $query->bindParam(5,$pass);
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  }
  else
  {
    return false;
  }
}
  //*****
  //_* Funcion para registrar una nueva lista de ordenes
public function FN_Registrar_Lista_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spRegistrarListas_ordenes_usuario`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

  //_* Funcion para listar las listas de un usuario
public function FN_Listas_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spConsultarListas_ordenes_usuario`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();
}
  //_* Funcion para listar los detalles de las  listas de un usuario
public function FN_Listas_Detalle_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spConsultarDll_listas_ordenes_usuario`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();
}
public function FN_Registro_Asociacion_Producto_Lista( $PK_ID_Lista_Usuario, $Datos_Producto )
{
  $sql = "CALL `spConsultarDll_listas_ordenes_usuario`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$PK_ID_Lista_Usuario);
  $query->execute();
  if ($query->rowCount() > 0) {
    exit("La_Lista_Ya_Posee_Productos");
  }
  else
  {

    $Sub_Total = 0;
    $Cantidad_Productos = 0;
    $Valor_Unitario = 0;
    $PK_ID_Producto = 0;
    $Cant_Unid_Max = 0;
    $Cant_Unid_Min = 0;
    $Nombre_Producto = "";
    foreach ($Datos_Producto as $key  ) {


      $Sub_Total = $key->NUM_Costo;
      $Cantidad_Productos = $key->NUM_Cantidad;
      $PK_ID_Producto = $key->PK_ID_Producto;
      $Valor_Unitario = $key->Valor_Unitario;
      $Ruta_Imagen_Producto = $key->Ruta_Imagen_Producto;
      $Cant_Unid_Max = $key->Cant_Unid_Max;
      $Cant_Unid_Min = $key->Cant_Unid_Min;
      $Nombre_Producto = $key->Nombre_Producto;


      $sql = "CALL `spRegistrarDll_listas_ordenes_usuario`(?,?,?,?,?,?,?,?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1,$PK_ID_Producto);
      $query->bindParam(2,$PK_ID_Lista_Usuario);
      $query->bindParam(3,$Cantidad_Productos);
      $query->bindParam(4,$Sub_Total);
      $query->bindParam(5,$Valor_Unitario);
      $query->bindParam(6,$Ruta_Imagen_Producto);
      $query->bindParam(7,$Cant_Unid_Max);
      $query->bindParam(8,$Cant_Unid_Min);
      $query->bindParam(9,$Nombre_Producto);

      $query->execute();
    }


    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
}

  //_* Funcion para actualizar los detalles de las  listas de un usuario
public function FN_Modificar_Dtll_Lista_Usuario( $Datos_Producto )
{

  $Sub_Total = 0;
  $Cantidad_Productos = 0;
  $PK_ID_DLL_Lista_Usuario = 0;
    //_* Esta variable se usa para saber si se actualizo aun que sea un producto, si se actualizo voy a debolver tru para mostrar mensaje que indique que se actualizaron los datos de uno o mas productos de la lista
  $Datos_Actualizados = false;
  foreach ($Datos_Producto as $key  ) {
    $Sub_Total = $key->Sub_Total;
    $Cantidad_Productos = $key->Cantidad_Productos;
    $PK_ID_DLL_Lista_Usuario = $key->PK_ID_DLL_Lista_Usuario;

    $sql = "CALL `spModificarDll_listas_ordenes_usuario`(?,?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$PK_ID_DLL_Lista_Usuario);
    $query->bindParam(2,$Cantidad_Productos);
    $query->bindParam(3,$Sub_Total);
    $query->execute();

    if ($query->rowCount() > 0) {
      $Datos_Actualizados = true;
    }
  }
  if ($Datos_Actualizados) {
    return true;
  }
  else
  {
    return false;
  }
}

  //_* Funcion para eliminar un producto de detalles de las  listas de un usuario
public function FN_Eliminar_Producto_Dtll_Lista( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarDll_listas_Producto`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  }
  else
  {
    return false;
  }
}
  //_* Funcion para eliminar un producto de detalles de las  listas de un usuario
public function FN_Eliminar_Todos_Producto_Dtll_Lista( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarDll_listas_ordenes_usuario_especifica`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  }
  else
  {
    return false;
  }
}
  //_* Funcion para eliminar todas las listas del usuario
public function FN_Eliminar_Todas_Listas_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarDll_listas_ordenes_usuario`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spEliminarListas_ordenes_usuario`(?);";
    $query = $this->db->prepare( $sql );
      //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
      //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
  else
  {
    $sql = "CALL `spEliminarListas_ordenes_usuario`(?);";
    $query = $this->db->prepare( $sql );
      //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
      //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
}

  //_* Funcion para eliminar una lista en especifica
public function FN_Eliminar_Listas_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarDll_listas_ordenes_usuario`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    if($Indice == 1)
    {
      $query->bindValue( $Indice, $Valor );
    }
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spEliminarLista_orden_usuario`(?,?);";
    $query = $this->db->prepare( $sql );
      //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
      //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
  else
  {
    $sql = "CALL `spEliminarLista_orden_usuario`(?,?);";
    $query = $this->db->prepare( $sql );
      //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
      //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
}

  //_* Funcion para actualizar el nombre de una lista
public function FN_Actualizar_Nombre_Lista( $Objeto_Valor_Variables )
{
  $sql = "CALL `spActualziar_Nombre_Lista`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  }
  else
  {
    return false;
  }
}

// Funcion para enviar un mensaje por parte del administrador
public function FN_Envio_Mensaje( $Asunto, $Mensaje ,$FK_ID_Usuario_Destinatario ,$FK_ID_Usuario_Remitente )
{
 $sql = "CALL `spRegistrarBuson_mensajes_usuario`(?,?,?,?);";
 $query = $this->db->prepare($sql);
 $query->bindParam(1, $Asunto);
 $query->bindParam(2, $Mensaje);
 $query->bindParam(3, $FK_ID_Usuario_Destinatario);
 $query->bindParam(4, $FK_ID_Usuario_Remitente);
 $query->execute();
 if ($query->rowCount() > 0) {
  return true;
}else {
  return false;
}
}

//_* Funcion para actualizar el estado de un mensaje
public function FN_Modificar_Estado_Buson_Mensajes( $PK_ID_Buson_Mensaje )
{
  $sql = "CALL `spModificar_EstadoBuson_mensajes_usuario`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $PK_ID_Buson_Mensaje);

  $query->execute();
  if ($query->rowCount() > 0) {

    return true;
  }
  else
  {
    return false;
  }
}

public function FN_Modificar_Estado_Mensaje_Seleccion_Multiple_Eliminacion( $PK_ID_Buson_Mensaje )
{
  $sql = "CALL `spEliminarBuson_mensajes_usuario`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $PK_ID_Buson_Mensaje);

  $query->execute();
  if ($query->rowCount() > 0) {

    return true;
  }
  else
  {
    return false;
  }
}

public function FN_Restaurar_Mensajes( $PK_ID_Buson_Mensaje )
{
  $sql = "CALL `spRestaurar_Mensaje`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $PK_ID_Buson_Mensaje);

  $query->execute();
  if ($query->rowCount() > 0) {

    return true;
  }
  else
  {
    return false;
  }
}



//_*Chat
 //_* Funcion para listar la converzacion que un usuario posea con otro 
public function FN_Listar_Comentarios_Chat( $Objeto_Valor_Variables )
{
  $sql = "CALL `spListarConversacion`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();;
  
}
 //_* Funcion para listar las sesion de converzaciones que se hallan creado con el usuario solicitante
public function FN_Listar_Sesiones_Chat( $Objeto_Valor_Variables )
{
  $sql = "CALL `spListarDll_chat_Buson_Chats_Usuario`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();;
  
}
//_* Funcion para enviar un comentario de chat
public function FN_Enviar_Comentario( $Objeto_Valor_Variables )
{

  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  $FK_ID_Usuario_Destinatario = 0;
  $FK_ID_Usuario_Remitente = 0;
  $Mensaje = "";
  $PK_ID_Dll_Chat = 0;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    if($Indice == 1)
    {
      $FK_ID_Usuario_Destinatario = $Valor;
    }
    if($Indice == 2)
    { 
      $FK_ID_Usuario_Remitente= $Valor;
    }
    if($Indice == 3)
    { 
      $Mensaje= $Valor;
    }
    $Indice ++;
  }


//_* El registro en la tabla dtll_chat sirve para crear la sesion de chat, alli guardamos el dia en que se inicio la converzacion y quienes la inciaron, para que este registro no se este repitiendo, antes de registrar en la tabla dll, relizo una consulta para verificar si ya hay una sesion creada entre los dos usuarios, si no se encuentra se pasa a crear la sesion e insertar el mensaje, esta sesion no es de gran importancia para el chat pero si sirve como guia para tener un registro

  $sql = "CALL `spConsultar_Existencia_Dll_chat`(?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $FK_ID_Usuario_Destinatario);
  $query->bindParam(2, $FK_ID_Usuario_Remitente);
  $query->execute();
  if ($query->rowCount() > 0) {
  //_*Si se pasa por este proceso es por que se encontro una sesion entre los dos usuarios , asi que paso a registrar el mensaje, tomando el PK_ID_Dll_Chat que tiene el registro de la sesion ya creada
    foreach ($query->fetchAll() as $key ) {
     $PK_ID_Dll_Chat = $key->PK_ID_Dll_Chat;
   }
   $sql = "CALL `spRegistrarChat`(?,?,?,?);";
   $query = $this->db->prepare( $sql );
   $query->bindParam(1, $PK_ID_Dll_Chat);
   $query->bindParam(2, $FK_ID_Usuario_Destinatario);
   $query->bindParam(3, $FK_ID_Usuario_Remitente);
   $query->bindParam(4, $Mensaje);

   $query->execute();
   if ($query->rowCount() > 0) {
    return true;
  }
  else
  {
    return false;
  }
//_*
}
else
{
  //_*Si no se encontro  una sesion ya creda entree los dos usuarios paso a crearla y a registrar el mensaje
  $sql = "SELECT `fnRegistrar_Mensaje_chat`(?,?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $FK_ID_Usuario_Destinatario);
  $query->bindParam(2, $FK_ID_Usuario_Remitente);
  $query->execute();
  if ($query->rowCount() > 0) {
    //_* Capturo el id que obtubo el registro de la sesion
    $Respuesta_Registro= $query->fetchColumn();
    $sql = "CALL `spRegistrarChat`(?,?,?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam(1, $Respuesta_Registro);
    $query->bindParam(2, $FK_ID_Usuario_Destinatario);
    $query->bindParam(3, $FK_ID_Usuario_Remitente);
    $query->bindParam(4, $Mensaje);

    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
  else
  {
    return false;
  }
}

//_*
}
public function FN_Modificar_Estado_Chat( $Objeto_Valor_Variables )
{
  $sql = "CALL `spModificarDll_chat_Actualizar_Estado_Comentario`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
      //_* EN ESTE CASO NO SE USO BINDPARAMTER, YA QUE ESTE METODO AL PARECER SOLO SIRVE PARA LINEAS ECHAS POR UNO MISMO, OSEA UNO POR UNO, PARA SOLUCIONARLO SE USO BINDVALUE, DESCRIPCION DE BINDVALUE : HTTP://PHP.NET/MANUAL/ES/PDOSTATEMENT.BINDVALUE.PHP
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();

  if ($query->rowCount() > 0) {
    return true;
  }else {
    return false;
  }
}

/////////////
public function FN_Consultar_Cuentas_Por_Verificar( $Objeto_Valor_Variables )
{
  $sql = "CALL `spListar_Cuentas_Por_Verificar`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
      //_* EN ESTE CASO NO SE USO BINDPARAMTER, YA QUE ESTE METODO AL PARECER SOLO SIRVE PARA LINEAS ECHAS POR UNO MISMO, OSEA UNO POR UNO, PARA SOLUCIONARLO SE USO BINDVALUE, DESCRIPCION DE BINDVALUE : HTTP://PHP.NET/MANUAL/ES/PDOSTATEMENT.BINDVALUE.PHP
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
    $query->execute();
  return $query->fetchAll();
}


// fUNCION PARA VERIFICAR EL ESTADO DE VERIFICACION DE UNA CUENTA

public function FN_Verificacion_Cuenta( $PK_ID_Usuario )
{
  $sql = "CALL `spConsultar_Estado_Verificacion_Cuenta`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $PK_ID_Usuario);

  $query->execute();
  if ($query->rowCount() > 0) {

    return true;
  }
  else
  {
    return false;
  }
}
public function FN_Listar_Comentarios_Sin_Ver( $Objeto_Valor_Variables )
{
  $sql = "CALL `spListar_Mensajes_Sin_Ver`(?);";
  $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
      //_* EN ESTE CASO NO SE USO BINDPARAMTER, YA QUE ESTE METODO AL PARECER SOLO SIRVE PARA LINEAS ECHAS POR UNO MISMO, OSEA UNO POR UNO, PARA SOLUCIONARLO SE USO BINDVALUE, DESCRIPCION DE BINDVALUE : HTTP://PHP.NET/MANUAL/ES/PDOSTATEMENT.BINDVALUE.PHP
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
    $query->execute();
  return $query->fetchAll();
}

//_*////////////////////////7
}

?>
