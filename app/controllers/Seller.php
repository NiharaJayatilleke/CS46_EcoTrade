<?php
    class Seller extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->itemAdsModel = $this->model('M_Item_Ads');
            $this->recycleItemAdsModel = $this->model('M_Recycle_Item_Ads');
        }

        public function index(){

            $sellerId = $_SESSION['user_id'];

            $ads = $this->itemAdsModel->getAdsBySeller($sellerId);
            $re_ads = $this->recycleItemAdsModel->getAdsBySeller($sellerId);

            $data = [
                'ads' => $ads,
                're_ads' => $re_ads,
            ];

            $this->view('users/seller/dashboard',$data);
        }
    }
?>