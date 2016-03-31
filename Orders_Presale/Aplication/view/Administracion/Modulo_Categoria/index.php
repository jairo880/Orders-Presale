
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Categoria</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Categoria/Modulo_Categoria.css"/>
<!--css y scrits propios de la pagina-->
<section id="SC_Registrar_Categoria" ng-controller="Controlador_Registro_Categoria">
  <main id="CONT_Categoria" ng-init="Listar_Categorias()">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div class="Tablero_Trabajo_1">
      <div class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Tablero_Trabajo">
        <div class="Grid_Contenedor Base-90 CL_CONT_Tablero_Trabajo">
          <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
              <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
            </div>
            <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
              <div class="Grid_Contenedor Base-100 CL_Informacion_Tablero_1 cross_start">
                <div class="Grid_Contenedor Base-90 abcenter">
                  <div class="Grid_Contenedor Base-100 Padding-10 main_end cross_end">
                    <div class="Grid_Contenedor abcenter Base-100">
                      <p class="ng_show CL_TXT_Texto_4">Registrar categoria</p>
                    </div>
                  </div>
                  <form id="FORM_Registro_Categoria" name="Form_Registro_Categoria" ng-submit="FN_Registrar_Categoria(RC)" class="Grid_Contenedor main_start Base-100 ng_show column">
                    <div class="Grid_Contenedor abcenter Base-100">
                      <p class="CL_Icono_1">{{ RC.Nombre_Categoria | limitTo : 1 : 0}}</p>
                    </div>
                    <div class="Grid_Contenedor Base-100 column">
                      <label for="#Nombre_Categoria" class="CL_TXT_Texto_3">Nombre de la categoria</label>
                      <input id="Nombre_Categoria" maxlength="30" minlength="6" type="text" name="Nombre_Categoria" ng-model="RC.Nombre_Categoria" placeholder="Ingresa el nombre de la categoria" required="required" class="Input_Estilo_1"/>
                      <!--Mensaje de validacion-->
                      <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.$pristine &amp;&amp; Form_Registro_Categoria.Nombre_Categoria.$error.required ">
                        <p class="icon-login">Ingresa un nombre para la categoria</p>
                      </div>
                      <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.Nombre_Categoria.$valid &amp;&amp; !Form_Registro_Categoria.$pristine &amp;&amp; !Form_Registro_Categoria.Nombre_Categoria.$error.required">
                        <p class="icon-login">La cantidad de caracteres es muy corta</p>
                      </div>
                      <label for="#Descripcion" class="CL_TXT_Texto_3">Descripcion</label>
                      <textarea id="Descripcion" minlength="10" maxlength="100" type="text" name="Descripcion" ng-model="RC.Descripcion" placeholder="Ingrese la Descripcion de la categoria" required="required" class="Textarea_Estilo_1"></textarea>
                      <!--Mensaje de validacion-->
                      <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.$pristine &amp;&amp; Form_Registro_Categoria.Descripcion.$error.required ">
                        <p class="icon-login">Ingresa una descripci&oacute;n para la categoria</p>
                      </div>
                      <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.Descripcion.$valid &amp;&amp; !Form_Registro_Categoria.$pristine &amp;&amp; !Form_Registro_Categoria.Descripcion.$error.required">
                        <p class="icon-login">La cantidad de caracteres es muy corta</p>
                      </div>
                    </div>
                    <div class="Grid_Contenedor Padding-10 justify Base-100">
                      <input id="submit" type="submit" ng-disabled="!Form_Registro_Categoria.$valid" value="Registrar" class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar</a>
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
                <div class="CL_TXT_Texto_4">Categorias registradas</div>
              </div>
            </div>
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Contenedor Base-100">
                <div class="CL_Alerta_5 Grid_Contenedor Padding-5">
                  <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                    <div ng-click="Listar_Categorias()" class="Btn_Estilo_5">Consultar categorias </div>
                  </div>
                  <div class="Base-50 abcenter Grid_Contenedor">
                    <div class="CL_Contenedor_Buscador">
                      <input id="BuscarCategoria" type="text" name="" placeholder="Buscar categoria" ng-model="Buscar" class="CL_Buscar"/>
                      <label for="BuscarCategoria" class="icon-buscar CL_Icono_Buscar"></label>
                    </div>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Contenedor Base-90 abcenter Padding-10">
                    <form name="Form_Categoria" class="Grid_Contenedor abcenter">
                      <div class="Tabla_Estilo_3 relative Grid_Item Base-100">
                        <table>
                          <thead>
                            <tr>
                              <th class="Imagen"></th>
                              <th>Nombre</th>
                              <th>Descripcion</th>
                              <th class="CL_Tbl_Icon"> </th>
                              <th class="CL_Tbl_Icon"></th>
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
                                <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                              </ul>
                            </dir-pagination-controls>
                          </div>
                          <tbody ng-init="BL_Edicion_Datos = false">
                            <tr dir-paginate="Categoria in AOBJ_Lista_Categorias_Registradas | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                              <td class="Imagen">
                                <p class="CL_Icono_1">{{ Categoria.Nombre_Categoria | limitTo : 1 : 0}}</p>
                              </td>
                              <td class="CL_Tam_Texarea">
                                <textarea maxlength="30" minlength="6" type="text" name="Nombre_Categoria{{$index}}" ng-model="Categoria.Nombre_Categoria" ng-disabled="BL_Edicion_Datos == false" required="required" class="Textarea_Estilo_1"></textarea>
                                <!--Mensaje de validacion-->
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Categoria.$pristine &amp;&amp; Form_Categoria.Nombre_Categoria{{$index}}.$error.required">
                                  <p class="icon-key">Ingresa un descripcion</p>
                                </div>
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Categoria.Nombre_Categoria{{$index}}.$valid &amp;&amp; !Form_Categoria.$pristine &amp;&amp; !Form_Categoria.Nombre_Categoria{{$index}}.$error.required ">
                                  <p class="icon-login">La cantidad de caracteres es muy corta</p>
                                </div>
                              </td>
                              <td class="CL_Tam_Texarea">
                                <textarea minlength="10" maxlength="100" name="Descripcion{{$index}}" ng-model="Categoria.Descripcion" ng-disabled="BL_Edicion_Datos == false" required="required" class="Textarea_Estilo_1"></textarea>
                                <!--Mensaje de validacion-->
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Categoria.$pristine &amp;&amp; Form_Categoria.Descripcion{{$index}}.$error.required">
                                  <p class="icon-key">Ingresa un descripcion</p>
                                </div>
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Categoria.Descripcion{{$index}}.$valid &amp;&amp; !Form_Categoria.$pristine &amp;&amp; !Form_Categoria.Descripcion{{$index}}.$error.required ">
                                  <p class="icon-login">La cantidad de caracteres es muy corta</p>
                                </div>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <button ng-disabled="!Form_Categoria.$valid" ng-class="{Invisible:BL_Edicion_Datos == false, Visible: BL_Edicion_Datos == true}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos; FN_Modificar_Datos_Categoria($index)" value="Actualizar" class="CL_TXT_Pri_Btn relative icon-actualizar"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                                <div ng-class="{Invisible:BL_Edicion_Datos == true, Visible: BL_Edicion_Datos == false}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar </span></div>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <div ng-click="FN_Eliminar_Categoria($index)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div ng-show="(AOBJ_Lista_Categorias_Registradas |filter:Buscar:Categoria.Nombre_Categoria).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                        <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
                          <p>Categoria no encontrada</p>
                        </div>
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