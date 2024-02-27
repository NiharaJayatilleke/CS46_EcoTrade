<?PHP
    class M_Collectors{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the collector
        public function register($data){

            $this->db->query('INSERT INTO Collectors(id, nic, gender, address, com_name, com_email, com_address, telephone, company_type, reg_number, vehicle_type, vehicle_reg, make, model, insurance, color, district1, district2, district3, district4, district5) VALUES(:nic, :gender, :address, :com_name, :com_email, :com_address, :telephone, :company_type, :reg_number, :vehicle_type, :vehicle_reg, :make, :model, :insurance, :color, :district1, :district2, :district3, :district4, :district5)');

            $this->db->bind(':id', $_SESSION['user_id']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':com_name', $data['com_name']);
            $this->db->bind(':com_email', $data['com_email']);
            $this->db->bind(':com_address', $data['com_address']);
            $this->db->bind(':telephone', $data['telephone']);
            $this->db->bind(':company_type', $data['company_type']);
            $this->db->bind(':reg_number', $data['reg_number']);
            $this->db->bind(':vehicle_type', $data['vehicle_type']);
            $this->db->bind(':vehicle_reg', $data['vehicle_reg']);
            $this->db->bind(':make', $data['make']);
            $this->db->bind(':model', $data['model']);
            $this->db->bind(':insurance', $data['insurance']);
            $this->db->bind(':color', $data['color']);
            $this->db->bind(':district1', $data['district1']);
            $this->db->bind(':district2', $data['district2']);
            $this->db->bind(':district3', $data['district3']);
            $this->db->bind(':district4', $data['district4']);
            $this->db->bind(':district5', $data['district5']);
            
                        
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        // Find the user
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM Collectors WHERE email =:email');
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
            $this->db->query('SELECT * FROM Collectors WHERE email =:email');
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
            $this->db->query('UPDATE Collectors SET profile_image = :filename WHERE id = :user_id');
            $this->db->bind(':filename', $filename);
            $this->db->bind(':user_id', $user_id);
            
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //get user details

        public function getUserDetails($user_id) {
            $this->db->query('SELECT * FROM Collectors WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            return $this->db->single();
        }


        
        // update username and contact number
        public function updateUserInfo($newUsername, $newContactNumber) {
            $this->db->query('UPDATE Collectors SET username = :newUsername, number = :newContactNumber WHERE id = :user_id');
            $this->db->bind(':newUsername', $newUsername);
            $this->db->bind(':newContactNumber', $newContactNumber);
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
                $this->db->query('UPDATE Collectors SET password = :newPassword WHERE id = :user_id');
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
            $this->db->query('SELECT password FROM Collectors WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
        
            $row = $this->db->single();
        
            $hashed_password = $row->password;
            return password_verify($old_password, $hashed_password);
        }

        public function deleteUser($userId) {
            $this->db->query('DELETE FROM Collectors WHERE id = :user_id');
            $this->db->bind(':user_id', $userId);
    
            return $this->db->execute();
        }


        public function resetPassword($user_id, $newPassword) {
            // Build the query based on whether the new password is provided
            if (!empty($newPassword)) {
                $this->db->query('UPDATE Collectors SET password = :newPassword WHERE id = :user_id');
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