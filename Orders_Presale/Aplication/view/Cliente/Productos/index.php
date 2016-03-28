
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Productos</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Cliente/Productos/Productos.css"/>
<!--css y scrits propios de la pagina-->


<section id="SC_P_Productos" ng-init="BL_Buscador_Productos = true" class="abcenter Grid_Contenedor">
  <main id="CONT_Listado_Productos" ng-controller="Controlador_Registro_Producto" ng-init="FN_Listar_Productos()" class="Grid_Item No_Padding Base-100 distributed">
    <div id="CONT_Buscador_Prouctos" ng-show="BL_Buscador_Productos == true &amp;&amp; BL_Ver_Buscador == true" class="Grid_Contenedor abcenter">
      <div ng-init="buscar;BL_Ver_Buscador_Producto = true" class="CL_Contenedor_Buscador">
        <input id="BuscarProducto" maxlength="15" type="search" name="buscar" placeholder="Buscar producto" ng-model="buscar" class="CL_Buscar"/>
        <label for="BuscarProducto" class="icon-buscar CL_Icono_Buscar"></label>
      </div>
    </div>
    <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
      <p title="Actualizar la lista de productos actuales" ng-click="FN_Listar_Productos()" class="icon-retweet CL_TXT_Enlace_4"></p>
    </div>
    <div id="CONT_P_Productos" ng-hide="LisProduct.Estado_Producto == 'Inhabilitado'" ng-class="{'CL_Producto_No_Agregado':LisProduct.BL_Estado_Producto, 'CL_Producto_Agregado': ! LisProduct.BL_Estado_Producto}" ng-repeat="LisProduct in dato.AOBJ_Productos_Principal |  filter:buscar:LisProduct.Nombre_Producto " class="ng_repeat_anim1 Grid_Contenedor Base-100 web-85 abcenter">
      <div class="Grid_Item Base-100 web-50">
        <div class="CL_P_Imagen Grid_Contenedor Base-100 abcenter"><img ng-src="{{LisProduct.Ruta_Imagen_Producto}}" class="CL_Imagen_3"/></div>
      </div>
      <div class="Grid_Item Base-100 web-50">
        <div class="CONT_Informacion Base-100"></div>
        <div class="Base-100 No_Padding Padding-tablet">
          <div class="ContInfoProducto">
            <div class="CL_TXT_Nombre">
              <p class="CL_TXT_NombreTitulo">{{LisProduct.Nombre_Producto}}</p>
            </div>
            <div class="CL_Botones">
              <div id="Agregar" class="Grid_Contenedor abcenter"><a ng-class="{'Btn_Estilo_1':LisProduct.BL_Estado_Producto, 'Btn_Estilo_7': ! LisProduct.BL_Estado_Producto}" ng-click="LisProduct.BL_Estado_Producto =! LisProduct.BL_Estado_Producto ; FN_Agregar_Productos(LisProduct.PK_ID_Producto,$index)" class="icon-orden">{{LisProduct.TXT_Texto_Btn}}</a></div>
            </div>
          </div>
          <div class="Base-100 tablet-100"></div>
          <div class="CL_ValoracionProducto Grid_Contenedor">
            <div class="CL_Descripcion_Producto Grid_Item">
              <div class="CL_Alerta_5 Padding-5">Descripci&oacute;n:</div>
              <div class="CL_Alerta_2 Padding-5"> 
                <p class="CL_TXT_Texto_2">{{LisProduct.Descripcion_Producto}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="CONT_Informacion Base-100">
          <div class="Base-100 tablet-100">
            <div class="CL_ValoracionProducto Grid_Contenedor justify">
              <div class="CL_ContOpiniones Grid_Item Grid_Contenedor abcenter Base-100 tablet-100 web-30">
                <div class="Grid_Item Grid_Contenedor abcenter">
                  <div class="CL_Precio">
                    <p>{{LisProduct.Valor_Unitario | currency}}</p>
                  </div>
                  <div class="CL_Datos_Valoracion"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                  <div title="Ver las opiniones de otros usuarios" ng-click="FN_Ver_Comentarios_Producto(LisProduct.PK_ID_Producto)" class="icon-comentarios Btn_Estilo_5">Ver comentarios</div>
                </div>
              </div>
              <div class="Grid_Item Base-100 tablet-100 web-50 Grid_Contenedor No Padding">
                <div class="CL_TotalProducto CL_Alerta_5 Padding-5 Grid_Contenedor">
                  <p class="CL_TXT_Texto_3">Subtotal:</p>
                  <input type="text" placeholder="total" value="{{LisProduct.NUM_Total_Producto + '$'}}" disabled="disabled" class="CL_INPUT_Total"/>
                </div>
                <div class="CL_Opciones_Herramienta">
                  <div class="CL_Cantidad_Productos Grid_Contenedor">
                    <div class="CL_Datos Grid_Contenedor abcenter">
                      <input id="ID_INPUT_Cantidad" type="number" min="{{LisProduct.Cant_Unid_Min}}" max="{{LisProduct.Cant_Unid_Max}}" value="0" ng-model="LisProduct.NUM_Cantidad" ng-click="FN_Actualizar_Datos(1,LisProduct.PK_ID_Producto)" required="required"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div ng-show="(dato.AOBJ_Productos_Principal |filter:buscar:LisProduct.Nombre_Producto).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor abcenter">
      <div class="CONT_Figura Padding-5 Invisible"><span class="Invisible"></span><span class="Invisible"></span><span class="Invisible"></span><span class="Invisible"></span></div>
      <div class="CL_TXT_Texto_3 Grid_Contenedor abcenter CL_TXT_Texto_5">No se han encontrado productos</div>
    </div>
    <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
      <p title="Actualizar la lista de productos actuales" ng-click="FN_Listar_Productos()" class="icon-retweet CL_TXT_Enlace_4">						</p>
    </div>
  </main>
</section>