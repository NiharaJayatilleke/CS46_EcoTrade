<?PHP
    class M_Item_Ads{
        private $db;

        public function __construct(){
            $this->db = new Database();
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
    }

?>