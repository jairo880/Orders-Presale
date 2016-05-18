<?php 

require APP.'controller/Modulo/Controlador_Sesion.php';
class Modulo_Pedido extends controller{

	private $_Mdl_Modulo_Pedido = null;

	public function __construct() {
		$this->_Mdl_Modulo_Pedido = $this->loadModel("M_Modulo_Pedido");
		Sesion::init();

	}

	public function FN_Listar_Pedidos(){

		$resultado = $this->_Mdl_Modulo_Pedido->FN_Listar_Pedidos();
		echo json_encode($resultado);
	}


	public function FN_Modificar_Estado_Pedido(){

		  $objDatos = json_decode(file_get_contents("php://input"));

		  if (!isset($objDatos)){
		  		echo 'Los datos no llegarón';
		  }else{
		  	$PK_ID_Pedido = $objDatos->PK_ID_Pedido; 
		  	$Estado_pedido = $objDatos->Estado_pedido; 

		  	$Actualizacion_Estado_Pedido = $this->_Mdl_Modulo_Pedido->FN_Modificar_Estado_Pedido(
		  	$PK_ID_Pedido,
		  	$Estado_pedido
		  	);


    		if ($Actualizacion_Estado_Pedido) {
      			echo "true";
   		    }else {
      			echo "false";
   			 }

		  }
	}


}

?>