<?php
class Modulo_Ejemplo_Crud extends controller{
//======================CRUD EJEMPLO========================
	private $_Mdl_Ejemplo_Crud = null;
	public function __construct()
	{
		// 0- Primero que todo debo poder indicar cual archivo de modelo sera cargado, por eso se ideo la manera de indicar al constructor cual modelo cargar.
		//Variable que posee el nombre del archivo que se estara llamando, este archivo es el modelo donde estan los procedimientos para la base de datos.
		//
		$Objeto_Datos = json_decode( file_get_contents("php://input" ));
		if( !isset( $Objeto_Datos->Nombre_Modelo ) ){
			 echo "Error fatal: no se indico cual archivo tipo modelo se debia cargar, verifica bien el proceso de envio de datos";
			 exit();
		}
		else
		{
			$Nombre_Modelo = $Objeto_Datos->Nombre_Modelo;
			$this->_Mdl_Ejemplo_Crud = $this->loadModel( $Nombre_Modelo );

	    }
	}
	public function FN_Registrar_Ejemplo()
	{
		//Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//
		$Objeto_Datos = json_decode( file_get_contents("php://input" ));
		//
		//Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//No se encontraron datos
			echo 'false';
		}

		//Si se han encontrado datos en la variable $Objeto_Datos
		else{
			// 1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//
				//No se encontraron datos
				//
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//Variable que posee el nombre del modelo que se estara llamando.
				//
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				//
				// 2- Separo los nombres de las variables a usar en el proceso, es importante tenere en cuenta que cada variable debe estar separada por una coma (,) a la hora de mandarla desde angular, estas variables quedaran guardadas en un array, ademas verifico si la variable $Objeto_Variables_Para_Usar existe, si no existe retornare false, ya que el proceso siguiente necesita tenere esta informacion
				if(!isset( $Objeto_Datos->Objeto_Variables_Para_Usar )){
					//No se encontro la variable
					//
					echo 'No se encontro la variable: Objeto_Variables_Para_Usar';
				}
				else
				{
					//Variable tipo array que posee en cada posicion el nombre de una variable.
					//
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//
					// 3- Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//
					$Objeto_Valor_Variables = array();

					// Para iniciar un contador con el cual podre recorrer un array
					//
					$Posicion_Array = 0;
					//
					// 4- Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ( $Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ($Objeto_Datos as $Indice_Secundario => $Valor_Secundario) {
							// Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								// Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						// Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//
					// 5- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//
					$Respuesta_Registro = $this ->_Mdl_Ejemplo_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );

					if($Respuesta_Registro){
						echo "true";
					}else{
						echo "false";
					}
				}
			}
		}
	}
	Public function FN_Listar_Ejemplo()
	{
		//Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//
		$Objeto_Datos = json_decode( file_get_contents("php://input" ));
		//
		//Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//No se encontraron datos
			echo 'false';
		}
		else
		{
			// 1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//
				//No se encontraron datos
				//
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//Variable que posee el nombre del modelo que se estara llamando.
				//
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				// 2- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
				// 
				$Listar_Ejemplo = $this->_Mdl_Ejemplo_Crud->$Nombre_Funcion_Modelo();
				echo json_encode($Listar_Ejemplo);
			}
		}
	}
	Public function FN_Eliminar_Ejemplo()
	{
		//Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//
		$Objeto_Datos = json_decode( file_get_contents("php://input" ));
		//
		//Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//No se encontraron datos
			echo 'false';
		}

		//Si se han encontrado datos en la variable $Objeto_Datos
		else{
			// 1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//
				//No se encontraron datos
				//
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//Variable que posee el nombre del modelo que se estara llamando.
				//
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				//
				// 2- Separo los nombres de las variables a usar en el proceso, es importante tenere en cuenta que cada variable debe estar separada por una coma (,) a la hora de mandarla desde angular, estas variables quedaran guardadas en un array, ademas verifico si la variable $Objeto_Variables_Para_Usar existe, si no existe retornare false, ya que el proceso siguiente necesita tenere esta informacion
				if(!isset( $Objeto_Datos->Objeto_Variables_Para_Usar )){
					//No se encontro la variable
					//
					echo 'No se encontro la variable: Objeto_Variables_Para_Usar';
				}
				else
				{
					//Variable tipo array que posee en cada posicion el nombre de una variable.
					//
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//
					// 3- Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//
					$Objeto_Valor_Variables = array();

					// Para iniciar un contador con el cual podre recorrer un array
					//
					$Posicion_Array = 0;
					//
					// 4- Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ( $Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ($Objeto_Datos as $Indice_Secundario => $Valor_Secundario) {
							// Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								// Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						// Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//
					// 5- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//
					$Respuesta_Eliminacion = $this->_Mdl_Ejemplo_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );

					if($Respuesta_Eliminacion){
						echo "true";
					}else{
						echo "false";
					}
				}
			}
		}
	}
	Public function FN_Modificar_Ejemplo()
	{
		//Recibo los datos mandados desde angular, y los almaceno en $Objeto_Datos
		//
		$Objeto_Datos = json_decode( file_get_contents("php://input" ));
		//
		//Verifico si la variable $Objeto_Datos esta vacia
		if( !isset( $Objeto_Datos ) ){
			//No se encontraron datos
			echo 'false';
		}

		//Si se han encontrado datos en la variable $Objeto_Datos
		else{
			// 1- Capturo el nombre de la funcion del modelo que se va a ejecutar, verifico si esta existe, en caso de no encontrarse retornare false, ya que el proceso siguiente necesita tener claro cual modelo estara llamando.
			//
			if( !isset( $Objeto_Datos->Nombre_Funcion_Modelo ) ){
				//
				//No se encontraron datos
				//
				echo 'No se encontro la variable: Nombre_Funcion_Modelo';
			}
			else 
			{
				//Variable que posee el nombre del modelo que se estara llamando.
				//
				$Nombre_Funcion_Modelo = $Objeto_Datos->Nombre_Funcion_Modelo;
				//
				// 2- Separo los nombres de las variables a usar en el proceso, es importante tenere en cuenta que cada variable debe estar separada por una coma (,) a la hora de mandarla desde angular, estas variables quedaran guardadas en un array, ademas verifico si la variable $Objeto_Variables_Para_Usar existe, si no existe retornare false, ya que el proceso siguiente necesita tenere esta informacion
				if(!isset( $Objeto_Datos->Objeto_Variables_Para_Usar )){
					//No se encontro la variable
					//
					echo 'No se encontro la variable: Objeto_Variables_Para_Usar';
				}
				else
				{
					//Variable tipo array que posee en cada posicion el nombre de una variable.
					//
					$Objeto_Nombre_Variables = explode( ",", $Objeto_Datos->Objeto_Variables_Para_Usar );
					//
					// 3- Creo un array $Objeto_Valor_Variables, el cual contendra en cada una de sus posicion el valor de cada variable, esta variable sera la que se mandara al modelo y contendra la informacion que queremos usar.
					//
					$Objeto_Valor_Variables = array();

					// Para iniciar un contador con el cual podre recorrer un array
					//
					$Posicion_Array = 0;
					//
					// 4- Guardar en $Objeto_Valor_Variables los valores de cada una de las variables mandadas desde angular, para realizar esto recorro  $Objeto_Nombre_Variables el cual contiene los nombres de las variables a usar, y recorro $Objeto_Datos el cual posee los datos recibidos desde angular.
					foreach ( $Objeto_Nombre_Variables as $Valor_Primario ) {

						foreach ($Objeto_Datos as $Indice_Secundario => $Valor_Secundario) {
							// Realizo una comparacion entre un nombre guardado en $Objeto_Nombre_Variables y el indice de una variable de $Objeto_Datos, la comparacion consiste en saber si hay algun indice  en $Objeto_Datos que concuerde con el nombre de la variable guardada en $Objeto_Nombre_Variables.
							if($Valor_Primario == $Indice_Secundario)
							{
								// Guardo el valor en $Objeto_Valor_Variables la cual sera enviada al modelo, no guardo el indice, guardo el valor,  por eso el segundo foreach usa la segunda forma de crear un foreach: $Objeto_Datos as $Indice_Secundario => $Valor_Secundario, $Indice_Secundario para comparar los indices, $Valor_Secundario para tomar el valor del indice
								$Objeto_Valor_Variables[ $Posicion_Array ] = $Valor_Secundario;
							}

						}
						// Cada vez que se recorre el foreach, incremento $Posicion_Array, esta variable sera con la que podre guardar en cada una de las posicion de $Objeto_Valor_Variables los valores de las variables.
						$Posicion_Array ++;

					}
					//
					// 5- Hago uso de la variable $Nombre_Funcion_Modelo para poder llamar al modelo solicitado,  y hago uso de la variable $Objeto_Valor_Variables para mandar la info a usar en el proceso.
					//
					$Respuesta_Modificacion = $this ->_Mdl_Ejemplo_Crud->$Nombre_Funcion_Modelo( $Objeto_Valor_Variables );

					if($Respuesta_Modificacion){
						echo "true";
					}else{
						echo "false";
					}
				}
			}
		}
	
	}
//======================CRUD EJEMPLO========================
}
?>
