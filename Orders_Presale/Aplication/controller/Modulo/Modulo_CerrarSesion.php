<?php


class Modulo_CerrarSesion extends Controller
{

  private $_Mdl_Cerrar_Sesion = null;

  public function __construct(){
    $this->_Mdl_Cerrar_Sesion = $this->loadModel("M_Cerrar_Sesion");
  }



   /*
  **  FN_Cerrar_Sesion
  */
   public function FN_Cerrar_Sesion(){

    $Resultado = $this->_Mdl_Cerrar_Sesion->FN_Cerrar_Sesion();

    if ($Resultado = true){

       // header("location: ".URL."Inicio/Inicio");
      echo "true";

    }else{

      echo "false";

    }
  }



}





?>