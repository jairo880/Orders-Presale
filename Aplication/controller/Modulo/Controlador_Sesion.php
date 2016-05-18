<?php
//Controlador para las sesiones
class Sesion
{
  public static function init()
  {
    session_start();
  }
  public static function destroy()
  {
    session_unset();
    session_destroy();
  }
  public static function setValue( $var, $val )
  {
    $_SESSION[ $var ] = $val;
  }
  public static function getValue( $var )
  {
    return $_SESSION[ $var ];
  }
  public static function getAll()
  {
    return $_SESSION;
  }
  public function unsetValue( $var )
  {
    if ( isset( $_SESSION[ $var ] ) ) {
      unset( $_SESSION[ $var ] );
    }
  }
  public static function exist()
  {
    return sizeof( $_SESSION ) > 0;
  }
}

?>
