<?php

    class Page extends Controller {

        public function __construct()
        {
            // Obtenemos el modelo desde el 'lib/controller.php'
            $this->product_model = $this->model('Product');
        }

        /**
         * Esto tiene que existir SIEMPRE!
         * Error en caso de no estar:   
         *      call_user_func_array() expects parameter 1 to be a valid callback, class 'Page' does not have a method 'index'
         */
        public function index() {

            // Obtenemos todos los productos desde la peticion a la bd que se hace desde el modelo correspondiente
            $products = $this->product_model->obtain_products();

            $data = [
                'products' => $products
            ];

            // A partir de este punto solamente queda mostrar $data['products'] en la vista
            $this->view('pages/index', $data);
        }

        public function other() {

            $data = [
                'title' => 'Bienvenido, soy un dato de la vista other'
            ];

            $this->view('pages/other', $data);
        }

        public function update($param1, $param2) 
        {
            echo '<p>Param1: ' . $param1 . '</p>';
            echo '<p>Param2: ' . $param2 . '</p>';
        }

    }