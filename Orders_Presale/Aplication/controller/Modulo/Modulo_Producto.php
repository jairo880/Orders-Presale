<?php 
require APP.'controller/Modulo/Controlador_Sesion.php';

class Modulo_Producto extends Controller{


	private $_Mdl_Modulo_Producto = null;

	public function __construct() {
		$this->_Mdl_Modulo_Producto = $this->loadModel("M_Modulo_Producto");
		Sesion::init();

	}



	 /*
  **  FN_Listar_Productos
  */
	 public function FN_Listar_Productos(){


	 	$Resultado = $this->_Mdl_Modulo_Producto->FN_Listar_Productos();
	 	echo json_encode($Resultado);
	 }


	 //***********************FN_Listar_Categoria

	 public function FN_Listar_Categoria()
	 {

	 	$Lista_Categoria = $this->_Mdl_Modulo_Producto->FN_Listar_Categoria();
	 	echo json_encode($Lista_Categoria);


	 }
	  //***********************FN_Listar_Promocion

	 public function FN_Listar_Promocion()
	 {

	 	$Lista_Promocion = $this->_Mdl_Modulo_Producto->FN_Listar_Promocion();
	 	echo json_encode($Lista_Promocion);


	 }
	 public function FN_Listar_Promocion_Producto()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));
	 	$FK_ID_Producto = $objDatos->PK_ID_Producto;

	 	$Lista_Promocion_Producto = $this->_Mdl_Modulo_Producto->FN_Listar_Promocion_Producto($FK_ID_Producto);
	 	echo json_encode($Lista_Promocion_Producto);


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
	 		$Imagen = $objDatos ->Imagen;
	 		
	 		

	 		$respuesta_consultar = $this ->_Mdl_Modulo_Producto->FN_Consultar_Producto
	 		(
	 			$Nombre_Producto
	 			);

	 		if($respuesta_consultar){
	 			echo "El producto ya existe";
	 		}
	 		else{

	 			$respuesta = (int) $this ->_Mdl_Modulo_Producto->FN_Registrar_Producto
	 			(
	 				$Nombre_Producto,
	 				$Precio_Producto,
	 				$Categoria,
	 				$Cantidad_Maxima,
	 				$Cantidad_Minima,
	 				$Descripcion_Producto,
	 				$Imagen
	 				); 

	 			if($respuesta > 0){
	 				echo "true";
	 				
	 			}else{
	 				echo "false";
	 			}
	 			
	 		}

	 	}
	 }
	 public function FN_Registrar_Dll_Producto_Promocion()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));

	 	$PK_ID_Producto = $objDatos->PK_ID_Producto;
	 	$FK_ID_Promocion = $objDatos->FK_ID_Promocion;

	 	$Resultado = $this->_Mdl_Modulo_Producto->FN_Registrar_Dll_Producto_Promocion(
	 		$PK_ID_Producto,
	 		$FK_ID_Promocion
	 		);

	 	if($Resultado)
	 	{
	 		echo "true";
	 	}
	 	else
	 	{
	 		echo "false";
	 	}
	 }

	 public function FN_Eliminar_Dll_Promocion_Producto()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));

	 	$PK_ID_Promocion_Producto = $objDatos->PK_ID_Promocion_Producto;

	 	$Resultado = $this->_Mdl_Modulo_Producto->FN_Eliminar_Dll_Promocion_Producto(
	 		$PK_ID_Promocion_Producto
	 		);

	 	if($Resultado)
	 	{
	 		echo "true";
	 	}
	 	else
	 	{
	 		echo "false";
	 	}
	 }

	 public function FN_Modificar_Productos(){

	 	$objDatos = json_decode(file_get_contents("php://input"));


	 	$Nombre_Producto = $objDatos->Nombre_Producto;
	 	$Valor_Produto= $objDatos->Valor_Unitario;
	 	$PK_ID_Producto= $objDatos->PK_ID_Producto;
	 	$Ruta_Imagen_Producto = $objDatos->Ruta_Imagen_Producto;
	 	$Cantidad_Maxima= $objDatos->Cant_Unid_Max;
	 	$Cantidad_Minima= $objDatos->Cant_Unid_Min;
	 	$Descripcion_Producto= $objDatos->Descripcion_Producto;
	 	$PK_ID_Categoria=$objDatos->FK_ID_Categoria;
	 	$Estado_Producto=$objDatos->Estado_Producto;


	 	
	 	



	 	if($Ruta_Imagen_Producto=="" || $PK_ID_Producto=="" || $Valor_Produto=="" || $Nombre_Producto=="" || $Cantidad_Maxima=="" || $Descripcion_Producto=="" || $PK_ID_Categoria==""  || $Estado_Producto ==""){
	 		echo 'false';
	 	}

	 	else if ($Ruta_Imagen_Producto=="" && $PK_ID_Producto=="" && $Valor_Produto=="" && $Nombre_Producto=="" && $Cantidad_Maxima=="" && $Descripcion_Producto=="" && $PK_ID_Categoria==""  && $Cantidad_Minima=="" && $Estado_Producto==""){
	 		echo 'false';
	 	}else{
	 		$Resultado = $this->_Mdl_Modulo_Producto->FN_Modificar_Producto(
	 			$PK_ID_Producto,
	 			$Nombre_Producto,
	 			$Valor_Produto,
	 			$Descripcion_Producto,
	 			$Cantidad_Maxima,
	 			$Cantidad_Minima,
	 			$PK_ID_Categoria,
	 			$Ruta_Imagen_Producto,
	 			$Estado_Producto


	 			);

	 		if($Resultado)
	 		{
	 			echo "true";
	 		}
	 		else
	 		{
	 			echo "Ya_Esta_Actualizado";
	 		}
	 	}





	 }

	 public function FN_Ver_Comentarios_Producto()
	 {
	 	$PK_ID_Producto = json_decode(file_get_contents("php://input"));

	 	$Lista_Comentarios_Producto = $this->_Mdl_Modulo_Producto->FN_Ver_Comentarios_Producto(
	 		$PK_ID_Producto
	 		);
	 	echo json_encode($Lista_Comentarios_Producto);
	 }

	 //Registro de un nuevo comentario
	 public function FN_Registrar_Nuevo_Comentario()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));

	 	if(!isset($_SESSION["Aobj_Datos_Usuario"]))
	 	{

	 		echo "_Sesion_No_Iniciada";


	 	}
	 	else
	 	{
	 		$FK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
	 		$Descripcion = $objDatos->Comentario;
	 		$PK_ID_Producto = $objDatos->PK_ID_Producto;
	 		$Valoracion_Producto = 0;


	 		$Registro_Comentario = $this->_Mdl_Modulo_Producto->FN_Registrar_Nuevo_Comentario(
	 			$FK_ID_Usuario,
	 			$Descripcion,
	 			$PK_ID_Producto,
	 			$Valoracion_Producto
	 			);

	 		if($Registro_Comentario)
	 		{
	 			echo "Comentario_Registrado";
	 		}
	 		else
	 		{
	 			echo "false";
	 		}
	 	}


	 }
	 public function FN_Eliminar_Comentario()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));

	 	

	 	$PK_ID_Comentario = $objDatos;



	 	$Eliminacion_Comentario = $this->_Mdl_Modulo_Producto->FN_Eliminar_Comentario(
	 		$PK_ID_Comentario
	 		);

	 	if($Eliminacion_Comentario)
	 	{
	 		echo "Comentario_Eliminado";
	 	}
	 	else
	 	{
	 		echo "false";
	 	}
	 }


	 public function FN_Modificar_Comentario()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));

	 	

	 	$PK_ID_Comentario = $objDatos->PK_ID_Comentario;
	 	$Descripcion = $objDatos->Descripcion;



	 	$Modificacion_Comentario = $this->_Mdl_Modulo_Producto->FN_Modificar_Comentario(
	 		$PK_ID_Comentario,
	 		$Descripcion
	 		);

	 	if($Modificacion_Comentario)
	 	{
	 		echo "true";
	 	}
	 	else
	 	{
	 		echo "false";
	 	}
	 }

	 public function FN_Valoracion_Comentario()
	 {
	 	$objDatos = json_decode(file_get_contents("php://input"));

	 	if(!isset($_SESSION["Aobj_Datos_Usuario"]))
	 	{

	 		echo "_Sesion_No_Iniciada";

     // //JSON_PRETTY_PRINT
     // //JSON_UNESCAPED_UNICODE PARA CARACTERES ESPECIALES
	 	}
	 	else
	 	{
	 		$PK_ID_Comentario = $objDatos->PK_ID_Comentario;
	 		$PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
	 		// var_dump($PK_ID_Comentario);
	 		// var_dump($PK_ID_Usuario);

	 		$FN_VerificarComentario_Cuenta = $this->_Mdl_Modulo_Producto->FN_VerificarComentario_Cuenta
	 		(
	 			$PK_ID_Comentario,
	 			$PK_ID_Usuario);

	 		if($FN_VerificarComentario_Cuenta)
	 		{

	 			
	 			$FN_Valorar_Comentario_DisLike = $this->_Mdl_Modulo_Producto->FN_Valorar_Comentario_DisLike(
	 				$PK_ID_Comentario,
	 				$PK_ID_Usuario);
	 			if($FN_Valorar_Comentario_DisLike)
	 			{
	 				echo "Valoracion_Removida";
	 			}
	 			else
	 			{
	 				echo "Dislike false";
	 			}
	 		}
	 		else
	 		{

	 			$FN_Valorar_Comentario_Like = $this->_Mdl_Modulo_Producto->FN_Valorar_Comentario_Like(
	 				$PK_ID_Comentario,
	 				$PK_ID_Usuario);

	 			if($FN_Valorar_Comentario_Like)
	 			{
	 				echo "Valoracion_Agregada";
	 			}
	 			else
	 			{
	 				echo "Like false";
	 			}

	 		}
	 	}
	 }



	 //**********************

	}

	?>