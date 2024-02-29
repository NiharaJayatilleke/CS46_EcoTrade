<?PHP
    class M_Item_Ads{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAds(){
            $this->db->query('SELECT * FROM v_ads');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAdById($adId){
            $this->db->query('SELECT * FROM v_ads WHERE ad_id = :id');
            $this->db->bind(':id',$adId);
            $row = $this->db->single();
            return $row;
        }

        public function getSellerByAd($adId){
            $this->db->query('SELECT seller_id FROM v_ads WHERE ad_id = :id');
            $this->db->bind(':id',$adId);
            $row = $this->db->single();
            return $row;
        }

        public function create($data) {
            $this->db->query('INSERT INTO Item_Ads(seller_id,item_name,item_category,item_desc,item_condition,item_quantity,item_image,item_price,item_location,selling_format,negotiable) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_condition, :item_quantity, :item_image, :item_price, :item_location, :selling_format, :negotiable)'); 
            $this->db->bind(':seller_id',$_SESSION['user_id']);         
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_condition',$data['item_condition']);
            $this->db->bind(':item_quantity',$data['item_quantity']);
            $this->db->bind(':item_image',$data['item_img_name']);
            $this->db->bind(':item_price',$data['item_price']);
            $this->db->bind(':item_location',$data['item_location']);
            $this->db->bind(':selling_format',$data['selling_format']);
            $this->db->bind(':negotiable',$data['negotiable']);
            
            if($this->db->execute()){
                return $this->db->lastInsertId();
            }
            else{
                return false;
            }
        }

        public function edit($data) {        
            $this->db->query('UPDATE Item_Ads SET item_name = :item_name, item_category = :item_category, item_desc = :item_desc, item_image = :item_image, item_price = :item_price, item_location = :item_location, selling_format = :selling_format, negotiable = :negotiable WHERE p_id = :p_id');
            $this->db->bind(':p_id',$data['p_id']);   
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_image',$data['item_img_name']); 
            $this->db->bind(':item_price',$data['item_price']);
            $this->db->bind(':item_location',$data['item_location']);
            $this->db->bind(':selling_format',$data['selling_format']);
            $this->db->bind(':negotiable',$data['negotiable']);
    
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function delete($adId){
            $this->db->query('DELETE FROM Item_Ads WHERE p_id = :id');
            $this->db->bind(':id',$adId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function adFeature($data){
            $this->db->query('INSERT INTO Featured_Ads(p_id,package,duration) VALUES(:p_id, :package, :duration)');
            $this->db->bind(':p_id',$data['ad_id']);
            $this->db->bind(':package',$data['package']);
            $this->db->bind(':duration',$data['duration']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }

?>