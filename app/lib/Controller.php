<?php

    // '
    // En este controller se cargan los modelos y las vistas

    class Controller {

        /**
         * Cargamos el modelo correspondiente del controlador
         */
        public function model($model) 
        {
            require_once('../model' . $model . '.php');
            return new $model();
        }

        /**
         * Cargamos una vista en caso de que exista
         * Vamos desde el 'app/index.php' (Donde se hace el require) a 'app/view/'
         * 
         * - Toda esta data llega desde los 'app/controller'
         * @data    ESTOS VAN A SER LOS PARAMETROS QUE SE VAN A ENVIAR A '/pages/view/***.php'
         *          Y SE ACCEDEN CON $data['whatever'];
         */
        public function view($view, $data = []) 
        {
            // NOTA IMPORTANTE: SI LA VISTA EXISTE PERO NO SE CREO LA FUNCION EN EL CONTROLADOR
            //                  VA A REDIRECCIONAR AL 'index())' DEL MISMO
            //                  SI LA VISTA NO EXISTE Y SE LLAMA A LA FUNCION DEL CONTROLADOR
            //                  VA A HACER EL 'die()'
            if(file_exists('../app/view/' . $view . '.php')) {
                require_once('../app/view/' . $view . '.php');
            } else {
                die('La vista no existe');
            }
        }

    }