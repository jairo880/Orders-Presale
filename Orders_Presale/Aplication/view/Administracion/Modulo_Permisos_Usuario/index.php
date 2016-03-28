
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Gestion de permisos de los usuarios</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Permisos_Usuario/Modulo_Permisos_Usuario.css"/>
<!--sesion Estructura-->
<section id="SC_Modulo_Permisos_Usuario">
  <main id="CONT_Modulo_Permisos_Usuario" ng-init="FN_Listar_Modulo_Permisos_Usuario(1);FN_Listar_Roles_Usuarios()">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div ng-init="BL_Vistas = 1" class="Grid_Contenedor Base-100">
      <div class="CL_Alerta_5 Grid_Contenedor Base-90 Padding-10 main_end cross_end">
        <div class="Base-40 cross_end Grid_Contenedor">
          <p class="CL_TXT_Texto_4">Gestion de permisos para los usuarios</p>
        </div>
        <select class="Select_1 Base-30 Grid_Item">
          <option ng-click="FN_Listar_Modulo_Permisos_Usuario(Rol.PK_ID_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">Vistas {{Rol.Nombre_Rol}} </option>
        </select>
      </div>
      <div ng-show="BL_Vistas == 1" class="Grid_Contenedor Base-100">
        <div class="CL_Alerta_1 Grid_Contenedor Padding-10">Administrar permisos para el usuario</div>
        <div class="Grid_Contenedor Base-30">
          <div class="CL_Alerta_5 Grid_Contenedor abcenter Padding-5">Registrar nueva vista</div>
          <form name="Registro_Vista_Administrador" ng-submit="FN_Registrar_Permiso_Usuario(PM)" class="Grid_Contenedor column abcenter Base-100">
            <label class="CL_TXT_Texto_3">Tipo usuario</label>
            <select ng-model="PM.FK_ID_Rol" class="Select_1 Base-100 Grid_Item">
              <option ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">{{Rol.Nombre_Rol}}</option>
            </select>
            <label class="CL_TXT_Texto_3">Nombre vista</label>
            <input required="required" maxlength="20" minlength="5" type="text" name="Nombre_Vista" ng-model="PM.Nombre_Vista" class="Input_Estilo_1"/>
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
            <div class="Grid_Contenedor justify">
              <input ng-disabled="!Registro_Vista_Administrador.$valid " type="submit" value="Registrar vista" class="Btn_Estilo_1"/>
              <button ng-click="PM.Url_Vista  = ''; PM.Nombre_Vista = '' " class="Btn_Estilo_5">Limpiar</button>
            </div>
          </form>
        </div>
        <div class="Grid_Contenedor Base-60 CL_Tabla_Permisos">
          <div class="Tabla_Estilo_4">
            <table>
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre vista</th>
                  <th>Url vista</th>
                  <th> </th>
                  <th> </th>
                </tr>
              </thead>
              <tbody ng-init="BL_Edicion_Datos = false">
                <tr ng-repeat="Permisos in AOBJ_Lista_Permisos_Usuario">
                  <th>{{Permisos.PK_ID_Vista}}</th>
                  <th>
                    <input type="text" ng-model="Permisos.Nombre_Vista" ng-disabled="BL_Edicion_Datos == false" class="Input_Estilo_1"/>
                  </th>
                  <th class="CL_Tam_Texarea">
                    <textarea ng-model="Permisos.Url_Vista" ng-disabled="BL_Edicion_Datos == false" class="Textarea_Estilo_1"></textarea>
                  </th>
                  <th class="CL_Tbl_Icon">
                    <div ng-click="BL_Edicion_Datos = true" ng-class="{Invisible:BL_Edicion_Datos == true, Visible: BL_Edicion_Datos == false}" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                    <div ng-click="FN_Modificar_Permiso_Usuario($index);BL_Edicion_Datos = false" ng-class="{Invisible:BL_Edicion_Datos == false, Visible: BL_Edicion_Datos == true}" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></div>
                  </th>
                  <th class="CL_Tbl_Icon">
                    <div ng-click="FN_Confirmacion_Alerta(6,$index,false,'¿Esta seguro de eliminar el permiso?')" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
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