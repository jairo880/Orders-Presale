<?php
class M_Ejemplo_Crud{
  function __construct( $db ) {
    try {
      $this->db = $db;
    } catch ( PDOException $e ) {
      exit( 'Error al intentar conectar con la Base de Datos en M_Ejemplo_Crud:' + $e );
    }
  }
  
  public function FN_Registrar_Ejemplo( $Objeto_Valor_Variables ) {

    $sql = "CALL `spRegistrarEjemplo_crud`(?,?);";
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
     }
     else{
      return false;
    }
  }
  public function FN_Listar_Ejemplo() {
    $sql = "CALL `spListarEjemplo_crud`();";
    $query = $this->db->prepare( $sql );
    $query->execute();
    return $query->fetchAll();
  }

  public function FN_Modificar_Ejemplo( $Objeto_Valor_Variables )
  {
    $sql = "CALL `spModificarEjemplo_crud`(?,?,?);";
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
  public function FN_Eliminar_Ejemplo( $Objeto_Valor_Variables ){
    $sql = "CALL `spEliminarEjemplo_crud`(?);";
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
    if($query->rowCount() >0){
      return true;
    }
    else
    {
      return false;
    }
  }
}
?>
