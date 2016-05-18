
<section id="SC_Modulo_Chat" ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
  <!--SESION  MENSAJES/CHAT	(importado desde Modulo_Chat.php)				-->
  <section id="SC_Mensajes" ng-init="BL_Btns_Ver_Mensajes = true">
    <div id="CONT_Invisible" ng-click="FN_Mensaje_Desplegar(false,false,false,false,false)" ng-show="BL_Ver_Mensajes == true">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div id="CONT_Mensajes" ng-class="{CL_Tamano_Dtll:BL_Mensajes_Visibles == true , CL_Tamano_Chat:BL_DesplegarChat_ContConver == true}" ng-show="BL_Ver_Mensajes == true">
      <div id="CONT_Header_Info">
        <p ng-click="FN_Mensaje_Desplegar(true,false,false,false,false)" ng-show="BL_ContenidoMensaje == true" class="CL_TXT_Icon_Gris Enlace icon-atras"></p>
        <p ng-click="FN_Listar_Sesiones_Chat();FN_Mensaje_Desplegar(true,true,false,false,true)" ng-show="BL_DesplegarChat_ContConver == true" class="CL_TXT_Icon_Gris Enlace icon-atras">                         </p>
        <p ng-show="BL_Mensajes_Visibles == false" class="CL_TXT_Icon_Gris CL_TXT_Texto_4 CL_TXT_Gris center icon-mensaje Grid_Contenedor Base-100 abcenter">Mensajes recibidos</p>
        <p ng-show="BL_ContenidoMensaje == true" class="CL_TXT_Icon_Gris CL_TXT_Texto_3 CL_TXT_Gris center icon-mensaje Grid_Contenedor Base-100 abcenter">Mensaje de: {{TXT_Nombre_Usuario_Dtll}}</p>
        <p ng-show="BL_DesplegarChat_Nuevo_Mensaje == true " class="CL_TXT_Icon_Gris CL_TXT_Texto_4 CL_TXT_Gris center icon-comments-o Grid_Contenedor Base-100 abcenter">Chat</p>
        <p title="Cerrar Men&amp;uacute; de notificaciones" ng-click="FN_Mensaje_Desplegar(false,false,false,false,false)" class="CL_Eliminar_1_1"> </p>
      </div>
      <!--MENSAJES RECIBIDOS-->
      <section id="SC_Mensajes_Recibidos" ng-show="BL_Mensajes_Visibles == false">
        <div id="CONT_Mensajes_Recibidos" ng-show="BL_Mensajes_Visibles == false">
          <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
            <p title="Actualizar la lista de mensajes" ng-click="FN_Listar_Mensajes()" class="icon-retweet CL_TXT_Enlace_4"></p>
          </div>
          <div ng-repeat="Mensajes_usuario in dato.AOBJ_Mensajes_Lista" class="Grid_Contenedor CL_Mensaje ng_show Base-100">
            <div class="Grid_Contenedor Base-15 abcenter"><img ng-click="FN_Ver_Contenido_Mensaje($index);FN_Mensaje_Desplegar(true,true,true,false,false)" ng-src="{{Mensajes_usuario.Imagen_Usuario_Remitente}}" class="CL_Imagen_Icono_3"/></div>
            <div class="CL_Mensaje_Texto Grid_Contenedor Base-80">
              <p ng-click="FN_Ver_Contenido_Mensaje($index);FN_Mensaje_Desplegar(true,true,true,false,false)" class="CL_TXT_Nombre_Usuario Grid_Contenedor">{{Mensajes_usuario.Nombre_Usuario_Remitente}}</p>
              <p class="CL_TXT_Texto_2 CL_TXT_Texto_Bold">{{Mensajes_usuario.Asunto}}</p>
              <p ng-click="FN_Ver_Contenido_Mensaje($index);FN_Mensaje_Desplegar(true,true,true,false,false)" class="CL_TXT_Mensaje_Usuario Grid_Contenedor">{{Mensajes_usuario.Mensaje | limitTo : 100 : 0}}..</p>
              <p class="CL_TXT_Hora_Mensaje">{{Mensajes_usuario.Fecha_Envio | date:'longDate'}}</p>
              <div ng-click="FN_Modificar_Estado_Buson_Mensajes(Mensajes_usuario.PK_ID_Buson_Mensajes,false,true);FN_Listar_Mensajes()" class="CL_Eliminar_Contenido">
                <p class="icon-cancelar2"></p>
              </div>
            </div>
          </div>
          <div ng-show="(dato.AOBJ_Mensajes_Lista).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
            <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-auto"> No hay mensajes</div>
          </div>
        </div>
      </section>
      <div id="CONT_Mensaje_Completo" ng-show="BL_ContenidoMensaje == true">
        <div class="CL_Mensaje_Dtll">
          <div class="CL_Imagen_Usuario_Mensaje_Dtll Grid_Contenedor abcenter"><img ng-src="{{URL_Imagen_Usuario_Dtll}}" class="CL_Imagen_Icono_3"/></div>
          <div class="CL_Cont_Info_Dtll">
            <p class="CL_Nombre_Usuario_Dtll">{{TXT_Nombre_Usuario_Dtll}}</p>
            <p class="CL_Mensaje_Usuario_Dtll CL_TXT_Texto_3 CL_TXT_Gris border_bottom_1">{{TXT_Mensaje_Usuario_Dtll}}</p>
            <p class="CL_TXT_Texto_1 CL_TXT_Gris icon-clock">Enviado:{{DATE_Hora_Mensaje_Dtll | date:'longDate'}}</p>
          </div>
        </div>
      </div>
      <!--SECCION DE CHAT CONVERSACION	-->
      <section id="CONT_Mensajes_Converzacion" ng-show="BL_DesplegarChat_ContConver == true ">
        <div ng-show="BL_DesplegarChat_ContConver == true &amp;&amp; BL_Chat == true" class="CONT_Chat">
          <div class="CL_Cabezera_Mensaje Grid_Contenedor abcenter">
            <div class="Grid_Contenedor Base-10"><img ng-src="{{Imagen_Usuario_Seleccionado}}" class="CL_Imagen_Icono_2"/></div>
            <div class="Grid_Contenedor Base-90">
              <p class="CL_TXT_Texto_3 CL_TXT_Blanco icon-commenting-o CL_TXT_Icon_Blanco">{{Nombre_Usuario_Seleccionado}}</p>
            </div>
          </div>
          <div class="CL_Cotenido_Chat">
            <div class="Grid_Contenedor CL_Cont_Comentarios Base-85">
              <div class="CL_Alerta_5 Padding-10 No_Margin Grid_Contenedor abcenter">
                <div class="Grid_Item Base-auto">
                  <div class="CL_TXT_Texto_1 CL_TXT_Gris">Conversaci&oacute;n iniciada el: {{Fecha_Inicio_Conversacion}}</div>
                </div>
              </div>
              <div ng-class="{reverse: CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta}" ng-repeat="CHAT in AOBJ_Lista_Chat_Comentarios" class="Grid_Contenedor now_wrap Padding-10 ng_repeat_anim1">
                <div class="Grid_Contenedor Base-15"><img ng-src="{{CHAT.Imagen_Usuario_Remitente }}" class="CL_Imagen_Icono_1 Imagen_Remitente"/></div>
                <div ng-class="{CL_Comentario_Remitente: CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta,CL_Comentario_Destinatario: CHAT.FK_ID_Usuario_Remitente != dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta}" class="Grid_Contenedor CL_Comentario_Chat CL_Contenedor_Estilo_3 Padding-10 relative Base-80 Base-90">
                  <div class="CL_TXT_Texto_2 CL_Texto_Mensaje_Comentario">{{CHAT.Mensaje}}</div>
                  <div class="Grid_Contenedor now_wrap">
                    <div ng-if="CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta" ng-class="{Visible:CHAT.Estado_Mensaje == 'No_Visto',Invisible: CHAT.Estado_Mensaje == 'Visto'}" class="Grid_Contenedor Base-10 absolute bottom-5 right-20">
                      <div class="icon-android-done"></div>
                    </div>
                    <div ng-if="CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta" ng-class="{Invisible:CHAT.Estado_Mensaje == 'No_Visto',Visible: CHAT.Estado_Mensaje == 'Visto'}" class="Grid_Contenedor Base-10 absolute bottom-5 right-20">
                      <div class="icon-done-done CL_TXT_Icon_Azul"></div>
                    </div>
                    <div class="Grid_Contenedor Base-100">
                      <div ng-class="{CL_Feche_Comentario_Remitente: CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta, CL_Feche_Comentario_Destinatario: CHAT.FK_ID_Usuario_Remitente != dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta}" class="CL_TXT_Texto_2 icon-clock">{{CHAT.Fecha_Envio}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <p id="PosicionInicial" style="height:100px;"></p>
            </div>
          </div>
          <form ng-submit="FN_Enviar_Comentario()" class="Grid_Contenedor cross_end">
            <div class="Grid_Item Base-70 web-100">
              <textarea ng-click="FN_Modificar_Estado_Chat( FK_ID_Dll_Chat )" ng-model="TXT_Nuevo_Comentario" ng-keypress="($event.which === 13)?FN_Enviar_Comentario():0" class="Textarea_Estilo_1"></textarea>
            </div>
            <div class="Grid_Item Base-20 Visible Invisible-web">
              <input type="submit" value="Enviar" class="Btn_Estilo_3"/>
            </div>
            <p class="CL_TXT_Texto_1 CL_TXT_Gris Invisible Visible-web">Pulsa enter para enviar tu mensaje</p>
          </form>
        </div>
        <div ng-show="BL_Chat_Nuevo == true" class="CONT_Chat">
          <div class="CL_Cabezera_Mensaje Grid_Contenedor abcenter">
            <div class="Grid_Contenedor Base-auto">
              <p class="CL_TXT_Texto_3 CL_TXT_Blanco icon-commenting-o CL_TXT_Icon_Blanco">Nuevo mensaje</p>
            </div>
          </div>
          <div class="CL_Cotenido_Chat">
            <div class="Grid_Contenedor CL_Cont_Comentarios Base-85">
              <div ng-repeat="CHAT in AOBJ_Mensaje_Temporal" class="Grid_Contenedor now_wrap Padding-10 ng_repeat_anim1 reverse">
                <div class="Grid_Contenedor Base-15 CL_Imagen_Chat"><img ng-src="{{	CHAT.Imagen_Usuario_Remitente }}" class="CL_Imagen_Icono_1 Imagen_Remitente"/></div>
                <div class="Grid_Contenedor CL_Comentario_Chat CL_Contenedor_Estilo_3 Padding-10 relative Base-80 Base-90 CL_Comentario_Remitente">
                  <div class="CL_TXT_Texto_2 CL_Texto_Mensaje_Comentario">{{CHAT.Mensaje}}</div>
                  <div class="Grid_Contenedor now_wrap">
                    <div class="Grid_Contenedor Base-10 absolute bottom-5 right-20 Visible">
                      <div class="icon-android-done"></div>
                    </div>
                    <div class="Grid_Contenedor Base-100">
                      <div class="CL_TXT_Texto_2 icon-clock CL_Feche_Comentario_Remitente">{{CHAT.Fecha_Envio}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form ng-submit="FN_Envio_Mensaje()" class="Grid_Contenedor cross_end">
            <div class="Grid_Item Base-70 web-100">
              <textarea ng-model="Contenido" ng-keypress="($event.which === 13)?FN_Envio_Mensaje():0" class="Textarea_Estilo_1"></textarea>
            </div>
            <div class="Grid_Item Base-20 Visible Invisible-web">
              <input type="submit" value="Enviar" class="Btn_Estilo_3"/>
            </div>
            <p class="CL_TXT_Texto_1 CL_TXT_Gris Invisible Visible-web">Pulsa enter para enviar tu mensaje</p>
          </form>
        </div>
      </section>
      <!--SESION DE NUEVO MENSAJE-->
      <section id="CONT_Nuevo_Mensaje" ng-show="BL_DesplegarChat_Nuevo_Mensaje == true">
        <div ng-show="BL_DesplegarChat_Nuevo_Mensaje == true  " class="Grid_Contenedor height_100 column">
          <div class="CL_Cotenido_Usuarios_Converzacion cross_start Grid_Contenedor Flex_Grow_10">
            <div ng-click="FN_Chat_Nuevo_Mensaje(1);FN_Mensaje_Desplegar(true,true,false,true,false);FN_Listar_Converzacion_Usuario( Chat_Sesiones_Creadas.FK_ID_Usuario_Remitente,Chat_Sesiones_Creadas.Nombre_Usuario_Remitente,Chat_Sesiones_Creadas.Imagen_Usuario_Remitente,Chat_Sesiones_Creadas.Nombre_Usuario_Remitente)" ng-repeat="Chat_Sesiones_Creadas in AOBJ_Lista_Sesiones_Chat_Creadas" class="CL_Mensajes border_bottom_1 Grid_Contenedor">
              <div class="Grid_Contenedor relative Padding-10">
                <div class="Grid_Contenedor Base-10"><img ng-src="{{Chat_Sesiones_Creadas.Imagen_Usuario_Remitente}}" class="CL_Imagen_Icono_2"/></div>
                <div class="Grid_Contenedor Base-70">
                  <div class="Enlace CL_TXT_Texto_3 CL_TXT_Texto_Bold CL_TXT_Gris">{{Chat_Sesiones_Creadas.Nombre_Usuario_Remitente}}</div>
                  <div class="Enlace CL_TXT_Texto_2 CL_TXT_Gris">{{Chat_Sesiones_Creadas.Ultimo_Mensaje}}</div>
                  <div class="Enlace CL_TXT_Texto_1 CL_TXT_Gris absolute left-320 top-10">{{Chat_Sesiones_Creadas.Fecha_Envio}}</div>
                </div>
              </div>
            </div>
            <div ng-show="(AOBJ_Lista_Sesiones_Chat_Creadas ).length == 0" class="CL_Alerta_5 Grid_Contenedor abcenter">
              <p class="CL_TXT_Texto_2 CL_TXT_Gris left border_bottom_1 Grid_Contenedor abcenter CL_TXT_Gris">No posees sesiones de chat creadas</p>
            </div>
          </div>
          <div class="Grid_Contenedor CL_Herramientas_Mensajes abcenter Flex_Grow_2">
            <div ng-click="Listar_Usuarios( 1, 'Si' );FN_Chat_Nuevo_Mensaje(2);FN_Mensaje_Desplegar(true,true,false,true,false)" class="Btn_Estilo_3_3 icon-lapiz CL_TXT_Icon_BLanco">Nuevo mensaje</div>
          </div>
          <div class="Grid_Contenedor">
            <audio controls="controls" id="Sonido_Nuevo_Mensaje" class="Invisible">
              <source src="https://dl.dropboxusercontent.com/u/232442887/Allop/sounds/newEmail.ogg" type="audio/ogg"/>
            </audio>
          </div>
        </div>
      </section>
    </div>
  </section>
  <!--Boton para desplegar chat-->
  <div ng-show="BL_Btns_Ver_Login == false;Bl_Btn_Login_Iniciar_Sesion == false" ng-click="FN_Listar_Sesiones_Chat();FN_Mensaje_Desplegar(true,true,false,false,true)" class="Btn_Circular_2 bottom-30">
    <p class="icon-comments-o"></p>
    <p class="CL_TXT_Info_Btn">Chat online</p><span class="CL_Cantidad absolute right-10_10 top-5_5">{{Cantidad_Mensajes_Sin_Ver}}</span>
  </div>
</section>