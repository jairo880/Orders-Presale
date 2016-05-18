title {{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Registro
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Cliente/Registro/Registro.css"/>
<!--css y scrits propios de la pagina-->
<section id="SC_Contenido_Pagina" ng-controller="Controlador_Registro">
  <main id="CONT_Reg_Contenido_Pagina">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Registro">
      <form id="FORM_Registro" name="Form_Registro_Cliente" ng-submit="Registrar(RN)" class="Padding-tablet Grid_Contenedor abcenter">
        <div class="CL_Alerta_5 No_Paddding abcenter Grid_Contenedor">
          <p>Edita tu perfil</p>
        </div>
        <div id="CONT_C_Portada" class="Grid_Contenedor cross_end">
          <div id="CONT_C_Imagen_Portada" style="background:url({{dato.AOBJ_Datos_Usuario[0].Fondo_Perfil_Usuario}}) 0 45% no-repeat;background-size: 100% auto;" class="Grid_Contenedor"></div>
          <div id="CONT_C_ImageUsuario" class="Grid_Contenedor abcenter">
            <div class="Grid_Contenedor Base-100 tablet-50">
              <div class="Grid_Contenedor Padding_left-10 Base-100 tablet-70 abcenter">
                <div class="Grid_Contenedor Base-auto">
                  <div class="Grid_Contenedor Base-100 tablet-50 web-60 CL_TXT_Pri_Btn abcenter">
                    <div class="Base-auto relative"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_5"/></div>
                  </div>
                  <p ng-show="Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_U.$error.required" class="C_Nombre Grid_Contenedor abcenter Padding-10 CL_TXT_Texto_5 CL_TXT_Texto_Bold CL_TXT_Blanco">Usuario</p>
                  <p class="C_Nombre Grid_Contenedor abcenter Padding-10 CL_TXT_Texto_5 CL_TXT_Texto_Bold CL_TXT_Blanco">{{RN.Nombre_Usuario}}</p>
                </div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-100 tablet-50 abcenter"><a ng-click="VerEdiImagen = true;BL_Ver_Cont = true;FN_Listar_Imagen_Portada()" class="icon-lapiz Btn_Estilo_5 CL_Btn_Opciones">Editar portada</a><a ng-init="VerEdiImagen = false" ng-click="FN_Listar_Imagen_Perfil();VerEdiImagen = true;BL_Ver_Cont = false" class="CL_Btn_Opciones icon-lapiz Btn_Estilo_7">Editar foto perfil</a></div>
          </div>
        </div>
        <div id="CONT_Datos_Registro" class="Base-100 Grid_Contenedor abcenter">
          <div class="Grid_Total CL_Alerta_5 abcenter column Padding-10">
            <p>¿Posee algun tipo de negocio o empresa?</p>
            <div class="Grid_Contenedor Base-100 abcenter">
              <input id="ID_INPUT_Empresa_No" ng-model="RN.Posee_Empresa" value="no_poseeo_empresa" name="PoseeEmpresa" type="radio" ng-click="FN_No_Posee_Empresa(1)" required="required" class="Btn_Radio"/>
              <label for="ID_INPUT_Empresa_No" class="RadioBtn_2">No</label>
              <input id="ID_INPUT_Empresa_Si" ng-model="RN.Posee_Empresa" value="si_poseeo_empresa" name="PoseeEmpresa" type="radio" ng-click="FN_Si_Posee_Empresa()" required="required" class="Btn_Radio"/>
              <label for="ID_INPUT_Empresa_Si" class="RadioBtn_2">Si</label>
            </div>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.PoseeEmpresa.$error.required">
              <p class="icon-negocio CL_TXT_Blanco CL_TXT_Icon_Blanco">Seleccione una opcion</p>
            </div>
          </div>
          <p class="CL_Alerta_5 Padding-10 abcenter Grid_Contenedor Base-100">Datos de la cuenta</p>
          <div id="CONT_Izquierda" class="Grid_Contenedor Base-100 web-70 Padding-20">
            <div class="CL_Alerta_4">
              <div class="CL_TXT_Texto_1 icon-alerta1 CL_TXT_Icon_Blanco">Actualmente solo se presta servicio en el valle de aburra </div>
            </div>
            <div class="Grid_Contenedor cross_start">
              <div class="Grid_Item Base-100 tablet-50 No_Padding Padding-tablet">				
                <label for="Nombre_Usuario">Nombre de usuario</label>
                <input id="Nombre_Usuario" maxlength="15" minlength="3" name="Nombre_U" type="text" placeholder="Nombre de usuario" ng-model="RN.Nombre_Usuario" required="required" class="Input_Estilo_1"/>
                <!--Mensaje de validacion-->
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_U.$error.required">
                  <p class="icon-registrarme CL_TXT_Icon_Blanco">Ingresa un nombre de usuario</p>
                </div>
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Nombre_U.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Nombre_U.$error.required ">
                  <p class="icon-login CL_TXT_Icon_Blanco">La cantidad de caracteres es muy corta</p>
                </div>
              </div>
              <div class="Grid_Item Base-100 tablet-50 No_Padding Padding-tablet">
                <label for="Password">Contraseña</label>
                <input id="Password" maxlength="15" minlength="7 " name="Contrasenia" type="password" placeholder="Contraseña" ng-model="RN.Contrasenia" required="required" class="Input_Estilo_1"/>
                <!--Mensaje de validacion-->
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Contrasenia.$error.required">
                  <p class="icon-key CL_TXT_Icon_Blanco">Ingresa algun tipo de contraseña</p>
                </div>
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Contrasenia.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Contrasenia.$error.required ">
                  <p class="icon-login CL_TXT_Icon_Blanco">La cantidad de caracteres es muy corta</p>
                </div>
              </div>
              <div class="Grid_Item Base-100 tablet-50 No_Padding Padding-tablet">
                <label for="Correo">Correo</label>
                <input id="Correo" maxlength="30" name="Correo_Electronico" type="email" placeholder="email@hotmail.com" ng-model="RN.Correo" required="required" class="Input_Estilo_1"/>
                <!--Mensaje de validacion-->
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Correo_Electronico.$error.required">
                  <p class="icon-mensaje CL_TXT_Icon_Blanco">Ingresa un correo electronico valido</p>
                </div>
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Correo_Electronico.$pristine &amp;&amp; !Form_Registro_Cliente.Correo_Electronico.$valid &amp;&amp; !Form_Registro_Cliente.Correo_Electronico.$error.required ">
                  <p class="icon-mensaje CL_TXT_Icon_Blanco">El correo ingresado no cumple con las caracteristicas necesarias, ejemplo: email@hotmail.com</p>
                </div>
              </div>
              <div class="Grid_Item Base-100 tablet-50 No_Padding Padding-tablet">
                <label for="Celular_Usuario">N&uacute;mero celular</label>
                <input id="Celular_Usuario" max="10" min="10" name="Numero_celular" type="tel" placeholder="Numero celular" ng-model="RN.Celular_Usuario" class="Input_Estilo_1"/>
              </div>
              <div class="Grid_Item Base-100 tablet-50 No_Padding Padding-tablet">
                <label>Departamento</label>
                <select ng-init="BL_Ver_Otro_Departamento = false" ng-model="RN.Departamento" name="Departamento" value="Antioquia" required="required" class="Select_1 Base-100">
                  <option value="Antioquia">Antioquia</option>
                </select>
                <!--Mensaje de validacion-->
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Departamento.$error.required">
                  <p class="icon-ubicacion-1 CL_TXT_Icon_Blanco">Selecciona un departamento</p>
                </div>
              </div>
              <div class="Grid_Item Base-100 tablet-50 No_Padding Padding-tablet">
                <label>Municipio</label>
                <select ng-init="BL_Ver_Otro_Municipio = false" ng-model="RN.Municipio" name="Muncipio" value="Bello" required="required" class="Select_1 Base-100">
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
                  <p class="icon-ubicacion-1 CL_TXT_Icon_Blanco">Selecciona un municipio</p>
                </div>
              </div>
            </div>
          </div>
          <div id="CONT_Datos_Empresa" ng-show="BL_Datos_Usuario_Empresa == true" class="Grid_Contenedor distributed">
            <p class="CL_Alerta_5 Padding-5">Datos del negocio o empresa</p>
            <div id="CONT_Izquierda" class="Grid_Item Base-100 No_Padding Padding-tablet tablet-40">
              <label for="Nombre_Empresa">Nombre de la empresa</label>
              <input id="Nombre_Empresa" maxlength="15" name="Nombre_Empresa" type="text" placeholder="Nombre" ng-model="RN.Nombre_Empresa" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_Empresa.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
                <p class="icon-negocio CL_TXT_Icon_Blanco">Ingrese un nombre</p>
              </div>
              <label for="Direcion_Empresa">Direcci&oacute;n</label>
              <input id="Direcion_Empresa" maxlength="25" name="Direccion" type="text" placeholder="Dirección" ng-model="RN.Direcion_Empresa" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Direccion.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
                <p class="icon-negocio CL_TXT_Icon_Blanco">Seleccione una opcion</p>
              </div>
            </div>
            <div id="CONT_Derecha" class="Grid_Item Base-100 No_Padding Padding-tablet tablet-40">
              <label for="Telefono_Empresa">Telefono</label>
              <input id="Telefono_Empresa" name="Telefono" type="tel" placeholder="Telefono" ng-model="RN.Telefono_Empresa" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Telefono.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
                <p class="icon-negocio CL_TXT_Icon_Blanco">Seleccione una opcion</p>
              </div>
              <label for="NIT">NIT</label>
              <input id="NIT" name="Nit" type="text" placeholder="NIT" ng-model="RN.NIT" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nit.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
                <p class="icon-negocio CL_TXT_Icon_Blanco">Seleccione una opcion</p>
              </div>
              <label for="Nombre_Encargado">Nombre del Encargado</label>
              <input id="Nombre_Encargado" maxlength="15" minlength="5" name="Nombre_Encargado" type="text" placeholder="Nombre" ng-model="RN.Nombre_Encargado" required="required" class="Input_Estilo_1"/>
              <!--Mensaje de validacion-->
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_Encargado.$error.required &amp;&amp; BL_Datos_Usuario_Empresa == true">
                <p class="icon-negocio CL_TXT_Icon_Blanco">Seleccione una opcion</p>
              </div>
            </div>
          </div>
        </div>
        <section id="CONT_C_Modificar" ng-init="BL_Ver_Cont = false">
          <div id="CONT_C_Imagenes" ng-show="VerEdiImagen == true">
            <div id="CONT_Invisible" ng-click="VerEdiImagen = false"></div>
            <div ng-click="VerEdiImagen = false" class="CL_Cerrar_Modal"></div>
            <div id="CONT_Contenido">
              <div id="CONT_C_Header"><a ng-class="{Btn_Estilo_2:BL_Ver_Cont == false,Btn_Estilo_5:BL_Ver_Cont == true }" ng-click="BL_Ver_Cont = false;FN_Listar_Imagen_Perfil()" class="icon-image">Perfil</a><a ng-class="{Btn_Estilo_2:BL_Ver_Cont == true,Btn_Estilo_5:BL_Ver_Cont == false}" ng-click=";FN_Listar_Imagen_Portada();BL_Ver_Cont = true" class="icon-image">Portada</a>
                <p ng-click="VerEdiImagen = false;FN_Listar_Imagen_Portada()" class="CL_Eliminar_1_1"></p>
              </div>
              <div id="CONT_C_Modificar_Img_Perfil" ng-show="BL_Ver_Cont == false">
                <div id="CONT_C_Imagenes_Seleccion" ng-repeat="Imagenes_Perfil in dato.AOBJ_Imagenes_Perfil_Usuario_Avatars" ng-click="dato.AOBJ_Imagenes_Perfil_Usuario_Avatars[$index].BL_Estado = true;dato.FN_Moificar_Imagenen_Usuario(4,$index)" ng-class="{CL_Seleccionado: Imagenes_Perfil.BL_Estado == true}"><img ng-src="{{Imagenes_Perfil.URL_Imagen_Usuario}}"/></div>
                <label id="CONT_C_Imagenes_Seleccion" for="ID_INPUT_FILE" class="CL_Cargar_Archivo Grid_Contenedor abcenter Invisible">
                  <div class="CL_Icono_Archivo Grid_Contenedor abcenter icon-file-image Grid_Item Base-100"></div>
                  <div class="Grid_Contenedor CL_Txt_Subir_Archivo CL_Alerta_5 abcenter">Subir una foto</div>
                </label>
                <input id="ID_INPUT_FILE" name="fichero" type="file" class="Invisible"/>
              </div>
              <div id="CONT_C_Modificar_Fondo_Perfil" ng-show="BL_Ver_Cont == true">
                <div id="CONT_C_Imagenes_Seleccion" ng-repeat="Imagen_FondoPerfil in dato.AOBJ_Imagenes_Usuario_Fondo_Perfil" ng-click="dato.AOBJ_Imagenes_Usuario_Fondo_Perfil[$index].BL_Estado = true;dato.FN_Moificar_Imagenen_Usuario(3,$index)" ng-class="{CL_Seleccionado: Imagen_FondoPerfil.BL_Estado == true} "><img ng-src="{{Imagen_FondoPerfil.URL_Imagen_Portada}}"/></div>
                <label id="CONT_C_Imagenes_Seleccion" for="ID_INPUT_FILE" class="CL_Cargar_Archivo Grid_Contenedor abcenter Invisible">
                  <div class="CL_Icono_Archivo Grid_Contenedor abcenter icon-file-image Grid_Item Base-100"></div>
                  <div class="Grid_Contenedor CL_Txt_Subir_Archivo CL_Alerta_5 abcenter">Subir una foto</div>
                </label>
                <input id="ID_INPUT_FILE" name="fichero" type="file" class="Invisible"/>
              </div>
              <div id="CONT_C_Footer">
                <div id="CONT_Btn_Perfil" ng-show="BL_Ver_Cont == false"><a ng-click="VerEdiImagen = false;dato.FN_Moificar_Imagenen_Usuario(1,0)" class="icon-agregar1 Btn_Estilo_1"> Seleccionar</a><a ng-click="VerEdiImagen = false" class="icon-cancelar1 Btn_Estilo_5">Cancelar</a></div>
                <div id="CONT_Btn_Perfil_Fondo" ng-show="BL_Ver_Cont == true"><a ng-click="VerEdiImagen = false;dato.FN_Moificar_Imagenen_Usuario(2,0)" class="icon-agregar1 Btn_Estilo_1"> Seleccionar</a><a ng-click="VerEdiImagen = false" class="icon-cancelar1 Btn_Estilo_5">Cancelar</a></div>
              </div>
            </div>
          </div>
        </section>
        <div id="CONT_R_Botones">
          <input id="submit" type="submit" ng-disabled="!Form_Registro_Cliente.$valid " value="Crear Cuenta" class="Btn_Estilo_3"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar formulario</a>
        </div>
      </form>
    </div>
  </main>
</section>