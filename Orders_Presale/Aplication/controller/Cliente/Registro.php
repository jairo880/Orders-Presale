<?php


class Registro extends Controller {

     /**
     * METODO: Index
     * Este metodo se ejecuta cuando solicito la URL
     * NOTA: Esta es la página por defecto cuando no se encuentra la URL.
     */
     private $_Mdl_RegistroUsuario = null;

     public function __construct() {
        $this->_Mdl_RegistroUsuario = $this->loadModel("M_Registro_Usuario");
    }

    public function Index() {

    // Basicos para la web
        require APP . 'view/_Templates/header.php';
    //Contenido propio de la vista
        require APP . 'view/Cliente/Registro/index.php';
    //Modulos implementados
    // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
    // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
    // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
    // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }



    /**
     * *  RegistrarUsuario
     */
    public function FN_Registrar_Usuario() {
        $objDatos = json_decode(file_get_contents("php://input"));


        if (!isset($objDatos)) {
            echo 'Los datos no llegaron';
        } else {
            //Datos necesario para el registro de la tabla cuenta
            $Nombre_Usuario = $objDatos->Nombre_Usuario;
            $Correo_Electronico = $objDatos->Correo;
            $Contrasenia = $objDatos->Contrasenia;
            $Imagen_Usuario = $objDatos->Imagen_Usuario;
            $Fondo_Perfil_Usuario = $objDatos->Imagen_Fondo;
            $Estado_Cuenta = "En uso"; 
            $Disponibilidad = "Activo";
            $FK_ID_Rol = 3; //Deacuerdo a la tabla rol: 3 = usuario
            $Posee_Empresa = ''; //vARIABLE PARA LA BASE DE DATOS, PARAR SABER SI EL CLIENTE POSEE O NO EMPRESA



//====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================

            $digito = 7;
            $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $salt = sprintf('$2a$%02d$', $digito);

            for ($i = 0; $i < 22; $i++) {
                $salt .= $set_salt[mt_rand(0, 22)];
            }
            $Contrasenia_Ingresada = $objDatos->Contrasenia;

            $Contrasenia_Encriptada = crypt($Contrasenia_Ingresada, $salt);

//====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================


//Esta funcion verifica si el nombre de usuario ingresado existe en la base de datos
            $res_Validar_Usuario = (bool) $this->_Mdl_RegistroUsuario->FN_Consultar_Nombre_Usuario
            (
                $Nombre_Usuario
                );

           //si el nombre de usuario existe 
            if ($res_Validar_Usuario) {
                echo "Usuario_Existente";
            }
            else {

                $res_Validar_Correo = (bool) $this->_Mdl_RegistroUsuario->FN_Consultar_Correo
                (
                    $Correo_Electronico
                    );

            //si el correo ingresado usuario  existe 
                if ($res_Validar_Correo) {
                    echo "Correo_Existente";
                }
                else
                {

                //******************REGISTRO TBL_CUENTA
                   $Respuesta_Registro_Cuenta = (int) $this->_Mdl_RegistroUsuario->FN_Registrar_TBL_Cuenta
                   (
                    $Nombre_Usuario, $Correo_Electronico, $Contrasenia, $Contrasenia_Encriptada, $Imagen_Usuario, $Fondo_Perfil_Usuario,$Disponibilidad, $Estado_Cuenta, $FK_ID_Rol
                    );



                //*********************REGISTRO TBL_Cliente

                //VALIDACION DE CAMPOS VACIOS EN EL REGISTRO CLIENTE
                   if (empty($objDatos->Segundo_Nombre)) {
                    $objDatos->Segundo_Nombre = "";
                }
                if (empty($objDatos->Segundo_Apellido)) {
                    $objDatos->Segundo_Apellido = "";
                }
                //*********
                $FK_ID_Cuenta = $Respuesta_Registro_Cuenta; //Se le pasa el #res, este posee el id_usuario necesario para insertar el foreing key en el registro
                $Nombre = $objDatos->Nombre;
                $Segundo_Nombre = $objDatos->Segundo_Nombre;
                $Apellido = $objDatos->Apellido;
                $Segundo_Apellido = $objDatos->Segundo_Apellido;
                $Municipio = $objDatos->Municipio;
                $Fecha_Nacimiento = $objDatos->Fecha_Nacimiento;
                $Telefono_Celular = $objDatos->Celular_Usuario;
                $Sexo = $objDatos->Genero;
                $Tipo_Cliente = "Esporadico"; //por defecto se manejara el tipo cliente esporadico

                if ($objDatos->Posee_Empresa == "si_poseeo_empresa") {
                   $Posee_Empresa = "SI"; 
               } 

               if ($objDatos->Posee_Empresa == "no_poseeo_empresa") { 
                   $Posee_Empresa = "NO"; 

               } 


                //LLAMADO A LA FUNCION DEL MODELO QUE REALIZA EL REGISTRO EN LA BASE DE DATOS
               $Respuesta_Registro_Cliente = $this->_Mdl_RegistroUsuario->FN_Registrar_TBL_Cliente
               (
                    //Paso los parametros
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

                //REGISTRO TABLA DTLL ROL CUENTA
               $Respuesta_Registr_DTLL_ROL_CUENTA = $this->_Mdl_RegistroUsuario->FN_Registrar_TBL_Dll_Rol_Cuenta
               (
                $FK_ID_Rol,
                $FK_ID_Cuenta
                );
                //*********************REGISTRANDO EN TBL_Establecimiento
                //POSEE_EMPRESA UN CARACTER: si_poseeo_empresa/no_poseeo_empresa, esta variable se pasa desde la vista por medio de angular
               $TipoRegistro = $objDatos->Posee_Empresa;

                //SI NO POSEE EMPRESA, SE REGISTRA TANSOLAMENTE EN LA TABLA CUENTA, Y CLIENTE
               if ($objDatos->Posee_Empresa == "no_poseeo_empresa") {
                if ($Respuesta_Registro_Cliente = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registr_DTLL_ROL_CUENTA = true) {
                    echo "true"; 
                } else {
                    echo "false";
                }
            }
            if ($objDatos->Posee_Empresa == "si_poseeo_empresa") {

                    //GUARDO LOS DATOS DE LA EMPRESA
                $Nombre_Establecimiento = $objDatos->Nombre_Empresa;
                $Nombre_Encargado = $objDatos->Nombre_Encargado;
                $Nit = $objDatos->NIT;
                $Telefono_Establecimiento = $objDatos->Telefono_Empresa;
                $Direccion_Establecimiento  = $objDatos->Direcion_Empresa;
                $Municipio_Establecimiento  = $objDatos->Celular_Usuario;
                    $FK_ID_Usuario = $Respuesta_Registro_Cuenta; //Foreing key del usuario al cual se le asociara los datos de la empresa



                    $Respuesta_Registro_Establecimiento = $this->_Mdl_RegistroUsuario->FN_Registrar_TBL_Establecimiento
                    (
                        $Nombre_Establecimiento, $Nombre_Encargado, $Nit, $Telefono_Establecimiento , $Direccion_Establecimiento , $Municipio_Establecimiento , $FK_ID_Usuario
                        );
                    //si el registro en TBL_EMPRESA Y TBL_CLIENTE Y TBL_CUENTA ES CORRECTO
                    if ($Respuesta_Registro_Establecimiento = true && $Respuesta_Registro_Cliente = true && $Respuesta_Registro_Cuenta > 0 && $Respuesta_Registr_DTLL_ROL_CUENTA = true) {
                        echo "true"; 
                    } else {
                        echo "false";
                    }
                }
            }
            //*************
        }
//**************
    }
}

}
