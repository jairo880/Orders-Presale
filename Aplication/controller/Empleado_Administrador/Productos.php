<?php

/**
* Class Productos
*
* Tenga en Cuenta:
* No utilice el mismo nombre de clase y método, ya que esto podría desencadenar
* un __construct (involuntario) de la clase.
*
* Esto es un comportamiento muy extraño de php, esta documentado aqui:
* http://php.net/manual/en/language.oop5.decon.php
*
*/
class Productos extends Controller
{
  /**
  * METODO: Index
  * Este metodo se ejecuta cuando solicito la URL :
  * http://nombreDeTuProyecto/Home/home
  * NOTA: Esta es la página por defecto cuando no se encuentra la URL.
  */
  public function Index()
  {

    // Basicos para la web
    require APP . 'view/_Templates/header.php';
    //Contenido propio de la vista
    require APP . 'view/EmpleadoAdmin/Productos/index.php';
    //Modulos implementados
    require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
    require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
    require APP . 'view/_Templates/Modulos/Modulo_Login.php';
    require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
    // Basicos para la web
    require APP . 'view/_Templates/footer.php';
  }


}
