
<section id="SC_Modulo_Login" ng-init="BL_Btns_Ver_Login = true;Bl_Btn_Login_Iniciar_Sesion = true">
  <!--SESION LOGIN                           -->
  <section id="SC_Login">
    <div id="CONT_Login" ng-show="BL_Contenedor_Login ==true">
      <div id="CONT_Invisible" ng-click="FN_Login()">
        <div class="CL_Cerrar_Modal"></div>
      </div>
      <div id="CONT_Login_Form" class="Grid_Contenedor Base-100 tablet-90 web-35 abcenter distributed"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" alt="usuario" class="CL_Img_Login"/>
        <p ng-show="BL_Login_Recup == true" class="CL_TXT_Texto_4 center">Ingresar</p>
        <p ng-show="BL_Login_Recup == false" class="CL_TXT_Texto_4 center">Recuperar contraseña</p>
        <p ng-click="FN_Login()" class="CL_Eliminar_1_1"></p>
        <!--Formulario para iniciar sesion-->
        <form id="FORM_Login" name="Form_Login" ng-show="BL_Login_Recup == true" ng-submit="FN_Iniciar_Sesion(LG)">
          <label for="#INPUT_Usuario">Usuario</label>
          <input id="INPUT_Usuario" maxlength="15" minlength="3" type="text" name="Usuario_Nombre" ng-model="LG.Usuario_Nombre" placeholder="Ingresa tu nombre de usuario" required="required" class="Input_Estilo_1"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Login.$pristine &amp;&amp; Form_Login.Usuario_Nombre.$error.required ">
            <p class="icon-login">Ingresa tu usuario</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Login.Usuario_Nombre.$valid &amp;&amp; !Form_Login.$pristine &amp;&amp; !Form_Login.Usuario_Nombre.$error.required">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label #INPUT_Contrasenia="#INPUT_Contrasenia">Contraseña</label>
          <input id="INPUT_Contrasenia" maxlength="15" minlength="7 " type="password" name="Contrasenia" ng-model="LG.Contrasenia" placeholder="Ingresa tu contraseña" required="required" class="Input_Estilo_1"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Login.$pristine &amp;&amp; Form_Login.Contrasenia.$error.required">
            <p class="icon-key">Ingresa tu contraseña</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Login.Contrasenia.$valid &amp;&amp; !Form_Login.$pristine &amp;&amp; !Form_Login.Contrasenia.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div><a href="<?php echo URL; ?>Cliente/Registro" class="CL_TXT_Enlace_1">Crear cuenta	</a><a ng-click="BL_Login_Recup = false" class="CL_TXT_Enlace_1">Recuperar contraseña	</a>
          <div id="CONT_Btnes">
            <input type="submit" ng-disabled="!Form_Login.$valid" value="Iniciar Sesión" class="Btn_Estilo_6"/><a ng-click="FN_Login()" class="Btn_Estilo_5">Cancelar</a>
          </div>
        </form>
        <!--Formulario para recuperar contraseña		-->
        <form id="FORM_Login" name="Form_Recuperar_Password" ng-show="BL_Login_Recup == false" ng-submit="FN_Recuperar_contrasenia(RC)">
          <label for="#INPUT_Email">Email</label>
          <input id="INPUT_Email" maxlength="30" minlength="7 " type="email" name="Correo" ng-model="RC.Correo" placeholder="Correo electronico" required="required" class="Input_Estilo_1"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Recuperar_Password.$pristine &amp;&amp; Form_Recuperar_Password.Correo.$error.required">
            <p class="icon-negocio">Ingrese un correo valido</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Recuperar_Password.Correo.$valid &amp;&amp; !Form_Recuperar_Password.$pristine &amp;&amp; !Form_Recuperar_Password.Correo.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <div id="CONT_Btnes">
            <input type="submit" ng-disabled="!Form_Recuperar_Password.$valid " value="Recuperar contraseña" class="Btn_Estilo_6"/><a ng-click="BL_Login_Recup = true" class="icon-login-2 Btn_Estilo_5">Iniciar sesi&oacute;n</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</section>