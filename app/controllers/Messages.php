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
    }
?>