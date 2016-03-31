(function () {
  'use strict';
    /*
     La directiva use strict es una directiva que no supone una instrucción de código,
     sino que indica el modo en que el navegador debe ejecutar el código JavaScript.
     Podríamos hablar de dos modos de ejecución JavaScript: el <<normal mode>>,
     que es el que hemos estudiado hasta ahora, y el <<strict mode>>, que vamos a explicar.
     
     Declarar que se use strict mode supone algunos cambios en cuanto al código que admite o no
     admite el navegador. Por ejemplo en strict mode es obligatoria la declaración de variables,
     mientras que en el modo normal no es necesario declarar una variable para usarla
     
     */
    /*
     $scope:El scope es un objeto que hace referencia al modelo de la aplicación. Es un contexto
     de ejecución para las expresiones. El scope esta organizado en una estructura jerárquica simil
     a la estructura DOM
     de una aplicación. El scope puede ver expresiones y propagar eventos
     */
    /*
     Fabrica es un nombre que puede variar, hace referencia a la fabrica creada para almacenar la informacion
     rejida a lo largo que el usuario interactue en la web
     */
    /*
     $location: permite mdificar los datos de la url, en este caso se usa para añadir un #posicionDeseada,
     esta posicion hace referencia a la parte baja del contenedor del chat, asi cadda vez que demos enter,
     y enviemos un mensaje nos llebara a la parte baja del contenedor donde se encuentra el elemento con el id especificado,
     nota: una forma de limpiar la url luego de usar location es $location.hash('');
     $anchorScroll: sirve para transportar el scroll a donde location indique
     */
    /*
     $timeout: sirve como la funcion jaascript setTime();
     permite llamar funciones despues de cierto tiempo
     ejemplo:
     $timeout(callAtTimeout, 1000);
     */
     function Controlador_Principal($localStorage,$sessionStorage,$scope, Fabrica, $timeout, $interval, $location, $anchorScroll, $http)
     {
      $scope.Diseno = false;
      $scope.DB = false;
      $scope.Html = false;
      $scope.Angular = false;
      $scope.Sass = false;
      $scope.Estructura = false;
      $scope.BL_Guia = false;
      $scope.Conexion = true;
      $scope.Cuerpo_Tabla = true;
      //variables para el paginate con angular
      $scope.currentPage = 1;
      //
      $scope.pageSize = 5;



      $scope.FN_Ver_Elemento_Guia = function(Tipo_Visible)
      {
        if(Tipo_Visible == 1){
           $scope.Diseno = true;
           $scope.DB = false;
           $scope.Html = false;
           $scope.Angular = false;
           $scope.Sass = false;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 2){
           $scope.Diseno = false;
           $scope.DB = false;
           $scope.Html = false;
           $scope.Angular = false;
           $scope.Sass = false;
           $scope.Estructura = true;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 3){
           $scope.Diseno = false;
           $scope.DB = false;
           $scope.Html = false;
           $scope.Angular = false;
           $scope.Sass = true;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 4){
           $scope.Diseno = false;
           $scope.DB = false;
           $scope.Html = false;
           $scope.Angular = true;
           $scope.Sass = false;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 5){
           $scope.Diseno = false;
           $scope.DB = false;
           $scope.Html = true;
           $scope.Angular = false;
           $scope.Sass = false;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 6){
           $scope.Diseno = false;
           $scope.DB = true;
           $scope.Html = false;
           $scope.Angular = false;
           $scope.Sass = false;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 7){
           $scope.Diseno = false;
           $scope.DB = false;
           $scope.Html = false;
           $scope.Angular = false;
           $scope.Sass = false;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = true;
           $scope.Cuerpo_Tabla = false;


       }
       if(Tipo_Visible == 8){
           $scope.Diseno = false;
           $scope.DB = false;
           $scope.Html = false;
           $scope.Angular = false;
           $scope.Sass = false;
           $scope.Estructura = false;
           $scope.BL_Guia = true;
           $scope.Conexion = false;
           $scope.Cuerpo_Tabla = true;

       }
   };
        //_*variable para vissualizrar entre slider o producto
        $scope.BL_Contenedor_Estado = false;

        //_*mensajes
        $scope.BL_Mensajes_Visibles = false;
        //_*contenido mensaje
        $scope.BL_ContenidoMensaje = false;
        //_*despelgar el chat que contendra la continuacion establecida
        $scope.BL_DesplegarChat_ContConver = false;
        //_*despelgar el chat que contendra la nueva converzacion
        $scope.BL_DesplegarChat_Nuevo_Mensaje = false;
        //_*botones mensaje
        //_* $scope.BL_BtnsMensaje = false;
        //_*estado Chat
        //_* $scope.BL_Estado_Escribiendo = false;
        //_*scroll para el body
        $scope.BL_Scroll_Body = false;
        //_*notificaciones
        $scope.BL_Contenedor_Notificaciones = false;
        //_*menu
        $scope.BL_Ver_Menu = false;
        $scope.Bl_Menu_Desplegado = false;
        //_*orden
        $scope.BL_Ver_Orden = false;
        //_*Mensaje
        $scope.BL_Ver_Mensajes = false;
        //_*envio orden
        $scope.BL_Ver_Envio_Orden = false;
        //_*confirmacion
        $scope.BL_Ver_Confirmacion = false;
        //_*ng-model para el textarea de Chat
        $scope.NGM_TXT_Text_Area_Mensaje = null;
        //_*estado del login
        $scope.BL_Contenedor_Login = false;
        //_*opciones de la cuenta del usuario  en el header
        $scope.BL_Opciones_Cuenta = false;

        //_*para pagina registro
        $scope.BL_Datos_Usuario_Empresa = false;
        //_*para login
        $scope.BL_Login_Recup = true;
        //_*Para las ordenes enviadas
        $scope.BL_Ordenes_Enviadas = false;

        //_*variables para los botones login y cerrar sesion
        $scope.Bl_Btn_Login_Iniciar_Sesion = true;
        $scope.Bl_Btn_Login_Cerrrar_Sesion = false;
        //_*variable para el modal comentario



        //_*guardo los datos del mensaje seleccionado momentaneamente, estas variables sirven
        //_*para cuando uno clikee en un mensaje pase a la otra sesion donde muestra mas detalladamente el mensaje
        $scope.URL_Imagen_Usuario_Dtll = '';
        $scope.TXT_Nombre_Usuario_Dtll = '';
        $scope.TXT_Mensaje_Usuario_Dtll = '';
        $scope.DATE_Hora_Mensaje_Dtll = '';



        /*
         *****************************CREACION DE LA LISTA
         1. Por medio de NMG_TXT_Nombre_Lista Leo el nombre de la lista que el usuario desea
         2. AOBJ_Listas_Creadas es un array de objetos donde voy a guardar las listas creadas por el usuario
         3. NUM_Numero_Lista sirve para identificar cada lista con un ID
         4. NUM_Cantidad_Listas contador que mostrara la cantidad de listas creadas por el usuario
         */

         //_*VARIABLES PARA LAS LISTAS
         $scope.NMG_TXT_Nombre_Lista = "Ejm:Orden del lunes";
         $scope.AOBJ_Listas_Creadas = [];
         $scope.NUM_Numero_Lista = 1;
         $scope.NUM_Cantidad_Listas = 0;


        /*
         ********************Fn_Crear_Lista
         1. Leo si el NMG_TXT_Nombre_Lista no ha cambiado, si no ha cambiado paso a asignarle un nombre por defecto a la lista
         2. Verifico  si el numero lista con el que le agregamos el ID es mayor a 0 si no es asi lo asignamos   if ($scope.NUM_Numero_Lista <= 0) 
         3. guardamos en una variable Crear_Nueva_Lista los datos que va a tener la lista creada:
         
         Id_Lista: Identificador para la lista,
         TXT_Nombre_Lista: Nombre de la lista,
         BL_Expandido: booleano que nos permitira ver o ocultar los productos que contenga el objeto,
         BL_Contenido: booleano que indicara si la lista esta llena o no,
         NUM_Cantidad_Productos: Contador para saber la cantidad de productos agregados ,
         Sub_Total_Orden: Monto total de los productos agregados en la lista , este valor al ser agregado una cantidad de productos, tomara como 
         valor el monto total de la orden, pero luego si el usuario desea moificar la cantidad de productos en la lista creada el precio cambiara
         
         */

         $scope.Fn_Crear_Lista = function ()
         {
          if ($scope.NMG_TXT_Nombre_Lista === 'Ejm:Orden del lunes')
          {
            if ($scope.NUM_Numero_Lista <= 0)
            {
              $scope.NUM_Numero_Lista = 1;
          }
          $scope.NMG_TXT_Nombre_Lista = 'Orden #' + $scope.NUM_Numero_Lista;
      }
            //_*creo una variable en la cual guardo los datos a ingresar en el arrray 
            var Crear_Nueva_Lista =
            {
              Id_Lista: $scope.NUM_Numero_Lista,
              TXT_Nombre_Lista: $scope.NMG_TXT_Nombre_Lista,
              BL_Expandido: false,
              BL_Contenido: false,
              NUM_Cantidad_Productos: 0,
              Sub_Total_Orden: 0

          };
            //_*creo el nuevo objeto para guardar los datos de la orden
            Crear_Nueva_Lista.Articulos_Productos = [];
            //_*agrego el objeto
            $scope.AOBJ_Listas_Creadas.push(Crear_Nueva_Lista);

            $scope.NUM_Numero_Lista += 1;
            $scope.NUM_Cantidad_Listas += 1;
            //_*limpio el ng-model
            $scope.NMG_TXT_Nombre_Lista = 'Ejemplo:Orden de los días lunes';



        };

        /*
         *********************FN_Agregar_Productos_A_Lista
         1. Verifico si el usuario ya a agregado productos a la orden principal
         2 Recorro un for y con un if busco y me posiciono  en AOBJ_Listas_Creadas[] con el Id encontrado
         3. Verifico si la lista se encutra vacia si no es asi mando un mensaje
         4. CON UN FOR RECORRO Fabrica.objeto.AOBJ_Productos para asi luego por medio de un push agregar los productos que hay en
         Fabrica.objeto.AOBJ_Productos osea la orden principal
         5. 
         */
         $scope.FN_Agregar_Productos_A_Lista = function (Id_Lista_Ingresado)
         {
            //_*Si no hay productos agregados no permitira pasar
            if (Fabrica.objeto.NUM_Cantidad_Productos_En_Orden > 0)
            {
                //_*Recorro el array de objetos de listas para buscar si hay un Id igual al que se recibio
                for (var j = 0; j < $scope.AOBJ_Listas_Creadas.length; j++) {
                    //_*si se encuentra un objeto con el id ingresado pasa a la otra funcion
                    if ($scope.AOBJ_Listas_Creadas[j].Id_Lista == Id_Lista_Ingresado)
                    {
                        //_*Si la lista a la que se le quiere añadir los prouctos esta vacia, deja continiuar, si no es asi manda alerta
                        if ($scope.AOBJ_Listas_Creadas[j].Articulos_Productos == "")
                        {
                            //_*llamo al objeto que contiene la lista, busco la posicion en la cual ingresare los datos, llamo el objeto donde guaro los productos
                            //_* ingreso los productos 
                            for (var i = 0; i < Fabrica.objeto.AOBJ_Productos.length; i++)
                            {
                                //_*guardo la cantidad de productos que posee el objeto
                                $scope.AOBJ_Listas_Creadas[j].NUM_Cantidad_Productos += 1;
                                //_*agrego los productos a el objeto
                                $scope.AOBJ_Listas_Creadas[j].Articulos_Productos.push(Fabrica.objeto.AOBJ_Productos[i]);
                                //_*calculo el subtotal para la lista, este precio puede variar si el usuario cambia la cantidad de productos de la lista
                                $scope.AOBJ_Listas_Creadas[j].Sub_Total_Orden += Fabrica.objeto.AOBJ_Productos[i].NUM_Cantidad * Fabrica.objeto.AOBJ_Productos[i].Valor_Unitario;
                            }
                            //_*si se agrego un producto en la lista cambio el estado para saber si esta lleno
                            $scope.AOBJ_Listas_Creadas[j].BL_Contenido = !$scope.AOBJ_Listas_Creadas[j].BL_Contenido;
                            //_*LLamo la funcio con la que muestro mensajes de alerta, paso el texto que queiro mostrar y el tiempo de duracion para el mensaje
                            $scope.Mensaje = "Productos agregados a la lista";
                            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
                        }
                        else
                        {
                            $scope.Mensaje = "La lista ya posee prouctos.";
                            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Alerta');
                        }
                    }
                }


            }
            else
            {
              $scope.Mensaje = "No has agregado productos a tu orden.";
              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');

          }

      };
        //_*Funcio para actualizar el precio sub total de una orden creada

        /*
         1.La funcion recibe el Id_Lista  de el AOBJ_Listas_Creadas, el primer  for y el if lo que hacen es
         recorer AOBJ_Listas_Creadas buscando un objeto que posea el Id_Lista ingresado como parametro de la funcion,
         Al encontrar el objeto correspondiente al id, primero vaciamos el valor Sub_Total_Orden.
         
         2.El segundo for y if vuelven a recorrer AOBJ_Listas_Creadas en busca de el Id_Lista, 
         Luego de encontrarlo  volvemos a hacer uso de un for para ahora recorrer el Articulos_Productos de AOBJ_Listas_Creadas
         como ya hemos identificado el AOBJ_Listas_Creadas[Posicion_Del_For].Id_Lista ahora partimos desde esta posicion 
         para asi buscar en Articulos_Productos[Posicion_Del_For] y asi leer los datos de los productos guardados en este Array.
         Luego solo queda darle al $scope.AOBJ_Listas_Creadas[j].Sub_Total_Orden el valor obtenido por la multiplicacion de datos
         de Articulos_Productos[].NUM_Cantidad y NUM_Cantidad[].Valor_Unitario
         */
         $scope.FN_Actualziar_Datos_Lista = function (Id_Lista_Ingresado)
         {
          for (var i = 0; i < $scope.AOBJ_Listas_Creadas.length; i++)
          {
            if ($scope.AOBJ_Listas_Creadas[i].Id_Lista == Id_Lista_Ingresado)
            {
              $scope.AOBJ_Listas_Creadas[i].Sub_Total_Orden = 1;

              for (var K = 0; K < $scope.AOBJ_Listas_Creadas[i].Articulos_Productos.length; K++) {
                $scope.AOBJ_Listas_Creadas[i].Articulos_Productos[K].NUM_Costo = 1;
            }

        }

    }

    for (var j = 0; j < $scope.AOBJ_Listas_Creadas.length; j++) {
        if ($scope.AOBJ_Listas_Creadas[j].Id_Lista == Id_Lista_Ingresado)
        {
          for (var e = 0; e < $scope.AOBJ_Listas_Creadas[j].Articulos_Productos.length; e++) {
            $scope.AOBJ_Listas_Creadas[j].Sub_Total_Orden += $scope.AOBJ_Listas_Creadas[j].Articulos_Productos[e].NUM_Cantidad * $scope.AOBJ_Listas_Creadas[j].Articulos_Productos[e].Valor_Unitario;
            $scope.AOBJ_Listas_Creadas[j].Articulos_Productos[e].NUM_Costo += $scope.AOBJ_Listas_Creadas[j].Articulos_Productos[e].NUM_Cantidad * $scope.AOBJ_Listas_Creadas[j].Articulos_Productos[e].Valor_Unitario;
        }
    }
}

};

$scope.VerProductosEnLista = function (Posicion_Lista) {
            //_*para visualizar los productos de la lista
            $scope.AOBJ_Listas_Creadas[Posicion_Lista].BL_Expandido = !$scope.AOBJ_Listas_Creadas[Posicion_Lista].BL_Expandido;
        };







        //_*funciones para cerrar y desplegar  las ventanas de menu,orden,notificacion
        $scope.FN_Opciones_Cuenta_Header = function ()

        {
          $scope.BL_Ver_Mensajes = false;
          $scope.BL_Ver_Orden = false;
          $scope.BL_Contenedor_Notificaciones = false;
          $scope.Bl_Menu_Desplegado = false;
          $scope.BL_Ver_Menu = false;
          $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
          $scope.BL_Opciones_Cuenta =! $scope.BL_Opciones_Cuenta;
          $scope.BL_Ordenes_Enviadas = false;
          


      };
      $scope.FN_Login = function ()

      {

          $scope.BL_Contenedor_Login = !$scope.BL_Contenedor_Login;
          $scope.BL_Ver_Menu = false;
          $scope.BL_Ver_Mensajes = false;
          $scope.BL_Contenedor_Notificaciones = false;
          $scope.BL_Ver_Orden = false;
          $scope.BL_Opciones_Cuenta = false;
          $scope.Bl_Menu_Desplegado = false;
          $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
          $scope.BL_Ordenes_Enviadas = false;
          

      };
      $scope.FN_Orden = function ()

      {

          $scope.BL_Ver_Mensajes = false;
          $scope.BL_Contenedor_Notificaciones = false;
          $scope.BL_Ver_Orden = !$scope.BL_Ver_Orden;
          $scope.BL_Opciones_Cuenta = false;
          $scope.Bl_Menu_Desplegado = false;
          $scope.BL_Ver_Menu = false;
          $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
          $scope.BL_Ordenes_Enviadas = false;
          

      };

      $scope.FN_Menu = function ()

      {

          $scope.BL_Ver_Orden = false;
          $scope.BL_Ver_Mensajes = false;
          $scope.BL_Contenedor_Notificaciones = false;
          $scope.BL_Opciones_Cuenta = false;
          $scope.BL_Ver_Menu = !$scope.BL_Ver_Menu;
          $scope.Bl_Menu_Desplegado = !$scope.Bl_Menu_Desplegado;
          $scope.BL_Ordenes_Enviadas = false;
          
      };

      $scope.FN_Notificacion = function ()

      {

          $scope.BL_Ver_Mensajes = false;
          $scope.BL_Ver_Orden = false;
          $scope.BL_Contenedor_Notificaciones = !$scope.BL_Contenedor_Notificaciones;
          $scope.BL_Opciones_Cuenta = false;
          $scope.BL_Ver_Menu = false;
          $scope.Bl_Menu_Desplegado = false;
          $scope.BL_Ordenes_Enviadas = false;



      };
        //_* funcion para ocultar el contenedor especifico del chat
        $scope.FN_Mensaje_Desplegar = function (Principal, MensajesRecibidos, MensajesDtll, ChatConversacion, NuevoCatConversacion)

        {
          if (Principal == false)
          {
            $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;

        }
        if (Principal == true)
        {
            $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;

        }
        $scope.BL_Ver_Menu = false;
        $scope.BL_Contenedor_Notificaciones = false;
        $scope.BL_Ver_Orden = false;
        $scope.BL_Opciones_Cuenta = false;
        $scope.Bl_Menu_Desplegado = false;
        $scope.BL_Opciones_Cuenta = false;
        $scope.Bl_Menu_Desplegado = false;
        $scope.BL_Ordenes_Enviadas = false;
            //_*contenedor principal donde estan los Mensajes
            $scope.BL_Ver_Mensajes = Principal;
            //_*Mensajes principales del menu mensajes
            $scope.BL_Mensajes_Visibles = MensajesRecibidos;
            //_*contenedor del contenido dtll de un mensaje
            $scope.BL_ContenidoMensaje = MensajesDtll;
            //_*contenedor del chat desplegado de un mensaje
            $scope.BL_DesplegarChat_ContConver = ChatConversacion;
            //_*contenedor del chat nuevo mensajes
            $scope.BL_DesplegarChat_Nuevo_Mensaje = NuevoCatConversacion;

        };

          //Funcion para visualizar el contenedor de ls ordenes enviadas
          $scope.FN_Ordenes_Enviadas = function(Tipo_Desplegar)
          {
             $scope.BL_Ver_Mensajes = false;
             $scope.BL_Ver_Orden = false;
             $scope.BL_Contenedor_Notificaciones = false;
             $scope.BL_Opciones_Cuenta = false;
             $scope.BL_Ver_Menu = false;
             $scope.Bl_Menu_Desplegado = false;
             $scope.BL_Ordenes_Enviadas = true;
             $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
           //1 Para cerrar el desplegable
           if(Tipo_Desplegar == 1)
           {
               $scope.BL_Ordenes_Enviadas =! $scope.BL_Ordenes_Enviadas;
           }
            //2 Para listar las ordenes que tenga el usuario
            if(Tipo_Desplegar == 2)
            {
               if($scope.BL_Ordenes_Enviadas)
               {
                  $scope.FN_Listar_Ordenes_Enviadas();
                  $scope.BL_Lista_Ordenes_Enviadas = true;
                  $scope.BL_Detalle_Orden_Enviada = false;

              }
          }
         //3 Para ver los detalles de la orden enviada
         if(Tipo_Desplegar == 3)
         {
          $scope.BL_Lista_Ordenes_Enviadas = false;
          $scope.BL_Detalle_Orden_Enviada = true;
            //esta funcion se ejecuara al mismo tiempo que la  FN_Listar_Detalles_Ordene_Enviada();
        }
    };


        //_*esta es la funcion que usa el slider para pasar de posicion, le mando la posicion actual del elementos
        //_*clikeado y asi se a cual imagen pasar
        $scope.FN_Pasar_Slider = function (num)
        {
          var Posicion = num - 1;
          SliderPos(Posicion);
      };


        //_********************************************************
        //_*********************************************************
        //_*********************************Orden***********************

        //_*Agregar un producto recibe tres parametro, la posicion en que se encuentra el productos dentro del array, el total
        //_* que se calcula en el input de la vista y el estado con el cual se si ya fue o no agregado el producto
        $scope.FN_Agregar_Productos = function (id_ing)
        {
            //_******Llamo la funcion declarada en la fabrica
            Fabrica.objeto.FN_Agregar_Productos(id_ing);




        };
        //_*eliminar recibe un parametro, la posicion del objeto dentro del array
        //_*con la propiedad splice elimino el objeto del array y luego regreso valores predeterminados
        $scope.FN_Eliminar_Producto = function (id_ing)
        {

          Fabrica.objeto.FN_Eliminar_Producto(id_ing);



      };
        //_*actualizar datos recibe dos parametros la posicion del objeto y el totalProducto
        //_*esta funcion se ejecuta cada vez que cambiemos el valor de la cantiad de unidades del producto
        //_*se encarga de actualizar la cantidad de producto en el contenedor de la orden
        $scope.FN_Actualizar_Datos = function (TipoActualizar, id_ing)
        {

          Fabrica.objeto.FN_Actualizar_Datos(TipoActualizar, id_ing);

      };
        //_*calcular total tansolo llama a la funcion calcular total de la fabrica y esta se encarga de
        //_*resetear el total de la orden y volver a calcular cuanto es que se lleba en la orden
        $scope.FN_Calcular_Total = function ()
        {

          Fabrica.objeto.FN_Calcular_Total();
      };


        //_*************************************Eliminar**************
        $scope.FN_Confirmacion_Alerta = function (Tipo_Funcion, Posicion, Confirmacion, Mensaje_Confirmacion)
        {
            //_*Tipo_Funcion: REPRESENTA LA FUNCION QUE QUEREMOS LLAMAR.

            //_*Posicion: SE USA CUANDO QUEREMOS ELIMINAR UN ELEMENTO EN ESPECIFICO, PARA ESTO SE DEBE PASAR COMO PARAMETRO EL 
            //_*$index DEL NG-REPEAT

            //_*Confirmacion: REPRESENTA EL EL ESTADO EN QUE SE PUEDE ELIMINAR EL OBJETO posee dos estados TRUE/FALSE,
            //_* TRUE: ESE PUEDE ELIMINAR / FALSE: NO SE PUEDE ELIMINAR

            //_* CUANDO EJECUTAMOS LA FUNCION FN_Confirmacion_Alerta POR 
            //_*PRIMERA VEZ PASAMOS COMO PARAMETROS EL Tipo_Funcion, Posicion, ESTOS DATOS LOS GUARDAMOS
            //_* EN: NUM_Eliminar_Posicion, NUM_Tipo_Funcion Y EL PARAMETRO Confirmacion DEBE DE SER false
            //_* Confirmacion debe de ser false para asi poder realizar la confirmacion de la eliminacion
            //_* EJMPLO : (1,1,false), al pasar el tercer parametro como false, tansolo estamos 
            //_*preparando la fucion eliminar, capturando los primeros datos que estan pasando.
            //_* Cuando el usuario presiona el boton confirmar eliminacion de la ventana emergente se deben de pasar 
            //_* los parametros  NUM_Eliminar_Posicion , NUM_Tipo_Funcion, estas dos variable poseeran guardo los datos 
            //_* ingresados con aterioridad, luego tansolo es pasar como tercer parametro Confirmacion pero en estado true
            //_* con esto botenemos dos pasos para poder eliminar algun elemento, la confirmacion se creo para 
            //_* la eliminacion de elementos con gran de informacion
            $scope.NUM_Eliminar_Posicion = Posicion;
            $scope.NUM_Tipo_Funcion = Tipo_Funcion;
            $scope.TXT_Texto_Confirmacion = Mensaje_Confirmacion;

            //_*Eliminar producto de orden
            if (Tipo_Funcion == 1)
            {
              $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
              if (Confirmacion === true)
              {

                Fabrica.objeto.FN_Confirmacion_Alerta();
                $scope.BL_Ver_Confirmacion = false;
                $scope.TXT_Texto_Confirmacion = '';
            }
        }

            //_*Eliminar lista de producto


            if (Tipo_Funcion == 2)
            {
              $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
              if (Confirmacion === true)
              {
                $scope.AOBJ_Listas_Creadas.splice(Posicion, 1);
                if ($scope.NUM_Numero_Lista > 0)
                {
                  $scope.NUM_Numero_Lista -= 1;
                  $scope.NUM_Cantidad_Listas -= 1;
              }
              $scope.BL_Ver_Confirmacion = false;
              $scope.TXT_Texto_Confirmacion = '';

          }
      }
      if (Tipo_Funcion == 3)
      {
          $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
          if (Confirmacion === true)
          {
            for (var i = 0; i <= $scope.NUM_Numero_Lista; i++) {
              $scope.AOBJ_Listas_Creadas.splice(i, $scope.NUM_Numero_Lista);
              if ($scope.NUM_Numero_Lista >= 0)
              {
                $scope.NUM_Numero_Lista -= $scope.NUM_Numero_Lista;
                $scope.NUM_Cantidad_Listas = 0;
            }
        }
        $scope.BL_Ver_Confirmacion = false;
        $scope.TXT_Texto_Confirmacion = '';

    }

}

if (Tipo_Funcion == 4)
{
  $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
  if (Confirmacion === true)
  {
    $scope.BL_Ver_Confirmacion = false;
    $scope.TXT_Texto_Confirmacion = '';
    $scope.FN_Habilitar_Estado_Cuenta_Usuario_Login();
}
}

if (Tipo_Funcion == 5)
{
  $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
  if (Confirmacion === true)
  {

    var DatosUsuario = Fabrica.objeto.AOBJ_Datos_Usuario[0];

    $http.post( url + 'Modulo/Modulo_Usuario/FN_Inhabilitar_Estado_Cuenta', DatosUsuario)

    .success(function(res){

      var Respuesta = (res);


      if (Respuesta == 'true'){
        $scope.FN_Cerrar_Sesion();
        $scope.BL_Ver_Confirmacion = false;
        $scope.TXT_Texto_Confirmacion = '';
    }else if (Respuesta == 'false'){

        $scope.Mensaje = "La cuenta no se pudo";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
        $scope.BL_Ver_Confirmacion = false;
        $scope.TXT_Texto_Confirmacion = '';
    }

})

    .error(function(res, status){

      console.log(res, status);

  });
}
}

//Confirmacion para eliminar un permiso de las vistas
if (Tipo_Funcion == 6)
{
  $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
  if (Confirmacion === true)
  {

    $scope.FN_Eliminar_Permiso_Usuario($scope.NUM_Eliminar_Posicion);
}
}


//Confirmacion para eliminar una orden
if (Tipo_Funcion == 7)
{
  $scope.BL_Ver_Confirmacion = !$scope.BL_Ver_Confirmacion;
  if (Confirmacion === true)
  {

    $scope.FN_Eliminar_Orden_Enviada($scope.NUM_Eliminar_Posicion);
}
}


};
  //_*************************************************************
  //_**************************************************************
  //_*********************************Producto***********************

  //_***************************************************************
  //_*****************************Chat***********************************
  //_****************************Mensajes*****************************
  //_*********************************************Nuevo mensaje*******
  $scope.FN_Enviar_Mensaje = function (Imagen, Mensaje, Tipo)
  {
    if ($scope.NGM_TXT_Text_Area_Mensaje.length > 0) {
        //_*capturo la fecha actual en que se envia el mensaje
        $scope.Fecha = new Date();
        //_*llamo la funcion en la fabria que sera la que añadira el nuevo mensaje al objeto Mensaje
        Fabrica.objeto.FN_Enviar_Mensaje(Imagen, Mensaje, $scope.Fecha, Tipo);
        //_*variable del textarea que usa el ng-model para estar capturando el mensaje a enviar
        $scope.NGM_TXT_Text_Area_Mensaje = null;


        $location.hash('PosicionInicial');
        //_* llamo  $anchorScroll() para mover el scroll a la posicion solicitada con  $location.hash
        $anchorScroll();
        $location.hash('');
    }
};

//_*iniciar nueva convezacion

//_* variable para el estado del usauario
$scope.EstadoUsuario = false;
//_*esta variable varia dependiendo del usuario, si es verdadera los mensaje que se
//_*escriban apareceran como enviados por el remitente con su propio estilo
//_*si es false se imprime el mesanje como destinatario, y esto viceberza para el usaurio
$scope.Tipo_Actual = true;
$scope.FechaAtual = new Date();
$scope.Mensaje_Nuevo = null;
$scope.FN_Iniciar_Conversacion_Nuevo_Mensaje = function (Mensaje)
{
    //_*si la variable que usamos con el ng-model posee almenos un caracter, se envia el mensaje
    if ($scope.Mensaje_Nuevo.length > 0) {
        //_*llamo la funcion en la fabria que sera la que añadira el nuevo mensaje al objeto Mensaje
        Fabrica.objeto.FN_Iniciar_Conversacion_Nuevo_Mensaje(Fabrica.objeto.URL_Imagen_Usuario_Actual, Mensaje, $scope.FechaAtual, $scope.Tipo_Actual);
        //_*variable del textarea que usa el ng-model para estar capturando el mensaje a enviar
        $scope.Mensaje_Nuevo = null;

        $scope.Mensaje_Nuevo = null;
        $location.hash('PosicionInicialNuevoMensaje');
        //_* llamo  $anchorScroll() para mover el scroll a la posicion solicitada con  $location.hash
        $anchorScroll();
        $location.hash('');

    }
};
//_*funcion para capturar la informacion del mensaje selecionado para asi despues imprimirlos en el conteneor
//_*dtll mensaje por eso el nombre de las variables + dtll
$scope.FN_Ver_Contenido_Mensaje = function (PosicionMensaje)
{


  $scope.URL_Imagen_Usuario_Dtll = Fabrica.objeto.AOBJ_Mensajes_Lista[PosicionMensaje].URL_Imagen_Usuario_Mensaje;
  $scope.TXT_Nombre_Usuario_Dtll = Fabrica.objeto.AOBJ_Mensajes_Lista[PosicionMensaje].TXT_Nombre_Usuario;
  $scope.TXT_Mensaje_Usuario_Dtll = Fabrica.objeto.AOBJ_Mensajes_Lista[PosicionMensaje].TXT_Mensaje;
  $scope.DATE_Hora_Mensaje_Dtll = Fabrica.objeto.AOBJ_Mensajes_Lista[PosicionMensaje].DATE_Hora_Envio;

};
//_*funcion para eliminar el mensaje seleccionado por el usario
$scope.FN_Eliminar_Mensaje_Recibido = function (IndexPosicion)
{
  Fabrica.objeto.FN_Eliminar_Mensaje_Recibido(IndexPosicion);
  $scope.FN_Cargar_Datos_Usuario(2);

};
//_*FN_Cargar_Datos_Usuario simplemente recorre un array hasta el limite de el objeto indicado,
//_*en un contador guarda cual es la cantidad de elementos dentro de este y asi poder mostrar la
//_*cantidad que contiene
$scope.FN_Cargar_Datos_Usuario = function (Tipo)

{
    $scope.Mensaje_Usuario_C1 = "";
    $scope.Mensaje_Usuario_C2 = "";

  for (var i = 0; i <= Fabrica.objeto.AOBJ_Mensajes_Lista.length; i++) {
    Fabrica.objeto.NUM_CantidadMensajeUsuario = i ;
}
for (var k = 0; k <= Fabrica.objeto.AOBJ_Notificaciones_Usuario.length; k++) {
    Fabrica.objeto.NUM_CantidadNotificaciones =  k;
}
$scope.Mensaje_Usuario_C1 = 'Tienes' + ' ' + Fabrica.objeto.NUM_CantidadMensajeUsuario + ' ' + ' Mensajes Pendientes';
$scope.Mensaje_Usuario_C2 = 'Tienes' + ' ' + Fabrica.objeto.NUM_CantidadNotificaciones + ' ' + ' Notificaciones Pendientes';

if (Tipo == 1)
{
    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje_Usuario_C1, 5000,'Negro');
    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje_Usuario_C2, 5000,'Negro');
}
if (Tipo == 2) {
    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje_Usuario_C1, 300,'Negro');
    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje_Usuario_C2, 500,'Negro');


}



};
//_*funcion para eliminar la notificacion selecionada por el usaurio
$scope.FN_Eliminar_Notificacion = function (IndexPosicion)
{
  var Datos = Fabrica.objeto.AOBJ_Notificaciones_Usuario[IndexPosicion];
  //_*Mando por medio de post los datos que manda el formualrio, los datos se encuentran en Formdata.
  $http.post(url + 'Modulo/Modulo_Usuario/FN_Eliminar_Notificacion', Datos)
    //_*cuando finalice la peticion
    .success(function (res)
    {
      $scope.FN_Listar_Notificaciones();
  })
    .error(function (res, status) {
      console.log(res,status);

  });

};
//_*FUNCION RECUPERAR CONTRASEÑA
$scope.FN_Recuperar_contrasenia = function (formData) {

    //_*Mando por medio de post los datos que manda el formualrio, los datos se encuentran en Formdata.
    $http.post(url + 'Modulo/Modulo_Recuperar_Contrasenia/FN_Recuperar_contrasenia', formData)
    //_*cuando finalice la peticion
    .success(function (res)
    {
      var tipo = (res);
      alert(tipo);
        //_* alert(tipo);
        if (tipo == 'true')//_*el ctrl retorna un bool, si este es true ejecuta la funcion mensaje
        {

            //_*mensaje de finalizacion
            $scope.Mensaje = "Solicitud de recuperación enviada";

            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
            $scope.RC.Correo = '';
        }
        if (tipo == 'false')//_*el ctrl retorna un bool, si este es true ejecuta la funcion mensaje
        {
            //_*mensaje de finalizacion

            $scope.Mensaje = "Correo electronico no encontrado";
            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
        }

    })
    .error(function (res, status) {


      console.log(res,status);

  });



};
$scope.FN_Habilitar_Estado_Cuenta_Usuario_Login = function(){

 $http.post(url + 'Modulo/Modulo_Usuario/FN_Habilitar_Estado_Cuenta_Usuario_Login')
 .success(function (res) {
    var ResultadoFuncion = (res);

    if(ResultadoFuncion!= 'false' && ResultadoFuncion != 'Cuenta_Cancelada')//_*el ctrl retorna un bool, si este es true ejecuta la funcion mensaje
    {
        //_*Guardo los datos de la cuenta del usuario para imprimirlos en la vista, esta variable se ecuentra en la fabrica
        //_*LOS DATOS QUE SE GUARDAN SON DE LAS TALBAS CUENTA, CLIENTE, EMPLEADO Y ESTABLECIMIENTO, DEPENDIENDO DEL TIPO DE LOGIN QUE SE REALICE
        Fabrica.objeto.AOBJ_Datos_Usuario = res;


        //_*mensaje de alerta         
        $scope.Mensaje = "Bienvenido " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario;
        Fabrica.objeto.FN_Crear_Mensaje( $scope.Mensaje,100, 'Info');

        //_*variable para el boton iniciar sesion
        $scope.Bl_Btn_Login_Iniciar_Sesion = false;
        //_*variable para el boton cerrar sesion
        $scope.Bl_Btn_Login_Cerrrar_Sesion = true;
        //_*variable para el modal de login
        $scope.BL_Contenedor_Login = false;
        //_*variable para el scroll del body
        $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
        //_* $scope.BL_Login_Recup = false;

    }
    if(ResultadoFuncion=='false')//_*el ctrl retorna un bool, si este es true ejecuta la funcion mensaje
    {
      $scope.Mensaje = "No se pudo Inciar Sessión, Verifique que sus datos sean correctos";
      Fabrica.objeto.FN_Crear_Mensaje( $scope.Mensaje,200);
  }



})
 .error(function (res, status) {
        console.log('error', null, res);

}); 
};


$scope.PK_ID_Usuario = 0;
//_*Funcion para logear un usuario
$scope.FN_Iniciar_Sesion = function(formData)
{

  $http.post(url + 'Modulo/Modulo_Usuario/FN_Iniciar_Sesion', formData)
  .success(function(res){
    var ResultadoFuncion = res;

    if(ResultadoFuncion == 'Cuenta_Cancelada')
    {
      $scope.FN_Confirmacion_Alerta(4,0,false,'¿Tu cuenta se encuntra inhabilitada deseas habilitarla de nuevo?');
  }




        if(ResultadoFuncion!= 'false' && ResultadoFuncion != 'Cuenta_Cancelada')//_*el ctrl retorna un bool, si este es true ejecuta la funcion mensaje
        {
            //_*Guardo los datos de la cuenta del usuario para imprimirlos en la vista, esta variable se ecuentra en la fabrica
            //_*LOS DATOS QUE SE GUARDAN SON DE LAS TALBAS CUENTA, CLIENTE, EMPLEADO Y ESTABLECIMIENTO, DEPENDIENDO DEL TIPO DE LOGIN QUE SE REALICE
            Fabrica.objeto.AOBJ_Datos_Usuario = res;


            //_*mensaje de alerta         
            $scope.Mensaje = "Bienvenido " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario;
            Fabrica.objeto.FN_Crear_Mensaje( $scope.Mensaje,100, 'Finalizado');

            $scope.LG.Contrasenia = '';
            $scope.LG.Usuario_Nombre ='';

            //_*variable para el boton iniciar sesion
            $scope.Bl_Btn_Login_Iniciar_Sesion = false;
            //_*variable para el boton cerrar sesion
            $scope.Bl_Btn_Login_Cerrrar_Sesion = true;
            //_*variable para el modal de login
            $scope.BL_Contenedor_Login = false;
            //_*variable para el scroll del body
            $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
            //_* $scope.BL_Login_Recup = false;

        }
        if(ResultadoFuncion=='false')//_*el ctrl retorna un bool, si este es true ejecuta la funcion mensaje
        {
          $scope.Mensaje = "No se pudo Inciar Sessión, Verifique que sus datos sean correctos";
          Fabrica.objeto.FN_Crear_Mensaje( $scope.Mensaje,200);
      }


  })

  .error(function (res , status) {

    alert(res);
    console.log(res,status);
});
};

$scope.FN_Cerrar_Sesion = function(){
  $http.post(url + 'Modulo/Modulo_CerrarSesion/FN_Cerrar_Sesion')
  .success(function(res){
    var ResultadoFuncion = res;

    if (ResultadoFuncion=='true'){
      $scope.Bl_Btn_Login_Iniciar_Sesion = true;
      $scope.Bl_Btn_Login_Cerrrar_Sesion = false;

      var Datos_Defecto =
      [{
        Nombre_Usuario: 'Usuario',
        Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar11_big.png',
        Fondo_Perfil_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo66-old-car-forest-vintage-flare-nature-carl-kadysz-2880x1800.jpg',
        Estado_Cuenta: 'En uso',
        Disponibilidad: 'Activo',
        PK_ID_Usuario: '0',
        Correo_Electronico: '',
        FK_ID_Rol: 5,

            //_*Datos de la tabla cliente y/o empleado
            PK_ID_Usuario_Persona: '',
            FK_ID_Cuenta: '',
            Nombre: '',
            Segundo_Nombre: '',
            Apellido: '',
            Segundo_Apellido:'',
            Municipio:'',
            Fecha_Nacimiento:'',
            Telefono_Celular:'',
            Sexo:'',
            Tipo_Cliente: '',
            //_*Datos de la tabla establecimiento para los datos del cliente
            PK_ID_Establecimiento: '',
            Nombre_Establecimiento: '',
            Nombre_Encargado: '',
            Nit: '',
            Telefono_Establecimiento: '',
            Direccion_Establecimiento: '',
            Municipio_Establecimiento: '',
            FK_ID_Usuario: ''
        }];
        Fabrica.objeto.AOBJ_Datos_Usuario = Datos_Defecto;
              //Elimino los productos que halla tenido agregados en la orden del localstorage
              delete $localStorage.Datos_Productos;

              /*Si el resultado del controlador es verdadero lo que quiere decir que destruyó la sesion correctamente*/
              $scope.Mensaje="La sessión se cerró correctamente";
              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje,100, 'Finalizado');
              $scope.FN_Capturar_Datos_Usuario_Iniciado();

              window.location = url;
            // $http.post(url + 'Modulo/Modulo_Verificar_Permisos');
        }
        if(ResultadoFuncion=='false'){
            $scope.Mensaje="No se pudo cerrar Sessión";
            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje,100, 'Error');

            

        }
    })

  .error(function(res,status){
   console.log(res,stats);
});
};

//_***********************************************************************
        /**
         * FN_Actualizar_Datos_Cuenta
         */
         $scope.FN_Actualizar_Datos_Tabla_Cliente = function () {
          var obj_Datos = Fabrica.objeto.AOBJ_Datos_Usuario[0];
          
          delete obj_Datos.$$hashKey;
          $http.post(url + 'Modulo/Modulo_Usuario/FN_Actualizar_Datos_Tabla_Cliente', obj_Datos)
          .success(function (res) {
            var tipo = (res);

                                if(tipo == 'Nombre_No_Actualizado')
                                {
                                    //mensaje de Alerta
                                    $scope.Mensaje = "Los datos del usuario " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario + "ya se encuentran actualizados";

                                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
                                    //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                                }
                                if (tipo == 'Usuario_Existente'){
                                      //mensaje de Alerta
                                      $scope.Mensaje = "El nombre de usuario ya se encuentra en uso, ingresa otro nombre ";

                                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Alerta');
                                    //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                                }

                                if (tipo == 'true')
                                {

                                    //mensaje de Alerta
                                    $scope.Mensaje = "Los datos del usuario " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario  + " " + "han sido actualizados";

                                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                                    //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                                }
                                if (tipo == 'false')
                                {
                                    //mensaje de Alerta
                                    $scope.Mensaje = "Los datos del usuario " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario  + " " + "ya se encuentran actualizados";
                                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
                                }

                            })
          .error(function (res, status) {
                console.log('error', null, res);

        });

      };
         /**
         * FN_Actualizar_Datos_Cuenta
         */
         $scope.FN_Actualizar_Contrasenia = function (formData) {
            // formData += Fabrica.objeto.AOBJ_Datos_Usuario[0].PK_ID_Usuario;
            // var obj_Datos_Contrasenia = formData;

            // obj_Datos_Contrasenia.push(Fabrica.objeto.AOBJ_Datos_Usuario[0].PK_ID_Usuario);
            // console.log(obj_Datos_Contrasenia);
            $scope.AC.PK_ID_Usuario = Fabrica.objeto.AOBJ_Datos_Usuario[0].PK_ID_Usuario;

            $http.post(url + 'Modulo/Modulo_Recuperar_Contrasenia/FN_Actualizar_Contrasenia', formData)
            .success(function (res) {
              var tipo = (res);



              if (tipo == 'true')
              {

                                    //mensaje de Alerta
                                    $scope.Mensaje = "Tu contraseña ha sido actualizada";
                                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                                    //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                                }
                                if (tipo == 'false')
                                {
                                    //mensaje de Alerta
                                    $scope.Mensaje = "No se ha actualiado la contraseña, verifica que la contraseña actual sea correcta";
                                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
                                }

                            })
            .error(function (res, status) {
                  console.log('error', null, res);

          });

        };

        $scope.FN_Capturar_Datos_Usuario_Iniciado = function ()
        {

            $http.post(url + 'Modulo/Modulo_Usuario/FN_Capturar_Datos_Usuario_Iniciado')
            .success(function (res) {
              var tipo = (res);
              if(tipo == 'Cuenta_Cancelada')
              {
                $scope.FN_Cerrar_Sesion();
            }
            if(tipo != 'false')
            {

                Fabrica.objeto.AOBJ_Datos_Usuario= res ;
                $scope.Bl_Btn_Login_Iniciar_Sesion = false;
                $scope.Bl_Btn_Login_Cerrrar_Sesion = true;

                if(Fabrica.objeto.AOBJ_Datos_Usuario[0].FK_ID_Rol  == 3)
                {
                  $scope.FN_Listar_Notificaciones();
              }

          }

          if(tipo == 'false')
          {
            var Datos_Defecto =
            [{
              Nombre_Usuario: 'Usuario',
              Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar11_big.png',
              Fondo_Perfil_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/wallpapers/papers.co-mo66-old-car-forest-vintage-flare-nature-carl-kadysz-2880x1800.jpg',
              Estado_Cuenta: 'Activo',
              Disponibilidad: 'Activo',
              PK_ID_Usuario: '0',
              Correo_Electronico: '',

                //_*Datos de la tabla cliente y/o empleado
                FK_ID_Rol: 5,                 
                PK_ID_Usuario_Persona: '',
                FK_ID_Cuenta: '',
                Nombre: '',
                Segundo_Nombre: '',
                Apellido: '',
                Segundo_Apellido:'',
                Municipio:'',
                Fecha_Nacimiento:'',
                Telefono_Celular:'',
                Sexo:'',
                Tipo_Cliente: '',
                //_*Datos de la tabla establecimiento para los datos del cliente
                PK_ID_Establecimiento: '',
                Nombre_Establecimiento: '',
                Nombre_Encargado: '',
                Nit: '',
                Telefono_Establecimiento: '',
                Direccion_Establecimiento: '',
                Municipio_Establecimiento: '',
                FK_ID_Usuario: ''
            }];
            Fabrica.objeto.AOBJ_Datos_Usuario = Datos_Defecto;
            $scope.Bl_Btn_Login_Iniciar_Sesion = true;
            $scope.Bl_Btn_Login_Cerrrar_Sesion = false;


        }
    })

            .error(function (res, status) {
                  console.log('error', null, res);

          });

            
            
        };
        $scope.FN_Listar_Notificaciones = function()
        {
            $http.get(url + 'Modulo/Modulo_Usuario/FN_Listar_Notificaciones')
            .success(function (res){
              Fabrica.objeto.AOBJ_Notificaciones_Usuario= res;
              $scope.FN_Cargar_Datos_Usuario(1);   
          })
            

            .error(function(res, status){

            });
        };

        //_*Modulo de comentarios para los productos
        $scope.BL_Comentario = false;
        //_*Esta variable contendra el PK_ID_Producto por si el usuario desea registrar un comentario
        //_*tendre guardao en que porducto  esta ubicado y a que FK asociare el comentario
        $scope.PK_ID_Producto_Seleccionado = 0;
        //_* esta funcion se vio necesaria, ya que para desplegar las opciones de un comentario, no se podia 
        //_*hacer uso de ng-click ya que al poseer ng-if se debe llamar una funcion para poder ejercer cambios
        $scope.Num_Posicion_Comentario = 0;
        $scope.BL_Edicion_Datos_Comentario = false;

        $scope.FN_Ver_Opciones_Comentario = function(Elemento)
        {
          Fabrica.objeto.AOBJ_Comentarios_Producto[Elemento].BL_Opciones_Comentario =! Fabrica.objeto.AOBJ_Comentarios_Producto[Elemento].BL_Opciones_Comentario ;
      };

      $scope.FN_Editar_Comentario = function(Elemento,Tipo_Accion)
      {   
            //Funcion que solo desplegara las opciones de ediccion, esta funcion se ejectuta cuando
            // se clickea sobre  el textarea, por ello tansolo hago que cuando se clickee cambie a true, 
            // si usara la accion 2, cada vez que se clickee el textarea se ocultaria o visualizaria las opciones 
            if(Tipo_Accion == 1)
            {

              $scope.BL_Edicion_Datos_Comentario = true;
                //esta parte se usa para cuando se de en la opcion editar pero del desplegable de opciones
                Fabrica.objeto.AOBJ_Comentarios_Producto[Elemento].BL_Opciones_Comentario = false;
            }
            //Funcion que servira para ocultar las opciones de edicion
            if(Tipo_Accion ==2)
            {

              $scope.BL_Edicion_Datos_Comentario =! $scope.BL_Edicion_Datos_Comentario;
                // si se cancelo la edicion de vuelvo a listar los comentarios para tenerlos actualizados
                $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);
            }
            $scope.Num_Posicion_Comentario = Elemento;
        };
        $scope.FN_Ver_Comentarios_Producto = function(PK_ID_Producto)
        {
            $scope.BL_Comentario = true;//Visualizo el modal de comentarios

            $scope.BL_Scroll_Body =! $scope.BL_Scroll_Body;
            $scope.BL_Ver_Menu = false;
            $scope.Bl_Menu_Desplegado = false;

            var Id = PK_ID_Producto;
            $scope.PK_ID_Producto_Seleccionado = PK_ID_Producto;
            $http.post(url + 'Modulo/Modulo_Producto/FN_Ver_Comentarios_Producto', Id)
            .success(function (res) {
                //variable en la que guardo los datos debueltos por php por medio de json_encode
                Fabrica.objeto.AOBJ_Comentarios_Producto = res;
                for (var i = 0; i < Fabrica.objeto.AOBJ_Comentarios_Producto.length; i++) {
                  Fabrica.objeto.AOBJ_Comentarios_Producto[i].BL_Opciones_Comentario = false;

              }

          })
            .error(function (res, status) {
                  console.log('error', null, res);

          });
        };
        $scope.FN_Registrar_Nuevo_Comentario = function(Nuevo_Comentario)
        {
            $scope.N.PK_ID_Producto = $scope.PK_ID_Producto_Seleccionado;
            var Comentario = Nuevo_Comentario;
            $http.post(url + 'Modulo/Modulo_Producto/FN_Registrar_Nuevo_Comentario', Comentario)
            .success(function (res) {
              var Respuesta = (res); 
              if(Respuesta == '_Sesion_No_Iniciada')
              {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Inicia sesion para poder publicar un comentario";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Alerta');
                  }
                  else if(Respuesta == 'Comentario_Registrado')
                  {
                        //mensaje de AlertaN
                        // $scope.Mensaje = "Tu comentario ha sido publicado";
                        // Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                        $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);
                        $scope.N.Comentario = "";

                    }
                    else
                    {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Ha ocurrido un error al publicar tu comentario";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
                      $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);
                  }

              })
            .error(function (res, status) {
                  console.log('error', null, res);

          });
        };

        $scope.FN_Eliminar_Comentario =  function(PK_ID_Comentario)
        {

            $http.post(url + 'Modulo/Modulo_Producto/FN_Eliminar_Comentario', PK_ID_Comentario)
            .success(function (res) {
              var Respuesta = (res); 
              if(Respuesta == 'Comentario_Eliminado')
              {
                      // //mensaje de AlertaN
                      // $scope.Mensaje = "comentario eliminado";
                      // Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                      $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);
                  }

                  else
                  {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Ha ocurrido un error al eliminar tu comentario";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');

                  }

              })
            .error(function (res, status) {
                  console.log('error', null, res);

          });
        };



        $scope.FN_Valoracion_Comentario = function(Posicion)

        {
            var Datos_Comentario = Fabrica.objeto.AOBJ_Comentarios_Producto[Posicion];
            console.log(Datos_Comentario);
            $http.post(url + 'Modulo/Modulo_Producto/FN_Valoracion_Comentario', Datos_Comentario)
            .success(function (res) {
              var Respuesta = (res); 
              if(Respuesta == '_Sesion_No_Iniciada')
              {
                $scope.Mensaje = "Inicia sesión para poder valorar este comentario";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Alerta');
            }
            else if(Respuesta == 'Valoracion_Agregada')
            {

                // $scope.Mensaje = "Le has dado me gusta a el comentario";
                // Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);
            }

            else if(Respuesta == 'Valoracion_Removida')
            {

                // $scope.Mensaje = "Has removido tu like del comentario";
                // Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);


            }
            else if(Respuesta == 'false')
            {
             $scope.Mensaje = "Ha ocurrido un error al valorar el comentario";
             Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');

         }
         else
         {
             $scope.Mensaje = "Ha ocurrido un error al valorar el comentario";
             Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');

         }

     })
            .error(function (res, status) {
                  console.log('error', null, res);

          });
        };



        $scope.FN_Modificar_Comentario =  function(Posicion_Comentario)
        {
            var Comentario = Fabrica.objeto.AOBJ_Comentarios_Producto[Posicion_Comentario];
            $http.post(url + 'Modulo/Modulo_Producto/FN_Modificar_Comentario', Comentario)
            .success(function (res) {
              var Respuesta = (res); 
              if(Respuesta == 'true')
              {
                      // //mensaje de AlertaN
                      // $scope.Mensaje = "comentario actualizado";
                      // Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                      $scope.FN_Ver_Comentarios_Producto($scope.PK_ID_Producto_Seleccionado);
                      //oculto el menu de opciones de ediccion
                      $scope.BL_Edicion_Datos_Comentario = false;
                  }


                  else
                  {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Ha ocurrido un error al actualizar tu comentario";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');

                  }

              })
            .error(function (res, status) {
                  console.log('error', null, res);

          });
        };






        $scope.FN_Registrar_Imagen_Portada = function(formData){
            $http.post(url + 'Administracion/Administracion/FN_Registrar_Imagen_Portada', formData)
            .success(function (res){
              var Respuesta = (res);
              if(Respuesta == 'true'){
                $scope.Mensaje = "La imagen de portada ha sido registrada.";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                $scope.FN_Listar_Imagen_Portada();
                $scope.Port.URL_Imagen_Portada = "";

            }
            else if(Respuesta == 'Imagen_Encontrada'){
                $scope.Mensaje = "La imagen ya se encuentra registrada.";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
                $scope.FN_Listar_Imagen_Perfil();

            }else{
                $scope.Mensaje = "Ha ocurrido un error al registrar la imagen";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
            }
        })

            .error(function(res, status){

            });
        };

        $scope.FN_Registrar_Imagen_Perfil = function(formData){
            $http.post(url + 'Administracion/Administracion/FN_Registrar_Imagen_Perfil', formData)
            .success(function (res){
              var Respuesta = (res);
              if(Respuesta == 'true'){
                $scope.Mensaje = "La imagen de perfil ha sido registrada.";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                $scope.FN_Listar_Imagen_Perfil();
                $scope.Port.URL_Imagen_Perfil = "";


            }
            else if(Respuesta == 'Imagen_Encontrada'){
                $scope.Mensaje = "La imagen ya se encuentra registrada.";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
                $scope.FN_Listar_Imagen_Perfil();

            }
            else {
                $scope.Mensaje = "Ha ocurrido un error al registrar la imagen";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
            }
        })


            .error(function(res, status){

            });
        };

        $scope.FN_Listar_Imagen_Portada = function(){

            $http.get(url + 'Administracion/Administracion/FN_Listar_Imagen_Portada')
            .success(function (res){
              Fabrica.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil= res;
          })
            

            .error(function(res, status){

            });
        };
        $scope.FN_Listar_Imagen_Perfil = function(){
            $http.get(url + 'Administracion/Administracion/FN_Listar_Imagen_Perfil')
            .success(function (res){
              Fabrica.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars = res; 
              $scope.FN_Listar_Imagen_Portada();

          })
            

            .error(function(res, status){

            });
        };

        $scope.FN_Modificar_Imagen =  function(Posicion_Imagen,Tipo_Modificacion)
        {
            if(Tipo_Modificacion == 1)
            {


              var Datos_Imagen = Fabrica.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[Posicion_Imagen];
              $http.post(url + 'Administracion/Administracion/FN_Modificar_Imagen_Perfil', Datos_Imagen)
              .success(function (res) {
                var Respuesta = (res); 
                if(Respuesta == 'true')
                {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Datos de la imagen perfil actualizados";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                      $scope.FN_Listar_Imagen_Perfil();
                  }
                  else if(Respuesta == 'false')
                  {
                     //mensaje de AlertaN
                     $scope.Mensaje = "Los datos se encuentran actualizados";
                     Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
                 }

                

              })
              .error(function (res, status) {
                    console.log('error', null, res);

            });
          }
          if(Tipo_Modificacion == 2)
          {
              var Datos_Imagen_Portada = Fabrica.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[Posicion_Imagen];
              $http.post(url + 'Administracion/Administracion/FN_Modificar_Imagen_Portada', Datos_Imagen_Portada)
              .success(function (res) {
                var Respuesta = (res); 
                if(Respuesta == 'true')
                {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Datos de la imagen portada actualizados";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                      $scope.FN_Listar_Imagen_Portada();
                  }
                  else if(Respuesta == 'false')
                  {
                     //mensaje de AlertaN
                     $scope.Mensaje = "Los datos se encuentran actualizados";
                     Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
                 }
                 

              })
              .error(function (res, status) {
                    console.log('error', null, res);

            });
          }
      };


      $scope.FN_Eliminar =  function(Posicion_Imagen,Tipo_Eliminacion)
      {
        if(Tipo_Eliminacion == 1)
        {


          var Datos_Imagen = Fabrica.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[Posicion_Imagen];
          $http.post(url + 'Administracion/Administracion/FN_Eliminar_Imagen_Usuario', Datos_Imagen)
          .success(function (res) {
            var Respuesta = (res); 
            if(Respuesta == 'true')
            {

              $scope.Mensaje = "La imagen se ha eliminado correctamente";
              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
              $scope.FN_Listar_Imagen_Perfil();
          }

          else
          {

              $scope.Mensaje = "Error al eliminar la imagen de perfil";
              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');

          }

      })
          .error(function (res, status) {
                console.log('error', null, res);

        });
      }
      if(Tipo_Eliminacion == 2)
      {
          var Datos_Imagen = Fabrica.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[Posicion_Imagen];
          $http.post(url + 'Administracion/Administracion/FN_Eliminar_Imagen_Portada', Datos_Imagen)
          .success(function (res) {
            var Respuesta = (res); 
            if(Respuesta == 'true')
            {
                      //mensaje de AlertaN
                      $scope.Mensaje = "La imagen se ha eliminado correctamente";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
                      $scope.FN_Listar_Imagen_Portada();
                  }

                  else
                  {
                      //mensaje de AlertaN
                      $scope.Mensaje = "Erro al eliminar la imagen de portada";
                      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');

                  }

              })
          .error(function (res, status) {
                console.log('error', null, res);

        });
      }
  };
//Función para inhabilitar cuenta... Se hace con un solo botón ya que si está logeado es por que la cuenta está Activa o Habilitada.

$scope.FN_Inhabilitar_Estado_Cuenta = function(){
    //eL ECHO DE ANULAR UNA CUENTA NECESITA UNA CONFIRMACION, LLAMAMOS A LA FUNCION CONFIRAMACION PARA ESTO 
  // ESTOY PASANDO RES POR MEDIO DE LA CONFIRMACION LUEGO EN LA FUNCION CONFIRMACION LEO RES PARA DETERMINAR LA POSICION
  $scope.FN_Confirmacion_Alerta(5,0,false,'¿Inhabilitar cuenta?');
  

};

/*Función para consultar promociones... Se duplica en este lugar ya que el cliente tendrá acceso a un controlador independiente al de administración
pero se ejecuta cumpliendo la misma función*/

function Controlador_Consultar_Promociones($scope,$http, Fabrica)
{
  $scope.AOBJ_Consultar_Promociones  = [];
};

$scope.Consultar_Promociones = function ()
{
  $http.get(url + 'Modulo/Modulo_Promociones/FN_Consultar_Promociones')
  .success(function(res) {
    $scope.AOBJ_Consultar_Promociones  = res;
})
  .error(function (res, status) {
        console.log('error', null, res);

});
};







$scope.AOBJ_Lista_Permisos_Usuario= [];
$scope.Tipo_Lista_Seleccionado = 0; 
$scope.FN_Listar_Modulo_Permisos_Usuario = function (Tipo_Listar)
{
   $scope.Tipo_Lista = '';
   if(Tipo_Listar == 1)
   {
      $scope.Tipo_Lista = {
        Tipo_Listar: 1
    };
    $scope.Tipo_Lista_Seleccionado = Tipo_Listar;
}
if(Tipo_Listar == 2)
{
   $scope.Tipo_Lista = {
      Tipo_Listar: 2
  };
  $scope.Tipo_Lista_Seleccionado = Tipo_Listar;
}
if(Tipo_Listar == 3)
{
  $scope.Tipo_Lista = {
    Tipo_Listar: 3
};
$scope.Tipo_Lista_Seleccionado  = Tipo_Listar;   
}
$http.post(url + 'Modulo/Modulo_Usuario/FN_Listar_Modulo_Permisos_Usuario',$scope.Tipo_Lista)
.success(function (res) {
  $scope.AOBJ_Lista_Permisos_Usuario = res;

})
.error(function (res, status) {
      console.log('error', null, res);

});
};



$scope.AOBJ_Lista_Roles= [];
$scope.FN_Listar_Roles_Usuarios= function ()
{

  $http.get(url + 'Modulo/Modulo_Usuario/FN_Listar_Roles_Usuarios')
  .success(function (res) {
    $scope.AOBJ_Lista_Roles = res;

})
  .error(function (res, status) {
        console.log('error', null, res);

});
};

$scope.FN_Registrar_Permiso_Usuario = function (Datos)
{

  $http.post(url + 'Modulo/Modulo_Usuario/FN_Registrar_Permiso_Usuario',Datos)
  .success(function (res) {
    var Respuesta = (res);
    console.log(Respuesta);
    if (Respuesta == 'true')
    {
      $scope.Mensaje = "Vista registrada correctamente ";
      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
      $scope.FN_Listar_Modulo_Permisos_Usuario($scope.Tipo_Lista_Seleccionado);
      $scope.PM.FK_ID_Rol = '';
      $scope.PM.Nombre_Vista = '';
      $scope.PM.Url_Vista = '';

  }
  if (Respuesta == 'false')
  {
      $scope.Mensaje = "Error al registrar la vista";
      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
  }

})
  .error(function (res, status) {
        console.log('error', null, res);

});
};

$scope.FN_Eliminar_Permiso_Usuario = function (Posicion_Permiso)
{
  var Datos = $scope.AOBJ_Lista_Permisos_Usuario[Posicion_Permiso]
  $http.post(url + 'Modulo/Modulo_Usuario/FN_Eliminar_Permiso_Usuario',Datos)
  .success(function (res) {

    var Respuesta = (res);
    console.log(Respuesta);

    if (Respuesta == 'true')
    {
      $scope.Mensaje = "Permiso de vista eliminado correctamente ";
      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
      $scope.FN_Listar_Modulo_Permisos_Usuario($scope.Tipo_Lista_Seleccionado);
  }
  if (Respuesta == 'false')
  {
      $scope.Mensaje = "Error al eliminar la vista";
      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
  }

})
  .error(function (res, status) {
        console.log('error', null, res);

});
};

$scope.FN_Modificar_Permiso_Usuario = function (Posicion_Permiso)
{
  var Datos = $scope.AOBJ_Lista_Permisos_Usuario[Posicion_Permiso]
  $http.post(url + 'Modulo/Modulo_Usuario/FN_Modificar_Permiso_Usuario',Datos)
  .success(function (res) {

    var Respuesta = (res);
    console.log(Respuesta);

    if (Respuesta == 'true')
    {
      $scope.Mensaje = "Permiso actualizado correctamente ";
      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
      $scope.FN_Listar_Modulo_Permisos_Usuario($scope.Tipo_Lista_Seleccionado);
  }
  if (Respuesta == 'false')
  {
      $scope.Mensaje = "No se han modificado datos del permiso solicitado";
      Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
  }

})
  .error(function (res, status) {
    console.log('error', null, res);
});
};


//
// $scope.Direccion_Entrega = "";
// $scope.Telefono_Entrega = "";
$scope.FN_Envio_Orden = function (Tipo_Accion,Datos_De_Entrega)
{


  if(Tipo_Accion == 1){

    //La primera opcion es para verificar si el usuario ha iniciado sesion


    $http.post(url + 'Modulo/Modulo_Usuario/FN_Verificacion_Sesion')
    .success(function (res) {
      var Respuesta = (res);
      if(Respuesta == '_Sesion_No_Iniciada')
      {
        $scope.Mensaje = "Inicia sesión para poder enviar la orden actual";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
    }
    if(Respuesta == '_Sesion_Iniciada')
    {
     $scope.BL_Scroll_Body = true;
     $scope.BL_Ver_Envio_Orden =! $scope.BL_Ver_Envio_Orden;
     $scope.BL_Datos_Envio_Producto = true;
       // $scope.Direccion_Entrega = Fabrica.objeto.AOBJ_Datos_Usuario[0].Direccion_Establecimiento;
       // $scope.Telefono_Entrega = Fabrica.objeto.AOBJ_Datos_Usuario[0].Telefono_Establecimiento;
   }
})
    .error(function (res, status) {
          console.log('error', null, res);

  });
}
if(Tipo_Accion == 2)
{
    //Opcion para enviar la orden
    $http.post(url + 'Modulo/Modulo_Usuario/FN_Envio_Orden_Guardado_Datos_Productos', Fabrica.objeto.AOBJ_Productos)
    .success(function (res) {
      var Respuesta = (res);
      if(Respuesta == 'Orden_Guardada')
      {
        //Luego de guardar los datos de la orden paso a manar los atos necesarios para realizar un registro en
        //la tabla  tbl_Cotizacion_Producto, la cual necesita los datos Direccion,Telefono


        console.log(Datos_De_Entrega);
        $http.post(url + 'Modulo/Modulo_Usuario/FN_Envio_Orden', Datos_De_Entrega)
        .success(function (res) {
          var Respuesta = (res);
          if(Respuesta == 'true')
          {
             $scope.Mensaje = "Tú orden ha sido enviada";
             Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
             $scope.BL_Ver_Envio_Orden =! $scope.BL_Ver_Envio_Orden;
             $scope.BL_Datos_Envio_Producto =! $scope.BL_Datos_Envio_Producto;
         }
         else
         {
             $scope.Mensaje = "Ha ocurrido un error al enviar la orden";
             Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
         }
     })
        .error(function (res, status) {
              console.log('error', null, res);
      });
    }
    if(Respuesta == 'No_Hay_Datos')
    {
     $scope.Mensaje = "Error al iniciar el proceso de envio de orden";
     Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
     $scope.BL_Scroll_Body = true;
     $scope.BL_Ver_Envio_Orden =! $scope.BL_Ver_Envio_Orden;
     $scope.BL_Datos_Envio_Producto = true;
 }
})
    .error(function (res, status) {
          console.log('error', null, res);

  });
}
if(Tipo_Accion == 3)
{
    $scope.BL_Ver_Envio_Orden =! $scope.BL_Ver_Envio_Orden;
    $scope.BL_Datos_Envio_Producto =! $scope.BL_Datos_Envio_Producto;

}
};




$scope.AOBJ_Lista_Ordenes_Enviadas= [];
$scope.FN_Listar_Ordenes_Enviadas = function ()
{

  $http.post(url + 'Modulo/Modulo_Usuario/FN_Listar_Ordenes_Enviadas')
  .success(function (res) {
    $scope.AOBJ_Lista_Ordenes_Enviadas = res;

})
  .error(function (res, status) {
        console.log('error', null, res);

});
};


$scope.AOBJ_Lista_Detalles_Ordenes_Enviadas= [];
$scope.Total_Orden_Enviada = 0;

$scope.FN_Listar_Detalles_Ordene_Enviada = function (Posicion_Lista)
{
  $scope.Total_Orden_Enviada = 0;
  var Datos = $scope.AOBJ_Lista_Ordenes_Enviadas[Posicion_Lista];
  $http.post(url + 'Modulo/Modulo_Usuario/FN_Listar_Detalles_Ordene_Enviada',Datos)
  .success(function (res) {
    $scope.AOBJ_Lista_Detalles_Ordenes_Enviadas = res;


    for (var i = 0; i < $scope.AOBJ_Lista_Detalles_Ordenes_Enviadas.length; i++) {
      $scope.Total_Orden_Enviada += parseInt($scope.AOBJ_Lista_Detalles_Ordenes_Enviadas[i].Sub_Total);   
  }

})
  .error(function (res, status) {
        console.log('error', null, res);

});
};


$scope.FN_Eliminar_Orden_Enviada = function (Posicion_Lista)
{
  $scope.Total_Orden_Enviada = 0;
  var Datos = $scope.AOBJ_Lista_Ordenes_Enviadas[Posicion_Lista];
  $http.post(url + 'Modulo/Modulo_Usuario/FN_Eliminar_Orden_Enviada',Datos)
  .success(function (res) {
     var Respuesta = (res);
     if(Respuesta == 'true')
     {
        $scope.Mensaje = "Orden eliminada correctamente";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
        $scope.FN_Listar_Ordenes_Enviadas();
    }
    else
    {
        $scope.Mensaje = "Ha ocurrido un error al eliminar la orden";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
    }

})
  .error(function (res, status) {
        console.log('error', null, res);

});
};
//_*********************************Variable con la que puedo hacer uso de los elementos de la fabrica, desde el html***********************
//_*cabe rezaltar que caundo quiera llamar alguna variable del APP.JS desde el hyml debo de poner: dato.variable a solicitar
//_* ya que .dato posee como ruta predeterminada el objeto donde estoy guardando mis elementos
$scope.dato = Fabrica.objeto;
}



app.controller('Controlador_Principal', Controlador_Principal);


})();
