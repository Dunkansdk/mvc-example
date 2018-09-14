<?php

    /**
     * Redireccionamos a la pagina ingresada por parametro
     * 
     * $page controladora destino
     */
    function redirect($page)
    {
        header('location: ' . URL_PATH . $page);
    }
    
?>