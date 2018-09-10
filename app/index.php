<?php

    // General config
    require_once('config/config.php');
    require_once('helper/url_help.php');
    require_once('helper/error_handler.php');

    // Autoload (Metodo para cargar el contenido de 'app/lib')
    spl_autoload_register(function($class) {
        require_once('lib/' . $class . '.php');
    });