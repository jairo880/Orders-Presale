(function () {
	'use strict';

	function Controlador_Consultar_Promociones($scope,$http, Fabrica)
	{
		$scope.AOBJ_Consultar_Promociones  = [];


		$scope.Consultar_Promociones = function ()
		{
			$http.get(url + 'Modulo/Modulo_Promociones/FN_Consultar_Promociones')
			.success(function(res) {
				$scope.AOBJ_Consultar_Promociones  = res;
			})
			.error(function (res, status) {
				alerta('error', null, res);
			});
		};


		$scope.FN_Eliminar_Promociones = function (Posicion_Elemento){
			var obj = $scope.AOBJ_Consultar_Promociones[Posicion_Elemento];
			delete obj.$$hashKey;
			$http.post(url + 'Modulo/Modulo_Promociones/FN_Eliminar_Promociones', obj)

			.success(function(res)
			{
				var respuesta = (res); 
				if(respuesta == 'true'){
					$scope.Mensaje = "Promocion eliminada correctamente";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
					$scope.Consultar_Promociones();
				}

				if(respuesta == 'false'){
					$scope.Mensaje = "Error al eliminar promocion";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
				}
				

			})

			
			
		}


		
		$scope.FN_Enviar_Promociones = function ()
		{
			$http.get(url + 'Modulo/Modulo_Promociones/FN_Enviar_Promociones')
			.success(function(res) {
				var Respuesta = (res);
				if (Respuesta == 'true') {
					$scope.Mensaje = "Promocion enviada exitosamente";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
				}
				else
				{
					$scope.Mensaje = "Ha ocurrido un error al intentar enviar la promocion";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
				}
			})
			.error(function (res, status) {
				alerta('error', null, res);
			});
			
		};

		$scope.FN_Modificar_Promociones = function(index){

			var objDatos = $scope.AOBJ_Consultar_Promociones[index];
			delete objDatos.$$hashKey;
			$http.post(url + 'Modulo/Modulo_Promociones/FN_Modificar_Promociones', objDatos)
			.success(function (res){
				var Respuesta = (res);

				if(Respuesta == 'true')
				{
					$scope.Mensaje = "Se actualizaron los datos correctamente";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
				}
				if(Respuesta == 'false')
				{
					$scope.Mensaje = "Ocurrió un error al actualizar los datos";
					Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
				}

			})

			.error(function(res, status){
				console.log(res,status);
				$scope.Mensaje = "No se pudo ejecutar la función Modificar Datos Promociones";
				Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);

			});
		};
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
			$scope.RP.Nombre_Promocion = '';
			$scope.RP.Descripcion_Promocion = '';
			$scope.RP.Fecha_Inicio = '';
			$scope.RP.Fecha_Fin = '';

		}

	}



	app.controller('Controlador_Consultar_Promociones', Controlador_Consultar_Promociones);

})();