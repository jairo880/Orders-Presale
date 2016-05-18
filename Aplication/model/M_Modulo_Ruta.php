<?php 
class M_Modulo_Ruta{
  function __construct( $db ) {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit( 'Error al intentar conectar con la Base de Datos en M_Modulo_Categoria:' + $e );
    }
  }

  public function FN_Registrar_Ruta( $Objeto_Valor_Variables ) 
  {


    $sql = "CALL `spRegistrarRuta`(?,?);";
    $query = $this->db->prepare( $sql );

    $Indice = 1;

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
   /////////////////////////////
 
}

public function FN_Consultar_Rutas()
{
	$sql = "CALL `spListarRuta`();";
	$query = $this->db->prepare($sql);
	$query->execute();
	return $query->fetchAll();
}

public function FN_Listar_Empleados()
{
  $sql = "CALL `spListarEmpleadoDistribuidor`();";
  $query = $this->db->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}


}
?>