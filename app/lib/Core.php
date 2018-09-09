<?php

    /**
     * Mapear la url ingresada en el navegador
     * [0] - controller
     * [1] - method
     * [2*] - param
     * example: url + /controller/method/param
     */

     class Core {

        /**
         * Datos 'default' en caso de que no se cargue nada en la url
         * Controlador por defecto: '/page/index'
         */
        protected $_controller = 'Page';
        protected $_method = 'index';
        protected $_param = [];

        public function __construct() 
        {
            $url = $this->obtain_url();

            // Verifica si el controller '$url['0']' existe y lo setea
            if(file_exists('../app/controller/' . ucwords($url['0']) . 'Controller.php')) 
            {
                // Seteamos el nuevo controlador con el que se va a trabajar
                $this->_controller = ucwords($url['0']);

                // Desmontamos el controlador por defecto 'PageController'
                unset($url['0']);
            }

            // Requerimos el nuevo controlador y lo instanciamos
            require_once('../app/controller/' . $this->_controller . 'Controller.php');
            $this->_controller = new $this->_controller;

            // Chequeamos la segunda parte de la url (method)
            if(isset($url['1'])) {
                if(method_exists($this->_controller, $url['1'])) 
                {
                    $this->_method = $url['1']; // Seteamos el nuevo
                    unset($url['1']); // Desmontamos
                }
            }

            // Obtener los parametros
            $this->_param = $url ? array_values($url) : [];

            // Callback para traer los arreglos de la url
            call_user_func_array([$this->_controller, $this->_method], $this->_param);
        }

        /**
         * Test function
         */
        private function obtain_url() 
        {
           if(isset($_GET['url'])) {
               // Parseamos los datos de la url
               $url = rtrim($_GET['url'], '/');
               $url = filter_var($url, FILTER_SANITIZE_URL);
               $url = explode('/', $url);

               return $url;
            }
        }

     }