<?php

    class Page extends Controller {

        public function __construct()
        {

        }

        /**
         * Esto tiene que existir SIEMPRE!
         * Error en caso de no estar:   
         *      call_user_func_array() expects parameter 1 to be a valid callback, class 'Page' does not have a method 'index'
         */
        public function index() 
        {
            $data = [
                'tite' => 'Bienvenido a Gestion'
            ];

            // A partir de este punto solamente queda mostrar $data['products'] en la vista
            $this->view('pages/index', $data);
        }

    }