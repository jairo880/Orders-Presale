<?php

class M_Ejemplo_Crud{

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
    public function FN_Registrar_Ejemplo(
      $Nombre,
      $Contrasenia) {

      $sql = "CALL `spRegistrarEjemplo_crud`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $Nombre);
      $query->bindParam(2, $Contrasenia);
      

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
  public function FN_Listar_Ejemplo() {

    $sql = "CALL `spListarEjemplo_crud`();";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function FN_Modificar_Ejemplo(
    $PK_ID_Usuario_Ejemplo,
    $Nombre_Usuario_Ejemplo,
    $Contrasenia_Ejemplo
    )
  {

    $sql = "CALL `spModificarEjemplo_crud`(?,?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $PK_ID_Usuario_Ejemplo);
    $query->bindParam(2, $Nombre_Usuario_Ejemplo);
    $query->bindParam(3, $Contrasenia_Ejemplo);
    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function FN_Eliminar_Ejemplo($PK_ID_Usuario_Ejemplo){
    $sql = "CALL `spEliminarEjemplo_crud`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $PK_ID_Usuario_Ejemplo);
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


