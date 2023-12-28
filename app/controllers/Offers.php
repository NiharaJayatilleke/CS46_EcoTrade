<?php
    class Offers extends Controller{
        public function __construct(){
            $this->offersModel =$this->model('M_Offers');
        }

        public function submitOffer($id){
            file_put_contents('debug.log', print_r($_POST, true));

            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'ad_id' => $id,
                    'user_id' => $_SESSION['user_id'],
                    'offer_amount' => trim($_POST['offer_amount']),
                ];

                
                if($this->offersModel->addOffer($data)){
                    flash('offer_success','Offer submitted successfully');

                    // Prepare the notification
                    $notificationData = [
                        'user_id' => $seller_Id, //SELLER ID
                        'message' => "You have received a new offer of " . $data['offer_amount'] . " for your ad " . $data['ad_id'],
                        'read' => 0
                    ];

                    // Insert the notification into the database
                    if($this->notificationsModel->addNotification($notificationData)){
                        flash('notification_success', 'Notification sent to the seller');
                    } else {
                        flash('notification_error', 'Could not send notification to the seller');
                    }

                    // redirect('item_ads/show/'.$id);
                }
                else{
                    die('Something went wrong');
                }   
                
             //Notify the seller
            }
        }
    }
?>