
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Categoria</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Categoria/Modulo_Categoria.css"/>
<!--css y scrits propios de la pagina-->
<section id="SC_Registrar_Categoria" ng-controller="Controlador_Registro_Categoria">
  <main id="CONT_Categoria">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Registro_Categoria">
      <div class="CONT_Registro_Categoria Grid_Contenedor Base-100 abcenter">
        <div ng-init="BL_Categoria_Opcion = 2;Listar_Categorias()" class="CL_Alerta_6 Padding-5 justify">
          <p ng-show="BL_Categoria_Opcion == 2">Registrar categoria</p>
          <p ng-show="BL_Categoria_Opcion == 1">Consultar Categorias</p>
          <div class="Grid_Item Base-15 No_Padding abcenter Grid_Contenedor">
            <div ng-show="BL_Categoria_Opcion == 1" ng-click="Listar_Categorias()" class="Btn_Estilo_5 icon-list-1">Listar Categorias</div>
          </div>
        </div>
        <div class="Grid_Contenedor Grid_Total abcenter Padding-10">
          <div ng-click="BL_Categoria_Opcion = 2" class="Btn_Estilo_7 icon-agregar-producto">Agregar nueva categoria</div>
          <div ng-click="BL_Categoria_Opcion = 1" class="Btn_Estilo_5 icon-list-1">Categorias</div>
        </div>
        <form id="FORM_Registro_Categoria" name="Form_Registro_Categoria" ng-submit="FN_Registrar_Categoria(RC)" ng-show="BL_Categoria_Opcion == 2" class="Grid_Contenedor main_start Base-100 tablet-40 ng_show Padding-10 column">
          <div class="Grid_Contenedor abcenter Base-100">
            <p class="CL_Icono_1">{{ RC.Nombre_Categoria | limitTo : 1 : 0}}</p>
          </div>
          <div class="Grid_Contenedor Base-70 column">
            <label for="#Nombre_Categoria" class="CL_TXT_Texto_3">Nombre de la categoria</label>
            <input id="Nombre_Categoria" maxlength="30" minlength="6" type="text" name="Nombre_Categoria" ng-model="RC.Nombre_Categoria" placeholder="Ingresa el nombre de la categoria" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.$pristine &amp;&amp; Form_Registro_Categoria.Nombre_Categoria.$error.required ">
              <p class="icon-login">Ingresa un nombre para la categoria</p>
            </div>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.Nombre_Categoria.$valid &amp;&amp; !Form_Registro_Categoria.$pristine &amp;&amp; !Form_Registro_Categoria.Nombre_Categoria.$error.required">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label for="#Descripcion" class="CL_TXT_Texto_3">Descripcion</label>
            <textarea id="Descripcion" minlength="10" maxlength="100" type="text" name="Descripcion" ng-model="RC.Descripcion" placeholder="Ingrese la Descripcion de la categoria" required="required" class="Textarea_Estilo_1"></textarea>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.$pristine &amp;&amp; Form_Registro_Categoria.Descripcion.$error.required ">
              <p class="icon-login">Ingresa una descripci&oacute;n para la categoria</p>
            </div>
            <div id="CONT_Mensaje_Validacion" ng-show="!Form_Registro_Categoria.Descripcion.$valid &amp;&amp; !Form_Registro_Categoria.$pristine &amp;&amp; !Form_Registro_Categoria.Descripcion.$error.required">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
          </div>
          <div class="Grid_Contenedor Padding-10 justify Base-70">
            <input id="submit" type="submit" ng-disabled="!Form_Registro_Categoria.$valid" value="Registrar categoria" class="Btn_Estilo_1"/><a ng-click="FN_Limpiar_Formulario()" class="Btn_Estilo_5">Limpiar formulario</a>
          </div>
        </form>
      </div>
    </div>
  </main>
  <div id="CONT_Categorias" ng-show="BL_Categoria_Opcion == 1" class="ng_show">
    <div class="Grid_Contenedor Base-100 abcenter Padding-10">
      <div class="Tabla_Estilo_1 relative Grid_Item Base-50">
        <table>
          <thead>
            <tr>
              <th class="Imagen"></th>
              <th>Nombre categoria</th>
              <th>Descripcion</th>
              <th>Editar Categoria</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody ng-init="BL_Edicion_Datos = false">
            <tr ng-repeat="Categoria in AOBJ_Lista_Categorias_Registradas ">
              <td>
                <p class="CL_Icono_1">{{ Categoria.Nombre_Categoria | limitTo : 1 : 0}}</p>
              </td>
              <td> 
                <textarea id="Nombre_Categoria" maxlength="100" type="text" name="Nombre_Categoria" ng-model="Categoria.Nombre_Categoria" ng-disabled="BL_Edicion_Datos == false" class="Input_Estilo_1"></textarea>
              </td>
              <td>
                <textarea id="Descripcion" maxlength="200" name="Descripcion" ng-model="Categoria.Descripcion" ng-disabled="BL_Edicion_Datos == false" class="Textarea_Estilo_1"></textarea>
              </td>
              <td> 
                <div ng-class="{Invisible:BL_Edicion_Datos == false, Visible: BL_Edicion_Datos == true}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos; FN_Modificar_Datos_Categoria($index)" class="Btn_Estilo_3 icon-actualizar">Guardar</div>
                <div ng-class="{Invisible:BL_Edicion_Datos == true, Visible: BL_Edicion_Datos == false}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos" class="Btn_Estilo_5 icon-lapiz">Editar</div>
              </td>
              <td> 
                <div ng-click="FN_Eliminar_Categoria($index)" class="Btn_Estilo_2 icon-cancelar2">Eliminar</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="Grid_Contenedor">
      <div ng-click="Listar_Categorias()" class="Btn_Circular_3 bottom-30">
        <p class="icon-list-1"></p>
        <p class="CL_TXT_Info_Btn">Listar Categorias</p>
      </div>
    </div>
  </div>
</section>