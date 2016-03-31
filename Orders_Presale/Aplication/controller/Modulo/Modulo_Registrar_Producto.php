<?php 

class Modulo_Registrar_Producto extends controller {


	private $_Mdl_Registrar_Producto = null;
	public function __construct() {
		$this->_Mdl_Registar_Producto = $this->loadModel("M_Registrar_Producto");
	}


	public function FN_Listar_Categoria()
	{

		$Lista_Categoria = $this->_Mdl_Registar_Producto->FN_Listar_Categoria();
		echo json_encode($Lista_Categoria);


	}

	public function FN_Registar_producto(){

		$objDatos = json_decode(file_get_contents("php://input"));

		if(!isset($objDatos )){
			echo 'Los datos no llegaron';
		}
		else{
			$Nombre_Producto = $objDatos ->Nombre_Producto; 
			$Precio_Producto = $objDatos ->Precio_Producto;
			$Descripcion_Producto = $objDatos ->Descripcion_Producto;
			$Cantidad_Maxima = $objDatos ->Cantidad_Maxima;
			$Cantidad_Minima = $objDatos ->Cantidad_Minima;
			$Categoria = (int)$objDatos->Categoria;
			$Imagen = "Imagen"; 
 			

			$respuesta_consultar = $this ->_Mdl_Registar_Producto->FN_Consultar_Producto
			(
				$Nombre_Producto
			);

			if($respuesta_consultar){
				echo "El producto ya existe";
			}
			else{

				$respuesta = $this ->_Mdl_Registar_Producto->FN_Registrar_Producto
			(
				$Nombre_Producto,
				$Precio_Producto,
				$Categoria,
				$Cantidad_Maxima,
				$Cantidad_Minima,
				$Descripcion_Producto,
				$Imagen
				); 

			if($respuesta = true){
				echo "true";
			}else{
				echo "false";
			}
			
			}

		}
	}



}

?>