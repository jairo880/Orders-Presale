<?php







class M_Cerrar_Sesion extends Controller
{
  /**
  * @param $db  objeto de la conección a la DB que recibe cuando se ejecuta la instancia.
  */
  function __construct($db)
  {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Error al intentar conectar con la Base de Datos en M_Cerrar_Sesion:'+$e);
    }
  }


  /**
  * Funcion para cerrar sesion
  * @param 
  */
  public function FN_Cerrar_Sesion()
  {
    //REQUIERO EL ARCHIVO Controlador_Sesion QUE POSEE LOS METODOS PARA LA SESION
    require APP.'controller/Modulo/Controlador_Sesion.php';


    /*Inicializa la Sessión para reconocer las variables $_SESSIÓN Iniciadas con Nombre de Usuario y Contraseñas */
    
    Sesion::init();


    if (!isset($_SESSION['Nombre_Usuario'])){
      return false;

    }else{
      /*Destruimos la sesión*/
      Sesion::destroy();
      // session_destroy();
      /*Eliminamos la Sessión o el historial o cache de la sesión*/
      session_unset();
      return true;
      


    }
  }
 
  //*****
}
