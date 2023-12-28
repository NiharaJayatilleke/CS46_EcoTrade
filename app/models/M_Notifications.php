<?PHP
    class M_Notifications{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function addNotification($data){
            $this->db->query('INSERT INTO Notifications(user_id,message,seen) VALUES(:user_id, :message, :seen)'); 
            $this->db->bind(':user_id',$data['user_id']);         
            $this->db->bind(':message',$data['message']);
            $this->db->bind(':seen',$data['seen']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>