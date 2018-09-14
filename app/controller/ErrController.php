<?php

    class Err extends Controller {

        public function __construct()
        {

        }

        public function index($error)
        {
            $this->view('error/' . $error);
        }
    }
?>