<?php
    class Pages extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
            $this->itemAdsModel = $this->model('M_Item_Ads');
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

            usort($ads, function($a, $b) {
                if ($a->feature_package == $b->feature_package) {
                    return 0;
                }
                return ($a->feature_package == 'PV' ? -1 : 1);
            });

            $uniqueAds = array_unique($ads, SORT_REGULAR);

            $pvAds = array_filter($uniqueAds, function($ad) {
                // return $ad->feature_package == 'PV';
                return $ad->feature_package == 'PV' && $ad->is_package_over != 1;
            });
            
            $data = [
                'ads' => $ads,
                'unique_ads' => $uniqueAds, 
                'pv_ads' => $pvAds
            ];

            $this->view('pages/v_sechome',$data);

        }

        public function sellerpro(){
            $data = [];
            $this->view('pages/v_sellerpro',$data);

        }

    }
?>