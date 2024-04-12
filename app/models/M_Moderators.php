<?PHP
    class M_Moderators{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getModerators(){
            $this->db->query('SELECT * FROM General_User WHERE user_type = "moderator"');

            $results = $this->db->resultSet();

            return $results;
        }
       
        public function getModeratorById($modId){
            $this->db->query('SELECT * FROM General_User WHERE id = :id AND user_type = "moderator"');
            $this->db->bind(':id',$modId);
            $row = $this->db->single();
            return $row;
        }

        public function edit($data){
            print_r($data);
            $this->db->query('UPDATE General_User SET username = :username, number = :number, password = :password WHERE id = :id AND user_type = "moderator"');
            $this->db->bind(':id',$data['id']);
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':number',$data['number']);
            $this->db->bind(':password',$data['password']);  
            // $this->db->bind(':userType', $data['user_type']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function delete($modId){
            $this->db->query('DELETE FROM General_User WHERE id = :id AND user_type = "moderator"');
            $this->db->bind(':id',$modId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getUserCounts() {
            $this->db->query("
                SELECT
                    'Buyers' AS user_type,
                    COUNT(*) AS count
                FROM
                    General_User
                WHERE
                    user_type = 'pBuyer'
                
                UNION ALL
        
                SELECT
                    'Sellers' AS user_type,
                    COUNT(*) AS count
                FROM
                    General_User
                WHERE
                    user_type IN ('seller', 'pSeller', 'rSeller')
                
                UNION ALL
        
                SELECT
                    'Collectors' AS user_type,
                    COUNT(*) AS count
                FROM
                    Collectors
                
                UNION ALL
        
                SELECT
                    'Recycle center' AS user_type,
                    COUNT(*) AS count
                FROM
                    Re_Centers
                
                UNION ALL
        
                SELECT
                    'Moderators' AS user_type,
                    COUNT(*) AS count
                FROM
                    Moderators
            ");
        
            $userCounts = array();
        
            $results = $this->db->resultSet();
            foreach ($results as $row) {
                // Use object property syntax instead of array syntax
                $userCounts[$row->user_type] = $row->count;
            }
        
            return $userCounts;
        }
    
    
}

?>
