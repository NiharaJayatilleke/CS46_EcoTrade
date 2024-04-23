<?PHP
    class M_Recenters{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function register($data){
            // Insert into Collectors table
            $this->db->query('INSERT INTO RecycleCenters(id, nic, gender, address, com_name, com_email, com_address, telephone, company_type, reg_number, vehicle_type, vehicle_reg, model, color, other_vehicle) VALUES(:id, :nic, :gender, :address, :com_name, :com_email, :com_address, :telephone, :company_type, :reg_number, :vehicle_type, :vehicle_reg, :model, :color, :other_vehicle)');

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
            $this->db->bind(':other_vehicle', $data['other_vehicle']);

            // Execute query
            if(!$this->db->execute()){
                return false;
            }

            // Get the last inserted id
            $center_id = $this->db->lastInsertId();

            // Check if districts are set and is an array
            if(isset($data['categories']) && is_array($data['categories'])) {
                // Insert selected districts into CollectorDistricts table
                foreach($data['categories'] as $district_id) {
                    $this->db->query('INSERT INTO RecycleCentersCategories(center_id, category_id) VALUES(:center_id, :category_id)');
                    $this->db->bind(':center_id', $center_id);
                    $this->db->bind(':category_id', $category_id);

                    if(!$this->db->execute()){
                        return false;
                    }
                }
            }

            return true;
        }

        public function getUserDetails($user_id) {
            $this->db->query('SELECT * FROM RecycleCenters WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            return $this->db->single();
        }

     
       public function getAds(){
            $this->db->query('SELECT * FROM Re_Centers');
            $results = $this->db->resultSet();
            return $results;
        }


        public function getAdById($adId){
            $this->db->query('SELECT * FROM v_recenter_ads WHERE ad_id = :id');
            $this->db->bind(':id',$adId);
            $row = $this->db->single();
            return $row;
        }

        public function delete($adId){
            $this->db->query('DELETE FROM Re_Centers WHERE rad_id = :id');
            $this->db->bind(':id',$adId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

    }
    

?>
