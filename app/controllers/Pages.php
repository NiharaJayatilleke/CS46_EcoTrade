<?php
    class Pages extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
        }

        public function index(){
        // if(isset($_SESSION['user_id'])) {
        //     $user = $this->pagesModel->getUserProfileImage($_SESSION['user_id']);
        //     $data = [
        //         'user' => $user,
        //     ];
        //     $this->view('pages/index',$data);
        // } else {   
            // die("hello");
            $this->view('pages/index');
        // }
        
        }

        public function about(){
            $data = [];
            $this->view('pages/v_aboutus',$data);

        }

        public function error(){
            $data = [];
            $this->view('pages/error',$data);
        }

        // public function error(){
        //     $data = [];
        //     $this->view('pages/v_errorpage',$data);

        // }

        public function forbidden(){
            $data = [];
            $this->view('pages/forbidden',$data);
        }

        public function recyclehome(){
            $data = [];
            $this->view('pages/v_recyclehome',$data);

        }

        //Rusiru made the sechome view

        public function sechome(){
            $ads = $this->itemAdsModel->getAds();
            
            $data = [
                'ads' => $ads,
            ];

            $this->view('pages/v_sechome',$data);

        }

    }
?>