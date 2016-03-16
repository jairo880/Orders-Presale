
<?php 

require APP.'controller/Modulo/Controlador_Sesion.php';
class Modulo_Cargar_Imagen extends Controller
{

	private $_Mdl_Cargar_Imagen = null;

	public function __construct() {
		// $this->_Mdl_Cargar_Imagen = $this->loadModel("M_Cargar_Imagen");
		Sesion::init();
	}

	public function FN_Capturar_Imagen_Cargada()
	{
		$ruta=URL.'Public/img/Imagenes_Usuario';//ruta carpeta donde queremos copiar las imágenes 
		$uploadfile_temporal=$_FILES['fichero']['tmp_name']; 
		$uploadfile_nombre=$ruta.$_FILES['fichero']['name']; 

		if (is_uploaded_file($uploadfile_temporal)) 
		{ 
			move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);

		} 
		else 
		{ 

			echo "error"; 
		} 
		$directorio=opendir(URL.'Public/img/Imagenes_Usuario'); 
		while($ficheros=readdir($directorio)) 
		{ 
			$Ruta_Imagen=URL.'Public/img/Imagenes_Usuario'.$ficheros; 
			echo "<img src=".$Ruta_Imagen.">"; 

		} 
	}
}

?>

