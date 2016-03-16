
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Cuenta, perfil</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Cliente/Cuenta/Cuenta.css"/>
<!--link de fontastic, fuentes de iconos-->
<section id="SC_Cuenta">
  <main id="CONT_C_Contenedor">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_C_Portada">
      <div id="CONT_C_Imagen_Portada"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Fondo_Perfil_Usuario}}"/></div>
      <div id="CONT_C_ImageUsuario"><span class="CL_C_Imagen CL_TXT_Pri_Btn"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_C_Imagen_Usuario"/><span ng-class="{CL_C_Activo: dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Activo', CL_C_Inactivo:  dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Inactivo'}" title="Disponibiliad actual de tu cuenta">
            <p></p></span><span class="CL_TXT_Info_Btn">Estado actual: {{dato.AOBJ_Datos_Usuario[0].Estado_Cuenta}}</span></span><span class="CL_TXT_Texto">
          <p class="C_Nombre Padding-10">{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}}</p><a ng-init="VerEdiImagen = false" ng-click="FN_Listar_Imagen_Perfil();VerEdiImagen = true;BL_Ver_Cont = false" class="CL_Btn_Opciones icon-lapiz Btn_Estilo_5">Editar foto perfil</a></span></div>
      <div id="CONT_C_Edit"><a ng-click="VerEdiImagen = true;BL_Ver_Cont = true;FN_Listar_Imagen_Portada()" class="icon-lapiz Btn_Estilo_5 CL_Btn_Opciones">Editar portada</a></div>
    </div>
    <div id="CONT_C_Datos">
      <div id="CONT_C_Opciones"><a ng-init="Datos_Tipo = 1" ng-click="Datos_Tipo = 1" class="icon-login Btn_Estilo_7">Ver mi perfil</a><a ng-click="Datos_Tipo = 2" ng-show="dato.AOBJ_Datos_Usuario[0].Posee_Empresa == 'SI'" class="icon-negocio Btn_Estilo_5">Mi Negocio</a><a ng-click="Datos_Tipo = 3" class="icon-negocio Btn_Estilo_5">Actualizar Contraseña</a><a ng-click="Datos_Tipo = 4" class="icon-login Btn_Estilo_5">Estado Cuenta</a></div>
    </div>
    <div id="CONT_C_Datos_Perfil" ng-show="Datos_Tipo == 1">
      <form id="FORM_Registro" name="Form_Registro_Cliente">
        <div id="CONT_Activar_Edicion" ng-init="checked_Perfil = true" class="Padding-20">
          <p ng-click="checked_Perfil =! checked_Perfil" ng-class="{Invisible:checked_Perfil == false, Visible: checked_Perfil == true}" class="Btn_Estilo_5">Editar </p>
          <p ng-click="checked_Perfil =! checked_Perfil" ng-class="{Invisible:checked_Perfil == true, Visible: checked_Perfil == false}" class="Btn_Estilo_3_3">Cancelar</p>
          <input type="button" ng-click="FN_Actualizar_Datos_Tabla_Cliente()" ng-disabled="!Form_Registro_Cliente.$valid " value="Actualizar información" class="Btn_Estilo_1"/>
        </div>
        <div id="CONT_Izquierda" class="Grid_Contenedor Base-100 tablet-40 column">
          <label for="ID_INPUT_Nombre_Usuario" class="icon-login">Nombre de usuario</label>
          <input id="ID_INPUT_Nombre_Usuario" maxlength="15" minlength="3" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" name="Nombre_Usuario" placeholder="Nombre de usuario" ng-disabled="checked_Perfil" required="required" class="Input_Estilo_2"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_Usuario.$error.required">
            <p class="icon-registrarme">Ingresa un nombre de usuario</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Nombre_Usuario.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Nombre_Usuario.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label for="ID_INPUT_Nombre" class="icon-login">Primer nombre</label>
          <input id="ID_INPUT_Nombre" maxlength="15" minlength="3 " name="Nombre_Persona" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Nombre" placeholder="Nombre" ng-disabled="checked_Perfil" required="required" class="Input_Estilo_2"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Nombre_Persona.$error.required">
            <p class="icon-registrarme">Ingresa un nombre</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Nombre_Persona.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Nombre_Persona.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label for="ID_INPUT_Apellido" class="icon-login">Apellido</label>
          <input id="ID_INPUT_Apellido" maxlength="15" minlength="5" type="text" name="Apellido" required="required" ng-model="dato.AOBJ_Datos_Usuario[0].Apellido" placeholder="Apellido" ng-disabled="checked_Perfil" class="Input_Estilo_2"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Apellido.$error.required">
            <p class="icon-registrarme">Ingresa tu apellido</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Apellido.$valid &amp;&amp; !Form_Registro_Cliente.$pristine &amp;&amp; !Form_Registro_Cliente.Apellido.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label for="ID_INPUT_Celular_Usuario" class="icon-celular">Numero celular</label>
          <input id="ID_INPUT_Celular_Usuario" type="tel" ng-model="dato.AOBJ_Datos_Usuario[0].Telefono_Celular" placeholder="Numero celular" ng-disabled="checked_Perfil" class="Input_Estilo_2"/>
          <label class="icon-sexo">Sexo</label>
          <section id="Genero" class="Grid_Contenedor cross_start No_Pasar">
            <input id="ID_INPUT_Hombre" name="sexo" type="radio" value="Hombre" ng-model="dato.AOBJ_Datos_Usuario[0].Sexo" ng-disabled="checked_Perfil" class="Btn_Radio"/>
            <label for="ID_INPUT_Hombre" class="RadioBtn_1">Hombre</label>
            <input id="ID_INPUT_Mujer" name="sexo" type="radio" value="Mujer" ng-model="dato.AOBJ_Datos_Usuario[0].Sexo" ng-disabled="checked_Perfil" class="Btn_Radio"/>
            <label for="ID_INPUT_Mujer" class="RadioBtn_1">Mujer</label>
            <input id="ID_INPUT_Indefinido" name="sexo" type="radio" value="Indefinido" ng-model="dato.AOBJ_Datos_Usuario[0].Sexo" ng-disabled="checked_Perfil" class="Btn_Radio"/>
            <label for="ID_INPUT_Indefinido" class="RadioBtn_1">Indefinido</label>
          </section>
        </div>
        <div id="CONT_Derecha" class="Grid_Contenedor Base-100 tablet-40 column">
          <label for="ID_INPUT_Correo" class="icon-login">Correo</label>
          <input id="ID_INPUT_Correo" name="Correo_Electronico" required="required" maxlength="30" type="email" ng-model="dato.AOBJ_Datos_Usuario[0].Correo_Electronico" placeholder="Correo electronico" ng-disabled="checked_Perfil" class="Input_Estilo_2"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.$pristine &amp;&amp; Form_Registro_Cliente.Correo_Electronico.$error.required">
            <p class="icon-mensaje">Ingresa un correo electronico valido</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Correo_Electronico.$pristine &amp;&amp; !Form_Registro_Cliente.Correo_Electronico.$valid &amp;&amp; !Form_Registro_Cliente.Correo_Electronico.$error.required ">
            <p class="icon-mensaje">El correo ingresado no cumple con las caracteristicas necesarias, ejemplo: stiven3345@hotmail.com</p>
          </div>
          <label for="ID_INPUT_Segundo_Nombre" class="icon-login">Segundo Nombre</label>
          <input id="ID_INPUT_Segundo_Nombre" maxlength="15" minlength="3" name="Segundo_Nombre" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Segundo_Nombre" placeholder="Nombre" ng-disabled="checked_Perfil" class="Input_Estilo_2"/>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Segundo_Nombre.$valid &amp;&amp; !Form_Registro_Cliente.$pristine ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label for="ID_INPUT_Segundo_Apellido" class="icon-login">Segundo Apellido</label>
          <input id="ID_INPUT_Segundo_Apellido" maxlength="15" minlength="3" name="Segundo_Apellido" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Segundo_Apellido" placeholder="Apellido" ng-disabled="checked_Perfil" class="Input_Estilo_2"/>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Cliente.Segundo_Apellido.$valid &amp;&amp; !Form_Registro_Cliente.$pristine ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label for="ID_INPUT_Fecha_Nacimiento" class="icon-date">Fecha de nacimiento</label>
          <input id="ID_INPUT_Fecha_Nacimiento" type="date" ng-model="dato.AOBJ_Datos_Usuario[0].Fecha_Nacimiento" placeholder="dia-mes-año" ng-disabled="checked_Perfil" required="required" class="Input_Estilo_2"/>
          <label class="icon-ubicacion">Municipio</label>
          <select ng-init="BL_Ver_Otro_Municipio = false" name="" ng-model="dato.AOBJ_Datos_Usuario[0].Municipio" ng-disabled="checked_Perfil" class="Select_1">
            <option value="Bello">Bello</option>
            <option value="Antioquia">Antioquia</option>
            <option value="otro" ng-click="BL_Ver_Otro_Municipio = true">otro</option>
          </select>
          <div ng-show="BL_Ver_Otro_Municipio == true" class="Grid_Item ng_show">
            <label for="ID_Otro_Municipio">ingresa un municipio</label>
            <input id="ID_Otro_Municipio" type="text" placeholder="Otro" ng-model="dato.AOBJ_Datos_Usuario[0].Municipio" ng-disabled="checked_Perfil" class="Input_Estilo_1"/>
          </div>
        </div>
      </form>
    </div>
    <div id="C_Datos_Negocio" ng-show="Datos_Tipo == 2">
      <form id="FORM_Registro" action="">
        <div id="CONT_Activar_Edicion" ng-init="checked_Establecimiento= true">
          <p ng-click="checked_Establecimiento =! checked_Establecimiento" ng-class="{Invisible:checked_Establecimiento == false, Visible: checked_Establecimiento == true}" class="Btn_Estilo_5">Editar datos</p>
          <p ng-click="checked_Establecimiento =! checked_Establecimiento" ng-class="{Invisible:checked_Establecimiento == true, Visible: checked_Establecimiento == false}" class="Btn_Estilo_3_3">Cancelar</p><a ng-click="FN_Actualizar_Datos_Tabla_Cliente()" ng-disabled="checked_Perfil" class="Btn_Estilo_1">Actualizar informaci&oacute;n</a>
        </div>
        <div id="CONT_Izquierda" class="Grid_Contenedor Base-100 tablet-50 column">
          <label for="ID_INPUT_Nombre_Establecimiento" class="icon-negocio">Nombre establecimiento</label>
          <input id="ID_INPUT_Nombre_Establecimiento" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Nombre_Establecimiento" placeholder="Nombre" ng-disabled="checked_Establecimiento" class="Input_Estilo_2"/>
          <label class="icon-ubicacion">Ubicacion</label>
          <select name="" ng-model="dato.AOBJ_Datos_Usuario[0].Municipio_Establecimiento" ng-disabled="checked_Establecimiento" class="Select_1">
            <option value="Bello">Bello</option>
            <option value="Antioquia">Antioquia</option>
            <option value="{{dato.AOBJ_Datos_Usuario[0].Municipio_Establecimiento}}">{{dato.AOBJ_Datos_Usuario[0].Municipio_Establecimiento}}</option>
          </select>
          <label for="ID_Otro_Municipio_Establecimiento">O ingresa un municipio</label>
          <input id="ID_Otro_Municipio_Establecimiento" type="text" placeholder="Otro" ng-model="dato.AOBJ_Datos_Usuario[0].Municipio_Establecimiento" ng-disabled="checked_Establecimiento" class="Input_Estilo_1"/>
        </div>
        <div id="CONT_Derecha" class="Grid_Contenedor Base-100 tablet-50 column">
          <label for="ID_INPUT_Telefono_Establecimiento" class="icon-negocio">Telefono establecimiento</label>
          <input id="ID_INPUT_Telefono_Establecimiento" type="tel" ng-model="dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento" placeholder="Telefono establecimiento" ng-disabled="checked_Establecimiento" class="Input_Estilo_2"/>
          <label for="ID_INPUT_Direccion_Establecimiento" class="icon-negocio">Direcci&oacute;n</label>
          <input id="ID_INPUT_Direccion_Establecimiento" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento" placeholder="Dirección" ng-disabled="checked_Establecimiento" class="Input_Estilo_2"/>
          <label for="ID_INPUT_NIT" class="icon-negocio">NIT</label>
          <input id="ID_INPUT_NIT" type="text" ng-model="dato.AOBJ_Datos_Usuario[0].Nit" placeholder="NIT" ng-disabled="checked_Establecimiento" class="Input_Estilo_2"/>
        </div>
      </form>
    </div>
    <div id="C_Datos_Actualizar_Contrasenia" ng-show="Datos_Tipo == 3" class="abcenter Grid_Contenedor">
      <form id="FORM_Registro" name="Form_Actualizar_Contrasenia" ng-submit="FN_Actualizar_Contrasenia(AC)">
        <div id="CONT_Izquierda" class="Grid_Item Base-100 tablet-30">
          <div class="Grid_Item Invisible">
            <label #ID_Usuario="#ID_Usuario">ID</label>
            <input id="ID_Usuario" type="text" name="ID_Usuario" ng-model="AC.PK_ID_Usuario" disabled="disabled" class="Input_Estilo_1"/>
          </div>
          <label #INPUT_Contrasenia="#INPUT_Contrasenia">Contraseña actual</label>
          <input id="INPUT_Contrasenia" maxlength="15" minlength="7 " type="password" name="Anterior_Contrasenia" ng-model="AC.Anterior_Contrasenia" placeholder="Ingresa tu contraseña actual" required="required" class="Input_Estilo_1"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Actualizar_Contrasenia.$pristine &amp;&amp; Form_Actualizar_Contrasenia.Anterior_Contrasenia.$error.required">
            <p class="icon-key">Ingresa tu contraseña actual</p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Actualizar_Contrasenia.Anterior_Contrasenia.$valid &amp;&amp; !Form_Actualizar_Contrasenia.$pristine &amp;&amp; !Form_Actualizar_Contrasenia.Anterior_Contrasenia.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <label #INPUT_Contrasenia="#INPUT_Contrasenia">Nueva contraseña</label>
          <input id="INPUT_Contrasenia" maxlength="15" minlength="7 " type="password" name="Nueva_Contrasenia" ng-model="AC.Nueva_Contrasenia" placeholder="Ingresa tu nueva contraseña" required="required" class="Input_Estilo_1"/>
          <!--Mensaje de validacion-->
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Actualizar_Contrasenia.$pristine &amp;&amp; Form_Actualizar_Contrasenia.Nueva_Contrasenia.$error.required">
            <p class="icon-key">Ingresa tu nueva contraseña </p>
          </div>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Actualizar_Contrasenia.Nueva_Contrasenia.$valid &amp;&amp; !Form_Actualizar_Contrasenia.$pristine &amp;&amp; !Form_Actualizar_Contrasenia.Nueva_Contrasenia.$error.required ">
            <p class="icon-login">La cantidad de caracteres es muy corta</p>
          </div>
          <div class="Padding-10">
            <input type="submit" ng-disabled="!Form_Actualizar_Contrasenia.$valid" value="Actualizar Contraseña" class="Btn_Estilo_2"/><a class="Btn_Estilo_5">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
    <section id="CONT_C_Modificar" ng-init="BL_Ver_Cont = false">
      <div id="CONT_C_Imagenes" ng-show="VerEdiImagen == true">
        <div id="CONT_Invisible" ng-click="VerEdiImagen = false"></div>
        <div ng-click="VerEdiImagen = false" class="CL_Cerrar_Modal"></div>
        <div id="CONT_Contenido">
          <div id="CONT_C_Header"><a ng-class="{Btn_Estilo_2:BL_Ver_Cont == false,Btn_Estilo_5:BL_Ver_Cont == true }" ng-click="BL_Ver_Cont = false;FN_Listar_Imagen_Perfil()" class="icon-image">Perfil</a><a ng-class="{Btn_Estilo_2:BL_Ver_Cont == true,Btn_Estilo_5:BL_Ver_Cont == false}" ng-click="BL_Ver_Cont = true; FN_Listar_Imagen_Portada()" class="icon-image">Portada</a>
            <p ng-click="VerEdiImagen = false" class="CL_Eliminar_1_1"></p>
          </div>
          <div id="CONT_C_Modificar_Img_Perfil" ng-show="BL_Ver_Cont == false">
            <div id="CONT_C_Imagenes_Seleccion" ng-repeat="Imagenes_Perfil in dato.AOBJ_Imagenes_Perfil_Usuario_Avatars" ng-click="dato.AOBJ_Imagenes_Perfil_Usuario_Avatars[$index].BL_Estado = true;dato.FN_Moificar_Imagenen_Usuario(4,$index)" ng-class="{CL_Seleccionado: Imagenes_Perfil.BL_Estado == true}"><img ng-src="{{Imagenes_Perfil.URL_Imagen_Usuario}}"/></div>
            <label id="CONT_C_Imagenes_Seleccion" for="ID_INPUT_FILE" class="CL_Cargar_Archivo Grid_Contenedor abcenter">
              <div class="CL_Icono_Archivo Grid_Contenedor abcenter icon-file-image Grid_Item Base-100"></div>
              <div class="Grid_Contenedor CL_Txt_Subir_Archivo CL_Alerta_5 abcenter">Subir una foto</div>
            </label>
            <input id="ID_INPUT_FILE" name="fichero" type="file" class="Invisible"/>
          </div>
          <div id="CONT_C_Modificar_Fondo_Perfil" ng-show="BL_Ver_Cont == true">
            <div id="CONT_C_Imagenes_Seleccion" ng-repeat="Imagen_FondoPerfil in dato.AOBJ_Imagenes_Usuario_Fondo_Perfil" ng-click="dato.AOBJ_Imagenes_Usuario_Fondo_Perfil[$index].BL_Estado = true;dato.FN_Moificar_Imagenen_Usuario(3,$index)" ng-class="{CL_Seleccionado: Imagen_FondoPerfil.BL_Estado == true} "><img ng-src="{{Imagen_FondoPerfil.URL_Imagen_Portada}}"/></div>
            <label id="CONT_C_Imagenes_Seleccion" for="ID_INPUT_FILE" class="CL_Cargar_Archivo Grid_Contenedor abcenter">
              <div class="CL_Icono_Archivo Grid_Contenedor abcenter icon-file-image Grid_Item Base-100"></div>
              <div class="Grid_Contenedor CL_Txt_Subir_Archivo CL_Alerta_5 abcenter">Subir una foto</div>
            </label>
            <input id="ID_INPUT_FILE" name="fichero" type="file" class="Invisible"/>
          </div>
          <div id="CONT_C_Footer">
            <div id="CONT_Btn_Perfil" ng-show="BL_Ver_Cont == false"><a ng-click="VerEdiImagen = false;dato.FN_Moificar_Imagenen_Usuario(1,0);FN_Actualizar_Datos_Tabla_Cliente()" class="icon-agregar1 Btn_Estilo_1"> Seleccionar</a><a ng-click="VerEdiImagen = false" class="icon-cancelar1 Btn_Estilo_5">Cancelar</a></div>
            <div id="CONT_Btn_Perfil_Fondo" ng-show="BL_Ver_Cont == true"><a ng-click="VerEdiImagen = false;dato.FN_Moificar_Imagenen_Usuario(2,0);FN_Actualizar_Datos_Tabla_Cliente()" class="icon-agregar1 Btn_Estilo_1"> Seleccionar</a><a ng-click="VerEdiImagen = false" class="icon-cancelar1 Btn_Estilo_5">Cancelar</a></div>
          </div>
        </div>
      </div>
    </section>
    <section id="CONT_C_Estado_Cuenta" class="Grid_Total">			
      <div id="C_Estado_Cuenta" ng-show="Datos_Tipo == 4" class="CL_Alerta_5 Grid_Total Grid_Contenedor abcenter">
        <div id="CONT_BNT_Inhabilitar_cuenta" class="Padding-50">
          <p>¿Inhabilitar cuenta?</p>
          <button ng-click="FN_Inhabilitar_Estado_Cuenta()" class="Btn_Estilo_2">Inhabilitar Cuenta</button>
        </div>
      </div>
    </section>
  </main>
</section>