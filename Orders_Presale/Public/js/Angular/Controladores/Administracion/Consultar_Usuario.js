(function () {
  'use strict';

//Controlador Registro
function Controlador_Consultar_Usuarios($scope, $http, Fabrica,$rootScope)

{
        //variable en la que guardo los datos debueltos por php por medio de json_encode
        $scope.AOBJ_Lista_Usuarios_Registrados = [];

        /**
         //Listar datos de los usuario
         **/
         $scope.Listar_Usuarios = function ()
         {

          $http.post(url + 'Administracion/Administracion/FN_Listar_Usuarios')
          .success(function (res) {
                //variable en la que guardo los datos debueltos por php por medio de json_encode
                $scope.AOBJ_Lista_Usuarios_Registrados = res;

              })
          .error(function (res, status) {
            console.log('error', status, res);
          });
        };



        /**
         * Modificar datos del usuario
         */
         $scope.FN_Modificar_Datos = function (Posicion_Elemento) {
          var obj = $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento];
          delete obj.$$hashKey;
          $http.post(url + 'Administracion/Administracion/FN_Modificar_Datos', obj)
          .success(function (res) {
            var tipo = (res);

            if (tipo == 'true')
            {

              //_*mensaje de console.log
              $scope.Mensaje = "Los datos del usuario " + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario + " "+ " se han actualizado";

              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
              //_*Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
              $scope.Listar_Usuarios();
            }
            if (tipo == 'false')
            {
              //_*mensaje de console.log
              $scope.Mensaje = "Los datos del usuario " + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario + " "+ "ya se encuentran actualizados";
              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
            }

          })
          .error(function (res, status) {
            console.log('error', status, res);
          });

        };

        $scope.FN_Inhabilitar_Estado_Cuenta_Usuario = function(Posicion_Elemento){

         var obj = $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento];
         $http.post(url + 'Administracion/Administracion/FN_Inhabilitar_Estado_Cuenta_Usuario', obj)
         .success(function (res) {
          var tipo = (res);

          if (tipo == 'true')
          {

            //_*mensaje de console.log
            $scope.Mensaje = "Los datos del usuario " + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario + " "+ " se han actualizado";

            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
            //_*Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
            $scope.Listar_Usuarios();
          }
          if (tipo == 'false')
          {
            //_*mensaje de console.log
            $scope.Mensaje = "No se ha modificado ninguna información del usuario" + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario;
            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
          }

        })
         .error(function (res, status) {
          console.log('error', status, res);
        });   
       };
       $scope.FN_Habilitar_Estado_Cuenta_Usuario = function(Posicion_Elemento){

         var obj = $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento];
         $http.post(url + 'Administracion/Administracion/FN_Habilitar_Estado_Cuenta_Usuario', obj)
         .success(function (res) {
          var tipo = (res);

          if (tipo == 'true')
          {

            //_*mensaje de console.log
            $scope.Mensaje = "Los datos del usuario " + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario + " "+ " se han actualizado";

            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
            //_*Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
            $scope.Listar_Usuarios();
          }
          if (tipo == 'false')
          {
            //_*mensaje de console.log
            $scope.Mensaje = "No se ha modificado ninguna información del usuario" + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario;
            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
          }

        })
         .error(function (res, status) {
          console.log('error', null, res);
        }); 
       };

//_* Variable para guardar los datos de las consultas a la bd
       $scope.AOBJ_Lista_Ordenes_Enviadas = [];
       $scope.AOBJ_Lista_Detalles_Ordenes_Enviadas = [];
//_* Variables para guardar las posiciones en que se encuentra el elemento selecionado, con esto 
//_* Puedo mostrar la informacion ya sea del usuario o de la orden        
       $scope.Posicion_Usuario_Lista = 0;
       $scope.Posicion_Orden_Lista = 0;
//_* Variable para mostrar el total de la orden seleccionada, esta variable se llena  recorriendo 
//_* uel AOBJ_Lista_Detalles_Ordenes_Enviadas       
       $scope.Num_Total_Orden = 0;
//_* Variable que sirve para visualizar el tablero vacio        
       $scope.Ver_Tablero_Vacio = true;

       $scope.FN_Listar_Ordenes_Usuario = function (Posocion_Elemento,Tipo_Listar)
       {

        if(Tipo_Listar == 1)
        {        
          $scope.Ver_Ordenes = true;
          $scope.Ver_Detalle_Orden = false;
          $scope.Ver_Tablero_Vacio = false;

          var Datos = $scope.AOBJ_Lista_Usuarios_Registrados[Posocion_Elemento];
          $scope.Posicion_Usuario_Lista = Posocion_Elemento;
          
          $http.post(url + 'Administracion/Administracion/FN_Listar_Ordenes_Usuario',Datos)
          .success(function (res) {
          //_*variable en la que guardo los datos debueltos por php por medio de json_encode
          $scope.AOBJ_Lista_Ordenes_Enviadas = res;

        })
          .error(function (res, status) {
            console.log('error', status, res);
          });
        }

        if(Tipo_Listar == 2)
        {
          $scope.Ver_Detalle_Orden = true;
          $scope.Ver_Ordenes = false;
          $scope.Ver_Tablero_Vacio = false;

          $scope.Posicion_Orden_Lista = Posocion_Elemento;
          var Datos_Detalle = $scope.AOBJ_Lista_Ordenes_Enviadas[Posocion_Elemento];

          $http.post(url + 'Administracion/Administracion/FN_Listar_Detalle_Ordene_Usuario',Datos_Detalle)
          .success(function (res) {
          //_*variable en la que guardo los datos debueltos por php por medio de json_encode
          $scope.AOBJ_Lista_Detalles_Ordenes_Enviadas = res;
          for (var i = 0; i < $scope.AOBJ_Lista_Detalles_Ordenes_Enviadas.length; i++) {
            $scope.Num_Total_Orden += parseInt($scope.AOBJ_Lista_Detalles_Ordenes_Enviadas[i].Sub_Total);   
          }

        })
          .error(function (res, status) {
            console.log('error', status, res);
          });
        }
      };

      //_*
      $scope.FN_Actualizar_Estado_Orden = function (Posicion_Orden) {
        var obj = $scope.AOBJ_Lista_Ordenes_Enviadas[Posicion_Orden];
        delete obj.$$hashKey;
        $http.post(url + 'Administracion/Administracion/FN_Actualizar_Estado_Orden', obj)
        .success(function (res) {
          var tipo = (res);

          if (tipo == 'true')
          {

            //_*mensaje de console.log
            $scope.Mensaje = "Los datos de la orden han sido actualizados ";

            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
            //_*Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
            $scope.Listar_Usuarios();
          }
          if (tipo == 'false')
          {
            //_*mensaje de console.log
            $scope.Mensaje = "los datos de la orden ya se encuentran actualizados";
            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
          }

        })
        .error(function (res, status) {
          console.log('error', status, res);
        });


      };

      $scope.FN_Ocultar_Lista_Ordenes = function()

      {
        $scope.Ver_Detalle_Orden = false;
        $scope.Ver_Ordenes = false;
        $scope.Posicion_Orden_Lista = 0;
        $scope.Posicion_Usuario_Lista = 0;
        $scope.AOBJ_Lista_Ordenes_Enviadas = [];
        $scope.AOBJ_Lista_Detalles_Ordenes_Enviadas = [];
        $scope.Ver_Tablero_Vacio = true;
      };




    }




    app.controller('Controlador_Consultar_Usuarios', Controlador_Consultar_Usuarios);

  })();
