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
            $this->db->query('SELECT * FROM Notifications WHERE user_id = :user_id AND ad_id = :ad_id ORDER BY notif_id DESC');
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':ad_id', $adId);
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
    }
?>