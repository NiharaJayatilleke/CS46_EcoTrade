<?PHP
    class M_Recenters{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function re_create1($data) {
            $this->db->query('INSERT INTO Re_Centers(item_category,item_desc,item_location) VALUES(:item_category, :item_desc,:item_location)'); 
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_location',$data['item_location']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

     
       // public function getAds(){
        //     $this->db->query('SELECT * FROM Re_Centers');
        //     $results = $this->db->resultSet();
        //     return $results;
        // }

    }
    

?>
