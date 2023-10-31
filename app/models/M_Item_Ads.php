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
            $this->db->bind(':id',$postId);
            $row = $this->db->single();
            return $row;
        }
        public function create($data) {
            $this->db->query('INSERT INTO Item_Ads(seller_id,item_name,item_category,item_desc,item_price,item_location,selling_format,negotiable) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_price, :item_location, :selling_format, :negotiable)'); 
            $this->db->bind(':seller_id',$_SESSION['user_id']);         
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
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

        public function edit($data) {
            $this->db->query('UPDATE Item_Ads set item_name = :item_name, item_category = :item_category, item_desc = :item_desc, item_price = :item_price, item_location = :item_location, selling_format = :selling_format, negotiable =: negotiable WHERE p_id = $p_id');
            $this->db->bind(':p_id',$data['ad_id']);      
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
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
    }

?>