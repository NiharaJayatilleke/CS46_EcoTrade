<?PHP
    class M_Messages{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function sendMessage($data){
            $this->db->query('INSERT INTO Messages(ad_id,user_id,content) VALUES(:ad_id, :user_id, :content)'); 
            $this->db->bind(':ad_id',$data['ad_id']);         
            $this->db->bind(':user_id',$data['user_id']);
            $this->db->bind(':content',$data['message']);

            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getMessages($ad_id){
            $this->db->query('SELECT * FROM Messages WHERE ad_id = :ad_id ORDER BY created_at DESC');
            $this->db->bind(':ad_id', $ad_id);
            return $this->db->resultSet();
        }
    }
?>