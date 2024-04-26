<?php
    class Seller extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->itemAdsModel = $this->model('M_Item_Ads');
            $this->recycleItemAdsModel = $this->model('M_Recycle_Item_Ads');
            $this->notificationsModel = $this->model('M_Notifications');
        }

        public function index(){

            $sellerId = $_SESSION['user_id'];

            $ads = $this->itemAdsModel->getAdsBySeller($sellerId);
            $re_ads = $this->recycleItemAdsModel->getAdsBySeller($sellerId);
            $notifs = $this->notificationsModel->getNotifsBySeller($sellerId);
            $ratings = $this->itemAdsModel->getSellerRating($sellerId);

            $totalRatings = array_sum($ratings);
            $weightedSum = 0;

            foreach ($ratings as $rating => $count) {
                $weightedSum += $rating * $count;
            }

            $avgRating = round($weightedSum / $totalRatings, 1);

            $data = [
                'ads' => $ads,
                're_ads' => $re_ads,
                'notifs' => $notifs,
                'ratings' => $ratings,
                'tot_rating' => $totalRatings, 
                'avg_rating' => $avgRating
            ];

            $this->view('users/seller/dashboard',$data);
        }
    }
?>