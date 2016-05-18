
<section id="SC_Modulo_Barra_Navegacion">
  <!--SESION BARRA NAVEGACION-->
  <section id="SC_Menu">
    <div id="CONT_Menu_Principal" ng-show="BL_Ver_Menu == true">
      <div id="CONT_Menu_Nav" ng-show="BL_Ver_Menu == true">
        <section class="Grid_Contenedor"><a id="CONT_Contenedor_Logo" href="<?php echo URL; ?>Inicio/Inicio" class="Visible-tablet"></a></section>
        <div id="CONT_Portada" style="background:url({{dato.AOBJ_Datos_Usuario[0].Fondo_Perfil_Usuario}}) 0 45% no-repeat;background-size: 100% auto;">
          <div id="CONT_Datos_Cuenta" class="Grid_Contenedor now_wrap abcenter">
            <div class="Grid_Contenedor Base-30">
              <div class="CL_Imagen_Perfil relative"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_4"/><span ng-if="BL_Btns_Ver_Login == false;Bl_Btn_Login_Iniciar_Sesion == false" ng-class="{Activo: dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Activo', Inactivo:  dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Inactivo'}" title="Estado actual de tu cuenta" class="Estado_Usuario">
                  <p></p></span></div>
            </div>
            <div class="Grid_Contenedor Base-60 column">
              <p class="CL_TXT_Texto_3 CL_TXT_Blanco CL_TXT_Texto_Bold">{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}}</p>
              <p class="CL_TXT_Texto_1 CL_TXT_Blanco">{{dato.AOBJ_Datos_Usuario[0].Correo_Electronico | limitTo : 17 : 0}}...</p>
              <p ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol != 5" class="CL_TXT_Texto_3 CL_TXT_Blanco CL_TXT_Texto_Bold CL_TXT_Icon_Blanco icon-pin-map">{{dato.AOBJ_Datos_Usuario[0].Municipio}}</p>
            </div>
          </div>
        </div>
        <nav class="CL_Nav">
          <ul id="CONT_Ul_Nav" ng-init="BL_Gestion_Cuentas_Usuario = false;BL_Gestion_Administrativa=false">
            <section id="CONT_SC_Paginas" ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 " class="ng_show">
              <div ng-if="BL_Btns_Ver_Login == true;Bl_Btn_Login_Iniciar_Sesion == true">
                <li ng-init="BL_Ver_Opciones = true" ng-class="{border_bottom_1: BL_Ver_Opciones == true,CL_Opcion_Desplegado: BL_Ver_Opciones == true,CL_Opcion_Oculto: BL_Ver_Opciones == false}" ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 " class="Grid_Contenedor abcenter"><a ng-click="BL_Ver_Opciones =! BL_Ver_Opciones" class="CL_Btn_Enlace"><span class="CL_TXT_Nav">Opciones</span></a></li>
                <div ng-show="BL_Ver_Opciones" class="ng_show">
                  <li class="Grid_Contenedor abcenter"><a ng-click="FN_Login()" class="CL_Btn_Enlace icon-login ng_repeat_anim1"><span class="CL_TXT_Nav">Ingresar</span></a></li>
                </div>
              </div>
              <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
                <li ng-class="{border_bottom_1: BL_Ver_Navegacion == true,CL_Opcion_Desplegado: BL_Ver_Navegacion == true,CL_Opcion_Oculto: BL_Ver_Navegacion == false}" ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 " ng-init="BL_Ver_Navegacion = true" class="Grid_Contenedor abcenter"><a ng-click="BL_Ver_Navegacion =! BL_Ver_Navegacion" class="CL_Btn_Enlace"><span class="CL_TXT_Nav">Navegaci&oacute;n</span></a></li>
                <div ng-show="BL_Ver_Navegacion" class="ng_show">
                  <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Inicio/Inicio" class="CL_Btn_Enlace icon-inicio"><span class="CL_TXT_Nav">Inicio</span></a></li>
                  <li ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol != 5" class="Grid_Contenedor abcenter"><a ng-click="FN_Mensaje_Desplegar(true,true,false,false,true)" class="CL_Btn_Enlace icon-ayuda-online"><span class="CL_TXT_Nav">Ayuda</span></a></li>
                  <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Cliente/Productos" class="CL_Btn_Enlace icon-galeria1"><span class="CL_TXT_Nav">Productos</span></a></li>
                  <li ng-if="BL_Btns_Ver_Login == true;Bl_Btn_Login_Iniciar_Sesion == true" class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Cliente/Registro" class="CL_Btn_Enlace icon-registrarme"><span class="CL_TXT_Nav">Registrarme</span></a></li>
                </div>
              </div>
            </section>
            <section id="CONT_SC_Herramientas">
              <li ng-class="{border_bottom_1: BL_Ver_Herramientas == true,CL_Opcion_Desplegado: BL_Ver_Herramientas == true,CL_Opcion_Oculto: BL_Ver_Herramientas == false}" ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 " ng-init="BL_Ver_Herramientas = true" class="Grid_Contenedor abcenter"><a ng-click="BL_Ver_Herramientas =! BL_Ver_Herramientas" class="CL_Btn_Enlace"><span class="CL_TXT_Nav">Herramientas</span></a></li>
              <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
              <div ng-show="BL_Ver_Herramientas" class="ng_show">
                <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
                  <li ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Cliente/Modulo_Mensajes" class="CL_Btn_Enlace icon-inbox-alt"><span class="CL_TXT_Nav">Bandeja de entrada</span><span class="CL_Cantidad">{{dato.NUM_CantidadMensajeUsuario}}</span></a></li>
                  <li ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 " class="Grid_Contenedor abcenter"><a ng-click="FN_Listar_Mensajes();FN_Mensaje_Desplegar(true,false,false,false,false)" class="CL_Btn_Enlace icon-mensaje"><span class="CL_TXT_Nav">Mensajes</span><span class="CL_Cantidad">{{dato.NUM_CantidadMensajeUsuario}}</span></a></li>
                  <li ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 " class="Grid_Contenedor abcenter"><a ng-click="FN_Notificacion()" class="CL_Btn_Enlace icon-notificacion"><span class="CL_TXT_Nav">Notificaciones</span><span class="CL_Cantidad"> {{dato.NUM_CantidadNotificaciones}}</span></a></li>
                  <li class="Grid_Contenedor abcenter"><a ng-click="FN_Orden();FN_Listas_Usuario()" title="Desplegar menu de orden" class="CL_Btn_Enlace icon-shopping-cart"><span class="CL_TXT_Nav">Mi orden actual</span><span class="CL_Cantidad"> {{dato.NUM_Cantidad_Productos_En_Orden}}</span></a></li>
                  <li ng-click="FN_Ordenes_Enviadas()" title="Desplegar menu de ordenes enviadas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" class="Grid_Contenedor abcenter"><a ng-click="FN_Ordenes_Enviadas(2);FN_Listar_Pedidos_Enviados();FN_Listar_Ordenes_Enviadas()" title="Desplegar menu de ordenes enviadas" class="CL_Btn_Enlace icon-check-clipboard-1"><span class="CL_TXT_Nav">Ordenes enviadas</span></a></li>
                </div>
              </div>
            </section>
            <!--Elemento visible solo para Administradores-->
            <section id="CONT_SC_Paginas" ng-if="BL_Guia == true ">
              <li ng-class="{border_bottom_1: BL_Ver_Desarrollo == true,CL_Opcion_Desplegado: BL_Ver_Desarrollo == true,CL_Opcion_Oculto: BL_Ver_Desarrollo == false}" ng-init="BL_Ver_Desarrollo = false" class="Grid_Contenedor abcenter"><a ng-click="BL_Ver_Desarrollo =! BL_Ver_Desarrollo " class="CL_Btn_Enlace"><span class="CL_TXT_Nav">Herramientas de desarrollo</span></a></li>
              <div id="CONT_Barra" ng-show="BL_Ver_Desarrollo" class="ng_show">
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(1)" class="CL_Btn_Enlace icon-design"><span class="CL_TXT_Nav">UI Elements</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(9)" class="CL_Btn_Enlace icon-content-41"><span class="CL_TXT_Nav">Grid layout</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(2)" class="CL_Btn_Enlace icon-sitemap"><span class="CL_TXT_Nav">Estructura proyecto</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(3)" class="CL_Btn_Enlace icon-css"><span class="CL_TXT_Nav">Sass</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(4)" class="CL_Btn_Enlace icon-angular"><span class="CL_TXT_Nav">Angular.js</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(5)" class="CL_Btn_Enlace icon-html5"><span class="CL_TXT_Nav">HTML</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(6)" class="CL_Btn_Enlace icon-database"><span class="CL_TXT_Nav">Base de datos</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(7)" class="CL_Btn_Enlace icon-feed-rss-2"><span class="CL_TXT_Nav">CRUD ejemplo</span></a></li>
                <li class="Grid_Contenedor abcenter"><a ng-click="FN_Ver_Elemento_Guia(8)" class="CL_Btn_Enlace icon-puzzle-piece"><span class="CL_TXT_Nav">Cuerpo</span></a></li>
              </div>
            </section>
            <!--Elemento visible solo para Administradores-->
            <li ng-class="{border_bottom_1: BL_Ver_Opciones_Administrador == true,CL_Opcion_Desplegado: BL_Ver_Opciones_Administrador == true,CL_Opcion_Oculto: BL_Ver_Opciones_Administrador == false}" ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 2 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 4" class="Grid_Contenedor abcenter"><a ng-init="BL_Ver_Opciones_Administrador = true" ng-click="BL_Ver_Opciones_Administrador =! BL_Ver_Opciones_Administrador" class="CL_Btn_Enlace"><span class="CL_TXT_Nav">Opciones</span></a></li>
            <div ng-show="BL_Ver_Opciones_Administrador" class="ng_show">
              <section id="CONT_SC_Herramientas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1">
                <li class="Grid_Contenedor abcenter ng_repeat_anim1"><a href="<?php echo URL; ?>Administracion/Guia_Proyecto" class="CL_Btn_Enlace icon-bulb"><span class="CL_TXT_Nav">Guia proyecto</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Registrar_Nuevo_Usuario" class="CL_Btn_Enlace icon-registrarme"><span class="CL_TXT_Nav">Registrar usuario nuevo</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Consultar_Usuarios" class="CL_Btn_Enlace icon-users"><span class="CL_TXT_Nav">Consultar usuarios registrados</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Producto" class="CL_Btn_Enlace icon-cube"><span class="CL_TXT_Nav">Producto</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Promociones" class="CL_Btn_Enlace icon-megaphone"><span class="CL_TXT_Nav">Promociones</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Categoria" class="CL_Btn_Enlace icon-precio"><span class="CL_TXT_Nav">Categoria</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Gestion_De_Contenido" class="CL_Btn_Enlace icon-crop"><span class="CL_TXT_Nav">Gestion de contenido</span></a></li>
              </section>
              <!--Elemento visible solo para Administradores-->
              <section id="CONT_SC_Paginas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 1">
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Permisos_Usuario" class="CL_Btn_Enlace icon-key"><span class="CL_TXT_Nav">Permisos usuario</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Cotizacion" class="CL_Btn_Enlace icon-android-checkbox-blank"><span class="CL_TXT_Nav">Cotizaci&oacute;n</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Pedido" class="CL_Btn_Enlace icon-android-checkbox"><span class="CL_TXT_Nav">Pedidos</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Mensajes" class="CL_Btn_Enlace icon-inbox-alt"><span class="CL_TXT_Nav">Mensajes</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Chat" class="CL_Btn_Enlace icon-chat"><span class="CL_TXT_Nav">Chat</span></a></li>
                <li class="Grid_Contenedor abcenter"> <a href="<?php echo URL; ?>Administracion/Inicio_Administracion/Modulo_Ruta" class="CL_Btn_Enlace icon-pin-map"><span class="CL_TXT_Nav">Ruta	</span></a></li>
                <li class="Grid_Contenedor abcenter"><a href="<?php echo URL; ?>Error/Error" class="CL_Btn_Enlace icon-exclamation"><span class="CL_TXT_Nav">Error 404</span></a></li>
              </section>
            </div>
          </ul>
        </nav>
      </div>
    </div>
  </section>
  <!--SESION OPCIONES PERFIL-->
  <section id="SC_Opciones_Perfil" ng-show="BL_Opciones_Cuenta == true">
    <div id="CONT_Invisible" ng-click="FN_Opciones_Cuenta_Header()">
      <div class="CL_Cerrar_Modal CL_Transparente"></div>
    </div>
    <div id="CONT_Perfil_Opciones_Usuario_P" ng-show="BL_Opciones_Cuenta == true">
      <div ng-if="BL_Btns_Ver_Login == false;Bl_Btn_Login_Iniciar_Sesion == false" class="Grid_Contenedor column">
        <div ng-class="{border_bottom_1: BL_Ver_Desarrollo == true,CL_Opcion_Desplegado: BL_Ver_Disponibilidad == true,CL_Opcion_Oculto: BL_Ver_Disponibilidad == false}" ng-init="BL_Ver_Disponibilidad = true" class="CL_Opciones_Cuenta"><a ng-click="BL_Ver_Disponibilidad =! BL_Ver_Disponibilidad" class="CL_TXT_Texto_1 CL_TXT_Icon_Gris CL_TXT_Gris">Disponibilidad</a></div>
        <div ng-show="BL_Ver_Disponibilidad" class="CL_Estado_Usuario Grid_Contenedor column ng_show">
          <div ng-click="FN_Actualizar_Datos_Tabla_Cliente();dato.AOBJ_Datos_Usuario[0].Disponibilidad = 'Activo'" class="CL_Opciones_Cuenta CL_Activo">
            <p class="icon-activo"></p><a>Activo</a>
          </div>
          <div ng-click="FN_Actualizar_Datos_Tabla_Cliente();dato.AOBJ_Datos_Usuario[0].Disponibilidad = 'Inactivo'" class="CL_Opciones_Cuenta CL_Inactivo">
            <p class="icon-inactivo"></p><a>Inactivo</a>
          </div>
        </div>
      </div>
      <div ng-show="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 " ng-class="{border_bottom_1: BL_Ver_Desarrollo == true,CL_Opcion_Desplegado: BL_Ver_Herramientas_Cuenta == true,CL_Opcion_Oculto: BL_Ver_Herramientas_Cuenta == false}" ng-init="BL_Ver_Herramientas_Cuenta = true" class="CL_Opciones_Cuenta"><a ng-click="BL_Ver_Herramientas_Cuenta =! BL_Ver_Herramientas_Cuenta" class="CL_TXT_Texto_1 CL_TXT_Icon_Gris CL_TXT_Gris">Herramientas</a></div>
      <div ng-show="BL_Ver_Herramientas_Cuenta" class="CL_Mas_Opciones_Cuenta ng_show">
        <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
        <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
          <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 " ng-click="FN_Notificacion()" title="Desplegar menu de notificaciones" class="CL_Opciones_Cuenta relative">
            <p class="icon-notificacion"></p><a>Noficaciones</a><span class="CL_Cantidad right-5 top-5 absolute"> {{dato.NUM_CantidadNotificaciones}}</span>
          </div>
          <div ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 " ng-click="FN_Mensaje_Desplegar(true,false,false,false,false)" title="Desplegar menu de mensajes" class="CL_Opciones_Cuenta relative">
            <p class="icon-mensaje"></p><a>Mensajes</a><span class="CL_Cantidad right-5 top-5 absolute"> {{dato.NUM_CantidadMensajeUsuario}}</span>
          </div>
          <div ng-click="FN_Orden()" title="Desplegar menu de orden" class="CL_Opciones_Cuenta relative">
            <p class="icon-orden"></p><a>Orden actual</a><span class="CL_Cantidad right-5 top-5 absolute"> {{dato.NUM_Cantidad_Productos_En_Orden}}</span>
          </div>
          <div ng-click="FN_Ordenes_Enviadas(2);FN_Listar_Pedidos_Enviados();FN_Listar_Ordenes_Enviadas()" title="Desplegar menu de ordenes enviadas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" class="CL_Opciones_Cuenta">
            <p class="icon-check-clipboard-1"></p><a>Ordenes enviadas</a>
          </div>
        </div>
      </div>
      <div ng-if="BL_Btns_Ver_Login == false;Bl_Btn_Login_Iniciar_Sesion == false">
        <div ng-class="{border_bottom_1: BL_Ver_Desarrollo == true,CL_Opcion_Desplegado: BL_Ver_Opciones_Cuenta == true,CL_Opcion_Oculto: BL_Ver_Opciones_Cuenta == false}" ng-init="BL_Ver_Opciones_Cuenta = true" class="CL_Opciones_Cuenta"><a ng-click="BL_Ver_Opciones_Cuenta =! BL_Ver_Opciones_Cuenta" class="CL_TXT_Texto_1 CL_TXT_Icon_Gris CL_TXT_Gris">Opciones</a></div>
        <div ng-show="BL_Ver_Opciones_Cuenta" class="ng_show">
          <div class="CL_Opciones_Cuenta">
            <p class="icon-login"></p><a href="<?php echo URL; ?>Cliente/Cuenta">Perfil</a>
          </div>
          <div ng-if="Bl_Btn_Login_Cerrrar_Sesion == true" class="CL_Opciones_Cuenta">
            <p class="icon-login-2"></p><a ng-click="FN_Cerrar_Sesion()">Cerrar sesi&oacute;n</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>