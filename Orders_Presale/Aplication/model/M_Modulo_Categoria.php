<?php

class M_Modulo_Categoria{

    /**
     * @param $db  objeto de la conección a la DB que recibe cuando se ejecuta la instancia.
     */
    function __construct($db) {
      try {
        $this->db = $db;
      } catch (PDOException $e) {
        exit('Error al intentar conectar con la Base de Datos en M_Registro_Usuario:' + $e);
      }
    }

    /**
     * Registro en la categoria
     * @param 
     */
    public function FN_Registrar_TBL_Categoria_Producto(
      $Nombre_Categoria, $Descripcion) {

      $sql = "CALL `spRegistrarCategoria_producto`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $Nombre_Categoria);
      $query->bindParam(2, $Descripcion);
      

      $query->execute();

      if ($query->rowCount() > 0) {
       return true;
     }
     else{
      return false;
    }
  }

  public function FN_Verificar_Categoria($Nombre_Categoria)
  {
    $sql = "CALL `spVerificarCategoria`(?)";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Nombre_Categoria);
    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    }
    else{
      return false;
    }
  }
  public function FN_Listar_Categorias() {

    $sql = "CALL `spListarCategoria_producto`();";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function FN_Modificar_Datos(
   $PK_ID_Categoria,
   $Nombre_Categoria,
   $Descripcion
   )
  {

    $sql = "CALL `spModificarCategoria_producto`(?,?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $PK_ID_Categoria);
    $query->bindParam(2, $Nombre_Categoria);
    $query->bindParam(3, $Descripcion);
    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function FN_Eliminar_Categoria($PK_ID_Categoria){
    $sql = "CALL `spActualizar_Producto_Categoria`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $FK_ID_Categoria);
    $query->execute();

    if($query->rowCount() >0){
      
      $sql = "CALL `spEliminarCategoria_producto`(?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $PK_ID_Categoria);
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
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $PK_ID_Categoria);
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


