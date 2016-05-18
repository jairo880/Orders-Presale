
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Gestion de contenido</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Gestion_De_Contenido/Modulo_Gestion_De_Contenido.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Gestion_De_Contenido" ng-controller="Controlador_Gestion_Contenido" ng-init="FN_Listar_Imagen_Perfil()" class="Grid_Contenedor">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div class="CONT_Gestion_De_Contenido Grid_Total abcenter Grid_Contenedor Padding-10 Base-100 web-60"></div>
  <div class="Tablero_Trabajo_1 Grid_Contenedor">
    <div class="Grid_Contenedor Base-95 abcenter CL_CONT_Principal_Tablero_Trabajo">
      <div ng-init="BL_Ocultar_Barra_Izquierda = false;BL_Ocultar_Barra_Derecha = false" class="Grid_Contenedor Base-100 CL_CONT_Tablero_Trabajo">
        <div ng-class="{Barra_Izquierda_Oculto:BL_Ocultar_Barra_Izquierda == true, BL_Ocultar_Barra_Izquierda:BL_Ocultar_Barra_Derecha == true}" class="Grid_Contenedor Base-40 cross_start CL_CONT_Tablero">
          <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 relative">
            <div class="Grid_Item Base-auto">
              <div class="margin_left-50 CL_TXT_Texto_5 icon-crop CL_TXT_Gris CL_TXT_Icon_Gris">Gestion de contenido</div>
              <p ng-show="BL_Ocultar_Barra_Derecha == true" ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
              <p ng-show="BL_Ocultar_Barra_Derecha == false " ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
            </div>
          </div>
          <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
            <div class="Grid_Contenedor Base-90 CL_Informacion_Tablero_1 cross_start">
              <div ng-class="{CL_Registro_Base_50:BL_Ocultar_Barra_Izquierda == false, CL_Registro_Base_100:BL_Ocultar_Barra_Derecha == false}" class="Grid_Contenedor abcenter">
                <form ng-show="BL_Imagenes_Portada == true" ng-submit="FN_Registrar_Imagen_Portada(Port)" name="Formulario_Portada" class="Grid_Contenedor abcenter reverse column ng_show">
                  <div class="CL_Alerta_5 Padding-5">Registro de portada</div>
                  <div ng-show="Formulario_Portada.$valid" class="Grid_Item Base-100 ng_show abcenter Grid_Contenedor"><img ng-src="{{Port.URL_Imagen_Portada}}" class="CL_Imagen_3 CL_Imagen_Nueva"/></div>
                  <label class="CL_TXT_Texto_3 CL_TXT_Gris">Url de la imagen</label>
                  <div class="Grid_Item Base-100 Padding-10 Grid_Contenedor">
                    <textarea type="text" ng-model="Port.URL_Imagen_Portada" required="required" class="Textarea_Estilo_1"></textarea>
                    <input type="submit" value="Registrar" class="Btn_Estilo_1"/>
                    <div ng-click="Port.URL_Imagen_Portada = ''; FN_Registrar_Imagen_Portada();" class="Btn_Estilo_5">Cancelar</div>
                  </div>
                </form>
                <form ng-show="BL_Imagenes_Perfil == true" ng-submit="FN_Registrar_Imagen_Perfil(Port)" name="Formulario_Perfil" class="Grid_Contenedor abcenter reverse column ng_show">
                  <div class="CL_Alerta_5 Padding-5">Registro imagen perfil</div>
                  <div ng-show="Formulario_Perfil.$valid" class="Grid_Item Base-100 ng_show abcenter Grid_Contenedor"><img ng-src="{{Port.URL_Imagen_Perfil}}" class="CL_Imagen_3 CL_Imagen_Nueva"/></div>
                  <div class="Grid_Item Base-100 Padding-10 Grid_Contenedor">
                    <label class="CL_TXT_Texto_3 CL_TXT_Gris">Url de la imagen</label>
                    <textarea type="text" ng-model="Port.URL_Imagen_Perfil" required="required" class="Textarea_Estilo_1"></textarea>
                    <input type="submit" value="Registrar" class="Btn_Estilo_1"/>
                    <div ng-click="Port.URL_Imagen_Perfil = ''; FN_Registrar_Imagen_Portada();" class="Btn_Estilo_5">Cancelar</div>
                  </div>
                </form>
              </div>
            </div>
            <!--Por si se usa un filtro-->
            <div ng-show="(Lista_Datos_Ejemplo |filter:Buscar:Item).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
              <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                <p>Dato no encontrado</p>
              </div>
            </div>
          </div>
        </div>
        <div ng-class="{Barra_Derecho_Oculto:BL_Ocultar_Barra_Derecha == true,Barra_Derecho_Desplegado: BL_Ocultar_Barra_Izquierda == true}" class="Grid_Contenedor Base-60 cross_start CL_CONT_Tablero_Trabajo_2">
          <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 border_bottom_1">
            <div class="Grid_Item Base-100 Grid_Contenedor abcenter relative">
              <p ng-show="BL_Ocultar_Barra_Izquierda == true" ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
              <p ng-show="BL_Ocultar_Barra_Izquierda == false " ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
            </div>
            <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
              <div class="CL_TXT_Texto_4 CL_TXT_Gris margin_left-50 icon-crop CL_TXT_Icon_Gris"> </div>
            </div>
          </div>
          <div class="Grid_Contenedor abcenter">
            <div class="Grid_Contenedor Base-95">
              <div class="CL_Alerta_5 Grid_Contenedor">
                <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                  <div class="Grid_Contenedor Base-100 Padding-10">
                    <div class="Grid_Item Base-40">
                      <div ng-click="Port.URL_Imagen_Portada = ''; FN_Listar_Imagen_Portada()" class="Btn_Estilo_7 icon-file-image">Imagenes de portada</div>
                    </div>
                    <div class="Grid_Item Base-40">
                      <div ng-click="Port.URL_Imagen_Perfil = '';FN_Listar_Imagen_Perfil()" class="Btn_Estilo_5 icon-file-image">Imagenes de perfil</div>
                    </div>
                    <div class="Base-20 abcenter Grid_Contenedor">
                      <div class="CL_Contenedor_Buscador Base-100">
                        <input id="BuscarImagen" type="text" name="" placeholder="Buscar " ng-model="Buscar" class="CL_Buscar"/>
                        <label for="BuscarImagen" class="icon-buscar CL_Icono_Buscar"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="Grid_Contenedor">
                <div class="CONT_Gestion_De_Contenido_Tabla Grid_Contenedor Base-100 Padding-10">
                  <div ng-init="BL_Activar_Edicion = false" class="Tabla_Estilo_3">
                    <table>
                      <thead>
                        <tr>
                          <th class="Imagen"> </th>
                          <th>Url de la imagen</th>
                          <th> </th>
                          <th></th>
                        </tr>
                      </thead>
                      <div class="Grid_Contenedor abcenter CON_Paginacion">
                        <div class="Grid_Contenedor Base-10">
                          <p class="CL_TXT_Texto_2 CL_TXT_Gris">Pag&iacute;na: {{currentPage}}</p>
                        </div>
                        <div class="Grid_Contenedor Base-20">
                          <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
                        </div>
                        <dir-pagination-controls pagination-id="Portada_Paginacion" ng-if="BL_Imagenes_Portada == true" boundary-links="true" class="Base-60 cross_end Grid_Contenedor">
                          <p class="CL_TXT_Texto_3 CL_TXT_Gris">{{currentPage}}</p>
                          <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                            <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                            <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                            <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                            <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                            <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                          </ul>
                        </dir-pagination-controls>
                        <dir-pagination-controls pagination-id="Perfil_Paginacion" ng-if="BL_Imagenes_Perfil == true" boundary-links="true" class="Base-60 cross_end Grid_Contenedor">
                          <p class="CL_TXT_Texto_3 CL_TXT_Gris">{{currentPage}}</p>
                          <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                            <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                            <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                            <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                            <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                            <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo; </a></li>
                          </ul>
                        </dir-pagination-controls>
                      </div>
                      <tbody ng-if="BL_Imagenes_Perfil == true">
                        <tr dir-paginate="Imagenes in dato.AOBJ_Imagenes_Perfil_Usuario_Avatars | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Perfil_Paginacion">
                          <td class="CL_Imagen_Grande"><img ng-src="{{Imagenes.URL_Imagen_Usuario}}"/></td>
                          <td class="CL_Tam_Texarea">
                            <textarea ng-disabled="BL_Activar_Edicion == false" ng-model="Imagenes.URL_Imagen_Usuario" class="Textarea_Estilo_1">{{Imagenes.URL_Imagen_Usuario}}</textarea>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                            <div ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion;FN_Modificar_Imagen(Imagenes.PK_ID_Imagen_Usuario,1)" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar </span></div>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-click="FN_Eliminar_Imagen(Imagenes.PK_ID_Imagen_Usuario,1)" class="icon-cancelar3 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                          </td>
                        </tr>
                      </tbody>
                      <tbody ng-if="BL_Imagenes_Portada == true">
                        <tr dir-paginate="Imagenes in dato.AOBJ_Imagenes_Usuario_Fondo_Perfil | filter:Buscar | itemsPerPage: pageSize" pagination-id="Portada_Paginacion">
                          <td class="CL_Imagen_Grande"><img ng-src="{{Imagenes.URL_Imagen_Portada}}"/></td>
                          <td class="CL_Tam_Texarea">
                            <textarea ng-disabled="BL_Activar_Edicion == false" ng-model="Imagenes.URL_Imagen_Portada" class="Textarea_Estilo_1">{{Imagenes.URL_Imagen_Portada}}</textarea>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="CL_TXT_Pri_Btn relative icon-lapiz"><span class="CL_TXT_Info_Btn">Editar</span></div>
                            <div ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion;FN_Modificar_Imagen(Imagenes.PK_ID_Imagen_Portada,2)" class="CL_TXT_Pri_Btn relative icon-actualizar"><span class="CL_TXT_Info_Btn">Actualizar</span></div>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-click="FN_Eliminar_Imagen(Imagenes.PK_ID_Imagen_Portada,2)" class="CL_TXT_Pri_Btn relative icon-cancelar3"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div ng-show="(AOBJ_Imagenes_Usuario_Fondo_Perfil |filter:Buscar:Imagenes.URL_Imagen_Portada).length == 0" ng-if="BL_Imagenes_Portada == true" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                    <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                      <p>Imagen no encontrada</p>
                    </div>
                  </div>
                  <div ng-show="(AOBJ_Imagenes_Perfil_Usuario_Avatars |filter:Buscar:Imagenes.URL_Imagen_Usuario).length == 0" ng-if="BL_Imagenes_Perfil == true" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                    <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                      <p>Imagen no encontrada</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>