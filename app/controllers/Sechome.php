<?php
    class Sechome extends Controller{
        public function __construct(){
            $this->itemAdsModel =$this->model('M_Item_Ads');
            // if(!isset($_SESSION['user_id'])){
            // }
        }

        public function index(){
            $ads = $this->itemAdsModel->getAds();
            
            $data = [
                'ads' => $ads,
            ];

            $this->view('pages/v_sechome',$data);

        }
    }
?>