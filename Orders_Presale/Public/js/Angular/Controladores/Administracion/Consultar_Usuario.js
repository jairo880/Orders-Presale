(function () {
    'use strict';

//Controlador Registro
function Controlador_Consultar_Usuarios($scope, $http, Fabrica)

{
        //variable en la que guardo los datos debueltos por php por medio de json_encode
        $scope.AOBJ_Lista_Usuarios_Registrados = [];

        /**
         //Listar datos de los usuario
         **/
         $scope.Listar_Usuarios = function ()
         {

            $http.get(url + 'Administracion/Administracion/FN_Listar_Usuarios')
            .success(function (res) {
                //variable en la que guardo los datos debueltos por php por medio de json_encode
                $scope.AOBJ_Lista_Usuarios_Registrados = res;

            })
            .error(function (res, status) {
                alerta('error', null, res);
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

                              //mensaje de Alerta
                              $scope.Mensaje = "Los datos del usuario " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario + "ya se encuentran actualizados";

                              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                            //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                            $scope.Listar_Usuarios();
                        }
                        if (tipo == 'false')
                        {
  //mensaje de Alerta
  $scope.Mensaje = "Los datos del usuario " + " " + Fabrica.objeto.AOBJ_Datos_Usuario[0].Nombre_Usuario + "ya se encuentran actualizados";
  Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
}

})
            .error(function (res, status) {
                alerta('error', null, res);
            });

        };

        $scope.FN_Inhabilitar_Estado_Cuenta_Usuario = function(Posicion_Elemento){

           var obj = $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento];
           $http.post(url + 'Administracion/Administracion/FN_Inhabilitar_Estado_Cuenta_Usuario', obj)
           .success(function (res) {
            var tipo = (res);

                        if (tipo == 'true')
                        {

                            //mensaje de Alerta
                            $scope.Mensaje = "Datos actualizados del usuario" + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario;

                            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                            //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                            $scope.Listar_Usuarios();
                        }
                        if (tipo == 'false')
                        {
                            //mensaje de Alerta
                            $scope.Mensaje = "No se ha modificado ninguna información del usuario" + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario;
                            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                        }

                    })
           .error(function (res, status) {
            alerta('error', null, res);
        });   
       };
       $scope.FN_Habilitar_Estado_Cuenta_Usuario = function(Posicion_Elemento){

           var obj = $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento];
           $http.post(url + 'Administracion/Administracion/FN_Habilitar_Estado_Cuenta_Usuario', obj)
           .success(function (res) {
            var tipo = (res);

                        if (tipo == 'true')
                        {

                            //mensaje de Alerta
                            $scope.Mensaje = "Datos actualizados del usuario" + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario;

                            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                            //Ejecuto la funcion listar para asi mostrar los cambios generados en la base de datos
                            $scope.Listar_Usuarios();
                        }
                        if (tipo == 'false')
                        {
                            //mensaje de Alerta
                            $scope.Mensaje = "No se ha modificado ninguna información del usuario" + " " + $scope.AOBJ_Lista_Usuarios_Registrados[Posicion_Elemento].Nombre_Usuario;
                            Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                        }

                    })
           .error(function (res, status) {
            alerta('error', null, res);
        }); 
       };
   }

   app.controller('Controlador_Consultar_Usuarios', Controlador_Consultar_Usuarios);

})();
