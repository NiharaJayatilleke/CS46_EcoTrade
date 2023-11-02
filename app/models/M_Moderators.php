<?PHP
    class M_Moderators{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the Moderator
        public function register($data){
            $this->db->query('INSERT INTO Moderators(username,email,password) VALUES(:username, :email, :password)');          
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);  
            // $this->db->bind(':userType', $data['user_type']);
            
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
        
    }

?>