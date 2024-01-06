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
    }
?>