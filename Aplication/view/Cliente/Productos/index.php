
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Productos</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Cliente/Productos/Productos.css"/>
<!--css y scrits propios de la pagina-->


<section id="SC_P_Productos" ng-init="BL_Buscador_Productos = true" class="abcenter Grid_Contenedor">
  <main id="CONT_Listado_Productos" ng-controller="Controlador_Registro_Producto" ng-init="FN_Listar_Productos( 1, null );FN_Listar_Categorias_Productos(2)" class="Grid_Item No_Padding Base-100 distributed">
    <div id="CONT_Buscador_Prouctos" ng-show="BL_Buscador_Productos == true &amp;&amp; BL_Ver_Buscador == true" class="Grid_Contenedor abcenter">
      <div ng-init="buscar;BL_Ver_Buscador_Producto = true" class="CL_Contenedor_Buscador">
        <input id="BuscarProducto" maxlength="15" type="search" name="buscar" placeholder="Buscar producto" ng-model="buscar" class="CL_Buscar"/>
        <label for="BuscarProducto" class="icon-buscar CL_Icono_Buscar"></label>
      </div>
    </div>
    <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
      <p title="Actualizar la lista de productos actuales" ng-click="FN_Listar_Productos( 1, null )" class="icon-retweet CL_TXT_Enlace_4"></p>
    </div>
    <div id="CONT_P_Productos" ng-hide="LisProduct.Estado_Producto == 'Inhabilitado'" ng-class="{'CL_Producto_No_Agregado':LisProduct.BL_Estado_Producto, 'CL_Producto_Agregado': ! LisProduct.BL_Estado_Producto}" ng-repeat="LisProduct in dato.AOBJ_Productos_Principal |  filter:buscar:LisProduct.Nombre_Producto " class="ng_repeat_anim1 Grid_Contenedor Base-100 web-80 abcenter relative">
      <div ng-click="LisProduct.BL_Estado_Ver_Producto = true;LisProduct.BL_Estado_Valoracion = false;LisProduct.BL_Estado_Descripcion = false" class="icon-cube absolute top-5 right-50 CL_TXT_Pri_Btn Enlace CL_TXT_Icon_Gris CL_TXT_Texto_5 Base-auto"><span class="CL_TXT_Info_Btn">Producto</span></div>
      <div ng-click="LisProduct.BL_Estado_Ver_Producto = false;LisProduct.BL_Estado_Valoracion = false;LisProduct.BL_Estado_Descripcion = true" class="icon-question absolute top-5 right-90 CL_TXT_Pri_Btn Enlace CL_TXT_Icon_Gris CL_TXT_Texto_5 Base-auto"><span class="CL_TXT_Info_Btn">Descripci&oacute;n</span></div>
      <div class="Grid_Item Base-100 web-50">
        <div class="CL_P_Imagen Grid_Contenedor Base-100 abcenter"><img ng-src="{{LisProduct.Ruta_Imagen_Producto}}" class="CL_Imagen_3"/></div>
      </div>
      <!--Opciones de un producto							-->
      <div ng-show="LisProduct.BL_Estado_Ver_Producto" class="Grid_Item Base-100 web-50 ng_show">
        <div class="CONT_Informacion Base-100"></div>
        <div class="Base-100 No_Padding Padding-tablet">
          <div class="Grid_Contenedor Padding-10 border_bottom_1">
            <div class="Grid_Contenedor Base-auto">
              <p class="CL_TXT_Texto_5 CL_TXT_Texto_Bold CL_TXT_Gris">{{LisProduct.Nombre_Producto}}</p>
            </div>
            <div class="Grid_Contenedor Base-auto">
              <p class="CL_TXT_Texto_4 CL_TXT_Rojo_2 CL_TXT_Texto_Bold">{{LisProduct.Valor_Unitario | currency}}</p>
            </div>
          </div>
        </div>
        <div class="Grid_Item Base-100 Grid_Contenedor No_Padding now_wrap border_bottom_2 margin_top-40 margin_bottom-40">
          <div class="Grid_Contenedor Base-auto abcenter Padding-5">
            <input type="number" min="{{LisProduct.Cant_Unid_Min}}" max="{{LisProduct.Cant_Unid_Max}}" value="0" ng-model="LisProduct.NUM_Cantidad" ng-change="FN_Actualizar_Datos(1,LisProduct.PK_ID_Producto)" required="required" class="Input_Estilo_1 No_Margin"/>
          </div>
          <div class="Grid_Contenedor Padding-5 ng_show abcenter">
            <div class="Grid_Contenedor abcenter">
              <p class="CL_TXT_Texto_3 CL_TXT_Gris CL_TXT_Texto_Bold Base-auto">Subtotal:</p>
              <p ng-show=" LisProduct.NUM_Total_Producto &gt; 0" class="CL_TXT_Texto_2 CL_TXT_Rojo Base-auto ng_show CL_TXT_Texto_Bold">{{LisProduct.NUM_Total_Producto + '$'}}</p>
            </div>
          </div>
        </div>
        <div class="Grid_Contenedor abcenter">
          <div id="Agregar" class="Grid_Contenedor abcenter Base-auto"><a ng-class="{'Btn_Estilo_2':LisProduct.BL_Estado_Producto, 'Btn_Estilo_7': ! LisProduct.BL_Estado_Producto}" ng-click="LisProduct.BL_Estado_Producto =! LisProduct.BL_Estado_Producto ; FN_Agregar_Productos(LisProduct.PK_ID_Producto,$index)" class="icon-orden">{{LisProduct.TXT_Texto_Btn}}</a></div>
          <div class="Grid_Contenedor Base-40 abcenter">
            <div class="Grid_Contenedor now_wrap justify">
              <div class="Grid_Contenedor Base-100">
                <div class="CL_TXT_Texto_2 CL_TXT_Gris">{{LisProduct.Valoracion_Producto}}</div>
              </div>
              <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol != 5" ng-click="FN_Valorar_Producto(LisProduct.PK_ID_Producto,dato.AOBJ_Datos_Usuario[0].PK_ID_Usuario)" class="Grid_Contenedor icon-thumbs-o-up Base-auto abcenter Enlace"></div>
            </div>
            <div class="Progress_Bar Grid_Contenedor"><span style="width:{{LisProduct.Valoracion_Producto}}%"></span></div>
            <div title="Ver las opiniones de otros usuarios" ng-click="FN_Ver_Comentarios_Producto(LisProduct.PK_ID_Producto)" class="icon-chat-1 Btn_Estilo_6">Comentarios</div>
          </div>
        </div>
      </div>
      <!--Opciones de un producto							-->
      <div ng-show="LisProduct.BL_Estado_Descripcion" class="Grid_Item Base-100 tablet-50 ng_show">
        <div class="Grid_Contenedor column">
          <div class="CL_Descripcion_Producto Grid_Item">
            <div class="CL_TXT_Texto_5 CL_TXT_Texto_Bold Padding-5 CL_TXT_Gris border_bottom_1">Descripci&oacute;n</div>
            <div class="Grid_Contenedor Padding-5 CL_Con_Descripcion_Producto">
              <p class="CL_TXT_Texto_3 CL_TXT_Gris">{{LisProduct.Descripcion_Producto}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div ng-show="(dato.AOBJ_Productos_Principal |filter:buscar:LisProduct.Nombre_Producto).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor abcenter">
      <div class="CL_TXT_Texto_3 CL_TXT_Gris Grid_Contenedor abcenter CL_TXT_Texto_5 CL_TXT_Gris Padding-10">No se han encontrado productos</div>
    </div>
    <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
      <p title="Actualizar la lista de productos actuales" ng-click="FN_Listar_Productos( 1, null )" class="icon-retweet CL_TXT_Enlace_4"></p>
    </div>
    <!--Boton para desplegar chat-->
    <div ng-click="FN_Listar_Categorias_Productos(1)" class="Btn_Circular_3 bottom-90">
      <p class="icon-precio"></p>
      <p class="CL_TXT_Info_Btn">Categorias</p>
    </div>
    <!--Contenedor para las categorias-->
    <div ng-show="BL_Ver_Cont_Categorias" ng-controller="Controlador_Registro_Producto" class="CL_Contenedor_Estilo_3 Base-25 fixed right-5 bottom-100 ng_show Padding-10">
      <div class="Grid_Contenedor CL_Cabezera_Categorias relative abcenter">
        <div class="CL_TXT_Texto_2 CL_TXT_Gris Base-auto"> Categorias		</div>
        <div ng-click="FN_Listar_Categorias_Productos(1)" class="CL_TXT_Texto_2 icon-cancelar2 CL_TXT_Icon_Gris absolute Base-auto top-5 right-5 Enlace"></div>
        <div ng-click="FN_Listar_Categorias_Productos(2)" class="CL_TXT_Texto_2 icon-actualizar CL_TXT_Icon_Gris absolute Base-auto top-5 left-5 Enlace"></div>
      </div>
      <div class="Grid_Contenedor CL_Categoria_Lista">
        <div ng-class="{CL_Opcion_Desplegado: Categoria.Descripcion_Estado == true,CL_Opcion_Oculto: Categoria.Descripcion_Estado == false}" ng-repeat="Categorias in AOBJ_Categorias_Productos" ng-init="Categoria.Descripcion_Estado = false" class="Grid_Contenedor main_start border_bottom_1 CL_Categoria_Lista_Seleccion relative"><a ng-click="Categoria.Descripcion_Estado =! Categoria.Descripcion_Estado" class="CL_Btn_Enlace absolute right-5 Base-auto top-10_10"></a>
          <div ng-click="FN_Listar_Productos( 2,Categorias.PK_ID_Categoria)" class="Grid_Contenedor cross_start">
            <div class="Grid_Item Base-auto Grid_Contenedor abcenter margin_top-5 icon-buscar"></div>
            <div ng-click="FN_Listar_Productos( 2,Categorias.PK_ID_Categoria)" class="Grid_Item Base-auto">
              <div class="CL_TXT_Texto_2 CL_TXT_Gris">{{Categorias.Nombre_Categoria}}</div>
            </div>
          </div>
          <div ng-show="Categoria.Descripcion_Estado" class="Grid_Contenedor Descripcion ng_show">
            <div class="CL_TXT_Texto_2 CL_TXT_Gris">{{Categorias.Descripcion}}</div>
          </div>
        </div>
      </div>
      <div class="Grid_Contenedor column abcenter">
        <div class="CL_Alerta_5">
          <div class="CL_TXT_Texto_2">Filtrar productos deacuerdo a su categoria</div>
        </div>
        <div ng-click="FN_Listar_Productos(1)" class="Btn_Estilo_3">Ver todos los productos						</div>
      </div>
    </div>
  </main>
</section>