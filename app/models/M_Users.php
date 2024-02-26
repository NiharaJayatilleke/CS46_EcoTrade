<?PHP
    class M_Users{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the user
        public function register($data){

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

        // Find the user
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM General_User WHERE email =:email');
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
        public function login($email,$password){
            $this->db->query('SELECT * FROM General_User WHERE email =:email');
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

        public function getUsers(){
            $this->db->query('SELECT * FROM General_User');

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
        public function updateUserInfo($newUsername, $newContactNumber) {
            $this->db->query('UPDATE General_User SET username = :newUsername, number = :newContactNumber WHERE id = :user_id');
            $this->db->bind(':newUsername', $newUsername);
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
    }

?>