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

        // public function getMessagesJson($id){
        //     $messages = $this->messagesModel->getMessages($id);
        //     echo json_encode($messages);
        // }

        public function showMessages($id){
            $messages = $this->messagesModel->getMessages($id);
            $sellerId = $this->itemAdsModel->getSellerByAd($id);
            // return $messages;

            // Render HTML using PHP
            foreach($messages as $message){
                $isSeller = $message->user_id == $sellerId->seller_id; //messages sent by the seller

                // echo '<div class = "message-container" id="message-' . $message->message_id . '">';
                echo '<div class = "message-container" id="message-container' . $message->message_id . '">';
                echo '<div class = "message-left">';
                    if ($isSeller) {
                        echo '<img id="user_placeholder" src="' . URLROOT . '/public/img/itemAds/seller.png" alt="Seller" style="height:30px" style="width:30px">';
                    } else {
                        echo '<img id="user_placeholder" src="' . URLROOT . '/public/img/itemAds/man.jpg" alt="Buyer">';
                    }                
                echo '</div>';

                echo '<div class = "message-right">'; 
                echo '<div class = "message-header1">';
                echo '<div class = "message-user-name">' . $message->username . '</div>';
                echo '<span class="message-separator"> · </span>';
                echo '<div class = "message-created-at">' .convertTime($message->msg_created_at) . '</div>';
                echo '</div>';
                
                echo '<div class = "message-body">';
                echo '<div class = "message-body-cont" >' . $message->content . '</div>';
                //delete message
                if ($message->user_id == $_SESSION['user_id']) {
                    echo '<button class="msg-delete-button" data-message-id="' . $message->message_id . '"><i class="fa fa-trash"></i></button>';
                }
                
                //reply button
                if (!$isSeller &&  $_SESSION['user_id'] == $sellerId->seller_id && empty($message->reply)) { 
                    echo '<div class="message-reply">';
                    //echo '<button class="message-reply-btn"  data-message-id="' . $message->message_id . '" onclick="messageReply(' . $message->message_id . ')"><i class="fas fa-reply"></i>Reply</button>'; 
                    echo '<button class="message-reply-btn"  data-message-id="' . $message->message_id . '" ><i class="fas fa-reply"></i>Reply</button>'; 
                    echo '</div>';
                }
                echo '</div>'; //message-body

                echo '<div class = "message-reply-form" id="message-' . $message->message_id . '"> </div>';
                // echo '</div>';

                //seller's reply
                if (!empty($message->reply)) {
                    echo '<div class = "message-reply-body">';
                    echo '<div class = "message-reply-body-cont">' . $message->reply . '</div>';
                    echo '<button class="reply-delete-button"><i class="fa fa-trash"></i></button>';
                    echo '</div>';
                }

                echo '</div>';
                echo '</div>';

            }
            echo '<script src="' . URLROOT . '/js/ads/message_reply.js"></script>';
        }

        function replyToMessage($messageId) {
            $message = $this->messagesModel->getMessageById($messageId);

            // if ($_SESSION['user_id'] == $message->seller_id) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                    // Validate the reply
                    if (empty($_POST['reply'])) {
                        $data['reply_err'] = 'Please enter a reply';
                    }
        
                    // If there are no errors
                    if (empty($data['reply_err'])) {
                        // Update the message with the reply
                        if ($this->messagesModel->updateMessageWithReply($messageId, $_POST['reply'])) {
                            // Redirect to the messages page
                            header('Location: ' . URLROOT . '/ItemAds/show/' . $message->ad_id);
                        } else {
                            die('Something went wrong');
                        }
                    }
                } else {
                    // Show the reply form
                    $data = [
                        'reply' => '',
                        'reply_err' => ''
                    ];
                    $this->view('messages/reply', $data);
                }
            // } else {
                // die('Unauthorized');
            // }
        }

        function deleteMessage($messageId) {
            $message = $this->messagesModel->getMessageById($messageId);
        
            if ($_SESSION['user_id'] == $message->user_id) {
                if ($this->messagesModel->deleteMessageById($messageId)) {
                    echo json_encode(array('success' => true, 'message' => 'The message was deleted successfully.'));
                } else {
                    http_response_code(500); // Internal Server Error
                    echo json_encode(array('success' => false, 'message' => 'Something went wrong.'));
                }
            } else {
                http_response_code(403); // Forbidden
                echo json_encode(array('success' => false, 'message' => 'Unauthorized.'));
            }
            exit();
        }
    }
?>