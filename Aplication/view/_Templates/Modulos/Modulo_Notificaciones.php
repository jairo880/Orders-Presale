
<section id="SC_Modulo_Notificaciones" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
  <!--SESION NOTIFICACIONES (importado desde Modulo_Notificaciones.php)					-->
  <section id="SC_Notificaciones" ng-init="BL_Btns_Ver_Notificaciones = true">
    <div id="CONT_Invisible" ng-click="FN_Notificacion()" ng-show="BL_Contenedor_Notificaciones == true">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div id="CONT_Notificacion" ng-show="BL_Contenedor_Notificaciones == true">
      <p class="CL_TXT_Texto_3 CL_TXT_Gris icon-notificacion"> Notificaciones </p>
      <p ng-click="FN_Notificacion()" title="Cerrar el menú de notificaciones" class="CL_Eliminar_1_1"> </p>
      <div id="CONT_Notificaciones_Conts">
        <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
          <p title="Actualizar la lista de notificaciones actuales" ng-click="FN_Listar_Notificaciones( 6 )" class="icon-retweet CL_TXT_Enlace_4"></p>
        </div>
        <div ng-repeat="Notificaciones in dato.AOBJ_Notificaciones_Usuario" class="CL_Estado_CONT ng_repeat_anim1">
          <div class="CL_Icono_Estado">
            <p ng-class="{'CL_Estado_Confirmado icon-agregar3': Notificaciones.Estado_Pedido == 'Atendido','CL_Estado_Cancelado icon-cancelado': Notificaciones.Estado_Pedido == 'Cancelado','CL_Estado_EnProgreso icon-actualizar': Notificaciones.Estado_Pedido == 'En proceso'}"></p>
          </div>
          <div class="CL_Mensaje_Notificaciones">
            <p>Codigo orden:{{Notificaciones.FK_ID_Pedido}}</p>
            <p>Estado:{{Notificaciones.Estado_Pedido}}</p>
            <p class="CL_TXT_Tiempo_Estado">{{Notificaciones.Fecha_Envio | date:'longDate'}}</p>
            <div ng-click="FN_Eliminar_Notificacion($index)" class="CL_Eliminar_Contenido">
              <p class="icon-cancelar2"></p>
            </div>
          </div>
        </div>
      </div>
      <div ng-show="(dato.AOBJ_Notificaciones_Usuario).length == 0" class="CL_Alerta_5 Padding-5">
        <div class="CL_TXT_Mensaje">No hay notificaciones</div>
        <div class="Grid_Contenedor">
          <audio controls="controls" id="Sonido_Nueva_Notificacion" class="Invisible">
            <source src="https://dl.dropboxusercontent.com/u/232442887/Allop/sounds/newEmail.ogg" type="audio/ogg"/>
          </audio>
        </div>
      </div>
    </div>
  </section>
</section>