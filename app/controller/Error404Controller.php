<?php

    class Error404 extends Controller {

        public function __construct()
        {

        }

        public function index()
        {
            $this->view('error/404');
        }
    }
?>