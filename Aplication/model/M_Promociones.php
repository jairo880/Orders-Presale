<?php
class M_Promociones {
	function __construct( $db ) {
		try {
			$this->db = $db;
		} catch ( PDOException $e ) {
			exit( 'Error al intentar conectar con la Base de Datos en M_Promociones:' + $e );
		}
	}
	public function FN_Registrar_Promocion( $Objeto_Valor_Variables	)
	{
		$sql = "CALL `spRegistrarPromocion`(?,?,?,?);";
		$query = $this->db->prepare($sql);
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
	public function  FN_Eliminar_Promociones( $Objeto_Valor_Variables )
	{

		// var_dump($Id_Promocion);
		$sql = "CALL `spEliminarDll_promocion_producto_Unico` (?);";
		$query = $this->db->prepare( $sql );
		// Variable para el identificador del parametro
		$Indice = 1;
		//Extraigo los valores que posee la variable mandada desde el controlador
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		// return $query->fetchAll();
		$Respuesta_ElimianarDLL = $query->rowCount();
		if ($Respuesta_ElimianarDLL > 0) {
			$sql = "CALL `spEliminarPromocion` (?);";
			$query = $this->db->prepare( $sql );
			// Variable para el identificador del parametro
			$Indice = 1;
			//Extraigo los valores que posee la variable mandada desde el controlador
			foreach ( $Objeto_Valor_Variables as $Valor ) {
				$query->bindValue( $Indice, $Valor );
				$Indice ++;
			}
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
			$query = $this->db->prepare( $sql );
			// Variable para el identificador del parametro
			$Indice = 1;
			//Extraigo los valores que posee la variable mandada desde el controlador
			foreach ( $Objeto_Valor_Variables as $Valor ) {
				$query->bindValue( $Indice, $Valor );
				$Indice ++;
			}
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
	public function FN_Modificar_Promocion( $Objeto_Valor_Variables )
	{
		// var_dump($Fecha_Inicio);
		$sql = "CALL `spModificarPromocion` (?,?,?,?,?)";
		$query =$this->db->prepare( $sql );
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
		} else {
			return false;
		}
	}
	public function FN_Enviar_Promociones()
	{
		$sql = "SELECT Correo_Electronico FROM tbl_cuenta";
		$query = $this->db->prepare( $sql );
		$query->execute();
		if($query->rowCount() > 0){

			$Resultado = $query->fetchAll();



			require(APP. "controller/Modulo/PHPmailer/class.phpmailer.php");
			$mail = new PHPmailer();
			$body= file_get_contents(APP."mailtemplate/index.html");;
			$body.="";
			$mail->IsSMTP();
			$mail->Host = "ssl://smtp.gmail.com:465";
			$mail->SMTPAuth = true;
			$mail->Username = "allopaplicacion@gmail.com";
			$mail->Password = "allop1998";
			$mail->From = "allopaplicacion@gmail.com";
			$mail->FromName = "Orders Presale";

			foreach ($Resultado as $value) {

				$mail->AddBCC($value->Correo_Electronico);

			}

			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = "Promocion del dia";
			$mail->MsgHTML($body);

			$mail->Send();

			return true;

		}else{

			return false;
		}


	}
}
?>
