<?php

    // General config
    require_once('config/config.php');

    // Core app
    //require_once('lib/Database.php');
    //require_once('lib/Controller.php');
    //require_once('lib/Core.php');

    // Autoload (Metodo para cargar el contenido de 'app/lib')
    spl_autoload_register(function($class) {
        require_once('lib/' . $class . '.php');
    });