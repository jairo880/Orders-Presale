<?php
class M_Gestion_De_Contenido{
  
  function __construct( $db ) {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit( 'Error al intentar conectar con la Base de Datos en M_Registro_Usuario:' + $e );
    }
  }

  public function FN_Registrar_Imagen_Portada( $Objeto_Valor_Variables ){


    $sql = "CALL `spConsultarImagen_Portada`(?);";
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
      return false;
    }else {
     $sql="CALL `spRegistrarImagen_Portada` (?);";
     $query =$this->db->prepare( $sql );
     //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
     $Indice = 1;
     //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
     foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }

}
public function FN_Registrar_Imagen_Perfil( $Objeto_Valor_Variables ){


  $sql = "CALL `spConsultarImagen_Usuario`(?);";
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
    return false;
  }else {
    $sql="CALL `spRegistrarImagen_Usuario` (?);";
    $query =$this->db->prepare( $sql );
    //_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
    $Indice = 1;
    //_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }
}
//_*Lista imagen perfil
public function FN_Listar_Imagen_Perfil(){
  $sql="CALL `spListarImagen_Usuario` ();";
  $query = $this->db->prepare( $sql );
  $query->execute();
  return $query->fetchAll();
}
//_*Lista imagen portada
public function FN_Listar_Imagen_Portada(){
  $sql="CALL `spListarImagen_Portada` ();";
  $query = $this->db->prepare( $sql );
  $query->execute();
  return $query->fetchAll();
}
//_*Modificar datos de los usuairos

public function FN_Modificar_Imagen_Perfil( $Objeto_Valor_Variables  )
{
  $sql = "CALL `spModificarImagen_Usuario`(?,?);";
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
  }else {
    return false;
  }
}
//_* Modificar datos de los usuairos
public function FN_Modificar_Imagen_Portada( $Objeto_Valor_Variables )
{
  $sql = "CALL `spModificarImagen_Portada`(?,?);";
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
  }else {
    return false;
  }
}
public function FN_Eliminar_Imagen_Usuario( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarImagen_Usuario`(?);";
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
  }else {
    return false;
  }
}
public function FN_Eliminar_Imagen_Portada( $Objeto_Valor_Variables )
{
  $sql = "CALL `spEliminarImagen_Portada`(?);";
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
  }else {
    return false;
  }
}

}
?>
