<?PHP
    class M_Users{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the user
        public function register($data){

            $this->db->query('INSERT INTO Non_Verified_Users(username,email,number,password,user_type,token) VALUES(:username, :email, :number,  :password, :user_type, :token)');          
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':number',$data['number']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            $this->db->bind(':token',$data['token']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        // insert user
        public function insert_user($data){

            $this->db->query('INSERT INTO General_User(username,email,number,password,user_type) VALUES(:username, :email, :number,  :password, :user_type)');          
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':number',$data['number']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function get_user_by_token($token){
            $this->db->query('SELECT * FROM Non_Verified_Users WHERE token =:token');
            $this->db->bind(':token',$token);

            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $this->db->single();
            }
            else{
                return false;
            }
        }

        // Find the user
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM general_User WHERE email =:email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row->id;
                
            }
            else{
                return false;
            }
        }

        // Find the nonverifieduser
        public function findNonVerifiedUserByEmail($email){
            $this->db->query('SELECT * FROM Non_Verified_Users WHERE email =:email AND verified=0');
            $this->db->bind(':email',$email);

            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row->id;
            }
            else{
                return false;
            }
        }

        // Login the user
        public function login($email, $password){
            $this->db->query('SELECT * FROM General_User WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
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

        //get profile image to topnavbar
        // public function getUserProfileImage($userId) {
        //     $this->db->query('SELECT profile_image FROM General_User WHERE id = :user_id');
        //     $this->db->bind(':user_id', $userId);
    
        //     $row = $this->db->single();
    
        //     if ($row) {
        //         return $row->profile_image;
        //     }
        // }

        //get user details
        public function getUserDetails($user_id) {
            $this->db->query('SELECT * FROM General_User WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            return $this->db->single();
        }

        public function changeUserStatus($userId, $status){
            $this->db->query('UPDATE General_User SET status = :status WHERE id = :id');
            $this->db->bind(':status', $status);
            $this->db->bind(':id', $userId);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //here we get the users except the admin
        public function getUsers(){
            $this->db->query('SELECT * FROM General_User WHERE user_type != "admin"');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getUsersByType($type){
            $this->db->query('SELECT * FROM General_User WHERE user_type = :type');
            $this->db->bind(':type', $type);

            $results = $this->db->resultSet();

            return $results;
        }

        public function getUserTypeById($userId) {
            $this->db->query('SELECT user_type FROM General_User WHERE id = :id');
            $this->db->bind(':id', $userId);
            return $this->db->single();
        }

        public function setUserTypeById($userId, $userType) {
            $this->db->query('UPDATE General_User SET user_type = :user_type WHERE id = :id');
            $this->db->bind(':id', $userId);
            $this->db->bind(':user_type', $userType);
            return $this->db->single();
        }
        
        // update username and contact number
        public function updateUsername($newUsername) {
            $this->db->query('UPDATE General_User SET username = :newUsername WHERE id = :user_id');
            $this->db->bind(':newUsername', $newUsername);
            $this->db->bind(':user_id', $_SESSION['user_id']); // You need to have the user's ID available
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateUsernumber($newContactNumber) {
            $this->db->query('UPDATE General_User SET number = :newContactNumber WHERE id = :user_id');
            $this->db->bind(':newContactNumber', $newContactNumber);
            $this->db->bind(':user_id', $_SESSION['user_id']); // You need to have the user's ID available
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateUserType($newUserType) {
            $this->db->query('UPDATE General_User SET user_type = :newUserType WHERE id = :user_id');
            $this->db->bind(':newUserType', $newUserType);
            $this->db->bind(':user_id', $_SESSION['user_id']); // You need to have the user's ID available

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
       public function updatePassword($user_id, $oldPassword, $newPassword) {
            // If new password is provided, verify the old password first
            if (!empty($newPassword) && !empty($oldPassword)) {
                $user_id = $_SESSION['user_id'];
                if (!$this->verifyOldPassword($user_id, $oldPassword)) {
                    return false; // Old password doesn't match
                }
            }
        
            // Build the query based on whether the new password is provided
            if (!empty($newPassword)) {
                $this->db->query('UPDATE General_User SET password = :newPassword WHERE id = :user_id');
                $this->db->bind(':newPassword', password_hash($newPassword, PASSWORD_DEFAULT));
            }
        
            //$this->db->bind(':user_id', $_SESSION['user_id']); // You need to have the user's ID available
            $this->db->bind(':user_id', $user_id); 

            // return $this->db->execute();
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function verifyOldPassword($user_id, $old_password) {
            $this->db->query('SELECT password FROM General_User WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
        
            $row = $this->db->single();
        
            $hashed_password = $row->password;
            return password_verify($old_password, $hashed_password);
        }

        public function deleteUser($userId) {
            $this->db->query('DELETE FROM General_User WHERE id = :user_id');
            $this->db->bind(':user_id', $userId);
    
            return $this->db->execute();
        }

        // public function deleteVerifiedUser($useremail) {
        //     $this->db->query('DELETE FROM Non_Verified_Users WHERE email = :email');
        //     $this->db->bind(':email', $useremail);
    
        //     return $this->db->execute();
        // }
        
        public function verify_user($useremail) {
            $this->db->query('UPDATE Non_Verified_Users SET verified=TRUE WHERE email = :email');
            $this->db->bind(':email', $useremail);
    
            return $this->db->execute();
        }
        
        public function checkUserExists($user_id) {
            $this->db->query('SELECT id FROM General_User WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);

            $row = $this->db->single();

            // If the query returns a row, that means a user with the given ID exists
            if($row) {
                return true;
            } else {
                return false;
            }
        }


        public function resetPassword($user_id, $newPassword) {
            // Build the query based on whether the new password is provided
            if (!empty($newPassword)) {
                $this->db->query('UPDATE General_User SET password = :newPassword WHERE id = :user_id');
                $this->db->bind(':newPassword', password_hash($newPassword, PASSWORD_DEFAULT));
            }
        
            //$this->db->bind(':user_id', $_SESSION['user_id']); // You need to have the user's ID available
            $this->db->bind(':user_id', $user_id); 

            // return $this->db->execute();
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }  

        public function logActivity($userId, $actionType, $actionDetails = '') {
            $this->db->query('INSERT INTO Activity_Log (user_id, action_type, action_details) VALUES (:user_id, :action_type, :action_details)');
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':action_type', $actionType);
            $this->db->bind(':action_details', $actionDetails);
    
            return $this->db->execute();
        }
        
        
    }

?>