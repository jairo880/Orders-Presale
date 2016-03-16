
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Promociones </title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Promociones/Modulo_Promociones.css"/>
<section id="SC_Consultar_Usuarios" ng-controller="Controlador_Consultar_Promociones">
  <div id="CONT_Contenedor_Invisible_Header" ng-init="Consultar_Promociones()"></div>
  <div id="CONT_Consultar_Usuarios">
    <div class="Grid_Item Base-100">
      <div ng-init="BL_ActivarBTN_Modificar = false" class="CL_Alerta_6 Grid_Contenedor justify Padding-5 cross_center">
        <p ng-show="BL_Consultar_Promocion" class="Grid_Item Base-50">Consultar promociones</p>
        <p ng-show="BL_Registrar_Promocion" class="Grid_Item Base-50">Registrar nueva promoci&oacute;n</p>
        <div class="Grid_Item Base-15">
          <div ng-click="Consultar_Promociones()" class="Btn_Estilo_5 icon-list-1">Consultar</div>
        </div>
      </div>
    </div>
    <div id="Grid_Item" class="CL_Contenedor_Productos">
      <div ng-init="BL_Consultar_Promocion = true;BL_Registrar_Promocion = false" class="Grid_Contenedor Base-90 Padding-10 main_end abcenter">
        <div ng-click="BL_Registrar_Promocion = true; BL_Consultar_Promocion = false" class="Btn_Estilo_1 icon-agregar-producto">Agregar nueva promoci&oacute;n</div>
        <div ng-click="Consultar_Promociones();BL_Registrar_Promocion = false; BL_Consultar_Promocion = true" class="Btn_Estilo_5 icon-list-1">Promociones</div>
        <div ng-show="BL_Consultar_Promocion" class="Grid_Item Base-30">
          <div class="CL_Contenedor_Buscador">
            <input id="BuscarPromocion" type="text" name="" placeholder="Buscar promocion" ng-model="Buscar_Promocion" class="CL_Buscar"/>
            <label for="BuscarPromocion" class="icon-buscar CL_Icono_Buscar"> </label>
          </div>
        </div>
      </div>
    </div>
    <div ng-show="BL_Registrar_Promocion == true" class="Grid_Contenedor Base-100 abcenter ng_show">
      <div class="Grid_Item Base-30">
        <form id="FORM_Registro" name="Form_Registro_Promocion" ng-submit="Registrar_Promocion(RP)" class="Grid_Contenedor Padding-tablet Base-100 column">
          <label for="#Nombre_Promocion">Nombre promoci&oacute;n</label>
          <input id="Nombre_Promocion" maxlength="45" minlength="5" type="text" name="Nombre_Promocion" ng-model="RP.Nombre_Promocion" placeholder="Nombre" required="required" class="Input_Estilo_1"/>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Nombre_Promocion.$error.required">
            <p class="icon-alerta1">Este campo es obligatorio</p>
          </div>
          <label for="#Descripcion_Producto">Descripción</label>
          <textarea id="Descripcion_Promocion" maxlength="50" minlength="15" type="text" name="Descripcion_Promocion" ng-model="RP.Descripcion_Promocion" placeholder="En que consiste la promocion" required="required" class="Input_Estilo_1"></textarea>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Descripcion_Promocion.$error.required">
            <p class="icon-alerta1">Este campo es obligatorio</p>
          </div>
          <label for="Fecha_Nacimiento">Fecha de inicio promocion</label>
          <input id="Fecha_Inicio" name="Fecha_Inicio" type="date" placeholder="año-mes-día" ng-model="RP.Fecha_Inicio" required="required" class="Input_Estilo_1"/>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Fecha_Inicio.$error.required">
            <p class="icon-alerta1">Este campo es obligatorio</p>
          </div>
          <label for="Fecha_Nacimiento">Fecha fin de promocion</label>
          <input id="Fecha_Fin" name="Fecha_Fin" type="date" placeholder="año-mes-día" ng-model="RP.Fecha_Fin" required="required" class="Input_Estilo_1"/>
          <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Promocion.$pristine &amp;&amp; Form_Registro_Promocion.Fecha_Fin.$error.required">
            <p class="icon-alerta1">Este campo es obligatorio</p>
          </div>
          <div class="Grid_Contenedor Grid-Item abcenter Padding-30">
            <input id="submit" type="submit" value="Registrar promocion" ng-disabled="!Form_Registro_Promocion.$valid " class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_3">Limpiar formulario</a>
          </div>
        </form>
      </div>
    </div>
    <div ng-show="BL_Consultar_Promocion == true" class="Grid_Contenedor Base-100 abcenter ng_show">
      <div class="Tabla_Estilo_1 relative Grid_Item Base-95">
        <table>
          <thead>
            <tr>
              <th>Codigo promocion</th>
              <th>Nombre promocion</th>
              <th>Descripcion</th>
              <th>Fecha inicio de promocion </th>
              <th>Fecha final de promocion</th>
              <th>Enviar promoci&oacute;n</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody ng-init="BL_Activar_Edicion=false; BL_ActivarBTN_Modificar=false">
            <tr ng-repeat="Promociones in AOBJ_Consultar_Promociones | filter:Buscar_Promocion:Promociones.Nombre_Promocion ">
              <td>
                <input type="text" value="{{Promociones.PK_ID_Promocion}}" ng-disabled="true" maxlength="5"/>
              </td>
              <td>
                <input type="text" ng-model="Promociones.Nombre_Promocion" ng-disabled="BL_Activar_Edicion == false" maxlength="45"/>
              </td>
              <td>
                <input type="text" ng-model="Promociones.Descripcion" ng-disabled="BL_Activar_Edicion == false" maxlength="250"/>
              </td>
              <td>
                <input type="datetime" ng-model="Promociones.Fecha_Inicio" ng-disabled="BL_Activar_Edicion == false"/>
              </td>
              <td>
                <input type="datetime" ng-model="Promociones.Fecha_Fin" ng-disabled="BL_Activar_Edicion == false"/>
              </td>
              <td> 
                <div ng-class="{Invisible:BL_ActivarBTN_Modificar == true, Visible: BL_ActivarBTN_Modificar == false}" ng-click="BL_ActivarBTN_Modificar =! BL_ActivarBTN_Modificar;BL_Activar_Edicion =!BL_Activar_Edicion" class="Btn_Estilo_5 icon-lapiz">Editar</div>
                <div ng-class="{Invisible:BL_ActivarBTN_Modificar == false, Visible: BL_ActivarBTN_Modificar == true}" ng-click="FN_Modificar_Promociones($index);BL_ActivarBTN_Modificar =! BL_ActivarBTN_Modificar;BL_Activar_Edicion =! BL_Activar_Edicion" class="Btn_Estilo_2 icon-actualizar">Modificar</div>
              </td>
              <td>
                <div ng-click="FN_Enviar_Promociones()" class="Btn_Estilo_1 icon-enviar">Enviar</div>
              </td>
              <td>
                <div ng-click="FN_Eliminar_Promociones($index)" class="Btn_Estilo_2 icon-cancelar2">Eliminar</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="Grid_Contenedor">
      <div ng-click="Consultar_Promociones()" class="Btn_Circular_3 bottom-30">
        <p class="icon-list-1"></p>
        <p class="CL_TXT_Info_Btn">Consultar promociones</p>
      </div>
    </div>
  </div>
</section>