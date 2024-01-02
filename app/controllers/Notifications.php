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

    }
?>