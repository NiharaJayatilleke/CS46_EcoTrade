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
            // $this->db->query('SELECT * FROM Bids WHERE ad_id = :ad_id ORDER BY bid_amount DESC');
            $this->db->query('SELECT Bids.*, General_User.username FROM Bids INNER JOIN General_User ON Bids.user_id = General_User.id WHERE ad_id = :ad_id ORDER BY bid_amount DESC');
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

        public function deleteBid($bidId){
            $this->db->query('DELETE FROM Bids WHERE bid_id = :id');
            $this->db->bind(':id',$bidId);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function calculateRemainingTime($startTime, $duration){

            //the end time
            if (isset($duration) && is_numeric($duration)) {
            $endTime = clone $startTime;
            $endTime->modify("+$duration days");
            }

            //the current time
            $now = new DateTime();

            if ($now > $endTime) {
                return 'Auction Ended';
            }
            
            //the remaining time
            $remainingTime = $endTime->diff($now);

            //Formating the remaining time as a string
            $remainingTimeString = $remainingTime->format('%dd %hh %im %ss');

            /*$remainingTimeParts = preg_split('/(\d+\D+)/', $remainingTime, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            $relevantParts = array_filter($remainingTimeParts, function($part) {
                return !str_starts_with($part, '0');
            });
            $displayTime = implode('', array_slice($relevantParts, 0, 2));

            return $displayTime; */
            return $remainingTimeString;
        }

        public function updateBiddingDetails($adId, $duration, $startingBid){
            $this->db->query('UPDATE Bidding_Details SET auction_duration = :auction_duration, starting_bid = :starting_bid, starting_time = NOW() WHERE ad_id = :ad_id');         
            $this->db->bind(':ad_id',$adId);         
            $this->db->bind(':auction_duration',$duration);
            $this->db->bind(':starting_bid',$startingBid);
        
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>