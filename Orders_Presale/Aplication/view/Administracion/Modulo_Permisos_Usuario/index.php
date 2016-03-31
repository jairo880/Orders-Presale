
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Gestion de permisos de los usuarios</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Permisos_Usuario/Modulo_Permisos_Usuario.css"/>
<!--sesion Estructura-->
<section id="SC_Modulo_Permisos_Usuario">
  <main id="CONT_Modulo_Permisos_Usuario" ng-init="FN_Listar_Modulo_Permisos_Usuario(1);FN_Listar_Roles_Usuarios()">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div ng-init="BL_Vistas = 1" class="Grid_Contenedor Base-100"></div>
    <div class="Tablero_Trabajo_1">		
      <div class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Tablero_Trabajo">
        <div class="Grid_Contenedor Base-90 CL_CONT_Tablero_Trabajo">
          <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
              <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
            </div>
            <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
              <div class="Grid_Contenedor Base-90 CL_Informacion_Tablero_1 cross_start">
                <div class="Grid_Contenedor Base-100">
                  <div class="CL_TXT_Texto_4 Grid_Contenedor abcenter">Registrar nueva vista</div>
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
                <div class="CL_TXT_Texto_4">Gestion de permisos para usuarios</div>
              </div>
            </div>
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Contenedor Base-95">
                <div class="CL_Alerta_5 Grid_Contenedor">
                  <div class="Grid_Item Base-30 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_3">Vistas registradas</div>
                  </div>
                  <div class="Base-30 abcenter Grid_Contenedor">
                    <div class="CL_Contenedor_Buscador">
                      <input id="BuscarPermiso" type="text" name="" placeholder="Buscar permiso" ng-model="Buscar" class="CL_Buscar"/>
                      <label for="BuscarPermiso" class="icon-buscar CL_Icono_Buscar"></label>
                    </div>
                  </div>
                  <div class="Gri_Item Base-30">
                    <select class="Select_1">
                      <option ng-click="FN_Listar_Modulo_Permisos_Usuario(Rol.PK_ID_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">Vistas {{Rol.Nombre_Rol}} </option>
                    </select>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Contenedor Base-100 CL_Tabla_Permisos">
                    <div class="Tabla_Estilo_2">
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
                        <div class="Grid_Contenedor abcenter CON_Paginacion">
                          <div class="Grid_Contenedor Base-10">
                            <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
                          </div>
                          <div class="Grid_Contenedor Base-20">
                            <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
                          </div>
                          <dir-pagination-controls boundary-links="true" class="Base-45 cross_end Grid_Contenedor">
                            <p class="CL_TXT_Texto_3">{{currentPage}}</p>
                            <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                              <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                              <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                              <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                              <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                              <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;		</a></li>
                            </ul>
                          </dir-pagination-controls>
                        </div>
                        <tbody ng-init="BL_Edicion_Datos = false">
                          <tr dir-paginate="Permisos in AOBJ_Lista_Permisos_Usuario | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
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
                    <div ng-show="(AOBJ_Lista_Permisos_Usuario |filter:Buscar:Permisos.Nombre_Vista).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                      <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
                        <p>Permiso no encontrada</p>
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
</section>