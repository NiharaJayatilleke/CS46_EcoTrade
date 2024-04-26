<?PHP
    class M_Notifications{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function addNotification($data){
            $this->db->query('INSERT INTO Notifications(user_id, ad_id, message, seen) VALUES(:user_id, :ad_id, :message, :seen)'); 
            $this->db->bind(':user_id',$data['user_id']);     
            $this->db->bind(':ad_id',$data['ad_id']);    
            $this->db->bind(':message',$data['message']);
            $this->db->bind(':seen',$data['seen']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getNotificationsByUser($id){
            $this->db->query('SELECT * FROM Notifications WHERE user_id = :user_id AND seen = 0 ORDER BY notif_id DESC');
            $this->db->bind(':user_id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getBuyerNotificationsByAd($userId, $adId){
            $this->db->query('SELECT * FROM Notifications WHERE user_id = :user_id AND ad_id = :ad_id AND seen = 0 ORDER BY notif_id DESC');
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':ad_id', $adId);
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getNotifsBySeller($sellerId){
            $this->db->query('SELECT * FROM Notifications WHERE user_id = :seller_id AND seen = 0 ORDER BY notif_id DESC');
            $this->db->bind(':seller_id', $sellerId);
            $results = $this->db->resultSet();
            return $results;
        }

        public function markAsSeen($notifId){
            var_dump($notifId);
            $this->db->query('UPDATE Notifications SET seen = 1 WHERE notif_id = :notif_id');
            $this->db->bind(':notif_id', $notifId);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function addBuyerResponse($data){
            $this->db->query('INSERT INTO Buyer_Responses (notif_id, response, rejection_reason) VALUES(:notif_id, :response, :rejection_reason)'); 
            $this->db->bind(':notif_id',$data['notif_id']);     
            $this->db->bind(':response',$data['response']);    
            $this->db->bind(':rejection_reason',$data['rejection_reason']);
        
            if($this->db->execute()){
                $this->db->query('UPDATE Notifications SET seen = 1 WHERE notif_id = :notif_id');
                $this->db->bind(':notif_id', $data['notif_id']);
            
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
            }
            else{
                return false;
            }
        }
    }
?>