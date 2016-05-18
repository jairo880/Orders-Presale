
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' ||dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Modulo Pedidos</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Pedido/Modulo_Pedido.css"/>
<!--css y scrits propios de la pagina-->
<section id="SC_Contenido_Pagina_Pedido" ng-controller="Controlador_Pedido" ng-init="Listar_Usuarios();FN_Lista_Rutas()">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div class="Tablero_Trabajo_1">
    <div class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Tablero_Trabajo">
      <div ng-init="BL_Ocultar_Barra_Izquierda = false;BL_Ocultar_Barra_Derecha = false" class="Grid_Contenedor Base-100 CL_CONT_Tablero_Trabajo">
        <div ng-class="{Barra_Izquierda_Oculto:BL_Ocultar_Barra_Izquierda == true, BL_Ocultar_Barra_Izquierda:BL_Ocultar_Barra_Derecha == true}" class="Grid_Contenedor Base-40 cross_start CL_CONT_Tablero">
          <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 relative">
            <div class="Grid_Item Base-auto">
              <div class="margin_left-50 CL_TXT_Texto_5 icon-android-checkbox CL_TXT_Gris CL_TXT_Icon_Gris">Pedidos </div>
              <p ng-show="BL_Ocultar_Barra_Derecha == true" ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
              <p ng-show="BL_Ocultar_Barra_Derecha == false " ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
            </div>
          </div>
          <div class="Grid_Contenedor CL_CONT_Buscador_Tablero_Trabajo abcenter">
            <div class="Grid_Contenedor abcenter Base-90">
              <div ng-init="Buscar" class="CL_Contenedor_Buscador">
                <input id="Buscar" maxlength="15" type="search" name="Buscar" placeholder="Buscar" ng-model="Buscar_Usuario" class="CL_Buscar"/>
                <label for="Buscar" class="icon-buscar CL_Icono_Buscar"></label>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1 CL_CONT_Usuarios">
            <div ng-class="{CL_Registro_Base_50:BL_Ocultar_Barra_Izquierda == false, CL_Registro_Base_100:BL_Ocultar_Barra_Derecha == false}" class="Grid_Contenedor CL_Informacion_Tablero_1 cross_start">
              <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
                <p title="Actualizar la lista de usuarios" ng-click="Listar_Usuarios()" class="icon-retweet CL_TXT_Enlace_4"></p>
              </div>
              <div ng-click="FN_Listar_Ordenes_Usuario(Datos_Usuario.PK_ID_Usuario,1)" ng-repeat="Datos_Usuario in AOBJ_Lista_Usuarios_Registrados | filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario" class="Grid_Contenedor Base-90 CL_Informacion_Usuario cross_start ng_repeat_anim1">
                <div class="Grid_Item Base-20 CL_Informacion_Imagen"><img ng-src="{{Datos_Usuario.Imagen_Usuario}}" class="CL_Imagen_Icono_1"/></div>
                <div class="Grid_Item Base-80 CL_Informacion_Datos">
                  <div class="Grid_Contenedor justify">
                    <div class="CL_TXT_Texto_2 CL_TXT_Texto_Bold CL_TXT_Gris Grid_Item Base-40">{{Datos_Usuario.Nombre_Usuario | limitTo : 7 : 0}}..</div>
                    <div class="CL_TXT_Texto_1 CL_TXT_Gris Grid_Item Base-30">{{Datos_Usuario.Disponibilidad}}</div>
                  </div>
                  <div class="CL_TXT_Texto_1 CL_TXT_Gris">{{Datos_Usuario.Correo_Electronico | limitTo : 15 : 0}}..</div>
                </div>
              </div>
              <div ng-show="(AOBJ_Lista_Usuarios_Registrados |filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                  <p>Usuario no encontrado</p>
                </div>
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
              <div class="CL_TXT_Texto_4 CL_TXT_Gris margin_left-50 icon-android-checkbox CL_TXT_Icon_Gris"> </div>
            </div>
          </div>
          <div class="Grid_Contenedor abcenter">
            <div class="Grid_Contenedor Base-95">
              <div ng-show="BL_Pedido_Table == true" class="CL_Alerta_5 Grid_Contenedor">
                <div class="Grid_Item Base-20"><img ng-src="{{Imagen_Usuario_Seleccionado}}" class="CL_Imagen_Icono_1"/></div>
                <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                  <div class="Grid_Item Base-70">
                    <div class="CL_TXT_Texto_3 CL_TXT_Gris">Pedidos de {{Nombre_Usuario_Seleccionado}}</div>
                  </div>
                </div>
                <div ng-click="BL_Pedido_Table = false;Imagen_Usuario_Seleccionado = '';Nombre_Usuario_Seleccionado = ''" class="Grid_Item Base-40 relative">
                  <p ng-show="BL_Pedido_Table == true" class="CL_Eliminar_1_1"></p>
                </div>
              </div>
              <div class="Grid_Contenedor">
                <div ng-show="BL_Pedido_Table == true" class="Tabla_Estilo_1">
                  <table>
                    <thead ng-show="(AOBJ_Lista_Pedidos).length != 0">
                      <tr>
                        <th>Codigo </th>
                        <th>Codigo Cotizacion</th>
                        <th>FK_ID_Usuario</th>
                        <th>Fecha pedido</th>
                        <th>Direccion entrega</th>
                        <th>Fecha cotizacion</th>
                        <th>Estado pedido</th>
                        <th></th>
                        <th> </th>
                      </tr>
                    </thead>
                    <div ng-show="(AOBJ_Lista_Pedidos).length != 0" class="Grid_Contenedor abcenter CON_Paginacion">
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
                          <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;	</a></li>
                        </ul>
                      </dir-pagination-controls>
                    </div>
                    <tbody>
                      <tr dir-paginate="Pedido in AOBJ_Lista_Pedidos | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                        <td>{{Pedido.PK_ID_Pedido}}</td>
                        <td>{{Pedido.FK_ID_Cotizacion_Usuario}}</td>
                        <td>{{Pedido.FK_ID_Usuario}}</td>
                        <td>{{Pedido.Fecha_Pedido}}</td>
                        <td>{{Pedido.Direccion_entrega}}</td>
                        <td>{{Pedido.Fecha_Cotizacion}}</td>
                        <td>
                          <select name="Estado_Pedido" value="Estado_Pedido" ng-model="Pedido.Estado_pedido" class="Select_1 Base-100">
                            <option value="{{Pedido.Estado_pedido}}">{{Pedido.Estado_pedido}}</option>
                            <option ng-if="Pedido.Estado_pedido!= 'Cancelado'" value="Cancelado">Cancelado</option>
                            <option ng-if="Pedido.Estado_pedido != 'Atendido'" value="Atendido">Atendido</option>
                            <option ng-if="Pedido.Estado_pedido != 'En proceso'" value="En proceso">En proceso</option>
                          </select>
                        </td>
                        <td class="CL_Tbl_Icon">
                          <button ng-click="FN_Modificar_Estado_Pedido(Pedido.PK_ID_Pedido)" value="Actualizar" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                          <button ng-click="FN_Listar_Ordenes_Usuario(Pedido.FK_ID_Cotizacion_Usuario,3)" class="icon-eye CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Ver detalles</span></button>
                          <p ng-click="FN_Lista_Rutas();FN_Ver_Pedido_Ruta(Pedido.PK_ID_Pedido)" class="CL_TXT_Pri_Btn relative icon-cancelado"> <span class="CL_TXT_Info_Btn">Asociar ruta</span></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div ng-show="(AOBJ_Lista_Pedidos).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                    <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                      <p>No se han encontrado pedidos del usuario seleccionado</p>
                    </div>
                  </div>
                </div>
              </div>
              <div ng-if="Ver_Detalle_Pedido == true" class="Grid_Contenedor Base-95">
                <div class="CL_Alerta_5 Grid_Contenedor">
                  <div class="Grid_Item Base-20">
                    <p ng-click="FN_Listar_Ordenes_Usuario(Posicion_Usuario_Lista,1)" class="Enlace icon-flecha2 relative left-10"></p>
                  </div>
                  <div class="Grid_Item Base-20"><img ng-src="{{Imagen_Usuario_Seleccionado}}" class="CL_Imagen_Icono_1"/></div>
                  <div class="Grid_Item Base-30 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4 CL_TXT_Gris">{{Nombre_Usuario_Seleccionado}}</div>
                  </div>
                  <div class="Grid_Item Base-20 Grid_Contenedor abcenter">
                    <p class="CL_TXT_Texto_2 CL_TXT_Gris">Codigo de orden: {{Codigo_Orden_Seleccionada}}</p>
                  </div>
                  <div class="Grid_Item Base-10 relative">
                    <p ng-click="FN_Ocultar_Lista_Ordenes(PK_ID_Usuario_Seleccionado)" class="CL_Eliminar_1_1"></p>
                  </div>
                </div>
                <div class="Tabla_Estilo_1">
                  <table>
                    <thead>
                      <tr>
                        <th></th>
                        <th class="CL_TXT_Texto_1 CL_TXT_Gris">Nombre </th>
                        <th class="CL_TXT_Texto_1 CL_TXT_Gris">Precio</th>
                        <th class="CL_TXT_Texto_1 CL_TXT_Gris">Cantidad</th>
                        <th class="CL_TXT_Texto_1 CL_TXT_Gris">Sub total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="Ordenes_Detalle in AOBJ_Lista_Detalles_Ordenes_Enviadas">
                        <td class="CL_Imagen"><img ng-src="{{Ordenes_Detalle.Ruta_Imagen_Producto}}"/></td>
                        <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Nombre_Producto}} </td>
                        <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Valor_Unitario | currency}}</td>
                        <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Cantidad_Productos}}</td>
                        <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Sub_Total | currency}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="CL_Alerta_5 Padding-10">Costo total: {{Num_Total_Orden | currency}}</div>
                </div>
              </div>
              <div ng-show="BL_Pedido_Table == false &amp;&amp; Ver_Detalle_Pedido == false" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                  <p class="icon-bulb2">Selecciona un usuario para ver sus pedidos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section ng-show="BL_Ver_Pedido_Ruta == true" class="SC_Modal_Pedido">
    <div ng-if="BL_Ver_Pedido_Ruta == true" class="Grid_Contenedor CL_Modal_Pedido abcenter">
      <div id="CONT_Invisible" ng-click="FN_Ver_Pedido_Ruta()">
        <div class="CL_Cerrar_Modal"></div>
      </div>
      <div class="Grid_Contenedor CL_Contenido_Pedido Base-100 tablet-70 web-80 Padding_10">
        <div class="border_bottom_1 Grid_Contenedor relative">
          <p ng-click="FN_Ver_Pedido_Ruta()" class="CL_Eliminar_1_1"></p>
        </div>
        <div class="CL_Contenido_Pedido_Datos Grid_Contenedor Base-100 cross_start Padding-10 justify">
          <div class="CL_CONT_Promociones Base-100 Grid_Contenedor cross_start">
            <div class="Grid_Contenedor Base-45 CL_Contenedor_Rutas column CL_Contenedor_Estilo_1">
              <div class="CL_Alerta_5 Padding-5 Grid_Contenedor abcenter">Rutas registradas</div>
              <div class="CL_CONT_Promociones Grid_Contenedor Base-100">
                <div class="Base-100 Grid_Contenedor column">
                  <div ng-repeat="Rutas in AOBJ_Lista_Rutas" class="CL_Promociones_Listadas Grid_Contenedor margin_bottom-5 Padding-10">
                    <div class="Grid_Item Base-auto Grid_Contenedor abcenter"><a ng-click="FN_Registrar_Dll_Ruta_Pedido($index)" class="icon-map-marker CL_TXT_Pri_Btn relative Enlace"><span class="CL_TXT_Info_Btn">Agregar</span></a></div>
                    <div class="Grid_Item Base-auto Grid_Contenedor abcenter">
                      <label class="CL_TXT_Texto_3 CL_TXT_Gris Grid_Contenedor abcenter">{{Rutas.Nombre_Ruta}}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-45 CL_Contenedor_Rutas column CL_Contenedor_Estilo_1">
              <div class="CL_Alerta_5 Padding-5 Grid_Contenedor abcenter">Rutas asociadas al pedido</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>