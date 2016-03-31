(function () {
	'use strict';

	function Controlador_Ejemplo_Crud($scope,$http, Fabrica)
	{
		

		//Ejemplo registro 
		$scope.FN_Registrar_Ejemplo = function (formData){
			$http.post(url + 'Modulo/Modulo_Ejemplo_Crud/FN_Registrar_Ejemplo', formData)
			.success(function (res)
			{
				var respuesta = (res); 


				if(respuesta == 'true'){

					$scope.Mensaje = "Registro correcto";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
					$scope.FN_Listar_Ejemplo();


					$scope.Ejemplo.Nombre_Usuario_Ejemplo = ''; 
					$scope.Ejemplo.Contrasenia_Ejemplo = '';
				}
				if(respuesta == 'false'){
					$scope.Mensaje = "Error al registrar";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
				}


			})
			.error(function(res, status){
				console.log(res,status);
				

			});
		};
		//Ejemplo Listar 

		$scope.AOBJ_Lista_Ejemplo  = [];


		$scope.FN_Listar_Ejemplo = function ()
		{
			$http.get(url + 'Modulo/Modulo_Ejemplo_Crud/FN_Listar_Ejemplo')
			.success(function(res) {
				$scope.AOBJ_Lista_Ejemplo  = res;
			})
			.error(function (res, status) {
				console.log(res,status);
				
			});
		};

		//Ejemplo Eliminar 

		$scope.FN_Eliminar_Ejemplo = function (Posicion_Elemento){
			var obj = $scope.AOBJ_Lista_Ejemplo[Posicion_Elemento];
			delete obj.$$hashKey;
			$http.post(url + 'Modulo/Modulo_Ejemplo_Crud/FN_Eliminar_Ejemplo', obj)

			.success(function(res)
			{
				var respuesta = (res); 
				if(respuesta == 'true'){
					$scope.Mensaje = "Registro eliminado";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
					$scope.FN_Listar_Ejemplo();
				}

				if(respuesta == 'false'){
					$scope.Mensaje = "Error al eliminar el registro";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Error');
				}
			})
			.error(function (res, status) {
				console.log(res,status);
				
			});
		};
		//Ejemplo Modificar
		$scope.FN_Modificar_Ejemplo = function(Posicion_Elemento){

			var objDatos = $scope.AOBJ_Lista_Ejemplo[Posicion_Elemento];
			delete objDatos.$$hashKey;
			$http.post(url + 'Modulo/Modulo_Ejemplo_Crud/FN_Modificar_Ejemplo', objDatos)
			.success(function (res){
				var Respuesta = (res);

				if(Respuesta == 'true')
				{
					$scope.Mensaje = "Se actualizaron los datos correctamente";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Finalizado');
					$scope.FN_Listar_Ejemplo();

				}
				if(Respuesta == 'false')
				{
					$scope.Mensaje = "Los datos se encuentran actualizados";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100, 'Info');
				}

			})

			.error(function(res, status){
				console.log(res,status);
				

			});
		};


	}



	app.controller('Controlador_Ejemplo_Crud', Controlador_Ejemplo_Crud);

})();