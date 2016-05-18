
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Inicio/Inicio.css"/>
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Cuerpo para formularios y listados</title>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Gestion_De_Contenido" class="Grid_Contenedor">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div ng-controller="Controlador_Consultar_Usuarios" class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Cotizacion">
    <div ng-init="Listar_Usuarios()" class="Grid_Contenedor Base-90 CL_CONT_Tablero_Cotizacion">
      <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Cotizacion_Usuarios">
        <div class="CL_Cabezera_Cotizacion Grid_Contenedor Base-100">
          <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
        </div>
        <div class="Grid_Contenedor CL_CONT_Buscador_Usuarios abcenter">
          <div class="Grid_Contenedor abcenter Base-90">
            <div ng-init="Buscar_Usuario" class="CL_Contenedor_Buscador">
              <input id="Buscar_Usuario" maxlength="15" type="search" name="Buscar_Usuario" placeholder="Buscar usuario" ng-model="Buscar_Usuario" class="CL_Buscar"/>
              <label for="Buscar_Usuario" class="icon-buscar CL_Icono_Buscar"></label>
            </div>
          </div>
        </div>
        <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Usuarios">
          <div ng-click="FN_Listar_Ordenes_Usuario($index,1)" ng-repeat="Datos_Usuario in AOBJ_Lista_Usuarios_Registrados | filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario" class="Grid_Contenedor Base-90 CL_Informacion_Usuario cross_start">
            <div class="Grid_Item Base-30 CL_Informacion_Imagen"><img ng-src="{{Datos_Usuario.Imagen_Usuario}}" class="CL_Imagen_Icono_1"/></div>
            <div class="Grid_Item Base-70 CL_Informacion_Datos">
              <div class="Grid_Contenedor justify">
                <div class="CL_TXT_Texto_3 CL_TXT_Gris Grid_Item Base-40">{{Datos_Usuario.Nombre_Usuario}}</div>
                <div class="CL_TXT_Texto_1 CL_TXT_Gris Grid_Item Base-30">{{Datos_Usuario.Disponibilidad}}</div>
              </div>
              <div class="CL_TXT_Texto_1 CL_TXT_Gris">{{Datos_Usuario.Correo_Electronico}}</div>
            </div>
          </div>
          <div ng-show="(AOBJ_Lista_Usuarios_Registrados |filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
            <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
              <p>Usuario no encontrado</p>
            </div>
          </div>
        </div>
      </div>
      <div class="Grid_Contenedor Base-70 cross_start CL_CONT_Cotizacion_Tablero_Cotizaciones">
        <div class="CL_Cabezera_Cotizacion Grid_Contenedor Base-100">
          <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
            <div class="CL_TXT_Texto_4 CL_TXT_Gris">Ordenes enviadas</div>
          </div>
        </div>
        <div class="Grid_Contenedor abcenter">
          <div ng-if="Ver_Ordenes == true" class="Grid_Contenedor Base-95">
            <div class="CL_Alerta_5 Grid_Contenedor">
              <div class="Grid_Item Base-20"><img ng-src="{{AOBJ_Lista_Usuarios_Registrados[Posicion_Usuario_Lista].Imagen_Usuario}}" class="CL_Imagen_Icono_1"/></div>
              <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_4 CL_TXT_Gris">{{AOBJ_Lista_Usuarios_Registrados[Posicion_Usuario_Lista].Nombre_Usuario}}</div>
              </div>
              <div class="Grid_Item Base-40 relative">
                <p ng-click="FN_Ocultar_Lista_Ordenes()" class="CL_Eliminar_1_1"></p>
              </div>
            </div>
            <div class="Tabla_Estilo_1">
              <table>
                <thead>
                  <tr>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Codigo </th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Fecha de envio</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Dirrección</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Telefono</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Estado de la orden</th>
                    <th class="CL_Tbl_Icon"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="Ordenes_Enviadas in AOBJ_Lista_Ordenes_Enviadas">
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
                      <button ng-click="FN_Actualizar_Estado_Orden($index)" value="Actualizar" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                      <button ng-click="FN_Listar_Ordenes_Usuario($index,2)" value="Actualizar" class="icon-eye CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Ver detalles</span></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div ng-if="Ver_Detalle_Orden == true" class="Grid_Contenedor Base-95">
            <div class="CL_Alerta_5 Grid_Contenedor">
              <div class="Grid_Item Base-20">
                <p ng-click="FN_Listar_Ordenes_Usuario(Posicion_Usuario_Lista,1)" class="Enlace icon-flecha2 relative left-10"></p>
              </div>
              <div class="Grid_Item Base-20"><img ng-src="{{AOBJ_Lista_Usuarios_Registrados[Posicion_Usuario_Lista].Imagen_Usuario}}" class="CL_Imagen_Icono_1"/></div>
              <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_4 CL_TXT_Gris">{{AOBJ_Lista_Usuarios_Registrados[Posicion_Usuario_Lista].Nombre_Usuario}}</div>
              </div>
              <div class="Grid_Item Base-20 Grid_Contenedor abcenter">
                <p class="CL_TXT_Texto_2">Codigo de orden: {{AOBJ_Lista_Ordenes_Enviadas[Posicion_Orden_Lista].PK_ID_Cotizacion_Usuario}}</p>
              </div>
              <div class="Grid_Item Base-40 relative">
                <p ng-click="FN_Ocultar_Lista_Ordenes()" class="CL_Eliminar_1_1"></p>
              </div>
            </div>
            <div class="Tabla_Estilo_1">
              <table>
                <thead>
                  <tr>
                    <th> </th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Precio</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Sub total</th>
                    <th class="CL_TXT_Texto_1 CL_TXT_Gris">Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="Ordenes_Detalle in AOBJ_Lista_Detalles_Ordenes_Enviadas">
                    <td class="CL_Imagen"><img ng-src="{{Ordenes_Detalle.Ruta_Imagen_Producto}}"/></td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Valor_Unitario | currency}}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Sub_Total | currency}}</td>
                    <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Cantidad_Productos}}</td>
                  </tr>
                </tbody>
              </table>
              <div class="CL_Alerta_5 Padding-10">Costo total: {{Num_Total_Orden | currency}}</div>
            </div>
          </div>
          <div ng-if="Ver_Tablero_Vacio == true" class="Grid_Contenedor abcenter">
            <div class="CL_Alerta_5 Padding-10 Grid_Contenedor abcenter">
              <p class="CL_TXT_Texto_3 CL_TXT_Gris icon-bulb2">Selecciona un usuario para ver sus ordenes enviadas																					</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>