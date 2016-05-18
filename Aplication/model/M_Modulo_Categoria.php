<?php
class M_Modulo_Categoria{
function __construct( $db ) {
  try {
    $this->db = $db;
  } catch ( PDOException $e ) {
    exit( 'Error al intentar conectar con la Base de Datos en M_Modulo_Categoria:' + $e );
  }
}

public function FN_Registrar_Categoria( $Objeto_Valor_Variables ) 
{


    //_*Verifico la categoria
    //_* Variable para el identificador del parametro
      $Indice = 1;
    //_*Variable necesaria para este proceso
      $Nombre_Categoria = "";
      //_*Capturo y guardo el nombre de la categoria para asi poder verificar si ya se encuentra registrada
     foreach ( $Objeto_Valor_Variables as $Valor ) {
       if($Indice == 1)
        {
          //_*Capturo el nombre de la categoria
          $Nombre_Categoria = $Valor;
        }
        $Indice ++;
     }

    $sql = "CALL `spVerificarCategoria`(?)";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Nombre_Categoria);
    $query->execute();
    if ($query->rowCount() > 0) {
      return false;
    }
    else{
      $sql = "CALL `spRegistrarCategoria_producto`(?,?);";
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
     }
     else{
      return false;
    }
}
}
public function FN_Listar_Categorias()
{
  $sql = "CALL `spListarCategoria_producto`();";
  $query = $this->db->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}
public function FN_Modificar_Datos_Categoria( $Objeto_Valor_Variables  )
{
  $sql = "CALL `spModificarCategoria_producto`(?,?,?);";
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
  }else {
    return false;
  }
}
public function FN_Eliminar_Categoria( $Objeto_Valor_Variables )
{
  $sql = "CALL `spActualizar_Producto_Categoria`(?);";
  $query = $this->db->prepare( $sql );
   //_* Variable para el identificador del parametro
    $Indice = 1;
      //_*Extraigo los valores que posee la variable mandada desde el controlador
    foreach ( $Objeto_Valor_Variables as $Valor ) {
      $query->bindValue( $Indice, $Valor );
      $Indice ++;
    }
  $query->execute();
  if($query->rowCount() >0){
    $sql = "CALL `spEliminarCategoria_producto`(?);";
    $query = $this->db->prepare( $sql );
     //_* Variable para el identificador del parametro
    $Indice = 1;
      //_*Extraigo los valores que posee la variable mandada desde el controlador
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
  }else{
    $sql = "CALL `spEliminarCategoria_producto`(?);";
    $query = $this->db->prepare( $sql );
     //_* Variable para el identificador del parametro
    $Indice = 1;
      //_*Extraigo los valores que posee la variable mandada desde el controlador
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
}

}
?>
