<?php

require APP.'controller/Modulo/Controlador_Sesion.php';
class Modulo_Recuperar_Contrasenia extends Controller {




    private $_Mdl_Recueperacion_Contrasenia = null;

    public function __construct() {
        $this->_Mdl_Recueperacion_Contrasenia = $this->loadModel("M_Recuperar_Contrasenia");
        Sesion::init();

    }

    /**
     * *  FN_Recuperar_contrasenia
     */
    public function FN_Recuperar_contrasenia() {
        $objDatos = json_decode(file_get_contents("php://input"));

        if (!isset($objDatos)) {
            echo 'Los datos no llegarón';
        } else {

            //Datos necesario para recuperar la contraseña
            $Correo_Usuario = $objDatos->Correo;


            $res =  $this->_Mdl_Recueperacion_Contrasenia->FN_Recuperar_contrasenia
            (
               $Correo_Usuario
               );

            if ($res) {
                //SI  ES EXITOSO RETORNA TRUE

             echo "true";


         } else {
                //SI  ES FALLIDO RETORNA FALSE
            echo "false";
        }
    }
}

 /**
     * *  FN_Recuperar_contrasenia
     */
 public function FN_Actualizar_Contrasenia() {
    $objDatos = json_decode(file_get_contents("php://input"));

    if (!isset($objDatos)) {
        echo 'Los datos no llegarón';
    } else {

            //Datos necesario para recuperar la contraseña
        $Anterior_Contrasenia = $objDatos->Anterior_Contrasenia;
        $Nueva_Contrasenia = $objDatos->Nueva_Contrasenia;
        $PK_ID_Usuario = $objDatos->PK_ID_Usuario;


        $Respuesta_Actualziacion_Contrasenia =  $this->_Mdl_Recueperacion_Contrasenia->FN_Actualizar_Contrasenia
        (
           $Anterior_Contrasenia,
           $Nueva_Contrasenia,
           $PK_ID_Usuario
           );

        if ($Respuesta_Actualziacion_Contrasenia) {
                //SI  ES EXITOSO RETORNA TRUE

         echo "true";
         Sesion::setValue('Contrasenia',$Nueva_Contrasenia);


     } else {
                //SI  ES FALLIDO RETORNA FALSE
        echo "false";
    }
}
}

//********

}
