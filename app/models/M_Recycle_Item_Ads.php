<?PHP
    class M_Recycle_Item_Ads{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function re_create($data) {
            $this->db->query('INSERT INTO Recycle_Item_Ads(seller_id,item_name,item_category,item_desc,item_image,item_location,item_district,item_expiry,status) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_image, :item_location, :item_district, :item_expiry, :status)'); 
            $this->db->bind(':seller_id',$_SESSION['user_id']);         
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_image',$data['item_img_name'][0]);
            $this->db->bind(':item_location',$data['item_location']);
            $this->db->bind(':item_district',$data['item_district']);
            $this->db->bind(':item_expiry',$data['item_expiry']);
            $this->db->bind(':status',"active");
            
            if($this->db->execute()){
                // return true;
                $item_id = $this->db->lastInsertId();

                for($i = 1; $i < count($data['item_img_name']); $i++) {
                    $this->db->query('INSERT INTO Recycle_Ad_Images(item_id, image_name) VALUES(:item_id, :image_name)');
                    $this->db->bind(':item_id', $item_id);
                    $this->db->bind(':image_name', $data['item_img_name'][$i]);
                    // $this->db->execute();
                    if(!$this->db->execute()){
                        print_r($this->db->errorInfo());
                    }
                }
        
                return $item_id;
            }
            else{
                return false;
            }
        }

        public function getAds(){
            $this->db->query('SELECT * FROM Recycle_Item_Ads');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAdById($adId){
            $this->db->query('SELECT * FROM v_re_ads WHERE ad_id = :id');
            $this->db->bind(':id',$adId);
            $row = $this->db->single();
            return $row;
        }

        public function getAdsBySeller($sellerId){
            $this->db->query('SELECT * FROM Recycle_Item_Ads WHERE seller_id = :seller_id');
            $this->db->bind(':seller_id',$sellerId);
            $results = $this->db->resultSet();
            return $results;
        }

        public function delete($adId){
            $this->db->query('DELETE FROM Recycle_Item_Ads WHERE r_id = :id');
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