<?PHP
    class M_Moderators{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getModerators(){
            $this->db->query('SELECT * FROM Moderators');

            $results = $this->db->resultSet();

            return $results;
        }

        //Register the Moderator
        public function register($data){
            $this->db->query('INSERT INTO Moderators(username,email,number,password) VALUES(:username, :email, :number,  :password)');       
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':number',$data['number']);
            $this->db->bind(':password',$data['password']);  
            // $this->db->bind(':user_type', $data['user_type']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        // Find the user
        public function findModeratorByEmail($email){
            $this->db->query('SELECT * FROM Moderators WHERE email =:email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        public function getModeratorById($modId){
            $this->db->query('SELECT * FROM Moderators WHERE id = :id');
            $this->db->bind(':id',$modId);
            $row = $this->db->single();
            return $row;
        }

        // Login the Moderator
        public function login($email,$password){
            $this->db->query('SELECT * FROM Moderators WHERE email =:email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password,$hashed_password)){
                return $row;
            }
            else{
                return false;
            }
        }

        public function edit($data){
            print_r($data);
            $this->db->query('UPDATE Moderators SET username = :username, number = :number, password = :password WHERE id = :id');
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
        $this->db->query('DELETE FROM Moderators WHERE id = :id');
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

    public function getItemAdCountsByCategory() {
        $this->db->query("
            SELECT
                item_category,
                COUNT(*) AS count
            FROM
                Item_Ads
            WHERE
                status IS NULL
            GROUP BY
                item_category
        ");
    
        $countsByCategory = array();
    
        $results = $this->db->resultSet();
        foreach ($results as $row) {
            $countsByCategory[$row->item_category] = $row->count;
        }
    
        return $countsByCategory;
    }

    public function getReportedAds() {
        $this->db->query("
            SELECT ra.report_id, ra.ad_id, ra.reporter_id, ra.report_reason, ra.report_comments,
                   ra.report_contact, ra.report_status, ra.report_created_at,
                   ia.item_name AS ad_title, ia.item_desc AS ad_description,
                   gu.username AS reporter_username
            FROM Reported_Ads ra
            INNER JOIN Item_Ads ia ON ra.ad_id = ia.p_id
            INNER JOIN General_User gu ON ra.reporter_id = gu.id
        ");
    
        return $this->db->resultSet();
    }
    
    public function hideAdById($adId) {
        // Update the status of the ad to 'hidden'
        $query = "UPDATE Item_Ads SET status = 'hidden' WHERE p_id = :ad_id";
        $this->db->query($query);
        $this->db->bind(':ad_id', $adId);
    
        if ($this->db->execute()) {
            // Delete the reported ad related to this ad
            $this->db->query("DELETE FROM Reported_Ads WHERE ad_id = :ad_id");
            $this->db->bind(':ad_id', $adId);
            $this->db->execute();
    
            return true;  
        } else {
            return false; 
    }
    
}  
    
}

?>
