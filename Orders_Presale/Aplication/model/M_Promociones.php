<?php 

class M_Promociones {


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

	  public function FN_Registrar_Promocion(
	  	$Nombre_Promocion,
	  	$Descripcion_Promocion,
	  	$Fecha_Inicio,
	  	$Fecha_Fin
	  	) 
	  {

	  	$sql = "CALL `spRegistrarPromocion`(?,?,?,?);";
	  	$query = $this->db->prepare($sql);
	  	$query->bindParam(1,$Nombre_Promocion);
	  	$query->bindParam(2,$Descripcion_Promocion);
	  	$query->bindParam(3,$Fecha_Inicio);
	  	$query->bindParam(4,$Fecha_Fin);
	  	
	  	$query->execute();

	  	if ($query->rowCount() > 0) {
	  		return true;
	  	} else {
	  		return false;
	  	}
	  }


	  public function FN_Consultar_Promociones(){
	  	$sql = "CALL `spListarPromocion`();";
	  	$query = $this->db->prepare($sql);
	  	$query->execute();

	  	return $query->fetchAll();
	  }

	  public function  FN_Eliminar_Promociones($Id_Promocion)
	  {
	  	// var_dump($Id_Promocion);
	  	$sql = "CALL `spEliminarDll_promocion_producto_Unico` (?);";
	  	$query = $this->db->prepare($sql);
	  	$query->bindParam(1, $Id_Promocion);
	  	$query->execute();

	  	// return $query->fetchAll();
	  	$Respuesta_ElimianarDLL = $query->rowCount();
	  	if ($Respuesta_ElimianarDLL > 0) {
	  		$sql = "CALL `spEliminarPromocion` (?);";
	  		$query = $this->db->prepare($sql);
	  		$query->bindParam(1, $Id_Promocion);
	  		$query->execute();

	  		$Respuesta_Eliminar_Promocion = $query->rowCount();


	  		if ($Respuesta_Eliminar_Promocion > 0) {
	  			return true;
	  		}
	  		else
	  		{	
	  			return false;

	  		} 
	  	}
	  	else
	  	{	
	  		$sql = "CALL `spEliminarPromocion` (?);";
	  		$query = $this->db->prepare($sql);
	  		$query->bindParam(1, $Id_Promocion);
	  		$query->execute();

	  		$Respuesta_Eliminar_Promocion = $query->rowCount();


	  		if ($Respuesta_Eliminar_Promocion > 0) {
	  			return true;
	  		}
	  		else
	  		{	
	  			return false;

	  		} 

	  	} 
	  }

	  public function FN_Modificar_Promocion($PK_ID_Promocion,$Nombre_Promocion,$Descripcion, $Fecha_Inicio, $Fecha_Fin)
	  {
// var_dump($Fecha_Inicio);
	  	$sql = "CALL `spModificarPromocion` (?,?,?,?,?)";
	  	$query =$this->db->prepare($sql);
	  	$query->bindParam(1, $PK_ID_Promocion);
	  	$query->bindParam(2,$Nombre_Promocion);
	  	$query->bindParam(3, $Descripcion);
	  	$query->bindParam(4, $Fecha_Inicio);
	  	$query->bindParam(5, $Fecha_Fin);
	  	$query->execute();

	  	if ($query->rowCount() > 0) {
	  		return true;
	  	} else {
	  		return false;
	  	}
	  }


	  public function FN_Enviar_Promociones()
	 {		

	  	  require(APP. "controller/Modulo/PHPmailer/class.phpmailer.php"); 
	  	  $mail = new PHPmailer();

	  	  $mail->IsSMTP();
	      $mail->Host = "ssl://smtp.gmail.com:465";  
	      $mail->SMTPAuth = true;
	      $mail->Username = "allopaplicacion@gmail.com";
	      $mail->Password = "allop1998"; 
	      
	      $result = "SELECT * FROM TBL_Cuenta";
	  	  $query = $this->db->prepare($result);

	  	  // $result = $db->query("");
	  	 
	  	  if($query->rowCount() >0){
	  	  	return true;
	  	  }else{
	  	  	return false;
	  	  }

	  	  while($row = $result->fetch_assoc()){
	  	  	$mail->From = "allopaplicacion@gmail.com";
		    $mail->FromName = "Allop"; 
			$mail->AddAddress($row['Correo_Electronico']);

			$mail->WordWrap = 50;
	      	$mail->IsHTML(true);
	      	$mail->Subject = "Promociones";
	      	$mail->Body = " ";
	      	$mail->Send();
		  }
		 
		  
		 
	}
	
	 


	  
	}
	?>