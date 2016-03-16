<?php


class Cuenta extends Controller {

    /**
     * METODO: Index
     * Este metodo se ejecuta cuando solicito la URL
     * NOTA: Esta es la página por defecto cuando no se encuentra la URL.
     */
    public function Index() {

        // Basicos para la web
        require APP . 'view/_Templates/header.php';
        //Contenido propio de la vista
        require APP . 'view/Cliente/Cuenta/index.php';
        //Modulos implementados  
        require APP . 'view/_Templates/Modulos/Modulo_Notificaciones.php';
        require APP . 'view/_Templates/Modulos/Modulo_Chat.php';
        require APP . 'view/_Templates/Modulos/Modulo_Pedido.php';
        require APP . 'view/_Templates/Modulos/Modulo_Login.php';
        require APP . 'view/_Templates/Modulos/Modulo_Barra_Navegacion.php';
        // Basicos para la web
        require APP . 'view/_Templates/footer.php';
    }

}
