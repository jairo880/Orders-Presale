
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Gestion de permisos de los usuarios</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Permisos_Usuario/Modulo_Permisos_Usuario.css"/>
<!--sesion Estructura-->
<section id="SC_Modulo_Permisos_Usuario">
  <main id="CONT_Modulo_Permisos_Usuario" ng-init="FN_Listar_Modulo_Permisos_Usuario(1)">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div ng-init="BL_Vistas = 1" class="Grid_Contenedor Base-100">
      <div class="CL_Alerta_6 Grid_Contenedor abcenter Padding-10">Opciones</div>
      <div class="CL_Alerta_7 Grid_Contenedor abcenter Pading-5">
        <div ng-click="PM.Nombre_Vista = ''; PM.Url_Vista = '';PM.FK_ID_Rol = '';FN_Listar_Modulo_Permisos_Usuario(1)" class="Btn_Estilo_1">Vistas Administrador</div>
        <div ng-click="PM.Nombre_Vista = ''; PM.Url_Vista = '';PM.FK_ID_Rol = '';FN_Listar_Modulo_Permisos_Usuario(2)" class="Btn_Estilo_5">Vistas Empleado Administrador</div>
        <div ng-click="PM.Nombre_Vista = ''; PM.Url_Vista = '';PM.FK_ID_Rol = '';FN_Listar_Modulo_Permisos_Usuario(3)" class="Btn_Estilo_6">Vistas Cliente </div>
      </div>
      <div ng-show="BL_Vistas == 1" class="Grid_Contenedor Base-100">
        <div class="CL_Alerta_1 Grid_Contenedor abcenter Padding-10">Vistas Administrador</div>
        <div class="Grid_Contenedor Base-30">
          <div class="CL_Alerta_5 Grid_Contenedor abcenter Padding-5">Registrar nueva vista</div>
          <form name="Registro_Vista_Administrador" ng-submit="FN_Registrar_Permiso_Usuario(PM)" class="Grid_Contenedor column abcenter Base-100">
            <input type="number" required="required" ng-model="PM.FK_ID_Rol" class="Input_Estilo_1"/>
            <label class="CL_TXT_Texto_3">Nombre vista</label>
            <input required="required" maxlength="150" minlength="5" type="text" name="Nombre_Vista" ng-model="PM.Nombre_Vista" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Registro_Vista_Administrador.Nombre_Vista.$valid &amp;&amp; !Registro_Vista_Administrador.$pristine &amp;&amp; !Registro_Vista_Administrador.Nombre_Vista.$error.required">
              <p class="icon-alerta1">La cantidad de caracteres es muy corta</p>
            </div>
            <label class="CL_TXT_Texto_3">Url vista</label>
            <textarea required="required" maxlength="150" minlength="5" type="text" name="Url_Vista" ng-model="PM.Url_Vista" class="Textarea_Estilo_1"></textarea>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Registro_Vista_Administrador.Url_Vista.$valid &amp;&amp; !Registro_Vista_Administrador.$pristine &amp;&amp; !Registro_Vista_Administrador.Url_Vista.$error.required">
              <p class="icon-alerta1">La cantidad de caracteres es muy corta</p>
            </div>
            <input ng-disabled="!Registro_Vista_Administrador.$valid " type="submit" value="Registrar vista" class="Btn_Estilo_1"/>
          </form>
        </div>
        <div class="Grid_Contenedor Base-50 CL_Tabla_Permisos">
          <div class="Tabla_Estilo_1">
            <table>
              <thead>
                <tr>
                  <th>Id vista</th>
                  <th>Nombre vista</th>
                  <th>Url vista</th>
                  <th>Modificar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody ng-init="BL_Edicion_Datos = false">
                <tr ng-repeat="Permisos in AOBJ_Lista_Permisos_Usuario">
                  <th>{{Permisos.PK_ID_Vista}}</th>
                  <th>
                    <input type="text" ng-model="Permisos.Nombre_Vista" ng-disabled="BL_Edicion_Datos == false"/>
                  </th>
                  <th>
                    <textarea ng-model="Permisos.Url_Vista" ng-disabled="BL_Edicion_Datos == false"></textarea>
                  </th>
                  <th>
                    <div ng-click="BL_Edicion_Datos = true" ng-class="{Invisible:BL_Edicion_Datos == true, Visible: BL_Edicion_Datos == false}" class="Btn_Estilo_5">Editar</div>
                    <div ng-click="FN_Modificar_Permiso_Usuario($index);BL_Edicion_Datos = false" ng-class="{Invisible:BL_Edicion_Datos == false, Visible: BL_Edicion_Datos == true}" class="Btn_Estilo_3">Guardar</div>
                  </th>
                  <th>
                    <div ng-click="FN_Eliminar_Permiso_Usuario($index)" class="Btn_Estilo_2">Eliminar</div>
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</section>