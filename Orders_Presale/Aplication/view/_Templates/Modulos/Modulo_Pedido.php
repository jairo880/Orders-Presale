
<section id="SC_Modulo_Pedido" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 "></section>
<div id="CONT_Orden_Pedido" ng-show="BL_Ver_Orden == true" ng-init="BL_Estado_Procutos = true">		
  <div id="CONT_Invisible" ng-click="FN_Orden()" ng-show="BL_Ver_Orden == true">
    <div class="CL_Cerrar_Modal CL_Transparente"></div>
  </div>
  <!--SESION PEDIDO (importado desde Modulo_Pedido.php)-->
  <div id="CONT_Orden_Principal" ng-show="BL_Ver_Orden == true">
    <div id="CONT_Header_Info">
      <div class="CL_TXT_Titulo_Orden">
        <p class="CL_TXT_Texto_3 icon-orden">Mi orden actual</p>
      </div>
      <p title="Cerrar Menú de orden" ng-click="FN_Orden()" class="CL_Eliminar_1_1"></p>
    </div>
    <div id="CONT_Herramientas_Orden">
      <div id="CONT_Buscador">
        <div ng-show="BL_Estado_Procutos == true" class="CL_Contenedor_Buscador">
          <input id="BuscarOrden" type="search" name="buscar_Orden" placeholder="Buscar producto" ng-model="buscar_producto" class="CL_Buscar"/>
          <label for="BuscarOrden" class="icon-buscar CL_Icono_Buscar"></label>
        </div>
      </div>
      <div id="CONT_Botones">
        <li title="Enviar orden" ng-show="dato.NUM_Cantidad_Productos_En_Orden &gt; 0">
          <p ng-click="BL_Ver_Envio_Orden =! BL_Ver_Envio_Orden" class="icon-enviar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Enviar orden</span></p>
        </li>
        <li title="Mi lista" ng-click="BL_Estado_Procutos = ! BL_Estado_Procutos">
          <p ng-show="BL_Estado_Procutos == false" class="icon-orden ng_show CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Orden actual</span></p>
          <p ng-show="BL_Estado_Procutos == true" class="icon-lista ng_show CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Mis listas</span></p>
        </li>
        <li ng-show="dato.NUM_Cantidad_Productos_En_Orden &gt; 0" title="Eliminar todos los productos">
          <p ng-click="FN_Confirmacion_Alerta(1,2,false,'¿Eliminar productos actuales?')" class="icon-eliminar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Vaciar orden</span></p>
        </li>
      </div>
    </div>
    <div id="CONT_Orden">
      <!--SESION PARA CREAR LISTA DE PEDIDOS-->
      <section id="SC_Listas_Pedido" ng-show="BL_Estado_Procutos == false" class="ng_show">
        <div id="CON_Listas_Pedios">
          <div class="Grid_Contenedor justyfi">
            <p class="CL_TXT_Texto_3 center icon-add">Crear nueva lista</p><a ng-show="NUM_Cantidad_Listas &gt;0" ng-click="FN_Confirmacion_Alerta(3,2,false,'¿Esta seguro de eliminar todas ordenes creadas?')" class="Btn_Estilo_2 icon-minus-square ng_show CL_TXT_Pri_Btn relative"> Borrar listas</a>
          </div>
          <div id="CONT_Creacion_Lista" class="Grid_Contenedor abcenter">
            <label for="Nombre_Lista">Nombre t&uacute; lista</label>
            <div class="Base-70">
              <input id="Nombre_Lista" ng-model="NMG_TXT_Nombre_Lista" type="text" value="Nombre" class="Input_Estilo_1"/>
            </div>
            <div class="Base-15 Padding-5">
              <p ng-click="Fn_Crear_Lista()" class="Btn_Estilo_1 icon-plus-square ng_show CL_TXT_Pri_Btn relative">Crear<span class="CL_TXT_Info_Btn">Crear</span></p>
            </div>
          </div>
          <div id="CONT_Listas_Creadas">
            <p class="CL_TXT_Texto_3 center">Mis listas de ordenes creadas {{NUM_Cantidad_Listas}}</p>
            <div id="CONT_Lista" ng-repeat-start="Lista in AOBJ_Listas_Creadas" class="Grid_Contenedor">
              <p ng-click="FN_Confirmacion_Alerta(2,$index,false,'¿Esta seguro de eliminar la orden actual?');" class="CL_Eliminar_3_3"></p>
              <input id="Nombre_Lista" ng-model="Lista.TXT_Nombre_Lista" type="text" value="Nombre" class="Input_Estilo_1 Grid_Item Base-100"/>
              <div id="CONT_Mensaje" class="Grid_Contenedor Base-100">
                <div class="CL_Info_Lista Grid_Item Base-50 No_Padding abcenter">
                  <p>Cantidad de productos en la orden:{{Lista.NUM_Cantidad_Productos}}</p>
                </div>
                <div class="CL_Info_Lista Grid_Item Base-50 No_Padding abcenter">
                  <p>Sub total: {{Lista.Sub_Total_Orden | currency}} </p>
                </div>
              </div>
              <button ng-click="VerProductosEnLista($index)" ng-show="Lista.BL_Contenido == true" class="Btn_Estilo_5 Grid_Item Base-30">Ver productos</button>
              <div id="CONT_PRODUCTOS" ng-show="Lista.BL_Expandido == true">
                <div class="CL_Alerta_3">
                  <p class="CL_TXT_SubTotal">Total:</p>
                  <input type="text" value="0" ng-model="dato.NUM_Precio_Total_Orden" disabled="disabled" class="CL_Orden_Monto"/>
                </div>
                <div class="Grid_Contenedor">
                  <div id="CONT_Producto_Lista" ng-repeat="Producto in Lista.Articulos_Productos" class="Grid_Contenedor Base-100"><img ng-src="{{Producto.Ruta_Imagen_Producto}}" class="Grid_Item Base-40"/>
                    <div class="Grid_Contenedor Base-50">
                      <p class="Grid_Item Base-100 CL_TXT_Texto_3">{{Producto.Nombre_Producto}}</p>
                      <p class="Grid_Item Base-100 CL_TXT_Texto_2">{{Producto.Valor_Unitario}}</p>
                      <p class="Grid_Item Base-100 CL_TXT_Texto_2">Costo: {{Producto.NUM_Costo}}</p>
                      <p class="Grid_Item Base-100 CL_TXT_Texto_2">Cantiad:</p>
                      <input type="number" min="{{Producto.Cant_Unid_Min}}" max="{{Producto.Cant_Unid_Max}}" value="{{Producto.NUM_Cantidad}}" ng-model="Producto.NUM_Cantidad" ng-click="FN_Actualziar_Datos_Lista(Lista.Id_Lista)" class="Grid_Item Base-100"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="CONT_FIN" ng-repeat-end="ng-repeat-end"></div>
          </div>
          <div class="CL_Alerta_3 icon-information-black">Ayuda
            <p class="CL_TXT_Texto_2">Crea una lista para guardar los productos seleccionados hasta el momento. podras crear y guardar varias listas de ordenes, y luego retomar la orden y realizar su envio. </p>
          </div>
        </div>
      </section>
      <div id="CONT_Modal" ng-show="BL_Estado_Procutos == true" class="ng_show">
        <div id="CONT_Productos_Orden">
          <div ng-init="BL_Ver_Dtll_Lista = false" ng-click="BL_Ver_Dtll_Lista = true" ng-show="(dato.AOBJ_Productos).length &gt; 0" class="Btn_Circular_1 bottom-50">
            <p class="icon-add"></p>
            <p class="CL_TXT_Info_Btn">Guardar orden actual</p>
          </div>
          <div ng-repeat="Productos_Agregados in dato.AOBJ_Productos |  orderBy: 'PK_ID_Producto' | filter:buscar_producto:Productos_Agregados.Nombre_Producto" class="CL_Producto_Orden ng_repeat_anim1">
            <div class="CL_Imagen_Producto"><img ng-src="{{Productos_Agregados.Ruta_Imagen_Producto}}"/></div>
            <div class="CL_Info_Producto">
              <p class="CL_TXT_Nombre_Producto_Orden">{{Productos_Agregados.Nombre_Producto}}</p>
              <div class="CL_Cantidad_Productos_Orden">
                <p>Cantiad:</p>
                <input type="number" min="{{Productos_Agregados.Cant_Unid_Min}}" max="{{Productos_Agregados.Cant_Unid_Max}}" value="{{Productos_Agregados.NUM_Cantidad}}" ng-model="Productos_Agregados.NUM_Cantidad" ng-click="FN_Actualizar_Datos(2,Productos_Agregados.PK_ID_Producto)"/>
                <div class="CL_Limite_Cantidad">
                  <p>max: {{Productos_Agregados.Cant_Unid_Max}}</p>
                  <p>min: {{Productos_Agregados.Cant_Unid_Min}}</p>
                </div>
              </div>
              <div class="CL_Total">
                <div class="CL_Precio_Orden">{{Productos_Agregados.Valor_Unitario + '$'}}</div>
                <div class="CL_Total_Orden">
                  <p>Costo:</p>
                  <p>{{Productos_Agregados.NUM_Costo + '$'}}</p>
                </div>
              </div>
            </div>
            <p ng-click="FN_Eliminar_Producto(Productos_Agregados.PK_ID_Producto)" class="CL_Eliminar_1_1"></p>
          </div>
          <div ng-show="(dato.AOBJ_Productos |filter:buscar_producto:Productos_Agregados.Nombre_Producto).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
            <div class="CONT_Figura Invisible"><span></span><span class="Invisible"></span><span class="Invisible"></span><span></span></div>
            <p class="CL_TXT_Texto_3 left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Texto_5">No se han encontrado productos</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="CONT_Dtll_Lista" ng-show="BL_Ver_Dtll_Lista == true" class="Grid_Contenedor main_end ng_show">
    <div id="CONT_Invisible" ng-click="BL_Ver_Dtll_Lista = false" ng-show="BL_Ver_Dtll_Lista == true">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div class="CONT_Dtll_Lista Grid_Item Base-100 tablet-50 web-50 movil-95 cross_start main_center Grid_Contenedor top-50">
      <p ng-click="BL_Ver_Dtll_Lista = false" class="CL_Eliminar_1_1"></p>
      <div ng-click="BL_Ver_Dtll_Lista = false; BL_Estado_Procutos = false" class="Btn_Circular_3 absolute bottom-70">
        <p class="icon-add"></p>
        <p class="CL_TXT_Info_Btn">Crear lista</p>
      </div>
      <p class="CL_TXT_Texto_2 border_bottom_1 left">Guardar orden actual</p>
      <p class="CL_TXT_Texto_4 left icon-lista">Listas de ordenes creadas</p>
      <div class="Grid_Contenedor CL_Listas_Productos">
        <div ng-repeat="Lista in AOBJ_Listas_Creadas" class="CONT_Listas_Creadas ng_repeat_anim1 Grid_Item Base-100">
          <div id="CONT_Mensaje" class="Grid_Contenedor Base-100">
            <input id="Nombre_Lista" ng-model="Lista.TXT_Nombre_Lista" type="text" value="Nombre" class="Input_Estilo_1 Grid_Item Base-100"/>
            <div class="CL_Info_Lista Grid_Item Base-50 No_Padding abcenter">
              <p>Cantidad de productos:{{Lista.NUM_Cantidad_Productos}}</p>
            </div>
            <div class="CL_Info_Lista Grid_Item Base-50 No_Padding abcenter">
              <p>Sub total: {{Lista.Sub_Total_Orden | currency}} </p>
            </div>
            <button ng-click="FN_Agregar_Productos_A_Lista(Lista.Id_Lista)" class="Btn_Estilo_5 Grid_Item Base-35">Seleccionar</button>
          </div>
        </div>
      </div>
      <div ng-show="(AOBJ_Listas_Creadas).length == 0" class="CL_Alerta_5 abcenter">
        <div class="CONT_Figura Invisible"><span class="Invisible"></span><span></span><span></span><span class="Invisible"></span></div>
        <p class="CL_TXT_Texto_3 left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Texto_5">No posees listas creadas</p>
      </div>
    </div>
  </div>
  <!--SESION OPCIONES ORDEN-->
  
  
  <!--ENVIO ORDEN					-->
  <section id="SC_Enviar_Orden">
    <div id="CONT_EnviarOrden" ng-show="BL_Ver_Envio_Orden == true">
      <div id="CONT_Invisible" ng-click="BL_Ver_Envio_Orden =! BL_Ver_Envio_Orden">
        <div class="CL_Cerrar_Modal"></div>
      </div>
      <div id="CONT_Enviar_Orden_List">
        <p class="CL_TXT_Titulo_Envio icon-orden">Lista de productos actuales</p>
        <div class="Tabla_Estilo_1">
          <table>
            <thead>
              <tr>
                <th class="Imagen"> </th>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="Productos_Agregados in dato.AOBJ_Productos |  orderBy: 'PK_ID_Producto'">
                <td class="CL_Imagen"> <img ng-src="{{Productos_Agregados.Ruta_Imagen_Producto}}"/></td>
                <td>{{Productos_Agregados.PK_ID_Producto}}</td>
                <td>{{Productos_Agregados.Nombre_Producto}}</td>
                <td>{{Productos_Agregados.Valor_Unitario | currency}}</td>
                <td>
                  <input type="number" min="{{Productos_Agregados.Cant_Unid_Min}}" max="{{Productos_Agregados.Cant_Unid_Max}}" value="{{Productos_Agregados.NUM_Cantidad}}" ng-model="Productos_Agregados.NUM_Cantidad" ng-click="FN_Actualizar_Datos(2,Productos_Agregados.PK_ID_Producto)"/>
                </td>
                <td>{{Productos_Agregados.NUM_Costo | currency}}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="CL_TXT_TotalEnvio">Total</td>
                <td class="CL_TXT_TotalEnvio">{{dato.NUM_Precio_Total_Orden | currency}}</td>
              </tr>
            </tbody>
          </table>
          <div id="CONT_Confimar_Datos">
            <p class="CL_TXT_Texto_Confir icon-alerta1">Confirma la siguiente informaci&oacute;n para poder enviar t&uacute; orden</p>
            <label for="Direccion_Datos" class="icon-ubicacion-1">Direcci&oacute;n donde quiero que llege mi orden</label>
            <input id="Direccion_Datos" type="text" value="Carrera 60#21-12" class="Input_Estilo_1"/>
            <label for="Telefono_Datos" class="icon-celular">Telefono con el que me pueden contactar</label>
            <input id="Telefono_Datos" type="text" value="2064478" class="Input_Estilo_1"/>
          </div>
          <div class="CL_Botones_Enviar">
            <div class="Btn_Estilo_3 icon-agregar3">Enviar</div>
            <div ng-click="BL_Ver_Envio_Orden =! BL_Ver_Envio_Orden" class="Btn_Estilo_4 icon-actualizar">Modificar orden</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<section id="SC_Comentarios_Productos">
  <!--ng_show="BL_Comentario == true"-->
  <div id="CONT_Comentarios_Productos" ng_show="BL_Comentario == true" class="abcenter Grid_Contenedor">
    <div id="CONT_Invisible" ng-click="BL_Comentario = false">
      <div class="CL_Cerrar_Modal"></div>
    </div>
    <div id="CONT_Com_Product" class="Base-100 web-50 Grid_Contenedor">
      <div id="CON_Cabezera_Comentarios" class="Grid_Contenedor Grid_Total justyfi">
        <p class="CL_TXT_Texto_4 Grid_Total Grid_Contenedor abcenter">Comentarios</p>
        <p ng-click="BL_Comentario  = false" class="CL_Eliminar_1_1"></p>
      </div>
      <div id="CON_Main_Comentarios" class="Grid_Contenedor Padding-5 Base-100 abcenter">
        <div id="CONT_Comentario" class="Base-95 Padding-5 main_start cross_start">
          <div class="CL_Crear_Comentario_Nuevo Grid_Contenedor abcenter Padding-5">
            <div class="Grid_Item CL_Imagen_Usuario_Comentario_Producto"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_1"/></div>
            <form ng-submit="FN_Registrar_Nuevo_Comentario(N)" name="Ingresar_Comentario_Producto" class="Grid_Item Base-100 Grid_Contenedor abcenter">
              <div class="Grid_Item Base-100">
                <textarea ng-model="N.Comentario" type="text" placeholder="Agregar un comentario" required="required" class="Textarea_Estilo_1 No_Margin"></textarea>
                <input ng-model="N.PK_ID_Producto" class="Input_Estilo_1 Invisible"/>
              </div>
              <div ng-show="Ingresar_Comentario_Producto.$valid" class="Grid_Item Base-100 main_end ng_show">
                <input ng-disabled="!Ingresar_Comentario_Producto.$valid" type="submit" value="Publicar" class="Btn_Estilo_7"/><a ng-click="N.Comentario = ''" class="Btn_Estilo_5">Cancelar</a>
              </div>
            </form>
          </div>
          <div id="CONT_Comentarios_Listados" class="Base-100">
            <div ng-repeat="Comentarios_Productos in dato.AOBJ_Comentarios_Producto | filter:Comentarios_Productos.Fecha_Comentario" class="CL_Comentario_Usuario_Producto Base-100 Padding-tablet No_Padding Grid_Contenedor abcenter distributed">
              <div class="CL_Imagen_Usuario_Comentario_Producto Grid_Item"><img ng-src="{{Comentarios_Productos.Imagen_Usuario}}" class="CL_Imagen_1"/></div>
              <div class="CL_Mensaje_Usuario_Comentario_Producto Base-100 tablet-80 Grid_Item Grid_Contenedor abcenter">
                <div class="Grid_Contenedor abcenter CL_Mensaje_Comentario_Producto Grid_Total Padding-10">
                  <div class="CL_Nombre_Usuario_Comentario_Producto fixed Base-100">
                    <div class="Grid_Item CL_TXT_Texto_3 Base-100 tablet-40">{{Comentarios_Productos.Nombre_Usuario}}									</div>
                  </div>
                  <div class="CONT_CL_Comentario_Producto Base-100">
                    <textarea ng-model="Comentarios_Productos.Descripcion" ng-show="Comentarios_Productos.Nombre_Usuario == dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-disabled=" Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="Textarea_Estilo_2 CONT_Mensaje_Producto CL_TXT_Texto_1 Base-100 tablet-80"> {{Comentarios_Productos.Descripcion}}</textarea>
                  </div>
                  <div ng-show="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-disabled=" Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="CONT_Mensaje_Producto CL_TXT_Texto_1"> {{Comentarios_Productos.Descripcion}}</div>
                  <div class="CL_Herramientas_Comentario_Producto fixed Grid_Contenedor Base-100 main_end Padding-5">
                    <div class="Grid_Item CL_TXT_Texto_1 Base-100 tablet-30">Publicado: {{Comentarios_Productos.Fecha_Comentario}}</div>
                    <div ng-click="FN_Valoracion_Comentario($index)" class="CL_Valoracion_Comentario_Producto Grid_Item relative CL_TXT_Pri_Btn icon-heart Base-30 tablet-20">{{Comentarios_Productos.Valoracion_Comentario}}<span class="CL_TXT_Info_Btn top-30_30">Puntos</span></div>
                    <div ng-hide="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-click="FN_Eliminar_Comentario(Comentarios_Productos.PK_ID_Comentario)" class="Grid_Item relative CL_TXT_Pri_Btn icon-trash-can Base-30 tablet-20"><span class="CL_TXT_Info_Btn top-30_30">Remover</span></div>
                    <div ng-hide="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-click="FN_Modificar_Comentario($index)" class="Grid_Item relative CL_TXT_Pri_Btn icon-lapiz Base-30 tablet-20"><span class="CL_TXT_Info_Btn top-30_30">Editar</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <NUM_Tipo_Funcion></NUM_Tipo_Funcion>
</section>