<?PHP
    class M_Collectors{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the collector
        public function register($data){
            // Insert into Collectors table
            $this->db->query('INSERT INTO Collectors(id, nic, gender, address, com_name, com_email, com_address, telephone, company_type, reg_number, vehicle_type, vehicle_reg, model, color) VALUES(:id, :nic, :gender, :address, :com_name, :com_email, :com_address, :telephone, :company_type, :reg_number, :vehicle_type, :vehicle_reg, :model, :color)');

            // Bind values
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
            $this->db->bind(':model', $data['model']);
            $this->db->bind(':color', $data['color']);

            // Execute query
            if(!$this->db->execute()){
                return false;
            }

            // Get the last inserted id
            $collector_id = $this->db->lastInsertId();

            // Check if districts are set and is an array
            if(isset($data['districts']) && is_array($data['districts'])) {
                // Insert selected districts into CollectorDistricts table
                foreach($data['districts'] as $district_id) {
                    $this->db->query('INSERT INTO CollectorDistricts(collector_id, district_id) VALUES(:collector_id, :district_id)');
                    $this->db->bind(':collector_id', $collector_id);
                    $this->db->bind(':district_id', $district_id);

                    if(!$this->db->execute()){
                        return false;
                    }
                }
            }

            return true;
        }

        public function edit($data){
            // print_r($data);
            $this->db->query('UPDATE General_User SET username = :username, number = :number, password = :password WHERE id = :id AND user_type = "collector"');
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

        public function getUserDetails($user_id) {
            $this->db->query('SELECT * FROM Collectors WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            return $this->db->single();
        }
        
                
    }

?>