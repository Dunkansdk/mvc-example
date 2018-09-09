<?php

    /**
     * MANEJO DE RUTAS (GENERICO):
     *  __FILE__                    /opt/lampp/htdocs/mvc-example/app/config/config.php
     *  dirname(__FILE__)           /opt/lampp/htdocs/mvc-example/app/config
     *  dirname(dirname(__FILE__))  /opt/lampp/htdocs/mvc-example/app
     */     
    
    // Donde se instancie 'APP_PATH' es la ruta que va a mostrar
    define('APP_PATH', dirname(dirname(__FILE__)));
    define('APP_NAME', 'Gestion Bonkan');
    define('URL_PATH', '_URL_');
