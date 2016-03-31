<?php


require APP.'controller/Modulo/Controlador_Sesion.php';
class Modulo_Usuario extends Controller
{



  private $_Mdl_Usuario = null;
  
  public function __construct() {
    $this->_Mdl_Usuario = $this->loadModel("M_Modulo_Usuario");
    Sesion::init();
  }
  //Funcion para capturar los datos del usuario al ser recargada la pagina, esta funcion lo que hace es utilizar los datos del usuario (Nombre_Usuario y Contraseña) para volver a iniciar sesion y asi mantener los datos actualizados del usuario, esta funcion se ejecuta cada vez que se recarga la pagina por medio de un ng-init en la vista header
  public function FN_Capturar_Datos_Usuario_Iniciado()
  {
    //Si no existe la sesion
    if(!isset($_SESSION["Aobj_Datos_Usuario"]))
    {
      echo "false";
    }
    else
    {
      //_*Si la sesion esta activa tomo los datos necesarios para volver a iniciar sesion, estos datos los estoy guardando en variables de sesion de php, ademas de la variable Aobj_Datos_Usuario he creado otras variables de sesion para no tener que usar siempre un foreach para sacar los datos 
      $Respuesta_Consulta_Cuenta =  $this->_Mdl_Usuario->FN_Iniciar_Sesion(
        Sesion::getValue('Nombre_Usuario'),
        Sesion::getValue('Contrasenia')
        );
      //_*Capturo el estado de la cuenta y el fk_id_rol, el estado de la cuenta nos sirve para posteriormente verificar si la cuenta no ha sido cancelada y el fk_id_rol nos sirve para usarla en el archivo application.php donde se necesita usar la variable de sesion fk_id_rol para asi consultar los permisos a la base de datos
      foreach ($Respuesta_Consulta_Cuenta as $clave) {
        $Estado_Cuenta = $clave->Estado_Cuenta;
        $FK_ID_Rol = $clave->FK_ID_Rol;
      //_*----
        Sesion::setValue('Estado_Cuenta',$Estado_Cuenta);
        Sesion::setValue('FK_ID_Rol',$FK_ID_Rol);

      }
    //_*Verifico  el estado actual de la cuenta 
      if(Sesion::getValue('Estado_Cuenta') == "Cancelada" )

      {
        echo "Cuenta_Cancelada";
      }
      if(Sesion::getValue('Estado_Cuenta') == "En uso" )

      {
    //_*Si la cuenta posee el estado en uso paso a volver a guardar los datos de la cuenta en la variable Aobj_Datos_Usuario
       Sesion::setValue('Aobj_Datos_Usuario',$Respuesta_Consulta_Cuenta);
       echo json_encode(Sesion::getValue('Aobj_Datos_Usuario'));
     }

   }

 }

    /*
    **  FN_Iniciar_Sesion
    */
    public function FN_Iniciar_Sesion() {

      $objDatos = json_decode(file_get_contents("php://input"));

      if (!isset($objDatos)) {
        echo("Los datos no llegaron");
      }else {


        //_*Datos necesario para el login
        $Usuario_Nombre = $objDatos->Usuario_Nombre;
        $Contrasenia =$objDatos->Contrasenia ;
        //----
        $Respuesta_Consulta_Cuenta =  $this->_Mdl_Usuario->FN_Iniciar_Sesion(
          $Usuario_Nombre,
          $Contrasenia 
          );
        //Si es true la respuesta
        if ($Respuesta_Consulta_Cuenta){
          $Nombre_Usuario;
          $Contrasenia;
          
          //_*Codigo para validar la contraseña encriptada de la base de datos
//_*          foreach ($Respuesta_Consulta_Cuenta as $clave) {

//_*           $Contrasenia_Ingresada = $objDatos->Contrasenia;
//_*           $Encriptado = $clave->Contrasenia_Encriptada;
//_*           var_dump($Contrasenia_Ingresada);
//_*           var_dump($Encriptado);

//_*         }
//_*         if($Encriptado == crypt($Contrasenia_Ingresada, $Encriptado)) {
//_*           echo 'Es igual';
//_*         }
//_*         else
//_*         {
//_*           echo "no es igual";
//_*         }

          //_*uso un foreach para recorrer el objeto retornado por la consulta a la base de datos, esta nos traera los datos del usuario que inicio sesion
          foreach ($Respuesta_Consulta_Cuenta as $clave) {



           //_******************************
           //Capturo los datos para la validacion del usuario
           $Nombre_Usuario = $clave->Nombre_Usuario;
           $Contrasenia = $clave->Contrasenia;
           $PK_ID_Usuario = $clave->PK_ID_Usuario;
           $Estado_Cuenta = $clave->Estado_Cuenta;
           $FK_ID_Rol = $clave->FK_ID_Rol;


           //_*Variables usadas para no tener que recorrer un foreach para sacar los datos, estos datos se pueden sacar al igual de la variable Aobj_Datos_Usuario
           Sesion::setValue('Nombre_Usuario',$Nombre_Usuario);
           Sesion::setValue('Contrasenia',$Contrasenia);
           Sesion::setValue('PK_ID_Usuario',$PK_ID_Usuario);
           Sesion::setValue('Estado_Cuenta',$Estado_Cuenta);
           Sesion::setValue('FK_ID_Rol',$FK_ID_Rol);


         }
        //_*Verifico  el estado actual de la cuenta 
         if(Sesion::getValue('Estado_Cuenta') == "Cancelada" )

         {
          echo "Cuenta_Cancelada";
        }
        if(Sesion::getValue('Estado_Cuenta') == "En uso" )

        {
        //_*Si la cuenta posee el estado en uso paso a volver a guardar los datos de la cuenta en la variable Aobj_Datos_Usuario
         Sesion::setValue('Aobj_Datos_Usuario',$Respuesta_Consulta_Cuenta);
         echo json_encode(Sesion::getValue('Aobj_Datos_Usuario'));
       }
     }
     else 
     {
      /*el retorno es false lo que significa los datos  del usuario no fueron  encontrados en la base de datos*/
      echo "false";   

    }  
  }

}

//_*Funcion utilizada para habilitar el estado de una cuenta 
public function FN_Habilitar_Estado_Cuenta_Usuario_Login()
{

  $PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');


  $Respuesta_Activacion_Cuenta = $this->_Mdl_Usuario->FN_Habilitar_Estado_Cuenta_Usuario_Login(
    $PK_ID_Usuario
    );

  if ($Respuesta_Activacion_Cuenta) {
      //Si la activacion fue exitosa vuelvo a hacer el proceso de inicio de sesion

    //Hago uso de las variables de sesion para no tener que volver a solicitar los datos del usuario
    $Usuario_Nombre =Sesion::getValue('Nombre_Usuario');
    $Contrasenia =Sesion::getValue('Contrasenia') ;

    $Respuesta_Consulta_Cuenta =  $this->_Mdl_Usuario->FN_Iniciar_Sesion(
      $Usuario_Nombre,
      $Contrasenia 
      );
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
      foreach ($Respuesta_Consulta_Cuenta as $clave) {

           //_******************************
           //Capturo los datos para la validacion del usuario
       $Nombre_Usuario = $clave->Nombre_Usuario;
       $Contrasenia = $clave->Contrasenia;
       $PK_ID_Usuario = $clave->PK_ID_Usuario;
       $Estado_Cuenta = $clave->Estado_Cuenta;
       $FK_ID_Rol = $clave->FK_ID_Rol;


     }

      //_*Variables usadas para no tener que recorrer un foreach para sacar los datos, estos datos se pueden sacar al igual de la variable Aobj_Datos_Usuario
     Sesion::setValue('Nombre_Usuario',$Nombre_Usuario);
     Sesion::setValue('Contrasenia',$Contrasenia);
     Sesion::setValue('PK_ID_Usuario',$PK_ID_Usuario);
     Sesion::setValue('Estado_Cuenta',$Estado_Cuenta);
     Sesion::setValue('FK_ID_Rol',$FK_ID_Rol);

      //Como la cuenta ya se encuentra activada no necesito volver a verificar el estado de la cuenta, paso a guardar directamente los datos del usuario en la variable de sesion 
     Sesion::setValue('Aobj_Datos_Usuario',$Respuesta_Consulta_Cuenta);

     echo json_encode($Respuesta_Consulta_Cuenta);
   }else {
    //Si no se pudo habilitar la cuenta
    echo "false";
  }
}

}
//Funcion para inhabilitar el estado de una cuenta
public function FN_Inhabilitar_Estado_Cuenta(){

  $DatosUsuario = json_decode(file_get_contents("php://input"));
  //Para inhabilitar una cuenta solo se necesita el id del usuario, no se hace uso de Nombre de usuario o contraseña ya que solo se puede acceder a la opcion inhabilitar cuenta si se ha iniciado sesion
  $PK_ID_Usuario=$DatosUsuario->PK_ID_Usuario;

  if (!isset($PK_ID_Usuario)){

    echo "false";

  }else{

    $Respuesta_Estado_Cuenta =  $this->_Mdl_Usuario->FN_Inhabilitar_Estado_Cuenta(
      $PK_ID_Usuario
      );

    if ($Respuesta_Estado_Cuenta){

      echo "true";

    }else{

      echo "false";
    }



  }
}
//Funcion para listar los  permisos  de los usuarios, esta funcion la ejecuta solo un administrador
public function FN_Listar_Modulo_Permisos_Usuario()
{
  $objDatos =json_decode(file_get_contents("php://input"));
  $Tipo_Listar = $objDatos->Tipo_Listar;

  if (!isset($objDatos)) {
    echo "Los datos no llegaron";
  }
  else {
    $Lista_Permisos = $this->_Mdl_Usuario->FN_Listar_Modulo_Permisos_Usuario($Tipo_Listar);
    echo json_encode($Lista_Permisos);
  }
}
//Funcion para listar los roles registrados en el sistema
public function FN_Listar_Roles_Usuarios()
{
  $Lista_Roles = $this->_Mdl_Usuario->FN_Listar_Roles_Usuarios();
  echo json_encode($Lista_Roles);
}
//Funcion para Registrar  permisos  de los usuarios, esta funcion la ejecuta solo un administrador
public function FN_Registrar_Permiso_Usuario()
{
  $objDatos =json_decode(file_get_contents("php://input"));
  $Nombre_Vista = $objDatos->Nombre_Vista;
  $Url_Vista = $objDatos->Url_Vista;
  $FK_ID_Rol = $objDatos->FK_ID_Rol;

  if (!isset($objDatos)) {
    echo "Los datos no llegaron";
  }
  else {
    $Registrar_tbl_vista_usuario =  $this->_Mdl_Usuario->FN_Registrar_Permiso_Usuario(
      $Nombre_Vista,
      $Url_Vista,
      $FK_ID_Rol);

    if($Registrar_tbl_vista_usuario)
    {
      echo "true";
    }
    else
    {
      echo "false";
    }

  }
}
//Funcion para Eliminar los  permisos  de los usuarios, esta funcion la ejecuta solo un administrador
public function FN_Eliminar_Permiso_Usuario()
{
  $objDatos =json_decode(file_get_contents("php://input"));
  $FK_ID_Rol = $objDatos->FK_ID_Rol;
  $FK_ID_Vista = $objDatos->PK_ID_Vista;

  if (!isset($objDatos)) {
    echo "Los datos no llegaron";
  }
  else {
    $Eliminar_Permiso =  $this->_Mdl_Usuario->FN_Eliminar_Permiso_Usuario(
      $FK_ID_Rol,
      $FK_ID_Vista);

    if($Eliminar_Permiso)
    {

      echo "true";
    }
    else
    {
      echo "false";
    }

  }
}
//Funcion para Modificar los  permisos  de los usuarios, esta funcion la ejecuta solo un administrador
public function FN_Modificar_Permiso_Usuario()
{
  $objDatos =json_decode(file_get_contents("php://input"));
  $PK_ID_Vista = $objDatos->PK_ID_Vista;
  $Url_Vista = $objDatos->Url_Vista;
  $Nombre_Vista = $objDatos->Nombre_Vista;


  if (!isset($objDatos)) {
    echo "Los datos no llegaron";
  }
  else {
    $Modificar_Permiso =  $this->_Mdl_Usuario->FN_Modificar_Permiso_Usuario(
      $PK_ID_Vista,
      $Url_Vista,
      $Nombre_Vista);

    if($Modificar_Permiso)
    {

      echo "true";
    }
    else
    {
      echo "false";
    }

  }
}
  //----------
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
      $Municipio  = $objDatos->Municipio;
      $Fecha_Nacimiento  = date('Y-m-d',strtotime($objDatos->Fecha_Nacimiento));
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
        if($FK_ID_Rol == 2 || $FK_ID_Rol == 1)
        {
          $Respuesta_Actualizacion_Datos_Tabla_Empleado = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Empleado(
            $PK_ID_Usuario_Persona ,
            $FK_ID_Cuenta,
            $Nombre,
            $Segundo_Nombre, 
            $Apellido,
            $Segundo_Apellido,
            $Municipio,
            $Fecha_Nacimiento,
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
            $Municipio,
            $Fecha_Nacimiento,
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

           $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
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
       $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
       

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
 if($FK_ID_Rol == 2 || $FK_ID_Rol == 1)
 {
  $Respuesta_Actualizacion_Datos_Tabla_Empleado = $this->_Mdl_Usuario->FN_Actualizar_Datos_Tabla_Empleado(
    $PK_ID_Usuario_Persona ,
    $FK_ID_Cuenta,
    $Nombre,
    $Segundo_Nombre, 
    $Apellido,
    $Segundo_Apellido,
    $Municipio,
    $Fecha_Nacimiento,
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
    $Municipio,
    $Fecha_Nacimiento,
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

   $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
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
 $Se_Hicieron_Cambios_Cliente_Establecimiento = "No";
 

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
//_*****
public function FN_Verificacion_Sesion()
{
    //Si no existe la sesion
  if(!isset($_SESSION["Aobj_Datos_Usuario"]))
  {
    echo "_Sesion_No_Iniciada";
  }
  else
  {
    echo "_Sesion_Iniciada";
  }
}

public function FN_Envio_Orden_Guardado_Datos_Productos()
{
  $Orden_Envio =json_decode(file_get_contents("php://input"));

  if (!isset($Orden_Envio)) {
    echo "No_Hay_Datos";
  }
  else {
    //Para poder tener en un array completo, los datos de los productos qeu el usuario quiere enviar, separe el proceso de registro en dos, el primero el cual es este, es para mandar a php los datos de los productos en la orden, luego estos los guardo en una variable de sesion de php para asi luego usarlo en el segundo paso
    Sesion::setValue('Orden_Envio',$Orden_Envio);
    echo "Orden_Guardada";
  }
}
public function FN_Envio_Orden()
{
  $Datos =json_decode(file_get_contents("php://input"));

  if (!isset($Datos)) {
    echo "No_Hay_Datos";
  }
  else {
    //Datos necesarios para hacer el registro en las tablas tbl_Cotizacion_Producto y tbl_dll_Produ_Cotizacion
    $Direccion_Entrega = $Datos->Direccion_Entrega;
    $Telefono_Entrega = $Datos->Telefono_Entrega;
    $PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
    $Datos_Producto = Sesion::getValue('Orden_Envio');

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

    if($Respuesta_Registro_tbl_Cotizacion_Producto)
    {
      echo "true";
    }
    else
    {
      echo "false";
    }

      // var_dump($FK_ID_Producto);
      // var_dump($Cantidad_Productos);
      // var_dump($Sub_Total);

    
  }
}

//Funcion para listar las ordenes enviadas por el usuario
public function FN_Listar_Ordenes_Enviadas()
{
  $PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
  $Lista_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Ordenes_Enviadas($PK_ID_Usuario);
  echo json_encode($Lista_Ordenes_Enviadas);
}

public function FN_Listar_Detalles_Ordene_Enviada()
{
  $Datos =json_decode(file_get_contents("php://input"));

  if (!isset($Datos)) {
    echo "No_Hay_Datos";
  }
  else {
    $Lista_Detalle_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Detalles_Ordene_Enviada(
      $Datos->PK_ID_Cotizacion_Usuario);
    echo json_encode($Lista_Detalle_Ordenes_Enviadas);
  }
}

public function FN_Eliminar_Orden_Enviada()
{
  $Datos =json_decode(file_get_contents("php://input"));

  if (!isset($Datos)) {
    echo "No_Hay_Datos";
  }
  else {
    $Respuesta_Eliminacion_Orden = $this->_Mdl_Usuario->FN_Eliminar_Orden_Enviada(
      $Datos->PK_ID_Cotizacion_Usuario);

    if($Respuesta_Eliminacion_Orden)
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
  }
}
//Funcion para listar las notificaciones del usuario
public function FN_Listar_Notificaciones()
{
  $PK_ID_Usuario = Sesion::getValue('PK_ID_Usuario');
  $Lista_Notificaciones = $this->_Mdl_Usuario->FN_Listar_Notificaciones($PK_ID_Usuario);
  echo json_encode($Lista_Notificaciones);
}

//Funcion para Eliminar una de  las notificaciones del usuario
public function FN_Eliminar_Notificacion()
{
 $objDatos = json_decode(file_get_contents("php://input"));

 if (!isset($objDatos)) {
  echo("Los datos no llegaron");
}else
{ 
  $PK_ID_Buson_Notificacion = $objDatos->PK_ID_Buson_Notificacion;
  $Eliminar_Notificaciones = $this->_Mdl_Usuario->FN_Eliminar_Notificacion($PK_ID_Buson_Notificacion);
    if($Eliminar_Notificaciones)
    {
      echo "true";
    }
    else
    {
      echo "false";
    }
}
}
}
?>
