<!DOCTYPE html>
<html lang="es" ng-app="AppOrders_Presale">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!--link de fontastic, fuentes de iconos-->
    <link rel="shortcut icon" type="image/x-icon" href="https://dl.dropboxusercontent.com/u/232442887/Allop/img/logo/LogoIcono.png"/>
    <link href="https://file.myfontastic.com/Jpco7gv5bXaEnZ8PsDz2Q7/icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Roboto+Slab|Lato|Ubuntu" rel="stylesheet" type="text/css"/>
    <!--libreria-->
    <script src="<?php echo URL;?>public/Bower_Componentes/Librerias/angular/angular.min.js"></script>
    <script language="javascript" src="<?php echo URL;?>public/Bower_Componentes/Librerias/Chart.js/Chart.js"></script>
    <script language="javascript" src="<?php echo URL;?>public/Bower_Componentes/Librerias/angular-chart.js/dist/angular-chart.js"></script>
    <link rel="stylesheet" href="<?php echo URL;?>public/Bower_Componentes/Librerias/angular-chart.js/dist/angular-chart.css"/>
    <script src="<?php echo URL;?>public/Bower_Componentes/Librerias/angular-animate/angular-animate.js"></script>
    <script src="<?php echo URL;?>public/Bower_Componentes/Librerias/angular-locale_es-co/angular-locale_es-co.js"></script>
    <script src="<?php echo URL;?>public/Bower_Componentes/Librerias/ngstorage/ngStorage.min.js"></script>
    <script src="<?php echo URL;?>public/js/Angular/Librerias/dirPagination.js"></script>
    <!--Codigo para angular, se crea el modelo de angular en esta parte de la pagina para asi poder hacer que funcionen los controladores de angular.js-->
    <!--la variable url esta guardando la ruta dada por php, esta ruta es la que usamos para mandar  a llamar a algun controlador de php--><script>
    var app = angular.module("AppOrders_Presale", ['chart.js','ngAnimate','ngStorage','angularUtils.directives.dirPagination']);
    var url = "<?=URL?>";
    </script>	
  </head><body ng-init="FN_Capturar_Datos_Usuario_Iniciado()" id="Body_Web_Page"  ng-controller="Controlador_Principal",ng-class="{CL_Body_Scroll_Inactivo: BL_Scroll_Body == true, CL_Body_Scroll_Activo:  BL_Scroll_Body == false}">
  <!--Loading para la pagina web-->
  <div id="CONT_Loadig_Allop">
    <p class="CL_TXT_Loading">Cargando </p>
    <div id="CONT_Icon_Cargando"><span></span><span></span><span></span><span></span></div>
  </div><section id="CONT_Body" ng-class="{CL_Body_Menu_Desplegado:Bl_Menu_Desplegado, CL_Body_Menu_Oculto: ! Bl_Menu_Desplegado, CL_Ordenes_Enviadas_Desplegado: BL_Ordenes_Enviadas == true }">
  <header id="CONT_Header_Web_Page" ng-class="{CL_Header_Menu_Oculto: Bl_Menu_Desplegado, CL_Header_Menu_Desplegado: ! Bl_Menu_Desplegado}" class="Grid_Contenedor justify now_wrap">
    <div class="Grid_Contenedor main_start">
      <div id="CONT_Menu_Btn" class="Grid_Item">
        <div ng-click="FN_Menu()" title="Menú" class="CL_Desplegar_Menu CL_TXT_Pri_Btn relative">
          <p class="icon-menu2"></p><span class="CL_TXT_Info_Btn">Men&uacute;</span>
        </div>
      </div>
    </div>
    <div class="Grid_Contenedor main_end">
      <div id="CONT_Btns_Header" class="distributed Grid_Item Base-auto Padding-right-60 now_wrap">
        <div ng-click="FN_Login()" ng-if="BL_Btns_Ver_Login == true;Bl_Btn_Login_Iniciar_Sesion == true" ng-init="BL_Btns_Ver_Login = false;Bl_Btn_Login_Iniciar_Sesion = false" class="CL_Ingresar ng_show ng_repeat_anim1 margin_right-20"><a class="Btn_Estilo_1 icon-login">Ingresar</a></div>
        <div class="CL_Btns_Menu">
          <div ng-show="BL_Ver_Buscador_Producto == true;BL_Buscador_Productos == true" ng-init="BL_Ver_Buscador = false" ng-click="BL_Ver_Buscador =! BL_Ver_Buscador" class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn">
            <div class="CL_CONT_Contenedor_Btns_Opcion">
              <p class="icon-buscar"></p><span class="CL_TXT_Info_Btn">Buscar</span>
            </div>
          </div>
          <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
          <div ng-init="BL_Btns_Ver_Pedido = false" ng-click="FN_Orden();FN_Listas_Usuario()" title="Desplegar menu de orden" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 " class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn BTN_Opciones_Cuenta">
            <div class="CL_CONT_Contenedor_Btns_Opcion">
              <p class="icon-shopping-cart"></p><span class="CL_Btn_Contador">{{dato.NUM_Cantidad_Productos_En_Orden}}</span><span class="CL_TXT_Info_Btn">Orden</span>
            </div>
          </div>
          <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
          <div ng-init="BL_Btns_Ver_Notificaciones = false" ng-click="FN_Notificacion();FN_Listar_Notificaciones(6)" title="Desplegar menu de notificaciones" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 " class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn">
            <div class="CL_CONT_Contenedor_Btns_Opcion">
              <p class="icon-notificacion"></p><span class="CL_Btn_Contador"> {{dato.NUM_CantidadNotificaciones}}</span><span class="CL_TXT_Info_Btn">Notificaciones</span>
            </div>
          </div>
          <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
          <div ng-init="BL_Btns_Ver_Mensajes = false" ng-click="FN_Listar_Mensajes( 6 );FN_Mensaje_Desplegar(true,false,false,false,false)" title="Desplegar menu de mensajes" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3  " class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn">
            <div class="CL_CONT_Contenedor_Btns_Opcion">
              <p class="icon-mensaje"></p><span class="CL_Btn_Contador"> {{dato.NUM_CantidadMensajeUsuario}}</span><span class="CL_TXT_Info_Btn">Mensajes</span>
            </div>
          </div>
          <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
          <div ng-init="BL_Btns_Ver_Ordenes_Enviadas = false" ng-click="FN_Ordenes_Enviadas(2);FN_Listar_Pedidos_Enviados();FN_Listar_Ordenes_Enviadas()" title="Desplegar menu de ordenes enviadas" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3" class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn">
            <div class="CL_CONT_Contenedor_Btns_Opcion">
              <p class="icon-check-clipboard-1"></p><span class="CL_TXT_Info_Btn">Ordenes enviadas</span>
            </div>
          </div>
          <!--Elemento visible solo para usuarios y usuario sin iniciar sesion-->
          <div ng-click="FN_Listar_Sesiones_Chat();FN_Mensaje_Desplegar(true,true,false,false,true)" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol != 5" class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn">
            <div class="CL_CONT_Contenedor_Btns_Opcion">
              <p class="icon-comments-o"></p><span class="CL_TXT_Info_Btn">Chat</span>
            </div>
          </div>
          <div ng-click="FN_Opciones_Cuenta_Header()" title="Desplegar opciones perfil" class="CL_Btn_Herramientas_Header CL_TXT_Pri_Btn BTN_Opciones_Cuenta">
            <div class="CL_CONT_Contenedor_Btns_Opcion"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Usuario_Header"/><span ng-if="BL_Btns_Ver_Login == false;Bl_Btn_Login_Iniciar_Sesion == false" ng-class="{Activo: dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Activo', Inactivo:  dato.AOBJ_Datos_Usuario[0].Disponibilidad == 'Inactivo'}" title="Disponibilidad actual de tu cuenta" class="Estado_Usuario">
                <p></p></span><span class="CL_TXT_Info_Btn">Cuenta</span></div>
          </div>
        </div>
      </div>
    </div>
  </header>
</html>