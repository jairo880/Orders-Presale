(function () {
  'use strict';


  function Controlador_Registro_Producto($scope, $http, Fabrica)

  {    
    $scope.FN_Ver_Promociones =  function ()
    {
      $scope.BL_Promociones_Producto = true;
    };
    $scope.Registrar_Producto = function (formData){
      $http.post(url + 'Modulo/Modulo_Producto/FN_Registar_producto', formData)
      .success(function (res)
      {
       var respuesta = (res); 

       if(respuesta == "El producto ya existe" ){
        $scope.Mensaje = "Ya existe un producto con este nombre";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
      }

      if(respuesta == 'true'){



        $scope.RP.Nombre_Producto = '';
        $scope.RP.Precio_Producto = '';
        $scope.RP.Descripcion_Producto = '';
        $scope.RP.Cantidad_Maxima = '';
        $scope.RP.Cantidad_Minima = '';
        $scope.RP.Categoria = '';
        $scope.RP.Imagen = '';
        $scope.RP.Promocion ='';

        $scope.Mensaje = "Producto registrado correctamente";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
      }
      if(respuesta == 'false'){
       $scope.Mensaje = "Error al registrar";
       Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
     }


   })
      .error(function (res, status) {
        console.log('error', null, res);
      });
    };
    //Variables para guardar los id necesarios para posteriormente realizar un registro en dtll_promocion_producto
    $scope.PK_ID_Producto = 0;
    $scope.FK_ID_Promocion = 0;
     //Variable usada para capturar la posicion del producto seleccionado para ver las promociones
     $scope.Posicion_Producto = 0;
     $scope.FN_Registrar_Dll_Producto_Promocion = function (Posicion_Promocion_Producto){


      $scope.FK_ID_Promocion = $scope.AOBJ_Lista_Promociones[Posicion_Promocion_Producto].PK_ID_Promocion;

      //de esta forma pueo crear un objeto el cual luego puedo mandar para php
      $scope.Datos = 
      {
        PK_ID_Producto:$scope.PK_ID_Producto,
        FK_ID_Promocion:$scope.FK_ID_Promocion
      };
      

      $http.post(url + 'Modulo/Modulo_Producto/FN_Registrar_Dll_Producto_Promocion', $scope.Datos)
      .success(function (res)
      {
       var respuesta = (res); 


       if(respuesta == 'true'){

        $scope.Mensaje = "Promocion asociada al producto correctamente";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
        $scope.FN_Listar_Promocion_Producto($scope.Posicion_Producto);

      }
      if(respuesta == 'false'){
       $scope.Mensaje = "No se puedo asociar la promoción, verificque si el producto ya posee asociada la promoción seleccionada ";
       Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
     }


   })
      .error(function (res, status) {
        console.log('error', null, res);
      });
    };


    $scope.FN_Eliminar_Dll_Promocion_Producto = function (Posicion_Promocion){


      var obj_Datos = $scope.AOBJ_Lista_Promociones_Producto[Posicion_Promocion];

      

      $http.post(url + 'Modulo/Modulo_Producto/FN_Eliminar_Dll_Promocion_Producto', obj_Datos)
      .success(function (res)
      {
       var respuesta = (res); 


       if(respuesta == 'true'){

        $scope.Mensaje = "Promoción removida";
        Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
        $scope.FN_Listar_Promocion_Producto($scope.Posicion_Producto);

      }
      if(respuesta == 'false'){
       $scope.Mensaje = "No se puedo remover la promoción ";
       Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
     }


   })
      .error(function (res, status) {
        console.log('error', null, res);
      });
    };

    




        //variable en la que guardo los datos debueltos por php por medio de json_encode
        $scope.AOBJ_Lista_Categoria = [];

        /**
         //Listar datos de la categoria
         **/
         $scope.FN_Listar_Categoria = function ()
         {

          $http.get(url + 'Modulo/Modulo_Producto/FN_Listar_Categoria')
          .success(function (res) {
                //variable en la que guardo los datos debueltos por php por medio de json_encode
                $scope.AOBJ_Lista_Categoria = res;

              })
          .error(function (res, status) {
            console.log('error', null, res);
          });
        };


        //variable en la que guardo los datos debueltos por php por medio de json_encode
        $scope.AOBJ_Lista_Promociones = [];

        /**
         //Listar datos DE TODAS LAS PROMOCIONES
         **/
         $scope.FN_Listar_Promocion = function ()
         {

          $http.get(url + 'Modulo/Modulo_Producto/FN_Listar_Promocion')
          .success(function (res) {
                //variable en la que guardo los datos debueltos por php por medio de json_encode
                $scope.AOBJ_Lista_Promociones = res;

              })
          .error(function (res, status) {
            console.log('error', status, res);
          });
        };

        /**
        //LISTAR DATOS DE LAS PROMOCIONES QUE POSEE UN PRODUCTO
        **/
        $scope.BL_Promociones_Producto = false;
        $scope.AOBJ_Lista_Promociones_Producto = [];
        

        $scope.FN_Listar_Promocion_Producto = function (Posicion_Producto)
        {

          $scope.FN_Listar_Promocion();
          $scope.Posicion_Producto = Posicion_Producto;

          var obj_Datos = $scope.AOBJ_Listar_Productos[Posicion_Producto];

          $http.post(url + 'Modulo/Modulo_Producto/FN_Listar_Promocion_Producto', obj_Datos)


          .success(function(res){

            $scope.AOBJ_Lista_Promociones_Producto = res;
            //Capturo el id del producto que fue seleccionado para ver las promociones
            $scope.PK_ID_Producto = $scope.AOBJ_Listar_Productos[Posicion_Producto].PK_ID_Producto;

          })

          .error(function(res, status){
            console.log('error', status, res);
          });

        };

        $scope.FN_Limpiar_Formulario = function()
        {
          $scope.RP.Nombre_Producto = '';
          $scope.RP.Precio_Producto = '';
          $scope.RP.Descripcion_Producto = '';
          $scope.RP.Cantidad_Maxima = '';
          $scope.RP.Cantidad_Minima = '';
          $scope.RP.Categoria = '';
          $scope.RP.Imagen = '';
        };

        /*Función para listar todos los productos registradoes en la base de datos*/
        $scope.FN_Listar_Productos = function(){
          $http.post(url + 'Modulo/Modulo_Producto/FN_Listar_Productos')
          .success(function(res){
            $scope.AOBJ_Listar_Productos = res; 

            Fabrica.objeto.AOBJ_Productos_Principal = res;

            // Fabrica.objeto.AOBJ_Productos_Principal.push({
            //   TXT_Texto_Btn: 'Añadir Producto'
            // });
            for (var i = 0; i <  Fabrica.objeto.AOBJ_Productos_Principal.length; i++) {
              Fabrica.objeto.AOBJ_Productos_Principal[i].TXT_Texto_Btn = "Añadir Producto";  
              Fabrica.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto = true;  
              Fabrica.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto = 0;  
              Fabrica.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad = 0;  
              Fabrica.objeto.AOBJ_Productos_Principal[i].NUM_Costo = 0;
              Fabrica.objeto.FN_EMPAREJAR_INFO();
              




            }        
            //  $scope.TXT_Texto_Btn = "Añadir Producto";
            // for (var i = 0; i < Fabrica.objeto.AOBJ_Productos_Principal.length; i++) {
            //    Fabrica.objeto.AOBJ_Productos_Principal += $scope.TXT_Texto_Btn;

            //    }


          })

          .error(function(){
            console.log("La función Consultar Productos no se pudo ejecutar");

          })
        };

        /*Función para modificar productos*/
        $scope.FN_Modificar_Productos = function(index){

          var obj_Datos = $scope.AOBJ_Listar_Productos[index];
          delete obj_Datos.$$hashKey;

          $http.post(url + 'Modulo/Modulo_Producto/FN_Modificar_Productos', obj_Datos)


          .success(function(res){

            var tipo = (res);

            if (tipo == 'true'){
              $scope.Mensaje="Los datos del producto se han actualizdo satisfactoriamente";
              Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
            }if(tipo == 'false'){
             $scope.Mensaje="Debe llenar todos los campos";
             Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
           }
           if(tipo == 'Ya_Esta_Actualizado')
           {
             $scope.Mensaje="Los datos se encuentran actualizados";
             Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100);
           }

         })

          .error(function(){
            console.log("No ejecutó la funcion");
          });
        };









        $scope.datoRegistro = Fabrica.objeto;
      }
      app.controller('Controlador_Registro_Producto', Controlador_Registro_Producto);

    })();