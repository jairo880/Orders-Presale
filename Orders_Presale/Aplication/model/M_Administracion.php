<?php

class M_Administracion {

    /**
     * @param $db  objeto de la conección a la DB que recibe cuando se ejecuta la instancia.
     */
    function __construct($db) {
      try {
        $this->db = $db;
      } catch (PDOException $e) {
        exit('Error al intentar conectar con la Base de Datos en M_Administracion:' + $e);
      }
    }

    /**
  * Registro en la tabla Cuenta
  * @param
  */
    public function FN_Registrar_TBL_Cuenta(
      $Nombre_Usuario,
      $Correo_Electronico,
      $Contrasenia,
      $Contrasenia_Encriptada,
      $Imagen_Usuario,
      $Fondo_Perfil_Usuario,
      $Disponibilidad,
      $Estado_Cuenta,
      $FK_ID_Rol) {

      //================================GENERACION DE CONTRASEÑA ALEATORIA======================

     $alfabeto = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
     $contrasenia = array();
     $alfabetolength = strlen($alfabeto);
     $Contrasenia_Recuperacion = ""; 

     for($i=0; $i <= 7 ; $i++)
     { 
      $n = rand(0, $alfabetolength -1);
      $Contrasenia_Recuperacion .= substr($alfabeto,$n,1) ;
    }


    $sql = "SELECT `fnRegistrarCliente`(?,?,?,?,?,?,?,?,?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Nombre_Usuario);
    $query->bindParam(2,$Correo_Electronico);
    $query->bindParam(3,$Contrasenia);
    $query->bindParam(4,$Contrasenia_Recuperacion);
    $query->bindParam(5,$Contrasenia_Encriptada);
    $query->bindParam(6,$Imagen_Usuario);
    $query->bindParam(7,$Fondo_Perfil_Usuario);
    $query->bindParam(8,$Disponibilidad);
    $query->bindParam(9,$Estado_Cuenta);
    $query->bindParam(10,$FK_ID_Rol);
    


    $query->execute();

    if ($query->rowCount() > 0) {
      return $query->fetchColumn();
    }
  }

    /**
  * Registro en la tabla Cliente
  * @param
  */
    public function FN_Registrar_TBL_Cliente(
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
      ) {

      $sql = "CALL `spRegistrarCliente`(?,?,?,?,?,?,?,?,?,?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $FK_ID_Cuenta);
      $query->bindParam(2, $Nombre);
      $query->bindParam(3, $Segundo_Nombre);
      $query->bindParam(4, $Apellido);
      $query->bindParam(5, $Segundo_Apellido);
      $query->bindParam(6, $Municipio);
      $query->bindParam(7, $Fecha_Nacimiento);
      $query->bindParam(8, $Telefono_Celular);
      $query->bindParam(9, $Sexo);
      $query->bindParam(10, $Tipo_Cliente);
      $query->bindParam(11, $Posee_Empresa);

      $query->execute();

      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }
 /**
  * Registro en la tabla Establecimiento
  * @param
  */
 public function FN_Registrar_TBL_Establecimiento(
  $Nombre_Establecimiento,
  $Nombre_Encargado,
  $Nit,
  $Telefono_Establecimiento,
  $Direccion_Establecimiento,
  $Municipio_Establecimiento,
  $FK_ID_Usuario

  ) {

  $sql = "CALL `spRegistrarDatos_establecimientos`(?,?,?,?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $Nombre_Establecimiento);
  $query->bindParam(2, $Nombre_Encargado);
  $query->bindParam(3, $Nit);
  $query->bindParam(4, $Telefono_Establecimiento);
  $query->bindParam(5, $Direccion_Establecimiento);
  $query->bindParam(6, $Municipio_Establecimiento);
  $query->bindParam(7, $FK_ID_Usuario);
  $query->execute();

  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}
 /**
  * Registro en la tabla RolCuenta
  * @param
  */
 public function FN_Registrar_TBL_Dll_Rol_Cuenta(
  $FK_ID_Rol,
  $FK_ID_Usuario

  ) {

  $sql = "CALL `spRegistrarDll_rol_cuenta`(?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $FK_ID_Rol);
  $query->bindParam(2, $FK_ID_Usuario);
  $query->execute();

  if ($query->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

    /**
  * Registro en la tabla Empleado
  * @param
  */
    public function FN_Registrar_TBL_Empleado(
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
      ) {

      $sql = "CALL `spRegistrarEmpleado`(?,?,?,?,?,?,?,?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $FK_ID_Cuenta);
      $query->bindParam(2, $Nombre);
      $query->bindParam(3, $Segundo_Nombre);
      $query->bindParam(4, $Apellido);
      $query->bindParam(5, $Segundo_Apellido);
      $query->bindParam(6, $Municipio);
      $query->bindParam(7, $Fecha_Nacimiento);
      $query->bindParam(8, $Telefono_Celular);
      $query->bindParam(9, $Sexo);
      $query->execute();

      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

    
      /**
  * Listar todos los usuarios
  */
      public function FN_Listar_Usuarios() {

        $sql = "CALL `spListarCuenta`();";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
      }

    /**
  * Modificar datos de los usuairos
  */
    public function FN_Modificar_Datos(

     $PK_ID_Usuario,
     $Disponibilidad
     )
    {

      $sql = "CALL `spActualizarDisponibilidad`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $PK_ID_Usuario);
      $query->bindParam(2,$Disponibilidad);
      $query->execute();

      
      if ($query->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }
      /**
     * Consultar en la tabla cuenta si el nombre de usuario existe
     * @param 
     */
      public function FN_Consultar_Nombre_Usuario(
        $Nombre_Usuario
        ) {

        $sql = "CALL `spValidarNombreUsuario`(?);";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $Nombre_Usuario);
        $query->execute();

        if ($query->rowCount() > 0) {
          return true;
        } else {
          return false;
        }
      }




  /**
  * Consultar si el  correo existe en  la base de datos
  * @param 
  */
  public function FN_Consultar_Correo($Correo)
  {

    $sql = "CALL `spConsultarCorreoElectronico`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Correo);


    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function FN_Registrar_Imagen_Portada($Url){
    $sql="CALL `spRegistrarImagen_Portada` (?);";
    $query =$this->db->prepare($sql);
    $query->bindParam(1, $Url);
    $query->execute();

    if ($query->rowCount()>0){
      return true;
    }else{
      return false;
    }

  }
  public function FN_Registrar_Imagen_Perfil($Url){
    $sql="CALL `spRegistrarImagen_Usuario` (?);";
    $query =$this->db->prepare($sql);
    $query->bindParam(1, $Url);
    $query->execute();

    if ($query->rowCount()>0){
      return true;
    }else{
      return false;
    }

  }

  public function FN_Listar_Imagen_Perfil(){
    $sql="CALL `spListarImagen_Usuario` ();";
    $query = $this->db->prepare($sql);
    $query->execute(); 

    return $query->fetchAll();

  }


  public function FN_Listar_Imagen_Portada(){
    $sql="CALL `spListarImagen_Portada` ();";
    $query = $this->db->prepare($sql);
    $query->execute(); 
    return $query->fetchAll();

  }

     /**
  * Modificar datos de los usuairos
  */
     public function FN_Modificar_Imagen_Perfil(

       $PK_ID_Imagen_Usuario,
       $URL
       )
     {

      $sql = "CALL `spModificarImagen_Usuario`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $PK_ID_Imagen_Usuario);
      $query->bindParam(2, $URL);
      $query->execute();

      
      if ($query->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }
       /**
  * Modificar datos de los usuairos
  */
       public function FN_Modificar_Imagen_Portada(

         $PK_ID_Imagen_Portada,
         $URL
         )
       {
        $sql = "CALL `spModificarImagen_Portada`(?,?);";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $PK_ID_Imagen_Portada);
        $query->bindParam(2, $URL);
        $query->execute();


        if ($query->rowCount() > 0) {
          return true;
        }else {
          return false;
        }
      }

      public function FN_Eliminar_Imagen_Usuario(
        $PK_ID_Imagen_Usuario
        )
      {
        $sql = "CALL `spEliminarImagen_Usuario`(?);";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $PK_ID_Imagen_Usuario);
        $query->execute();


        if ($query->rowCount() > 0) {
          return true;
        }else {
          return false;
        }
      }


      public function FN_Eliminar_Imagen_Portada(
        $PK_ID_Imagen_Portada
        )
      {
        $sql = "CALL `spEliminarImagen_Portada`(?);";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $PK_ID_Imagen_Portada);
        $query->execute();


        if ($query->rowCount() > 0) {
          return true;
        }else {
          return false;
        }
      }
      public function FN_Verificar_Imagen_Portada(
        $URL
        )
      {
       $sql = "CALL `spConsultarImagen_Portada`(?);";
       $query = $this->db->prepare($sql);
       $query->bindParam(1, $URL);
       $query->execute();

       
       if ($query->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }
    public function FN_Verificar_Imagen_Perfil(
      $URL
      )
    {
     $sql = "CALL `spConsultarImagen_Usuario`(?);";
     $query = $this->db->prepare($sql);
     $query->bindParam(1, $URL);
     $query->execute();

     
     if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
  }

  public function FN_Inhabilitar_Estado_Cuenta_Usuario(
   $PK_ID_Usuario
      )
    {
     $sql = "CALL `spInhabilitarCuenta_Usuario`(?);";
     $query = $this->db->prepare($sql);
     $query->bindParam(1, $PK_ID_Usuario);
     $query->execute();

     
     if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
  }
   public function FN_Habilitar_Estado_Cuenta_Usuario(
   $PK_ID_Usuario
      )
    {
     $sql = "CALL `spHabilitarCuenta_Usuario`(?);";
     $query = $this->db->prepare($sql);
     $query->bindParam(1, $PK_ID_Usuario);
     $query->execute();

     
     if ($query->rowCount() > 0) {
      return true;
    }else {
      return false;
    }
  }

}
