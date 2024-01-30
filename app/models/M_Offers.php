<?PHP
    class M_Offers{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function addOffer($data){
            $this->db->query('INSERT INTO Offers(ad_id,user_id,offer_amount) VALUES(:ad_id, :user_id, :offer_amount)'); 
            $this->db->bind(':ad_id',$data['ad_id']);         
            $this->db->bind(':user_id',$data['user_id']);
            $this->db->bind(':offer_amount',$data['offer_amount']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        /*
        public function getOffersByAd($id){ // Where status = "NULL"
            $this->db->query('SELECT * FROM Offers WHERE ad_id = :ad_id AND  offer_status IS NULL ORDER BY offer_amount DESC');
            $this->db->bind(':ad_id',$id);
            $results = $this->db->resultSet();
            return $results;
        }
        */

        public function getOffersByAd($id){
            $this->db->query('SELECT * FROM Offers WHERE ad_id = :ad_id ORDER BY offer_amount DESC');
            $this->db->bind(':ad_id',$id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function overwriteStatus($adId){
            $this->db->query('UPDATE offers SET offer_status = "overwritten" WHERE ad_id = :ad_id AND offer_status = "accepted"');
            $this->db->bind(':ad_id',$adId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateOfferStatus($offerId, $status){
            $this->db->query('UPDATE Offers SET offer_status = :offer_status WHERE offer_id = :offer_id');
            $this->db->bind(':offer_status',$status);
            $this->db->bind(':offer_id',$offerId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getAcceptedOfferByAd($adId){
            $this->db->query('SELECT * FROM Offers WHERE ad_id = :ad_id AND offer_status = "accepted"');
            $this->db->bind(':ad_id',$adId);
            $row = $this->db->single();
            return $row;
        }

        // public function getOfferByStatus($status){
        //     $this->db->query('SELECT * FROM Offers WHERE status = :status');
        //     $this->db->bind(':status',$status);
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
    }
?>