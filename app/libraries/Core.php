<?php
    class Core{
        //url format --> /controller/method/params
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            // print_r($this->getURL());

            $url = $this->getURL();

            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //if the controller exists, then load it
                $this->currentController = ucwords($url[0]);

                //Unset the controller in the URL
                unset($url[0]);

                //call the Controller
                require_once '../app/controllers/'.$this->currentController.'.php';

                //Instentiate the Controller
                $this->currentController = new $this->currentController;

                // check whether the method exists in the controller or not 
                if(isset($url[1])){
                    if(method_exists($this->currentController, $url[1])){
                        $this->currentMethod = $url[1];

                        unset($url[1]);
                    }
                }
                //Get parameter list
                $this->params = $url ? array_values($url) : [];

                //call method and pass the parameter list
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            }
        }

        public function getURL(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }
    }
?>