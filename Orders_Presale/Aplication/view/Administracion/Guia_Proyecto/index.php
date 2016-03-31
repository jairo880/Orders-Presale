
<title>{{dato.AOBJ_Datos_Usuario[0].Nombre_Usuario}} | Guia proyecto</title>
<link rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Administracion/Guia_Proyecto/Guia_Proyecto.css"/>
<!--sesion Estructura-->
<main id="CONT_Principal_Guia" ng-init="FN_Ver_Elemento_Guia(8)">
  <section id="SC_Guia_Estructura" ng-if="Estructura == true" class="ng_show Grid_Contenedor Base-100 web-80 abcenter">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta principal(Orders_Presale_Aplicacion_Sena)</p>
    </div>
    <div id="CONT_Estructura_Carpetas" class="No_Padding Padding-tablet">
      <div id="CONT_Contenido" class="Base-100">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Carpetas principales<span>Orders_Presale</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Application</p><span class="CL_TXT_Descripcion icon-alerta2">Lugar donde se encuentran todos los archivos que se encargan del back-end, ademas de las vistas de Orders_Presale</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Bd_Orders_Presale</p><span class="CL_TXT_Descripcion icon-alerta2">Lugar donde se encuentran los archivos de la base de datos en Mysql, Procedimientos , insercciones, etc.</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Public</p><span class="CL_TXT_Descripcion icon-alerta2">Lugar donde se encuentran los archivos Front-end</span>
          </li>
        </div>
      </div>
    </div>
    <!---->
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta (Orders_Presale_Aplicacion_Sena\Application)</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Carpetas de <span>Application</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">config</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .php </i>  para crear la conexi&oacute;n con la base de datos</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">controller</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .php </i>  parar cada pagina web, son controladores que cuando son ejecutados realizan determinada acci&oacute;n como: Pintar una vista, llamar funcion de CRUD</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">core</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .php </i>  para realizar las RUTAS AMIGABLES</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">model</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .php </i>  para CRUD</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">view</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .php </i>  Se encuentra una carpeta _templates, dentro de esta se encuentra el Header y Footer de la pagina web, se insertan en la vista por medio de require APP de php</span>
          </li>
        </div>
      </div>
    </div>
    <!---->
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta (Orders_Presale_Aplicacion_Sena\Bd_Orders_Presale)</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Archivos de <span>Bd_Orders_Presale</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-file CL_Txt_1 CL_Alerta_5 Padding-5">Orders_Presale_Funciones</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .sql </i>  para las funciones creadas</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-file CL_Txt_1 CL_Alerta_5 Padding-5">Orders_Presale_Inser</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .sql </i>  para las inserciones de datos  de la base de datos</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-file CL_Txt_1 CL_Alerta_5 Padding-5">Orders_Presale_Procedimientos</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .sql </i>  para los procedimientos de CRUD de la base de datos</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-file CL_Txt_1 CL_Alerta_5 Padding-5">Bd_Orders_Presale</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .sql </i>  para la creacion de la Base de datos Orders_Presale</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-file CL_Txt_1 CL_Alerta_5 Padding-5">Bds_Todo</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .sql </i>  Contiene todo lo anterior combinado para as&iacute; acelerar el trabajo de importacion.</span>
          </li>
        </div>
      </div>
    </div>
    <!---->
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta (Orders_Presale_Aplicacion_Sena\Public)</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Carpetas de <span>Public</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">css</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .css </i>  de las pag&iacute;nas web, cada pag&iacute;na posee un archivo <i class="icon-file"> .css </i> unico, ademas poseen sus propios Mediaquery, los cuales se encuentran en la carpeta <i class="icon-folder"> sass </i></span><span class="CL_TXT_Descripcion icon-alerta2">Cada archivo  <i class="icon-file"> .css </i>  es generado por un archivo  <i class="icon-file"> .scss </i> ubicado en la carpeta <i class="icon-folder"> sass/Templates </i></span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">fonts</p><span class="CL_TXT_Descripcion icon-alerta2">Fuentes descargadas para usar en la pag&iacute;nas</span><span class="CL_TXT_Descripcion icon-alerta2">Ademas de las fuentes descargadas, en el proyecto Orders_Presale se usan las fuentes de <a target="_blank" class="icon-link" href="http://fontastic.me/">Fontastic</a>, para los iconos de la pag&iacute;na</span><span class="CL_TXT_Descripcion icon-alerta2">Para usar un icono de Fontastic, es necesario agregarle a la etiqueta &ltp&gt  &lta&gt  &ltspan&gt &lti&gt. la clase <i>icon</i>+guion medio+<i>Nombre del icono</i></span><span>Ejemplo: &ltp class="icon-folder"&gt</span><span class="CL_TXT_Descripcion icon-alerta2">El uso de las fuentes de  Fontastic, reduce el peso del proyecto, por el motivo de que no se estan usando imagenes para los iconos, si no, una fuente que trae los iconos</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">img</p><span class="CL_TXT_Descripcion icon-alerta2">Imagenes usadas en la pag&iacute;na web, wallpapers, iconos, logotipos  etc.</span><span class="CL_TXT_Descripcion icon-alerta2">Ademas de las imagenes ubicadas en esta carpeta, en Orders_Presale se usan imagenes alojadas en <a target="_blank" class="icon-link" href="https://www.dropbox.com/home">Dropbox</a> para as&iacute; disminuir el peso del proyecto</span><span class="CL_TXT_Descripcion icon-alerta2">El link para encontrar las imagenes es: <a target="_blank" class="icon-link" href="https://www.dropbox.com/home/Public/Orders_Presale/img">https://www.dropbox.com/home/Public/Orders_Presale/img</a></span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">jade</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .jade </i> para generar los archivos <i class="icon-file"> .php </i> ubicados dentro de la carpeta:<i class="icon-folder"> Orders_Presale_Aplicacion_Sena\Application\view </i></span><span class="CL_TXT_Descripcion icon-alerta2">La guia para usar jade puede encontrarse en su pagina oficial <a target="_blank" class="icon-link" href="http://jade-lang.com/reference/">jade-lang.com</a></span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">js</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .js </i></span><span class="CL_TXT_Descripcion icon-alerta2">se podran encontrar los archivos <i class="icon-file"> .js </i> de Angular.js dentro de la carpeta:<i class="icon-folder"> js/Angular </i></span><span class="CL_TXT_Descripcion icon-alerta2">La guia para usar Angular.js puede encontrarse en su pagina oficial <a target="_blank" class="icon-link" href="https://angularjs.org/">angularjs.org</a></span><span class="CL_TXT_Descripcion icon-alerta2">se puede encontrar otra guia para usar Angular.js en: <a target="_blank" class="icon-link" href="https://mega.nz/#!Yd9SSRLA!2P2-X0mcBzAxc6bN1DqHSYSvmdijy0pc071JU9CMhDo">Mega</a> este archivo es un <i class="icon-file"> .iso </i> donde se encuentra una serie de videos</span><span class="CL_TXT_Descripcion icon-alerta2">se podran encontrar los archivos <i class="icon-file"> .js </i> de Javascript dentro de la carpeta:<i class="icon-folder"> js/Javascript </i></span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">scss</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .scss </i> para generar los archivos <i class="icon-file"> .css </i> de la web</span><span class="CL_TXT_Descripcion icon-alerta2">la pagina oficial de sass es: <a target="_blank" class="icon-link" href="http://sass-lang.com/">Sass-lang.com</a></span><span class="CL_TXT_Descripcion icon-alerta2">Aqui un link para una guia rapida de sass: <a target="_blank" class="icon-link" href="https://youtu.be/xu0lVyrA8Y0">Sass guia </a></span>
          </li>
        </div>
      </div>
    </div>
    <!---->
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta (Orders_Presale_Aplicacion_Sena\Public\css)</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Carpetas de <span>css</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Base_Orders_Presale</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos <i class="icon-file"> .css </i> base, este archivo es el <i class="icon-file"> .css </i> base para todas las paginas web, de este se importan estilos de botones, formularios, textos, etc</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">img</p><span class="CL_TXT_Descripcion icon-alerta2">carpeta <i class="icon-folder">img</i> donde se encuentran las imagenes usadas desde los archivos <i class="icon-file"> .css </i></span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Templates</p><span class="CL_TXT_Descripcion icon-alerta2">carpeta <i class="icon-folder">Templates</i> donde se encuentran los diferentes  archivos  <i class="icon-file"> .css </i> de las paginas web, cada archivo se encuentra dentro de su carpeta correspondiente.</span>
          </li>
        </div>
      </div>
    </div>
    <!---->
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta (Orders_Presale_Aplicacion_Sena\Public\js\Angular)</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Carpetas de <span>Angular</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Controladores</p><span class="CL_TXT_Descripcion icon-alerta2">dentro de esta carpeta se encuentran los controladores creados para las paginas web.</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Librerias</p><span class="CL_TXT_Descripcion icon-alerta2">dentro de esta carpeta se encuentran las diferentes librerias importadas para Angular.js</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Modulos</p><span class="CL_TXT_Descripcion icon-alerta2">dentro de esta carpeta se encuentran los modulos creados para las paginas web.</span>
          </li>
        </div>
      </div>
    </div>
    <!---->
    <div id="CONT_Titulo">
      <p class="Icono1 icon-sitemap">Estructura carpeta (Orders_Presale_Aplicacion_Sena\Public\scss)</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-folder CL_Alerta_5">Carpetas de <span>scss</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Base_Orders_Presale</p><span class="CL_TXT_Descripcion icon-alerta2">Archivos basicos (Mediaquery, Variables, Archivo base de scss)</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Categoria</p><span class="CL_TXT_Descripcion icon-alerta2">Estilos para los: Botones,inputs,textos, etc</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Modulos</p><span class="CL_TXT_Descripcion icon-alerta2">Estilos para las Ventanas modales</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Tema</p><span class="CL_TXT_Descripcion icon-alerta2">Estilos del Header/Footer.</span>
          </li>
          <li class="Grid_Item Base-50 tablet-30">
            <p class="icon-folder CL_Txt_1 CL_Alerta_5 Padding-10">Templates</p><span class="CL_TXT_Descripcion icon-alerta2">Estilos de los Templates de las paginas</span>
          </li>
        </div>
      </div>
    </div>
  </section>
  <!--sesion sass-->
  <section id="SC_Sass" ng-if="Sass == true" class="ng_show Grid_Contenedor Base-100 web-80 abcenter">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Titulo">
      <p class="Icono1 icon-css">Estandarizaci&oacute;n para Sass</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-css CL_Alerta_5 Padding-5">Estandarizaci&oacute;n<span>Mixin</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Botones</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Btn_Estilos</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre de las clases: Btn_Estilo_(1,2,3,4,etc)</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Select</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Select_Estilos</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre de las clases: Select_(1,2,3,4,etc)</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Radio bottom</p>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Radio_Botton_Estilos</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre de las clases: RadioBtn_(1,2,3,4,etc)</span><span class="CL_TXT_Descripcion icon-alerta2">Tener en cuenta que el mixin posee una extructura, para aplicar los estilos, revizar como nombrar los elemento para poder aplicar el estilos correctamente</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Input</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Input_Estilos</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre de las clases: Input_Estilo_(1,2,3,4,etc)</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Tablas</p>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Tablas_Estilo</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre de las clases: Tabla_Estilo_(1,2,3,4,etc)</span><span class="CL_TXT_Descripcion icon-alerta2">Tener en cuenta que el mixin posee una extructura, para aplicar los estilos, revizar como nombrar los elemento para poder aplicar el estilos correctamente</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Animaciones Regular</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Animacion_Normal($Duracion1, $Tipo, $Duracion2)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Duracion1: duraci&oacute;n inicial de la animaci&oacute;n</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Tipo: linear, ease, ease-in-out etc</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Duracion2: duraci&oacute;n final de la animaci&oacute;n</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo:  @include MX_Animacion_Normal(0.2, ease, 0.2);</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Animaciones Cubic_beizer</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Cubic_beizer_Scale($Scale)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Scale: tamaño del efecto</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Cubic_beizer_Scale(9/10);</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Animaciones Angular.js</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Animaciones_Angular</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo:</span>
            <p class="CL_Txt_1">------------------------------</p><span>.ng-hide-add { animation: 0.5s Nombre_Animacion_Inicial ease; }</span>
            <p class="CL_Txt_1">------------------------------</p><span>.ng-hide-remove { animation: 0.5s Nombre_Animacion_Final ease; }</span>
            <p class="CL_Txt_1">------------------------------</p><span>Los nombres de las animaciones se encuentran dentro del archivo <i class="icon-file"> _Animaciones.scss </i> </span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Para angular se tienen algunas animaciones por defecto como lo son para la directiva ng-if, ng-repeat</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Fuentes descargadas</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Fuentes_Web($Encarpetado_Fuentes)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Encarpetado_Fuentes: es la forma de pasar la ruta de la carpeta "../../../fonts/"</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Fuentes_Web("../../../fonts/");</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Textos </p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: Texto_Estilo_1($Tamaño_Fuente,$Color,$Font_Weight,$Aline)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Tamaño_Fuente: tamaño de la fuente</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Color: color de la fuente</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Font_Weight:  font-wight para la fuente</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Aline: center, left, right </span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo:  @include Texto_Estilo_1(13px,$Color_12,100,left);</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Se poseen varios mixin para los estilos de texto, tansolo varia el numero del mixin Texto_Estilo_(1,2,3,4,etc)</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Barra de busqueda</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Barra_Busqueda</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Barra_Busqueda();</span><span class="CL_TXT_Descripcion icon-alerta2">Tener en cuenta que el mixin posee una extructura, para aplicar los estilos, revizar como nombrar los elemento para poder aplicar el estilos correctamente</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Boton circular </p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Btn_Nuevo_Mensaje</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Btn_Nuevo_Mensaje();</span><span class="CL_TXT_Descripcion icon-alerta2">Tener en cuenta que el mixin posee una extructura, para aplicar los estilos, revizar como nombrar los elemento para poder aplicar el estilos correctamente</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Botones notificacion</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Notificaciones_Estilos</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Notificaciones_Estilos();</span><span class="CL_TXT_Descripcion icon-alerta2">Tener en cuenta que el mixin posee una extructura, para aplicar los estilos, revizar como nombrar los elemento para poder aplicar el estilos correctamente</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Box-shadow</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Box_Shadow($x, $y, $blur, $opacidad, $Color)</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Box_Shadow(0px,0px, 1px, 0px, rgba(0,0,0,6/10));</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Border-radius</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Bor_Radius($Valor, $Tipo)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Tipo: indica donde se aplicara el border-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>1: border-top-left-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>2: border-top-right-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>3: border-bottom-left-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>4: border-bottom-right-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>0: todos los lados tendran el border-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo: @include MX_Bor_Radius(2px,0);</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Box-sizing</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Box-Sizing(TipoBox)</span><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo:  @include MX_Box-Sizing(border-box);</span>
          </li>
          <li class="Grid_Item Base-60">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Imagenes con url local</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Imagen_Folder_Proyect($Encarpetado, $url, $Tamaño, $Repeat, $TodoContenido)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Encarpetado: ruta de la carpeta img, esta ruta esta ya dada, tansolo es llenar este campo con la variable $Encarpetado</span>
            <p class="CL_Txt_1">------------------------------</p><span>$url:  url de la imagen despues de la carpeta img</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Tamaño:  el tamaño de la imagen, se puede dar en px o si se quiere de todo el tamaño se usa el cover para el tamaño auto deacuerdo al contenedor</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Repeat: por defecto pondremo no-repeat, pero recibe las demas propiedades de repeat</span>
            <p class="CL_Txt_1">------------------------------</p><span>$TodoContenido: si es igual a 1: obtendra un 50% de border-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>$TodoContenido: si es igual a 2: el border-radius cera 0</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo:  @include MX_Imagen_Folder_Proyect($Encarpetado,'wallpaper/imagen1.jpg',110px 35px,no-repeat,1);</span>
          </li>
          <li class="Grid_Item Base-60">
            <p class="icon-css CL_Txt_1 CL_Alerta_5">Imagenes con url web</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre mixin: MX_Imagen_Folder_Web( $url, $Tamaño, $Repeat, $TodoContenido)</span>
            <p class="CL_Txt_1">------------------------------</p><span>$url:  url de la imagen, esta url es web</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Tamaño:  el tamaño de la imagen, se puede dar en px o si se quiere de todo el tamaño se usa el cover para el tamaño auto deacuerdo al contenedor</span>
            <p class="CL_Txt_1">------------------------------</p><span>$Repeat: por defecto pondremo no-repeat, pero recibe las demas propiedades de repeat</span>
            <p class="CL_Txt_1">------------------------------</p><span>$TodoContenido: si es igual a 1: obtendra un 50% de border-radius</span>
            <p class="CL_Txt_1">------------------------------</p><span>$TodoContenido: si es igual a 2: el border-radius cera 0</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Como llamarlo:  @include MX_Imagen_Folder_Web('https://dl.dropboxusercontent.com/u/232442887/Orders_Presale/img/logo/LogoOrders_PresaleColor.png',110px 35px,no-repeat,1);</span>
          </li>
        </div>
      </div>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-css CL_Alerta_5 Padding-5">Estandarizaci&oacute;n<span>Placeholder o Estilos fantasmas</span>
          <div class="CL_Bloques Grid_Contenedor">
            <li class="Grid_Item Base-100 tablet-30">
              <p class="icon-css CL_Txt_1 CL_Alerta_5">Placeholder o Estilos Fantasmas</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre Placeholder: %PH_Nombre</span>
            </li>
          </div>
        </p>
      </div>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-css CL_Alerta_5 Padding-5">Estandarizaci&oacute;n<span>Variables (Colores)</span>
          <div class="CL_Bloques Grid_Contenedor">
            <li class="Grid_Item Base-100 tablet-30">
              <p class="icon-css CL_Txt_1 CL_Alerta_5">Colores</p><span class="CL_TXT_Descripcion icon-alerta2">Nombre Colores: $Color_(1,2,3,4,5,6,etc)</span>
            </li>
          </div>
        </p>
      </div>
    </div>
  </section>
  <!--sesion angular-->
  <section id="SC_Sass" ng-if="Angular == true" class="ng_show Grid_Contenedor Base-100 web-80 abcenter">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Titulo">
      <p class="Icono1 icon-angular">Estandarizaci&oacute;n para Angular.js</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-angular CL_Alerta_5">Estandarizaci&oacute;n<span>Variables</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">Boolean</p><span class="CL_TXT_Descripcion icon-alerta2">BL_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">Numerica</p><span class="CL_TXT_Descripcion icon-alerta2">NUM_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">CADENA DE TEXTO</p><span class="CL_TXT_Descripcion icon-alerta2">TXT_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">URL</p><span class="CL_TXT_Descripcion icon-alerta2">URL_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">ARRAY OBJETO</p><span class="CL_TXT_Descripcion icon-alerta2">AOBJ_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">FECHA</p><span class="CL_TXT_Descripcion icon-alerta2">DATE_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-angular CL_Txt_1 CL_Alerta_5">FUNCIONES</p><span class="CL_TXT_Descripcion icon-alerta2">FN_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
        </div>
      </div>
    </div>
  </section>
  <!--sesion Html-->
  <section id="SC_Sass" ng-if="Html == true" class="ng_show Grid_Contenedor Base-100 web-80 abcenter">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Titulo">
      <p class="Icono1 icon-html5">Estandarizaci&oacute;n para HTML</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <p class="CL_Titulo_Contenedor icon-html5 CL_Alerta_5">Estandarizaci&oacute;n<span>Etiquetas</span></p>
        <div class="CL_Bloques Grid_Contenedor">
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-html5 CL_Txt_1 CL_Alerta_5">Para contenedores</p><span class="CL_TXT_Descripcion icon-alerta2">CONT_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-html5 CL_Txt_1 CL_Alerta_5">SECTION</p><span class="CL_TXT_Descripcion icon-alerta2">SC_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-html5 CL_Txt_1 CL_Alerta_5">CLASES</p><span class="CL_TXT_Descripcion icon-alerta2">CL_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2"> Si la clase es un contenedor:</span><span class="CL_TXT_Descripcion icon-alerta2"> CL_CONT_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2"> Si la clase es un texto:</span><span class="CL_TXT_Descripcion icon-alerta2"> CL_TXT_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2"> Si un input posee clase:</span><span class="CL_TXT_Descripcion icon-alerta2"> CL_INPUT_Nombre:</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-html5 CL_Txt_1 CL_Alerta_5">FORMULARIOS</p><span class="CL_TXT_Descripcion icon-alerta2">FORM_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-html5 CL_Txt_1 CL_Alerta_5">ID</p><span class="CL_TXT_Descripcion icon-alerta2">ID_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-html5 CL_Txt_1 CL_Alerta_5">ID INPUT PARA LABELS</p><span class="CL_TXT_Descripcion icon-alerta2">ID_INPUT_Nombre_Variable</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
        </div>
      </div>
    </div>
  </section>
  <!--sesion Base de datos-->
  <section id="SC_Sass" ng-if="DB == true" class="ng_show Grid_Contenedor Base-100 web-80 abcenter">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Titulo">
      <p class="Icono1 icon-database">Estandarizaci&oacute;n para BASE DE DATOS</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido">
        <div class="CL_Bloques Grid_Contenedor">
          <p class="CL_Titulo_Contenedor icon-database CL_Alerta_5">Estandarizaci&oacute;n<span>Nombres</span></p>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-database CL_Txt_1 CL_Alerta_5">Tablas</p><span class="CL_TXT_Descripcion icon-alerta2">TBL_Nombre_Tabla</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-database CL_Txt_1 CL_Alerta_5">Primary key</p><span class="CL_TXT_Descripcion icon-alerta2">PK_ID_Nombre: si el campo es un id </span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-database CL_Txt_1 CL_Alerta_5">Foreing key</p><span class="CL_TXT_Descripcion icon-alerta2">FK_ID_Nombre</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-database CL_Txt_1 CL_Alerta_5">ID</p><span class="CL_TXT_Descripcion icon-alerta2">ID_Nombre</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
          <li class="Grid_Item Base-100 tablet-30">
            <p class="icon-database CL_Txt_1 CL_Alerta_5">Tabla detalle</p><span class="CL_TXT_Descripcion icon-alerta2">TBL_DLL_Nombre_Tabla</span>
            <p class="CL_Txt_1">------------------------------</p><span class="CL_TXT_Descripcion icon-alerta2">Si el nombre posee mas de dos palabras, separarla por _ y la siguiente letra ponerla en Mayuscula</span>
          </li>
        </div>
      </div>
    </div>
  </section>
  <!--sesion diseño-->
  <section id="SC_Sass" ng-if="Diseno == true" class="ng_show">
    <div id="CONT_Contenedor_Invisible_Header"></div>
    <div id="CONT_Titulo">
      <p class="Icono1 icon-design">Ayudas para el diseño</p>
    </div>
    <div id="CONT_Estructura_Carpetas">
      <div id="CONT_Contenido" class="Grid_Contenedor abcenter Base-100 web-85">
        <div class="CL_Bloques Grid_Contenedor">
          <li class="CL_Diseno">
            <p class="CL_Titulo_Contenedor icon-design">Etiquetas<span>UI Elements</span></p>
            <p class="icon-design CL_Alerta_5 Padding-10 CL_Titulo_Grid">GRID LAYOUT</p>
            <div class="Grid_Contenedor">
              <div class="Color Grid_Total">.Grid_Total </div>
              <div class="Color Grid_Item Base-40 web-10"> </div>
              <div class="Color Grid_Item Base-5 web-75"> </div>
              <div class="Color Grid_Item Base-45 web-10"></div>
              <div class="Color Grid_Item Base-30 web-10"> </div>
              <div class="Color Grid_Item Base-40 web-75"> </div>
              <div class="Color Grid_Item Base-70 web-80"> </div>
              <div class="Color2 Grid_Item Base-15"></div>
              <div class="Color2 Grid_Item Base-100"></div>
            </div>
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Total">
                <div class="icon-design CL_Alerta_5 Grid_Contenedor Padding-10">
                  <p class="CL_Txt_1">¿Como usarlo?</p>
                  <ul class="Base-100">
                    <li class="CL_TXT_Descripcion">se manejan tres tipos de clases:</li>
                    <li class="CL_TXT_Descripcion"><i class="CL_TXT_I">.Grid_Contenedor</i> esta clase se usa solamente  en el contenedor padre o contenedor principal de los elementos, posee ya las propiedades:<i class="CL_TXT_I"> display-flex</i> y <i class="CL_TXT_I">flex-wrap:wrap</i>, por defecto ocupara el 100% del contenedor en que se encuentre</li>
                    <li class="CL_TXT_Descripcion"><i class="CL_TXT_I">.Grid_Item</i> este es el item o contenedor hijo, posee la propiedad widht:100% por defecto</li>
                    <li class="CL_TXT_Descripcion"><i class="CL_TXT_I">.Grid_Total</i> esta clase lo que nos permite es indicarle a un elemento que ocupe el 100% del contenedor en el que se encuentra</li>
                  </ul>
                </div>
                <div class="icon-design CL_Alerta_5 Padding-10">
                  <p class="CL_Txt_1">¿Cual es el orden para usar estas etiquetas?</p>
                  <ul class="Base-100">
                    <li class="CL_TXT_Descripcion">Al manejar el concepto de  <i class="CL_TXT_I">Flex-box</i> utilizaremos la clase <i class="CL_TXT_I">.Grid_Contenedor</i> en los contenedores de la informaci&oacute;n que queremeos mostrar.</li>
                    <li class="CL_TXT_Descripcion">las etiquetas <i class="CL_TXT_I">.Grid_Item</i> o <i class="CL_TXT_I">.Grid_Total</i> en los elementos que se encontraran dentro del contenedor padre o contenedor principal de nuestra informaci&oacute;n</li>
                  </ul>
                </div>
                <p class="icon-design CL_Alerta_5 Padding-10">¿TENGA EN CUENTA?</p>
                <p class="CL_TXT_Descripcion">cuando se usa la propiedad  <i class="CL_TXT_I">display:flex</i> en un item o hijo, este pasa a ser un contenedor padre, flex-box permite la multiple creacion de contenedores padres he hijos, (Esto no lo hace Grid_Layout) por defecto es una estructura que se maneja en flex-box</p>
                <div class="icon-design CL_Alerta_5">
                  <p class="Padding-10">¿Que etiqueta usar para agregar la clase?</p>
                  <p class="CL_TXT_Descripcion">al manejarce el concepto de contenedor e hijo se utilizaran como estandar de maquetacion, los #div, a estos #div se les agregara la propiedad correspondiente por medio de una clase </p>
                  <p class="CL_TXT_Descripcion"><i class="CL_TXT_I">.Base:</i> para poder especificar cuanto queremos que un contenedor ocupe de tamaño usamos esta clase, debemos de indicar el tamaño que queremos para el contenedor, el tamaño se da de 5% en 5% hasta 100%, se especifica cuanto queremos ocupar con el contenedor añadiendole un guion medio (-) y el valor, ademas se le puede agregar a la clase  <i class="CL_TXT_I">.Grid_Contenedor</i>  para asi indicar el tamaño de un contenedor padre o un contenedor hijo, Ejemplo:</p>
                  <ul>
                    <li class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-20 </i> ocupara el  20% </li>
                    <li class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-10 </i> ocupara el 10%</li>
                    <li class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-15 </i> ocupara el 15%</li>
                    <li class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Contenedor.Base-15 </i> ocupara el 15%</li>
                    <li class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Contenedor.Base-15 </i> ocupara el 15%</li>
                  </ul>
                </div>
              </div>
              <div class="Grid_Item Base-100">
                <p class="icon-design CL_Txt_1"> </p>
                <p class="icon-design CL_Alerta_5 Padding-10">¿Como puedo definir otro tipo de valor ademas de medidas de 5 en 5?</p>
                <p class="CL_TXT_Descripcion"> Para poderlo hacer se manejan medidas en fracciones: tercios, sextos y octavos </p>
                <div class="Grid_Contenedor">
                  <div class="Grid_Total">
                    <p class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-2-6</i>  ocupara el   33.33333% </p>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Total">
                    <p class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-3-8</i>  ocupara el   37.5%</p>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Total">
                    <p class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-4-8</i>  ocupara el   62.5% </p>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="Grid_Total">
                    <p class="CL_TXT_Descripcion"> <i class="CL_TXT_I">.Grid_Item.Base-6-8</i>  ocupara el   75%</p>
                  </div>
                </div>
              </div>
              <div class="Grid_Item Base-100">
                <div class="CL_Alerta_5 Padding-10">
                  <p>Breakpoints</p>
                  <p class="CL_TXT_Descripcion">Los breakpoint son los puntos en que se activan las media querys de la pagina web, estos puntos estan definidos por 4 nombres</p>
                  <ul>
                    <li>movil</li>
                    <li>tablet</li>
                    <li>web</li>
                    <li>hd</li>
                  </ul>
                  <p class="CL_TXT_Descripcion">para poder indicar a que resolucion quieres que se haga visible y cambie de tamaño un elemento, normalmente lo tienes que hacer creando un archivo css en en cual indiques el punto del media query y luego agregar los estilos que quieres que obtenga el elemento.</p>
                  <p class="CL_TXT_Descripcion">con Grid_Layout puedes indicar a que breackpoint quieres que un contenedor sea visible o cambie de tamaño y algunas otras propiedades como las de Flex-box y padding. Ejemplo:</p>
                  <ul>
                    <li>tablet-50</li>
                    <li>web-100</li>
                    <li>movil-30</li>
                    <li>movil-distribute</li>
                    <li>tablet-abcenter</li>
                    <li>movil-justify</li>
                    <li>padding-tablet</li>
                    <li>padding-movil</li>
                  </ul>
                  <p class="CL_TXT_Descripcion">Ademas  podemos agregar un padding determinado, agregando la clase Padding seguido por un guion medio (-) y el valor del padding, los valores se dan de 5px en 5px hasta 100px Ejemplo:</p>
                  <ul>
                    <li>.Padding-5</li>
                    <li>.Padding-50</li>
                    <li>.Padding-80</li>
                  </ul>
                  <p class="CL_TXT_Descripcion">As&iacute; podras indicar a que tipo de resolucion quieres que cambie de tamaño un elemento en la web, sin necesidad de tener que crear el estilos ni la mediaquery correspondiente.</p>
                </div>
                <div class="CL_Alerta_5 Padding-10">!Nota¡
                  <p class="CL_TXT_Descripcion">La propiedad <i class="CL_TXT_I">.Grid_Item</i> posee en sus propiedades un</p>
                  <ul>
                    <li>padding-left:10px;</li>
                    <li>paddign-right:10px;</li>
                  </ul>
                  <p class="CL_TXT_Descripcion">Esto se hace para poder lograr una separacion entre los elementos y asi no obtener una agrupacion de contenedores sin separaciones, pero si llega un punto en el que quieres quitarle el padding al elemento puedes usar la propiedad <i class="CL_TXT_I">.No_Paddding</i> esta quitara el padding del elemento item</p>
                  <p class="CL_TXT_Descripcion">Ademas de esto puedes usar la propiedad <i class="CL_TXT_I">.Padding </i> con los breakpoints para asi indicar a que resoluci&oacute;n quieres que se separen algunos elementos Ejemplo:</p>
                  <ul>
                    <li>.Padding-tablet </li>
                    <li>.Padding-web</li>
                    <li>.Padding-movil</li>
                    <li>.Padding-hd</li>
                  </ul>
                </div>
              </div>
              <div class="Grid_Total Grid_Contenedor">
                <p class="CL_Alerta_5 Padding-10">Gri_Layout +  Propiedades Flex-Box</p>
                <p class="CL_TXT_Descripcion CL_Alerta_5 Padding-10">Las siguientes propiedades se agregan por medio de una clase, estas aplicaran las propiedades correspondientes. </p>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.justify</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>justify-content: space-between;</li>
                      <li> display: flex;</li>
                      <li> flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.distributed</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                      <li>justify-content: space-around;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.main_center</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>justify-content: center;</li>
                      <li> display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.main_start</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>justify-content: flex-start;</li>
                      <li> display: flex;</li>
                      <li> flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.main_end</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>justify-content: flex-end;</li>
                      <li>display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.cross_start</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>align-items: flex-start;</li>
                      <li>align-content: flex-start;</li>
                      <li> display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.cross_center</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>align-items: center;</li>
                      <li>align-content: center;</li>
                      <li>display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.cross_end</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>align-items: flex-end;</li>
                      <li>align-content: flex-end;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.reverse</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>flex-direction: row-reverse;</li>
                      <li>display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.column</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>flex-direction: column;</li>
                      <li>display: flex;</li>
                      <li>flex-wrap: wrap;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.column_reverse</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>flex-direction: column-reverse;</li>
                    </ul>
                  </div>
                </div>
                <div class="Grid_Item Base-100 tablet-50">
                  <div class="CL_Alerta_5 Padding-10">
                    <p class="Grid_Total"><i class="CL_TXT_I">.abcenter</i></p>
                    <p>Propiedades que usa : </p>
                    <ul>
                      <li>justify-content: center;</li>
                      <li>align-items: center;</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="Grid_Contenedor">
                <div class="Grid_Total No_Padding">
                  <div class="CL_Alerta_5 Padding-10">
                    <p>Manejando Grid_Layoud con los Breakpoints</p>
                    <p class="CL_TXT_Descripcion">Con grid_Layout podemos agregar propiedades de tamaño para distribuir nuestro contenido, o podemos agregar propiedades Flex-Box para posicionar en ciertas posiciones los elementos, pero ademas de esto nos permite indicar a que tipo de resolucion queremos que se vean ciertos elementos de la web, esto se logra con los Breakpoints</p>
                    <ul>
                      <li>movil</li>
                      <li>web</li>
                      <li>hd</li>
                      <li>tablet</li>
                    </ul>
                    <p class="CL_TXT_Descripcion">Agregando el nombre del Breakpoint seguido por un guion medio (-) y el tamaño que queremos que ocupe el elemento, obtenemos una adaptacion responsiv sencilla y rapida Ejemplo:</p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.tablet-50</i></p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.hd-95</i></p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.web-100</i></p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.movil-10</i></p>
                    <p class="CL_TXT_Descripcion CL_Alerta_5 Padding-10">¿Como ocultar o mostrar elementos de acuerdo a la resoluci&oacute;n de la pantalla?</p>
                    <ul>
                      <li class="Grid_Total">.Visible </li>
                      <li class="Grid_Total">.Invisible</li>
                    </ul>
                    <p class="CL_TXT_Descripcion">Estas dos propiedades nos permiten ocultar o mostrar elementos, y al combinarlas con los breakpoints podremos indicar a que resolucion queremos que se vea un elemento en especifico Ejemplo:</p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.visible-web</i></p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.invisible-movil</i></p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.visible-tablet</i></p>
                    <p class="Grid_Total"><i class="CL_TXT_I">.invisible-hd</i></p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Botones</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.Btn_Estilo_(1,2,3,4,5,6)</li>
                <li>Clases:.Btn_Estilo_1-(1,2,3,4,5,6) </li>
              </ul>
            </div><a class="Btn_Estilo_1 icon-login">Defaul</a><a class="Btn_Estilo_2 icon-login">Defaul</a><a class="Btn_Estilo_3 icon-login">Defaul</a><a class="Btn_Estilo_4 icon-login">Defaul</a><a class="Btn_Estilo_5 icon-login">Defaul</a><a class="Btn_Estilo_6 icon-login">Defaul</a><a class="Btn_Estilo_7 icon-login">Defaul</a><a class="Btn_Estilo_1_1 icon-login">Defaul</a><a class="Btn_Estilo_2_2 icon-login">Defaul</a><a class="Btn_Estilo_3_3 icon-login">Defaul</a><a class="Btn_Estilo_4_4 icon-login">Defaul</a><a class="Btn_Estilo_5_5 icon-login">Defaul</a><a class="Btn_Estilo_6_6 icon-login">Defaul</a><a class="Btn_Estilo_7_7 icon-login">Defaul</a>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Radio botton</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.RadioBtn_1(1,2,3,4,5,6) para los estilos del label</li>
                <li>Clase: .Btn_Radio para el input, este se ocultara y se dejara el label</li>
              </ul>
              <p>Revizar elementos hijos necesarios.</p>
            </div>
            <section id="SC_Genero" class="ng_show">
              <input id="ID_INPUT_Hombre" name="sexo" type="radio" class="Btn_Radio"/>
              <label for="ID_INPUT_Hombre" class="RadioBtn_1">Hombre</label>
              <input id="ID_INPUT_Mujer" name="sexo" type="radio" class="Btn_Radio"/>
              <label for="ID_INPUT_Mujer" class="RadioBtn_1">Mujer</label>
            </section>
            <section id="SC_Genero" class="ng_show">
              <input id="ID_INPUT_Hombre2" name="sexo" type="radio" class="Btn_Radio"/>
              <label for="ID_INPUT_Hombre2" class="RadioBtn_2">Hombre</label>
              <input id="ID_INPUT_Mujer2" name="sexo" type="radio" class="Btn_Radio"/>
              <label for="ID_INPUT_Mujer2" class="RadioBtn_2">Mujer</label>
            </section>
            <section id="SC_Genero" class="ng_show">
              <input id="ID_INPUT_Hombre3" name="sexo" type="radio" class="Btn_Radio"/>
              <label for="ID_INPUT_Hombre3" class="RadioBtn_3">Hombre</label>
              <input id="ID_INPUT_Mujer3" name="sexo" type="radio" class="Btn_Radio"/>
              <label for="ID_INPUT_Mujer3" class="RadioBtn_3">Mujer</label>
            </section>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Select</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.Select_1(1,2,3,4,5,6)</li>
              </ul>
              <p>Revizar elementos hijos necesarios.</p>
            </div>
            <select name="" value="Bello" required="required" class="Select_1">
              <option value="Bello">Bello</option>
              <option value="Antioquia">Antioquia</option>
            </select>
            <select name="" value="Bello" required="required" class="Select_2">
              <option value="Bello">Bello</option>
              <option value="Antioquia">Antioquia</option>
            </select>
            <select name="" value="Bello" required="required" class="Select_3">
              <option value="Bello">Bello</option>
              <option value="Antioquia">Antioquia</option>
            </select>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Boton circular</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.Btn_Circular_1(1,2,3,4,5,6)</li>
              </ul>
              <p>Revizar elementos hijos necesarios. !Nota¡: Hay que agregarle al contenedor en que se encuentre el boton un Position:realitve, para que el boton tome como posicion de referencia la del contenedor en que se encuentra, si no se hace esto, el boton se saldra del contenedor.</p>
            </div>
            <div class="Btn_Circular_1">
              <p class="icon-chat"></p>
              <p class="CL_TXT_Info_Btn">Nuevo mensaje</p>
            </div>
            <div class="Btn_Circular_2">
              <p class="icon-chat"></p>
              <p class="CL_TXT_Info_Btn">Nuevo mensaje	</p>
            </div>
            <div class="Btn_Circular_3">
              <p class="icon-chat"></p>
              <p class="CL_TXT_Info_Btn">Nuevo mensaje	</p>
            </div>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Buscador</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.CL_Buscar(1,2,3,4,5,6)</li>
              </ul>
              <p>Revizar elementos hijos necesarios </p>
            </div>
            <div class="CL_Contenedor_Buscador">
              <input id="BuscarOrden" type="text" name="" placeholder="Buscar producto" ng-model="buscar_producto" class="CL_Buscar"/>
              <label for="BuscarOrden" class="icon-buscar CL_Icono_Buscar"></label>
            </div>
          </li>
          <li class="CL_Diseno">
            <p class="icon_design CL_Txt_1">Enlaces</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.CL_TXT_Enlace_(1,2,3,4,5,6)</li>
              </ul>
            </div><a class="CL_TXT_Enlace_1">Crear cuenta</a><a class="CL_TXT_Enlace_2">Crear cuenta</a><a class="CL_TXT_Enlace_3">Crear cuenta</a><a class="CL_TXT_Enlace_4">Crear cuenta</a><a class="CL_TXT_Enlace_5">Crear cuenta</a><a class="CL_TXT_Enlace_6">Crear cuenta</a>
          </li>
          <li class="CL_Diseno">
            <p class="icon_design CL_Txt_1">Textos</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.CL_TXT_Texto_(1,2,3,4,5,6)</li>
              </ul>
            </div><a class="CL_TXT_Texto_1">Crear cuenta</a><a class="CL_TXT_Texto_2">Crear cuenta</a><a class="CL_TXT_Texto_3">Crear cuenta</a><a class="CL_TXT_Texto_4">Crear cuenta</a><a class="CL_TXT_Texto_5">Crear cuenta</a><a class="CL_TXT_Texto_6">Crear cuenta</a>
          </li>
          <li ng-controller="Controlador_Guia_Proyecto" class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Tablas</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.Tabla_Estilo_1(1,2,3,4,5,6)</li>
              </ul>
              <p>Revizar elementos hijos necesarios</p>
            </div>
            <div class="Tabla_Estilo_1">
              <table>
                <thead>
                  <tr>
                    <th># </th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <tr dir-paginate="Ejemplo in Ejemplo_Array  | itemsPerPage: pageSize" current-page="currentPage">
                    <td>{{Ejemplo.NUM_ID_Mensaje}}</td>
                    <td>{{Ejemplo.TXT_Nombre_Usuario}}</td>
                    <td>{{Ejemplo.TXT_Mensaje}}</td>
                    <td>{{Ejemplo.DATE_Hora_Envio}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="Tabla_Estilo_2">
              <table>
                <thead>
                  <tr>
                    <th># </th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <tr dir-paginate="Ejemplo in Ejemplo_Array  | itemsPerPage: pageSize" current-page="currentPage">
                    <td>{{Ejemplo.NUM_ID_Mensaje}}</td>
                    <td>{{Ejemplo.TXT_Nombre_Usuario}}</td>
                    <td>{{Ejemplo.TXT_Mensaje}}</td>
                    <td>{{Ejemplo.DATE_Hora_Envio}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="Tabla_Estilo_3">
              <table>
                <thead>
                  <tr>
                    <th># </th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <tr dir-paginate="Ejemplo in Ejemplo_Array  | itemsPerPage: pageSize" current-page="currentPage">
                    <td>{{Ejemplo.NUM_ID_Mensaje}}</td>
                    <td>{{Ejemplo.TXT_Nombre_Usuario}}</td>
                    <td>{{Ejemplo.TXT_Mensaje}}</td>
                    <td>{{Ejemplo.DATE_Hora_Envio}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="Tabla_Estilo_4">
              <table>
                <thead>
                  <tr>
                    <th># </th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                  </tr>
                </thead>
                <div class="Grid_Contenedor abcenter CON_Paginacion">
                  <div class="Grid_Contenedor Base-10">
                    <p class="CL_TXT_Texto_2">Pag&iacute;na: {{currentPage}}</p>
                  </div>
                  <div class="Grid_Contenedor Base-5">
                    <input type="number" min="1" max="100" ng-model="pageSize" class="Input_Estilo_1 No_Margin"/>
                  </div>
                  <dir-pagination-controls boundary-links="true" class="Base-45 cross_end Grid_Contenedor">
                    <p class="CL_TXT_Texto_3">{{currentPage}}</p>
                    <ul ng-if="1 &lt; pages.length || !autoHide" class="main_end CL_Paginacion_1 Grid_Contenedor">
                      <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(1)">&laquo;</a></li>
                      <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == 1 }"><a href="" ng-click="setCurrent(pagination.current - 1)">&lsaquo;</a></li>
                      <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ active : pagination.current == pageNumber, Paginacion_Disabled : pageNumber == '...' }">{{ pageNumber }}</li>
                      <li ng-if="directionLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.current + 1)">&rsaquo;</a></li>
                      <li ng-if="boundaryLinks" ng-class="{ Paginacion_Disabled : pagination.current == pagination.last }"><a href="" ng-click="setCurrent(pagination.last)">&raquo;</a></li>
                    </ul>
                  </dir-pagination-controls>
                </div>
                <tbody>
                  <tr dir-paginate="Ejemplo in Ejemplo_Array  | itemsPerPage: pageSize" current-page="currentPage">
                    <td>{{Ejemplo.NUM_ID_Mensaje}}</td>
                    <td>{{Ejemplo.TXT_Nombre_Usuario}}</td>
                    <td>{{Ejemplo.TXT_Mensaje}}</td>
                    <td>{{Ejemplo.DATE_Hora_Envio}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Imagenes</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.CL_Imagen_(1,2,3,4,5,6)</li>
              </ul>
            </div><img src="http://lorempixel.com/90/90/" class="CL_Imagen_1"/><img src="http://lorempixel.com/90/90/" class="CL_Imagen_2"/><img src="http://lorempixel.com/90/90/" class="CL_Imagen_3"/><img src="http://lorempixel.com/90/90/" class="CL_Imagen_4"/>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Alertas</p>
            <div class="CL_Alerta_2 Padding-10">
              <p>Uso:</p>
              <ul>
                <li>Clases:.CL_Alerta_(1,2,3,4,5,6)</li>
                <li>Nota: Agregar paddign: .Padding-10(20,30,40)</li>
              </ul>
            </div>
            <p class="CL_Alerta_5 Padding-10">Texto de prueba para la alerta</p>
            <p class="CL_Alerta_2 Padding-10">Texto de prueba para la alerta</p>
            <p class="CL_Alerta_3 Padding-10">Texto de prueba para la alerta</p>
            <p class="CL_Alerta_4 Padding-10">Texto de prueba para la alerta</p>
            <p class="CL_Alerta_5 Padding-10">Texto de prueba para la alerta</p>
            <p class="CL_Alerta_6 Padding-10">Texto de prueba para la alerta</p>
          </li>
          <li class="CL_Diseno">
            <p class="icon-design CL_Txt_1">Checkbox</p>
            <div class="CL_ALerta_2 Padding-10"></div>
            <div class="CL_Check_Box_1">
              <input id="INPUT_Chek_Recordatorio" type="checkbox" class="Btn_CheckBox"/>
              <div class="CL_Check_Box_Remplazo"></div>
              <label for="INPUT_Chek_Recordatorio" class="CL_TXT_Chek_Box_Remplazo">Recordar mis datos</label>
            </div>
          </li>
          <li ng-controller="Controlador_Guia_Proyecto" class="CL_Diseno">
            <p class="icon-notificacion CL_Txt_1">Notificaciones</p>
            <div class="CL_ALerta_2 Padding-10"></div>
            <div ng-click="CrearAlert(1)" class="Btn_Estilo_5">Finalizado</div>
            <div ng-click="CrearAlert(2)" class="Btn_Estilo_5">Info</div>
            <div ng-click="CrearAlert(3)" class="Btn_Estilo_5">Alerta</div>
            <div ng-click="CrearAlert(4)" class="Btn_Estilo_5">Error</div>
            <div ng-click="CrearAlert(5)" class="Btn_Estilo_5">Negro</div>
            <div ng-click="CrearAlert(6)" class="Btn_Estilo_5">Blanco</div>
          </li>
        </div>
      </div>
    </div>
  </section>
  <!--sesion diseño-->
  <section id="Ejemplo_Registro" ng-if="Conexion == true" class="ng_show">
    <div class="CL_Alerta_1 Padding-10">Ejemplo de crud PHP + Angular + Mysql</div>
    <div ng-controller="Controlador_Ejemplo_Crud" class="Grid_Contenedor distributed">
      <div id="FORM_Registro_Ejemplo" ng-init="FN_Listar_Ejemplo()" class="Grid_Item Base-30 abcenter Grid_Contenedor">
        <div class="Grid_Item Base-80 Padding-5">
          <form name="Ejemplo_Registro" ng-submit="FN_Registrar_Ejemplo(Ejemplo)">
            <div class="Padding-10 Grid_Contenedor abcenter"> 
              <p class="CL_Icono_3">{{ Ejemplo.Nombre_Usuario_Ejemplo | limitTo : 1 : 0}}</p>
            </div>
            <label for="Nombre_Usuario_Ejemplo" class="CL_TXT_Texto_3">Nombre</label>
            <input id="Nombre_Usuario_Ejemplo" maxlength="15" minlength="3" name="Nombre_Usuario_Ejemplo" ng-model="Ejemplo.Nombre_Usuario_Ejemplo" type="text" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Ejemplo_Registro.$pristine &amp;&amp; Ejemplo_Registro.Nombre_Usuario_Ejemplo.$error.required">
              <p class="icon-key">Ingresa un nombre</p>
            </div>
            <div id="CONT_Mensaje_Validacion" ng-show="!Ejemplo_Registro.Nombre_Usuario_Ejemplo.$valid &amp;&amp; !Ejemplo_Registro.$pristine &amp;&amp; !Ejemplo_Registro. Nombre_Usuario_Ejemplo.$error.required ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <label for="Contrasenia_Ejemplo" class="CL_TXT_Texto_3">Contraseña</label>
            <input id="Contrasenia_Ejemplo" maxlength="15" minlength="3" name="Contrasenia_Ejemplo" ng-model="Ejemplo.Contrasenia_Ejemplo" type="password" required="required" class="Input_Estilo_1"/>
            <!--Mensaje de validacion-->
            <div id="CONT_Mensaje_Validacion" ng-show="!Ejemplo_Registro.$pristine &amp;&amp; Ejemplo_Registro.Contrasenia_Ejemplo.$error.required">
              <p class="icon-key">Ingresa una contraseña</p>
            </div>
            <div id="CONT_Mensaje_Validacion" ng-show="!Ejemplo_Registro.Contrasenia_Ejemplo.$valid &amp;&amp; !Ejemplo_Registro.$pristine &amp;&amp; !Ejemplo_Registro.Contrasenia_Ejemplo.$error.required ">
              <p class="icon-login">La cantidad de caracteres es muy corta</p>
            </div>
            <input ng-disabled="!Ejemplo_Registro.$valid" type="submit" value="Registrar" class="Btn_Estilo_1"/>
            <button ng-click="Ejemplo.Nombre_Usuario_Ejemplo = ''; Ejemplo.Contrasenia_Ejemplo = ''" class="Btn_Estilo_5">Limpiar</button>
          </form>
        </div>
      </div>
      <div id="FORM_Registro_Ejemplo" class="Grid_Item Base-40">
        <div class="Grid_Contenedor Padding-5">
          <div class="Grid_Item Base-50">
            <div class="CL_Contenedor_Buscador">
              <input id="BuscarOrden" type="text" name="" placeholder="Buscar usuario" ng-model="Buscador_Usuario" class="CL_Buscar"/>
              <label for="BuscarOrden" class="icon-buscar CL_Icono_Buscar"></label>
            </div>
          </div>
          <div ng-click="FN_Listar_Ejemplo()" class="Btn_Estilo_7">Consultar</div>
        </div>
        <form name="Form_Lista" ng-init="BL_Edicion_Datos = false" class="Grid_Contenedor abcenter">
          <div class="Tabla_Estilo_3">
            <table>
              <thead>
                <tr>
                  <th class="Imagen"> </th>
                  <th>Nombre </th>
                  <th>Contraseña</th>
                  <th> </th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="Lista_Ejemplo in AOBJ_Lista_Ejemplo | filter:Buscador_Usuario">
                  <td class="CL_Imagen">
                    <p class="CL_Icono_3">{{ Lista_Ejemplo.Nombre_Usuario_Ejemplo | limitTo : 1 : 0}}</p>
                  </td>
                  <th>
                    <input name="Nombre_Usuario_Ejemplo{{$index}}" ng-disabled="BL_Edicion_Datos == false" maxlength="15" minlength="3" required="required" ng-model="Lista_Ejemplo.Nombre_Usuario_Ejemplo" class="Input_Tabla"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Lista.$pristine &amp;&amp; Form_Lista.Nombre_Usuario_Ejemplo{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un nombre</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Lista.Nombre_Usuario_Ejemplo{{$index}}.$valid &amp;&amp; !Form_Lista.$pristine &amp;&amp; !Form_Lista. Nombre_Usuario_Ejemplo{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta </p>
                    </div>
                  </th>
                  <th>
                    <input name="Contrasenia_Ejemplo{{$index}}" ng-disabled="BL_Edicion_Datos == false" maxlength="15" minlength="3" required="required" ng-model="Lista_Ejemplo.Contrasenia_Ejemplo" class="Input_Tabla"/>
                    <!--Mensaje de validacion-->
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Lista.$pristine &amp;&amp; Form_Lista.Contrasenia_Ejemplo{{$index}}.$error.required">
                      <p class="icon-key">Ingresa un nombre</p>
                    </div>
                    <div id="CONT_Mensaje_Validacion" ng-show="!Form_Lista.Contrasenia_Ejemplo{{$index}}.$valid &amp;&amp; !Form_Lista.$pristine &amp;&amp; !Form_Lista. Contrasenia_Ejemplo{{$index}}.$error.required ">
                      <p class="icon-login">La cantidad de caracteres es muy corta </p>
                    </div>
                  </th>
                  <td class="CL_Tbl_Icon">
                    <button ng-disabled="!Form_Lista.$valid" ng-class="{Invisible:BL_Edicion_Datos == false, Visible: BL_Edicion_Datos == true}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos; FN_Modificar_Ejemplo($index)" value="Actualizar" class="CL_TXT_Pri_Btn relative icon-actualizar"><span class="CL_TXT_Info_Btn">Actualizar</span></button>
                    <div ng-class="{Invisible:BL_Edicion_Datos == true, Visible: BL_Edicion_Datos == false}" ng-click="BL_Edicion_Datos =!BL_Edicion_Datos" class="icon-lapiz CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Editar </span></div>
                  </td>
                  <td class="CL_Tbl_Icon">
                    <div ng-click="FN_Eliminar_Ejemplo($index)" class="icon-cancelar2 CL_TXT_Pri_Btn relative"><span class="CL_TXT_Info_Btn">Eliminar</span></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div ng-show="(AOBJ_Lista_Ejemplo |filter:Buscador_Usuario:Lista_Ejemplo.Nombre_Usuario_Ejemplo).length == 0" class="CL_Alerta_2 ng_repeat_anim1 Grid_Contenedor abcenter">
            <div class="CL_TXT_Texto_3 Base-100 Grid_Item abcenter Padding-10">No se han encontrado usuarios</div>
          </div>
        </form>
      </div>
    </div>
    <div class="Grid_Contenedor CL_Alerta_5 abcenter column">Archivos utilizados
      <ul>
        <li class="icon-file">Controlador_Ejemplo.js, se encuentra en la carpeta Public/js/Angular/Controladores</li>
        <li class="icon-file">Modulo_Ejemplo_Crud.php, se encuentra en la carpeta Aplication/controller/Modulo/</li>
        <li class="icon-file">M_Ejemplo_Crud.php, se encuentra en la carpeta Aplication/model</li>
      </ul>
    </div>
  </section>
  <section id="Ejemplo_Registro" ng-if="Cuerpo_Tabla == true" class="ng_show">
    <div class="Tablero_Trabajo_1">
      <div class="Grid_Contenedor Base-100 abcenter CL_CONT_Principal_Tablero_Trabajo">
        <div class="Grid_Contenedor Base-90 CL_CONT_Tablero_Trabajo">
          <div class="Grid_Contenedor Base-30 cross_start CL_CONT_Tablero">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
              <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_2"/></div>
            </div>
            <div class="Grid_Contenedor CL_CONT_Buscador_Tablero_Trabajo abcenter">
              <div class="Grid_Contenedor abcenter Base-90">
                <div ng-init="Buscar" class="CL_Contenedor_Buscador">
                  <input id="Buscar" maxlength="15" type="search" name="Buscar" placeholder="Buscar" ng-model="Buscar" class="CL_Buscar"/>
                  <label for="Buscar" class="icon-buscar CL_Icono_Buscar"></label>
                </div>
              </div>
            </div>
            <div class="Grid_Contenedor Base-100 cross_start CL_CONT_Tablero_Trabajo_1">
              <div class="Grid_Contenedor Base-90 CL_Informacion_Tablero_1 cross_start">
                <div class="CL_Alerta_1 Padding-10">Formulario, listas</div>
              </div>
              <!--Por si se usa un filtro-->
              <div ng-show="(Lista_Datos_Ejemplo |filter:Buscar:Item).length == 0" class="CL_Alerta_5 ng_repeat_anim1 Grid_Contenedor">
                <div class="CL_TXT_Texto_3 Base-100 abcenter Grid_Contenedor">
                  <p>Dato no encontrado</p>
                </div>
              </div>
            </div>
          </div>
          <div class="Grid_Contenedor Base-70 cross_start CL_CONT_Tablero_Trabajo_2">
            <div class="CL_Cabezera_Tablero_Trabajo Grid_Contenedor Base-100">
              <div class="Grid_Item Base-100 Grid_Contenedor abcenter">
                <div class="CL_TXT_Texto_4">Titulo</div>
              </div>
            </div>
            <div class="Grid_Contenedor abcenter">
              <div class="Grid_Contenedor Base-95">
                <div class="CL_Alerta_5 Grid_Contenedor">
                  <div class="Grid_Item Base-20"><img ng-src="{{dato.AOBJ_Datos_Usuario[0].Imagen_Usuario}}" class="CL_Imagen_Icono_1"/></div>
                  <div class="Grid_Item Base-40 Grid_Contenedor abcenter">
                    <div class="CL_TXT_Texto_4">Titulo</div>
                  </div>
                  <div class="Grid_Item Base-40 relative">
                    <p class="CL_Eliminar_1_1"></p>
                  </div>
                </div>
                <div class="Grid_Contenedor">
                  <div class="CL_Alerta_1 Padding-10">Formulario, listas</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script language="javascript" src="<?php echo URL; ?>public/js/Angular/Controladores/Administracion/Guia_Proyecto.js">							</script>