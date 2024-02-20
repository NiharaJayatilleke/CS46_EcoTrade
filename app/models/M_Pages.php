<?PHP
    class M_Pages{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }


        
        // public function getUserProfileImage($userId) {
        //     $this->db->query('SELECT profile_image FROM General_User WHERE id = :user_id');
        //     $this->db->bind(':user_id', $userId);
    
        //     $row = $this->db->single();
    
        //     if ($row) {
        //         return $row->profile_image;
        //     }
        // }
    }

?>