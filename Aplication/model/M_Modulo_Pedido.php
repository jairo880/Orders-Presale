<?php

class M_Modulo_Pedido{

	 /**
  * @param $db  objeto de la conección a la DB que recibe cuando se ejecuta la instancia.
  */
  function __construct($db)
  {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Error al intentar conectar con la Base de Datos en M_Modificar_Producto:'+$e);
    }
  }


  function FN_Listar_Pedidos_Usuuario( $Objeto_Valor_Variables ) {
    $sql = "CALL `spListarPedido_usuario_Espesifico`(?);";
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
  /**
  * Función para Listar los productos que están registrados en el Sistema.
  * @param
  */
  function FN_Listar_Pedidos(){
    $sql= "CALL `spListarPedido_usuario`";
    $query=$this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  function FN_Modificar_Estado_Pedido( $Objeto_Valor_Variables ){

    $sql = "CALL `spModificarEstado_Pedido_usuario`(?,?);";
    $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
    $PK_Pedido = 0;
    $Estado_pedido = "";
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      //_* EN ESTE CASO NO SE USO BINDPARAMTER, YA QUE ESTE METODO AL PARECER SOLO SIRVE PARA LINEAS ECHAS POR UNO MISMO, OSEA UNO POR UNO, PARA SOLUCIONARLO SE USO BINDVALUE, DESCRIPCION DE BINDVALUE : HTTP://PHP.NET/MANUAL/ES/PDOSTATEMENT.BINDVALUE.PHP
     if($Indice <= 2)
     {
      $query->bindValue( $Indice, $Valor );

    }
    if($Indice == 1)
    {
      $PK_Pedido = $Valor;
    }
    if($Indice == 2)
    {
      $Estado_pedido = $Valor;
    }
    $Indice ++;


  }
  $query->execute();
  if ($query->rowCount() > 0) {



   $sql = "SELECT * FROM tbl_buson_notificacion_usuario WHERE FK_ID_Pedido = $PK_Pedido ";
   $query = $this->db->prepare( $sql );
   $query->execute();

   $PK_ID_Buson_Notificacion = 0;
        //Guardo el $PK_ID_Pedido_Obtenido PARA LUEGO PODER ELIMINAR
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
  }
          //Si no se pudo actualizar la notificacion es por que no existe una notificacion, asi que paso a crear la notificacion para el usuario
          //
  $sql = "SELECT `fnRegistrar_Notificacion`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1, $PK_Pedido);
  $query->execute();
  if ($query->rowCount() > 0) {
    $Respuesta_Registro_tbl_Buson_Notificacion= $query->fetchColumn();


    $FK_ID_Usuario = 0;
    $Indice = 1;
    foreach ( $Objeto_Valor_Variables as $Valor ) {
     if($Indice == 3)
     {
      $FK_ID_Usuario = $Valor;
    }
    $Indice ++;

  }
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
    $query->bindParam(2, $PK_Pedido);
    $query->bindParam(3, $Estado_pedido);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    }else {
      // exit("2");
      return false;

    }
  }else {
    return false;
  }
}
}
}
     //_* Listar detalle orden
function FN_Listar_Detalle_Orden_Usuario( $Objeto_Valor_Variables ) {
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


    //_* Listar detalle orden
function FN_Listar_Detalle_Pedido_Usuario( $Objeto_Valor_Variables ) {
  $sql = "CALL `spJoin_ConsultarDll_pedido_producto`(?);";
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


public function FN_Lista_Rutas(){
  $sql= "CALL `spListarRuta`();";
  $query=$this->db->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}
public function FN_Registrar_Dll_Ruta_Pedido( $Objeto_Valor_Variables )
{
  $sql = "CALL `spConsultarDll_ruta_pedido` (?) ";
  $query = $this->db->prepare( $sql );
     // Variable para el identificador del parametro
  $Indice = 1;
      //Extraigo los valores que posee la variable mandada desde el controlador
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    if($Indice == 1)
    {
      $query->bindValue( $Indice, $Valor );
    }
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return false;

  }
  else
  {
    $sql= "CALL `spRegistrarDll_ruta_pedido` (?,?)";
    $query = $this->db->prepare( $sql );
       // Variable para el identificador del parametro
    $Indice = 1;
      //Extraigo los valores que posee la variable mandada desde el controlador
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query -> execute();
    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  }
}

  //************
}

?>
