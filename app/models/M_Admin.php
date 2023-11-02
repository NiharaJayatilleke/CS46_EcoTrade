<?PHP
    class M_Admin{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        // Find the user
        public function findUserByEmail($email){
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

        // Login the user
        public function login($email,$password){
            $this->db->query('SELECT * FROM Administrator WHERE email =:email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if($password == $row->password){
                return $row;
            }
            else{
                return false;
            }
        }
        
    }

?>