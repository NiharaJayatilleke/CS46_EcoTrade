<?php
    class Seller extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->itemAdsModel = $this->model('M_Item_Ads');
        }

        public function index(){

            $sellerId = $_SESSION['user_id'];

            $ads = $this->itemAdsModel->getAdsBySeller($sellerId);

            $data = [
                'ads' => $ads,
            ];

            $this->view('users/seller/dashboard',$data);
        }
    }
?>