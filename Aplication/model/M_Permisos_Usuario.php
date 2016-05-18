<?php
class M_Permisos_Usuario extends Controller
{
  function __construct( $db)
  {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit( 'Error al intentar conectar con la Base de Datos en M_Permisos_Usuario:'+$e );
    }
  }
  public function FN_Listar_Modulo_Permisos_Usuario( $Objeto_Valor_Variables )
  {
    $sql = "CALL `spListar_Vistas_Administrador`(?);";
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
  public function FN_Listar_Roles_Usuarios()
  {
    $sql = "CALL `spListarRol_usuario`();";
    $query = $this->db->prepare( $sql );
    $query->execute();
    return $query->fetchAll();
  }
  public function FN_Registrar_Permiso_Usuario( $Objeto_Valor_Variables )
  {
    $sql = "CALL `spConsultar_Permisos_Vista`(?,?)";
    $query= $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
    //_* Ya que el Indice que tenemos arriba no funciona como indice para el bindvalue, creamos otr nuevo indice con el que si podremos usar el bindvalue
    $Indice_Principal = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
      if($Indice > 1)
      {

        $query->bindValue( $Indice_Principal, $Valor );
        $Indice_Principal ++;
      }
      $Indice ++;
    }

    // $query->bindParam(1, $Url_Vista);
    // $query->bindParam(2, $FK_ID_Rol);
    
    $query->execute();
    if ($query->rowCount() > 0) {
      return false;
    } else {
      $sql = "SELECT `fnRegistrar_Vista_Usuario`(?,?);";
      $query = $this->db->prepare( $sql );
      //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
      $Indice = 1;
      //_* Ya que el Indice que tenemos arriba no funciona como indice para el bindvalue, creamos otr nuevo indice con el que si podremos usar el bindvalue
      $Indice_Principal = 1;
      //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
      foreach ( $Objeto_Valor_Variables as $Valor ) {
        //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
        if($Indice < 3)
        {
          $query->bindValue( $Indice_Principal, $Valor );
          $Indice_Principal ++;
        }
        $Indice ++;
      }
      // $query->bindParam(1, $Nombre_Vista);
      // $query->bindParam(2, $Url_Vista);
      $query->execute();
      if ($query->rowCount() > 0) {
        $PK_ID_Vista = $query->fetchColumn();
        $sql = "CALL `spRegistrarPermisos_Usuario`(?,?);";
        $query = $this->db->prepare( $sql );
        //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
        $Indice = 1;
        //_* Ya que el Indice que tenemos arriba no funciona como indice para el bindvalue, creamos otr nuevo indice con el que si podremos usar el bindvalue

        $Indice_Principal = 1;
        //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
        foreach ( $Objeto_Valor_Variables as $Valor ) {
          //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
          if($Indice == 3)
          {
           $query->bindValue( $Indice_Principal, $Valor );
         }
         $Indice ++;
       }
       $query->bindParam( 2, $PK_ID_Vista );
       $query->execute();
       if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }
  }
}
//_*
public function FN_Eliminar_Permiso_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarPermisos_Usuario`(?,?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }

  //_* $query->bindParam(1, $FK_ID_Rol);
  //_* $query->bindParam(2, $FK_ID_Vista);
  $query->execute();
  if ($query->rowCount() > 0) {
    $sql = "CALL `spEliminarVista_Usuario`(?);";
    $query = $this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
    //_* Ya que el Indice que tenemos arriba no funciona como indice para el bindvalue, creamos otr nuevo indice con el que si podremos usar el bindvalue
    $Indice_Principal = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
      if($Indice > 1)
      {

        $query->bindValue( $Indice_Principal, $Valor );
        $Indice_Principal ++;
      }
      $Indice ++;
    }
    //_* $query->bindParam(1, $FK_ID_Vista);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
//_*
public function FN_Modificar_Permiso_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spActualizar_Permiso_Usuario`(?,?,?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
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


//_* Funcion para registrar un rol
public function FN_Registrar_Rol( $Objeto_Valor_Variables )
{
  $sql = "CALL `spRegistrarRol_usuario`(?)";
  $query= $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
    

      $query->bindValue( $Indice, $Valor );
      $Indice ++;
   
  }

    // $query->bindParam(1, $Url_Vista);
    // $query->bindParam(2, $FK_ID_Rol);

  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
//_* FN_Modificar_Rol
public function FN_Modificar_Rol( $Objeto_Valor_Variables )
{
  $sql = "CALL `spModificarRol_usuario`(?,?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
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


//_* Funcion para eliminar rol
public function FN_Eliminar_Rol( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarRol_usuario`(?);";
  $query = $this->db->prepare( $sql );
  //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
  $Indice = 1;
  //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    //_* Esta condicional hara que se tome desde el segundo valor de los parametros mandados
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

}
?>