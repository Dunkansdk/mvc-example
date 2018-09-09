<?php

    class Page extends Controller {

        public function __construct()
        {
            // TODO: Aca podriamos cargar la base de datos?
        }

        /**
         * Esto tiene que existir SIEMPRE!
         * Error en caso de no estar:   
         *      call_user_func_array() expects parameter 1 to be a valid callback, class 'Page' does not have a method 'index'
         */
        public function index() {
            $this->view('pages/index');
        }

        public function other() {

            $data = [
                'titulo' => 'Bienvenido, soy un dato de la vista other'
            ];

            $this->view('pages/other', $data);
        }

        public function update($param1, $param2) 
        {
            echo '<p>Param1: ' . $param1 . '</p>';
            echo '<p>Param2: ' . $param2 . '</p>';
        }

    }