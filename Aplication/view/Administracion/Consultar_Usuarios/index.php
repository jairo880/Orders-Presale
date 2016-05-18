
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}}| Consultar usuarios</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Consultar_Usuarios/Consultar_Usuarios.css"/>
<section id="SC_Consultar_Usuarios">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div id="CONT_Consultar_Usuarios" ng-controller="Controlador_Consultar_Usuarios">
    <div class="Grid_Contenedor Base-100 abcenter">
      <div ng-init="FN_Listar_Roles_Usuarios();BL_Edicion_Datos_Cuentas = false;Listar_Usuarios(3)" class="Tabla_Estilo_1 relative Grid_Item Base-90">
        <table>
          <thead>
            <tr>
              <th class="Imagen Invisible Visible-tablet"></th>
              <th>Usuario</th>
              <th>Correo </th>
              <th>Telefono</th>
              <th>Disponibilidad</th>
              <th>Tipo cliente</th>
              <th>Estado cuenta</th>
              <th>Verificacion Cuenta</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <div class="Grid_Contenedor abcenter CON_Paginacion">
            <div class="Grid_Contenedor Base-20 CL_TXT_Pri_Btn relative">
              <select title="Listar registros con estados de cuenta" class="Select_1 Base-100 Grid_Item">
                <option ng-click="FN_Consultar_Cuentas_Por_Verificar(Nombre_Verificacion_2)" value="Por_Verificar">Por Verificar</option>
                <option ng-click="FN_Consultar_Cuentas_Por_Verificar(Nombre_Verificacion)" value="Verificadas">Verificadas</option>
              </select>
            </div>
            <div class="Base-20 Grid_Contenedor main_end">
              <div class="Grid_Contenedor Base-80">
                <div class="CL_Contenedor_Buscador">
                  <input id="Buscar" type="text" name="" placeholder="Buscar usuario" ng-model="Buscar" class="CL_Buscar"/>
                  <label for="Buscar" class="icon-buscar CL_Icono_Buscar"></label>
                </div>
              </div>
            </div>
            <div class="Base-25 Grid_Contenedor CL_TXT_Pri_Btn relative">
              <select title="Seleccione un tipo de usuario para consultar" ng-model="PM.FK_ID_Rol" class="Select_1 Base-100 Grid_Item">
                <option ng-click="Listar_Usuarios(Rol.PK_ID_Rol)" ng-repeat="Rol in AOBJ_Lista_Roles" value="{{Rol.PK_ID_Rol}}">{{Rol.Nombre_Rol}}</option>
              </select><span class="CL_TXT_Info_Btn top-30_30 left-30">Seleccione un tipo de usuario</span>
            </div>
            <dir-pagination-controls boundary-links="true" class="Base-35 cross_end Grid_Contenedor">
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
            <tr dir-paginate="Item in AOBJ_Lista_Usuarios_Registrados | filter:Buscar | itemsPerPage: pageSize" current-page="currentPage">
              <td class="Imagen CL_Imagen relative CL_TXT_Pri_Btn relative Invisible Visible-tablet"><img ng-src="{{Item.Imagen_Usuario}}"/><span ng-class="{Activo: Item.Disponibilidad == 'Activo', Inactivo: Item.Disponibilidad == 'Inactivo'}" title="Estado actual de tu cuenta" class="Estado_Usuario CL_TXT_Pri_Btn">
                  <p></p></span><span ng-show="Item.FK_ID_Rol == 2" class="CL_TXT_Info_Btn top-50">Empleado</span><span ng-show="Item.FK_ID_Rol == 3" class="CL_TXT_Info_Btn top-50">Cliente</span><span ng-show="Item.FK_ID_Rol == 1" class="CL_TXT_Info_Btn top-50">Administrador</span>
              </td>
              <td>{{Item.Nombre_Usuario}}</td>
              <td class="Base-70">{{Item.Correo_Electronico}}</td>
              <td>{{Item.Telefono_Celular}}</td>
              <td>
                <select ng-model="Item.Disponibilidad" ng-disabled="BL_Edicion_Datos_Cuentas == false" class="Select_1 Base-70 Grid_Item">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </td>
              <td>
                <select ng-model="Item.Tipo_Cliente" ng-disabled="BL_Edicion_Datos_Cuentas == false" class="Select_1 Base-100 Grid_Item">
                  <option value="Esporadico">Esporadico</option>
                  <option value="Habitual">Habitual</option>
                </select>
              </td>
              <td>
                <bottom title="La cuenta actualmente se encuentra en uso" type="Presiona para cancelar la cuenta" ng-disabled="BL_Edicion_Datos_Cuentas == false" ng-click="FN_Inhabilitar_Estado_Cuenta_Usuario(Item.PK_ID_Usuario)" ng-class="{Invisible:Item.Estado_Cuenta == 'Cancelada', Visible: Item.Estado_Cuenta == 'En uso'}" class="Btn_Estilo_1">En uso</bottom>
                <bottom title="La cuenta actualmente se encuentra cancelada" type="Presiona para habilitar la cuenta" ng-disabled="BL_Edicion_Datos_Cuentas == false" ng-click="FN_Habilitar_Estado_Cuenta_Usuario(Item.PK_ID_Usuario)" ng-class="{Invisible:Item.Estado_Cuenta == 'En uso', Visible: Item.Estado_Cuenta == 'Cancelada'}" class="Btn_Estilo_2">Cancelada</bottom>
              </td>
              <td>
                <select ng-model="Item.Verificacion_Cuenta" ng-disabled="BL_Edicion_Datos_Cuentas == false" class="Select_1 Base-100 Grid_Item">
                  <option value="Por_Verificar">Por Verificar</option>
                  <option value="Verificada">Verificada</option>
                </select>
              </td>
              <td class="CL_Tbl_Icon">
                <div ng-class="{Invisible:BL_Edicion_Datos_Cuentas == false, Visible: BL_Edicion_Datos_Cuentas == true}" ng-click="BL_Edicion_Datos_Cuentas =!BL_Edicion_Datos_Cuentas; FN_Modificar_Datos(Item.PK_ID_Usuario)" class="icon-actualizar CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Actualizar</span></div>
                <div ng-class="{Invisible:BL_Edicion_Datos_Cuentas == true, Visible: BL_Edicion_Datos_Cuentas == false}" ng-click="BL_Edicion_Datos_Cuentas =!BL_Edicion_Datos_Cuentas" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar</span></div>
              </td>
            </tr>
          </tbody>
        </table>
        <div ng-show="(AOBJ_Lista_Usuarios_Registrados |filter:Buscar).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
          <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
            <p>Usuario no encontrado</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>