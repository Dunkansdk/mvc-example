<?php

    /**
     * Redireccionamos a la pagina ingresada por parametro
     */
    function redirect($page)
    {
        header('location: ' . URL_PATH . '/' . $page);
    }
    
?>