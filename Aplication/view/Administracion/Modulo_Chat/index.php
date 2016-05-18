
<title>{{ Cantidad_Mensajes_Sin_Ver > 0 &&   Cantidad_Mensajes_Sin_Ver+' '+'Mensaje Nuevo' || dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Chat Administracio&oacute;n</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Modulo_Chat/Modulo_Chat.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Modulo_Chat" class="Grid_Contenedor cross_start">
  <div id="CONT_Contenedor_Invisible_Header"></div>
  <div class="Grid_Contenedor cross_start">
    <div class="Tablero_Trabajo_1 Grid_Contenedor">
      <div class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Tablero_Trabajo">
        <div ng-init="Listar_Usuarios_Administracion();BL_Ocultar_Barra_Izquierda = false;BL_Ocultar_Barra_Derecha = false" class="Grid_Contenedor Base-95 CL_CONT_Tablero_Trabajo">
          <div ng-class="{Barra_Izquierda_Oculto:BL_Ocultar_Barra_Izquierda == true, BL_Ocultar_Barra_Izquierda:BL_Ocultar_Barra_Derecha == true}" class="Grid_Contenedor Base-40 cross_start CL_CONT_Tablero">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 abcenter relative">
              <div class="Grid_Item Base-auto">
                <div class="CL_TXT_Texto_5 icon-chat CL_TXT_Gris CL_TXT_Icon_Gris">Chat</div>
                <p ng-show="BL_Ocultar_Barra_Derecha == true" ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
                <p ng-show="BL_Ocultar_Barra_Derecha == false " ng-click="BL_Ocultar_Barra_Derecha =! BL_Ocultar_Barra_Derecha" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
              </div>
            </div>
            <div class="Grid_Contenedor CL_CONT_Buscador_Tablero_Trabajo abcenter">
              <div class="Grid_Contenedor abcenter Base-90">
                <div ng-init="Buscar" class="CL_Contenedor_Buscador">
                  <input id="Buscar" maxlength="15" type="search" name="Buscar" placeholder="Buscar" ng-model="Buscar_Usuario" class="CL_Buscar"/>
                  <label for="Buscar" class="icon-buscar CL_Icono_Buscar"></label>
                </div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1 CL_CONT_Usuarios">
              <div class="Grid_Contenedor Base-100 CL_Informacion_Tablero_1 cross_start">
                <div class="Grid-Total abcenter Grid_Contenedor CL_Alerta_5">
                  <p title="Actualizar la lista de usuarios" ng-click="Listar_Usuarios_Administracion()" class="icon-retweet CL_TXT_Enlace_4"></p>
                </div>
                <div ng-click="FN_Listar_Converzacion_Usuario(Datos_Usuario.PK_ID_Usuario,Datos_Usuario.Nombre_Usuario,Datos_Usuario.Imagen_Usuario,Datos_Usuario.Correo_Electronico)" ng-repeat="Datos_Usuario in AOBJ_Lista_Usuarios_Registrados | filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario" class="Grid_Contenedor Base-90 CL_Informacion_Usuario cross_start ng_repeat_anim1">
                  <div class="Grid_Item Base-20 CL_Informacion_Imagen"><img ng-src="{{Datos_Usuario.Imagen_Usuario}}" class="CL_Imagen_Icono_1"/></div>
                  <div class="Grid_Item Base-80 CL_Informacion_Datos">
                    <div class="Grid_Contenedor justify">
                      <div class="CL_TXT_Texto_2 CL_TXT_Texto_Bold CL_TXT_Gris Grid_Item Base-40">{{Datos_Usuario.Nombre_Usuario | limitTo : 7 : 0}}..</div>
                      <div class="CL_TXT_Texto_1 CL_TXT_Gris Grid_Item Base-30">{{Datos_Usuario.Disponibilidad}}</div>
                    </div>
                    <div class="CL_TXT_Texto_1 CL_TXT_Gris">{{Datos_Usuario.Correo_Electronico | limitTo : 15 : 0}}..</div>
                  </div>
                </div>
                <div ng-show="(AOBJ_Lista_Usuarios_Registrados |filter:Buscar_Usuario:Datos_Usuario.Nombre_Usuario).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                  <div class="CL_TXT_Texto_3 CL_TXT_Gris Base-100 abcenter Grid_Contenedor">
                    <p>Usuario no encontrado</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div ng-class="{Barra_Derecho_Oculto:BL_Ocultar_Barra_Derecha == true,Barra_Derecho_Desplegado: BL_Ocultar_Barra_Izquierda == true}" class="Grid_Contenedor Base-60 cross_start CL_CONT_Tablero_Trabajo_2">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100 border_bottom_1">
              <div class="Grid_Item Base-100 Grid_Contenedor abcenter relative">
                <p ng-show="BL_Ocultar_Barra_Izquierda == true" ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-popup ng_show CL_TXT_Icon_Azul"></p>
                <p ng-show="BL_Ocultar_Barra_Izquierda == false " ng-click="BL_Ocultar_Barra_Izquierda =! BL_Ocultar_Barra_Izquierda" title="Cerrar el panel de la izquierda" class="absolute left-10 top-5_5 Enlace icon-minus-1 ng_show CL_TXT_Icon_Rojo_2"></p>
                <div class="CL_TXT_Texto_4 CL_TXT_Gris margin_left-40">Iniciar conversaci&oacute;n</div>
              </div>
            </div>
            <div ng-show="BL_Ver_Converzacion" class="Grid_Contenedor abcenter ng_show">
              <div class="Grid_Contenedor Base-95">
                <div class="CL_Alerta_5 Grid_Contenedor">
                  <div class="Grid_Item Base-20"><img ng-src="{{Imagen_Usuario_Seleccionado}}" class="CL_Imagen_Icono_1"/></div>
                  <div class="Grid_Item Base-30 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4 CL_TXT_Gris">{{Nombre_Usuario_Seleccionado}}</div>
                  </div>
                  <div class="Grid_Item Base-30 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_1 CL_TXT_Gris">{{Correo_Electronico_Usuario_Seleccionado}}</div>
                  </div>
                  <div class="Grid_Item Base-20 relative">
                    <p ng-click="FN_Cerrar_Converzacion()" title="Cerrar la conversación actual" class="CL_Eliminar_1_1"></p>
                  </div>
                </div>
                <div class="Grid_Contenedor cross_start">
                  <div class="Grid_Contenedor border_bottom_1_1 CL_Contenedor_Comentarios_Chat cross_start">
                    <div class="CL_Alerta_5 Padding-10 No_Margin Grid_Contenedor abcenter">
                      <div class="Grid_Item Base-auto">
                        <div class="CL_TXT_Texto_1 CL_TXT_Gris">Conversaci&oacute;n iniciada el: {{Fecha_Inicio_Conversacion}}</div>
                      </div>
                    </div>
                    <div class="Grid_Contenedor CL_Cont_Comentarios Base-85">
                      <div ng-class="{reverse: CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta}" ng-repeat="CHAT in AOBJ_Lista_Chat_Comentarios" class="Grid_Contenedor now_wrap Padding-10 ng_repeat_anim1">
                        <div class="Grid_Contenedor Base-15 CL_Imagen_Chat"><img ng-src="{{	CHAT.Imagen_Usuario_Remitente }}" class="CL_Imagen_Icono_1 Imagen_Remitente"/></div>
                        <div ng-class="{CL_Comentario_Remitente: CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta,CL_Comentario_Destinatario: CHAT.FK_ID_Usuario_Remitente != dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta}" class="Grid_Contenedor CL_Comentario_Chat CL_Contenedor_Estilo_3 Padding-10 relative">
                          <div class="CL_TXT_Texto_2 CL_Texto_Mensaje_Comentario">{{CHAT.Mensaje}}</div>
                          <div class="Grid_Contenedor now_wrap">
                            <div ng-if="CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta" ng-class="{Visible:CHAT.Estado_Mensaje == 'No_Visto',Invisible: CHAT.Estado_Mensaje == 'Visto'}" class="Grid_Contenedor Base-10 absolute bottom-5 right-120">
                              <div class="icon-android-done"></div>
                            </div>
                            <div ng-if="CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta" ng-class="{Invisible:CHAT.Estado_Mensaje == 'No_Visto',Visible: CHAT.Estado_Mensaje == 'Visto'}" class="Grid_Contenedor Base-10 absolute bottom-5 right-120">
                              <div class="icon-done-done CL_TXT_Icon_Azul"></div>
                            </div>
                          </div>
                          <div ng-class="{CL_Feche_Comentario_Remitente: CHAT.FK_ID_Usuario_Remitente == dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta, CL_Feche_Comentario_Destinatario: CHAT.FK_ID_Usuario_Remitente != dato.AOBJ_Datos_Usuario[0].FK_ID_Cuenta}" class="CL_TXT_Texto_2 icon-clock">{{CHAT.Fecha_Envio}}</div>
                        </div>
                      </div>
                      <p id="PosicionInicial" style="height:100px;"></p>
                    </div>
                  </div>
                  <form ng-submit="FN_Enviar_Comentario()" class="Grid_Contenedor cross_end">
                    <div class="Grid_Item Base-80">
                      <textarea ng-click="FN_Modificar_Estado_Chat( FK_ID_Dll_Chat )" ng-model="TXT_Nuevo_Comentario" ng-keypress="($event.which === 13)?FN_Enviar_Comentario():0" class="Textarea_Estilo_1"></textarea>
                    </div>
                    <div class="Grid_Item Base-20">
                      <input type="submit" value="Enviar" class="Btn_Estilo_3"/>
                    </div>
                    <p class="CL_TXT_Texto_1 CL_TXT_Gris Invisible Visible-web">Pulsa enter para enviar tu mensaje</p>
                  </form>
                </div>
              </div>
            </div>
            <div ng-show="BL_Ver_Converzacion == false" class="CL_Alerta_5 Padding-10 ng_show">
              <div class="CL_TXT_Texto_3 CL_TXT_Gris">Seleccione un usuario para iniciar o ver la converzaci&oacute;n</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>