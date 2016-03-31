
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Modulo Productos</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Producto/Modulo_Producto.css"/>
<!--css y scrits propios de la pagina-->
<section id="SC_Contenido_Pagina_Productos" ng-init="FN_Listar_Productos();FN_Listar_Categoria();FN_Listar_Promocion()" ng-controller="Controlador_Registro_Producto">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <main id="Contenido_Productos" class="Grid_Contenedor abcenter">
    <div id="Grid_Item" ng-init="BL_Consultar_Producto = true;Edicion_Datos_Productos = false; BL_Registrar_Producto = false" class="Grid_Contenedor">
      <div ng-show="BL_Consultar_Producto == true" class="Tablero_Trabajo_1 Grid_Contenedor">
        <div class="Grid_Contenedor Base-95 abcenter CL_CONT_Principal_Tablero_Trabajo">
          <div class="Grid_Contenedor Base-90 CL_CONT_Tablero_Trabajo">
            <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
              <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
                <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
              </div>
              <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
                <div class="Grid_Contenedor Base-90 CL_Informacion_Tablero_1 cross_start">
                  <!--/----->
                  <section ng-show="BL_Registrar_Producto == true" class="Grid-Item ng_show Base-100 abcenter">
                    <div class="CL_Alerta_5 relative Padding-5">
                      <div class="CL_TXT_Texto_2">Registro de un producto</div>
                      <div ng-click="BL_Registrar_Producto = false" class="CL_Eliminar_1_1"></div>
                    </div>
                    <form id="FORM_Registro" name="Form_Registro_Producto" ng-submit="Registrar_Producto(RP)" class="Grid_Contenedor Padding-tablet Base-100">
                      <div class="Grid_Item Base-100 CL_Form_Registro_Producto">
                        <label for="Nombre_Producto">Nombre del producto</label>
                        <input id="Nombre_Producto" maxlength="20" minlength="1" type="text" name="Nombre_Producto" ng-model="RP.Nombre_Producto" placeholder=" nombre del producto" required="required" class="Input_Estilo_1"/>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Nombre_Producto.$error.required">
                          <p class="icon-exclamation">Este campo es obligatorio</p>
                        </div>
                        <label for="Precio_Producto">Precio del producto</label>
                        <input id="Precio_Producto" max="15" min="1" type="number" name="Precio_Producto" ng-model="RP.Precio_Producto" placeholder="Precio unitario del producto" required="required" class="Input_Estilo_1"/>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Precio_Producto.$error.required">
                          <p class="icon-exclamation">Este campo es obligatorio</p>
                        </div>
                        <div class="CL_Alerta_5 Padding-5">Categoria del producto	</div>
                        <select ng-model="RP.Categoria" name="Categoria" value="Categoria" required="required" class="Select_1 Base-100">
                          <option value="{{Categoria.PK_ID_Categoria}}" ng-repeat="Categoria in AOBJ_Lista_Categoria">{{Categoria.Nombre_Categoria}}</option>
                        </select>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Categoria.$error.required">
                          <p class="icon-exclamation">Este campo es obligatorio</p>
                        </div>
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
                        <div class="CL_Alerta_5 Padding-5">URL de la imagen</div>
                        <input id="Imagen_Producto" maxlength="100" minlength="10" type="url" name="Imagen_Producto" ng-model="RP.Imagen" placeholder="URL" required="required" class="Input_Estilo_1"/>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Producto.$pristine &amp;&amp; Form_Registro_Producto.Imagen_Producto.$error.required">
                          <p class="icon-exclamation">Este campo es obligatorio</p>
                        </div>
                        <div class="CL_Imagen_Producto_URL Grid_Contenedor Base-100 abcenter"><img ng-src="{{RP.Imagen }}"/>
                          <div ng-show="RP.Imagen == null" class="Icon_Imagen icon-image"></div>
                        </div>
                      </div>
                    </form>
                    <div class="Grid_Contenedor Grid-Item abcenter Padding-5">
                      <div class="Grid_Item Base-50">
                        <input id="submit" type="submit" ng-disabled="!Form_Registro_Producto.$valid " value="Registrar" class="Btn_Estilo_1"/>
                      </div>
                      <div class="Grid_Item Base-50"><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar </a></div>
                    </div>
                  </section>
                  <!--/----->
                  <div ng-show="BL_Registrar_Producto == false &amp;&amp; Edicion_Datos_Productos == false" class="CL_Alerta_5 Padding-5"> 
                    <p class="CL_TXT_Texto_2">Selecciona un producto para ver su informaci&oacute;n</p>
                  </div>
                  <div ng-show="Edicion_Datos_Productos == true" class="CL_Alerta_5 Padding-10 relative">Datos del producto
                    <div ng-click="Edicion_Datos_Productos = false" ng-show="Edicion_Datos_Productos == true" class="CL_Eliminar_1_1"></div>
                  </div>
                  <form name="Form_Productos_Ediccion" ng-show="Edicion_Datos_Productos == true" class="Grid_Contenedor abcenter">
                    <div class="Grid_Contenedor column CL_Edicicion_Producto">
                      <!--/----->
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Nombre producto</label>
                        <input name="Nombre_Producto" type="text" ng-model="Nombre_producto" maxlength="30" minlength="5" required="required" class="Input_Estilo_1"/>
                        <!--Mensaje de validacion-->
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.$pristine &amp;&amp; Form_Productos_Ediccion.Nombre_Producto.$error.required">
                          <p class="icon-key">Ingresa un nombre</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.Nombre_Producto.$valid &amp;&amp; !Form_Productos_Ediccion.$pristine &amp;&amp; !Form_Productos_Ediccion.Nombre_Producto.$error.required ">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                      </div>
                      <!--/------>
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Precio</label>
                        <input required="required" name="Valor_Unitario" type="text" value="{{Precio}}" ng-model="Precio" maxlength="4" minlength="1" class="Input_Estilo_1"/>
                        <!--Mensaje de validacion-->
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.$pristine &amp;&amp; Form_Productos_Ediccion.Valor_Unitario.$error.required">
                          <p class="icon-key">Ingresa un valor para el precio</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.Valor_Unitario.$valid &amp;&amp; !Form_Productos_Ediccion.$pristine &amp;&amp; !Form_Productos_Ediccion.Valor_Unitario.$error.required ">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                      </div>
                      <!--/------>
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Descripci&oacute;n</label>
                        <textarea name="Descripcion" type="text" ng-model="Descripcion" required="required" maxlength="150" minlength="5" class="Textarea_Estilo_1"></textarea>
                        <!--Mensaje de validacion-->
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.$pristine &amp;&amp; Form_Productos_Ediccion.Descripcion.$error.required">
                          <p class="icon-key">Ingresa un descripcion</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.Descripcion.$valid &amp;&amp; !Form_Productos_Ediccion.$pristine &amp;&amp; !Form_Productos_Ediccion.Descripcion.$error.required ">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                      </div>
                      <!--/------>
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Cantidad minima</label>
                        <input name="Cant_Unid_Min" value="{{Cantidad_Minima}}" type="text" ng-model="Cantidad_Minima" maxlength="6" minlength="2" required="required" class="Input_Estilo_1"/>
                        <!--Mensaje de validacion-->
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.$pristine &amp;&amp; Form_Productos_Ediccion.Cant_Unid_Min.$error.required">
                          <p class="icon-key">Ingresa un descripcion</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.Cant_Unid_Min.$valid &amp;&amp; !Form_Productos_Ediccion.$pristine &amp;&amp; !Form_Productos_Ediccion.Cant_Unid_Min.$error.required ">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                      </div>
                      <!--/------->
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Cantidad maxima</label>
                        <input name="Cant_Unid_Max" value="{{Cantiad_Maxima}}" type="text" ng-model="Cantiad_Maxima" maxlength="3" minlength="2" required="required" class="Input_Estilo_1"/>
                        <!--Mensaje de validacion-->
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.$pristine &amp;&amp; Form_Productos_Ediccion.Cant_Unid_Max.$error.required">
                          <p class="icon-key">Ingresa un descripcion</p>
                        </div>
                        <div id="CONT_Mensaje_Validacion" ng-show="!Form_Productos_Ediccion.Cant_Unid_Max.$valid &amp;&amp; !Form_Productos_Ediccion.$pristine &amp;&amp; !Form_Productos_Ediccion.Cant_Unid_Max.$error.required ">
                          <p class="icon-login">La cantidad de caracteres es muy corta</p>
                        </div>
                      </div>
                      <!--/------->
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Url imagen produto</label>
                        <textarea ng-model="Url_Imagen_Producto" class="Textarea_Estilo_1">{{Url_Imagen_Producto}}</textarea>
                        <div class="CL_Imagen_Producto_URL Grid_Contenedor Base-100 abcenter"><img ng-src="{{Url_Imagen_Producto}}"/></div>
                      </div>
                      <!--/---->
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Categoria</label>
                        <select ng-model="FK_ID_Categoria" class="Select_1 Base-100">
                          <option value="{{Categoria.PK_ID_Categoria}}" ng-repeat="Categoria in AOBJ_Lista_Categoria">{{Categoria.Nombre_Categoria}}</option>
                        </select>
                      </div>
                      <!--/----->
                      <div class="Grid_Contenedor">
                        <label class="CL_TXT_Texto_2">Estado</label>
                        <select ng-model="Estado_Producto" class="Select_1 Base-100">
                          <option value="Habilitado">Habilitado</option>
                          <option value="Inhabilitado">Inhabilitado</option>
                        </select>
                      </div>
                    </div>
                    <div class="Grid_Contenedor">
                      <div class="Grid_Item Base-50">
                        <button ng-disabled="!Form_Productos_Ediccion.$valid" ng-click="FN_Modificar_Productos()" class="Btn_Estilo_1">Actualizar</button>
                      </div>
                      <div class="Grid_Item Base-50">
                        <button ng-click="Edicion_Datos_Productos = false" class="Btn_Estilo_5">Cancelar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-70 cross_start CL_CONT_Tablero_Trabajo_2">
              <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
                <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                  <div class="CL_TXT_Texto_4">Consultar productos</div>
                </div>
              </div>
              <div class="Grid_Contenedor abcenter">
                <div class="Grid_Contenedor Base-95">
                  <div class="CL_Alerta_5 Grid_Contenedor Padding-5">
                    <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                      <div class="Grid_Item Base-30">
                        <div ng-click="FN_Listar_Productos()" class="Btn_Estilo_5">Consultar productos</div>
                      </div>
                      <div class="Grid_Item Base-30">
                        <div ng-click="BL_Registrar_Producto = true;Edicion_Datos_Productos = false" class="Btn_Estilo_1 icon-plus">Nuevo producto</div>
                      </div>
                      <div ng-show="BL_Consultar_Producto" class="Grid_Item Base-40">
                        <div class="CL_Contenedor_Buscador">
                          <input id="BuscarOrden" type="text" name="" placeholder="Buscar producto" ng-model="Buscar" class="CL_Buscar"/>
                          <label for="BuscarOrden" class="icon-buscar CL_Icono_Buscar"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="Grid_Contenedor">
                    <section class="ng_show Base-100">
                      <div class="Tabla_Estilo_2">
                        <table ng-init="BL_Activar_Edicion=false">
                          <thead>
                            <tr>
                              <th> </th>
                              <th>Nombre </th>
                              <th>Categor&iacute;a</th>
                              <th>Estado</th>
                              <th> </th>
                              <th> </th>
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
                            <tr dir-paginate="ListarProductos in AOBJ_Listar_Productos  | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage" class="ng_repeat_amiacion_1">
                              <td class="Imagen CL_Imagen"><img ng-src="{{ListarProductos.Ruta_Imagen_Producto}}"/></td>
                              <td> 
                                <input type="text" value="{{ListarProductos.Nombre_Producto}}" ng-disabled="BL_Activar_Edicion == false" class="Input_Tabla"/>
                              </td>
                              <td>
                                <select ng-disabled="BL_Activar_Edicion == false" ng-model="ListarProductos.FK_ID_Categoria" class="Select_1">
                                  <option value="{{Categoria.PK_ID_Categoria}}" ng-repeat="Categoria in AOBJ_Lista_Categoria">{{Categoria.Nombre_Categoria}}</option>
                                </select>
                              </td>
                              <td>
                                <select ng-disabled="BL_Activar_Edicion == false" ng-model="ListarProductos.Estado_Producto" class="Select_1">
                                  <option value="Habilitado">Habilitado</option>
                                  <option value="Inhabilitado">Inhabilitado</option>
                                </select>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <p ng-click="FN_Ver_Promociones();FN_Listar_Promocion_Producto($index)" tytle="Ver las promociones asociadas a este producto" class="CL_TXT_Pri_Btn relative icon-cancelado"><span class="CL_TXT_Info_Btn">Promociones</span></p>
                              </td>
                              <td class="CL_Tbl_Icon">
                                <div ng-click=" FN_Editar_Datos_Producto($index)" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div ng-show="(AOBJ_Listar_Productos |filter:Buscar).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                          <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
                            <p>Producto no encontrado				</p>
                          </div>
                        </div>
                      </div>
                      <div ng-show="(AOBJ_Listar_Productos |filter:Buscador_Productos:ListarProductos.Nombre_Producto).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor abcenter">
                        <div class="CL_TXT_Texto_3 Base-20 Grid_Item abcenter Padding-10">No se han encontrado productos</div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
              <div ng-repeat="Promociones in AOBJ_Lista_Promociones_Producto" class="CL_Promociones_Listadas Grid_Contenedor reverse">
                <div class="Grid_Item Base-60 Grid_Contenedor abcenter">
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
              <div ng-repeat="Promociones in AOBJ_Lista_Promociones" class="CL_Promociones_Listadas Grid_Contenedor reverse">
                <div class="Grid_Item Base-70 Grid_Contenedor abcenter">
                  <label class="CL_TXT_Texto_3 Grid_Contenedor abcenter">{{Promociones.Nombre_Promocion}}</label>
                </div>
                <div class="Grid_Item Base-20 Grid_Contenedor justify"><a ng-click="FN_Registrar_Dll_Producto_Promocion($index)" class="icon-plus CL_TXT_Pri_Btn relative Enlace"><span class="CL_TXT_Info_Btn">Agregar</span></a><a ng-class="{Invisible:BL_Dtll_Promocion == true, Visible: BL_Dtll_Promocion == false}" ng-init="BL_Dtll_Promocion = false" ng-click="BL_Dtll_Promocion =! BL_Dtll_Promocion" class="icon-eye CL_TXT_Pri_Btn relative Enlace"><span class="CL_TXT_Info_Btn">Detalle</span></a><a ng-class="{Invisible:BL_Dtll_Promocion == false, Visible: BL_Dtll_Promocion == true}" ng-click="BL_Dtll_Promocion =! BL_Dtll_Promocion" class="icon-eye-slash CL_TXT_Pri_Btn relative Enlace"><span class="CL_TXT_Info_Btn">Ocultar</span></a></div>
                <div ng_show="BL_Dtll_Promocion == true" class="CL_Alerta_1 CL_Dll_Promocion Grid_Item Base-100 ng_show">
                  <p class="CL_TXT_Texto_2">{{Promociones.Descripcion}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>