
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Inicio</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Inicio/Inicio.css"/>
<script src="<?php echo URL;?>public/js/Javascript/Pagina/Slider/Slider.js"></script><script>
document.getElementById("Body_Web_Page").addEventListener("load",MostrarSlider());
	alert("hola")
</script>
<!--css y scrits propios de la pagina-->
<section id="SC_Contenido_Pagina" ng-init="BL_Buscador_Productos = true">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <!--sesion para el slider de la pagína-->
  <main id="CONT_Principal">
    <section id="SC_Slider" ng-show="BL_Contenedor_Estado == false">
      <div id="CONT_Silder" class="Grid_Contenedor abcenter">
        <div id="CONT_Imagenes_Slider" class="Grid_Cotenedor abcenter column">
          <div id="CONT_Imagenes">
            <li ng-repeat="SlrLista in dato.AOBJ_Productos_Principal" class="CL_Slider_No_Seleccionado Grid_Contenedor"><img ng-src="{{SlrLista.Ruta_Imagen_Producto}}" alt="" class="Grid_Total"/>
              <div class="CL_Contenedor_Info Gird_Contenedor Grid_Item Base-100">
                <div class="CL_Cabezera_Slider Grid_Total"><img src="https://dl.dropboxusercontent.com/u/232442887/Allop/img/logo/Icono.png" alt=""/></div>
                <div class="CL_Info_Slider Grid_Total column">
                  <p class="CL_TXT_Nombre_Producto Grid_Item Base-100">{{SlrLista.Nombre_Producto}}</p>
                  <p class="CL_TXT_Descripcion Grid_Item Base-100">{{SlrLista.Descripcion}}</p>
                  <div class="CL_Btns_Slider Grid_Item Base-100 Grid_Contenedor cross_start"><a ng-class="{'Btn_Estilo_1':LisProduct.BL_Estado_Producto, 'Btn_Estilo_2': ! LisProduct.BL_Estado_Producto}" ng-click="LisProduct.BL_Estado_Producto =! LisProduct.BL_Estado_Producto " class="Btn_Estilo_1">
                      <p class="icon-agregar1">Agregar orden</p></a></div>
                </div>
              </div>
            </li>
          </div>
          <section id="SC_Btns" class="Grid_Contenedor abcenter Invisible Visible-movil">
            <li ng-click="FN_Pasar_Slider($index +1)" ng-repeat="SlrLista in dato.AOBJ_Productos_Principal" class="CL_Btn_No_Seleccionado Grid_Contenedor Grid_Item Base-35 abcenter"></li>
          </section>
        </div>
        <div id="Btns_Slider">
          <section id="Btns_Slider_Opciones" class="Gri_Contenedor distributed">
            <div id="CONT_After" class="Grid_Contenedor Grid_Item Base-35 abcenter">
              <div id="CONT_Btn_Atras" onclick="AtrasSlider()">
                <p class="icon-atras2"></p>
              </div>
            </div>
            <div id="CONT_Before" class="Grid_Contenedor Grid_Item Base-35 abcenter">
              <div id="CONT_Btn_Siguiente" onclick="SiguienteSlider()">
                <p class="icon-siguiente2"></p>
              </div>
            </div>
            <li id="CONT_Iniciar_Sld" onclick="IniciarSlider()" class="CL_Btn_Tiempo">
              <input id="Play" type="radio" name="Time" class="CL_Btn_Tiempo_Input"/>
              <label id="CONT_Radio_Btn_Tiempo" for="Play" class="Grid_Contenedor Grid_Item Base-35 abcenter">
                <p class="icon-iniciar"></p>
              </label>
            </li>
            <li id="CONT_Detener_Sld" onclick="DetenerSlider()" class="CL_Btn_Tiempo">
              <input id="Stop" type="radio" name="Time" class="CL_Btn_Tiempo_Input"/>
              <label id="CONT_Radio_Btn_Tiempo" for="Stop" class="Grid_Contenedor Grid_Item Base-35 abcenter">
                <p class="icon-pause"></p>
              </label>
            </li>
          </section>
        </div>
      </div>
      <div id="CONT_Arrow">
        <div id="CONT_Btn_Pasar_Pagina"><a ng-click="BL_Contenedor_Estado =! BL_Contenedor_Estado" class="CL_Arrow icon-flecha4"> </a></div>
      </div>
    </section>
    <section id="SC_Contenido" ng-show="BL_Contenedor_Estado == true">
      <div id="CONT_Arrow">
        <div id="CONT_Btn_Pasar_Pagina"><a ng-click="BL_Contenedor_Estado =! BL_Contenedor_Estado" class="CL_Arrow icon-flecha3"></a></div>
      </div>
      <div id="CONT_Principal">
        <div id="CONT_Contenido" class="Grid_Contenedor abcenter">
          <div id="CONT_Productos" ng-controller="Controlador_Registro_Producto" ng-init="FN_Listar_Productos()" class="Grid_Item Base-95 distributed">
            <div id="CONT_Buscador_Prouctos" ng-show="BL_Buscador_Productos == true &amp;&amp; BL_Ver_Buscador == true" class="Grid_Contenedor abcenter">
              <div ng-init="buscar;BL_Ver_Buscador_Producto = true" class="CL_Contenedor_Buscador">
                <input id="BuscarProducto" maxlength="15" type="search" name="buscar" placeholder="Buscar producto" ng-model="buscar" class="CL_Buscar"/>
                <label for="BuscarProducto" class="icon-buscar CL_Icono_Buscar"></label>
              </div>
            </div>
            <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
              <p title="Actualizar la lista de productos actuales" ng-click="FN_Listar_Productos()" class="icon-retweet CL_TXT_Enlace_4"></p>
            </div>
            <div id="CONT_P_Productos" ng-hide="LisProduct.Estado_Producto == 'Inhabilitado'" ng-class="{'CL_Producto_No_Agregado':LisProduct.BL_Estado_Producto, 'CL_Producto_Agregado': ! LisProduct.BL_Estado_Producto}" ng-repeat="LisProduct in dato.AOBJ_Productos_Principal |  filter:buscar:LisProduct.Nombre_Producto " class="ng_repeat_amiacion_1 Grid_Contenedor Base-100 web-90 abcenter">
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
                            <p>${{LisProduct.Valor_Unitario | currency}}</p>
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
          </div>
        </div>
      </div>
    </section>
  </main>
</section>