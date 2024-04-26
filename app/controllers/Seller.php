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

            $rating = $avgRating;

            if ($rating >= 4.7) {
                $ratingWord = 'Top rated';
            } elseif ($rating >= 4.5) {
                $ratingWord = 'Excellent';
            } elseif ($rating >= 4.0) {
                $ratingWord = 'Very good';
            } elseif ($rating >= 3.5) {
                $ratingWord = 'Good';
            } else {
                $ratingWord = 'Average';
            }

            $data = [
                'ads' => $ads,
                're_ads' => $re_ads,
                'notifs' => $notifs,
                'ratings' => $ratings,
                'tot_rating' => $totalRatings, 
                'rating_word' => $ratingWord,
                'avg_rating' => $avgRating
            ];

            $this->view('users/seller/dashboard',$data);
        }

        //rusiru's view added to controller by nihara
        public function sellerprofile(){
            $data = [];
            $this->view('pages/v_sellerpro',$data);

        }
    }
?>