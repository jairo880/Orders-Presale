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
    //_* Crear array con las partes de la URL en la variable $url
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

        //_* Verificar la presencia de un método: ¿ese método existen en el controlador?
        if (method_exists($this->url_controller, $this->url_action)) {
          if (!empty($this->url_params)) {
            //_* Llamar al método y pasarle los argumentos si tiene
            call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
          } else {
            //_* Si no hay parámetros, se llama el método sin parámetros, como $this->home->method();
            $this->url_controller->{$this->url_action}();
          }
        } else {
          if (strlen($this->url_action) == 0) {
            //_* Si no hay ninguna acción definida: se llama el método Index() por defecto un controlador seleccionado
            //_* Recuerda que es obligatorio definir el metodo Index() en cada controlador
            $this->url_controller->Index();
          } else {
            header('location: ' . URL . 'Error/Error');
          }
        }
      } else {
        header('location: ' . URL . 'Error/Error');
      }
    } //_* Fin primera validación
  }

  //_* Fin método constructor

  /**
  * Obtener y dividir la URL
  */
  private function splitUrl() {
    if (isset($_GET['url'])) {

      //_* dividir URL
      $url = trim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);

      //_* Colocar cada parte de la URL en su respectiva variable
      $this->url_module = isset($url[0]) ? $url[0] : null;
      $this->url_controller = isset($url[1]) ? $url[1] : null;
      $this->url_action = isset($url[2]) ? $url[2] : null;

      //_* Remueve el Modulo,Controlador y Metodo del URL, para que sea mas sencillo manipular los parametros.
      unset($url[0], $url[1], $url[2]);

      //_* Almacenar los valores de los parametros
      $this->url_params = array_values($url);

      //_* Descomenta esto si estas experimentando problemas con la URL:
      //_* echo 'Module: ' . $this->url_module . '<br>';
      //_* echo 'Controller: ' . $this->url_controller . '<br>';
      //_* echo 'Action: ' . $this->url_action . '<br>';
      //_* echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
    }
  }

  public function isRequiredLogin()
  {
    $Controladores_Vista = array(
      "",
      "Inicio/Inicio",
      "Error/Error",
      "Cliente/Registro",
      "Cliente/Productos",
      "Inicio"
      );

    $Controladores_Funcionalidad = array(
      "Modulo/CRUD/CRUD_FN_Registrar",
      "Modulo/CRUD/CRUD_FN_Listar",
      "Modulo/CRUD/CRUD_FN_Eliminar",
      "Modulo/CRUD/CRUD_FN_Modificar",


      "Modulo/Modulo_Ejemplo_Crud/FN_Registrar_Ejemplo",
      "Modulo/Modulo_Ejemplo_Crud/FN_Listar_Ejemplo",
      "Modulo/Modulo_Ejemplo_Crud/FN_Modificar_Ejemplo",
      "Modulo/Modulo_Ejemplo_Crud/FN_Eliminar_Ejemplo",


      "Modulo/Administracion_Procesos/FN_Actualizar_Estado_Orden",
      "Modulo/Administracion_Procesos/FN_Enviar_Promociones",
      "Modulo/Administracion_Procesos/FN_Enviar_Promociones",

      "Modulo/Modulo_Usuario/FN_Cerrar_Sesion",
      "Modulo/Modulo_Usuario/FN_Capturar_Datos_Usuario_Iniciado",
      "Modulo/Modulo_Usuario/FN_Registrar_Usuario",
      "Modulo/Modulo_Usuario/FN_Modificar_Comentario",
      "Modulo/Modulo_Usuario/FN_Valoracion_Comentario",
      "Modulo/Modulo_Usuario/FN_Eliminar_Comentario",
      "Modulo/Modulo_Usuario/FN_Registrar_Nuevo_Comentario",
      "Modulo/Modulo_Usuario/FN_Ver_Comentarios_Producto",
      "Modulo/Modulo_Usuario/FN_Verificacion_Sesion",
      "Modulo/Modulo_Usuario/FN_Listar_Detalles_Ordene_Enviada",
      "Modulo/Modulo_Usuario/FN_Eliminar_Orden_Enviada",
      "Modulo/Modulo_Usuario/FN_Habilitar_Estado_Cuenta_Usuario_Login",
      "Modulo/Modulo_Usuario/FN_Iniciar_Sesion",
      "Modulo/Modulo_Usuario/FN_Actualizar_Datos_Tabla_Cliente",
      "Modulo/Modulo_Usuario/FN_Inhabilitar_Estado_Cuenta",
      "Modulo/Modulo_Usuario/FN_Envio_Orden",
      "Modulo/Modulo_Usuario/FN_Envio_Orden_Guardado_Datos_Productos",
      "Modulo/Modulo_Usuario/FN_Listar_Ordenes_Enviadas",
      "Modulo/Modulo_Usuario/FN_Recuperar_contrasenia",
      "Modulo/Modulo_Usuario/FN_Actualizar_Contrasenia",

      "Administracion/Inicio_Administracion/Consultar_Usuarios",
      "Administracion/Administracion/FN_Listar_Usuarios",
      "Administracion/Administracion/FN_Inhabilitar_Estado_Cuenta_Usuario",
      "Administracion/Administracion/FN_Habilitar_Estado_Cuenta_Usuario",
      "Administracion/Administracion/FN_Modificar_Datos",
      "Administracion/Administracion/FN_Modificar_Datos_Tipo_Cliente",

      "Modulo/Modulo_Usuario/FN_Eliminar_Pedido_Enviado",
      "Modulo/Modulo_Usuario/FN_Listar_Pedidos_Enviados",
      "Modulo/Modulo_Usuario/FN_Listar_Detalles_Pedido_Enviado",

      "Modulo/Modulo_Usuario/FN_Asociacion_Productos_Lista_Guardado_Datos_Producto",
      "Modulo/Modulo_Usuario/FN_Asociacion_Productos_Lista",

      "Modulo/Modulo_Usuario/FN_Modificar_Dtll_Lista_Usuario",

      "Administracion/Administracion/FN_Registrar_Usuario",

      "Modulo/Modulo_Usuario/FN_Envio_Mensaje_Guardado_Datos",
      "Modulo/Modulo_Usuario/FN_Envio_Mensaje",

      "Modulo/Modulo_Usuario/FN_Modificar_Estado_Buson_Mensajes",
      "Modulo/Modulo_Usuario/FN_Modificar_Estado_Mensaje_Seleccion_Multiple_Eliminacion",
      "Modulo/Modulo_Usuario/FN_Restaurar_Mensajes",
      "Modulo/Modulo_Usuario/FN_Verificacion_Cuenta",
      "Modulo/Modulo_Usuario/FN_Registrar_Nuevo_Comentario_APP_Movil",
      "Modulo/Modulo_Usuario/FN_Verificacion_Sesion",
      "Modulo/Modulo_Usuario/FN_Verificacion_Cuenta_APP_Movil",
      "Modulo/Modulo_Usuario/FN_Verificacion_Sesion_APP_Movil"

      );


    $Vista_Solocitada = (!$this->url_module) ? "" : $this->url_module."/";
    $Vista_Solocitada .= (!$this->url_controller) ? "" : $this->url_controller;
    $Vista_Solocitada .= (!$this->url_action) ? "" : "/".$this->url_action;


    if (!in_array($Vista_Solocitada, $Controladores_Funcionalidad))
    {

      //_*Incluyo el controlador de sesiones
      require APP.'controller/Modulo/Controlador_Sesion.php';
      //_*Inicializo la conexion
      Sesion::init();
      //_*Si no existe conexion activa se debolvera a inicio
      //_*¿No hay sesion activa?
      if (!isset( $_SESSION["Aobj_Datos_Usuario"] ))
      {
        if (!in_array($Vista_Solocitada, $Controladores_Vista))
        {

          header("location: ".URL."Inicio/Inicio");
        }



      }
      //_*Si la conexion se encuentra activa paso a verificar si el usuario posee permisos para la vista solicitada
      else
      {

        //_*Para poder usar la conexion a la base de datos hago una instancia de controller, con el
        //_*Que podre usar la clase loadModel
        $Core_Contoller = new Controller();

        $this ->_Mdl_Vistas_Usuario=$Core_Contoller->loadModel("M_Modulo_Usuario");
        //_*Capturo el valor que posea la variable FK_ID_Rol guardada al iniciar sesion
        $PK_ID_Rol = Sesion::getValue('FK_ID_Rol');
        //_*Consulto la base de datos
        $Respuesta_Consulta_Permisos = $this->_Mdl_Vistas_Usuario->FN_Consultar_Permisos_Rol(
          $Vista_Solocitada,
          $PK_ID_Rol
          );
        if($Respuesta_Consulta_Permisos)
        {
        //_*Dejo que lo redireccione para la pagina que solicito, ya que en la base de datos el usuario pose permisos

        }
      //_*Esta condicional es para impedir que el usuario ya logeado, ingrese a paginas que no necesita, como la pagina registro
        else if($Vista_Solocitada == ""  ||$Vista_Solocitada == "Inicio"  || $Vista_Solocitada == "Cliente/Registro" || $Vista_Solocitada == "Cliente/Productos" || $Vista_Solocitada == "Inicio/Inicio")
        {
        //_*Si el usuario es un administrador se rideccionara para la pagina principal de administracion
          if($PK_ID_Rol == 1 || $PK_ID_Rol == 2){

            header("location: ".URL."Administracion/Guia_Proyecto");
          }
        //_*si es un cliente se redirecciona a inicio

        }

        else if($Vista_Solocitada == "Cliente/Registro")
        {
          if($PK_ID_Rol == 3)
          {
            header("location: ".URL."Inicio/Inicio");
          }
        }
        else
        {
          if($PK_ID_Rol == 1 || $PK_ID_Rol == 2){

            header("location: ".URL."Administracion/Guia_Proyecto");
          }
          if($PK_ID_Rol == 3)
          {
            header("location: ".URL."Inicio/Inicio");
          }
        }


      }



    }


  }


}
