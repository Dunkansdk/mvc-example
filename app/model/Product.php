<?php

    class Product {

        private $db;

        public function __construct()
        {
            // Instanciamos 'lib/database'
            $this->db = new Database('mareados_1');
        }

        public function obtain_products()
        {
            // Obtenemos los datos
            $this->db->query("SELECT * FROM `productos`");

            // Retornamos los datos y los pasamos al 'app/controller' correspondiente
            return $this->db->obtain();
        }

    }