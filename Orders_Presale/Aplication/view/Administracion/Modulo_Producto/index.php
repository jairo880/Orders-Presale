
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Modulo Productos</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Producto/Modulo_Producto.css"/>
<!--css y scrits propios de la pagina-->
<section id="SC_Contenido_Pagina_Productos" ng-init="FN_Listar_Productos();FN_Listar_Categoria();FN_Listar_Promocion()" ng-controller="Controlador_Registro_Producto">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <main id="Contenido_Productos" class="Grid_Contenedor abcenter">
    <div id="Grid_Item" class="CL_Contenedor_Productos">
      <div ng-init="BL_Consultar_Producto = true;BL_Registrar_Producto = false" class="CL_Alerta_5 Grid_Contenedor Base-90 Padding-10 main_end cross_end">
        <div class="Grid_Item Base-30">
          <p ng-show="BL_Registrar_Producto" class="ng_show CL_TXT_Texto_4"> Registrar productos</p>
          <p ng-show="BL_Consultar_Producto" ng-click="FN_Listar_Productos" class="ng_show CL_TXT_Texto_4"> Consultar productos</p>
        </div>
        <div ng-show="BL_Consultar_Producto" class="Grid_Item Base-30">
          <div class="CL_Contenedor_Buscador">
            <input id="BuscarOrden" type="text" name="" placeholder="Buscar producto" ng-model="Buscador_Productos" class="CL_Buscar"/>
            <label for="BuscarOrden" class="icon-buscar CL_Icono_Buscar"></label>
          </div>
        </div>
        <div ng-click="FN_Listar_Productos();BL_Registrar_Producto = false; BL_Consultar_Producto = true" class="Btn_Estilo_5">Productos</div>
        <div ng-click="BL_Registrar_Producto = true; BL_Consultar_Producto = false" class="Btn_Estilo_1 icon-plus">Nuevo producto</div>
      </div>
      <section ng-show="BL_Registrar_Producto == true" class="Grid-Item ng_show Base-100 abcenter">
        <form id="FORM_Registro" name="Form_Registro_Producto" ng-submit="Registrar_Producto(RP)" class="Grid_Contenedor Padding-tablet Base-90">
          <div id="CONT_Derecha" class="Grid_Contenedor Base-100 distributed movil-100 tablet-30">
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Item Base-100">
                <label for="Nombre_Producto">Nombre del producto</label>
                <input id="Nombre_Producto" maxlength="20" minlength="1" type="text" name="Nombre_Producto" ng-model="RP.Nombre_Producto" placeholder=" nombre del producto" required="required" class="Input_Estilo_1"/>
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Nombre_Producto.$error.required">
                  <p class="icon-exclamation">Este campo es obligatorio</p>
                </div>
              </div>
              <div class="Grid_Item Base-100">
                <label for="Precio_Producto">Precio del producto</label>
                <input id="Precio_Producto" max="15" min="1" type="number" name="Precio_Producto" ng-model="RP.Precio_Producto" placeholder="Precio unitario del producto" required="required" class="Input_Estilo_1"/>
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Precio_Producto.$error.required">
                  <p class="icon-exclamation">Este campo es obligatorio</p>
                </div>
              </div>
              <div class="Grid_Item Base-100">
                <div class="CL_Alerta_5 Padding-5">Categoria del producto	</div>
                <select ng-model="RP.Categoria" name="Categoria" value="Categoria" required="required" class="Select_1 Base-100">
                  <option value="{{Categoria.PK_ID_Categoria}}" ng-repeat="Categoria in AOBJ_Lista_Categoria">{{Categoria.Nombre_Categoria}}</option>
                  <option value="2">No posee categoria</option>
                </select>
                <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Categoria.$error.required">
                  <p class="icon-exclamation">Este campo es obligatorio</p>
                </div>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor cross_start distributed Base-100 tablet-70">
            <div id="CONT_Derecha" class="Grid_Item Base-100 tablet-50">
              <label for="#Descripcion_Producto">Descripción</label>
              <textarea id="Descripcion_Producto" type="text" name="Descripcion_Producto" ng-model="RP.Descripcion_Producto" placeholder="Descripciondel producto " required="required" class="Input_Estilo_1"></textarea>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Descripcion_Producto.$error.required">
                <p class="icon-exclamation">Este campo es obligatorio</p>
              </div>
              <label for="Cantidad_Maxima">Cantidad Maxima de productos</label>
              <input id="Cantidad_Maxima" max="10" min="1" type="number" name="Cantidad_Maxima" ng-model="RP.Cantidad_Maxima" placeholder="Cantidad maxima del producto" required="required" class="Input_Estilo_1"/>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Cantidad_Maxima.$error.required">
                <p class="icon-exclamation">Este campo es obligatorio</p>
              </div>
              <label for="Cantidad_Minima">Cantidad minima de productos</label>
              <input id="Cantidad_Minima" max="10" min="1" type="number" name="Cantidad_Minima" ng-model="RP.Cantidad_Minima" placeholder="Cantidad minima del producto" required="required" class="Input_Estilo_1"/>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Cantidad_Minima.$error.required">
                <p class="icon-exclamation">Este campo es obligatorio</p>
              </div>
            </div>
            <div id="CONT_Izquierda" class="Grid_Item Base-100 tablet-40">
              <div class="CL_Alerta_5 Padding-5">URL de la imagen</div>
              <input id="Imagen_Producto" maxlength="100" minlength="10" type="url" name="Imagen_Producto" ng-model="RP.Imagen" placeholder="URL" required="required" class="Input_Estilo_1"/>
              <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Imagen_Producto.$error.required">
                <p class="icon-exclamation">Este campo es obligatorio</p>
              </div>
              <div class="CL_Imagen_Producto_URL Grid_Contenedor Base-100 abcenter"><img ng-src="{{RP.Imagen }}"/>
                <div ng-show="RP.Imagen == null" class="Icon_Imagen icon-image"></div>
              </div>
            </div>
          </div>
          <div class="Base-100">
            <div class="CL_Alerta_5 Padding-10">Presentaci&oacute;n del producto</div>
            <div class="CL_COTN_Producto ng_repeat_anim1">
              <div class="CL_CONT_Imagen"><img ng-src="{{RP.Imagen }}"/>
                <div ng-show="RP.Imagen == null" class="Icon_Imagen icon-image"></div>
              </div>
              <div class="CONT_Informacion">
                <div class="CONT_Info_Producto">
                  <div class="CL_Nombre_Producto">
                    <p class="CL_TXT_Nombre">Nombre: {{RP.Nombre_Producto}}</p>
                    <div class="CL_Precio">
                      <p>Precio: {{RP.Precio_Producto}}</p>
                    </div>
                  </div>
                </div>
                <div class="CONT_Valoracion_Producto">
                  <div class="CL_Descripcion_Producto">
                    <p>Descripci&oacute;n: {{RP.Descripcion_Producto}}</p>
                  </div>
                  <div class="CL_CONT_Opiniones">
                    <div class="CL_Datos_Valoracion Grid_Cotenedor"><span class="icon-star Grid_Item Base-10"></span><span class="icon-star Grid_Item Base-10"></span><span class="icon-star Grid_Item Base-10"></span><span class="icon-star Grid_Item Base-10"></span><span class="icon-star Grid_Item Base-10"></span></div>
                    <div title="Ver las opiniones de otros usuarios" ng-click="Ver($index + 1)" class="icon-comentarios Btn_Estilo_5">Ver comentarios</div>
                  </div>
                </div>
                <div class="CL_Herramientas_Producto">
                  <div class="CL_Total_Producto">
                    <p>Subtotal:</p>
                    <input type="text" placeholder="total" value="{{ 1500}}" disabled="disabled" class="CL_Total_Input"/>
                  </div>
                  <div class="CL_Opciones_Herramienta">
                    <div class="CL_Cantidad_Productos">
                      <div class="CL_CONT_Datos">
                        <input id="ID_Input_Cantidad" max=" {{RP.Cantidad_Maxima}}" min=" {{RP.Cantidad_Minima}}" type="number"/>
                        <p>max {{RP.Cantidad_Maxima}}</p>
                        <p>min {{RP.Cantidad_Minima}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor Grid-Item abcenter Padding-30">
            <input id="submit" type="submit" ng-disabled="!Form_Registro_Producto.$valid " value="Registrar producto" class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_3">Limpiar formulario</a>
          </div>
        </form>
      </section>
      <section ng-show="BL_Consultar_Producto == true" class="ng_show Base-100">
        <form name="Form_Productos" class="CL_Tabla_Producto Grid_Contenedor abcenter">
          <div class="Tabla_Estilo_2">
            <table ng-init="BL_Activar_Edicion=false">
              <thead>
                <tr>
                  <th> </th>
                  <th>Nombre </th>
                  <th>Precio</th>
                  <th>Descripci&oacuten</th>
                  <th>C.Minimas</th>
                  <th>C.Maximas</th>
                  <th>Categor&iacute;a</th>
                  <th>Estado</th>
                  <th>Imagen</th>
                  <th> </th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="ListarProductos in AOBJ_Listar_Productos | filter:Buscador_Productos:ListarProductos.Nombre_Producto" class="ng_repeat_amiacion_1">
                  <td class="Imagen CL_Imagen"><img ng-src="{{ListarProductos.Ruta_Imagen_Producto}}"/></td>
                  <td> 
                    <input name="Nombre_Producto{{$index}}" type="text" ng-model="ListarProductos.Nombre_Producto" ng-disabled="BL_Activar_Edicion == false" maxlength="30" minlength="5" required="required" class="Input_Tabla"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.$pristine &amp;&amp; Form_Productos.Nombre_Producto{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un nombre</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.Nombre_Producto{{$index}}.$valid &amp;&amp; !Form_Productos.$pristine &amp;&amp; !Form_Productos.Nombre_Producto{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta</p>
                    </div>
                  </td>
                  <td>
                    <input required="required" name="Valor_Unitario{{$index}}" type="text" value="{{ListarProductos.Valor_Unitario}}" ng-model="ListarProductos.Valor_Unitario" ng-disabled="BL_Activar_Edicion == false" maxlength="4" minlength="1" class="Input_Tabla"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.$pristine &amp;&amp; Form_Productos.Valor_Unitario{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un valor para el precio</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.Valor_Unitario{{$index}}.$valid &amp;&amp; !Form_Productos.$pristine &amp;&amp; !Form_Productos.Valor_Unitario{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta</p>
                    </div>
                  </td>
                  <td class="CL_Tam_Texarea">
                    <textarea name="Descripcion{{$index}}" type="text" ng-model="ListarProductos.Descripcion_Producto" required="required" ng-disabled="BL_Activar_Edicion == false" maxlength="150" minlength="5" class="Textarea_Estilo_1"></textarea>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.$pristine &amp;&amp; Form_Productos.Descripcion{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un descripcion</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.Descripcion{{$index}}.$valid &amp;&amp; !Form_Productos.$pristine &amp;&amp; !Form_Productos.Descripcion{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta</p>
                    </div>
                  </td>
                  <td>
                    <input name="Cant_Unid_Min{{$index}}" value="{{ListarProductos.Cant_Unid_Min}}" type="text" ng-model="ListarProductos.Cant_Unid_Min" ng-disabled="BL_Activar_Edicion == false" maxlength="6" minlength="2" required="required" class="Input_Tabla"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.$pristine &amp;&amp; Form_Productos.Cant_Unid_Min{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un descripcion</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.Cant_Unid_Min{{$index}}.$valid &amp;&amp; !Form_Productos.$pristine &amp;&amp; !Form_Productos.Cant_Unid_Min{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta</p>
                    </div>
                  </td>
                  <td>
                    <input name="Cant_Unid_Max{{$index}}" value="{{ListarProductos.Cant_Unid_Max}}" type="text" ng-model="ListarProductos.Cant_Unid_Max" ng-disabled="BL_Activar_Edicion == false" maxlength="3" minlength="2" required="required" class="Input_Tabla"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.$pristine &amp;&amp; Form_Productos.Cant_Unid_Max{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un descripcion</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos.Cant_Unid_Max{{$index}}.$valid &amp;&amp; !Form_Productos.$pristine &amp;&amp; !Form_Productos.Cant_Unid_Max{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta</p>
                    </div>
                  </td>
                  <td>
                    <select ng-model="ListarProductos.FK_ID_Categoria" ng-disabled="BL_Activar_Edicion == false" class="Select_1">
                      <option value="{{Categoria.PK_ID_Categoria}}" ng-repeat="Categoria in AOBJ_Lista_Categoria">{{Categoria.Nombre_Categoria}}</option>
                    </select>
                  </td>
                  <td>
                    <select ng-model="ListarProductos.Estado_Producto" ng-disabled="BL_Activar_Edicion == false" class="Select_1">
                      <option value="Habilitado">Habilitado</option>
                      <option value="Inhabilitado">Inhabilitado</option>
                    </select>
                  </td>
                  <td class="CL_Tam_Texarea">
                    <textarea ng-model="ListarProductos.Ruta_Imagen_Producto" ng-disabled="BL_Activar_Edicion == false" class="Textarea_Estilo_1">{{ListarProductos.Ruta_Imagen_Producto}}</textarea>
                  </td>
                  <td class="CL_Tbl_Icon">
                    <p ng-click="FN_Ver_Promociones();FN_Listar_Promocion_Producto($index)" tytle="Ver las promociones asociadas a este producto" class="CL_TXT_Pri_Btn relative icon-cancelado"><span class="CL_TXT_Info_Btn">Promociones</span></p>
                  </td>
                  <td class="CL_Tbl_Icon">
                    <div ng-class="{Invisible:BL_Activar_Edicion == true, Visible: BL_Activar_Edicion == false}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                    <button ng-disabled="!Form_Productos.$valid" ng-class="{Invisible:BL_Activar_Edicion == false, Visible: BL_Activar_Edicion == true}" ng-click="BL_Activar_Edicion=!BL_Activar_Edicion; FN_Modificar_Productos($index)" value="Actualizar" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar </span></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div ng-show="(AOBJ_Listar_Productos |filter:Buscador_Productos:ListarProductos.Nombre_Producto).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor abcenter">
            <div class="CL_TXT_Texto_3 Base-20 Grid_Item abcenter Padding-10">No se han encontrado productos</div>
          </div>
          <div class="Grid_Contenedor">
            <div ng-click="FN_Listar_Productos()" class="Btn_Circular_4 bottom-30">
              <p class="icon-list-1"></p>
              <p class="CL_TXT_Info_Btn">Listar productos</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </main>
  <section id="SC_Promociones_Producto" ng-show="BL_Promociones_Producto == true">
    <div id="CONT_Promocioens_Prodcuto" class="Grid_Contenedor Base-100 abcenter">
      <div id="CONT_Invisible" ng-click="BL_Promociones_Producto = false">
        <div class="CL_Cerrar_Modal"></div>
      </div>
      <div class="Cl_Promociones_Producto Grid_Item Base-80 Grid_Contenedor justify cross_start">
        <div class="CL_Cabezera_Promociones_Producto Grid_Item Base-100 No_Padding">
          <p class="CL_Alerta_5 Padding-10">Producto: {{Nombre_Producto}}</p>
          <p ng-click="BL_Promociones_Producto = false" class="CL_Eliminar_1_1"></p>
        </div>
        <div class="CL_CONT_Promociones_Producto Grid_Item Base-60 Grid_Contenedor">
          <div class="CL_Alerta_6 Padding-5 Grid_Contenedor abcenter">Promociones asociadas a este producto</div>
          <div class="CL_CONT_Promociones Grid_Contenedor Base-100">
            <div class="Grid_Item Base-100 Grid_Contenedor column">
              <div ng-repeat="Promociones in AOBJ_Lista_Promociones_Producto" class="CL_Promociones_Listadas Grid_Contenedor justify">
                <div class="Grid_Item Base-60">
                  <label class="CL_TXT_Texto_3">{{Promociones.Nombre_Promocion}}</label>
                </div>
                <div class="Grid_Item Base-30">
                  <buttom ng-click="FN_Eliminar_Dll_Promocion_Producto($index)" class="Btn_Estilo_7">Remover</buttom>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="CL_CONT_Promociones Grid_Item Base-40 Grid_Contenedor">
          <div class="CL_Alerta_6 Padding-5 Grid_Contenedor abcenter">Promociones registradas</div>
          <div class="CL_CONT_Promociones Grid_Contenedor Base-100">
            <div class="Grid_Item Base-100 Grid_Contenedor column">
              <div ng-repeat="Promociones in AOBJ_Lista_Promociones" class="CL_Promociones_Listadas Grid_Contenedor justify">
                <div class="Grid_Item Base-35">
                  <label class="CL_TXT_Texto_3">{{Promociones.Nombre_Promocion}}</label>
                </div>
                <div class="Grid_Item Base-55 Grid_Contenedor abcenter">
                  <buttom ng-click="FN_Registrar_Dll_Producto_Promocion($index)" class="Btn_Estilo_1">Agregar</buttom>
                  <buttom ng-class="{Invisible:BL_Dtll_Promocion == true, Visible: BL_Dtll_Promocion == false}" ng-init="BL_Dtll_Promocion = false" ng-click="BL_Dtll_Promocion =! BL_Dtll_Promocion" class="Btn_Estilo_5 icon-eye">Detalle</buttom>
                  <buttom ng-class="{Invisible:BL_Dtll_Promocion == false, Visible: BL_Dtll_Promocion == true}" ng-click="BL_Dtll_Promocion =! BL_Dtll_Promocion" class="Btn_Estilo_5 icon-eye-slash">Ocultar</buttom>
                </div>
                <div ng_show="BL_Dtll_Promocion == true" class="CL_Dll_Promocion Grid_Item Base-100 ng_show">
                  <div class="CL_Alerta_7">{{Promociones.Nombre_Promocion}}</div>
                  <p>{{Promociones.Descripcion}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>