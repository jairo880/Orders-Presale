
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Promociones </title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Promociones/Modulo_Promociones.css"/>
<section id="SC_Consultar_Usuarios" ng-controller="Controlador_Consultar_Promociones">
  <div id="CONT_Contenedor_Invisible_Header" ng-init="Consultar_Promociones()"></div>
  <div id="CONT_Consultar_Usuarios">
    <div ng-init="BL_Consultar_Promocion = true;BL_Registrar_Promocion = false" class="CL_Alerta_5 Grid_Contenedor Base-90 Padding-10 main_end cross_end">
      <div class="Grid_Item Base-30">
        <p ng-show="BL_Consultar_Promocion" class="ng_show CL_TXT_Texto_4">Consultar promociones</p>
        <p ng-show="BL_Registrar_Promocion" class="ng_show CL_TXT_Texto_4">Registrar nueva promoci&oacute;n</p>
      </div>
      <div ng-show="BL_Consultar_Promocion" class="Grid_Item Base-30">
        <div class="CL_Contenedor_Buscador">
          <input id="BuscarPromocion" type="text" name="" placeholder="Buscar promocion" ng-model="Buscar_Promocion" class="CL_Buscar"/>
          <label for="BuscarPromocion" class="icon-buscar CL_Icono_Buscar"> </label>
        </div>
      </div>
      <div ng-click="Consultar_Promociones();BL_Registrar_Promocion = false; BL_Consultar_Promocion = true" class="Btn_Estilo_5 icon-list-1">Promociones</div>
      <div ng-click="BL_Registrar_Promocion = true; BL_Consultar_Promocion = false" class="Btn_Estilo_1 icon-plus">Nueva promoci&oacute;n</div>
    </div>
    <div id="CONT_Registro_Promocion" ng-show="BL_Registrar_Promocion == true" class="Grid_Contenedor Base-100 abcenter ng_show">
      <div id="FORM_Registro_Promocion" class="Grid_Item Base-60 Grid_Contenedor abcenter">
        <form id="FORM_Registro" name="Form_Registro_Promocion" ng-submit="Registrar_Promocion(RP)" class="Grid_Contenedor Padding-tablet Base-90">
          <div class="Grid_Contenedor abcenter Base-100">
            <p class="CL_Icono_3">{{ RP.Nombre_Promocion | limitTo : 1 : 0}}</p>
          </div>
          <div class="Grid_Item Base-50">
            <label for="Nombre_Promocion" class="CL_TXT_Texto_2">Nombre promoci&oacute;n</label>
            <input id="Nombre_Promocion" maxlength="45" minlength="5" type="text" name="Nombre_Promocion" ng-model="RP.Nombre_Promocion" placeholder="Nombre" required="required" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Nombre_Promocion.$error.required">
              <p class="icon-alerta1">Este campo es obligatorio</p>
            </div>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.Nombre_Promocion.$valid &amp;&amp; !Form_Registro_Promocion.$pristine &amp;&amp; !Form_Registro_Promocion.Nombre_Promocion.$error.required">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label for="Descripcion_Producto" class="CL_TXT_Texto_2">Descripción</label>
            <textarea id="Descripcion_Promocion" maxlength="50" minlength="15" type="text" name="Descripcion_Promocion" ng-model="RP.Descripcion_Promocion" placeholder="En que consiste la promocion" required="required" class="Textarea_Estilo_1"></textarea>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Descripcion_Promocion.$error.required">
              <p class="icon-alerta1">Este campo es obligatorio</p>
            </div>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.Descripcion_Promocion.$valid &amp;&amp; !Form_Registro_Promocion.$pristine &amp;&amp; !Form_Registro_Promocion.Descripcion_Promocion.$error.required">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
          </div>
          <div class="Grid_Item Base-50">
            <label for="Fecha_Nacimiento" class="CL_TXT_Texto_2">Fecha de inicio promocion</label>
            <input id="Fecha_Inicio" name="Fecha_Inicio" type="date" placeholder="año/mes/día" ng-model="RP.Fecha_Inicio" required="required" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Fecha_Inicio.$error.required">
              <p class="icon-alerta1">Este campo es obligatorio</p>
            </div>
            <label for="Fecha_Nacimiento" class="CL_TXT_Texto_2">Fecha fin de promocion</label>
            <input id="Fecha_Fin" name="Fecha_Fin" type="date" placeholder="año/mes/día" ng-model="RP.Fecha_Fin" required="required" class="Input_Estilo_1"/>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Fecha_Fin.$error.required">
              <p class="icon-alerta1">Este campo es obligatorio</p>
            </div>
            <div class="Grid_Contenedor Grid-Item abcenter Padding-30"></div>
            <input id="submit" type="submit" value="Registrar promocion" ng-disabled="!Form_Registro_Promocion.$valid " class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_3">Limpiar formulario</a>
          </div>
        </form>
      </div>
    </div>
    <div ng-show="BL_Consultar_Promocion == true" class="Grid_Contenedor Base-100 abcenter ng_show">
      <form name="Form_Promocion" class="Grid_Contenedor abcenter">
        <div class="Tabla_Estilo_3 relative Grid_Item Base-95">
          <table>
            <thead>
              <tr>
                <th class="Imagen">							</th>
                <th>Nombre </th>
                <th>Descripcion</th>
                <th>Fecha inicio de promocion </th>
                <th>Fecha final de promocion</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody ng-init="BL_Activar_Edicion=false; BL_ActivarBTN_Modificar=false">
              <tr ng-repeat="Promociones in AOBJ_Consultar_Promociones | filter:Buscar_Promocion:Promociones.Nombre_Promocion ">
                <td class="Imagen">
                  <p class="CL_Icono_3">{{ Promociones.Nombre_Promocion | limitTo : 1 : 0}}</p>
                </td>
                <td>
                  <input name="Nombre_Promocion{{$index}}" type="text" ng-model="Promociones.Nombre_Promocion" ng-disabled="BL_Activar_Edicion == false" maxlength="45" minlength="5" required="required" class="Input_Tabla"/>
                  <!--Mensaje de validacion-->
                  <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.$pristine &amp;&amp; Form_Promocion.Nombre_Promocion{{$index}}.$error.required ">
                    <p class="icon-login">Ingresa un nombre para la Promoci&oacute;n</p>
                  </div>
                  <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.Nombre_Promocion{{$index}}.$valid &amp;&amp; !Form_Promocion.$pristine &amp;&amp; !Form_Promocion.Nombre_Promocion{{$index}}.$error.required">
                    <p class="icon-login">La cantidad de caracteres es muy corta</p>
                  </div>
                </td>
                <td class="CL_Tam_Texarea">
                  <textarea name="Descripcion{{$index}}" type="text" ng-model="Promociones.Descripcion" ng-disabled="BL_Activar_Edicion == false" maxlength="50" minlength="15" required="required" class="Textarea_Estilo_1"></textarea>
                  <!--Mensaje de validacion-->
                  <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.$pristine &amp;&amp; Form_Promocion.Descripcion{{$index}}.$error.required ">
                    <p class="icon-login">Ingresa un nombre para la categoria</p>
                  </div>
                  <div id="CONT_Mensaje_Validacion" ng-show="!Form_Promocion.Descripcion{{$index}}.$valid &amp;&amp; !Form_Promocion.$pristine &amp;&amp; !Form_Promocion.Descripcion{{$index}}.$error.required">
                    <p class="icon-login">La cantidad de caracteres es muy corta</p>
                  </div>
                </td>
                <td>
                  <input type="datetime" ng-model="Promociones.Fecha_Inicio" ng-disabled="BL_Activar_Edicion == false" class="Input_Tabla"/>
                </td>
                <td>
                  <input type="datetime" ng-model="Promociones.Fecha_Fin" ng-disabled="BL_Activar_Edicion == false" class="Input_Tabla"/>
                </td>
                <td class="CL_Tbl_Icon">
                  <div ng-class="{Invisible:BL_ActivarBTN_Modificar == true, Visible: BL_ActivarBTN_Modificar == false}" ng-click="BL_ActivarBTN_Modificar =! BL_ActivarBTN_Modificar;BL_Activar_Edicion =!BL_Activar_Edicion" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
                  <button ng-disabled="!Form_Promocion.$valid" ng-class="{Invisible:BL_ActivarBTN_Modificar == false, Visible: BL_ActivarBTN_Modificar == true}" ng-click="FN_Modificar_Promociones($index);BL_ActivarBTN_Modificar =! BL_ActivarBTN_Modificar;BL_Activar_Edicion =! BL_Activar_Edicion" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                </td>
                <td class="CL_Tbl_Icon">
                  <div ng-click="FN_Enviar_Promociones()" class="icon-enviar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Enviar</span></div>
                </td>
                <td class="CL_Tbl_Icon">
                  <div ng-click="FN_Eliminar_Promociones($index)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    <div class="Grid_Contenedor">
      <div ng-click="Consultar_Promociones()" class="Btn_Circular_3 bottom-30">
        <p class="icon-list-1"></p>
        <p class="CL_TXT_Info_Btn">Consultar promociones</p>
      </div>
    </div>
  </div>
</section>