<?PHP
    class M_Recycle_Centers{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function register($data){
            // Insert into RecycleCenters table
            $this->db->query('INSERT INTO RecycleCenters(id, nic, owner_name, owner_address, com_name, com_email, com_address, com_tel, company_type, reg_number, website, operation_days) VALUES(:id, :nic, :owner_name, :owner_address, :com_name, :com_email, :com_address, :com_tel, :company_type, :reg_number, :website, :operation_days)');

            // Bind values
            $this->db->bind(':id', $_SESSION['user_id']);
            $this->db->bind(':com_tel', $data['com_tel']);
            $this->db->bind(':com_address', $data['com_address']);
            $this->db->bind(':com_email', $data['com_email']);
            $this->db->bind(':com_name', $data['com_name']);
            $this->db->bind(':reg_number', $data['reg_number']);
            $this->db->bind(':website', $data['website']);
            $this->db->bind(':company_type', $data['company_type']);
            $this->db->bind(':owner_name', $data['owner_name']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':owner_address', $data['owner_address']);
            $this->db->bind(':operation_days', $data['operation_days']);

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

        public function edit($data){
            // Update RecycleCenters table
            $this->db->query('UPDATE RecycleCenters SET nic = :nic, owner_name = :owner_name, owner_address = :owner_address, com_name = :com_name, com_email = :com_email, com_address = :com_address, com_tel = :com_tel, company_type = :company_type, reg_number = :reg_number, website = :website, operation_days = :operation_days WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $_SESSION['user_id']);
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

            // Execute query
            if(!$this->db->execute()){
                return false;
            }

            // Delete existing categories from RecycleCentersCategories table
            $this->db->query('DELETE FROM RecycleCentersCategories WHERE center_id = :center_id');
            $this->db->bind(':center_id', $_SESSION['user_id']);
            $this->db->execute();

            // Check if categories are set and is an array
            if(isset($data['categories']) && is_array($data['categories'])) {
                // Insert selected categories into RecycleCentersCategories table
                foreach($data['categories'] as $category_id) {
                    $this->db->query('INSERT INTO RecycleCentersCategories(center_id, category_id) VALUES(:center_id, :category_id)');
                    $this->db->bind(':center_id', $_SESSION['user_id']);
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

        public function addRequirement($data){
            $this->db->query('INSERT INTO Recycle_Center_Requirements(rad_id,item_category,item_desc,item_location,item_quantity,status) VALUES (:rad_id, :item_category, :item_desc, :item_location, :item_quantity, :status)');
        
            $this->db->bind(':rad_id',$data['ad_id']);         
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_location',$data['item_location']);
            $this->db->bind(':item_quantity',$data['item_quantity']);
            $this->db->bind(':status',"active");
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getCenterRequirements(){
            $this->db->query('SELECT * FROM Recycle_Center_Requirements');
            $results = $this->db->resultSet();
            return $results;
        }


        public function getAds(){
            $this->db->query('SELECT * FROM Recycle_Center_Requirements');
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
            $this->db->query('DELETE FROM Recycle_Center_Requirements WHERE rad_id = :id');
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
