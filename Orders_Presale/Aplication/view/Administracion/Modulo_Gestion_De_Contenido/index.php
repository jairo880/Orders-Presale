
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Gestion de contenido</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Gestion_De_Contenido/Modulo_Gestion_De_Contenido.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Gestion_De_Contenido" ng-init="FN_Listar_Imagen_Perfil()" class="Grid_Contenedor">
  <div id="CONT_Contenedor_Invisible_Header" ng-init="BL_Imagenes_Perfil = true;BL_Imagenes_Portada = false"></div>
  <div class="CL_Alerta_6 Padding-10">Administracion imagenes usuarios</div>
  <div class="Grid_Total abcenter Grid_Contenedor">
    <div ng-click="BL_Imagenes_Portada = true;BL_Imagenes_Perfil = false;Port.URL_Imagen_Portada = ''; FN_Listar_Imagen_Portada()" class="Btn_Estilo_7 icon-file-image">Imagenes de portada</div>
    <div ng-click="BL_Imagenes_Perfil = true;BL_Imagenes_Portada = false;Port.URL_Imagen_Perfil = '';FN_Listar_Imagen_Perfil()" class="Btn_Estilo_5 icon-file-image">Imagenes de perfil</div>
  </div>
  <div class="Base-100 web-30 abcenter Padding-10">
    <form ng-show="BL_Imagenes_Portada == true" ng-submit="FN_Registrar_Imagen_Portada(Port)" name="Formulario_Portada" class="Grid_Contenedor abcenter reverse column ng_show">
      <div class="CL_Alerta_5 Padding-5">Portada</div>
      <div ng-show="Formulario_Portada.$valid" class="Grid_Item Base-100 ng_show abcenter Grid_Contenedor"><img ng-src="{{Port.URL_Imagen_Portada}}" class="CL_Imagen_3 CL_Imagen_Nueva"/></div>
      <div class="Grid_Item Base-100 Padding-10 Grid_Contenedor">
        <input type="text" ng-model="Port.URL_Imagen_Portada" required="required" class="Input_Estilo_1"/>
        <input type="submit" value="Registrar" class="Btn_Estilo_1"/>
        <div ng-click="Port.URL_Imagen_Portada = ''; FN_Registrar_Imagen_Portada();" class="Btn_Estilo_5">Cancelar</div>
      </div>
    </form>
    <form ng-show="BL_Imagenes_Perfil == true" ng-submit="FN_Registrar_Imagen_Perfil(Port)" name="Formulario_Perfil" class="Grid_Contenedor abcenter reverse column ng_show">
      <div class="CL_Alerta_5 Padding-5">Perfil</div>
      <div ng-show="Formulario_Perfil.$valid" class="Grid_Item Base-100 ng_show abcenter Grid_Contenedor"><img ng-src="{{Port.URL_Imagen_Perfil}}" class="CL_Imagen_3 CL_Imagen_Nueva"/></div>
      <div class="Grid_Item Base-100 Padding-10 Grid_Contenedor">
        <input type="text" ng-model="Port.URL_Imagen_Perfil" required="required" class="Input_Estilo_1"/>
        <input type="submit" value="Registrar" class="Btn_Estilo_1"/>
        <div ng-click="Port.URL_Imagen_Perfil = ''; FN_Registrar_Imagen_Portada();" class="Btn_Estilo_5">Cancelar</div>
      </div>
    </form>
  </div>
  <div class="CONT_Gestion_De_Contenido Grid_Total abcenter Grid_Contenedor Padding-10 Base-100 web-60">
    <div class="CONT_Gestion_De_Contenido_Tabla Grid_Contenedor Base-100 Padding-10">
      <div ng-init="BL_Activar_Edicion = false" ng-show="BL_Imagenes_Perfil == true" class="Tabla_Estilo_2">
        <table>
          <thead>
            <tr>
              <th class="Imagen"></th>
              <th>ID</th>
              <th>Ruta actual</th>
              <th>Eliminar</th>
              <th>Editar</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="Imagenes in dato.AOBJ_Imagenes_Perfil_Usuario_Avatars">
              <td class="CL_Imagen_Grande"><img ng-src="{{Imagenes.URL_Imagen_Usuario}}"/></td>
              <td> {{Imagenes.PK_ID_Imagen_Usuario}}</td>
              <td>
                <textarea ng-disabled="BL_Activar_Edicion == false" ng-model="Imagenes.URL_Imagen_Usuario" class="Textarea_Estilo_1">{{Imagenes.URL_Imagen_Usuario}}</textarea>
              </td>
              <td>
                <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="Btn_Estilo_5 icon-lapiz">Editar</div>
                <div ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion; FN_Modificar_Productos($index);FN_Modificar_Imagen($index,1)" class="Btn_Estilo_1 icon-actualizar">Guardar</div>
              </td>
              <td>
                <div ng-click="FN_Eliminar($index,1)" class="Btn_Estilo_7 icon-cancelar3">Eliminar</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div ng-init="BL_Activar_Edicion = false" ng-show="BL_Imagenes_Portada == true" class="Tabla_Estilo_2">
        <table>
          <thead>
            <tr>
              <th class="Imagen"> </th>
              <th>ID</th>
              <th>Ruta actual</th>
              <th>Eliminar</th>
              <th>Editar</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="Imagenes in dato.AOBJ_Imagenes_Usuario_Fondo_Perfil">
              <td class="CL_Imagen_Grande"><img ng-src="{{Imagenes.URL_Imagen_Portada}}"/></td>
              <td>{{Imagenes.PK_ID_Imagen_Portada}}</td>
              <td>
                <textarea ng-disabled="BL_Activar_Edicion == false" ng-model="Imagenes.URL_Imagen_Portada" class="Textarea_Estilo_1">{{Imagenes.URL_Imagen_Portada}}</textarea>
              </td>
              <td>
                <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="Btn_Estilo_5 icon-lapiz">Editar</div>
                <div ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion; FN_Modificar_Productos($index);FN_Modificar_Imagen($index,2)" class="Btn_Estilo_1 icon-actualizar">Guardar</div>
              </td>
              <td>
                <div ng-click="FN_Eliminar($index,2)" class="Btn_Estilo_7 icon-cancelar3">Eliminar</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>