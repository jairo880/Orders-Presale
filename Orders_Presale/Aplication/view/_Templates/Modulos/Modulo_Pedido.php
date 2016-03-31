
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
          <p ng-click="FN_Envio_Orden(1)" class="icon-enviar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Enviar</span></p>
        </li>
        <li title="Mi lista" ng-click="BL_Estado_Procutos = ! BL_Estado_Procutos">
          <p ng-show="BL_Estado_Procutos == false" class="icon-orden ng_show CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Orden actual</span></p>
          <p ng-show="BL_Estado_Procutos == true" class="icon-lista ng_show CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn"> listas</span></p>
        </li>
        <li ng-show="dato.NUM_Cantidad_Productos_En_Orden &gt; 0" title="Eliminar todos los productos">
          <p ng-click="FN_Confirmacion_Alerta(1,2,false,'¿Eliminar productos actuales?')" class="icon-eliminar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Vaciar</span></p>
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
          <div id="CONT_Herramientas_Orden" class="Grid_Contenedor abcenter CON_Paginacion">
            <div class="Grid_Contenedor Base-10">
              <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
            </div>
            <div class="Grid_Contenedor Base-20">
              <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
            </div>
            <dir-pagination-controls boundary-links="true" class="Base-55 cross_end Grid_Contenedor">
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
          <div dir-paginate="Productos_Agregados in dato.AOBJ_Productos |  orderBy: 'PK_ID_Producto' | filter:buscar_producto:Productos_Agregados.Nombre_Producto  | itemsPerPage: pageSize" current-page="currentPage" class="CL_Producto_Orden ng_repeat_anim1">
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
  <section id="SC_Enviar_Orden" ng-init="BL_Datos_Envio_Producto = false">
    <div id="CONT_EnviarOrden" ng-show="BL_Ver_Envio_Orden == true">
      <div id="CONT_Invisible" ng-click="BL_Ver_Envio_Orden =! BL_Ver_Envio_Orden">
        <div class="CL_Cerrar_Modal"></div>
      </div>
      <div id="CONT_Enviar_Orden_List" ng-if="BL_Datos_Envio_Producto == true">
        <p class="CL_TXT_Texto_4">Orden actual</p>
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
              <tbody>
                <tr dir-paginate="Productos_Agregados in dato.AOBJ_Productos | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
                  <td class="CL_Imagen"> <img ng-src="{{Productos_Agregados.Ruta_Imagen_Producto}}" class="CL_Imagen_3"/></td>
                  <td>{{Productos_Agregados.Nombre_Producto}}</td>
                  <td>{{Productos_Agregados.Valor_Unitario | currency}}</td>
                  <td>
                    <input name="Cantidad_Productos{{$index}}" type="number" min="{{Productos_Agregados.Cant_Unid_Min}}" max="{{Productos_Agregados.Cant_Unid_Max}}" value="{{Productos_Agregados.NUM_Cantidad}}" ng-model="Productos_Agregados.NUM_Cantidad" ng-click="FN_Actualizar_Datos(2,Productos_Agregados.PK_ID_Producto)" required="required" class="Input_Estilo_1"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.$pristine &amp;&amp; Envio_Orden.Cantidad_Productos{{$index}}.$error.required">
                      <p class="icon-negocio">Ingrese la cantidad de productos a solicitar</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Envio_Orden.Cantidad_Productos{{$index}}.$valid &amp;&amp; !Envio_Orden.$pristine &amp;&amp; !Envio_Orden.Cantidad_Productos{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad a solicitar no es suficiente</p>
                    </div>
                  </td>
                  <td>{{Productos_Agregados.NUM_Costo | currency}}</td>
                  <td class="CL_Tbl_Icon">
                    <div ng-click="FN_Eliminar_Producto(Productos_Agregados.PK_ID_Producto)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                  </td>
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
            <div id="CONT_Confimar_Datos" class="Grid_Contenedor Base-100 abcenter">
              <div class="Grid_Item Base-100 tablet-30 Grid_Contenedor column">
                <p class="CL_TXT_Texto_4">Confirma la siguiente informaci&oacute;n para poder enviar t&uacute; orden</p>
                <label for="Direccion_Datos" class="CL_TXT_Texto_2 icon-ubicacion-1">Direcci&oacute;n de entrega</label>
                <select ng-init="Otra_Direccion = false; DT.Direccion_Entrega = dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento " class="Select_1">
                  <option ng-click="Otra_Direccion =! Otra_Direccion;DT.Direccion_Entrega = dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento" value="{{dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento}}">{{dato.AOBJ_Datos_Usuario[0].Direccion_Establecimiento}}</option>
                  <option value="Otra dirección" ng-click="Otra_Direccion =! Otra_Direccion;DT.Direccion_Entrega = ''">Otra dirección</option>
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
                <select ng-init="Otro_Telefono = false;DT.Telefono_Entrega = dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento" class="Select_1">
                  <option ng-click="Otro_Telefono =! Otro_Telefono;DT.Telefono_Entrega = dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento" value="{{dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento}}">{{dato.AOBJ_Datos_Usuario[0].Telefono_Establecimiento}}</option>
                  <option value="Otro telefono" ng-click="Otro_Telefono = true;DT.Telefono_Entrega = ''">Otro telefono</option>
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
                <button ng-disabled="!Envio_Orden.$valid " class="Btn_Estilo_1 icon-enviar">Enviar</button>
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
    <div id="CONT_Com_Product" class="Base-100 web-70 Grid_Contenedor">
      <div id="CON_Main_Comentarios" class="Grid_Contenedor Padding-5 Base-100 abcenter">
        <div id="CONT_Comentario" class="Base-100 Padding-5 main_start cross_start">
          <div class="CL_Crear_Comentario_Nuevo Grid_Contenedor abcenter Padding-5">
            <form ng-submit="FN_Registrar_Nuevo_Comentario(N)" name="Ingresar_Comentario_Producto" class="Base-100 Grid_Contenedor abcenter">
              <div id="CON_Cabezera_Comentarios" class="Grid_Contenedor Grid_Total justyfi">
                <p ng-show="!Ingresar_Comentario_Producto.$valid &amp;&amp; BL_Edicion_Datos_Comentario == false" class="CL_TXT_Texto_4 Grid_Total Grid_Contenedor abcenter ng_show">Comentarios</p>
                <p ng-show="!Ingresar_Comentario_Producto.$valid &amp;&amp; BL_Edicion_Datos_Comentario == false" ng-click="BL_Comentario  = false" class="CL_Eliminar_1_1"></p>
                <div ng-show="Ingresar_Comentario_Producto.$valid &amp;&amp; BL_Edicion_Datos_Comentario == false" class="Grid_Item Base-100 ng_show justify Grid_Contenedor ng_show">
                  <div class="Grid_Item Base-10 Grid_Contenedor abcenter"><a ng-click="N.Comentario = ''" class="CL_TXT_Texto_5 icon-android-close Enlace"></a></div>
                  <div class="Grid_Item Base-60 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4 Grid_Total Grid_Contenedor abcenter">Nuevo comentario </div>
                  </div>
                  <div class="Grid_Item Base-20 Grid_Contenedor abcenter">
                    <button ng-disabled="!Ingresar_Comentario_Producto.$valid" type="submit" class="icon-android-done CL_TXT_Texto_5 Enlace"></button>
                  </div>
                </div>
                <div ng-show="BL_Edicion_Datos_Comentario == true" class="Grid_Item Base-100 ng_show justify Grid_Contenedor ng_show">
                  <div class="Grid_Item Base-10 Grid_Contenedor abcenter"><a ng-click="FN_Editar_Comentario(Num_Posicion_Comentario,2)" class="CL_TXT_Texto_5 icon-android-close Enlace"></a></div>
                  <div class="Grid_Item Base-60 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4 Grid_Total Grid_Contenedor abcenter">Editar Comentario</div>
                  </div>
                  <div class="Grid_Item Base-10 Grid_Contenedor abcenter"><a ng-click="FN_Modificar_Comentario(Num_Posicion_Comentario)" class="CL_TXT_Texto_5 Enlace Enlace icon-android-done"></a></div>
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
            <div dir-paginate="Comentarios_Productos in dato.AOBJ_Comentarios_Producto  | itemsPerPage: pageSize" current-page="currentPage" class="CL_Comentario_Usuario_Producto Base-100 Padding-tablet Grid_Contenedor main_start">
              <div class="CL_Imagen_Usuario_Comentario_Producto Grid_Item"><img ng-src="{{Comentarios_Productos.Imagen_Usuario}}" class="CL_Imagen_1"/></div>
              <div class="CL_Mensaje_Usuario_Comentario_Producto Base-75 tablet-85 Grid_Item Grid_Contenedor abcenter">
                <div class="Grid_Contenedor abcenter CL_Mensaje_Comentario_Producto Grid_Total Padding-10">
                  <div class="CL_Nombre_Usuario_Comentario_Producto relative Base-100 Grid_Contenedor justify abcenter">
                    <div class="Grid_Item CL_TXT_Texto_3 tablet-80">{{Comentarios_Productos.Nombre_Usuario}}</div>
                    <div ng-click="FN_Ver_Opciones_Comentario($index)" ng-hide="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="Grid_Item relative Enlace icon-android-more-vertical Base-10"></div>
                    <div ng-show="Comentarios_Productos.BL_Opciones_Comentario == true" class="Grid_Contenedor CL_Opciones_Comentario ng_show">
                      <div id="CONT_Invisible" ng-click="FN_Ver_Opciones_Comentario($index)" ng-show="Comentarios_Productos.BL_Opciones_Comentario == true">
                        <div class="CL_Cerrar_Modal CL_Transparente"></div>
                      </div>
                      <div ng-click="FN_Editar_Comentario($index,1)" class="CL_Opcion Grid_Item Base-100 CL_TXT_Texto_1 Enlace">Editar</div>
                      <div ng-click="FN_Eliminar_Comentario(Comentarios_Productos.PK_ID_Comentario)" class="CL_Opcion Grid_Item Base-100 CL_TXT_Texto_1 Enlace">Eliminar</div>
                    </div>
                  </div>
                  <div class="CONT_CL_Comentario_Producto Base-100">
                    <textarea ng-click="FN_Editar_Comentario($index,1)" ng-model="Comentarios_Productos.Descripcion" ng-if="Comentarios_Productos.Nombre_Usuario == dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-disabled=" Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="Textarea_Estilo_2 CONT_Mensaje_Producto CL_TXT_Texto_1 Base-100 tablet-80"> {{Comentarios_Productos.Descripcion}}</textarea>
                  </div>
                  <div ng-if="Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" ng-disabled=" Comentarios_Productos.Nombre_Usuario != dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="CONT_Mensaje_Producto CL_TXT_Texto_1"> {{Comentarios_Productos.Descripcion}}</div>
                  <div class="CL_Herramientas_Comentario_Producto fixed Grid_Contenedor Base-100 main_end Padding-5">
                    <div class="Grid_Item CL_TXT_Texto_1 Base-100 tablet-30">{{Comentarios_Productos.Fecha_Comentario | date:'longDate'}}</div>
                    <div ng-click="FN_Valoracion_Comentario($index)" ng-hide="Comentarios_Productos.Nombre_Usuario == dato.AOBJ_Datos_Usuario[0].Nombre_Usuario" class="CL_Valoracion_Comentario_Producto Grid_Item relative CL_TXT_Pri_Btn icon-heart Base-30 tablet-20">{{Comentarios_Productos.Valoracion_Comentario}}<span class="CL_TXT_Info_Btn top-30_30">Puntos</span></div>
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
  <div class="CL_CONT_Ordenes_Enviadas Grid_Contenedor Base-100 tablet-40">
    <div class="Grid_Contenedor CL_Cabezera_Envio_Orden">
      <p class="CL_TXT_Texto_4 center">Ordenes enviadas</p>
      <p ng-click="FN_Ordenes_Enviadas(2)" ng-if="BL_Detalle_Orden_Enviada == true" class="Enlace icon-flecha2 relative top-40_40 left-10"></p>
      <p ng-click="FN_Ordenes_Enviadas(1)" class="CL_Eliminar_1_1"></p>
    </div>
    <div ng-if="BL_Lista_Ordenes_Enviadas == true" class="Grid_Contenedor Cl_CONT_Envio_Orden Grid_Item cross_start">
      <div ng-repeat="Ordenes_Enviadas in AOBJ_Lista_Ordenes_Enviadas" class="Grid_Item Base-100 CL_Orden_Enviada abcenter ng_repeat_anim1">
        <div class="Grid_Contenedor Base-100">
          <div class="Tabla_Estilo_1">
            <table>
              <thead>
                <tr>
                  <th>Codigo </th>
                  <th>Estado</th>
                  <th>Fecha de envio</th>
                  <th>Dirrección</th>
                  <th>Telefono</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{Ordenes_Enviadas.PK_ID_Cotizacion_Usuario}}</td>
                  <td class="CL_Estado_CONT">
                    <div class="CL_Icono_Estado CL_TXT_Pri_Btn relative">
                      <p ng-class="{'CL_Estado_Confirmado icon-agregar3': Ordenes_Enviadas.Estado_Cotizacion == 'Atendido','CL_Estado_Cancelado icon-cancelado': Ordenes_Enviadas.Estado_Cotizacion == 'Cancelado','CL_Estado_EnProgreso icon-actualizar': Ordenes_Enviadas.Estado_Cotizacion == 'En proceso'}"></p><span class="CL_TXT_Info_Btn">{{Ordenes_Enviadas.Estado_Cotizacion}}</span>
                    </div>
                  </td>
                  <td>{{Ordenes_Enviadas.Fecha_Cotizacion}}</td>
                  <td>{{Ordenes_Enviadas.Direccion_entrega}}</td>
                  <td>{{Ordenes_Enviadas.Telefono_Entrega}}</td>
                </tr>
              </tbody>
            </table>
            <div class="Grid_Contenedor justify">
              <p title="Ver los detalles de esta orden" ng-click="FN_Ordenes_Enviadas(3);FN_Listar_Detalles_Ordene_Enviada($index)" class="Btn_Estilo_7 icon-eye">Ver orden</p>
              <p ng-if="Ordenes_Enviadas.Estado_Cotizacion == 'Cancelado' || Ordenes_Enviadas.Estado_Cotizacion == 'Atendido'" title="Eliminar esta orden" ng-click="FN_Ordenes_Enviadas(2);FN_Confirmacion_Alerta(7,$index,false,'¿Esta seguro de eliminar la orden?')" class="Btn_Estilo_5 icon-cancelar2">Eliminar</p>
            </div>
          </div>
        </div>
      </div>
      <div ng-show="(AOBJ_Lista_Ordenes_Enviadas).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
        <p class="CL_TXT_Texto_3 left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Texto_5">No se han encontrado ordenes</p>
      </div>
    </div>
    <div ng-if="BL_Detalle_Orden_Enviada == true" class="Grid_Contenedor Cl_CONT_Envio_Orden Grid_Item cross_start">
      <p class="CL_TXT_Texto_4">Detalles de la orden</p>
      <div class="CL_Alerta_5 Padding-10">Precio total de la orden: {{Total_Orden_Enviada | currency}}</div>
      <div class="Grid_Contenedor abcenter CON_Paginacion">
        <div class="Grid_Contenedor Base-10">
          <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
        </div>
        <div class="Grid_Contenedor Base-20">
          <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
        </div>
        <dir-pagination-controls boundary-links="true" class="Base-55 cross_end Grid_Contenedor">
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
      <div dir-paginate="Ordenes_Detalle in AOBJ_Lista_Detalles_Ordenes_Enviadas | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage" class="Grid_Item Base-100 CL_Orden_Enviada abcenter">
        <div class="Grid_Contenedor Base-100">
          <div class="Tabla_Estilo_1">
            <table>
              <thead>
                <tr>
                  <th> </th>
                  <th class="CL_TXT_Texto_1">Precio</th>
                  <th class="CL_TXT_Texto_1">Sub total</th>
                  <th class="CL_TXT_Texto_1">Cantidad</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="CL_Imagen"><img ng-src="{{Ordenes_Detalle.Ruta_Imagen_Producto}}"/></td>
                  <td class="CL_TXT_Texto_1">{{Ordenes_Detalle.Valor_Unitario | currency}}</td>
                  <td class="CL_TXT_Texto_1">{{Ordenes_Detalle.Sub_Total | currency}}</td>
                  <td class="CL_TXT_Texto_1">{{Ordenes_Detalle.Cantidad_Productos}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>