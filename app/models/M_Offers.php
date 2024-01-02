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
    }
?>