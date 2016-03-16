<?php 

class M_Registrar_Producto {
	
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
      	} else {
        	return false;
      	}
	  }


	  public function FN_Listar_Categoria() {

	  	$sql = "CALL `spListarCategoria_producto`();";
	  	$query = $this->db->prepare($sql);
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




	}



	?>