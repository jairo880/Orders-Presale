(function () {
    'use strict';

    //_*Controlador Registro
    function Controlador_Registro_Categoria($scope, $http, Fabrica)

    {
        /**
         * Registrar_Categoria 
         */
         $scope.FN_Registrar_Categoria = function (formData) {

            $http.post(url + 'Modulo/Modulo_Categoria/FN_Registrar_Categoria', formData)
            .success(function (res) {

                var Respuesta = (res);

                $scope.Categoria_Creada = " ";
                $scope.Categoria_Creada += formData.Nombre_Categoria;

                if (Respuesta == "La categoria a registrar ya se encuentra registrada")
                {
                    //_*mensaje de Alerta
                    $scope.Mensaje = "El nombre de la categoria ya se encuentra en uso, ingresa un nombre diferente";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                }


                if (Respuesta == 'true')
                {


                    //_* Limpio los inputs del formulario
                    //_*Datos cuenta
                    $scope.RC.Nombre_Categoria = '';
                    $scope.RC.Descripcion = '';



                    //_*limpio la variable que guarda el usuario registrado para el mensaje
                    $scope.Usuario_Creado = " ";


                    //_*mensaje de Alerta
                    $scope.Mensaje = "¡La categoria" + " " + $scope.Categoria_Creada + " " + "Ha sido creada correctamente! ";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje);
                    $scope.Listar_Categorias();




                }
                if (Respuesta == 'false')
                {
                    //_*mensaje de Alerta
                    $scope.Mensaje = "Registro fallido, intentalo nuevamente.";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                }





            })
            .error(function (res, status) {
                //_*mensaje de Alerta
                $scope.Mensaje = "Registro fallido, intentalo nuevamente.";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
            });


        };

        $scope.FN_Limpiar_Formulario = function(){
            //_* Limpio los inputs del formulario
            //_*Datos cuenta      
            $scope.RC.Nombre_Categoria = '';
            $scope.RC.Descripcion = '';




            //_*limpio la variable que guarda el usuario registra para el mensaje
            $scope.Usuario_Creado = " ";
        };



         //variable en la que guardo los datos debueltos por php por medio de json_encode
         $scope.AOBJ_Lista_Categorias_Registradas = [];

          /**
         * Modificar datos del usuario
         */
         $scope.FN_Modificar_Datos_Categoria = function(Posicion_Elemento){

            var obj = $scope.AOBJ_Lista_Categorias_Registradas[Posicion_Elemento];
            delete obj.$$hashKey;
            $http.post(url + 'Modulo/Modulo_Categoria/FN_Modificar_Datos', obj)
            .success(function (res){
             var Respuesta = (res); 
             if(Respuesta == 'true')
             {
                  $scope.Mensaje = "Los datos han sido actualizados";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
            }
            if(Respuesta == 'false')
             {
                  $scope.Mensaje = "No se modifico ningun dato de la categoria";
                Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
            }


        })
            .error(function (res, status) {
                alerta('error', null, res);
            });
        }



        /**
         //Listar datos de los usuario
         **/
         $scope.Listar_Categorias = function ()
         {

            $http.get(url + 'Modulo/Modulo_Categoria/FN_Consultar_Categoria')
            .success(function (res) {
                //variable en la que guardo los datos debueltos por php por medio de json_encode
                $scope.AOBJ_Lista_Categorias_Registradas = res;

            })
            .error(function (res, status) {
                alerta('error', null, res);
            });
        };


        $scope.FN_Eliminar_Categoria = function (Posicion_Elemento){
             var obj = $scope.AOBJ_Lista_Categorias_Registradas[Posicion_Elemento];
             delete obj.$$hashKey;
             $http.post(url + 'Modulo/Modulo_Categoria/FN_Eliminar_Categoria',obj)
             .success(function (res){

                 var respuesta = (res); 
                 if(respuesta == 'true'){
                     $scope.Mensaje = "La categoria se ha eliminado correctamente";
                     Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                      $scope.Listar_Categorias();
                 }else{
                     $scope.Mensaje = "Ha ocurrido un error al intentar eliminar la categoria";
                     Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                 }
             })
             .error(function (res, status) {
                alerta('error', null, res);
            });    

        }








        $scope.datoRegistro = Fabrica.objeto;
    }
    app.controller('Controlador_Registro_Categoria', Controlador_Registro_Categoria);

})();
