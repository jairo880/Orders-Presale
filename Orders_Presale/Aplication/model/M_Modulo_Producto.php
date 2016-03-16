<?php

class M_Modulo_Producto
{


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


  /**
  * Función para Listar los productos que están registrados en el Sistema.
  * @param 
  */

  function FN_Listar_Productos(){

    $sql= "CALL `spListarProducto`";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }


  //*****************Registrar producto
  public function FN_Registrar_Producto(
    $Nombre_Producto,
    $Precio_Producto,
    $Categoria,
    $Cantidad_Maxima,
    $Cantidad_Minima,
    $Descripcion_Producto,
    $Imagen
    ) 
  {

    $sql = "CALL `spRegistrarProducto`(?,?,?,?,?,?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Nombre_Producto);
    $query->bindParam(2,$Precio_Producto);
    $query->bindParam(3,$Descripcion_Producto);
    $query->bindParam(4,$Cantidad_Maxima);
    $query->bindParam(5,$Cantidad_Minima);
    $query->bindParam(6,$Categoria);
    $query->bindParam(7,$Imagen);
    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    } else{
      return false;
    }
  }


  public function FN_Listar_Categoria() {

    $sql = "CALL `spListarCategoria_producto`();";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }


  public function FN_Listar_Promocion() {

    $sql = "CALL `spListarPromocion`();";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }


  public function FN_Listar_Promocion_Producto($FK_ID_Producto) {

    $sql = "CALL `spJoin_Producto_Promociones_Dll_Promocion_Producto`(?);";
    $query = $this->db->prepare($sql);
    $query ->bindParam(1,$FK_ID_Producto);
    $query->execute();

    return $query->fetchAll();
  }


  public function FN_Consultar_Producto(
    $Nombre_Producto
    ){
    $sql = "CALL `spVerificarProducto`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Nombre_Producto);
    $query->execute();

    if($query->rowCount() > 0){
      return true;
    } else{
      return false;
    }

  }
  public function FN_Modificar_Producto(
    $IdProducto,
    $Nombre_Producto,
    $Valor_Produto,
    $Descripcion_Producto,
    $Cantidad_Maxima,
    $Cantidad_Minima,
    $PK_ID_Categoria,
    $Ruta_Imagen_Producto,
    $Estado_Producto
    )
  {
//Si se hicieron edicion de los datos de un producto
    $sql= "CALL `spModificarProducto` (?,?,?,?,?,?,?,?,?)";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $IdProducto);
    $query->bindParam(2, $Nombre_Producto);
    $query->bindParam(3, $Valor_Produto);
    $query->bindParam(4, $Descripcion_Producto);
    $query->bindParam(5, $Cantidad_Maxima);
    $query->bindParam(6, $Cantidad_Minima);
    $query->bindParam(7, $PK_ID_Categoria);
    $query->bindParam(8, $Ruta_Imagen_Producto);
    $query->bindParam(9, $Estado_Producto);
    $query->execute();

 //Si la edicion de datos fue exitosa paso a verifciar si se hicieron edicion de datos en las promociones   
    if ($query->rowCount() > 0) {

     return true;
   }
   else{

   }
 }

 public function FN_Registrar_Dll_Producto_Promocion($PK_ID_Producto,$FK_ID_Promocion)
 {
  $sql = "CALL `spConsultarDll_promocion_producto` (?,?) ";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Producto);
  $query->bindParam(2, $FK_ID_Promocion);
  $query -> execute();
  if ($query->rowCount() > 0) {

    return false;

  }
  else
  {
    $sql= "CALL `spRegistrarDll_promocion_producto` (?,?)";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $PK_ID_Producto);
    $query->bindParam(2, $FK_ID_Promocion);
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
public function FN_Eliminar_Dll_Promocion_Producto($PK_ID_Promocion_Producto)
 {
  $sql= "CALL `spEliminarDll_promocion_producto_Unico` (?)";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Promocion_Producto);
  $query -> execute();
  if ($query->rowCount() > 0) {
    return true;
  }
  else
  {
   return false;
 }
}

public function FN_Ver_Comentarios_Producto(
  $PK_ID_Producto
  ){
  $sql = "CALL `spJoin_Comentario_Cuenta`(?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$PK_ID_Producto);
  $query->execute();

  return $query->fetchAll();
}

  //*****************Registrar Comentario
public function FN_Registrar_Nuevo_Comentario(
  $FK_ID_Usuario,
  $Descripcion,
  $PK_ID_Producto,
  $Valoracion_Producto
  ) 
{


  $sql = "CALL `spRegistrarComentario`(?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$FK_ID_Usuario);
  $query->bindParam(2,$Descripcion);
  $query->bindParam(3,$PK_ID_Producto);
  $query->bindParam(4,$Valoracion_Producto);

  $query->execute();

  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
  //*****************FN_Eliminar_Comentario
public function FN_Eliminar_Comentario(
  $PK_ID_Comentario

  ) 
{
  //Elimino todos los likes de tenga relacionados el comentario
  $sql = "CALL `spEliminarDll_Comentario_Cuenta_Likes`(?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$PK_ID_Comentario);

  $query->execute();

  if ($query->rowCount() > 0) {
    //Procedo a eliminar el comentario luego de eliminar las posibles relaciones que tenga el comentario en la tabla de likes
    $sql = "CALL `spEliminarComentario`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$PK_ID_Comentario);


    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    //Vuelvo a verificar, ya que un comentario no siempre tendra un like, asi que paso a eliminar directo el comentario 
   $sql = "CALL `spEliminarComentario`(?);";
   $query = $this->db->prepare($sql);
   $query->bindParam(1,$PK_ID_Comentario);


   $query->execute();

   if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

}
  //*****************FN_Modificar_Comentario
public function FN_Modificar_Comentario(
  $PK_ID_Comentario,
  $Descripcion

  ) 
{
  $sql = "CALL `spModificarComentario`(?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$PK_ID_Comentario);
  $query->bindParam(2,$Descripcion);


  $query->execute();

  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}


public function FN_VerificarComentario_Cuenta(
  $PK_ID_Comentario,
  $FK_ID_Usuario
  )
{
 $sql = "CALL `spConsultar_Comentario_Cuenta`(?,?);";
 $query = $this->db->prepare($sql);
 $query->bindParam(1,$PK_ID_Comentario);
 $query->bindParam(2,$FK_ID_Usuario);


 $query->execute();

 if ($query->rowCount() > 0) {
  return true;
} else {
  return false;
}
}


public function FN_Valorar_Comentario_Like(
  $PK_ID_Comentario,
  $PK_ID_Usuario
  )
{
  $sql = "CALL `spRegistrarDll_Comentario_Cuenta`(?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$PK_ID_Usuario);
  $query->bindParam(2,$PK_ID_Comentario);

  $query->execute();

  if ($query->rowCount() > 0) {

    $sql = "CALL `spModificar_Comentario_Like`(?);";
    $query =$this->db->prepare($sql);
    $query->bindParam(1,$PK_ID_Comentario);

    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }

  } else {
    return false;
  }
}

public function FN_Valorar_Comentario_DisLike(
 $PK_ID_Comentario,
 $PK_ID_Usuario
 )
{
  $sql = "CALL `spEliminarDll_Comentario_Cuenta`(?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1,$PK_ID_Comentario);
  $query->bindParam(2,$PK_ID_Usuario);

  $query->execute();

  if ($query->rowCount() > 0) {

    $sql = "CALL `spModificar_Comentario_DisLike`(?);";
    $query =$this->db->prepare($sql);
    $query->bindParam(1,$PK_ID_Comentario);

    $query->execute();

    if ($query->rowCount() > 0) {
      return true;
    }
    else
    {
      return false;
    }
  } else {
    return false;
  }
}
  //**************************************

}

?>