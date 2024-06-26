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
            $this->db->query('SELECT * FROM Messages INNER JOIN General_User ON
                            Messages.user_id = General_User.id 
                            WHERE ad_id = :ad_id ORDER BY Messages.msg_created_at DESC');
            $this->db->bind(':ad_id', $ad_id);
            return $this->db->resultSet();
        }

        public function getMessageById($messageId){
            $this->db->query('SELECT * FROM Messages WHERE message_id = :id');
            $this->db->bind(':id',$messageId);
            $row = $this->db->single();
            return $row;
        }

        public function updateMessageWithReply($messageId, $reply){
            $this->db->query('UPDATE Messages SET reply = :reply WHERE message_id = :id');
            $this->db->bind(':id',$messageId);
            $this->db->bind(':reply',$reply);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteMessageById($messageId){
            $this->db->query('DELETE FROM Messages WHERE message_id = :id');
            $this->db->bind(':id',$messageId);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteReplyById($messageId){
            $this->db->query('UPDATE Messages SET reply = NULL WHERE message_id = :id');
            $this->db->bind(':id',$messageId);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>