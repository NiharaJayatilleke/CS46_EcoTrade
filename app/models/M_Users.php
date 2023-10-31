<?PHP
    class M_Users{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function register($data): bool{
        // Prepare statement
        $this->db->query('INSERT INTO user (name, username, email, password, userType, contactNo) VALUES (:name, :username, :email, :password, :userType, :contactNo)');

        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':userType', $data['user_type']);
        $this->db->bind(':contactNo', $data['contact_no']);

        // Execute
        if ($this->db->execute() and $this->userTableUpdate($data)){;
            return true;
        }
        else {
            return false;
        }
    }
        // //Register the user
        // public function register($data){
        //     $this->db->query('INSERT INTO General_User(username,email,password) VALUES(:username, :email, :password)');          
        //     $this->db->bind(':username',$data['username']);
        //     $this->db->bind(':email',$data['email']);
        //     $this->db->bind(':password',$data['password']);  
            
        //     if($this->db->execute()){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // Update the specific user table
    public function userTableUpdate($data): bool
    {

        $this->db->query('SELECT id FROM user WHERE username = :username AND password = :password');

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

        // Find the user by email
        public function findUserByEmail($email): bool
        {
            $this->db->query('SELECT * FROM user WHERE email = :email');
            $this->db->bind(':email', $email);
    
            $row = $this->db->single();
    
            // Check row
            if ($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        // public function findUserByEmail($email){
        //     $this->db->query('SELECT * FROM General_User WHERE email =:email');
        //     $this->db->bind(':email',$email);

        //     $row = $this->db->single();

        //     if($this->db->rowCount() > 0){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        //find user by username
        public function findUserByUsername($username): bool
        {
            $this->db->query('SELECT * FROM user WHERE username = :username');
            $this->db->bind(':username', $username);
    
            $row = $this->db->single();
    
            // Check row
            if ($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // Login the user
        public function login($email, $password, $username){
            $this->db->query('SELECT * FROM user WHERE email = :email OR username = :username');
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

        // Update user profile
        public function updateProfile($data): bool{
            // Prepare statement
            $this->db->query('UPDATE user SET username = :username, email = :email, name = :name, contactNo = :contactNo WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $_SESSION['user_id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':contactNo', $data['contact_no']);

            // Execute
            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }

    }
        // public function login($email,$password){
        //     $this->db->query('SELECT * FROM General_User WHERE email =:email');
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

        // Update user profile
    // public function updateProfile($data): bool
    // {
    //     // Prepare statement
    //     $this->db->query('UPDATE General_User SET username = :username, email = :email, WHERE id = :id');

    //     // Bind values
    //     $this->db->bind(':id', $_SESSION['user_id']);
    //     $this->db->bind(':name', $data['name']);
    //     $this->db->bind(':email', $data['email']);
    //     $this->db->bind(':username', $data['username']);
    //     $this->db->bind(':userType', $data['user_type']);
    //     $this->db->bind(':contactNo', $data['contact_no']);
    //     // $this->db->bind(':contactNo', $data['contact_no']);

    //     // Execute
    //     if ($this->db->execute()){
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }

    }
        
    

?>