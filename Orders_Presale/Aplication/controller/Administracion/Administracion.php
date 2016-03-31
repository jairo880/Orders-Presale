<?php
require APP.'controller/Modulo/Controlador_Sesion.php';
class Administracion extends Controller {

    /**
     * METODO: Index
     * Este metodo se ejecuta cuando solicito la URL
     * NOTA: Esta es la página por defecto cuando no se encuentra la URL.
     */
    private $_Mdl_Administracion = null;

    public function __construct() {
      $this->_Mdl_Administracion = $this->loadModel("M_Administracion");
      Sesion::init();

    }

    /**
     * *  RegistrarUsuario
     */
    public function FN_Registrar_Usuario() {

      $objDatos = json_decode(file_get_contents("php://input"));

      if (!isset($objDatos)) {
        echo 'Los datos no llegaron';
      } else {

        //_*Datos para poer realizar un registro
        $Nombre_Usuario = $objDatos->Nombre_Usuario;
        $Correo_Electronico = $objDatos->Correo;
        $Contrasenia = $objDatos->Contrasenia;
        //_*La imagen de portada y de usuario van a ser predeterminadas.
        $Imagen_Usuario = "https://_*dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar2_big.png";
        $Fondo_Perfil_Usuario = "https://_*dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/CF9.jpg";
        $Disponibilidad = "Activo";
        $Estado_Cuenta = "En uso"; //_*estado por defecto para la cuenta del usuario
        $Posee_Empresa = ''; //_*variable para la base de datos, parar saber si el cliente posee o no empresa



        //_*tipo_registro, traera un valor con este se validara el tipo de registro a realizar
        $Tipo_Registro = $objDatos->Tipo_Registro;

        $FK_ID_Rol = $Tipo_Registro; //_*Deacuerdo a la tabla rol: 3 = usuario,Deacuerdo a la tabla rol: 2 = empleado

        //_*=========GENERACION DE CONTRASEÑA ENCRIPTADA=========
        $digito = 7;
        $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $salt = sprintf('$2a$%02d$', $digito);

        for($i = 0; $i < 22; $i++)
        {
          $salt .= $set_salt[mt_rand(0, 22)];
        }

        $Contrasenia_Encriptada =  crypt($Contrasenia, $salt);

        //_*====================GENERACION DE CONTRASEÑA ENCRIPTADA=========


        //_*Esta funcion verifica si el nombre de usuario ingresado existe en la base de datos
        $Respuesta_Consultar_Nombre_Usuario = (bool) $this->_Mdl_Administracion->FN_Consultar_Nombre_Usuario
        (
          $Nombre_Usuario
          );

        //_*si el nombre de usuario existe 
        if ($Respuesta_Consultar_Nombre_Usuario) {
          echo "Usuario_Existente";
        }
        //_*si el nombre de usuario no existe 
        else {
          //_*Esta funcion verifica si el correo  ingresado existe en la base de datos
         $Respuesta_Consultar_Correo = (bool) $this->_Mdl_Administracion->FN_Consultar_Correo
         (
          $Correo_Electronico
          );
         //_*SI EXISTE EN LA BASE DE DATOS 
         if ($Respuesta_Consultar_Correo) {
          echo "Correo_Existente";
        }
        //_* SI EL CORREO NO EXISTE PODEMOS CREAR LA CUENTA 
        else
        {

          $Respuesta_Registro_Cuenta = (int) $this->_Mdl_Administracion->FN_Registrar_TBL_Cuenta(
           $Nombre_Usuario,
           $Correo_Electronico,
           $Contrasenia,
           $Contrasenia_Encriptada,
           $Imagen_Usuario,
           $Fondo_Perfil_Usuario,
           $Disponibilidad, 
           $Estado_Cuenta, 
           $FK_ID_Rol
           );
          //_*Tipo_Registro == 2: registro datos para un empleado
          if ($Tipo_Registro == 2) {

            //_*registrando en tbl_empleado datos necesario para el validacion de campos vacios en el registro tbl_empleado
            if (empty($objDatos->Segundo_Nombre)) {
              $objDatos->Segundo_Nombre = "null";
            }
            if (empty($objDatos->Segundo_Apellido)) {
              $objDatos->Segundo_Apellido = "null";
            }
            //_**********
            $FK_ID_Cuenta = $Respuesta_Registro_Cuenta;//_*Foreing key
            $Nombre = $objDatos->Nombre;
            $Segundo_Nombre = $objDatos->Segundo_Nombre;
            $Apellido = $objDatos->Apellido;
            $Segundo_Apellido = $objDatos->Segundo_Apellido;
            $Municipio = $objDatos->Municipio;
            $Fecha_Nacimiento = $objDatos->Fecha_Nacimiento;
            $Telefono_Celular = $objDatos->Celular_Usuario;
            $Sexo = $objDatos->Genero;


            /*LLAMADO A LA FUNCION DEL MODELO QUE REALIZA EL REGISTRO EN LA BASE DE DATOS*/
            $Respuesta_Registro_Empleado  = $this->_Mdl_Administracion->FN_Registrar_TBL_Empleado
            (
              /*Paso los parametros*/
              $FK_ID_Cuenta,
              $Nombre, 
              $Segundo_Nombre, 
              $Apellido, 
              $Segundo_Apellido, 
              $Estado_Cuenta, 
              $Municipio, 
              $Fecha_Nacimiento, 
              $Telefono_Celular, 
              $Sexo
              );
                     /*********************REGISTRANDO EN TBL_Cuenta
                    Datos necesario para el registro de la tabla Cuenta
                    VALIDACION DE CAMPOS VACIOS EN EL REGISTRO Cuenta*/

                    $Respuesta_Registro_DTLL_ROL_CUENTA  = $this->_Mdl_Administracion->FN_Registrar_TBL_Dll_Rol_Cuenta
                    (
                     $FK_ID_Rol,
                     $FK_ID_Cuenta
                     );

                    if ($Respuesta_Registro_Empleado = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registro_DTLL_ROL_CUENTA = true) {
                      echo "true";
                    } else {
                      echo "false";
                    }
                  };


                  /*Tipo_Registro == 2: registro datos para un cliente*/
                  if ($Tipo_Registro == 3) {

                /*Datos encesario para el registro en la tabla cliente
                VALIDACION DE CAMPOS  VACIOS*/
                if (empty($objDatos->Segundo_Nombre)) {
                  $objDatos->Segundo_Nombre = "null";
                };
                if (empty($objDatos->Segundo_Apellido)) {
                  $objDatos->Segundo_Apellido = "null";
                };
                $FK_ID_Cuenta = $Respuesta_Registro_Cuenta;
                $Nombre = $objDatos->Nombre;
                $Segundo_Nombre = $objDatos->Segundo_Nombre;
                $Apellido = $objDatos->Apellido;
                $Segundo_Apellido = $objDatos->Segundo_Apellido;
                $Municipio = $objDatos->Municipio;
                $Fecha_Nacimiento = $objDatos->Fecha_Nacimiento;
                $Telefono_Celular = $objDatos->Celular_Usuario;
                $Sexo = $objDatos->Genero;
                $Tipo_Cliente = "Esporadico";

                if ($objDatos->Posee_Empresa == "si_poseeo_empresa") {
                 $Posee_Empresa = "SI"; 
               } 

               if ($objDatos->Posee_Empresa == "no_poseeo_empresa") { 
                 $Posee_Empresa = "NO"; 

               } 

               /*LLAMADO A LA FUNCION DEL MODELO QUE REALIZA EL REGISTRO EN LA BASE DE DATOS*/
               $Respuesta_Registro_Cliente = $this->_Mdl_Administracion->FN_Registrar_TBL_Cliente
               (
                /*Paso los parametros*/
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

               /*REGISTRO EN LA TABLA DTLL ROL CUENTA*/
               $Respuesta_Registro_DTLL_ROL_CUENTA = $this->_Mdl_Administracion->FN_Registrar_TBL_Dll_Rol_Cuenta
               (
                //_*Paso los parametros*/
                 $FK_ID_Rol, 
                 $FK_ID_Cuenta
                 );


               
                /*Datos nencesario para el registro en la tabla Establecimiento
                validacion, si el usuario al realizar el registro indica que tiene empresa, se recibe por medio de la variable
                posee_empresa un caracter: si = no posee empresa, no = si posee empresa*/


                /*si no posee empresa, se registra tansolamente en la tabla cuenta, y cliente*/
                if ($objDatos->Posee_Empresa == "no_poseeo_empresa") {
                  if ($Respuesta_Registro_Cliente = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registro_DTLL_ROL_CUENTA = true) {
                    echo "true";
                  } else {
                    echo "false";
                  };
                };
                if ($objDatos->Posee_Empresa == "si_poseeo_empresa") {

                  $Nombre_Establecimiento = $objDatos->Nombre_Empresa;
                  $Nombre_Encargado = $objDatos->Nombre_Encargado;
                  $Nit = $objDatos->NIT;
                  $Telefono_Establecimiento  = $objDatos->Telefono_Empresa;
                  $Direccion_Establecimiento  = $objDatos->Direcion_Empresa;
                  $Municipio_Establecimiento  = $objDatos->Celular_Usuario;
                  $FK_ID_Usuario = $Respuesta_Registro_Cuenta;

                  /*LLAMADO A LA FUNCION DEL MODELO QUE REALIZA EL REGISTRO EN LA BASE DE DATOS*/
                  $res_Establecimiento = $this->_Mdl_Administracion->FN_Registrar_TBL_Establecimiento
                  (
                    $Nombre_Establecimiento,
                    $Nombre_Encargado, 
                    $Nit, 
                    $Telefono_Establecimiento , 
                    $Direccion_Establecimiento , 
                    $Municipio_Establecimiento , 
                    $FK_ID_Usuario
                    );

                  if ($res_Establecimiento = true && $Respuesta_Registro_Cliente = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registro_DTLL_ROL_CUENTA = true) {
                    echo "true";
                  } else {
                    echo "false";
                  };
                };
                /**********/
              };


            }
          }
        }
      }









      public function FN_Listar_Usuarios()
      {
        //_*Listar los datos 
        $Lista_Usuarios = $this->_Mdl_Administracion->FN_Listar_Usuarios();
        echo json_encode($Lista_Usuarios);


      }


/**
* Modificar datos cuenta usuario
*/
//Esta funcion es para cambiar la disponibilidad del usuario
public function FN_Modificar_Datos() {
  $objDatos = json_decode(file_get_contents("php://input"));

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $PK_ID_Usuario = $objDatos->PK_ID_Usuario;
    $Disponibilidad = $objDatos->Disponibilidad;


    $res = $this->_Mdl_Administracion->FN_Modificar_Datos(
      $PK_ID_Usuario,
      $Disponibilidad
      );

    if ($res) {
      echo "true";
    }else {
      echo "false";
    }
  }
}

//Funciones para la gestion de contenido
public function FN_Registrar_Imagen_Portada(){
 $objDatos =  json_decode(file_get_contents("php://input"));
 $Url = $objDatos->URL_Imagen_Portada;


 $Verificacion_Imagen_Registrada = $this->_Mdl_Administracion->FN_Verificar_Imagen_Portada($Url);
 if($Verificacion_Imagen_Registrada)
 {
  echo "Imagen_Encontrada";
  
}
else
{
 $Respuesta = $this->_Mdl_Administracion->FN_Registrar_Imagen_Portada($Url);

 if ($Respuesta){
  echo "true";
}else{
  echo "false";
}
}


}

public function FN_Registrar_Imagen_Perfil(){
 $objDatos =  json_decode(file_get_contents("php://input"));
 $Url = $objDatos->URL_Imagen_Perfil;

 $Verificacion_Imagen_Registrada = $this->_Mdl_Administracion->FN_Verificar_Imagen_Perfil($Url);
 if($Verificacion_Imagen_Registrada)
 {
  echo "Imagen_Encontrada";

}
else 
{
  $Respuesta = $this->_Mdl_Administracion->FN_Registrar_Imagen_Perfil($Url);

  if ($Respuesta){
    echo "true";
  }else{
    echo "false";
  }
} 

}


public function FN_Listar_Imagen_Perfil(){
  $Respuesta = $this->_Mdl_Administracion->FN_Listar_Imagen_Perfil();
  echo json_encode($Respuesta);
}




public function FN_Listar_Imagen_Portada(){
  $Respuesta = $this->_Mdl_Administracion->FN_Listar_Imagen_Portada();
  echo json_encode($Respuesta);
}



public function FN_Modificar_Imagen_Perfil() {
  $objDatos = json_decode(file_get_contents("php://input"));
  

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $URL = $objDatos->URL_Imagen_Usuario;
    $PK_ID_Imagen_Usuario = $objDatos->PK_ID_Imagen_Usuario;


    $res = $this->_Mdl_Administracion->FN_Modificar_Imagen_Perfil(
      $PK_ID_Imagen_Usuario,
      $URL
      );

    if ($res) {
      echo "true";
    }else {
      echo "false";
    }
  }
}

public function FN_Modificar_Imagen_Portada() {
  $objDatos = json_decode(file_get_contents("php://input"));



  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $URL = $objDatos->URL_Imagen_Portada;
    $PK_ID_Imagen_Portada = $objDatos->PK_ID_Imagen_Portada;




    $res = $this->_Mdl_Administracion->FN_Modificar_Imagen_Portada(
      $PK_ID_Imagen_Portada,
      $URL 
      );

    if ($res) {
      echo "true";
    }else {
      echo "false";
    }
  }
}
//_****************

public function FN_Eliminar_Imagen_Usuario()
{
 $objDatos = json_decode(file_get_contents("php://input"));

 if(!isset($objDatos)){
  echo "Los datos no llegaron";
}else{

  $PK_ID_Imagen_Usuario= $objDatos->PK_ID_Imagen_Usuario;

  $respuesta = $this->_Mdl_Administracion->FN_Eliminar_Imagen_Usuario($PK_ID_Imagen_Usuario);
  if($respuesta){
    echo "true";
  }else{
    echo "false";
  }

}
}

public function FN_Eliminar_Imagen_Portada()
{

 $objDatos = json_decode(file_get_contents("php://input"));

 if(!isset($objDatos)){
  echo "Los datos no llegaron";
}else{

  $PK_ID_Imagen_Portada = $objDatos->PK_ID_Imagen_Portada;

  $respuesta = $this->_Mdl_Administracion->FN_Eliminar_Imagen_Portada($PK_ID_Imagen_Portada);

  if($respuesta){
    echo "true";
  }else{
    echo "false";
  }

}
}

//Funcion para que el aministrador pueda habilitar la cuenta de un usuario
public function FN_Habilitar_Estado_Cuenta_Usuario()
{
  $objDatos = json_decode(file_get_contents("php://input"));

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $PK_ID_Usuario = $objDatos->PK_ID_Usuario;


    $res = $this->_Mdl_Administracion->FN_Habilitar_Estado_Cuenta_Usuario(
      $PK_ID_Usuario
      );

    if ($res) {
      echo "true";
    }else {
      echo "false";
    }
  }
}
//Funcion para que el aministrador pueda inhabilitar la cuenta de un usuario

public function FN_Inhabilitar_Estado_Cuenta_Usuario()
{
  $objDatos = json_decode(file_get_contents("php://input"));

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $PK_ID_Usuario = $objDatos->PK_ID_Usuario;


    $res = $this->_Mdl_Administracion->FN_Inhabilitar_Estado_Cuenta_Usuario(
      $PK_ID_Usuario
      );

    if ($res) {
      echo "true";
    }else {
      echo "false";
    }
  }
}


public function FN_Listar_Ordenes_Usuario()
{
  $objDatos = json_decode(file_get_contents("php://input"));

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $PK_ID_Usuario = $objDatos->PK_ID_Usuario;
    $Lista_Ordenes = $this->_Mdl_Administracion->FN_Listar_Ordenes_Usuario($PK_ID_Usuario);
    echo json_encode($Lista_Ordenes);
  }


}
public function FN_Listar_Detalle_Ordene_Usuario()
{
  $objDatos = json_decode(file_get_contents("php://input"));

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $PK_ID_Cotizacion_Usuario = $objDatos->PK_ID_Cotizacion_Usuario;
    $Lista_Ordenes = $this->_Mdl_Administracion->FN_Listar_Detalle_Ordene_Usuario($PK_ID_Cotizacion_Usuario);
    echo json_encode($Lista_Ordenes);
  }


}
public function FN_Actualizar_Estado_Orden()
{
  $objDatos = json_decode(file_get_contents("php://input"));

  if (!isset($objDatos)) {
    echo 'Los datos no llegarón';
  }else {
    $Estado_Cotizacion = $objDatos->Estado_Cotizacion;
    $PK_ID_Cotizacion_Usuario = $objDatos->PK_ID_Cotizacion_Usuario;
    $PK_ID_Usuario = $objDatos->FK_ID_Usuario;
    $PK_ID_Cotizacion_Usuario = $objDatos->PK_ID_Cotizacion_Usuario;

    $Actualizacion_Orden_Estado = $this->_Mdl_Administracion->FN_Actualizar_Estado_Orden(
      $Estado_Cotizacion,
      $PK_ID_Cotizacion_Usuario,
      $PK_ID_Usuario,
      $PK_ID_Cotizacion_Usuario);

    if ($Actualizacion_Orden_Estado) {
      echo "true";
    }else {
      echo "false";
    }
    
  }


}
//_******



}

