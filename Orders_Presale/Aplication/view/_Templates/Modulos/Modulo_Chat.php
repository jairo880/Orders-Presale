
<section id="SC_Modulo_Chat" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
  <!--SESION  MENSAJES/CHAT	(importado desde Modulo_Chat.php)				-->
  <section id="SC_Mensajes" ng-init="BL_Btns_Ver_Mensajes = true">
    <div id="CONT_Invisible" ng-click="FN_Mensaje_Desplegar(false,false,false,false,false)" ng-show="BL_Ver_Mensajes == true">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div id="CONT_Mensajes" ng-class="{CL_Tamano_Dtll:BL_Mensajes_Visibles == true , CL_Tamano_Chat:BL_DesplegarChat_ContConver == true}" ng-show="BL_Ver_Mensajes == true">
      <div id="CONT_Header_Info">
        <p ng-click="FN_Mensaje_Desplegar(true,false,false,false,false)" ng-show="BL_Mensajes_Visibles == true" class="Enlace icon-atras-1">                        </p>
        <p ng-show="BL_Mensajes_Visibles == false" class="CL_TXT_Texto_3 center icon-comments-o Grid_Contenedor Base-100 abcenter">Mensajes recibidos</p>
        <p ng-show="BL_ContenidoMensaje == true" class="CL_TXT_Texto_3 center icon-commenting-o Grid_Contenedor Base-100 abcenter">Mensaje de: {{TXT_Nombre_Usuario_Dtll}}</p>
        <p ng-show="BL_DesplegarChat_ContConver == true" class="CL_TXT_Texto_3 center icon-mensaje Grid_Contenedor Base-100 abcenter">Chat</p>
        <p ng-show="BL_DesplegarChat_Nuevo_Mensaje == true" class="CL_TXT_Texto_3 center icon-mensaje Grid_Contenedor Base-100 abcenter">Nuevo mensaje</p>
        <p title="Cerrar Men&amp;uacute; de notificaciones" ng-click="FN_Mensaje_Desplegar(false,false,false,false,false)" class="CL_Eliminar_1_1"> </p>
      </div>
      <!--MENSAJES RECIBIDOS-->
      <section id="SC_Mensajes_Recibidos" ng-show="BL_Mensajes_Visibles == false">
        <div id="CONT_Mensajes_Recibidos" ng-show="BL_Mensajes_Visibles == false">
          <div ng-repeat="Mensajes_usuario in dato.AOBJ_Mensajes_Lista" class="CL_Mensaje ng_repeat_anim1">
            <div class="CL_Imagen_Usuario"><img ng-click="FN_Ver_Contenido_Mensaje($index);FN_Mensaje_Desplegar(true,true,true,false,false)" ng-src="{{Mensajes_usuario.URL_Imagen_Usuario_Mensaje}}"/></div>
            <div class="CL_Mensaje_Texto">
              <p ng-click="FN_Ver_Contenido_Mensaje($index);FN_Mensaje_Desplegar(true,true,true,false,false)" class="CL_TXT_Nombre_Usuario">{{Mensajes_usuario.TXT_Nombre_Usuario}}</p>
              <p ng-click="FN_Ver_Contenido_Mensaje($index);FN_Mensaje_Desplegar(true,true,true,false,false)" class="CL_TXT_Mensaje_Usuario">{{Mensajes_usuario.TXT_Mensaje}}</p>
              <p class="CL_TXT_Hora_Mensaje">{{Mensajes_usuario.DATE_Hora_Envio | date:'longDate'}}</p>
              <div ng-click="FN_Eliminar_Mensaje_Recibido($index)" class="CL_Eliminar_Contenido">
                <p class="icon-cancelar2"></p>
              </div>
            </div>
          </div>
          <div id="CONT_Mensaje_Producto" ng-show="(dato.AOBJ_Mensajes_Lista).length == 0">
            <div id="CONT_Figura"><span></span><span></span><span></span><span></span></div>
            <div class="CL_TXT_Mensaje"> No hay mensajes</div>
          </div>
        </div>
      </section>
      <div id="CONT_Mensaje_Completo" ng-show="BL_ContenidoMensaje == true">
        <div class="CL_Mensaje_Dtll">
          <div class="CL_Imagen_Usuario_Mensaje_Dtll"><img ng-src="{{URL_Imagen_Usuario_Dtll}}"/></div>
          <div class="CL_Cont_Info_Dtll">
            <p class="CL_Nombre_Usuario_Dtll">{{TXT_Nombre_Usuario_Dtll}}</p>
            <p class="CL_Mensaje_Usuario_Dtll">{{TXT_Mensaje_Usuario_Dtll}}</p>
            <p class="CL_Hora_Mensaje_Dtll">fecha:{{DATE_Hora_Mensaje_Dtll | date:'longDate'}}</p>
          </div>
          <div ng-click="FN_Mensaje_Desplegar(true,true,false,true,false)" class="Btn_Estilo_5">Responder</div>
        </div>
      </div>
      <!--SECCION DE CHAT CONVERSACION	-->
      <section id="CONT_Mensajes_Converzacion" ng-show="BL_DesplegarChat_ContConver == true">
        <div id="CONT_Chat" ng-show="BL_DesplegarChat_ContConver == true">
          <div class="CL_Cabezera_Mensaje"><img ng-src="{{URL_Imagen_Usuario_Dtll}}"/>
            <p>{{TXT_Nombre_Usuario_Dtll}}</p>
          </div>
          <div class="CL_Cotenido_Chat">
            <div ng-repeat="Mensajes_Chat in dato.AOBJ_Mensajes" class="CL_Mensajes">
              <div ng-class="{CL_MensajeUsuaio_Destinatario:Mensajes_Chat.BL_Tipo == true , CL_MensajeUsuario_Remitente:Mensajes_Chat.BL_Tipo == false}">
                <div class="CL_Imagen_Usuario"><img ng-src="{{Mensajes_Chat.URL_Imagen_Usuario}}"/></div>
                <div ng-class="{CL_Textomensaje_Destinatario:Mensajes_Chat.BL_Tipo == true , CL_Textomensaje_Remitente:Mensajes_Chat.BL_Tipo == false}">
                  <p>{{Mensajes_Chat.TXT_Mensaje}}</p><span ng-class="{CL_Destinatario:Mensajes_Chat.BL_Tipo == true , CL_Remitente:Mensajes_Chat.BL_Tipo == false}"></span>
                  <div class="CL_Hora_Mensaje">{{Mensajes_Chat.DATE_Fecha_Mensaje | date:'fullDate'}}</div>
                </div>
              </div>
            </div>
            <div id="CONT_Bottom">
              <div id="CONT_Estado_Escribiendo" ng-show="NGM_TXT_Text_Area_Mensaje.length &gt; 0">
                <div class="CL_Efecto_Cargando"><span></span><span></span><span></span></div>
                <p id="PosicionInicial">Escribiendo</p>
              </div>
            </div>
          </div>
          <div class="CL_Envio_Mensaje">
            <form ng-submit="FN_Enviar_Mensaje(dato.AOBJ_Mensajes[0].URL_Imagen_Usuario,NGM_TXT_Text_Area_Mensaje,dato.AOBJ_Mensajes[0].BL_Tipo)">
              <input type="text" name="name" value="" placeholder="Escribir una respuesta..." ng-model="NGM_TXT_Text_Area_Mensaje" ng-minlength="1"/>
              <input type="submit" value="Enviar" class="Btn_Estilo_2 Visble Invisible-web"/>
              <p class="Invisible Visible-web">Pulsa enter para enviar tu mensaje </p>
            </form>
          </div>
        </div>
      </section>
      <!--SESION DE NUEVO MENSAJE-->
      <section id="CONT_Nuevo_Mensaje" ng-show="BL_DesplegarChat_Nuevo_Mensaje == true">
        <div ng-show="BL_DesplegarChat_Nuevo_Mensaje == true" class="CL_Nuevo_Mensaje">
          <div class="CL_Cotenido_Chat">
            <div class="CL_Administradores_Disponibles">
              <div ng-repeat="Usuario_Amdmin in dato.AOBJ_Administradores_Usuario" class="CL_Usuario_Admin"><img ng-src="{{Usuario_Amdmin.URL_Imagen_Usuario}}"/>
                <p class="CL_Nombre_Admin">{{Usuario_Amdmin.TXT_Nombre_Usuario}}</p>
                <p class="CL_Tiempo_Activo">Ultima vez activo :{{Usuario_Amdmin.DATE_Tiempo_Activo | date:'shortTime'}}</p>
              </div>
              <div class="CL_Mensaje_Admin">
                <p>Dejanos tu duda o prolblema  y te responderemos los mas pronto</p>
              </div>
              <div id="CONT_Mensaje_Producto" ng-show="(dato.AOBJ_Administradores_Usuario).length == 0">
                <div id="CONT_Figura"><span></span><span></span><span></span><span></span></div>
                <div class="CL_TXT_Mensaje"> No hay administradores disponibles por el momento.</div>
              </div>
            </div>
            <div ng-repeat="Nuevo_Chat in dato.AOBJ_Nueva_Conversacion_Chat" class="CL_Mensajes">
              <div ng-class="{CL_MensajeUsuaio_Destinatario:Nuevo_Chat.BL_Tipo == true , CL_MensajeUsuario_Remitente:Nuevo_Chat.BL_Tipo == false}">
                <div class="CL_Imagen_Usuario"><img ng-src="{{Nuevo_Chat.URL_Imagen_Usuario}}"/></div>
                <div ng-class="{CL_Textomensaje_Destinatario:Nuevo_Chat.BL_Tipo == true , CL_Textomensaje_Remitente:Nuevo_Chat.BL_Tipo == false}">
                  <p>{{Nuevo_Chat.TXT_Mensaje}}</p><span ng-class="{CL_Destinatario:Nuevo_Chat.BL_Tipo == true , CL_Remitente:Nuevo_Chat.BL_Tipo == false}"></span>
                  <div class="CL_Hora_Mensaje">{{Nuevo_Chat.DATE_Fecha_Mensaje | date:'fullDate'}}</div>
                </div>
              </div>
            </div>
            <div id="CONT_Bottom">
              <div id="CONT_Estado_Escribiendo" ng-show="Mensaje_Nuevo.length &gt; 0">
                <div class="CL_Efecto_Cargando"><span></span><span></span><span></span></div>
                <p id="PosicionInicialNuevoMensaje">Escribiendo</p>
              </div>
            </div>
          </div>
          <div class="CL_Envio_Mensaje">
            <form ng-submit="FN_Iniciar_Conversacion_Nuevo_Mensaje(Mensaje_Nuevo)">
              <input type="text" name="name" value="" placeholder="Escribir una respuesta..." ng-model="Mensaje_Nuevo" ng-minlength="1"/>
              <input type="submit" value="Enviar" class="Btn_Estilo_2 Visble Invisible-web"/>
            </form>
            <p class="Invisible Visible-web">Pulsa enter para enviar tu mensaje </p>
          </div>
        </div>
      </section>
    </div>
  </section>
  <!--Boton para desplegar chat-->
  <div ng-click="FN_Mensaje_Desplegar(true,true,false,false,true)" class="Btn_Circular_2 bottom-30">
    <p class="icon-chat"></p>
    <p class="CL_TXT_Info_Btn">Nuevo mensaje	</p>
  </div>
</section>