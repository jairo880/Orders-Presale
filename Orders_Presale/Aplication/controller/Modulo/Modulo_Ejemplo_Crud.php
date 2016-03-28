<?php 

class Modulo_Ejemplo_Crud extends controller{


	private $_Mdl_Ejemplo_Crud = null; 

	public function __construct() {
		$this->_Mdl_Ejemplo_Crud = $this->loadModel("M_Ejemplo_Crud");
	}

	public function FN_Registrar_Ejemplo()
	{
		$objDatos = json_decode(file_get_contents("php://input"));

		if(!isset($objDatos)){
			echo 'Los datos no llegaron';
		}
		else{
			$Nombre_Usuario_Ejemplo = $objDatos->Nombre_Usuario_Ejemplo;
			$Contrasenia_Ejemplo = $objDatos ->Contrasenia_Ejemplo;



			$Respuesta_Registro = $this ->_Mdl_Ejemplo_Crud->FN_Registrar_Ejemplo
			(
				$Nombre_Usuario_Ejemplo,
				$Contrasenia_Ejemplo
				);

			if($Respuesta_Registro){
				echo "true";
			}else{
				echo "false";
			}


		}
	}


	Public function FN_Listar_Ejemplo()
	{
		$Listar_Ejemplo = $this->_Mdl_Ejemplo_Crud->FN_Listar_Ejemplo();
		echo json_encode($Listar_Ejemplo);
	}

	Public function FN_Eliminar_Ejemplo()
	{
		$objDatos = json_decode(file_get_contents("php://input"));
		if (!isset($objDatos)) {
			echo 'Los datos no llegarón';
		}else {

			$PK_ID_Usuario_Ejemplo = $objDatos->PK_ID_Usuario_Ejemplo;
			
			$Respuesta_Eliminacion = $this->_Mdl_Ejemplo_Crud->FN_Eliminar_Ejemplo(
				$PK_ID_Usuario_Ejemplo);

			if($Respuesta_Eliminacion){
				echo "true";
			}else{
				echo "false";
			}

			
		}
	}


	Public function FN_Modificar_Ejemplo(){

		$objDatos = json_decode(file_get_contents("php://input"));
		if (!isset($objDatos)) {
			echo 'Los datos no llegarón';
		}else {
			$Nombre_Usuario_Ejemplo = $objDatos->Nombre_Usuario_Ejemplo;
			$Contrasenia_Ejemplo = $objDatos ->Contrasenia_Ejemplo;
			$PK_ID_Usuario_Ejemplo = $objDatos->PK_ID_Usuario_Ejemplo;

			$Respuesta_Modificacion = $this ->_Mdl_Ejemplo_Crud->FN_Modificar_Ejemplo
			(
				$PK_ID_Usuario_Ejemplo,
				$Nombre_Usuario_Ejemplo,
				$Contrasenia_Ejemplo
				);

			if($Respuesta_Modificacion){
				echo "true";
			}else{
				echo "false";
			}
		}


	}
//************************

}
?>