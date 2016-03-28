
<section class="SC_Mensajes_Validaciones">
  <div ng-show="dato.EstadoMensaje == true" class="CL_Mensaje_Alerta main_start Grid_Contenedor">
    <div class="CL_Titulo_Alerta Base-30 abcenter cross_start Grid_Item">
      <p> <img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}"/></p>
    </div>
    <div class="CL_Mensaje_Alert Grid_Contenedor abcenter cross_start Base-70 Grid_Item">
      <div class="CL_TXT_Mensaje_Alerta"><span ng-repeat="Alerta in dato.AOBJ_Mensaje_Alerta">
          <p>{{Alerta.TXT_Mensaje}}</p></span></div>
    </div><a ng-click="dato.FN_Mensaje_Alerta()" class="CL_Eliminar_5 CL_Cerrar"></a>
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
  <!--***********************************Javascript_Normal*******************-->
  <script src="<?php echo URL; ?>public/js/Javascript/Loading/Loading.js"></script>
  <!--***************************************Angular.js******************-->
  <!--*******************************Modelo*************************-->
  <script src="<?php echo URL; ?>public/js/Angular/Modulos/Fabrica.js"></script>
  <!--*******************************Controladores*************************-->
  <!--Angular pagina inicio-->
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Controlador_Principal.js"></script>
  <!--Angular pagina inicio-->
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Registrar_Controlador.js"></script>
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Registrar_Usuario_Controlador.js"></script>
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Consultar_Usuario.js"></script>
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Controlador_Producto.js"></script>
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Categoria.js"></script>
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Modulo_Promociones.js"></script>
  <script src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Controlador_Ejemplo_Crud.js"></script>
</footer></section>
<body/>
<html/>