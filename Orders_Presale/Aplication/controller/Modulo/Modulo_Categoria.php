<?php 

class Modulo_Categoria extends controller {

	private $_Mdl_Modulo_Categoria = null;

	public function __construct(){
		$this ->_Mdl_Modulo_Categoria=$this->loadModel("M_Modulo_Categoria");
	}

	public function FN_Registrar_Categoria(){
		$objDatos =json_decode(file_get_contents("php://input"));

		if (!isset($objDatos)) {
			echo "Los datos no llegaron";
		}
		else {
			$Nombre_Categoria = $objDatos->Nombre_Categoria;
			$Descripcion = $objDatos->Descripcion;

			$respuesta_consultar = $this -> _Mdl_Modulo_Categoria->FN_Verificar_Categoria($Nombre_Categoria);

			if ($respuesta_consultar) {
				echo "La categoria ya existe";
			}
			else{
				$respuesta = $this -> _Mdl_Modulo_Categoria -> FN_Registrar_TBL_Categoria_Producto(
					$Nombre_Categoria,$Descripcion
					);
				if ($respuesta = true) {
					echo "true";
				}
				else{
					echo "false";
				}
			}
		}

	}
	public function FN_Consultar_Categoria()
	{
//Listar los datos 
		$Lista_Categorias = $this->_Mdl_Modulo_Categoria->FN_Listar_Categorias();
		echo json_encode($Lista_Categorias);
	}

	public function FN_Modificar_Datos() {
		$objDatos = json_decode(file_get_contents("php://input"));

		if (!isset($objDatos)) {
			echo 'Los datos no llegarón';
		}else {
			$PK_ID_Categoria = $objDatos->PK_ID_Categoria;
			$Nombre_Categoria = $objDatos->Nombre_Categoria;
			$Descripcion = $objDatos->Descripcion;
			

			$res =  $this->_Mdl_Modulo_Categoria->FN_Modificar_Datos(
				$PK_ID_Categoria,	
				$Nombre_Categoria,
				$Descripcion 
				);

      // var_dump($res);

			if ($res) {
				echo "true";
			}else {
				echo "false";
			}

		}

	}

	public function FN_Eliminar_Categoria(){
		$objDatos = json_decode(file_get_contents("php://input"));

		if(!isset($objDatos)){
			echo 'Los datos no llegaron';
		}else{
			$PK_ID_Categoria = $objDatos->PK_ID_Categoria;

			$respuesta = $this->_Mdl_Modulo_Categoria->FN_Eliminar_Categoria($PK_ID_Categoria);

			if($respuesta){
				echo "true";
			}else{
				echo "false";
			}
		}
	}
	//*********************
}

?>