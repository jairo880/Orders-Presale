
<title>Error servidor :(</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL;?>public/css/Templates/Error/Error.css"/>
<!--link de fontastic, fuentes de iconos-->
<link href="https://file.myfontastic.com/Jpco7gv5bXaEnZ8PsDz2Q7/icons.css" rel="stylesheet"/>
<title>ALLOP| Error ..</title>
<link rel="shortcut icon" type="image/x-icon" href="https://dl.dropboxusercontent.com/u/232442887/Allop/img/logo/LogoIcono.png"/>
<section id="SC_Error">
  <main id="CONT_E_Error">
    <p class="CL_TXT_E_Titulo">Ups! Error del Servidor</p>
    <p class="CL_TXT_E_Texto"> Lo sentimos, parece que se ha producido un error interno del servidor con la p&aacute;gina que ha solicitado.</p><a href="<?php echo URL;?>Inicio/Inicio" class="icon-inicio Btn_Estilo_5">Volver a inicio</a>
  </main>
  <style media="screen">
    <?php
    $valor = rand(0,4);
    $imagenes = array("https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/413724.png","https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/639487.png","https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/7D7.jpg","https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/CF9.jpg");
    ?>
    <?php echo "#SC_Error{ background: #000 url('$imagenes[$valor]')no-repeat scroll center center / cover;}";?>
  </style>
</section>