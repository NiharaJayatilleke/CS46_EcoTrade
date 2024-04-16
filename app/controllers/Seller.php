<?php
    class Seller extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
        }

        public function index(){
            // $ads = $this->recycleItemAdsModel->getAds();
            $data = [
                // 'ads' => $ads,
            ];

            $this->view('users/seller/dashboard',$data);
        }
    }
?>