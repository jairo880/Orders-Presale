
<section id="SC_Modulo_Pedido" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 "></section>
<div id="CONT_Orden_Pedido" ng-show="BL_Ver_Orden == true" ng-init="BL_Estado_Procutos = true">		
  <div id="CONT_Invisible" ng-click="FN_Orden()" ng-show="BL_Ver_Orden == true">
    <div class="CL_Cerrar_Modal"></div>
  </div>
  <!--SESION PEDIDO (importado desde Modulo_Pedido.php)-->
  <div id="CONT_Orden_Principal" ng-show="BL_Ver_Orden == true" class="Grid_Contenedor column now_wrap">
    <div id="CONT_Header_Info">
      <div class="CL_TXT_Titulo_Orden">
        <p ng-show="BL_Estado_Procutos == true" class="CL_TXT_Texto_4 CL_TXT_Gris">Mi orden actual</p>
        <p ng-show="BL_Estado_Procutos == false" class="CL_TXT_Texto_4 CL_TXT_Gris">Ordenes guardadas</p>
      </div>
      <p title="Cerrar Menú de orden" ng-click="FN_Orden()" class="CL_Eliminar_1_1"></p>
    </div>
    <div class="CL_Alerta_5 Grid_Contenedor abcenter Padding-10">
      <div class="Grid_Contenedor Base-60">
        <div ng-show="BL_Ver_Detalle_Lista == true" class="CL_TXT_Texto_4 CL_TXT_Gris">Productos agregados en la lista</div>
        <div ng-show="BL_Ver_Detalle_Lista == false &amp;&amp; BL_Estado_Procutos == false" ng-init="Buscar_Lista" class="CL_Contenedor_Buscador">
          <input id="Buscar" maxlength="45" type="search" name="Buscar" placeholder="Buscar lista" ng-model="Buscar_Lista" class="CL_Buscar"/>
          <label for="Buscar" class="icon-buscar CL_Icono_Buscar"></label>
        </div>
        <div ng-show="BL_Estado_Procutos == true" class="CL_Contenedor_Buscador">
          <input id="BuscarOrden" type="search" name="buscar_Orden" placeholder="Buscar producto" ng-model="buscar_producto" class="CL_Buscar"/>
          <label for="BuscarOrden" class="icon-buscar CL_Icono_Buscar"></label>
        </div>
      </div>
    </div>
    <div id="CONT_Orden" class="Grid_Contenedor">
      <!--SESION PARA CREAR LISTA DE PEDIDOS-->
      <section id="SC_Listas_Pedido" ng-show="BL_Estado_Procutos == false" class="ng_show">
        <div id="CON_Listas_Pedios">
          <div id="CONT_Creacion_Lista" ng-show="BL_Ver_Detalle_Lista == false" class="Grid_Contenedor abcenter">
            <div class="Grid_Total">
              <div class="CL_TXT_Texto_1 CL_TXT_Gris">Añadir una nueva lista</div>
            </div>
            <div class="Base-70 relative">
              <input id="Nombre_Lista" placeholder="Nombre de la lista" ng-model="NMG_TXT_Nombre_Lista" maxlength="45" minlength="5" type="text" value="Nombre" class="Input_Estilo_2"/>
              <p ng-show="NMG_TXT_Nombre_Lista != ''" ng-click="NMG_TXT_Nombre_Lista = ''" class="CL_Eliminar_1_1"></p>
            </div>
            <div class="Base-15 Padding-5">
              <p ng-click="Fn_Crear_Lista()" class="Btn_Estilo_1 icon-plus-square ng_show">Crear</p>
            </div>
          </div>
          <section id="CONT_Listas_Creadas" ng-show="BL_Ver_Detalle_Lista == false">
            <div id="CONT_Herramientas_Orden" class="Grid_Contenedor abcenter CON_Paginacion Invisible Visible-web">
              <div class="Grid_Contenedor Base-20">
                <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
              </div>
              <dir-pagination-controls pagination-id="Lista_Usuario" boundary-links="true" class="Base-55 cross_end Grid_Contenedor">
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
            <div id="CONT_Lista" dir-paginate="Lista in AOBJ_Listas_Creadas | filter:Buscar_Lista:Lista.Nombre_Lista  | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Lista_Usuario" class="Grid_Contenedor Base-80 relative">
              <p ng-click="FN_Confirmacion_Alerta(2,Lista.PK_ID_Lista_Usuario,false,'¿Esta seguro de eliminar la orden actual?');" class="CL_Eliminar_1_1"></p>
              <div class="Grid_Contenedor Base-70">
                <div class="Grid_Contenedor Base-20 abcenter">
                  <p class="CL_Icono_3">{{ Lista.Nombre_Lista | limitTo : 1 : 0}}</p>
                </div>
                <div class="Grid_Contenedor Base-80 abcenter">
                  <input id="Nombre_Lista" ng-change="FN_Actualizar_Nombre_Lista(Lista.PK_ID_Lista_Usuario)" ng-model="Lista.Nombre_Lista" type="text" value="Nombre" class="Input_Estilo_1"/>
                </div>
              </div>
              <div class="Grid_Contenedor Base-30 abcenter">			
                <div ng-click="FN_Listas_Detalle_Usuario( Lista.PK_ID_Lista_Usuario, Lista.Nombre_Lista);BL_Ver_Detalle_Lista = true" class="icon-align-center Grid_Item Base-30 CL_TXT_Pri_Btn relative Enlace"> <span class="CL_TXT_Info_Btn">Ver productos</span></div>
              </div>
              <div class="Grid_Contenedor Base-100">
                <div class="CL_TXT_Texto_1 CL_TXT_Gris icon-clock">Creada el: {{Lista.Fecha_Creacion}}</div>
              </div>
            </div>
            <div ng-show="(AOBJ_Listas_Creadas |filter:Buscar_Lista:Lista.Nombre_Lista).length == 0" class="CL_Alerta_3 ng_repeat_anim1 Grid_Contenedor">
              <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                <p>No se han encontrado listas registradas</p>
              </div>
            </div>
            <div class="CL_Alerta_5 icon-information-black Padding-10">Ayuda
              <p class="CL_TXT_Texto_2">Crea una lista para guardar los productos seleccionados hasta el momento. podras crear y guardar varias listas de ordenes, y luego retomar la orden y realizar su envio.</p>
            </div>
          </section>
          <section id="SC_Detalle_Lista" ng-show="BL_Ver_Detalle_Lista == true" class="Grid_Contenedor Base-100">		
            <div id="CONT_Lista" class="Grid_Contenedor">
              <p ng-click="BL_Ver_Detalle_Lista = false;BL_Estado_Lista_Actualizar = false" class="Enlace icon-flecha2 relative left-10"></p>
              <div class="CL_Alerta_5 Grid_Contenedor Padding-10">{{Nombre_Lista}}</div>
              <div class="Grid_Contenedor abcenter">
                <div id="CONT_Producto_Lista" ng-repeat="Producto in AOBJ_Listas_Detalle" class="Grid_Contenedor Base-80 relative">
                  <p ng-click="FN_Eliminar_Producto_Dtll_Lista(Producto.PK_ID_DLL_Lista_Usuario)" class="CL_Eliminar_1_1"></p>
                  <div class="Grid_Item Base-15"><img ng-src="{{Producto.Ruta_Imagen_Producto}}" class="CL_Imagen_1"/></div>
                  <div class="Grid_Contenedor Base-40">
                    <p class="Grid_Item Base-100 CL_TXT_Texto_3 CL_TXT_Gris">{{Producto.Nombre_Producto}}</p>
                    <p class="Grid_Item Base-100 CL_TXT_Texto_1 CL_TXT_Gris">Costo: {{Producto.Valor_Unitario}}</p>
                    <div class="CL_Alerta_1">
                      <p class="CL_TXT_Texto_1 CL_TXT_Gris">Sub total: {{Producto.Sub_Total}}</p>
                    </div>
                  </div>
                  <div class="Grid_Contenedor Base-30 abcenter">
                    <p class="CL_TXT_Texto_2">Cantiad:</p>
                    <input type="number" min="{{Producto.Cant_Unid_Min}}" max="{{Producto.Cant_Unid_Max}}" value="{{Producto.Cantidad_Productos}}" ng-model="Producto.Cantidad_Productos" ng-click="FN_Actualziar_Datos_Lista(Producto.PK_ID_DLL_Lista_Usuario)" class="Padding-10 Grid_Item Base-50"/>
                  </div>
                </div>
                <div ng-show="(AOBJ_Listas_Detalle).length == 0" class="CL_Alerta_2 ng_repeat_anim1 Grid_Contenedor">
                  <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                    <p>La lista seleccionada no posee productos asociados</p>
                  </div>
                </div>
                <div class="CL_Alerta_5 icon-information-black Padding-10">Ayuda
                  <p class="CL_TXT_Texto_2">Asocia uno o mas prouctos a una lista, podras guardar los productos y luego retomar la orden y realizar su envio.</p>
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>
      <div id="CONT_Modal" ng-show="BL_Estado_Procutos == true" class="ng_show">
        <div id="CONT_Productos_Orden">
          <div ng-show="(dato.AOBJ_Productos).length &gt; 0 &amp;&amp; dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" ng-init="BL_Ver_Dtll_Lista = false" ng-click="BL_Ver_Dtll_Lista = true" class="Btn_Circular_1 bottom-90">
            <p class="icon-disc-floppy-font"></p>
            <p class="CL_TXT_Info_Btn">Guardar orden</p>
          </div>
          <div id="CONT_Herramientas_Orden" class="Grid_Contenedor abcenter CON_Paginacion Invisible Visible-web">
            <div class="Grid_Contenedor Base-20">
              <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
            </div>
            <dir-pagination-controls pagination-id="Productos_Lista" boundary-links="true" class="Base-60 cross_end Grid_Contenedor">
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
          <div dir-paginate="Productos_Agregados in dato.AOBJ_Productos |  orderBy: 'PK_ID_Producto' | filter:buscar_producto:Productos_Agregados.Nombre_Producto  | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Productos_Lista" class="CL_Producto_Orden ng_repeat_anim1">
            <div class="CL_Imagen_Producto"><img ng-src="{{Productos_Agregados.Ruta_Imagen_Producto}}"/></div>
            <div class="CL_Info_Producto">
              <p class="CL_TXT_Nombre_Producto_Orden CL_TXT_Texto_4 CL_TXT_Gris">{{Productos_Agregados.Nombre_Producto}}</p>
              <div class="CL_Cantidad_Productos_Orden Grid_Contenedor main_start">
                <div class="Grid_Item Base-20">
                  <p class="CL_TXT_Texto_3 CL_TXT_Gris">Unidades:</p>
                </div>
                <div class="Grid_Item Base-40">
                  <input type="number" min="{{Productos_Agregados.Cant_Unid_Min}}" max="{{Productos_Agregados.Cant_Unid_Max}}" value="{{Productos_Agregados.NUM_Cantidad}}" ng-model="Productos_Agregados.NUM_Cantidad" ng-change="FN_Actualizar_Datos(2,Productos_Agregados.PK_ID_Producto)"/>
                  <div class="CL_Limite_Cantidad">
                    <p>max: {{Productos_Agregados.Cant_Unid_Max}}</p>
                    <p>min: {{Productos_Agregados.Cant_Unid_Min}}</p>
                  </div>
                </div>
              </div>
              <div class="CL_Total Grid_Contenedor column">
                <div class="Grid_Contenedor main_start">
                  <div class="Grid_Item No_Padding Base-15">
                    <p class="CL_TXT_Texto_3 CL_TXT_Gris">Precio:</p>
                  </div>
                  <div class="Grid_Contenedor Base-35 main_start Grid_Item No_Padding">
                    <div class="CL_Precio_Orden">{{ '$' +Productos_Agregados.Valor_Unitario }}</div>
                  </div>
                </div>
                <div ng-if="Productos_Agregados.NUM_Costo &gt; 0 &amp;&amp; Productos_Agregados.NUM_Costo != null" class="Grid_Contenedor main_start CL_Total_Orden">
                  <div class="Grid_Item Base-40">
                    <p class="CL_TXT_Texto_5 CL_TXT_Gris">Sub total:</p>
                  </div>
                  <div class="Grid_Item Base-30">
                    <div class="CL_Preciop CL_TXT_Texto_5 CL_TXT_Gris">{{'$' + Productos_Agregados.NUM_Costo }}</div>
                  </div>
                </div>
              </div>
            </div>
            <p ng-click="FN_Eliminar_Producto(Productos_Agregados.PK_ID_Producto)" class="CL_Eliminar_1_1"></p>
          </div>
          <div ng-show="(dato.AOBJ_Productos |filter:buscar_producto:Productos_Agregados.Nombre_Producto).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
            <p class="CL_TXT_Texto_3 CL_TXT_Gris left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Texto_5 CL_TXT_Gris">No se han encontrado productos</p>
          </div>
        </div>
      </div>
    </div>
    <div class="Flex_Grow_1 CL_Opciones_Orden_Pedido Grid_Contenedor abcenter">
      <div class="Grid_Contenedor abcenter">
        <div title="Enviar orden" ng-show="dato.NUM_Cantidad_Productos_En_Orden &gt; 0 &amp;&amp; BL_Estado_Procutos == true" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="FN_Envio_Orden(1)" class="Enlace icon-enviar CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Enviar</span></a></div>
        <div title="Ver la orden actual" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="BL_Estado_Procutos = true;BL_Ver_Detalle_Lista = false;BL_Estado_Lista_Actualizar = false" class="Enlace icon-shopping-cart ng_show CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Orden </span><span class="CL_Cantidad top-10_10 absolute left-20"> {{dato.NUM_Cantidad_Productos_En_Orden}}</span></a></div>
        <div ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" title="Ver las listas que posees creadas, las listas sirven para acelerar el proceso de envio de una orden" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="BL_Ver_Detalle_Lista = false;BL_Estado_Lista_Actualizar = false;BL_Estado_Procutos = false;FN_Listas_Usuario()" class="Enlace icon-grid ng_show CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10"> Listas</span><span class="CL_Cantidad top-10_10 absolute left-20"> {{NUM_Cantidad_Listas}}</span></a></div>
        <div ng-show="dato.NUM_Cantidad_Productos_En_Orden &gt; 0 &amp;&amp; BL_Estado_Procutos == true" title="Eliminar todos los productos" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Activo Grid_Item"><a ng-click="FN_Confirmacion_Alerta(1,2,false,'¿Eliminar productos actuales?')" class="Enlace icon-eliminar CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Vaciar</span></a></div>
        <div ng-class="{CL_Btn_Opcion_Activo: BL_Estado_Lista_Actualizar == true, CL_Btn_Opcion_Orden_Pedido: BL_Estado_Lista_Actualizar == false }" ng-show="BL_Estado_Lista_Actualizar == true &amp;&amp; (AOBJ_Listas_Detalle).length != 0 &amp;&amp; BL_Ver_Detalle_Lista == true" title="Actualizar los datos de la lista" class="Grid_Contenedor Base-20 abcenter Grid_Item"><a ng-click="FN_Actualizar_Dtll_Lista_Usuario()" class="Enlace icon-retweet ng_show CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10"> Actualizar</span><span ng-if="BL_Estado_Lista_Actualizar == true" class="CL_Cantidad top-10_10 absolute left-20 icon-exclamation-1"></span></a></div>
        <div ng-show="(AOBJ_Listas_Detalle).length != 0 &amp;&amp; BL_Ver_Detalle_Lista == true" title="Enviar como orden esta lista" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="FN_Envio_Orden(4)" class="Enlace icon-paper-plane-o ng_show CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10"> Enviar</span></a></div>
        <div ng-show="(AOBJ_Listas_Detalle).length != 0 &amp;&amp; BL_Ver_Detalle_Lista == true" title="Eliminar todos los productos" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Activo Grid_Item"><a ng-click="FN_Confirmacion_Alerta(9,PK_Lista_Seleccionada,false,'¿Esta seguro de eliminar los productos actuales?')" class="Enlace icon-eliminar CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Vaciar lista</span></a></div>
        <div ng-show="NUM_Cantidad_Listas &gt; 0 &amp;&amp; BL_Ver_Detalle_Lista == false &amp;&amp; BL_Estado_Procutos == false" title="Eliminar todas las listas creadas" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Activo Grid_Item"><a ng-click="FN_Confirmacion_Alerta(3,2,false,'¿Esta seguro de eliminar todas las listas creadas?')" class="Enlace icon-eliminar CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Borrar listas</span></a></div>
      </div>
    </div>
  </div>
  <div id="CONT_Dtll_Lista" ng-show="BL_Ver_Dtll_Lista == true" class="Grid_Contenedor main_start ng_show">
    <div id="CONT_Invisible" ng-click="BL_Ver_Dtll_Lista = false" ng-show="BL_Ver_Dtll_Lista == true">
      <div class="CL_Cerrar_Modal"></div>
    </div>
    <div class="CONT_Dtll_Lista Base-100 tablet-50 web-40 movil-95 Grid_Contenedor main_start Grid_Item No_Padding column now_wrap">
      <div class="Grid_Contenedor border_bottom_1 abcenter"></div>
      <div class="Grid_Contenedor Base-60">
        <p class="CL_TXT_Texto_4 CL_TXT_Gris left">Guardar orden actual</p>
      </div>
      <p ng-click="BL_Ver_Dtll_Lista = false" class="CL_Eliminar_1_1"></p>
      <div class="Grid_Contenedor abcenter border_bottom_1">
        <div class="Grid_Contenedor Base-50">
          <div class="CL_Contenedor_Buscador">
            <input id="Buscar" maxlength="45" type="search" name="Buscar" placeholder="Buscar lista" ng-model="Buscar_Lista_Asociacion" class="CL_Buscar"/>
            <label for="Buscar" class="icon-buscar CL_Icono_Buscar">			</label>
          </div>
        </div>
      </div>
      <div class="Grid_Contenedor abcenter CON_Paginacion Invisible Visible-web">
        <div class="Grid_Contenedor Base-20">
          <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
        </div>
        <dir-pagination-controls pagination-id="Asociacion_Lista_Productos" boundary-links="true" class="Base-65 cross_end Grid_Contenedor">
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
      <div class="Grid_Contenedor CL_Listas_Productos cross_start">
        <div dir-paginate="Lista in AOBJ_Listas_Creadas | filter:Buscar_Lista_Asociacion:Lista.Nombre_Lista  | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Asociacion_Lista_Productos" class="CONT_Listas_Creadas ng_repeat_anim1 Grid_Item Base-100">
          <div id="CONT_Mensaje" class="Grid_Contenedor Base-100">
            <div class="Grid_Contenedor Base-70">
              <div class="Grid_Contenedor Base-20 abcenter">
                <p class="CL_Icono_3">{{ Lista.Nombre_Lista | limitTo : 1 : 0}}</p>
              </div>
              <div class="Grid_Contenedor Base-80 abcenter">
                <div class="CL_TXT_Texto_2">{{Lista.Nombre_Lista}}</div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-30 abcenter">			
              <div ng-click="Fn_Asociar_Productos_Lista(Lista.PK_ID_Lista_Usuario)" class="icon-android-done Grid_Item Base-30 CL_TXT_Pri_Btn relative Enlace"> <span class="CL_TXT_Info_Btn">Seleccionar</span></div>
            </div>
            <div class="Grid_Contenedor Base-100">
              <div class="CL_TXT_Texto_1 CL_TXT_Gris icon-clock">Creada el: {{Lista.Fecha_Creacion}}</div>
            </div>
          </div>
        </div>
        <div ng-show="(AOBJ_Listas_Creadas |filter:Buscar_Lista_Asociacion:Lista.Nombre_Lista).length == 0 " class="CL_Alerta_3 ng_repeat_anim1 Grid_Contenedor">
          <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
            <p>No se han encontrado listas registradas</p>
          </div>
        </div>
      </div>
      <div class="CL_Opciones_Orden_Pedido Grid_Contenedor abcenter">
        <div class="Grid_Contenedor abcenter">
          <div ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" title="Ver las listas que posees creadas, las listas sirven para acelerar el proceso de envio de una orden" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="BL_Ver_Dtll_Lista = false;BL_Ver_Detalle_Lista = false;BL_Estado_Lista_Actualizar = false;BL_Estado_Procutos = false;FN_Listas_Usuario()" class="Enlace icon-grid ng_show CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10"> Listas</span><span class="CL_Cantidad top-10_10 absolute left-20"> {{NUM_Cantidad_Listas}}</span></a></div>
          <div title="Enviar orden" class="Grid_Contenedor Base-20 abcenter CL_Btn_Opcion_Activo Grid_Item"><a ng-click="BL_Ver_Dtll_Lista = false" class="Enlace icon-cancelar3 CL_TXT_Pri_Btn relative CL_TXT_Pri_Btn"><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Cancelar</span></a></div>
        </div>
      </div>
    </div>
  </div>
  <!--SESION OPCIONES ORDEN-->
  <!--ENVIO ORDEN					-->
  <section id="SC_Enviar_Orden" ng-init="BL_Datos_Envio_Producto = false">
    <div id="CONT_EnviarOrden" ng-show="BL_Ver_Envio_Orden == true">
      <div id="CONT_Invisible" ng-click="BL_Ver_Envio_Orden =! BL_Ver_Envio_Orden">
        <div class="CL_Cerrar_Modal"></div>
      </div>
      <div id="CONT_Enviar_Orden_List" ng-if="BL_Datos_Envio_Producto == true">
        <p class="CL_TXT_Texto_4 CL_TXT_Gris">Orden actual</p>
        <p ng-click="FN_Envio_Orden(3)" class="CL_Eliminar_1_1"></p>
        <form name="Envio_Orden" ng-submit="FN_Envio_Orden(2,DT)">
          <div class="Tabla_Estilo_1">
            <table>
              <thead>
                <tr>
                  <th class="Imagen"> </th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
              </thead>
              <div class="Grid_Contenedor abcenter CON_Paginacion Invisible Visible-web">
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
                    <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                  </ul>
                </dir-pagination-controls>
              </div>
              <tbody>
                <tr dir-paginate="Productos_Agregados in AOBJ_Envio_Orden | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                  <td class="CL_Imagen"> <img ng-src="{{Productos_Agregados.Ruta_Imagen_Producto}}" class="CL_Imagen_3"/></td>
                  <td>{{Productos_Agregados.Nombre_Producto}}</td>
                  <td>{{Productos_Agregados.Valor_Unitario | currency}}</td>
                  <td ng-if="Bl_Dtll_Lista == false">
                    <input name="Cantidad_Productos{{$index}}" type="number" min="{{Productos_Agregados.Cant_Unid_Min}}" max="{{Productos_Agregados.Cant_Unid_Max}}" value="{{Productos_Agregados.NUM_Cantidad}}" ng-model="Productos_Agregados.NUM_Cantidad" ng-click="FN_Actualizar_Datos(2,Productos_Agregados.PK_ID_Producto)" required="required" class="Input_Estilo_1"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.$pristine &amp;&amp; Envio_Orden.Cantidad_Productos{{$index}}.$error.required">
                      <p class="icon-negocio">Ingrese la cantidad de productos a solicitar</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.Cantidad_Productos{{$index}}.$valid &amp;&amp; !Envio_Orden.$pristine &amp;&amp; !Envio_Orden.Cantidad_Productos{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad a solicitar no es suficiente</p>
                    </div>
                  </td>
                  <td ng-if="Bl_Dtll_Lista == true"> 
                    <input name="Cantidad_Productos{{$index}}" type="text" value="{{parseInt(Productos_Agregados.Cantidad_Productos)}}" ng-model="Productos_Agregados.Cantidad_Productos" ng-click="FN_Actualizar_Datos(2,Productos_Agregados.PK_ID_Producto)" required="required" disabled="disabled" class="Input_Estilo_1"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.$pristine &amp;&amp; Envio_Orden.Cantidad_Productos{{$index}}.$error.required">
                      <p class="icon-negocio">Ingrese la cantidad de productos a solicitar</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.Cantidad_Productos{{$index}}.$valid &amp;&amp; !Envio_Orden.$pristine &amp;&amp; !Envio_Orden.Cantidad_Productos{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad a solicitar no es suficiente</p>
                    </div>
                  </td>
                  <td ng-if="Productos_Agregados.NUM_Costo != 'undefined'">{{Productos_Agregados.NUM_Costo | currency}}</td>
                  <td ng-if="Productos_Agregados.Sub_Total != 'undefined'">{{Productos_Agregados.Sub_Total | currency}}</td>
                  <td class="CL_Tbl_Icon"> 
                    <div ng-if="Productos_Agregados.Sub_Total == 'undefined'" ng-click="FN_Eliminar_Producto(Productos_Agregados.PK_ID_Producto)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="CL_TXT_TotalEnvio">Total</td>
                  <td class="CL_TXT_TotalEnvio">{{NUM_Precio_Total_Orden_Envio | currency}}</td>
                </tr>
              </tbody>
            </table>
            <div id="CONT_Confimar_Datos" class="Grid_Contenedor Base-100 abcenter">
              <div class="Grid_Item Base-100 tablet-30 Grid_Contenedor column">
                <p class="CL_TXT_Texto_4 CL_TXT_Gris">Confirma la siguiente informaci&oacute;n para poder enviar t&uacute; orden</p>
                <label for="Direccion_Datos" class="CL_TXT_Texto_2 icon-ubicacion-1">Direcci&oacute;n de entrega</label>
                <select ng-init="DT.Direccion_Entrega = dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento " class="Select_1">
                  <option ng-click="FN_Desplegar_Campos_Envio_Orden(1);DT.Direccion_Entrega = dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento" value="{{dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento}}">{{dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento}}</option>
                  <option value="Otra dirección" ng-click="FN_Desplegar_Campos_Envio_Orden(1);DT.Direccion_Entrega = ''">Nueva dirección</option>
                </select>
                <input id="Direccion_Datos" value="{{Direccion_Entrega}}" name="Direccion_Entrega" required="required" maxlength="20" minlength="7" ng-show="Otra_Direccion == true" type="text" ng-model="DT.Direccion_Entrega" class="Input_Estilo_1"/>
                <!--Mensaje de validacion-->
                <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.$pristine &amp;&amp; Envio_Orden.Direccion_Entrega.$error.required">
                  <p class="icon-negocio">Ingrese una dirección de entrega</p>
                </div>
                <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.Direccion_Entrega.$valid &amp;&amp; !Envio_Orden.$pristine &amp;&amp; !Envio_Orden.Direccion_Entrega.$error.required ">
                  <p class="icon-login">La cantidad de caracteres es muy corta</p>
                </div>
                <label for="Telefono_Datos" class="CL_TXT_Texto_2 icon-celular">Telefono del lugar de entrega</label>
                <select ng-init="DT.Telefono_Entrega = dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento" class="Select_1">
                  <option ng-click="FN_Desplegar_Campos_Envio_Orden(2);DT.Telefono_Entrega = dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento" value="{{dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento}}">{{dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento}}</option>
                  <option value="Otro telefono" ng-click="FN_Desplegar_Campos_Envio_Orden(2);DT.Telefono_Entrega = ''">Nuevo telefono</option>
                </select>
                <input id="Telefono_Datos" name="Telefono_Entrega" required="required" maxlength="10" minlength="7" value="{{Telefono_Entrega}}" ng-show="Otro_Telefono == true" type="tel" ng-model="DT.Telefono_Entrega" class="Input_Estilo_1"/>
                <!--Mensaje de validacion-->
                <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.$pristine &amp;&amp; Envio_Orden.Telefono_Entrega.$error.required">
                  <p class="icon-negocio">Ingrese un numero telefonico</p>
                </div>
                <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.Telefono_Entrega.$valid &amp;&amp; !Envio_Orden.$pristine &amp;&amp; !Envio_Orden.Telefono_Entrega.$error.required ">
                  <p class="icon-login">La cantidad de caracteres es muy corta</p>
                </div>
              </div>
              <div class="CL_Botones_Enviar">
                <button ng-disabled="!Envio_Orden.$valid " class="Btn_Estilo_3 icon-enviar">Enviar</button>
                <p ng-click="FN_Envio_Orden(3)" class="Btn_Estilo_5">Cancelar envio</p>
              </div>
            </div>
          </div>
        </form>
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
    <div id="CONT_Com_Product" class="Base-100 tablet-60 web-50 Grid_Contenedor">
      <div id="CON_Main_Comentarios" class="Grid_Contenedor Padding-5 Base-100 abcenter">
        <div id="CONT_Comentario" class="Base-100 Padding-5 main_start cross_start">
          <div class="CL_Crear_Comentario_Nuevo Grid_Contenedor abcenter Padding-5">
            <form ng-submit="FN_Registrar_Nuevo_Comentario(N)" name="Ingresar_Comentario_Producto" class="Base-100 Grid_Contenedor abcenter">
              <div id="CON_Cabezera_Comentarios" class="Grid_Contenedor Grid_Total justyfi">
                <p ng-show="!Ingresar_Comentario_Producto.$valid &amp;&amp; BL_Edicion_Datos_Comentario == false" class="CL_TXT_Texto_4 CL_TXT_Gris Grid_Total Grid_Contenedor abcenter ng_show">Comentarios</p>
                <p ng-show="!Ingresar_Comentario_Producto.$valid &amp;&amp; BL_Edicion_Datos_Comentario == false" ng-click="BL_Comentario  = false" class="CL_Eliminar_1_1"></p>
                <div ng-show="Ingresar_Comentario_Producto.$valid &amp;&amp; BL_Edicion_Datos_Comentario == false" class="Grid_Item Base-100 ng_show justify Grid_Contenedor ng_show">
                  <div class="Grid_Item Base-10 Grid_Contenedor abcenter"><a ng-click="N.Comentario = ''" class="CL_TXT_Texto_5 CL_TXT_Gris icon-android-close Enlace"></a></div>
                  <div class="Grid_Item Base-60 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4 CL_TXT_Gris Grid_Total Grid_Contenedor abcenter">Nuevo comentario </div>
                  </div>
                  <div class="Grid_Item Base-20 Grid_Contenedor abcenter">
                    <button ng-disabled="!Ingresar_Comentario_Producto.$valid" type="submit" class="icon-android-done CL_TXT_Texto_5 CL_TXT_Gris Enlace"></button>
                  </div>
                </div>
                <div ng-show="BL_Edicion_Datos_Comentario == true" class="Grid_Item Base-100 ng_show justify Grid_Contenedor ng_show">
                  <div class="Grid_Item Base-10 Grid_Contenedor abcenter"><a ng-click="FN_Editar_Comentario(Num_Posicion_Comentario,2)" class="CL_TXT_Texto_5 CL_TXT_Gris icon-android-close Enlace"></a></div>
                  <div class="Grid_Item Base-60 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4 CL_TXT_Gris Grid_Total Grid_Contenedor abcenter">Editar Comentario</div>
                  </div>
                  <div class="Grid_Item Base-10 Grid_Contenedor abcenter"><a ng-click="FN_Modificar_Comentario(Num_Posicion_Comentario)" class="CL_TXT_Texto_5 CL_TXT_Gris Enlace Enlace icon-android-done"></a></div>
                </div>
              </div>
              <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                <div class="Grid_Item CL_Imagen_Usuario_Comentario_Producto"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_1"/></div>
                <textarea ng-model="N.Comentario" type="text" placeholder="Agregar un comentario" required="required" class="Textarea_Estilo_1 No_Margin"></textarea>
                <input ng-model="N.PK_ID_Producto" class="Input_Estilo_1 Invisible"/>
              </div>
            </form>
          </div>
          <div id="CONT_Comentarios_Listados" class="Base-100">
            <div class="Grid_Contenedor abcenter CON_Paginacion Invisible Visible-web">
              <div class="Grid_Contenedor Base-10">
                <p class="CL_TXT_Texto_1 CL_TXT_Gris">Lista de comentarios</p>
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
            <div dir-paginate="Comentarios_Productos in dato.AOBJ_Comentarios_Producto  | itemsPerPage: pageSize" current-page="currentPage" class="CL_Comentario_Usuario_Producto Base-90 Padding-tablet Grid_Contenedor main_start now_wrap">
              <div class="Grid_Contenedor Base-10 abcenter">
                <div class="Grid_Contenedor Base-auto relative CL_TXT_Pri_Btn"><img ng-src="{{Comentarios_Productos.Imagen_Usuario}}" class="CL_Imagen_Icono_4"/><span class="CL_TXT_Info_Btn">{{Comentarios_Productos.Nombre_Usuario}}</span></div>
              </div>
              <div class="CL_Mensaje_Usuario_Comentario_Producto Grid_Item Grid_Contenedor abcenter Base-80">
                <div class="Grid_Contenedor abcenter CL_Mensaje_Comentario_Producto Grid_Total Padding-10">
                  <div class="CL_Nombre_Usuario_Comentario_Producto relative Base-100 Grid_Contenedor justify cross_start">
                    <div class="Grid_Item CL_TXT_Texto_3 CL_TXT_Gris Base-auto CL_TXT_Texto_Bold">{{Comentarios_Productos.Nombre_Usuario}}</div>
                    <div ng-click="FN_Ver_Opciones_Comentario($index)" ng-hide="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="Grid_Item relative Enlace icon-android-more-vertical Base-10"></div>
                    <div ng-show="Comentarios_Productos.BL_Opciones_Comentario == true" class="Grid_Contenedor CL_Opciones_Comentario ng_show">
                      <div id="CONT_Invisible" ng-click="FN_Ver_Opciones_Comentario($index)" ng-show="Comentarios_Productos.BL_Opciones_Comentario == true">
                        <div class="CL_Cerrar_Modal CL_Transparente"></div>
                      </div>
                      <div ng-click="FN_Editar_Comentario($index,1)" class="CL_Opcion Grid_Item Base-100 CL_TXT_Texto_1 CL_TXT_Gris Enlace">Editar</div>
                      <div ng-click="FN_Editar_Comentario(Num_Posicion_Comentario,2);FN_Eliminar_Comentario(Comentarios_Productos.PK_ID_Comentario)" class="CL_Opcion Grid_Item Base-100 CL_TXT_Texto_1 CL_TXT_Gris Enlace">Eliminar</div>
                    </div>
                  </div>
                  <div class="CONT_CL_Comentario_Producto Base-100">
                    <textarea ng-click="FN_Editar_Comentario($index,1)" ng-model="Comentarios_Productos.Descripcion" ng-if="Comentarios_Productos.Nombre_Usuario == dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-disabled=" Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="Textarea_Estilo_2 CONT_Mensaje_Producto CL_TXT_Texto_1 CL_TXT_Gris Base-100 tablet-80"> {{Comentarios_Productos.Descripcion}}</textarea>
                  </div>
                  <div ng-if="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-disabled=" Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="CONT_Mensaje_Producto CL_TXT_Texto_1 CL_TXT_Gris"> {{Comentarios_Productos.Descripcion}}</div>
                  <div class="CL_Herramientas_Comentario_Producto Grid_Contenedor Base-100 main_end Padding-5">
                    <div class="Grid_Item CL_TXT_Texto_1 CL_TXT_Gris Base-100 tablet-30">{{Comentarios_Productos.Fecha_Comentario | date:'longDate'}}</div>
                    <div ng-click="FN_Valoracion_Comentario($index)" ng-hide="Comentarios_Productos.Nombre_Usuario == dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="CL_Valoracion_Comentario_Producto Grid_Item relative CL_TXT_Pri_Btn icon-thumbs-o-up Base-30 tablet-20 Grid_Contenedor abcenter Enlace">{{Comentarios_Productos.Valoracion_Comentario}}<span class="CL_TXT_Info_Btn top-30_30 left-5">Valoraci&oacute;n</span></div>
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
<section id="SC_Ordenes_Enviadas" ng-show="BL_Ordenes_Enviadas == true">
  <div id="CONT_Invisible" ng-click="FN_Ordenes_Enviadas(1)">
    <div class="CL_Cerrar_Modal CL_Transparente"></div>
  </div>
  <div class="CL_CONT_Ordenes_Enviadas Grid_Contenedor Base-100 tablet-50 justify">
    <div class="Grid_Contenedor CL_Cabezera_Envio_Orden relative">
      <p ng-click="FN_Ordenes_Enviadas(4)" ng-if="BL_Detalle_Orden_Enviada == true &amp;&amp; BL_Ordenes_Enviadas_Flecha == true" class="Enlace icon-flecha2 relative left-10"></p>
      <p ng-click="FN_Ordenes_Enviadas(2)" ng-if="BL_Detalle_Orden_Enviada == true &amp;&amp; BL_Pedidos_Enviados_Flecha == true" class="Enlace icon-flecha2 relative left-10"></p>
      <div class="Grid_Contenedor abcenter Base-40">
        <p ng-show="BL_Lista_Ordenes_Enviadas == true" class="CL_TXT_Texto_4 CL_TXT_Gris center">Ordenes enviadas</p>
        <p ng-show="BL_Lista_Pedidos_Enviados == true" class="CL_TXT_Texto_4 CL_TXT_Gris center">Pedidos enviados</p>
        <p ng-show="BL_Detalle_Orden_Enviada == true" class="CL_TXT_Texto_4 CL_TXT_Gris center">Detalles</p>
      </div>
      <p ng-click="FN_Ordenes_Enviadas(1)" class="CL_Eliminar_1_1"></p>
    </div>
    <div ng-if="BL_Lista_Ordenes_Enviadas == true" class="Grid_Contenedor Cl_CONT_Envio_Orden Grid_Item cross_start">
      <div ng-repeat="Ordenes_Enviadas in AOBJ_Lista_Ordenes_Enviadas" class="Base-100 CL_Orden_Enviada abcenter ng_repeat_anim1">
        <div class="Grid_Contenedor Base-100">
          <div class="Tabla_Estilo_1">
            <table>
              <thead>
                <tr>
                  <th>Codigo </th>
                  <th>Estado</th>
                  <th class="Base-100">Fecha de envio</th>
                  <th>Dirrección</th>
                  <th>Telefono</th>
                  <th>Acciones</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{Ordenes_Enviadas.PK_ID_Cotizacion_Usuario}}</td>
                  <td class="CL_Estado_CONT">
                    <div class="CL_Icono_Estado CL_TXT_Pri_Btn relative">
                      <p ng-class="{'CL_Estado_Confirmado icon-agregar3': Ordenes_Enviadas.Estado_Cotizacion == 'Atendido','CL_Estado_Cancelado icon-cancelado': Ordenes_Enviadas.Estado_Cotizacion == 'Cancelado','CL_Estado_EnProgreso icon-actualizar': Ordenes_Enviadas.Estado_Cotizacion == 'En proceso'}"></p><span class="CL_TXT_Info_Btn left-10_10 top-10_10">{{Ordenes_Enviadas.Estado_Cotizacion}}</span>
                    </div>
                  </td>
                  <td>{{Ordenes_Enviadas.Fecha_Cotizacion}}</td>
                  <td>{{Ordenes_Enviadas.Direccion_entrega}}</td>
                  <td>{{Ordenes_Enviadas.Telefono_Entrega}}</td>
                  <td class="CL_Tbl_Icon">
                    <button title="Ver los detalles de esta orden" ng-click="FN_Ordenes_Enviadas(3);FN_Listar_Detalles_Orden_Pedido($index,1)" class="icon-eye CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-10_10 top-40_40">Ver detalles</span></button>
                  </td>
                  <td class="CL_Tbl_Icon">
                    <button ng-if="Ordenes_Enviadas.Estado_Cotizacion == 'Cancelado' || Ordenes_Enviadas.Estado_Cotizacion == 'Atendido'" title="Eliminar del tablero de pedidos" ng-click="FN_Ordenes_Enviadas(4);FN_Confirmacion_Alerta(8,$index,false,'¿Esta seguro de eliminar la orden?')" class="icon-cancelar3 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-10_10 top-40_40">Eliminar</span></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div ng-show="(AOBJ_Lista_Ordenes_Enviadas).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
        <p class="CL_TXT_Texto_3 CL_TXT_Gris left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Texto_5 CL_TXT_Gris">No se han encontrado ordenes</p>
      </div>
    </div>
    <div ng-if="BL_Lista_Pedidos_Enviados == true" class="Grid_Contenedor Cl_CONT_Envio_Orden Grid_Item cross_start">
      <div ng-repeat="Pedidos_Atendidos in AOBJ_Lista_Pedidos_Enviados" class="Base-100 CL_Orden_Enviada abcenter ng_repeat_anim1">
        <div class="Grid_Contenedor Base-100">
          <div class="Tabla_Estilo_1">
            <table>
              <thead>
                <tr>
                  <th>Codigo </th>
                  <th>Estado</th>
                  <th class="Base-100">Fecha de envio</th>
                  <th>Dirrección</th>
                  <th>Telefono</th>
                  <th>Acciones</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{Pedidos_Atendidos.PK_ID_Pedido}}</td>
                  <td class="CL_Estado_CONT">
                    <div class="CL_Icono_Estado CL_TXT_Pri_Btn relative">
                      <p ng-class="{'CL_Estado_Confirmado icon-agregar3': Pedidos_Atendidos.Estado_pedido == 'Atendido','CL_Estado_Cancelado icon-cancelado': Pedidos_Atendidos.Estado_pedido == 'Cancelado','CL_Estado_EnProgreso icon-actualizar': Pedidos_Atendidos.Estado_pedido == 'En proceso'}"></p><span class="CL_TXT_Info_Btn left-10_10 top-10_10">{{Pedidos_Atendidos.Estado_pedido}}</span>
                    </div>
                  </td>
                  <td>{{Pedidos_Atendidos.Fecha_Cotizacion}}</td>
                  <td>{{Pedidos_Atendidos.Direccion_entrega}}</td>
                  <td>{{Pedidos_Atendidos.Telefono_Entrega}}</td>
                  <td class="CL_Tbl_Icon">
                    <button title="Ver los detalles de esta orden" ng-click="FN_Ordenes_Enviadas(3);FN_Listar_Detalles_Orden_Pedido($index,2)" class="icon-eye CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-10_10 top-40_40">Ver detalles</span></button>
                  </td>
                  <td class="CL_Tbl_Icon">
                    <button ng-if="Pedidos_Atendidos.Estado_pedido == 'Cancelado' || Pedidos_Atendidos.Estado_pedido == 'Atendido'" title="Eliminar del tablero de pedidos" ng-click="FN_Ordenes_Enviadas(2);FN_Confirmacion_Alerta(7,$index,false,'¿Esta seguro de eliminar el pedido?')" class="icon-cancelar3 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn left-10_10 top-40_40">Eliminar</span></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div ng-show="(AOBJ_Lista_Pedidos_Enviados).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
        <p class="CL_TXT_Texto_3 CL_TXT_Gris left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Texto_5 CL_TXT_Gris">No se han encontrado pedido</p>
      </div>
    </div>
    <div ng-if="BL_Detalle_Orden_Enviada == true" class="Grid_Contenedor Cl_CONT_Envio_Orden Grid_Item cross_start">
      <p class="CL_TXT_Texto_4 CL_TXT_Gris">Detalles de la orden</p>
      <div class="CL_Alerta_5 Padding-10">Precio total de la orden: {{Total_Orden_Enviada | currency}}</div>
      <div class="Grid_Contenedor abcenter CON_Paginacion Invisible Visible-web">
        <div class="Grid_Contenedor Base-100 tablet-20">
          <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
        </div>
        <div class="Grid_Contenedor Base-20">
          <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
        </div>
        <dir-pagination-controls pagination-id="Pag" boundary-links="true" class="Base-70 tablet-60 cross_end Grid_Contenedor">
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
      <div dir-paginate="Ordenes_Detalle in AOBJ_Lista_Detalles_Pedido_Enviado | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage" pagination-id="Pag" class="Base-100 CL_Orden_Enviada abcenter">
        <div class="Grid_Contenedor Base-100 abcenter">
          <div class="Tabla_Estilo_1 width_fijo">
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
                <tr>
                  <td class="CL_Imagen"><img ng-src="{{Ordenes_Detalle.Ruta_Imagen_Producto}}"/></td>
                  <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Nombre_Producto}} </td>
                  <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Valor_Unitario | currency}}</td>
                  <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Cantidad_Productos}}</td>
                  <td class="CL_TXT_Texto_1 CL_TXT_Gris">{{Ordenes_Detalle.Sub_Total | currency}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="Grid_Contenedor CL_Opciones_Orden_Pedido abcenter">
      <div class="Grid_Contenedor Base-40 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="BL_Lista_Pedidos_Enviados = false;BL_Lista_Ordenes_Enviadas = true;FN_Listar_Ordenes_Enviadas();BL_Detalle_Orden_Enviada = false" class="Enlace icon-sign-out CL_TXT_Pri_Btn relative"><span class="CL_Cantidad top-10_10 absolute left-10_10"> {{dato.NUM_Cantida_Ordenes}}</span><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Cotizaciones enviadas</span></a></div>
      <div class="Grid_Contenedor Base-40 abcenter CL_Btn_Opcion_Orden_Pedido Grid_Item"><a ng-click="BL_Lista_Pedidos_Enviados = true;BL_Lista_Ordenes_Enviadas = false;BL_Detalle_Orden_Enviada = false;FN_Listar_Pedidos_Enviados()" class="Enlace icon-sign-in CL_TXT_Pri_Btn relative"><span class="CL_Cantidad top-10_10 absolute left-10_10"> {{dato.NUM_Cantida_Pedidos}}</span><span class="CL_TXT_Info_Btn top-40_40 left-10_10">Pedidos atendidos</span></a></div>
    </div>
  </div>
</section>