<?php
class M_Modulo_Producto
{
  function __construct( $db )
  {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit( 'Error al intentar conectar con la Base de Datos en M_Modulo_Producto:'+$e );
    }
  }
  //Listar producto
  function FN_Listar_Productos(){
    $sql= "CALL `spListarProducto`";
    $query = $this->db->prepare( $sql );
    $query->execute();
    return $query->fetchAll();
  }
  //Listar producto deacuerdo a una categoria seleccionada
  function FN_Listar_Producto_Categoria( $Objeto_Valor_Variables ){
    $sql= "CALL `spListarProducto_Categoria` (?);";
    $query = $this->db->prepare( $sql );
    // Variable para el identificador del parametro
    $Indice = 1;
    //Extraigo los valores que posee la variable mandada desde el controlador
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    return $query->fetchAll();
  }

  //Registrar producto
  public function FN_Registrar_Producto( $Objeto_Valor_Variables )
  {
    //_* Variable para el identificador del parametro
    $Indice = 1;
    //_*Variable necesaria para este proceso
    $Nombre_Producto = "";
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
    foreach ( $Objeto_Valor_Variables as $Valor ) {
     if($Indice == 1)
     {
        //_*Capturo el nombre de la categoria
      $Nombre_Producto = $Valor;
    }
    $Indice ++;
  }
  $sql = "CALL `spVerificarProducto`(?);";
  $query = $this->db->prepare( $sql );
  $query->bindParam(1,$Nombre_Producto);
  $query->execute();
  if($query->rowCount() > 0){
    return false;
  } else{
    $sql = "CALL `spRegistrarProducto`(?,?,?,?,?,?,?);";
    $query = $this->db->prepare( $sql );
        //_* Variable para el identificador del parametro
    $Indice = 1;
        //_*Extraigo los valores que posee la variable mandada desde el controlador
    foreach ( $Objeto_Valor_Variables as $Valor ) {

      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else{
      return false;
    }
  }

}
//Listar categoria
public function FN_Listar_Categoria() {

  $sql = "CALL `spListarCategoria_producto`();";
  $query = $this->db->prepare( $sql );
  $query->execute();
  return $query->fetchAll();
}
//Listar promocion
public function FN_Listar_Promocion() {
  $sql = "CALL `spListarPromocion`();";
  $query = $this->db->prepare( $sql );
  $query->execute();
  return $query->fetchAll();
}
//Listar promocion producto
public function FN_Listar_Promocion_Producto( $Objeto_Valor_Variables ) {


  $sql = "CALL `spJoin_Producto_Promociones_Dll_Promocion_Producto`(?);";
  $query = $this->db->prepare( $sql );
    // Variable para el identificador del parametro
  $Indice = 1;
    //Extraigo los valores que posee la variable mandada desde el controlador
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  return $query->fetchAll();
}

//Modificar datos de un producto
public function FN_Modificar_Producto( $Objeto_Valor_Variables )
{
  $sql= "CALL `spModificarProducto` (?,?,?,?,?,?,?,?,?)";
  $query = $this->db->prepare( $sql );
    // Variable para el identificador del parametro
  $Indice = 1;
      //Extraigo los valores que posee la variable mandada desde el controlador
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  }
  else{
    return false;
  }
}
//Registrar dll producto promocion
public function FN_Registrar_Dll_Producto_Promocion( $Objeto_Valor_Variables )
{
  $sql = "CALL `spConsultarDll_promocion_producto` (?,?) ";
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
    return false;
  }
  else
  {
    $sql= "CALL `spRegistrarDll_promocion_producto` (?,?)";
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
//Eliminar dll promocion producto
public function FN_Eliminar_Dll_Promocion_Producto($Objeto_Valor_Variables)
{
  $sql= "CALL `spEliminarDll_promocion_producto_Unico` (?)";
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
//Eliminar producto
public function FN_Eliminar_Producto( $Objeto_Valor_Variables ){
  $sql = "CALL `spEliminarProducto`(?);";
  $query = $this->db->prepare( $sql );
    // Variable para el identificador del parametro
  $Indice = 1;
    //Extraigo los valores que posee la variable mandada desde el controlador
  foreach ( $Objeto_Valor_Variables as $Valor ) {

    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if($query->rowCount() >0){
    return true;
  }
  else
  {
    return false;
  }
}
 //Registrar producto
public function FN_Valorar_Producto( $Objeto_Valor_Variables )
{


    //_* Variable para el identificador del parametro
  $Indice = 1;
  $sql = "CALL `spConsultarDll_Valoracion_Producto`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
 
   ////
  $Indice = 1;
  $sql = "CALL `spEliminarDll_Valoracion_Producto`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
  foreach ( $Objeto_Valor_Variables as $Valor ) {


    $query->bindValue( $Indice, $Valor );
    $Indice ++;

  }
  $query->execute();
  if ($query->rowCount() > 0) {
      ///
   $Indice = 1;
   $sql = "CALL `spModificar_Valoracion_DisLike`(?);";
   $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
   foreach ( $Objeto_Valor_Variables as $Valor ) {

    if($Indice == 2){
      $query->bindValue( 1, $Valor );
    }
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    return true;
  } else{
    return false;
  }
      ///
} else{
  return false;
}
  }
  else {
    //_* Variable para el identificador del parametro
  $Indice = 1;
  $sql = "CALL `spRegistrarDll_Valoracion_Producto`(?,?);";
  $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
  foreach ( $Objeto_Valor_Variables as $Valor ) {
    $query->bindValue( $Indice, $Valor );
    $Indice ++;
  }
  $query->execute();
  if ($query->rowCount() > 0) {
    ///
    $Indice = 1;
    $sql = "CALL `spModificar_Valoracion_Like`(?);";
    $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
    foreach ( $Objeto_Valor_Variables as $Valor ) {


      if($Indice == 2){
        $query->bindValue( 1, $Valor );
      }
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else{
      return false;
    }
    ////

  } else{
    ////
    $Indice = 1;
    $sql = "CALL `spEliminarDll_Valoracion_Producto`(?,?);";
    $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
    foreach ( $Objeto_Valor_Variables as $Valor ) {


      $query->bindValue( $Indice, $Valor );
      $Indice ++;

    }
    $query->execute();
    if ($query->rowCount() > 0) {
      ///
     $Indice = 1;
     $sql = "CALL `spModificar_Valoracion_DisLike`(?);";
     $query = $this->db->prepare( $sql );
    //_*Capturo y guardo el nombre del producto para asi poder verificar si ya se encuentra registrada
     foreach ( $Objeto_Valor_Variables as $Valor ) {

      if($Indice == 2){
        $query->bindValue( $Indice, $Valor );
      }
      $Indice ++;
    }
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else{
      return false;
    }
      ///
  } else{
    return false;
  }
    ///////
}
}

}


}

?>
