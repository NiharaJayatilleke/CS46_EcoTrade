<?PHP
    class M_Users{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the user
        public function register($data){

            $this->db->query('INSERT INTO General_User(username,email,password,number,userType) VALUES(:username, :email, :password, :number, :userType)');          
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':number',$data['number']);
            $this->db->bind(':userType', $data['user_type']);

            
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
                return true;
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

        //get user details

        public function getUserDetails($user_id) {
            $this->db->query('SELECT * FROM General_User WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            return $this->db->single();
        }
        
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
        
    }

?>