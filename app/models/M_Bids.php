<?PHP
    class M_Bids{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function addAuctionDetails($data){
            $this->db->query('INSERT INTO Bidding_Details(ad_id,auction_duration,starting_bid) VALUES(:ad_id, :auction_duration, :starting_bid)'); 
            $this->db->bind(':ad_id',$data['ad_id']);         
            $this->db->bind(':auction_duration',$data['duration']);
            $this->db->bind(':starting_bid',$data['starting_bid']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getBiddingDetailsByAd($id){ 
            $this->db->query('SELECT * FROM Bidding_Details WHERE ad_id = :ad_id');
            $this->db->bind(':ad_id',$id);
            $row = $this->db->single();
            return $row;
        }

        public function getBidsByAd($id){ 
            $this->db->query('SELECT * FROM Bids WHERE ad_id = :ad_id');
            $this->db->bind(':ad_id',$id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getHighestBidByAd($id) {
            $this->db->query('SELECT * FROM Bids WHERE bid_amount = (SELECT MAX(bid_amount) FROM Bids WHERE ad_id = :ad_id) AND ad_id = :ad_id');            
            $this->db->bind(':ad_id',$id);
            $row = $this->db->single();
            return $row;
        }

        public function addBid($adId, $bidAmount){
            $this->db->query('INSERT INTO Bids(ad_id, user_id, bid_amount) VALUES(:ad_id, :user_id, :bid_amount)'); 
            $this->db->bind(':ad_id',$adId);         
            $this->db->bind(':user_id',$_SESSION['user_id']);
            $this->db->bind(':bid_amount',$bidAmount);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

    }
?>