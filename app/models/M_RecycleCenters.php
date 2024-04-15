<?PHP
    class M_RecycleCenters{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        //Register the collector
        // public function register($data){

        //     $this->db->query('INSERT INTO Collectors(id, nic, gender, address, com_name, com_email, com_address, telephone, company_type, reg_number, vehicle_type, vehicle_reg, make, model, insurance, color, district1, district2, district3, district4, district5) VALUES(:id, :nic, :gender, :address, :com_name, :com_email, :com_address, :telephone, :company_type, :reg_number, :vehicle_type, :vehicle_reg, :make, :model, :insurance, :color, :district1, :district2, :district3, :district4, :district5)');

        //     $this->db->bind(':id', $_SESSION['user_id']);
        //     $this->db->bind(':nic', $data['nic']);
        //     $this->db->bind(':gender', $data['gender']);
        //     $this->db->bind(':address', $data['address']);
        //     $this->db->bind(':com_name', $data['com_name']);
        //     $this->db->bind(':com_email', $data['com_email']);
        //     $this->db->bind(':com_address', $data['com_address']);
        //     $this->db->bind(':telephone', $data['telephone']);
        //     $this->db->bind(':company_type', $data['company_type']);
        //     $this->db->bind(':reg_number', $data['reg_number']);
        //     $this->db->bind(':vehicle_type', $data['vehicle_type']);
        //     $this->db->bind(':vehicle_reg', $data['vehicle_reg']);
        //     $this->db->bind(':make', $data['make']);
        //     $this->db->bind(':model', $data['model']);
        //     $this->db->bind(':insurance', $data['insurance']);
        //     $this->db->bind(':color', $data['color']);
        //     $this->db->bind(':district1', $data['district1']);
        //     $this->db->bind(':district2', $data['district2']);
        //     $this->db->bind(':district3', $data['district3']);
        //     $this->db->bind(':district4', $data['district4']);
        //     $this->db->bind(':district5', $data['district5']);
            
                        
        //     if($this->db->execute()){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function getUserDetails($user_id) {
        //     $this->db->query('SELECT * FROM RecycleCenters WHERE id = :user_id');
        //     $this->db->bind(':user_id', $user_id);
        //     return $this->db->single();
        // }
        
                
    }

?>