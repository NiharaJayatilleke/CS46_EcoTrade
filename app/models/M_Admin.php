<?PHP
    class M_Admin{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        
        // Login the user
        // public function login($email,$password){
        //     $this->db->query('SELECT * FROM Administrator WHERE email =:email');
        //     $this->db->bind(':email',$email);

        //     $row = $this->db->single();

        //     $hashed_password = $row->password;
        //     if($password == $row->password){
        //         return $row;
        //     }
        //     else{
        //         return false;
        //     }
        // }
        
    }

?>
