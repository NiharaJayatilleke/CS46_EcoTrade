<?PHP
    class M_Messages{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function sendMessage($data){
            $this->db->query('INSERT INTO Messages(post_id,user_id,content) VALUES(:post_id, :user_id, :content)'); 
            $this->db->bind(':post_id',$_SESSION['post_id']);         
            $this->db->bind(':user_id',$data['user_id']);
            $this->db->bind(':content',$data['content']);

            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>