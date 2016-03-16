<?php


class Error extends Controller {

     /**
     * METODO: Index
     * Este metodo se ejecuta cuando solicito la URL
     * NOTA: Esta es la página por defecto cuando no se encuentra la URL.
     */
    public function Index() {
        // Carga las vistas
        require APP . 'view/Error/index.php';
    }

}
