<?php

    // General config
    require_once('config/config.php');

    // Helpers
    require_once('helper/url_helper.php');
    require_once('helper/log_helper.php');
    
    // Autoload (Metodo para cargar el contenido de 'app/lib')
    spl_autoload_register(function($class) {
        require_once('lib/' . $class . '.php');
    });

    // Seteamos el reporte de errores propio
    error_reporting(E_ALL);
    set_error_handler('error_handler');
    set_exception_handler('exception_handler');
