
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Mensajes Administracio&oacute;n</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Mensajes/Modulo_Mensajes.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Mensajes" class="Grid_Contenedor cross_start">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div class="Grid_Contenedor cross_start">
    <div class="Grid_Contenedor CL_Header_Mensajes abcenter Invisible Visible-tablet">
      <div class="Grid_Contenedor Grid_Item">
        <div class="CL_TXT_Texto_5 CL_TXT_Blanco CL_TXT_Texto_Bold icon-inbox-alt CL_TXT_Icon_Blanco">Mensajes</div>
      </div>
    </div>
    <div class="Grid_Contenedor Base-95 web-30 CL_Menu_Mensaje cross_start">
      <div ng-class="{CL_Elemento_Seleccionado_Nav_Mensaje: BL_Bandeja_Entrada == true}" ng-click="BL_Mensajes_Detalle = false;FN_Listar_Buson_Mensajes_Bandeja_Entrada( true );BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;BL_Bandeja_Entrada = true;BL_Nuevo_Mensaje = false;BL_Mensajes_Enviados = false;BL_Mensajes_Eliminados = false" class="CL_Menu_Opcion Grid_Contenedor Base-20 web-100 CL_TXT_Pri_Btn relative Enlace">
        <div class="Grid_Item No_Padding icon-inbox Base-10 CL_Icon_Menu_Mensajes relative Enlace"><span class="CL_Cantidad top-20_20 left-25_25 relative">{{Cantidad_Mensajes_Buson_Entrada}}</span></div>
        <div class="Grid_Item No_Padding Base-60">
          <div class="CL_TXT_Texto_1 CL_TXT_Gris Enlace Invisible Visible-web">Bandeja de mensajes</div>
        </div><span class="CL_TXT_Info_Btn Visible Invisible-web">Bandeja entrada</span>
      </div>
      <div ng-class="{CL_Elemento_Seleccionado_Nav_Mensaje: BL_Nuevo_Mensaje == true}" ng-click="BL_Mensajes_Detalle = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Bandeja_Entrada = false;BL_Mensajes_Enviados = false;BL_Nuevo_Mensaje = true;BL_Mensajes_Eliminados = false" class="CL_Menu_Opcion Grid_Contenedor Base-20 web-100 CL_TXT_Pri_Btn relative Enlace">
        <div class="Grid_Item No_Padding icon-external-link-square Base-10 CL_Icon_Menu_Mensajes relative Enlace"></div>
        <div class="Grid_Item No_Padding Base-70">
          <div class="CL_TXT_Texto_1 CL_TXT_Gris Enlace Invisible Visible-web">Nuevo mensaje</div>
        </div><span class="CL_TXT_Info_Btn Visible Invisible-web">Nuevo mensaje</span>
      </div>
      <div ng-class="{CL_Elemento_Seleccionado_Nav_Mensaje: BL_Mensajes_Enviados == true}" ng-click="BL_Mensajes_Detalle = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;FN_Listar_Buson_Mensajes( true );BL_Bandeja_Entrada = false;BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Nuevo_Mensaje = false;BL_Mensajes_Enviados = true;BL_Mensajes_Eliminados = false" class="CL_Menu_Opcion Grid_Contenedor Base-20 web-100 CL_TXT_Pri_Btn relative Enlace">
        <div class="Grid_Item No_Padding icon-share-square-o Base-10 CL_Icon_Menu_Mensajes relative Enlace relative"><span class="CL_Cantidad top-20_20 left-25_25 relative">{{Cantidad_Mensajes_Enviados}}</span></div>
        <div class="Grid_Item No_Padding Base-60">
          <div class="CL_TXT_Texto_1 CL_TXT_Gris Enlace Invisible Visible-web">Enviados</div>
        </div><span class="CL_TXT_Info_Btn Visible Invisible-web">Enviados</span>
      </div>
      <div ng-class="{CL_Elemento_Seleccionado_Nav_Mensaje: BL_Mensajes_Eliminados == true}" ng-click="BL_Mensajes_Detalle = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;FN_Listar_Buson_Mensajes_Eliminados( true );BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Bandeja_Entrada = false;BL_Nuevo_Mensaje = false;BL_Mensajes_Enviados = false;BL_Mensajes_Eliminados = true" class="CL_Menu_Opcion Grid_Contenedor Base-20 web-100 CL_TXT_Pri_Btn relative Enlace">
        <div class="Grid_Item No_Padding icon-delete-trash-1 Base-10 CL_Icon_Menu_Mensajes relative Enlace relative"><span class="CL_Cantidad top-20_20 left-25_25 relative">{{Cantidad_Mensajes_Eliminados}}</span></div>
        <div class="Grid_Item No_Padding Base-60">
          <div class="CL_TXT_Texto_1 CL_TXT_Gris Enlace Invisible Visible-web">Eliminados</div>
        </div><span class="CL_TXT_Info_Btn Visible Invisible-web">Eliminados</span>
      </div>
    </div>
    <div ng-show="BL_Nuevo_Mensaje" class="Grid_Contenedor Base-100 tablet-100 web-70 ng_show">
      <div class="Grid_Contenedor CL_Envio_Mensaje_Administrador abcenter">
        <form ng-submit="FN_Envio_Mensaje()" class="CL_Formulario_Envio_Mensaje Grid_Contenedor Base-100 tablet-90 cross_start CL_Contenedor_Estilo_1 Padding-10">
          <div class="Grid_Contenedor CL_Envio_Mensaje_Datos justify">
            <div class="Grid_Item No_Padding Base-100 tablet-15">
              <div class="CL_TXT_Texto_3 CL_TXT_Gris CL_TXT_Texto_Bold">Para:</div>
            </div>
            <div class="Grid_Item No_Padding Base-100 tablet-80">
              <div class="Grid_Contenedor CL_Asociacion_Usuarios_Mensajes relative main_start">
                <div ng-repeat="Usuario_Select in AOBJ_Lista_Usuarios_Envio_Mensaje" class="Grid_Item No_Padding Base-50 tablet-40 web-30">
                  <div class="CL_Usuario_Seleccionado_Envio relative">
                    <div class="CL_Usuarios_Seleccionado">
                      <div class="CL_TXT_Texto_1 CL_TXT_Gris">{{Usuario_Select.Nombre_Usuario}} ~ {{Usuario_Select.Correo_Electronico}}</div>
                    </div>
                    <div ng-click="FN_Remover_De_Mensaje(Usuario_Select.PK_ID_Usuario)" title="Remover usuario" class="CL_Eliminar_1_1"></div>
                  </div>
                </div>
                <div class="Grid_Item No_Padding Base-60">
                  <input ng-show="BL_Sin_Usuarios == false &amp;&amp; dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" ng-init="BL_Ver_Lista_Usuarios = false;Buscar_Usuario = ''" ng-focus="Listar_Usuarios( 1 )" maxlength="30" minlength="7 " type="text" name="Correo" ng-model="Buscar_Usuario" placeholder="Usuario o correo" class="Input_Estilo_1 CL_Censillo Grid_Contenedor"/>
                  <input ng-show="BL_Sin_Usuarios == false &amp;&amp; dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1" ng-init="BL_Ver_Lista_Usuarios = false;Buscar_Usuario = ''" ng-focus="Listar_Usuarios( 3 )" maxlength="30" minlength="7 " type="text" name="Correo" ng-model="Buscar_Usuario" placeholder="Usuario o correo" class="Input_Estilo_1 CL_Censillo Grid_Contenedor"/>
                </div>
                <div id="CONT_Invisible" ng-click="BL_Ver_Lista_Usuarios = false" ng-show="BL_Ver_Lista_Usuarios == true">
                  <div class="CL_Cerrar_Modal CL_Transparente"></div>
                </div>
                <div ng-show="BL_Ver_Lista_Usuarios == true" class="Grid_Contenedor CL_Usuarios_Lista cross_start">
                  <div ng-if="Datos_Usuario.Visible == true" ng-repeat="Datos_Usuario in AOBJ_Lista_Usuarios_Registrados | filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario" ng-click="FN_Agregar_Usuarios_Mensaje(Datos_Usuario.PK_ID_Usuario)" class="Grid_Contenedor CL_Usuario_Listado">
                    <div class="Grid_Item No_Padding Base-20 tablet-10"><img ng-src="{{Datos_Usuario.Imagen_Usuario}}" class="CL_Imagen_1"/></div>
                    <div class="Grid_Item No_Padding Base-50 tablet-50">
                      <div class="CL_TXT_Texto_1 CL_TXT_Gris">Usuario: {{Datos_Usuario.Nombre_Usuario}}</div>
                      <div class="CL_TXT_Texto_1 CL_TXT_Gris">Correo: {{Datos_Usuario.Correo_Electronico}}</div>
                    </div>
                    <div class="Grid_Item No_Padding Base-20 tablet-30">
                      <div class="CL_TXT_Texto_1 CL_TXT_Gris">Tipo usuario: {{Datos_Usuario.Nombre_Rol}}</div>
                    </div>
                  </div>
                  <div ng-show="(AOBJ_Lista_Usuarios_Registrados | filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario).length == 0" class="CL_Alerta_2 ng_repeat_anim1 Grid_Contenedor">
                    <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                      <p>No se han encontrado usuarios</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor CL_Envio_Mensaje_Datos justify">
            <div class="Grid_Item No_Padding Base-100 tablet-15">
              <div class="CL_TXT_Texto_3 CL_TXT_Gris CL_TXT_Texto_Bold">Asunto:</div>
            </div>
            <div class="Grid_Item No_Padding Base-100 tablet-80">
              <div class="Grid_Contenedor CL_Asociacion_Usuarios_Mensajes abcenter">
                <input maxlength="60" minlength="1" type="text" name="Correo" ng-model="Asunto" placeholder="Asunto" class="Input_Estilo_1 CL_Censillo"/>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor CL_Envio_Mensaje_Datos_Contenido justify margin_bottom-10">
            <div class="Grid_Item No_Padding Base-100 tablet-15">
              <div class="CL_TXT_Texto_3 CL_TXT_Gris CL_TXT_Texto_Bold">Contenido:</div>
            </div>
            <div class="Grid_Item No_Padding Base-100 tablet-80">
              <div class="Grid_Contenedor abcenter">
                <textarea type="text" name="Contenido_Mensaje" ng-model="Contenido" placeholder="Contenido del mensaje"></textarea>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor main_end Padding-10">
            <input type="submit" value="Enviar" class="Btn_Estilo_3 icon-enviar CL_TXT_Texto_Bold"/>
            <div ng-click="FN_Limpiar_Envio()" ng-show="(AOBJ_Lista_Usuarios_Envio_Mensaje).length != 0" class="Btn_Estilo_5 CL_TXT_Texto_Bold">Cancelar</div>
          </div>
        </form>
      </div>
    </div>
    <div ng-show="BL_Bandeja_Entrada" class="Grid_Contenedor Base-100 tablet-100 web-70 ng_show">
      <div class="Base-95 Grid_Contenedor">
        <div class="Tabla_Estilo_1 width_fijo">
          <table>
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th> </th>
              </tr>
            </thead>
            <div ng-show="(AOBJ_Listado_Mensajes_Buson_Entrada).length != 0" ng-init="pageSize = 10" class="Grid_Contenedor main_start CON_Paginacion">
              <div class="Grid_Contenedor Base-100 tablet-70 web-20 abcenter">
                <div ng-show="(AOBJ_Listado_Mensajes_Buson_Entrada).length != 0" ng-click="FN_Modificar_Estado_Mensaje_Seleccion_Multiple_Buson_Entrada()" class="Grid_Contenedor abcenter No_Padding Enlace icon-eliminar CL_Opcion_Mensajes ng_show"></div>
                <div ng-show="(AOBJ_Listado_Mensajes_Buson_Entrada).length != 0" class="Grid_Contenedor abcenter No_Padding Enlace CL_Opcion_Mensajes CL_TXT_Chek_Box_Remplazo ng_show">
                  <input ng-model="BL_Estado_Seleccion_Elemento_Buson_Entrada" ng-change="FN_Seleccionar_Todos_Mensajes_Buson_Mensajes()" type="checkbox"/>
                </div>
              </div>
              <dir-pagination-controls boundary-links="true" pagination-id="Buson_Entrada" class="Base-100 tablet-55 web-45 cross_end Grid_Contenedor">
                <p class="CL_TXT_Texto_3 CL_TXT_Gris">{{currentPage}}</p>
                <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                  <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                  <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                  <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                  <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                  <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                </ul>
              </dir-pagination-controls>
            </div>
            <tbody>
              <tr ng-class="{CL_Elemento_Seleccionado : Buson_Mensajes.Seleccionado == true}" dir-paginate="Buson_Mensajes in AOBJ_Listado_Mensajes_Buson_Entrada  | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Buson_Entrada">
                <td>
                  <input ng-model="Buson_Mensajes.Seleccionado" ng-change="FN_Resetear_Seleccion_Buson_Mensajes(Buson_Mensajes.Seleccionado)" type="checkbox"/>
                </td>
                <td ng-click="FN_Ver_Detalle_Mensaje(Buson_Mensajes.Imagen_Usuario_Remitente,Buson_Mensajes.Asunto,Buson_Mensajes.Mensaje,Buson_Mensajes.Fecha_Envio,Buson_Mensajes.Imagen_Usuario_Destinatario,Buson_Mensajes.Nombre_Usuario_Destinatario,Buson_Mensajes.Correo_Electronico_Destinatario,Buson_Mensajes.Nombre_Usuario_Remitente,false,true,false,Buson_Mensajes.PK_ID_Buson_Mensajes,Buson_Mensajes.FK_ID_Usuario_Destinatario,Buson_Mensajes.FK_ID_Usuario_Remitente)" class="CL_TXT_Gris relative Enlace">
                  <div class="Grid_Contenedor abcenter now_wrap">
                    <div class="Grid_Contenedor Base-20 web-10 Invisible Visible-tablet"><img ng-src="{{Buson_Mensajes.Imagen_Usuario_Remitente}}" class="CL_Imagen_Icono_1"/></div>
                    <div class="Grid_Contenedor Base-100 Padding-10">
                      <div class="CL_TXT_Texto_1 CL_TXT_Azul CL_TXT_Texto_Bold Enlace">{{Buson_Mensajes.Asunto | limitTo : 35 : 0}}...</div>
                      <div class="CL_TXT_Texto_2 CL_TXT_Gris Enlace">{{ Buson_Mensajes.Mensaje | limitTo : 20 : 0}}...</div>
                      <div class="Base-auto CL_TXT_Texto_1 CL_TXT_Gris absolute bottom-5 right-10 Enlace">{{Buson_Mensajes.Fecha_Envio}}</div>
                    </div>
                  </div>
                </td>
                <td class="CL_Tbl_Icon">
                  <div ng-click="FN_Modificar_Estado_Buson_Mensajes(Buson_Mensajes.PK_ID_Buson_Mensajes,false,true)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-20_20">Eliminar</span></div>
                </td>
              </tr>
              <div ng-show="(AOBJ_Listado_Mensajes_Buson_Entrada).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor ng_show">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                  <p>No se han encontrado mensajes en la bandeja de entrada</p>
                </div>
              </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div ng-show="BL_Mensajes_Enviados" class="Grid_Contenedor Base-100 tablet-100 web-70 ng_show cross_start">
      <div class="Base-95 Grid_Contenedor">
        <div class="Tabla_Estilo_1 width_fijo">
          <table>
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th> </th>
              </tr>
            </thead>
            <div ng-show="(AOBJ_Listado_Mensajes).length != 0" ng-init="pageSize = 10" class="Grid_Contenedor main_start CON_Paginacion">
              <div class="Grid_Contenedor Base-100 tablet-70 web-20 abcenter">
                <div ng-show="(AOBJ_Listado_Mensajes).length != 0" ng-click="FN_Modificar_Estado_Mensaje_Seleccion_Multiple()" class="Grid_Contenedor abcenter No_Padding Enlace icon-eliminar CL_Opcion_Mensajes ng_show"></div>
                <div ng-show="(AOBJ_Listado_Mensajes).length != 0" class="Grid_Contenedor abcenter No_Padding Enlace CL_Opcion_Mensajes CL_TXT_Chek_Box_Remplazo ng_show">
                  <input ng-model="BL_Estado_Seleccion_Elemento" ng-change="FN_Seleccionar_Todos_Mensajes()" type="checkbox"/>
                </div>
              </div>
              <dir-pagination-controls boundary-links="true" pagination-id="Buson_Mensajes" class="Base-100 tablet-55 web-45 cross_end Grid_Contenedor">
                <p class="CL_TXT_Texto_3 CL_TXT_Gris">{{currentPage}}</p>
                <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                  <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                  <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                  <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                  <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                  <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                </ul>
              </dir-pagination-controls>
            </div>
            <tbody>
              <tr ng-class="{CL_Elemento_Seleccionado : Buson_Mensajes.Seleccionado == true}" dir-paginate="Buson_Mensajes in AOBJ_Listado_Mensajes  | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Buson_Mensajes">
                <td>
                  <input ng-model="Buson_Mensajes.Seleccionado" ng-change="FN_Resetear_Seleccion(Buson_Mensajes.Seleccionado)" type="checkbox"/>
                </td>
                <td ng-click="FN_Ver_Detalle_Mensaje(Buson_Mensajes.Imagen_Usuario_Remitente,Buson_Mensajes.Asunto,Buson_Mensajes.Mensaje,Buson_Mensajes.Fecha_Envio,Buson_Mensajes.Imagen_Usuario_Destinatario,Buson_Mensajes.Nombre_Usuario_Destinatario,Buson_Mensajes.Correo_Electronico_Destinatario,Buson_Mensajes.Nombre_Usuario_Remitente,true,false,false,Buson_Mensajes.PK_ID_Buson_Mensajes,Buson_Mensajes.FK_ID_Usuario_Destinatario,Buson_Mensajes.FK_ID_Usuario_Remitente)" class="Enlace relative">
                  <div class="Grid_Contenedor abcenter now_wrap">
                    <div class="Grid_Contenedor Base-20 web-10 Invisible Visible-tablet"><img ng-src="{{Buson_Mensajes.Imagen_Usuario_Remitente}}" class="CL_Imagen_Icono_1"/></div>
                    <div class="Grid_Contenedor Base-100 Padding-10">
                      <div class="CL_TXT_Texto_1 CL_TXT_Azul CL_TXT_Texto_Bold Enlace">{{Buson_Mensajes.Asunto | limitTo : 35 : 0}}</div>
                      <div class="CL_TXT_Texto_2 CL_TXT_Gris">{{ Buson_Mensajes.Mensaje | limitTo : 20 : 0}}...</div>
                      <div class="Base-auto CL_TXT_Texto_1 CL_TXT_Gris absolute bottom-5 right-10 Enlace">{{Buson_Mensajes.Fecha_Envio}}</div>
                    </div>
                  </div>
                </td>
                <td class="CL_Tbl_Icon">
                  <div ng-click="FN_Modificar_Estado_Buson_Mensajes(Buson_Mensajes.PK_ID_Buson_Mensajes,true,false)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-20_20">Eliminar</span></div>
                </td>
              </tr>
              <div ng-show="(AOBJ_Listado_Mensajes).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor ng_show">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                  <p>No se han encontrado mensajes enviados</p>
                </div>
              </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div ng-show="BL_Mensajes_Eliminados" class="Grid_Contenedor Base-100 tablet-100 web-70 ng_show cross_start">
      <div class="Base-95 Grid_Contenedor">
        <div class="Tabla_Estilo_1 width_fijo">
          <table>
            <thead>
              <tr>
                <th></th>
                <th> </th>
                <th> </th>
              </tr>
            </thead>
            <div ng-show="(AOBJ_Listado_Mensajes_Eliminados).length != 0" ng-init="pageSize = 10" class="Grid_Contenedor main_start CON_Paginacion">
              <div ng-show="(AOBJ_Listado_Mensajes_Eliminados).length != 0" class="Grid_Contenedor Base-100 tablet-70 web-40 abcenter">
                <div ng-click="FN_Modificar_Estado_Mensaje_Seleccion_Multiple_Eliminacion()" class="Grid_Contenedor abcenter No_Padding Enlace icon-eliminar CL_Opcion_Mensajes"></div>
                <div class="Grid_Contenedor abcenter No_Padding Enlace CL_Opcion_Mensajes">
                  <input ng-model="BL_Estado_Seleccion_Elemento_Eliminacion" ng-change="FN_Seleccionar_Todos_Mensajes_Eliminacion()" type="checkbox"/>
                </div>
                <div ng-click="FN_Restaurar_Mensajes()" class="Grid_Contenedor relative abcenter No_Padding Enlace icon-atras-1 CL_Opcion_Mensajes CL_TXT_Pri_Btn ng_show"><span class="CL_TXT_Info_Btn">Restaurar</span></div>
              </div>
              <dir-pagination-controls boundary-links="true" pagination-id="Buson_Mensajes_Eliminados" class="Base-100 tablet-55 web-45 cross_end Grid_Contenedor">
                <p class="CL_TXT_Texto_3 CL_TXT_Gris">{{currentPage}}</p>
                <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                  <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                  <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                  <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                  <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                  <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                </ul>
              </dir-pagination-controls>
            </div>
            <tbody>
              <tr ng-class="{CL_Elemento_Seleccionado : Buson_Mensajes.Seleccionado == true}" dir-paginate="Buson_Mensajes in AOBJ_Listado_Mensajes_Eliminados  | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Buson_Mensajes_Eliminados">
                <td>
                  <input ng-click="FN_Resetear_Seleccion_Eliminacion(Buson_Mensajes.Seleccionado)" ng-model="Buson_Mensajes.Seleccionado" type="checkbox"/>
                </td>
                <td ng-click="FN_Ver_Detalle_Mensaje(Buson_Mensajes.Imagen_Usuario_Remitente,Buson_Mensajes.Asunto,Buson_Mensajes.Mensaje,Buson_Mensajes.Fecha_Envio,Buson_Mensajes.Imagen_Usuario_Destinatario,Buson_Mensajes.Nombre_Usuario_Destinatario,Buson_Mensajes.Correo_Electronico_Destinatario,Buson_Mensajes.Nombre_Usuario_Remitente,false,false,true,Buson_Mensajes.PK_ID_Buson_Mensajes,Buson_Mensajes.FK_ID_Usuario_Destinatario,Buson_Mensajes.FK_ID_Usuario_Remitente)" class="Enlace relative">
                  <div class="Grid_Contenedor abcenter now_wrap">
                    <div class="Grid_Contenedor Base-20 web-10 Invisible Visible-tablet"><img ng-src="{{Buson_Mensajes.Imagen_Usuario_Remitente}}" class="CL_Imagen_Icono_1"/></div>
                    <div class="Grid_Contenedor Base-100 Padding-10">
                      <div class="CL_TXT_Texto_1 CL_TXT_Azul CL_TXT_Texto_Bold Enlace">{{Buson_Mensajes.Asunto | limitTo : 35 : 0}}...</div>
                      <div class="CL_TXT_Texto_2 CL_TXT_Gris Enlace">{{ Buson_Mensajes.Mensaje | limitTo : 20 : 0}}...</div>
                      <div class="Base-auto CL_TXT_Texto_1 CL_TXT_Gris absolute bottom-5 right-10 Enlace">{{Buson_Mensajes.Fecha_Envio}}</div>
                    </div>
                  </div>
                </td>
                <td class="CL_Tbl_Icon">
                  <div ng-click="FN_Eliminar_Buson_Mensajes(Buson_Mensajes.PK_ID_Buson_Mensajes)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-20_20">Eliminar</span></div>
                </td>
              </tr>
              <div ng-show="(AOBJ_Listado_Mensajes_Eliminados).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                  <p>No se han encontrado mensajes eliminados</p>
                </div>
              </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div ng-show="BL_Mensajes_Detalle" class="Grid_Contenedor Base-100 tablet-100 web-70 ng_show cross_start">
      <div class="Base-95 Grid_Contenedor Padding-10">
        <div class="Grid_Contenedor CL_Contenedor_Estilo_1 Padding-10 justify">
          <div class="Grid_Contenedor border_bottom_1">
            <div class="Grid_Contenedor Base-70 tablet-60">
              <div class="CL_TXT_Texto_4 CL_TXT_Gris Padding-10 CL_TXT_Texto_Bold">{{Txt_Texto_Asunto_Dtll}}.</div>
            </div>
            <div class="Grid_Contenedor Base-20 tablet-40 abcenter">
              <div ng-click="FN_Seleccion_Detalle_Mensaje_Opcion()" class="Btn_Estilo_5">Eliminar</div>
              <div title="Volver a bandeja de mensajes eliminados" ng-show="BL_Eliminacion_Eliminado == true" ng-click="BL_Mensajes_Detalle = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;FN_Listar_Buson_Mensajes_Eliminados( true );BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Bandeja_Entrada = false;BL_Nuevo_Mensaje = false;BL_Mensajes_Enviados = false;BL_Mensajes_Eliminados = true" class="Btn_Estilo_7 icon-flecha2 ng_show">Volver</div>
              <div title="Volver a bandeja de entrada" ng-show="BL_Eliminacion_Bandeja_Entrada == true" ng-click="BL_Mensajes_Detalle = false;FN_Listar_Buson_Mensajes_Bandeja_Entrada( true );BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;BL_Bandeja_Entrada = true;BL_Nuevo_Mensaje = false;BL_Mensajes_Enviados = false;BL_Mensajes_Eliminados = false" class="Btn_Estilo_7 icon-flecha2 ng_show">Volver</div>
              <div title="Volver a bandeja de mensajes enviados" ng-show="BL_Eliminacion_Enviado == true" ng-click="BL_Mensajes_Detalle = false;BL_Estado_Seleccion_Elemento = false;BL_Estado_Seleccion_Elemento_Eliminacion = false;FN_Listar_Buson_Mensajes( true );BL_Bandeja_Entrada = false;BL_Estado_Seleccion_Elemento_Buson_Entrada = false;BL_Nuevo_Mensaje = false;BL_Mensajes_Enviados = true;BL_Mensajes_Eliminados = false" class="Btn_Estilo_7 icon-flecha2 ng_show">Volver</div>
              <div ng-if="BL_Eliminacion_Enviado == false &amp;&amp; BL_Eliminacion_Eliminado == false" ng-click="FN_Enviar_Comentario_Respuesta_Mensajes(PK_ID_Usuario_Destinatario_Guardado,PK_ID_Usuario_Remitente_Guardado,Txt_Texto_Mensaje_Dtll,Nombre_Usuario_Remitente,Imagen_Usuario_Remitente,Nombre_Usuario_Remitente)" class="Btn_Estilo_3 icon-mensaje">Responder</div>
            </div>
          </div>
          <div class="Grid_Contenedor border_bottom_1 justify">
            <div class="Grid_Contenedor Base-100 web-70 abcenter">
              <div class="Grid_Contenedor Base-20 web-10">
                <div class="CL_TXT_Texto_2 CL_TXT_Gris CL_TXT_Texto_Bold">Para: </div>
              </div>
              <div class="Grid_Contenedor Base-20 web-10 abcenter"><img ng-src="{{Imagen_Usuario_Destinatario}}" class="CL_Imagen_Icono_3"/></div>
              <div class="Grid_Contenedor Base-60 main_start web-70">
                <div class="Base-auto">
                  <div class="CL_TXT_Texto_1 CL_TXT_Gris CL_TXT_Texto_Bold">{{Nombre_Usuario_Destinatario}}</div>
                </div>
                <div class="Base-auto">
                  <div class="CL_TXT_Texto_1 CL_TXT_Gris"><{{Correo_Electronico_Destinatario}}></div>
                </div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-100 web-20 abcenter">
              <div class="Grid_Contenedor Base-25 abcenter"><img ng-src="{{Imagen_Usuario_Remitente}}" class="CL_Imagen_Icono_1"/></div>
              <div class="Grid_Contenedor Base-75 abcenter">
                <div class="CL_TXT_Texto_1 CL_TXT_Gris CL_TXT_Texto_Bold">Enviado por: {{Nombre_Usuario_Remitente}}</div>
              </div>
              <div class="CL_TXT_Texto_1 CL_TXT_Gris">El: {{Txt_Texto_Fecha_Envio_Dtll}}</div>
            </div>
          </div>
          <div class="Grid_Contenedor Padding-20">
            <div class="CL_TXT_Texto_3 CL_TXT_Gris">{{Txt_Texto_Mensaje_Dtll}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>