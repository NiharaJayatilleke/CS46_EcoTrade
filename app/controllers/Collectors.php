<?php
    class Collectors extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
            $this->collectorModel =$this->model('M_Offers');
        }

        public function index(){
            $data = [];
            $this->view('pages/v_collectorhome',$data);

        }

        public function about(){
            $data = [];
            $this->view('pages/users/collector/about',$data);

        }
    }
?>