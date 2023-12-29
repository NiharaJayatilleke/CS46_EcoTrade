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
    }
?>