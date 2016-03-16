<?php 

class Modulo_Promociones extends controller{


	private $_Mdl_Promociones = null; 

	public function __construct() {
		$this->_Mdl_Promociones = $this->loadModel("M_Promociones");
	}

	public function FN_Registrar_Promocion()
	{
		$objDatos = json_decode(file_get_contents("php://input"));

		if(!isset($objDatos)){
			echo 'Los datos no llegaron';
		}
		else{
			$Nombre_Promocion = $objDatos->Nombre_Promocion;
			$Descripcion_Promocion = $objDatos ->Descripcion_Promocion;
			$Fecha_Inicio = $objDatos ->Fecha_Inicio;
			$Fecha_Fin = $objDatos ->Fecha_Fin;
		}


		$respuesta = $this ->_Mdl_Promociones->FN_Registrar_Promocion
		(
			$Nombre_Promocion,
			$Descripcion_Promocion,
			$Fecha_Inicio,
			$Fecha_Fin 
			);

		if($respuesta = true){
			echo "true";
		}else{
			echo "false";
		}

		
	}


	Public function FN_Consultar_Promociones()
	{
		$Consultar_Promociones = $this->_Mdl_Promociones->FN_Consultar_Promociones();
		echo json_encode($Consultar_Promociones);
	}

	Public function FN_Eliminar_Promociones()
	{
		$objDatos = json_decode(file_get_contents("php://input"));
		if (!isset($objDatos)) {
			echo 'Los datos no llegarón';
		}else {

			$Id_Promocion = $objDatos->PK_ID_Promocion;
			
			$Eliminar_Promociones = $this->_Mdl_Promociones->FN_Eliminar_Promociones(
				$Id_Promocion);

			if($Eliminar_Promociones){
				echo "true";
			}else{
				echo "false";
			}

			
		}
	}

	public function FN_Enviar_Promociones()
	{
		$Consultar_Correos = $this->_Mdl_Promociones->FN_Enviar_Promociones();
		// echo json_encode($Consultar_Correos);
		if($Consultar_Correos)
		{
			echo 'true';
		}
		else
		{
			echo "false";
		}
	}



	Public function FN_Modificar_Promociones(){

		$ObjDatosModificar = json_decode(file_get_contents("php://input"));
		if (!isset($ObjDatosModificar)) {
			echo 'Los datos no llegarón';
		}else {

			$PK_ID_Promocion=$ObjDatosModificar->PK_ID_Promocion;
			$Nombre_Promocion = $ObjDatosModificar->Nombre_Promocion;
			$Descripcion = $ObjDatosModificar->Descripcion;
			$Fecha_Inicio=$ObjDatosModificar->Fecha_Inicio;
			$Fecha_Fin = $ObjDatosModificar->Fecha_Fin;

			

			$Resultado = $this->_Mdl_Promociones->FN_Modificar_Promocion(
				$PK_ID_Promocion,
				$Nombre_Promocion,
				$Descripcion,
				$Fecha_Inicio,
				$Fecha_Fin);

			if($Resultado)
			{
				echo "true";
			}


			else{

				echo "false";

			}
		}


	}
//************************

}

?>