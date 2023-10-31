<?PHP
    class M_Admin{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        // Register the admin
        public function register($data){
            $this->db->query('INSERT INTO Administrator(username,email,password) VALUES(:username, :email, :password)');          
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);  
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        // Find the admin
        public function findAdminByEmail($email){
            $this->db->query('SELECT * FROM Administrator WHERE email =:email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        // Login the admin
        public function login($email,$password){
            $this->db->query('SELECT * FROM Administrator WHERE email =:email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            // $hashed_password = $row->password;
            if($password==$row->password){
                return $row;
            }
            else{
                return false;
            }
        }
        
    }

?>