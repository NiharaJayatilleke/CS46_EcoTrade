<?php
    class Messages extends Controller{
        public function __construct(){
            $this->messagesModel =$this->model('M_Messages');
            $this->itemAdsModel = $this->model('M_Item_Ads');
        }

        public function message($id){
            $userId = $_SESSION['user_id'];
            $adId = $id;
            $message = $_POST['send-message'];
            $userType = $_SESSION['user_type'];

            echo $userId; echo $adId; echo $message;

            $data = [
                'user_id' => $userId,
                'ad_id' => $adId,
                'message' => $message
            ];

            if($this->messagesModel->sendMessage($data)){
                // header('location: ' . URLROOT . '/item_ads/v_show/' . $adId);
                flash('msg_sent', 'Message Sent');
            }
            else{
                die('Something went wrong');
            }
            // $this->view('pages/index');
        }

        public function showMessages($id){
            $messages = $this->messagesModel->getMessages($id);
            $sellerId = $this->itemAdsModel->getSellerByAd($id);
            // return $messages;

            // Render HTML using PHP
            foreach($messages as $message){
                $isSeller = $message->user_id == $sellerId->seller_id; //messages sent by the seller

                echo '<div class = "message-container">';
                echo '<div class = "message-left">';
                echo '<img id = "user_placeholder" src = "' . URLROOT . '/public/img/itemAds/man.jpg" alt="placeholder"></img>';
                echo '</div>';
                echo '<div class = "message-right">';
                echo '<div class = "message-header1">';
                echo '<div class = "message-user-name">' . $message->username . '</div>';
                echo '<span class="message-separator"> · </span>';
                echo '<div class = "message-created-at">' .convertTime($message->msg_created_at) . '</div>';
                echo '</div>';
                echo '<div class = "message-body">';
                echo '<div class = "message-body-cont">' . $message->content . '</div>';
                echo '</div>';
                if (!$isSeller &&  $_SESSION['user_id'] == $sellerId->seller_id) { 
                    echo '<div class="message-reply">';
                    echo '<button class="message-reply-btn" onclick="replyToMessage(' . $message->id . ')"><i class="fas fa-reply"></i>Reply</button>'; // Replace replyToMessage with the actual reply function
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }
        }
    }
?>