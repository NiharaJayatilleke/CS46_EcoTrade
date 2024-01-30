<?php
    class Offers extends Controller{
        public function __construct(){
            $this->offersModel =$this->model('M_Offers');
            $this->notificationsModel =$this->model('M_Notifications');
            $this->itemAdsModel =$this->model('M_Item_Ads');
        }

        public function submitOffer($id){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'ad_id' => $id,
                    'user_id' => $_SESSION['user_id'],
                    'offer_amount' => trim($_POST['offer_amount']),
                ];

                try {
                    if ($this->offersModel->addOffer($data)) {
                        flash('offer_success','Offer submitted successfully');

                        $ad = $this->itemAdsModel->getAdById($id);
                        $sellerId = $ad->seller_id;

                        // Notify the seller
                        $notificationData = [
                            'user_id' => $sellerId, 
                            'ad_id' => $id,
                            'message' => "You have received an offer of Rs." . $data['offer_amount'] . " for your ad #" . $data['ad_id'],
                            'seen' => 0
                        ];

                        if ($this->notificationsModel->addNotification($notificationData)) {
                            flash('notification_success', 'Notification sent to the seller');
                        } else {
                            flash('notification_error', 'Could not send notification to the seller');
                        }

                    } else {
                        die('Something went wrong with adding the offer');
                    }

                } catch (Exception $e) {
                    die('Error: ' . $e->getMessage());
                }

            }
        }

        // public function showOffers($id){
        //     $ad = $this->itemAdsModel->getAdById($id);
        //     $offers = $this->offersModel->getOffersByAd($id);

        //     $data = [
        //         'ad' => $ad,
        //         'offers' => $offers
        //     ];

        //     var_dump($data);

        //     $this->view('item_ads/v_show', $data); 
        //     // return $offers;
        // }

        public function handleUpdateOfferStatus() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $offerId = $_POST['offerId'];
                $status = $_POST['status'];

                // If the seller accepts an offer, overwrite the status of all other offers for the same ad
                if ($status == 'accepted') {
                    $adId = $_POST['adId'];
                    $this->offersModel->overwriteStatus($adId);
                }
        
                $this->offersModel->updateOfferStatus($offerId, $status);

                if ($status == 'accepted') {
                    $acceptedOffer = $this->offersModel->getAcceptedOfferByAd($adId);
                    echo json_encode(['status' => 'success', 'offerPrice' => $acceptedOffer->offer_amount]);
                } else {
                    echo json_encode(['status' => 'success']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
            }
        }

        public function getOfferDetails($id){
            $ad = $this->itemAdsModel->getAdById($id); 
            $binPrice = $ad->item_price;
            $offers = $this->offersModel->getOffersByAd($id);
            $numOffers = count($offers);

            $response = array(
                'binPrice' => $binPrice,
                'numOffers' => $numOffers
            );
        
            echo json_encode($response);
        }  

    }
?>