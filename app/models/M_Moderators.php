<?PHP
    class M_Moderators{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        
        public function moderatorTableUpdate($data): bool
    {

        $this->db->query('SELECT id FROM moderator WHERE username = :username AND password = :password');

        // Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);

        $row = $this->db->single();

        // Prepare statement
        $this->db->query('INSERT INTO driver (id) VALUES (:id)');

        // Bind values
        $this->db->bind(':id', $row->id);

        // Execute
        if ($this->db->execute()){
            return true;
        }
        else {
            return false;
        }
    }

        // // Find the moderator
        // public function findModeratorByEmail($email){
        //     $this->db->query('SELECT * FROM Moderator WHERE email =:email');
        //     $this->db->bind(':email',$email);

        //     $row = $this->db->single();

        //     if($this->db->rowCount() > 0){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function findmoderatorByEmail($email): bool
        {
            $this->db->query('SELECT * FROM moderator WHERE email = :email');
            $this->db->bind(':email', $email);
    
            $row = $this->db->single();
    
            // Check row
            if ($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // // Login the moderator
        // public function login($email,$password){
        //     $this->db->query('SELECT * FROM Moderator WHERE email =:email');
        //     $this->db->bind(':email',$email);

        //     $row = $this->db->single();

        //     $hashed_password = $row->password;
        //     if(password_verify($password,$hashed_password)){
        //         return $row;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function findmoderatorByUsername($username): bool
        {
            $this->db->query('SELECT * FROM moderator WHERE username = :username');
            $this->db->bind(':username', $username);
    
            $row = $this->db->single();
    
            // Check row
            if ($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password, $username){
            $this->db->query('SELECT * FROM moderator WHERE email = :email OR username = :username');
            $this->db->bind(':email', $email);
            $this->db->bind(':username', $username);
    
            $row = $this->db->single();
    
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        public function getModerator(){
            $this->db->query('SELECT * FROM Moderator');

            $results = $this->db->resultSet();
            
            return $results;
        }
        
    }

?>