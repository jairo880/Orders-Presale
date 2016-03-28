
<section id="SC_Modulo_Barra_Navegacion">
  <!--SESION BARRA NAVEGACION-->
  <section id="SC_Menu">
    <div id="CONT_Menu_Principal" ng-show="BL_Ver_Menu == true">
      <div id="CONT_Menu_Nav" ng-show="BL_Ver_Menu == true">
        <div id="CONT_Portada"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Fondo_Perfil_Usuario}}" class="CL_Portada_Imagen"/>
          <div id="CONT_Datos_Cuenta">
            <div id="CONT_Imagen_Perfil">
              <div class="CL_Imagen_Perfil"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Img_Perfil"/><span ng-class="{Activo: dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Activo', Inactivo:  dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Inactivo'}" title="Estado actual de tu cuenta" class="Estado_Usuario">
                  <p></p></span></div>
            </div>
            <div id="CONT_Datos_Usuario">
              <p class="CL_TXT_Mensaje">{{dato.AOBJ_Datos_Usuario[0].Correo_Electronico}}</p>
              <p class="CL_TXT_Nombre">{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}}</p>
              <div id="CONT_Herramientas_Usuario">
                <div id="CONT_Opciones_Cuenta" class="Btn_Estilo_5"><a href="<?php echo URL; ?>Cliente/Cuenta" class="icon-login"> </a></div>
              </div>
            </div>
          </div>
        </div>
        <nav class="CL_Nav">
          <ul id="CONT_Ul_Nav" ng-init="BL_Gestion_Cuentas_Usuario = false;BL_Gestion_Administrativa=false">
            <section id="CONT_SC_Paginas">
              <div ng-if="BL_Btns_Ver_Login == true;Bl_Btn_Login_Iniciar_Sesion == true">
                <p class="CL_TXT_Detalle">Opciones</p>
                <li><a ng-click="FN_Login()" class="CL_Btn_Enlace icon-login ng_repeat_anim1"><span class="CL_TXT_Nav">Ingresar</span></a></li>
              </div>
              <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
                <p class="CL_TXT_Detalle">Navegaci&oacute;n</p>
                <li><a href="<?php echo URL; ?>Inicio/Inicio" class="CL_Btn_Enlace icon-inicio"><span class="CL_TXT_Nav">Inicio</span></a></li>
                <li><a ng-click="FN_Mensaje_Desplegar(true,true,false,false,true)" class="CL_Btn_Enlace icon-ayuda-online"><span class="CL_TXT_Nav">Ayuda</span></a></li>
                <li><a href="<?php echo URL; ?>Cliente/Productos" class="CL_Btn_Enlace icon-galeria1"><span class="CL_TXT_Nav">Productos</span></a></li>
                <li ng-if="BL_Btns_Ver_Login == true;Bl_Btn_Login_Iniciar_Sesion == true"><a href="<?php echo URL; ?>Cliente/Registro" class="CL_Btn_Enlace icon-registrarme"><span class="CL_TXT_Nav">Registrarme</span></a></li>
              </div>
            </section>
            <section id="CONT_SC_Herramientas">
              <p class="CL_TXT_Detalle">Herramientas</p>
              <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
              <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
                <li><a ng-click="FN_Mensaje_Desplegar(true,false,false,false,false)" class="CL_Btn_Enlace icon-mensaje"><span class="CL_TXT_Nav">Mensajes</span><span class="CL_Cantidad">{{dato.NUM_CantidadMensajeUsuario}}</span></a></li>
                <li><a ng-click="FN_Notificacion()" class="CL_Btn_Enlace icon-notificacion"><span class="CL_TXT_Nav">Notificaciones</span><span class="CL_Cantidad"> {{dato.NUM_CantidadNotificaciones}}</span></a></li>
                <li><a ng-click="FN_Orden()" title="Desplegar menu de orden" class="CL_Btn_Enlace icon-orden"><span class="CL_TXT_Nav">Mi orden actual</span><span class="CL_Cantidad"> {{dato.NUM_Cantidad_Productos_En_Orden}}</span></a></li>
              </div>
              <!--Elemento visible solo para Administradores-->
              <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1">
                <li class="ng_repeat_anim1"><a href="<?php echo URL; ?>Administracion/Guia_Proyecto" class="CL_Btn_Enlace icon-bulb"><span class="CL_TXT_Nav">Guia proyecto</span></a></li>
              </div>
            </section>
            <!--Elemento visible solo para Administradores-->
            <section id="CONT_SC_Paginas" ng-if="BL_Guia == true ">
              <div id="CONT_Barra">
                <li><a ng-click="FN_Ver_Elemento_Guia(1)" class="CL_Btn_Enlace icon-design"><span class="CL_TXT_Nav">UI Elements</span></a></li>
                <li><a ng-click="FN_Ver_Elemento_Guia(2)" class="CL_Btn_Enlace icon-sitemap"><span class="CL_TXT_Nav">Estructura proyecto</span></a></li>
                <li><a ng-click="FN_Ver_Elemento_Guia(3)" class="CL_Btn_Enlace icon-css"><span class="CL_TXT_Nav">Sass</span></a></li>
                <li><a ng-click="FN_Ver_Elemento_Guia(4)" class="CL_Btn_Enlace icon-angular"><span class="CL_TXT_Nav">Angular.js</span></a></li>
                <li><a ng-click="FN_Ver_Elemento_Guia(5)" class="CL_Btn_Enlace icon-html5"><span class="CL_TXT_Nav">HTML</span></a></li>
                <li><a ng-click="FN_Ver_Elemento_Guia(6)" class="CL_Btn_Enlace icon-database"><span class="CL_TXT_Nav">Base de datos</span></a></li>
                <li><a ng-click="FN_Ver_Elemento_Guia(7)" class="CL_Btn_Enlace icon-feed-rss-2"><span class="CL_TXT_Nav">CRUD ejemplo</span></a></li>
              </div>
            </section>
            <!--Elemento visible solo para administradores-->
            <section id="CONT_SC_Herramientas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1">
              <div>
                <p class="CL_TXT_Detalle">Opciones</p>
                <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Registrar_Nuevo_Usuario" class="CL_Btn_Enlace icon-registrarme"><span class="CL_TXT_Nav">Registrar usuario nuevo</span></a></li>
                <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Consultar_Usuarios" class="CL_Btn_Enlace icon-users"><span class="CL_TXT_Nav">Consultar usuarios registrados</span></a></li>
              </div>
            </section>
            <!--Elemento visible solo para Administradores-->
            <section id="CONT_SC_Herramientas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1">
              <div>
                <p class="CL_TXT_Detalle">Opciones</p>
                <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Producto" class="CL_Btn_Enlace icon-puzzle-piece"><span class="CL_TXT_Nav">M&oacute;dulo producto</span></a></li>
                <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Promociones" class="CL_Btn_Enlace icon-puzzle-piece"><span class="CL_TXT_Nav">M&oacute;dulo promociones</span></a></li>
                <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Categoria" class="CL_Btn_Enlace icon-puzzle-piece"><span class="CL_TXT_Nav">M&oacute;dulo categoria</span></a></li>
                <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Gestion_De_Contenido" class="CL_Btn_Enlace icon-puzzle-piece"><span class="CL_TXT_Nav">M&oacute;dulo gestion de contenido</span></a></li>
              </div>
            </section>
            <!--Elemento visible solo para Administradores-->
            <section id="CONT_SC_Paginas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1">
              <li><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Permisos_Usuario" class="CL_Btn_Enlace icon-puzzle-piece"><span class="CL_TXT_Nav">M&oacute;dulo permisos usuario</span></a></li>
              <li><a href="<?php echo URL; ?>Error/Error" class="CL_Btn_Enlace icon-exclamation"><span class="CL_TXT_Nav">Error 404</span></a></li>
            </section>
          </ul>
        </nav>
      </div>
    </div>
  </section>
  <!--SESION OPCIONES PERFIL-->
  <section id="SC_Opciones_Perfil">
    <div id="CONT_Invisible" ng-click="BL_Opciones_Cuenta =! BL_Opciones_Cuenta" ng-show="BL_Opciones_Cuenta == true">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div id="CONT_Perfil_Opciones_Usuario_P" ng-show="BL_Opciones_Cuenta == true">
      <p class="CL_TXT_Categoria">Disponibilidad</p>
      <div class="CL_Estado_Usuario">
        <div ng-click="FN_Actualizar_Datos_Tabla_Cliente();dato.AOBJ_Datos_Usuario[0].Disponibilidad = 'Activo'" class="CL_Opciones_Cuenta CL_Activo">
          <p class="icon-activo"></p><a>Activo</a>
        </div>
        <div ng-click="FN_Actualizar_Datos_Tabla_Cliente();dato.AOBJ_Datos_Usuario[0].Disponibilidad = 'Inactivo'" class="CL_Opciones_Cuenta CL_Inactivo">
          <p class="icon-inactivo"></p><a>Inactivo</a>
        </div>
      </div>
      <div ng-if="BL_Btns_Ver_Login == false;Bl_Btn_Login_Iniciar_Sesion == false">
        <p class="CL_TXT_Categoria">Cuenta</p>
        <div class="CL_Opciones_Cuenta">
          <p class="icon-login"></p><a href="<?php echo URL; ?>Cliente/Cuenta">Cuenta</a>
        </div>
        <div class="CL_Opciones_Cuenta"></div>
      </div>
      <p class="CL_TXT_Categoria">m&aacute;s</p>
      <div class="CL_Mas_Opciones_Cuenta">
        <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
        <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
          <div ng-click="FN_Notificacion()" title="Desplegar menu de notificaciones" class="CL_Opciones_Cuenta">
            <p class="icon-notificacion"></p><a>Noficaciones</a>
          </div>
          <div ng-click="FN_Mensaje_Desplegar(true,false,false,false,false)" title="Desplegar menu de mensajes" class="CL_Opciones_Cuenta">
            <p class="icon-mensaje"></p><a>Mensajes</a>
          </div>
          <div ng-click="FN_Orden()" title="Desplegar menu de orden" class="CL_Opciones_Cuenta">
            <p class="icon-orden"></p><a>Orden</a>
          </div>
        </div>
        <div ng-show="Bl_Btn_Login_Cerrrar_Sesion == true" class="CL_Opciones_Cuenta">
          <p class="icon-login-2"></p><a ng-click="FN_Cerrar_Sesion()">Cerrar sesi&oacute;n</a>
        </div>
      </div>
    </div>
  </section>
</section>