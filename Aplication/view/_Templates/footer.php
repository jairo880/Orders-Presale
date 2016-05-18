
<section class="SC_Mensajes_Validaciones">
  <div ng-show="(dato.AOBJ_Mensaje_Alerta).length &gt; 0" class="Grid_Contenedor CL_CONT_Alertas cross_end">
    <div ng-show="Alertas.Visibilidad_Alerta == true" ng-repeat="Alertas in dato.AOBJ_Mensaje_Alerta" class="Grid_Item ng_show">
      <div ng-class="{Negro: Alertas.Tipo_Mensaje_Alerta == 'Negro',Blanco: Alertas.Tipo_Mensaje_Alerta == 'Blanco',Finalizado: Alertas.Tipo_Mensaje_Alerta == 'Finalizado',Alerta: Alertas.Tipo_Mensaje_Alerta == 'Alerta',Info: Alertas.Tipo_Mensaje_Alerta == 'Info',Error: Alertas.Tipo_Mensaje_Alerta == 'Error'}" class="CL_Mensaje_Alerta main_start Grid_Contenedor relative now_wrap">
        <div class="CL_Titulo_Alerta Base-20 abcenter cross_start Grid_Item">
          <p> <img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}"/></p>
        </div>
        <div class="CL_Mensaje_Alert Grid_Contenedor abcenter cross_start Base-90 Grid_Item">
          <div class="CL_TXT_Mensaje_Alerta Grid_Contenedor">
            <div class="Grid_Contenedor Base-100"><span> 
                <p>{{Alertas.Mensaje_Alerta}}</p></span></div>
          </div>
        </div><a ng-click="dato.FN_Cerrar_Mensaje_En_Especifico($index)" class="CL_Eliminar_6_6 CL_Cerrar"></a>
      </div>
    </div>
  </div>
</section>
<!--SECCION CONFIRMACIONES					-->
<section id="SC_Confirmaciones">
  <div id="CONT_Confirmacion" ng-show="BL_Ver_Confirmacion == true">
    <div id="CONT_Invisible" ng-click="BL_Ver_Confirmacion =! BL_Ver_Confirmacion">
      <div class="CL_Cerrar_Modal"></div>
    </div>
    <div id="CONT_Datos">
      <div id="COT_Confirmacion_Campos">
        <p class="CL_TXT_Titulo_Confirmacion">{{TXT_Texto_Confirmacion}}</p>
        <div class="CL_Btns_Confirmacion">
          <div ng-click="FN_Confirmacion_Alerta(NUM_Tipo_Funcion,NUM_Eliminar_Posicion,true,' ')" class="Btn_Estilo_1 icon-agregar3">Confirmar</div>
          <div ng-click="BL_Ver_Confirmacion =! BL_Ver_Confirmacion" class="Btn_Estilo_5 icon-cancelar3">Cancelar</div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer id="CONT_Footer">
  <div class="Grid_Contenedor main_end"><a id="CONT_Contenedor_Logo" href="<?php echo URL; ?>Inicio/Inicio" class="Visible-tablet"></a></div>
  <!--***********************************Javascript_Normal*******************-->
  <script language="javascript" src="<?php echo URL; ?>public/js/Javascript/Loading/Loading.js"></script>
  <!--***************************************Angular.js******************-->
  <!--*******************************Modelo*************************-->
  <script language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Modulos/Fabrica.js"></script>
  <!--*******************************Controladores*************************-->
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Controlador_Principal.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Registrar_Controlador.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Registrar_Usuario_Controlador.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Consultar_Usuario.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Controlador_Producto.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Categoria.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Promociones.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Controlador_Ejemplo_Crud.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Gestion_De_Contenido.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Javascript/Socket/fancywebsocket.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Permisos_Usuario.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Cotizacion.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Controlador_Pedido.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Ruta.js"></script>
  <script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Chat.js"></script>
</footer></section>
<body/>
<html/>