<?php
    class Notifications extends Controller{
        public function __construct(){
            $this->notificationsModel =$this->model('M_Notifications');
        }

        public function addNotification($adId){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $receiverId = $_POST['bidderId'];
                $message = $_POST['message'];
                // $adId = $_POST['adId'];

                $notificationData = [
                    'user_id' => $receiverId, 
                    'ad_id' => $adId,
                    'message' => $message,
                    'seen' => 0
                ];
        
                if ($this->notificationsModel->addNotification($notificationData)) {
                    flash('notification_success', 'Notification sent to the seller');
                } else {
                    flash('notification_error', 'Could not send notification to the seller');
                }
            }
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

        public function markAsSeen($notifId) {
            $this->notificationsModel->markAsSeen($notifId);
        }

        public function showNotificationCount(){
            $notifications = $this->notificationsModel->getNotificationsByUser($_SESSION['user_id']);
            $count = count($notifications);
            echo json_encode($count);
        }

        public function addBuyerNotifResponse(){
            
        }

    }
?>