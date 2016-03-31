
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Gestion de contenido</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Gestion_De_Contenido/Modulo_Gestion_De_Contenido.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Gestion_De_Contenido" ng-init="FN_Listar_Imagen_Perfil()" class="Grid_Contenedor">
  <div id="CONT_Contenedor_Invisible_Header" ng-init="BL_Imagenes_Perfil = true;BL_Imagenes_Portada = false"></div>
  <div class="CONT_Gestion_De_Contenido Grid_Total abcenter Grid_Contenedor Padding-10 Base-100 web-60"></div>
  <div class="Tablero_Trabajo_1">
    <div class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Tablero_Trabajo">
      <div class="Grid_Contenedor Base-90 CL_CONT_Tablero_Trabajo">
        <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
          <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
            <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
          </div>
          <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
            <div class="Grid_Contenedor Base-90 CL_Informacion_Tablero_1 cross_start">
              <div class="Base-100 abcenter">
                <form ng-show="BL_Imagenes_Portada == true" ng-submit="FN_Registrar_Imagen_Portada(Port)" name="Formulario_Portada" class="Grid_Contenedor abcenter reverse column ng_show">
                  <div class="CL_Alerta_5 Padding-5">Registro de portada</div>
                  <div ng-show="Formulario_Portada.$valid" class="Grid_Item Base-100 ng_show abcenter Grid_Contenedor"><img ng-src="{{Port.URL_Imagen_Portada}}" class="CL_Imagen_3 CL_Imagen_Nueva"/></div>
                  <label class="CL_TXT_Texto_3">Url de la imagen</label>
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
                    <label class="CL_TXT_Texto_3">Url de la imagen</label>
                    <textarea type="text" ng-model="Port.URL_Imagen_Perfil" required="required" class="Textarea_Estilo_1"></textarea>
                    <input type="submit" value="Registrar" class="Btn_Estilo_1"/>
                    <div ng-click="Port.URL_Imagen_Perfil = ''; FN_Registrar_Imagen_Portada();" class="Btn_Estilo_5">Cancelar</div>
                  </div>
                </form>
              </div>
            </div>
            <!--Por si se usa un filtro-->
            <div ng-show="(Lista_Datos_Ejemplo |filter:Buscar:Item).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
              <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
                <p>Dato no encontrado</p>
              </div>
            </div>
          </div>
        </div>
        <div class="Grid_Contenedor Base-70 cross_start CL_CONT_Tablero_Trabajo_2">
          <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
            <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
              <div class="CL_TXT_Texto_4">Gestion de conteneido, Imagenes de usuarios</div>
            </div>
          </div>
          <div class="Grid_Contenedor abcenter">
            <div class="Grid_Contenedor Base-95">
              <div class="CL_Alerta_5 Grid_Contenedor">
                <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                  <div class="Grid_Contenedor Base-100 Padding-10">
                    <div class="Grid_Item Base-40">
                      <div ng-click="BL_Imagenes_Portada = true;BL_Imagenes_Perfil = false;Port.URL_Imagen_Portada = ''; FN_Listar_Imagen_Portada()" class="Btn_Estilo_7 icon-file-image">Imagenes de portada</div>
                    </div>
                    <div class="Grid_Item Base-40">
                      <div ng-click="BL_Imagenes_Perfil = true;BL_Imagenes_Portada = false;Port.URL_Imagen_Perfil = '';FN_Listar_Imagen_Perfil()" class="Btn_Estilo_5 icon-file-image">Imagenes de perfil</div>
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
                  <div ng-init="BL_Activar_Edicion = false" ng-if="BL_Imagenes_Perfil == true" class="Tabla_Estilo_3">
                    <table>
                      <thead>
                        <tr>
                          <th class="Imagen"></th>
                          <th>Url de la imagen</th>
                          <th> </th>
                          <th> </th>
                        </tr>
                      </thead>
                      <div class="Grid_Contenedor abcenter CON_Paginacion">
                        <div class="Grid_Contenedor Base-10">
                          <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
                        </div>
                        <div class="Grid_Contenedor Base-20">
                          <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
                        </div>
                        <dir-pagination-controls boundary-links="true" class="Base-60 cross_end Grid_Contenedor">
                          <p class="CL_TXT_Texto_3">{{currentPage}}</p>
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
                        <tr dir-paginate="Imagenes in dato.AOBJ_Imagenes_Perfil_Usuario_Avatars | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                          <td class="CL_Imagen_Grande"><img ng-src="{{Imagenes.URL_Imagen_Usuario}}"/></td>
                          <td class="CL_Tam_Texarea">
                            <textarea ng-disabled="BL_Activar_Edicion == false" ng-model="Imagenes.URL_Imagen_Usuario" class="Textarea_Estilo_1">{{Imagenes.URL_Imagen_Usuario}}</textarea>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                            <div ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion; FN_Modificar_Productos($index);FN_Modificar_Imagen($index,1)" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar </span></div>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-click="FN_Eliminar($index,1)" class="icon-cancelar3 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar </span></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div ng-show="(AOBJ_Imagenes_Perfil_Usuario_Avatars |filter:Buscar:Imagenes.URL_Imagen_Usuario).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                    <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
                      <p>Imagen no encontrada	</p>
                    </div>
                  </div>
                  <div ng-init="BL_Activar_Edicion = false" ng-if="BL_Imagenes_Portada == true" class="Tabla_Estilo_3">
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
                          <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
                        </div>
                        <div class="Grid_Contenedor Base-20">
                          <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
                        </div>
                        <dir-pagination-controls boundary-links="true" class="Base-60 cross_end Grid_Contenedor">
                          <p class="CL_TXT_Texto_3">{{currentPage}}</p>
                          <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                            <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                            <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                            <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                            <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                            <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo; </a></li>
                          </ul>
                        </dir-pagination-controls>
                      </div>
                      <tbody>
                        <tr dir-paginate="Imagenes in dato.AOBJ_Imagenes_Usuario_Fondo_Perfil | filter:Buscar | itemsPerPage: pageSize">
                          <td class="CL_Imagen_Grande"><img ng-src="{{Imagenes.URL_Imagen_Portada}}"/></td>
                          <td class="CL_Tam_Texarea">
                            <textarea ng-disabled="BL_Activar_Edicion == false" ng-model="Imagenes.URL_Imagen_Portada" class="Textarea_Estilo_1">{{Imagenes.URL_Imagen_Portada}}</textarea>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="CL_TXT_Pri_Btn relative icon-lapiz"><span class="CL_TXT_Info_Btn">Editar</span></div>
                            <div ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion; FN_Modificar_Productos($index);FN_Modificar_Imagen($index,2)" class="CL_TXT_Pri_Btn relative icon-actualizar"><span class="CL_TXT_Info_Btn">Actualizar</span></div>
                          </td>
                          <td class="CL_Tbl_Icon">
                            <div ng-click="FN_Eliminar($index,2)" class="CL_TXT_Pri_Btn relative icon-cancelar3"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div ng-show="(AOBJ_Imagenes_Usuario_Fondo_Perfil |filter:Buscar:Imagenes.URL_Imagen_Portada).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                    <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
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