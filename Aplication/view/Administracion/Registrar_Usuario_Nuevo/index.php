
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Registro de usuario</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Registrar_Usuario_Nuevo/Registrar_Usuario_Nuevo.css"/>
<section id="SC_Contenido_Pagina">
  <main id="CONT_Reg_Contenido_Pagina">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Registro" ng-controller="Controlador_Registro_Usuario_Administracion" ng-init="FN_Listar_Roles_Usuarios()">
      <form id="FORM_Registro" name="Form_Registro_Cliente" ng-submit="Registrar(RN)" class="Grid_Contenedor main_start">
        <div class="Grid_Contenedor">
          <div class="Grid_Total">
            <p class="CL_Alerta_5 Padding-10">Seleccione el tipo de usuario que desea registrar</p>
          </div>
          <div class="Grid_Total"> 
            <select ng-model="RN.Tipo_Registro" name="Tipo_Registro" value="" ng-init="Registro_Cliente = false;BL_Datos_Form_Usuario = false" required="required" class="Select_1 Base-30">
              <option ng-show="Rol.PK_ID_Rol == 3" ng-click="FN_No_Posee_Empresa(2,Rol.Nombre_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">{{Rol.Nombre_Rol}}</option>
              <option ng-show="Rol.PK_ID_Rol == 2" ng-click="FN_No_Posee_Empresa(1,Rol.Nombre_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">{{Rol.Nombre_Rol}}</option>
              <option ng-show="Rol.PK_ID_Rol == 4" ng-click="FN_No_Posee_Empresa(1,Rol.Nombre_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">{{Rol.Nombre_Rol}}</option>
              <option ng-show="Rol.PK_ID_Rol == 1" ng-click="FN_No_Posee_Empresa(1,Rol.Nombre_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">{{Rol.Nombre_Rol}}</option>
            </select>
          </div>
        </div>
        <p class="CL_Alerta_5 Padding-10">Creaci&oacute;n de cuenta {{Rol_Usuario_Seleccionado}}</p>
        <div id="CONT_R_Pregunta" ng-show="Pregunta_Datos_Empresa == true" class="Grid_Total CL_Alerta_5 abcenter column Padding-10">
          <p>¿El cliente posee algun tipo de negocio o empresa?</p>
          <div class="Grid_Contenedor Base-80 abcenter">
            <input id="ID_INPUT_Empresa_No" ng-model="RN.Posee_Empresa" value="no_poseeo_empresa" name="PoseeEmpresa" type="radio" ng-click="FN_No_Posee_Empresa(1)" required="required" class="Btn_Radio"/>
            <label for="ID_INPUT_Empresa_No" class="RadioBtn_2">No</label>
            <input id="ID_INPUT_Empresa_Si" ng-model="RN.Posee_Empresa" value="si_poseeo_empresa" name="PoseeEmpresa" type="radio" ng-click="FN_Si_Posee_Empresa()" required="required" class="Btn_Radio"/>
            <label for="ID_INPUT_Empresa_Si" class="RadioBtn_2">Si</label>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.PoseeEmpresa.$error.required" class="CL_Mensaje_Dos">
              <p class="icon-negocio">Seleccione una opcion</p>
            </div>
          </div>
        </div>
        <div id="CONT_Derecha" ng-show="BL_Datos_Form_Usuario == true" class="Grid_Contenedor Base-100 distributed movil-100 tablet-30">
          <div class="Grid_Contenedor abcenter">
            <p class="CL_Alerta_5 Padding-5">Datos de la cuenta</p>
            <div class="Grid_Item Base-100">				
              <label for="Nombre_Usuario">Nombre de usuario</label>
              <input id="Nombre_Usuario" maxlength="15" minlength="3" name="Nombre_U" type="text" placeholder="Nombre de usuario" ng-model="RN.Nombre_Usuario" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_U.$error.required">
                <p class="icon-registrarme">Ingresa un nombre de usuario</p>
              </div>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Nombre_U.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Nombre_U.$error.required ">
                <p class="icon-login">La cantidad de caracteres es muy corta</p>
              </div>
            </div>
            <div class="Grid_Item Base-100">
              <label for="Password">Contraseña</label>
              <input id="Password" maxlength="15" minlength="7 " name="Contrasenia" type="password" placeholder="Contraseña" ng-model="RN.Contrasenia" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Contrasenia.$error.required">
                <p class="icon-key">Ingresa algun tipo de contraseña</p>
              </div>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Contrasenia.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Contrasenia.$error.required ">
                <p class="icon-login">La cantidad de caracteres es muy corta</p>
              </div>
            </div>
            <div class="Grid_Item Base-100">
              <label for="Correo">Correo</label>
              <input id="Correo" maxlength="30" name="Correo_Electronico" type="email" placeholder="Correo electronico" ng-model="RN.Correo" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Correo_Electronico.$error.required">
                <p class="icon-mensaje">Ingresa un correo electronico valido</p>
              </div>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Correo_Electronico.$pristine &amp;&amp; !Form_Registro_Cliente.Correo_Electronico.$valid &amp;&amp; !Form_Registro_Cliente.Correo_Electronico.$error.required ">
                <p class="icon-mensaje">El correo ingresado no cumple con las caracteristicas necesarias, ejemplo: stiven3345@hotmail.com</p>
              </div>
            </div>
          </div>
          <!--label(for="PasswordConfirmacion") Confirmar contraseña-->
          <!--input#PasswordConfirmacion.Input_Estilo_1(type="password" placeholder="Confirmar contraseña" ng-model="RN.PasswordConfirmacion")-->
        </div>
        <div class="Grid_Contenedor cross_start distributed Base-100 tablet-70">
          <div id="CONT_Izquierda" ng-show="BL_Datos_Form_Usuario == true" class="Grid_Item Base-100 tablet-40">
            <p class="CL_Alerta_5 Padding-5">Datos personales del usuario </p>
            <label for="Nombre">Primer Nombre</label>
            <input id="Nombre" maxlength="15" minlength="3" name="Nombre_Persona" type="text" placeholder="Nombre" ng-model="RN.Nombre" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Nombre_Persona.$valid &amp;&amp; !Form_Registro_Cliente.$pristine ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label for="Apellido">Primer Apellido</label>
            <input id="Apellido" maxlength="15" minlength="3 " name="Apellido" type="text" placeholder="Apellido" ng-model="RN.Apellido" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Apellido.$valid &amp;&amp; !Form_Registro_Cliente.$pristine  ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label>Sexo</label>
            <section id="SC_Genero">
              <input id="ID_INPUT_Hombre" name="Genero" type="radio" ng-model="RN.Genero" value="Hombre" class="Btn_Radio"/>
              <label for="ID_INPUT_Hombre" class="RadioBtn_1">Hombre</label>
              <input id="ID_INPUT_Mujer" name="Genero" type="radio" ng-model="RN.Genero" value="Mujer" class="Btn_Radio"/>
              <label for="ID_INPUT_Mujer" class="RadioBtn_1">Mujer</label>
              <input id="ID_INPUT_Indefinido" name="Genero" type="radio" ng-model="RN.Genero" value="Indefinido" class="Btn_Radio"/>
              <label for="ID_INPUT_Indefinido" class="RadioBtn_1">Indefinido</label>
            </section>
          </div>
          <div id="CONT_Derecha" ng-show="BL_Datos_Form_Usuario == true" class="Grid_Item Base-100 tablet-40">
            <p class="CL_Alerta_5 Padding-5">Datos personales del usuario</p>
            <label for="Segundo_Nombre">Segundo Nombre</label>
            <input id="Segundo_Nombre" maxlength="15" minlength="3" name="Segundo_Nombre" type="text" placeholder="Segundo Nombre" ng-model="RN.Segundo_Nombre" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Segundo_Nombre.$valid &amp;&amp; !Form_Registro_Cliente.$pristine ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label for="Segundo_Apellido">Segundo Apellido</label>
            <input id="Segundo_Apellido" maxlength="15" minlength="3 " name="Segundo_Apellido" type="text" placeholder="Segundo Apellido" ng-model="RN.Segundo_Apellido" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Segundo_Apellido.$valid &amp;&amp; !Form_Registro_Cliente.$pristine ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label>Departamento</label>
            <select ng-model="RN.Departamento" name="Departamento" value="RN.Departamento" required="required" class="Select_1">
              <option value="Antioquia">Antioquia</option>
            </select>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Departamento.$error.required">
              <p class="icon-ubicacion-1">Selecciona un Departamento</p>
            </div>
            <label>Municipio</label>
            <select ng-model="RN.Municipio" name="Muncipio" value="RN.Municipio" required="required" class="Select_1">
              <option value="Medellín">Medell&iacute;n</option>
              <option value="Bello">Bello</option>
              <option value="Envigado">Envigado</option>
              <option value="Itagui">Itagui</option>
              <option value="Sabaneta">Sabaneta</option>
              <option value="La estrella">La estrella</option>
              <option value="Girardota">Girardota</option>
            </select>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Muncipio.$error.required">
              <p class="icon-ubicacion-1">Selecciona un municipio</p>
            </div>
            <label for="Celular_Usuario">Numero celular</label>
            <input id="Celular_Usuario" max="10" min="10" name="Numero_celular" type="tel" placeholder="Numero celular" ng-model="RN.Celular_Usuario" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Numero_celular.$valid &amp;&amp; !Form_Registro_Cliente.$pristine  ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
          </div>
        </div>
        <div id="CONT_Datos_Empresa" ng-show="BL_Datos_Usuario_Empresa == true" class="Grid_Contenedor distributed">
          <p class="CL_Alerta_5 Padding-5">Datos del negocio o empresa</p>
          <div id="CONT_Izquierda" class="Grid_Item Base-100 tablet-40">
            <label for="Nombre_Empresa">Nombre de la empresa</label>
            <input id="Nombre_Empresa" maxlength="15" name="Nombre_Empresa" type="text" placeholder="Nombre" ng-model="RN.Nombre_Empresa" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_Empresa.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
              <p class="icon-negocio">Seleccione una opcion</p>
            </div>
            <label for="Direcion_Empresa">Direcci&oacute;n</label>
            <input id="Direcion_Empresa" maxlength="25" name="Direccion" type="text" placeholder="Dirección" ng-model="RN.Direcion_Empresa" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Direccion.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
              <p class="icon-negocio">Seleccione una opcion</p>
            </div>
          </div>
          <div id="CONT_Derecha" class="Grid_Item Base-100 tablet-40">
            <label for="Telefono_Empresa">Telefono</label>
            <input id="Telefono_Empresa" name="Telefono" type="tel" placeholder="Telefono" ng-model="RN.Telefono_Empresa" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Telefono.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
              <p class="icon-negocio">Seleccione una opcion</p>
            </div>
            <label for="NIT">NIT</label>
            <input id="NIT" name="Nit" type="text" placeholder="NIT" ng-model="RN.NIT" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nit.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
              <p class="icon-negocio">Seleccione una opcion</p>
            </div>
            <label for="Nombre_Encargado">Nombre del Encargado</label>
            <input id="Nombre_Encargado" maxlength="15" name="Nombre_Encargado" type="text" placeholder="Nombre" ng-model="RN.Nombre_Encargado" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_Encargado.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
              <p class="icon-negocio">Seleccione una opcion</p>
            </div>
          </div>
        </div>
        <div id="CONT_R_Botones" ng-show="BL_Datos_Form_Usuario == true">
          <input id="submit" type="submit" ng-disabled="!Form_Registro_Cliente.$valid " value="Crear cuenta" class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar formulario</a>
        </div>
      </form>
    </div>
  </main>
</section>