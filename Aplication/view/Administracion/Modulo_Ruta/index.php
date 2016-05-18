
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Registro de usuario</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Ruta/Modulo_Ruta.css"/>
<section id="SC_Registrar_Ruta" ng-controller="Controlador_Registro_Ruta">
  <main id="CONT_Ruta" ng-init="FN_Consultar_Rutas();FN_Listar_Empleados()">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div class="Tablero_Trabajo_1">
      <div class="Grid_Contenedor Base-95 abcenter CL_CONT_Principal_Tablero_Trabajo">
        <div class="Grid_Contenedor Base-100 CL_CONT_Tablero_Trabajo">
          <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
              <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
            </div>
            <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
              <div class="Grid_Contenedor Base-100 CL_Informacion_Tablero_1 cross_start">
                <div class="Grid_Contenedor Base-90 abcenter">
                  <div class="Grid_Contenedor Base-100 Padding-10 main_end cross_end">
                    <div class="Grid_Contenedor abcenter Base-100">
                      <p class="ng_show CL_TXT_Texto_4 CL_TXT_Gris">Registrar Ruta</p>
                    </div>
                  </div>
                  <form id="FORM_Registro_ruta" name="Form_Registro_Ruta" ng-submit="FN_Registrar_Ruta(RR)" class="Grid_Contenedor main_start Base-100 ng_show column">
                    <div class="Grid_Contenedor abcenter Base-100">
                      <p class="CL_Icono_1">{{ RR.Nombre_Ruta | limitTo : 1 : 0}}</p>
                    </div>
                    <div class="Grid_Contenedor Base-100 column">
                      <label for="#Nombre_Ruta" class="CL_TXT_Texto_3">Nombre de la ruta</label>
                      <input id="Nombre_Ruta" maxlength="30" minlength="3" type="text" name="Nombre_Ruta" ng-model="RR.Nombre_Ruta" placeholder="Ingresa el nombre de la ruta" required="required" class="Input_Estilo_1"/>
                      <label for="#Nombre_Ruta" class="CL_TXT_Texto_3">Asignar empleado distribuidor </label>
                      <select ng-model="RR.Empleado" name="Empleado" value="Empleado" required="required" class="Select_1 Base-100">
                        <option value="{{Empleado.PK_ID_Usuario}}" ng-repeat="Empleado in AOBJ_Lista_Empleados">{{Empleado.Nombre_Usuario}}</option>
                      </select>
                    </div>
                    <div class="Grid_Contenedor Padding-10 justify Base-100">
                      <input id="submit" type="submit" ng-disabled="!Form_Registro_Ruta.$valid" value="Registrar" class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor Base-70 cross_start CL_CONT_Tablero_Trabajo_2">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
              <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_4 CL_TXT_Gris">Rutas registradas</div>
              </div>
            </div>
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Contenedor Base-100">
                <div class="CL_Alerta_5 Grid_Contenedor Padding-5">
                  <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                    <div ng-click="FN_Consultar_Rutas()" class="Btn_Estilo_5">Consultar rutas </div>
                  </div>
                  <div class="Base-50 abcenter Grid_Contenedor">
                    <div class="CL_Contenedor_Buscador">
                      <input id="BuscarCategoria" type="text" name="" placeholder="Buscar ruta" ng-model="Buscar" class="CL_Buscar"/>
                      <label for="BuscarCategoria" class="icon-buscar CL_Icono_Buscar"></label>
                    </div>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Contenedor Base-90 abcenter Padding-10">
                    <form name="Form_Categoria" class="Grid_Contenedor abcenter">
                      <div class="Tabla_Estilo_2 relative Grid_Item Base-100">
                        <table>
                          <thead>
                            <tr>
                              <th> </th>
                              <th>Codigo</th>
                              <th>Ruta</th>
                              <th>Distribuidor asignado</th>
                              <th class="CL_Tbl_Icon"> </th>
                              <th class="CL_Tbl_Icon"></th>
                            </tr>
                          </thead>
                          <div class="Grid_Contenedor abcenter CON_Paginacion">
                            <div class="Grid_Contenedor Base-10">
                              <p class="CL_TXT_Texto_2 CL_TXT_Gris">Pag&iacute;na: {{currentPage}}</p>
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
                                <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                              </ul>
                            </dir-pagination-controls>
                          </div>
                          <tbody ng-init="BL_Edicion_Datos = false">
                            <tr dir-paginate="Ruta in AOBJ_Lista_Rutas_Registradas | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                              <td class="Imagen">
                                <p class="CL_Icono_1">{{ Ruta.Nombre_Ruta | limitTo : 1 : 0}}</p>
                              </td>
                              <td>{{Ruta.PK_ID_Ruta }}</td>
                              <td class="CL_Tam_Texarea">
                                <textarea maxlength="30" minlength="6" type="text" name="	Nombre_Ruta{{$index}}" ng-model="Ruta.Nombre_Ruta" ng-disabled="BL_Edicion_Datos == false" required="required" class="Textarea_Estilo_1"></textarea>
                              </td>
                              <td>{{Ruta.	Nombre_Usuario}}	</td>
                              <td class="CL_Tbl_Icon">
                                <button ng-disabled="!Form_Categoria.$valid" ng-class="{Invisible:BL_Edicion_Datos == false, Visible: BL_Edicion_Datos == true}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos; FN_Modificar_Datos_Categoria(Categoria.PK_ID_Categoria)" value="Actualizar" class="CL_TXT_Pri_Btn relative icon-actualizar"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                                <div ng-class="{Invisible:BL_Edicion_Datos == true, Visible: BL_Edicion_Datos == false}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar </span></div>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <div ng-click="FN_Eliminar_Ruta()Ruta.PK_ID_Ruta)" class="icon-cancelar2 CL_TXT_Pri_Btn relative">		</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </form>
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