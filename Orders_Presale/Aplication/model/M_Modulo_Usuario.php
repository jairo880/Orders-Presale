<?php

class M_Modulo_Usuario
{
  /**
  * @param $db  objeto de la conección a la DB que recibe cuando se ejecuta la instancia.
  */
  function __construct($db)
  {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Error al intentar conectar con la Base de Datos en M_Modulo_Usuario:'+$e);
    }
  }


    /**
  * Funcion para iniciar sesion en el sistema
  * @param 
  */
    public function FN_Iniciar_Sesion(
      $Nombre_Usuario,
      $Contrasenia)
    {

      $sql = "CALL `spJoin_Cliente_Cuenta_Establecimiento`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $Nombre_Usuario);
      $query -> bindParam(2, $Contrasenia);
      $query -> execute();
      if ($query->rowCount() > 0) {
        return $query->fetchAll();
      }
      else 
      {
      //========  spJoin_Cliente_Cuenta
       $sql = "CALL `spJoin_Cliente_Cuenta`(?,?);";
       $query = $this->db->prepare($sql);
       $query->bindParam(1, $Nombre_Usuario);
       $query -> bindParam(2, $Contrasenia);
       $query -> execute();
       if ($query->rowCount() > 0) {
        return $query->fetchAll();
      }
      else 
      {
     //=========== spJoin_Empleado_Cuenta


        $sql = "CALL `spJoin_Empleado_Cuenta`(?,?);";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $Nombre_Usuario);
        $query -> bindParam(2, $Contrasenia);
        $query -> execute();
        if ($query->rowCount() > 0) {
          return $query->fetchAll();
        }
        else 
        {
          return false;
        }
      //========== spJoin_Empleado_Cuenta
      }
      //======== spJoin_Cliente_Cuenta
    }


  }

  public function FN_Actualizar_Datos_Tabla_Cuenta(
    $PK_ID_Usuario ,
    $Nombre_Usuario,
    $Imagen_Usuario,
    $Fondo_Perfil_Usuario, 
    $Disponibilidad,
    $FK_ID_Rol,
    $Correo_Electronico
    )
  {
     //========  spModificarEmpleado
   $sql = "CALL `spModificarCuenta`(?,?,?,?,?,?,?);";
   $query = $this->db->prepare($sql);
   $query->bindParam(1, $PK_ID_Usuario);
   $query -> bindParam(2, $Nombre_Usuario);
   $query->bindParam(3, $Imagen_Usuario);
   $query -> bindParam(4, $Fondo_Perfil_Usuario);
   $query->bindParam(5, $Disponibilidad);
   $query -> bindParam(6, $FK_ID_Rol);
   $query -> bindParam(7, $Correo_Electronico);



   $query -> execute();
   if ($query->rowCount() > 0) {
    return true;
  }else {

   return false;
    //========  spModificarEmpleado

 }
}
public function FN_Actualizar_Datos_Tabla_Empleado(
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
 )
{
     //========  spModificarEmpleado
 $sql = "CALL `spModificarEmpleado`(?,?,?,?,?,?,?,?,?,?);";
 $query = $this->db->prepare($sql);
 $query->bindParam(1, $PK_ID_Usuario_Persona);
 $query -> bindParam(2, $FK_ID_Cuenta);
 $query->bindParam(3, $Nombre);
 $query -> bindParam(4, $Segundo_Nombre);
 $query->bindParam(5, $Apellido);
 $query -> bindParam(6, $Segundo_Apellido);
 $query->bindParam(7, $Municipio);
 $query -> bindParam(8, $Fecha_Nacimiento);
 $query->bindParam(9, $Telefono_Celular);
 $query->bindParam(10, $Sexo);


 $query -> execute();
 if ($query->rowCount() > 0) {
  return true;
}else {

 return false;
    //========  spModificarEmpleado

}
}

public function FN_Actualizar_Datos_Tabla_Cliente(
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
 )
{
     //========  spModificarCliente

  $sql = "CALL `spModificarCliente`(?,?,?,?,?,?,?,?,?,?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Usuario_Persona);
  $query -> bindParam(2, $FK_ID_Cuenta);
  $query->bindParam(3, $Nombre);
  $query -> bindParam(4, $Segundo_Nombre);
  $query->bindParam(5, $Apellido);
  $query -> bindParam(6, $Segundo_Apellido);
  $query->bindParam(7, $Municipio);
  $query -> bindParam(8, $Fecha_Nacimiento);
  $query->bindParam(9, $Telefono_Celular);
  $query->bindParam(10, $Sexo);
  $query -> bindParam(11, $Tipo_Cliente);
  $query -> bindParam(12, $Posee_Empresa);


  $query -> execute();
  if ($query->rowCount() > 0) {
    return true;
  }else {
    return false;
  }
}

public function FN_Actualizar_Datos_Tabla_Establecimiento(
  $PK_ID_Establecimiento ,
  $Nombre_Establecimiento,
  $Nombre_Encargado,
  $Nit,
  $Telefono_Establecimiento, 
  $Direccion_Establecimiento,
  $Municipio_Establecimiento,
  $FK_ID_Usuario
  )
{
     //========  spModificarEmpleado
 $sql = "CALL `spModificarDatos_establecimientos`(?,?,?,?,?,?,?,?);";
 $query = $this->db->prepare($sql);
 $query->bindParam(1, $PK_ID_Establecimiento);
 $query -> bindParam(2, $Nombre_Establecimiento);
 $query->bindParam(3, $Nombre_Encargado);
 $query->bindParam(4, $Nit);
 $query -> bindParam(5, $Telefono_Establecimiento);
 $query->bindParam(6, $Direccion_Establecimiento);
 $query -> bindParam(7, $Municipio_Establecimiento);
 $query -> bindParam(8, $FK_ID_Usuario);


 $query -> execute();
 if ($query->rowCount() > 0) {
  return true;
}else {

 return false;

}
    //========  spModificarEmpleado
}



public function FN_Verificacion_Empresa($FK_ID_Cuenta)
{
    //========  spModificarEmpleado
 $sql = "CALL `spConsultarDatos_establecimientos`(?);";
 $query = $this->db->prepare($sql);
 $query->bindParam(1, $FK_ID_Cuenta);


 $query -> execute();
 if ($query->rowCount() > 0) {
  return true;
}else {

 return false;

}
    //========  spModificarEmpleado
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
* FN_Inhabilitar_Estado_Cuenta
* @param 
*/
public function FN_Inhabilitar_Estado_Cuenta(
  $PK_ID_Usuario
  ){
  $sql = "CALL `spInhabilitarCuenta_Usuario`(?)";
  $query= $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Usuario);
  $query->execute();


  if ($query->rowCount() > 0) {
    return true;

  } else {
    return false;
  }
}
/**
* FN_Habilitar_Estado_Cuenta_Usuario_Login
* @param 
*/
public function FN_Habilitar_Estado_Cuenta_Usuario_Login(
  $PK_ID_Usuario
  ){
  $sql = "CALL `spHabilitarCuenta_Usuario`(?)";
  $query= $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Usuario);
  $query->execute();


  if ($query->rowCount() > 0) {
    return true;

  } else {
    return false;
  }
}

  //***************

public function FN_Consultar_Permisos_Rol(
  $PK_ID_Rol,
  $Vista_Solocitada
  ){
  $sql = "CALL `spConsultar_Permisos_Vista`(?,?)";
  $query= $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Rol);
  $query->bindParam(2, $Vista_Solocitada);

  $query->execute();


  if ($query->rowCount() > 0) {
    return true;

  } else {
    return false;
  }

  //***************


}


public function FN_Listar_Modulo_Permisos_Usuario($Tipo_Listar)
{
  $sql = "CALL `spListar_Vistas_Administrador`(?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $Tipo_Listar);
  $query->execute();

  return $query->fetchAll();
}

public function FN_Listar_Roles_Usuarios()
{
  $sql = "CALL `spListarRol_usuario`();";
  $query = $this->db->prepare($sql);
  $query->execute();

  return $query->fetchAll();
}
public function FN_Registrar_Permiso_Usuario(
  $Nombre_Vista,
  $Url_Vista,
  $FK_ID_Rol)
{

  $sql = "CALL `spConsultar_Permisos_Vista`(?,?)";
  $query= $this->db->prepare($sql);
  $query->bindParam(1, $FK_ID_Rol);
  $query->bindParam(2, $Url_Vista);

  $query->execute();


  if ($query->rowCount() > 0) {
    return false;

  } else {

    $sql = "SELECT `fnRegistrar_Vista_Usuario`(?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $Nombre_Vista);
    $query->bindParam(2, $Url_Vista);
    $query->execute();

    if ($query->rowCount() > 0) {
      $PK_ID_Vista = $query->fetchColumn();


      $sql = "CALL `spRegistrarPermisos_Usuario`(?,?);";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $FK_ID_Rol);
      $query->bindParam(2, $PK_ID_Vista);
      $query->execute();


      if ($query->rowCount() > 0) {
        return true;

      } else {
        return false;
      }
    }
  }
}
//¨¨¨¨
public function FN_Eliminar_Permiso_Usuario(
  $FK_ID_Rol,
  $FK_ID_Vista)
{
  $sql = "CALL `spEliminarPermisos_Usuario`(?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $FK_ID_Rol);
  $query->bindParam(2, $FK_ID_Vista);
  $query->execute();

  if ($query->rowCount() > 0) {


    $sql = "CALL `spEliminarVista_Usuario`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $FK_ID_Vista);
    $query->execute();


    if ($query->rowCount() > 0) {
      return true;

    } else {
      return false;
    }
  }
}
//-----
public function FN_Modificar_Permiso_Usuario(
  $PK_ID_Vista,
  $Url_Vista,
  $Nombre_Vista)
{
  $sql = "CALL `spActualizar_Permiso_Usuario`(?,?,?);";
  $query = $this->db->prepare($sql);
  $query->bindParam(1, $PK_ID_Vista);
  $query->bindParam(2, $Url_Vista);
  $query->bindParam(3, $Nombre_Vista);

  $query->execute();

  if ($query->rowCount() > 0) {
    return true;

  } else {
    return false;
  }
}







//¨¨¨¨
}



?>