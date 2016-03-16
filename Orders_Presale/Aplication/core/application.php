<?php
class Application  {
    # Modulo: almacena el nombre del modulo de la URL

    private $url_module = null;

    # Controller: almacena el nombre del controlador de la URL
    private $url_controller = null;

    # Metodo (del controlador definido), a menudo también llamado "acción"
    private $url_action = null;

    # Array con los parametros o variables pasadas en la URL
    private $url_params = array();

    private $_Mdl_Vistas_Usuario = null;


    /**
     * El siguiente constructor da inicio a la aplicación:
     * Analiza los elementos llamados en la URL
     * Modulo/Controlador/Metodo/Parametros
     */
    public function __construct() {
        // Crear array con las partes de la URL en la variable $url
        $this->splitUrl();
        $this->isRequiredLogin();
        



        
        /**
         * Valida si se esta llamando y existete un modulo, controlador y/o metodo
         * y parametros, si no existe un modulo se redireccional al defaul (inicio.php),
         * lo mismo aplica para el controlador.
         */
        if (!$this->url_module) {
            require APP . 'controller/Inicio/Inicio.php';
            $page = new Inicio();
            $page->Index();
        } else {
            if (!$this->url_controller) {
                require APP . 'controller/Inicio/Inicio.php';
                $page = new Inicio();
                $page->Index();
            } elseif (file_exists(APP . 'controller/' . $this->url_module . '/' . $this->url_controller . '.php')) {
                /* Aqui se comprueba si existe el controlador
                 * Si es así, entonces carga ese archivo y crear este controlador
                 * Ejemplo: si el controlador fuera "car", entonces esta linea se traduce asi: $this->car = new car();
                 */

                require APP . 'controller/' . $this->url_module . '/' . $this->url_controller . '.php';
                $this->url_controller = new $this->url_controller();

                // Verificar la presencia de un método: ¿ese método existen en el controlador?
                if (method_exists($this->url_controller, $this->url_action)) {
                    if (!empty($this->url_params)) {
                        // Llamar al método y pasarle los argumentos si tiene
                        call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                    } else {
                        // Si no hay parámetros, se llama el método sin parámetros, como $this->home->method();
                        $this->url_controller->{$this->url_action}();
                    }
                } else {
                    if (strlen($this->url_action) == 0) {
                        // Si no hay ninguna acción definida: se llama el método Index() por defecto un controlador seleccionado
                        // Recuerda que es obligatorio definir el metodo Index() en cada controlador
                        $this->url_controller->Index();
                    } else {
                        header('location: ' . URL . 'Error/Error');
                    }
                }
            } else {
                header('location: ' . URL . 'Error/Error');
            }
        } // Fin primera validación
    }

// Fin método constructor

    /**
     * Obtener y dividir la URL
     */
    private function splitUrl() {
        if (isset($_GET['url'])) {

            // dividir URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Colocar cada parte de la URL en su respectiva variable
            $this->url_module = isset($url[0]) ? $url[0] : null;
            $this->url_controller = isset($url[1]) ? $url[1] : null;
            $this->url_action = isset($url[2]) ? $url[2] : null;

            // Remueve el Modulo,Controlador y Metodo del URL, para que sea mas sencillo manipular los parametros.
            unset($url[0], $url[1], $url[2]);

            // Almacenar los valores de los parametros
            $this->url_params = array_values($url);

            // Descomenta esto si estas experimentando problemas con la URL:
            // echo 'Module: ' . $this->url_module . '<br>';
            // echo 'Controller: ' . $this->url_controller . '<br>';
            // echo 'Action: ' . $this->url_action . '<br>';
            // echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }

    public function isRequiredLogin()
    {

        $Controladores_Vista = array(
            "",
            "Inicio/Inicio",
            "Error/Error",
            "Cliente/Registro",
            "Cliente/Productos"

            );
        $Controladores_Funcionalidad = array(
         "Modulo/Modulo_Usuario/FN_Capturar_Datos_Usuario_Iniciado",
         "Modulo/Modulo_Producto/FN_Listar_Productos",
         "Cliente/Registro/FN_Registrar_Usuario",
         "Modulo/Modulo_Usuario/FN_Iniciar_Sesion",
         "Modulo/Modulo_Usuario/FN_Habilitar_Estado_Cuenta_Usuario_Login",
         "Modulo/Modulo_CerrarSesion/FN_Cerrar_Sesion",
         "Modulo/Modulo_Usuario/FN_Listar_Modulo_Permisos_Usuario",
         "Administracion/Administracion/FN_Listar_Imagen_Portada",
         "Administracion/Inicio_Administracion/Consultar_Usuarios",
         "Administracion/Administracion/FN_Listar_Usuarios",
         "Administracion/Administracion/FN_Inhabilitar_Estado_Cuenta_Usuario",
         "Modulo/Modulo_Producto/FN_Ver_Comentarios_Producto",
         "Modulo/Modulo_Usuario/FN_Registrar_Permiso_Usuario",
         "Modulo/Modulo_Usuario/FN_Eliminar_Permiso_Usuario",
         "Modulo/Modulo_Producto/FN_Listar_Promocion",
         "Modulo/Modulo_Producto/FN_Listar_Categoria",
         "Modulo/Modulo_Producto/FN_Registrar_Dll_Producto_Promocion",
         "Modulo/Modulo_Producto/FN_Listar_Promocion_Producto",
         "Modulo/Modulo_Producto/FN_Eliminar_Dll_Promocion_Producto",
         "Modulo/Modulo_Usuario/FN_Modificar_Permiso_Usuario",
         "Administracion/Administracion/FN_Habilitar_Estado_Cuenta_Usuario",
         "Administracion/Administracion/FN_Modificar_Datos",
         "Administracion/Administracion/FN_Registrar_Usuario",
         "Administracion/Administracion/FN_Listar_Imagen_Perfil",
         "Administracion/Administracion/FN_Modificar_Imagen_Perfil",
         "Administracion/Administracion/FN_Registrar_Imagen_Perfil",
         "Administracion/Administracion/FN_Registrar_Imagen_Portada",
         "Administracion/Administracion/FN_Eliminar_Imagen_Usuario",
         "Administracion/Administracion/FN_Eliminar_Imagen_Portada",
         "Modulo/Modulo_Promociones/FN_Consultar_Promociones",
         "Modulo/Modulo_Promociones/FN_Modificar_Promociones",
         "Modulo/Modulo_Promociones/FN_Eliminar_Promociones",
         "Modulo/Modulo_Promociones/FN_Registrar_Promocion",
         "Modulo/Modulo_Categoria/FN_Consultar_Categoria",
         "Modulo/Modulo_Categoria/FN_Registrar_Categoria",
         "Modulo/Modulo_Categoria/FN_Eliminar_Categoria",
         "Modulo/Modulo_Categoria/FN_Modificar_Datos",
         "Modulo/Modulo_Producto/FN_Registar_producto",
         "Modulo/Modulo_Usuario/FN_Inhabilitar_Estado_Cuenta",
         "Modulo/Modulo_Recuperar_Contrasenia/FN_Actualizar_Contrasenia",
         "Modulo/Modulo_Usuario/FN_Actualizar_Datos_Tabla_Cliente",
         "Modulo/Modulo_CerrarSesion/FN_Cerrar_Sesion",
         "Modulo/Modulo_Producto/FN_Valoracion_Comentario",
         "Modulo/Modulo_Producto/FN_Registrar_Nuevo_Comentario",
         "Modulo/Modulo_Producto/FN_Modificar_Comentario",
         "Modulo/Modulo_Producto/FN_Eliminar_Comentario"
         );

        $Vista_Solocitada = (!$this->url_module) ? "" : $this->url_module."/";
        $Vista_Solocitada .= (!$this->url_controller) ? "" : $this->url_controller;
        $Vista_Solocitada .= (!$this->url_action) ? "" : "/".$this->url_action;


        if (!in_array($Vista_Solocitada, $Controladores_Vista)) 
        {
           if (!in_array($Vista_Solocitada, $Controladores_Funcionalidad)) 
           {
            //Incluyo el controlador de sesiones
            require APP.'controller/Modulo/Controlador_Sesion.php';
            //Inicializo la conexion
            Sesion::init();
            //Para poder usar la conexion a la base de datos hago una instancia de controller, con el 
            //Que podre usar la clase loadModel
            $Core_Contoller = new Controller();

            $this ->_Mdl_Vistas_Usuario=$Core_Contoller->loadModel("M_Modulo_Usuario");
            //Capturo el valor que posea la variable FK_ID_Rol guardada al iniciar sesion
            $PK_ID_Rol = Sesion::getValue('FK_ID_Rol');
            //Si no existe conexion activa se debolvera a inicio
            if (!isset( $_SESSION["Aobj_Datos_Usuario"] )) 
            {

                header("location: ".URL."Inicio/Inicio");

            }
            //Si la conexion se encuentra activa paso a verificar si el usuario posee permisos para la vista solicitada
            else
            {
                //Consulto la base de datos
                $Respuesta_Consulta_Permisos = $this->_Mdl_Vistas_Usuario->FN_Consultar_Permisos_Rol(
                    $PK_ID_Rol,
                    $Vista_Solocitada
                    );
                if($Respuesta_Consulta_Permisos)
                {
                        //Carga la vista 
                }
                else
                {
                    //Si la consulta a la base de datos no debolvio un resultado por la consulta
                    // se devuelve a la vista inicio
                    header("location: ".URL."Inicio/Inicio");
                }



            }
        }
    }

}


}
