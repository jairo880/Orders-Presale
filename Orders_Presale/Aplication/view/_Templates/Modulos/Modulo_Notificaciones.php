
<section id="SC_Modulo_Notificaciones" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
  <!--SESION NOTIFICACIONES (importado desde Modulo_Notificaciones.php)					-->
  <section id="SC_Notificaciones" ng-init="BL_Btns_Ver_Notificaciones = true">
    <div id="CONT_Invisible" ng-click="BL_Contenedor_Notificaciones =! BL_Contenedor_Notificaciones" ng-show="BL_Contenedor_Notificaciones == true">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div id="CONT_Notificacion" ng-show="BL_Contenedor_Notificaciones == true">
      <p class="CL_TXT_Texto_3 icon-notificacion"> Notificaciones </p>
      <p ng-click="FN_Notificacion()" title="Cerrar el menú de notificaciones" class="CL_Eliminar_1_1"> </p>
      <div id="CONT_Notificaciones_Conts">
        <div ng-repeat="Notificaciones in dato.AOBJ_Estado_Notificaciones" class="CL_Mensaje_Notificacion ng_repeat_anim1">
          <div class="CL_Icono_Notificacion">
            <p ng-class="{'CL_Estado_Confirmado icon-agregar3': Notificaciones.BL_Estado == 1,'CL_Estado_Cancelado icon-cancelado': Notificaciones.BL_Estado == 2,'CL_Estado_EnProgreso icon-actualizar': Notificaciones.BL_Estado == 3}"></p>
          </div>
          <div class="CL_Mensaje_Notificaciones">
            <p>Codigo orden:{{Notificaciones.NUM_ID_Notificacion}}</p>
            <p>Estado:{{Notificaciones.TXT_Nombre}}</p>
            <p class="CL_TXT_Tiempo_Estado">{{Notificaciones.DATE_Hora | date:'longDate'}}</p>
            <div ng-click="FN_Eliminar_Notificacion($index)" class="CL_Eliminar_Contenido">
              <p class="icon-cancelar2"></p>
            </div>
          </div>
        </div>
      </div>
      <div id="CONT_Mensaje_Producto" ng-show="(dato.AOBJ_Estado_Notificaciones).length == 0">
        <div class="IconoNoResult"></div>
        <div id="CONT_Figura"><span></span><span></span><span></span><span></span></div>
        <div class="CL_TXT_Mensaje">No hay notificaciones</div>
      </div>
    </div>
  </section>
</section>