<?php
require APP.'controller/Modulo/Controlador_Sesion.php';
class Administracion_Procesos extends Controller {

  private $_Mdl_Administracion_Procesos = null;

  public function __construct()
  {
    //_* 0- Primero que todo debo poder indicar cual archivo de modelo sera cargado, por eso se ideo la manera de indicar al constructor cual modelo cargar.
    //_* V//_*
    $Objeto_Datos = json_decode( file_get_contents("php://input" ));
    if( !isset( $Objeto_Datos->Nombre_Modelo ) ){
      echo "Error fatal: no se indico cual archivo tipo modelo se debia cargar, verifica bien el proceso de envio de datos";
      exit();
      
    }
    else
    {
      $Nombre_Modelo = $Objeto_Datos->Nombre_Modelo;
      $this->_Mdl_Administracion_Procesos = $this->loadModel( $Nombre_Modelo );
    }
  }
  //_* Funcion para actualizar estado de orden
  public function FN_Actualizar_Estado_Orden()
  {
    $objDatos = json_decode(file_get_contents("php://input"));
    if (!isset($objDatos)) {
      echo 'Los datos no llegarón';
    }else {
      $Estado_Cotizacion = $objDatos->Estado_Cotizacion;
      $PK_ID_Cotizacion_Usuario = $objDatos->PK_ID_Cotizacion_Usuario;
      $PK_ID_Usuario = $objDatos->FK_ID_Usuario;

      $Actualizacion_Orden_Estado = $this->_Mdl_Administracion_Procesos->FN_Actualizar_Estado_Orden(
        $Estado_Cotizacion,
        $PK_ID_Cotizacion_Usuario,
        $PK_ID_Usuario
        );
      if ($Actualizacion_Orden_Estado) {
        echo "true";
      }else {
        echo "false";
      }
    }
  }
//_* Enviar promocion
  public function FN_Enviar_Promociones()
  {
    $Consultar_Correos = $this->_Mdl_Administracion_Procesos->FN_Enviar_Promociones();
    if($Consultar_Correos)
    {
      echo 'true';
    }
    else
    {
      echo "false";
    }
  }
// // Funcion para listar los detalles de las ordenes
//   public function FN_Listar_Detalle_Ordene_Usuario()
//   {
//     $Datos =json_decode( file_get_contents( "php://input" ) );
//     if ( !isset( $Datos ) ) {
//       echo "No_Hay_Datos";
//     }
//     else {
//       $Lista_Detalle_Ordenes_Enviadas = $this->_Mdl_Usuario->FN_Listar_Detalles_Ordene_Enviada(
//         $Datos->PK_ID_Cotizacion_Usuario);
//       echo json_encode( $Lista_Detalle_Ordenes_Enviadas );
//     }
//   }



//
}
?>
