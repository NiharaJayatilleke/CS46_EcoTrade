<?php
    class Controller {

        //To load the model
        public function model($model) {
            require_once '../app/models/'.$model.'.php';

            //Instatiate the model and passs it to the controller member variable
            return new $model();
        }

        //To load the view
        public function view($view, $data = []) {
            if(file_exists('../app/views/'.$view.'.php')) {
                require_once '../app/views/'.$view.'.php';
            }else {
                die('Correspoding view does not exist!');
            }
        }
    }