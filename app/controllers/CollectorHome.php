<?php
    class CollectorHome extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
        }

        public function index(){
            $data = [];
            $this->view('pages/v_collectorhome',$data);

        }
    }
?>