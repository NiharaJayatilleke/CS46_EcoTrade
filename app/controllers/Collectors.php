<?php
    class Collectors extends Controller{
        public function __construct(){
            // $this->pagesModel =$this->model('M_Collectors');
            $this->pagesModel =$this->model('M_Pages');

        }

        public function index(){
            $data = [];
            $this->view('users/collectors/index',$data);
        }

        public function about(){
            $data = [];
            $this->view('users/collectors/about',$data);
        }
    }
?>