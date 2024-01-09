<?PHP
    class M_Wishlist{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function addItem($data){
            $this->db->query('INSERT INTO Wishlist(ad_id,user_id) VALUES(:ad_id, :user_id)'); 
            $this->db->bind(':ad_id',$data['ad_id']);         
            $this->db->bind(':user_id',$data['user_id']);
           

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        // public function getOffersByAd($id){
        //     $this->db->query('SELECT * FROM Offers WHERE ad_id = :ad_id ORDER BY offer_amount DESC');
        //     $this->db->bind(':ad_id',$id);
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
    }
?>