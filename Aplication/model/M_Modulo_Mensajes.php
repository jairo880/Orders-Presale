<?php
class M_Modulo_Mensajes{
	function __construct( $db ) {
		try {
			$this->db = $db;
		} catch ( PDOException $e ) {
			exit( 'Error al intentar conectar con la Base de Datos en M_Modulo_Mensajes:' + $e );
		}
	}

	//_* Listar todos los usuarios
	public function FN_Listar_Usuarios( $Objeto_Valor_Variables ) {
		$sql = "CALL `spListarCuentas_Usuario_Datos_Cuenta`(?);";
		$query = $this->db->prepare( $sql );
		//_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
		$Indice = 1;
		//_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		return $query->fetchAll();
	}


	//_* Funcion para actualizar el nombre de una lista
	public function FN_Listar_Buson_Mensajes( $Objeto_Valor_Variables )
	{
		$sql = "CALL `spListarBuson_mensajes_usuario_Propios`(?);";
		$query = $this->db->prepare( $sql );
		//_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
		$Indice = 1;
		//_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		return $query->fetchAll();
	}
//_* Funcion para actualizar el nombre de una lista
	public function FN_Listar_Buson_Mensajes_Bandeja_Entrada( $Objeto_Valor_Variables )
	{
		$sql = "CALL `spListarBuson_mensajes_Buson_Entrada`(?);";
		$query = $this->db->prepare( $sql );
		//_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
		$Indice = 1;
		//_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		return $query->fetchAll();
	}

	//_* Funcion para listar los mensajes del  buson de mensajes
	public function FN_Listar_Buson_Mensajes_Eliminados( $Objeto_Valor_Variables )
	{
		$sql = "CALL `spListarBuson_mensajes_usuario_Eliminados`(?);";
		$query = $this->db->prepare( $sql );
		//_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
		$Indice = 1;
		//_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		return $query->fetchAll();
	}



	//_* Funcion para actualizar el estado de un mensaje
	public function FN_Modificar_Estado_Buson_Mensajes( $Objeto_Valor_Variables )
	{
		$sql = "CALL `spModificar_EstadoBuson_mensajes_usuario`(?);";
		$query = $this->db->prepare( $sql );
		//_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
		$Indice = 1;
		//_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		if ($query->rowCount() > 0) {

			return true;
		}
		else
		{
			return false;
		}
	}
	//_* Funcion para Eliminar un mensaje completamente
	public function FN_Eliminar_Buson_Mensajes( $Objeto_Valor_Variables )
	{
		$sql = "CALL `spEliminarBuson_mensajes_usuario`(?);";
		$query = $this->db->prepare( $sql );
		//_*  VARIABLE PARA EL IDENTIFICADOR DEL PARAMETRO
		$Indice = 1;
		//_* EXTRAIGO LOS VALORES QUE POSEE LA VARIABLE MANDADA DESDE EL CONTROLADOR
		foreach ( $Objeto_Valor_Variables as $Valor ) {
			$query->bindValue( $Indice, $Valor );
			$Indice ++;
		}
		$query->execute();
		if ($query->rowCount() > 0) {

			return true;
		}
		else
		{
			return false;
		}
	}
    //************
}


?>
