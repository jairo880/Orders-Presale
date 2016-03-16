(function () {
    'use strict';

    function Controlador_Registro_Promocion($scope, $http, Fabrica)

    {    

        $scope.Registrar_Promocion = function (formData){
            $http.post(url + 'Modulo/Modulo_Promociones/FN_Registrar_Promocion', formData)
            .success(function (res)
            {
               var respuesta = (res); 


               if(respuesta == 'true'){
                $scope.RP.Nombre_Promocion = '';
                $scope.RP.Descripcion_Promocion = '';
                $scope.RP.Fecha_Inicio = '';
                $scope.RP.Fecha_Fin = '';


                $scope.Mensaje = "Promocion registrada correctamente";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
            }
            if(respuesta == 'false'){
               $scope.Mensaje = "Error al registrar";
               Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
           }


       })
        }


        $scope.FN_Limpiar_Formulario = function ()
        {
           $scope.RP.Descripcion_Promocion = '';
           $scope.RP.Fecha_Inicio = '';
           $scope.RP.Fecha_Fin = '';

       }


       $scope.datoRegistro = Fabrica.objeto;

   }
   app.controller('Controlador_Registro_Promocion', Controlador_Registro_Promocion);


})();