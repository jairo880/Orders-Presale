



app.factory('Fabrica', function ($timeout) {
    var servicio =
    {
        objeto:
        {
                             //variable para guardar los datos del usuario actual
                            AOBJ_Datos_Usuario: [],
                            //variable para guardar los prodcutos que el usuario agregue en la orden
                            AOBJ_Productos: [],
                            //variable en la que se guardan los productos consultados a la base de datos
                            AOBJ_Productos_Principal:[],
                            AOBJ_Comentarios_Producto:[],
                            NUM_Cantidad_Productos_En_Orden: 0,
                            NUM_Precio_Total_Orden: 0,
                            NUM_CantidadMensajeUsuario: 0,
                            NUM_CantidadNotificaciones: 0,
                            //variable para guardar las imagenes de la base de datos
                            AOBJ_Imagenes_Perfil_Usuario_Avatars:[],
                            //variable para guardar las imagenes de la base de datos
                            AOBJ_Imagenes_Usuario_Fondo_Perfil:[],
                            
                            AOBJ_Mensajes_Lista:
                            [
                            {
                                NUM_ID_Mensaje: 0,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar4_big.png',
                                TXT_Nombre_Usuario: 'Mateo',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            },
                            {
                                NUM_ID_Mensaje: 1,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar7_big.png',
                                TXT_Nombre_Usuario: 'Jairo',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            },
                            {
                                NUM_ID_Mensaje: 2,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar13_big.png',
                                TXT_Nombre_Usuario: 'Maik',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            },
                            {
                                NUM_ID_Mensaje: 3,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar10_big.png',
                                TXT_Nombre_Usuario: 'Leider',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            },
                            {
                                NUM_ID_Mensaje: 4,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar1_big.png',
                                TXT_Nombre_Usuario: 'Amy',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            },
                            {
                                NUM_ID_Mensaje: 5,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar9_big.png',
                                TXT_Nombre_Usuario: 'Admin6',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            },
                            {
                                NUM_ID_Mensaje: 6,
                                URL_Imagen_Usuario_Mensaje: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar4_big.png',
                                TXT_Nombre_Usuario: 'Admin7',
                                TXT_Mensaje: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
                                DATE_Hora_Envio: new Date()
                            }

                            ],
                            AOBJ_Estado_Notificaciones:
                            [
                            {
                                NUM_ID_Notificacion: '#3540',
                                TXT_Nombre: 'Atendida',
                                BL_Estado: 1,
                                DATE_Hora: new Date()

                            },
                            {
                                NUM_ID_Notificacion: '#23423',
                                TXT_Nombre: 'Atendida',
                                BL_Estado: 1,
                                DATE_Hora: new Date()

                            },
                            {
                                NUM_ID_Notificacion: '#234236',
                                TXT_Nombre: 'Atendida',
                                BL_Estado: 1,
                                DATE_Hora: new Date()

                            },
                            {
                                NUM_ID_Notificacion: '#6432',
                                TXT_Nombre: 'Atendida',
                                BL_Estado: 1,
                                DATE_Hora: new Date()

                            },
                            {
                                NUM_ID_Notificacion: '#3523',
                                TXT_Nombre: 'Cancelado',
                                BL_Estado: 2,
                                DATE_Hora: new Date()
                            },
                            {
                                NUM_ID_Notificacion: '#3223',
                                TXT_Nombre: 'Cancelado',
                                BL_Estado: 2,
                                DATE_Hora: new Date()
                            },
                            {
                                NUM_ID_Notificacion: '#35345',
                                TXT_Nombre: 'En curso',
                                BL_Estado: 3,
                                DATE_Hora: new Date()
                            },
                            {
                                NUM_ID_Notificacion: '#235',
                                TXT_Nombre: 'En curso',
                                BL_Estado: 3,
                                DATE_Hora: new Date()
                            },
                            {
                                NUM_ID_Notificacion: '#25223',
                                TXT_Nombre: 'En curso',
                                BL_Estado: 3,
                                DATE_Hora: new Date()
                            },
                            {
                                NUM_ID_Notificacion: '#234',
                                TXT_Nombre: 'En curso',
                                BL_Estado: 3,
                                DATE_Hora: new Date()
                            }


                            ],
                            AOBJ_Administradores_Usuario:
                            [
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar12_big.png',
                                TXT_Nombre_Usuario: 'Derkiller',
                                DATE_Tiempo_Activo: new Date()
                            },
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar7_big.png',
                                TXT_Nombre_Usuario: 'jairo8080',
                                DATE_Tiempo_Activo: new Date()
                            },
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar11_big.png',
                                TXT_Nombre_Usuario: 'Mikes',
                                DATE_Tiempo_Activo: new Date()
                            }
                            ],
                            AOBJ_Mensajes:
                            [
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar1_big.png',
                                TXT_Mensaje: 'mensaje remitente1',
                                DATE_Fecha_Mensaje: new Date(),
                                BL_Tipo: true


                            },
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar11_big.png',
                                TXT_Mensaje: 'mensaje destinatario1',
                                DATE_Fecha_Mensaje: new Date(),
                                BL_Tipo: false
                            },
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar1_big.png',
                                TXT_Mensaje: 'mensaje remitente2',
                                DATE_Fecha_Mensaje: new Date(),
                                BL_Tipo: true
                            },
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar11_big.png',
                                TXT_Mensaje: 'mensaje destinatario2',
                                DATE_Fecha_Mensaje: new Date(),
                                BL_Tipo: false
                            }


                            ],
                            AOBJ_Nueva_Conversacion_Chat:
                            [
                            {
                                URL_Imagen_Usuario: 'https://dl.dropboxusercontent.com/u/232442887/Allop/img/avatars/avatar1_big.png',
                                TXT_Mensaje: 'Hola!!, envianos tus dudas y te responderemos lo mas pronto posible',
                                DATE_Fecha_Mensaje: new Date(),
                                BL_Tipo: false
                            }
                            ],
                            FN_Enviar_Mensaje: function (Imagen, Mensaje, Fecha, Tipo)
                            {

                                servicio.objeto.AOBJ_Mensajes.push({
                                    URL_Imagen_Usuario: Imagen,
                                    TXT_Mensaje: Mensaje,
                                    DATE_Fecha_Mensaje: Fecha,
                                    BL_Tipo: Tipo
                                });
                            },
                            FN_Iniciar_Conversacion_Nuevo_Mensaje: function (Imagen, Mensaje, Fecha, Tipo)
                            {

                                servicio.objeto.AOBJ_Nueva_Conversacion_Chat.push({
                                    URL_Imagen_Usuario: Imagen,
                                    TXT_Mensaje: Mensaje,
                                    DATE_Fecha_Mensaje: Fecha,
                                    BL_Tipo: Tipo
                                });
                            },
                            FN_Agregar_Productos: function (id_ing)//Para agregar un producto primero se recorre el AOBJ_Productos_Principal 
                            // con la pregunta de que si el id_ing concuerda con alguno de la lista, si concuerda pasa a la pregunta, aun no se ha 
                            //agregado,, si no se ha agregado pasa a crear una nueva posicion en AOBJ_Productos y a cambiar el estado del producto
                            // en la lista AOBJ_Productos_Principal a agregado, BL_Estado_Producto indica si el producto se encuentra agregado o no.
                            {
                                for (var i = 0; i < servicio.objeto.AOBJ_Productos_Principal.length; i++) {
                                    if (servicio.objeto.AOBJ_Productos_Principal[i].PK_ID_Producto == id_ing)
                                    {




                                        if (servicio.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto == false)
                                        {


                                            servicio.objeto.AOBJ_Productos_Principal[i].TXT_Texto_Btn = 'Remover';
                                            servicio.objeto.AOBJ_Productos.push({
                                                PK_ID_Producto: servicio.objeto.AOBJ_Productos_Principal[i].PK_ID_Producto,
                                                Nombre_Producto: servicio.objeto.AOBJ_Productos_Principal[i].Nombre_Producto,
                                                Valor_Unitario: servicio.objeto.AOBJ_Productos_Principal[i].Valor_Unitario,
                                                NUM_Cantidad: servicio.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad,
                                                NUM_Costo: servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto,
                                                Ruta_Imagen_Producto: servicio.objeto.AOBJ_Productos_Principal[i].Ruta_Imagen_Producto,
                                                Cant_Unid_Max: servicio.objeto.AOBJ_Productos_Principal[i].Cant_Unid_Max,
                                                Cant_Unid_Min: servicio.objeto.AOBJ_Productos_Principal[i].Cant_Unid_Min


                                            });
                                            servicio.objeto.NUM_Cantidad_Productos_En_Orden += 1;
                                            servicio.objeto.AOBJ_Mensaje_Alerta[0].TXT_Mensaje = 'Has añadido' + ' ' + servicio.objeto.NUM_Cantidad_Productos_En_Orden + ' ' + ' producto';
                                            $timeout(servicio.objeto.FN_Mensaje_Alerta, 200);
                                            servicio.objeto.FN_Calcular_Total();
                                            servicio.objeto.FN_Actualizar_Datos(1, servicio.objeto.AOBJ_Productos_Principal[i].PK_ID_Producto);



                                        }
                                        if (servicio.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto == true)
                                        {

                                            servicio.objeto.FN_Eliminar_Producto(servicio.objeto.AOBJ_Productos_Principal[i].PK_ID_Producto);

                                        }



                                    }
                                }
                            },
                            FN_EMPAREJAR_INFO: function ()//Esta funcion lo que hace es que al volver a listar los productos, verifica si ya algun producto
                            // se encuentra agregado en la orden, esto lo hago mediante el id, si se encunentra agregado el producto en la orden, toma los valores
                            //que posee el producto de la orden y se los aplica al producto que se muestra en la lista
                            {
                                for (var i = 0; i < servicio.objeto.AOBJ_Productos_Principal.length; i++) {
                                    for (var k = 0; k < servicio.objeto.AOBJ_Productos.length; k++) {
                                        if (servicio.objeto.AOBJ_Productos_Principal[i].PK_ID_Producto == servicio.objeto.AOBJ_Productos[k].PK_ID_Producto)
                                        {
                                            servicio.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad= servicio.objeto.AOBJ_Productos[k].NUM_Cantidad;
                                            servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto=servicio.objeto.AOBJ_Productos[k].NUM_Total_Producto;
                                            servicio.objeto.AOBJ_Productos_Principal[i].TXT_Texto_Btn  = 'Remover';
                                            servicio.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto  = false;
                                            servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto = servicio.objeto.AOBJ_Productos[k].NUM_Costo;
                                        // alert("Producto encontrado en la orden");

                                    }
                                    else
                                    {
                                        // alert("No se encontraron productos ");
                                    }

                                }                                   
                            }
                        },
                        FN_Eliminar_Producto: function (id_ing)
                        {
                            //Para eliminar un producto se recorre AOBJ_Productos con la pregunta, hay algun producto que concuerde 
                            //con id_ing, si se encuntra se elimina de AOBJ_Productos y luego recorro AOBJ_Productos_Principal 
                            //con la pregunta hay algun producto que concuerde con el id_ing, si es asi, paso a cambiar los valores que 
                            //se le asigna a un producto agregado , muestro mensaje de que se elimino el producto, mermo el contrador de productos de la orden
                            //llamo a la funcion FN_Actualizar_Datos
                            for (var i = 0; i < servicio.objeto.AOBJ_Productos.length; i++) {
                                if (servicio.objeto.AOBJ_Productos[i].PK_ID_Producto == id_ing)
                                {
                                    servicio.objeto.AOBJ_Productos.splice(i, 1);
                                    for (var j = 0; j < servicio.objeto.AOBJ_Productos_Principal.length; j++) {
                                        if (servicio.objeto.AOBJ_Productos_Principal[j].PK_ID_Producto == id_ing)
                                        {

                                            servicio.objeto.AOBJ_Productos_Principal[j].TXT_Texto_Btn = 'Añadir a orden';
                                            servicio.objeto.AOBJ_Productos_Principal[j].BL_Estado_Producto = true;
                                            servicio.objeto.AOBJ_Productos_Principal[j].NUM_Cantidad = 0;
                                            servicio.objeto.AOBJ_Productos_Principal[j].NUM_Total_Producto = 0;
                                            servicio.objeto.NUM_Cantidad_Productos_En_Orden -= 1;
                                            servicio.objeto.AOBJ_Mensaje_Alerta[0].TXT_Mensaje = 'Producto eliminado';
                                            $timeout(servicio.objeto.FN_Mensaje_Alerta, 200);
                                            for (var L = 0; L < servicio.objeto.AOBJ_Productos_Principal.length; L++) {
                                                if (servicio.objeto.AOBJ_Productos_Principal[L].PK_ID_Producto == id_ing)
                                                {
                                                    servicio.objeto.FN_Actualizar_Datos(1, servicio.objeto.AOBJ_Productos_Principal[L].PK_ID_Producto);
                                                }
                                            }
                                        }
                                    }


                                }
                            }


                        },
                        FN_Actualizar_Datos: function (TipoActualizar, id_ing)
                        //FN_Actualizar_Datos funciona deacuerdo al parametro que se ingresa TipoActualizar, 
                        // si se ingresa 1: estoy modificando informacion desde la lista de productos principal
                        // si se ingresa 2_ estoy modifcando informacion desde la lista de la orden de productos
                        // luego de identificar el tipo de actuualizar que se solicita paso a recorrer 
                        // AOBJ_Productos_Principal en busca de algun id que concuerde con el que se ingreso 
                        // luego paso a la pregunta el producto el producto ya se encuentra agregado en la orden, si no es asi
                        // tansolo actualizo la informacion del producto de la lista principal
                        // si se encuntra agregado, recorro AOBJ_Productos con la pregunta hay algun producto que conqcuerde con el id ingresado
                        // si concuerda igualo los valores como cantidad, y costo, por ultimo ejectuo calcular_Total
                        // en caso de que sea TipoActualizar paso ac actualizar tanto informacion del producto en la orden como producto en la lista principal
                        {

                            if (TipoActualizar == 1)
                            {

                                for (var i = 0; i < servicio.objeto.AOBJ_Productos_Principal.length; i++)
                                {
                                    if (servicio.objeto.AOBJ_Productos_Principal[i].PK_ID_Producto == id_ing)
                                    {
                                        if (servicio.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto === true)
                                        {
                                            servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto = servicio.objeto.AOBJ_Productos_Principal[i].Valor_Unitario * servicio.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad;
                                            servicio.objeto.FN_Calcular_Total();
                                        }
                                        if (servicio.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto === false)
                                        {

                                            for (var j = 0; j < servicio.objeto.AOBJ_Productos.length; j++)
                                            {
                                                if (servicio.objeto.AOBJ_Productos[j].PK_ID_Producto == id_ing)
                                                {
                                                    servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto = servicio.objeto.AOBJ_Productos_Principal[i].Valor_Unitario * servicio.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad;
                                                    servicio.objeto.AOBJ_Productos[j].NUM_Cantidad = servicio.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad;
                                                    servicio.objeto.AOBJ_Productos[j].NUM_Costo = servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto;


                                                    servicio.objeto.FN_Calcular_Total();
                                                }
                                            }
                                        }
                                    }
                                }

                            }



                            else if (TipoActualizar == 2) {
                                for (var i = 0; i < servicio.objeto.AOBJ_Productos.length; i++) {
                                    if (servicio.objeto.AOBJ_Productos[i].PK_ID_Producto == id_ing)
                                    {

                                        for (var j = 0; j < servicio.objeto.AOBJ_Productos_Principal.length; j++) {
                                            if (servicio.objeto.AOBJ_Productos_Principal[j].PK_ID_Producto == id_ing)
                                            {

                                                servicio.objeto.AOBJ_Productos_Principal[j].NUM_Cantidad = servicio.objeto.AOBJ_Productos[i].NUM_Cantidad;
                                                servicio.objeto.AOBJ_Productos_Principal[j].NUM_Total_Producto = servicio.objeto.AOBJ_Productos_Principal[j].Valor_Unitario * servicio.objeto.AOBJ_Productos_Principal[j].NUM_Cantidad;
                                                servicio.objeto.AOBJ_Productos[i].NUM_Costo = servicio.objeto.AOBJ_Productos_Principal[j].NUM_Total_Producto;
                                                servicio.objeto.FN_Calcular_Total();


                                            }
                                        }
                                    }
                                }
                            }
                        },
                        FN_Calcular_Total: function ()
                        {
                            //para calcular el total de la orden, primero reinicio el contador del total
                            // como el total se muestra es en la orden recorro AOBJ_Productos calculando en cada iteracion el total 
                            servicio.objeto.NUM_Precio_Total_Orden = 0;
                            for (var k = 0; k < servicio.objeto.AOBJ_Productos.length; k++)
                            {


                                servicio.objeto.NUM_Precio_Total_Orden += servicio.objeto.AOBJ_Productos[k].NUM_Costo;



                            }
                        },
                        FN_Confirmacion_Alerta: function ()
                        {
                            //Para eliminar todo en la orden hago uso de la proiedad splice a la cual le digo que borre todo deacuerdo a la cantidad
                            // de campos que posea AOBJ_Productos,  reinicio el contador de productos agerregados en la orden
                            // y luego reinicio todos los valores qde la orden princiapl a su estado inicial

                            servicio.objeto.AOBJ_Productos.splice(0, servicio.objeto.AOBJ_Productos.length);
                            servicio.objeto.NUM_Precio_Total_Orden = 0;
                            servicio.objeto.AOBJ_Mensaje_Alerta[0].TXT_Mensaje = 'Se han removido los productos de la orden ';
                            $timeout(servicio.objeto.FN_Mensaje_Alerta, 200);

                            for (var i = 0; i < servicio.objeto.AOBJ_Productos_Principal.length; i++) {

                                servicio.objeto.AOBJ_Productos_Principal[i].TXT_Texto_Btn = 'Añadir a orden';
                                servicio.objeto.AOBJ_Productos_Principal[i].BL_Estado_Producto = true;
                                servicio.objeto.AOBJ_Productos_Principal[i].NUM_Cantidad = 0;
                                servicio.objeto.AOBJ_Productos_Principal[i].NUM_Total_Producto = 0;
                                servicio.objeto.NUM_Cantidad_Productos_En_Orden = 0;
                            }


                        },
                        FN_Eliminar_Mensaje_Recibido: function (PosicionMensaje)
                        {

                            servicio.objeto.AOBJ_Mensajes_Lista.splice(PosicionMensaje, 1);


                        },
                        FN_Eliminar_Notificacion: function (PosicionNotificacion)
                        {

                            servicio.objeto.AOBJ_Estado_Notificaciones.splice(PosicionNotificacion, 1);


                        },
                        AOBJ_Mensaje_Alerta: [
                        {
                            TXT_Mensaje: ''
                        },
                        {
                            TXT_Mensaje: ''
                        },
                        {
                            TXT_Mensaje: ''
                        }
                        ],
                        EstadoMensaje: false,
                        FN_Crear_Mensaje: function (Mensaje, Tiempo)
                        {

                            servicio.objeto.AOBJ_Mensaje_Alerta[0].TXT_Mensaje = Mensaje;
                            $timeout(servicio.objeto.FN_Mensaje_Alerta, Tiempo);
                        },
                        FN_Mensaje_Alerta: function () {
                            servicio.objeto.EstadoMensaje = !servicio.objeto.EstadoMensaje;

                            $timeout(servicio.objeto.FN_Cerrar_Mensaje, 3000);

                        },
                        FN_Cerrar_Mensaje: function () {
                            servicio.objeto.EstadoMensaje = false;
                            for (var i = 0; i < servicio.objeto.AOBJ_Mensaje_Alerta.length; i++) {
                                servicio.objeto.AOBJ_Mensaje_Alerta[i].TXT_Mensaje = '';
                            }



                        },
                        FN_Moificar_Imagenen_Usuario: function (Tipo_Cambio, PosicionImagen)
                        {
                            if (Tipo_Cambio == 1)
                            {

                                for (var i = 0; i < servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars.length; i++) {

                                    if (servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[i].BL_Estado == true)
                                    {
                                        servicio.objeto.AOBJ_Datos_Usuario[0].Imagen_Usuario = servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[i].URL_Imagen_Usuario;

                                        for (var k = 0; k < servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars.length; k++) {
                                            servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[k].BL_Estado = false;
                                        }
                                    }
                                }
                            }
                            if (Tipo_Cambio == 2)
                            {
                                for (var l = 0; l < servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil.length; l++) {
                                    if (servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[l].BL_Estado == true)
                                    {
                                        servicio.objeto.AOBJ_Datos_Usuario[0].Fondo_Perfil_Usuario = servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[l].URL_Imagen_Portada;

                                        for (var k = 0; k < servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil.length; k++) {
                                            servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[k].BL_Estado = false;

                                        }
                                    }
                                }


                            }

                            if (Tipo_Cambio == 3)
                            {

                                for (var k = 0; k < servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil.length; k++) {
                                    servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[k].BL_Estado = false;
                                    servicio.objeto.AOBJ_Imagenes_Usuario_Fondo_Perfil[PosicionImagen].BL_Estado = true

                                }



                            }
                            if (Tipo_Cambio == 4)
                            {


                                for (var k = 0; k < servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars.length; k++) {
                                    servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[k].BL_Estado = false;
                                    servicio.objeto.AOBJ_Imagenes_Perfil_Usuario_Avatars[PosicionImagen].BL_Estado = true

                                }


                            }

                        }
                    }
                };
                return servicio;
            });
