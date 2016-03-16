(function () {
    'use strict';

    //_*Controlador Registro
    function Controlador_Registro($scope, $http, Fabrica)

    {

        $scope.Fecha_Actual =  new Date() ;
        /**
         * Registro usuario
         */
         $scope.Registrar = function (formData) {

            $scope.RN.Imagen_Fondo = Fabrica.objeto.AOBJ_Datos_Usuario[0].Fondo_Perfil_Usuario;
            $scope.RN.Imagen_Usuario = Fabrica.objeto.AOBJ_Datos_Usuario[0].Imagen_Usuario;


            $http.post(url + 'Cliente/Registro/FN_Registrar_Usuario', formData)
            .success(function (res) {
                $scope.Usuario_Creado = " ";
                $scope.Usuario_Creado += formData.Nombre_Usuario;

                var Respuesta = res;
                if (Respuesta == "Usuario_Existente")
                {
                    //_*mensaje de Alerta
                    $scope.Mensaje = "Nombre de usuario en uso, Ingresa otro nombre";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                }
                if (Respuesta == "Correo_Existente")
                {
                    //_*mensaje de Alerta
                    $scope.Mensaje = "El correo ya se encuentra en uso";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
                }


                if (Respuesta == "true")
                {
                    //_*mensaje de Alerta
                    $scope.Mensaje = "¡La cuenta" + " " + $scope.Usuario_Creado + " " + "Ha sido creada correctamente! ";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);

                    //_* Limpio los inputs del formulario
                    //_*Datos cuenta      
                    $scope.RN.Nombre_Usuario = 'Usuario';
                    $scope.RN.Correo = '';
                    $scope.RN.Contrasenia = '';
                    //_*Datos cliente
                    $scope.RN.Nombre = '';
                    $scope.RN.Segundo_Nombre = '';
                    $scope.RN.Apellido = '';
                    $scope.RN.Segundo_Apellido = '';
                    $scope.RN.Municipio = '';
                    $scope.RN.Fecha_Nacimiento = '';
                    $scope.RN.Celular_Usuario = '';
                    $scope.RN.Genero = '';
                    //_*Establecimiento
                    $scope.RN.Nombre_Empresa = '';
                    $scope.RN.Direcion_Empresa = '';
                    $scope.RN.Telefono_Empresa = '';
                    $scope.RN.NIT = '';
                    $scope.RN.Nombre_Encargado = '';


                    //_*limpio la variable que guarda el usuario registra para el mensaje
                    $scope.Usuario_Creado = " ";




                }
                if (Respuesta == "false")
                {
                    $scope.Mensaje = "Registro fallido, intentalo nuevamente.";
                    Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);

                }



            })
            .error(function (res, status) {

                console.log(res, status);
            });

        };



        $scope.FN_No_Posee_Empresa = function (Tipo_Registro) {
            //_*Por defecto si se desea registrar un empleado, los datos de empresa se llenaran 
            //_*si se esta registrando un cliente y se indica que no tiene llena los datos de empresa por defaul
            //_*Establecimiento
            $scope.RN.Nombre_Empresa = "No posee";
            $scope.RN.Direcion_Empresa = "No posee";
            $scope.RN.Telefono_Empresa = "No posee";
            $scope.RN.NIT = "No posee";
            $scope.RN.Nombre_Encargado = "No posee";
            //_*por defecto visualizara el formulario
            $scope.BL_Datos_Usuario_Empresa = false;

        };


        $scope.FN_Si_Posee_Empresa = function () {
            //_* Limpio los inputs del formulario
            //_*Datos cuenta
            $scope.RN.Nombre_Usuario = 'Maik3345';
            $scope.RN.Correo = 'stiven3345@hotmail.com';
            $scope.RN.Contrasenia = '3345sra';
            //_*Datos cliente
            $scope.RN.Nombre = 'Maicol';
            $scope.RN.Segundo_Nombre = 'Stiven';
            $scope.RN.Apellido = 'Restrepo';
            $scope.RN.Segundo_Apellido = 'Alvarez';
            $scope.RN.Municipio = 'Bello';
            $scope.RN.Fecha_Nacimiento = '1996-18-10';
            $scope.RN.Celular_Usuario = '320741145';
            $scope.RN.Genero = 'Hombre';
            //_*Establecimiento
            $scope.RN.Nombre_Empresa = 'Delicias_Pas';
            $scope.RN.Direcion_Empresa = 'Carrera 60';
            $scope.RN.Telefono_Empresa = '2064478';
            $scope.RN.NIT = '20556';
            $scope.RN.Nombre_Encargado = 'Jeferson';
            //_*Variables para visualizar los contenedores
            $scope.BL_Datos_Usuario_Empresa = true;
            //_*Variable para identificar el tipo de registro en el controlador de php
            $scope.RN.Posee_Empresa = "si_poseeo_empresa";
        };

        $scope.FN_Limpiar_Formulario = function(){
            //_* Limpio los inputs del formulario
            //_*Datos cuenta      
            $scope.RN.Nombre_Usuario = 'Usuario';
            $scope.RN.Correo = '';
            $scope.RN.Contrasenia = '';
            //_*Datos cliente
            $scope.RN.Nombre = '';
            $scope.RN.Segundo_Nombre = '';
            $scope.RN.Apellido = '';
            $scope.RN.Segundo_Apellido = '';
            $scope.RN.Municipio = '';
            $scope.RN.Fecha_Nacimiento = '';
            $scope.RN.Celular_Usuario = '';
            $scope.RN.Genero = '';
            //_*Establecimiento
            $scope.RN.Nombre_Empresa = '';
            $scope.RN.Direcion_Empresa = '';
            $scope.RN.Telefono_Empresa = '';
            $scope.RN.NIT = '';
            $scope.RN.Nombre_Encargado = '';
            $scope.RN.Posee_Empresa = "no_poseeo_empresa";
            $scope.BL_Datos_Usuario_Empresa = false;



            //_*limpio la variable que guarda el usuario registra para el mensaje
            $scope.Usuario_Creado = " ";
        };

        $scope.datoRegistro = Fabrica.objeto;
    }
    app.controller('Controlador_Registro', Controlador_Registro);

})();
