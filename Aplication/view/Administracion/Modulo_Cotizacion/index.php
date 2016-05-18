
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' ||dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Cotizaci&oacute;n</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Cotizacion/Modulo_Cotizacion.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Gestion_De_Contenido" ng-controller="Controlador_Cotizacion" class="Grid_Contenedor">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div class="Grid_Contenedor Base-95 abcenter CL_CONT_Principal_Cotizacion">
    <div ng-init="Listar_Usuarios()" class="Grid_Contenedor Base-100 CL_CONT_Tablero_Cotizacion">
      <div ng-init="BL_Ocultar_Barra_Izquierda = false;BL_Ocultar_Barra_Derecha = false" ng-class="{Barra_Izquierda_Oculto:BL_Ocultar_Barra_Izquierda == true, BL_Ocultar_Barra_Izquierda:BL_Ocultar_Barra_Derecha == true}" class="Grid_Contenedor Base-40 cross_start CL_CONT_Cotizacion_Usuarios">
        <div class="CL_Cabezera_Cotizacion Grid_Contenedor Base-100 relative">
          <div class="Grid_Item Base-auto">
            <div class="margin_left-50 CL_TXT_Texto_5 icon-android-checkbox-blank CL_TXT_Gris CL_TXT_Icon_Gris">Cotizaciones</div>
            <p ng-show="BL_Ocultar_Barra_Derecha == true" ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
            <p ng-show="BL_Ocultar_Barra_Derecha == false " ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
          </div>
        </div>
        <div class="Grid_Contenedor CL_CONT_Buscador_Usuarios abcenter">
          <div class="Grid_Contenedor abcenter Base-90">
            <div ng-init="Buscar_Usuario" class="CL_Contenedor_Buscador">
              <input id="Buscar_Usuario" maxlength="15" type="search" name="Buscar_Usuario" placeholder="Buscar usuario" ng-model="Buscar_Usuario" class="CL_Buscar"/>
              <label for="Buscar_Usuario" class="icon-buscar CL_Icono_Buscar"></label>
            </div>
          </div>
        </div>
        <div ng-class="{CL_Registro_Base_50:BL_Ocultar_Barra_Izquierda == false, CL_Registro_Base_100:BL_Ocultar_Barra_Derecha == false}" class="Grid_Contenedor cross_start CL_CONT_Usuarios">
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
      <div ng-class="{Barra_Derecho_Oculto:BL_Ocultar_Barra_Derecha == true,Barra_Derecho_Desplegado: BL_Ocultar_Barra_Izquierda == true}" class="Grid_Contenedor Base-60 cross_start CL_CONT_Cotizacion_Tablero_Cotizaciones">
        <div class="CL_Cabezera_Cotizacion Grid_Contenedor Base-100">
          <div class="Grid_Item Base-100 Grid_Contenedor abcenter relative">
            <p ng-show="BL_Ocultar_Barra_Izquierda == true" ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
            <p ng-show="BL_Ocultar_Barra_Izquierda == false " ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
            <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
              <div class="CL_TXT_Texto_4 CL_TXT_Gris margin_left-50 icon-android-checkbox-blank CL_TXT_Icon_Gris"></div>
            </div>
          </div>
        </div>
        <div class="Grid_Contenedor abcenter">
          <div ng-show="Ver_Ordenes == true" class="Grid_Contenedor Base-95">
            <div class="CL_Alerta_5 Grid_Contenedor">
              <div class="Grid_Item Base-20"><img ng-src="{{Imagen_Usuario_Seleccionado}}" class="CL_Imagen_Icono_1"/></div>
              <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris">Cotizaciones de {{Nombre_Usuario_Seleccionado}}</div>
              </div>
              <div class="Grid_Item Base-40 relative">
                <p ng-click="FN_Ocultar_Lista_Ordenes()" class="CL_Eliminar_1_1"></p>
              </div>
            </div>
            <div class="Tabla_Estilo_1">
              <table>
                <thead ng-show="(AOBJ_Lista_Ordenes_Enviadas).length != 0">
                  <tr>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Codigo </th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Fecha de envio</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Dirrección</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Telefono</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Estado de la orden</th>
                    <th class="CL_Tbl_Icon"></th>
                  </tr>
                </thead>
                <div ng-show="(AOBJ_Lista_Ordenes_Enviadas).length != 0" class="Grid_Contenedor abcenter CON_Paginacion">
                  <div class="Grid_Contenedor Base-10">
                    <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
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
                      <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;		</a></li>
                    </ul>
                  </dir-pagination-controls>
                </div>
                <tbody>
                  <tr dir-paginate="Ordenes_Enviadas in AOBJ_Lista_Ordenes_Enviadas | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris CL_Imagen">{{Ordenes_Enviadas.PK_ID_Cotizacion_Usuario }}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Enviadas.Fecha_Cotizacion}}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Enviadas.Direccion_entrega}}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Enviadas.Telefono_Entrega}}</td>
                    <td>
                      <select name="Estado_Orden" value="Estado_Orden" ng-model="Ordenes_Enviadas.Estado_Cotizacion" class="Select_1 Base-100">
                        <option value="{{Ordenes_Enviadas.Estado_Cotizacion}}">{{Ordenes_Enviadas.Estado_Cotizacion}}</option>
                        <option ng-if="Ordenes_Enviadas.Estado_Cotizacion != 'Cancelado'" value="Cancelado">Cancelado</option>
                        <option ng-if="Ordenes_Enviadas.Estado_Cotizacion != 'Atendido'" value="Atendido">Atendido</option>
                        <option ng-if="Ordenes_Enviadas.Estado_Cotizacion != 'En proceso'" value="En proceso">En proceso</option>
                      </select>
                    </td>
                    <td class="CL_Tbl_Icon">
                      <button ng-click="FN_Actualizar_Estado_Orden(Ordenes_Enviadas.PK_ID_Cotizacion_Usuario)" value="Actualizar" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                      <button ng-click="FN_Listar_Ordenes_Usuario(Ordenes_Enviadas.PK_ID_Cotizacion_Usuario,2)" class="icon-eye CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Ver detalles</span></button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div ng-show="(AOBJ_Lista_Ordenes_Enviadas).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                  <p>No se han encontrado ordenes del usuario seleccionado</p>
                </div>
              </div>
            </div>
          </div>
          <div ng-show="Ver_Detalle_Orden == true" class="Grid_Contenedor Base-95">
            <div class="CL_Alerta_5 Grid_Contenedor">
              <div class="Grid_Item Base-20">
                <p ng-click="FN_Listar_Ordenes_Usuario(Posicion_Usuario_Lista,1)" class="Enlace icon-flecha2 relative left-10"></p>
              </div>
              <div class="Grid_Item Base-20"><img ng-src="{{Imagen_Usuario_Seleccionado}}" class="CL_Imagen_Icono_1"/></div>
              <div class="Grid_Item Base-30 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_4 CL_TXT_Gris">{{Nombre_Usuario_Seleccionado}}</div>
              </div>
              <div class="Grid_Item Base-20 Grid_Contenedor abcenter">
                <p class="CL_TXT_Texto_2">Codigo de orden: {{AOBJ_Lista_Ordenes_Enviadas[Posicion_Orden_Lista].PK_ID_Cotizacion_Usuario}}</p>
              </div>
              <div class="Grid_Item Base-10 relative">
                <p ng-click="FN_Ocultar_Lista_Ordenes()" class="CL_Eliminar_1_1"></p>
              </div>
            </div>
            <div class="Tabla_Estilo_1">
              <table>
                <thead>
                  <tr>
                    <th> </th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Nombre</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Precio</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Cantidad</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Sub total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="Ordenes_Detalle in AOBJ_Lista_Detalles_Ordenes_Enviadas">
                    <td class="CL_Imagen"><img ng-src="{{Ordenes_Detalle.Ruta_Imagen_Producto}}"/></td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Nombre_Producto}}  </td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Valor_Unitario | currency}}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Cantidad_Productos}}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Sub_Total | currency}}</td>
                  </tr>
                </tbody>
              </table>
              <div class="CL_Alerta_5 Padding-10">Costo total: {{Num_Total_Orden | currency}}</div>
            </div>
          </div>
          <div ng-show="Ver_Tablero_Vacio == true" class="CL_Alerta_5 Grid_Contenedor abcenter">
            <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
              <p class="icon-bulb2">Selecciona un usuario para ver sus ordenes enviadas																				</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>