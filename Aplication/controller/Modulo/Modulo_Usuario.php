<?php
require APP.'controller/Modulo/Controlador_Sesion.php';
class Modulo_Usuario extends Controller
{
  private $_Mdl_Usuario = null;
  public function __construct() {

    $this->_Mdl_Usuario = $this->loadModel( "M_Modulo_Usuario" );
    Sesion::init();
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];

      // Sesion::init();
    if($method == "OPTIONS") {
      die();
    }
    parent::__construct();



  }
  //_* Funcion para iniciar sesion
  public function FN_Iniciar_Sesion() {
    $objDatos = json_decode( file_get_contents( "php://input" ) );
    if (!isset( $objDatos )) {
      //_*No se encontraron datos
      echo 'false';
    }else {
      //_*Datos necesario para el login
      $Usuario_Nombre = $objDatos->Usuario_Nombre;
      $Contrasenia =$objDatos->Contrasenia ;
      //----
      $Respuesta_Consulta_Cuenta =  $this->_Mdl_Usuario->FN_Iniciar_Sesion( $Usuario_Nombre,$Contrasenia );
      //Si es true la respuesta
      if ( $Respuesta_Consulta_Cuenta ){
        $Nombre_Usuario;
        $Contrasenia;
        //_*Codigo para validar la contraseña encriptada de la base de datos
        // foreach ($Respuesta_Consulta_Cuenta as $clave) {
        //   if(isset($clave->Contrasenia_Encriptada))
        //   {
        //       $Encriptado = $clave->Contrasenia_Encriptada;
        //   }
        //   if(isset($objDatos->Contrasenia))
        //   {
        //     $Contrasenia_Ingresada = urlencode($objDatos->Contrasenia);
        //   }
        //
        //   var_dump($Contrasenia_Ingresada);
        //   var_dump(crypt($Contrasenia_Ingresada, $Encriptado));
        //   var_dump($Encriptado);
        //   var_dump($clave->Contrasenia_Encriptada);
        //
        // }
        // if( crypt($Contrasenia_Ingresada, $Encriptado) == $Encriptado ) {
        //   echo 'Es igual';
        // }
        // else
        // {
        //   echo "no es igual";
        // }
        //_*uso un foreach para recorrer el objeto retornado por la consulta a la base de datos, esta nos traera los datos del usuario que inicio sesion
        foreach ( $Respuesta_Consulta_Cuenta as $clave ) {
          //_******************************
          //Capturo los datos para la validacion del usuario
          $Nombre_Usuario = $clave->Nombre_Usuario;
          $Contrasenia = $clave->Contrasenia;
          $PK_ID_Usuario = $clave->PK_ID_Usuario;
          $Estado_Cuenta = $clave->Estado_Cuenta;
          $FK_ID_Rol = $clave->FK_ID_Rol;
          //_*Variables usadas para no tener que recorrer un foreach para sacar los datos, estos datos se pueden sacar al igual de la variable Aobj_Datos_Usuario
          Sesion::setValue( 'Nombre_Usuario',$Nombre_Usuario );
          Sesion::setValue( 'Contrasenia',$Contrasenia );
          Sesion::setValue( 'PK_ID_Usuario',$PK_ID_Usuario );
          Sesion::setValue( 'Estado_Cuenta',$Estado_Cuenta );
          Sesion::setValue( 'FK_ID_Rol',$FK_ID_Rol );
        }
        //_*Verifico  el estado actual de la cuenta, si el estado la cuenta es cancelado , debuelvo Cuenta_Cancelada
        if( Sesion::getValue( 'Estado_Cuenta' ) == "Cancelada" )
        {
          echo "Cuenta_Cancelada";
        }
        //_* Si el estado es en uso debuelvo En uso
        if( Sesion::getValue('Estado_Cuenta') == "En uso" )
        {
          //_*Si la cuenta posee el estado en uso paso a volver a guardar los datos de la cuenta en la variable Aobj_Datos_Usuario
          Sesion::setValue( 'Aobj_Datos_Usuario',$Respuesta_Consulta_Cuenta );
          echo json_encode( Sesion::getValue( 'Aobj_Datos_Usuario' ) );
        }
      }
      else
      {
        /*el retorno es false lo que significa los datos  del usuario no fueron  encontrados en la base de datos*/
        echo "false";
      }
    }
  }

  //Funcion para capturar los datos del usuario al ser recargada la pagina, esta funcion lo que hace es utilizar los datos del usuario (Nombre_Usuario y Contraseña) para volver a iniciar sesion y asi mantener los datos actualizados del usuario, esta funcion se ejecuta cada vez que se recarga la pagina por medio de un ng-init en la vista header
  public function FN_Capturar_Datos_Usuario_Iniciado()
  {
    //Si no existe la sesion
    if( !isset($_SESSION[ "Aobj_Datos_Usuario" ]) )
    {
      echo "false";
    }
    else
    {
      //_*Si la sesion esta activa tomo los datos necesarios para volver a iniciar sesion, estos datos los estoy guardando en variables de sesion de php, ademas de la variable Aobj_Datos_Usuario he creado otras variables de sesion para no tener que usar siempre un foreach para sacar los datos
      $Respuesta_Consulta_Cuenta =  $this->_Mdl_Usuario->FN_Iniciar_Sesion(
        Sesion::getValue( 'Nombre_Usuario' ),
        Sesion::getValue( 'Contrasenia' )
        );
    //_*Capturo el estado de la cuenta y el fk_id_rol, el estado de la cuenta nos sirve para posteriormente verificar si la cuenta no ha sido cancelada y el fk_id_rol nos sirve para usarla en el archivo application.php donde se necesita usar la variable de sesion fk_id_rol para asi consultar los permisos a la base de datos
      foreach ( $Respuesta_Consulta_Cuenta as $clave ) {
        $Estado_Cuenta = $clave->Estado_Cuenta;
        $FK_ID_Rol = $clave->FK_ID_Rol;
      //_*----
        Sesion::setValue( 'Estado_Cuenta',$Estado_Cuenta );
        Sesion::setValue( 'FK_ID_Rol',$FK_ID_Rol );

      }
    //_*Verifico  el estado actual de la cuenta
      if(Sesion::getValue( 'Estado_Cuenta' ) == "Cancelada" )

      {
        echo "Cuenta_Cancelada";
      }
      if(Sesion::getValue( 'Estado_Cuenta' ) == "En uso" )

      {
      //_*Si la cuenta posee el estado en uso paso a volver a guardar los datos de la cuenta en la variable Aobj_Datos_Usuario
        Sesion::setValue( 'Aobj_Datos_Usuario',$Respuesta_Consulta_Cuenta );
        echo json_encode( Sesion::getValue( 'Aobj_Datos_Usuario' ) );
      }

    }
  }
//_*Funcion utilizada para habilitar el estado de una cuenta
  public function FN_Habilitar_Estado_Cuenta_Usuario_Login()
  {
    $PK_ID_Usuario = Sesion::getValue( 'PK_ID_Usuario' );
    $Respuesta_Activacion_Cuenta = $this->_Mdl_Usuario->FN_Habilitar_Estado_Cuenta_Usuario_Login( $PK_ID_Usuario );
    if ( $Respuesta_Activacion_Cuenta ) {
    //Si la activacion fue exitosa vuelvo a hacer el proceso de inicio de sesion
    //Hago uso de las variables de sesion para no tener que volver a solicitar los datos del usuario
      $Usuario_Nombre =Sesion::getValue( 'Nombre_Usuario' );
      $Contrasenia =Sesion::getValue( 'Contrasenia' ) ;
      $Respuesta_Consulta_Cuenta =  $this->_Mdl_Usuario->FN_Iniciar_Sesion( $Usuario_Nombre,$Contrasenia );
      if ($Respuesta_Consulta_Cuenta){
        $Nombre_Usuario;
        $Contrasenia;
      //_*Codigo para validar la contraseña encriptada de la base de datos
      //_*      foreach ($Respuesta_Consulta_Cuenta as $clave) {

      //_*       $Contrasenia_Ingresada = $objDatos->Contrasenia;
      //_*       $Encriptado = $clave->Contrasenia_Encriptada;
      //_*       var_dump($Contrasenia_Ingresada);
      //_*       var_dump($Encriptado);

      //_*     }
      //_*     if($Encriptado == crypt($Contrasenia_Ingresada, $Encriptado)) {
      //_*       echo 'Es igual';
      //_*     }
      //_*     else
      //_*     {
      //_*       echo "no es igual";
      //_*     }
      //_*uso un foreach para recorrer el objeto retornado por la consulta a la base de datos, esta nos traera los datos del usuario que inicio sesion
        foreach ( $Respuesta_Consulta_Cuenta as $clave ) {
        //_******************************
        //Capturo los datos para la validacion del usuario
          $Nombre_Usuario = $clave->Nombre_Usuario;
          $Contrasenia = $clave->Contrasenia;
          $PK_ID_Usuario = $clave->PK_ID_Usuario;
          $Estado_Cuenta = $clave->Estado_Cuenta;
          $FK_ID_Rol = $clave->FK_ID_Rol;
        }
      //_*Variables usadas para no tener que recorrer un foreach para sacar los datos, estos datos se pueden sacar al igual de la variable Aobj_Datos_Usuario
        Sesion::setValue( 'Nombre_Usuario',$Nombre_Usuario );
        Sesion::setValue( 'Contrasenia',$Contrasenia );
        Sesion::setValue( 'PK_ID_Usuario',$PK_ID_Usuario );
        Sesion::setValue( 'Estado_Cuenta',$Estado_Cuenta );
        Sesion::setValue( 'FK_ID_Rol',$FK_ID_Rol );
      //Como la cuenta ya se encuentra activada no necesito volver a verificar el estado de la cuenta, paso a guardar directamente los datos del usuario en la variable de sesion
        Sesion::setValue( 'Aobj_Datos_Usuario',$Respuesta_Consulta_Cuenta );
        echo json_encode( $Respuesta_Consulta_Cuenta );
      }else {
      //Si no se pudo habilitar la cuenta
        echo "false";
      }
    }
  }
//Funcion para inhabilitar el estado de una cuenta
  public function FN_Inhabilitar_Estado_Cuenta(){
    $DatosUsuario = json_decode( file_get_contents( "php://input" ) );
  //Para inhabilitar una cuenta solo se necesita el id del usuario, no se hace uso de Nombre de usuario o contraseña ya que solo se puede acceder a la opcion inhabilitar cuenta si se ha iniciado sesion
    $PK_ID_Usuario=$DatosUsuario->PK_ID_Usuario;
    if ( !isset( $PK_ID_Usuario ) ){
      echo "false";
    }else{
      $Respuesta_Estado_Cuenta =  $this->_Mdl_Usuario->FN_Inhabilitar_Estado_Cuenta( $PK_ID_Usuario );
      if ( $Respuesta_Estado_Cuenta ){
        echo "true";
      }else{
        echo "false";
      }
    }
  }

// Funcion para enviar una orden realizada por el usuario, esta orden solo puede ser creada por un cliente. FN_Envio_Orden_Guardado_Datos_Productos es el primer proceso que se realiza para guardar en una variable de sesion los datos de la orden como cantidad de productos, precio total etc, en la funcion FN_Envio_Orden es donde se pasa a realizar el envio de la orden, en este proceso se toma la informacion de envio como el usuario, la direccion el telefono etc.
  public function FN_Envio_Orden_Guardado_Datos_Productos()
  {
    $Orden_Envio =json_decode( file_get_contents( "php://input" ) );

    if ( !isset( $Orden_Envio ) ) {
      echo "No_Hay_Datos";
    }
    else {
    //Para poder tener en un array completo, los datos de los productos qeu el usuario quiere enviar, separe el proceso de registro en dos, el primero el cual es este, es para mandar a php los datos de los productos en la orden, luego estos los guardo en una variable de sesion de php para asi luego usarlo en el segundo paso
      Sesion::setValue( 'Orden_Envio',$Orden_Envio );
      echo "Orden_Guardada";
    }
  }
//
  public function FN_Envio_Orden()
  {
    $Datos =json_decode( file_get_contents( "php://input" ) );
    if ( !isset( $Datos ) ) {
      echo "No_Hay_Datos";
    }
    else {
    //Datos necesarios para hacer el registro en las tablas tbl_Cotizacion_Producto y tbl_dll_Produ_Cotizacion
      $Direccion_Entrega = $Datos->Direccion_Entrega;
      $Telefono_Entrega = $Datos->Telefono_Entrega;
      $PK_ID_Usuario = Sesion::getValue( 'PK_ID_Usuario' );
      $Datos_Producto = Sesion::getValue( 'Orden_Envio' );
    //Uso la variable guardada en el paso 1,
    // var_dump(Sesion::getValue('Orden_Envio') );
    // var_dump($Telefono_Entrega,$Direccion_Entrega);
    // var_dump($PK_ID_Usuario);
      $Respuesta_Registro_tbl_Cotizacion_Producto = $this->_Mdl_Usuario->FN_Registro_Cotizacion_Producto(
        $PK_ID_Usuario,
        $Direccion_Entrega,
        $Telefono_Entrega,
        $Datos_Producto
        );
      if( $Respuesta_Registro_tbl_Cotizacion_Producto )
      {
        echo "true";
      }
      else
      {
        echo "false";
      }

    }
  }
//Funcion para listar las ordenes enviadas por el usuario
  public function FN_Listar_Ordenes_Enviadas()
  {
    $PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
    $Lista_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Ordenes_Enviadas($PK_ID_Usuario);
    echo json_encode($Lista_Ordenes_Enviadas);
  }

  public function FN_Listar_Pedidos_Enviados()
  {
    $PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
    $Lista_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Pedidos_Enviados($PK_ID_Usuario);
    echo json_encode($Lista_Ordenes_Enviadas);
  }
  public function FN_Listar_Detalles_Ordene_Enviada()
  {
    $Datos =json_decode( file_get_contents( "php://input" ) );
    if ( !isset( $Datos ) ) {
      echo "No_Hay_Datos";
    }
    else {
      $Lista_Detalle_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Detalles_Ordene_Enviada(
        $Datos->PK_ID_Cotizacion_Usuario);
      echo json_encode( $Lista_Detalle_Ordenes_Enviadas );
    }
  }

  public function FN_Listar_Detalles_Pedido_Enviado()
  {
    $Datos =json_decode( file_get_contents( "php://input" ) );
    if ( !isset( $Datos ) ) {
      echo "No_Hay_Datos";
    }
    else {
      if(isset($Datos->PK_ID_Cotizacion_Usuario))
      {
        $Lista_Detalle_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Detalles_Orden_Enviado(
          $Datos->PK_ID_Cotizacion_Usuario);
        echo json_encode( $Lista_Detalle_Ordenes_Enviadas );
      }
      if(isset($Datos->PK_ID_Pedido)){
        $Lista_Detalle_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Detalles_Pedido_Enviado(
          $Datos->PK_ID_Pedido);
        echo json_encode( $Lista_Detalle_Ordenes_Enviadas );
      }

    }
  }
  public function FN_Eliminar_Orden_Enviada()
  {
    $Datos =json_decode( file_get_contents( "php://input" ) );

    if ( !isset( $Datos ) ) {
      echo "No_Hay_Datos";
    }
    else {
      $Respuesta_Eliminacion_Orden = $this->_Mdl_Usuario->FN_Eliminar_Orden_Enviada(
        $Datos->PK_ID_Cotizacion_Usuario);

      if( $Respuesta_Eliminacion_Orden == 'Cotizacion_Asociada' )
      {
        echo "Cotizacion_Asociada";
      }
      else if ( $Respuesta_Eliminacion_Orden === true )
      {
        echo "true";
      }
      else
      {
        echo "false";
      }
    }
  }
  public function FN_Eliminar_Pedido_Enviado()
  {
    $Datos =json_decode( file_get_contents( "php://input" ) );

    if ( !isset( $Datos ) ) {
      echo "No_Hay_Datos";
    }
    else {
      $Respuesta_Eliminacion_Orden = $this->_Mdl_Usuario->FN_Eliminar_Pedido_Enviado(
        $Datos->PK_ID_Pedido);

      if( $Respuesta_Eliminacion_Orden )
      {
        echo "true";
      }
      else
      {
        echo "false";
      }
    }
  }
//_* FN_Cerrar_Sesion
  public function FN_Cerrar_Sesion(){
    $Resultado = $this->_Mdl_Usuario->FN_Cerrar_Sesion();
    if ( $Resultado = true ){
      echo "true";
    }else{
      echo "false";
    }
  }
//Funcion para actualizar los datos de una cuenta, en esta funcion se actualizan los datos de las cuenta tipo cliente, administrador y empleado, consta de varios procesos donde se verifican si los datos del tipo de cuenta a actualizar se encuentran actualizados, en caso de encontrarse actualizados se prosigue al sigueinte proceso y asi sucesivamente hasta finalizar la verificacion de datos, en caso de no encontrarse ningun datos actualizado se devuelbe false con lo que se lee que no se han modificado datos
  public function FN_Actualizar_Datos_Tabla_Cliente()
  {
    $objDatos = json_decode(file_get_contents("php://input"));
    if (!isset($objDatos)) {
      echo("Los datos no llegaron");
    }else
    {
    //Datos de la tabla cuenta
      $Nombre_Usuario  = $objDatos->Nombre_Usuario;
      $PK_ID_Usuario  = $objDatos->PK_ID_Usuario;
      $Puedo_Cambiar_Informacion = "";
    //Variable para determinar si puedo o no pasar a actualzar la informacion de las demas tablas.
      $Usuario_Existe = "";
      $Nombre_Anterior = Sesion::getValue('Nombre_Usuario');
      if($Nombre_Anterior != $Nombre_Usuario)
      {
        $Respuesta_Validar_Usuario = (bool) $this->_Mdl_Usuario->FN_Consultar_Nombre_Usuario
        (
          $Nombre_Usuario
          );
    //_*si el nombre de usuario existe
        if ($Respuesta_Validar_Usuario) {
          echo "Usuario_Existente";
          $Usuario_Existe = "Si";
        }
        else
        {
          $Usuario_Existe = "No";
        }
      }
      else
      {
        $Usuario_Existe = "No";
      }
  //FUNCIONES PARA ACTUALIZAR LA INFORMACION PERSONAL DEL USUARIO

      if($Usuario_Existe == "No")
      {
    //_*Datos para la tabla empleado
        $PK_ID_Usuario_Persona = $objDatos->PK_ID_Usuario_Persona;
        $FK_ID_Cuenta  = $objDatos->FK_ID_Cuenta;
        $Nombre  = $objDatos->Nombre;
        $Segundo_Nombre  = $objDatos->Segundo_Nombre;
        $Apellido  = $objDatos->Apellido;
        $Segundo_Apellido  = $objDatos->Segundo_Apellido;
        $Departamento  = $objDatos->Departamento;
        $Municipio  = $objDatos->Municipio;
        $Telefono_Celular  = $objDatos->Telefono_Celular;
        $Sexo  = $objDatos->Sexo;
    //_*Datos para la tabla cuenta

        $Imagen_Usuario  = $objDatos->Imagen_Usuario;
        $Fondo_Perfil_Usuario  = $objDatos->Fondo_Perfil_Usuario;
        $Disponibilidad  = $objDatos->Disponibilidad;
        $FK_ID_Rol  = $objDatos->FK_ID_Rol;
        $Correo_Electronico = $objDatos->Correo_Electronico;
    //_*Varialble para saber si se hicieron cambios al actualizar los datos en el proceso cuenta
        $Se_Hicieron_Cambios_Cliente_Empleado = "";
        $Se_Hicieron_Cambios_Cuenta = "";
        $Se_Hicieron_Cambios_Cliente_Establecimiento = "";
        $Respuesta_Actualizacion_Datos_Tabla_Cuenta = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Cuenta(
          $PK_ID_Usuario ,
          $Nombre_Usuario,
          $Imagen_Usuario,
          $Fondo_Perfil_Usuario,
          $Disponibilidad,
          $FK_ID_Rol,
          $Correo_Electronico
          );
  //_*SI SE ACTUALIZARON DATOS EN LA TABLA CUENTA
        if($Respuesta_Actualizacion_Datos_Tabla_Cuenta)
        {
    //_*PASO A ACTUALIZAR LOS DATOS YA SEA DE UN EMPLEADO O UN CLIENTE
          $Se_Hicieron_Cambios_Cuenta = "Si";
    //========================================
          Sesion::setValue('Nombre_Usuario',$Nombre_Usuario);
    //=========================================
    //_*Si el FK ES DE UN Empleado
          if($FK_ID_Rol == 2 || $FK_ID_Rol == 1 || $FK_ID_Rol == 4 || $FK_ID_Rol == 6 || $FK_ID_Rol == 7)
          {
            $Respuesta_Actualizacion_Datos_Tabla_Empleado = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Empleado(
              $PK_ID_Usuario_Persona ,
              $FK_ID_Cuenta,
              $Nombre,
              $Segundo_Nombre,
              $Apellido,
              $Segundo_Apellido,
              $Municipio,
              $Telefono_Celular,
              $Sexo
              );

            if ($Respuesta_Actualizacion_Datos_Tabla_Empleado) {
              $Se_Hicieron_Cambios_Cliente_Empleado = "Si";

            }else {
              $Se_Hicieron_Cambios_Cliente_Empleado = "No";
            }
          }
  //_*Si el FK ES DE UN CLIENTE
          if($FK_ID_Rol == 3)
          {
    //_*Datos para completar el registro en la tabla cliente
            $Tipo_Cliente  = $objDatos->Tipo_Cliente;
            $Posee_Empresa  = $objDatos->Posee_Empresa;
    //_****
            $Respuesta_Actualizacion_Datos_Tabla_Cliente = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Cliente(
              $PK_ID_Usuario_Persona ,
              $FK_ID_Cuenta,
              $Nombre,
              $Segundo_Nombre,
              $Apellido,
              $Segundo_Apellido,
              $Departamento,
              $Municipio,
              $Telefono_Celular,
              $Sexo,
              $Tipo_Cliente,
              $Posee_Empresa
              );
  //_*Si  se hicieron cambios en la tabla Cliente
            if ($Respuesta_Actualizacion_Datos_Tabla_Cliente) {

              $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
    //_*Datos para la tabla Establecimiento

    //Verifico si el usuario posee empresa
              $Respuesta_Verificacion_Empresa =  $this->_Mdl_Usuario->FN_Verificacion_Empresa(
                $FK_ID_Cuenta
                );

  //_*Si no se hicieron cambios en la tabla Cliente
              if($Respuesta_Verificacion_Empresa)
              {
                $PK_ID_Establecimiento  = $objDatos->PK_ID_Establecimiento;
                $Nombre_Establecimiento  = $objDatos->Nombre_Establecimiento;
                $Nombre_Encargado  = $objDatos->Nombre_Encargado;
                $Nit  = $objDatos->Nit;
                $Telefono_Establecimiento  = $objDatos->Telefono_Establecimiento;
                $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
                $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
                $FK_ID_Usuario  = $objDatos->FK_ID_Usuario;

                $Respuesta_Actualizacion_Datos_Tabla_Establecimiento = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Establecimiento(
                  $PK_ID_Establecimiento ,
                  $Nombre_Establecimiento,
                  $Nombre_Encargado,
                  $Nit,
                  $Telefono_Establecimiento,
                  $Direccion_Establecimiento,
                  $Municipio_Establecimiento,
                  $FK_ID_Usuario
                  );
  //_*Si se hicieron cambios en la tabla establecimiento
                if($Respuesta_Actualizacion_Datos_Tabla_Establecimiento)
                {
                  $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
                }
  //_*Si no se hicieron cambios en la tabla establecimiento

                else {


                  $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";

                }
                if($Se_Hicieron_Cambios_Cliente_Establecimiento == "No" && $Se_Hicieron_Cambios_Cliente_Empleado == "Si"){
                  $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
                }
                if($Se_Hicieron_Cambios_Cliente_Establecimiento == "Si" && $Se_Hicieron_Cambios_Cliente_Empleado == "Si"){
                  $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
                }
              }
              else
              {

                   // Este proceso es por si el usuario quiso añadir los datos de un establecimeinto
               if (empty($objDatos->Nombre_Establecimiento)) {
                $objDatos->Nombre_Establecimiento = "";
              };
              if (empty($objDatos->Nombre_Encargado)) {
                $objDatos->Nombre_Encargado = "";
              };
              if (empty($objDatos->Nit)) {
                $objDatos->Nit = "";
              };
              if (empty($objDatos->Telefono_Establecimiento)) {
                $objDatos->Telefono_Establecimiento = "";
              };
              if (empty($objDatos->Direccion_Establecimiento)) {
                $objDatos->Direccion_Establecimiento = "";
              };
              if (empty($objDatos->Municipio_Establecimiento)) {
                $objDatos->Municipio_Establecimiento = "";
              };

              $Nombre_Establecimiento = $objDatos->Nombre_Establecimiento;
              $Nombre_Encargado = $objDatos->Nombre_Encargado;
              $Nit = $objDatos->Nit;
              $Telefono_Establecimiento = $objDatos->Telefono_Establecimiento;
              $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
              $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
              $FK_ID_Usuario  = $objDatos->FK_ID_Cuenta;
              $Respuesta_Registro_Establecimiento = $this->_Mdl_Usuario->FN_Registrar_TBL_Establecimiento
              (
                $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento , $Direccion_Establecimiento , $Municipio_Establecimiento , $FK_ID_Usuario
                );

              if($Respuesta_Registro_Establecimiento)
              {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
              }
              else
              {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
              }
            }
          }
          else
          {
            $Se_Hicieron_Cambios_Cliente_Empleado = "No";
  //_*Datos para la tabla Establecimiento
  //Verifico si el usuario posee empresa
            $Respuesta_Verificacion_Empresa =  $this->_Mdl_Usuario->FN_Verificacion_Empresa(
              $FK_ID_Cuenta
              );
            if($Respuesta_Verificacion_Empresa)
            {
              $PK_ID_Establecimiento  = $objDatos->PK_ID_Establecimiento;
              $Nombre_Establecimiento  = $objDatos->Nombre_Establecimiento;
              $Nombre_Encargado  = $objDatos->Nombre_Encargado;
              $Nit  = $objDatos->Nit;
              $Telefono_Establecimiento  = $objDatos->Telefono_Establecimiento;
              $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
              $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
              $FK_ID_Usuario  = $objDatos->FK_ID_Usuario;

              $Respuesta_Actualizacion_Datos_Tabla_Establecimiento = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Establecimiento(
                $PK_ID_Establecimiento ,
                $Nombre_Establecimiento,
                $Nombre_Encargado,
                $Nit,
                $Telefono_Establecimiento,
                $Direccion_Establecimiento,
                $Municipio_Establecimiento,
                $FK_ID_Usuario
                );
//_*Si se hicieron cambios en la tabla establecimiento
              if($Respuesta_Actualizacion_Datos_Tabla_Establecimiento)
              {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
              }
//_*Si no se hicieron cambios en la tabla establecimiento

              else {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
              }

              if($Se_Hicieron_Cambios_Cliente_Establecimiento == "No" && $Se_Hicieron_Cambios_Cliente_Empleado == "No"){
                $Se_Hicieron_Cambios_Cliente_Empleado = "No";
              }
              if($Se_Hicieron_Cambios_Cliente_Establecimiento == "Si" && $Se_Hicieron_Cambios_Cliente_Empleado == "No"){
                $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
              }
            }
            else
            {
                   // Este proceso es por si el usuario quiso añadir los datos de un establecimeinto
              if (empty($objDatos->Nombre_Establecimiento)) {
                $objDatos->Nombre_Establecimiento = "";
              };
              if (empty($objDatos->Nombre_Encargado)) {
                $objDatos->Nombre_Encargado = "";
              };
              if (empty($objDatos->Nit)) {
                $objDatos->Nit = "";
              };
              if (empty($objDatos->Telefono_Establecimiento)) {
                $objDatos->Telefono_Establecimiento = "";
              };
              if (empty($objDatos->Direccion_Establecimiento)) {
                $objDatos->Direccion_Establecimiento = "";
              };
              if (empty($objDatos->Municipio_Establecimiento)) {
                $objDatos->Municipio_Establecimiento = "";
              };

              $Nombre_Establecimiento = $objDatos->Nombre_Establecimiento;
              $Nombre_Encargado = $objDatos->Nombre_Encargado;
              $Nit = $objDatos->Nit;
              $Telefono_Establecimiento = $objDatos->Telefono_Establecimiento;
              $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
              $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
              $FK_ID_Usuario  = $objDatos->FK_ID_Cuenta;
              $Respuesta_Registro_Establecimiento = $this->_Mdl_Usuario->FN_Registrar_TBL_Establecimiento
              (
                $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento , $Direccion_Establecimiento , $Municipio_Establecimiento , $FK_ID_Usuario
                );

              if($Respuesta_Registro_Establecimiento)
              {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
              }
              else
              {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
              }
            }
          }


        }
        if($Se_Hicieron_Cambios_Cliente_Empleado == "Si" && $Se_Hicieron_Cambios_Cuenta == "Si") { echo "true";}
        if($Se_Hicieron_Cambios_Cliente_Empleado == "No"  && $Se_Hicieron_Cambios_Cuenta == "Si") {echo "true";}

      }
//_***
//_*SI NO SE HICIERON CAMBIOS EN LA TABLA CUENTA VUELVO A VERIFICAR SI SE HICIERON CAMBIOS EN LAS DEMAS TABLAS
      else{

  //_*PASO A ACTUALIZAR LOS DATOS YA SEA DE UN EMPLEADO O UN CLIENTE
        $Se_Hicieron_Cambios_Cuenta = "No";
  //_*Si el FK ES DE UN Empleado
        if($FK_ID_Rol == 2 || $FK_ID_Rol == 1 || $FK_ID_Rol == 4 || $FK_ID_Rol == 6 || $FK_ID_Rol == 7)
        {
          $Respuesta_Actualizacion_Datos_Tabla_Empleado = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Empleado(
            $PK_ID_Usuario_Persona ,
            $FK_ID_Cuenta,
            $Nombre,
            $Segundo_Nombre,
            $Apellido,
            $Segundo_Apellido,
            $Municipio,
            $Telefono_Celular,
            $Sexo
            );
          if ($Respuesta_Actualizacion_Datos_Tabla_Empleado) {
            $Se_Hicieron_Cambios_Cliente_Empleado = "Si";

          }else {
            $Se_Hicieron_Cambios_Cliente_Empleado = "No";
          }
        }
//_*Si el FK ES DE UN CLIENTE
        if($FK_ID_Rol == 3)
        {
  //_*Datos para completar el registro en la tabla cliente
          $Tipo_Cliente  = $objDatos->Tipo_Cliente;
          $Posee_Empresa  = $objDatos->Posee_Empresa;
  //_****
          $Respuesta_Actualizacion_Datos_Tabla_Cliente = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Cliente(
            $PK_ID_Usuario_Persona ,
            $FK_ID_Cuenta,
            $Nombre,
            $Segundo_Nombre,
            $Apellido,
            $Segundo_Apellido,
            $Departamento,
            $Municipio,
            $Telefono_Celular,
            $Sexo,
            $Tipo_Cliente,
            $Posee_Empresa
            );
//_*Si  se hicieron cambios en la tabla Cliente
          if ($Respuesta_Actualizacion_Datos_Tabla_Cliente) {

            $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
  //_*Datos para la tabla Establecimiento

  //Verifico si el usuario posee empresa
            $Respuesta_Verificacion_Empresa =  $this->_Mdl_Usuario->FN_Verificacion_Empresa(
              $FK_ID_Cuenta
              );

//_*Si no se hicieron cambios en la tabla Cliente
            if($Respuesta_Verificacion_Empresa)
            {
              $PK_ID_Establecimiento  = $objDatos->PK_ID_Establecimiento;
              $Nombre_Establecimiento  = $objDatos->Nombre_Establecimiento;
              $Nombre_Encargado  = $objDatos->Nombre_Encargado;
              $Nit  = $objDatos->Nit;
              $Telefono_Establecimiento  = $objDatos->Telefono_Establecimiento;
              $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
              $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
              $FK_ID_Usuario  = $objDatos->FK_ID_Usuario;

              $Respuesta_Actualizacion_Datos_Tabla_Establecimiento = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Establecimiento(
                $PK_ID_Establecimiento ,
                $Nombre_Establecimiento,
                $Nombre_Encargado,
                $Nit,
                $Telefono_Establecimiento,
                $Direccion_Establecimiento,
                $Municipio_Establecimiento,
                $FK_ID_Usuario
                );
//_*Si se hicieron cambios en la tabla establecimiento
              if($Respuesta_Actualizacion_Datos_Tabla_Establecimiento)
              {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
              }
//_*Si no se hicieron cambios en la tabla establecimiento

              else {
                $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
              }
              if($Se_Hicieron_Cambios_Cliente_Establecimiento == "No" && $Se_Hicieron_Cambios_Cliente_Empleado == "Si"){
                $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
              }
              if($Se_Hicieron_Cambios_Cliente_Establecimiento == "Si" && $Se_Hicieron_Cambios_Cliente_Empleado == "Si"){
                $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
              }
            }
            else
            {
                // Este proceso es por si el usuario quiso añadir los datos de un establecimeinto
             if (empty($objDatos->Nombre_Establecimiento)) {
              $objDatos->Nombre_Establecimiento = "";
            };
            if (empty($objDatos->Nombre_Encargado)) {
              $objDatos->Nombre_Encargado = "";
            };
            if (empty($objDatos->Nit)) {
              $objDatos->Nit = "";
            };
            if (empty($objDatos->Telefono_Establecimiento)) {
              $objDatos->Telefono_Establecimiento = "";
            };
            if (empty($objDatos->Direccion_Establecimiento)) {
              $objDatos->Direccion_Establecimiento = "";
            };
            if (empty($objDatos->Municipio_Establecimiento)) {
              $objDatos->Municipio_Establecimiento = "";
            };

            $Nombre_Establecimiento = $objDatos->Nombre_Establecimiento;
            $Nombre_Encargado = $objDatos->Nombre_Encargado;
            $Nit = $objDatos->Nit;
            $Telefono_Establecimiento = $objDatos->Telefono_Establecimiento;
            $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
            $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
            $FK_ID_Usuario  = $objDatos->FK_ID_Cuenta;
            $Respuesta_Registro_Establecimiento = $this->_Mdl_Usuario->FN_Registrar_TBL_Establecimiento
            (
              $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento , $Direccion_Establecimiento , $Municipio_Establecimiento , $FK_ID_Usuario
              );

            if($Respuesta_Registro_Establecimiento)
            {
              $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
            }
            else
            {
              $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
            }
          }
        }
//_*Si no se hicieron cambios en la tabla Cliente
        else
        {
          $Se_Hicieron_Cambios_Cliente_Empleado = "No";
  //_*Datos para la tabla Establecimiento

  //Verifico si el usuario posee empresa
          $Respuesta_Verificacion_Empresa =  $this->_Mdl_Usuario->FN_Verificacion_Empresa(
            $FK_ID_Cuenta
            );
          if($Respuesta_Verificacion_Empresa)
          {
            $PK_ID_Establecimiento  = $objDatos->PK_ID_Establecimiento;
            $Nombre_Establecimiento  = $objDatos->Nombre_Establecimiento;
            $Nombre_Encargado  = $objDatos->Nombre_Encargado;
            $Nit  = $objDatos->Nit;
            $Telefono_Establecimiento  = $objDatos->Telefono_Establecimiento;
            $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
            $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
            $FK_ID_Usuario  = $objDatos->FK_ID_Usuario;

            $Respuesta_Actualizacion_Datos_Tabla_Establecimiento = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Establecimiento(
              $PK_ID_Establecimiento ,
              $Nombre_Establecimiento,
              $Nombre_Encargado,
              $Nit,
              $Telefono_Establecimiento,
              $Direccion_Establecimiento,
              $Municipio_Establecimiento,
              $FK_ID_Usuario
              );
//_*Si se hicieron cambios en la tabla establecimiento
            if($Respuesta_Actualizacion_Datos_Tabla_Establecimiento)
            {
              $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
            }
//_*Si no se hicieron cambios en la tabla establecimiento
            else {
              $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
            }
            if($Se_Hicieron_Cambios_Cliente_Establecimiento == "No" && $Se_Hicieron_Cambios_Cliente_Empleado == "No"){
              $Se_Hicieron_Cambios_Cliente_Empleado = "No";
            }
            if($Se_Hicieron_Cambios_Cliente_Establecimiento == "Si" && $Se_Hicieron_Cambios_Cliente_Empleado == "No"){
              $Se_Hicieron_Cambios_Cliente_Empleado = "Si";
            }
          }
          else
          {
                // Este proceso es por si el usuario quiso añadir los datos de un establecimeinto
           if (empty($objDatos->Nombre_Establecimiento)) {
            $objDatos->Nombre_Establecimiento = "";
          };
          if (empty($objDatos->Nombre_Encargado)) {
            $objDatos->Nombre_Encargado = "";
          };
          if (empty($objDatos->Nit)) {
            $objDatos->Nit = "";
          };
          if (empty($objDatos->Telefono_Establecimiento)) {
            $objDatos->Telefono_Establecimiento = "";
          };
          if (empty($objDatos->Direccion_Establecimiento)) {
            $objDatos->Direccion_Establecimiento = "";
          };
          if (empty($objDatos->Municipio_Establecimiento)) {
            $objDatos->Municipio_Establecimiento = "";
          };

          $Nombre_Establecimiento = $objDatos->Nombre_Establecimiento;
          $Nombre_Encargado = $objDatos->Nombre_Encargado;
          $Nit = $objDatos->Nit;
          $Telefono_Establecimiento = $objDatos->Telefono_Establecimiento;
          $Direccion_Establecimiento  = $objDatos->Direccion_Establecimiento;
          $Municipio_Establecimiento  = $objDatos->Municipio_Establecimiento;
          $FK_ID_Usuario  = $objDatos->FK_ID_Cuenta;
          $Respuesta_Registro_Establecimiento = $this->_Mdl_Usuario->FN_Registrar_TBL_Establecimiento
          (
            $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento , $Direccion_Establecimiento , $Municipio_Establecimiento , $FK_ID_Usuario
            );

          if($Respuesta_Registro_Establecimiento)
          {
            $Se_Hicieron_Cambios_Cliente_Establecimiento = "Si";
          }
          else
          {
            $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
          }
        }
      }
    }


    if($Se_Hicieron_Cambios_Cliente_Empleado == "Si" && $Se_Hicieron_Cambios_Cuenta == "No") { echo "true";}
    if($Se_Hicieron_Cambios_Cliente_Empleado == "No"  && $Se_Hicieron_Cambios_Cuenta == "No") {echo "false";}
//_***
  }
//**fin condicional usuario existente
}
}
}

//_* Funcion para registar una cuenta, tansolo se registrara cuenta tipo cliente
public function FN_Registrar_Usuario() {
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  if ( !isset( $objDatos ) ) {
    echo 'Los datos no llegaron';
  } else {
    //_* Datos necesario para el registro de la tabla cuenta
    $Nombre_Usuario = $objDatos->Nombre_Usuario;
    $Correo_Electronico = $objDatos->Correo;
    $Contrasenia = $objDatos->Contrasenia;
    $Imagen_Usuario = $objDatos->Imagen_Usuario;
    $Fondo_Perfil_Usuario = $objDatos->Imagen_Fondo;
    $Estado_Cuenta = "En uso";
    $Disponibilidad = "Activo";
    $FK_ID_Rol = 3;
    $Posee_Empresa = '';
    //_* ====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================
    $digito = 7;
    $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $salt = sprintf( '$2a$%02d$', $digito );

    for ($i = 0; $i < 22; $i++) {
      $salt .= $set_salt[ mt_rand( 0, 22 ) ];
    }
    $Contrasenia_Ingresada = $objDatos->Contrasenia;
    $Contrasenia_Encriptada = crypt( $Contrasenia_Ingresada, $salt );
    //_* ====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================
    //_* ESTA FUNCION VERIFICA SI EL NOMBRE DE USUARIO INGRESADO EXISTE EN LA BASE DE DATOS
    $res_Validar_Usuario = (bool) $this->_Mdl_Usuario->FN_Consultar_Nombre_Usuario
    ( $Nombre_Usuario );
    //_* SI EL NOMBRE DE USUARIO EXISTE
    if ( $res_Validar_Usuario ) {
      echo "Usuario_Existente";
    }
    else {
      $res_Validar_Correo = (bool) $this->_Mdl_Usuario->FN_Consultar_Correo
      (
        $Correo_Electronico
        );
    //_* SI EL CORREO INGRESADO USUARIO  EXISTE
      if ($res_Validar_Correo) {
        echo "Correo_Existente";
      }
      else
      {
      //_* ******************REGISTRO TBL_CUENTA
        $Respuesta_Registro_Cuenta = (int) $this->_Mdl_Usuario->FN_Registrar_TBL_Cuenta
        (
          $Nombre_Usuario, $Correo_Electronico, $Contrasenia, $Contrasenia_Encriptada, $Imagen_Usuario, $Fondo_Perfil_Usuario,$Disponibilidad, $Estado_Cuenta, $FK_ID_Rol
          );
    //_* *********************REGISTRO TBL_Cliente
    //_* VALIDACION DE CAMPOS VACIOS EN EL REGISTRO CLIENTE
        if (empty($objDatos->Segundo_Nombre)) {
          $objDatos->Segundo_Nombre = "";
        };
        if (empty($objDatos->Segundo_Apellido)) {
          $objDatos->Segundo_Apellido = "";
        };
        if (empty($objDatos->Nombre)) {
          $objDatos->Nombre = "";
        };
        if (empty($objDatos->Apellido)) {
          $objDatos->Apellido = "";
        };
        if (empty($objDatos->Celular_Usuario)) {
          $objDatos->Celular_Usuario = "";
        };
        if (empty($objDatos->Genero)) {
          $objDatos->Genero = "";
        };
        $FK_ID_Cuenta = $Respuesta_Registro_Cuenta;
        $Nombre = $objDatos->Nombre;
        $Segundo_Nombre = $objDatos->Segundo_Nombre;
        $Apellido = $objDatos->Apellido;
        $Segundo_Apellido = $objDatos->Segundo_Apellido;
        $Departamento = $objDatos->Departamento;
        $Municipio = $objDatos->Municipio;
        $Telefono_Celular = $objDatos->Celular_Usuario;
        $Sexo = $objDatos->Genero;
          // $Sexo = $objDatos->Genero;
        $Tipo_Cliente = "Esporadico";

        if ( $objDatos->Posee_Empresa == "si_poseeo_empresa" ) {
          $Posee_Empresa = "SI";
        }
        if ( $objDatos->Posee_Empresa == "no_poseeo_empresa" ) {
          $Posee_Empresa = "NO";
        }
    //LLAMADO A LA FUNCION DEL MODELO QUE REALIZA EL REGISTRO EN LA BASE DE DATOS
        $Respuesta_Registro_Cliente = $this->_Mdl_Usuario->FN_Registrar_TBL_Cliente
        (
    //Paso los parametros
         $FK_ID_Cuenta,
         $Nombre,
         $Segundo_Nombre,
         $Apellido,
         $Segundo_Apellido,
         $Departamento,
         $Municipio,
         $Telefono_Celular,
         $Sexo,
         $Tipo_Cliente,
         $Posee_Empresa
         );
  //_* REGISTRO TABLA DTLL ROL CUENTA
        $Respuesta_Registr_DTLL_ROL_CUENTA = $this->_Mdl_Usuario->FN_Registrar_TBL_Dll_Rol_Cuenta
        ( $FK_ID_Rol,$FK_ID_Cuenta );
  //_* *********************REGISTRANDO EN TBL_Establecimiento
  //_* POSEE_EMPRESA UN CARACTER: SI_POSEEO_EMPRESA/NO_POSEEO_EMPRESA, ESTA VARIABLE SE PASA DESDE LA VISTA POR MEDIO DE ANGULAR
        $TipoRegistro = $objDatos->Posee_Empresa;
  //_* SI NO POSEE EMPRESA, SE REGISTRA TANSOLAMENTE EN LA TABLA CUENTA, Y CLIENTE
        if ( $objDatos->Posee_Empresa == "no_poseeo_empresa" ) {
          if ( $Respuesta_Registro_Cliente = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registr_DTLL_ROL_CUENTA = true ) {
            echo "true";
          } else {
            echo "false";
          }
        }
        if ( $objDatos->Posee_Empresa == "si_poseeo_empresa" ) {
    //_* GUARDO LOS DATOS DE LA EMPRESA
          $Nombre_Establecimiento = $objDatos->Nombre_Empresa;
          $Nombre_Encargado = $objDatos->Nombre_Encargado;
          $Nit = $objDatos->NIT;
          $Telefono_Establecimiento = $objDatos->Telefono_Empresa;
          $Direccion_Establecimiento  = $objDatos->Direcion_Empresa;
          $Municipio_Establecimiento  = $objDatos->Celular_Usuario;
          $FK_ID_Usuario = $Respuesta_Registro_Cuenta;
          $Respuesta_Registro_Establecimiento = $this->_Mdl_Usuario->FN_Registrar_TBL_Establecimiento
          (
            $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento , $Direccion_Establecimiento , $Municipio_Establecimiento , $FK_ID_Usuario
            );
  //_* SI EL REGISTRO EN TBL_EMPRESA Y TBL_CLIENTE Y TBL_CUENTA ES CORRECTO
          if ( $Respuesta_Registro_Establecimiento = true && $Respuesta_Registro_Cliente = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registr_DTLL_ROL_CUENTA = true ) {
            echo "true";
          } else {
            echo "false";
          }
        }
      }
//*************
    }
//**************
  }
}



//_* Funcion para ver los comentarios de un producto
public function FN_Ver_Comentarios_Producto()
{
  $PK_ID_Producto = json_decode(file_get_contents("php://input"));
  $Lista_Comentarios_Producto = $this->_Mdl_Usuario->FN_Ver_Comentarios_Producto(
    $PK_ID_Producto
    );
  echo json_encode( $Lista_Comentarios_Producto );
}
//Registro de un nuevo comentario
public function FN_Registrar_Nuevo_Comentario()
{
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  if(!isset($_SESSION["Aobj_Datos_Usuario"]))
  {
    echo "_Sesion_No_Iniciada";
  }
  else
  {
    $FK_ID_Usuario = Sesion::getValue( 'PK_ID_Usuario' );
    $Descripcion = $objDatos->Comentario;
    $PK_ID_Producto = $objDatos->PK_ID_Producto;
    $Valoracion_Producto = 0;
    $Registro_Comentario = $this->_Mdl_Usuario->FN_Registrar_Nuevo_Comentario(
      $FK_ID_Usuario,
      $Descripcion,
      $PK_ID_Producto,
      $Valoracion_Producto
      );
    if( $Registro_Comentario )
    {
      echo "Comentario_Registrado";
    }
    else
    {
      echo "false";
    }
  }
}


public function FN_Registrar_Nuevo_Comentario_APP_Movil()
{
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  if ( !isset( $objDatos ) ) {
    echo 'Los datos no llegaron';
  } else {
   if( $FK_ID_Usuario = $objDatos->PK_ID_Usuario != 0)
   {
     $FK_ID_Usuario = $objDatos->PK_ID_Usuario;
     $Descripcion = $objDatos->Comentario;
     $PK_ID_Producto = $objDatos->PK_ID_Producto;
     $Valoracion_Producto = 0;
     $Registro_Comentario = $this->_Mdl_Usuario->FN_Registrar_Nuevo_Comentario(
      $FK_ID_Usuario,
      $Descripcion,
      $PK_ID_Producto,
      $Valoracion_Producto
      );
     if( $Registro_Comentario )
     {
      echo "Comentario_Registrado";
    }
    else
    {
      echo "false";
    }
  }
  else
  {
    echo "_Sesion_No_Iniciada";
  }
}
}


public function FN_Verificacion_Cuenta_APP_Movil()
{
 $objDatos = json_decode( file_get_contents( "php://input" ) );
 if ( !isset( $objDatos ) ) {
  echo 'Los datos no llegaron';
} else {
  if($objDatos->PK_ID_Usuario != 0)
  {
    $PK_ID_Usuario = $objDatos->PK_ID_Usuario;
    $Verificacion_Cuenta =  $this->_Mdl_Usuario->FN_Verificacion_Cuenta
    ( $PK_ID_Usuario );
    if( $Verificacion_Cuenta  )
    {
      echo "Cuenta_No_Verifica";
    }
    else{
      echo "Verificada";
    }
  }
  else
  {
    echo "Cuenta_No_Verifica";
  }
}

}

//_ Funcion para verificar si la sesion se encuentra activa
public function FN_Verificacion_Sesion_APP_Movil()
{
 $objDatos = json_decode( file_get_contents( "php://input" ) );
 if ( !isset( $objDatos ) ) {
  echo 'Los datos no llegaron';
} else {
 if( $objDatos->PK_ID_Usuario != 0)
 {

  echo "_Sesion_Iniciada";
}
else
{
  echo "_Sesion_No_Iniciada";
}
}
}

public function FN_Eliminar_Comentario()
{
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  $PK_ID_Comentario = $objDatos;
  $Eliminacion_Comentario = $this->_Mdl_Usuario->FN_Eliminar_Comentario( $PK_ID_Comentario );

  if( $Eliminacion_Comentario )
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
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  $PK_ID_Comentario = $objDatos->PK_ID_Comentario;
  $Descripcion = $objDatos->Descripcion;
  $Modificacion_Comentario = $this->_Mdl_Usuario->FN_Modificar_Comentario( $PK_ID_Comentario,$Descripcion );

  if( $Modificacion_Comentario )
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
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  if( !isset( $_SESSION["Aobj_Datos_Usuario" ] ) )
  {
    echo "_Sesion_No_Iniciada";
  }
  else
  {
    $PK_ID_Comentario = $objDatos->PK_ID_Comentario;
    $PK_ID_Usuario = Sesion::getValue( 'PK_ID_Usuario' );
    // var_dump($PK_ID_Comentario);
    // var_dump($PK_ID_Usuario);
    $FN_VerificarComentario_Cuenta = $this->_Mdl_Usuario->FN_VerificarComentario_Cuenta
    ( $PK_ID_Comentario,$PK_ID_Usuario );
    if( $FN_VerificarComentario_Cuenta )
    {
      $FN_Valorar_Comentario_DisLike = $this->_Mdl_Usuario->FN_Valorar_Comentario_DisLike(
        $PK_ID_Comentario,
        $PK_ID_Usuario);
      if( $FN_Valorar_Comentario_DisLike )
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
      $FN_Valorar_Comentario_Like = $this->_Mdl_Usuario->FN_Valorar_Comentario_Like(
        $PK_ID_Comentario,
        $PK_ID_Usuario);

      if( $FN_Valorar_Comentario_Like )
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

//_ Funcion para verificar si la sesion se encuentra activa
public function FN_Verificacion_Sesion()
{
  //Si no existe la sesion
  if( !isset( $_SESSION["Aobj_Datos_Usuario" ] ) )
  {
    echo "_Sesion_No_Iniciada";
  }
  else
  {
    echo "_Sesion_Iniciada";
  }
}

//_ Funcion para realizar una verificacion de la cuenta, se verifica si la cuenta a sido verificada o no ha sido verificada
public function FN_Verificacion_Cuenta()
{
  //Si no existe la sesion
  $PK_ID_Usuario = Sesion::getValue( 'PK_ID_Usuario' );
  $Verificacion_Cuenta =  $this->_Mdl_Usuario->FN_Verificacion_Cuenta
  ( $PK_ID_Usuario );
  if($Verificacion_Cuenta)
  {
    echo "Cuenta_No_Verifica";
  }
  else
  {
    echo "Verificada";
  }
}




//_* FN_Recuperar_contrasenia
public function FN_Recuperar_contrasenia() {
  $objDatos = json_decode( file_get_contents( "php://input" ) );
  if ( !isset( $objDatos ) ) {
    echo 'Los datos no llegarón';
  } else {
    //Datos necesario para recuperar la contraseña
    $Correo_Usuario = $objDatos->Correo;
    $Respuesta_Actualizacion_Contrasenia =  $this->_Mdl_Usuario->FN_Recuperar_contrasenia
    ( $Correo_Usuario );
    if ( $Respuesta_Actualizacion_Contrasenia ) {
    //SI  ES EXITOSO RETORNA TRUE
      echo "true";
    } else {
    //SI  ES FALLIDO RETORNA FALSE
      echo "false";
    }
  }
}
//_* FN_Recuperar_contrasenia
public function FN_Actualizar_Contrasenia() {
  $objDatos = json_decode( file_get_contents( "php://input" ) );

  if ( !isset( $objDatos ) ) {
    echo 'Los datos no llegarón';
  } else {
    //Datos necesario para recuperar la contraseña
    $Anterior_Contrasenia = $objDatos->Anterior_Contrasenia;
    $Nueva_Contrasenia = $objDatos->Nueva_Contrasenia;
    $PK_ID_Usuario = $objDatos->PK_ID_Usuario;

    $Respuesta_Actualziacion_Contrasenia =  $this->_Mdl_Usuario->FN_Actualizar_Contrasenia
    ( $Anterior_Contrasenia,$Nueva_Contrasenia,$PK_ID_Usuario );
    if ($Respuesta_Actualziacion_Contrasenia) {
      echo "true";
    //Guardo la nueva contrasenia en la variable de sesion
      Sesion::setValue( 'Contrasenia' , $Nueva_Contrasenia );
    } else {
      echo "false";
    }
  }
}
//********



public function FN_Asociacion_Productos_Lista_Guardado_Datos_Producto()
{
  $Lista_Productos =json_decode( file_get_contents( "php://input" ) );

  if ( !isset( $Lista_Productos ) ) {
    echo "No_Hay_Datos";
  }
  else {
    foreach ($Lista_Productos as $key  ) {

    // Si  uno  o mas productos no poseen una cantidad retorno un mensaje solicitano llenar el campo cantidad
      if(!isset($key->NUM_Cantidad)){
        exit("Cantidad_No_Encontrada");

      }
    }

    //Para poder tener en un array completo, los datos de los productos qeu el usuario quiere enviar, separe el proceso de registro en dos, el primero el cual es este, es para mandar a php los datos de los productos en la orden, luego estos los guardo en una variable de sesion de php para asi luego usarlo en el segundo paso
    Sesion::setValue( 'Lista_Productos',$Lista_Productos );
    echo "Productos_Guardado";
  }
}
//
public function FN_Asociacion_Productos_Lista()
{
  $Datos =json_decode( file_get_contents( "php://input" ) );
  if ( !isset( $Datos ) ) {
    echo "No_Hay_Datos";
  }
  else {
    //Datos necesarios para hacer el registro en las tablas tbl_Cotizacion_Producto y tbl_dll_Produ_Cotizacion
    $PK_ID_Lista_Usuario = $Datos;
    $Datos_Producto = Sesion::getValue( 'Lista_Productos' );
      // var_dump($PK_ID_Lista_Usuario);
      // var_dump($Datos_Producto);

    $Respuesta = $this->_Mdl_Usuario->FN_Registro_Asociacion_Producto_Lista( $PK_ID_Lista_Usuario,
      $Datos_Producto );
    if( $Respuesta === "Cantidad_No_Encontrada" )
    {
      echo "Cantidad_No_Encontrada";
    }
    if( $Respuesta == true )
    {
      echo "true";
    }
    else
    {
      echo "false";
    }

  }
}


  //_* Funcion con la que guardo los datos de los productos que posee una lista dtll, esto lo realizo para poder pasar al paso 2 FN_Asociacion_Productos_Lista donde mando al sp los datos completos
public function FN_Modificar_Dtll_Lista_Usuario()
{
  $Lista_Productos =json_decode( file_get_contents( "php://input" ) );

  if ( !isset( $Lista_Productos ) ) {
    echo "No_Hay_Datos";
  }
  else {

    $Respuesta = $this->_Mdl_Usuario->FN_Modificar_Dtll_Lista_Usuario( $Lista_Productos );
    if( $Respuesta )
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
  }
}
//_* Funcion para guardar los usuarios o el usuario para el mensaje
public function FN_Envio_Mensaje_Guardado_Datos()
{
  $objDatos = json_decode(file_get_contents("php://input"));
  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    Sesion::setValue( 'Datos_Usuarios',$objDatos );
    echo "Usuarios_Guardados";
  }
}
  //_* Funcion para guardar los usuarios o el usuario para el mensaje
public function FN_Envio_Mensaje()
{
  $objDatos = json_decode(file_get_contents("php://input"));
  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $Asunto = $objDatos->Asunto;
    $Mensaje = $objDatos->Mensaje;
    $FK_ID_Usuario_Remitente = $objDatos->FK_ID_Usuario_Remitente;
    $Datos_Usuario = Sesion::getValue( 'Datos_Usuarios' );
    foreach ($Datos_Usuario as $key ) {
      $FK_ID_Usuario_Destinatario = $key->PK_ID_Usuario;
      $Respuesta = $this->_Mdl_Usuario->FN_Envio_Mensaje( $Asunto, $Mensaje ,$FK_ID_Usuario_Destinatario ,$FK_ID_Usuario_Remitente );
    }

    if( $Respuesta )
    {
      echo "true";
    }
    else
    {
      echo "false";
    }

  }
}
  //****************

public function FN_Modificar_Estado_Buson_Mensajes()
{
  $Lista_Mensajes =json_decode( file_get_contents( "php://input" ) );

  if ( !isset( $Lista_Mensajes ) ) {
    echo "No_Hay_Datos";
  }
  else {
    foreach ($Lista_Mensajes as $key)  {
      $Respuesta = $this->_Mdl_Usuario->FN_Modificar_Estado_Buson_Mensajes( $key->PK_ID_Buson_Mensajes );
    }
    if( $Respuesta )
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
  }
}

public function FN_Modificar_Estado_Mensaje_Seleccion_Multiple_Eliminacion()
{
  $Lista_Mensajes =json_decode( file_get_contents( "php://input" ) );

  if ( !isset( $Lista_Mensajes ) ) {
    echo "No_Hay_Datos";
  }
  else {
    foreach ($Lista_Mensajes as $key)  {
      $Respuesta = $this->_Mdl_Usuario->FN_Modificar_Estado_Mensaje_Seleccion_Multiple_Eliminacion( $key->PK_ID_Buson_Mensajes );
    }
    if( $Respuesta )
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
  }
}


public function FN_Restaurar_Mensajes()
{
  $Lista_Mensajes =json_decode( file_get_contents( "php://input" ) );

  if ( !isset( $Lista_Mensajes ) ) {
    echo "No_Hay_Datos";
  }
  else {
    foreach ($Lista_Mensajes as $key)  {
      $Respuesta = $this->_Mdl_Usuario->FN_Restaurar_Mensajes( $key->PK_ID_Buson_Mensajes );
    }
    if( $Respuesta )
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
  }
}
  //
}
?>
