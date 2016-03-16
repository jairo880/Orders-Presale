<?php

class Controller {

    /**
     * @var Variable de conexión a la base de datos:
     */
    public $db = null;


  

    /**
     * @var Variable que contiene el modelo al que pertenece el controlador solicitado:
     */
    // public $model = null;

    function __construct() {
        $this->openDatabaseConnection();
    }

    /**
     * Abrir la conexión a la base de datos teniendo en cuenta
     * su configuración en el archivo config.php:
     */
    private function openDatabaseConnection() {
        // (Opcional) Opciones de la conexion PDO. En este caso se establece que el 'fetch mode' de PDO
        // por defecto será "Objects", esto significa que todas los resultados de los querys serán tratados
        // como objetos, por ejemplo:
        # $resultado_query->usuario; // Obtiene el campo 'usuario' del resultado del query.
        # $resultado_query->contraseña; // Obtiene el campo 'contraseña' del resultado del query.
        // 'FETCH_ASSOC' puede ser otra opción, da como resultado:
        # $resultado_query['usuario']; // Obtiene el campo 'usuario' del resultado del query.
        # $resultado_query['contraseña']; // Obtiene el campo 'contraseña' del resultado del query.
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // Generar una conexión a la base de datos usando el conector PDO:
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * La siguiente función instancia un objeto del modelo solicitado.
     * Dicho de otra forma, carga el modelo asociado al presente controlador.
     * @return objeto del modelo
     */
    public function loadModel($nombreModelo) {
        require APP . 'model/' . $nombreModelo . '.php';
        self::openDatabaseConnection();
        // Crear un nuevo "modelo" (al cual se le pasa la conexión a la base de datos)
        return new $nombreModelo($this->db);
    }

}
