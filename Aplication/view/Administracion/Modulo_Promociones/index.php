
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Promociones </title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Promociones/Modulo_Promociones.css"/>
<section id="SC_Consultar_Usuarios" ng-controller="Controlador_Consultar_Promociones">
  <div id="CONT_Contenedor_Invisible_Header" ng-init="Consultar_Promociones()"></div>
  <div id="CONT_Consultar_Usuarios">
    <div class="Tablero_Trabajo_1">
      <div class="Grid_Contenedor Base-95 abcenter CL_CONT_Principal_Tablero_Trabajo">
        <div ng-init="BL_Ocultar_Barra_Izquierda = false;BL_Ocultar_Barra_Derecha = false" class="Grid_Contenedor Base-100 CL_CONT_Tablero_Trabajo">
          <div ng-class="{Barra_Izquierda_Oculto:BL_Ocultar_Barra_Izquierda == true, BL_Ocultar_Barra_Izquierda:BL_Ocultar_Barra_Derecha == true}" class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 relative">
              <div class="Grid_Item Base-auto">
                <div class="margin_left-50 CL_TXT_Texto_5 icon-megaphone-1 CL_TXT_Gris CL_TXT_Icon_Gris">Promociones</div>
                <p ng-show="BL_Ocultar_Barra_Derecha == true" ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
                <p ng-show="BL_Ocultar_Barra_Derecha == false " ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
              </div>
            </div>
            <div class="Grid_Contenedor CL_CONT_Buscador_Tablero_Trabajo abcenter"></div>
            <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
              <div class="Grid_Contenedor Base-100 CL_Informacion_Tablero_1 cross_start">
                <div class="Grid_Contenedor Base-100 abcenter ng_show">
                  <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                    <form id="FORM_Registro" ng-class="{CL_Registro_Base_50:BL_Ocultar_Barra_Izquierda == false, CL_Registro_Base_100:BL_Ocultar_Barra_Derecha == false}" name="Form_Registro_Promocion" ng-submit="Registrar_Promocion(RP)" class="Grid_Contenedor">
                      <div class="Grid_Contenedor abcenter Base-100">
                        <p class="CL_Icono_3">{{ RP.Nombre_Promocion | limitTo : 1 : 0}}</p>
                      </div>
                      <div class="Grid_Item Base-100">
                        <label for="Nombre_Promocion" class="CL_TXT_Texto_2 CL_TXT_Gris">Nombre promoci&oacute;n</label>
                        <input id="Nombre_Promocion" maxlength="45" minlength="5" type="text" name="Nombre_Promocion" ng-model="RP.Nombre_Promocion" placeholder="Nombre" required="required" class="Input_Estilo_1"/>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Nombre_Promocion.$error.required">
                          <p class="icon-alerta1">Este campo es obligatorio</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.Nombre_Promocion.$valid &amp;&amp; !Form_Registro_Promocion.$pristine &amp;&amp; !Form_Registro_Promocion.Nombre_Promocion.$error.required">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                        <label for="Descripcion_Producto" class="CL_TXT_Texto_2 CL_TXT_Gris">Descripción</label>
                        <textarea id="Descripcion_Promocion" maxlength="50" minlength="15" type="text" name="Descripcion_Promocion" ng-model="RP.Descripcion_Promocion" placeholder="En que consiste la promocion" required="required" class="Textarea_Estilo_1"></textarea>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Descripcion_Promocion.$error.required">
                          <p class="icon-alerta1">Este campo es obligatorio</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.Descripcion_Promocion.$valid &amp;&amp; !Form_Registro_Promocion.$pristine &amp;&amp; !Form_Registro_Promocion.Descripcion_Promocion.$error.required">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                      </div>
                      <div class="Grid_Item Base-100">
                        <label for="Fecha_Inicio" class="CL_TXT_Texto_2 CL_TXT_Gris">Fecha de inicio promocion</label>
                        <input id="Fecha_Inicio" ng-init="RP.Fecha_Inicio = Fecha_Actual " name="Fecha_Inicio" type="text" placeholder="año/mes/día" ng-model="RP.Fecha_Inicio | date:'yyyy-MM-dd'" required="required" value="{{RP.Fecha_Inicio | date:'yyyy-MM-dd'}}" class="Input_Estilo_1"/>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Fecha_Inicio.$error.required">
                          <p class="icon-alerta1">Este campo es obligatorio</p>
                        </div>
                        <label for="Dias_Duracion" class="CL_TXT_Texto_2 CL_TXT_Gris">D&iacute;as de duraci&oacute;n </label>
                        <input id="Dias_Duracion" maxlength="31" minlength="1" name="Dias_Duracion" type="number" placeholder="Ingresa una cantidad" ng-model="RP.Dias_Duracion" required="required" class="Input_Estilo_1"/>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Dias_Duracion.$error.required">
                          <p class="icon-alerta1">Este campo es obligatorio</p>
                        </div>
                        <div class="CL_Alerta_5 Padding-5">URL de la imagen
                          <input id="Imagen_Producto" maxlength="100" minlength="10" type="url" name="Imagen_Promocion" ng-model="RP.Imagen_Promocion" placeholder="URL" required="required" class="Input_Estilo_1"/>
                          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Imagen_Promocion.$error.required">
                            <p class="icon-exclamation">Este campo es obligatorio</p>
                          </div>
                          <div class="CL_Imagen_Producto_URL Grid_Contenedor Base-100 abcenter"><img ng-src="{{RP.Imagen_Promocion }}"/>
                            <div ng-show="RP.Imagen_Promocion == null" class="Icon_Imagen icon-image"></div>
                          </div>
                        </div>
                      </div>
                      <div class="Grid_Contenedor Grid_Item abcenter Padding-30 justify">
                        <div class="Grid_Item Base-50">
                          <input id="submit" type="submit" value="Registrar" ng-disabled="!Form_Registro_Promocion.$valid " class="Btn_Estilo_1"/>
                        </div>
                        <div class="Grid_Item Base-50"><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar</a></div>
                      </div>
                    </form>
                  </div>
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
          <div ng-class="{Barra_Derecho_Oculto:BL_Ocultar_Barra_Derecha == true,Barra_Derecho_Desplegado: BL_Ocultar_Barra_Izquierda == true}" class="Grid_Contenedor Base-70 cross_start CL_CONT_Tablero_Trabajo_2">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 border_bottom_1">
              <div class="Grid_Item Base-100 Grid_Contenedor abcenter relative">
                <p ng-show="BL_Ocultar_Barra_Izquierda == true" ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
                <p ng-show="BL_Ocultar_Barra_Izquierda == false " ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
              </div>
              <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_4 CL_TXT_Gris icon-megaphone-1 margin_left-50 CL_TXT_Icon_Gris"></div>
              </div>
            </div>
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Contenedor Base-100">
                <div class="CL_Alerta_5 Grid_Contenedor Padding-5">
                  <div class="Grid_Item Base-50">
                    <button ng-click="Consultar_Promociones()" class="Btn_Estilo_5">Consultar promociones</button>
                  </div>
                  <div class="Grid_Contenedor abcenter Base-30">
                    <div class="CL_Contenedor_Buscador">
                      <input id="BuscarPromocion" type="text" name="" placeholder="Buscar promocion" ng-model="Buscar" class="CL_Buscar"/>
                      <label for="BuscarPromocion" class="icon-buscar CL_Icono_Buscar"> </label>
                    </div>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Contenedor Base-100 abcenter ng_show">
                    <form name="Form_Promocion" class="Grid_Contenedor abcenter">
                      <div class="Tabla_Estilo_1 relative Grid_Item Base-95">
                        <table>
                          <thead>
                            <tr>
                              <th class="Imagen Invisible Visible-tablet">							</th>
                              <th>Nombre </th>
                              <th>Descripci&oacute;n</th>
                              <th>Fecha inicial</th>
                              <th>Dias duraci&oacute;n </th>
                              <th>Fecha finalizaci&oacute;n</th>
                              <th></th>
                              <th></th>
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
                            <dir-pagination-controls boundary-links="true" class="Base-45 cross_end Grid_Contenedor">
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
                          <tbody ng-init="BL_Activar_Edicion=false; BL_ActivarBTN_Modificar=false">
                            <tr dir-paginate="Promociones in AOBJ_Consultar_Promociones | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                              <td class="Imagen Invisible Visible-tablet">
                                <p class="CL_Icono_3">{{ Promociones.Nombre_Promocion | limitTo : 1 : 0}}</p>
                              </td>
                              <td>
                                <input name="Nombre_Promocion{{$index}}" type="text" ng-model="Promociones.Nombre_Promocion" ng-disabled="BL_Activar_Edicion == false" maxlength="45" minlength="5" required="required" class="Input_Tabla"/>
                                <!--Mensaje de validacion-->
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.$pristine &amp;&amp; Form_Promocion.Nombre_Promocion{{$index}}.$error.required ">
                                  <p class="icon-megaphone">Ingresa un nombre para la Promoci&oacute;n</p>
                                </div>
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.Nombre_Promocion{{$index}}.$valid &amp;&amp; !Form_Promocion.$pristine &amp;&amp; !Form_Promocion.Nombre_Promocion{{$index}}.$error.required">
                                  <p class="icon-megaphone">La cantidad de caracteres es muy corta</p>
                                </div>
                              </td>
                              <td class="CL_Tam_Texarea">
                                <textarea name="Descripcion{{$index}}" type="text" ng-model="Promociones.Descripcion" ng-disabled="BL_Activar_Edicion == false" maxlength="50" minlength="15" required="required" class="Textarea_Estilo_1"></textarea>
                                <!--Mensaje de validacion-->
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.$pristine &amp;&amp; Form_Promocion.Descripcion{{$index}}.$error.required ">
                                  <p class="icon-megaphone">Ingresa un nombre para la descripci&oacute;n</p>
                                </div>
                                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.Descripcion{{$index}}.$valid &amp;&amp; !Form_Promocion.$pristine &amp;&amp; !Form_Promocion.Descripcion{{$index}}.$error.required">
                                  <p class="icon-megaphone">La cantidad de caracteres es muy corta</p>
                                </div>
                              </td>
                              <td>
                                <input type="text" ng-model="Promociones.Fecha_Inicio" ng-disabled="BL_Activar_Edicion == false" class="Input_Tabla"/>
                              </td>
                              <td>
                                <input type="number" data-ng-model="Promociones.Dias_Duracion" numericbinding="numericbinding" ng-disabled="BL_Activar_Edicion == false" class="Input_Tabla"/>
                              </td>
                              <td>
                                <input type="text" ng-model="Promociones.Fecha_Finalizacion" ng-disabled="BL_Activar_Edicion == false" class="Input_Tabla"/>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <div ng-class="{Invisible:BL_ActivarBTN_Modificar == true, Visible: BL_ActivarBTN_Modificar == false}" ng-click="BL_ActivarBTN_Modificar =! BL_ActivarBTN_Modificar;BL_Activar_Edicion =!BL_Activar_Edicion" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                                <button ng-disabled="!Form_Promocion.$valid" ng-class="{Invisible:BL_ActivarBTN_Modificar == false, Visible: BL_ActivarBTN_Modificar == true}" ng-click="FN_Modificar_Promociones(Promociones.PK_ID_Promocion);BL_ActivarBTN_Modificar =! BL_ActivarBTN_Modificar;BL_Activar_Edicion =! BL_Activar_Edicion" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <div ng-click="FN_Enviar_Promociones()" class="icon-enviar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Enviar</span></div>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <div ng-click="FN_Eliminar_Promociones(Promociones.PK_ID_Promocion)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div ng-show="(AOBJ_Consultar_Promociones |filter:Buscar).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                          <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                            <p>Promoci&oacute;n no encontrada</p>
                          </div>
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
  </div>
</section>