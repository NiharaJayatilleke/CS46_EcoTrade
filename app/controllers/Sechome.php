<?php
    class Sechome extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
            // if(!isset($_SESSION['user_id'])){
            // }
        }

        public function index(){
            $data = [];
            $this->view('pages/v_sechome',$data);

        }
    }
?>