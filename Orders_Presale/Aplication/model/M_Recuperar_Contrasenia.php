<?php

class M_Recuperar_Contrasenia
{
  /**
  * @param $db  objeto de la conección a la DB que recibe cuando se ejecuta la instancia.
  */
  function __construct($db)
  {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Error al intentar conectar con la Base de Datos en M_Recuperar_Contrasenia:'+$e);
    }
  }


  /**
  * Funcion para recuperar la contraseña del usuario
  * 1. Se ejecuta el procedimiento spConsultarCorreoElectronico para consultar si el correo existe en la base de datos
  * En caso de que no exista se retorna un false para luego mostrar el mensaje
  * 2. Se genera una contraseña nueva, y se ejecuta el procedimiento spActualizarContrasenia para actualizar el campo Contrasenia_Temporal
  * @param 
  */
  public function FN_Recuperar_contrasenia($Correo)
  {

    $sql = "CALL `spConsultarCorreoElectronico`(?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Correo);


    $query->execute();



    if ($query->rowCount() > 0) {
//================================GENERACION DE CONTRASEÑA ALEATORIA======================

     $alfabeto = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
     $contrasenia = array();
     $alfabetolength = strlen($alfabeto);
     $pass = ""; 

     for($i=0; $i <= 7 ; $i++)
     { 
      $n = rand(0, $alfabetolength -1);
      $pass .= substr($alfabeto,$n,1) ;
    }

//Ejecuto el procedimiento spActualizarContrasenia el cual recibe  el correo ingresado por el usuario
// y la contraseña generada.
    $sql = "CALL `spActualizarContrasenia_Recuperacion`(?,?);";
    $query = $this->db->prepare($sql);
    $query->bindParam(1,$Correo);
    $query->bindParam(2,$pass);

    $query->execute();


    if ($query->rowCount() > 0) {


//================================GENERACION DEL MENSAJE QUE ESE ENVIA POR PHP MAILERA======================

     
      require(APP. "controller/Modulo/PHPmailer/class.phpmailer.php"); 
      $mail = new PHPmailer();
      $mail->From = "allopaplicacion@gmail.com";
      $mail->FromName = "Allop"; 
      $mail->AddAddress($Correo);

      $mail->WordWrap = 50;
      $mail->IsHTML(true);
      $mail->Subject = "Recuperar contrasenia";
      $mail->Body = " Nueva contraseña: $pass \n<br />";
      
      $mail->IsSMTP();
      $mail->Host = "ssl://smtp.gmail.com:465";  
      $mail->SMTPAuth = true;
      $mail->Username = "allopaplicacion@gmail.com";
      $mail->Password = "allop1998"; 
      $mail->Send();
//================================GENERACION DEL MENSAJE QUE ESE ENVIA POR PHP MAILERA======================


            $pass = "";
            return true;


          }
          else
          {
            $pass = "";
            return false;

          }






        }
  //*****

      }

      public function FN_Actualizar_Contrasenia($Anterior_Contrasenia,$Nueva_Contrasenia,$PK_ID_Usuario)
      {


//====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================

        $digito = 7;
        $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $salt = sprintf('$2a$%02d$', $digito);

        for ($i = 0; $i < 22; $i++) {
          $salt .= $set_salt[mt_rand(0, 22)];
        }
        $Contrasenia_Ingresada = $Nueva_Contrasenia;

        $Contrasenia_Encriptada = crypt($Contrasenia_Ingresada, $salt);

//====================GENERACION DE CONTRASEÑA ENCRIPTADA=====================
//================================GENERACION DE CONTRASEÑA ALEATORIA======================

        $alfabeto = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $contrasenia = array();
        $alfabetolength = strlen($alfabeto);
        $pass = ""; 

        for($i=0; $i <= 15 ; $i++)
        { 
          $n = rand(0, $alfabetolength -1);
          $pass .= substr($alfabeto,$n,1) ;
        }

//=============================================


        $sql = "CALL `spActualizarContrasenia_Actual`(?,?,?,?,?);";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$Nueva_Contrasenia);
        $query->bindParam(2,$Anterior_Contrasenia);
        $query->bindParam(3,$Contrasenia_Encriptada);
        $query->bindParam(4,$PK_ID_Usuario);
        $query->bindParam(5,$pass);

        $query->execute();



        if ($query->rowCount() > 0) {

          return true;
        }
        else
        {
          return false;
        }

      }
  //*****

    }
//*****


