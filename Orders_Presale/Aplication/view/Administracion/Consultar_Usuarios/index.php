
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}}| Consultar usuarios</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Consultar_Usuarios/Consultar_Usuarios.css"/>
<section id="SC_Consultar_Usuarios">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div id="CONT_Consultar_Usuarios" ng-controller="Controlador_Consultar_Usuarios">
    <div class="Grid_Item Base-100">
      <div ng-init="BL_Edicion_Datos_Cuentas = false" class="CL_Alerta_5 Grid_Contenedor Base-90 Padding-10 main_end cross_end">
        <p class="Grid_Item Base-50">Consultar usuarios</p>
        <div class="Grid_Item Base-15">
          <div ng-init="Listar_Usuarios()" ng-click="Listar_Usuarios()" class="Btn_Estilo_5 icon-list-1">Listar usuarios</div>
        </div>
      </div>
    </div>
    <div class="Grid_Contenedor Base-100 abcenter">
      <div class="Tabla_Estilo_3 relative Grid_Item Base-95">
        <table>
          <thead>
            <tr>
              <th class="Imagen"> </th>
              <th>Codigo</th>
              <th>Usuario</th>
              <th>Correo </th>
              <th>Tipo cliente</th>
              <th>Disponibilidad</th>
              <th>Estado cuenta</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="Item in AOBJ_Lista_Usuarios_Registrados ">
              <td class="Imagen CL_Imagen relative"><img ng-src="{{Item.Imagen_Usuario}}"/><span ng-class="{Activo: Item.Disponibilidad == 'Activo', Inactivo: Item.Disponibilidad == 'Inactivo'}" title="Estado actual de tu cuenta" class="Estado_Usuario">
                  <p></p></span>
              </td>
              <td>{{Item.PK_ID_Usuario}}</td>
              <td>{{Item.Nombre_Usuario}}</td>
              <td>{{Item.Correo_Electronico}}</td>
              <td ng-show="Item.FK_ID_Rol == 2">Empleado</td>
              <td ng-show="Item.FK_ID_Rol == 3">Cliente</td>
              <td ng-show="Item.FK_ID_Rol == 1">Administrador</td>
              <td>
                <select ng-model="Item.Disponibilidad" ng-disabled="BL_Edicion_Datos_Cuentas == false" class="Select_1 Base-70 Grid_Item">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </td>
              <td>
                <bottom type="Presiona para cancelar la cuenta" ng-disabled="BL_Edicion_Datos_Cuentas == false" ng-click="FN_Inhabilitar_Estado_Cuenta_Usuario($index)" ng-class="{Invisible:Item.Estado_Cuenta == 'Cancelada', Visible: Item.Estado_Cuenta == 'En uso'}" class="Btn_Estilo_1">En uso</bottom>
                <bottom type="Presiona para habilitar la cuenta" ng-disabled="BL_Edicion_Datos_Cuentas == false" ng-click="FN_Habilitar_Estado_Cuenta_Usuario($index)" ng-class="{Invisible:Item.Estado_Cuenta == 'En uso', Visible: Item.Estado_Cuenta == 'Cancelada'}" class="Btn_Estilo_2">Cancelada</bottom>
              </td>
              <td class="CL_Tbl_Icon">
                <div ng-class="{Invisible:BL_Edicion_Datos_Cuentas == false, Visible: BL_Edicion_Datos_Cuentas == true}" ng-click="BL_Edicion_Datos_Cuentas =!BL_Edicion_Datos_Cuentas; FN_Modificar_Datos($index)" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></div>
                <div ng-class="{Invisible:BL_Edicion_Datos_Cuentas == true, Visible: BL_Edicion_Datos_Cuentas == false}" ng-click="BL_Edicion_Datos_Cuentas =!BL_Edicion_Datos_Cuentas" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>