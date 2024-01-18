<?PHP
    class M_Moderators{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getModerators(){
            $this->db->query('SELECT * FROM Moderators');

            $results = $this->db->resultSet();

            return $results;
        }

        //Register the Moderator
        public function register($data){
            $this->db->query('INSERT INTO Moderators(username,email,number,password) VALUES(:username, :email, :number,  :password)');       
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':number',$data['number']);
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
        public function getModeratorById($modId){
            $this->db->query('SELECT * FROM Moderators WHERE id = :id');
            $this->db->bind(':id',$modId);
            $row = $this->db->single();
            return $row;
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

        public function edit($data){
            print_r($data);
            $this->db->query('UPDATE Moderators SET username = :username, number = :number, password = :password WHERE id = :id');
            $this->db->bind(':id',$data['id']);
            $this->db->bind(':username',$data['username']);
            $this->db->bind(':number',$data['number']);
            $this->db->bind(':password',$data['password']);  
            // $this->db->bind(':userType', $data['user_type']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        


    public function delete($modId){
        $this->db->query('DELETE FROM Moderators WHERE id = :id');
        $this->db->bind(':id',$modId);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}

?>