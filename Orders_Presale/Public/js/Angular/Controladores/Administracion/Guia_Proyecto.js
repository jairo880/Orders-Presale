
(function () {
    'use strict';

//Controlador Registro
function Controlador_Guia_Proyecto($scope, $http, Fabrica,$rootScope)

{  
    $scope.CrearAlert = function(Tipo)
    {
        if(Tipo == 1)
        {
           $scope.Mensaje = "Prueba de alerta tipo Finalizado.";
           Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100,'Finalizado');
     }
       if(Tipo == 2)
        {
           $scope.Mensaje = "Prueba de alerta tipo Info.";
           Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100,'Info');
     }
       if(Tipo == 3)
        {
           $scope.Mensaje = "Prueba de alerta tipo Alerta.";
           Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100,'Alerta');
     }
       if(Tipo == 4)
        {
           $scope.Mensaje = "Prueba de alerta tipo Error.";
           Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100,'Error');
     }
       if(Tipo == 5)
        {
           $scope.Mensaje = "Prueba de alerta tipo Negro.";
           Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100,'Negro');
     }
       if(Tipo == 6)
        {
           $scope.Mensaje = "Prueba de alerta tipo Blanco.";
           Fabrica.objeto.FN_Crear_Mensaje($scope.Mensaje, 100,'Blanco');
     }
};


// variable para realizar un ng-repeat de ejemplo en la pagina guia
      $scope.Ejemplo_Array = [
      {
          NUM_ID_Mensaje: 0,
          TXT_Nombre_Usuario: 'Mateo',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    },
    {
          NUM_ID_Mensaje: 1,
          TXT_Nombre_Usuario: 'Jairo',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    },
    {
          NUM_ID_Mensaje: 2,
          TXT_Nombre_Usuario: 'Maik',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    },
    {
          NUM_ID_Mensaje: 3,
          TXT_Nombre_Usuario: 'Leider',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    },
    {
          NUM_ID_Mensaje: 4,
          TXT_Nombre_Usuario: 'Amy',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    },
    {
          NUM_ID_Mensaje: 5,
          TXT_Nombre_Usuario: 'Admin6',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    },
    {
          NUM_ID_Mensaje: 6,
          TXT_Nombre_Usuario: 'Admin7',
          TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
          DATE_Hora_Envio: new Date()
    }

    ];


$scope.dato = Fabrica.objeto;
}




app.controller('Controlador_Guia_Proyecto', Controlador_Guia_Proyecto);

})();
