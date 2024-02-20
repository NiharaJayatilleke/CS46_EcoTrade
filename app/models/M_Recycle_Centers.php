<?PHP
    class M_Recycle_Centers{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function re_create($data) {
            $this->db->query('INSERT INTO Recycle_Centers(item_category,item_desc,item_quantity,item_location) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_image, :item_location)'); 
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

        public function getAds(){
            $this->db->query('SELECT * FROM Recycle_Centers');
            $results = $this->db->resultSet();
            return $results;
        }

    }

?>