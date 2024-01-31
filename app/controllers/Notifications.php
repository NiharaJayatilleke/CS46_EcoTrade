<?php
    class Notifications extends Controller{
        public function __construct(){
            $this->notificationsModel =$this->model('M_Notifications');
        }

        public function showNotifications(){
            $notifications = $this->notificationsModel->getNotificationsByUser($_SESSION['user_id']);
            // print_r($notifications);
            return $notifications;  
        }

        public function ajaxShowNotifications() {
            $notifications = $this->showNotifications();
            header('Content-Type: application/json');
            echo json_encode($notifications);
        }

        public function markAsSeen($id) {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $notificationId = $_POST['notif_id'];
                $this->notificationsModel->markAsSeen($notificationId);
            }
        }

    }
?>