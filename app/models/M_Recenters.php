<?PHP
    class M_Recenters{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function register($data){
            // Insert into RecycleCenters table
            $this->db->query('INSERT INTO RecycleCenters(nic, owner_name, owner_address, com_name, com_email, com_address, com_tel, company_type, reg_number, website, operation_days, other_input) VALUES(:nic, :owner_name, :owner_address, :com_name, :com_email, :com_address, :com_tel, :company_type, :reg_number, :website, :operation_days, :other_input)');

            // Bind values
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':owner_name', $data['owner_name']);
            $this->db->bind(':owner_address', $data['owner_address']);
            $this->db->bind(':com_name', $data['com_name']);
            $this->db->bind(':com_email', $data['com_email']);
            $this->db->bind(':com_address', $data['com_address']);
            $this->db->bind(':com_tel', $data['com_tel']);
            $this->db->bind(':company_type', $data['company_type']);
            $this->db->bind(':reg_number', $data['reg_number']);
            $this->db->bind(':website', $data['website']);
            $this->db->bind(':operation_days', $data['operation_days']);
            $this->db->bind(':other_input', $data['other-input']);

            // Execute query
            if(!$this->db->execute()){
                return false;
            }

            // Get the last inserted id
            $center_id = $this->db->lastInsertId();

            // Check if categories are set and is an array
            if(isset($data['categories']) && is_array($data['categories'])) {
                // Insert selected categories into RecycleCentersCategories table
                foreach($data['categories'] as $category_id) {
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
