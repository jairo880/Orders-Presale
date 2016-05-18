<?php
//_*Este archivo es un crud que se puede reutilizar, es necesario para su uso correcto, saber que datos son necesarios en cada proceso, y como se deben de mandar estos datos, para saber como mandar correctamente los datos necesarios, revizar el archivo Controlador_Ejemplo_Crud.js , Modulo_Ejemplo_Crud.php y M_Ejemplo_Crud.php
class CRUD extends controller{
	//_*===================CRUD REUTILIZABLE CON PHP Y ANGULAR=================================================
	private $_Mdl_Crud = null;
	//_*
	//_*Constructor para crear la instancia del modelo
	public function __construct()
	{
		
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			die();
		}
		parent::__construct();
		//_* 0- Primero que todo debo poder indicar cual archivo de modelo sera cargado, por eso se ideo la manera de indicar al constructor cual modelo cargar.
		//_* V//_*
		$Objeto_Datos = json_decode( file_get_contents("php://input" ));
		if( !isset( $Objeto_Datos->Nombre_Modelo ) ){
			echo "Error fatal: no se indico cual archivo tipo modelo se debia cargar, verifica bien el proceso de envio de datos";
			exit();
		}
		else
		{
			$Nombre_Modelo = $Objeto_Datos->Nombre_Modelo;
			$this->_Mdl_Crud = $this->loadModel( $Nombre_Modelo );

		}
		
	}
	public function CRUD_FN_Registrar()
	{
		//_*Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//_*
		$Objeto_Datos = json_decode( file_get_contents("php://input") );
		//_*
		//_*Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//_*No se encontraron datos
			echo 'false';
		}

		//_* Si se han encontrado datos en la variable $Objeto_Datos
		else{
			//_*  1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//_* 
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//_* 
				//_* No se encontraron datos
				//_* 
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//_* Variable que posee el nombre del modelo que se estara llamando.
				//_* 
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				//_* 
				//_*  2- Separo los nombres de las variables a usar en el proceso, es importante tenere en cuenta que cada variable debe estar separada por una coma (,) a la hora de mandarla desde angular, estas variables quedaran guardadas en un array, ademas verifico si la variable $Objeto_Variables_Para_Usar existe, si no existe retornare false, ya que el proceso siguiente necesita tenere esta informacion
				if( !isset( $Objeto_Datos->Objeto_Variables_Para_Usar ) ){
					//_* No se encontro la variable
					//_* 
					echo 'No se encontro la variable: Objeto_Variables_Para_Usar';
				}
				else
				{
					//_* Variable tipo array que posee en cada posicion el nombre de una variable.
					//_*
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//_*
					//_* 3- Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//_*
					$Objeto_Valor_Variables = array();

					//_* Para iniciar un contador con el cual podre recorrer un array
					//_*
					$Posicion_Array = 0;
					//_*
					//_* 4- Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ($Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ( $Objeto_Datos as $Indice_Secundario => $Valor_Secundario ) {
							//_* Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								//_* Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						//_* Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//_*
					//_* 5- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//_*
					$Respuesta_Registro = $this ->_Mdl_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );

					if($Respuesta_Registro){
						echo "true";
					}else{
						echo "false";
					}
				}
			}
		}
	}
	Public function CRUD_FN_Listar()
	{
		//_* Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//_*
		$Objeto_Datos = json_decode( file_get_contents("php://input") );
		//_*
		//_* Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//_* No se encontraron datos
			echo 'false';
		}
		else
		{
			//_*  1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//_* 
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//_* 
				//_* No se encontraron datos
				//_* 
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//_* 2- En caso de que la funcion listar halla recibido parametros, ya sea para alguna condicion impuesta al select, verifico si se estan mandando variables para leer, en caso de que se halla mandado Objeto_Variables_Para_Usar paso a un proceso donde separo las variables y  las mando al modelo, en caso de que no se halla mandado, tansolo hago un listar comun
				if( isset( $Objeto_Datos->Objeto_Variables_Para_Usar ) ){
					//_* Variable que posee el nombre del modelo que se estara llamando.
					//_* 
					$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;

					//_* Variable tipo array que posee en cada posicion el nombre de una variable.
					//_* 
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//_* 
					//_*  2-0 Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//_* 
					$Objeto_Valor_Variables = array();

					//_* Para iniciar un contador con el cual podre recorrer un array
					//_*
					$Posicion_Array = 0;
					//_*
					//_* 2-1 Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ($Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ( $Objeto_Datos as $Indice_Secundario => $Valor_Secundario ) {
							//_* Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								//_* Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						//_* Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//_*
					//_* 2-2 Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//_*
					$Respuesta_Modificacion = $this ->_Mdl_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );
					echo json_encode( $Respuesta_Modificacion );
				}
				else
				{

					//_* Variable que posee el nombre del modelo que se estara llamando.
					//_* 
					$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
					//_*  3- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//_*
					$Respuesta_Listar = $this->_Mdl_Crud->$Nombre_Funcion_Modelo();
					echo json_encode( $Respuesta_Listar );
				}
			}
		}
	}
	Public function CRUD_FN_Eliminar()
	{
		//_* Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//_*
		$Objeto_Datos = json_decode( file_get_contents("php://input") );
		//_* 
		//_* Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//_* No se encontraron datos
			echo 'false';
		}

		//_* Si se han encontrado datos en la variable $Objeto_Datos
		else{
			//_*  1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//_* 
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//_* 
				//_* No se encontraron datos
				//_* 
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//_* Variable que posee el nombre del modelo que se estara llamando.
				//_* 
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				//_* 
				//_*  2- Separo los nombres de las variables a usar en el proceso, es importante tenere en cuenta que cada variable debe estar separada por una coma (,) a la hora de mandarla desde angular, estas variables quedaran guardadas en un array, ademas verifico si la variable $Objeto_Variables_Para_Usar existe, si no existe retornare false, ya que el proceso siguiente necesita tenere esta informacion
				if( !isset( $Objeto_Datos->Objeto_Variables_Para_Usar ) ){
					//_* No se encontro la variable
					//_* 
					echo 'No se encontro la variable: Objeto_Variables_Para_Usar';
				}
				else
				{
					//_* Variable tipo array que posee en cada posicion el nombre de una variable.
					//_* 
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//_* 
					//_*  3- Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//_* 
					$Objeto_Valor_Variables = array();

					//_*  Para iniciar un contador con el cual podre recorrer un array
					//_* 
					$Posicion_Array = 0;
					//_* 
					//_*  4- Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ($Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ( $Objeto_Datos as $Indice_Secundario => $Valor_Secundario ) {
							//_*  Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								//_*  Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						//_*  Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//_* 
					//_*  5- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//_* 
					$Respuesta_Eliminacion = $this->_Mdl_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );

					if($Respuesta_Eliminacion){
						echo "true";
					}else{
						echo "false";
					}
				}
			}
		}
	}
	Public function CRUD_FN_Modificar()
	{
		//_* Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//_*
		$Objeto_Datos = json_decode( file_get_contents("php://input") );
		//_* 
		//_* Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//_* No se encontraron datos
			echo 'false';
		}

		//_* Si se han encontrado datos en la variable $Objeto_Datos
		else{
			//_*  1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//_* 
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//_* 
				//_* No se encontraron datos
				//_* 
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//_* Variable que posee el nombre del modelo que se estara llamando.
				//_* 
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				//_* 
				//_*  2- Separo los nombres de las variables a usar en el proceso, es importante tenere en cuenta que cada variable debe estar separada por una coma (,) a la hora de mandarla desde angular, estas variables quedaran guardadas en un array, ademas verifico si la variable $Objeto_Variables_Para_Usar existe, si no existe retornare false, ya que el proceso siguiente necesita tenere esta informacion
				if( !isset( $Objeto_Datos->Objeto_Variables_Para_Usar ) ){
					//_* No se encontro la variable
					//_* 
					echo 'No se encontro la variable: Objeto_Variables_Para_Usar';
				}
				else
				{
					//_* Variable tipo array que posee en cada posicion el nombre de una variable.
					//_* 
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//_* 
					//_*  3- Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//_* 
					$Objeto_Valor_Variables = array();

					//_*  Para iniciar un contador con el cual podre recorrer un array
					//_* 
					$Posicion_Array = 0;
					//_* 
					//_*  4- Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ($Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ( $Objeto_Datos as $Indice_Secundario => $Valor_Secundario ) {
							//_*  Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								//_*  Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						//_*  Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//_* 
					//_*  5- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//_* 
					$Respuesta_Modificacion = $this ->_Mdl_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );

					if($Respuesta_Modificacion){
						echo "true";
					}else{
						echo "false";
					}
				}
			}
		}
	}
//*===================CRUD REUTILIZABLE CON PHP Y ANGULAR=================================================
}
?>
