<?PHP
    class M_Recycle_Item_Ads{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function re_create($data) {
            print_r($data);
            $this->db->query('INSERT INTO Recycle_Item_Ads(seller_id,item_name,item_category,item_desc,item_image,item_location) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_image, :item_location)'); 
            $this->db->bind(':seller_id',$_SESSION['user_id']);         
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_image',$data['item_img_name']);
            $this->db->bind(':item_location',$data['item_location']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

    }

?>