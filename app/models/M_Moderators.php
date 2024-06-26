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
            // print_r($data);
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
                    General_User
                WHERE
                    user_type = 'collector'
                
                UNION ALL
        
                SELECT
                    'Recycle center' AS user_type,
                    COUNT(*) AS count
                FROM
                    General_User
                WHERE
                    user_type = 'center'
                
                UNION ALL
        
                SELECT
                    'Moderators' AS user_type,
                    COUNT(*) AS count
                FROM
                    General_User
                WHERE
                    user_type = 'moderator'
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
                status = 'active'
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
        $updateQuery = "UPDATE Item_Ads SET status = 'hidden' WHERE p_id = :ad_id";
        $this->db->query($updateQuery);
        $this->db->bind(':ad_id', $adId);

        if ($this->db->execute()) {
            return true; // Update successful
        } else {
            return false; 
        }
    }


    public function showAdById($adId) {
        $updateQuery = "UPDATE Item_Ads SET status = 'active' WHERE p_id = :ad_id";
        $this->db->query($updateQuery);
        $this->db->bind(':ad_id', $adId);

        if ($this->db->execute()) {
            return true; // Update successful
        } else {
            return false; 
        }
    }
    

    public function getRecentActivities() {
        $this->db->query("
            SELECT al.user_id, gu.user_type, al.action_type, al.action_details, al.timestamp
            FROM Activity_Log al
            JOIN General_User gu ON al.user_id = gu.id
            ORDER BY al.timestamp DESC  -- Corrected the column name here
            LIMIT 10
        ");
    
        $activities = $this->db->resultSet();
    
        return $activities;
    }

       // update username and contact number
       public function updateUserInfo($newUsername, $newContactNumber) {
        $this->db->query('UPDATE General_User SET username = :newUsername, number = :newContactNumber WHERE id = :user_id');
        $this->db->bind(':newUsername', $newUsername);
        $this->db->bind(':newContactNumber', $newContactNumber);
        $this->db->bind(':user_id', $_SESSION['user_id']); 
    
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function getuserdetails($useremail) {
        $this->db->query('SELECT * FROM General_User WHERE email = :email');
        $this->db->bind(':email', $useremail);
        $row = $this->db->single();
        return $row;
    }

    public function updateProfileImage($user_id, $filename) {
        $this->db->query('UPDATE General_User SET profile_image = :filename WHERE id = :user_id');
        $this->db->bind(':filename', $filename);
        $this->db->bind(':user_id', $user_id);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
          
    public function deleteProfileImage($userId) {
        $this->db->query('UPDATE General_User SET profile_image = NULL WHERE id = :user_id');
        $this->db->bind(':user_id', $userId);

        return $this->db->execute();
    }

    public function DeleteAdById($adId) {
        // Prepare and execute the SQL query to delete the ad
        $sql = "DELETE FROM Item_Ads WHERE p_id = :adId";
        $this->db->query($sql);
        $this->db->bind(':adId', $adId);
    
        if ($this->db->execute()) {
            return true; // Deletion successful
        } else {
            return false; 
        }
    }
    
}

?>

