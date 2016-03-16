<?php


class Inicio_Administracion extends Controller {
     /**
     * METODO: Index
     * Este metodo se ejecuta cuando solicito la URL
     * NOTA: Esta es la página por defecto cuando no se encuentra la URL.
     */
     private $_Mdl_RegistroUsuario = null;

     public function __construct() {
        $this->_Mdl_RegistroUsuario = $this->loadModel("M_Administracion");
    }

    public function Index() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Inicio/index.php';
        //Modulos implementados  
        require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }



    public function Registrar_Nuevo_Usuario() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Registrar_Usuario_Nuevo/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }

    public function Consultar_Usuarios() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Consultar_Usuarios/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }
    
    public function Modulo_Producto() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Modulo_Producto/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }

    public function Modulo_Categoria() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Modulo_Categoria/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }




    public function Modulo_Promociones() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Modulo_Promociones/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }


    public function Modulo_Gestion_De_Contenido() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Modulo_Gestion_De_Contenido/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }

     public function Modulo_Permisos_Usuario() {
        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Administracion/Modulo_Permisos_Usuario/index.php';
        //Modulos implementados  
        // require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        // require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }

  



    
}
