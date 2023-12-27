<?php
    class Messages extends Controller{
        public function __construct(){
            $this->messagesModel =$this->model('M_Messages');
        }

        public function message($id){
            $userId = $_SESSION['user_id'];
            $adId = $id;
            $message = $_POST['send-message'];

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
            // return $messages;

            // Render HTML using PHP
            foreach($messages as $message){
                echo '<div class = "message-container">';
                echo '<div class = "message-left">';
                echo '<img id = "user_placeholder" src = "' . URLROOT . '/public/img/itemAds/man.jpg" alt="placeholder" width = "20px" height = "20px"></img>';
                echo '</div>';
                echo '<div class = "message-right">';
                echo '<div class = "message-header">';
                echo '<div class = "message-user-name">' . $message->username . '</div>';
                echo '<div class = "message-created-at">' .convertTime($message->msg_created_at) . '</div>';
                echo '</div>';
                echo '<div class = "message-body">';
                echo '<div class = "message-body-cont">' . $message->content . '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
?>