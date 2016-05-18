<?php
class M_Cotizacion{
  function __construct( $db ) {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit( 'Error al intentar conectar con la Base de Datos en M_Cotizacion:' + $e );
    }
  }

  //_* Listar todos los usuarios
  public function FN_Listar_Usuarios() {
    $sql = "CALL `spListarCuentas_Usuario`();";
    $query = $this->db->prepare( $sql );
    $query->execute();
    return $query->fetchAll();
  }

  //_* Listar ordenes
  public function FN_Listar_Ordenes_Usuario( $Objeto_Valor_Variables ) {
    $sql = "CALL `spConsultarCotizacion_usuario`(?);";
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

  //_* Listar Actualizar estado
  public function FN_Actualizar_Estado_Orden( $Estado_Cotizacion,$PK_ID_Cotizacion_Usuario,$FK_ID_Usuario ) {

    //Este primer paso sirve para actualizaar la info de la cotizacion
    $sql = "CALL `spModificarCotizacion_usuario_Estado`(?,?);";
    $query = $this->db->prepare( $sql );
    $query->bindParam( 1, $PK_ID_Cotizacion_Usuario );
    $query->bindParam( 2, $Estado_Cotizacion );
    $query->execute();
    //Si se ha actualizado el estado de la cotizacion
    if ( $query->rowCount() > 0 ) {
      //Verifico el estado de la cotizacion, si el estado es atendido paso a verificar si ya se encuentra registrado el pedido, si no se encuentra registrado lo registro en la tabla tbl_pedido_usuario

      $sql = "CALL `spVerificarPedido`(?);";
      $query = $this->db->prepare( $sql );
      $query->bindParam( 1,$PK_ID_Cotizacion_Usuario );
      $query->execute();
      if ($query->rowCount() > 0) {
        // exit("1");
      }
      //Si no, se duplica y genera el registro del pedido
      else{
        $sql = "SELECT `fnDuplicarCotizacion`(?);";
        $query = $this->db->prepare( $sql );
        $query->bindParam( 1,$PK_ID_Cotizacion_Usuario );
        $query->execute();
        //Luego de registrarse el pedido, obtengo su id, para luego generar el duplicado de datos de la cotizacion
        $Codigo_Pedido = 0;
        if($query->rowCount() > 0)
        {

          $Codigo_Pedido = $query->fetchColumn();


          // Luego de haber registrado el duplicado, paso a consultar los datos de la cotizacion, esto se hace para sacar el codigo del producto y luego duplicar la informacion de los productos que tiene asignado el pedido, esto se hace ya que el precio de un pedido una vez registrado no puede cambiar.
          $sql = "CALL `spJoin_ConsultarDll_producto_cotizacion`(?);";
          $query = $this->db->prepare( $sql );
          $query->bindParam(1, $PK_ID_Cotizacion_Usuario);
          $query->execute();
          $Datos_Cotizacion = $query->fetchAll();
          $PK_ID_Producto = 0;
          foreach ($Datos_Cotizacion as $key ) {
            $PK_ID_Producto = $key->PK_ID_Producto;
            // var_dump($PK_ID_Producto);
            // var_dump($PK_ID_Cotizacion_Usuario);
            // var_dump($Codigo_Pedido);
            // // Ejecuto el procedimiento que se encarga de tomar los datos y duplicarlos en la tabla tbl_dll_producto_cotizacion_fija
            $sql = "CALL `spDuplicarCotizacion_Fija_Pedido`(?,?,?);";
            $query = $this->db->prepare( $sql );
            $query->bindParam(1, $PK_ID_Producto);
            $query->bindParam(2, $PK_ID_Cotizacion_Usuario);
            $query->bindParam(3, $Codigo_Pedido);
            $query->execute();
            if($query->rowCount() > 0)
            {
            }
            else
            {
              exit("Error");
            }

          }
        }
        else
        {
          return false;
        }
        // exit("2");
      }
    // Estoy verificando si el estado de la cotizacion es Atendido, si es atendido en vez de actualizar el estadodel pedido a atendido, lo cambio a en proceso, ya que despues se actualiza el estado del pedido pero solo en gestion de pedido
      if( $Estado_Cotizacion == "Atendido" ){
        $Estado_Cotizacion = "En proceso";
      }

      /////////////////////////////
      // Ya actualice la notificacion asi que ahora actualizo el pedido
      $sql = "CALL `spActualizar_Duplicado_Cotizacion`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $PK_ID_Cotizacion_Usuario);
      $query->bindParam(2, $Estado_Cotizacion);
      $query->execute();
      // exit($Estado_Cotizacion);

      if ($query->rowCount() > 0) {

        $PK_ID_Pedido_Obtenido = 0;
        $Estado_Notificacion = '';

        $sql = "SELECT * FROM tbl_pedido_usuario WHERE FK_ID_Cotizacion_Usuario = $PK_ID_Cotizacion_Usuario ";
        $query = $this->db->prepare( $sql );
        $query->execute();
        //Guardo el $PK_ID_Pedido_Obtenido PARA LUEGO PODER ELIMINAR
        foreach ($query->fetchAll() as $key ) {
          $PK_ID_Pedido_Obtenido = $key->PK_ID_Pedido;
          $Estado_Notificacion = $key->Estado_pedido;
        }

        $sql = "SELECT * FROM tbl_buson_notificacion_usuario WHERE FK_ID_Pedido = $PK_ID_Pedido_Obtenido ";
        $query = $this->db->prepare( $sql );
        $query->execute();

        $PK_ID_Buson_Notificacion = 0;
        //Guardo el $PK_ID_Buson_Notificacion PARA LUEGO PODER ELIMINAR
        foreach ($query->fetchAll() as $key ) {
          $PK_ID_Buson_Notificacion = $key->PK_ID_Buson_Notificacion;
        }
        // var_dump($query->fetchAll());
        // var_dump($PK_ID_Pedido_Obtenido);
        // var_dump($PK_ID_Cotizacion_Usuario);
        // var_dump($Estado_Notificacion);
        // exit();

        // Paso a crear la notificacion, primero verifico si el estado sigue igual, si no sigue igual paso a eliminar y crear nuevamente la notificaciones

        //////////////////////////////

        if($Estado_Notificacion == $Estado_Cotizacion)
        {

          $sql = "CALL `spEliminarDll_buson_notificacion_usuario`(?);";
          $query = $this->db->prepare( $sql );
          $query->bindParam(1, $PK_ID_Buson_Notificacion);
          $query->execute();
          if ($query->rowCount() > 0) {
            $sql = "CALL `spEliminarBuson_notificacion_usuario`(?);";
            $query = $this->db->prepare( $sql );
            $query->bindParam(1, $PK_ID_Buson_Notificacion);
            $query->execute();
          }
          //Si no se pudo eliminar la notificacion es por que no existe una notificacion, asi que paso a crear la notificacion para el usuario
          //
          $sql = "SELECT `fnRegistrar_Notificacion`(?);";
          $query = $this->db->prepare( $sql );
          $query->bindParam(1, $PK_ID_Pedido_Obtenido);
          $query->execute();
          if ($query->rowCount() > 0) {
            $Respuesta_Registro_tbl_Buson_Notificacion= $query->fetchColumn();
            $sql = "CALL `spRegistrarDll_buson_notificacion_usuario`(?,?);";
            $query = $this->db->prepare( $sql );
            $query->bindParam(1, $Respuesta_Registro_tbl_Buson_Notificacion);
            $query->bindParam(2, $FK_ID_Usuario);
            $query->execute();
            if ($query->rowCount() > 0) {
              //Si se a creado de nuevo la notificacion paso a atualizar nuevamente la info de  notificacion
              $sql = "CALL `spModificarBuson_notificacion_usuario`(?,?,?);";
              $query = $this->db->prepare( $sql );
              $query->bindParam(1, $FK_ID_Usuario);
              $query->bindParam(2, $PK_ID_Pedido_Obtenido);
              $query->bindParam(3, $Estado_Notificacion);
              $query->execute();
              if ($query->rowCount() > 0) {
                return true;
              }else {
                  //A LA HORA DE ACTUALIZAR UNA NOTIFICACION, ESTA POR DEFUAL SE REGISTRA EN LA BD CON UN ESTADO DE EN PROCESO, ASI QUE VERIFICO SI EL ESTADO ES EN PROCESO, Y ASI RETORNO TRUE, CON ESTO EL PROCESO ESTA CORRECTO.
                if($Estado_Notificacion == "En proceso")
                {
                  return true;
                }
                else {
                  return false;
                }               

              }
              //
            }else
            {
              exit("Marca_2");

              return false;
            }
          }else{
            exit("Marca_1");

            return false;
          }
        }

      }
    }

    //Si el anterior paso no se ejecuto correctamente, es porque el estado de la cotizacion ya se encuentra actualizado
    else {
      // Estoy verificando si el estado de la cotizacion es Atendido, si es atendido en vez de actualizar el estadodel pedido a atendido, lo cambio a en proceso, ya que despues se actualiza el estado del pedido pero solo en gestion de pedido
      if( $Estado_Cotizacion == "Atendido" ){
        $Estado_Cotizacion = "En proceso";
      }
      /////////////////////////////
      // Ya actualice la notificacion asi que ahora actualizo el pedido
      $sql = "CALL `spActualizar_Duplicado_Cotizacion`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $PK_ID_Cotizacion_Usuario);
      $query->bindParam(2, $Estado_Cotizacion);
      $query->execute();
      // exit("3");

      if ($query->rowCount() > 0) {
        //---- CONSULTO EN LA TABLA BUSON NOTIFICACION CON EL PK_ID_Cotizacion_Usuario PARA BUSCAR UNA NOTIFICACION QUE POSEA RELACIONADA LA COTIZACION INDICADA

        $PK_ID_Pedido_Obtenido = 0;
        $Estado_Notificacion = '';

        $sql = "SELECT * FROM tbl_pedido_usuario WHERE FK_ID_Cotizacion_Usuario = $PK_ID_Cotizacion_Usuario ";
        $query = $this->db->prepare( $sql );
        $query->execute();
        //Guardo el $PK_ID_Pedido_Obtenido PARA LUEGO PODER ELIMINAR
        foreach ($query->fetchAll() as $key ) {
          $PK_ID_Pedido_Obtenido = $key->PK_ID_Pedido;
          $Estado_Notificacion = $key->Estado_pedido;
        }

        $sql = "SELECT * FROM tbl_buson_notificacion_usuario WHERE FK_ID_Pedido = $PK_ID_Pedido_Obtenido ";
        $query = $this->db->prepare( $sql );
        $query->execute();

        $PK_ID_Buson_Notificacion = 0;
        //Guardo el $PK_ID_Pedido_Obtenido PARA LUEGO PODER ELIMINAR
        foreach ($query->fetchAll() as $key ) {
          $PK_ID_Buson_Notificacion = $key->PK_ID_Buson_Notificacion;
        }


        // Paso a crear la notificacion, primero verifico si el estado sigue igual, si no sigue igual paso a eliminar y crear nuevamente la notificaciones

        //////////////////////////////

        if($Estado_Notificacion == $Estado_Cotizacion)
        {
          $sql = "CALL `spEliminarDll_buson_notificacion_usuario`(?);";
          $query = $this->db->prepare( $sql );
          $query->bindParam(1, $PK_ID_Buson_Notificacion);
          $query->execute();
          if ($query->rowCount() > 0) {
            $sql = "CALL `spEliminarBuson_notificacion_usuario`(?);";
            $query = $this->db->prepare( $sql );
            $query->bindParam(1, $PK_ID_Buson_Notificacion);
            $query->execute();
          }
          //Si no se pudo actualizar la notificacion es por que no existe una notificacion, asi que paso a crear la notificacion para el usuario
          //
          $sql = "SELECT `fnRegistrar_Notificacion`(?);";
          $query = $this->db->prepare( $sql );
          $query->bindParam(1, $PK_ID_Pedido_Obtenido);
          $query->execute();
          if ($query->rowCount() > 0) {
            $Respuesta_Registro_tbl_Buson_Notificacion= $query->fetchColumn();


            $sql = "CALL `spRegistrarDll_buson_notificacion_usuario`(?,?);";
            $query = $this->db->prepare( $sql );
            $query->bindParam(1, $Respuesta_Registro_tbl_Buson_Notificacion);
            $query->bindParam(2, $FK_ID_Usuario);
            $query->execute();
            if ($query->rowCount() > 0) {
              //Si se a creado de nuevo la notificacion paso a atualizar nuevamente la info de  notificacion, para eso tansolo repito el primer proceso, con esto obtenemos, en el primer paso la actualizacion de los datos de la cotizacion y la notificacion, en el segundo paso se crea otra vez la notificacion ya que en el primer paso no se encontro ninguna notificacion a la cual cambiar su estado
              //
              $sql = "CALL `spModificarBuson_notificacion_usuario`(?,?,?);";
              $query = $this->db->prepare( $sql );
              $query->bindParam(1, $FK_ID_Usuario);
              $query->bindParam(2, $PK_ID_Pedido_Obtenido);
              $query->bindParam(3, $Estado_Cotizacion);
              $query->execute();
              if ($query->rowCount() > 0) {
                return true;
              }else {
                exit("2");
                return false;

              }
              //
            }else
            {
             //A LA HORA DE ACTUALIZAR UNA NOTIFICACION, ESTA POR DEFUAL SE REGISTRA EN LA BD CON UN ESTADO DE EN PROCESO, ASI QUE VERIFICO SI EL ESTADO ES EN PROCESO, Y ASI RETORNO TRUE, CON ESTO EL PROCESO ESTA CORRECTO.
              if($Estado_Notificacion == "En proceso")
              {
                return true;
              }
              else {
                return false;
              }  

            }
          }else{
            exit("Marca 4");

            return false;

          }
        }
      }
    }
  }
  //_* Listar detalle orden
  public function FN_Listar_Detalle_Ordene_Usuario( $Objeto_Valor_Variables ) {
    $sql = "CALL `spJoin_ConsultarDll_producto_cotizacion`(?);";
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
  //************
}


?>
