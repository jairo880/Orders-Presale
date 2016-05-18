<?php
class Registro extends Controller {
  private $_Mdl_RegistroUsuario = null;
  public function __construct() {
    $this->_Mdl_RegistroUsuario = $this->loadModel( "M_Modulo_Usuario" );
  }
  public function Index() {
    // Basicos para la web
    require APP . 'view/_Templates/header.php';
    //Contenido propio de la vista
    require APP . 'view/Cliente/Registro/index.php';
    //Modulos implementados
    // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
    require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
    // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
    require APP . 'view/_Templates/Modulos/Modulo_Login.php';
    require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
    // Basicos para la web
    require APP . 'view/_Templates/footer.php';
  }
}
